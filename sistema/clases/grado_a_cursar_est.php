<?php  

	class grado_a_cursar_est {
		private $grado_a_cursar;
		private $seccion;
		private $cedula_estudiante;
		private $id_per_academico;

		// CONSTRUCTOR
		public function __construct() {}

		public function insertar_grado_a_cursar_est() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$grado_a_cursar = mysqli_escape_string($conexion,$this->get_grado_a_cursar());
					$seccion = mysqli_escape_string($conexion,$this->get_seccion());
					$cedula_estudiante = mysqli_escape_string($conexion,$this->get_cedula_estudiante());
					$id_per_academico = mysqli_escape_string($conexion,$this->get_id_per_academico());

					$sql = "
						INSERT INTO `grado_a_cursar_est`(
							`grado_a_cursar`,
							`seccion`,
							`cedula_estudiante`,
							`id_per_academico`
						)
						VALUES(
							'$grado_a_cursar',
							'$seccion',
							'$cedula_estudiante',
							'$id_per_academico'
						)
						ON DUPLICATE KEY UPDATE
						`id_per_academico` = `id_per_academico`;
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

		public function editar_grado_a_cursar_est() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$grado_a_cursar = mysqli_escape_string($conexion,$this->get_grado_a_cursar());
					$seccion = mysqli_escape_string($conexion,$this->get_seccion());
					$cedula_estudiante = mysqli_escape_string($conexion,$this->get_cedula_estudiante());
					$id_per_academico = mysqli_escape_string($conexion,$this->get_id_per_academico());

					$sql = "
						UPDATE
							`grado_a_cursar_est`
						SET
							`grado_a_cursar` = '$grado_a_cursar',
							`seccion` = '$seccion',
							`id_per_academico` = '$id_per_academico'
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
		public function get_seccion() {
			return $this->seccion;
		}

		public function get_grado_a_cursar() {
			return $this->grado_a_cursar;
		}

		public function get_cedula_estudiante() {
			return $this->cedula_estudiante;
		}

		public function get_id_per_academico() {
			return $this->id_per_academico;
		}


		// SETTERS
		public function set_seccion($seccion) {
			try {
				$secciones = ["a","b","c","d",];
				if (!in_array(strtolower($seccion), $secciones)) {
					throw new Exception("La seccion: ($seccion) se encuentra fuera de los valores admitidos");
				}
				$this->seccion = ucfirst($seccion);
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_grado_a_cursar($grado_a_cursar) {
			try {
				$grados = [
					"primer año",
					"segundo año",
					"tercer año",
					"cuarto año",
					"quinto año",
				];
				if (!in_array(strtolower($grado_a_cursar), $grados)) {
					throw new Exception("El grado: ($grado_a_cursar) se encuentra fuera de los valores admitidos");
				}
				$this->grado_a_cursar = ucfirst(strtolower($grado_a_cursar));
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
			$this->grado_a_cursar = $grado_a_cursar;
		}

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

		public function set_id_per_academico($id_per_academico) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($id_per_academico)) {
					throw new Exception("El ID de periodo académico no puede estar vacío");
				}
				// Validar la longitud y el formato de la cédula
				if (!is_numeric($id_per_academico) || strlen($id_per_academico) > 8) {
					throw new Exception("El ID de periodo académico ($id_per_academico) tiene un formato inválido");
				}
				$this->id_per_academico = $id_per_academico;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
	}
?>