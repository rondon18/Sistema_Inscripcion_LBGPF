<?php 

	class Personas {
		private $idPersonas;
		private $Primer_Nombre;
		private $Segundo_Nombre;
		private $Primer_Apellido;
		private $Segundo_Apellido;
		private $Cédula;
		private $Fecha_Nacimiento;
		private $Lugar_Nacimiento;
		private $Género;
		private $Correo_Electrónico;
		private $Dirección;
		private $Estado_Civil;

		public function __construct() {}

		public function insertarPersona() {
			$conexion = conectarBD();
			
			$Primer_Nombre = $this->getPrimer_Nombre();
			$Segundo_Nombre = $this->getSegundo_Nombre();
			$Primer_Apellido = $this->getPrimer_Apellido();
			$Segundo_Apellido = $this->getSegundo_Apellido();
			$Cédula = $this->getCédula();
			$Fecha_Nacimiento = $this->getFecha_Nacimiento();
			$Lugar_Nacimiento = $this->getLugar_Nacimiento();
			$Género = $this->getGénero();
			$Correo_Electrónico = $this->getCorreo_Electrónico();
			$Dirección = $this->getDirección();
			$Estado_Civil = $this->getEstado_Civil();

			$sql = "SELECT * FROM `personas` WHERE `Cédula` = '$Cédula'";

			$registro_existe = $conexion->query($sql);
			$resultado = $registro_existe->fetch_assoc();
			
			#Consulta si el registro ya existe para prevenir registros duplicados o excesivos
			if ($resultado == NULL) {
				$sql = "INSERT INTO `personas`(`idPersonas`, `Primer_Nombre`, `Segundo_Nombre`, `Primer_Apellido`, `Segundo_Apellido`, `Cédula`, `Fecha_Nacimiento`, `Lugar_Nacimiento`, `Género`, `Correo_Electrónico`, `Dirección`, `Estado_Civil`) VALUES (
					NULL,
					'$Primer_Nombre',
					'$Segundo_Nombre',
					'$Primer_Apellido',
					'$Segundo_Apellido',
					'$Cédula',
					'$Fecha_Nacimiento',
					'$Lugar_Nacimiento',
					'$Género',
					'$Correo_Electrónico',
					'$Dirección',
					'$Estado_Civil'
				)";

				$conexion->query($sql) or die("error: ".$conexion->error);
				$this->setidPersonas($conexion->insert_id);
			}
			elseif ($resultado != NULL) {
				$this->setidPersonas($resultado['idPersonas']);
			}

			desconectarBD($conexion);
		}

		public function editarPersona($id) {
			$conexion = conectarBD();

			$Nombres = $this->getNombres();
			$Apellidos = $this->getApellidos();
			$Cedula = $this->getCedula();
			$Correo = $this->getCorreo();
			$Genero = $this->getGenero();
			$Fecha_Nacimiento = $this->getFecha_Nacimiento();
			$Lugar_Nacimiento = $this->getLugar_Nacimiento();
			$Direccion = $this->getDireccion();
			$Teléfono_Principal = $this->getTeléfono_Principal();
			$Teléfono_Auxiliar = $this->getTeléfono_Auxiliar();
			$Estado_Civil = $this->getEstado_Civil();
			
			$sql = "UPDATE `personas` SET
				`Nombres`='$Nombres',
				`Apellidos`='$Apellidos',
				`Cédula`='$Cedula',
				`Fecha_Nacimiento`='$Fecha_Nacimiento',
				`Lugar_Nacimiento`='$Lugar_Nacimiento',
				`Género`='$Genero',
				`Correo_Electronico`='$Correo',
				`Dirección`='$Direccion',
				`Teléfono_Principal`='$Teléfono_Principal',
				`Teléfono_Auxiliar`='$Teléfono_Auxiliar',
				`Estado_Civil`='$Estado_Civil' 
			WHERE `idPersonas`='$id'";


			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function eliminarPersona($id) {
			$conexion = conectarBD();

			$sql = "DELETE FROM `personas` WHERE `idPersonas` = '$id'";

			$conexion->query($sql) or die("error: ".$conexion->error);
			desconectarBD($conexion);
		}

		public function consultarPersona($cedula) {
			$conexion = conectarBD();

			$sql = "SELECT * FROM `personas` WHERE `Cédula` = '$cedula'";

			$consulta_persona = $conexion->query($sql) or die("error: ".$conexion->error);			
			$persona = $consulta_persona->fetch_assoc();

			desconectarBD($conexion);

			return $persona;
		}

		public function mostrarPersonas() {
			#Muestra todas las personas en la tabla
			$conexion = conectarBD();

			$sql = "SELECT * FROM `personas`";

			$consulta_personas = $conexion->query($sql) or die("error: ".$conexion->error);			
			$personas = $consulta_personas->fetch_assoc();

			#Hace un arreglo de arreglos para contener los campos de la persona
			$Lista_Personas = [];
			foreach ($personas as $persona) {
				$Lista_Personas[]= $persona;
			}

			desconectarBD($conexion);

			return $Lista_Personas;
		}

		public function setidPersonas($idPersonas) {
			$this->idPersonas = $idPersonas;
		}
		public function setPrimer_Nombre($Primer_Nombre) {
			$this->Primer_Nombre = $Primer_Nombre;
		}
		public function setSegundo_Nombre($Segundo_Nombre) {
			$this->Segundo_Nombre = $Segundo_Nombre;
		}
		public function setPrimer_Apellido($Primer_Apellido) {
			$this->Primer_Apellido = $Primer_Apellido;
		}
		public function setSegundo_Apellido($Segundo_Apellido) {
			$this->Segundo_Apellido = $Segundo_Apellido;
		}
		public function setCédula($Cédula) {
			$this->Cédula = $Cédula;
		}
		public function setFecha_Nacimiento($Fecha_Nacimiento) {
			$this->Fecha_Nacimiento = $Fecha_Nacimiento;
		}
		public function setLugar_Nacimiento($Lugar_Nacimiento) {
			$this->Lugar_Nacimiento = $Lugar_Nacimiento;
		}
		public function setGénero($Género) {
			$this->Género = $Género;
		}
		public function setCorreo_Electrónico($Correo_Electrónico) {
			$this->Correo_Electrónico = $Correo_Electrónico;
		}
		public function setDirección($Dirección) {
			$this->Dirección = $Dirección;
		}
		public function setEstado_Civil($Estado_Civil) {
			$this->Estado_Civil = $Estado_Civil;
		}

		public function getidPersonas() {
			return $this->idPersonas;
		}
		public function getPrimer_Nombre() {
			return $this->Primer_Nombre;
		}
		public function getSegundo_Nombre() {
			return $this->Segundo_Nombre;
		}
		public function getPrimer_Apellido() {
			return $this->Primer_Apellido;
		}
		public function getSegundo_Apellido() {
			return $this->Segundo_Apellido;
		}
		public function getCédula() {
			return $this->Cédula;
		}
		public function getFecha_Nacimiento() {
			return $this->Fecha_Nacimiento;
		}
		public function getLugar_Nacimiento() {
			return $this->Lugar_Nacimiento;
		}
		public function getGénero() {
			return $this->Género;
		}
		public function getCorreo_Electrónico() {
			return $this->Correo_Electrónico;
		}
		public function getDirección() {
			return $this->Dirección;
		}
		public function getEstado_Civil() {
			return $this->Estado_Civil;
		}
	}
?>