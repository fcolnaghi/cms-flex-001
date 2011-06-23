<?php
		require_once("constantes.php");
		require_once(ROOT."includes/loader.php");
		
		$ldap = new LDAP();
		
		$usuario = $ldap->getUsuarioPorUID($_GET['file']);
				
		header('Content-type: image/jpeg');
		header('filename='.strtolower($usuario[0]->getCn()).'.jpg');
		
		if($usuario[0]->getJpegPhoto() != "") {
			echo $usuario[0]->getJpegPhoto();
		} else {
			echo file_get_contents(ROOT."images/sem_imagem.jpg");
		}
?>