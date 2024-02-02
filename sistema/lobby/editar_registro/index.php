<?php 

	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../index.php');
		exit();
	}

	if (isset(
				$_POST['editar'],
				$_POST['cedula'],
				$_POST['cedula_representante'],
				$_POST['cedula_padre'],
				$_POST['cedula_madre']
			)
		) {

			require('../../controladores/conexion.php');
			require('../../clases/bitacora.php');

			require('../../clases/antropometria_est.php');
			require('../../clases/carnet_patria.php');
			require('../../clases/condiciones_est.php');
			require('../../clases/contactos_aux.php');
			require('../../clases/datos_economicos.php');
			require('../../clases/datos_laborales.php');
			require('../../clases/datos_salud.php');
			require('../../clases/datos_sociales.php');
			require('../../clases/datos_vivienda.php');
			require('../../clases/direcciones.php');
			require('../../clases/estudiantes.php');
			require('../../clases/grado_a_cursar_est.php');
			require('../../clases/observaciones_est.php');
			require('../../clases/padres.php');
			require('../../clases/per_academico.php');
			require('../../clases/personas.php');
			require('../../clases/representantes.php');
			require('../../clases/tallas_est.php');
			require('../../clases/telefonos.php');
			require('../../clases/vac_covid19_est.php');
			require('../../clases/vacunas_est.php');

			$antropometria_est = new antropometria_est();
			$bitacora = new bitacora();
			$carnet_patria = new carnet_patria();
			$condiciones_est = new condiciones_est();
			$contactos_aux = new contactos_aux();
			$datos_economicos = new datos_economicos();
			$datos_laborales = new datos_laborales();
			$datos_salud = new datos_salud();
			$datos_sociales = new datos_sociales();
			$datos_vivienda = new datos_vivienda();
			$direcciones = new direcciones();
			$estudiantes = new estudiantes();
			$grado_a_cursar_est = new grado_a_cursar_est();
			$observaciones_est = new observaciones_est();
			$padres = new padres();
			$per_academico = new per_academico();
			$personas = new personas();
			$representantes = new representantes();
			$tallas_est = new tallas_est();
			$telefonos = new telefonos();
			$vac_covid19_est = new vac_covid19_est();
			$vacunas_est = new vacunas_est();

			// estudiante
			$estudiantes->set_cedula_persona($_POST['cedula']);
			$_SESSION['datos_estudiante'] = $estudiantes->consultar_estudiantes();

			$telefonos->set_cedula_persona($_POST['cedula']);
			$_SESSION['tlfs_estudiante'] = $telefonos->consultar_telefonos();

			$vacunas_est->set_cedula_estudiante($_POST['cedula']);
			$_SESSION['vacunas_estudiante'] = $vacunas_est->consultar_vacunas_est();
			

			// representante
			$representantes->set_cedula_persona($_POST['cedula_representante']);
			$_SESSION['datos_representante'] = $representantes->consultar_representantes();

			$telefonos->set_cedula_persona($_POST['cedula_representante']);
			$_SESSION['tlfs_representante'] = $telefonos->consultar_telefonos();


			// padre
			$padres->set_cedula_persona($_POST['cedula_padre']);
			$_SESSION['datos_padre'] = $padres->consultar_padres();

			$telefonos->set_cedula_persona($_POST['cedula_padre']);
			$_SESSION['tlfs_padre'] = $telefonos->consultar_telefonos();


			// madre
			$padres->set_cedula_persona($_POST['cedula_madre']);
			$_SESSION['datos_madre'] = $padres->consultar_padres();

			$telefonos->set_cedula_persona($_POST['cedula_madre']);
			$_SESSION['tlfs_madre'] = $telefonos->consultar_telefonos();

			$_SESSION['editar_registro'] = true;

			header('Location: paso_1.php');

	}
	else {
		header("Location: ../index.php");
	}

?>