<?php 

	class vac_covid19_est  {

		// 

		private $cedula_estudiante;
		private $vac_aplicada;
		private $dosis;
		private $lote;
	

		// CONSTRUCTOR
		public function __construct() {}


		// GETTERS
		public functionn get_cedula_estudiante() {
			return $this->cedula_estudiante;
		}

		public functionn get_vac_aplicada() {
			return $this->vac_aplicada;
		}

		public functionn get_dosis() {
			return $this->dosis;
		}

		public functionn get_lote() {
			return $this->lote;
		}


		// SETTERS
		public function set_cedula_estudiante($cedula_estudiante) {
			$this->cedula_estudiante = $cedula_estudiante;
		}
		
		public function set_vac_aplicada($vac_aplicada) {
			$this->vac_aplicada = $vac_aplicada;
		}
		
		public function set_dosis($dosis) {
			$this->dosis = $dosis;
		}
		
		public function set_lote($lote) {
			$this->lote = $lote;
		}
		
	}

?>