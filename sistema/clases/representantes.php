<?php  

	class representantes {
		
		// 

		private $cedula_persona;


		// CONSTRUCTOR
		public function _construct() {}


		public function insertar_representante() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());

					$sql = "
						INSERT INTO `representantes`(`cedula_persona`)
						VALUES('$cedula_persona')
						ON DUPLICATE KEY UPDATE
						`cedula_persona` = `cedula_persona`;
					";

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

		public function mostrar_representantes() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());

					$sql = "SELECT * FROM `vista_representantes`";

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$resultado = $conexion->query($sql);
						$lista_representantes = $resultado->fetch_all(MYSQLI_ASSOC);
						desconectarBD($conexion);
						return $lista_representantes;
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $lista_representantes = [];
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}


		public function filtrar_representantes() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());

					$sql = "
						SELECT
							`cedula`,
							`p_nombre`,
							`s_nombre`,
							`p_apellido`,
							`s_apellido`,
							date_format(`fecha_nacimiento`, '%d-%m-%Y') as fecha_nacimiento,
							`lugar_nacimiento`,
							`genero`,
							`estado_civil`,
							`email`,
							`estado`,
							`municipio`,
							`parroquia`,
							`sector`,
							`calle`,
							`nro_casa`,
							`punto_referencia`,
							CONCAT(
								`codigo_carnet`,
								' - ',
								`serial_carnet`
							) AS carnet_patria,
							`grado_academico`,
							`empleo`,
							`lugar_trabajo`,
							`remuneracion`,
							`tipo_remuneracion`,
							`condicion`,
							`tipo`,
							`tenencia`,
							`banco`,
							`tipo_cuenta`,
							`nro_cuenta`,
							CONCAT(
								`nombre_aux`,
								' ',
								`apellido_aux`
							) AS nombres_aux,
							`relacion_aux`,
							CONCAT(
								`pref_aux`,
								'-',
								`numero_aux`
							) AS tlf_auxiliar
						FROM
							`vista_representantes`
					";

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$resultado = $conexion->query($sql);
						$lista_representantes = $resultado->fetch_all(MYSQLI_ASSOC);
						desconectarBD($conexion);
						return $lista_representantes;
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $lista_representantes = [];
					}

				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}


		public function consultar_representantes() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());

					$sql = "SELECT * FROM `vista_representantes` WHERE `cedula` = '$cedula_persona'";

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_representante = $conexion->query($sql);
						$representante = $consulta_representante->fetch_assoc();
						desconectarBD($conexion);
						return $representante;
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $representante;
					}

				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function verificar_representantes() {

			$check = $this->consultar_representantes();
			if ($check != null) {
				return true;
			}
			else {
				return false;
			}

		}


		public function mostrar_representados() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());

					$sql = "
						SELECT
							`cedula`,
							`p_nombre`,
							`s_nombre`,
							`p_apellido`,
							`s_apellido`,
							`grado_a_cursar`
						FROM
							`vista_estudiantes`
						WHERE
							cedula_representante = '$cedula_persona';
						";

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$resultado = $conexion->query($sql);
						$lista_representados = $resultado->fetch_all(MYSQLI_ASSOC);
						desconectarBD($conexion);
						return $lista_representados;
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $lista_representados = [];
					}

				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}


		public function contar_representados() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());

					$sql = "
						SELECT
							*
						FROM
							`vista_estudiantes`
						WHERE
							cedula_representante = '$cedula_persona';
						";

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$resultado = $conexion->query($sql);
						$lista_representantes = $resultado->fetch_all(MYSQLI_ASSOC);
						desconectarBD($conexion);
						$resultado->num_rows;
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


		// 
		// calculos para estadisticas
		// 


		/*	

			El calculo de porcentajes se encuentra separado de las cantidades directas
			
			En el caso de opuestos aplicar (total_representantes - nro_obtenido) por ejemplo
			para estudiantes que no tengan canaima 

			Se pueden llamar estas funciones sin parametros, pero si se agregan, deben ir todos

		*/

	
		// Retorna el porcentaje al que equivale la muestra en base al total de representantes
		public function get_porcentaje($muestra) {
			// la poblacion es el total de representante
			try {
				$poblacion = $this->get_nro_representantes();
				if ($poblacion == 0) {
					throw new Exception("Divicion entre 0 no permitida", 1);
				}
				$porcentaje = ( $muestra / $poblacion ) * 100;
				return round($porcentaje) . "%";
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}


		// Retorna el número de representantes registrados (Se puede filtrar)
		public function get_nro_representantes($anio = NULL,$seccion = NULL) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());

					$sub_con = "
						SELECT
					    `vista_representantes`.`cedula`
						FROM
					    `vista_representantes`
						INNER JOIN `vista_estudiantes` ON
							`vista_estudiantes`.`cedula_representante` = `vista_representantes`.`cedula`
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


					$sql = "SELECT COUNT(*) as nro_representantes FROM ($sub_con) as sub_con";

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_representante = $conexion->query($sql);
						$representante = $consulta_representante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_representantes = $representante["nro_representantes"];
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


		// Retorna el número de representantes inscritos (Se puede filtrar)
		public function get_nro_r_empleados($anio = NULL,$seccion = NULL) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());

					$sub_con = "
						SELECT
					    `vista_representantes`.`cedula`
						FROM
					    `vista_representantes`
						INNER JOIN `vista_estudiantes` ON
							`vista_estudiantes`.`cedula_representante` = `vista_representantes`.`cedula`
						WHERE
							`vista_representantes`.`empleo` != ''
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
					$sql = "SELECT COUNT(*) as nro_r_empleados FROM ($sub_con) as sub_con";

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_representante = $conexion->query($sql);
						$representante = $consulta_representante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_r_empleados = $representante["nro_r_empleados"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $lista_representantes = [];
					}

				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}

		}


		// Retorna el número de representantes con cierto grado académico (Se puede filtrar)
		public function get_nro_r_g_academico($g_academico,$anio = NULL,$seccion = NULL) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());

					$sub_con = "
						SELECT
					    `vista_representantes`.`cedula`
						FROM
					    `vista_representantes`
						INNER JOIN `vista_estudiantes` ON
							`vista_estudiantes`.`cedula_representante` = `vista_representantes`.`cedula`
						WHERE
							`vista_representantes`.`grado_academico` = '$g_academico'
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

					$sql = "SELECT COUNT(*) as `nro_r_g_academico` FROM ($sub_con) as `sub_con`";

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_representante = $conexion->query($sql);
						$representante = $consulta_representante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_r_g_academico = $representante["nro_r_g_academico"];
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


		// Retorna el número de estudiantes en el rango de sueldos minimos que ganan (Se puede filtrar por año y por seccion)
		public function get_nro_sueldos_rem($sueldos = 1, $exclusivo = false,$anio = NULL,$seccion = NULL) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());

					$sub_con = "
						SELECT
					    `vista_representantes`.`cedula`
						FROM
					    `vista_representantes`
						INNER JOIN `vista_estudiantes` ON
							`vista_estudiantes`.`cedula_representante` = `vista_representantes`.`cedula`
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

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_representante = $conexion->query($sql);
						$representante = $consulta_representante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_sueldos_rem = $representante["nro_sueldos_rem"];
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


		// Retorna el número de representantes con cierto tipo de remuneracion (Se puede filtrar por año y por seccion) 
		public function get_nro_frec_rem($f_remuneracion = "Mensual",$anio = NULL,$seccion = NULL) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());

					$sub_con = "
						SELECT
					    `vista_representantes`.`cedula`
						FROM
					    `vista_representantes`
						INNER JOIN `vista_estudiantes` ON
							`vista_estudiantes`.`cedula_representante` = `vista_representantes`.`cedula`
						WHERE
							`vista_representantes`.`tipo_remuneracion` = '$f_remuneracion'
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

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_representante = $conexion->query($sql);
						$representante = $consulta_representante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_frec_rem = $representante["nro_frec_rem"];
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

		
		// Retorna el número de representantes con carnet de la patria (Se puede filtrar)
		public function get_nro_r_c_carnet_p($anio = NULL,$seccion = NULL) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());

					$sub_con = "
						SELECT
					    `vista_representantes`.`cedula`
						FROM
					    `vista_representantes`
						INNER JOIN `vista_estudiantes` ON
							`vista_estudiantes`.`cedula_representante` = `vista_representantes`.`cedula`
						WHERE
							`vista_representantes`.`codigo_carnet` != '' AND
							`vista_representantes`.`serial_carnet` != ''
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

					$sql = "SELECT COUNT(*) as `nro_r_c_carnet_p` FROM ($sub_con) as `sub_con`";

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_representante = $conexion->query($sql);
						$representante = $consulta_representante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_r_c_carnet_p = $representante["nro_r_c_carnet_p"];
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

		
		// Retorna el número de representantes con cierto tipo de vivienda (Se puede filtrar)
		public function get_nro_tipo_v($tipo_v,$anio = NULL,$seccion = NULL) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());

					$sub_con = "
						SELECT
					    `vista_representantes`.`cedula`
						FROM
					    `vista_representantes`
						INNER JOIN `vista_estudiantes` ON
							`vista_estudiantes`.`cedula_representante` = `vista_representantes`.`cedula`
						WHERE
							`vista_representantes`.`tipo` = '$tipo_v'
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

					$sql = "SELECT COUNT(*) as nro_tipo_v FROM ($sub_con) as subcon";

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_representante = $conexion->query($sql);
						$representante = $consulta_representante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_tipo_v = $representante["nro_tipo_v"];
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

		
		// Retorna el número de representantes con cierta condicion de vivienda (Se puede filtrar)
		public function get_nro_condicion_v($condicion_v,$anio = NULL,$seccion = NULL) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());

					$sub_con = "
						SELECT
					    `vista_representantes`.`cedula`
						FROM
					    `vista_representantes`
						INNER JOIN `vista_estudiantes` ON
							`vista_estudiantes`.`cedula_representante` = `vista_representantes`.`cedula`
						WHERE
							`vista_representantes`.`condicion` = '$condicion_v'
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

					$sql = "SELECT COUNT(*) as nro_condicion_v FROM ($sub_con) as subcon";

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_representante = $conexion->query($sql);
						$representante = $consulta_representante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_condicion_v = $representante["nro_condicion_v"];
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

		
		// Retorna el número de representantes con cierta tenencia de vivienda (Se puede filtrar)
		public function get_nro_tenencia_v($tenencia,$anio = NULL,$seccion = NULL) {

			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());

					$sub_con = "
						SELECT
					    `vista_representantes`.`cedula`
						FROM
					    `vista_representantes`
						INNER JOIN `vista_estudiantes` ON
							`vista_estudiantes`.`cedula_representante` = `vista_representantes`.`cedula`
						WHERE
							`vista_representantes`.`tenencia` = '$tenencia'
					";

					if ($tenencia == "Otra") {
						$sub_con .= "AND `tenencia` NOT IN ('Propia','Alquilada','Prestada')";
					}
					else {
						$sub_con .= "AND `tenencia` = '$tenencia'";
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

					$sql = "SELECT COUNT(*) as nro_tenencia_v FROM ($sub_con) as subcon";

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_representante = $conexion->query($sql);
						$representante = $consulta_representante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_tenencia_v = $representante["nro_tenencia_v"];
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

		
		// Retorna el número de de representantes con cierto numero de representados (Se puede filtrar)
		public function get_nro_representados($nro_representados = 1,$anio = NULL,$seccion = NULL) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());

					// Consulta que representantes tienen más de un representado

					$aux = ["`vista_estudiantes`.`cedula_representante` = `vista_representantes`.`cedula`"];

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
							) AS nro_representados,
							`vista_representantes`.`cedula`
						FROM
							`vista_estudiantes`,
							`vista_representantes`
						WHERE
							$aux
						GROUP BY
							`vista_representantes`.`cedula`
					";

					// Consulta cuantos representantes tienen más de un representado
					$sql = "SELECT COUNT(*) as `nro_representados` FROM ($sub_con) as subcon WHERE";

					// cuando tengan solo un reprentado
					if ($nro_representados <= 1 and $nro_representados < 2) {
						$sql .= "`nro_representados` = '$nro_representados'";
					}
					// siempre que tengan al menos el número indicado
					elseif ($nro_representados > 1) {
						$sql .= "`nro_representados` >= '$nro_representados'";
					}

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_representante = $conexion->query($sql) or die("error: ".$conexion->error);
						$representante = $consulta_representante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_representados = $representante["nro_representados"];
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

		// Retorna el número de de representantes que no tienen representados asociados (Se puede filtrar)
		public function get_nro_sin_representados($anio = NULL,$seccion = NULL) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {

					// Toma valores de métodos ya existentes
					$solo_uno = $this->get_nro_representados(1);
					$mas_uno = $this->get_nro_representados(2);
					$total = $this->get_nro_representantes();

					$nro_sin_representados = $total - ($solo_uno + $mas_uno);

					return $nro_sin_representados;
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}


		}
		
		// Retorna el número de de representantes que no tienen representados asociados (Se puede filtrar)
		public function get_nro_r_municipio($municipio,$anio = NULL,$seccion = NULL) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());

					$sub_con = "
						SELECT
					    `vista_representantes`.`cedula`
						FROM
					    `vista_representantes`
						INNER JOIN `vista_estudiantes` ON
							`vista_estudiantes`.`cedula_representante` = `vista_representantes`.`cedula`
						WHERE
					";

					if ($municipio != "Otro") {
						$sub_con .= " `vista_representantes`.`municipio` = '$municipio' ";
					}

					else {
						$sub_con .= " `vista_representantes`.`municipio` NOT IN ('AAD','ABE','APS','ARI','ACH','CEL','CPO','CQU','GUA','JCS','JBR','LIB','MIR','ORL','PNO','PLL','RAN','RDA','SMA','SUC','TOV','TFC','ZEA') ";
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

					$sql = "SELECT COUNT(*) as nro_r_municipio FROM ($sub_con) as subcon";

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_representante = $conexion->query($sql);
						$representante = $consulta_representante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_r_municipio = $representante["nro_r_municipio"];
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

		// 
		// Getters y setters de la clase sin ningun calculo
		// 

		// GETTERS
		public function get_cedula_persona() {
			return $this->cedula_persona;
		} 

		// SETTERS
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

		
	}

?>