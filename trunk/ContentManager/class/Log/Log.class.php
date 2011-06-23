<?php
/**
 * Classe responsсvel pela geraчуo de logs na aplicaчуo;
 * @author fernando
 *
 */
class Log {
	
	private $logFile;
	
	public static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            // VocУЊ deve informar os dados para conexУЃo com o banco de dados.
            self::$instance = new Log();
        }
        return self::$instance;
    }
	
	
	public function __construct() {
		try{
			$modulo = @simplexml_load_file(dirname(__FILE__)."/config.xml");
			
			if(!$modulo) {
				$saida = new i18n();
				throw new Exception($saida->getTexto("erro.nao.encontrado",array("config.xml")));
			} else {
				$this->logFile = ROOT.$modulo->parametros->diretorio.$modulo->parametros->arquivo;
				if(!is_dir(ROOT.$modulo->parametros->diretorio)) {
					mkdir(ROOT.$modulo->parametros->diretorio);
				}
				
				if(!file_exists($this->logFile)) {
					touch($this->logFile);
				}
				
			}
						
		}catch(Exception $ex) {
			echo $ex->getMessage();
		}
	}
	
	public static function escrever($texto) {
		
		$arquivo = self::getInstance();
		
		try {

			$log = fopen($arquivo->logFile,'a+');
			if(!fwrite($log,$texto."\n\n")) {
				throw new Exception("Nуo щ possivel escrever no arquivo de LOG");
			} 
			fclose($log);
		} catch(Exception $ex) {
			echo $ex->getMessage();
			exit;
		}
	}	
	
	/**
	 * 
	 */
	public function __destruct() {
	
	}
}

?>