<?php 


	class Personas {
		private Id;
		private Nombres;
		private Apellidos;
		private Cedula;
		private Correo;
		private Genero;
		private FechaNacimiento;

		public function __construct() {}

		//setters
		public function  setId($Id){
			this->Id = $Id;
		}
		public function setNombres($Nombres){
			this->Nombres = $Nombres;
		}
		public function setApellidos($Apellidos){
			this->Apellidos = $Apellidos;
		}
		public function setCedula($Cedula){
			this->Cedula = $Cedula;
		}
		public function setCorreo($Correo){
			this->Correo = $Correo;
		}
		public function setGenero($Genero){
			this->Genero = $Genero;
		}
		public function setFechaNacimiento($FechaNacimiento){
			this->FechaNacimiento = $FechaNacimiento;
		}
	
		//getters
		public function getId(){
			return this->Id;
		}
		public function  getNombres(){
			return this->Nombres;
		}
		public function getApellidos(){
			return this->Apellidos;
		}
		public function getCedula(){
			return this->Cedula;
		}
		public function getCorreo(){
			return this->Correo;
		}
		public function getGenero(){
			return this->Genero;
		}
		public function getFechaNacimiento(){
			return this->FechaNacimiento;
		}
	}



?>