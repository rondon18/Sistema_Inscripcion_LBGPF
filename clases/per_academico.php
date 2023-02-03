<?php  

	class per_academico {
		
		// 
		
		private $id_per_academico;
		private $inicio;
		private $fin;

		
		// constructor
		public function __construct() {}

		
		// GETTERS
		public function get_id_per_academico() {
			return $this->id_per_academico;
		}
		
		public function get_inicio() {
			return $this->inicio;
		}
		
		public function get_fin() {
			return $this->fin;
		}
		

		// SETTERS
		public function set_id_per_academico($id_per_academico) {
			$this->id_per_academico = $id_per_academico;
		}
		
		public function set_inicio($inicio) {
			$this->inicio = $inicio;
		}
		
		public function set_fin($fin) {
			$this->fin = $fin;
		}
	}

?>