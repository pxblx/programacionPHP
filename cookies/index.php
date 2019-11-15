<?php
/**
 * Página principal
 * 
 * @author Pablo
 */

include "config/config.php";
include "includes/cookies.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Pablo">
    <link rel="stylesheet" href="css/styles.css">
    <title><?php echo $TITLE; ?></title>
</head>
<body>
    <?php
    include "includes/header.php";
    include "includes/form.php";
    include "includes/validate.php";
    ?>
</body>
</html>
