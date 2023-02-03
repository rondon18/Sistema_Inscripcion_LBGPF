<?php  

	class telefonos {

		// 

		private $cedula_persona;
		private $relacion;
		private $prefijo;
		private $numero;


		// CONSTRUCTOR
		public function __construct() {}


		// GETTERS
		public function get_cedula_persona() {
			return $this->cedula_persona;
		}
		
		public function get_relacion() {
			return $this->relacion;
		}
		
		public function get_prefijo() {
			return $this->prefijo;
		}
		
		public function get_numero() {
			return $this->numero;
		}


		// SETTERS
		public function set_cedula_persona($cedula_persona) {
			$this->cedula_persona = $cedula_persona;
		}
		
		public function set_relacion($relacion) {
			$this->relacion = $relacion;
		}
		
		public function set_prefijo($prefijo) {
			$this->prefijo = $prefijo;
		}
		
		public function set_numero($numero) {
			$this->numero = $numero;
		}

	}

?>