<?php

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

require_once('../controladores/conexion.php');
require_once('../clases/mantenimiento.php');

$mantenimiento = new mantenimiento();

if (isset($_POST['orden']) and $_POST['orden']) {
	
	$orden = $_POST['orden'];
		
	if ($orden == "Respaldar") {
		$mantenimiento->respaldarBD();
	}
	
	elseif ($orden == "Restaurar") {
		$mantenimiento->restaurarBD($_POST['respaldo']);
		header('Location: ../lobby/mantenimiento/index.php?exito');
	}
}
else {
	header('Location: ../lobby/index.php');
}




?>