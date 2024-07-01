<?php  

	class antropometria_est {

		// Esta clase comprende las medidas del estudiante, talla(estatura)
		// peso, IMC y circunferencia braquial
	
		private $cedula_estudiante;
		private $estatura;
		private $peso;
		private $indice_m_c;
		private $circ_braquial;


		
		// CONSTRUCTOR
		public function __construct(){}

		public function insertar_antropometria_est() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {

					$cedula_estudiante = mysqli_escape_string($conexion,$this->get_cedula_estudiante());
					$estatura = mysqli_escape_string($conexion,$this->get_estatura());
					$peso = mysqli_escape_string($conexion,$this->get_peso());
					$indice_m_c = mysqli_escape_string($conexion,$this->get_indice_m_c());
					$circ_braquial = mysqli_escape_string($conexion,$this->get_circ_braquial());

					$sql = "
						INSERT INTO `antropometria_est`(
					    `cedula_estudiante`,
					    `estatura`,
					    `peso`,
					    `indice_m_c`,
					    `circ_braquial`
						)
						VALUES(
					    '$cedula_estudiante',
					    '$estatura',
					    '$peso',
					    '$indice_m_c',
					    '$circ_braquial'
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

		public function editar_antropometria_est() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {

					$cedula_estudiante = mysqli_escape_string($conexion,$this->get_cedula_estudiante());
					$estatura = mysqli_escape_string($conexion,$this->get_estatura());
					$peso = mysqli_escape_string($conexion,$this->get_peso());
					$indice_m_c = mysqli_escape_string($conexion,$this->get_indice_m_c());
					$circ_braquial = mysqli_escape_string($conexion,$this->get_circ_braquial());

					$sql = "
						UPDATE
					    `antropometria_est`
						SET
					    `estatura` = '$estatura',
					    `peso` = '$peso',
					    `indice_m_c` = '$indice_m_c',
					    `circ_braquial` = '$circ_braquial'
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

		public function get_estatura() {
			return $this->estatura;
		}

		public function get_peso() {
			return $this->peso;
		}

		public function get_indice_m_c() {
			return $this->indice_m_c;
		}

		public function get_circ_braquial() {
			return $this->circ_braquial;
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
		public function set_estatura($estatura) {
			// estatura se recibe en centimetros
			try {
				// Validar que la cédula no esté vacía
				if (empty($estatura)) {
					$this->estatura = 0;
					return;
				}

				// Validar la longitud y el formato de la cédula
				if ($estatura < 0 || $estatura > 300 || !is_numeric($estatura)) {
					throw new Exception("La estatura: ($estatura) se encuentra fuera de los valores admitidos");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->estatura = $estatura;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function set_peso($peso) {
			// peso se recibe en kilogramos
			try {
				// Validar que la cédula no esté vacía
				if (empty($peso)) {
					$this->peso = 0;
					return;
				}

				// Validar la longitud y el formato de la cédula
				// Suponemos de 20Kg a 200Kg como una medida amplia para el peso de los estudiantes, incluyendo decimales
				if ($peso < 20 || $peso > 200 || !is_numeric($peso)) {
					throw new Exception("El peso: ($peso) se encuentra fuera de los valores admitidos");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->peso = $peso;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function set_indice_m_c($indice_m_c) {
			// imc se recibe en unidades
			try {
				if (empty($indice_m_c)) {
					$this->indice_m_c = 0;
					return;
				}

				// Validar la longitud y el formato de la cédula
				// Suponemos que un indice de masa corporal sano oscila los 20 puntos, este mismo valor deberá admitir valores entre 0 y 30 para dar un margen ancho
				if ($indice_m_c < 0 || $indice_m_c > 30 || !is_numeric($indice_m_c)) {
					throw new Exception("El indice_m_c: ($indice_m_c) se encuentra fuera de los valores admitidos");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->indice_m_c = $indice_m_c;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		public function set_circ_braquial($circ_braquial) {
			// La circunferencia braquial se mide en centimetros
			try {
				if (empty($circ_braquial)) {
					$this->circ_braquial = 0;
					return;
				}
				if ($circ_braquial < 8 || $circ_braquial > 30 || !is_numeric($circ_braquial)) {
					throw new Exception("El circ_braquial: ($circ_braquial) se encuentra fuera de los valores admitidos");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->circ_braquial = $circ_braquial;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
	}


?>