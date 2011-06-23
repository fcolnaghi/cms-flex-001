<?php

	$label = null;	

	include_once("../constantes.php");
	require_once(ROOT."includes/loader.php");
	
	verificaSessao();
	
	$usuarioLogado = getUsuarioLogado();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

	<title></title>

	<!-- METAS -->
    <meta name="description" content="descri��o" />
    <meta name="keywords" content="keywords" />
	<!-- /METAS -->
   
    <!-- Jquery -->
    <script type="text/javascript" src="<?=ROOT?>js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="<?=ROOT?>js/jquery-ui-1.8.8.custom.min.js"></script>
    <script type="text/javascript" src="<?=ROOT?>js/menu.js"></script>
    <link href="<?=ROOT?>css/smoothness/jquery-ui-1.8.8.custom.css" rel="stylesheet" type="text/css" media="all" />
    
    <!-- CSS -->
	<link href="<?=ROOT?>css/styles.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?=ROOT?>css/theme.css" rel="stylesheet" type="text/css" media="all" />	
	
    <!-- /CSS -->
   
   
    <!--[if IE 6]>
    	<script type="text/javascript" src="<?=ROOT?>js/DD_belatedPNG.js"></script>
        <script src="<?=ROOT?>js/DD_belatedPNG.js"></script>
        <script>
          /* EXAMPLE */
          DD_belatedPNG.fix('*');
        </script>
	<![endif]-->
	<script>
	$(function() {
		$( "#accordion" ).accordion({
			autoHeight: false,
			navigation: true,
			collapsible: true
		});
	});
	</script>
	<style>
		#accordion {
			width:210px;
			font-size: 70%;
			margin: 5px;	
		}
	</style>
</head>
<body>
	<!-- HEADER -->
	<div id="header">
		<div class="content">
			<!-- Logo -->
	        <div id="logo">
	        	<h1><a href="#"><span class="none"></span></a></h1>
	        </div>
	        <!-- Box user info -->
	        <div id="boxUser">
	        	<ul>
	        		<li class="welcome"><?php $label->getTexto("admin.welcome", array("<b>".$usuarioLogado->getNomeCompleto()."</b>"))  ?></li>
	        		<li class="messages"><a href="mailbox.php"><?php $label->getTexto("admin.messages", array("<b>5</b>")) ?></a></li>
	        		<li class="settings"><a href="config.php"><?php $label->getTexto("admin.settings") ?></a></li>
	        		<li class="exit"><a href="logout.php"><?php $label->getTexto("admin.logout") ?></a></li>
	        		<li class="last"><?php $label->getTexto("admin.last.login", array("<b>".date("d/m/Y")." - ".date("H:i:s")."</b>")) ?></li>
	        	</ul>
	        </div>
		</div>
	</div>
	<div id="menu">
		<ul class="topnav">  
			<li><a href="#">Estat�sticas</a></li>  
			
			<li>  
			    <a href="#">Gerenciar Conte�do</a>  
			    <ul class="subnav">  
			        <li><a href="#">Categorias</a></li>
			        <li><a href="#">P�ginas</a></li>  
			        <li><a href="#">News</a></li>
			        <li><a href="#">Banners</a></li>
			        <li><a href="#">Contatos</a></li>  
			    </ul>
			</li>
			<li>  
			    <a href="#">Galeria Multim�dia</a>  
			    <ul class="subnav">  
			        <li><a href="#">Listar Galerias</a></li>  
			    </ul> 
			</li>  
			<li><a href="#">Gerenciar Usu�rios</a>
				<ul class="subnav">  
			        <li><a href="#">Listar Us�arios</a></li>
			        <li><a href="#">Listar Perfils</a></li>  
			    </ul> 
			</li>  
			<li><a href="#">Gerenciar Mailing</a>
				<ul class="subnav">  
			        <li><a href="#">Informativos</a></li>
			        <li><a href="#">Grupos</a></li>
			        <li><a href="#">Leitores</a></li>  
			    </ul>
			</li> 
			<li><a href="#">Configura��es do Sistema</a>
				<ul class="subnav">  
			        <li><a href="#">Par�metros Sistema</a></li>
			        <li><a href="#">Ferramenta SEO</a></li>
			        <li><a href="#">Redes Sociais</a></li>
			        <li><a href="#">Google Analytics</a></li>
			    </ul>
			</li>  
		</ul>
	</div>
	<!-- HEADER -->
	<div id="container">
		<div class="content">
			<div class="content-box box_1">
	            <header>
		            <ul class="action-buttons clearfix fr">
		            	<li><a rel="#overlay" class="button button-gray no-text help" href="documentation/index.html">Help<span class="help"></span></a></li>
		            </ul>
		            <h2>Estat�sticas do Site</h2>
	            </header>
	            <section class="container_6 clearfix">
	            	
	            </section>
            </div>
            
            <div class="content-box box_2">
	            <header>
		            <ul class="action-buttons clearfix fr">
		            	<li><a rel="#overlay" class="button button-gray no-text help" href="documentation/index.html">Help<span class="help"></span></a></li>
		            </ul>
		            <h2>Estat�sticas do Site</h2>
	            </header>
	            <section class="container_6 clearfix">
	            	
	            </section>
            </div>
		</div>
	</div>
</body>
</html>