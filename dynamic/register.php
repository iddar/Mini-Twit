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
include("view/register.tlp.php");
?>
