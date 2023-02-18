<?php 

	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../index.php');
		exit();
	}

	require('../clases/bitacora.php');
	require('../controladores/conexion.php');
	
	require("../clases/personas.php");
	
	// Instancia las clases bajo el patron singleton

	// personas
	$personas = new personas();

	// var_dump($_POST);
	
	if (isset($_POST['accion'])) {
		if ($_POST['accion'] == "insertar") {

		}
		elseif ($_POST['accion'] == "editar") {
			echo "n";
		}
		elseif ($_POST['accion'] == "eliminar") {
			$personas->set_cedula($_POST['cedula']);
			$personas->eliminar_persona();
		}
		else {

		}
		header('Location: ../lobby/consultar/index.php');
	}

?>