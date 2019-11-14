<?php
// Abrir sesión
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Pablo">
    <link rel="stylesheet" href="css/styles.css">
    <title>Ejercicio con sesiones</title>
</head>
<body>
    <table><tr><td><img src="img/sesiones.png" height="50" width="50"></td><td><h1>Ejercicio con sesiones</h1></td></tr></table><hr/><br/>
    <?php
    // Variables iniciales
    $procesar_formulario = false;
    $msg_error = "";
    $fecha = "";
    $tarea = "";

    // Variables de sesión
    if (!isset($_SESSION["tareas"])) {
        $_SESSION["tareas"] = array();
    }

    // Validación
    if (isset($_POST["enviar"])) {
        $procesar_formulario = true;
        $fecha = $_POST["fecha"];
        $tarea = $_POST["tarea"];
        if (empty($fecha) or empty($tarea)) {
            $msg_error = "<font color=\"red\">   *Este campo no puede estar vacío</font>";
            $procesar_formulario = false;
        }
    }
    ?>
    <form action="index.php" method="POST">
        <label for="fecha">Fecha: </label><input type="text" name="fecha" value=<?php echo "\"".$fecha."\"" ?>><?php echo $msg_error ?><br/><br/>
        <label for="tarea">Tarea: </label><input type="text" name="tarea" value=<?php echo "\"".$tarea."\"" ?>><?php echo $msg_error ?><br/><br/>
        <input type="submit" id="enviar" name="enviar" value="Enviar"><br/><br/>
    </form>
    <?php
    // Procesar formulario
    if ($procesar_formulario) {
        array_push($_SESSION["tareas"], array("fecha" => $fecha, "tarea" => $tarea));
        foreach($_SESSION["tareas"] as $tarea) {
            echo $tarea["fecha"]." -> ".$tarea["tarea"]."</br>";
        }
    }
    ?>
</body>
</html>
