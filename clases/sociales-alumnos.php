<?php 

	class DatosSociales {
		private CedulaEstudiante;
		private Dirección;
		private PropietarioDomicilio;
		private PoseeCanaima;
		private CondicionCanaima;
		private PoseeCarnetPatria;
		private CodigoCarnetPatria;
		private SerialCarnetPatria;
		private AccesoInternet;

		public function __construct(){}

		//Setters
		public function setCedulaEstudiante($CedulaEstudiante){
			this->CedulaEstudiante = $CedulaEstudiante;
		}
		public function setDirección($Dirección){
			this->Dirección = $Dirección;
		}
		public function setPropietarioDomicilio($PropietarioDomicilio){
			this->PropietarioDomicilio = $PropietarioDomicilio;
		}
		public function setPoseeCanaima($PoseeCanaima){
			this->PoseeCanaima = $PoseeCanaima;
		}
		public function setCondicionCanaima($CondicionCanaima){
			this->CondicionCanaima = $CondicionCanaima;
		}
		public function setPoseeCarnetPatria($PoseeCarnetPatria){
			this->PoseeCarnetPatria = $PoseeCarnetPatria;
		}
		public function setCodigoCarnetPatria($CodigoCarnetPatria){
			this->CodigoCarnetPatria = $CodigoCarnetPatria;
		}
		public function setSerialCarnetPatria($SerialCarnetPatria){
			this->SerialCarnetPatria = $SerialCarnetPatria;
		}
		public function setAccesoInternet($AccesoInternet){
			this->AccesoInternet = $AccesoInternet;
		}

		//Getters
		public function getCedulaEstudiante(){
			return this->CedulaEstudiante;
		}
		public function getDirección(){
			return this->Dirección;
		}
		public function getPropietarioDomicilio(){
			return this->PropietarioDomicilio;
		}
		public function getPoseeCanaima(){
			return this->PoseeCanaima;
		}
		public function getCondicionCanaima(){
			return this->CondicionCanaima;
		}
		public function getPoseeCarnetPatria(){
			return this->PoseeCarnetPatria;
		}
		public function getCodigoCarnetPatria(){
			return this->CodigoCarnetPatria;
		}
		public function getSerialCarnetPatria(){
			return this->SerialCarnetPatria;
		}
		public function getAccesoInternet(){
			return this->AccesoInternet;
		}





	}

?>