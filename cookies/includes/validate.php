<?php
/**
 * Validación de inicio de sesión
 * 
 * @author Pablo
 */

function login($user, $password) {
    return $user == "pablo" and $password == "1234";
}

if (isset($_POST["login"])) {
    $user = $_POST["user"];
    $password = $_POST["password"];
    if (empty($user) or empty($password)) {
        header("Location: index.php");
    } else {
        $login = login($user, $password);
        if (isset($_POST["remember"]) and $login) {
            setcookie("user", $user, time() + 3600);
            setcookie("password", $password, time() + 3600);
        } else {
            setcookie("user", "", time() - 3600);
            setcookie("password", "", time() - 3600);
        }
        echo ($login) ? "Credenciales correctas." : "Credenciales incorrectas.";
    }
}
?>
