<?php  

	class estudiantes {

		// 

		private $cedula_persona;
		private $cedula_escolar;
		private $plantel_proced;
		private $con_quien_vive;
		private $relacion_representante;
		private $cedula_padre;
		private $cedula_madre;
		private $cedula_representante;
	

		// CONSTRUCTOR
		public function __construct() {}


		public function insertar_estudiantes() {
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();
			$cedula_escolar = $this->get_cedula_escolar();
			$plantel_proced = $this->get_plantel_proced();
			$con_quien_vive = $this->get_con_quien_vive();
			$relacion_representante = $this->get_relacion_representante();
			$cedula_padre = $this->get_cedula_padre();
			$cedula_madre = $this->get_cedula_madre();
			$cedula_representante = $this->get_cedula_representante();

			$sql = "
				INSERT INTO `estudiantes`(
					`cedula_persona`,
					`cedula_escolar`,
					`plantel_proced`,
					`con_quien_vive`,
					`relacion_representante`,
					`cedula_padre`,
					`cedula_madre`,
					`cedula_representante`
				)
				VALUES(
					'$cedula_persona',
					'$cedula_escolar',
					'$plantel_proced',
					'$con_quien_vive',
					'$relacion_representante',
					'$cedula_padre',
					'$cedula_madre',
					'$cedula_representante'
				)
				ON DUPLICATE KEY UPDATE
				`cedula_persona` = `cedula_persona`;
			";

			// echo $sql;

			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function editar_estudiantes() {
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();
			$cedula_escolar = $this->get_cedula_escolar();
			$plantel_proced = $this->get_plantel_proced();
			$con_quien_vive = $this->get_con_quien_vive();
			$relacion_representante = $this->get_relacion_representante();
			$cedula_padre = $this->get_cedula_padre();
			$cedula_madre = $this->get_cedula_madre();
			$cedula_representante = $this->get_cedula_representante();

			$sql = "
				UPDATE
			    `estudiantes`
				SET
			    `cedula_escolar` = '$cedula_escolar',
			    `plantel_proced` = '$plantel_proced',
			    `con_quien_vive` = '$con_quien_vive',
			    `relacion_representante` = '$relacion_representante',
			    `cedula_padre` = '$cedula_padre',
			    `cedula_madre` = '$cedula_madre',
			    `cedula_representante` = '$cedula_representante'
				WHERE
			    `cedula_persona` = '$cedula_persona'
			";

			// echo $sql;

			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function mostrar_estudiantes() {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$sql = "SELECT * FROM `vista_estudiantes`";

			$resultado = $conexion->query($sql) or die("error: ".$conexion->error);
			
			$lista_estudiantes = $resultado->fetch_all(MYSQLI_ASSOC);
			
			desconectarBD($conexion);

			return $lista_estudiantes;
		}

		public function consultar_estudiantes() {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();

			$sql = "SELECT * FROM `vista_estudiantes` WHERE `cedula` = '$cedula_persona'";

			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$estudiante = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $estudiante;
		}

		// GETTERS
		public function get_cedula_persona() {
			return $this->cedula_persona;
		}

		public function get_cedula_escolar() {
			return $this->cedula_escolar;
		}

		public function get_plantel_proced() {
			return $this->plantel_proced;
		}

		public function get_con_quien_vive() {
			return $this->con_quien_vive;
		}

		public function get_relacion_representante() {
			return $this->relacion_representante;
		}

		public function get_cedula_padre() {
			return $this->cedula_padre;
		}

		public function get_cedula_madre() {
			return $this->cedula_madre;
		}

		public function get_cedula_representante() {
			return $this->cedula_representante;
		}


		// SETTERS
		public function set_cedula_persona($cedula_persona) {
			$this->cedula_persona = $cedula_persona;
		}

		public function set_cedula_escolar($cedula_escolar) {
			$this->cedula_escolar = $cedula_escolar;
		}

		public function set_plantel_proced($plantel_proced) {
			$this->plantel_proced = $plantel_proced;
		}

		public function set_con_quien_vive($con_quien_vive) {
			$this->con_quien_vive = $con_quien_vive;
		}

		public function set_relacion_representante($relacion_representante) {
			$this->relacion_representante = $relacion_representante;
		}

		public function set_cedula_padre($cedula_padre) {
			$this->cedula_padre = $cedula_padre;
		}

		public function set_cedula_madre($cedula_madre) {
			$this->cedula_madre = $cedula_madre;
		}

		public function set_cedula_representante($cedula_representante) {
			$this->cedula_representante = $cedula_representante;
		}


	}

?>