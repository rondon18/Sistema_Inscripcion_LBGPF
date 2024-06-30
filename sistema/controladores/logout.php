<?php

	require("conexion.php");
	require("../clases/bitacora.php");
	require('../logs/error_handler.php');

	session_start();

	// agrega a la base de datos que ha cerrado sesion
	$bitacora = new bitacora();

	$bitacora->set_id_bitacora($_SESSION['id_bitacora']);

	if (isset($_GET['inactividad'])) {
		// actualiza la bitacora
		$_SESSION['acciones'] .= ', Sesión cerrada por inactividad.';
		$bitacora->set_acciones_realizadas($_SESSION['acciones']);
		$bitacora->actualizar_bitacora();

		// cierra la bitacora
		$bitacora->cerrar_bitacora($_SESSION['id_bitacora']);

		// destruye la sesion
		session_destroy();

		// redirecciona al menu
		header('Location: ../index.php?inactividad');
	}
	else {
		// actualiza la bitacora
		$_SESSION['acciones'] .= ', Cierra sesión.';
		$bitacora->set_acciones_realizadas($_SESSION['acciones']);
		$bitacora->actualizar_bitacora();

		// cierra la bitacora
		$bitacora->cerrar_bitacora($_SESSION['id_bitacora']);

		// destruye la sesion
		session_destroy();

		// redirecciona al menu
		header('Location: ../index.php');
	}

	// finaliza cualquier script php
	exit();
?>