<?php
/**
 * Capa de control
 * 
 * @author Pablo
 */

if (!$_SESSION["logged"]) {
    header("Location: index.php");
}
?>
