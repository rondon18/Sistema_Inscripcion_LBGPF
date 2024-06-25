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
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());
					$relacion = mysqli_escape_string($conexion,$this->get_relacion());
					$prefijo = mysqli_escape_string($conexion,$this->get_prefijo());
					$numero = mysqli_escape_string($conexion,$this->get_numero());

					// Verifica si no hay un registro previo para evitar excendentes
					if ($this->verificar_telefono($cedula_persona,$relacion) < 1) {
						$sql = "INSERT INTO `telefonos`(`cedula_persona`,`relacion`,`prefijo`,`numero`) VALUES('$cedula_persona','$relacion','$prefijo','$numero') ON DUPLICATE KEY UPDATE `cedula_persona` = `cedula_persona`;";
					}
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
		

		public function editar_telefono() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());
					$relacion = mysqli_escape_string($conexion,$this->get_relacion());
					$prefijo = mysqli_escape_string($conexion,$this->get_prefijo());
					$numero = mysqli_escape_string($conexion,$this->get_numero());
					$sql = "UPDATE `telefonos` SET `prefijo` = '$prefijo', `numero` = '$numero' WHERE `cedula_persona` = '$cedula_persona' AND `relacion` = '$relacion' ";
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

		public function verificar_telefono($cedula_persona,$relacion) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sql = "SELECT * FROM `telefonos` WHERE `cedula_persona` = '$cedula_persona'  AND  `relacion` = '$relacion';";
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$resultado = $conexion->query($sql);
						desconectarBD($conexion);
						return $resultado->num_rows;
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return 1;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return 1;
			}
		}

		public function consultar_telefonos() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());
					$sql = "SELECT * FROM `telefonos` WHERE `cedula_persona` = '$cedula_persona'";
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_telefonos = $conexion->query($sql);
						$telefonos = $consulta_telefonos->fetch_all(MYSQLI_ASSOC);
						desconectarBD($conexion);
						return $telefonos;
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return $telefonos = [];
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return $telefonos = [];
			}
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
			try {
				// Validar que la cédula no esté vacía
				if (empty($cedula_persona)) {
					throw new Exception("El número de cédula no puede estar vacío");
				}
				// Validar la longitud y el formato de la cédula
				if (strlen($cedula_persona) < 4 || strlen($cedula_persona) > 11 || !preg_match('/^(V|E)[0-9]+$/', $cedula_persona)) {
					throw new Exception("El número de cédula $cedula_persona tiene un formato inválido");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->cedula_persona = $cedula_persona;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_relacion($relacion) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($cedula_persona)) {
					throw new Exception("El número de cédula no puede estar vacío");
				}
				// Validar la longitud y el formato de la cédula
				if (!in_array(strtolower($relacion), ["principal","secundario","auxiliar","trabajo",])) {
					throw new Exception("El número de cédula $cedula_persona tiene un formato inválido");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->cedula_persona = $cedula_persona;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_prefijo($prefijo) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($prefijo)) {
					$this->prefijo = $prefijo;
					return;
				}
				// Validar la longitud y el formato de la cédula
				if (strlen($prefijo) != 4 || !preg_match('/^[0-9]+$/', $prefijo)) {
					throw new Exception("El prefijo telefonico ($prefijo) tiene un formato inválido");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->prefijo = $prefijo;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_numero($numero) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($numero)) {
					$this->numero = $numero;
					return;
				}
				// Validar la longitud y el formato de la cédula
				if (strlen($numero) < 7 || strlen($numero) > 11 || !preg_match('/^[0-9]+$/', $numero)) {
					throw new Exception("El número telefonico ($numero) tiene un formato inválido");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->numero = $numero;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

	}

?>