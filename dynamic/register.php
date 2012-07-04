<?php
require('conectar.php');
require('Seguridad.php');

if($_POST['pass'] == $_POST['rpass'])
	$verifica = true;
if(isset($_POST['user']) && isset($_POST['pass']) && $verifica){
	$usuario = utf8_decode(filtrar($_POST['user']));
	$contrasena = md5(filtrar($_POST['pass']));
	$sentencia = "select * from users where name='$usuario'";
	$consulta = mysql_query($sentencia,$ejemplo) or die(mysql_error());
	$filas = mysql_fetch_assoc($consulta);
	$n_filas = mysql_num_rows($consulta);
	if($n_filas > 0)
		$mensaje = "Usuario duplicado";
	else{
		$sentencia = "insert into users values('$usuario','$contrasena')";

                mysql_query("SET NAME 'utf8'");
                mysql_query("SET CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'");
		$consulta = mysql_query($sentencia,$ejemplo) or die(mysql_error());
		$mensaje = "Usuario Registrado Exitosamente<br />Click en iniciar sesion";
	}

}else{
	$mensaje = "Debe Insertar Todos los Datos";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>Registro MiniTwit</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="estilo.css" rel="stylesheet" type="text/css" media="all" />
	<SCRIPT language="JavaScript">
		function verifica(form){
			var contra = form.pass.value;
			var rcontra = form.rpass.value;
			if(contra != "" && rcontra != "")
			if(contra != rcontra)
				alert("Contrasenas no concuerdan");
		}
	</SCRIPT>
  </head>
  <body>
<div id="login">
<h1>Mini Twit - Login</h1>
	<form action="register.php" method="POST" name="fregister">
   		<p>
                    <LABEL>Usuario</LABEL>
                    <INPUT type="text" name="user" size="15" maxlength="20" align="left" alt="Inserte un nombre de usuario"></p>

		<p>
                    <LABEL>Contraseña</LABEL>
                    <INPUT type="password" name="pass" size="15" maxlength="30" align="left" onchange="verifica(this.form)"></p>

		<p>
                    <LABEL>Repita Contraseña</LABEL>
                    <INPUT type="password" name="rpass" size="15" maxlength="30" align="left" onchange="verifica(this.form)"></p>

                <p><INPUT type="submit" name="register" class="boton" value="Registrar" size="10"></p>
        </form>
	<div class="Mensage"><?=$mensaje?></div>
        <div class="registrar"><A href="index.php">Iniciar Sesion</A></div>
  </div>
  </body>
</html>