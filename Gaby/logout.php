<?php 
session_start();

require("conexion.php");
require("../clases/bitacora.php");

$id = $_SESSION['usuario'];
$fecha = date("Y-m-d");
$hora = date("H-i-s");

$update = new Bitacora;
$update->update = "bitacora";
$update->set ="fechaFinalSesion = '$fecha', horaFinalSesion = '$hora'";
$update->condition = "idUsuarios = '$id'";
$update->editar();

session_destroy();

header('Location: ../index.php');
exit();
?>