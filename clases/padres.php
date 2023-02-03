<?php  

	class padres {
		private $cedula_persona;
		private $pais_residencia;

		public function __construct() {}

		public function get_cedula_persona() {
			return $this->cedula_persona;
		}
		public function get_pais_residencia() {
			return $this->pais_residencia;
		}

		public function set_cedula_persona() {
			$this->cedula_persona = cedula_persona;
		}
		public function set_pais_residencia() {
			$this->pais_residencia = pais_residencia;
		}

	}

?>