<?php
/**
 * Página de administradores
 * 
 * @author Pablo
 */

include "includes/control.php";
if ($_SESSION["profile"] == "admin") {
    echo "Estás en la página de administradores.<br/><br/>";
} else {
    header("Location: index.php");
}
?>
