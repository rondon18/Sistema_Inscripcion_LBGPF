<?php

	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../../index.php');
		exit();
	}

	require('conexion.php');
	require('../clases/estudiantes.php');
	require('../clases/representantes.php');
	require('../clases/datos_economicos.php');
	require('../clases/carnet_patria.php');
	require('../clases/contactos_aux.php');

	$estudiantes = new estudiantes();
	$representantes = new representantes();
	$datos_economicos = new datos_economicos();
	$carnet_patria = new carnet_patria();
	$contactos_aux = new contactos_aux();



	$estudiantes->set_cedula_persona($_POST['cedula_estudiante']);

	$datos_estudiante = $estudiantes->consultar_estudiantes();
	if ($_POST['nuevo_representante'] == 'padre') {
		$representantes->set_cedula_persona($datos_estudiante['cedula_padre']);
		$check_representante_existe = $representantes->verificar_representantes();
	}
	elseif ($_POST['nuevo_representante'] == 'madre') {
		$representantes->set_cedula_persona($datos_estudiante['cedula_madre']);
		$check_representante_existe = $representantes->verificar_representantes();
	}
	else {
		header('Location: ../lobby/consultar/');
	}

	if (!$check_representante_existe) {
		$representantes->insertar_representante();
		$datos_economicos->set_cedula_representante($representantes->get_cedula_persona());
		$datos_economicos->insertar_datos_economicos();
		$carnet_patria->set_cedula_persona($representantes->get_cedula_persona());
		$carnet_patria->insertar_carnet_patria();
		$contactos_aux->set_cedula_representante($representantes->get_cedula_persona());
		$contactos_aux->insertar_contactos_aux();
	}

	// Actualizacion del estudiante

	$estudiantes->set_cedula_escolar($datos_estudiante['cedula_escolar']);
	$estudiantes->set_plantel_proced($datos_estudiante['plantel_proced']);
	$estudiantes->set_con_quien_vive($datos_estudiante['con_quien_vive']);
	$estudiantes->set_cedula_padre($datos_estudiante['cedula_padre']);
	$estudiantes->set_cedula_madre($datos_estudiante['cedula_madre']);

	if ($_POST['nuevo_representante'] == 'padre') {
		$estudiantes->set_cedula_representante($datos_estudiante['cedula_padre']);
		$estudiantes->set_relacion_representante('Padre');
	}
	elseif ($_POST['nuevo_representante'] == 'madre') {
		$estudiantes->set_cedula_representante($datos_estudiante['cedula_madre']);
		$estudiantes->set_relacion_representante('Madre');
	}

	$estudiantes->editar_estudiantes();

	header('Location: ../lobby/consultar/');

?>