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
			$this->cedula_estudiante = $cedula_estudiante;
		}
		public function set_social($social) {
			$this->social = $social;
		}
		public function set_fisico($fisico) {
			$this->fisico = $fisico;
		}
		public function set_personal($personal) {
			$this->personal = $personal;
		}
		public function set_familiar($familiar) {
			$this->familiar = $familiar;
		}
		public function set_academico($academico) {
			$this->academico = $academico;
		}
		public function set_otra($otra) {
			$this->otra = $otra;
		}

	}

?>