<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body class="m-0 p-0">

	<style type="text/css">

		<?php

			$content = file_get_contents('../../css/bootstrap.css');
			echo $content;

		?>


		p {
			font-size: 9pt;
			text-align: justify;
		}


		/*

			Medidas

			Con el ancho usable de una hoja con margenes
			apa se cuenta horizontalmente con:

			8.5 x 11 pulgadas	ó	468 píxeles / 6 = 78 píxeles

			se trabaja con 6 columnas

		*/


		table.tabla-datos tr td,
		table.tabla-datos tr th {
			border: solid black 1px;
		}


		table.tabla-datos > thead {
			font-size: .55rem !important;
			font-weight: bold;
		}

		table.tabla-datos > tbody {
			font-size: .55rem;
		}

		/* Para el estudiante */
		.bg-info {
			background-color: #bdd6ee !important;
		}

		/* Para el padre */
		.bg-danger {
			background-color: #f8d7da !important;
		}

		/* Para el padre */
		.bg-warning {
			background-color: #fff3cd !important;
		}

		/* Para el representante */
		.bg-success {
			background-color: #d1e7dd !important;
		}

		/* Para el representante */
		.bg-secondary {
			background-color: #e2e3e5 !important;
		}

	</style>

	<?php

		// Orden de los componentes de la planilla

		// 1. Año escolar
		// 2. años cursados y foto
		// 3. datos del estudiante
		// 4. datos del representante
		// 5. datos del padre
		// 6. datos de la madre
		// 6. observaciones
		// 6. recaudos

	?>

		<?php
			require("header.php");
			require("generador_de_listado.php");
		?>

</body>
</html>
