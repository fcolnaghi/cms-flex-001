<?php 
	require_once("../constantes.php");
	require_once(ROOT."includes/loader.php");
	
	$label = null;
	
	$usuario = new UsuarioDAO();

	if(isset($_POST['login']) && $_POST['login'] != "" && $_POST['senha'] != "") {
		if($usuario->login($_POST['login'],$_POST['senha'])) {
			header("Location: principal.php");
		}
	} else {
		$logado = getUsuarioLogado();
				
		if($logado) {
			header("Location: principal.php");
		}
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Web Content Manager</title>
<!--// FOLLOWING SCRIPT IS FOR PNG FIX IE5.5/IE6-->
<!--[if lt IE 7]>
<script defer type="text/javascript" src="js/pngfix.js"></script> 
<![endif]-->
<!--//  Styles starts -->
<link href="<?=ROOT?>css/login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?=ROOT?>css/ui-lightness/jquery-ui-1.8.5.custom.css" type="text/css" media="all" />
<script src="<?=ROOT?>js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="<?=ROOT?>js/jquery-ui-1.8.5.custom.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=ROOT?>js/form.js"></script>
</head>
<body>
<div id="logo"></div>
<div id="conteudo">
<div class="box">
  <div class="welcome" id="welcometitle">Bem vindo ao WCM</div>
  <div id="fields">
  	<form method="post" onsubmit="validaForm(this); return false;">
    <table width="333">
      <tr>
        <td width="79" height="35"><span class="login">Usu&aacute;rio</span></td>
        <td width="244" height="35"><label>
            <input name="login" type="text" class="fields requerido" title="Usu�rio" id="username" size="30" />
            <!--//  Campo usuario  -->
          </label></td>
      </tr>
      <tr>
        <td height="35"><span class="login">Senha</span></td>
        <td height="35"><input name="senha" type="password" title="Senha" class="fields requerido" id="password" size="30" /></td>
        <!--//  Campo senha -->
      </tr>
      <tr>
        <td height="65">&nbsp;</td>
        <td height="65" valign="middle"><label>
          <input name="button" type="submit" class="button" id="button" value="ENTRAR" />
        </label></td>
      </tr>
    </table>
    </form>
  </div>
  <div class="login" id="lostpassword"><a href="#">Esqueceu sua senha?</a></div>
</div>
</div>
<div style="display: none" title="" id="dialog">
	<p></p>
</div>
<?php 
if(isset($_SESSION['type'])) {
?>
	<script>showError('<?php $label->getTexto("erro.login.titulo") ?>','<?=$_SESSION['message'];?>');</script>
<?php 
	session_destroy();
}
?>
</body>
</html>

