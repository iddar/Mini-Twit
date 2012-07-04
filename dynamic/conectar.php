<?php
# Esta es la conexion a la base de datos
$hostname_ejemplo = "localhost";
$database_ejemplo = "mini_twit";
$username_ejemplo = "root";
$password_ejemplo = "m3gu5ta";
$ejemplo = mysql_connect($hostname_ejemplo, $username_ejemplo, $password_ejemplo );
mysql_select_db($database_ejemplo,$ejemplo);
if (!$ejemplo) 
die("Access Denied!"); 
if(!$database_ejemplo)
die("Error en la Base de Datos");
?>
