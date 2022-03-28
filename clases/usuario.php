<?php 
require_once("personas.php");

class Usuarios extends Personas {
    
	private $Id_usuario;
	private $Clave;
	private $Privilegios;

	public function __construct() {}

	public function insertarUsuario() {
		$conexion = conectarBD();

		$Clave = $this->getClave();
		$Privilegios = $this->getPrivilegios();
		$Cedula = $this->getCedula();
		$idRepresentantes = $this->getidRepresentantes();

		$sql = "INSERT INTO `usuarios`(`idUsuarios`, `Clave`, `Privilegios`, `Cedula_Persona`, `idRepresentante`) VALUES (NULL, '$Clave',$Privilegios, '$Cedula',$idRepresentantes)";

		$conexion->query($sql) or die("error: ".$conexion->error);
		$this->setId_usuario($conexion->insert_id);

		desconectarBD($conexion);
	}

	public function editarUsuario($id) {

		$conexion = conectarBD();
		
		$Clave = $this->getClave();

		$sql = "UPDATE `usuarios` SET 
			`Clave`='$Clave'
		WHERE `idUsuarios`='$id'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		
		desconectarBD($conexion);
	}
	public function eliminarUsuario() {

	}
	public function consultarUsuario() {

	}
	public function mostrarUsuarios() {

	}
	//Setters
	public function setId_usuario($Id_usuario){
		$this->Id_usuario = $Id_usuario;
	}
	public function setClave($Clave){
		$this->Clave = $Clave;
	}
	public function setPrivilegios($Privilegios){
		$this->Privilegios = $Privilegios;
	}
	//Getters
	public function getId_usuario(){
		return $this->Id_usuario;
	}
	public function getClave(){
		return $this->Clave;
	}
	public function getPrivilegios(){
		return $this->Privilegios;
	}
}
?>