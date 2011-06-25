<?php
	include_once("constantes.php");
	require_once(ROOT."includes/loader.php");
	
	if($_POST) {

		$objeto = new Usuario();
		
		foreach ($_POST as $atributo => $valor) {
			$campo = "set".ucfirst($atributo);
			$objeto->$campo(strip_tags($valor));
		}
		
		try {
			$usuarioDAO = new UsuarioDAO();
			$usuarioDAO->inserirUsuario($objeto);
		} catch (Exception $e) {
			ECHO $e->getMessage();
		}
		
		
	} else {
		echo "YYYY";
	}
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
				  	$('#endereco').val($(data).find('logradouro').text());
				  	$('#bairro').val($(data).find('bairro').text());
				  	$('#estado').val($(data).find('uf').text());
				  	$('#cidade').val($(data).find('cidade').text());
				  	$('#numero').focus();
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
				        	<h2>Você não perde por esperar!</h2>
				        	<p>Fazendo o seu cadastro, isto facilitara no momento de conclusão de sua compra, preenchendo os dados rápido. Isso tudo para que você não perca nem um segundo para realizar a sua compra.<br><br>Existem 3 coisas que não voltam atrás são elas, uma flecha lançada, uma palavra dita, e uma Oportunidade Perdida.<br><br><b>Não perca mais tempo Cadastre-se AGORA!</b><p>
				    	</div>
					</div>
				</div>
				<div class="descricaoCompleta">
					<span id="descCompleta">
        				<h3>Preencha corretamente com seus dados de cadastro</h3>
        				<br>
				        <form target="_parent" method="post" action="cadastro.php">
				        	<h4>informações de login</h4>
				        	<table width="100%" cellpadding="2" cellspacing="2" border="0">
				        		<tr>
				        			<td width="150" align="right" valign="top"><span style="margin: 5px;">nome de usuário</span></td>
				        			<td><input type="text" value="" name="login" id="login" class="text"></td>
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
				        			<td><input type="text" value="" name="nome_completo" id="nome_completo" class="text"></td>
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
				        			<td><input type="text" value="" name="telefone_1" id="telefone_1" class="textTel"></td>
				        		</tr>
				        		<tr>
				        			<td width="150" align="right" valign="top"><span style="margin: 5px;">telefone celular</span></td>
				        			<td><input type="text" value="" name="telefone_2" id="telefone_2" class="textTel"></td>
				        		</tr>
				        	</table>
				        	
				        	<h4>endereço de cobrança</h4>
				        	<table width="100%" cellpadding="2" cellspacing="2" border="0">
				        		<tr>
				        			<td width="150" align="right" valign="top"><span style="margin: 5px;">informe seu cep</span></td>
				        			<td><input type="text" value="" name="cep" id="cep" class="textCep" onblur="buscarCEP(this.value); return false;"></td>
				        		</tr>
				        		<tr>
				        			<td width="150" align="right" valign="top"><span style="margin: 5px;">endereço</span></td>
				        			<td><input type="text" value="" name="endereco" id="endereco" class="text"></td>
				        		</tr>
				        		<tr>
				        			<td width="150" align="right" valign="top"><span style="margin: 5px;">número</span></td>
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
				        		<td colspan="2"><span style="margin: 20px; font-weight: bold; font-size: 11px; float: left">Desejo ser informado sobre as novas ofertas! <input type="checkbox" checked value="1" name="news" id="news"></span></td>
				        		</tr>
				        		<tr>
				        			<td width="150" align="right" valign="top"></td>
				        			<td><input type="submit" value="Rápido crie logo meu cadastro!" class="botao"></td>
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