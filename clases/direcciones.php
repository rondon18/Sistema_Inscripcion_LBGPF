<?php  

	class direcciones {

		// 

		private $cedula_persona;
		private $estado;
		private $municipio;
		private $parroquia;
		private $sector;
		private $calle;
		private $nro_casa;
		private $punto_referencia;


		// constructor
		public function __construct() {}

		
		// getters
		public function get_cedula_persona() {
			return $this->cedula_persona;
		}
		
		public function get_estado() {
			return $this->estado;
		}
		
		public function get_municipio() {
			return $this->municipio;
		}
		
		public function get_parroquia() {
			return $this->parroquia;
		}
		
		public function get_sector() {
			return $this->sector;
		}
		
		public function get_calle() {
			return $this->calle;
		}
		
		public function get_nro_casa() {
			return $this->nro_casa;
		}
		
		public function get_punto_referencia() {
			return $this->punto_referencia;
		}


		// setters
		public function get_cedula_persona($cedula_persona) {
			$this->cedula_persona = $cedula_persona;
		}
		
		public function get_estado($estado) {
			$this->estado = $estado;
		}
		
		public function get_municipio($municipio) {
			$this->municipio = $municipio;
		}
		
		public function get_parroquia($parroquia) {
			$this->parroquia = $parroquia;
		}
		
		public function get_sector($sector) {
			$this->sector = $sector;
		}
		
		public function get_calle($calle) {
			$this->calle = $calle;
		}
		
		public function get_nro_casa($nro_casa) {
			$this->nro_casa = $nro_casa;
		}
		
		public function get_punto_referencia($punto_referencia) {
			$this->punto_referencia = $punto_referencia;
		}
	}

?>