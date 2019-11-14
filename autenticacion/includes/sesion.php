<?php
/**
 * Control de sesión
 * 
 * @author Pablo
 */

session_start();
if (!isset($_SESSION["logged"])) {
    $_SESSION["logged"] = false;
    $_SESSION["user"] = "";
    $_SESSION["profile"] = "usuario";
}
?>
