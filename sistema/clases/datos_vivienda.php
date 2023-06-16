<?php  

	class datos_vivienda {

		// 

		private $cedula_persona;
		private $condicion;
		private $tipo;
		private $tenencia;


		// CONTRUCTOR
		public function __construct() {}


		public function insertar_datos_vivienda() {
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();
			$condicion = $this->get_condicion();
			$tipo = $this->get_tipo();
			$tenencia = $this->get_tenencia();

			$sql = "
				INSERT INTO `datos_vivienda`(
					`cedula_persona`,
					`condicion`,
					`tipo`,
					`tenencia`
				)
				VALUES(
					'$cedula_persona',
					'$condicion',
					'$tipo',
					'$tenencia'
				)
				ON DUPLICATE KEY UPDATE
				`cedula_persona` = `cedula_persona`;
			";

			// echo $sql;
			
			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function editar_datos_vivienda() {
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();
			$condicion = $this->get_condicion();
			$tipo = $this->get_tipo();
			$tenencia = $this->get_tenencia();

			$sql = "
				UPDATE
			    `datos_vivienda`
				SET
			    `condicion` = '$condicion',
			    `tipo` = '$tipo',
			    `tenencia` = '$tenencia'
				WHERE
			    `cedula_persona` = '$cedula_persona'
			";

			// echo $sql;
			
			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		// GETTERS
		public function get_cedula_persona() {
			return $this->cedula_persona;
		}
		
		public function get_condicion() {
			return $this->condicion;
		}
		
		public function get_tipo() {
			return $this->tipo;
		}
		
		public function get_tenencia() {
			return $this->tenencia;
		}


		// SETTERS
		public function set_cedula_persona($cedula_persona) {
			$this->cedula_persona = $cedula_persona;
		}
		
		public function set_condicion($condicion) {
			$this->condicion = $condicion;
		}
		
		public function set_tipo($tipo) {
			$this->tipo = $tipo;
		}
		
		public function set_tenencia($tenencia) {
			$this->tenencia = $tenencia;
		}
	}

?>