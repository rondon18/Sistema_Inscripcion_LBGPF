<?php  

	class datos_economicos {

		// 

		private $cedula_representante;
		private $banco;
		private $tipo_cuenta;
		private $nro_cuenta;


		// CONSTRUCTOR
		public function __construct() {}
		

		// GETTERS
		public function get_cedula_representante() {
			return $this->cedula_representante;
		}
		public function get_banco() {
			return $this->banco;
		}
		public function get_tipo_cuenta() {
			return $this->tipo_cuenta;
		}
		public function get_nro_cuenta() {
			return $this->nro_cuenta;
		}


		// SETTERS
		public function set_cedula_representante($cedula_representante) {
			$this->cedula_representante = $cedula_representante;
		}
		public function set_banco($banco) {
			$this->banco = $banco;
		}
		public function set_tipo_cuenta($tipo_cuenta) {
			$this->tipo_cuenta = $tipo_cuenta;
		}
		public function set_nro_cuenta($nro_cuenta) {
			$this->nro_cuenta = $nro_cuenta;
		}

	}

?>