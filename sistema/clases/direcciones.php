<?php  

	class direcciones {

		// 

		private $cedula_persona;
		private $estado;
		private $municipio;
		private $parroquia;
		private $sector;
		private $calle;
		private $nro_casa;
		private $punto_referencia;


		// constructor
		public function __construct() {}


		public function insertar_direcciones() {
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();
			$estado = $this->get_estado();
			$municipio = $this->get_municipio();
			$parroquia = $this->get_parroquia();
			$sector = $this->get_sector();
			$calle = $this->get_calle();
			$nro_casa = $this->get_nro_casa();
			$punto_referencia = $this->get_punto_referencia();
			
			$sql = "
				INSERT INTO `direcciones`(
					`cedula_persona`,
					`estado`,
					`municipio`,
					`parroquia`,
					`sector`,
					`calle`,
					`nro_casa`,
					`punto_referencia`
				)
				VALUES(
					'$cedula_persona',
					'$estado',
					'$municipio',
					'$parroquia',
					'$sector',
					'$calle',
					'$nro_casa',
					'$punto_referencia'
				)
				ON DUPLICATE KEY UPDATE
				`cedula_persona` = `cedula_persona`;
			";

			// echo $sql;
			
			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function editar_direcciones() {
			$conexion = conectarBD();

			$cedula_persona = $this->get_cedula_persona();
			$estado = $this->get_estado();
			$municipio = $this->get_municipio();
			$parroquia = $this->get_parroquia();
			$sector = $this->get_sector();
			$calle = $this->get_calle();
			$nro_casa = $this->get_nro_casa();
			$punto_referencia = $this->get_punto_referencia();
			
			$sql = "
				UPDATE
    			`direcciones`
				SET
			    `estado` = '$estado',
			    `municipio` = '$municipio',
			    `parroquia` = '$parroquia',
			    `sector` = '$sector',
			    `calle` = '$calle',
			    `nro_casa` = '$nro_casa',
			    `punto_referencia` = '$punto_referencia'
				WHERE
			    `cedula_persona` = '$cedula_persona'
			";

			// echo $sql;
			
			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}
		
		// getters
		public function get_cedula_persona() {
			return $this->cedula_persona;
		}
		
		public function get_estado() {
			return $this->estado;
		}
		
		public function get_municipio() {
			return $this->municipio;
		}
		
		public function get_parroquia() {
			return $this->parroquia;
		}
		
		public function get_sector() {
			return $this->sector;
		}
		
		public function get_calle() {
			return $this->calle;
		}
		
		public function get_nro_casa() {
			return $this->nro_casa;
		}
		
		public function get_punto_referencia() {
			return $this->punto_referencia;
		}


		// setters
		public function set_cedula_persona($cedula_persona) {
			$this->cedula_persona = $cedula_persona;
		}
		
		public function set_estado($estado) {
			$this->estado = $estado;
		}
		
		public function set_municipio($municipio) {
			$this->municipio = $municipio;
		}
		
		public function set_parroquia($parroquia) {
			$this->parroquia = $parroquia;
		}
		
		public function set_sector($sector) {
			$this->sector = $sector;
		}
		
		public function set_calle($calle) {
			$this->calle = $calle;
		}
		
		public function set_nro_casa($nro_casa) {
			$this->nro_casa = $nro_casa;
		}
		
		public function set_punto_referencia($punto_referencia) {
			$this->punto_referencia = $punto_referencia;
		}
	}

?>