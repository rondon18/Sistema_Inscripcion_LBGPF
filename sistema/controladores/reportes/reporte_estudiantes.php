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
					"Condición de la vista",
					"Condición de la dentadura",
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
					"Condición visual",
					"Condición motora",
					"Condición auditiva",
					"Condición de escritura",
					"Condición de lectura",
					"Condición de lenguaje",
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
				"Sección que cursa",
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
	$seccion = $_POST['filtro_seccion'];
	$genero = $_POST['filtro_genero'];

	// retorno de los datos como array de arrays
	$lista_estudiantes = $estudiantes->filtrar_estudiantes($anio,$seccion,$genero);

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


	$hoja_estudiantes->fromArray(array_map("mb_strtoupper",$encabezado), null, 'A2');


	$i = 3;

	// muestra los datos e incrementa la fila en 1
	foreach ($lista_estudiantes as $estudiante) {
		$datos_estudiante = [];

		// Incluye los datos personales del estudiante
		$datos_estudiante = array_merge(
			$datos_estudiante,
			[
				$estudiante["cedula"],
				$estudiante["cedula_escolar"],
				$estudiante["p_nombre"] . " " . $estudiante["s_nombre"],
				$estudiante["p_apellido"] . " " . $estudiante["s_apellido"],
				formatear_fecha($estudiante["fecha_nacimiento"]),
				$estudiante["lugar_nacimiento"],
				$estudiante["genero"],
			]
		);

		// Incluye direccion
		if (isset($_POST['incluir_direccion']) and $_POST['incluir_direccion'] == "on") {
			$datos_estudiante = array_merge(
				$datos_estudiante,
				[
					direccion_completa($estudiante),
					$estudiante["con_quien_vive"],
				]
			);
		}

		// Incluye Correo electrónico
		if (isset($_POST['incluir_email']) and $_POST['incluir_email'] == "on") {
			$datos_estudiante = array_merge(
				$datos_estudiante,
				[
					$estudiante["email"],
				]
			);
		}

		// Incluye Teléfonos
		if (isset($_POST['incluir_telefonos']) and $_POST['incluir_telefonos'] == "on") {
				
			// consulta los telefonos del estudiante
			$telefonos->set_cedula_persona($estudiante['cedula']);
			$telefonos_estudiante = $telefonos->consultar_telefonos();

			$tels = [];

			foreach ($telefonos_estudiante as $tel) {
				$tels[] = $tel['prefijo']."-".$tel['numero'];
			}

			$datos_estudiante = array_merge($datos_estudiante,[implode(" / ", $tels)]);
		}

		// Incluye observaciones
		if (isset($_POST['incluir_observaciones']) and $_POST['incluir_observaciones'] == "on") {
			$datos_estudiante = array_merge(
				$datos_estudiante,
				[
					$estudiante["social"],
					$estudiante["fisico"],
					$estudiante["personal"],
					$estudiante["familiar"],
					$estudiante["academico"],
					$estudiante["otra"],
				]
			);
		}


		// Incluye datos sociales
		if (isset($_POST['incluir_d_sociales']) and $_POST['incluir_d_sociales'] == "on") {
			$datos_estudiante = array_merge(
				$datos_estudiante,
				[
					$estudiante["tiene_canaima"],
					$estudiante["condicion_canaima"],
					$estudiante["acceso_internet"],
				]
			);
		}


		// Incluye Datos académicos
		if (isset($_POST['incluir_d_academicos']) and $_POST['incluir_d_academicos'] == "on") {
			$datos_estudiante = array_merge(
				$datos_estudiante,
				[
					$estudiante["grado_repetido"],
					$estudiante["materias_repetidas"],
					$estudiante["materias_pendientes"],
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
						$estudiante["lateralidad"],
						$estudiante["tipo_sangre"],
						$estudiante["medicacion"],
						$estudiante["dieta_especial"],
						$estudiante["padecimiento"],
						$estudiante["impedimento_fisico"],
						$estudiante["necesidad_educativa"],
						$estudiante["condicion_vista"],
						$estudiante["condicion_dental"],
						$estudiante["institucion_medica"],
						$estudiante["carnet_discapacidad"],
					]
				);
			}


			// Incluye Tallas de ropa
			if (isset($_POST['incluir_tallas']) and $_POST['incluir_tallas'] == "on") {
				$datos_estudiante = array_merge(
					$datos_estudiante,
					[
						$estudiante["camisa"],
						$estudiante["pantalon"],
						$estudiante["calzado"],
					]
				);
			}


			// Incluye antropometria
			if (isset($_POST['incluir_antropometria']) and $_POST['incluir_antropometria'] == "on") {
				$datos_estudiante = array_merge(
					$datos_estudiante,
					[
						$estudiante["estatura"] 	. "cm",
						$estudiante["peso"] 			. "kg",
						$estudiante["indice_m_c"],
						$estudiante["circ_braquial"],
					]
				);
			}

			// Incluye condiciones de salud
			if (isset($_POST['incluir_cond_salud']) and $_POST['incluir_cond_salud'] == "on") {
				// $datos_estudiante = array_merge(
				// 	$datos_estudiante,
				// 	[
				// 		$estudiante["visual"],
				// 		$estudiante["motora"],
				// 		$estudiante["auditiva"],
				// 		$estudiante["escritura"],
				// 		$estudiante["lectura"],
				// 		$estudiante["lenguaje"],
				// 	]
				// );

				$condiciones = ["visual","motora","auditiva","escritura","lectura","lenguaje"];
				foreach ($condiciones as $cond) {
					if (!empty($estudiante[$cond])) {
						$estudiante[$cond] = "Si";
					}
					else {
						$estudiante[$cond] = "No";
					}
					$datos_estudiante = array_merge(
						$datos_estudiante,
						[
							$estudiante["visual"],
						]
					);
				} 
						
				// Embarazo no se muestra si se seleccionan solo estudiantes varones
				if ($_POST['filtro_genero'] != "M") {
					$datos_estudiante = array_merge(
						$datos_estudiante,
						[
							$estudiante["embarazo"],
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


				// consulta las vacunas del estudiante
				$vacunas_est->set_cedula_estudiante($estudiante['cedula']);
				$vacunas_estudiante = $vacunas_est->consultar_vacunas_est();

				$vacunas = [];

				foreach ($vacunas_estudiante as $vac) {
					$estudiante[$vac['espec_vacuna']] = $vac['estado_vacuna'];
				}

				$datos_estudiante = array_merge(
					$datos_estudiante,
					[
						$estudiante["vph"],
						$estudiante["tdap"],
						$estudiante["menacwy"],
						$estudiante["hep_a"],
						$estudiante["hep_a"],
						$estudiante["ipv"],
						$estudiante["mmr"],
						$estudiante["varicela"],
						$estudiante["antiamarilica"],
						$estudiante["antigripal"],
					]
				);

				// var_dump($estudiante);
			}


			// Incluye vacunacion contra el covid-19
			if (isset($_POST['incluir_vac_covid_19']) and $_POST['incluir_vac_covid_19'] == "on") {
				$datos_estudiante = array_merge(
					$datos_estudiante,
					[
						 $estudiante["vac_aplicada"],
						 $estudiante["dosis"],
						 $estudiante["lote"],
					]
				);
			}

			$datos_estudiante = array_merge(
				$datos_estudiante,
				[
					$estudiante["plantel_proced"],
					$estudiante["grado_a_cursar"],
					'Sección "' . $estudiante["seccion"]. '"',
					$estudiante["id_per_academico"],
				]
			);
		}
		$hoja_estudiantes->fromArray(array_map("mb_strtoupper",$datos_estudiante), null, 'A'.$i);
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

		$hoja_estudiantes->getColumnDimension($j)->setWidth(165, 'pt');

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
		
		$hoja_representantes->fromArray(array_map("mb_strtoupper",$encabezado_representante), null, 'A1');

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
					$estudiante["cedula"],
					$estudiante["p_nombre"] . " " . $estudiante["s_nombre"],
					$estudiante["p_apellido"] . " " . $estudiante["s_apellido"],
					$representante["cedula"],
					$representante["p_nombre"] . " " . $representante["s_nombre"],
					$representante["p_apellido"] . " " . $representante["s_apellido"],
					implode(" ", $direccion), // Direccion completa
					$representante["email"],
					implode(" / ", $tels), // Telefonos
				]
			);

			$hoja_representantes->fromArray(array_map("mb_strtoupper",$datos_representante), null, 'A'.$i);
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

		$hoja_padres->fromArray(array_map("mb_strtoupper",$encabezado_padres), null, 'A1');


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
					$estudiante["cedula"],
					$estudiante["p_nombre"] . " " . $estudiante["s_nombre"],
					$estudiante["p_apellido"] . " " . $estudiante["s_apellido"],
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


			$hoja_padres->fromArray(array_map("mb_strtoupper",$datos_padres), null, 'A'.$i);
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


	// Crear un "escritor"
	$escritor = new Xlsx($documento);

	$n_archivo = "Reporte_de_estudiantes.xlsx";

	// Guardado
	// $escritor->save($n_archivo);

	// Descarga
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment; filename="'. urlencode($n_archivo).'"');
	$escritor->save('php://output');

?>
