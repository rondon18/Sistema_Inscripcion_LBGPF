<?php  

	class condiciones_est {

		// 

		private $cedula_estudiante;
		private $visual;
		private $motora;
		private $auditiva;
		private $escritura;
		private $lectura;
		private $lenguaje;
		private $embarazo;


		// CONSTRUCTOR
		public function __construct(){}

		public function insertar_condiciones_est() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_estudiante = mysqli_escape_string($conexion,$this->get_cedula_estudiante());
					$visual = mysqli_escape_string($conexion,$this->get_visual());
					$motora = mysqli_escape_string($conexion,$this->get_motora());
					$auditiva = mysqli_escape_string($conexion,$this->get_auditiva());
					$escritura = mysqli_escape_string($conexion,$this->get_escritura());
					$lectura = mysqli_escape_string($conexion,$this->get_lectura());
					$lenguaje = mysqli_escape_string($conexion,$this->get_lenguaje());
					$embarazo = mysqli_escape_string($conexion,$this->get_embarazo());

					$sql = "
						INSERT INTO `condiciones_est`(
						    `cedula_estudiante`,
						    `visual`,
						    `motora`,
						    `auditiva`,
						    `escritura`,
						    `lectura`,
						    `lenguaje`,
						    `embarazo`
						)
						VALUES(
						    '$cedula_estudiante',
						    '$visual',
						    '$motora',
						    '$auditiva',
						    '$escritura',
						    '$lectura',
						    '$lenguaje',
						    '$embarazo'
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

		public function editar_condiciones_est() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_estudiante = mysqli_escape_string($conexion,$this->get_cedula_estudiante());
					$visual = mysqli_escape_string($conexion,$this->get_visual());
					$motora = mysqli_escape_string($conexion,$this->get_motora());
					$auditiva = mysqli_escape_string($conexion,$this->get_auditiva());
					$escritura = mysqli_escape_string($conexion,$this->get_escritura());
					$lectura = mysqli_escape_string($conexion,$this->get_lectura());
					$lenguaje = mysqli_escape_string($conexion,$this->get_lenguaje());
					$embarazo = mysqli_escape_string($conexion,$this->get_embarazo());

					$sql = "
						UPDATE
					    `condiciones_est`
						SET
					    `visual` = '$visual',
					    `motora` = '$motora',
					    `auditiva` = '$auditiva',
					    `escritura` = '$escritura',
					    `lectura` = '$lectura',
					    `lenguaje` = '$lenguaje',
					    `embarazo` = '$embarazo'
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
		public function get_visual() {
			return $this->visual;
		}
		public function get_motora() {
			return $this->motora;
		}
		public function get_auditiva() {
			return $this->auditiva;
		}
		public function get_escritura() {
			return $this->escritura;
		}
		public function get_lectura() {
			return $this->lectura;
		}
		public function get_lenguaje() {
			return $this->lenguaje;
		}
		public function get_embarazo() {
			return $this->embarazo;
		}


		// SETTERS
		public function set_cedula_estudiante($cedula_estudiante) {
			$this->cedula_estudiante = $cedula_estudiante;
		}

		public function set_visual($visual) {
			// Opciones consideradas valida, se toma en cuenta una cadena vacía
			$opciones_validas = ["v",""];
			try {
				if (!in_array(strtolower($visual), $opciones_validas)) {
					throw new Exception("La condición visual: ($visual) tiene un formato inválido");
				}
				$this->visual = $visual;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_motora($motora) {
			// Opciones consideradas valida, se toma en cuenta una cadena vacía
			$opciones_validas = ["m",""];
			try {
				if (!in_array(strtolower($motora), $opciones_validas)) {
					throw new Exception("La condición motora: ($motora) tiene un formato inválido");
				}
				$this->motora = $motora;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_auditiva($auditiva) {
			// Opciones consideradas valida, se toma en cuenta una cadena vacía
			$opciones_validas = ["a",""];
			try {
				if (!in_array(strtolower($auditiva), $opciones_validas)) {
					throw new Exception("La condición auditiva: ($auditiva) tiene un formato inválido");
				}
				$this->auditiva = $auditiva;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_escritura($escritura) {
			// Opciones consideradas valida, se toma en cuenta una cadena vacía
			$opciones_validas = ["e",""];
			try {
				if (!in_array(strtolower($escritura), $opciones_validas)) {
					throw new Exception("La condición escritura: ($escritura) tiene un formato inválido");
				}
				$this->escritura = $escritura;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_lectura($lectura) {
			// Opciones consideradas valida, se toma en cuenta una cadena vacía
			$opciones_validas = ["l",""];
			try {
				if (!in_array(strtolower($lectura), $opciones_validas)) {
					throw new Exception("La condición lectura: ($lectura) tiene un formato inválido");
				}
				$this->lectura = $lectura;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_lenguaje($lenguaje) {
			// Opciones consideradas valida, se toma en cuenta una cadena vacía
			$opciones_validas = ["l",""];
			try {
				if (!in_array(strtolower($lenguaje), $opciones_validas)) {
					throw new Exception("La condición lenguaje: ($lenguaje) tiene un formato inválido");
				}
				$this->lenguaje = $lenguaje;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_embarazo($embarazo) {
			// Opciones consideradas valida, se toma en cuenta una cadena vacía
			$opciones_validas = ["e",""];
			try {
				if (!in_array(strtolower($embarazo), $opciones_validas)) {
					throw new Exception("La condición embarazo: ($embarazo) tiene un formato inválido");
				}
				$this->embarazo = $embarazo;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

	}

?>