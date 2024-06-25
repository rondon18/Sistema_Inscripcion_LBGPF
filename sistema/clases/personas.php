<?php 

	class personas {

		// 
		
		private $cedula;
		private $p_nombre;
		private $s_nombre;
		private $p_apellido;
		private $s_apellido;
		private $fecha_nacimiento;
		private $lugar_nacimiento;
		private $genero;
		private $estado_civil;
		private $email;
		private $grado_academico;


		// CONSTRUCTOR
		public function __construct() {}

		public function insertar_persona() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {

					$cedula = mysqli_escape_string($conexion,$this->get_cedula());
					$p_nombre = mysqli_escape_string($conexion,$this->get_p_nombre());
					$s_nombre = mysqli_escape_string($conexion,$this->get_s_nombre());
					$p_apellido = mysqli_escape_string($conexion,$this->get_p_apellido());
					$s_apellido = mysqli_escape_string($conexion,$this->get_s_apellido());
					$fecha_nacimiento = mysqli_escape_string($conexion,$this->get_fecha_nacimiento());
					$lugar_nacimiento = mysqli_escape_string($conexion,$this->get_lugar_nacimiento());
					$genero = mysqli_escape_string($conexion,$this->get_genero());
					$estado_civil = mysqli_escape_string($conexion,$this->get_estado_civil());
					$email = mysqli_escape_string($conexion,$this->get_email());
					$grado_academico = mysqli_escape_string($conexion,$this->get_grado_academico());

					$sql = "
						INSERT INTO `personas`(
							`cedula`,
							`p_nombre`,
							`s_nombre`,
							`p_apellido`,
							`s_apellido`,
							`fecha_nacimiento`,
							`lugar_nacimiento`,
							`genero`,
							`estado_civil`,
							`email`,
							`grado_academico`
						)
						VALUES(
							'$cedula',
							'$p_nombre',
							'$s_nombre',
							'$p_apellido',
							'$s_apellido',
							'$fecha_nacimiento',
							'$lugar_nacimiento',
							'$genero',
							'$estado_civil',
							'$email',
							'$grado_academico'
						)
						ON DUPLICATE KEY UPDATE
						`cedula` = `cedula`;
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

		public function editar_persona($cedula_actual) {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {

					$cedula = mysqli_escape_string($conexion,$this->get_cedula());
					$p_nombre = mysqli_escape_string($conexion,$this->get_p_nombre());
					$s_nombre = mysqli_escape_string($conexion,$this->get_s_nombre());
					$p_apellido = mysqli_escape_string($conexion,$this->get_p_apellido());
					$s_apellido = mysqli_escape_string($conexion,$this->get_s_apellido());
					$fecha_nacimiento = mysqli_escape_string($conexion,$this->get_fecha_nacimiento());
					$lugar_nacimiento = mysqli_escape_string($conexion,$this->get_lugar_nacimiento());
					$genero = mysqli_escape_string($conexion,$this->get_genero());
					$estado_civil = mysqli_escape_string($conexion,$this->get_estado_civil());
					$email = mysqli_escape_string($conexion,$this->get_email());
					$grado_academico = mysqli_escape_string($conexion,$this->get_grado_academico());
					$cedula_actual = mysqli_escape_string($conexion,$cedula_actual);

					$sql = "
						UPDATE
							`personas`
						SET
							`cedula` = '$cedula',
							`p_nombre` = '$p_nombre',
							`s_nombre` = '$s_nombre',
							`p_apellido` = '$p_apellido',
							`s_apellido` = '$s_apellido',
							`fecha_nacimiento` = '$fecha_nacimiento',
							`lugar_nacimiento` = '$lugar_nacimiento',
							`genero` = '$genero',
							`estado_civil` = '$estado_civil',
							`email` = '$email',
							`grado_academico` = '$grado_academico'
						WHERE
							`cedula` = '$cedula_actual';
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

		public function eliminar_persona() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula = mysqli_escape_string($conexion,$this->get_cedula());

					$sql = "
						DELETE
						FROM
							`personas`
						WHERE
						`cedula` = '$cedula';
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

		public function generar_cedula_provisional() {

			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula = mysqli_escape_string($conexion,$this->get_cedula());

					$sql = "
						SELECT
							*
						FROM
							`personas`
					";

					// Lo hace nuevamente para verificar la consulta sql
					try {
						$resultado = $conexion->query($sql);
						desconectarBD($conexion);
						return $resultado->num_rows + 1;
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
		public function get_cedula() {
			return $this->cedula;
		}

		public function get_p_nombre() {
			return $this->p_nombre;
		}

		public function get_s_nombre() {
			return $this->s_nombre;
		}

		public function get_p_apellido() {
			return $this->p_apellido;
		}

		public function get_s_apellido() {
			return $this->s_apellido;
		}

		public function get_fecha_nacimiento() {
			return $this->fecha_nacimiento;
		}

		public function get_lugar_nacimiento() {
			return $this->lugar_nacimiento;
		}

		public function get_genero() {
			return $this->genero;
		}

		public function get_estado_civil() {
			return $this->estado_civil;
		}

		public function get_email() {
			return $this->email;
		}

		public function get_grado_academico() {
			return $this->grado_academico;
		}


		// SETTERS
		public function set_cedula($cedula) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($cedula)) {
					$this->cedula = $this->generar_cedula_provisional();
					// throw new Exception("El número de cédula no puede estar vacío");
					return;
				}

				// Validar la longitud y el formato de la cédula
				if (strlen($cedula) < 4 || strlen($cedula) > 11 || !preg_match('/^(V|E)[0-9]+$/', $cedula)) {
					throw new Exception("El número de cédula ($cedula) tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->cedula = $cedula;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_p_nombre($p_nombre) {

			if (empty($p_nombre)) {
				// Si el nombre está vacío, no se valida y se guarda
				$this->p_nombre = $p_nombre;
				return;
			}

			try {
				// Validar la longitud y el formato del dato
				if (strlen($p_nombre) < 3 || strlen($p_nombre) > 40 || !preg_match('/^[a-zA-Z\s.,:;?!áéíóúüÁÉÍÓÚÜñ]+$/i', $p_nombre)) {
					throw new Exception("El primer nombre ($p_nombre) tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->p_nombre = $p_nombre;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}

		}

		public function set_s_nombre($s_nombre) {
			if (empty($s_nombre)) {
				// Si el nombre está vacío, no se valida y se guarda
				$this->s_nombre = $s_nombre;
				return;
			}

			try {
				// Validar la longitud y el formato del dato
				if (strlen($s_nombre) < 3 || strlen($s_nombre) > 40 || !preg_match('/^[a-zA-Z\s.,:;?!áéíóúüÁÉÍÓÚÜñ]+$/i', $s_nombre)) {
					throw new Exception("El segundo nombre ($s_nombre) tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->s_nombre = $s_nombre;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_p_apellido($p_apellido) {
			if (empty($p_apellido)) {
				// Si el nombre está vacío, no se valida y se guarda
				$this->p_apellido = $p_apellido;
				return;
			}

			try {
				// Validar la longitud y el formato del dato
				if (strlen($p_apellido) < 3 || strlen($p_apellido) > 40 || !preg_match('/^[a-zA-Z\s.,:;?!áéíóúüÁÉÍÓÚÜñ]+$/i', $p_apellido)) {
					throw new Exception("El primer apellido ($p_apellido) tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->p_apellido = $p_apellido;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_s_apellido($s_apellido) {
			if (empty($s_apellido)) {
				// Si el nombre está vacío, no se valida y se guarda
				$this->s_apellido = $s_apellido;
				return;
			}

			try {
				// Validar la longitud y el formato del dato
				if (strlen($s_apellido) < 3 || strlen($s_apellido) > 40 || !preg_match('/^[a-zA-Z\s.,:;?!áéíóúüÁÉÍÓÚÜñ]+$/i', $s_apellido)) {
					throw new Exception("El segundo apellido ($s_apellido) tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->s_apellido = $s_apellido;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_fecha_nacimiento($fecha_nacimiento) {
			if (empty($fecha_nacimiento) or $fecha_nacimiento == NULL) {
				$this->fecha_nacimiento = "0000-00-00";
				return;
			}
			try {
				if (
					!preg_match('/^[0-9-]+$/', $fecha_nacimiento) or
					!checkdate(
						substr($fecha_nacimiento, 5, 2),
						substr($fecha_nacimiento, 8, 2),
						substr($fecha_nacimiento, 0, 4)
					)
				)
				{
					throw new Exception("La fecha: ($fecha_nacimiento) no tiene un formato valido");
				} else {
					$this->fecha_nacimiento = $fecha_nacimiento;
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_lugar_nacimiento($lugar_nacimiento) {
			try {
				if (empty($lugar_nacimiento) or $lugar_nacimiento == "") {
					$this->lugar_nacimiento = $lugar_nacimiento;
					return;
				}
				// Validar la longitud y el formato del dato
				if (strlen($lugar_nacimiento) < 3 || strlen($lugar_nacimiento) >= 200 || !preg_match('/^[a-zA-Z0-9\s.,:;?!áéíóúüÁÉÍÓÚÜ]+$/i', $lugar_nacimiento)) {
					throw new Exception("El lugar de nacimiento ($lugar_nacimiento) cuenta con un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->lugar_nacimiento = $lugar_nacimiento;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_genero($genero) {
			try {
				// Validar la longitud y el formato del dato
				if (!in_array(strtolower($genero),["f","m"])) {
					throw new Exception("El genero: $genero es inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->genero = $genero;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_estado_civil($estado_civil) {
			try {
				// Validar la longitud y el formato del dato
				if (!in_array(strtolower($estado_civil),["soltero(a)","casado(a)","divorciado(a)","viudo(a)",""])) {

					throw new Exception("El estado civil: ($estado_civil) es inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->estado_civil = $estado_civil;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_email($email) {
			if (empty($email)) {
				// Si el nombre está vacío, no se valida y se guarda
				$this->email = $email;
				return;
			}
			try {
				// Validar la longitud y el formato del dato
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

					throw new Exception("El correo electronico: ($email) es inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->email = $email;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_grado_academico($grado_academico) {
			try {
				// Validar la longitud y el formato del dato
				if (!in_array(strtolower($grado_academico),["primaria","bachillerato","universitario",""])) {

					throw new Exception("El grado academico: ($grado_academico) es inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->grado_academico = $grado_academico;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
	}

?>