<?php  

	class carnet_patria {

		// 

		private $cedula_persona;
		private $codigo_carnet;
		private $serial_carnet;


		// CONSTRUCTOR
		public function __construct(){}


		public function insertar_carnet_patria() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {

					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());
					$codigo_carnet = mysqli_escape_string($conexion,$this->get_codigo_carnet());
					$serial_carnet = mysqli_escape_string($conexion,$this->get_serial_carnet());

					$sql = "
						INSERT INTO `carnet_patria`(
					    `cedula_persona`,
					    `codigo_carnet`,
					    `serial_carnet`
						)
						VALUES(
					    '$cedula_persona',
					    '$codigo_carnet',
					    '$serial_carnet'
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

		public function editar_carnet_patria() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {

					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());
					$codigo_carnet = mysqli_escape_string($conexion,$this->get_codigo_carnet());
					$serial_carnet = mysqli_escape_string($conexion,$this->get_serial_carnet());

					$sql = "
						UPDATE
					    `carnet_patria`
						SET
					    `codigo_carnet` = '$codigo_carnet',
					    `serial_carnet` = '$serial_carnet'
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
		public function get_cedula_persona(){
			return $this->cedula_persona;
		}
		
		public function get_codigo_carnet(){
			return $this->codigo_carnet;
		}
		
		public function get_serial_carnet(){
			return $this->serial_carnet;
		}


		// SETTERS
		public function set_cedula_persona($cedula_persona) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($cedula_persona)) {
					throw new Exception("El número de cédula no puede estar vacío");
				}

				// Validar la longitud y el formato de la cédula
				if (strlen($cedula_persona) < 4 || strlen($cedula_persona) > 11 || !preg_match('/^[a-zA-Z0-9]+$/', $cedula_persona)) {
					throw new Exception("El número de cédula $cedula_persona tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->cedula_persona = $cedula_persona;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_codigo_carnet($codigo_carnet) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($codigo_carnet)) {
					$this->codigo_carnet = $codigo_carnet;
					return;
				}

				// Validar la longitud y el formato de la cédula
				if (!is_numeric($codigo_carnet) || strlen($codigo_carnet) != 10) {
					throw new Exception("El código de carnet de la patria ($codigo_carnet) tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->codigo_carnet = $codigo_carnet;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_serial_carnet($serial_carnet) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($serial_carnet)) {
					$this->serial_carnet = $serial_carnet;
					return;
				}

				// Validar la longitud y el formato de la cédula
				if (!is_numeric($serial_carnet) || strlen($serial_carnet) != 10) {
					throw new Exception("El serial del carnet de la patria ($serial_carnet) tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->serial_carnet = $serial_carnet;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
	}
?>