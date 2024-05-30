<?php  

	class bitacora {
		private $id_bitacora;
		private $fecha_ingreso;
		private $fecha_salida;
		private $hora_ingreso;
		private $hora_salida;
		private $acciones_realizadas;
		private $cedula_usuario;

		// CONSTRUCTOR
		public function __construct(){}

		// Primera instaciación de la bitacora (login)
		public function iniciar_bitacora() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					// toma la fecha y hora actual para registrar el inicio de sesion
					date_default_timezone_set("America/Caracas");

					$fecha_ingreso = date("Y-m-d");
					$hora_ingreso = date("H:i:s");

					// primera accion como inicia sesión
					$acciones_realizadas = mysqli_escape_string($conexion,"Inicia sesión");

					$cedula_usuario = $this->get_cedula_usuario();

					$sql = "
						INSERT INTO `bitacora`(
					    `id_bitacora`,
					    `fecha_ingreso`,
					    `fecha_salida`,
					    `hora_ingreso`,
					    `hora_salida`,
					    `acciones_realizadas`,
					    `cedula_usuario`
						)
						VALUES(
					    NULL,
					    '$fecha_ingreso',
					    '',
					    '$hora_ingreso',
					    '',
					    '$acciones_realizadas',
					    '$cedula_usuario'
						);
					";
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$conexion->query($sql);
						$id_bitacora = $conexion->insert_id;
						desconectarBD($conexion);
						return $id_bitacora;
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

		// Actualiza la bitacora en la base de datos sobre el mismo registro
		public function actualizar_bitacora(){
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					// toma la fecha y hora actual para registrar el cierre de sesion
					$id_bitacora = mysqli_escape_string($conexion,$this->get_id_bitacora());
					$acciones_realizadas = mysqli_escape_string($conexion,$this->get_acciones_realizadas());

					// actualiza las acciones realizadas
					$sql = "
						UPDATE
					    `bitacora`
						SET
					    `acciones_realizadas` = '$acciones_realizadas'
						WHERE
					    `id_bitacora` = '$id_bitacora';
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

		public function cerrar_bitacora(){
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					date_default_timezone_set("America/Caracas");
					$fecha_salida = date("Y-m-d");
					$hora_salida = date("H:i:s");

					$id_bitacora = $this->get_id_bitacora();

					$sql = "
						UPDATE
							`bitacora`
						SET
							`fecha_salida` = '$fecha_salida',
							`hora_salida` = '$hora_salida'
						WHERE
							`id_bitacora` = '$id_bitacora'
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

		public function mostrar_bitacora() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					date_default_timezone_set("America/Caracas");
					$fecha_salida = date("Y-m-d");
					$hora_salida = date("H:i:s");

					$id_bitacora = $this->get_id_bitacora();

					$sql = "SELECT * FROM `bitacora` ORDER BY `id_bitacora` DESC";

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_registros = $conexion->query($sql);
						$registros = $consulta_registros->fetch_all(MYSQLI_ASSOC);
						desconectarBD($conexion);
						return $registros;
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
		public function get_id_bitacora() {
			return $this->id_bitacora;
		}

		public function get_fecha_ingreso() {
			return $this->fecha_ingreso;
		}

		public function get_fecha_salida() {
			return $this->fecha_salida;
		}

		public function get_hora_ingreso() {
			return $this->hora_ingreso;
		}

		public function get_hora_salida() {
			return $this->hora_salida;
		}

		public function get_acciones_realizadas() {
			return $this->acciones_realizadas;
		}

		public function get_cedula_usuario() {
			return $this->cedula_usuario;
		}


		// SETTERS
		public function set_id_bitacora($id_bitacora) {
			try {
				if (!is_numeric($id_bitacora)) {
					throw new Exception("El ID no puede estar vacío");
				}
				$this->id_bitacora = $id_bitacora;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function set_fecha_ingreso($fecha_ingreso) {
			if (empty($fecha_ingreso) or $fecha_ingreso == NULL) {
				$this->fecha_ingreso = "0000-00-00";
				return;
			}
			try {
				if (
					!preg_match('/^[0-9-]+$/', $fecha_ingreso) or
					!checkdate(
						substr($fecha_ingreso, 5, 2),
						substr($fecha_ingreso, 8, 2),
						substr($fecha_ingreso, 0, 4)
					)
				)
				{
					throw new Exception("La fecha: ".$fecha_ingreso. " no tiene un formato valido");
				} else {
					$this->fecha_ingreso = $fecha_ingreso;
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
			$this->fecha_ingreso = $fecha_ingreso;
		}
		public function set_fecha_salida($fecha_salida) {
			if (empty($fecha_salida) or $fecha_salida == NULL) {
				$this->fecha_salida = "0000-00-00";
				return;
			}
			try {
				if (
					!preg_match('/^[0-9-]+$/', $fecha_salida) or
					!checkdate(
						substr($fecha_salida, 5, 2),
						substr($fecha_salida, 8, 2),
						substr($fecha_salida, 0, 4)
					)
				)
				{
					throw new Exception("La fecha: ".$fecha_salida. " no tiene un formato valido");
				} else {
					$this->fecha_salida = $fecha_salida;
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function set_hora_ingreso($hora_ingreso) {
			if (empty($hora_ingreso) or $hora_ingreso == NULL) {
				throw new Exception("La hora de entrada no puede estar vacia");
			}
			try {
				// validamos que se usen numeros y :
				if (!preg_match('^[0-9:]+$^', $hora_ingreso)) {
					throw new Exception("La hora de entrada: ".$hora_ingreso. " no tiene un formato valido");
				}
				else {
					$hora = explode(":", $hora_ingreso);
				}
				if (!checkdate($hora[0],$hora[1],$hora[2]) || count($hora) > 3|| count($hora) < 3){
					throw new Exception("La hora: ".$hora_ingreso. " no tiene un formato valido");
					throw new Exception("La hora de entrada: ".$hora_ingreso. " no tiene un formato valido");
				}
				$this->hora_ingreso = $hora_ingreso;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function set_hora_salida($hora_salida) {
			if (empty($hora_salida) or $hora_salida == NULL) {
				throw new Exception("La hora de salida no puede estar vacia");
			}
			try {
				// validamos que se usen numeros y :
				if (!preg_match('^[0-9:]+$^', $hora_salida)) {
					throw new Exception("La hora de entrada: ".$hora_salida. " no tiene un formato valido");
				}
				else {
					$hora = explode(":", $hora_salida);
				}
				if (!checkdate($hora[0],$hora[1],$hora[2]) || count($hora) > 3|| count($hora) < 3){
					throw new Exception("La hora: ".$hora_salida. " no tiene un formato valido");
					throw new Exception("La hora de entrada: ".$hora_salida. " no tiene un formato valido");
				}
				$this->hora_salida = $hora_salida;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function set_acciones_realizadas($acciones_realizadas) {
			if (empty($acciones_realizadas) or $acciones_realizadas == NULL) {
				throw new Exception("La accion realizada no puede estar vacia");
			}
			try {
				// En este caso solo se valida que la longitud no sea muy corta o muy larga
				if (strlen($acciones_realizadas) > 200 || strlen($acciones_realizadas) < 3) {
					throw new Exception("La hora de entrada: ".$acciones_realizadas. " no tiene un formato valido");
				}
				$this->acciones_realizadas = $acciones_realizadas;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function set_cedula_usuario($cedula_usuario) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($cedula_usuario)) {
					throw new Exception("El número de cédula no puede estar vacío");
				}

				// Validar la longitud y el formato de la cédula
				if (strlen($cedula_usuario) <= 4 || strlen($cedula_usuario) >= 11 || !preg_match('/^[a-zA-Z0-9]+$/', $cedula_usuario)) {
					throw new Exception("El número de cédula $cedula_usuario tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->cedula_usuario = $cedula_usuario;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
	}
?>