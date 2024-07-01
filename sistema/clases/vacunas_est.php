<?php  

	class vacunas_est {

		// 

		private $cedula_estudiante;
		private $espec_vacuna;
		private $estado_vacuna;


		// CONSTRUCTOR
		public function __construct() {}

		public function insertar_vacunas_est() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_estudiante = mysqli_escape_string($conexion,$this->get_cedula_estudiante());
					$espec_vacuna = mysqli_escape_string($conexion,$this->get_espec_vacuna());
					$estado_vacuna = mysqli_escape_string($conexion,$this->get_estado_vacuna());

					// Verifica si no hay un registro previo para evitar excendentes
					if ($this->verificar_espec_vacuna($cedula_estudiante,$espec_vacuna) < 1) {
						$sql = "INSERT INTO `vacunas_est`(`cedula_estudiante`, `espec_vacuna`, `estado_vacuna` ) VALUES( '$cedula_estudiante', '$espec_vacuna', '$estado_vacuna' ) ON DUPLICATE KEY UPDATE `cedula_estudiante` = `cedula_estudiante`;";
					}
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

		public function editar_vacunas_est() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_estudiante = mysqli_escape_string($conexion,$this->get_cedula_estudiante());
					$espec_vacuna = mysqli_escape_string($conexion,$this->get_espec_vacuna());
					$estado_vacuna = mysqli_escape_string($conexion,$this->get_estado_vacuna());

					// Verifica si no hay un registro previo para evitar excendentes
					if ($this->verificar_espec_vacuna($cedula_estudiante,$espec_vacuna) < 1) {
						$sql = "UPDATE `vacunas_est` SET `estado_vacuna` = 'estado_vacuna' WHERE `cedula_estudiante` = 'cedula_estudiante' AND `espec_vacuna` = 'espec_vacuna';";
					}
					else {
						return;
					}
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

		public function consultar_vacunas_est() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					// Muestra todas las vacunas disponibles
					$cedula_estudiante = mysqli_escape_string($conexion,$this->get_cedula_estudiante());
					$sql = "SELECT * FROM `vacunas_est` WHERE `cedula_estudiante` = '$cedula_estudiante'";
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_vacunas = $conexion->query($sql);
						$vacunas = $consulta_vacunas->fetch_all(MYSQLI_ASSOC);
						desconectarBD($conexion);
						return $vacunas;
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return null;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return null;
			}
		}

		public function verificar_espec_vacuna($cedula_estudiante,$espec_vacuna) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sql = "SELECT * FROM `vacunas_est` WHERE `cedula_estudiante` = '$cedula_estudiante' AND `espec_vacuna` = '$espec_vacuna';";
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


		// GETTERS
		public function get_cedula_estudiante() {
			return $this->cedula_estudiante;
		}

		public function get_espec_vacuna() {
			return $this->espec_vacuna;
		}

		public function get_estado_vacuna() {
			return $this->estado_vacuna;
		}


		// SETTERS 
		public function set_cedula_estudiante($cedula_estudiante) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($cedula_estudiante)) {
					throw new Exception("El número de cédula no puede estar vacío");
				}
				// Validar la longitud y el formato de la cédula
				if (strlen($cedula_estudiante) < 4 || strlen($cedula_estudiante) > 11 || !preg_match('/^(V|E)[0-9]+$/', $cedula_estudiante)) {
					throw new Exception("El número de cédula $cedula_estudiante tiene un formato inválido");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->cedula_estudiante = $cedula_estudiante;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function set_espec_vacuna($espec_vacuna) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($espec_vacuna)) {
					throw new Exception("La especificacion de la vacuna aplicada no puede estar vacia");
				}
				$opciones = ["antiamarilica","antigripal","hep_a","hep_b","ipv","menacwy","mmr","tdap","varicela","vph",];
				// Validar la longitud y el formato del dato
				if (!in_array(strtolower($espec_vacuna), $opciones)) {
					throw new Exception("La vacuna ($espec_vacuna) es inválida");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->espec_vacuna = $espec_vacuna;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_estado_vacuna($estado_vacuna) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($estado_vacuna)) {
					throw new Exception("El estado de la vacuna no puede estar vacío");
				}
				// Validar la longitud y el formato del dato
				if (!in_array(strtolower($estado_vacuna), ["aplicada","no aplicada",])) {
					throw new Exception("La vacuna ($estado_vacuna) es inválida");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->estado_vacuna = $estado_vacuna;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
	}

?>