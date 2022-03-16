<?php 

require_once("usuario.php");

class Representantes extends Usuarios {
	
	private $idRepresentantes;
	private $Vinculo;
	private $Banco;
	private $Tipo_Cuenta;
	private $Nro_Cuenta;
	private $Contacto_Aux;
	private $Grado_Inst;
	private $Empleo;
	private $Lugar_Trabajo;
	private $Teléfono_Trabajo;
	private $Remuneración;
	private $Tipo_Remuneración;
	private $id_Usuario;

	public function __construct(){}

	public function insertarRepresentante() {
		$conexion = conectarBD();

		$Vinculo = $this->getVinculo()
		$Banco = $this->getBanco();
		$Tipo_Cuenta = $this->getTipo_Cuenta()
		$Nro_Cuenta = $this->getNro_Cuenta();
		$Grado_Inst = $this->getGrado_Inst()
		$Empleo = $this->getEmpleo();
		$Lugar_Trabajo = $this->getLugar_Trabajo();
		$Teléfono_Trabajo = $this->getTeléfono_Trabajo()
		$Remuneración = $this->getRemuneración();
		$Tipo_Remuneración = $this->getTipo_Remuneración()
		$Id_usuario = $this->getId_usuario()
		$Cedula = $this->getCedula();

		$sql = "INSERT INTO `representantes`(`idRepresentantes`, `Vinculo`, `Banco`, `Tipo_Cuenta`, `Cta_Bancaria`, `Grado_Inst`, `Empleo`, `Lugar_Trabajo`, `Teléfono_Trabajo`, `Remuneracion`, `Tipo_Remuneración`, `id_Usuario`, `Cedula_Persona`) VALUES (
			NULL,
			'$Vinculo',
			'$Banco',
			'$Tipo_Cuenta',
			'$Nro_Cuenta',
			'$Grado_Inst',
			'$Empleo',
			'$Lugar_Trabajo',
			'$Teléfono_Trabajo',
			'$Remuneración',
			'$Tipo_Remuneración',
			'$Id_usuario',
			'$Cedula'
			)";

		$conexion->query($sql) or die("error: ".$conexion->error);
		$this->setidRepresentantes($conexion->insert_id);

		desconectarBD($conexion);
	}

	public function retornarTodo() {
		$valores = [
			'Id' => $this->getId(),
			'Nombres' => $this->getNombres(),
			'Apellidos' => $this->getApellidos(),
			'Cedula' => $this->getCedula(),
			'Correo' => $this->getCorreo(),
			'Genero' => $this->getGenero(),
			'Fecha_Nacimiento' => $this->getFecha_Nacimiento(),
			'Lugar_Nacimiento' => $this->getLugar_Nacimiento(),
			'Direccion' => $this->getDireccion(),
			'Teléfono_Principal' => $this->getTeléfono_Principal(),
			'Teléfono_Auxiliar' => $this->getTeléfono_Auxiliar(),
			'idRepresentantes' => $this->getidRepresentantes(),
			'Vinculo' => $this->getVinculo(),
			'Banco' => $this->getBanco(),
			'Tipo_Cuenta' => $this->getTipo_Cuenta(),
			'Nro_Cuenta' => $this->getNro_Cuenta(),
			'Estado_Civil' => $this->getEstado_Civil(),
			'Contacto_Aux' => $this->getContacto_Aux(),
			'Grado_Inst' => $this->getGrado_Inst(),
			'Empleo' => $this->getEmpleo(),
			'Lugar_Trabajo' => $this->getLugar_Trabajo(),
			'Teléfono_Trabajo' => $this->getTeléfono_Trabajo(),
			'Remuneración' => $this->getRemuneración(),
			'Tipo_Remuneración' => $this->getTipo_Remuneración(),
			'Id_usuario' => $this->getId_usuario(),
			'Clave' => $this->getClave(),
			'Privilegios' => $this->getPrivilegios(),
		];
		return $valores;
	}

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
	public function setNro_Cuenta($Nro_Cuenta){
		$this->Nro_Cuenta = $Nro_Cuenta;
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
	public function setLugar_Trabajo($Lugar_Trabajo) {
		$this->Lugar_Trabajo = $Lugar_Trabajo;
	}
	public function setTeléfono_Trabajo($Teléfono_Trabajo) {
		$this->Teléfono_Trabajo = $Teléfono_Trabajo;
	}
	public function setRemuneración($Remuneración) {
		$this->Remuneración = $Remuneración;
	}
	public function setTipo_Remuneración($Tipo_Remuneración) {
		$this->Tipo_Remuneración = $Tipo_Remuneración;
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
	public function getNro_Cuenta(){
		return $this->Nro_Cuenta;
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
	public function getLugar_Trabajo() {
		return $this->Lugar_Trabajo;
	}
	public function getTeléfono_Trabajo() {
		return $this->Teléfono_Trabajo;
	}
	public function getRemuneración() {
		return $this->Remuneración;
	}
	public function getTipo_Remuneración() {
		return $this->Tipo_Remuneración;
	}
}

?>