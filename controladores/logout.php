<?php
require("conexion.php");
require("../clases/bitácora.php");
session_start();

$bitácora = new bitácora();
$_SESSION['acciones'] .= ', Cierra sesión.';
$bitácora->actualizar_bitácora($_SESSION['acciones'],$_SESSION['idbitácora']);
$bitácora->cerrar_bitácora($_SESSION['idbitácora']);

session_destroy();

header('Location: ../index.php');
exit();
?>
