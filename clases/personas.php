<?php 

	class Personas {
		
		private $Id;
		private $Nombres;
		private $Apellidos;
		private $Cedula;
		private $Correo;
		private $Genero;
		private $Fecha_Nacimiento;
		private $Lugar_Nacimiento;
		private $Direccion;
		private $Teléfono_Principal;
		private $Teléfono_Auxiliar;
		private $Estado_Civil;

		public function __construct() {}

		public function insertarPersona() {
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

			$sql = "INSERT INTO `personas`(`idPersonas`, `Nombres`, `Apellidos`, `Cédula`, `Fecha_Nacimiento`, `Lugar_Nacimiento`, `Género`, `Correo_Electronico`, `Dirección`, `Teléfono_Principal`, `Teléfono_Auxiliar`, `Estado_Civil`) VALUES (
				NULL,
				'$Nombres',
				'$Apellidos',
				'$Cedula',
				'$Fecha_Nacimiento',
				'$Lugar_Nacimiento',
				'$Genero',
				'$Correo',
				'$Direccion',
				'$Teléfono_Principal',
				'$Teléfono_Auxiliar',
				'$Estado_Civil'
			)";

			$conexion->query($sql) or die("error: ".$conexion->error);
			$this->setId($conexion->insert_id);

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

		public function consultarPersona($id) {
			$conexion = conectarBD();

			$sql = "SELECT * FROM `personas` WHERE `idPersonas` = '$id'";

			$consulta_persona = $conexion->query($sql) or die("error: ".$conexion->error);			
			$persona = $consulta_personas->fetch_assoc();

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

		//setters
		public function setId($Id){
			$this->Id = $Id;
		}
		public function setNombres($Nombres){
			$this->Nombres = $Nombres;
		}
		public function setApellidos($Apellidos){
			$this->Apellidos = $Apellidos;
		}
		public function setCedula($Cedula){
			$this->Cedula = $Cedula;
		}
		public function setCorreo($Correo){
			$this->Correo = $Correo;
		}
		public function setGenero($Genero){
			$this->Genero = $Genero;
		}
		public function setFecha_Nacimiento($Fecha_Nacimiento){
			$this->Fecha_Nacimiento = $Fecha_Nacimiento;
		}
		public function setLugar_Nacimiento($Lugar_Nacimiento) {
			$this->Lugar_Nacimiento = $Lugar_Nacimiento;
		}
		public function setDireccion($Direccion){
			$this->Direccion = $Direccion;
		}
		public function setTeléfono_Principal($Teléfono_Principal) {
			$this->Teléfono_Principal = $Teléfono_Principal;
		}
		public function setTeléfono_Auxiliar($Teléfono_Auxiliar) {
			$this->Teléfono_Auxiliar = $Teléfono_Auxiliar;
		}
		public function setEstado_Civil($Estado_Civil) {
			$this->Estado_Civil = $Estado_Civil;
		}	
		//getters
		public function getId(){
			return $this->Id;
		}
		public function  getNombres(){
			return $this->Nombres;
		}
		public function getApellidos(){
			return $this->Apellidos;
		}
		public function getCedula(){
			return $this->Cedula;
		}
		public function getCorreo(){
			return $this->Correo;
		}
		public function getGenero(){
			return $this->Genero;
		}
		public function getFecha_Nacimiento(){
			return $this->Fecha_Nacimiento;
		}
		public function getLugar_Nacimiento(){
			return $this->Lugar_Nacimiento;
		}
		public function getDireccion() {
			return $this->Direccion;
		}
		public function getTeléfono_Principal(){
			return $this->Teléfono_Principal;
		}
		public function getTeléfono_Auxiliar(){
			return $this->Teléfono_Auxiliar;
		}
		public function getEstado_Civil(){
			return $this->Estado_Civil;
		}
	}
?>