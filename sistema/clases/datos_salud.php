<?php  

	class datos_salud {

		// 

		private $cedula_estudiante;
		private $lateralidad;
		private $tipo_sangre;
		private $medicacion;
		private $dieta_especial;
		private $padecimiento;
		private $impedimento_fisico;
		private $necesidad_educativa;
		private $condicion_vista;
		private $condicion_dental;
		private $institucion_medica;
		private $carnet_discapacidad;
	

		// CONTRUCTOR
		public function __construct(){}


		public function insertar_datos_salud() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_estudiante = mysqli_escape_string($conexion,$this->get_cedula_estudiante());
					$lateralidad = mysqli_escape_string($conexion,$this->get_lateralidad());
					$tipo_sangre = mysqli_escape_string($conexion,$this->get_tipo_sangre());
					$medicacion = mysqli_escape_string($conexion,$this->get_medicacion());
					$dieta_especial = mysqli_escape_string($conexion,$this->get_dieta_especial());
					$padecimiento = mysqli_escape_string($conexion,$this->get_padecimiento());
					$impedimento_fisico = mysqli_escape_string($conexion,$this->get_impedimento_fisico());
					$necesidad_educativa = mysqli_escape_string($conexion,$this->get_necesidad_educativa());
					$condicion_vista = mysqli_escape_string($conexion,$this->get_condicion_vista());
					$condicion_dental = mysqli_escape_string($conexion,$this->get_condicion_dental());
					$institucion_medica = mysqli_escape_string($conexion,$this->get_institucion_medica());
					$carnet_discapacidad = mysqli_escape_string($conexion,$this->get_carnet_discapacidad());


					$sql = "
						INSERT INTO `datos_salud`(
							`cedula_estudiante`,
							`lateralidad`,
							`tipo_sangre`,
							`medicacion`,
							`dieta_especial`,
							`padecimiento`,
							`impedimento_fisico`,
							`necesidad_educativa`,
							`condicion_vista`,
							`condicion_dental`,
							`institucion_medica`,
							`carnet_discapacidad`
						)
						VALUES(
							'$cedula_estudiante',
							'$lateralidad',
							'$tipo_sangre',
							'$medicacion',
							'$dieta_especial',
							'$padecimiento',
							'$impedimento_fisico',
							'$necesidad_educativa',
							'$condicion_vista',
							'$condicion_dental',
							'$institucion_medica',
							'$carnet_discapacidad'
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

		public function editar_datos_salud() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_estudiante = mysqli_escape_string($conexion,$this->get_cedula_estudiante());
					$lateralidad = mysqli_escape_string($conexion,$this->get_lateralidad());
					$tipo_sangre = mysqli_escape_string($conexion,$this->get_tipo_sangre());
					$medicacion = mysqli_escape_string($conexion,$this->get_medicacion());
					$dieta_especial = mysqli_escape_string($conexion,$this->get_dieta_especial());
					$padecimiento = mysqli_escape_string($conexion,$this->get_padecimiento());
					$impedimento_fisico = mysqli_escape_string($conexion,$this->get_impedimento_fisico());
					$necesidad_educativa = mysqli_escape_string($conexion,$this->get_necesidad_educativa());
					$condicion_vista = mysqli_escape_string($conexion,$this->get_condicion_vista());
					$condicion_dental = mysqli_escape_string($conexion,$this->get_condicion_dental());
					$institucion_medica = mysqli_escape_string($conexion,$this->get_institucion_medica());
					$carnet_discapacidad = mysqli_escape_string($conexion,$this->get_carnet_discapacidad());

					$sql = "
						UPDATE
		    			`datos_salud`
						SET
					    `lateralidad` = '$lateralidad',
					    `tipo_sangre` = '$tipo_sangre',
					    `medicacion` = '$medicacion',
					    `dieta_especial` = '$dieta_especial',
					    `padecimiento` = '$padecimiento',
					    `impedimento_fisico` = '$impedimento_fisico',
					    `necesidad_educativa` = '$necesidad_educativa',
					    `condicion_vista` = '$condicion_vista',
					    `condicion_dental` = '$condicion_dental',
					    `institucion_medica` = '$institucion_medica',
					    `carnet_discapacidad` = '$carnet_discapacidad'
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
		
		public function get_lateralidad() {
			return $this->lateralidad;
		}
		
		public function get_tipo_sangre() {
			return $this->tipo_sangre;
		}
		
		public function get_medicacion() {
			return $this->medicacion;
		}
		
		public function get_dieta_especial() {
			return $this->dieta_especial;
		}
		
		public function get_padecimiento() {
			return $this->padecimiento;
		}
		
		public function get_impedimento_fisico() {
			return $this->impedimento_fisico;
		}
		
		public function get_necesidad_educativa() {
			return $this->necesidad_educativa;
		}
		
		public function get_condicion_vista() {
			return $this->condicion_vista;
		}
		
		public function get_condicion_dental() {
			return $this->condicion_dental;
		}
		
		public function get_institucion_medica() {
			return $this->institucion_medica;
		}
		
		public function get_carnet_discapacidad() {
			return $this->carnet_discapacidad;
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

		public function set_lateralidad($lateralidad) {
			$lateralidades = ["ambidextro","diestro","zurdo",];
			try {
				// Validar la longitud y el formato del dato
				if (!in_array(strtolower($lateralidad),$lateralidades)) {
					throw new Exception("La lateralidad: $lateralidad es inválida");
				}
				$this->lateralidad = $lateralidad;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_tipo_sangre($tipo_sangre) {
			$tipos_admitidos = [
				"a+","a-","an",
				"b+","b-","bn",
				"ab+","ab-","abn",
				"o+","o-","on",
				"nc+","nc-","ncn",
				"", //Vacio por si el parametro viene vacio
			];
			try {
				// Si el dato esta vacio por defecto se mantendrá así
				if (empty($tipo_sangre)) {
					$this->tipo_sangre = $tipo_sangre;
					return;
				}
				// Validar la longitud y el formato del dato (Solo grupos sanguineos seguidos de un +/-)
				if (!in_array(strtolower($tipo_sangre), $tipos_admitidos)) {
					throw new Exception("El tipo de sangre: $tipo_sangre no es válido");
				}
				$this->tipo_sangre = $tipo_sangre;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_medicacion($medicacion) {
			try {
				// Si el dato esta vacio por defecto se mantendrá así
				if (empty($medicacion)) {
					$this->medicacion = $medicacion;
					return;
				}
				// Validar la longitud y el formato del dato
				if (strlen($medicacion) < 3 || strlen($medicacion) >= 200 || !preg_match('/^[\w\sàáâãéèêëìíîïòóôõùúûüÀÁÂÃÉÈÊËÌÍÎÏÒÓÔÕÙÚÛÜñÑª\!\"\'\-\#\&\(\)\,\.\;\¿\¡\!\?\`\°\/\:\|]+$/i', $medicacion)) {
					throw new Exception("La medicacion $medicacion cuenta con un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->medicacion = $medicacion;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_dieta_especial($dieta_especial) {
			try {
				// Si el dato esta vacio por defecto se mantendrá así
				if (empty($dieta_especial)) {
					$this->dieta_especial = $dieta_especial;
					return;
				}
				// Validar la longitud y el formato del dato
				if (strlen($dieta_especial) < 3 || strlen($dieta_especial) >= 200 || !preg_match('/^[\w\sàáâãéèêëìíîïòóôõùúûüÀÁÂÃÉÈÊËÌÍÎÏÒÓÔÕÙÚÛÜñÑª\!\"\'\-\#\&\(\)\,\.\;\¿\¡\!\?\`\°\/\:\|]+$/i', $dieta_especial)) {
					throw new Exception("La dieta $dieta_especial cuenta con un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->dieta_especial = $dieta_especial;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_padecimiento($padecimiento) {
			try {
				// Si el dato esta vacio por defecto se mantendrá así
				if (empty($padecimiento)) {
					$this->padecimiento = $padecimiento;
					return;
				}
				// Validar la longitud y el formato del dato
				if (strlen($padecimiento) < 3 || strlen($padecimiento) >= 200 || !preg_match('/^[\w\sàáâãéèêëìíîïòóôõùúûüÀÁÂÃÉÈÊËÌÍÎÏÒÓÔÕÙÚÛÜñÑª\!\"\'\-\#\&\(\)\,\.\;\¿\¡\!\?\`\°\/\:\|]+$/i', $padecimiento)) {
					throw new Exception("El padecimiento $padecimiento cuenta con un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->padecimiento = $padecimiento;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_impedimento_fisico($impedimento_fisico) {
			try {
				// Si el dato esta vacio por defecto se mantendrá así
				if (empty($impedimento_fisico)) {
					$this->impedimento_fisico = $impedimento_fisico;
					return;
				}
				// Validar la longitud y el formato del dato
				if (strlen($impedimento_fisico) < 3 || strlen($impedimento_fisico) >= 200 || !preg_match('/^[\w\sàáâãéèêëìíîïòóôõùúûüÀÁÂÃÉÈÊËÌÍÎÏÒÓÔÕÙÚÛÜñÑª\!\"\'\-\#\&\(\)\,\.\;\¿\¡\!\?\`\°\/\:\|]+$/i', $impedimento_fisico)) {
					throw new Exception("El impedimento fisico $impedimento_fisico cuenta con un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->impedimento_fisico = $impedimento_fisico;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_necesidad_educativa($necesidad_educativa) {
			try {
				// Si el dato esta vacio por defecto se mantendrá así
				if (empty($necesidad_educativa)) {
					$this->necesidad_educativa = $necesidad_educativa;
					return;
				}
				// Validar la longitud y el formato del dato
				if (strlen($necesidad_educativa) < 3 || strlen($necesidad_educativa) >= 200 || !preg_match('/^[\w\sàáâãéèêëìíîïòóôõùúûüÀÁÂÃÉÈÊËÌÍÎÏÒÓÔÕÙÚÛÜñÑª\!\"\'\-\#\&\(\)\,\.\;\¿\¡\!\?\`\°\/\:\|]+$/i', $necesidad_educativa)) {
					throw new Exception("La necesidad educativa $necesidad_educativa cuenta con un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->necesidad_educativa = $necesidad_educativa;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_condicion_vista($condicion_vista) {
			$condiciones = ["buena","mala","regular",];
			try {
				// Validar la longitud y el formato del dato
				if (!in_array(strtolower($condicion_vista),$condiciones)) {
					throw new Exception("La condicion de la vista: $condicion_vista es inválida");
				}
				$this->condicion_vista = $condicion_vista;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_condicion_dental($condicion_dental) {
			$condiciones = ["buena","mala","regular",];
			try {
				// Validar la longitud y el formato del dato
				if (!in_array(strtolower($condicion_dental),$condiciones)) {
					throw new Exception("La condicion de la dentadura: $condicion_dental es inválida");
				}
				$this->condicion_dental = $condicion_dental;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_institucion_medica($institucion_medica) {
			try {
				// Si el dato esta vacio por defecto se mantendrá así
				if (empty($institucion_medica)) {
					$this->institucion_medica = $institucion_medica;
					return;
				}
				// Validar la longitud y el formato del dato
				if (strlen($institucion_medica) < 3 || strlen($institucion_medica) >= 200 || !preg_match('/^[\w\sàáâãéèêëìíîïòóôõùúûüÀÁÂÃÉÈÊËÌÍÎÏÒÓÔÕÙÚÛÜñÑª\!\"\'\-\#\&\(\)\,\.\;\¿\¡\!\?\`\°\/\:\|]+$/i', $institucion_medica)) {
					throw new Exception("La institucion medica $institucion_medica cuenta con un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->institucion_medica = $institucion_medica;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

		public function set_carnet_discapacidad($carnet_discapacidad) {
			try {
				// Si el dato esta vacio por defecto se mantendrá así
				if (empty($carnet_discapacidad)) {
					$this->carnet_discapacidad = $carnet_discapacidad;
					return;
				}
				// Validar la longitud y el formato del dato
				if (strlen($carnet_discapacidad) < 2 || strlen($carnet_discapacidad) >= 25 || !preg_match('/^[\w\sàáâãéèêëìíîïòóôõùúûüÀÁÂÃÉÈÊËÌÍÎÏÒÓÔÕÙÚÛÜñÑª\!\"\'\-\#\&\(\)\,\.\;\¿\¡\!\?\`\°\/\:\|]+$/i', $carnet_discapacidad)) {
					throw new Exception("El carnet de discapacidad $carnet_discapacidad cuenta con un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->carnet_discapacidad = $carnet_discapacidad;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}

	}

?>