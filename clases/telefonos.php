<?php  

	class telefonos {

		// 

		private $cedula_persona;
		private $relacion;
		private $prefijo;
		private $numero;


		// CONSTRUCTOR
		public function __construct() {}


		public function insertar_telefono() {

			$cedula_persona = $this->get_cedula_persona();
			$relacion = $this->get_relacion();
			$prefijo = $this->get_prefijo();
			$numero = $this->get_numero();

			// Verifica si no hay un registro previo para evitar excendentes
			if ($this->verificar_telefono($cedula_persona,$relacion) < 1) {
				$conexion = conectarBD();

				$sql = "
					INSERT INTO `telefonos`(
				    `cedula_persona`,
				    `relacion`,
				    `prefijo`,
				    `numero`
					)
					VALUES(
				    '$cedula_persona',
				    '$relacion',
				    '$prefijo',
				    '$numero'
					)
					ON DUPLICATE KEY UPDATE
					`cedula_persona` = `cedula_persona`;
				";

				// echo $sql;
				
				$conexion->query($sql) or die("error: ".$conexion->error);

				desconectarBD($conexion);
			}
		}

		public function verificar_telefono($cedula_persona,$relacion) {
			$conexion = conectarBD();

			$sql = "
				SELECT
			    *
				FROM
			    `telefonos`
				WHERE
			    `cedula_persona` = '$cedula_persona' 
			    	AND 
		    	`relacion` = '$relacion';
			";

			// echo $sql;
			
			$resultado = $conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);

			// echo $resultado->num_rows;
			
			return $resultado->num_rows;
		}

		public function consultar_telefonos() {
			// Muestra todos los telefonos registrados
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();

			$sql = "SELECT * FROM `telefonos` WHERE `cedula_persona` = '$cedula_persona'";

			$consulta_telefonos = $conexion->query($sql) or die("error: ".$conexion->error);
			$telefonos = $consulta_telefonos->fetch_all(MYSQLI_ASSOC);
			
			desconectarBD($conexion);

			return $telefonos;
		}

		// GETTERS
		public function get_cedula_persona() {
			return $this->cedula_persona;
		}
		
		public function get_relacion() {
			return $this->relacion;
		}
		
		public function get_prefijo() {
			return $this->prefijo;
		}
		
		public function get_numero() {
			return $this->numero;
		}


		// SETTERS
		public function set_cedula_persona($cedula_persona) {
			$this->cedula_persona = $cedula_persona;
		}
		
		public function set_relacion($relacion) {
			$this->relacion = $relacion;
		}
		
		public function set_prefijo($prefijo) {
			$this->prefijo = $prefijo;
		}
		
		public function set_numero($numero) {
			$this->numero = $numero;
		}

	}

?>