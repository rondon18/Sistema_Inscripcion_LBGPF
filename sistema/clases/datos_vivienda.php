<?php  

	class datos_vivienda {

		// 

		private $cedula_persona;
		private $condicion;
		private $tipo;
		private $tenencia;


		// CONTRUCTOR
		public function __construct() {}


		public function insertar_datos_vivienda() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());
					$condicion = mysqli_escape_string($conexion,$this->get_condicion());
					$tipo = mysqli_escape_string($conexion,$this->get_tipo());
					$tenencia = mysqli_escape_string($conexion,$this->get_tenencia());

					$sql = "
						INSERT INTO `datos_vivienda`(
							`cedula_persona`,
							`condicion`,
							`tipo`,
							`tenencia`
						)
						VALUES(
							'$cedula_persona',
							'$condicion',
							'$tipo',
							'$tenencia'
						)
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

		public function editar_datos_vivienda() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());
					$condicion = mysqli_escape_string($conexion,$this->get_condicion());
					$tipo = mysqli_escape_string($conexion,$this->get_tipo());
					$tenencia = mysqli_escape_string($conexion,$this->get_tenencia());

					$sql = "
						UPDATE
					    `datos_vivienda`
						SET
					    `condicion` = '$condicion',
					    `tipo` = '$tipo',
					    `tenencia` = '$tenencia'
						WHERE
					    `cedula_persona` = '$cedula_persona'
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

		// GETTERS
		public function get_cedula_persona() {
			return $this->cedula_persona;
		}
		
		public function get_condicion() {
			return $this->condicion;
		}
		
		public function get_tipo() {
			return $this->tipo;
		}
		
		public function get_tenencia() {
			return $this->tenencia;
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
		
		public function set_condicion($condicion) {
			$condiciones = ["buena","mala","regular",""];
			try {
				// Validar la longitud y el formato del dato
				if (!in_array(strtolower($condicion),$condiciones)) {
					throw new Exception("La condicion de la vivienda: $condicion es inválida");
				}
				$this->condicion = $condicion;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function set_tipo($tipo) {
			$tipos_vivienda = ["casa","apartamento","rancho","quinta","habitación",""];
			try {
				// Validar la longitud y el formato del dato
				if (!in_array(strtolower($tipo),$tipos_vivienda)) {
					throw new Exception("El tipo de vivienda: $tipo es inválido");
				}
				$this->tipo = $tipo;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_tenencia($tenencia) {
			try {
				// Si el dato esta vacio por defecto se mantendrá así
				if (empty($tenencia)) {
					$this->tenencia = $tenencia;
					return;
				}
				// Validar la longitud y el formato del dato
				if (strlen($tenencia) < 3 || strlen($tenencia) >= 50 || !preg_match('/^[a-zA-Z\s.,:;?!áéíóúüÁÉÍÓÚÜñ]+$/i', $tenencia)) {
					throw new Exception("La tenencia de vivienda $tenencia cuenta con un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->tenencia = $tenencia;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
	}

?>