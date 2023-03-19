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
		->setTitle('Reporte de padres')
		->setDescription('Reporte generado mediante el modulo de reportes.');
	
	// cabecera de la tabla
	// empezar el encabezado solo con datos personales
	$encabezado = [];

	// Incluye los datos personales
	$encabezado = array_merge(
	
		// Personales
		$encabezado,
		[
			// Estudiante
			'Cédula del estudiante',
			'Nombres',
			'Apellidos',
			'Fecha de nacimiento',
			'Género',
			'Grado que cursa',
			'Sección que cursa',
			'Parentesco',

			// padre
			'Cédula del padre',
			'Nombres',
			'Apellidos',
			'Fecha de nacimiento',
			'Lugar de nacimiento',
			'Género',
			'Estado civil',
			'Grado académico',
		],

	);

	// 
	// Filtros aplicados para mostrar columnas en el encabezado	
	// 

	// Incluye incluir_direccion del padre
	if (isset($_POST['incluir_direccion']) and $_POST['incluir_direccion'] == "on") {
		$encabezado = array_merge($encabezado,["Dirección"]);
	}
	

	// Incluye incluir_email del padre
	if (isset($_POST['incluir_email']) and $_POST['incluir_email'] == "on") {
		$encabezado = array_merge($encabezado,["Correo electrónico"]);
	}
	

	// Incluye incluir_telefonos del padre
	if (isset($_POST['incluir_telefonos']) and $_POST['incluir_telefonos'] == "on") {
		$encabezado = array_merge($encabezado,["Teléfonos"]);
	}
	

	// Incluye incluir_d_laborales del padre
	if (isset($_POST['incluir_d_laborales']) and $_POST['incluir_d_laborales'] == "on") {
		// Incluye los datos laborales
		$encabezado = array_merge(
		
			// Laborales
			$encabezado,
			[
				'Empleo',
				'Lugar de trabajo',
				'Remuneración recibida',
				'Frecuencia de remuneración',
			]

		);
	}
	

	// Incluye incluir_d_vivienda del padre
	if (isset($_POST['incluir_d_vivienda']) and $_POST['incluir_d_vivienda'] == "on") {
		// Incluye los datos de vivienda
		$encabezado = array_merge(
		
			// Vivienda
			$encabezado,
			[
				'Tipo de vivienda',
				'Tenencia de la vivienda',
				'Condición de la vivienda',
			]

		);
	}

	// 
	// generacion del excel
	// 


	// creación de las páginas

	// hoja
	$documento->setActiveSheetIndex(0);
	$hoja = $documento->getActiveSheet();
	$hoja->setTitle("Padres");

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


	// retorno de los datos como array de arrays

	$filtro_anio 		= $_POST['filtro_anio'];
	$filtro_seccion = $_POST['filtro_seccion'];
	$filtro_genero 	= "Cualquiera";

	$lista_estudiantes = $estudiantes->filtrar_estudiantes($filtro_anio, $filtro_seccion, $filtro_genero);

	// Numero de fila actual
	$i = 3;

	$lineas = 0;
	
	// 
	// Padres
	// 

	foreach ($lista_estudiantes as $estudiante) {
		
		// Cedula, nombres, apellidos, grado y sección del estudiante

		$datos_fila = [];

		$datos_fila = array_merge(

			// Personales
			$datos_fila,
			[
				$estudiante["cedula"],
				$estudiante["p_nombre"]. " " .$estudiante["s_nombre"],
				$estudiante["p_apellido"]. " " .$estudiante["s_apellido"],
				$estudiante["fecha_nacimiento"],
				$estudiante["genero"],
				$estudiante["grado_a_cursar"],
				'Sección "' . $estudiante["seccion"] . '"',
				"Padre",
			],

		);

		// Datos del padre

		$padres->set_cedula_persona($estudiante["cedula_padre"]);
		$padre = $padres->consultar_padres();

		// var_dump($padre);

		// echo "<br><br><br>";

		// Incluye los datos personales
		$datos_fila = array_merge(

			// Personales
			$datos_fila,
			[
				$padre["cedula"],
				$padre["p_nombre"]. " " .$padre["s_nombre"],
				$padre["p_apellido"]. " " .$padre["s_apellido"],
				$padre["fecha_nacimiento"],
				$padre["lugar_nacimiento"],
				$padre["genero"],
				$padre["estado_civil"],
				$padre["grado_academico"],
			],

		);


		// 
		// Filtros aplicados para mostrar columnas en el datos_fila	
		// 

		// Incluye incluir_direccion del padre
		if (isset($_POST['incluir_direccion']) and $_POST['incluir_direccion'] == "on") {
			
			$direccion = 
			[
				$padre["municipio"],
				$padre["parroquia"],
				$padre["sector"],
				$padre["calle"],
				$padre["nro_casa"],
				$padre["punto_referencia"],
			];

			$datos_fila = array_merge($datos_fila,[implode(" ", $direccion)],);
		}


		// Incluye incluir_email del padre
		if (isset($_POST['incluir_email']) and $_POST['incluir_email'] == "on") {
			$datos_fila = array_merge($datos_fila,[$padre["email"],]);
		}


		// Incluye incluir_telefonos del padre
		if (isset($_POST['incluir_telefonos']) and $_POST['incluir_telefonos'] == "on") {
			
			// consulta los telefonos del padre
			$telefonos->set_cedula_persona($padre['cedula']);
			$telefonos_padre = $telefonos->consultar_telefonos();

			$tels = [];

			foreach ($telefonos_padre as $tel) {
				$tels[] = $tel['prefijo']."-".$tel['numero'];
			}
			$datos_fila = array_merge($datos_fila,[implode(" / ", $tels),]);
		
		}


		// Incluye incluir_d_laborales del padre
		if (isset($_POST['incluir_d_laborales']) and $_POST['incluir_d_laborales'] == "on") {
			// Incluye los datos laborales
			$datos_fila = array_merge(
			
				// Laborales
				$datos_fila,
				[
					$padre["empleo"],
					$padre["lugar_trabajo"],
					$padre["remuneracion"]." sueldos mínimos",
					$padre["tipo_remuneracion"],
				]

			);
		}


		// Incluye incluir_d_vivienda del padre
		if (isset($_POST['incluir_d_vivienda']) and $_POST['incluir_d_vivienda'] == "on") {
			// Incluye los datos de vivienda
			$datos_fila = array_merge(
			
				// Vivienda
				$datos_fila,
				[
					$padre["tipo"],
					$padre["tenencia"],
					$padre["condicion"],
				]

			);
		}


		// Si el filtro es distinto a cualquiera se especifican
		if (isset($_POST['filtro_parentesco']) and $_POST['filtro_parentesco'] != "Cualquiera") {
			
			if ($_POST['filtro_parentesco'] == "Padre" or $_POST['filtro_parentesco'] == "padre") {
					$hoja->fromArray($datos_fila, null, 'A'.$i);
					$i++;
					$lineas++;
			}

		}
		
		// Si el filtro marca cualquiera se muestra la fila
		else {
			$hoja->fromArray($datos_fila, null, 'A'.$i);
			$i++;
			$lineas++;
		}

	}


	// 
	// Madres
	//

	foreach ($lista_estudiantes as $estudiante) {
		
		// Cedula, nombres, apellidos, grado y sección del estudiante

		$datos_fila = [];

		$datos_fila = array_merge(

			// Personales
			$datos_fila,
			[
				$estudiante["cedula"],
				$estudiante["p_nombre"]. " " .$estudiante["s_nombre"],
				$estudiante["p_apellido"]. " " .$estudiante["s_apellido"],
				$estudiante["fecha_nacimiento"],
				$estudiante["genero"],
				$estudiante["grado_a_cursar"],
				'Sección "' . $estudiante["seccion"] . '"',
				"Madre",
			],

		);

		// Datos del padre

		$padres->set_cedula_persona($estudiante["cedula_madre"]);
		$padre = $padres->consultar_padres();

		// var_dump($padre);

		// echo "<br><br><br>";

		// Incluye los datos personales
		$datos_fila = array_merge(

			// Personales
			$datos_fila,
			[
				$padre["cedula"],
				$padre["p_nombre"]. " " .$padre["s_nombre"],
				$padre["p_apellido"]. " " .$padre["s_apellido"],
				$padre["fecha_nacimiento"],
				$padre["lugar_nacimiento"],
				$padre["genero"],
				$padre["estado_civil"],
				$padre["grado_academico"],
			],

		);


		// 
		// Filtros aplicados para mostrar columnas en el datos_fila	
		// 

		// Incluye incluir_direccion del padre
		if (isset($_POST['incluir_direccion']) and $_POST['incluir_direccion'] == "on") {
			
			$direccion = 
			[
				$padre["municipio"],
				$padre["parroquia"],
				$padre["sector"],
				$padre["calle"],
				$padre["nro_casa"],
				$padre["punto_referencia"],
			];

			$datos_fila = array_merge($datos_fila,[implode(" ", $direccion)],);
		}


		// Incluye incluir_email del padre
		if (isset($_POST['incluir_email']) and $_POST['incluir_email'] == "on") {
			$datos_fila = array_merge($datos_fila,[$padre["email"],]);
		}


		// Incluye incluir_telefonos del padre
		if (isset($_POST['incluir_telefonos']) and $_POST['incluir_telefonos'] == "on") {
			
			// consulta los telefonos del padre
			$telefonos->set_cedula_persona($padre['cedula']);
			$telefonos_padre = $telefonos->consultar_telefonos();

			$tels = [];

			foreach ($telefonos_padre as $tel) {
				$tels[] = $tel['prefijo']."-".$tel['numero'];
			}
			$datos_fila = array_merge($datos_fila,[implode(" / ", $tels),]);
		
		}


		// Incluye incluir_d_laborales del padre
		if (isset($_POST['incluir_d_laborales']) and $_POST['incluir_d_laborales'] == "on") {
			// Incluye los datos laborales
			$datos_fila = array_merge(
			
				// Laborales
				$datos_fila,
				[
					$padre["empleo"],
					$padre["lugar_trabajo"],
					$padre["remuneracion"]." sueldos mínimos",
					$padre["tipo_remuneracion"],
				]

			);
		}


		// Incluye incluir_d_vivienda del padre
		if (isset($_POST['incluir_d_vivienda']) and $_POST['incluir_d_vivienda'] == "on") {
			// Incluye los datos de vivienda
			$datos_fila = array_merge(
			
				// Vivienda
				$datos_fila,
				[
					$padre["tipo"],
					$padre["tenencia"],
					$padre["condicion"],
				]

			);
		}


		// Si el filtro es distinto a cualquiera se especifican
		if (isset($_POST['filtro_parentesco']) and $_POST['filtro_parentesco'] != "Cualquiera") {

			if ($_POST['filtro_parentesco'] == "Madre" or $_POST['filtro_parentesco'] == "madre") {
					$hoja->fromArray($datos_fila, null, 'A'.$i);
					$i++;
					$lineas++;
			}

		}
		
		// Si el filtro marca cualquiera se muestra la fila
		else {
			$hoja->fromArray($datos_fila, null, 'A'.$i);
			$i++;
			$lineas++;
		}

	}


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

		$n_archivo = "reporte_padre.xlsx";

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