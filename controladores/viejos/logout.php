<?php
require("conexion.php");
require("../clases/bitacora.php");
session_start();

$bitacora = new bitacora();
$_SESSION['acciones'] .= ', Cierra Sesión.';
$bitacora->actualizar_bitacora($_SESSION['acciones'],$_SESSION['id_bitacora']);
$bitacora->cerrar_bitacora($_SESSION['id_bitacora']);

session_destroy();

header('Location: ../index.php');
exit();
?>
