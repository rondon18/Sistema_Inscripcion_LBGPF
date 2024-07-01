<?php 

	class vac_covid19_est  {

		// 

		private $cedula_estudiante;
		private $vac_aplicada;
		private $dosis;
		private $lote;
	

		// CONSTRUCTOR
		public function __construct() {}

		public function insertar_vac_covid19_est() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_estudiante = mysqli_escape_string($conexion,$this->get_cedula_estudiante());
					$vac_aplicada = mysqli_escape_string($conexion,$this->get_vac_aplicada());
					$dosis = mysqli_escape_string($conexion,$this->get_dosis());
					$lote = mysqli_escape_string($conexion,$this->get_lote());
					$sql = "INSERT INTO `vac_covid19_est`( `cedula_estudiante`, `vac_aplicada`, `dosis`, `lote` ) VALUES( '$cedula_estudiante', '$vac_aplicada', '$dosis', '$lote' ) ON DUPLICATE KEY UPDATE `cedula_estudiante` = `cedula_estudiante`; ";
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

		public function editar_vac_covid19_est() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_estudiante = mysqli_escape_string($conexion,$this->get_cedula_estudiante());
					$vac_aplicada = mysqli_escape_string($conexion,$this->get_vac_aplicada());
					$dosis = mysqli_escape_string($conexion,$this->get_dosis());
					$lote = mysqli_escape_string($conexion,$this->get_lote());
					$sql = "UPDATE `vac_covid19_est` SET `vac_aplicada` = '$vac_aplicada', `dosis` = '$dosis', `lote` = '$lote' WHERE `cedula_estudiante` = '$cedula_estudiante' ";
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

		public function get_vac_aplicada() {
			return $this->vac_aplicada;
		}

		public function get_dosis() {
			return $this->dosis;
		}

		public function get_lote() {
			return $this->lote;
		}


		// SETTERS
		public function set_cedula_estudiante($cedula_estudiante) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($cedula_estudiante)) {
					throw new Exception("El número de cédula no puede estar vacío");
				}
				// Validar la longitud y el formato de la cédula
				if (strlen($cedula_estudiante) < 4 || strlen($cedula_estudiante) > 11 || !preg_match('/^(V|E)[0-9]+$/', $cedula_estudiante)) {
					throw new Exception("El número de cédula $cedula_estudiante tiene un formato inválido");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->cedula_estudiante = $cedula_estudiante;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_vac_aplicada($vac_aplicada = "NV") {
			try {
				// Validar que la cédula no esté vacía
				if (empty($vac_aplicada)) {
					throw new Exception("La vacuna contra el Covid19 no puede estar vacia");
				}
				$opciones = ["nv","pfizer/biontech","moderna","aztrazeneca","janssen","sinopharm","sinovac","bharat","cansinobio","valneva","novavax",];
				// Validar la longitud y el formato de la cédula
				if (!in_array(strtolower($vac_aplicada),$opciones) || !preg_match('/^[a-zA-Z0-9\s\/.,:;?!áéíóúüÁÉÍÓÚÜ]+$/i', $vac_aplicada)) {
					throw new Exception("La vacuna contra el Covid19 ($vac_aplicada) tiene un formato inválido o está fuera de las opciones preestablecidas");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->vac_aplicada = $vac_aplicada;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_dosis($dosis = 0) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($dosis)) {
					throw new Exception("El número de dosis de vacuna contra el Covid19 no puede estar vacío");
				}
				// Validar la longitud y el formato de la cédula
				if ($dosis < 0 || $dosis > 10 || !preg_match('/^[0-9]+$/i', $dosis)) {
					throw new Exception("El número de dosis contra el Covid19 ($dosis) tiene un formato inválido o está fuera del rango preestablecido");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->dosis = $dosis;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_lote($lote) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($lote)) {
					$this->lote = $lote;
					return;
				}
				// Validar la longitud y el formato de la cédula
				if (strlen($lote) < 10 || strlen($lote) > 15 || !preg_match('/^[A-Z0-9-]+$/i', $lote)) {
					throw new Exception("El número de lote contra el Covid19 ($lote) tiene un formato inválido o está fuera del rango preestablecido");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->lote = strtoupper($lote);
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
	}

?>