<?php 

	include('estudiantes.php');
	include('padres.php');
	include('representantes.php');
	include('usuarios.php');

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