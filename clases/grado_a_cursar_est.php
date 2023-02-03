<?php  

	class grado_a_cursar_est {

		// 

		private $grado_a_cursar;
		private $cedula_estudiante;
		private $id_per_academico;

		// CONSTRUCTOR
		public function __construct() {}


		// GETTERS
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
		public function set_grado_a_cursar($grado_a_cursar) {
			$this->grado_a_cursar = $grado_a_cursar;
		}

		public function set_cedula_estudiante($cedula_estudiante) {
			$this->cedula_estudiante = $cedula_estudiante;
		}

		public function set_id_per_academico($id_per_academico) {
			$this->id_per_academico = $id_per_academico;
		}



	}

?>