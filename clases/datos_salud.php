<?php  

	class datos_salud {

		// 

		private $cedula_estudiante;
		private $lateralidad;
		private $tipo_sangre;
		private $medicacion;
		private $dieta_especial;
		private $padecimiento;
		private $impedimento_fisico;
		private $necesidad_educativa;
		private $condicion_vista;
		private $condicion_dental;
		private $institucion_medica;
		private $carnet_discapacidad;
	

		// CONTRUCTOR
		public function __construct(){}


		// GETTERS
		public function get_cedula_estudiante() {
			return $this->cedula_estudiante;
		}
		
		public function get_lateralidad() {
			return $this->lateralidad;
		}
		
		public function get_tipo_sangre() {
			return $this->tipo_sangre;
		}
		
		public function get_medicacion() {
			return $this->medicacion;
		}
		
		public function get_dieta_especial() {
			return $this->dieta_especial;
		}
		
		public function get_padecimiento() {
			return $this->padecimiento;
		}
		
		public function get_impedimento_fisico() {
			return $this->impedimento_fisico;
		}
		
		public function get_necesidad_educativa() {
			return $this->necesidad_educativa;
		}
		
		public function get_condicion_vista() {
			return $this->condicion_vista;
		}
		
		public function get_condicion_dental() {
			return $this->condicion_dental;
		}
		
		public function get_institucion_medica() {
			return $this->institucion_medica;
		}
		
		public function get_carnet_discapacidad() {
			return $this->carnet_discapacidad;
		}


		// SETTERS
		public function set_cedula_estudiante($cedula_estudiante) {
			$this->cedula_estudiante = $cedula_estudiante;
		}

		public function set_lateralidad($lateralidad) {
			$this->lateralidad = $lateralidad;
		}

		public function set_tipo_sangre($tipo_sangre) {
			$this->tipo_sangre = $tipo_sangre;
		}

		public function set_medicacion($medicacion) {
			$this->medicacion = $medicacion;
		}

		public function set_dieta_especial($dieta_especial) {
			$this->dieta_especial = $dieta_especial;
		}

		public function set_padecimiento($padecimiento) {
			$this->padecimiento = $padecimiento;
		}

		public function set_impedimento_fisico($impedimento_fisico) {
			$this->impedimento_fisico = $impedimento_fisico;
		}

		public function set_necesidad_educativa($necesidad_educativa) {
			$this->necesidad_educativa = $necesidad_educativa;
		}

		public function set_condicion_vista($condicion_vista) {
			$this->condicion_vista = $condicion_vista;
		}

		public function set_condicion_dental($condicion_dental) {
			$this->condicion_dental = $condicion_dental;
		}

		public function set_institucion_medica($institucion_medica) {
			$this->institucion_medica = $institucion_medica;
		}

		public function set_carnet_discapacidad($carnet_discapacidad) {
			$this->carnet_discapacidad = $carnet_discapacidad;
		}

	}

?>