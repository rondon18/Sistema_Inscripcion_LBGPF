<?php  

	class tallas_est {

		// 

		private $cedula_estudiante;
		private $camisa;
		private $pantalon;
		private $calzado;

		// CONSTRUCTOR
		public function __construct() {}
	

		// GETTERS
		
		public function get_cedula_estudiante() {
			return $this->cedula_estudiante;
		}
		
		public function get_camisa() {
			return $this->camisa;
		}
		
		public function get_pantalon() {
			return $this->pantalon;
		}
		
		public function get_calzado() {
			return $this->calzado;
		}


		// SETTERS
		
		public function set_cedula_estudiante($cedula_estudiante) {
			$this->cedula_estudiante = $cedula_estudiante
		}
		
		public function set_camisa($camisa) {
			$this->camisa = $camisa
		}
		
		public function set_pantalon($pantalon) {
			$this->pantalon = $pantalon
		}
		
		public function set_calzado($calzado) {
			$this->calzado = $calzado
		}

	}

?>