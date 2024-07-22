<?php  

	class usuarios extends personas {

		//

		private $cedula_persona;
		private $rol;
		private $privilegios;
		private $contrasenia;
		private $pregunta_seg_1;
		private $respuesta_1;
		private $pregunta_seg_2;
		private $respuesta_2;
		private $estado;


		// CONSTRUCTOR
		public function _construct() {}

		public function insertar_usuarios() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());
					$rol = mysqli_escape_string($conexion,$this->get_rol());
					$privilegios = mysqli_escape_string($conexion,$this->get_privilegios());
					$contrasenia = mysqli_escape_string($conexion,$this->get_contrasenia());
					$pregunta_seg_1 = mysqli_escape_string($conexion,$this->get_pregunta_seg_1());
					$respuesta_1 = mysqli_escape_string($conexion,$this->get_respuesta_1());
					$pregunta_seg_2 = mysqli_escape_string($conexion,$this->get_pregunta_seg_2());
					$respuesta_2 = mysqli_escape_string($conexion,$this->get_respuesta_2());

					$sql = "
						INSERT INTO `usuarios`(
							`cedula_persona`,
							`rol`,
							`privilegios`,
							`contraseña`,
							`pregunta_seg_1`,
							`respuesta_1`,
							`pregunta_seg_2`,
							`respuesta_2`,
							`estado`
						)
						VALUES(
							'$cedula_persona',
							'$rol',
							'$privilegios',
							'$contrasenia',
							'$pregunta_seg_1',
							'$respuesta_1',
							'$pregunta_seg_2',
							'$respuesta_2',
							'Activo'
						)
						ON DUPLICATE KEY UPDATE
						`cedula_persona` = `cedula_persona`;
					";

					// El estado del usuario será por defecto Activo al ser creado

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

		public function editar_usuarios() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());
					$pregunta_seg_1 = mysqli_escape_string($conexion,$this->get_pregunta_seg_1());
					$respuesta_1 = mysqli_escape_string($conexion,$this->get_respuesta_1());
					$pregunta_seg_2 = mysqli_escape_string($conexion,$this->get_pregunta_seg_2());
					$respuesta_2 = mysqli_escape_string($conexion,$this->get_respuesta_2());

					$sql = "
						UPDATE
							`usuarios`
						SET
							`pregunta_seg_1` = '$pregunta_seg_1',
							`respuesta_1` = '$respuesta_1',
							`pregunta_seg_2` = '$pregunta_seg_2',
							`respuesta_2` = '$respuesta_2'
						WHERE
							`cedula_persona` = '$cedula_persona';
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

		public function editar_contrasenia() {

			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());
					$contrasenia = mysqli_escape_string($conexion,$this->get_contrasenia());

					$sql = "
						UPDATE
							`usuarios`
						SET
							`contraseña` = '$contrasenia'
						WHERE
							`cedula_persona` = '$cedula_persona';
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

		public function mostrar_usuarios() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$sql = "SELECT * FROM `vista_usuarios`";
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$resultado = $conexion->query($sql);
						$lista_usuarios = $resultado->fetch_all(MYSQLI_ASSOC);
						desconectarBD($conexion);
						return $lista_usuarios;
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return [];
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return [];
			}
		}

		public function consultar_usuario() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula = mysqli_escape_string($conexion,$this->get_cedula_persona());
					$sql = "SELECT * FROM `vista_usuarios` WHERE `cedula` = '$cedula';";
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_usuario = $conexion->query($sql);
						$usuario = $consulta_usuario->fetch_assoc();
						desconectarBD($conexion);
						return $usuario;
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return null;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return null;
			}
		}

		public function chequeo_login() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula = mysqli_escape_string($conexion,$this->get_cedula());
					$contrasenia = mysqli_escape_string($conexion,$this->get_contrasenia());
					$sql = "SELECT * FROM `vista_usuarios` WHERE `cedula` = '$cedula' and `contraseña` = '$contrasenia' and `estado` != 'Inactivo';";
					// Lo hace nuevamente para verificar la consulta sql
					try {
						$consulta_usuario = $conexion->query($sql);
						$usuario = $consulta_usuario->fetch_assoc();
						desconectarBD($conexion);
						return $usuario;
					}
					catch (mysqli_sql_exception $e) {
						miManejadorExcepcion($e);
						desconectarBD($conexion);
						return null;
					}
				}
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return null;
			}
		}

		public function cambiar_estado() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());
					$estado = mysqli_escape_string($conexion,$this->get_estado());

					switch (strtolower($estado)) {
						case 'activo':
							$sql = "UPDATE `usuarios` SET `estado` = 'Inactivo' WHERE `cedula_persona` = '$cedula_persona';";
							break;
						case 'inactivo':
							$sql = "UPDATE `usuarios` SET `estado` = 'Activo' WHERE `cedula_persona` = '$cedula_persona';";
							break;

						default:
							throw new Exception("No se puede cambiar el estado, el estado ($estado) no es válido");
							break;
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

		// GETTERS
		public function get_cedula_persona() {
			return $this->cedula_persona;
		}

		public function get_rol() {
			return $this->rol;
		}

		public function get_privilegios() {
			return $this->privilegios;
		}

		public function get_contrasenia() {
			return $this->contrasenia;
		}

		public function get_pregunta_seg_1() {
			return $this->pregunta_seg_1;
		}

		public function get_respuesta_1() {
			return $this->respuesta_1;
		}

		public function get_pregunta_seg_2() {
			return $this->pregunta_seg_2;
		}

		public function get_respuesta_2() {
			return $this->respuesta_2;
		}

		public function get_estado() {
			return $this->estado;
		}

		// SETTERS
		public function set_cedula_persona($cedula_persona) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($cedula_persona)) {
					$this->cedula_persona = $cedula_persona;
					// throw new Exception("El número de cédula no puede estar vacío");
					return;
				}

				// Validar la longitud y el formato de la cédula
				if (strlen($cedula_persona) < 4 || strlen($cedula_persona) > 11 || !preg_match('/^[a-zA-Z0-9]+$/', $cedula_persona)) {
					throw new Exception("El número de cédula tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->cedula_persona = $cedula_persona;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_rol($rol) {

			$roles = [
				"desarrollador(a)",
				"director(a)",
				"subdirector(a)",
				"secretario(a)",
				"coordinador(a) de primer año",
				"coordinador(a) de segundo año",
				"coordinador(a) de tercer año",
				"coordinador(a) de cuarto año",
				"coordinador(a) de quinto año",
				"docente",
				"usuario",
			];

			try {
				// Validar la longitud y el formato del dato
				if (!in_array(strtolower($rol),$roles)) {

					throw new Exception("El rol: '$rol' es inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->rol = $rol;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_privilegios($privilegios) {
			try {
				// Validar la longitud y el formato del dato
				if ($privilegios > 2 or $privilegios < 0 and !is_numeric($privilegios)) {
					throw new Exception("El privilegio: '$privilegios' es inválido");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->privilegios = $privilegios;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function validar_contrasenia() {
			try {
				// Validar que la cédula no esté vacía
				if (empty($contrasenia)) {
					throw new Exception("La contraseña no puede estar vacía");
					return;
				}

				$mayusculas = preg_match('@[A-Z]@', $contrasenia);
				$minusculas = preg_match('@[a-z]@', $contrasenia);
				$numeros    = preg_match('@[0-9]@', $contrasenia);

				// El _ parece que cuenta como alfanumerico en vez de caracter especial, pasa igual con tildes y la ñ
				$caracteres_especiales = preg_match('@[^\w]@', $contrasenia);

				if(!$mayusculas || !$minusculas || !$numeros || !$caracteres_especiales || strlen($contrasenia) < 8 || strlen($contrasenia) > 20) {
					throw new Exception("El formato de la contraseña: '$contrasenia' es invalido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->contrasenia = $contrasenia;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		// Aqui valida que la contraseña no esté vacia y que cumpla
		public function set_contrasenia($contrasenia) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($contrasenia)) {
					throw new Exception("La contraseña no puede estar vacía");
					return;
				}
				// vemos que cumpla con el formato de sha256
				if(strlen($contrasenia) < 64 || strlen($contrasenia) > 64) {
					throw new Exception("El formato de la contraseña: '$contrasenia' es invalido");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->contrasenia = $contrasenia;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_pregunta_seg_1($pregunta_seg_1) {
			$preguntas = [
				"Ciudad de tu luna de miel",
				"Ciudad donde naciste",
				"Ciudad preferida de vacaciones",
				"Color que más te gusta",
				"¿Cuál es tu comida favorita?",
				"¿Cuál es tu héroe favorito?",
				"¿Cuál fue tu primer número de Teléfono?",
				"Equipo deportivo preferido",
				"Fecha de aniversario de bodas",
				"Fecha de nacimiento de tu padre",
				"Fecha de tu graduación",
				"Fruta favorita",
			];

			try {
				// Validar la longitud y el formato del dato
				if (!in_array($pregunta_seg_1, $preguntas) ) {
					throw new Exception("La pregunta de seguridad 1: '$pregunta_seg_1' no es valida");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->pregunta_seg_1 = $pregunta_seg_1;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_respuesta_1($respuesta_1) {
			$this->respuesta_1 = $respuesta_1;
		}

		public function set_pregunta_seg_2($pregunta_seg_2) {
			$preguntas = [
				"Ciudad de tu luna de miel",
				"Ciudad donde naciste",
				"Ciudad preferida de vacaciones",
				"Color que más te gusta",
				"¿Cuál es tu comida favorita?",
				"¿Cuál es tu héroe favorito?",
				"¿Cuál fue tu primer número de Teléfono?",
				"Equipo deportivo preferido",
				"Fecha de aniversario de bodas",
				"Fecha de nacimiento de tu padre",
				"Fecha de tu graduación",
				"Fruta favorita",
			];

			try {
				// Validar la longitud y el formato del dato
				if (!in_array($pregunta_seg_2, $preguntas) ) {
					throw new Exception("La pregunta de seguridad 2: '$pregunta_seg_2' no es valida");
				}
				// Si el dato es válido, asignarlo a la propiedad
				$this->pregunta_seg_2 = $pregunta_seg_2;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_respuesta_2($respuesta_2) {
			$this->respuesta_2 = $respuesta_2;
		}

		public function set_estado($estado) {
			$estados = ["activo","inactivo"];
			try {
				// Validar la longitud y el formato del dato
				if (!in_array(strtolower($estado),$estados)) {
					throw new Exception("El estado del usuario: $estado es inválido");
				}
				$this->estado = $estado;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
				return null;
			}
		}
	}

?>