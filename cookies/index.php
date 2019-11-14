<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Pablo">
    <link rel="stylesheet" href="css/styles.css">
    <title>Ejercicio con cookies</title>
</head>
<body>
    <table><tr><td><img src="img/cookie.png" height="50" width="50"></td><td><h1>Ejercicio con cookies</h1></td></tr></table><hr/><br/>
    <?php
    if (isset($_COOKIE["user"]) and isset($_COOKIE["password"])) {
        $user = $_COOKIE["user"];
        $password = $_COOKIE["password"];
    } else {
        $user = "";
        $password = "";
    }
    ?>
    <form action="validate.php" method="POST">
        <label for="user">Usuario: </label><input type="text" name="user" value=<?php echo "\"".$user."\"" ?>><br/><br/>
        <label for="password">Contraseña: </label><input type="text" name="password" value=<?php echo "\"".$password."\"" ?>><br/><br/>
        <input type="submit" id="login" name="login" value="Iniciar sesión"><input type="checkbox" name="remember"><label for="remember">Recordar contraseña.</label><br/><br/>
    </form>
</body>
</html>
