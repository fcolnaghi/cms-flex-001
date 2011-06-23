<?php
	include_once("constantes.php");
	require_once(ROOT."includes/loader.php");
?>
<html>
	<head>
		<link href="<?=ROOT?>css/estilo.css" rel="stylesheet" type="text/css" media="all" />
		<script type="text/javascript" src='<?=ROOT?>js/jquery-1.4.4.min.js'></script>
		<script>
			function buscarCEP(cep) {
				$.ajax({
				  url: 'teste.php',
				  data: 'cep='+ cep,
				  dataType: 'xml',
				  success: function(data) {
				  	$('#endereco1').val($(data).find('logradouro').text());
				  	$('#bairro').val($(data).find('bairro').text());
				  	$('#estado').val($(data).find('uf').text());
				  	$('#cidade').val($(data).find('cidade').text());
				  	$('#pais').val('Brasil');
				  }
				});
			}
		</script>
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
				<div class="carrinho">
					<div class="blocoSemRegistro">
					 	<div class="descricao">
				        	<h2>Voc� n�o perde por esperar!</h2>
				        	<p>Fazendo o seu cadastro, isto facilitara no momento de conclus�o de sua compra, preenchendo os dados r�pido. Isso tudo para que voc� n�o perca nem um segundo para realizar a sua compra.<br><br>Existem 3 coisas que n�o voltam atr�s s�o elas, uma flecha lan�ada, uma palavra dita, e uma Oportunidade Perdida.<br><br><b>N�o perca mais tempo Cadastre-se AGORA!</b><p>
				    	</div>
					</div>
				</div>
				<div class="descricaoCompleta">
					<span id="descCompleta">
        				<h3>Preencha corretamente com seus dados de cadastro</h3>
        				<br>
				        <form target="_parent" method="post" action="login.php">
				        	<h4>informa��es de login</h4>
				        	<table width="100%" cellpadding="2" cellspacing="2" border="0">
				        		<tr>
				        			<td width="150" align="right" valign="top"><span style="margin: 5px;">nome de usu�rio</span></td>
				        			<td><input type="text" value="" name="usuario" id="usuario" class="text"></td>
				        		</tr>
				        		<tr>
				        			<td align="right" valign="top"><span style="margin: 5px;">sua senha</span></td>
				        			<td><input type="password" name="senha" id="senha" class="text"></td>
				        		</tr>
				        	</table>
				        	<h4>dados pessoais</h4>
				        	<table width="100%" cellpadding="2" cellspacing="2" border="0">
				        		<tr>
				        			<td width="150" align="right" valign="top"><span style="margin: 5px;">nome completo</span></td>
				        			<td><input type="text" value="" name="nome" id="nome" class="text"></td>
				        		</tr>
				        		<tr>
				        			<td width="150" align="right" valign="top"><span style="margin: 5px;">cpf</span></td>
				        			<td><input type="text" value="" name="cpf" id="cpf" class="text"></td>
				        		</tr>
				        		<tr>
				        			<td width="150" align="right" valign="top"><span style="margin: 5px;">e-mail</span></td>
				        			<td><input type="text" value="" name="email" id="email" class="text"></td>
				        		</tr>
				        		<tr>
				        			<td width="150" align="right" valign="top"><span style="margin: 5px;">confirme o e-mail</span></td>
				        			<td><input type="text" value="" name="email_confirma" id="email_confirma" class="text"></td>
				        		</tr>
				        		<tr>
				        			<td width="150" align="right" valign="top"><span style="margin: 5px;">telefone contato</span></td>
				        			<td><input type="text" value="" name="tel_contato" id="tel_contato" class="textTel"></td>
				        		</tr>
				        		<tr>
				        			<td width="150" align="right" valign="top"><span style="margin: 5px;">telefone celular</span></td>
				        			<td><input type="text" value="" name="tel_contato" id="tel_contato" class="textTel"></td>
				        		</tr>
				        		<tr>
				        			<td width="150" align="right" valign="top"><span style="margin: 5px;">telefone recado</span></td>
				        			<td><input type="text" value="" name="tel_contato" id="tel_contato" class="textTel"></td>
				        		</tr>
				        	</table>
				        	
				        	<h4>endere�o de cobran�a</h4>
				        	<table width="100%" cellpadding="2" cellspacing="2" border="0">
				        		<tr>
				        			<td width="150" align="right" valign="top"><span style="margin: 5px;">informe seu cep</span></td>
				        			<td><input type="text" value="" name="cep" id="cep" class="textCep" onblur="buscarCEP(this.value); return false;"></td>
				        		</tr>
				        		<tr>
				        			<td width="150" align="right" valign="top"><span style="margin: 5px;">endere�o</span></td>
				        			<td><input type="text" value="" name="endereco1" id="endereco1" class="text"></td>
				        		</tr>
				        		<tr>
				        			<td width="150" align="right" valign="top"><span style="margin: 5px;">n�mero</span></td>
				        			<td><input type="text" value="" name="numero" id="numero" class="textCep"></td>
				        		</tr>
				        		<tr>
				        			<td width="150" align="right" valign="top"><span style="margin: 5px;">complemento</span></td>
				        			<td><input type="text" value="" name="complemento" id="complemento" class="text">
				        			<p class="notes">coloque aqui sobrado, apto, conjunto</p></td>
				        		</tr>
				        		<tr>
				        			<td width="150" align="right" valign="top"><span style="margin: 5px;">bairro</span></td>
				        			<td><input type="text" value="" name="bairro" id="bairro" class="text"></td>
				        		</tr>
				        		<tr>
				        			<td width="150" align="right" valign="top"><span style="margin: 5px;">cidade</span></td>
				        			<td><input type="text" value="" name="cidade" id="cidade" class="text"></td>
				        		</tr>
				        		<tr>
				        			<td width="150" align="right" valign="top"><span style="margin: 5px;">estado</span></td>
				        			<td><input type="text" value="" name="estado" id="estado" class="text"></td>
				        		</tr>
				        		<tr>
				        			<td width="150" align="right" valign="top"><span style="margin: 5px;">pa�s</span></td>
				        			<td><input type="text" value="" name="pais" id="pais" class="text"></td>
				        		</tr>
				        	</table>
				        </form>
				        <br>
					</span>
				</div>
				<br>
			</div>
		</div>
		<div id="footer" class="clearfix">
			<div id="interno">
				<div class="disclamer">
					<h1>Sobre o CompreClick!</h1>
					<p>
						A disclaimer is generally any statement intended to specify or delimit the scope of rights and obligations that may be exercised and enforced by parties in a legally-recognized relationship. In contrast to other terms for legally operative language, the term disclaimer usually implies situations that involve some level of uncertainty, waiver, or risk.

A disclaimer may specify mutually-agreed and privately-arranged terms and conditions as part of a contract; or may specify warnings or expectations to the general public (or some other class of persons) in order to fulfill a duty of care owed to prevent unreasonable risk of harm or injury. Some disclaimers are intended to limit exposure to damages after a harm or injury has already been suffered. Additionally, some kinds of disclaimers may represent a voluntary waiver of a right or obligation that may be owed to the disclaimant.<br><br>O CompreClick! � uma marca registrada. Todos os direitos reservados. 
					</p>
				</div>
				<ul id="menuFooter">
					<li class="tituloFooter"><a href="/">CompreClick</a></li>
					<li><a href="/Blog">Blog</a></li>
					<li><a href="/Forum">F�rum</a></li>
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
					<li class="tituloFooter"><a href="#">F�rum</a></li>
					<li><a href="#">�ltimos posts</a></li>
					<li><a href="#">Concursos</a></li>
					<li><a href="#">Sugest�es</a></li>
					<li><a href="#">Fale o que quiser</a></li>
				</ul>
				<ul id="menuFooter" style="width: 185px;">
					<li class="tituloFooter"><a href="/ComoFunciona">O que � o CompreClick?</a></li>
					<li><a href="#">Perguntas frequentes</a></li>
					<li><a href="#">Seja nosso parceiro</a></li>
					<li><a href="#">Termo de uso</a></li>
					<li><a href="#">Pol�tica de Privacidade</a></li>
				</ul>
			</div>
			<br>
		</div>
	</body>
</html>