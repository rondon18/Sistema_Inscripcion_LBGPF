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
			$this->cedula_usuario = $cedula_usuario;
		}
		public function set_cedula_estudiante($cedula_estudiante) {
			$this->cedula_estudiante = $cedula_estudiante;
		}

	}

?>