<?php  

	class datos_laborales {

		// 

		private $cedula_persona;
		private $empleo;
		private $lugar_trabajo;
		private $remuneracion;
		private $tipo_remuneracion;
	

		// CONSTRUCTOR
		public function __construct(){}

		public function insertar_datos_laborales() {
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();
			$empleo = $this->get_empleo();
			$lugar_trabajo = $this->get_lugar_trabajo();
			$remuneracion = $this->get_remuneracion();
			$tipo_remuneracion = $this->get_tipo_remuneracion();

			$sql = "
				INSERT INTO `datos_laborales`(
					`cedula_persona`,
					`empleo`,
					`lugar_trabajo`,
					`remuneracion`,
					`tipo_remuneracion`
				)
				VALUES(
					'$cedula_persona',
					'$empleo',
					'$lugar_trabajo',
					'$remuneracion',
					'$tipo_remuneracion'
				)
				ON DUPLICATE KEY UPDATE
				`cedula_persona` = `cedula_persona`;
			";

			// echo $sql;
			
			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function editar_datos_laborales() {
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();
			$empleo = $this->get_empleo();
			$lugar_trabajo = $this->get_lugar_trabajo();
			$remuneracion = $this->get_remuneracion();
			$tipo_remuneracion = $this->get_tipo_remuneracion();

			$sql = "
				UPDATE
					`datos_laborales`
				SET
					`empleo` = '$empleo',
					`lugar_trabajo` = '$lugar_trabajo',
					`remuneracion` = '$remuneracion',
					`tipo_remuneracion` = '$tipo_remuneracion'
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
		
		public function get_empleo() {
			return $this->empleo;
		}
		
		public function get_lugar_trabajo() {
			return $this->lugar_trabajo;
		}
		
		public function get_remuneracion() {
			return $this->remuneracion;
		}
		
		public function get_tipo_remuneracion() {
			return $this->tipo_remuneracion;
		}	


		// SETTERS
		public function set_cedula_persona($cedula_persona) {
			$this->cedula_persona = $cedula_persona;
		}

		public function set_empleo($empleo) {
			$this->empleo = $empleo;
		}

		public function set_lugar_trabajo($lugar_trabajo) {
			$this->lugar_trabajo = $lugar_trabajo;
		}

		public function set_remuneracion($remuneracion) {
			$this->remuneracion = $remuneracion;
		}

		public function set_tipo_remuneracion($tipo_remuneracion) {
			$this->tipo_remuneracion = $tipo_remuneracion;
		}
	}
	
?>