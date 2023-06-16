<?php  

	class padres {
		private $cedula_persona;
		private $pais_residencia;

		public function __construct() {}

		public function insertar_padres() {
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();
			$pais_residencia = $this->get_pais_residencia();

			$sql = "
				INSERT INTO `padres`(
					`cedula_persona`,
					`pais_residencia`
				)
				VALUES('$cedula_persona', '$pais_residencia')
				ON DUPLICATE KEY UPDATE
				`cedula_persona` = `cedula_persona`;
			";

			// echo $sql;

			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function editar_padres() {
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();
			$pais_residencia = $this->get_pais_residencia();

			$sql = "
				UPDATE
					`padres`
				SET
					`pais_residencia` = '$pais_residencia'
				WHERE
					`cedula_persona` = '$cedula_persona'
			";

			// echo $sql;

			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function mostrar_padres() {
			// Muestra todos los padres registrados
			$conexion = conectarBD();

			$sql = "SELECT * FROM `vista_padres`";

			$resultado = $conexion->query($sql) or die("error: ".$conexion->error);
			
			$lista_padres = $resultado->fetch_all(MYSQLI_ASSOC);
			
			desconectarBD($conexion);

			return $lista_padres;
		}


		public function consultar_padres() {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();

			$sql = "SELECT * FROM `vista_padres` WHERE `cedula` = '$cedula_persona'";

			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$padre = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $padre;
		}

		public function mostrar_hijos() {
			// Muestra los estudiantes que representa el representante
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();

			$sql = "
			SELECT
				`cedula`,
				`p_nombre`,
				`grado_a_cursar`
			FROM
				`vista_estudiantes`
			WHERE
				cedula_padre = '$cedula_persona' OR
				cedula_madre = '$cedula_persona'
				";

			$resultado = $conexion->query($sql) or die("error: ".$conexion->error);
			
			$lista_hijos = $resultado->fetch_all(MYSQLI_ASSOC);
			desconectarBD($conexion);
			
			return $lista_hijos;
		}

		public function contar_hijos() {
			// Muestra cuantos estudiantes representa el representante
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();

			$sql = "
			SELECT
				*
			FROM
				`vista_estudiantes`
			WHERE
				cedula_padre = '$cedula_persona' OR
				cedula_madre = '$cedula_persona'
			";

			$resultado = $conexion->query($sql) or die("error: ".$conexion->error);
			desconectarBD($conexion);
			
			return $resultado->num_rows;
		}




		// 
		// calculos para estadisticas
		// 


		/*	

			El calculo de porcentajes se encuentra separado de las cantidades directas
			
			En el caso de opuestos aplicar (total_padres - nro_obtenido) por ejemplo
			para estudiantes que no tengan canaima 

			Se pueden llamar estas funciones sin parametros, pero si se agregan, deben ir todos

		*/

	
		// Retorna el porcentaje al que equivale la muestra en base al total de padres
		public function get_porcentaje($muestra) {
			// la poblacion es el total de representante

			$poblacion = $this->get_nro_padres();
			$porcentaje = ( $muestra / $poblacion ) * 100;

			return round($porcentaje) . "%";
		}


		// Retorna el número de padres registrados (Se puede filtrar)
		public function get_nro_padres($anio = NULL,$seccion = NULL) {
			$conexion = conectarBD();

			$sub_con = "
				SELECT
					`vista_padres`.`cedula`
				FROM
					`vista_padres`
				INNER JOIN `vista_estudiantes` ON 
					`vista_estudiantes`.`cedula_padre` = `vista_padres`.`cedula` or
					`vista_estudiantes`.`cedula_madre` = `vista_padres`.`cedula`
			";


			// si alguno de los dos se asigna
			if ($anio != NULL or $seccion != NULL) {

				$sub_con .= " WHERE ";

				$fil = [];

				if ($anio != NULL) {
					$fil[] = " `vista_estudiantes`.`grado_a_cursar` = '$anio'";
				}

				if ($seccion != NULL) {
					$fil[] = " `vista_estudiantes`.`seccion` = '$seccion'";
				}

				$sub_con .= implode(" AND ", $fil);

			}


			$sql = "SELECT COUNT(*) as nro_padres FROM ($sub_con) as sub_con";

			$consulta_padre = $conexion->query($sql) or die("error: ".$conexion->error);
			$padre = $consulta_padre->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_padres = $padre["nro_padres"];
		}


		// Retorna el número de padres inscritos (Se puede filtrar)
		public function get_nro_p_empleados($anio = NULL,$seccion = NULL) {
			
			$conexion = conectarBD();

			// Muestra todos los padres que cuenten con un empleo

			$sub_con = "
				SELECT
			    `vista_padres`.`cedula`
				FROM
			    `vista_padres`
				INNER JOIN `vista_estudiantes` ON 
					`vista_estudiantes`.`cedula_padre` = `vista_padres`.`cedula` or 
					`vista_estudiantes`.`cedula_madre` = `vista_padres`.`cedula`
				WHERE
					`vista_padres`.`empleo` != '' 
			";


			// si alguno de los dos se asigna
			if ($anio != NULL or $seccion != NULL) {

				$sub_con .= " AND ";

				$fil = [];

				if ($anio != NULL) {
					$fil[] = " `vista_estudiantes`.`grado_a_cursar` = '$anio'";
				}

				if ($seccion != NULL) {
					$fil[] = " `vista_estudiantes`.`seccion` = '$seccion'";
				}

				$sub_con .= implode(" AND ", $fil);

			}


			// Muestra todos los representantes que cuenten con un empleo
			$sql = "SELECT COUNT(*) as nro_p_empleados FROM ($sub_con) as sub_con";

			$consulta_padre = $conexion->query($sql) or die("error: ".$conexion->error);
			$padre = $consulta_padre->fetch_assoc();

			desconectarBD($conexion);

			return $nro_p_empleados = $padre["nro_p_empleados"];
		}


		// Retorna el número de padres con cierto grado académico (Se puede filtrar)
		public function get_nro_p_g_academico($g_academico,$anio = NULL,$seccion = NULL) {
			$conexion = conectarBD();

			$sub_con = "
				SELECT
					`vista_padres`.`cedula`
				FROM
					`vista_padres`
				INNER JOIN `vista_estudiantes` ON 
					`vista_estudiantes`.`cedula_padre` = `vista_padres`.`cedula` or
					`vista_estudiantes`.`cedula_madre` = `vista_padres`.`cedula`
				WHERE
					`vista_padres`.`grado_academico` = '$g_academico'
			";


			// si alguno de los dos se asigna
			if ($anio != NULL or $seccion != NULL) {

				$sub_con .= " AND ";

				$fil = [];

				if ($anio != NULL) {
					$fil[] = " `vista_estudiantes`.`grado_a_cursar` = '$anio'";
				}

				if ($seccion != NULL) {
					$fil[] = " `vista_estudiantes`.`seccion` = '$seccion'";
				}

				$sub_con .= implode(" AND ", $fil);

			}

			$sql = "SELECT COUNT(*) as `nro_p_g_academico` FROM ($sub_con) as `sub_con`";

			// echo $sql."<br>";

			$consulta_padre = $conexion->query($sql) or die("error: ".$conexion->error);
			$padre = $consulta_padre->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_p_g_academico = $padre["nro_p_g_academico"];
		}


		// Retorna el número de estudiantes en el rango de sueldos minimos que ganan (Se puede filtrar por año y por seccion) 
		public function get_nro_sueldos_rem($sueldos = 1, $exclusivo = false,$anio = NULL,$seccion = NULL,) {
			$conexion = conectarBD();

			$sub_con = "
				SELECT
			    `vista_padres`.`cedula`
				FROM
			    `vista_padres`
				INNER JOIN `vista_estudiantes` ON 
					`vista_estudiantes`.`cedula_padre` = `vista_padres`.`cedula` or
					`vista_estudiantes`.`cedula_madre` = `vista_padres`.`cedula`
				WHERE
					`empleo` != '' AND 
					`remuneracion` >= 0
			";

			// filtra para aquellos representantes que tengan una remuneracion mayor y/o 
			// igual a la especificada siempre y cuando sea mayor a 1
			if ($exclusivo == true) {
				$aux = "=";
			}
			else {
				$aux = ">=";
			}

			$sub_con .= " AND `remuneracion` $aux  $sueldos";


			// si alguno de los dos se asigna
			if ($anio != NULL or $seccion != NULL) {

				$sub_con .= " AND ";

				$fil = [];

				if ($anio != NULL) {
					$fil[] = " `vista_estudiantes`.`grado_a_cursar` = '$anio'";
				}

				if ($seccion != NULL) {
					$fil[] = " `vista_estudiantes`.`seccion` = '$seccion'";
				}

				$sub_con .= implode(" AND ", $fil);

			}

			// Se deben filtrar los desempleados de esta consulta pues tienen 0 como número de sueldos
			$sql = "SELECT COUNT(*) as nro_sueldos_rem FROM ($sub_con) as sub_con";

			$consulta_padre = $conexion->query($sql) or die("error: ".$conexion->error);
			$padre = $consulta_padre->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_sueldos_rem = $padre["nro_sueldos_rem"];
		}


		// Retorna el número de padres con cierto tipo de remuneracion (Se puede filtrar por año y por seccion) 
		public function get_nro_frec_rem($f_remuneracion = "Mensual",$anio = NULL,$seccion = NULL) {
			$conexion = conectarBD();

			$sub_con = "
				SELECT
			    `vista_padres`.`cedula`
				FROM
			    `vista_padres`
				INNER JOIN `vista_estudiantes` ON 
					`vista_estudiantes`.`cedula_padre` = `vista_padres`.`cedula` or
					`vista_estudiantes`.`cedula_madre` = `vista_padres`.`cedula`
				WHERE
					`vista_padres`.`tipo_remuneracion` = '$f_remuneracion'
			";

			// si alguno de los dos se asigna
			if ($anio != NULL or $seccion != NULL) {

				$sub_con .= " AND ";

				$fil = [];

				if ($anio != NULL) {
					$fil[] = " `vista_estudiantes`.`grado_a_cursar` = '$anio'";
				}

				if ($seccion != NULL) {
					$fil[] = " `vista_estudiantes`.`seccion` = '$seccion'";
				}

				$sub_con .= implode(" AND ", $fil);

			}

			// Se deben filtrar los desempleados de esta consulta pues tienen 0 como número de sueldos
			$sql = "SELECT COUNT(*) as nro_frec_rem FROM ($sub_con) as sub_con";

			$consulta_padre = $conexion->query($sql) or die("error: ".$conexion->error);
			$padre = $consulta_padre->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_frec_rem = $padre["nro_frec_rem"];
		}

		
		// Retorna el número de padres con cierto tipo de vivienda (Se puede filtrar)
		public function get_nro_tipo_v($tipo_v,$anio = NULL,$seccion = NULL) {
			$conexion = conectarBD();

			$sub_con = "
				SELECT
					`vista_padres`.`cedula`
				FROM
					`vista_padres`
				INNER JOIN `vista_estudiantes` ON 
					`vista_estudiantes`.`cedula_padre` = `vista_padres`.`cedula` or
					`vista_estudiantes`.`cedula_madre` = `vista_padres`.`cedula`
				WHERE
					`vista_padres`.`tipo` = '$tipo_v'
			";


			// si alguno de los dos se asigna
			if ($anio != NULL or $seccion != NULL) {

				$sub_con .= " AND ";

				$fil = [];

				if ($anio != NULL) {
					$fil[] = " `vista_estudiantes`.`grado_a_cursar` = '$anio'";
				}

				if ($seccion != NULL) {
					$fil[] = " `vista_estudiantes`.`seccion` = '$seccion'";
				}

				$sub_con .= implode(" AND ", $fil);

			}

			$sql = "SELECT COUNT(*) as `nro_tipo_v` FROM ($sub_con) as `sub_con`";

			$consulta_padre = $conexion->query($sql) or die("error: ".$conexion->error);
			$padre = $consulta_padre->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_tipo_v = $padre["nro_tipo_v"];
		}

		
		// Retorna el número de padres con cierta condicion de vivienda (Se puede filtrar)
		public function get_nro_condicion_v($condicion_v,$anio = NULL,$seccion = NULL) {
			$conexion = conectarBD();

			$sub_con = "
				SELECT
					`vista_padres`.`cedula`
				FROM
					`vista_padres`
				INNER JOIN `vista_estudiantes` ON 
					`vista_estudiantes`.`cedula_padre` = `vista_padres`.`cedula` or
					`vista_estudiantes`.`cedula_madre` = `vista_padres`.`cedula`
				WHERE
					`vista_padres`.`condicion` = '$condicion_v'
			";


			// si alguno de los dos se asigna
			if ($anio != NULL or $seccion != NULL) {

				$sub_con .= " AND ";

				$fil = [];

				if ($anio != NULL) {
					$fil[] = " `vista_estudiantes`.`grado_a_cursar` = '$anio'";
				}

				if ($seccion != NULL) {
					$fil[] = " `vista_estudiantes`.`seccion` = '$seccion'";
				}

				$sub_con .= implode(" AND ", $fil);

			}

			$sql = "SELECT COUNT(*) as `nro_condicion_v` FROM ($sub_con) as `sub_con`";

			$consulta_padre = $conexion->query($sql) or die("error: ".$conexion->error);
			$padre = $consulta_padre->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_condicion_v = $padre["nro_condicion_v"];
		}

		
		// Retorna el número de padres con cierta tenencia de vivienda (Se puede filtrar)
		public function get_nro_tenencia_v($tenencia,$anio = NULL,$seccion = NULL) {
			$conexion = conectarBD();

			$sub_con = "
				SELECT
					`vista_padres`.`cedula`
				FROM
					`vista_padres`
				INNER JOIN `vista_estudiantes` ON 
					`vista_estudiantes`.`cedula_padre` = `vista_padres`.`cedula` or
					`vista_estudiantes`.`cedula_madre` = `vista_padres`.`cedula`
			";

			if ($tenencia == "Otra") {
				$sub_con .= "WHERE `tenencia` NOT IN ('Propia','Alquilada','Prestada')";
			}
			else {
				$sub_con .= "WHERE `tenencia` = '$tenencia'";
			}

			// si alguno de los dos se asigna
			if ($anio != NULL or $seccion != NULL) {

				$sub_con .= " AND ";

				$fil = [];

				if ($anio != NULL) {
					$fil[] = " `vista_estudiantes`.`grado_a_cursar` = '$anio'";
				}

				if ($seccion != NULL) {
					$fil[] = " `vista_estudiantes`.`seccion` = '$seccion'";
				}

				$sub_con .= implode(" AND ", $fil);

			}

			$sql = "SELECT COUNT(*) as `nro_tenencia_v` FROM ($sub_con) as `sub_con`";

			$consulta_padre = $conexion->query($sql) or die("error: ".$conexion->error);
			$padre = $consulta_padre->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_tenencia_v = $padre["nro_tenencia_v"];
		}


		// Retorna el número de de representantes con cierto numero de representados (Se puede filtrar)
		public function get_nro_hijos($nro_hijos = 1,$anio = NULL,$seccion = NULL) {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			// Consulta que representantes tienen más de un representado
			
			$aux = [
				"`vista_estudiantes`.`cedula_padre` = `vista_padres`.`cedula` OR`vista_estudiantes`.`cedula_madre` = `vista_padres`.`cedula`"];

			// si alguno de los dos se asigna
			if ($anio != NULL or $seccion != NULL) {

				if ($anio != NULL) {
					$aux[] = " `vista_estudiantes`.`grado_a_cursar` = '$anio'";
				}

				if ($seccion != NULL) {
					$aux[] = " `vista_estudiantes`.`seccion` = '$seccion'";
				}

			}

			$aux = implode(" AND ", $aux);

			$sub_con = "
				SELECT
					COUNT(
						`vista_estudiantes`.`cedula_representante`
					) AS nro_hijos,
					`vista_padres`.`cedula`
				FROM
					`vista_estudiantes`,
					`vista_padres`
				WHERE
					$aux
				GROUP BY
					`vista_padres`.`cedula`
			";

			// Consulta cuantos representantes tienen más de un representado
			$sql = "SELECT COUNT(*) as `nro_hijos` FROM ($sub_con) as subcon WHERE";

			// cuando tengan solo un reprentado
			if ($nro_hijos <= 1 and $nro_hijos < 2) {
				$sql .= "`nro_hijos` = '$nro_hijos'";
			}
			// siempre que tengan al menos el número indicado
			elseif ($nro_hijos > 1) {
				$sql .= "`nro_hijos` >= '$nro_hijos'";
			}

			// echo $sql;

			$consulta_padre = $conexion->query($sql) or die("error: ".$conexion->error);
			$padre = $consulta_padre->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_hijos = $padre["nro_hijos"];
		}


		// Retorna el número de padres con cierta tenencia de vivienda (Se puede filtrar)
		public function get_nro_res_pais() {
			$conexion = conectarBD();

			$sql = "SELECT COUNT(*) as get_nro_res_pais FROM `vista_padres` WHERE `pais_residencia` != ''";


			$consulta_padre = $conexion->query($sql) or die("error: ".$conexion->error);
			$padre = $consulta_padre->fetch_assoc();
			
			desconectarBD($conexion);

			return $nro_tenencia_v = $padre["nro_tenencia_v"];
		}


		// Retorna el número de padres con cierta tenencia de vivienda (Se puede filtrar)
		public function get_nro_p_paises($anio = NULL,$seccion = NULL) {
			$conexion = conectarBD();


			$sql = "
				SELECT
			    `vista_padres`.`pais_residencia`,
			    COUNT(*) as `nro_padres`
				FROM
			    `vista_padres`
				INNER JOIN `vista_estudiantes` ON 
					`vista_estudiantes`.`cedula_padre` = `vista_padres`.`cedula` OR 
					`vista_estudiantes`.`cedula_madre` = `vista_padres`.`cedula`
				
			";


			// si alguno de los dos se asigna
			if ($anio != NULL or $seccion != NULL) {

				$sql .= " WHERE ";

				$fil = [];

				if ($anio != NULL) {
					$fil[] = " `vista_estudiantes`.`grado_a_cursar` = '$anio'";
				}

				if ($seccion != NULL) {
					$fil[] = " `vista_estudiantes`.`seccion` = '$seccion'";
				}

				$sql .= implode(" AND ", $fil);

			}

			$sql .= "GROUP BY `vista_padres`.`pais_residencia`;";

			$consulta_padre = $conexion->query($sql) or die("error: ".$conexion->error);
			$padre = $consulta_padre->fetch_all(MYSQLI_ASSOC);
			
			desconectarBD($conexion);

			return $nro_p_pais = $padre;
		}




		public function get_cedula_persona() {
			return $this->cedula_persona;
		}
		public function get_pais_residencia() {
			return $this->pais_residencia;
		}

		public function set_cedula_persona($cedula_persona) {
			$this->cedula_persona = $cedula_persona;
		}
		public function set_pais_residencia($pais_residencia) {
			$this->pais_residencia = $pais_residencia;
		}

	}

?>