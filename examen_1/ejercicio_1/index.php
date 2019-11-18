<?php
/**
 * Examen de la unidad 1
 * Ejercicio 1
 * 
 * @author Pablo
 */

// Array de datos
$datos = array (
    "DWES" => array ("nombre" => "Desarrollo Web en Entorno Servidor",
                    "profesor" => "José Aguilera",
                    "horario" => array (array ("dia" => "Lunes", "hora" => "3ª"),
                                        array ("dia" => "Lunes", "hora" => "4ª"),
                                        array ("dia" => "Martes", "hora" => "5ª"),
                                        array ("dia" => "Martes", "hora" => "6ª"),
                                        array ("dia" => "Jueves", "hora" => "3ª"),
                                        array ("dia" => "Jueves", "hora" => "4ª"),
                                        array ("dia" => "Viernes", "hora" => "3ª"),
                                        array ("dia" => "Viernes", "hora" => "4ª"))),
    "DWEC" => array ("nombre" => "Desarrollo Web en Entorno Cliente",
                    "profesor" => "Lourdes Magarín",
                    "horario" => array (array ("dia" => "Lunes", "hora" => "1ª"),
                                        array ("dia" => "Lunes", "hora" => "2ª"),
                                        array ("dia" => "Miércoles", "hora" => "4ª"),
                                        array ("dia" => "Miércoles", "hora" => "5ª"),
                                        array ("dia" => "Viernes", "hora" => "5ª"),
                                        array ("dia" => "Viernes", "hora" => "6ª"))),
    "HLC" => array ("nombre" => "Android",
                    "profesor" => "José Aguilera",
                    "horario" => array (array ("dia" => "Martes", "hora" => "3ª"),
                                        array ("dia" => "Martes", "hora" => "4ª"),
                                        array ("dia" => "Miércoles", "hora" => "6ª"))),
    "DAW" => array ("nombre" => "Despliegue de Aplicaciones Web",
                    "profesor" => "Mª Carmen Tripiana",
                    "horario" => array (array ("dia" => "Miércoles", "hora" => "3ª"),
                                        array ("dia" => "Jueves", "hora" => "5ª"),
                                        array ("dia" => "Jueves", "hora" => "6ª"))),
    "DIW" => array ("nombre" => "Diseño de Interfaces Web",
                    "profesor" => "Jaime Rabasco",
                    "horario" => array (array ("dia" => "Lunes", "hora" => "5ª"),
                                        array ("dia" => "Lunes", "hora" => "6ª"),
                                        array ("dia" => "Jueves", "hora" => "1ª"),
                                        array ("dia" => "Jueves", "hora" => "2ª"),
                                        array ("dia" => "Martes", "hora" => "1ª"),
                                        array ("dia" => "Martes", "hora" => "2ª"))),
    "EIE" => array ("nombre" => "Empresa e Iniciativa Emprendedora",
                    "profesor" => "Mª Gema Sánchez",
                    "horario" => array (array ("dia" => "Miércoles", "hora" => "1ª"),
                                        array ("dia" => "Miércoles", "hora" => "2ª"),
                                        array ("dia" => "Viernes", "hora" => "1ª"),
                                        array ("dia" => "Viernes", "hora" => "2ª")))
);

/**
 * Devolver módulo impartido según el día de la semana y la hora
 * 
 * @param datos Array de datos
 * @param dia_semana Día de la semana
 * @param hora Hora del día
 * @return string Módulos impartido
 */
function modulo_dia_hora($datos, $dia_semana, $hora_dia) {
    foreach ($datos as $k1 => $v1) {
        foreach ($v1 as $k2 => $v2) {
            if ($k2 == "horario") {
                foreach ($v2 as $k3 => $v3) {
                    if ($v3["dia"] == $dia_semana and $v3["hora"] == $hora_dia) {
                        return $k1;
                    }
                }
            }
        }
    }
}

/**
 * Devolver el día de la semana según el número
 * 
 * @param dia_semana Número del día de la semana
 * @return string Día de la semana
 */
function dia_semana_nombre($dia_semana) {
    switch ($dia_semana) {
        case 1:
            return "Lunes";
        case 2:
            return "Martes";
        case 3:
            return "Miércoles";
        case 4:
            return "Jueves";
        case 5:
            return "Viernes";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Pablo">
    <link rel="stylesheet" href="css/styles.css">
    <title>Horario 2º DAW 2019/2020</title>
</head>
<body>
    <h1>Horario 2º DAW 2019/2020</h1><hr/><br/><div id="tablas">
    <?php
    // Mostrar la tabla del horario
    echo "<table id=\"horario\">";
    echo "<tr>";
    for ($c = 1; $c <= 5; $c++) {
        echo "<td class=\"titulo\"><b>".dia_semana_nombre($c)."</b></td>";
    }
    echo "</tr>";
    for ($f = 1; $f <= 6; $f++) {
        echo "<tr>";
        for ($c = 1; $c <= 5; $c++) {
            $modulo = modulo_dia_hora($datos, dia_semana_nombre($c), ($f."ª"));
            echo "<td class=\"".$modulo."\">".$modulo."</td>";
        }
        echo "</tr>";
    }
    echo "</table>"
    ?>
    <br/>
    <?php
    // Mostrar la leyenda
    echo "<table id=\"leyenda\">";
    echo "<tr><td class=\"titulo\" colspan=\"2\"><b>Leyenda</b></td></tr>";
    foreach ($datos as $k1 => $v1) {
        echo "<tr><td>".$datos[$k1]["nombre"]." — ".$datos[$k1]["profesor"]."</td><td class=\"".$k1."\">".$k1."</td></tr>";
    }
    echo "</table>";
    ?>
    </div>
</body>
</html>
