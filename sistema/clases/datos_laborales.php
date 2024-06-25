<?php  

	class datos_laborales {

		// 

		private $cedula_persona;
		private $empleo;
		private $lugar_trabajo;
		private $remuneracion;
		private $tipo_remuneracion;
	

		// CONSTRUCTOR
		public function __construct(){}

		public function insertar_datos_laborales() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());
					$empleo = mysqli_escape_string($conexion,$this->get_empleo());
					$lugar_trabajo = mysqli_escape_string($conexion,$this->get_lugar_trabajo());
					$remuneracion = mysqli_escape_string($conexion,$this->get_remuneracion());
					$tipo_remuneracion = mysqli_escape_string($conexion,$this->get_tipo_remuneracion());

					$sql = "
						INSERT INTO `datos_laborales`(
							`cedula_persona`,
							`empleo`,
							`lugar_trabajo`,
							`remuneracion`,
							`tipo_remuneracion`
						)
						VALUES(
							'$cedula_persona',
							'$empleo',
							'$lugar_trabajo',
							'$remuneracion',
							'$tipo_remuneracion'
						)
						ON DUPLICATE KEY UPDATE
						`cedula_persona` = `cedula_persona`;
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

		public function editar_datos_laborales() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());
					$empleo = mysqli_escape_string($conexion,$this->get_empleo());
					$lugar_trabajo = mysqli_escape_string($conexion,$this->get_lugar_trabajo());
					$remuneracion = mysqli_escape_string($conexion,$this->get_remuneracion());
					$tipo_remuneracion = mysqli_escape_string($conexion,$this->get_tipo_remuneracion());

					$sql = "
						UPDATE
							`datos_laborales`
						SET
							`empleo` = '$empleo',
							`lugar_trabajo` = '$lugar_trabajo',
							`remuneracion` = '$remuneracion',
							`tipo_remuneracion` = '$tipo_remuneracion'
						WHERE
							`cedula_persona` = '$cedula_persona'
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
		public function get_cedula_persona() {
			return $this->cedula_persona;
		}
		
		public function get_empleo() {
			return $this->empleo;
		}
		
		public function get_lugar_trabajo() {
			return $this->lugar_trabajo;
		}
		
		public function get_remuneracion() {
			return $this->remuneracion;
		}
		
		public function get_tipo_remuneracion() {
			return $this->tipo_remuneracion;
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

		public function set_empleo($empleo) {
			try {
				// Si el empleo esta vacio por defecto se dejará como desempleado
				if (empty($empleo)) {
					$this->empleo = "Desempleado";
					return;
				}
				// Validar la longitud y el formato del dato
				if (strlen($empleo) < 3 || strlen($empleo) >= 200 || !preg_match('/^[a-zA-Z0-9\s.,:;?!áéíóúüÁÉÍÓÚÜ]+$/i', $empleo)) {
					throw new Exception("El empleo $empleo cuenta con un formato inválido");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->empleo = $empleo;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_lugar_trabajo($lugar_trabajo) {
			try {
				// Si el empleo esta vacio por defecto se dejará como desempleado
				if (empty($lugar_trabajo)) {
					$this->lugar_trabajo = $lugar_trabajo;
					return;
				}
				// Validar la longitud y el formato del dato
				if (strlen($lugar_trabajo) < 3 || strlen($lugar_trabajo) >= 200 || !preg_match('/^[a-zA-Z0-9\s.,:;?!áéíóúüÁÉÍÓÚÜ]+$/i', $lugar_trabajo)) {
					throw new Exception("El lugar_trabajo $lugar_trabajo cuenta con un formato inválido");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->lugar_trabajo = $lugar_trabajo;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_remuneracion($remuneracion) {
			try {
				// Si el empleo esta vacio por defecto se dejará como 0
				if (empty($remuneracion)) {
					$this->remuneracion = 0;
					return;
				}
				else {
					// Validar la longitud y el formato del dato
					if ($remuneracion < 0 || $remuneracion >= 500) {
						throw new Exception("La remuneracion ($remuneracion) cuenta con un formato inválido");
					}
					// Si el dato es válido, asignarlo a la propiedad
					$this->remuneracion = $remuneracion;
				}
			}
			catch (Exception $e) {
				$this->remuneracion = 0;
				miManejadorExcepcion($e);
			}
		}

		public function set_tipo_remuneracion($tipo_remuneracion) {
			$remuneraciones = ["diaria","semanal","quincenal","mensual",""];
			try {
				// Validar la longitud y el formato del dato
				if (!in_array(strtolower($tipo_remuneracion),$remuneraciones)) {
					throw new Exception("El tipo de remuneración: $tipo_remuneracion es inválido");
				}
				$this->tipo_remuneracion = $tipo_remuneracion;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
	}
	
?>