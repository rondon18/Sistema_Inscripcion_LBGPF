<?php  

	class contactos_aux {

		// 
		
		private $cedula_representante;
		private $nombre;
		private $apellido;
		private $prefijo_telefono;
		private $nro_telefono;
		private $relacion;


		// CONSTRUCTOR
		public function ___construct() {}


		public function insertar_contactos_aux() {
			$conexion = conectarBD();

			$cedula_representante = $this->get_cedula_representante();
			$nombre = $this->get_nombre();
			$apellido = $this->get_apellido();
			$prefijo_telefono = $this->get_prefijo_telefono();
			$nro_telefono = $this->get_nro_telefono();
			$relacion = $this->get_relacion();

			$sql = "
				INSERT INTO `contactos_aux`(
			    `cedula_representante`,
			    `nombre`,
			    `apellido`,
			    `prefijo_telefono`,
			    `nro_telefono`,
			    `relacion`
				)
				VALUES(
			    '$cedula_representante',
			    '$nombre',
			    '$apellido',
			    '$prefijo_telefono',
			    '$nro_telefono',
			    '$relacion'
				)
				ON DUPLICATE KEY UPDATE
				`cedula_representante` = `cedula_representante`;
			";

			// echo $sql;
			
			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		// GETTERS
		public function get_cedula_representante() {
			return $this->cedula_representante;
		}
		public function get_nombre() {
			return $this->nombre;
		}
		public function get_apellido() {
			return $this->apellido;
		}
		public function get_prefijo_telefono() {
			return $this->prefijo_telefono;
		}
		public function get_nro_telefono() {
			return $this->nro_telefono;
		}
		public function get_relacion() {
			return $this->relacion;
		}


		// SETTERS
		public function set_cedula_representante($cedula_representante) {
			$this->cedula_representante = $cedula_representante;
		}
		public function set_nombre($nombre) {
			$this->nombre = $nombre;
		}
		public function set_apellido($apellido) {
			$this->apellido = $apellido;
		}
		public function set_prefijo_telefono($prefijo_telefono) {
			$this->prefijo_telefono = $prefijo_telefono;
		}
		public function set_nro_telefono($nro_telefono) {
			$this->nro_telefono = $nro_telefono;
		}
		public function set_relacion($relacion) {
			$this->relacion = $relacion;
		}

	}

?>