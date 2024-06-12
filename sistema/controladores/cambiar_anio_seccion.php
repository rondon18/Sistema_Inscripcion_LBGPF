<?php

	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../../index.php');
		exit();
	}
	require('../logs/error_handler.php');
	require('conexion.php');
	require('../clases/estudiantes.php');
	require('../clases/grado_a_cursar_est.php');
	require("../clases/inscripciones.php");
	require("../clases/per_academico.php");


	$estudiantes = new estudiantes();
	$grado_a_cursar_est = new grado_a_cursar_est();
	$inscripciones = new inscripciones();
	$per_academico = new per_academico();

	$grado_a_cursar_est->set_grado_a_cursar($_POST['grado_a_cursar']);
	$grado_a_cursar_est->set_seccion($_POST['seccion_a_cursar']);
	$grado_a_cursar_est->set_cedula_estudiante($_POST['cedula_estudiante']);
	$grado_a_cursar_est->set_id_per_academico($per_academico->get_id_per_academico());
	$grado_a_cursar_est->editar_grado_a_cursar_est();

	// inscripciones

	$inscripciones->set_fecha(date("Y-m-d"));
	$inscripciones->set_hora(date("H:i:s"));
	$inscripciones->set_cedula_usuario($_SESSION['datos_login']["cedula"]);
	$inscripciones->set_cedula_estudiante($_POST['cedula_estudiante']);
	$inscripciones->insertar_inscripciones();


	header('Location: ../lobby/consultar/?sec=est');

?>