<?php
/**
 * Página de alumnos
 * 
 * @author Pablo
 */

include "includes/control.php";
if ($_SESSION["profile"] == "alumno" or $_SESSION["profile"] == "profesor" or $_SESSION["profile"] == "admin") {
    echo "Estás en la página de alumnos.<br/><br/>";
} else {
    header("Location: index.php");
}
?>
