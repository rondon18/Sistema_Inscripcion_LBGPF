<?php

	function generar_listado($anio,$seccion) {
		// retorno de los datos como array de arrays
		$estudiantes = new estudiantes();
		$lista_estudiantes = $estudiantes->filtrar_estudiantes($anio,$seccion);
		unset($estudiantes);
		return $lista_estudiantes;
	}

	// Llama el autoload de composer

	require_once('../../../vendor/autoload.php');
	use Dompdf\Dompdf;

	// Instancia las clases
	$estudiantes = new estudiantes();


	// Se marca que año o años se quiere consultar

	switch ($_POST['filtro_anio']) {

		case 'Primer año':
			$anios_a_consultar = ['Primer año'];
			break;
		case 'Segundo año':
			$anios_a_consultar = ['Segundo año'];
			break;
		case 'Tercer año':
			$anios_a_consultar = ['Tercer año'];
			break;
		case 'Cuarto año':
			$anios_a_consultar = ['Cuarto año'];
			break;
		case 'Quinto año':
			$anios_a_consultar = ['Quinto año'];
			break;

		default:
			$anios_a_consultar = ["Primer año","Segundo año","Tercer año","Cuarto año","Quinto año",];
			break;
	}

	// Se hace lo mismo con las secciones

	switch ($_POST['filtro_seccion']) {

		case 'A':
			$secciones_a_consultar = ['A'];
			break;
		case 'B':
			$secciones_a_consultar = ['B'];
			break;
		case 'C':
			$secciones_a_consultar = ['C'];
			break;
		case 'D':
			$secciones_a_consultar = ['D'];
			break;

		default:
			$secciones_a_consultar = ["A","B","C","D"];
			break;
	}

	$pdf = "";

	// Generacion del PDF
	foreach ($anios_a_consultar as $anio) {
		foreach ($secciones_a_consultar as $seccion) {
			ob_start();
			require("nomina_estudiantil/formato.php");
			$pdf .= ob_get_clean();
		}
	}

	// Instanciamos un objeto de dompdf
	$dompdf = new Dompdf();

	// Pasamos el HTML a dompdf para generar el PDF
	$dompdf->loadHtml($pdf);

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
		"Listado de estudiantes " .
		date("d-m-Y") .
		".pdf";
	$dompdf->stream($nombre_archivo, array('Attachment' => true));

?>