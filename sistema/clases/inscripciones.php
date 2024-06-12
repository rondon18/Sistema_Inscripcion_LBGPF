<?php  

	class inscripciones {

		// 

		private $id_inscripcion;
		private $fecha;
		private $hora;
		private $cedula_usuario;
		private $cedula_estudiante;


		// CONSTRUCTOR 
		public function __construct() {}

		public function insertar_inscripciones() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$fecha = mysqli_escape_string($conexion,$this->get_fecha());
					$hora = mysqli_escape_string($conexion,$this->get_hora());
					$cedula_usuario = mysqli_escape_string($conexion,$this->get_cedula_usuario());
					$cedula_estudiante = mysqli_escape_string($conexion,$this->get_cedula_estudiante());

					$sql = "
						INSERT INTO `inscripciones`(
					    `id_inscripcion`,
					    `fecha`,
					    `hora`,
					    `cedula_usuario`,
					    `cedula_estudiante`
						)
						VALUES(
					    NULL,
					    '$fecha',
					    '$hora',
					    '$cedula_usuario',
					    '$cedula_estudiante'
						)
						ON DUPLICATE KEY UPDATE
						`id_inscripcion` = `id_inscripcion`;
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
		public function get_id_inscripcion() {
			return $this->id_inscripcion;
		}
		public function get_fecha() {
			return $this->fecha;
		}
		public function get_hora() {
			return $this->hora;
		}
		public function get_cedula_usuario() {
			return $this->cedula_usuario;
		}
		public function get_cedula_estudiante() {
			return $this->cedula_estudiante;
		}


		// SETTERS
		public function set_id_inscripcion($id_inscripcion) {
			try {
				if(!is_numeric($id_inscripcion)) {
					throw new Exception("El id: ".$id_inscripcion. " debe ser numerico");
				}
				$this->id_inscripcion = $id_inscripcion;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_fecha($fecha) {
			if (empty($fecha) or $fecha == NULL) {
				$this->fecha = "0000-00-00";
				return;
			}
			try {
				if (
					!preg_match('/^[0-9-]+$/', $fecha) or
					!checkdate(
						substr($fecha, 5, 2),
						substr($fecha, 8, 2),
						substr($fecha, 0, 4)
					)
				)
				{
					throw new Exception("La fecha: ".$fecha. " no tiene un formato valido");
				} else {
					$this->fecha = $fecha;
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_hora($hora) {
			if (empty($hora) or $hora == NULL) {
				throw new Exception("La hora de entrada no puede estar vacia");
			}
			try {
				// validamos que se usen numeros y :
				if (!preg_match('^((0[0-9]|1[0-9]|2[0-3]):([0-5][0-9])(:[0-5][0-9]))?$^', $hora)) {
					throw new Exception("La hora de inscripción: ".$hora. " no tiene un formato valido");
				}
				$this->hora = $hora;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_cedula_usuario($cedula_usuario) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($cedula_usuario)) {
					throw new Exception("El número de cédula no puede estar vacío");
				}

				// Validar la longitud y el formato de la cédula
				if (strlen($cedula_usuario) < 4 || strlen($cedula_usuario) > 11 || !preg_match('/^[a-zA-Z0-9\s]+$/', $cedula_usuario)) {
					throw new Exception("El número de cédula $cedula_usuario tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->cedula_usuario = $cedula_usuario;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
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

	}

?>