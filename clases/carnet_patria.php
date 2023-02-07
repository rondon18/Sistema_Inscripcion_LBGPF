<?php  

	class carnet_patria {

		// 

		private $cedula_persona;
		private $codigo_carnet;
		private $serial_carnet;


		// CONSTRUCTOR
		public function __construct(){}


		public function insertar_carnet_patria() {
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();
			$codigo_carnet = $this->get_codigo_carnet();
			$serial_carnet = $this->get_serial_carnet();
			
			$sql = "
				INSERT INTO `carnet_patria`(
			    `cedula_persona`,
			    `codigo_carnet`,
			    `serial_carnet`
				)
				VALUES(
			    '$cedula_persona',
			    '$codigo_carnet',
			    '$serial_carnet'
				)
				ON DUPLICATE KEY UPDATE
				`cedula_persona` = `cedula_persona`;
			";

			// echo $sql;
			
			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}


		// GETTERS
		public function get_cedula_persona(){
			return $this->cedula_persona;
		}
		
		public function get_codigo_carnet(){
			return $this->codigo_carnet;
		}
		
		public function get_serial_carnet(){
			return $this->serial_carnet;
		}


		// SETTERS
		public function set_cedula_persona($cedula_persona) {
			$this->cedula_persona = $cedula_persona;
		}
		
		public function set_codigo_carnet($codigo_carnet) {
			$this->codigo_carnet = $codigo_carnet;
		}
		
		public function set_serial_carnet($serial_carnet) {
			$this->serial_carnet = $serial_carnet;
		}


	}

?>