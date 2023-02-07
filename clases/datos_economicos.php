<?php  

	class datos_economicos {

		// 

		private $cedula_representante;
		private $banco;
		private $tipo_cuenta;
		private $nro_cuenta;


		// CONSTRUCTOR
		public function __construct() {}
		
		public function insertar_datos_economicos() {
			$conexion = conectarBD();

			$cedula_representante = $this->get_cedula_representante();
			$banco = $this->get_banco();
			$tipo_cuenta = $this->get_tipo_cuenta();
			$nro_cuenta = $this->get_nro_cuenta();

			$sql = "
				INSERT INTO `datos_economicos`(
					`cedula_representante`,
					`banco`,
					`tipo_cuenta`,
					`nro_cuenta`
				)
				VALUES(
					'$cedula_representante',
					'$banco',
					'$tipo_cuenta',
					'$nro_cuenta'
				)
				ON DUPLICATE KEY UPDATE
				`cedula_representante` = `cedula_representante`;
			";

			// echo $sql;
			
			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

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