<?php  

	class datos_vivienda {

		// 

		private $cedula_persona;
		private $condicion;
		private $tipo;
		private $tenencia;


		// CONTRUCTOR
		public function __construct() {}


		// GETTERS
		public function get_cedula_persona() {
			return $this->cedula_persona;
		}
		
		public function get_condicion() {
			return $this->condicion;
		}
		
		public function get_tipo() {
			return $this->tipo;
		}
		
		public function get_tenencia() {
			return $this->tenencia;
		}


		// SETTERS
		public function set_cedula_persona($cedula_persona) {
			$this->cedula_persona = $cedula_persona;
		}
		
		public function set_condicion($condicion) {
			$this->condicion = $condicion;
		}
		
		public function set_tipo($tipo) {
			$this->tipo = $tipo;
		}
		
		public function set_tenencia($tenencia) {
			$this->tenencia = $tenencia;
		}
	}

?>