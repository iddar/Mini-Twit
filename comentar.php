<?php
session_start();
$usuario = $_SESSION['user'];
require('conectar.php');
require('Seguridad.php');

if(isset($_POST['comment'])){
	$comentario = $_POST['comment'];
	if(strlen($comentario) < 1023 and strlen($comentario) > 0){
	$fecha = date("Y-m-d");
	$sentencia = "insert into comments(name,u_comment,fecha) values('$usuario','$comentario','$fecha')";
	$consulta = mysql_query($sentencia,$ejemplo) or die(mysql_error());
	header("location: twit.php");}
	else{echo "Estupido!!!";}
}else{
	$mensaje = "No se publico su comentario";
}
?>
