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
			$conexion = conectarBD();

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

			// echo $sql;
			
			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function editar_direcciones() {
			$conexion = conectarBD();

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

			// echo $sql;
			
			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
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
				if (strlen($cedula_persona) < 4 || strlen($cedula_persona) > 11 || !preg_match('/^[a-zA-Z0-9]+$/', $cedula_persona)) {
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
			$this->estado = $estado;
		}
		
		public function set_municipio($municipio) {
			$municipios_merida = [
				"AAD","ABE","APS","ARI",
				"ACH","CEL","CPO","CQU",
				"GUA","JCS","JBR","LIB",
				"MIR","ORL","PNO","PLL",
				"RAN","RDA","SMA","SUC",
				"TOV","TFC","ZEA",
			];
			try {
				// Validar la longitud y el formato del dato
				if (!in_array(strtolower($municipio),$municipios_merida)) {
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
				"Presidente Betancourt",
				"Presidente Páez",
				"Presidente Rómulo Gallegos",
				"Gabriel Picón Gonzalez",
				"Hector Amable Mora",
				"Jose Nucete Sardi",
				"Pulido Mendez",
				"La Azulita",
				"Santa Cruz De Mora",
				"Mesa Bolívar",
				"Mesa De Las Palmas",
				"Aricagua",
				"San Antonio",
				"Canaguá",
				"Capuri",
				"Chacantá",
				"El Molino",
				"Guaimaral",
				"Mucutuy",
				"Mucuchachi",
				"Fernández Peña",
				"Matriz",
				"Montalbán",
				"Acequias",
				"Jají",
				"La Mesa",
				"San Jose Del Sur",
				"Tucaní",
				"Florencio Ramírez",
				"Santo Domingo",
				"Las Piedras",
				"Guaraque",
				"Mesa De Quintero",
				"Río Negro",
				"Arapuey",
				"Palmira",
				"Torondoy",
				"San Cristobal De Torondoy",
				"Antonio Spinetti Dini",
				"Arias",
				"Caracciolo Parra Pérez",
				"Domingo Peña",
				"El Llano",
				"Gonzalo Picón Febres",
				"Jacinto Plaza",
				"Juan Rodríguez Suárez",
				"Lasso De La Vega",
				"Mariano Picón Salas",
				"Milla",
				"Osuna Rodríguez",
				"Sagrario",
				"El Morro",
				"Los Nevados",
				"Timotes",
				"Andrés Eloy Blanco",
				"La Venta",
				"Piñango",
				"Santa Elena De Arenales",
				"Eloy Paredes",
				"San Rafael De Alcázar",
				"Santa María De Caparo",
				"Pueblo Llano",
				"Mucuchies",
				"Cacute",
				"La Toma",
				"Mucuruba",
				"San Rafael",
				"Bailadores",
				"Geronimo Maldonado",
				"Tabay",
				"Lagunillas",
				"Chiguará",
				"Estanquez",
				"La Trampa",
				"Pueblo Nuevo Del Sur",
				"San Juan",
				"Tovar",
				"El Amparo",
				"El Llano",
				"San Francisco",
				"Nueva Bolivia",
				"Independencia",
				"María De La Concepción Palacios B",
				"Santa Apolonia",
				"Zea",
				"Caño El Tigre",
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
				if (strlen($sector) > 80 || !preg_match('/^[a-zA-Z0-9\s.,:;?!áéíóúüÁÉÍÓÚÜ]+$/', $sector)) {
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
				if (strlen($calle) > 80 || !preg_match('/^[a-zA-Z0-9\s.,:;?!áéíóúüÁÉÍÓÚÜ]+$/', $calle)) {
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
				if (strlen($nro_casa) > 80 || !preg_match('/^[a-zA-Z0-9\s.,:;?!áéíóúüÁÉÍÓÚÜ]+$/', $nro_casa)) {
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
				if (strlen($nro_casa) > 80 || !preg_match('/^[a-zA-Z0-9\s.,:;?!áéíóúüÁÉÍÓÚÜ]+$/', $nro_casa)) {
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