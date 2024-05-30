<?php  


	class datos_academicos {
		
		// 

		private $cedula_estudiante;
		private $a_repetido;
		private $materias_repetidas;
		private $materias_pendientes;		
		

		public function __construct() {}


		public function insertar_datos_academicos() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {

					$cedula_estudiante = mysqli_escape_string($conexion,$this->get_cedula_estudiante());
					$a_repetido = mysqli_escape_string($conexion,$this->get_a_repetido());
					$materias_repetidas = mysqli_escape_string($conexion,$this->get_materias_repetidas());
					$materias_pendientes = mysqli_escape_string($conexion,$this->get_materias_pendientes());

					$sql = "
						INSERT INTO `datos_academicos`(
					    `cedula_estudiante`,
					    `a_repetido`,
					    `materias_repetidas`,
					    `materias_pendientes`
						)
						VALUES(
					    '$cedula_estudiante',
					    '$a_repetido',
					    '$materias_repetidas',
					    '$materias_pendientes'
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

		public function editar_datos_academicos() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {

					$cedula_estudiante = mysqli_escape_string($conexion,$this->get_cedula_estudiante());
					$a_repetido = mysqli_escape_string($conexion,$this->get_a_repetido());
					$materias_repetidas = mysqli_escape_string($conexion,$this->get_materias_repetidas());
					$materias_pendientes = mysqli_escape_string($conexion,$this->get_materias_pendientes());

					$sql = "
						INSERT INTO `datos_academicos`(
					    `cedula_estudiante`,
					    `a_repetido`,
					    `materias_repetidas`,
					    `materias_pendientes`
						)
						VALUES(
					    '$cedula_estudiante',
					    '$a_repetido',
					    '$materias_repetidas',
					    '$materias_pendientes'
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

		// getters
		public function get_cedula_estudiante() {
			return $this->cedula_estudiante;
		}
		public function get_a_repetido() {
			return $this->a_repetido;
		}
		public function get_materias_repetidas() {
			return $this->materias_repetidas;
		}
		public function get_materias_pendientes() {
			return $this->materias_pendientes;
		}


		// setters
		public function set_cedula_estudiante($cedula_estudiante) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($cedula_estudiante)) {
					throw new Exception("El número de cédula no puede estar vacío");
				}

				// Validar la longitud y el formato de la cédula
				if (strlen($cedula_estudiante) < 4 || strlen($cedula_estudiante) > 11 || !preg_match('/^[a-zA-Z0-9]+$/', $cedula_estudiante)) {
					throw new Exception("El número de cédula $cedula_estudiante tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->cedula_estudiante = $cedula_estudiante;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function set_a_repetido($a_repetido) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($a_repetido)) {
					// Si el a_repetido está vacío, no se valida y se guarda
					$this->a_repetido = $a_repetido;
					return;
				}
				// Validar la longitud y el formato de la cédula
				if (strlen($a_repetido) <= 4 || strlen($a_repetido) >= 25 || !preg_match('/^[a-zA-Z0-9]+$/', $a_repetido)) {
					throw new Exception("El año repetido $a_repetido tiene un formato inválido");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->a_repetido = $a_repetido;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
			$this->a_repetido = $a_repetido;
		}
		public function set_materias_repetidas($materias_repetidas) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($materias_repetidas)) {
					// Si el materias_repetidas está vacío, no se valida y se guarda
					$this->materias_repetidas = $materias_repetidas;
					return;
				}
				// Validar la longitud y el formato de la cédula
				if (strlen($materias_repetidas) <= 4 || strlen($materias_repetidas) >= 50 || !preg_match('/^[a-zA-Z0-9]+$/', $materias_repetidas)) {
					throw new Exception("El año repetido $materias_repetidas tiene un formato inválido");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->materias_repetidas = $materias_repetidas;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function set_materias_pendientes($materias_pendientes) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($materias_pendientes)) {
					// Si el materias_pendientes está vacío, no se valida y se guarda
					$this->materias_pendientes = $materias_pendientes;
					return;
				}
				// Validar la longitud y el formato de la cédula
				if (strlen($materias_pendientes) <= 4 || strlen($materias_pendientes) >= 50 || !preg_match('/^[a-zA-Z0-9]+$/', $materias_pendientes)) {
					throw new Exception("Las materias repetidas $materias_pendientes tiene un formato inválido");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->materias_pendientes = $materias_pendientes;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
	}    

?>