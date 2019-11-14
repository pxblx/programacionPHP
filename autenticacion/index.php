<?php
/**
 * Autenticación con perfiles de usuario
 * 
 * @author Pablo
 */

include "config/config.php";
include "includes/sesion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles.css">
    <title><?php echo $TITLE ?></title>
</head>
<body>
<?php
include "includes/cabecera.php";

if (!isset($_GET["page"])) {
    include "includes/pages/login.php";
} else if ($_GET["page"] == "privado") {
    include "includes/pages/privado.php";
}  else if ($_GET["page"] == "opc_usuarios") {
    include "includes/pages/usuario.php";
} else if ($_GET["page"] == "opc_alumnos") {
    include "includes/pages/alumno.php";
} else if ($_GET["page"] == "opc_profesores") {
    include "includes/pages/profesor.php";
} else if ($_GET["page"] == "opc_administradores") {
    include "includes/pages/admin.php";
} else if ($_GET["page"] == "logout") {
    include "includes/logout.php";
} else {
    include "includes/pages/login.php";
}
?>
</body>
</html>
