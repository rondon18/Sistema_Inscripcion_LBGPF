<?php  


	class datos_academicos {
		
		// 

		private $cedula_estudiante;
		private $a_repetido;
		private $materias_repetidas;
		private $materias_pendientes;		
		

		public function __construct() {}


		public function insertar_datos_academicos() {
			$conexion = conectarBD();

			$cedula_estudiante = $this->get_cedula_estudiante();
			$a_repetido = $this->get_a_repetido();
			$materias_repetidas = $this->get_materias_repetidas();
			$materias_pendientes = $this->get_materias_pendientes();

			$sql = "
				INSERT INTO `datos_academicos`(
			    `cedula_estudiante`,
			    `a_repetido`,
			    `materias_repetidas`,
			    `materias_pendientes`
				)
				VALUES(
			    '$cedula_estudiante',
			    '$a_repetido',
			    '$materias_repetidas',
			    '$materias_pendientes'
				)
				ON DUPLICATE KEY UPDATE
				`cedula_estudiante` = `cedula_estudiante`;
			";

			// echo $sql;
			
			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}


		// getters
		public function get_cedula_estudiante() {
			return $this->cedula_estudiante;
		}
		public function get_a_repetido() {
			return $this->a_repetido;
		}
		public function get_materias_repetidas() {
			return $this->materias_repetidas;
		}
		public function get_materias_pendientes() {
			return $this->materias_pendientes;
		}


		// setters
		public function set_cedula_estudiante($cedula_estudiante) {
			$this->cedula_estudiante = $cedula_estudiante;
		}
		public function set_a_repetido($a_repetido) {
			$this->a_repetido = $a_repetido;
		}
		public function set_materias_repetidas($materias_repetidas) {
			$this->materias_repetidas = $materias_repetidas;
		}
		public function set_materias_pendientes($materias_pendientes) {
			$this->materias_pendientes = $materias_pendientes;
		}
	}    

?>