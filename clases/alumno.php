<?php 

require("personas.php");

class Alumnos extends Personas {

	private CedulaRepresentante;
	private FechaNacimiento;
	private LugarNacimiento;
	private PlantelProcedencia;
	private MateriasPendientes1;
	private MateriasPendientes2;
	private Grado;

	public function __construct() {}

	public function setCedulaRepresentante($CedulaRepresentante){
		this->CedulaRepresentante = $CedulaRepresentante;
	}
	public function setFechaNacimiento($FechaNacimiento){
		this->FechaNacimiento = $FechaNacimiento;
	}
	public function setLugarNacimiento($LugarNacimiento){
		this->LugarNacimiento = $LugarNacimiento;
	}
	public function setPlantelProcedencia($PlantelProcedencia){
		this->PlantelProcedencia = $PlantelProcedencia;
	}
	public function setMateriasPendientes1($MateriasPendientes1){
		this->MateriasPendientes1 = $MateriasPendientes1;
	}
	public function setMateriasPendientes2($MateriasPendientes2){
		this->MateriasPendientes2 = $MateriasPendientes2;
	}
	public function setGrado($Grado){
		this->Grado = $Grado;
	}
	
	public function getCedulaRepresentante(){
		return this->CedulaRepresentante;
	}
	public function getFechaNacimiento(){
		return this->FechaNacimiento;
	}
	public function getLugarNacimiento(){
		return this->LugarNacimiento;
	}
	public function getPlantelProcedencia(){
		return this->PlantelProcedencia;
	}
	public function getMateriasPendientes1(){
		return this->MateriasPendientes1;
	}
	public function getMateriasPendientes2(){
		return this->MateriasPendientes2;
	}
	public function getGrado(){
		return this->Grado;
	}


	}


}

?>