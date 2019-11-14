<?php
/**
 * Parámetros de configuración
 * 
 * @author Pablo
 */

$TITLE = "Autenticación básica";

$users = array(
    array("user" => "admin", "password" => "passwd", "profile" => "admin"),
    array("user" => "profesor", "password" => "1212", "profile" => "profesor"),
    array("user" => "pablo", "password" => "1234", "profile" => "admin"),
    array("user" => "alumno", "password" => "alu", "profile" => "alumno"),
    array("user" => "usuario", "password" => "usuario", "profile" => "usuario"));

$options = array(
    "usuario" => array("opc_usuarios"),
    "alumno" => array("opc_usuarios", "opc_alumnos"),
    "profesor" => array("opc_usuarios", "opc_alumnos", "opc_profesores"),
    "admin" => array("opc_usuarios", "opc_alumnos", "opc_profesores", "opc_administradores"));
?>
