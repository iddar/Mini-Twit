<?php
	# Esta es la conexion a la base de datos
	$conexion = mysql_connect($hostname, $username, $password);
	mysql_select_db($database,$conexion);
	if (!$ejemplo) 
	die("Access Denied!"); 
	if(!$database_ejemplo)
	die("Error en la Base de Datos");
?>
