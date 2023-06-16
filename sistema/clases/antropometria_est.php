<?php  

	class antropometria_est {

		// Esta clase comprende las medidas del estudiante, talla(estatura)
		// peso, IMC y circunferencia braquial
	
		private $cedula_estudiante;
		private $estatura;
		private $peso;
		private $indice_m_c;
		private $circ_braquial;


		
		// CONSTRUCTOR
		public function __construct(){}


		public function insertar_antropometria_est() {

			$cedula_estudiante = $this->get_cedula_estudiante();
			$estatura = $this->get_estatura();
			$peso = $this->get_peso();
			$indice_m_c = $this->get_indice_m_c();
			$circ_braquial = $this->get_circ_braquial();

			$conexion = conectarBD();

			$sql = "
				INSERT INTO `antropometria_est`(
			    `cedula_estudiante`,
			    `estatura`,
			    `peso`,
			    `indice_m_c`,
			    `circ_braquial`
				)
				VALUES(
			    '$cedula_estudiante',
			    '$estatura',
			    '$peso',
			    '$indice_m_c',
			    '$circ_braquial'
				)
				ON DUPLICATE KEY UPDATE
				`cedula_estudiante` = `cedula_estudiante`;
			";

			// echo $sql;
			
			$conexion->query($sql) or die("error: ".$conexion->error);
			desconectarBD($conexion);
		}

		public function editar_antropometria_est() {

			$cedula_estudiante = $this->get_cedula_estudiante();
			$estatura = $this->get_estatura();
			$peso = $this->get_peso();
			$indice_m_c = $this->get_indice_m_c();
			$circ_braquial = $this->get_circ_braquial();

			$conexion = conectarBD();

			$sql = "
				UPDATE
			    `antropometria_est`
				SET
			    `estatura` = '$estatura',
			    `peso` = '$peso',
			    `indice_m_c` = '$indice_m_c',
			    `circ_braquial` = '$circ_braquial'
				WHERE
			    `cedula_estudiante` = '$cedula_estudiante'
			";

			// echo $sql;
			
			$conexion->query($sql) or die("error: ".$conexion->error);
			desconectarBD($conexion);
		}		


		// GETTERS
		public function get_cedula_estudiante() {
			return $this->cedula_estudiante;
		}

		public function get_estatura() {
			return $this->estatura;
		}

		public function get_peso() {
			return $this->peso;
		}

		public function get_indice_m_c() {
			return $this->indice_m_c;
		}

		public function get_circ_braquial() {
			return $this->circ_braquial;
		}


		// SETTERS
		public function set_cedula_estudiante($cedula_estudiante) {
			$this->cedula_estudiante = $cedula_estudiante;
		}
		public function set_estatura($estatura) {
			$this->estatura = $estatura;
		}
		public function set_peso($peso) {
			$this->peso = $peso;
		}
		public function set_indice_m_c($indice_m_c) {
			$this->indice_m_c = $indice_m_c;
		}
		public function set_circ_braquial($circ_braquial) {
			$this->circ_braquial = $circ_braquial;
		}
	}


?>