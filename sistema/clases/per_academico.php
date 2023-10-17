<?php  

	class per_academico {
		
		// 
		
		private $id_per_academico;
		private $inicio;
		private $fin;

		// constructor
		// calcula el periodo acacemico en curso segun la fecha del servidor

		/*

			Probablemente id_per_academico sea retirado, una vez normalizada la BD se puede optar a una
			clave compuesta entre el año de inicio y el año de fin

			| anio_inicio | anio_fin |
			| 2023        | 2024     |
			| 2024        | 2025     |

		*/
		
		public function __construct() {

			// Establese la region para Venezuela (Hora, fecha, etc)
			date_default_timezone_set("America/Caracas");

			// Toma la fecha actual al momento de comprobar

			$fecha_actual = new DateTime();

			/*

				Obtiene la fecha de cierre del periodo académico.
				Toma el año actual de manera automatica, más

						| | |
						V V V

			*/

			$fecha_cierre = new DateTime((int)date('Y').'05-01');


			// Compara la fecha actual con la fecha de finalización del periodo académico
			if ($fecha_actual >= $fecha_cierre) {

				// El inicio del año escolar será el año actual
		    $this->set_inicio($fecha_actual->format('Y'));

				// El fin del año escolar será el año proximo
		    $this->set_fin($fecha_actual->format('Y') + 1);

			}
			else {

				// El inicio del año escolar será el año anterior
		    $this->set_fin($fecha_actual->format('Y') - 1);

				// El fin del año escolar será el año actual
		    $this->set_inicio($fecha_actual->format('Y'));

			}

			// Concatena ambos para formar el id del periodo académico
			$id_per_academico = $this->get_inicio().$this->get_fin();
			$this->set_id_per_academico($id_per_academico);

			// guarda el periodo académico actual o inserta uno nuevo
			$this->insertar_per_academico();

		}


		public function insertar_per_academico() {

			$conexion = conectarBD();

			// el id es la concatenacion del año de inicio y el año de fin
			$id_per_academico = $this->get_inicio().$this->get_fin();

			$inicio = $this->get_inicio();
			$fin = $this->get_fin();

			$sql = "
				INSERT INTO
					`per_academico`
					(
						`id_per_academico`,
						`inicio`,
						`fin`
					)
				VALUES
					(
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


		/*

			Esta funcion puede que se vaya (es un poco redundate si se usa el ON DUPLICATE en el constructor)

					| | |
					V V V

		*/

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