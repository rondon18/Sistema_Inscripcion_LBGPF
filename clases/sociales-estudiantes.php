<?php

	class DatosSociales {

		private $idDatos_Sociales;
		private $Posee_Canaima;
		private $Condicion_Canaima;
		private $Posee_Carnet_Patria;
		private $Codigo_Carnet_Patria;
		private $Serial_Carnet_Patria;
		private $Acceso_Internet;
		private $idEstudiantes;

		public function __construct(){}

		public function insertarDatosSociales($id_Estudiante) {
			$conexion = conectarBD();

			$Posee_Canaima = $this->getPosee_Canaima();
			$Condicion_Canaima = $this->getCondicion_Canaima();
			$Codigo_Carnet_Patria = $this->getCodigo_Carnet_Patria();
			$Serial_Carnet_Patria = $this->getSerial_Carnet_Patria();
			$Acceso_Internet = $this->getAcceso_Internet();

			$sql = "INSERT INTO `datos-sociales`(`idDatos-Sociales`, `Posee_Canaima`, `Condicion_Canaima`, `Codigo_Carnet_Patria`, `Serial_Carnet_Patria`, `Acceso_Internet`, `idEstudiantes`) VALUES (
				NULL,
				'$Posee_Canaima',
				'$Condicion_Canaima',
				'$Codigo_Carnet_Patria',
				'$Serial_Carnet_Patria',
				'$Acceso_Internet',
				'$id_Estudiante'
			)";

			$conexion->query($sql) or die("error: ".$conexion->error);
			$this->setidDatos_Sociales($conexion->insert_id);

			desconectarBD($conexion);
		}

		public function editarDatosSociales($id_Estudiante) {
			$conexion = conectarBD();

			$Posee_Canaima = $this->getPosee_Canaima();
			$Condicion_Canaima = $this->getCondicion_Canaima();
			$Posee_Carnet_Patria = $this->getPosee_Carnet_Patria();
			$Codigo_Carnet_Patria = $this->getCodigo_Carnet_Patria();
			$Serial_Carnet_Patria = $this->getSerial_Carnet_Patria();
			$Acceso_Internet = $this->getAcceso_Internet();

			$sql = "UPDATE `datos-sociales` SET
				`Posee_Canaima`='$Posee_Canaima',
				`Condicion_Canaima`='$Condicion_Canaima',
				`Posee_Carnet_Patria`='$Posee_Carnet_Patria',
				`Codigo_Carnet_Patria`='$Codigo_Carnet_Patria',
				`Serial_Carnet_Patria`='$Serial_Carnet_Patria',
				`Acceso_Internet`='$Acceso_Internet',
			WHERE `idEstudiantes`='$id_Estudiante'";

			$conexion->query($sql) or die("error: ".$conexion->error);

			desconectarBD($conexion);
		}

		public function consultarDatosSociales($id_Estudiante) {
			$conexion = conectarBD();

			$sql = "SELECT * FROM `datos-sociales` WHERE `idEstudiantes` = '$id_Estudiante'";

			$consulta_sociales = $conexion->query($sql) or die("error: ".$conexion->error);
			$sociales = $consulta_sociales->fetch_assoc();

			desconectarBD($conexion);

			return $sociales;
		}

		#No hay eliminar porque este registro se va en cascada si se elimina el estudiante

		//Setters
		public function setidDatos_Sociales($idDatos_Sociales){
			$this->idDatos_Sociales = $idDatos_Sociales;
		}
		public function setPosee_Canaima($Posee_Canaima){
			$this->Posee_Canaima = $Posee_Canaima;
		}
		public function setCondicion_Canaima($Condicion_Canaima){
			$this->Condicion_Canaima = $Condicion_Canaima;
		}
		public function setPosee_Carnet_Patria($Posee_Carnet_Patria){
			$this->Posee_Carnet_Patria = $Posee_Carnet_Patria;
		}
		public function setCodigo_Carnet_Patria($Codigo_Carnet_Patria){
			$this->Codigo_Carnet_Patria = $Codigo_Carnet_Patria;
		}
		public function setSerial_Carnet_Patria($Serial_Carnet_Patria){
			$this->Serial_Carnet_Patria = $Serial_Carnet_Patria;
		}
		public function setAcceso_Internet($Acceso_Internet){
			$this->Acceso_Internet = $Acceso_Internet;
		}
		public function setidEstudiantes($idEstudiantes){
			$this->idEstudiantes = $idEstudiantes;
		}

		//Getters
		public function getidDatos_Sociales() {
			return $this->idDatos_Sociales;
		}
		public function getPosee_Canaima() {
			return $this->Posee_Canaima;
		}
		public function getCondicion_Canaima() {
			return $this->Condicion_Canaima;
		}
		public function getPosee_Carnet_Patria() {
			return $this->Posee_Carnet_Patria;
		}
		public function getCodigo_Carnet_Patria() {
			return $this->Codigo_Carnet_Patria;
		}
		public function getSerial_Carnet_Patria() {
			return $this->Serial_Carnet_Patria;
		}
		public function getAcceso_Internet() {
			return $this->Acceso_Internet;
		}
		public function getidEstudiantes() {
			return $this->idEstudiantes;
		}


	}

?>
