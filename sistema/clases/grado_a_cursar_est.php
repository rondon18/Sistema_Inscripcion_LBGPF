<?php  

	class grado_a_cursar_est {

		// 

		private $grado_a_cursar;
		private $cedula_estudiante;
		private $id_per_academico;

		// CONSTRUCTOR
		public function __construct() {}


		public function insertar_grado_a_cursar_est() {
			$conexion = conectarBD();

			$grado_a_cursar = $this->get_grado_a_cursar();
			$cedula_estudiante = $this->get_cedula_estudiante();
			$id_per_academico = $this->get_id_per_academico();

			$sql = "
				INSERT INTO `grado_a_cursar_est`(
					`grado_a_cursar`,
					`cedula_estudiante`,
					`id_per_academico`
				)
				VALUES(
					'$grado_a_cursar',
					'$cedula_estudiante',
					'$id_per_academico'
				)
				ON DUPLICATE KEY UPDATE
				`id_per_academico` = `id_per_academico`;
			";

			// echo $sql;

			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function editar_grado_a_cursar_est() {
			$conexion = conectarBD();

			$grado_a_cursar = $this->get_grado_a_cursar();
			$cedula_estudiante = $this->get_cedula_estudiante();
			$id_per_academico = $this->get_id_per_academico();

			$sql = "
				UPDATE
					`grado_a_cursar_est`
				SET
					`grado_a_cursar` = '$grado_a_cursar',
					`id_per_academico` = '$id_per_academico'
				WHERE
					`cedula_estudiante` = '$cedula_estudiante'
			";

			// echo $sql;

			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}


		// GETTERS
		public function get_grado_a_cursar() {
			return $this->grado_a_cursar;
		}

		public function get_cedula_estudiante() {
			return $this->cedula_estudiante;
		}

		public function get_id_per_academico() {
			return $this->id_per_academico;
		}


		// SETTERS
		public function set_grado_a_cursar($grado_a_cursar) {
			$this->grado_a_cursar = $grado_a_cursar;
		}

		public function set_cedula_estudiante($cedula_estudiante) {
			$this->cedula_estudiante = $cedula_estudiante;
		}

		public function set_id_per_academico($id_per_academico) {
			$this->id_per_academico = $id_per_academico;
		}



	}

?>