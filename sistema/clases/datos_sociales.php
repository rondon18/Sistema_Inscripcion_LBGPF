<?php  

	class datos_sociales {

		// 

		private $cedula_estudiante;
		private $tiene_canaima;
		private $condicion_canaima;
		private $acceso_internet;


		// CONTRUCTOR
		public function __construct() {}


		public function insertar_datos_sociales() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_estudiante = mysqli_escape_string($conexion,$this->get_cedula_estudiante());
					$tiene_canaima = mysqli_escape_string($conexion,$this->get_tiene_canaima());
					$condicion_canaima = mysqli_escape_string($conexion,$this->get_condicion_canaima());
					$acceso_internet = mysqli_escape_string($conexion,$this->get_acceso_internet());

					$sql = "
						INSERT INTO `datos_sociales`(
					    `cedula_estudiante`,
					    `tiene_canaima`,
					    `condicion_canaima`,
					    `acceso_internet`
						)
						VALUES(
					    '$cedula_estudiante',
					    '$tiene_canaima',
					    '$condicion_canaima',
					    '$acceso_internet'
						)
						ON DUPLICATE KEY UPDATE
						`cedula_estudiante` = `cedula_estudiante`;
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

		public function editar_datos_sociales() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_estudiante = mysqli_escape_string($conexion,$this->get_cedula_estudiante());
					$tiene_canaima = mysqli_escape_string($conexion,$this->get_tiene_canaima());
					$condicion_canaima = mysqli_escape_string($conexion,$this->get_condicion_canaima());
					$acceso_internet = mysqli_escape_string($conexion,$this->get_acceso_internet());

					$sql = "
						UPDATE
					    `datos_sociales`
						SET
					    `tiene_canaima` = '$tiene_canaima',
					    `condicion_canaima` = '$condicion_canaima',
					    `acceso_internet` = '$acceso_internet'
						WHERE
					    `cedula_estudiante` = '$cedula_estudiante'
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
		public function get_cedula_estudiante() {
			return $this->cedula_estudiante;
		}
		
		public function get_tiene_canaima() {
			return $this->tiene_canaima;
		}
		
		public function get_condicion_canaima() {
			return $this->condicion_canaima;
		}
		
		public function get_acceso_internet() {
			return $this->acceso_internet;
		}

		
		// SETTERS
		public function set_cedula_estudiante($cedula_estudiante) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($cedula_estudiante)) {
					throw new Exception("El número de cédula no puede estar vacío");
				}
				// Validar la longitud y el formato de la cédula
				if (strlen($cedula_estudiante) < 4 || strlen($cedula_estudiante) > 11 || !preg_match('/^[a-zA-Z0-9\s]+$/', $cedula_estudiante)) {
					throw new Exception("El número de cédula $cedula_estudiante tiene un formato inválido");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->cedula_estudiante = $cedula_estudiante;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_tiene_canaima($tiene_canaima) {
			$condiciones = ["si","no",];
			try {
				// Validar la longitud y el formato del dato
				if (!in_array(strtolower($tiene_canaima),$condiciones)) {
					throw new Exception("La tenencia de canaima: $tiene_canaima es inválida");
				}
				$this->tiene_canaima = $tiene_canaima;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_condicion_canaima($condicion_canaima) {
			$condiciones = ["buena","mala","regular",];
			try {
				// Validar la longitud y el formato del dato
				if (!in_array(strtolower($condicion_canaima),$condiciones)) {
					throw new Exception("La condicion de la canaima: $condicion_canaima es inválida");
				}
				$this->condicion_canaima = $condicion_canaima;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_acceso_internet($acceso_internet) {
			$condiciones = ["si","no",];
			try {
				// Validar la longitud y el formato del dato
				if (!in_array(strtolower($acceso_internet),$condiciones)) {
					throw new Exception("El acceso a internet: $acceso_internet es inválido");
				}
				$this->acceso_internet = $acceso_internet;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

	}

?>