<?php  

	class datos_salud {

		// 

		private $cedula_estudiante;
		private $lateralidad;
		private $tipo_sangre;
		private $medicacion;
		private $dieta_especial;
		private $padecimiento;
		private $impedimento_fisico;
		private $necesidad_educativa;
		private $condicion_vista;
		private $condicion_dental;
		private $institucion_medica;
		private $carnet_discapacidad;
	

		// CONTRUCTOR
		public function __construct(){}


		public function insertar_datos_salud() {
			$conexion = conectarBD();

			$cedula_estudiante = $this->get_cedula_estudiante();
			$lateralidad = $this->get_lateralidad();
			$tipo_sangre = $this->get_tipo_sangre();
			$medicacion = $this->get_medicacion();
			$dieta_especial = $this->get_dieta_especial();
			$padecimiento = $this->get_padecimiento();
			$impedimento_fisico = $this->get_impedimento_fisico();
			$necesidad_educativa = $this->get_necesidad_educativa();
			$condicion_vista = $this->get_condicion_vista();
			$condicion_dental = $this->get_condicion_dental();
			$institucion_medica = $this->get_institucion_medica();
			$carnet_discapacidad = $this->get_carnet_discapacidad();

			
			$sql = "
				INSERT INTO `datos_salud`(
					`cedula_estudiante`,
					`lateralidad`,
					`tipo_sangre`,
					`medicacion`,
					`dieta_especial`,
					`padecimiento`,
					`impedimento_fisico`,
					`necesidad_educativa`,
					`condicion_vista`,
					`condicion_dental`,
					`institucion_medica`,
					`carnet_discapacidad`
				)
				VALUES(
					'$cedula_estudiante',
					'$lateralidad',
					'$tipo_sangre',
					'$medicacion',
					'$dieta_especial',
					'$padecimiento',
					'$impedimento_fisico',
					'$necesidad_educativa',
					'$condicion_vista',
					'$condicion_dental',
					'$institucion_medica',
					'$carnet_discapacidad'
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
		
		public function get_lateralidad() {
			return $this->lateralidad;
		}
		
		public function get_tipo_sangre() {
			return $this->tipo_sangre;
		}
		
		public function get_medicacion() {
			return $this->medicacion;
		}
		
		public function get_dieta_especial() {
			return $this->dieta_especial;
		}
		
		public function get_padecimiento() {
			return $this->padecimiento;
		}
		
		public function get_impedimento_fisico() {
			return $this->impedimento_fisico;
		}
		
		public function get_necesidad_educativa() {
			return $this->necesidad_educativa;
		}
		
		public function get_condicion_vista() {
			return $this->condicion_vista;
		}
		
		public function get_condicion_dental() {
			return $this->condicion_dental;
		}
		
		public function get_institucion_medica() {
			return $this->institucion_medica;
		}
		
		public function get_carnet_discapacidad() {
			return $this->carnet_discapacidad;
		}


		// SETTERS
		public function set_cedula_estudiante($cedula_estudiante) {
			$this->cedula_estudiante = $cedula_estudiante;
		}

		public function set_lateralidad($lateralidad) {
			$this->lateralidad = $lateralidad;
		}

		public function set_tipo_sangre($tipo_sangre) {
			$this->tipo_sangre = $tipo_sangre;
		}

		public function set_medicacion($medicacion) {
			$this->medicacion = $medicacion;
		}

		public function set_dieta_especial($dieta_especial) {
			$this->dieta_especial = $dieta_especial;
		}

		public function set_padecimiento($padecimiento) {
			$this->padecimiento = $padecimiento;
		}

		public function set_impedimento_fisico($impedimento_fisico) {
			$this->impedimento_fisico = $impedimento_fisico;
		}

		public function set_necesidad_educativa($necesidad_educativa) {
			$this->necesidad_educativa = $necesidad_educativa;
		}

		public function set_condicion_vista($condicion_vista) {
			$this->condicion_vista = $condicion_vista;
		}

		public function set_condicion_dental($condicion_dental) {
			$this->condicion_dental = $condicion_dental;
		}

		public function set_institucion_medica($institucion_medica) {
			$this->institucion_medica = $institucion_medica;
		}

		public function set_carnet_discapacidad($carnet_discapacidad) {
			$this->carnet_discapacidad = $carnet_discapacidad;
		}

	}

?>