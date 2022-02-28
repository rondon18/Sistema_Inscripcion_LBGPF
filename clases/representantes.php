<?php 

require_once("usuario.php");

class Representantes extends Usuarios {
	
	private $idRepresentantes;
	private $Vinculo;
	private $Banco;
	private $Tipo_Cuenta;
	private $Cta_Bancaria;
	private $Estado_Civil;
	private $Contacto_Aux;
	private $Grado_Inst;
	private $Empleo;
	private $id_Usuario;


	public function __construct(){}


	//Setters
	public function setidRepresentantes($idRepresentantes){
		$this->idRepresentantes = $idRepresentantes;
	}
	public function setVinculo($Vinculo){
		$this->Vinculo = $Vinculo;
	}
	public function setBanco($Banco){
		$this->Banco = $Banco;
	}
	public function setTipo_Cuenta($Tipo_Cuenta){
		$this->Tipo_Cuenta = $Tipo_Cuenta;
	}
	public function setCta_Bancaria($Cta_Bancaria){
		$this->Cta_Bancaria = $Cta_Bancaria;
	}
	public function setEstado_Civil($Estado_Civil){
		$this->Estado_Civil = $Estado_Civil;
	}
	public function setContacto_Aux($Contacto_Aux){
		$this->Contacto_Aux = $Contacto_Aux;
	}
	public function setGrado_Inst($Grado_Inst){
		$this->Grado_Inst = $Grado_Inst;
	}
	public function setEmpleo($Empleo){
		$this->Empleo = $Empleo;
	}
	public function setid_Usuario($id_Usuario){
		$this->id_Usuario = $id_Usuario;
	}

	//Getters
	public function getidRepresentantes(){
		return $this->idRepresentantes;
	}
	public function getVinculo(){
		return $this->Vinculo;
	}
	public function getBanco(){
		return $this->Banco;
	}
	public function getTipo_Cuenta(){
		return $this->Tipo_Cuenta;
	}
	public function getCta_Bancaria(){
		return $this->Cta_Bancaria;
	}
	public function getEstado_Civil(){
		return $this->Estado_Civil;
	}
	public function getContacto_Aux(){
		return $this->Contacto_Aux;
	}
	public function getGrado_Inst(){
		return $this->Grado_Inst;
	}
	public function getEmpleo(){
		return $this->Empleo;
	}
	public function getid_Usuario(){
		return $this->id_Usuario;
	}
}

?>