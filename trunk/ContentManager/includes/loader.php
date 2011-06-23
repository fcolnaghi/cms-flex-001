<?php
	/**
	 * loader.php
	 * 
	 * Arquivo responsavel por realizar a construcao dinamica dos objetos;
	 * 
	 * M�todo para verifica��o da sess�o do usu�rio, e um m�todo para recuperar informa��es
	 * sobre o usu�rio logado, com base nas informa��es no LDAP;  
	 * 
	 */
	session_start();
	$label = new i18n();
	
	function __autoload($classe) {
		
		if (!preg_match("#(DAO|HTML|User){1}$#", $classe, $fragment)) {
			$arquivo = ROOT."class/".$classe."/".$classe.".class.php";
		} else {
			$diretorio = substr($classe,0,strlen($classe) - strlen($fragment[0]));
			$arquivo = ROOT."class/".$diretorio."/".$classe.".class.php";
		}
		require_once $arquivo;
	}
	
	
	
	function verificaSessaoUsuario() {
		$label = new i18n();
		
		if (!isset($_SESSION["login"])) {
						
			$_SESSION['type'] = "erro";
			$_SESSION['message'] = $label->getTextoVar("sessao.expirada");
			
			header("Location: login.php");
		} else {
			return true;
		}
	}
	
	function verificaSessao() {
		$label = new i18n();
		
		if (!isset($_SESSION["login"])) {
						
			$_SESSION['type'] = "erro";
			$_SESSION['message'] = $label->getTextoVar("sessao.expirada");
			
			header("Location: index.php");
		} else {
			return true;
		}
	}
	
	function getUsuarioLogado() {	
		if(isset($_SESSION["login"])) {
			return $_SESSION["login"]; 
		} else {
			return null;
		}
	}
	
?>