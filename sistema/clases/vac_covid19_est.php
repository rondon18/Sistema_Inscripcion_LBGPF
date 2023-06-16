<?php 

	class vac_covid19_est  {

		// 

		private $cedula_estudiante;
		private $vac_aplicada;
		private $dosis;
		private $lote;
	

		// CONSTRUCTOR
		public function __construct() {}


		public function insertar_vac_covid19_est() {
			$conexion = conectarBD();

			$cedula_estudiante = $this->get_cedula_estudiante();
			$vac_aplicada = $this->get_vac_aplicada();
			$dosis = $this->get_dosis();
			$lote = $this->get_lote();

			$sql = "
				INSERT INTO `vac_covid19_est`(
					`cedula_estudiante`,
					`vac_aplicada`,
					`dosis`,
					`lote`
				)
				VALUES(
					'$cedula_estudiante',
					'$vac_aplicada',
					'$dosis',
					'$lote'
				)
				ON DUPLICATE KEY UPDATE
				`cedula_estudiante` = `cedula_estudiante`;
			";

			// echo $sql;

			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function editar_vac_covid19_est() {
			$conexion = conectarBD();

			$cedula_estudiante = $this->get_cedula_estudiante();
			$vac_aplicada = $this->get_vac_aplicada();
			$dosis = $this->get_dosis();
			$lote = $this->get_lote();

			$sql = "
				UPDATE
				  `vac_covid19_est`
				SET
				  `vac_aplicada` = '$vac_aplicada',
				  `dosis` = '$dosis',
				  `lote` = '$lote'
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

		public function get_vac_aplicada() {
			return $this->vac_aplicada;
		}

		public function get_dosis() {
			return $this->dosis;
		}

		public function get_lote() {
			return $this->lote;
		}


		// SETTERS
		public function set_cedula_estudiante($cedula_estudiante) {
			$this->cedula_estudiante = $cedula_estudiante;
		}
		
		public function set_vac_aplicada($vac_aplicada) {
			$this->vac_aplicada = $vac_aplicada;
		}
		
		public function set_dosis($dosis) {
			$this->dosis = $dosis;
		}
		
		public function set_lote($lote) {
			$this->lote = $lote;
		}
		
	}

?>