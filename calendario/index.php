<?php
/**
 * Generar el calendario del del mes y el año que se pasan por un formulario, con función de
 * añadir tareas
 * 
 * @author Pablo
 */

// Datos de sesión
session_start();
if (!isset($_SESSION["tareas"])) {
    $_SESSION["tareas"] = array();
}

// Array de meses con los días que tienen y sus días festivos
$meses = array(
    "Enero" => array(
        "n_dias" => 31,
        "dias_festivos" => array(1)),
    "Febrero" => array(
        "n_dias" => 28,
        "dias_festivos" => array(28)),
    "Marzo" => array(
        "n_dias" => 31,
        "dias_festivos" => array()),
    "Abril" => array(
        "n_dias" => 30,
        "dias_festivos" => array()),
    "Mayo" => array(
        "n_dias" => 31,
        "dias_festivos" => array(1)),
    "Junio" => array(
        "n_dias" => 30,
        "dias_festivos" => array()),
    "Julio" => array(
        "n_dias" => 30,
        "dias_festivos" => array()),
    "Agosto" => array(
        "n_dias" => 31,
        "dias_festivos" => array(15)),
    "Septiembre" => array(
        "n_dias" => 30,
        "dias_festivos" => array(28)),
    "Octubre" => array(
        "n_dias" => 31,
        "dias_festivos" => array(12)),
    "Noviembre" => array(
        "n_dias" => 30,
        "dias_festivos" => array(1)),
    "Diciembre" => array(
        "n_dias" => 31,
        "dias_festivos" => array(6, 8, 25)));

// Datos de la fecha actual
$mes_actual = date("n");
$anyo_actual = date("Y");

// Cambiar la fecha si ya está definida
if (isset($_POST["actualizar"])) {
    $mes_actual = array_search($_POST["mes"], array_keys($meses)) + 1;
    $anyo_actual = $_POST["anyo"];
}
if (isset($_GET["mes"]) and isset($_GET["anyo"])) {
    $mes_actual = $_GET["mes"];
    $anyo_actual = $_GET["anyo"];
}
if (isset($_POST["tarea_add"])) {
    $mes_actual = $_POST["tarea_mes"];
    $anyo_actual = $_POST["tarea_anyo"];
}

// Mensaje control de errores
$error_tarea = " ";

// Devolver el nombre del mes a partir del número
function mes_nombre($meses, $mes) {
    return array_keys($meses)[$mes-1];
}

// Generar string de fecha
function fecha_string($dia, $mes, $anyo) {
    return str_pad($dia, 2, "0", STR_PAD_LEFT)."/".str_pad($mes, 2, "0", STR_PAD_LEFT)."/".$anyo;
}

// Imprimir el calendario
function imprimir_calendario($mes, $anyo, $meses) {
    // Obtener el nombre del mes
    $mes_nombre = mes_nombre($meses, $mes);

    // Obtener el día en el que empieza la semana
    $semana = date("N", strtotime($anyo."-".$mes."-"."01"));

    // Modificar los días de febrero según el año
    if ($mes_nombre == "Febrero") {
        $meses["Febrero"]["n_dias"] = cal_days_in_month(CAL_GREGORIAN, 2, $anyo);
    }

    // Obtener el mes de semana santa y el domingo de pascua
    $mes_ss = date("n", easter_date($anyo));
    $domingo_pascua = date("j", easter_date($anyo));
    
    // Abrir tabla del calendario
    echo "Calendario de <b>".strtolower($mes_nombre)."</b> de <b>".$anyo."</b>:<br/><br/>";
    echo "<table border=\"1\" cellpadding=\"10\">
    <tr>
        <td align=\"center\" bgcolor=\"#e3e3e3\"><b>L</b></td>
        <td align=\"center\" bgcolor=\"#e3e3e3\"><b>M</b></td>
        <td align=\"center\" bgcolor=\"#e3e3e3\"><b>X</b></td>
        <td align=\"center\" bgcolor=\"#e3e3e3\"><b>J</b></td>
        <td align=\"center\" bgcolor=\"#e3e3e3\"><b>V</b></td>
        <td align=\"center\" bgcolor=\"#e3e3e3\"><b>S</b></td>
        <td align=\"center\" bgcolor=\"#e3e3e3\"><b>D</b></td>
    </tr><tr>";

    // Añadir espacios en blanco al principio
    for ($i = 0; $i < $semana - 1; $i++) { 
        echo "<td align=\"center\"> </td>";
    }

    // Rellenar los días del mes
    for ($i = 1; $i <= $meses[$mes_nombre]["n_dias"]; $i++) {
        $enlace = "<a href=\"".$_SERVER['PHP_SELF']."?dia=".$i."&mes=".$mes."&anyo=".$anyo."\">".$i."</a>"; 
        if ($i."/".$mes."/".$anyo == date("j/n/Y")) {
            echo "<td align=\"center\" bgcolor=\"#bffcc6\">".$enlace."</td>";
        } else if (in_array($i, $meses[$mes_nombre]["dias_festivos"]) or $semana == 7 or ($mes == $mes_ss and ($i == $domingo_pascua-3 or $i == $domingo_pascua-2))) {
            echo "<td align=\"center\" bgcolor=\"#ffabab\">".$enlace."</td>";
        } else {
            echo "<td align=\"center\">".$enlace."</td>";
        }
        if ($semana == 7) {
            echo "</tr><tr>";
            $semana = 0;
        }
        $semana++;
    }

    // Añadir espacios en blanco al final
    if ($semana != 1) {
        for ($i = 0; $i < 7 - ($semana - 1); $i++) { 
            echo "<td align=\"center\"> </td>";
        }
    }

    // Cerrar tabla del calendario
    echo "</table>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendario con sesiones</title>
</head>
<body>
    <h1>Calendario</h1><hr/><br/>
    <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="POST">
        <table cellpadding=10>
            <tr>
                <td>
                    <label for="mes">Mes: </label><select name="mes">
                    <?php
                    foreach ($meses as $clave => $valor) {
                        echo ($clave == mes_nombre($meses, $mes_actual)) ?
                            "<option value=\"".$clave."\" selected>".$clave."</option>"
                            : "<option value=\"".$clave."\">".$clave."</option>";
                    }
                    ?>
                    </select><br/><br/>
                    <label for="anyo">Año: </label><select name="anyo">
                    <?php
                    for ($i = $anyo_actual + 50; $i >= $anyo_actual - 50; $i--) {
                        echo ($i == $anyo_actual) ?
                            "<option value=\"".$i."\" selected>".$i."</option>"
                            : "<option value=\"".$i."\">".$i."</option>";
                    }
                    ?>
                    </select>
                </td>
                <td>
                    <input type="submit" name="actualizar" value="Actualizar">
                </td>
            </tr>
        </table>
    </form>
<br/>
<?php
// Imprimir el calendario
imprimir_calendario($mes_actual, $anyo_actual, $meses);

// Formulario para añadir tarea
if ((isset($_GET["dia"]) and isset($_GET["mes"]) and isset($_GET["anyo"])) or (isset($_POST["tarea_add"]))) {
    // Recoger variables
    if (!isset($_POST["tarea_add"])) {
        $dia_actual = $_GET["dia"];
        $mes_actual = $_GET["mes"];
        $anyo_actual = $_GET["anyo"];
    } else {
        $dia_actual = $_POST["tarea_dia"];
        $mes_actual = $_POST["tarea_mes"];
        $anyo_actual = $_POST["tarea_anyo"];

        // Control de errores
        if (empty($_POST["tarea_descripcion"])) {
            $error_tarea = "<font color=\"red\"> La tarea no puede estar en blanco. </font>";
        } else {
            $_SESSION["tareas"][fecha_string($dia_actual, $mes_actual, $anyo_actual)][] = $_POST["tarea_descripcion"];
        }
    }

    $fecha_string = fecha_string($dia_actual, $mes_actual, $anyo_actual);

    // Formulario
    echo "</br>Día seleccionado: <b>".$fecha_string."</b></br></br>";
    echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\">";
    echo "<label for=\"tarea\">Tarea: </label><input type=\"text\" name=\"tarea_descripcion\">".$error_tarea;
    echo "<input type=\"hidden\" name=\"tarea_dia\" value=\"".$dia_actual."\">";
    echo "<input type=\"hidden\" name=\"tarea_mes\" value=\"".$mes_actual."\">";
    echo "<input type=\"hidden\" name=\"tarea_anyo\" value=\"".$anyo_actual."\">";
    echo "<input type=\"submit\" name=\"tarea_add\" value=\"Añadir\">";
    echo "</form>";
    echo "</br>";

    // Mostrar lista de tareas
    if (isset($_SESSION["tareas"][$fecha_string])) {
        echo "Lista de tareas:";
        echo "<ul>";
        foreach($_SESSION["tareas"][$fecha_string] as $tarea) {
            echo "<li>".$tarea."</li>";
        }
        echo "</ul>";
    } else {
        echo "No hay tareas programadas.";
    }
}
?>
</body>
</html>
