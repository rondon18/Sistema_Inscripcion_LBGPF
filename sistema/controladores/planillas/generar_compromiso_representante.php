<?php

		session_start();

		if (!$_SESSION['login']) {
				header('Location: ../index.php');
				exit();
		}

		// Llama el autoload de composer

		require_once('../../../vendor/autoload.php');
		use Dompdf\Dompdf;


		// Llama las clases y componentes necesarios
		require('../../lobby/consultar/funciones.php');
		require('../conexion.php');
		require('../../clases/bitacora.php');
		require('../../clases/estudiantes.php');
		require('../../clases/representantes.php');

		// Instancia las clases
		$estudiantes = new estudiantes();
		$representantes = new representantes();


		// Hace las consultas para obtener los datos necesarios

		// estudiante
		$estudiantes->set_cedula_persona($_POST['cedula']);
		$datos_estudiante = $estudiantes->consultar_estudiantes();

		// representante
		$representantes->set_cedula_persona($_POST['cedula_representante']);
		$datos_representante = $representantes->consultar_representantes();

		// Generacion del PDF

		ob_start();
		require('acta_compromiso/planilla.php'); //Ruta a tu archivo HTML


		$tabla = ob_get_clean();

		// Instanciamos un objeto de dompdf
		$dompdf = new Dompdf();

		// Pasamos el HTML a dompdf para generar el PDF
		$dompdf->loadHtml($tabla);
		// Aplicamos los estilos de Bootstrap 4
		$dompdf->set_option('isRemoteEnabled', true);
		$dompdf->set_option('isPhpEnabled', true);
		// Esto permite que se carguen las fuentes de Bootstrap desde la web
		$dompdf->set_option('defaultMediaTarget', 'screen'); // Estilo optimizado para pantalla
		$dompdf->setPaper('letter', 'portrait'); // Configuración del papel para carta

		// Renderizamos el HTML a PDF
		$dompdf->render();

		// Enviamos el PDF al navegador

		$nombre_archivo =
			"Compromiso " .
			ucwords(strtolower($datos_estudiante["p_nombre"])) . " " .
			ucwords(strtolower($datos_estudiante["p_apellido"])) . " " .
			ucwords(strtolower($datos_estudiante["cedula"])) . " " .
			date("d-m-Y") .
			".pdf";

		$dompdf->stream($nombre_archivo, array('Attachment' => true));

?>