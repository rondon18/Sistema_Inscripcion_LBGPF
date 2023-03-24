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
		->setTitle('Reporte de representantes')
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
			'Relación con el representante',

			// Representante
			'Cédula del representante',
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

	// Incluye incluir_direccion del representante
	if (isset($_POST['incluir_direccion']) and $_POST['incluir_direccion'] == "on") {
		$encabezado = array_merge($encabezado,["Dirección"]);
	}
	

	// Incluye incluir_email del representante
	if (isset($_POST['incluir_email']) and $_POST['incluir_email'] == "on") {
		$encabezado = array_merge($encabezado,["Correo electrónico"]);
	}
	

	// Incluye incluir_telefonos del representante
	if (isset($_POST['incluir_telefonos']) and $_POST['incluir_telefonos'] == "on") {
		$encabezado = array_merge($encabezado,["Teléfonos"]);
	}
	

	// Incluye incluir_c_patria del representante
	if (isset($_POST['incluir_c_patria']) and $_POST['incluir_c_patria'] == "on") {
		$encabezado = array_merge($encabezado,["Carnet de la patria"]);
	}
	

	// Incluye incluir_d_laborales del representante
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
	

	// Incluye incluir_d_vivienda del representante
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
	

	// Incluye incluir_d_economicos del representante
	if (isset($_POST['incluir_d_economicos']) and $_POST['incluir_d_economicos'] == "on") {
		// Incluye los datos económicos
		$encabezado = array_merge(
		
			// Bancarios
			$encabezado,
			[
				'Banco',
				'Tipo de cuenta',
			]

		);
	}
	

	// Incluye incluir_c_aux del representante
	if (isset($_POST['incluir_c_aux']) and $_POST['incluir_c_aux'] == "on") {
		// Incluye los datos económicos
		$encabezado = array_merge(
		
			// Vivienda
			$encabezado,
			[
				'Nombre del contacto auxiliar',
				'Relación',
				'Teléfono',
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
	$hoja->setTitle("Representantes");

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
				$estudiante["relacion_representante"],
			],

		);

		// Datos del representante

		$representantes->set_cedula_persona($estudiante["cedula_representante"]);
		$representante = $representantes->consultar_representantes();

		// var_dump($representante);

		// echo "<br><br><br>";

		// Incluye los datos personales
		$datos_fila = array_merge(

			// Personales
			$datos_fila,
			[
				$representante["cedula"],
				$representante["p_nombre"]. " " .$representante["s_nombre"],
				$representante["p_apellido"]. " " .$representante["s_apellido"],
				$representante["fecha_nacimiento"],
				$representante["lugar_nacimiento"],
				$representante["genero"],
				$representante["estado_civil"],
				$representante["grado_academico"],
			],

		);


		// 
		// Filtros aplicados para mostrar columnas en el datos_fila	
		// 

		// Incluye incluir_direccion del representante
		if (isset($_POST['incluir_direccion']) and $_POST['incluir_direccion'] == "on") {
			
			$direccion = 
			[
				$representante["municipio"],
				$representante["parroquia"],
				$representante["sector"],
				$representante["calle"],
				$representante["nro_casa"],
				$representante["punto_referencia"],
			];

			$datos_fila = array_merge($datos_fila,[implode(" ", $direccion)],);
		}


		// Incluye incluir_email del representante
		if (isset($_POST['incluir_email']) and $_POST['incluir_email'] == "on") {
			$datos_fila = array_merge($datos_fila,[$representante["email"],]);
		}


		// Incluye incluir_telefonos del representante
		if (isset($_POST['incluir_telefonos']) and $_POST['incluir_telefonos'] == "on") {
			
			// consulta los telefonos del representante
			$telefonos->set_cedula_persona($representante['cedula']);
			$telefonos_representante = $telefonos->consultar_telefonos();

			$tels = [];

			foreach ($telefonos_representante as $tel) {
				$tels[] = $tel['prefijo']."-".$tel['numero'];
			}
			$datos_fila = array_merge($datos_fila,[implode(" / ", $tels),]);
		
		}


		// Incluye incluir_c_patria del representante
		if (isset($_POST['incluir_c_patria']) and $_POST['incluir_c_patria'] == "on") {
			$datos_fila = array_merge(
				$datos_fila,
				[
					$representante["codigo_carnet"]. " - " .$representante["serial_carnet"]
				]
			);
		}


		// Incluye incluir_d_laborales del representante
		if (isset($_POST['incluir_d_laborales']) and $_POST['incluir_d_laborales'] == "on") {
			// Incluye los datos laborales
			$datos_fila = array_merge(
			
				// Laborales
				$datos_fila,
				[
					$representante["empleo"],
					$representante["lugar_trabajo"],
					$representante["remuneracion"]." sueldos mínimos",
					$representante["tipo_remuneracion"],
				]

			);
		}


		// Incluye incluir_d_vivienda del representante
		if (isset($_POST['incluir_d_vivienda']) and $_POST['incluir_d_vivienda'] == "on") {
			// Incluye los datos de vivienda
			$datos_fila = array_merge(
			
				// Vivienda
				$datos_fila,
				[
					$representante["tipo"],
					$representante["tenencia"],
					$representante["condicion"],
				]

			);
		}


		// Incluye incluir_d_economicos del representante
		if (isset($_POST['incluir_d_economicos']) and $_POST['incluir_d_economicos'] == "on") {
			// Incluye los datos económicos
			$datos_fila = array_merge(
			
				// Vivienda
				$datos_fila,
				[
					$representante["banco"],
					$representante["tipo_cuenta"],
				]

			);
		}


		// Incluye incluir_c_aux del representante
		if (isset($_POST['incluir_c_aux']) and $_POST['incluir_c_aux'] == "on") {
			// Incluye los datos económicos
			$datos_fila = array_merge(
			
				// Vivienda
				$datos_fila,
				[
					$representante["nombre_aux"] . " " . $representante["apellido_aux"],
					$representante["relacion_aux"],
					$representante["pref_aux"] . "-" . $representante["numero_aux"],
				]

			);
		}

		// foreach ($datos_fila as $key => $value) {
		// 	echo "$key -> $value";
		// 	echo "<br>";
		// }

		// Si el filtro es distinto a cualquiera se especifican
		if (isset($_POST['filtro_relacion']) and $_POST['filtro_relacion'] != "Cualquiera") {
			
			if ($_POST['filtro_relacion'] == "Padre" or $_POST['filtro_relacion'] == "padre") {
				$fil = ["Padre","padre"];
				if (in_array($estudiante["relacion_representante"], $fil)) {
					$hoja->fromArray($datos_fila, null, 'A'.$i);
					$i++;
					$lineas++;
				}
			}

			elseif ($_POST['filtro_relacion'] == "Madre" or $_POST['filtro_relacion'] == "madre") {
				$fil = ["Madre","madre"];
				if (in_array($estudiante["relacion_representante"], $fil)) {
					$hoja->fromArray($datos_fila, null, 'A'.$i);
					$i++;
					$lineas++;
				}
			}

			elseif ($_POST['filtro_relacion'] == "Otro" or $_POST['filtro_relacion'] == "otro") {
				$fil = ["Padre","Madre","padre","madre"];
				if (!in_array($estudiante["relacion_representante"], $fil)) {
					$hoja->fromArray($datos_fila, null, 'A'.$i);
					$i++;
					$lineas++;
				}
			}
		}
		// Si el filtro marca cualquiera se muestra la fila
		else {
			$hoja->fromArray($datos_fila, null, 'A'.$i);
			$i++;
			$lineas++;
		}

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

		$n_archivo = "reporte_representante.xlsx";

		// Guardado
		// $escritor->save($n_archivo);


		// // Descarga
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'. urlencode($n_archivo).'"');
		$escritor->save('php://output');

	}
	else {
		header('Location: ../../lobby/reportes/index.php?err_con');
	}


?>