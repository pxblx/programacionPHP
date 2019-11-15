<?php
/**
 * Control de cookies
 * 
 * @author Pablo
 */

if (isset($_COOKIE["user"]) and isset($_COOKIE["password"])) {
    $user = $_COOKIE["user"];
    $password = $_COOKIE["password"];
} else {
    $user = "";
    $password = "";
}
?>
