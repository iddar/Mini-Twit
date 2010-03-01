<?php 
session_start();
if($_SESSION['access']==true)
header("location: twit.php"); ?>

<?php 
if($_POST['conect'] && $par==false){
	echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
	$par=!$par;
}
?>
<?php
require('conectar.php');
require('Seguridad.php');

if(isset($_POST['user']) && isset($_POST['pass'])){
    /**
     * Se combierte a UTF los datos del usuario
    */
	$usuario = utf8_decode(filtrar($_POST['user']));
	$contrasena = md5(filtrar($_POST['pass']));
	$sentencia = "select * from users where name='$usuario'";
	$consulta = mysql_query($sentencia,$ejemplo) or die(mysql_error());
	$filas = mysql_fetch_assoc($consulta);
	$n_filas = mysql_num_rows($consulta);
	if($n_filas > 0){
		if($filas['pass'] == $contrasena){
		$mensaje = "Usuario Correcto - Redireccionando";
		$_SESSION['access']=true;
		$_SESSION['user']=utf8_encode($usuario);
		}else
		$mensaje = "Usuario incorrecto";
	}else
		$mensaje = "Usuario no Registrado<br />Crea una cuenta <a href='index.php'>aqui</a>";
}else{
	$mensaje = "Debe Insertar Todos los Datos";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        
        <title>Mini_Twit Index</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="estilo.css" rel="stylesheet" type="text/css" media="all" />
    </head>

    <body>
        <div id="login">
        <h1>Mini Twit - Login</h1>
        <form action="index.php" method="POST">
            <fieldset>
   		<p><LABEL>Usuario</LABEL>
		<INPUT type="text" name="user" size="15" maxlength="20" align="left"></p>

                <p><LABEL>Contrase&ntilde;a</LABEL>
                <INPUT type="password" name="pass" size="15" maxlength="30" align="left"></p>

                <p><INPUT type="submit" name="conect" value="Conectar" class="boton" size="10"></p>
            </fieldset>
        </form>


        <div class="Mensage"><?=$mensaje?></div>
        <div class="registrar"><a href="register.php">Registrate</a></div>

    </div>
    </body>
</html>