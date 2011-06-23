<?php
class GrupoDAO extends ConexaoDB {

	public function GrupoDAO() {
		parent::$conexao = ConexaoDB::getInstance();
	}
	
	/**
	 * Metodo responsável por capturar a conex�o$select gerada pelo ConexaoDB
	 * @return GrupoDAO
	 */	
	public function temFilho($grupoId) {
		try {
			$sql = "SELECT * FROM grupo WHERE id_grupo_pai = ?";
			
			$stmt = parent::$conexao->prepare($sql);
			$stmt->bindValue(1,$grupoId);
								
			$stmt->execute();
			if($stmt->rowCount() > 0) {
				return true;
			} else {
				return false;
			}
			
		} catch (PDOException $e) {
			 self::mostrarErros($e);		
		}
	}
	
	/**
	 * Metodo responsável por capturar a conex�o$select gerada pelo ConexaoDB
	 * @return GrupoDAO
	 */	
	public function verificarFilhos($grupoId) {
		try {
			$sql = "SELECT * FROM grupo WHERE id_grupo_pai = ?";
			
			$stmt = parent::$conexao->prepare($sql);
			$stmt->bindValue(1,$grupoId);
								
			$stmt->execute();
			
			return $this->montaLista($stmt, "Grupo");
			
		} catch (PDOException $e) {
			 self::mostrarErros($e);		
		}
	}
	
	public function adicionarGrupo($grupo) {
		try {
			$sql = "INSERT INTO grupo (id_grupo_pai, descricao) VALUES (?,?);";

     		$stmt = parent::$conexao->prepare($sql);
						 
			$stmt->bindValue(1, $grupo->getId_grupo_pai()); 			
			$stmt->bindValue(2, $grupo->getDescricao());
						
			$stmt->execute();
		} catch (PDOException $e) {
			self::mostrarErros($e);		
		}
	}
	
	public function alterarGrupo($grupo) {
		try {
			$i = 0;
    		foreach ($grupo as $key => $value) {
    			if($i != 0) $v = ",";
    			if($value != "" && $key != "id_grupo") {
    				$valores .= $v.$key."= ?";
    				$i++;
    			}
    		}
    		    		
    		$sql = "UPDATE grupo SET ".$valores." WHERE (id_grupo = ?) LIMIT 1;";
    		
     		$stmt = parent::$conexao->prepare($sql);
		
     		$i=1;
     		foreach ($grupo as $key => $value) {
    			if($value != "" && $key != "id_grupo") {    				
					$atributo = "get".$key;
					$stmt->bindValue($i, $grupo->$atributo());
					$i++;
    			}
    		}
     		
    		$stmt->bindValue($i, $grupo->getId_grupo());

			$stmt->execute();
			
		} catch (PDOException $e) {
			self::mostrarErros($e);		
		}
	}
	
	public function listarGruposPai() {
		try {
			$sql = "SELECT * FROM grupo WHERE id_grupo_pai = 0";
			
			$stmt = parent::$conexao->prepare($sql);			
			$stmt->execute();
			
			return $this->montaLista($stmt, "Grupo");
			
		} catch (PDOException $e) {
			 self::mostrarErros($e);		
		}
	}
	
	public function listarGrupos() {
		try {
			$sql = "SELECT * FROM grupo";
			
			$stmt = parent::$conexao->prepare($sql);			
			$stmt->execute();
			
			return $this->montaLista($stmt, "Grupo");
			
		} catch (PDOException $e) {
			 self::mostrarErros($e);		
		}
	}
	
	public function listarArvorePorGrupo($grupo) {
		$filhos = $this->verificarFilhos($grupo);
		
		if(count($filhos) > 0) {
			//isset($_SESSION['no']) ? $_SESSION['no']++ : $_SESSION['no'] = 1 ;
			
			//for($i=0;$i < $_SESSION['no']+1;$i++) $tab .= "   ";
			echo "<ul>";
			foreach($filhos as $lista => $filho) {

				 $parent = self::temFilho($filho->id_grupo) ? "class=\"menuparent\"" : "";
				
				 echo "<li ".$parent."><a href=\"#\">".$filho->descricao."</a>";
				 $this->listarArvorePorGrupo($filho->id_grupo);
				 echo "</li>\n";	
			}
			echo "</ul>";
			
			//$_SESSION['no']--;
		}
		
	}
	
}
?>