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
			$this->cedula = $cedula;
		}
		
		public function set_p_nombre($p_nombre) {
			$this->p_nombre = $p_nombre;
		}
		
		public function set_s_nombre($s_nombre) {
			$this->s_nombre = $s_nombre;
		}
		
		public function set_p_apellido($p_apellido) {
			$this->p_apellido = $p_apellido;
		}
		
		public function set_s_apellido($s_apellido) {
			$this->s_apellido = $s_apellido;
		}
		
		public function set_fecha_nacimiento($fecha_nacimiento) {
			$this->fecha_nacimiento = $fecha_nacimiento;
		}
		
		public function set_lugar_nacimiento($lugar_nacimiento) {
			$this->lugar_nacimiento = $lugar_nacimiento;
		}
		
		public function set_genero($genero) {
			$this->genero = $genero;
		}
		
		public function set_estado_civil($estado_civil) {
			$this->estado_civil = $estado_civil;
		}
		
		public function set_email($email) {
			$this->email = $email;
		}
		
		public function set_grado_academico($grado_academico) {
			$this->grado_academico = $grado_academico;
		}
	}

?>