<?php
/**
 * Cierre de sesión
 * 
 * @author Pablo
 */

session_destroy();
header("Location: index.php");
?>
