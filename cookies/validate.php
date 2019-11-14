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
    if (isset($_POST["login"])) {
        $user = $_POST["user"];
        $password = $_POST["password"];
        if ($user == "" or $password == "") {
            header("Location: index.php");
        } else {
            if (isset($_POST["remember"])) {
                setcookie("user", $user, time() + 3600);
                setcookie("password", $password, time() + 3600);
            }
            echo ($user == "pablo" and $password == "1234") ? "Has iniciado sesión." : "Credenciales incorrectas.";
        }
    } else {
        echo "Error.";
    }
    ?>
</body>
</html>
