<?php  

	class estudiantes {

		private $cedula_persona;
		private $plantel_proced;
		private $con_quien_vive;
		private $relacion_representante;
		private $cedula_padre;
		private $cedula_madre;
		private $cedula_representante;
		private $estado;

		// CONSTRUCTOR
		public function __construct() {}

		// manejo de base de datos
		public function insertar_estudiantes() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());
					$plantel_proced = mysqli_escape_string($conexion,$this->get_plantel_proced());
					$con_quien_vive = mysqli_escape_string($conexion,$this->get_con_quien_vive());
					$relacion_representante = mysqli_escape_string($conexion,$this->get_relacion_representante());
					$cedula_padre = mysqli_escape_string($conexion,$this->get_cedula_padre());
					$cedula_madre = mysqli_escape_string($conexion,$this->get_cedula_madre());
					$cedula_representante = mysqli_escape_string($conexion,$this->get_cedula_representante());

					$sql = "
						INSERT INTO `estudiantes`(
							`cedula_persona`,
							`plantel_proced`,
							`con_quien_vive`,
							`relacion_representante`,
							`cedula_padre`,
							`cedula_madre`,
							`cedula_representante`
						)
						VALUES(
							'$cedula_persona',
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
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$conexion->query($sql);
						desconectarBD($conexion);
						$this->corregir_c_madres();
						$this->set_estado("Inscrito");
						$this->cambiar_estado();
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
		public function editar_estudiantes() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());

					$plantel_proced = mysqli_escape_string($conexion,$this->get_plantel_proced());
					$con_quien_vive = mysqli_escape_string($conexion,$this->get_con_quien_vive());
					$relacion_representante = mysqli_escape_string($conexion,$this->get_relacion_representante());
					$cedula_padre = mysqli_escape_string($conexion,$this->get_cedula_padre());
					$cedula_madre = mysqli_escape_string($conexion,$this->get_cedula_madre());
					$cedula_representante = mysqli_escape_string($conexion,$this->get_cedula_representante());
					/*
						Debido a un error al asignar la cédula de la madre, ando haciendo esto.
						La cédula de la madre estuvo asignandose con la cédula del padre, y esto pasa con todas las ediciones
						al parecer. En ese caso se va a tener en cuenta la relacion del representante, en este caso como solo ocurre
						si el representante es la madre, se va a
					*/
					if ($cedula_madre == $cedula_padre) {
						if ($relacion_representante == "Madre") {
							$cedula_madre = $cedula_representante;
						}
						// elseif ($relacion_representante == "Padre") {
						// 	$cedula_padre = $cedula_representante;
						// }
					}
					$sql = "
						UPDATE
							`estudiantes`
						SET

							`plantel_proced` = '$plantel_proced',
							`con_quien_vive` = '$con_quien_vive',
							`relacion_representante` = '$relacion_representante',
							`cedula_padre` = '$cedula_padre',
							`cedula_madre` = '$cedula_madre',
							`cedula_representante` = '$cedula_representante'
						WHERE
							`cedula_persona` = '$cedula_persona'
					";
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$conexion->query($sql);
						desconectarBD($conexion);
						$this->corregir_c_madres();
						$this->set_estado("Inscrito");
						$this->cambiar_estado();
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
		public function cambiar_estado() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());
					$estado = mysqli_escape_string($conexion,$this->get_estado());
					$sql = "UPDATE `estudiantes` SET `estado` = '$estado' WHERE `cedula_persona` = '$cedula_persona' ";
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
		public function mostrar_estudiantes() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sql = "
						SELECT
							*
						FROM
							`vista_estudiantes`
						ORDER BY
							`id_per_academico` DESC,
							`grado_a_cursar` ASC,
							`seccion` ASC,
							`cedula` ASC
					";
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$resultado = $conexion->query($sql);
						$lista_estudiantes = $resultado->fetch_all(MYSQLI_ASSOC);
						desconectarBD($conexion);
						return $lista_estudiantes;
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $lista_estudiantes = [];
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function contar_estudiantes() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sql = "SELECT COUNT(*) as nro_estudiantes FROM `vista_estudiantes`";
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$resultado = $conexion->query($sql);
						$conteo = $resultado->fetch_assoc();
						desconectarBD($conexion);
						return $conteo["nro_estudiantes"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $conteo = 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function filtrar_estudiantes($grado = "Cualquiera", $seccion = "Cualquiera", $genero = "Cualquiera") {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					// Opciones validas para los filtros
					$grados = ["primer año","segundo año","tercer año","cuarto año","quinto año","cualquiera"];
					$secciones = ["a","b","c","d","cualquiera"];
					$generos = ["m","f","cualquiera"];
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
							`estado`,
							`municipio`,
							`parroquia`,
							`sector`,
							`calle`,
							`nro_casa`,
							`punto_referencia`,
							CONCAT(`codigo_carnet`, ' - ', `serial_carnet`) AS carnet_patria,
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
							`id_per_academico`,
							`estado_inscripcion`
						FROM
							`vista_estudiantes`
					";
					// Filtros de consulta
					$filtros = [];
					// filtro de grado
					if ($grado != "Cualquiera") {
						// Comprueba que el filtro este en las opciones validas
						if (!in_array(strtolower($grado), $grados)) {
							throw new Exception("El Grado: ($grado) no esta entre las opciones validas");
						}
						$filtros[] = "`grado_a_cursar` = '$grado'";
					}
					// filtro de seccion
					if ($seccion != "Cualquiera") {
						// Comprueba que el filtro este en las opciones validas
						if (!in_array(strtolower($seccion), $secciones)) {
							throw new Exception("La Seccion: ($seccion) no esta entre las opciones validas");
						}
						$filtros[] = "`seccion` = '$seccion'";
					}
					// filtro de genero
					if ($genero != "Cualquiera") {
						// Comprueba que el filtro este en las opciones validas
						if (!in_array(strtolower($genero), $generos)) {
							throw new Exception("El Genero: ($genero) no esta entre las opciones validas");
						}
						$filtros[] = "`genero` = '$genero'";
					}
					// Si hay al menos un filtro, agrega la clausula where
					if (count($filtros) > 0) {
						$sql .= " WHERE " . implode(" AND ", $filtros);
					}
					// Agrega el ordenamiento de la consulta
					$sql .= "
						ORDER BY
							`id_per_academico` DESC,
							`grado_a_cursar` ASC,
							`seccion` ASC,
							`cedula` ASC
					";
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$resultado = $conexion->query($sql);
						$lista_estudiantes = $resultado->fetch_all(MYSQLI_ASSOC);
						desconectarBD($conexion);
						return $lista_estudiantes;
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $lista_estudiantes = [];
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return $lista_estudiantes = [];
			}
		}
		public function consultar_estudiantes() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					// Escapado de los parametros
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());

					$sql = "SELECT * FROM `vista_estudiantes` WHERE `cedula` = '$cedula_persona'";

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_estudiante = $conexion->query($sql);
						$estudiante = $consulta_estudiante->fetch_assoc();
						desconectarBD($conexion);
						return $estudiante;
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $estudiante = [];
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function corregir_c_madres() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					/*
						Luego se debe comprobar que no hayan registros con ese error en la base de datos
						a lo que se consulta si existe algún registro con ese error y se actualiza automáticamente
					*/

					$sql = "UPDATE IGNORE `estudiantes` SET `cedula_madre` = `cedula_representante` WHERE `relacion_representante` = 'Madre' and `cedula_padre` = `cedula_madre`";

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
			try {
				// la poblacion es el total de estudiantes
				$poblacion = mysqli_escape_string($conexion,$this->get_nro_estudiantes());
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

		public function filtros_estadistica($sql,$grado = "Cualquiera",$seccion = "Cualquiera") {
			try {
				if (empty($sql)) {
					echo "vacio";
					return $sql;
				}
				// Opciones validas para los filtros
				$grados = ["primer año","segundo año","tercer año","cuarto año","quinto año","cualquiera"];
				$secciones = ["a","b","c","d","cualquiera"];
				$filtros = [];
				// filtro de grado
				if ($grado != "Cualquiera") {
					// Comprueba que el filtro este en las opciones validas
					if (!in_array(strtolower($grado),$grados)) {
						throw new Exception("El Grado: ($grado) no esta entre las opciones validas");
					}
					$filtros[] = "`grado_a_cursar` = '$grado'";
				}
				// filtro de seccion
				if ($seccion != "Cualquiera") {
					// Comprueba que el filtro este en las opciones validas
					if (!in_array(strtolower($seccion),$secciones)) {
						throw new Exception("La Seccion: ($seccion) no esta entre las opciones validas");
					}
					$filtros[] = "`seccion` = '$seccion'";
				}
				// Si hay al menos un filtro, agrega la clausula where
				if (count($filtros) > 0) {
					if (str_contains(strtolower($sql), "where")) {
						$sql .= " AND " . implode(" AND ", $filtros);
					}
					else {
						$sql .= " WHERE " . implode(" AND ", $filtros);
					}
				}
				return $sql;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return $sql;
			}
		}

		// Retorna el número de estudiantes inscritos (Se puede filtrar)
		public function get_nro_estudiantes($grado = "Cualquiera", $seccion = "Cualquiera") {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sql = "SELECT COUNT(*) as nro_estudiantes FROM `vista_estudiantes`";
					$sql = $this->filtros_estadistica($sql,mysqli_escape_string($conexion,$grado),mysqli_escape_string($conexion,$seccion));
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_estudiante = $conexion->query($sql);
						$estudiante = $consulta_estudiante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_estudiantes = $estudiante["nro_estudiantes"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $nro_estudiantes = 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return $nro_estudiantes = 0;
			}
		}

		// Retorna el número de estudiantes hembras inscritos (Se puede filtrar)
		public function get_nro_hembras($grado = "Cualquiera", $seccion = "Cualquiera") {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sql = "SELECT COUNT(*) as hembras FROM `vista_estudiantes` WHERE `genero` = 'F'";
					$sql = $this->filtros_estadistica($sql,mysqli_escape_string($conexion,$grado),mysqli_escape_string($conexion,$seccion));
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_estudiante = $conexion->query($sql);
						$estudiante = $consulta_estudiante->fetch_assoc();
						desconectarBD($conexion);
						return $hembras = $estudiante["hembras"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $hembras = 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return $hembras = 0;
			}
		}

		// Retorna el número de estudiantes varones inscritos (Se puede filtrar)
		public function get_nro_varones($grado = "Cualquiera", $seccion = "Cualquiera") {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sql = "SELECT COUNT(*) as varones FROM `vista_estudiantes` WHERE `genero` = 'M'";
					$sql = $this->filtros_estadistica($sql,mysqli_escape_string($conexion,$grado),mysqli_escape_string($conexion,$seccion));

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_estudiante = $conexion->query($sql);
						$estudiante = $consulta_estudiante->fetch_assoc();
						desconectarBD($conexion);
						return $varones = $estudiante["varones"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $varones = 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return $varones = 0;
			}
		}

		// Retorna el número de estudiantes repitentes (Se puede filtrar)
		public function get_nro_repitentes($grado = "Cualquiera", $seccion = "Cualquiera") {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sql = "SELECT COUNT(*) as nro_repitentes FROM `vista_estudiantes` WHERE `grado_repetido` not in ('')";
					$sql = $this->filtros_estadistica($sql,mysqli_escape_string($conexion,$grado),mysqli_escape_string($conexion,$seccion));

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_estudiante = $conexion->query($sql);
						$estudiante = $consulta_estudiante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_repitentes = $estudiante["nro_repitentes"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $nro_repitentes = 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return $nro_repitentes = 0;
			}
		}

		// Retorna el número de estudiantes con canaimas (Se puede filtrar)
		public function get_nro_e_c_canaima($grado = "Cualquiera", $seccion = "Cualquiera") {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sql = "SELECT COUNT(*) as nro_e_c_canaima FROM `vista_estudiantes` WHERE `tiene_canaima` = 'Si'";
					$sql = $this->filtros_estadistica($sql,mysqli_escape_string($conexion,$grado),mysqli_escape_string($conexion,$seccion));
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_estudiante = $conexion->query($sql);
						$estudiante = $consulta_estudiante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_e_c_canaima = $estudiante["nro_e_c_canaima"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $nro_e_c_canaima = 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return $nro_e_c_canaima = 0;
			}
		}

		// Retorna el número de estudiantes con carnet de la patria (Se puede filtrar)
		public function get_nro_e_c_carnet_p($grado = "Cualquiera", $seccion = "Cualquiera") {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sql = "SELECT COUNT(*) as nro_e_c_carnet_p FROM `vista_estudiantes` WHERE `codigo_carnet` != '' and `serial_carnet` != ''";
					$sql = $this->filtros_estadistica($sql,mysqli_escape_string($conexion,$grado),mysqli_escape_string($conexion,$seccion));

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_estudiante = $conexion->query($sql);
						$estudiante = $consulta_estudiante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_e_c_carnet_p = $estudiante["nro_e_c_carnet_p"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $nro_e_c_carnet_p = 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return $nro_e_c_carnet_p = 0;
			}
		}

		// Retorna el número de estudiantes con acceso a internet (Se puede filtrar)
		public function get_nro_e_c_internet($grado = "Cualquiera", $seccion = "Cualquiera") {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sql = "SELECT COUNT(*) as nro_e_c_internet FROM `vista_estudiantes` WHERE `acceso_internet` = 'Si'";
					$sql = $this->filtros_estadistica($sql,mysqli_escape_string($conexion,$grado),mysqli_escape_string($conexion,$seccion));

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_estudiante = $conexion->query($sql);
						$estudiante = $consulta_estudiante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_e_c_internet = $estudiante["nro_e_c_internet"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $nro_e_c_internet = 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return $nro_e_c_internet = 0;
			}
		}

		// Retorna el número de estudiantes con acceso a internet (Se puede filtrar)
		public function get_nro_imc_saludable($grado = "Cualquiera", $seccion = "Cualquiera") {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					// El rango de IMC saludable se encuentra entre 18,5 y 24,9 puntos
					$sql = "SELECT COUNT(*) as nro_imc_saludable FROM `vista_estudiantes` WHERE `indice_m_c` BETWEEN 18.5 AND 24.9";
					$sql = $this->filtros_estadistica($sql,mysqli_escape_string($conexion,$grado),mysqli_escape_string($conexion,$seccion));

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_estudiante = $conexion->query($sql);
						$estudiante = $consulta_estudiante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_imc_saludable = $estudiante["nro_imc_saludable"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $nro_imc_saludable = 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return $nro_imc_saludable = 0;
			}
		}

		// Retorna el número de estudiantes con acceso a internet (Se puede filtrar)
		public function get_nro_e_c_padecimiento($grado = "Cualquiera", $seccion = "Cualquiera") {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sql = "SELECT COUNT(*) as nro_e_c_padecimiento FROM `vista_estudiantes` WHERE `padecimiento` != ''";
					$sql = $this->filtros_estadistica($sql,mysqli_escape_string($conexion,$grado),mysqli_escape_string($conexion,$seccion));
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_estudiante = $conexion->query($sql);
						$estudiante = $consulta_estudiante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_e_c_padecimiento = $estudiante["nro_e_c_padecimiento"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $nro_e_c_padecimiento = 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return $nro_e_c_padecimiento = 0;
			}
		}

		// Retorna el número de estudiantes con cierto tipo de sangre (Se puede filtrar por año y por seccion)
		// OJO: Especificar que tipo de sangre
		public function get_nro_tipo_sangre($tipo, $grado = "Cualquiera", $seccion = "Cualquiera") {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sql = "SELECT COUNT(*) as nro_tipo_sangre FROM `vista_estudiantes`";
					$tipos_sangre = ["a+","a-","b+","b-","ab+","ab-","o+","o-"];
					if (!in_array(strtolower($tipo), $tipos_sangre)) {
						$sql .= " WHERE `tipo_sangre` NOT IN('a+','a-','b+','b-','ab+','ab-','o+','o-')";
					}
					else {
						$sql .= " WHERE `tipo_sangre` = '$tipo'";
					}

					$sql = $this->filtros_estadistica($sql,mysqli_escape_string($conexion,$grado),mysqli_escape_string($conexion,$seccion));
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_estudiante = $conexion->query($sql);
						$estudiante = $consulta_estudiante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_tipo_sangre = $estudiante["nro_tipo_sangre"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $nro_tipo_sangre = 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return $nro_tipo_sangre = 0;
			}
		}

		// Retorna el número de estudiantes zurdos, diestros o ambidextros (Se puede filtrar por año y por seccion)
		public function get_nro_lateralidad($lateralidad, $grado = "Cualquiera", $seccion = "Cualquiera") {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sql = "SELECT COUNT(*) as nro_lateralidad FROM `vista_estudiantes` WHERE `lateralidad` = '$lateralidad'";
					$sql = $this->filtros_estadistica($sql,mysqli_escape_string($conexion,$grado),mysqli_escape_string($conexion,$seccion));
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_estudiante = $conexion->query($sql);
						$estudiante = $consulta_estudiante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_lateralidad = $estudiante["nro_lateralidad"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $nro_lateralidad = 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return $nro_lateralidad = 0;
			}
		}

		// Retorna el número de estudiantes vacunados contra el covid19 (Se puede filtrar por año y por seccion)
		public function get_nro_vacunados_c19($vacuna = "Cualquiera", $grado = "Cualquiera", $seccion = "Cualquiera") {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sql = "SELECT COUNT(*) as nro_vacunados_c19 FROM `vista_estudiantes` WHERE `vac_aplicada` != 'NV'";
					$sql = $this->filtros_estadistica($sql,mysqli_escape_string($conexion,$grado),mysqli_escape_string($conexion,$seccion));
					// Filtros especificos para las vacunas
					$opciones_vacunas = ["nv","pfizer/biontech","moderna","aztrazeneca","janssen","sinopharm","sinovac","bharat","cansinobio","valneva","novavax","otra","cualquiera"];

					if (!in_array(strtolower($vacuna),$opciones_vacunas)) {
						throw new Exception("La vacuna contra el Covid19: ($vacuna) no esta entre las opciones validas");
					}

					// filtra por vacuna especifica que no sea una fuera de la lista
					if ($vacuna != "Cualquiera" and $vacuna != "Otra") {
						$sql .= " AND `vac_aplicada` = '$vacuna' ";
					}
					// en caso de ser otra vacuna que no esté en la lista (se excluye no vacunados igualmente)
					elseif ($vacuna == "Otra") {
						$sql .= " AND `vac_aplicada` NOT IN ('NV','Pfizer/BioNTech','Moderna','AztraZeneca','Janssen','Sinopharm','Sinovac','Bharat','CanSinoBIO','Valneva','Novavax'
							)";
					}
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_estudiante = $conexion->query($sql);
						$estudiante = $consulta_estudiante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_vacunados_c19 = $estudiante["nro_vacunados_c19"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $nro_vacunados_c19 = "error";
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return $nro_vacunados_c19 = "error";
			}
		}

		// Retorna el número de estudiantes vacunados con cierto número de dosiss contra el covid19 (Se puede filtrar por año y por seccion)
		public function get_nro_dosis_anti_c19($dosis = 1, $fil_exclusivo = false, $grado = "Cualquiera", $seccion = "Cualquiera") {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					// fil se usa para diferencia si solo se cuentan los que tengan el número exacto o que tengan por lo menos ese número de dosis
					if ($fil_exclusivo == false) {
						$sql = "SELECT COUNT(*) as nro_dosis_anti_c19 FROM `vista_estudiantes` WHERE `dosis` >= 0 AND `dosis` >= '$dosis'";
						$comparador = ">=";
					}
					else {
						$sql = "SELECT COUNT(*) as nro_dosis_anti_c19 FROM `vista_estudiantes` WHERE `dosis` >= 0 AND `dosis` = '$dosis'";
						$comparador = "=";
					}
					$sql = $this->filtros_estadistica($sql,mysqli_escape_string($conexion,$grado),mysqli_escape_string($conexion,$seccion));
					try {
						$consulta_estudiante = $conexion->query($sql);
						$estudiante = $consulta_estudiante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_dosis_anti_c19 = $estudiante["nro_dosis_anti_c19"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $nro_dosis_anti_c19 = 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return $nro_dosis_anti_c19 = 0;
			}
		}

		// Retorna el número de estudiantes con una dieta especial (Se puede filtrar por año y por seccion)
		public function get_nro_e_c_dieta_e($grado = "Cualquiera", $seccion = "Cualquiera") {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sql = "SELECT COUNT(*) as nro_e_c_dieta_e FROM `vista_estudiantes` WHERE `dieta_especial` != ''";
					$sql = $this->filtros_estadistica($sql,mysqli_escape_string($conexion,$grado),mysqli_escape_string($conexion,$seccion));
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_estudiante = $conexion->query($sql);
						$estudiante = $consulta_estudiante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_e_c_dieta_e = $estudiante["nro_e_c_dieta_e"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $nro_e_c_dieta_e = 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return $nro_e_c_dieta_e = 0;
			}
		}

		// Retorna el número de estudiantes con un impedimento fisico (Se puede filtrar por año y por seccion)
		public function get_nro_e_c_impedimento_f($grado = "Cualquiera", $seccion = "Cualquiera") {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sql = "SELECT COUNT(*) as nro_e_c_impedimento_f FROM `vista_estudiantes` WHERE `impedimento_fisico` != ''";
					$sql = $this->filtros_estadistica($sql,mysqli_escape_string($conexion,$grado),mysqli_escape_string($conexion,$seccion));
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_estudiante = $conexion->query($sql);
						$estudiante = $consulta_estudiante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_e_c_impedimento_f = $estudiante["nro_e_c_impedimento_f"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $nro_e_c_impedimento_f = 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return $nro_e_c_impedimento_f = 0;
			}
		}

		// Retorna el número de estudiantes con una necesidad educativa especial (Se puede filtrar por año y por seccion)
		public function get_nro_e_c_n_educativa($grado = "Cualquiera", $seccion = "Cualquiera") {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sql = "SELECT COUNT(*) as nro_e_c_n_educativa FROM `vista_estudiantes` WHERE `necesidad_educativa` != ''";
					$sql = $this->filtros_estadistica($sql,mysqli_escape_string($conexion,$grado),mysqli_escape_string($conexion,$seccion));
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_estudiante = $conexion->query($sql);
						$estudiante = $consulta_estudiante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_e_c_n_educativa = $estudiante["nro_e_c_n_educativa"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $nro_e_c_n_educativa = 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return $nro_e_c_n_educativa = 0;
			}
		}

		// Retorna el número de estudiantes con cierta condicion de vista (Se puede filtrar por año y por seccion)
		public function get_nro_c_vista($condicion, $grado = "Cualquiera", $seccion = "Cualquiera") {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$opciones = ["buena","regular","mala",];
					if (!in_array(strtolower($condicion), $opciones)) {
						throw new Exception("La condición ($condicion) no está entre las opciones válidas");
					}
					$sql = "SELECT COUNT(*) as nro_c_vista FROM `vista_estudiantes` WHERE `condicion_vista` = '$condicion'";
					$sql = $this->filtros_estadistica($sql,mysqli_escape_string($conexion,$grado),mysqli_escape_string($conexion,$seccion));
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_estudiante = $conexion->query($sql);
						$estudiante = $consulta_estudiante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_c_vista = $estudiante["nro_c_vista"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $nro_c_vista = 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return $nro_c_vista = 0;
			}
		}

		// Retorna el número de estudiantes con cierta condicion de la dentadura (Se puede filtrar por año y por seccion)
		public function get_nro_c_dental($condicion, $grado = "Cualquiera", $seccion = "Cualquiera") {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$opciones = ["buena","regular","mala",];
					if (!in_array(strtolower($condicion), $opciones)) {
						throw new Exception("La condición ($condicion) no está entre las opciones válidas");
					}
					$sql = "SELECT COUNT(*) as nro_c_dental FROM `vista_estudiantes` WHERE `condicion_dental` = '$condicion'";
					$sql = $this->filtros_estadistica($sql,mysqli_escape_string($conexion,$grado),mysqli_escape_string($conexion,$seccion));
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_estudiante = $conexion->query($sql);
						$estudiante = $consulta_estudiante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_c_dental = $estudiante["nro_c_dental"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $nro_c_dental = 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return $nro_c_dental = 0;
			}
		}

		// Retorna el número de estudiantes con carnet de discapacidad (Se puede filtrar por año y por seccion)
		public function get_nro_e_c_carnet_d($grado = "Cualquiera", $seccion = "Cualquiera") {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sql = "SELECT COUNT(*) as nro_e_c_carnet_d FROM `vista_estudiantes` WHERE `carnet_discapacidad` != ''";
					$sql = $this->filtros_estadistica($sql,mysqli_escape_string($conexion,$grado),mysqli_escape_string($conexion,$seccion));
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_estudiante = $conexion->query($sql);
						$estudiante = $consulta_estudiante->fetch_assoc();
						desconectarBD($conexion);
						return $nro_e_c_carnet_d = $estudiante["nro_e_c_carnet_d"];
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $nro_e_c_carnet_d = 0;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return $nro_e_c_carnet_d = 0;
			}
		}

		//
		// Getters y setters de la clase sin ningun calculo
		//

		// GETTERS
		public function get_cedula_persona() {
			return $this->cedula_persona;
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

		public function get_estado() {
			return $this->estado;
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

		public function set_plantel_proced($plantel_proced) {
			try {
				// El dato recibido no puede estar vacio
				if (empty($plantel_proced) or $plantel_proced == "") {
					throw new Exception("El plantel de procedencia no puede estar vacio");
				}
				// Validar la longitud y el formato del dato
				if (strlen($plantel_proced) < 3 || strlen($plantel_proced) >= 120 || !preg_match("/^[\w\sáéíóúüÁÉÍÓÚÜñ!#&(),.;¿¡!?\'\"`]+$/i", $plantel_proced)) {
					throw new Exception("El plantel de procedencia $plantel_proced cuenta con un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->plantel_proced = $plantel_proced;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_con_quien_vive($con_quien_vive) {
			try {
				// El dato recibido no puede estar vacio
				if (empty($con_quien_vive) or $con_quien_vive == "") {
					throw new Exception("El plantel de procedencia no puede estar vacio");
				}
				// Validar la longitud y el formato del dato
				if (strlen($con_quien_vive) < 3 || strlen($con_quien_vive) >= 60 || !preg_match('/^[\w\sáéíóúüÁÉÍÓÚÜñ!\"\'#&(),.;¿¡!?`]+$/i', $con_quien_vive)) {
					throw new Exception("La personas con quien vive $con_quien_vive cuenta con un formato inválido");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->con_quien_vive = $con_quien_vive;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_relacion_representante($relacion_representante) {
			try {
				// El dato recibido no puede estar vacio
				if (empty($relacion_representante) or $relacion_representante == "") {
					throw new Exception("El plantel de procedencia no puede estar vacio");
				}
				// Validar la longitud y el formato del dato
				if (strlen($relacion_representante) < 3 || strlen($relacion_representante) >= 60 || !preg_match('/^[\w\sáéíóúüÁÉÍÓÚÜñ!\"\'#&(),.;¿¡!?`]+$/i', $relacion_representante)) {
					throw new Exception("La relacion del representante $relacion_representante cuenta con un formato inválido");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->relacion_representante = $relacion_representante;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_cedula_padre($cedula_padre) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($cedula_padre)) {
					throw new Exception("El número de cédula del padre no puede estar vacío");
				}

				// Validar la longitud y el formato de la cédula
				if (strlen($cedula_padre) < 4 || strlen($cedula_padre) > 11 || !preg_match('/^(V|E)[0-9]+$/', $cedula_padre)) {
					throw new Exception("El número de cédula de padre $cedula_padre tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->cedula_padre = $cedula_padre;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_cedula_madre($cedula_madre) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($cedula_madre)) {
					throw new Exception("El número de cédula de la madre no puede estar vacío");
				}

				// Validar la longitud y el formato de la cédula
				if (strlen($cedula_madre) < 4 || strlen($cedula_madre) > 11 || !preg_match('/^(V|E)[0-9]+$/', $cedula_madre)) {
					throw new Exception("El número de cédula de madre $cedula_padre tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->cedula_madre = $cedula_madre;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_cedula_representante($cedula_representante) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($cedula_representante)) {
					throw new Exception("El número de cédula del representante no puede estar vacío");
				}

				// Validar la longitud y el formato de la cédula
				if (strlen($cedula_representante) < 4 || strlen($cedula_representante) > 11 || !preg_match('/^(V|E)[0-9]+$/', $cedula_representante)) {
					throw new Exception("El número de cédula de representante $cedula_representante tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->cedula_representante = $cedula_representante;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_estado($estado) {
			$estados = ["inscrito","retirado","egresado",];
			try {
				// Validar la longitud y el formato del dato
				if (!in_array(strtolower($estado),$estados)) {
					throw new Exception("El estado del estudiante: $estado es inválido");
				}
				$this->estado = $estado;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

	}
?>
