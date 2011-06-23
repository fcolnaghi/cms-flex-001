<?php
class ConexaoDB {
	public static $conexao ;
	private static $dbType;
	
	private static $host;
	private static $user;
	private static $senha;
	private static $db;

	public static $persistent;
	
	public static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            // Você deve informar os dados para conexão com o banco de dados.
            self::$instance = self::getConnection();
        }
        return self::$instance;
    }
	
	public static function getConnection() {
		try {
						
			
			if(self::$instance == null) {	
				self::$host = "localhost";
				self::$user= "root";
				self::$senha= "";
				self::$db = "manager";
				self::$dbType = "mysql";
				self::$persistent = false;
				/*	
				self::$host = "localhost";
				self::$user= "root";
				self::$senha= "root";
				self::$db = "wcm";
				self::$dbType = "mysql";
				self::$persistent = true;
				*/
				
				self::$instance = new PDO(self::$dbType.":host=".self::$host.";dbname=".self::$db, self::$user, self::$senha);
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			
			return self::$instance;

		// caso ocorra um erro, retorna o erro;
		} catch ( PDOException $ex ){
			self::mostrarErros($ex);
		}
		
		return false;
	}
	
	/**
	 * 
	 * @return unknown_type
	 */
	public function getConnectionConstrutor() {
		try {
			self::$conexao = new PDO($this->dbType.":host=".$this->hostConstrutor.";dbname=".$this->dbConstrutor, $this->userConstrutor, $this->senhaConstrutor,array( PDO::ATTR_PERSISTENT => $this->persistent ));
			return self::$conexao;
		}catch ( PDOException $ex ){
			echo $ex->getMessage();			
		}
		
		return false;
	}
	
	/**
	 * Método genérico para atualizar um objeto com seus valores
	 * Uso:
	 * 		sqlUpdate ( Param1: Objeto, Param2: Indice Id tabela, Param3: tabela para update);
	 *
	 * @method sqlUpdate
	 * @param $object
	 * @param $indice
	 * @param $tabela
	 */
	protected function sqlUpdate($object, $indice, $tabela) {
        try {
                
            $i = 0;
            foreach ($object as $key => $value) {
            	if($i != 0) $v = ",";
				if($value != "" && $key != $indice) {
					$valores .= $v.$key."= ?";
					$i++;
				}
            }
                                
            $sql = "UPDATE ".$tabela." SET ".$valores." WHERE (".$indice." = ?) LIMIT 1;";
                
			$stmt = self::$conexao->prepare($sql);  
            $i=1;
            
            foreach ($object as $key => $value) {
                if($value != "" && $key != $indice) {                               
                    $classe = "get".$key;
                    $stmt->bindValue($i, $object->$classe());
                    $i++;
                }
            }
                
            $getIndice = "get".ucfirst($indice);
            $stmt->bindValue($i, $object->$getIndice());
            $stmt->execute();
            
            
        } catch (PDOException $e) {
			$this->mostrarErros($e);
        }
    }
    
    /**
     * 
     */
	protected function sqlInsert($object, $indice, $tabela) {
        try {
            $i = 0;
            
            foreach ($object as $key => $value) {
            	if($i != 0) $v = ",";
				if($indice != $key) {
					$atributos .= $v.$key;
					$values .= $v."?";
					$i++;
				}
            }
                                
            $sql = "insert into ".$tabela." (".$atributos.") VALUES (".$values.")";
            
            echo $sql;
            
            $stmt = self::$conexao->prepare($sql);
			
			$i=1;
            
            foreach ($object as $key => $value) {
            	if($indice != $key) {
            		if($value === "") $value = NULL;
            		echo $i." - ".$value."<br>";
	                $stmt->bindValue($i, $value);
	                $i++;
            	}
            }
            
            
            $stmt->execute();
                       
            //$this->executeSql($sql);
            
        } catch (PDOException $e) {
			$this->mostrarErros($e);
        }
    }
	/**
	 * Executa um Select padr�o
	 * @param $query
	 * @return unknown_type
	 */
    public function executeSql($query) {
    	try {               
			$conexao = $this->getConnection();

			$stmt = self::$conexao->prepare($query);
			
			$stmt->execute();
			
			$dados = $stmt->fetch(PDO::FETCH_OBJ);
			
			return $dados;
			
    	} catch (PDOException $e) {
			$this->mostrarErros($e);
        }
    }
	
	/**
	 * Método genérico para popular um objeto com seus valores
	 * Uso:
	 * 		montaObjeto ( PDO ResultSet, Tipo Objeto);
	 * Retorno:
	 * 		Lista de Objetos
	 *
	 * @method montaObjeto
	 * @param $rs
	 * @param $tipo
	 * @return Array
	 */
	protected function montaLista($rs , $tipo) {
		
		$retorno = array();
		
		while($dados = $rs->fetch(PDO::FETCH_OBJ)) {
			$objeto = new $tipo();
			
			foreach ($dados as $atributo => $valor) {
				$campo = "set".ucfirst($atributo);
				$objeto->$campo($valor);
			}
			
			array_push($retorno, $objeto);
		}		
		
		return $retorno;	
	}
	
	protected function montaObjeto($rs , $tipo) {
		
		$retorno = array();
				
		while($dados = $rs->fetch(PDO::FETCH_OBJ)) {
			$objeto = new $tipo();
			
			foreach ($dados as $atributo => $valor) {
				$campo = "set".ucfirst($atributo);
				$objeto->$campo($valor);
			}
			
			array_push($retorno, $objeto);
		}		
		
		return $retorno[0];	
	}
	
	
	public static function mostrarErros($expetion) {
		//TODO: Transformar a saida em LOG de arquivo com PrintStackTrace();
		echo "<div id=\"dialog\" style=\"font-size: 12px; color: red\">";
		echo "	<h3>Erro ao fazer a consulta:</h3>";
		echo "	<ul>";
		echo "		<li>Erro: ".$expetion->getMessage()."</li>";
		echo "		<li>Linha: ".$expetion->getLine()."</li>";
		echo "		<li>Arquivo: ".$expetion->getFile()."</li>";
		echo "	</ul>";
		echo "</div>";
		
		$erro = "Erro ao fazer a consulta:\n";
		$erro .= "Erro: ".$expetion->getMessage()."\n";
		$erro .= "Linha: ".$expetion->getLine()."\n";
		$erro .= "Arquivo: ".$expetion->getFile()."\n";
		
		Log::escrever($erro);
	}
	
	/*
	private static function carregaParametros() {
		
		self::$host = "localhost";
		self::$user= "root";
		self::$senha= "root";
		self::$db = "wcm";
		self::$dbType = "mysql";
		self::$persistent = false;
		
		$modulo = simplexml_load_file(dirname(__FILE__)."/config.xml");
		$parametros = $modulo->parametros;
		
		foreach($parametros as $atributos => $param) {
			foreach($param as $parametro => $valor ) {
				self::$$parametro = (string)$valor[0];
			}
		}
		
	}
	*/
	
	public function __destruct() {		
		self::$instance = null;
	}
}
?>