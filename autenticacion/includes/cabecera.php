<?php
/**
 * Cabecera de página con menú de navegación
 * 
 * @author Pablo
 */

echo "<table><tr><td><img src=\"img/sesiones.png\" height=\"50\" width=\"50\"></td><td><h1>".$TITLE."</h1></td></tr></table><hr/>";
echo "<a href=\"index.php\">Inicio</a> ";
if ($_SESSION["logged"]) {
    for ($i = 0; $i < count($options[$_SESSION["profile"]]); $i++) {
        echo " | <a href=\"index.php?page=".$options[$_SESSION["profile"]][$i]."\">".$options[$_SESSION["profile"]][$i]."</a>";
    }
    echo " | <a href=\"index.php?page=privado\">Área privada</a>";
    echo " | <a href=\"index.php?page=logout\">Cerrar sesión</a>";
}
echo "<hr/><br/>";
?>
