<?php
/**
 * Página de profesores
 * 
 * @author Pablo
 */

include "includes/control.php";
if ($_SESSION["profile"] == "profesor" or $_SESSION["profile"] == "admin") {
    echo "Estás en la página de profesores.<br/><br/>";
} else {
    header("Location: index.php");
}
?>
