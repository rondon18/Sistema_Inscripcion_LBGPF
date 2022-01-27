<?php 

class Usuario {
    
	private $id;#clave primaria
	private $cedula;#dato unico para toda la BDS

	#el nombre completo viene de concatenar estos 4 en la interfaz
	private $nombre1;
	private $nombre2;
	private $apellido1;
	private $apellido2;

	#M/F
	private $genero;

	#se debe validar una vez hecho el registro
	private $email;
	private $clave;
	private $telefono1;
	private $telefono2;
	private $direccion;

	public function __construct() {

	}

	#getters y setter de las variables del objeto

	#el id no se cambia
	public function getId() {
		return $this->id;
	}

	#cedula
	public function getCedula() {
		return $this->cedula;
	}
	
	public function setCedula($dato) {
		$this->cedula = $dato; 
	}
	
	#Primer nombre
	public function getNombre1() {
		return $this->nombre1;
	}
	
	public function setNombre1($dato) {
		$this->nombre1 = $dato; 
	}
	
	#Segundo nombre
	public function getNombre2() {
		return $this->nombre2;
	}
	
	public function setNombre2($dato) {
		$this->nombre2 = $dato; 
	}
	
	#Primer apellido
	public function getApellido1() {
		return $this->apellido1;
	}
	
	public function setApellido1($dato) {
		$this->apellido1 = $dato; 
	}
	
	#Segundo apellido
	public function getApellido2() {
		return $this->apellido2;
	}
	
	public function setApellido2($dato) {
		$this->apellido2 = $dato; 
	}
	

	#Genero
	public function getGenero() {
		return $this->genero;
	}
	
	public function setGenero($dato) {
		$this->genero = $dato; 
	}
	
	public function getEmail() {
		return $this->email;
	}
	
	#Correo electronico
	public function setEmail($dato) {
		$this->email = $dato; 
	}
	
	#Contraseña
	public function getClave() {
		return $this->clave;
	}
	
	public function setClave($dato) {
		$this->clave = $dato; 
	}
	

	#Telefono principal
	public function getTelefono1() {
		return $this->telefono1;
	}
	
	public function setTelefono1($dato) {
		$this->telefono1 = $dato; 
	}
	
	#Telefono auxiliar
	public function getTelefono2() {
		return $this->telefono2;
	}
	
	public function setTelefono2($dato) {
		$this->telefono2 = $dato; 
	}

	#Direccion
	public function getDireccion() {
		return $this->direccion;
	}
	
	public function setDireccion($dato) {
		$this->direccion = $dato; 
	}
}
?>