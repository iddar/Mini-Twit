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
require('dynamic/conectar.php');
require('dynamic/Seguridad.php');

if(isset($_POST['user']) && isset($_POST['pass'])){
    /**
     * Se combierte a UTF-8 los datos del usuario
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

/** Incluimos la vista */
include("view/base.tlp.php");
?>
