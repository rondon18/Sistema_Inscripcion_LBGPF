<?php 

	class personas {

		// 
		
		private $cedula;
		private $p_nombre;
		private $s_nombre;
		private $p_apellido;
		private $s_apellido;
		private $fecha_nacimiento;
		private $lugar_nacimiento;
		private $genero;
		private $estado_civil;
		private $email;
		private $grado_academico;


		// CONSTRUCTOR
		public function __construct() {}

		public function insertar_persona() {
			$conexion = conectarBD();

			$cedula = $this->get_cedula();
			$p_nombre = $this->get_p_nombre();
			$s_nombre = $this->get_s_nombre();
			$p_apellido = $this->get_p_apellido();
			$s_apellido = $this->get_s_apellido();
			$fecha_nacimiento = $this->get_fecha_nacimiento();
			$lugar_nacimiento = $this->get_lugar_nacimiento();
			$genero = $this->get_genero();
			$estado_civil = $this->get_estado_civil();
			$email = $this->get_email();
			$grado_academico = $this->get_grado_academico();

			$sql = "
				INSERT INTO `personas`(
					`cedula`,
					`p_nombre`,
					`s_nombre`,
					`p_apellido`,
					`s_apellido`,
					`fecha_nacimiento`,
					`lugar_nacimiento`,
					`genero`,
					`estado_civil`,
					`email`,
					`grado_academico`
				)
				VALUES(
					'$cedula',
					'$p_nombre',
					'$s_nombre',
					'$p_apellido',
					'$s_apellido',
					'$fecha_nacimiento',
					'$lugar_nacimiento',
					'$genero',
					'$estado_civil',
					'$email',
					'$grado_academico'
				)
				ON DUPLICATE KEY UPDATE
				`cedula` = `cedula`;
			";

			// echo $sql;

			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}		

		public function editar_persona($cedula_actual) {
			$conexion = conectarBD();

			$cedula = $this->get_cedula();
			$p_nombre = $this->get_p_nombre();
			$s_nombre = $this->get_s_nombre();
			$p_apellido = $this->get_p_apellido();
			$s_apellido = $this->get_s_apellido();
			$fecha_nacimiento = $this->get_fecha_nacimiento();
			$lugar_nacimiento = $this->get_lugar_nacimiento();
			$genero = $this->get_genero();
			$estado_civil = $this->get_estado_civil();
			$email = $this->get_email();
			$grado_academico = $this->get_grado_academico();

			$sql = "
				UPDATE
					`personas`
				SET
					`cedula` = '$cedula',
					`p_nombre` = '$p_nombre',
					`s_nombre` = '$s_nombre',
					`p_apellido` = '$p_apellido',
					`s_apellido` = '$s_apellido',
					`fecha_nacimiento` = '$fecha_nacimiento',
					`lugar_nacimiento` = '$lugar_nacimiento',
					`genero` = '$genero',
					`estado_civil` = '$estado_civil',
					`email` = '$email',
					`grado_academico` = '$grado_academico'
				WHERE
					`cedula` = '$cedula_actual';
			";

			// echo $sql;

			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function eliminar_persona() {
			$conexion = conectarBD();

			$cedula = $this->get_cedula();

			$sql = "
				DELETE
				FROM
					`personas`
				WHERE
				`cedula` = '$cedula';
			";

			// echo $sql;

			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function generar_cedula_provisional() {
			$conexion = conectarBD();
			$sql = "
				SELECT
					*
				FROM
					`personas`
			";

			// echo $sql;
			
			$resultado = $conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);

			// echo $resultado->num_rows;
			
			return $resultado->num_rows + 1;
		}

		// GETTERS
		public function get_cedula() {
			return $this->cedula;
		}
		
		public function get_p_nombre() {
			return $this->p_nombre;
		}
		
		public function get_s_nombre() {
			return $this->s_nombre;
		}
		
		public function get_p_apellido() {
			return $this->p_apellido;
		}
		
		public function get_s_apellido() {
			return $this->s_apellido;
		}
		
		public function get_fecha_nacimiento() {
			return $this->fecha_nacimiento;
		}
		
		public function get_lugar_nacimiento() {
			return $this->lugar_nacimiento;
		}
		
		public function get_genero() {
			return $this->genero;
		}
		
		public function get_estado_civil() {
			return $this->estado_civil;
		}
		
		public function get_email() {
			return $this->email;
		}
		
		public function get_grado_academico() {
			return $this->grado_academico;
		}


		// SETTERS
		public function set_cedula($cedula) {
			if (ctype_alnum($cedula) and (strlen($cedula) >= 3 && strlen($cedula) <= 15)) {
				$this->cedula = $cedula;
			}
			else {
				throw new Exception("Se ingresó un valor no alfanumérico");
			}
		}
		
		public function set_p_nombre($p_nombre) {
			if (ctype_alpha($p_nombre) and (strlen($p_nombre) >= 3 && strlen($p_nombre) <= 25)) {
				$this->p_nombre = $p_nombre;
			}
			else {
				throw new Exception("Se ingresó un valor no alfabético");
			}
		}
		
		public function set_s_nombre($s_nombre) {
			if (ctype_alpha($s_nombre) and (strlen($s_nombre) <= 25)) {
				$this->s_nombre = $s_nombre;
			}
			else {
				throw new Exception("Se ingresó un valor no alfabético");
			}
		}
		
		public function set_p_apellido($p_apellido) {
			if (ctype_alpha($p_apellido) and (strlen($p_apellido) >= 3 && strlen($p_apellido) <= 25)) {
				$this->p_apellido = $p_apellido;
			}
			else {
				throw new Exception("Se ingresó un valor no alfabético");
			}
		}
		
		public function set_s_apellido($s_apellido) {
			if (ctype_alpha($s_apellido) and (strlen($s_apellido) <= 25)) {
				$this->s_apellido = $s_apellido;
			}
			else {
				throw new Exception("Se ingresó un valor no alfabético");
			}
		}
		
		public function set_fecha_nacimiento($fecha_nacimiento) {
			$this->fecha_nacimiento = $fecha_nacimiento;
		}
		
		public function set_lugar_nacimiento($lugar_nacimiento) {
			if (ctype_alnum($lugar_nacimiento) and (strlen($lugar_nacimiento) >= 3 && strlen($lugar_nacimiento) <= 300)) {
				$this->lugar_nacimiento = $lugar_nacimiento;
			}
			else {
				throw new Exception("Se ingresó un valor no alfanumérico");
			}
		}
		
		public function set_genero($genero) {
			
			if (ctype_alpha($genero)) {
				$this->genero = $genero;
			}
			else {
				
			}
		}
		
		public function set_estado_civil($estado_civil) {
			$this->estado_civil = $estado_civil;
		}
		
		public function set_email($email) {


			if (filter_var($email, FILTER_VALIDATE_EMAIL) or empty($email)) {
				$this->email = $email;
			} 
			else {
				throw new Exception("No es un correo valido");
			}

		}
		
		public function set_grado_academico($grado_academico) {
			$this->grado_academico = $grado_academico;
		}
	}

?>