<?php
/**
 * Classe de Internacionaliza��o
 * <?
 * $idioma = new i18n();
 * echo $idioma->getTexto('erro.tipo.erro');
 * ?>
 * 
 * Sa�da pt_BR
 * Mensagem de refer�ncia
 * 
 * Sa�da en_US
 * Reference message 
 * 
 * Padr�o XML Exemplo (default.xml)
 * <?xml version="1.0" encoding="UTF-8"?>
 * <idioma lang="pt_BR">
 * 	<label>
 * 		<tag>erro.tipo.erro</tag>
 * 		<texto>Mensagem de refer�ncia</texto>
 * 	</label>
 * </idioma>
 * 
 * XML Exemplo en_US (en_US.xml)
 * <?xml version="1.0" encoding="UTF-8"?>
 * <idioma lang="en_US">
 * 	<label>
 * 		<tag>erro.tipo.erro</tag>
 * 		<texto>Reference message</texto>
 * 	</label>
 * </idioma>
 */
class i18n {
	
	private $idioma;
	private $traducoes = array();
	private $diretorio;
	
	/**
	 * M�todo construtor para recuparar o arquivo XML, dependo da linguagem de prefer�ncia do Browser
	 */
	function __construct() {
		//Faz a leitura do arquivo de configura��o do modulo
		$modulo = simplexml_load_file(dirname(__FILE__)."/config.xml");
		$this->diretorio = ROOT.$modulo->parametros->diretorio;

		$langs = explode(",",$_SERVER['HTTP_ACCEPT_LANGUAGE']);
		$this->idioma = $langs[0];
		$this->loadXml();
	}
	
	/**
	 * Carrega o arquivo de idiomas indicado se n�o achar nenhum pega o default
	 */
	private function loadXml() {
		
		if(!$xml = @simplexml_load_file($this->diretorio.$this->idioma.".xml")) {
			$xml = simplexml_load_file($this->diretorio."default.xml");
		}

		foreach ($xml as $translate) {
			$this->traducoes[(string)$translate->tag] = (string)utf8_decode($translate->texto);
		}
		
	}
	
	/**
	 * Recupera o texto apartir do Label passado e printa na tela
	 *
	 * @param $label
	 * @param $params Array("VALOR1", "VALOR2");
	 * @return (string) texto
	 */
	public function getTexto($label, $params = "") {
		try {
			if(isset($this->traducoes[$label])) {
				if(is_array($params)) {
					foreach($params as $key => $value) {
						$this->traducoes[$label] = str_replace("{".$key."}", $value, $this->traducoes[$label]);
					}
				}
				echo $this->traducoes[$label];
			} else {
				echo $label;
			}
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}

	}
	
	/**
	 * Recupera o texto apartir do Idioma do Label passado e salva na variavel
	 *
	 * @param $label
	 * @param $params Array("VALOR1", "VALOR2");
	 * @return (string) texto
	 */
	public function getTextoVar($label, $params = "") {
		try {
			if(isset($this->traducoes[$label])) {
				if(is_array($params)) {
					foreach($params as $key => $value) {
						$this->traducoes[$label] = str_replace("{".$key."}", $value, $this->traducoes[$label]);
					}
				}
				return $this->traducoes[$label];
			} else {
				return $label;
			}
			
		} catch (Exception $e) {
			return $e->getMessage();
		}

	}
}

?>