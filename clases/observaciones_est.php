<?php  

	class observaciones_est {

		// 

		private $cedula_estudiante;
		private $social;
		private $fisico;
		private $personal;
		private $familiar;
		private $academico;
		private $otra;


		// CONSTRUCTOR
		public function __construct() {}


		public function insertar_observaciones_est() {
			$conexion = conectarBD();

			$cedula_estudiante = $this->get_cedula_estudiante();
			$social = $this->get_social();
			$fisico = $this->get_fisico();
			$personal = $this->get_personal();
			$familiar = $this->get_familiar();
			$academico = $this->get_academico();
			$otra = $this->get_otra();

			$sql = "
				INSERT INTO `observaciones_est`(
					`cedula_estudiante`,
					`social`,
					`fisico`,
					`personal`,
					`familiar`,
					`academico`,
					`otra`
				)
				VALUES(
					'$cedula_estudiante',
					'$social',
					'$fisico',
					'$personal',
					'$familiar',
					'$academico',
					'$otra'
				)
				ON DUPLICATE KEY UPDATE
				`cedula_estudiante` = `cedula_estudiante`;
			";

			// echo $sql;

			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function editar_observaciones_est() {
			$conexion = conectarBD();

			$cedula_estudiante = $this->get_cedula_estudiante();
			$social = $this->get_social();
			$fisico = $this->get_fisico();
			$personal = $this->get_personal();
			$familiar = $this->get_familiar();
			$academico = $this->get_academico();
			$otra = $this->get_otra();

			$sql = "
				UPDATE
			    `observaciones_est`
				SET
			    `social` = '$social',
			    `fisico` = '$fisico',
			    `personal` = '$personal',
			    `familiar` = '$familiar',
			    `academico` = '$academico',
			    `otra` = '$otra'
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
		public function get_social() {
			return $this->social;
		}
		public function get_fisico() {
			return $this->fisico;
		}
		public function get_personal() {
			return $this->personal;
		}
		public function get_familiar() {
			return $this->familiar;
		}
		public function get_academico() {
			return $this->academico;
		}
		public function get_otra() {
			return $this->otra;
		}


		// SETTERS
		public function set_cedula_estudiante($cedula_estudiante) {
			$this->cedula_estudiante = $cedula_estudiante;
		}
		public function set_social($social) {
			$this->social = $social;
		}
		public function set_fisico($fisico) {
			$this->fisico = $fisico;
		}
		public function set_personal($personal) {
			$this->personal = $personal;
		}
		public function set_familiar($familiar) {
			$this->familiar = $familiar;
		}
		public function set_academico($academico) {
			$this->academico = $academico;
		}
		public function set_otra($otra) {
			$this->otra = $otra;
		}

	}

?>