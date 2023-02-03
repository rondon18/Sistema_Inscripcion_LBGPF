<?php  

	class antropometria_est {

		// Esta clase comprende las medidas del estudiante, talla(estatura)
		// peso, IMC y circunferencia braquial
	
		private $cedula_estudiante;
		private $estatura;
		private $peso;
		private $indice_m_c;
		private $circ_braquial;
		
		
		// CONSTRUCTOR
		public function __construct(){}


		// GETTERS
		public function get_cedula_estudiante() {
			return $this->cedula_estudiante;
		}

		public function get_estatura() {
			return $this->estatura;
		}

		public function get_peso() {
			return $this->peso;
		}

		public function get_indice_m_c() {
			return $this->indice_m_c;
		}

		public function get_circ_braquial() {
			return $this->circ_braquial;
		}


		// SETTERS
		public function set_cedula_estudiante($cedula_estudiante) {
			$this->cedula_estudiante = $cedula_estudiante;
		}
		public function set_estatura($estatura) {
			$this->estatura = $estatura;
		}
		public function set_peso($peso) {
			$this->peso = $peso;
		}
		public function set_indice_m_c($indice_m_c) {
			$this->indice_m_c = $indice_m_c;
		}
		public function set_circ_braquial($circ_braquial) {
			$this->circ_braquial = $circ_braquial;
		}
	}


?>