<?php  

	class direcciones {

		// 

		private $cedula_persona;
		private $estado;
		private $municipio;
		private $parroquia;
		private $sector;
		private $calle;
		private $nro_casa;
		private $punto_referencia;


		// constructor
		public function __construct() {}


		public function insertar_direcciones() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());
					$estado = mysqli_escape_string($conexion,$this->get_estado());
					$municipio = mysqli_escape_string($conexion,$this->get_municipio());
					$parroquia = mysqli_escape_string($conexion,$this->get_parroquia());
					$sector = mysqli_escape_string($conexion,$this->get_sector());
					$calle = mysqli_escape_string($conexion,$this->get_calle());
					$nro_casa = mysqli_escape_string($conexion,$this->get_nro_casa());
					$punto_referencia = mysqli_escape_string($conexion,$this->get_punto_referencia());

					$sql = "
						INSERT INTO `direcciones`(
							`cedula_persona`,
							`estado`,
							`municipio`,
							`parroquia`,
							`sector`,
							`calle`,
							`nro_casa`,
							`punto_referencia`
						)
						VALUES(
							'$cedula_persona',
							'$estado',
							'$municipio',
							'$parroquia',
							'$sector',
							'$calle',
							'$nro_casa',
							'$punto_referencia'
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

		public function editar_direcciones() {
			try {
				if (!$conexion = conectarBD()) {
					throw new Exception("No se pudo conectar a bd");
				}
				else {
					$cedula_persona = mysqli_escape_string($conexion,$this->get_cedula_persona());
					$estado = mysqli_escape_string($conexion,$this->get_estado());
					$municipio = mysqli_escape_string($conexion,$this->get_municipio());
					$parroquia = mysqli_escape_string($conexion,$this->get_parroquia());
					$sector = mysqli_escape_string($conexion,$this->get_sector());
					$calle = mysqli_escape_string($conexion,$this->get_calle());
					$nro_casa = mysqli_escape_string($conexion,$this->get_nro_casa());
					$punto_referencia = mysqli_escape_string($conexion,$this->get_punto_referencia());

					$sql = "
						UPDATE
		    			`direcciones`
						SET
					    `estado` = '$estado',
					    `municipio` = '$municipio',
					    `parroquia` = '$parroquia',
					    `sector` = '$sector',
					    `calle` = '$calle',
					    `nro_casa` = '$nro_casa',
					    `punto_referencia` = '$punto_referencia'
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
		
		// getters
		public function get_cedula_persona() {
			return $this->cedula_persona;
		}
		
		public function get_estado() {
			return $this->estado;
		}
		
		public function get_municipio() {
			return $this->municipio;
		}
		
		public function get_parroquia() {
			return $this->parroquia;
		}
		
		public function get_sector() {
			return $this->sector;
		}
		
		public function get_calle() {
			return $this->calle;
		}
		
		public function get_nro_casa() {
			return $this->nro_casa;
		}
		
		public function get_punto_referencia() {
			return $this->punto_referencia;
		}


		// setters
		public function set_cedula_persona($cedula_persona) {
			try {
				// Validar que la cédula no esté vacía
				if (empty($cedula_persona)) {
					throw new Exception("El número de cédula no puede estar vacío");
				}

				// Validar la longitud y el formato de la cédula
				if (strlen($cedula_persona) < 4 || strlen($cedula_persona) > 11 || !preg_match('/^[a-zA-Z0-9\s]+$/', $cedula_persona)) {
					throw new Exception("El número de cédula $cedula_persona tiene un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->cedula_persona = $cedula_persona;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_estado($estado) {
			try {
				// Si el dato esta vacio por defecto se mantendrá así
				if (empty($estado)) {
					$this->estado = $estado;
					return;
				}
				// Validar la longitud y el formato del dato
				if (!preg_match('/^[a-zA-Z\s.,:;?!áéíóúüÁÉÍÓÚÜñ]+$/i',$estado) || strlen($estado) > 30) {
					throw new Exception("El estado: $estado es inválido");
				}
				$this->estado = $estado;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_municipio($municipio) {
			$municipios_merida = [
				"AAD","ABE","APS","ARI",
				"ACH","CEL","CPO","CQU",
				"GUA","JCS","JBR","LIB",
				"MIR","ORL","PNO","PLL",
				"RAN","RDA","SMA","SUC",
				"TOV","TFC","ZEA", ""
			];
			try {
				// Validar la longitud y el formato del dato
				if (!in_array(strtoupper($municipio),$municipios_merida)) {
					throw new Exception("El municipio: $municipio es inválido");
				}
				$this->municipio = $municipio;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_parroquia($parroquia) {
			$parroquias_merida = [
				"presidente betancourt",
				"presidente páez",
				"presidente rómulo gallegos",
				"gabriel picón gonzalez",
				"hector amable mora",
				"jose nucete sardi",
				"pulido mendez",
				"la azulita",
				"santa cruz de mora",
				"mesa bolívar",
				"mesa de las palmas",
				"aricagua",
				"san antonio",
				"canaguá",
				"capuri",
				"chacantá",
				"el molino",
				"guaimaral",
				"mucutuy",
				"mucuchachi",
				"fernández peña",
				"matriz",
				"montalbán",
				"acequias",
				"jají",
				"la mesa",
				"san jose del sur",
				"tucaní",
				"florencio ramírez",
				"santo domingo",
				"las piedras",
				"guaraque",
				"mesa de quintero",
				"río negro",
				"arapuey",
				"palmira",
				"torondoy",
				"san cristobal de torondoy",
				"antonio spinetti dini",
				"arias",
				"caracciolo parra pérez",
				"domingo peña",
				"el llano",
				"gonzalo picón febres",
				"jacinto plaza",
				"juan rodríguez suárez",
				"lasso de la vega",
				"mariano picón salas",
				"milla",
				"osuna rodríguez",
				"sagrario",
				"el morro",
				"los nevados",
				"timotes",
				"andrés eloy blanco",
				"la venta",
				"piñango",
				"santa elena de arenales",
				"eloy paredes",
				"san rafael de alcázar",
				"santa maría de caparo",
				"pueblo llano",
				"mucuchies",
				"cacute",
				"la toma",
				"mucuruba",
				"san rafael",
				"bailadores",
				"geronimo maldonado",
				"tabay",
				"lagunillas",
				"chiguará",
				"estanquez",
				"la trampa",
				"pueblo nuevo del sur",
				"san juan",
				"tovar",
				"el amparo",
				"el llano",
				"san francisco",
				"nueva bolivia",
				"independencia",
				"maría de la concepción palacios b",
				"santa apolonia",
				"zea",
				"caño el tigre",
				""
			];
			try {
				// Validar la longitud y el formato del dato
				if (!in_array(strtolower($parroquia),$parroquias_merida)) {
					throw new Exception("La parroquia: $parroquia es inválida");
				}
				$this->parroquia = $parroquia;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_sector($sector) {
			try {
				// Si el dato esta vacio por defecto se mantendrá así
				if (empty($sector)) {
					$this->sector = $sector;
					return;
				}
				// Validar la longitud y el formato del dato
				if (strlen($sector) > 80 || !preg_match('/^[a-zA-Z0-9\s.,:;?!áéíóúüÁÉÍÓÚÜ]+$/i', $sector)) {
					throw new Exception("El sector $sector cuenta con un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->sector = $sector;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_calle($calle) {
			try {
				// Si el dato esta vacio por defecto se mantendrá así
				if (empty($calle)) {
					$this->calle = $calle;
					return;
				}
				// Validar la longitud y el formato del dato
				if (strlen($calle) > 80 || !preg_match('/^[a-zA-Z0-9\s.,:;?!áéíóúüÁÉÍÓÚÜ]+$/i', $calle)) {
					throw new Exception("La calle $calle cuenta con un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->calle = $calle;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_nro_casa($nro_casa) {
			try {
				// Si el dato esta vacio por defecto se mantendrá así
				if (empty($nro_casa)) {
					$this->nro_casa = $nro_casa;
					return;
				}
				// Validar la longitud y el formato del dato
				if (strlen($nro_casa) > 80 || !preg_match('/^[a-zA-Z0-9\s.,:;?!áéíóúüÁÉÍÓÚÜ]+$/i', $nro_casa)) {
					throw new Exception("El número de casa $nro_casa cuenta con un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->nro_casa = $nro_casa;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
		
		public function set_punto_referencia($punto_referencia) {
			try {
				// Si el dato esta vacio por defecto se mantendrá así
				if (empty($nro_casa)) {
					$this->nro_casa = $nro_casa;
					return;
				}
				// Validar la longitud y el formato del dato
				if (strlen($nro_casa) > 80 || !preg_match('/^[a-zA-Z0-9\s.,:;?!áéíóúüÁÉÍÓÚÜ]+$/i', $nro_casa)) {
					throw new Exception("El número de casa $nro_casa cuenta con un formato inválido");
				}

				// Si el dato es válido, asignarlo a la propiedad
				$this->nro_casa = $nro_casa;
			}
			catch (Exception $e) {
				miManejadorExcepcion($e);
			}
		}
	}

?>