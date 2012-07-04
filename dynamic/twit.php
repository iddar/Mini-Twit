<?PHP 
session_start();
if($_SESSION['access']!=true)
header('location:index.php');
require('conectar.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Mi primera App</title>
        <link href="estilo.css" rel="stylesheet" type="text/css" media="all" />

    </head>
    <body>
<?php
$sentencia = "select * from comments order by id desc limit 10";
$consulta = mysql_query($sentencia,$ejemplo) or die(mysql_error());
//$filas = mysql_fetch_assoc($consulta);
$n_filas = mysql_num_rows($consulta);
?>
        <div id="sitio">
            <div id="cuerpo">
                <div id="formulario">
                    <h2>¿Que estas Programando?</h2>
                    <form action="comentar.php" method="post">
                        <fieldset>
                            <textarea name="comment" rows="2" cols="80"></textarea>
                            <p><input type="submit" value="Enviar" /></p>
                        </fieldset>
                    </form>
                </div>
                <div id="comentarios">
                    <h3>Time Line</h3>
                    <?php while ($filas = mysql_fetch_assoc($consulta)): ?>
                        <div class="comentario">
                            <p id="autor">Usuario: <?php echo utf8_encode($filas['name']);?> <span>Publicado: <?php echo $filas['fecha'];?></span></p>
                        <p><?php echo $filas['u_comment'];?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div id="bar">
                <div id="user">
                    <img src="avatar.png" alt="Avatar del usuario" />
                    <h3><?php echo $_SESSION['user'];?></h3>
                    <p> <a href="salir.php">Salir</a></p>
                </div>
            </div>
        </div>
    </body>
</html>