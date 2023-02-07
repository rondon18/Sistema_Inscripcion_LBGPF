<?php  

	class datos_sociales {

		// 

		private $cedula_estudiante;
		private $tiene_canaima;
		private $condicion_canaima;
		private $acceso_internet;


		// CONTRUCTOR
		public function __construct() {}


		public function insertar_datos_sociales() {
			$conexion = conectarBD();

			$cedula_estudiante = $this->get_cedula_estudiante();
			$tiene_canaima = $this->get_tiene_canaima();
			$condicion_canaima = $this->get_condicion_canaima();
			$acceso_internet = $this->get_acceso_internet();

			$sql = "
				INSERT INTO `datos_sociales`(
			    `cedula_estudiante`,
			    `tiene_canaima`,
			    `condicion_canaima`,
			    `acceso_internet`
				)
				VALUES(
			    '$cedula_estudiante',
			    '$tiene_canaima',
			    '$condicion_canaima',
			    '$acceso_internet'
				)
				ON DUPLICATE KEY UPDATE
				`cedula_estudiante` = `cedula_estudiante`;
			";

			// echo $sql;
			
			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		// GETTERS
		public function get_cedula_estudiante() {
			return $this->cedula_estudiante;
		}
		
		public function get_tiene_canaima() {
			return $this->tiene_canaima;
		}
		
		public function get_condicion_canaima() {
			return $this->condicion_canaima;
		}
		
		public function get_acceso_internet() {
			return $this->acceso_internet;
		}

		
		// SETTERS
		public function set_cedula_estudiante($cedula_estudiante) {
			$this->cedula_estudiante = $cedula_estudiante;
		}
		
		public function set_tiene_canaima($tiene_canaima) {
			$this->tiene_canaima = $tiene_canaima;
		}
		
		public function set_condicion_canaima($condicion_canaima) {
			$this->condicion_canaima = $condicion_canaima;
		}
		
		public function set_acceso_internet($acceso_internet) {
			$this->acceso_internet = $acceso_internet;
		}

	}

?>