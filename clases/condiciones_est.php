<?php  

	class condiciones_est {

		// 

		private $cedula_estudiante;
		private $visual;
		private $motora;
		private $auditiva;
		private $escritura;
		private $lectura;
		private $lenguaje;
		private $embarazo;


		// CONSTRUCTOR
		public function __construct(){}


		// GETTERS
		public function get_cedula_estudiante() {
			return $this->cedula_estudiante;
		}
		public function get_visual() {
			return $this->visual;
		}
		public function get_motora() {
			return $this->motora;
		}
		public function get_auditiva() {
			return $this->auditiva;
		}
		public function get_escritura() {
			return $this->escritura;
		}
		public function get_lectura() {
			return $this->lectura;
		}
		public function get_lenguaje() {
			return $this->lenguaje;
		}
		public function get_embarazo() {
			return $this->embarazo;
		}


		// SETTERS
		public function set_cedula_estudiante($cedula_estudiante) {
			$this->cedula_estudiante = $cedula_estudiante
		}
		public function set_visual($visual) {
			$this->visual = $visual
		}
		public function set_motora($motora) {
			$this->motora = $motora
		}
		public function set_auditiva($auditiva) {
			$this->auditiva = $auditiva
		}
		public function set_escritura($escritura) {
			$this->escritura = $escritura
		}
		public function set_lectura($lectura) {
			$this->lectura = $lectura
		}
		public function set_lenguaje($lenguaje) {
			$this->lenguaje = $lenguaje
		}
		public function set_embarazo($embarazo) {
			$this->embarazo = $embarazo
		}

	}

?>