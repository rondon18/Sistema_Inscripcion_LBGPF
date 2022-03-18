<?php 

	class DatosSociales {
		
		private $idDatos_Sociales;
		private $Posee_Canaima;
		private $Condicion_Canaima;
		private $Posee_Carnet_Patria;
		private $Codigo_Carnet_Patria;
		private $Serial_Carnet_Patria;
		private $Acceso_Internet;
		private $idAlumnos;

		public function __construct(){}

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
		public function setidAlumnos($idAlumnos){
			$this->idAlumnos = $idAlumnos;
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
		public function getidAlumnos() {
			return $this->idAlumnos;
		}


	}

?>