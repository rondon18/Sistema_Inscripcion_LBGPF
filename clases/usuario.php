<?php 


require("personas.php");

class Usuarios extends Personas {
    
	private Id;
	private Clave;
	private Privilegios;


	public function __construct() {}
	
	//Setters
	public function setId($id){
		this->Id = $Id;
	}
	public function setClave($Clave){
		this->Clave = $Clave;
	}
	public function setPrivilegios($Privilegios){
		this->Privilegios = $Privilegios;
	}
	//Getters
	public function getId(){
		return this->id;
	}
	public function getClave(){
		return this->Clave;
	}
	public function getPrivilegios(){
		return this->Privilegios;
	}
}
?>