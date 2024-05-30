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
			$conexion = conectarBD();

			$fecha = $this->get_fecha();
			$hora = $this->get_hora();
			$cedula_usuario = $this->get_cedula_usuario();
			$cedula_estudiante = $this->get_cedula_estudiante();

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

			// echo $sql;

			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
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
			$this->id_inscripcion = $id_inscripcion;
		}
		public function set_fecha($fecha) {
			$this->fecha = $fecha;
		}
		public function set_hora($hora) {
			$this->hora = $hora;
		}
		public function set_cedula_usuario($cedula_usuario) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($cedula_usuario)) {
					throw new Exception("El número de cédula no puede estar vacío");
				}

				// Validar la longitud y el formato de la cédula
				if (strlen($cedula_usuario) < 4 || strlen($cedula_usuario) > 11 || !preg_match('/^[a-zA-Z0-9]+$/', $cedula_usuario)) {
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

	}

?>