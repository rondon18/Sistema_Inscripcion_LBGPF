<?php  

	class datos_economicos {

		// 

		private $cedula_representante;
		private $banco;
		private $tipo_cuenta;
		private $nro_cuenta;


		// CONSTRUCTOR
		public function __construct() {}
		
		public function insertar_datos_economicos() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_representante = mysqli_escape_string($conexion,$this->get_cedula_representante());
					$banco = mysqli_escape_string($conexion,$this->get_banco());
					$tipo_cuenta = mysqli_escape_string($conexion,$this->get_tipo_cuenta());
					$nro_cuenta = mysqli_escape_string($conexion,$this->get_nro_cuenta());

					$sql = "
						INSERT INTO `datos_economicos`(
							`cedula_representante`,
							`banco`,
							`tipo_cuenta`,
							`nro_cuenta`
						)
						VALUES(
							'$cedula_representante',
							'$banco',
							'$tipo_cuenta',
							'$nro_cuenta'
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
		
		public function editar_datos_economicos() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_representante = mysqli_escape_string($conexion,$this->get_cedula_representante());
					$banco = mysqli_escape_string($conexion,$this->get_banco());
					$tipo_cuenta = mysqli_escape_string($conexion,$this->get_tipo_cuenta());
					$nro_cuenta = mysqli_escape_string($conexion,$this->get_nro_cuenta());

					$sql = "
						UPDATE
					    `datos_economicos`
						SET
					    `banco` = '$banco',
					    `tipo_cuenta` = '$tipo_cuenta',
					    `nro_cuenta` = '$nro_cuenta'
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
		public function get_banco() {
			return $this->banco;
		}
		public function get_tipo_cuenta() {
			return $this->tipo_cuenta;
		}
		public function get_nro_cuenta() {
			return $this->nro_cuenta;
		}


		// SETTERS
		public function set_cedula_representante($cedula_representante) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($cedula_representante)) {
					throw new Exception("El número de cédula no puede estar vacío");
				}

				// Validar la longitud y el formato de la cédula
				if (strlen($cedula_representante) <= 4 || strlen($cedula_representante) >= 11 || !preg_match('/^[a-zA-Z0-9\s]+$/', $cedula_representante)) {
					throw new Exception("El número de cédula $cedula_representante tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->cedula_representante = $cedula_representante;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function set_banco($banco) {
			$bancos = [
				"banco de venezuela s.a.",
				"venezolano de crédito s.a.",
				"banco mercantil, c.a",
				"banco provincial, s.a.",
				"bancaribe c.a.",
				"banco exterior c.a.",
				"banco occidental de descuento, c.a.",
				"banco caroní c.a.",
				"banesco s.a.c.a.",
				"banco sofitasa c.a.",
				"banco plaza c.a.",
				"banco de la gente emprendedora c.a. - bangente",
				"banco del pueblo soberano, c.a.",
				"banco fondo común c.a.",
				"100% banco, c.a.",
				"delsur, c.a.",
				"banco del tesoro, c.a.",
				"banco agrícola de venezuela, c.a",
				"bancrecer, s.a.",
				"mi banco c.a.",
				"banco activo, c.a.",
				"bancamiga, c.a.",
				"banco internacional de desarrollo, c.a.",
				"banplus, c.a.",
				"banco bicentenario c.a.",
				"banco de la fuerza armada nacional bolivariana - banfanb",
				"citibank n.a.",
				"banco nacional de crédito, c.a.",
				"instituto municipal de crédito popular",
			];
			try {
				// Validar la longitud y el formato del dato
				if (!in_array(strtolower($banco),$bancos)) {
					throw new Exception("El banco: $banco es inválido");
				}
				$this->banco = $banco;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function set_tipo_cuenta($tipo_cuenta) {
			try {
				// Validar la longitud y el formato del dato
				if (!in_array(strtolower($tipo_cuenta),["ahorro","corriente"])) {
					throw new Exception("El tipo_cuenta: $tipo_cuenta es inválido");
				}
				$this->tipo_cuenta = $tipo_cuenta;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function set_nro_cuenta($nro_cuenta) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($nro_cuenta)) {
					$this->nro_cuenta = $nro_cuenta;
					return;
				}
				// Validar la longitud y el formato del número de cuenta
				if (!is_numeric($nro_cuenta) || strlen($nro_cuenta) != 20) {
					throw new Exception("El número de cuenta ($nro_cuenta) tiene un formato inválido");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->nro_cuenta = $nro_cuenta;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
	}
?>