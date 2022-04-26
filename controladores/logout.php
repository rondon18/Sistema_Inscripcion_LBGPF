<?php
require("conexion.php");
require("../clases/bitacora.php");
session_start();

$bitacora = new bitacora();
$_SESSION['acciones'] .= ', Cierra sesión.';
$bitacora->actualizar_Bitacora($_SESSION['acciones'],$_SESSION['idBitacora']);
$bitacora->cerrar_bitacora($_SESSION['idBitacora']);

session_destroy();

header('Location: ../index.php');
exit();
?>
