<?php  

	class padres {
		private $cedula_persona;
		private $pais_residencia;

		public function __construct() {}

		public function insertar_padres() {
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();
			$pais_residencia = $this->get_pais_residencia();

			$sql = "
				INSERT INTO `padres`(
			    `cedula_persona`,
			    `pais_residencia`
				)
				VALUES('$cedula_persona', '$pais_residencia')
				ON DUPLICATE KEY UPDATE
				`cedula_persona` = `cedula_persona`;
			";

			// echo $sql;

			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function mostrar_padres() {
			// Muestra todos los representantes registrados
			$conexion = conectarBD();

			$sql = "SELECT * FROM `vista_padres`";

			$resultado = $conexion->query($sql) or die("error: ".$conexion->error);
			
			$lista_padres = $resultado->fetch_all(MYSQLI_ASSOC);
			
			desconectarBD($conexion);

			return $lista_padres;
		}


		public function consultar_padres() {
			// Muestra todos los estudiantes registrados
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();

			$sql = "SELECT * FROM `vista_padres` WHERE `cedula` = '$cedula_persona'";

			$consulta_estudiante = $conexion->query($sql) or die("error: ".$conexion->error);
			$padre = $consulta_estudiante->fetch_assoc();
			
			desconectarBD($conexion);

			return $padre;
		}

		public function mostrar_hijos() {
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
		    cedula_padre = '$cedula_persona' OR
		    cedula_madre = '$cedula_persona'
		    ";

			$resultado = $conexion->query($sql) or die("error: ".$conexion->error);
			
			$lista_hijos = $resultado->fetch_all(MYSQLI_ASSOC);
			desconectarBD($conexion);
			
			return $lista_hijos;
		}

		public function contar_hijos() {
			// Muestra cuantos estudiantes representa el representante
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();

			$sql = "
			SELECT
		    *
			FROM
		    `vista_estudiantes`
			WHERE
		    cedula_padre = '$cedula_persona' OR
		    cedula_madre = '$cedula_persona'
	    ";

			$resultado = $conexion->query($sql) or die("error: ".$conexion->error);
			desconectarBD($conexion);
			
			return $resultado->num_rows;
		}


		public function get_cedula_persona() {
			return $this->cedula_persona;
		}
		public function get_pais_residencia() {
			return $this->pais_residencia;
		}

		public function set_cedula_persona($cedula_persona) {
			$this->cedula_persona = $cedula_persona;
		}
		public function set_pais_residencia($pais_residencia) {
			$this->pais_residencia = $pais_residencia;
		}

	}

?>