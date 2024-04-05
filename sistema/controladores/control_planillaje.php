<?php


	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../index.php');
		exit();
	}

	// Llama el autoload de composer

	require_once('../../vendor/autoload.php');
	use Dompdf\Dompdf;


	// Llama las clases y componentes necesarios
	require('../logs/error_handler.php');
	require('../lobby/consultar/funciones.php');
	require('../controladores/conexion.php');
	require('../clases/bitacora.php');
	require('../clases/estudiantes.php');
	require('../clases/vacunas_est.php');
	require('../clases/representantes.php');
	require('../clases/padres.php');
	require('../clases/telefonos.php');
	require('../clases/per_academico.php');


	$estudiantes = new estudiantes();
	$representantes = new representantes();
	$padres = new padres();
	$telefonos = new telefonos();
	$vacunas_est = new vacunas_est();
	$per_academico = new per_academico();

	if (
			isset(
				$_POST['documento_solicitado'],
				$_POST['cedula'],
				$_POST['cedula_padre'],
				$_POST['cedula_madre'],
				$_POST['cedula_representante']
			)
		) {

		$planilla_inscripcion = false;
		$acta_compromiso = false;

		/*

			Consultamos los datos del estudiante

		*/

		// estudiante
		$estudiantes->set_cedula_persona($_POST['cedula']);
		$datos_estudiante = $estudiantes->consultar_estudiantes();

		$telefonos->set_cedula_persona($_POST['cedula']);
		$tlfs_estudiante = $telefonos->consultar_telefonos();

		$vacunas_est->set_cedula_estudiante($datos_estudiante['cedula']);
		$vacunas_estudiante = $vacunas_est->consultar_vacunas_est();


		// representante
		$representantes->set_cedula_persona($_POST['cedula_representante']);
		$datos_representante = $representantes->consultar_representantes();

		$telefonos->set_cedula_persona($_POST['cedula_representante']);
		$tlfs_representante = $telefonos->consultar_telefonos();


		// padre
		$padres->set_cedula_persona($_POST['cedula_padre']);
		$datos_padre = $padres->consultar_padres();

		$telefonos->set_cedula_persona($_POST['cedula_padre']);
		$tlfs_padre = $telefonos->consultar_telefonos();

		// madre
		$padres->set_cedula_persona($_POST['cedula_madre']);
		$datos_madre = $padres->consultar_padres();

		$telefonos->set_cedula_persona($_POST['cedula_madre']);
		$tlfs_madre = $telefonos->consultar_telefonos();

		switch ($_POST['documento_solicitado']) {

			// Solo piden la planilla de registro
			case 1:
				$planilla_inscripcion = true;

				$nombre_archivo =
					"Planilla de inscripción " .
					ucwords(strtolower($datos_estudiante["p_nombre"])) . " " .
					ucwords(strtolower($datos_estudiante["p_apellido"])) . " " .
					ucwords(strtolower($datos_estudiante["cedula"])) . " " .
					date("d-m-Y") .
					".pdf";
				break;


			// Solo piden el acta de compromiso
			case 2:
				$acta_compromiso = true;
				$nombre_archivo =
					"Compromiso " .
					ucwords(strtolower($datos_estudiante["p_nombre"])) . " " .
					ucwords(strtolower($datos_estudiante["p_apellido"])) . " " .
					ucwords(strtolower($datos_estudiante["cedula"])) . " " .
					date("d-m-Y") .
					".pdf";
				break;

			// Piden todo el planillaje
			case 3:
				$planilla_inscripcion = true;
				$acta_compromiso = true;
				$nombre_archivo =
					"Planillaje " .
					ucwords(strtolower($datos_estudiante["p_nombre"])) . " " .
					ucwords(strtolower($datos_estudiante["p_apellido"])) . " " .
					ucwords(strtolower($datos_estudiante["cedula"])) . " " .
					date("d-m-Y") .
					".pdf";
				break;

			default:
				// code...
				break;
		}


		if ($planilla_inscripcion == true) {
			ob_start();
			require("planillas/planilla_inscripcion/planilla.php");
			$planilla_inscripcion_pdf = ob_get_clean();
		}

		if ($acta_compromiso == true) {
			ob_start();
			require("planillas/acta_compromiso/planilla.php");
			$acta_compromiso_pdf = ob_get_clean();
		}


		// Instanciamos un objeto de dompdf
		$dompdf = new Dompdf();

		switch ($_POST['documento_solicitado']) {

			// Solo piden la planilla de registro
			case 1:
				$dompdf->loadHtml($planilla_inscripcion_pdf);
				break;


			// Solo piden el acta de compromiso
			case 2:
				$dompdf->loadHtml($acta_compromiso_pdf);
				break;

			// Piden todo el planillaje
			case 3:
				$dompdf->loadHtml($planilla_inscripcion_pdf.$acta_compromiso_pdf);
				break;

			default:
				$dompdf->loadHtml("<p>No se recibió ningun argumento</p>");
				break;
		}

		// Aplicamos los estilos de Bootstrap 4
		$dompdf->set_option('isRemoteEnabled', true);
		$dompdf->set_option('isPhpEnabled', true);
		// Esto permite que se carguen las fuentes de Bootstrap desde la web
		$dompdf->set_option('defaultMediaTarget', 'screen'); // Estilo optimizado para pantalla
		$dompdf->setPaper('letter', 'portrait'); // Configuración del papel para carta

		// Renderizamos el HTML a PDF
		$dompdf->render();

		// Enviamos el PDF al navegador

		$dompdf->stream($nombre_archivo, array('Attachment' => true));

	}
	else {
		header("Location: ../lobby/index.php");
	}
?>