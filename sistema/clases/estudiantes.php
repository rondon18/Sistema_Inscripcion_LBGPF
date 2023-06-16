<?php  

	class estudiantes {

		// 

		private $cedula_persona;
		private $cedula_escolar;
		private $plantel_proced;
		private $con_quien_vive;
		private $relacion_representante;
		private $cedula_padre;
		private $cedula_madre;
		private $cedula_representante;
	

		// CONSTRUCTOR
		public function __construct() {}


		// manejo de base de datos

		public function insertar_estudiantes() {
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();
			$cedula_escolar = $this->get_cedula_escolar();
			$plantel_proced = $this->get_plantel_proced();
			$con_quien_vive = $this->get_con_quien_vive();
			$relacion_representante = $this->get_relacion_representante();
			$cedula_padre = $this->get_cedula_padre();
			$cedula_madre = $this->get_cedula_madre();
			$cedula_representante = $this->get_cedula_representante();

			$sql = "
				INSERT INTO `estudiantes`(
					`cedula_persona`,
					`cedula_escolar`,
					`plantel_proced`,
					`con_quien_vive`,
					`relacion_representante`,
					`cedula_padre`,
					`cedula_madre`,
					`cedula_representante`
				)
				VALUES(
					'$cedula_persona',
					'$cedula_escolar',
					'$plantel_proced',
					'$con_quien_vive',
					'$relacion_representante',
					'$cedula_padre',
					'$cedula_madre',
					'$cedula_representante'
				)
				ON DUPLICATE KEY UPDATE
				`cedula_persona` = `cedula_persona`;
			";

			// echo $sql;

			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}


		public function editar_estudiantes() {
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();
			$cedula_escolar = $this->get_cedula_escolar();
			$plantel_proced = $this->get_plantel_proced();
			$con_quien_vive = $this->get_con_quien_vive();
			$relacion_representante = $this->get_relacion_representante();
			$cedula_padre = $this->get_cedula_padre();
			$cedula_madre = $this->get_cedula_madre();
			$cedula_representante = $this->get_cedula_representante();

			$sql = "
				UPDATE
			    `estudiantes`
				SET
			    `cedula_escolar` = '$cedula_escolar',
			    `plantel_proced` = '$plantel_proced',
			    `con_quien_vive` = '$con_quien_vive',
			    `relacion_representante` = '$relacion_representante',
			    `cedula_padre` = '$cedula_padre',
			    `cedula_madre` = '$cedula_madre',
			    `cedula_representante` = '$cedula_representante'
				WHERE
			    `cedula_persona` = '$cedula_persona'
			";

			// echo $sql;

			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}


		public function mostrar_estudiantes() {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$sql = "SELECT * FROM `vista_estudiantes`";

			$resultado = $conexion->query($sql) or die("error: ".$conexion->error);
			
			$lista_estudiantes = $resultado->fetch_all(MYSQLI_ASSOC);
			
			desconectarBD($conexion);

			return $lista_estudiantes;
		}


		public function filtrar_estudiantes($grado = "Cualquiera", $seccion = "Cualquiera", $genero = "Cualquiera") {
			// filtra los estudiantes mediante filtros preestablecidos

			$conexion = conectarBD();

			$sql = "
				SELECT
				  `cedula`,
				  `p_nombre`,
				  `s_nombre`,
				  `p_apellido`,
				  `s_apellido`,
				  `fecha_nacimiento`,
				  `lugar_nacimiento`,
				  `genero`,
				  `email`,
				  CONCAT(
				      `estado`,
				      ' ',
				      `municipio`,
				      ' ',
				      `parroquia`,
				      ' ',
				      `sector`,
				      ' ',
				      `calle`,
				      ' ',
				      `nro_casa`,
				      ' ',
				      `punto_referencia`
				  ) AS direccion,
				  CONCAT(`codigo_carnet`, ' - ', `serial_carnet`) AS carnet_patria,
				  `cedula_escolar`,
				  `plantel_proced`,
				  `con_quien_vive`,
				  `relacion_representante`,
				  `cedula_padre`,
				  `cedula_madre`,
				  `cedula_representante`,
				  `lateralidad`,
				  `tipo_sangre`,
				  `medicacion`,
				  `dieta_especial`,
				  `padecimiento`,
				  `impedimento_fisico`,
				  `necesidad_educativa`,
				  `condicion_vista`,
				  `condicion_dental`,
				  `institucion_medica`,
				  `carnet_discapacidad`,
				  `vac_aplicada`,
				  `dosis`,
				  `lote`,
				  `camisa`,
				  `pantalon`,
				  `calzado`,
				  `estatura`,
				  `peso`,
				  `indice_m_c`,
				  `circ_braquial`,
				  `visual`,
				  `motora`,
				  `auditiva`,
				  `escritura`,
				  `lectura`,
				  `lenguaje`,
				  `embarazo`,
				  `social`,
				  `fisico`,
				  `personal`,
				  `familiar`,
				  `academico`,
				  `otra`,
				  `grado_repetido`,
				  `materias_repetidas`,
				  `materias_pendientes`,
				  `tiene_canaima`,
				  `condicion_canaima`,
				  `acceso_internet`,
				  `grado_a_cursar`,
				  `seccion`,
				  `id_per_academico`
				FROM
				  `vista_estudiantes`
			";

			// Si alguno de los filtros es distinto de "Cualquiera"
			if ($grado != "Cualquiera" or $seccion != "Cualquiera" or $genero != "Cualquiera") {
				
				// mostrar where solo si hay filtros
				$sql .= " WHERE ";

				$filtros = [];

				// anexar los filtros con array_merge()

				if ($grado != "Cualquiera") {
					$f_grado = "`grado_a_cursar` = '$grado'";
					$filtros = array_merge($filtros,[$f_grado]);
				}

				if ($seccion != "Cualquiera") {
					$f_seccion = "`seccion` = '$seccion'";
					$filtros = array_merge($filtros,[$f_seccion]);
				}

				if ($genero != "Cualquiera") {
					$f_genero = "`genero` = '$genero'";
					$filtros = array_merge($filtros,[$f_genero]);
				}

				// agregará un AND entre cada condicion siempre que haya más de una
				$sql .= implode(" AND ", $filtros);

			}

			// echo $sql;

			$resultado = $conexion->query($sql) or die("error: ".$conexion->error);
			
			// $lista_estudiantes = [];
			$lista_estudiantes = $resultado->fetch_all(MYSQLI_ASSOC);
			
			desconectarBD($conexion);

			return $lista_estudiantes;

		}


		public function consultar_estudiantes() {
			
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();

			$sql = "SELECT * FROM `vista_estudiantes` WHERE `cedula` = '$cedula_persona'";

			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$estudiante = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $estudiante;

		}


		// 
		// calculos para estadisticas
		// 


		/*	

			El calculo de porcentajes se encuentra separado de las cantidades directas
			
			En el caso de opuestos aplicar (total_estudiantes - nro_obtenido) por ejemplo
			para estudiantes que no tengan canaima 

			Se pueden llamar estas funciones sin parametros, pero si se agregan, deben ir todos

		*/


		// Retorna el porcentaje al que equivale la muestra en base a la poblacion estudiantil
		public function get_porcentaje($muestra) {
			// la poblacion es el total de estudiantes

			$poblacion = $this->get_nro_estudiantes();
			$porcentaje = ( $muestra / $poblacion ) * 100;

			return round($porcentaje) . "%";
		}


		// Retorna el número de estudiantes inscritos (Se puede filtrar)
		public function get_nro_estudiantes($grado = "Cualquiera", $seccion = "Cualquiera") {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as nro_estudiantes FROM `vista_estudiantes`";


			// Si alguno de los filtros es distinto de "Cualquiera"
			if ($grado != "Cualquiera" or $seccion != "Cualquiera") {
				
				// mostrar where solo si hay filtros
				$sql .= " WHERE ";

				$filtros = [];

				// anexar los filtros con array_merge()

				if ($grado != "Cualquiera") {
					$f_grado = "`grado_a_cursar` = '$grado'";
					$filtros = array_merge($filtros,[$f_grado]);
				}

				if ($seccion != "Cualquiera") {
					$f_seccion = "`seccion` = '$seccion'";
					$filtros = array_merge($filtros,[$f_seccion]);
				}

				// agregará un AND entre cada condicion siempre que haya más de una
				$sql .= implode(" AND ", $filtros);

			}

			// echo $sql;


			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$estudiante = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_estudiantes = $estudiante["nro_estudiantes"];
		}


		// Retorna el número de estudiantes hembras inscritos (Se puede filtrar)
		public function get_nro_hembras($grado = "Cualquiera", $seccion = "Cualquiera") {

			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as hembras FROM `vista_estudiantes` WHERE `genero` = 'F'";


			// Si alguno de los filtros es distinto de "Cualquiera"
			if ($grado != "Cualquiera" or $seccion != "Cualquiera") {
				
				// mostrar where solo si hay filtros
				$sql .= " AND ";

				$filtros = [];

				// anexar los filtros con array_merge()

				if ($grado != "Cualquiera") {
					$f_grado = "`grado_a_cursar` = '$grado'";
					$filtros = array_merge($filtros,[$f_grado]);
				}

				if ($seccion != "Cualquiera") {
					$f_seccion = "`seccion` = '$seccion'";
					$filtros = array_merge($filtros,[$f_seccion]);
				}

				// agregará un AND entre cada condicion siempre que haya más de una
				$sql .= implode(" AND ", $filtros);

			}

			// echo $sql;


			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$estudiante = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $hembras = $estudiante["hembras"];

		}


		// Retorna el número de estudiantes varones inscritos (Se puede filtrar)
		public function get_nro_varones($grado = "Cualquiera", $seccion = "Cualquiera") {

			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as varones FROM `vista_estudiantes` WHERE `genero` = 'M'";


			// Si alguno de los filtros es distinto de "Cualquiera"
			if ($grado != "Cualquiera" or $seccion != "Cualquiera") {
				
				// mostrar where solo si hay filtros
				$sql .= " AND ";

				$filtros = [];

				// anexar los filtros con array_merge()

				if ($grado != "Cualquiera") {
					$f_grado = "`grado_a_cursar` = '$grado'";
					$filtros = array_merge($filtros,[$f_grado]);
				}

				if ($seccion != "Cualquiera") {
					$f_seccion = "`seccion` = '$seccion'";
					$filtros = array_merge($filtros,[$f_seccion]);
				}

				// agregará un AND entre cada condicion siempre que haya más de una
				$sql .= implode(" AND ", $filtros);

			}

			// echo $sql;


			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$estudiante = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $varones = $estudiante["varones"];

		}


		// Retorna el número de estudiantes repitentes (Se puede filtrar)
		public function get_nro_repitentes($grado = "Cualquiera", $seccion = "Cualquiera") {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as nro_repitentes FROM `vista_estudiantes` WHERE `grado_repetido` not in ('')";


			// Si alguno de los filtros es distinto de "Cualquiera"
			if ($grado != "Cualquiera" or $seccion != "Cualquiera") {
				
				// mostrar where solo si hay filtros
				$sql .= " AND ";

				$filtros = [];

				// anexar los filtros con array_merge()

				if ($grado != "Cualquiera") {
					$f_grado = "`grado_a_cursar` = '$grado'";
					$filtros = array_merge($filtros,[$f_grado]);
				}

				if ($seccion != "Cualquiera") {
					$f_seccion = "`seccion` = '$seccion'";
					$filtros = array_merge($filtros,[$f_seccion]);
				}

				// agregará un AND entre cada condicion siempre que haya más de una
				$sql .= implode(" AND ", $filtros);

			}

			// echo $sql;


			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$estudiante = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $varones = $estudiante["nro_repitentes"];
		}

		
		// Retorna el número de estudiantes con canaimas (Se puede filtrar)
		public function get_nro_e_c_canaima($grado = "Cualquiera", $seccion = "Cualquiera") {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as nro_e_c_canaima FROM `vista_estudiantes` WHERE `tiene_canaima` = 'Si'";


			// Si alguno de los filtros es distinto de "Cualquiera"
			if ($grado != "Cualquiera" or $seccion != "Cualquiera") {
				
				// mostrar where solo si hay filtros
				$sql .= " AND ";

				$filtros = [];

				// anexar los filtros con array_merge()

				if ($grado != "Cualquiera") {
					$f_grado = "`grado_a_cursar` = '$grado'";
					$filtros = array_merge($filtros,[$f_grado]);
				}

				if ($seccion != "Cualquiera") {
					$f_seccion = "`seccion` = '$seccion'";
					$filtros = array_merge($filtros,[$f_seccion]);
				}

				// agregará un AND entre cada condicion siempre que haya más de una
				$sql .= implode(" AND ", $filtros);

			}

			// echo $sql;


			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$estudiante = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_e_c_canaima = $estudiante["nro_e_c_canaima"];
		}

		
		// Retorna el número de estudiantes con carnet de la patria (Se puede filtrar)
		public function get_nro_e_c_carnet_p($grado = "Cualquiera", $seccion = "Cualquiera") {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			// Cuenta siempre que ambos estén vacíos

			$sql = "
				SELECT 
					COUNT(*) as nro_e_c_carnet_p 
				FROM 
					`vista_estudiantes` 
				WHERE 
					`codigo_carnet` != '' and 
					`serial_carnet` != ''
			";


			// Si alguno de los filtros es distinto de "Cualquiera"
			if ($grado != "Cualquiera" or $seccion != "Cualquiera") {
				
				// mostrar where solo si hay filtros
				$sql .= " AND ";

				$filtros = [];

				// anexar los filtros con array_merge()

				if ($grado != "Cualquiera") {
					$f_grado = "`grado_a_cursar` = '$grado'";
					$filtros = array_merge($filtros,[$f_grado]);
				}

				if ($seccion != "Cualquiera") {
					$f_seccion = "`seccion` = '$seccion'";
					$filtros = array_merge($filtros,[$f_seccion]);
				}

				// agregará un AND entre cada condicion siempre que haya más de una
				$sql .= implode(" AND ", $filtros);

			}

			// echo $sql;


			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$estudiante = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_e_c_carnet_p = $estudiante["nro_e_c_carnet_p"];
		}		


		// Retorna el número de estudiantes con acceso a internet (Se puede filtrar)
		public function get_nro_e_c_internet($grado = "Cualquiera", $seccion = "Cualquiera") {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as nro_e_c_internet FROM `vista_estudiantes` WHERE `acceso_internet` = 'Si'";


			// Si alguno de los filtros es distinto de "Cualquiera"
			if ($grado != "Cualquiera" or $seccion != "Cualquiera") {
				
				// mostrar where solo si hay filtros
				$sql .= " AND ";

				$filtros = [];

				// anexar los filtros con array_merge()

				if ($grado != "Cualquiera") {
					$f_grado = "`grado_a_cursar` = '$grado'";
					$filtros = array_merge($filtros,[$f_grado]);
				}

				if ($seccion != "Cualquiera") {
					$f_seccion = "`seccion` = '$seccion'";
					$filtros = array_merge($filtros,[$f_seccion]);
				}

				// agregará un AND entre cada condicion siempre que haya más de una
				$sql .= implode(" AND ", $filtros);

			}

			// echo $sql;


			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$estudiante = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_e_c_internet = $estudiante["nro_e_c_internet"];
		}	


		// Retorna el número de estudiantes con acceso a internet (Se puede filtrar)
		public function get_nro_imc_saludable($grado = "Cualquiera", $seccion = "Cualquiera") {

			$conexion = conectarBD();

			// El rango de IMC saludable se encuentra entre 18,5 y 24,9 puntos
			$sql = "SELECT COUNT(*) as nro_imc_saludable FROM `vista_estudiantes` WHERE `indice_m_c` BETWEEN 18.5 AND 24.9";


			// Si alguno de los filtros es distinto de "Cualquiera"
			if ($grado != "Cualquiera" or $seccion != "Cualquiera") {
				
				// mostrar where solo si hay filtros
				$sql .= " AND ";

				$filtros = [];

				// anexar los filtros con array_merge()

				if ($grado != "Cualquiera") {
					$f_grado = "`grado_a_cursar` = '$grado'";
					$filtros = array_merge($filtros,[$f_grado]);
				}

				if ($seccion != "Cualquiera") {
					$f_seccion = "`seccion` = '$seccion'";
					$filtros = array_merge($filtros,[$f_seccion]);
				}

				// agregará un AND entre cada condicion siempre que haya más de una
				$sql .= implode(" AND ", $filtros);

			}

			// echo $sql;


			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$estudiante = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_imc_saludable = $estudiante["nro_imc_saludable"];
		}


		// Retorna el número de estudiantes con acceso a internet (Se puede filtrar)
		public function get_nro_e_c_padecimiento($grado = "Cualquiera", $seccion = "Cualquiera") {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as nro_e_c_padecimiento FROM `vista_estudiantes` WHERE `padecimiento` != ''";


			// Si alguno de los filtros es distinto de "Cualquiera"
			if ($grado != "Cualquiera" or $seccion != "Cualquiera") {
				
				// mostrar where solo si hay filtros
				$sql .= " AND ";

				$filtros = [];

				// anexar los filtros con array_merge()

				if ($grado != "Cualquiera") {
					$f_grado = "`grado_a_cursar` = '$grado'";
					$filtros = array_merge($filtros,[$f_grado]);
				}

				if ($seccion != "Cualquiera") {
					$f_seccion = "`seccion` = '$seccion'";
					$filtros = array_merge($filtros,[$f_seccion]);
				}

				// agregará un AND entre cada condicion siempre que haya más de una
				$sql .= implode(" AND ", $filtros);

			}

			// echo $sql;


			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$estudiante = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_e_c_padecimiento = $estudiante["nro_e_c_padecimiento"];
		}


		// Retorna el número de estudiantes con cierto tipo de sangre (Se puede filtrar por año y por seccion) 
		// OJO: Especificar que tipo de sangre
		public function get_nro_tipo_sangre($tipo, $grado = "Cualquiera", $seccion = "Cualquiera") {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as nro_tipo_sangre FROM `vista_estudiantes` WHERE `tipo_sangre` = '$tipo'";


			// Si alguno de los filtros es distinto de "Cualquiera"
			if ($grado != "Cualquiera" or $seccion != "Cualquiera") {
				
				// mostrar where solo si hay filtros
				$sql .= " AND ";

				$filtros = [];

				// anexar los filtros con array_merge()

				if ($grado != "Cualquiera") {
					$f_grado = "`grado_a_cursar` = '$grado'";
					$filtros = array_merge($filtros,[$f_grado]);
				}

				if ($seccion != "Cualquiera") {
					$f_seccion = "`seccion` = '$seccion'";
					$filtros = array_merge($filtros,[$f_seccion]);
				}

				// agregará un AND entre cada condicion siempre que haya más de una
				$sql .= implode(" AND ", $filtros);

			}

			// echo $sql;


			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$estudiante = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_tipo_sangre = $estudiante["nro_tipo_sangre"];
		}


		// Retorna el número de estudiantes zurdos, diestros o ambidextros (Se puede filtrar por año y por seccion) 
		public function get_nro_lateralidad($lateralidad, $grado = "Cualquiera", $seccion = "Cualquiera") {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as nro_lateralidad FROM `vista_estudiantes` WHERE `lateralidad` = '$lateralidad'";


			// Si alguno de los filtros es distinto de "Cualquiera"
			if ($grado != "Cualquiera" or $seccion != "Cualquiera") {
				
				// mostrar where solo si hay filtros
				$sql .= " AND ";

				$filtros = [];

				// anexar los filtros con array_merge()

				if ($grado != "Cualquiera") {
					$f_grado = "`grado_a_cursar` = '$grado'";
					$filtros = array_merge($filtros,[$f_grado]);
				}

				if ($seccion != "Cualquiera") {
					$f_seccion = "`seccion` = '$seccion'";
					$filtros = array_merge($filtros,[$f_seccion]);
				}

				// agregará un AND entre cada condicion siempre que haya más de una
				$sql .= implode(" AND ", $filtros);

			}

			// echo $sql;


			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$estudiante = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_lateralidad = $estudiante["nro_lateralidad"];
		}


		// Retorna el número de estudiantes vacunados contra el covid19 (Se puede filtrar por año y por seccion) 
		public function get_nro_vacunados_c19($vacuna = "Cualquiera", $grado = "Cualquiera", $seccion = "Cualquiera") {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as nro_vacunados_c19 FROM `vista_estudiantes` WHERE `vac_aplicada` != 'NV'";

			// Si alguno de los filtros es distinto de "Cualquiera"
			if ($vacuna != "Cualquiera" or $grado != "Cualquiera" or $seccion != "Cualquiera") {
				
				$sql .= " AND ";
				$filtros = [];

				// anexar los filtros con array_merge()

				// filtra por vacuna especifica que no sea una fuera de la lista
				if ($vacuna != "Cualquiera" and $vacuna != "Otra") {
					$filtro_vac_apl = "`vac_aplicada` = '$vacuna'";
					$filtros = array_merge($filtros,[$filtro_vac_apl]);
				}

				// en caso de ser otra vacuna que no esté en la lista (se excluye no vacunados igualmente)
				elseif ($vacuna == "Otra") {
					$filtro_vac_apl = "
						`vac_aplicada` NOT IN 
						(
							'NV',
							'Pfizer/BioNTech',
							'Moderna',
							'AztraZeneca',
							'Janssen',
							'Sinopharm',
							'Sinovac',
							'Bharat',
							'CanSinoBIO',
							'Valneva',
							'Novavax'
						);
					";
					$filtros = array_merge($filtros,[$filtro_vac_apl]);
				}

				if ($grado != "Cualquiera") {
					$f_grado = "`grado_a_cursar` = '$grado'";
					$filtros = array_merge($filtros,[$f_grado]);
				}

				if ($seccion != "Cualquiera") {
					$f_seccion = "`seccion` = '$seccion'";
					$filtros = array_merge($filtros,[$f_seccion]);
				}

				// agregará un AND entre cada condicion siempre que haya más de una
				$sql .= implode(" AND ", $filtros);

			}

			// echo $sql;


			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$estudiante = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_vacunados_c19 = $estudiante["nro_vacunados_c19"];
		}


		// Retorna el número de estudiantes vacunados con cierto número de dosiss contra el covid19 (Se puede filtrar por año y por seccion) 
		public function get_nro_dosis_anti_c19($dosis = 1, $fil_exclusivo = false, $grado = "Cualquiera", $seccion = "Cualquiera") {
			// Muestra todos los estudiantes que tengan al menos una dosis o mayor o igual que el parametro dado
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as nro_dosis_anti_c19 FROM `vista_estudiantes`";


			// fil se usa para diferencia si solo se cuentan los que tengan el número exacto o que tengan por lo menos ese número de dosis
			if ($fil_exclusivo == false) {
				$comparador = ">=";
			}
			else {
				$comparador = "=";
			}

			$sql .= " WHERE `dosis` >= 0 AND `dosis` ". $comparador ." '$dosis'";

			// Si alguno de los filtros es distinto de "Cualquiera"
			if ($grado != "Cualquiera" or $seccion != "Cualquiera") {
				
				$sql .= " AND ";
				$filtros = [];

				// anexar los filtros con array_merge()

				if ($grado != "Cualquiera") {
					$f_grado = "`grado_a_cursar` = '$grado'";
					$filtros = array_merge($filtros,[$f_grado]);
				}

				if ($seccion != "Cualquiera") {
					$f_seccion = "`seccion` = '$seccion'";
					$filtros = array_merge($filtros,[$f_seccion]);
				}

				// agregará un AND entre cada condicion siempre que haya más de una
				$sql .= implode(" AND ", $filtros);

			}

			// echo $sql;


			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$estudiante = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_dosis_anti_c19 = $estudiante["nro_dosis_anti_c19"];
		}


		// Retorna el número de estudiantes con una dieta especial (Se puede filtrar por año y por seccion) 
		public function get_nro_e_c_dieta_e($grado = "Cualquiera", $seccion = "Cualquiera") {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as nro_e_c_dieta_e FROM `vista_estudiantes` WHERE `dieta_especial` != ''";


			// Si alguno de los filtros es distinto de "Cualquiera"
			if ($grado != "Cualquiera" or $seccion != "Cualquiera") {
				
				// mostrar where solo si hay filtros
				$sql .= " AND ";

				$filtros = [];

				// anexar los filtros con array_merge()

				if ($grado != "Cualquiera") {
					$f_grado = "`grado_a_cursar` = '$grado'";
					$filtros = array_merge($filtros,[$f_grado]);
				}

				if ($seccion != "Cualquiera") {
					$f_seccion = "`seccion` = '$seccion'";
					$filtros = array_merge($filtros,[$f_seccion]);
				}

				// agregará un AND entre cada condicion siempre que haya más de una
				$sql .= implode(" AND ", $filtros);

			}

			// echo $sql;


			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$estudiante = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_e_c_dieta_e = $estudiante["nro_e_c_dieta_e"];
		}


		// Retorna el número de estudiantes con un impedimento fisico (Se puede filtrar por año y por seccion) 
		public function get_nro_e_c_impedimento_f($grado = "Cualquiera", $seccion = "Cualquiera") {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as nro_e_c_impedimento_f FROM `vista_estudiantes` WHERE `impedimento_fisico` != ''";


			// Si alguno de los filtros es distinto de "Cualquiera"
			if ($grado != "Cualquiera" or $seccion != "Cualquiera") {
				
				// mostrar where solo si hay filtros
				$sql .= " AND ";

				$filtros = [];

				// anexar los filtros con array_merge()

				if ($grado != "Cualquiera") {
					$f_grado = "`grado_a_cursar` = '$grado'";
					$filtros = array_merge($filtros,[$f_grado]);
				}

				if ($seccion != "Cualquiera") {
					$f_seccion = "`seccion` = '$seccion'";
					$filtros = array_merge($filtros,[$f_seccion]);
				}

				// agregará un AND entre cada condicion siempre que haya más de una
				$sql .= implode(" AND ", $filtros);

			}

			// echo $sql;


			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$estudiante = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_e_c_impedimento_f = $estudiante["nro_e_c_impedimento_f"];
		}


		// Retorna el número de estudiantes con una necesidad educativa especial (Se puede filtrar por año y por seccion) 
		public function get_nro_e_c_n_educativa($grado = "Cualquiera", $seccion = "Cualquiera") {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as nro_e_c_n_educativa FROM `vista_estudiantes` WHERE `necesidad_educativa` != ''";


			// Si alguno de los filtros es distinto de "Cualquiera"
			if ($grado != "Cualquiera" or $seccion != "Cualquiera") {
				
				// mostrar where solo si hay filtros
				$sql .= " AND ";

				$filtros = [];

				// anexar los filtros con array_merge()

				if ($grado != "Cualquiera") {
					$f_grado = "`grado_a_cursar` = '$grado'";
					$filtros = array_merge($filtros,[$f_grado]);
				}

				if ($seccion != "Cualquiera") {
					$f_seccion = "`seccion` = '$seccion'";
					$filtros = array_merge($filtros,[$f_seccion]);
				}

				// agregará un AND entre cada condicion siempre que haya más de una
				$sql .= implode(" AND ", $filtros);

			}

			// echo $sql;


			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$estudiante = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_e_c_n_educativa = $estudiante["nro_e_c_n_educativa"];
		}


		// Retorna el número de estudiantes con cierta condicion de vista (Se puede filtrar por año y por seccion) 
		public function get_nro_c_vista($condicion, $grado = "Cualquiera", $seccion = "Cualquiera") {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as nro_c_vista FROM `vista_estudiantes` WHERE `condicion_vista` = '$condicion'";


			// Si alguno de los filtros es distinto de "Cualquiera"
			if ($grado != "Cualquiera" or $seccion != "Cualquiera") {
				
				// mostrar where solo si hay filtros
				$sql .= " AND ";

				$filtros = [];

				// anexar los filtros con array_merge()

				if ($grado != "Cualquiera") {
					$f_grado = "`grado_a_cursar` = '$grado'";
					$filtros = array_merge($filtros,[$f_grado]);
				}

				if ($seccion != "Cualquiera") {
					$f_seccion = "`seccion` = '$seccion'";
					$filtros = array_merge($filtros,[$f_seccion]);
				}

				// agregará un AND entre cada condicion siempre que haya más de una
				$sql .= implode(" AND ", $filtros);

			}

			// echo $sql;


			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$estudiante = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_c_vista = $estudiante["nro_c_vista"];
		}


		// Retorna el número de estudiantes con cierta condicion de la dentadura (Se puede filtrar por año y por seccion) 
		public function get_nro_c_dental($condicion, $grado = "Cualquiera", $seccion = "Cualquiera") {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as nro_c_dental FROM `vista_estudiantes` WHERE `condicion_dental` = '$condicion'";


			// Si alguno de los filtros es distinto de "Cualquiera"
			if ($grado != "Cualquiera" or $seccion != "Cualquiera") {
				
				// mostrar where solo si hay filtros
				$sql .= " AND ";

				$filtros = [];

				// anexar los filtros con array_merge()

				if ($grado != "Cualquiera") {
					$f_grado = "`grado_a_cursar` = '$grado'";
					$filtros = array_merge($filtros,[$f_grado]);
				}

				if ($seccion != "Cualquiera") {
					$f_seccion = "`seccion` = '$seccion'";
					$filtros = array_merge($filtros,[$f_seccion]);
				}

				// agregará un AND entre cada condicion siempre que haya más de una
				$sql .= implode(" AND ", $filtros);

			}

			// echo $sql;


			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$estudiante = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_c_dental = $estudiante["nro_c_dental"];
		}


		// Retorna el número de estudiantes con carnet de discapacidad (Se puede filtrar por año y por seccion) 
		public function get_nro_e_c_carnet_d($grado = "Cualquiera", $seccion = "Cualquiera") {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as nro_e_c_carnet_d FROM `vista_estudiantes` WHERE `carnet_discapacidad` != ''";


			// Si alguno de los filtros es distinto de "Cualquiera"
			if ($grado != "Cualquiera" or $seccion != "Cualquiera") {
				
				// mostrar where solo si hay filtros
				$sql .= " AND ";

				$filtros = [];

				// anexar los filtros con array_merge()

				if ($grado != "Cualquiera") {
					$f_grado = "`grado_a_cursar` = '$grado'";
					$filtros = array_merge($filtros,[$f_grado]);
				}

				if ($seccion != "Cualquiera") {
					$f_seccion = "`seccion` = '$seccion'";
					$filtros = array_merge($filtros,[$f_seccion]);
				}

				// agregará un AND entre cada condicion siempre que haya más de una
				$sql .= implode(" AND ", $filtros);

			}

			// echo $sql;


			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$estudiante = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_e_c_carnet_d = $estudiante["nro_e_c_carnet_d"];
		}


		// 
		// Getters y setters de la clase sin ningun calculo
		// 


		// GETTERS
		public function get_cedula_persona() {
			return $this->cedula_persona;
		}

		public function get_cedula_escolar() {
			return $this->cedula_escolar;
		}

		public function get_plantel_proced() {
			return $this->plantel_proced;
		}

		public function get_con_quien_vive() {
			return $this->con_quien_vive;
		}

		public function get_relacion_representante() {
			return $this->relacion_representante;
		}

		public function get_cedula_padre() {
			return $this->cedula_padre;
		}

		public function get_cedula_madre() {
			return $this->cedula_madre;
		}

		public function get_cedula_representante() {
			return $this->cedula_representante;
		}


		// SETTERS
		public function set_cedula_persona($cedula_persona) {
			$this->cedula_persona = $cedula_persona;
		}

		public function set_cedula_escolar($cedula_escolar) {
			$this->cedula_escolar = $cedula_escolar;
		}

		public function set_plantel_proced($plantel_proced) {
			$this->plantel_proced = $plantel_proced;
		}

		public function set_con_quien_vive($con_quien_vive) {
			$this->con_quien_vive = $con_quien_vive;
		}

		public function set_relacion_representante($relacion_representante) {
			$this->relacion_representante = $relacion_representante;
		}

		public function set_cedula_padre($cedula_padre) {
			$this->cedula_padre = $cedula_padre;
		}

		public function set_cedula_madre($cedula_madre) {
			$this->cedula_madre = $cedula_madre;
		}

		public function set_cedula_representante($cedula_representante) {
			$this->cedula_representante = $cedula_representante;
		}


	}

?>