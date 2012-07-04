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