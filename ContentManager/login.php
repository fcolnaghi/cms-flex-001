<?php
	include_once("constantes.php");
	require_once(ROOT."includes/loader.php");
	
	$usuario = new UsuarioDAO();

	if(isset($_POST['usuario']) && $_POST['usuario'] != "" && $_POST['senha'] != "") {
		if($usuario->login($_POST['usuario'],$_POST['senha'])) {
			header("Location: order.php");
		}
	} else {
		$logado = getUsuarioLogado();
				
		if($logado) {
			header("Location: order.php");
		}
	}
	
?>
<html>
	<head>
		<link href="<?=ROOT?>css/estilo.css" rel="stylesheet" type="text/css" media="all" />
	</head>
	<body>
		<div id="wrapper">
			<div id="header" class="noborder clearfix">
	            <h1>
	                <a class="logo" href="./">CompreClick! Todo dia uma super oferta!</a>
	            </h1>
	        </div>
		</div>
		<div id="conteudoInterno" class="clearfix">
			<div id="interno">
				<div class="descricaoCompleta">
					<br>
					<span id="descCompleta">
        				<h3>Já tenho cadastro, quero aproveitar as ofertas!</h3>
        				<br>
				        <form target="_parent" method="post" action="login.php">
				        	<table width="100%" cellpadding="2" cellspacing="2" border="0">
				        		<tr>
				        			<td width="150" align="right" valign="top"><span style="margin: 5px;">usuário ou e-mail</span></td>
				        			<td><input type="text" value="" name="usuario" id="usuario" class="text"></td>
				        		</tr>
				        		<tr>
				        			<td></td>
				        			<td><p class="note"><a title="se não lembra de seu nome de usuário, tente entrar com seu e-mail de cadastro!" tabindex="-1" onclick="forgotUsername(); return false;" href="" class="esqueci">não lembro meu usuário</a></p></td>
				        		</tr>
				        		<tr>
				        			<td colspan="2">&nbsp;</td>
				        		</tr>
				        		<tr>
				        			<td align="right" valign="top"><span style="margin: 5px;">sua senha</span></td>
				        			<td><input type="password" name="senha" id="senha" class="text"></td>
				        		</tr>
				        		<tr>
				        			<td></td>
				        			<td><p class="note"><a title="se não lembra de seu nome de usuário, tente entrar com seu e-mail de cadastro!" tabindex="-1" onclick="forgotUsername(); return false;" href="" class="esqueci">não lembro minha senha</a></p></td>
				        		</tr>
				        		<tr>
				        			<td colspan="2">&nbsp;</td>
				        		</tr>			        		
				        		<tr>
				        			<td></td>
				        			<td><input type="submit" value="entrar" class="button"></td>
				        		</tr>
				        	</table>
				        </form>
				        <br>
					</span>
				</div>
				<br>
				<div class="otherStuff">
					<div class="blocoSemRegistro">
					 	<h3>Ainda não tem registro?</h3>
					 	<p>Não perca mais tempo faça já o seu cadastro <a href="cadastro.php">clicando aqui</a>. E não deixe passar mais nenhuma promoção!</p>
					</div>
				</div>
			</div>
		</div>
		<div id="footer" class="clearfix">
			<div id="interno">
				<div class="disclamer">
					<h1>Sobre o CompreClick!</h1>
					<p>
						A disclaimer is generally any statement intended to specify or delimit the scope of rights and obligations that may be exercised and enforced by parties in a legally-recognized relationship. In contrast to other terms for legally operative language, the term disclaimer usually implies situations that involve some level of uncertainty, waiver, or risk.

A disclaimer may specify mutually-agreed and privately-arranged terms and conditions as part of a contract; or may specify warnings or expectations to the general public (or some other class of persons) in order to fulfill a duty of care owed to prevent unreasonable risk of harm or injury. Some disclaimers are intended to limit exposure to damages after a harm or injury has already been suffered. Additionally, some kinds of disclaimers may represent a voluntary waiver of a right or obligation that may be owed to the disclaimant.<br><br>O CompreClick! é uma marca registrada. Todos os direitos reservados. 
					</p>
				</div>
				<ul id="menuFooter">
					<li class="tituloFooter"><a href="/">CompreClick</a></li>
					<li><a href="/Blog">Blog</a></li>
					<li><a href="/Forum">Fórum</a></li>
					<li><a href="/Contato">Contato</a></li>
					<li><a href="/ComoFunciona">Como funciona</a></li>
				</ul>
				<ul id="menuFooter">
					<li class="tituloFooter"><a href="/Blog">Blog</a></li>
					<li><a href="#">Novidades</a></li>
					<li><a href="#">Concursos</a></li>
					<li><a href="#">Ofertas passadas</a></li>
				</ul>
				<ul id="menuFooter">
					<li class="tituloFooter"><a href="#">Fórum</a></li>
					<li><a href="#">Últimos posts</a></li>
					<li><a href="#">Concursos</a></li>
					<li><a href="#">Sugestões</a></li>
					<li><a href="#">Fale o que quiser</a></li>
				</ul>
				<ul id="menuFooter" style="width: 185px;">
					<li class="tituloFooter"><a href="/ComoFunciona">O que é o CompreClick?</a></li>
					<li><a href="#">Perguntas frequentes</a></li>
					<li><a href="#">Seja nosso parceiro</a></li>
					<li><a href="#">Termo de uso</a></li>
					<li><a href="#">Política de Privacidade</a></li>
				</ul>
			</div>
			<br>
		</div>
	</body>
</html>
