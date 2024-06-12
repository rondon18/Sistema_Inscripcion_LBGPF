<?php 

	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../index.php');
		exit();
	}

	if (isset(
				$_POST['editar_representante'],
				$_POST['cedula_representante'],
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


			// representante
			$representantes->set_cedula_persona($_POST['cedula_representante']);
			$_SESSION['datos_representante'] = $representantes->consultar_representantes();

			$telefonos->set_cedula_persona($_POST['cedula_representante']);
			$_SESSION['tlfs_representante'] = $telefonos->consultar_telefonos();



			$_SESSION['editar_registro'] = true;

			$_SESSION['tipo_edicion'] = "representante";

			var_dump($_POST);

			header('Location: editar_representante.php');

	}
	else {
		header("Location: ../index.php");
	}

?>