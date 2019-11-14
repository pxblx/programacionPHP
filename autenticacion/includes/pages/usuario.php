<?php
/**
 * Página de usuarios
 * 
 * @author Pablo
 */

include("includes/control.php");
if ($_SESSION["profile"] == "usuario" or $_SESSION["profile"] == "alumno" 
    or $_SESSION["profile"] == "profesor" or $_SESSION["profile"] == "admin") {
    echo "Estás en la página de usuarios.<br/><br/>";
} else {
    header("Location: index.php");
}
?>
