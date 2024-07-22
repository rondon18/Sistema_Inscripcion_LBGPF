<?php  

	class padres {
		private $cedula_persona;
		private $pais_residencia;

		public function __construct() {}

		public function insertar_padres() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());
					$pais_residencia = mysqli_escape_string($conexion,$this->get_pais_residencia());

					$sql = "INSERT INTO `padres`(`cedula_persona`,`pais_residencia`) VALUES('$cedula_persona', '$pais_residencia') ON DUPLICATE KEY UPDATE `cedula_persona` = `cedula_persona`;";
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$conexion->query($sql);
						desconectarBD($conexion);
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function editar_padres() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());
					$pais_residencia = mysqli_escape_string($conexion,$this->get_pais_residencia());

					$sql = "INSERT INTO `padres` (`cedula_persona`,`pais_residencia`) VALUES('$cedula_persona','$pais_residencia') ON DUPLICATE KEY UPDATE `cedula_persona` = `cedula_persona`, `pais_residencia` = '$pais_residencia';";
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$conexion->query($sql);
						desconectarBD($conexion);
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function mostrar_padres() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sql = "SELECT * FROM `vista_padres`";
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$resultado = $conexion->query($sql);
						$lista_padres = $resultado->fetch_all(MYSQLI_ASSOC);
						desconectarBD($conexion);
						return $lista_padres;
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $lista_padres = [];
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return $lista_padres = [];
			}
		}

		public function consultar_padres() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());
					$sql = "SELECT * FROM `vista_padres` WHERE `cedula` = '$cedula_persona'";
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_padre = $conexion->query($sql);
						$padre = $consulta_padre->fetch_assoc();
						desconectarBD($conexion);
						return $padre;
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function mostrar_hijos() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());
					$sql = "SELECT `cedula`,`p_nombre`, `p_apellido`, `grado_a_cursar` FROM `vista_estudiantes` WHERE cedula_padre = '$cedula_persona' OR cedula_madre = '$cedula_persona'";
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$resultado = $conexion->query($sql);
						$lista_hijos = $resultado->fetch_all(MYSQLI_ASSOC);
						desconectarBD($conexion);
						return $lista_hijos;
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function contar_hijos() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());
					$sql = "SELECT * FROM `vista_estudiantes` WHERE cedula_padre = '$cedula_persona' OR cedula_madre = '$cedula_persona'";
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$resultado = $conexion->query($sql);
						desconectarBD($conexion);
						return $resultado->num_rows;
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return 0;
			}
		}

		// 
		// calculos para estadisticas
		// 

		/*
			-El calculo de porcentajes se encuentra separado de las cantidades directas
			-En el caso de opuestos aplicar (total_padres - nro_obtenido) por ejemplo para estudiantes que no tengan canaima
			-Se pueden llamar estas funciones sin parametros, pero si se agregan, deben ir todos
		*/

	
		// Retorna el porcentaje al que equivale la muestra en base al total de padres
		public function get_porcentaje($muestra) {
			try {
				// la poblacion es el total de representante
				$poblacion = mysqli_escape_string($conexion,$this->get_nro_padres());
				if ($muestra == 0) {
					throw new Exception("División entre cero no permitida. Verificar muestra ($muestra)");
				}
				if ($poblacion == 0) {
					throw new Exception("División entre cero no permitida. Verificar poblacion ($poblacion)");
				}
				$porcentaje = ( $muestra / $poblacion ) * 100;
				return round($porcentaje) . "%";
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		// Retorna el número de padres registrados (Se puede filtrar)
		public function get_nro_padres($anio = NULL,$seccion = NULL) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sub_con = "SELECT `vista_padres`.`cedula` FROM `vista_padres` INNER JOIN `vista_estudiantes` ON  `vista_estudiantes`.`cedula_padre` = `vista_padres`.`cedula` or `vista_estudiantes`.`cedula_madre` = `vista_padres`.`cedula`";

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
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_padre = $conexion->query($sql);
						$padre = $consulta_padre->fetch_assoc();
						desconectarBD($conexion);
						return $nro_padres = $padre["nro_padres"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return 0;
			}
		}

		// Retorna el número de padres inscritos (Se puede filtrar)
		public function get_nro_p_empleados($anio = NULL,$seccion = NULL) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sub_con = "SELECT `vista_padres`.`cedula` FROM `vista_padres` INNER JOIN `vista_estudiantes` ON  `vista_estudiantes`.`cedula_padre` = `vista_padres`.`cedula` or  `vista_estudiantes`.`cedula_madre` = `vista_padres`.`cedula` WHERE `vista_padres`.`empleo` != ''";

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
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_padre = $conexion->query($sql);
						$padre = $consulta_padre->fetch_assoc();
						desconectarBD($conexion);
						return $nro_padres = $padre["nro_p_empleados"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return 0;
			}
		}

		// Retorna el número de padres con cierto grado académico (Se puede filtrar)
		public function get_nro_p_g_academico($g_academico,$anio = NULL,$seccion = NULL) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					// Escapado de la cadena
					$g_academico = mysqli_escape_string($conexion,$g_academico);
					$sub_con = "SELECT `vista_padres`.`cedula` FROM `vista_padres` INNER JOIN `vista_estudiantes` ON  `vista_estudiantes`.`cedula_padre` = `vista_padres`.`cedula` or `vista_estudiantes`.`cedula_madre` = `vista_padres`.`cedula` WHERE `vista_padres`.`grado_academico` = '$g_academico'";

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
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_padre = $conexion->query($sql);
						$padre = $consulta_padre->fetch_assoc();
						desconectarBD($conexion);
						return $nro_padres = $padre["nro_p_g_academico"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return 0;
			}
		}

		// Retorna el número de estudiantes en el rango de sueldos minimos que ganan (Se puede filtrar por año y por seccion) 
		public function get_nro_sueldos_rem($sueldos = 1, $exclusivo = false,$anio = NULL,$seccion = NULL,) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {

					if (!is_numeric($sueldos)) {
						throw new Exception("El número de sueldos debe ser númerico");
					}
					if (!is_bool($exclusivo)) {
						throw new Exception("El filtro exclusivo debe ser booleano");
					}

					// Escapado de la cadena
					$sueldos = mysqli_escape_string($conexion,$sueldos);
					$sub_con = "SELECT `vista_padres`.`cedula` FROM `vista_padres` INNER JOIN `vista_estudiantes` ON  `vista_estudiantes`.`cedula_padre` = `vista_padres`.`cedula` or `vista_estudiantes`.`cedula_madre` = `vista_padres`.`cedula` WHERE `empleo` != '' AND  `remuneracion` >= 0";

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
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_padre = $conexion->query($sql);
						$padre = $consulta_padre->fetch_assoc();
						desconectarBD($conexion);
						return $nro_padres = $padre["nro_sueldos_rem"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return 0;
			}
		}

		// Retorna el número de padres con cierto tipo de remuneracion (Se puede filtrar por año y por seccion) 
		public function get_nro_frec_rem($f_remuneracion = "Mensual",$anio = NULL,$seccion = NULL) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$opciones = ["diaria","semanal","quincenal","mensual"];
					if (!in_array(strtolower($f_remuneracion),$opciones)) {
						throw new Exception("La frecuencia de remuneración ($f_remuneracion) no está en las opciones válidas");
					}
					$f_remuneracion = mysqli_escape_string($conexion,$f_remuneracion);

					$sub_con = "SELECT `vista_padres`.`cedula` FROM `vista_padres` INNER JOIN `vista_estudiantes` ON  `vista_estudiantes`.`cedula_padre` = `vista_padres`.`cedula` or `vista_estudiantes`.`cedula_madre` = `vista_padres`.`cedula` WHERE `vista_padres`.`tipo_remuneracion` = '$f_remuneracion'";

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
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_padre = $conexion->query($sql);
						$padre = $consulta_padre->fetch_assoc();
						desconectarBD($conexion);
						return $nro_padres = $padre["nro_frec_rem"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return 0;
			}
		}

		
		// Retorna el número de padres con cierto tipo de vivienda (Se puede filtrar)
		public function get_nro_tipo_v($tipo_v,$anio = NULL,$seccion = NULL) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$opciones = ["casa","apartamento","rancho","quinta","habitación", "otro"];
					if (!in_array(strtolower($tipo_v),$opciones)) {
						throw new Exception("La frecuencia de remuneración ($tipo_v) no está en las opciones válidas");
					}
					elseif (strtolower($tipo_v) == "otro") {
						$sub_con = "SELECT `vista_padres`.`cedula` FROM `vista_padres` INNER JOIN `vista_estudiantes` ON  `vista_estudiantes`.`cedula_padre` = `vista_padres`.`cedula` or `vista_estudiantes`.`cedula_madre` = `vista_padres`.`cedula` WHERE `vista_padres`.`tipo` = NOT IN('casa','apartamento','rancho','quinta','habitación')";
					}
					else {
						$tipo_v = mysqli_escape_string($conexion,$tipo_v);
						$sub_con = "SELECT `vista_padres`.`cedula` FROM `vista_padres` INNER JOIN `vista_estudiantes` ON  `vista_estudiantes`.`cedula_padre` = `vista_padres`.`cedula` or `vista_estudiantes`.`cedula_madre` = `vista_padres`.`cedula` WHERE `vista_padres`.`tipo` = '$tipo_v'";
						// si alguno de los dos se asigna
					}
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
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_padre = $conexion->query($sql);
						$padre = $consulta_padre->fetch_assoc();
						desconectarBD($conexion);
						return $nro_padres = $padre["nro_tipo_v"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return 0;
			}
		}

		
		// Retorna el número de padres con cierta condicion de vivienda (Se puede filtrar)
		public function get_nro_condicion_v($condicion_v,$anio = NULL,$seccion = NULL) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$opciones = ["buena","mala","regular"];
					if (!in_array(strtolower($condicion_v),$opciones)) {
						throw new Exception("La frecuencia de remuneración ($condicion_v) no está en las opciones válidas");
					}
					$condicion_v = mysqli_escape_string($conexion,$condicion_v);
					$sub_con = "SELECT `vista_padres`.`cedula` FROM `vista_padres` INNER JOIN `vista_estudiantes` ON  `vista_estudiantes`.`cedula_padre` = `vista_padres`.`cedula` or `vista_estudiantes`.`cedula_madre` = `vista_padres`.`cedula` WHERE `vista_padres`.`condicion` = '$condicion_v'";

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
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_padre = $conexion->query($sql);
						$padre = $consulta_padre->fetch_assoc();
						desconectarBD($conexion);
						return $nro_padres = $padre["nro_condicion_v"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return 0;
			}
		}

		
		// Retorna el número de padres con cierta tenencia de vivienda (Se puede filtrar)
		public function get_nro_tenencia_v($tenencia,$anio = NULL,$seccion = NULL) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$opciones = ["propia","alquilada","prestada","otra"];
					if (!in_array(strtolower($tenencia),$opciones)) {
						throw new Exception("La tenencia de vivienda ($tenencia) no está en las opciones válidas");
					}
					elseif (strtolower($tenencia) == "otra") {
						$sub_con = "SELECT `vista_padres`.`cedula` FROM `vista_padres` INNER JOIN `vista_estudiantes` ON  `vista_estudiantes`.`cedula_padre` = `vista_padres`.`cedula` or `vista_estudiantes`.`cedula_madre` = `vista_padres`.`cedula` WHERE `tenencia` NOT IN ('Propia','Alquilada','Prestada')";
					}
					else {
						$tenencia = mysqli_escape_string($conexion,$tenencia);
						$sub_con = "SELECT `vista_padres`.`cedula` FROM `vista_padres` INNER JOIN `vista_estudiantes` ON  `vista_estudiantes`.`cedula_padre` = `vista_padres`.`cedula` or `vista_estudiantes`.`cedula_madre` = `vista_padres`.`cedula` WHERE `tenencia` = '$tenencia'";
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
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_padre = $conexion->query($sql);
						$padre = $consulta_padre->fetch_assoc();
						desconectarBD($conexion);
						return $nro_padres = $padre["nro_tenencia_v"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return 0;
			}
		}

		// Retorna el número de de representantes con cierto numero de representados (Se puede filtrar)
		public function get_nro_hijos($nro_hijos = 1,$anio = NULL,$seccion = NULL) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$aux = ["`vista_estudiantes`.`cedula_padre` = `vista_padres`.`cedula` OR`vista_estudiantes`.`cedula_madre` = `vista_padres`.`cedula`"];

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
					$sub_con = "SELECT COUNT(`vista_estudiantes`.`cedula_representante`) AS nro_hijos, `vista_padres`.`cedula` FROM `vista_estudiantes`, `vista_padres` WHERE $aux GROUP BY `vista_padres`.`cedula`";

					// Consulta cuantos representantes tienen más de un representado
					$sql = "SELECT COUNT(*) as `nro_hijos` FROM ($sub_con) as subcon WHERE";

					// cuando tengan solo un reprentado
					if ($nro_hijos == 1 and $nro_hijos < 2) {
						$sql .= "`nro_hijos` = '$nro_hijos'";
					}
					// siempre que tengan al menos el número indicado
					elseif ($nro_hijos > 1) {
						$sql .= "`nro_hijos` >= '$nro_hijos'";
					}
					elseif ($nro_hijos == 0) {
						$sql = "SELECT COUNT(`cedula_persona`) as nro_hijos FROM `padres` WHERE `cedula_persona` not in(Select cedula_padre from estudiantes) and `cedula_persona` not in(Select cedula_madre from estudiantes);";
					}
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_padre = $conexion->query($sql);
						$padre = $consulta_padre->fetch_assoc();
						desconectarBD($conexion);
						return $nro_padres = $padre["nro_hijos"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return 0;
					}

				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return 0;
			}
		}

		// Retorna el número de padres con cierta tenencia de vivienda (Se puede filtrar)
		public function get_nro_p_paises($anio = NULL,$seccion = NULL) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sql = "SELECT `vista_padres`.`pais_residencia`, COUNT(*) as `nro_padres` FROM `vista_padres` INNER JOIN `vista_estudiantes` ON  `vista_estudiantes`.`cedula_padre` = `vista_padres`.`cedula` OR  `vista_estudiantes`.`cedula_madre` = `vista_padres`.`cedula`";
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
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_padre = $conexion->query($sql);
						$padre = $consulta_padre->fetch_all(MYSQLI_ASSOC);
						desconectarBD($conexion);
						return $nro_p_pais = $padre;
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						$nro_p_pais = [];
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				$nro_p_pais = [];
			}
		}

		public function get_cedula_persona() {
			return $this->cedula_persona;
		}

		public function get_pais_residencia() {
			return $this->pais_residencia;
		}

		public function set_cedula_persona($cedula_persona) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($cedula_persona)) {
					throw new Exception("El número de cédula no puede estar vacío");
				}

				// Validar la longitud y el formato de la cédula
				if (strlen($cedula_persona) < 4 || strlen($cedula_persona) > 11 || !preg_match('/^(V|E)[0-9]+$/', $cedula_persona)) {
					throw new Exception("El número de cédula $cedula_persona tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->cedula_persona = $cedula_persona;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function set_pais_residencia($pais_residencia = "Venezuela") {
			try {
				if (empty($pais_residencia)) {
					$this->pais_residencia = $pais_residencia;
					return;
				}
				// Validar la longitud y el formato del dato
				if (strlen($pais_residencia) < 3 || strlen($pais_residencia) >= 200 || !preg_match('/^[\w\sàáâãéèêëìíîïòóôõùúûüÀÁÂÃÉÈÊËÌÍÎÏÒÓÔÕÙÚÛÜñÑª\!\"\'\-\#\&\(\)\,\.\;\¿\¡\!\?\`\°\/\:\|]+$/i', $pais_residencia)) {
					throw new Exception("El país de residencia ($pais_residencia) cuenta con un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->pais_residencia = $pais_residencia;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

	}

?>