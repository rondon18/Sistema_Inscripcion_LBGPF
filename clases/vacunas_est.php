<?php  

	class vacunas_est {

		// 

		private $cedula_estudiante;
		private $espec_vacuna;
		private $estado_vacuna;


		// CONSTRUCTOR
		public function __construct() {}

		public function insertar_vacunas_est() {

			$cedula_estudiante = $this->get_cedula_estudiante();
			$espec_vacuna = $this->get_espec_vacuna();
			$estado_vacuna = $this->get_estado_vacuna();

			// Verifica si no hay un registro previo para evitar excendentes
			if ($this->verificar_espec_vacuna($cedula_estudiante,$espec_vacuna) < 1) {
				$conexion = conectarBD();

				$sql = "
					INSERT INTO `vacunas_est`(
						`cedula_estudiante`,
						`espec_vacuna`,
						`estado_vacuna`
					)
					VALUES(
						'$cedula_estudiante',
						'$espec_vacuna',
						'$estado_vacuna'
					)
					ON DUPLICATE KEY UPDATE
					`cedula_estudiante` = `cedula_estudiante`;
				";

				// echo $sql;
				
				$conexion->query($sql) or die("error: ".$conexion->error);

				desconectarBD($conexion);
			}
		}

		public function verificar_espec_vacuna($cedula_estudiante,$espec_vacuna) {
			$conexion = conectarBD();

			$sql = "
				SELECT
					*
				FROM
					`vacunas_est`
				WHERE
					`cedula_estudiante` = '$cedula_estudiante' 
						AND 
					`espec_vacuna` = '$espec_vacuna';
			";

			// echo $sql."<br>";
			
			$resultado = $conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);

			// echo $resultado->num_rows;
			
			return $resultado->num_rows;
		}


		// GETTERS
		public function get_cedula_estudiante() {
			return $this->cedula_estudiante;
		}

		public function get_espec_vacuna() {
			return $this->espec_vacuna;
		}

		public function get_estado_vacuna() {
			return $this->estado_vacuna;
		}


		// SETTERS 
		public function set_cedula_estudiante($cedula_estudiante) {
			$this->cedula_estudiante = $cedula_estudiante;
		}

		public function set_espec_vacuna($espec_vacuna) {
			$this->espec_vacuna = $espec_vacuna;
		}

		public function set_estado_vacuna($estado_vacuna) {
			$this->estado_vacuna = $estado_vacuna;
		}


	}

?>