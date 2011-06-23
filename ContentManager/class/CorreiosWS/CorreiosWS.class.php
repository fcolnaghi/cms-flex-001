<?php
/**
 * Classe respons�vel por fazer as chamadas ao WebService do WEON
 * @author Fernando Colnaghi Ribeiro
 * @version 0.1
 * @copyright Fernando Colnaghi Ribeiro
 *
 * @example <pre>
 * $servico = new WebService();
 * 
 */
class CorreiosWS {
	public $webservice = null;
	
	/**
	 * Metodo Construtor responsavel por instanciar um novo servico
	 * @return unknown_type
	 */
	public function getCorreiosWS($servico, $ip) {
		try {
				$url = "http://".$ip."/weon/web-service/CallCenter/".$servico;
			//if($this->webservice == null) {
				return $this->webservice = new SoapClient("http://".$ip."/weon/web-service/CallCenter/".$servico);
			//} else {
			//	return $this->webservice;
			//}
			
		} catch (Exception $e) {
			echo "Erro ao iniciar o servico: ".$e->getMessage();
		}
	}
	
	/**
	 * Metodo responsavel por realizar chamada via WEON
	 * @param $operador
	 * @param $telefone
	 * @return jsonArray
	 */
	public function realizarChamada($operador, $telefone) {
		try {
		    strlen($operador) == 3 ? $this->getWebService(CHANNEL, IPWEON_RAMAIS) : $this->getWebService(CHANNEL, IPWEON_CALLCENTER);
		  
			$telefone = str_replace(' ', '',$telefone);
			$telefone = str_replace( '-', '', $telefone);
	
		    $retorno = $this->webservice->__call('originarChamada', Array($operador,$telefone));
		} catch (Exception $e) {
			echo "N�o foi poss�vel executar a fun��o 'realizarChamada' e realizar a chamada('originarChamada') ERRO:<br/> ".$e->getMessage();
		}
		
		return $this->trataRetornoJson(json_decode($retorno,TRUE));
	}
	
	/**
	 * Metodo responsavel por realizar chamada "Manual" via WEON
	 * @param $operador
	 * @param $telefone
	 * @param $unidade
	 * @return Json
	 */
	public function realizarChamadaManual($operador, $telefone, $unidade) {
		try {
		  strlen($operador) == 3 ? $this->getWebService(CHANNEL, IPWEON_RAMAIS) : $this->getWebService(CHANNEL, IPWEON_CALLCENTER);
		  
		  $retorno = $this->webservice->__call('originarChamadaUO', Array($operador,$telefone, $unidade));
		} catch (Exception $e) {
			echo "N�o foi poss�vel executar a fun��o 'realizarChamadaUO' e realizar a chamada('originarChamadaUO') ERRO:<br/> ".$e->getMessage();
		}
		
		return $this->trataRetornoJson(json_decode($retorno,TRUE));
	}
	
	/**
	 * Metodo responsavel por liberar o telefone do operador
	 * @param $operador
	 * @param $fila
	 * @return Json
	 */
	public function liberarTelefone($operador, $fila) {
		try {
		  $this->getWebService(MEMBER, IPWEON_CALLCENTER);
		  
		  if(!$fila) { $fila = 800; }
		  
		  $retorno = $this->webservice->__call('UnPauseMemberQualify', Array($operador,$fila,'Chamada Atendida','Ok'));
		  
		} catch (Exception $e) {
			echo "N�o foi poss�vel executar a fun��o 'liberarTelefone' e realizar a chamada('UnPauseMemberQualify') ERRO:<br/> ".$e->getMessage();
		}
		
		return $this->trataRetornoJson(json_decode($retorno,TRUE));
	}
	
/**
	 * Metodo responsavel por Pausar o operador no Weon
	 * @param $operador
	 * @param $fila
	 * @return Json
	 */
	public function pausarOperador($operador) {
		try {
		  $this->getWebService(MEMBER, IPWEON_CALLCENTER);
		  
		  $retorno = $this->webservice->__call('pauseAll', Array($operador,'Deslogado via Ponto'));
		  
		} catch (Exception $e) {
			echo "N�o foi poss�vel executar a fun��o 'pausarOperador' e realizar a chamada('pauseAll') ERRO:<br/> ".$e->getMessage();
		}
		
		return $this->trataRetornoJson(json_decode($retorno,TRUE));
	}
	
	/**
	 * Recupera o status do Operador
	 * @param $operador
	 * @return unknown_type
	 */
	public function statusOperador($operador) {
		try {
		  $this->getWebService(MEMBER, IPWEON_CALLCENTER);
		  
		  $retorno = $this->webservice->__call('getMemberInfo', Array($operador));
		  
		} catch (Exception $e) {
			echo "N�o foi poss�vel executar a fun��o 'statusOperador' e realizar a chamada('getMemberInfo') ERRO:<br/> ".$e->getMessage();
		}
		
		return $this->trataRetornoJson(json_decode($retorno,TRUE));
	}
	
	/**
	 * Logar o agente no weon
	 * @param $operador
	 * @param $senha
	 * @return unknown_type
	 */
	public function logarAgente($operador, $senha) {
		try {
		  $this->getWebService("WSLogin.wsdl", IPWEON_CALLCENTER);
		  
		  $retorno = $this->webservice->__call('WSLoginAgent', Array($operador,$senha));
		  
		} catch (Exception $e) {
			echo "N�o foi poss�vel executar a fun��o 'logarAgente' e realizar a chamada('WSLoginAgent') ERRO:<br/> ".$e->getMessage();
		}
		
		return $this->trataRetornoJson(json_decode($retorno,TRUE));
	}
	
	
	
	/**
	 * Transforma o retorno do Json em Objeto
	 * @param $json
	 * @return jsonObject {
	 * 		code,
	 * 		codeMessage,
	 * 		body []
	 * }
	 */
	private function trataRetornoJson($json) {
		/*if($json['code'] != 0 ) {
			throw new Exception($json['code']." - ".utf8_decode($json['codeMessage']));
		}*/
		//Trata o retorno para UTF-8 / ISO-8859-1
		$json['codeMessage'] = $this->converteRetorno($json['codeMessage']);
		if($json['body']['status'] != "")
			$json['body']['status'] = $this->converteRetorno($json['body']['status']);
	
		return (Object) $json;
	}
	/**
	 * Metodo responsavel por verificar se o encode type do texto � UTF-8/ISO-8859-1
	 * @param $texto
	 * @return texto Formatado
	 */
	private function converteRetorno($texto) {
		$codificacao = mb_detect_encoding($texto) ;
		if($codificacao == "UTF-8" && mb_check_encoding($texto,"UTF-8")) {
			return utf8_decode($texto);
		} else {
			return utf8_decode($texto);
		}
	}
	
	/**
	 * Metodo respons�vel por matar a instancia ativa do WebService
	 * @return unknown_type
	 */
	public function __destruct() {
		if($this->webservice != null) $this->webservice = null;
	}
}
?>
