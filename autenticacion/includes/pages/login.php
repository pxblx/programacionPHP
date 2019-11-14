<?php
/**
 * Página de inicio de sesión
 * 
 * @author Pablo
 */

$error_msg = "";

function login($users, $user, $password) {
    for ($i = 0; $i < count($users); $i++) {
        if ($users[$i]["user"] == $user and $users[$i]["password"] == $password) {
            $_SESSION["user"] = $users[$i]["user"];
            $_SESSION["profile"] = $users[$i]["profile"];
            return true;
        }
    }
    return false;
}

if (isset($_POST["login"])) {
    $user = $_POST["user"];
    $password = $_POST["password"];
    if (empty($user) or empty($password)) {
        $error_msg = "<font color=\"red\"> Rellena todos los campos.</font>";
    } else {
        if (login($users, $user, $password)) {
            $_SESSION["logged"] = true;
            $_SESSION["user"] = $user;
            header("Location: index.php");
        } else {
            $error_msg = "<font color=\"red\"> Usuario o contraseña incorrectos.</font>";
        }
    }
}

if ($_SESSION["logged"]) {
    echo "Has iniciado sesión como ".$_SESSION["user"]." (".$_SESSION["profile"].").<br/><br/>";
} else {
    echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\">";
    echo "<label for=\"user\">Usuario: </label><input type=\"text\" name=\"user\"><br/><br/>";
    echo "<label for=\"password\">Contraseña: </label><input type=\"password\" name=\"password\"><br/><br/>";
    echo "<input type=\"submit\" name=\"login\" value=\"Iniciar sesión\">".$error_msg;
    echo "</form>";
}
?>
