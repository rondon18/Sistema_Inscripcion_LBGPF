<?php  

	require("../../../vendor/autoload.php");

	// incluir PhpSpreadsheet

	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	use PhpOffice\PhpSpreadsheet\Style\Color;
	use PhpOffice\PhpSpreadsheet\Style\Border;

	$documento = new Spreadsheet();
	
	$documento
		->getProperties()
		->setCreator('Sistema de inscripción L.B. "Gonzalo Picón Febres"')
		->setLastModifiedBy('Sistema de inscripción L.B. "Gonzalo Picón Febres"')
		->setTitle('Reporte de usuarios')
		->setDescription('Reporte generado mediante el modulo de reportes.');
	
	// cabecera de la tabla
	// empezar el encabezado solo con datos personales
	$encabezado = [];

	// Incluye los datos personales
	$encabezado = array_merge(
	
		// Personales
		$encabezado,
		[
			// usuario
			'Cédula del usuario',
			'Nombres',
			'Apellidos',
			'Fecha de nacimiento',
			'Lugar de nacimiento',
			'Rol de usuario',
			'Privilegios',
		],

	);

	// 
	// generacion del excel
	// 


	// creación de las páginas

	// hoja
	$documento->setActiveSheetIndex(0);
	$hoja = $documento->getActiveSheet();
	$hoja->setTitle("Usuarios");

	$imagen = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
	
	$imagen->setName('Banner');
	$imagen->setDescription('Banner');
	$imagen->setPath('../../img/banner-gobierno.png'); /* put your path and image here */
	$imagen->setCoordinates('A1');
	$imagen->setOffsetX(0);
	$imagen->setRotation(0);
	$imagen->setHeight(36);
	$imagen->getShadow()->setVisible(true);
	$imagen->getShadow()->setDirection(45);
	$imagen->setWorksheet($hoja);

	$imagen = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
	$imagen->setName('Banner2');
	$imagen->setDescription('Banner2');
	$imagen->setPath('../../img/banner-LGPF.png'); /* put your path and image here */
	$imagen->setCoordinates('B1');
	$imagen->setOffsetX(0);
	$imagen->setRotation(0);
	$imagen->setHeight(36);
	$imagen->getShadow()->setVisible(true);
	$imagen->getShadow()->setDirection(45);
	$imagen->setWorksheet($hoja);


	$hoja->fromArray($encabezado, null, 'A2');




	$lista_usuarios = $usuarios->mostrar_usuarios();

	// Numero de fila actual
	$i = 3;

	$lineas = 0;

	foreach ($lista_usuarios as $usuario) {
		
		// Cedula, nombres, apellidos, grado y sección del usuario

		$datos_fila = [];

		// Incluye los datos personales
		$datos_fila = array_merge(

			// Personales
			$datos_fila,
			[
				$usuario["cedula"],
				$usuario["p_nombre"]. " " .$usuario["s_nombre"],
				$usuario["p_apellido"]. " " .$usuario["s_apellido"],
				$usuario["fecha_nacimiento"],
				$usuario["lugar_nacimiento"],
				$usuario["rol"],
			],

		);

		if ($usuario["privilegios"] == 0) {
			$datos_fila = array_merge($datos_fila,["Desarrollador"]);
		} 
		elseif ($usuario["privilegios"] == 1) {
			$datos_fila = array_merge($datos_fila,["Administrador"]);
		}
		elseif ($usuario["privilegios"] == 2) {
			$datos_fila = array_merge($datos_fila,["Usuario"]);
		}
		else {
			$datos_fila = array_merge($datos_fila,["Usuario invitado"]);
		}
		

		$hoja->fromArray($datos_fila, null, 'A'.$i);
		$i++;
		$lineas++;

	}

	echo $lineas;

	// Estilos de la cabecera
	$max_col = $hoja->getHighestColumn();
	$fila_encabezado = ("A2:". $max_col ."2");
	$max_col++;


	for ($j= "A"; $j != $max_col; $j++) { 
		// Color de fondo de la cabecera

		$hoja
			->getStyle($j."2")
			->getFont()->setBold(true);

		$hoja
		->getStyle($j."2")
		->getFill()
		->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		->getStartColor()
		->setARGB('6CBFEB');

		$hoja->getColumnDimension($j)->setWidth(150, 'pt');

		$hoja->setAutoFilter($fila_encabezado);
	}

	$hoja->getRowDimension('1')->setRowHeight(30);

	if ($lineas >= 1) {

		// Crear un "escritor"
		$escritor = new Xlsx($documento);

		$n_archivo = "Reporte_de_usuario.xlsx";

		// Guardado
		$escritor->save($n_archivo);


		// // Descarga
		// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		// header('Content-Disposition: attachment; filename="'. urlencode($n_archivo).'"');
		// $writer->save('php://output');

	}
	else {
		header('Location: ../../lobby/reportes/index.php?err_con');
	}


?>