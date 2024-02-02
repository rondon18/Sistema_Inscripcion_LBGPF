<?php

	session_start();

	require('../../../clases/bitacora.php');
	require('../../conexion.php');

	require("../../../clases/antropometria_est.php");
	require("../../../clases/carnet_patria.php");
	require("../../../clases/condiciones_est.php");
	require("../../../clases/contactos_aux.php");
	require("../../../clases/datos_economicos.php");
	require("../../../clases/datos_laborales.php");
	require("../../../clases/datos_salud.php");
	require("../../../clases/datos_academicos.php");
	require("../../../clases/datos_sociales.php");
	require("../../../clases/datos_vivienda.php");
	require("../../../clases/direcciones.php");
	require("../../../clases/estudiantes.php");
	require("../../../clases/grado_a_cursar_est.php");
	require("../../../clases/inscripciones.php");
	require("../../../clases/observaciones_est.php");
	require("../../../clases/padres.php");
	require("../../../clases/per_academico.php");
	require("../../../clases/personas.php");
	require("../../../clases/representantes.php");
	require("../../../clases/tallas_est.php");
	require("../../../clases/telefonos.php");
	require("../../../clases/usuarios.php");
	require("../../../clases/vac_covid19_est.php");
	require("../../../clases/vacunas_est.php");

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

	// Datos de persona

	$cedula = $_POST['nacionalidad'].$_POST['cedula'];

	$personas->set_cedula($cedula);
	$personas->set_p_nombre($_POST['primer_nombre']);
	$personas->set_s_nombre($_POST['segundo_nombre']);
	$personas->set_p_apellido($_POST['primer_apellido']);
	$personas->set_s_apellido($_POST['segundo_apellido']);
	$personas->set_fecha_nacimiento($_POST['fecha_nacimiento']);
	$personas->set_lugar_nacimiento($_POST['lugar_nacimiento']);

	if ($_POST['fecha_nacimiento']) {
		$personas->set_genero("M");
	}
	else {
		$personas->set_genero("M");
	}

	$personas->set_estado_civil($_POST['estado_civil']);
	$personas->set_email($_POST['correo_electronico']);

	if (isset($_POST['grado_instruccion'])) {
		$personas->set_grado_academico($_POST['grado_instruccion']);
	}

	// Inserta la persona
	$personas->editar_persona($_POST['cedula_inicial']);

	// Telefonos

	// Telefono principal
	$telefonos->set_cedula_persona($cedula);
	$telefonos->set_relacion("Principal");
	$telefonos->set_prefijo($_POST['prefijo_principal']);
	$telefonos->set_numero($_POST['telefono_principal']);
	$telefonos->editar_telefono();

	// Telefono secundario
	$telefonos->set_cedula_persona($cedula);
	$telefonos->set_relacion("Secundario");
	$telefonos->set_prefijo($_POST['prefijo_secundario']);
	$telefonos->set_numero($_POST['telefono_secundario']);
	$telefonos->editar_telefono();



	// direcciones

	$direcciones->set_cedula_persona($cedula);
	$direcciones->set_estado(""); // Debe ser local
	$direcciones->set_municipio("");
	$direcciones->set_parroquia("");
	$direcciones->set_sector("");
	$direcciones->set_calle("");
	$direcciones->set_nro_casa("");
	$direcciones->set_punto_referencia($_POST['direccion']);
	$direcciones->editar_direcciones();

	// Datos del representante

	$padres->set_cedula_persona($cedula);

	// Si el padre esta residenciado en el país se especifica directamente como Venezuela,
	// si desconoce como no conocido, si no, se toma el país especificado
	if ($_POST['reside_en_el_pais']){
		$padres->set_pais_residencia("Venezuela");
	}
	elseif ($_POST['reside_en_el_pais']) {
		$padres->set_pais_residencia("No conocido");
	}
	else {
		$padres->set_pais_residencia($_POST['pais']);
	}
	$padres->editar_padres();


	// datos_laborales
	$datos_laborales->set_cedula_persona($cedula);
	if (isset($_POST['empleo'])) {
		$datos_laborales->set_empleo($_POST['empleo']);
	}

	if (isset($_POST['lugar_trabajo'])) {
		$datos_laborales->set_lugar_trabajo($_POST['lugar_trabajo']);
	}

	if (isset($_POST['remuneracion'])) {
		$datos_laborales->set_remuneracion($_POST['remuneracion']);
	}

	if (isset($_POST['tipo_remuneracion'])) {
		$datos_laborales->set_tipo_remuneracion($_POST['tipo_remuneracion']);
	}

	$datos_laborales->editar_datos_laborales();

	// Telefono del trabajo
	$telefonos->set_cedula_persona($cedula);
	$telefonos->set_relacion("Trabajo");

	if (isset($_POST['prefijo_trabajo'])) {
		$telefonos->set_prefijo($_POST['prefijo_trabajo']);
	}

	if (isset($_POST['telefono_trabajo'])) {
		$telefonos->set_numero($_POST['telefono_trabajo']);
	}

	$telefonos->editar_telefono();


	// datos_vivienda

	$datos_vivienda->set_cedula_persona($cedula);

	if (isset($_POST['tipo_vivienda'])) {
		$datos_vivienda->set_tipo($_POST['tipo_vivienda']);
	}

	if (isset($_POST['condicion_vivienda'])) {
		$datos_vivienda->set_condicion($_POST['condicion_vivienda']);
	}

	if (isset($_POST['tenencia_vivienda'])) {
		if ($_POST['tenencia_vivienda']) {
			$datos_vivienda->set_tenencia($_POST['tenencia_vivienda_p_otro']);
		}
		else {
			$datos_vivienda->set_tenencia($_POST['tenencia_vivienda']);
		}
	}

	$datos_vivienda->editar_datos_vivienda();

	unset($_SESSION['datos_padre'],$_SESSION['tlfs_padre'],$_SESSION['parentezco'],);

	header('Location: ../../../lobby/consultar/index.php?sec=pad&exito');

?>