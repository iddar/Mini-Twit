<?PHP 
session_start();
if($_SESSION['access']!=true)
header('location:index.php');
require('conectar.php');

include("view/twit.tlp.php");
?>