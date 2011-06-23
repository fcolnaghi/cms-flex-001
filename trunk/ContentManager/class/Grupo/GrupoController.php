<?php
	require_once("../../constantes.php");
	require_once(ROOT."includes/loader.php");
	
	$grupoDAO = new GrupoDAO();
	
	if(!isset($_GET['id'])) {
		$grupo = new Grupo();
		
		foreach($_POST as $key => $value) {
			$atributo = "set".ucfirst($key);
			$grupo->$atributo($value);
		}
		
		$grupoDAO->adicionarGrupo($grupo);
		header("Location: ".ROOT."principal.php");
	}
?>