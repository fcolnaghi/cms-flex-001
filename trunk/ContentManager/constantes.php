<?php
/**
 * Constantes usadas no sistema
 * 
 * @author Fernando Ribeiro
 * @version 0.1
 * @copyright Fernando Colnaghi Ribeiro
 */
	header("Content-Type: text/html; charset=ISO-8859-1",true);
	
	//Express�o regular usada para remover o diret�rio corrente
	preg_match("/(.*)\//",$_SERVER['REQUEST_URI'],$caminho);
	
	//Define o diretorio Raiz da aplica��o
	
	$diretorio = getcwd();
	
		
	if(strpos(getcwd(), "class") > 0) {
		define('ROOT',"../../");
	} else if(strpos(getcwd(), "painel") > 0){
		define('ROOT',"../");
	} else {
		define('ROOT',"");	
	}	
?>