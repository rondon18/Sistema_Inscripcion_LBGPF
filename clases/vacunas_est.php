<?php  

	class vacunas_est {

		// 

		private $cedula_estudiante;
		private $espec_vacuna;
		private $estado_vacuna;


		// CONSTRUCTOR
		public function __construct() {}


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
			$this->cedula_estudiante = $cedula_estudiante;
		}

		public function set_espec_vacuna($espec_vacuna) {
			$this->espec_vacuna = $espec_vacuna;
		}

		public function set_estado_vacuna($estado_vacuna) {
			$this->estado_vacuna = $estado_vacuna;
		}


	}

?>