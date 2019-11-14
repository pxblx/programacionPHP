<?php
/**
 * Proyecto 1
 * Juego de verbos irregulares en inglés
 * 
 * @author Pablo
 */

// Array de verbos irregulares
$verbos = array(
    array(
        "awake",
        "awoke",
        "awoken",
        "despertar"
    ),
    array(
        "begin",
        "began",
        "begun",
        "empezar"
    ),
    array(
        "break",
        "broke",
        "broken",
        "romper"
    ),
    array(
        "build",
        "built",
        "built",
        "construir"
    ),
    array(
        "buy",
        "bought",
        "bought",
        "comprar"
    ),
    array(
        "come",
        "came",
        "come",
        "venir"
    ),
    array(
        "do",
        "did",
        "done",
        "hacer"
    ),
    array(
        "draw",
        "drew",
        "drawn",
        "dibujar"
    ),
    array(
        "find",
        "found",
        "found",
        "encontrar"
    ),
    array(
        "fly",
        "flew",
        "flown",
        "volar"
    ),
    array(
        "forgive",
        "forgave",
        "forgiven",
        "perdonar"
    ),
    array(
        "go",
        "went",
        "gone",
        "ir"
    ),
    array(
        "lose",
        "lost",
        "lost",
        "perder"
    ),
    array(
        "ring",
        "rang",
        "rung",
        "sonar"
    ),
    array(
        "shake",
        "shook",
        "shaken",
        "agitar"
    )
);

/**
 * Generar array de aleatorios
 * 
 * @param size Número de elementos
 * @param min Límite mínimo de aleatorios
 * @param max Límite máximo de aleatorios
 */
function array_aleatorios($size, $min, $max) {
    $aleatorios = array();
    while (count($aleatorios) < $size) {
        $aleatorio = rand($min, $max);
        while (in_array($aleatorio, $aleatorios)) {
            $aleatorio = rand($min, $max);
        }
        array_push($aleatorios, $aleatorio);
    }
    return $aleatorios;
}

// Inicio
if (!isset($_POST["corregir"])) {
    $aleatorios = array();
    $clases = array();
    $valores = array();

    $aciertos = 0;
    $fallos = 0;

    $aleatorios = array_aleatorios(10, 0, 14);
    foreach ($aleatorios as $id_verbo) {
        $hueco_relleno = rand(0, 3);
        for ($hueco = 0; $hueco <= 3; $hueco++) {
            if ($hueco != $hueco_relleno) {
                $clases[$id_verbo][$hueco] = "";
                $valores[$id_verbo][$hueco] = "";
            } else {
                $clases[$id_verbo][$hueco] = "";
                $valores[$id_verbo][$hueco] = $verbos[$id_verbo][$hueco];
            }
        }
    }
} else {
    $aciertos = $_POST["aciertos"];
    print_r($aciertos);
    echo("<br/>");
    $fallos = $_POST["fallos"];
    print_r($fallos);
    echo("<br/>");

    $aleatorios = $_POST["aleatorios"];
    print_r($aleatorios);
    echo("<br/>");
    $clases = $_POST["clases"];
    print_r($clases);
    echo("<br/>");
    $valores = $_POST["huecos"];
    print_r($valores);
    echo("<br/>");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, generar_tablaial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Pablo">
    <link rel="stylesheet"  href="css/styles.css">
    <title>Verbos irregulares</title>
</head>
<body>
    <h1>Verbos irregulares</h1><hr/><br/>
    <table class="tabla_resultados">
        <tr class="tabla_resultados">
            <td class="tabla_resultados"><b>Número de aciertos: </b><?php echo $aciertos ?></td>
            <td class="tabla_resultados"><b>Número de fallos: </b><?php echo $fallos ?></td>
        </tr>
    </table><br/>
    <?php
    echo "<form action=\"".$_SERVER["PHP_SELF"]."\" method=\"POST\">";
    echo "<input type=\"hidden\" name=\"aciertos\" value=\"".$aciertos."\">";
    echo "<input type=\"hidden\" name=\"fallos\" value=\"".$fallos."\">";
    echo "<table class=\"tabla_verbos\">";
    foreach ($aleatorios as $id_verbo) {
        echo "<tr class=\"tabla_verbos\">";
        for ($hueco = 0; $hueco <= 3; $hueco++) {
            if ($valores[$id_verbo][$hueco] == "") {
                echo "<td class=\"tabla_verbos\"><input type=\"text\" class=\"".$clases[$id_verbo][$hueco]."\" name=\"huecos[".$id_verbo."][".$hueco."]\" value=\"".$valores[$id_verbo][$hueco]."\"></td>";
            } else {
                echo "<td class=\"tabla_verbos\">".$verbos[$id_verbo][$hueco]."</td>";
                echo "<input type=\"hidden\" name=\"huecos[".$id_verbo."][".$hueco."]\" value=\"".$verbos[$id_verbo][$hueco]."\"";
            }
            echo "<input type=\"hidden\" name=\"clases[".$id_verbo."][".$hueco."]\" value=\"".$clases[$id_verbo][$hueco]."\">";
        }
        echo "</tr>";
        echo "<input type=\"hidden\" name=\"aleatorios[]\" value=\"".$id_verbo."\">";
    }
    echo "</table><br/>";
    echo "<input type=\"submit\" name=\"corregir\" value=\"Corregir\">";
    echo "</form>";
    ?>
</body>
</html>
