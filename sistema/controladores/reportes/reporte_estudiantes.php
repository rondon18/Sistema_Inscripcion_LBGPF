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
		->setTitle('Reporte de estudiantes')
		->setDescription('Reporte generado mediante el modulo de reportes.');
	
	// cabecera de la tabla
	// empezar el encabezado solo con datos personales
	$encabezado = [];

	// Incluye los datos personales
	$encabezado = array_merge(
		
		$encabezado,
		[
			"Cédula del estudiante",
			"Cédula escolar del estudiante",
			"Nombres",
			"Apellidos",
			"Fecha de nacimiento",
			"Lugar de nacimiento",
			"Género",
		]

	);

	// Incluye direccion
	if (isset($_POST['incluir_direccion']) and $_POST['incluir_direccion'] == "on") {
		
		$encabezado = array_merge($encabezado,["Dirección","Con quien vive"]);

	}

	// Incluye Correo electrónico
	if (isset($_POST['incluir_email']) and $_POST['incluir_email'] == "on") {
		
		$encabezado = array_merge($encabezado,["Correo electrónico"]);

	}

	// Incluye Teléfonos
	if (isset($_POST['incluir_telefonos']) and $_POST['incluir_telefonos'] == "on") {
		
		$encabezado = array_merge($encabezado,["Teléfonos"]);

	}

	// Incluye observaciones
	if (isset($_POST['incluir_observaciones']) and $_POST['incluir_observaciones'] == "on") {
		
		$encabezado = array_merge(
			$encabezado,
			[
				"Observaciones sociales",
				"Observaciones físicas",
				"Observaciones personales",
				"Observaciones familiares",
				"Observaciones académicas",
				"Otras observaciones",
			]
		);

	}


	// Incluye datos sociales
	if (isset($_POST['incluir_d_sociales']) and $_POST['incluir_d_sociales'] == "on") {
		
		$encabezado = array_merge(
			$encabezado,
			[
				"Tiene canaima",
				"Condiciones de la canaima",
				"Tiene conexión a internet",
			]
		);

	}


	// Incluye Datos académicos
	if (isset($_POST['incluir_d_academicos']) and $_POST['incluir_d_academicos'] == "on") {
		
		$encabezado = array_merge(
			$encabezado,
			[
				"Año repetido",
				"Materias repetidas",
				"Materias pendientes",
			]
		);

	}


	// Incluye los datos de salud en general
	if (isset($_POST['incluir_d_salud']) and $_POST['incluir_d_salud'] == "on") {
		// Incluye Ficha médica general
		if (isset($_POST['incluir_f_medica']) and $_POST['incluir_f_medica'] == "on") {
			$encabezado = array_merge(
				$encabezado,
				[
					"Lateralidad",
					"Tipo de sangre",
					"Medicación",
					"Dieta especial",
					"Padecimiento",
					"Impedimento físico",
					"Necesidad educativa especial",
					"Condicion de la vista",
					"Condicion de la dentadura",
					"Institucion medica de la que recibe atención",
					"Carnet de discapacidad"
				]
			);
		}


		// Incluye Tallas de ropa
		if (isset($_POST['incluir_tallas']) and $_POST['incluir_tallas'] == "on") {
			$encabezado = array_merge(
				$encabezado,
				[
					"Talla de camisa",
					"Talla de pantalón",
					"Talla de zapatos",
				]
			);
		}


		// Incluye antropometria
		if (isset($_POST['incluir_antropometria']) and $_POST['incluir_antropometria'] == "on") {
			$encabezado = array_merge(
				$encabezado,
				[
					"Estatura",
					"Peso",
					"Indice de masa corporal",
					"Circunferencia braquial",
				]
			);
		}

		// Incluye condiciones de salud
		if (isset($_POST['incluir_cond_salud']) and $_POST['incluir_cond_salud'] == "on") {
			$encabezado = array_merge(
				$encabezado,
				[
					"Condicion visual",
					"Condicion motora",
					"Condicion auditiva",
					"Condicion de escritura",
					"Condicion de lectura",
					"Condicion de lenguaje",
				]
			);

			// Embarazo no se muestra si se seleccionan solo estudiantes varones
			if ($_POST['filtro_genero'] != "M") {
				$encabezado = array_merge(
					$encabezado,
					[
						"Embarazo",
					]
				);
			}
		}


		// Incluye vacunas generales
		if (isset($_POST['incluir_vacunas']) and $_POST['incluir_vacunas'] == "on") {
			$encabezado = array_merge(
				$encabezado,
				[
					"Vacuna VPH",
					"Vacuna TDAP",
					"Vacuna MENACWY",
					"Vacuna hepatitis A",
					"Vacuna hepatitis B",
					"Vacuna IPV",
					"Vacuna MMR",
					"Vacuna varicela",
					"Vacuna antiamarilica",
					"Vacuna antigripal",
				]
			);
		}


		// Incluye vacunacion contra el covid-19
		if (isset($_POST['incluir_vac_covid_19']) and $_POST['incluir_vac_covid_19'] == "on") {
			$encabezado = array_merge(
				$encabezado,
				[
					"Vacuna contra el covid-19 aplicada",
					"Dosis recibidas",
					"lote de vacuna",
				]
			);
		}

		$encabezado = array_merge(
			$encabezado,
			[
				"Plantel de procedencia",
				"Año que cursa",
				"Periodo académico que cursa",
			]
		);

	}

	// 
	// hoja adicional para el representante
	// 

	// Incluye datos del representante
	if (isset($_POST['incluir_d_representante']) and $_POST['incluir_d_representante'] == "on") {
	
		// empezar el encabezado solo con datos personales
		$encabezado_representante = [];

		// Incluye los datos que identifican al estudiante
		$encabezado_representante = array_merge(
			$encabezado_representante,
			[
				"Cédula del estudiante",
				"Nombres",
				"Apellidos",
				"Cédula del representante",
				"Nombres",
				"Apellidos",
				"Dirección",
				"Correo electrónico",
				"Teléfonos"
			]
		);

	}

		// 
		// hoja adicional para los padres
		// 

		// Incluye datos de los padres
		if (isset($_POST['incluir_d_padres']) and $_POST['incluir_d_padres'] == "on") {
			// empezar el encabezado solo con datos personales
			$encabezado_padres = [];

			// Incluye los datos que identifican al estudiante
			$encabezado_padres = array_merge(
				$encabezado_padres,
				[
					"Cédula del estudiante",
					"Nombres",
					"Apellidos",
				]
			);

			// Incluye los datos personales de los padres
			$encabezado_padres = array_merge(
				$encabezado_padres,
				[
					"Cédula del padre",
					"Nombres",
					"Apellidos",
					"Dirección",
					"Correo electrónico",
					"Teléfonos",
					"Cédula de la madre",
					"Nombres",
					"Apellidos",
					"Dirección",
					"Correo electrónico",
					"Teléfonos",
				]
			);
		}

	// 
	// Realizacion de la consulta en la base de datos
	// 


	// filtros de la consulta
	$anio = $_POST['filtro_anio'];
	$genero = $_POST['filtro_genero'];

	// retorno de los datos como array de arrays
	$lista_estudiantes = $estudiantes->filtrar_estudiantes($anio,$genero);

	// 
	// generacion del excel
	// 


	// creacion de las páginas

	// hoja_estudiantes
	$documento->setActiveSheetIndex(0);
	$hoja_estudiantes = $documento->getActiveSheet();
	$hoja_estudiantes->setTitle("Estudiantes");

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
	$imagen->setWorksheet($hoja_estudiantes);

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
	$imagen->setWorksheet($hoja_estudiantes);


	$hoja_estudiantes->fromArray($encabezado, null, 'A2');


	$i = 3;

	// muestra los datos e incrementa la fila en 1
	foreach ($lista_estudiantes as $estudiante) {
		$datos_estudiante = [];
		$fila = [];

		// Incluye los datos personales del estudiante
		$datos_estudiante = array_merge(
			$datos_estudiante,
			[
				"cedula_estudiante",
				"cedula_escolar",
				"nombres",
				"apellidos",
				"fecha_nacimiento",
				"lugar_nacimiento",
				"genero",
			]
		);

		// Incluye direccion
		if (isset($_POST['incluir_direccion']) and $_POST['incluir_direccion'] == "on") {
			$datos_estudiante = array_merge($datos_estudiante,["direccion","con_quien_vive",]);
		}

		// Incluye Correo electrónico
		if (isset($_POST['incluir_email']) and $_POST['incluir_email'] == "on") {
			$datos_estudiante = array_merge($datos_estudiante,["email"]);
		}

		// Incluye Teléfonos
		if (isset($_POST['incluir_telefonos']) and $_POST['incluir_telefonos'] == "on") {
				
			// consulta los telefonos del estudiante
			$telefonos->set_cedula_persona($estudiante['cedula_estudiante']);
			$telefonos_estudiante = $telefonos->consultar_telefonos();

			$tels = [];

			foreach ($telefonos_estudiante as $tel) {
				$tels[] = $tel['prefijo']."-".$tel['numero'];
			}

			$estudiante['telefonos'] = implode(" / ", $tels);


			$datos_estudiante = array_merge($datos_estudiante,["telefonos"]);
		}

		// Incluye observaciones
		if (isset($_POST['incluir_observaciones']) and $_POST['incluir_observaciones'] == "on") {
			$datos_estudiante = array_merge(
				$datos_estudiante,
				[
					"social",
					"fisico",
					"personal",
					"familiar",
					"academico",
					"otra",
				]
			);
		}


		// Incluye datos sociales
		if (isset($_POST['incluir_d_sociales']) and $_POST['incluir_d_sociales'] == "on") {
			$datos_estudiante = array_merge(
				$datos_estudiante,
				[
					"tiene_canaima",
					"condicion_canaima",
					"acceso_internet",
				]
			);
		}


		// Incluye Datos académicos
		if (isset($_POST['incluir_d_academicos']) and $_POST['incluir_d_academicos'] == "on") {
			$datos_estudiante = array_merge(
				$datos_estudiante,
				[
					"grado_repetido",
					"materias_repetidas",
					"materias_pendientes",
				]
			);
		}


		// Incluye los datos de salud en general
		if (isset($_POST['incluir_d_salud']) and $_POST['incluir_d_salud'] == "on") {
			// Incluye Ficha médica general
			if (isset($_POST['incluir_f_medica']) and $_POST['incluir_f_medica'] == "on") {
				$datos_estudiante = array_merge(
					$datos_estudiante,
					[
						"lateralidad",
						"tipo_sangre",
						"medicacion",
						"dieta_especial",
						"padecimiento",
						"impedimento_fisico",
						"necesidad_educativa",
						"condicion_vista",
						"condicion_dental",
						"institucion_medica",
						"carnet_discapacidad",
					]
				);
			}


			// Incluye Tallas de ropa
			if (isset($_POST['incluir_tallas']) and $_POST['incluir_tallas'] == "on") {
				$datos_estudiante = array_merge(
					$datos_estudiante,
					[
						"camisa",
						"pantalon",
						"calzado",
					]
				);
			}


			// Incluye antropometria
			if (isset($_POST['incluir_antropometria']) and $_POST['incluir_antropometria'] == "on") {
				$datos_estudiante = array_merge(
					$datos_estudiante,
					[
						"estatura",
						"peso",
						"indice_m_c",
						"circ_braquial",
					]
				);
				$estudiante['estatura'] .= "cm";
				$estudiante['peso'] .= "kg";
				$estudiante['circ_braquial'] .= "cm";
			}

			// Incluye condiciones de salud
			if (isset($_POST['incluir_cond_salud']) and $_POST['incluir_cond_salud'] == "on") {
				$datos_estudiante = array_merge(
					$datos_estudiante,
					[
						"visual",
						"motora",
						"auditiva",
						"escritura",
						"lectura",
						"lenguaje",
					]
				);

				$condiciones = ["visual","motora","auditiva","escritura","lectura","lenguaje"];
				foreach ($condiciones as $cond) {
					if (!empty($estudiante[$cond])) {
						$estudiante[$cond] = "Si";
					}
					else {
						$estudiante[$cond] = "No";
					}
				} 
						
				// Embarazo no se muestra si se seleccionan solo estudiantes varones
				if ($_POST['filtro_genero'] != "M") {
					$datos_estudiante = array_merge(
						$datos_estudiante,
						[
							"embarazo",
						]
					);
					if (!empty($estudiante["embarazo"])) {
						$estudiante["embarazo"] = "Si";
					}
					else {
						$estudiante["embarazo"] = "No";
					}
				}

			}


			// Incluye vacunas generales
			if (isset($_POST['incluir_vacunas']) and $_POST['incluir_vacunas'] == "on") {
				$datos_estudiante = array_merge(
					$datos_estudiante,
					[
						"vph",
						"tdap",
						"menacwy",
						"hep_a",
						"hep_a",
						"ipv",
						"mmr",
						"varicela",
						"antiamarilica",
						"antigripal",
					]
				);

				// consulta las vacunas del estudiante
				$vacunas_est->set_cedula_estudiante($estudiante['cedula_estudiante']);
				$vacunas_estudiante = $vacunas_est->consultar_vacunas_est();

				$vacunas = [];

				foreach ($vacunas_estudiante as $vac) {
					$estudiante[$vac['espec_vacuna']] = $vac['estado_vacuna'];
				}
			}


			// Incluye vacunacion contra el covid-19
			if (isset($_POST['incluir_vac_covid_19']) and $_POST['incluir_vac_covid_19'] == "on") {
				$datos_estudiante = array_merge(
					$datos_estudiante,
					[
						 "vac_aplicada",
						 "dosis",
						 "lote",
					]
				);
			}

			$datos_estudiante = array_merge(
				$datos_estudiante,
				[
					"plantel_proced",
					"grado_a_cursar",
					"id_per_academico",
				]
			);
		}
		foreach ($datos_estudiante as $dato) {
			$fila[] = $estudiante[$dato];
		}
		$hoja_estudiantes->fromArray($fila, null, 'A'.$i);
		$i++;
	}

	unset($i);


	// Estilos posteriores al llenado


	$max_col = $hoja_estudiantes->getHighestColumn();
	$fila_encabezado = ("A2:". $max_col ."2");
	$max_col++;


	for ($j= "A"; $j != $max_col; $j++) { 
		// Color de fondo de la cabecera

		$hoja_estudiantes
			->getStyle($j."2")
			->getFont()->setBold(true);

		$hoja_estudiantes
		->getStyle($j."2")
		->getFill()
		->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		->getStartColor()
		->setARGB('6CBFEB');

		$hoja_estudiantes->getColumnDimension($j)->setWidth(150, 'pt');

		$hoja_estudiantes->setAutoFilter($fila_encabezado);
	}

	// alto de la fila con los banners
	$hoja_estudiantes->getRowDimension('1')->setRowHeight(30);

	// var_dump($encabezado_representante);




	if (isset($_POST['incluir_d_representante']) and $_POST['incluir_d_representante'] == "on"){

		// hoja_representantes
		$documento->createSheet();
		
		$documento->setActiveSheetIndex(1);
		$hoja_representantes = $documento->getActiveSheet();
		$hoja_representantes->setTitle("Representantes");
		
		$hoja_representantes->fromArray($encabezado_representante, null, 'A1');

		$i = 2;

		foreach ($lista_estudiantes as $estudiante) {
			$datos_representante = [];

			$representantes->set_cedula_persona($estudiante['cedula_representante']);
			$representante = $representantes->consultar_representantes();

			$direccion = 
			[
				$representante["municipio"],
				$representante["parroquia"],
				$representante["sector"],
				$representante["calle"],
				$representante["nro_casa"],
				$representante["punto_referencia"],
			];


			// consulta los telefonos del estudiante
			$telefonos->set_cedula_persona($estudiante['cedula_representante']);
			$telefonos_representante = $telefonos->consultar_telefonos();

			$tels = [];

			foreach ($telefonos_representante as $tel) {
				$tels[] = $tel['prefijo']."-".$tel['numero'];
			}

			// Incluye los datos personales del estudiante
			$datos_representante = array_merge(
				$datos_representante,
				[
					$estudiante["cedula_estudiante"],
					$estudiante["nombres"],
					$estudiante["apellidos"],
					$representante["cedula"],
					$representante["p_nombre"] . " " . $representante["s_nombre"],
					$representante["p_apellido"] . " " . $representante["s_apellido"],
					implode(" ", $direccion), // Direccion completa
					$representante["email"],
					implode(" / ", $tels), // Telefonos
				]
			);

			$hoja_representantes->fromArray($datos_representante, null, 'A'.$i);
			$i++;
		}

		unset($i);


		$max_col = $hoja_representantes->getHighestColumn();
		$fila_encabezado = ("A1:". $max_col ."1");
		$max_col++;


		for ($j= "A"; $j != $max_col; $j++) { 
			// Color de fondo de la cabecera

			$hoja_representantes
				->getStyle($j."1")
				->getFont()->setBold(true);

			$hoja_representantes
			->getStyle($j."1")
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('6CBFEB');

			$hoja_representantes->getColumnDimension($j)->setWidth(150, 'pt');

			$hoja_representantes->setAutoFilter($fila_encabezado);
		}

	}




	if (isset($_POST['incluir_d_padres']) and $_POST['incluir_d_padres'] == "on") {
		// hoja_padres
		$documento->createSheet();
		
		$documento->setActiveSheetIndex(2);
		$hoja_padres = $documento->getActiveSheet();
		$hoja_padres->setTitle("Padres");

		$hoja_padres->fromArray($encabezado_padres, null, 'A1');


		$i = 2;

		foreach ($lista_estudiantes as $estudiante) {
			// Arreglo con los datos de padre y madre juntos
			$datos_padres = [];

			// 
			// Datos del padre
			// 

			// consulta el padre del estudiante
			$padres->set_cedula_persona($estudiante['cedula_padre']);
			$padre = $padres->consultar_padres();

			// concatena la direccion larga
			$direccion = 
			[
				$padre["municipio"],
				$padre["parroquia"],
				$padre["sector"],
				$padre["calle"],
				$padre["nro_casa"],
				$padre["punto_referencia"],
			];


			// consulta los telefonos del padre
			$telefonos->set_cedula_persona($estudiante['cedula_padre']);
			$telefonos_padre = $telefonos->consultar_telefonos();

			// incluye los telefonos obtenidos como un arreglo
			$tels = [];
			foreach ($telefonos_padre as $tel) {
				// concatena prefijo y número telefonico
				$tels[] = $tel['prefijo']."-".$tel['numero'];
			}
			
			// Incluye los datos personales del padre
			$datos_padres = array_merge(
				$datos_padres,
				[
					$estudiante["cedula_estudiante"],
					$estudiante["nombres"],
					$estudiante["apellidos"],
					$padre["cedula"],
					$padre["p_nombre"] . " " . $padre["s_nombre"],
					$padre["p_apellido"] . " " . $padre["s_apellido"],
					implode(" ", $direccion), // Direccion completa
					$padre["email"],
					implode(" / ", $tels), // Telefonos
				]
			);

			// 
			// Datos de la madre
			// 

			// consulta el padre del estudiante
			$padres->set_cedula_persona($estudiante['cedula_madre']);
			$madre = $padres->consultar_padres();

			// concatena la direccion larga
			$direccion = 
			[
				$madre["municipio"],
				$madre["parroquia"],
				$madre["sector"],
				$madre["calle"],
				$madre["nro_casa"],
				$madre["punto_referencia"],
			];


			// consulta los telefonos del padre
			$telefonos->set_cedula_persona($estudiante['cedula_madre']);
			$telefonos_madre = $telefonos->consultar_telefonos();

			// incluye los telefonos obtenidos como un arreglo
			$tels = [];
			foreach ($telefonos_madre as $tel) {
				// concatena prefijo y número telefonico
				$tels[] = $tel['prefijo']."-".$tel['numero'];
			}
			
			// Incluye los datos personales del padre
			$datos_padres = array_merge(
				$datos_padres,
				[
					$madre["cedula"],
					$madre["p_nombre"] . " " . $madre["s_nombre"],
					$madre["p_apellido"] . " " . $madre["s_apellido"],
					implode(" ", $direccion), // Direccion completa
					$madre["email"],
					implode(" / ", $tels), // Telefonos
				]
			);


			$hoja_padres->fromArray($datos_padres, null, 'A'.$i);
			$i++;
		}

		unset($i);


		$max_col = $hoja_padres->getHighestColumn();
		$fila_encabezado = ("A1:". $max_col ."1");
		$max_col++;


		for ($j= "A"; $j != $max_col; $j++) { 
			// Color de fondo de la cabecera

			$hoja_padres
				->getStyle($j."1")
				->getFont()->setBold(true);

			$hoja_padres
			->getStyle($j."1")
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('6CBFEB');

			$hoja_padres->getColumnDimension($j)->setWidth(150, 'pt');

			$hoja_padres->setAutoFilter($fila_encabezado);
		}



	}

	// pone el foco en la primera página
	$documento->setActiveSheetIndex(0);


	// // Crear un "escritor"
	// $escritor = new Xlsx($documento);

	// // Guardado
	// $escritor->save("test_reporte.xlsx");

	// Descarga
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment; filename="'. urlencode("test_reporte.xlsx").'"');
	$writer->save('php://output');

?>
