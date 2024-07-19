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
		public function __construct() {}


		public function insertar_contactos_aux() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {

					$cedula_representante = mysqli_escape_string($conexion,$this->get_cedula_representante());
					$nombre = mysqli_escape_string($conexion,$this->get_nombre());
					$apellido = mysqli_escape_string($conexion,$this->get_apellido());
					$prefijo_telefono = mysqli_escape_string($conexion,$this->get_prefijo_telefono());
					$nro_telefono = mysqli_escape_string($conexion,$this->get_nro_telefono());
					$relacion = mysqli_escape_string($conexion,$this->get_relacion());

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

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$conexion->query($sql);
						desconectarBD($conexion);
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function editar_contactos_aux() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_representante = mysqli_escape_string($conexion,$this->get_cedula_representante());
					$nombre = mysqli_escape_string($conexion,$this->get_nombre());
					$apellido = mysqli_escape_string($conexion,$this->get_apellido());
					$prefijo_telefono = mysqli_escape_string($conexion,$this->get_prefijo_telefono());
					$nro_telefono = mysqli_escape_string($conexion,$this->get_nro_telefono());
					$relacion = mysqli_escape_string($conexion,$this->get_relacion());

					$sql = "
						UPDATE
					    `contactos_aux`
						SET
					    `nombre` = '$nombre',
					    `apellido` = '$apellido',
					    `prefijo_telefono` = '$prefijo_telefono',
					    `nro_telefono` = '$nro_telefono',
					    `relacion` = '$relacion'
						WHERE
					    `cedula_representante` = '$cedula_representante'
					";

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$conexion->query($sql);
						desconectarBD($conexion);
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
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
			try {
				// Validar que la cédula no esté vacía
				if (empty($cedula_representante)) {
					throw new Exception("El número de cédula no puede estar vacío");
				}

				// Validar la longitud y el formato de la cédula
				if (strlen($cedula_representante) < 4 || strlen($cedula_representante) > 11 || !preg_match('/^[a-zA-Z0-9\s]+$/', $cedula_representante)) {
					throw new Exception("El número de cédula $cedula_representante tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->cedula_representante = $cedula_representante;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function set_nombre($nombre) {
			if (empty($nombre)) {
				// Si el nombre está vacío, no se valida y se guarda
				$this->nombre = $nombre;
				return;
			}
			try {
				// Validar la longitud y el formato del dato
				if (strlen($nombre) < 3 || strlen($nombre) > 40 || !preg_match('/^[a-zA-Z\s.,:;?!áéíóúüÁÉÍÓÚÜñÑ]+$/i', $nombre)) {
					throw new Exception("El nombre ($nombre) tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->nombre = $nombre;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function set_apellido($apellido) {
			if (empty($apellido)) {
				// Si el apellido está vacío, no se valida y se guarda
				$this->apellido = $apellido;
				return;
			}
			try {
				// Validar la longitud y el formato del apellido
				if (strlen($apellido) < 3 || strlen($apellido) > 40 || !preg_match('/^[a-zA-Z\s.,:;?!áéíóúüÁÉÍÓÚÜñÑ]+$/i', $apellido)) {
					throw new Exception("El apellido ($apellido) tiene un formato inválido");
				}

				// Si el apellido es válido, asignarlo a la propiedad
				$this->apellido = $apellido;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function set_prefijo_telefono($prefijo_telefono) {
			if (empty($prefijo_telefono)) {
				// Si el prefijo_telefono está vacío, no se valida y se guarda
				$this->prefijo_telefono = $prefijo_telefono;
				return;
			}
			try {
				// Validar la longitud y el formato del prefijo_telefono
				if (strlen($prefijo_telefono) != 4 || !is_numeric($prefijo_telefono)) {
					throw new Exception("El prefijo de telefono ($prefijo_telefono) tiene un formato inválido");
				}
				// Si el prefijo_telefono es válido, asignarlo a la propiedad
				$this->prefijo_telefono = $prefijo_telefono;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function set_nro_telefono($nro_telefono) {
			if (empty($nro_telefono)) {
				// Si el nro_telefono está vacío, no se valida y se guarda
				$this->nro_telefono = $nro_telefono;
				return;
			}
			try {
				// Validar la longitud y el formato del nro_telefono
				if (strlen($nro_telefono) != 7 || !is_numeric($nro_telefono)) {
					throw new Exception("El numero de telefono ($nro_telefono) tiene un formato inválido");
				}
				// Si el nro_telefono es válido, asignarlo a la propiedad
				$this->nro_telefono = $nro_telefono;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function set_relacion($relacion) {
			if (empty($relacion)) {
				// Si el relacion está vacío, no se valida y se guarda
				$this->relacion = $relacion;
				return;
			}
			try {
				// Validar la longitud y el formato del relacion
				if (strlen($relacion) < 3 || strlen($relacion) >= 50 || !preg_match('/^[a-zA-Z\s.,:;?!áéíóúüÁÉÍÓÚÜñÑ]+$/i',$relacion)) {
					throw new Exception("El la relacion de contacto auxiliar ($relacion) tiene un formato inválido");
				}
				// Si la relacion es válida, asignarlo a la propiedad
				$this->relacion = $relacion;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

	}

?>