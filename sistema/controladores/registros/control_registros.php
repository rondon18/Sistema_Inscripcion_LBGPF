<?php  


	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../index.php');
		exit();
	}


	require('../clases/bitacora.php');
	require('../controladores/conexion.php');

	require("../clases/antropometria_est.php");
	require("../clases/carnet_patria.php");
	require("../clases/condiciones_est.php");
	require("../clases/contactos_aux.php");
	require("../clases/datos_economicos.php");
	require("../clases/datos_laborales.php");
	require("../clases/datos_salud.php");
	require("../clases/datos_academicos.php");
	require("../clases/datos_sociales.php");
	require("../clases/datos_vivienda.php");
	require("../clases/direcciones.php");
	require("../clases/estudiantes.php");
	require("../clases/grado_a_cursar_est.php");
	require("../clases/inscripciones.php");
	require("../clases/observaciones_est.php");
	require("../clases/padres.php");
	require("../clases/per_academico.php");
	require("../clases/personas.php");
	require("../clases/representantes.php");
	require("../clases/tallas_est.php");
	require("../clases/telefonos.php");
	require("../clases/usuarios.php");
	require("../clases/vac_covid19_est.php");
	require("../clases/vacunas_est.php");
	
	

	// Instancia las clases bajo el patron singleton

	// personas
	$personas = new personas();
	$telefonos = new telefonos();
	$carnet_patria = new carnet_patria();
	$datos_laborales = new datos_laborales();
	$datos_vivienda = new datos_vivienda();
	$direcciones = new direcciones();

	// representante
	$representantes = new representantes();
	$contactos_aux = new contactos_aux();
	$datos_economicos = new datos_economicos();
	
	// padre y madre
	$padres = new padres();

	// estudiante
	$estudiantes = new estudiantes();
	$antropometria_est = new antropometria_est();
	$condiciones_est = new condiciones_est();
	$datos_salud = new datos_salud();
	$datos_sociales = new datos_sociales();
	$datos_academicos = new datos_academicos();
	$grado_a_cursar_est = new grado_a_cursar_est();
	$observaciones_est = new observaciones_est();
	$tallas_est = new tallas_est();
	$vac_covid19_est = new vac_covid19_est();
	$vacunas_est = new vacunas_est();
	

	$inscripciones = new inscripciones();
	$per_academico = new per_academico();


	$usuarios = new usuarios();


	// var_dump($_SESSION);

	
	
	/*

	Comprueba que accion se quiere realizar y llama el controlador correspondiente

	*/

	// Adaptar una entrada para cada accion (insertar, editar y eliminar)
	$bitacora = new bitacora();

	// Nuevo registro
	if ($_SESSION['orden'] == "insertar") {
		require('../controladores/nuevo_registro.php');
		
		$_SESSION['acciones'] .= ', Registra un estudiante';
		$bitacora->set_id_bitacora($_SESSION['id_bitacora']);
		$bitacora->set_acciones_realizadas($_SESSION['acciones']);
		$bitacora->actualizar_bitacora();

		header('Location: ../lobby/consultar/index.php');

	}


	// Editar registro
	elseif ($_SESSION['orden'] == "editar") {
		require('../controladores/editar_registro.php');
		
		$_SESSION['acciones'] .= ', Edita un estudiante';
		$bitacora->set_id_bitacora($_SESSION['id_bitacora']);
		$bitacora->set_acciones_realizadas($_SESSION['acciones']);
		$bitacora->actualizar_bitacora();
		
		header('Location: ../lobby/consultar/index.php');

	}


	// Eliminar registro
	elseif ($_SESSION['orden'] == "eliminar") {
		require('../controladores/eliminar_registro.php');
		
		$_SESSION['acciones'] .= ', Elimina un estudiante';
		$bitacora->set_id_bitacora($_SESSION['id_bitacora']);
		$bitacora->set_acciones_realizadas($_SESSION['acciones']);
		$bitacora->actualizar_bitacora();
		
		header('Location: ../lobby/consultar/index.php?sec=est');

	}


	// Caso aparte
	else {

	}

?>