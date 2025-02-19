<?php  

	class observaciones_est {

		// 

		private $cedula_estudiante;
		private $social;
		private $fisico;
		private $personal;
		private $familiar;
		private $academico;
		private $otra;


		// CONSTRUCTOR
		public function __construct() {}


		public function insertar_observaciones_est() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_estudiante = mysqli_escape_string($conexion,$this->get_cedula_estudiante());
					$social = mysqli_escape_string($conexion,$this->get_social());
					$fisico = mysqli_escape_string($conexion,$this->get_fisico());
					$personal = mysqli_escape_string($conexion,$this->get_personal());
					$familiar = mysqli_escape_string($conexion,$this->get_familiar());
					$academico = mysqli_escape_string($conexion,$this->get_academico());
					$otra = mysqli_escape_string($conexion,$this->get_otra());

					$sql = "
						INSERT INTO `observaciones_est`(
							`cedula_estudiante`,
							`social`,
							`fisico`,
							`personal`,
							`familiar`,
							`academico`,
							`otra`
						)
						VALUES(
							'$cedula_estudiante',
							'$social',
							'$fisico',
							'$personal',
							'$familiar',
							'$academico',
							'$otra'
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

		public function editar_observaciones_est() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_estudiante = mysqli_escape_string($conexion,$this->get_cedula_estudiante());
					$social = mysqli_escape_string($conexion,$this->get_social());
					$fisico = mysqli_escape_string($conexion,$this->get_fisico());
					$personal = mysqli_escape_string($conexion,$this->get_personal());
					$familiar = mysqli_escape_string($conexion,$this->get_familiar());
					$academico = mysqli_escape_string($conexion,$this->get_academico());
					$otra = mysqli_escape_string($conexion,$this->get_otra());

					$sql = "
						UPDATE
					    `observaciones_est`
						SET
					    `social` = '$social',
					    `fisico` = '$fisico',
					    `personal` = '$personal',
					    `familiar` = '$familiar',
					    `academico` = '$academico',
					    `otra` = '$otra'
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
		public function get_social() {
			return $this->social;
		}
		public function get_fisico() {
			return $this->fisico;
		}
		public function get_personal() {
			return $this->personal;
		}
		public function get_familiar() {
			return $this->familiar;
		}
		public function get_academico() {
			return $this->academico;
		}
		public function get_otra() {
			return $this->otra;
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
		public function set_social($social) {
			try {
				if (empty($social)) {
					$this->social = $social;
					return;
				}
				// Validar la longitud y el formato del dato

				if (strlen($social) < 2 || strlen($social) > 400 || !preg_match('/^[\w\sàáâãéèêëìíîïòóôõùúûüÀÁÂÃÉÈÊËÌÍÎÏÒÓÔÕÙÚÛÜñÑª\!\"\'\-\#\&\(\)\,\.\;\¿\¡\!\?\`\°\/\:\|]+$/i', $social)) {
					throw new Exception("La observacion social $social cuenta con un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->social = $social;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_fisico($fisico) {
			try {
				if (empty($fisico)) {
					$this->fisico = $fisico;
					return;
				}
				// Validar la longitud y el formato del dato

				if (strlen($fisico) < 2 || strlen($fisico) > 400 || !preg_match('/^[\w\sàáâãéèêëìíîïòóôõùúûüÀÁÂÃÉÈÊËÌÍÎÏÒÓÔÕÙÚÛÜñÑª\!\"\'\-\#\&\(\)\,\.\;\¿\¡\!\?\`\°\/\:\|]+$/i', $fisico)) {
					throw new Exception("La observacion fisica: $fisico cuenta con un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->fisico = $fisico;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_personal($personal) {
			try {
				if (empty($personal)) {
					$this->personal = $personal;
					return;
				}
				// Validar la longitud y el formato del dato

				if (strlen($personal) < 2 || strlen($personal) > 400 || !preg_match('/^[\w\sàáâãéèêëìíîïòóôõùúûüÀÁÂÃÉÈÊËÌÍÎÏÒÓÔÕÙÚÛÜñÑª\!\"\'\-\#\&\(\)\,\.\;\¿\¡\!\?\`\°\/\:\|]+$/i', $personal)) {
					throw new Exception("La observacion personal: $personal cuenta con un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->personal = $personal;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_familiar($familiar) {
			try {
				if (empty($familiar)) {
					$this->familiar = $familiar;
					return;
				}
				// Validar la longitud y el formato del dato

				if (strlen($familiar) < 2 || strlen($familiar) > 400 || !preg_match('/^[\w\sàáâãéèêëìíîïòóôõùúûüÀÁÂÃÉÈÊËÌÍÎÏÒÓÔÕÙÚÛÜñÑª\!\"\'\-\#\&\(\)\,\.\;\¿\¡\!\?\`\°\/\:\|]+$/i', $familiar)) {
					throw new Exception("La observacion familiar: $familiar cuenta con un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->familiar = $familiar;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_academico($academico) {
			try {
				if (empty($academico)) {
					$this->academico = $academico;
					return;
				}
				// Validar la longitud y el formato del dato

				if (strlen($academico) < 2 || strlen($academico) > 400 || !preg_match('/^[\w\sàáâãéèêëìíîïòóôõùúûüÀÁÂÃÉÈÊËÌÍÎÏÒÓÔÕÙÚÛÜñÑª\!\"\'\-\#\&\(\)\,\.\;\¿\¡\!\?\`\°\/\:\|]+$/i', $academico)) {
					throw new Exception("La observacion academico: $academico cuenta con un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->academico = $academico;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_otra($otra) {
			try {
				if (empty($otra)) {
					$this->otra = $otra;
					return;
				}
				// Validar la longitud y el formato del dato

				if (strlen($otra) < 2 || strlen($otra) > 400 || !preg_match('/^[\w\sàáâãéèêëìíîïòóôõùúûüÀÁÂÃÉÈÊËÌÍÎÏÒÓÔÕÙÚÛÜñÑª\!\"\'\-\#\&\(\)\,\.\;\¿\¡\!\?\`\°\/\:\|]+$/i', $otra)) {
					throw new Exception("La observacion otra: $otra cuenta con un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->otra = $otra;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}


	}

?>