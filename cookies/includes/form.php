<?php
/**
 * Formulario de inicio de sesión
 * 
 * @author Pablo
 */

if (!isset($_POST["login"])) {
    echo "<form action=\"".$_SERVER["PHP_SELF"]."\" method=\"POST\">";
    echo "<label for=\"user\">Usuario: </label><input type=\"text\" name=\"user\" value=\"".$user."\"><br/><br/>";
    echo "<label for=\"password\">Contraseña: </label><input type=\"password\" name=\"password\" value=\"".$password."\"><br/><br/>";
    echo "<input type=\"submit\" id=\"login\" name=\"login\" value=\"Iniciar sesión\"><input type=\"checkbox\" name=\"remember\" checked><label for=\"remember\">Recordar contraseña.</label><br/><br/>";
    echo "</form>";
}
?>
