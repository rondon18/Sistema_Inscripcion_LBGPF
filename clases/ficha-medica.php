<?php 

	class FichaMedica {
		private $CedulaEstudiante;
		private $Indice;
		private $Estatura;
		private $Peso;
		private $CirBraquial;
		private $GrupoSanguineo;
		private $Lateralidad;
		private $Medicacion;
		private $DietaEspecial;
		private $ImpedimentoFisico;
		private $Alergias;
		private $CondSalud;
		private $CondDental;
		private $CondVista;
	
		public function __construct(){}

		//Setters
		public function setCedulaEstudiante($CedulaEstudiante){
			$this->CedulaEstudiante = $CedulaEstudiante;
		}
		public function setIndice($Indice){
			$this->Indice = $Indice;
		}
		public function setEstatura($Estatura){
			$this->Estatura = $Estatura;
		}
		public function setPeso($Peso){
			$this->Peso = $Peso;
		}
		public function setCirBraquial($CirBraquial){
			$this->CirBraquial = $CirBraquial;
		}
		public function setGrupoSanguineo($GrupoSanguineo){
			$this->GrupoSanguineo = $GrupoSanguineo;
		}
		public function setLateralidad($Lateralidad){
			$this->Lateralidad = $Lateralidad;
		}
		public function setMedicacion($Medicacion){
			$this->Medicacion = $Medicacion;
		}
		public function setDietaEspecial($DietaEspecial){
			$this->DietaEspecial = $DietaEspecial;
		}
		public function setImpedimentoFisico($ImpedimentoFisico){
			$this->ImpedimentoFisico = $ImpedimentoFisico;
		}
		public function setAlergias($Alergias){
			$this->Alergias = $Alergias;
		}
		public function setCondSalud($CondSalud){
			$this->CondSalud = $CondSalud;
		}
		public function setCondDental($CondDental){
			$this->CondDental = $CondDental;
		}
		public function setCondVista($CondVista){
			$this->CondVista = $CondVista;
		}

		//Getters
		public function getCedulaEstudiante(){
			return $this->CedulaEstudiante;
		}
		public function getIndice(){
			return $this->Indice;
		}
		public function getEstatura(){
			return $this->Estatura;
		}
		public function getPeso(){
			return $this->Peso;
		}
		public function getCirBraquial(){
			return $this->CirBraquial;
		}
		public function getGrupoSanguineo(){
			return $this->GrupoSanguineo;
		}
		public function getLateralidad(){
			return $this->Lateralidad;
		}
		public function getMedicacion(){
			return $this->Medicacion;
		}
		public function getDietaEspecial(){
			return $this->DietaEspecial;
		}
		public function getImpedimentoFisico(){
			return $this->ImpedimentoFisico;
		}
		public function getAlergias(){
			return $this->Alergias;
		}
		public function getCondSalud(){
			return $this->CondSalud;
		}
		public function getCondDental(){
			return $this->CondDental;
		}
		public function getCondVista(){
			return $this->CondVista;
		}
	}
?>