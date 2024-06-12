<?php  

	class tallas_est {

		// 

		private $cedula_estudiante;
		private $camisa;
		private $pantalon;
		private $calzado;

		// CONSTRUCTOR
		public function __construct() {}
		

		public function insertar_tallas_est() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_estudiante = mysqli_escape_string($conexion,$this->get_cedula_estudiante());
					$camisa = mysqli_escape_string($conexion,$this->get_camisa());
					$pantalon = mysqli_escape_string($conexion,$this->get_pantalon());
					$calzado = mysqli_escape_string($conexion,$this->get_calzado());

					$sql = "
						INSERT INTO `tallas_est`(
						    `cedula_estudiante`,
						    `camisa`,
						    `pantalon`,
						    `calzado`
						)
						VALUES(
						    '$cedula_estudiante',
						    '$camisa',
						    '$pantalon',
						    '$calzado'
						)
						ON DUPLICATE KEY UPDATE
						`cedula_estudiante` = `cedula_estudiante`;
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

		public function editar_tallas_est() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_estudiante = mysqli_escape_string($conexion,$this->get_cedula_estudiante());
					$camisa = mysqli_escape_string($conexion,$this->get_camisa());
					$pantalon = mysqli_escape_string($conexion,$this->get_pantalon());
					$calzado = mysqli_escape_string($conexion,$this->get_calzado());
					$sql = "
						UPDATE
					    `tallas_est`
						SET
					    `camisa` = '$camisa',
					    `pantalon` = '$pantalon',
					    `calzado` = '$calzado'
						WHERE
					    `cedula_estudiante` = '$cedula_estudiante'
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
		
		public function get_cedula_estudiante() {
			return $this->cedula_estudiante;
		}
		
		public function get_camisa() {
			return $this->camisa;
		}
		
		public function get_pantalon() {
			return $this->pantalon;
		}
		
		public function get_calzado() {
			return $this->calzado;
		}


		// SETTERS
		
		public function set_cedula_estudiante($cedula_estudiante) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($cedula_estudiante)) {
					throw new Exception("El número de cédula no puede estar vacío");
				}

				// Validar la longitud y el formato de la cédula
				if (strlen($cedula_estudiante) < 4 || strlen($cedula_estudiante) > 11 || !preg_match('/^[a-zA-Z0-9\s]+$/', $cedula_estudiante)) {
					throw new Exception("El número de cédula $cedula_estudiante tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->cedula_estudiante = $cedula_estudiante;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_camisa($camisa) {
			try {
				// Validar que el dato no esté vacío para la comparación, aún así es válido
				if (empty($camisa)) {
					$this->camisa = $camisa;
					return;
				}

				// Validar la longitud y el formato del dato
				if (strlen($camisa) < 1 || strlen($camisa) > 7 || !preg_match('/^[a-zA-Z0-9\s.,:;?!áéíóúüÁÉÍÓÚÜñ]+$/i', $camisa)) {
					throw new Exception("La talla de camisa ($camisa) tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->camisa = $camisa;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_pantalon($pantalon) {
			try {
				// Validar que el dato no esté vacío para la comparación, aún así es válido
				if (empty($pantalon)) {
					$this->pantalon = $pantalon;
					return;
				}

				// Validar la longitud y el formato del dato
				if (strlen($pantalon) < 1 || strlen($pantalon) > 7 || !preg_match('/^[a-zA-Z0-9\s.,:;?!áéíóúüÁÉÍÓÚÜñ]+$/i', $pantalon)) {
					throw new Exception("La talla de pantalon ($pantalon) tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->pantalon = $pantalon;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_calzado($calzado) {
			try {
				// Validar que el dato no esté vacío para la comparación, aún así es válido
				if (empty($calzado)) {
					$this->calzado = $calzado;
					return;
				}

				// Validar la longitud y el formato del dato
				if (strlen($calzado) < 1 || strlen($calzado) > 7 || !preg_match('/^[a-zA-Z0-9\s.,:;?!áéíóúüÁÉÍÓÚÜñ]+$/i', $calzado)) {
					throw new Exception("La talla de calzado ($calzado) tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->calzado = $calzado;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

	}

?>