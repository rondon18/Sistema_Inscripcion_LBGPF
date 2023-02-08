<?php  

	class representantes {
		
		// 

		private $cedula_persona;


		// CONSTRUCTOR
		public function _construct() {}


		public function insertar_representante() {
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();

			$sql = "
				INSERT INTO `representantes`(`cedula_persona`)
				VALUES('$cedula_persona')
				ON DUPLICATE KEY UPDATE
				`cedula_persona` = `cedula_persona`;
			";

			// echo $sql;
			
			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function mostrar_representantes() {
			// Muestra todos los representantes registrados
			$conexion = conectarBD();

			$sql = "SELECT * FROM `vista_representantes`";

			$resultado = $conexion->query($sql) or die("error: ".$conexion->error);
			
			$lista_representantes = $resultado->fetch_all(MYSQLI_ASSOC);
			
			desconectarBD($conexion);

			return $lista_representantes;
		}

		public function consultar_representantes() {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();

			$sql = "SELECT * FROM `vista_representantes` WHERE `cedula` = '$cedula_persona'";

			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$representante = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $representante;
		}

		public function mostrar_representados() {
			// Muestra los estudiantes que representa el representante
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();

			$sql = "
			SELECT
		    `cedula`,
		    `p_nombre`,
		    `grado_a_cursar`
			FROM
		    `vista_estudiantes`
			WHERE
		    cedula_representante = '$cedula_persona';";

			$resultado = $conexion->query($sql) or die("error: ".$conexion->error);
			
			$lista_representados = $resultado->fetch_all(MYSQLI_ASSOC);
			desconectarBD($conexion);
			
			return $lista_representados;
		}

		public function contar_representados() {
			// Muestra cuantos estudiantes representa el representante
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();

			$sql = "
			SELECT
		    *
			FROM
		    `vista_estudiantes`
			WHERE
		    cedula_representante = '$cedula_persona';";

			$resultado = $conexion->query($sql) or die("error: ".$conexion->error);
			desconectarBD($conexion);
			
			return $resultado->num_rows;
		}


		// GETTERS
		public function get_cedula_persona() {
			return $this->cedula_persona;
		} 


		// SETTERS
		public function set_cedula_persona($cedula_persona) {
			$this->cedula_persona = $cedula_persona;
		}
	}

?>