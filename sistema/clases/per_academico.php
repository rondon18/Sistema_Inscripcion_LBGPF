<?php  

	class per_academico {
		
		// 
		
		private $id_per_academico;
		private $inicio;
		private $fin;

		// constructor
		// calcula el periodo acacemico en curso segun la fecha del servidor
		
		public function __construct() {
			
			date_default_timezone_set("America/Caracas");
			$mes = date('m');
			

			$anio_actual = (int)date('Y');

			
			// si el mes actual es entre septiembre y marzo, se inscribe para este año 
			if ($mes >= 9 or $mes <= 3) {
				$this->set_inicio($anio_actual + 1);
				$this->set_fin($anio_actual + 2);
			}
			// si no, para el siguente
			else {
				$this->set_inicio($anio_actual);
				$this->set_fin($anio_actual + 1);
			}

			$id_per_academico = $this->get_inicio().$this->get_fin();
			
			$this->set_id_per_academico($id_per_academico);

			$this->insertar_per_academico();
		}

		public function insertar_per_academico() {

			// si no hay un registro previo
			if ($this->consultar_per_academico($this->get_id_per_academico()) < 1) {
				$conexion = conectarBD();

				// el id es la concatenacion del año de inicio y el año de fin
				$id_per_academico = $this->get_inicio().$this->get_fin();
				
				$inicio = $this->get_inicio();
				$fin = $this->get_fin();

				$sql = "
					INSERT INTO `per_academico`(`id_per_academico`, `inicio`, `fin`)
					VALUES(
				    '$id_per_academico',
				    '$inicio',
				    '$fin'
					)
					ON DUPLICATE KEY UPDATE
					`id_per_academico` = `id_per_academico`;
				";

				$conexion->query($sql) or die("error: ".$conexion->error);
				desconectarBD($conexion);
			}
		}

		public function consultar_per_academico($id_per_academico) {
			// consulta si el periodo academico ya existe
			$conexion = conectarBD();

			$sql = "
				SELECT
			    *
				FROM
			    `per_academico`
				WHERE
			    `id_per_academico` = '$id_per_academico'
			";

			$resultado = $conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);

			// echo $resultado->num_rows;
			
			return $resultado->num_rows;
		}
		

		
		// GETTERS
		public function get_id_per_academico() {
			return $this->id_per_academico;
		}
		
		public function get_inicio() {
			return $this->inicio;
		}
		
		public function get_fin() {
			return $this->fin;
		}
		

		// SETTERS
		public function set_id_per_academico($id_per_academico) {
			$this->id_per_academico = $id_per_academico;
		}
		
		public function set_inicio($inicio) {
			$this->inicio = $inicio;
		}
		
		public function set_fin($fin) {
			$this->fin = $fin;
		}
	}

?>