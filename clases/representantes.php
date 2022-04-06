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

		$Vinculo = $this->getVinculo();
		$Banco = $this->getBanco();
		$Tipo_Cuenta = $this->getTipo_Cuenta();
		$Nro_Cuenta = $this->getNro_Cuenta();
		$Grado_Inst = $this->getGrado_Inst();
		$Empleo = $this->getEmpleo();
		$Lugar_Trabajo = $this->getLugar_Trabajo();
		$Teléfono_Trabajo = $this->getTeléfono_Trabajo();
		$Remuneración = (int)$this->getRemuneración();
		$Tipo_Remuneración = $this->getTipo_Remuneración();
		$Cedula = $this->getCedula();

		$sql = "INSERT INTO `representantes`(`idRepresentantes`, `Vinculo`, `Banco`, `Tipo_Cuenta`, `Cta_Bancaria`, `Grado_Inst`, `Empleo`, `Lugar_Trabajo`, `Teléfono_Trabajo`, `Remuneracion`, `Tipo_Remuneración`, `Cedula_Persona`) VALUES (
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
			'$Cedula'
			)";

		$conexion->query($sql) or die("error: ".$conexion->error);
		$this->setidRepresentantes($conexion->insert_id);

		desconectarBD($conexion);
	}
	public function editarRepresentante($id) {
		$conexion = conectarBD();

		$Vinculo = $this->getVinculo();
		$Banco = $this->getBanco();
		$Tipo_Cuenta = $this->getTipo_Cuenta();
		$Nro_Cuenta = $this->getNro_Cuenta();
		$Grado_Inst = $this->getGrado_Inst();
		$Empleo = $this->getEmpleo();
		$Lugar_Trabajo = $this->getLugar_Trabajo();
		$Teléfono_Trabajo = $this->getTeléfono_Trabajo();
		$Remuneración = (int)$this->getRemuneración();
		$Tipo_Remuneración = $this->getTipo_Remuneración();
		$Cedula = $this->getCedula();
		
		#Edita los campos a excepción del id, que deberia mantenerse inmutable
		$sql = "UPDATE `representantes` SET 
					`Vinculo`='$Vinculo',
					`Banco`='$Banco',
					`Tipo_Cuenta`='$Tipo_Cuenta',
					`Cta_Bancaria`='$Nro_Cuenta',
					`Grado_Inst`='$Grado_Inst',
					`Empleo`='$Empleo',
					`Lugar_Trabajo`='$Lugar_Trabajo',
					`Teléfono_Trabajo`='$Teléfono_Trabajo',
					`Remuneracion`='$Remuneración',
					`Tipo_Remuneración`='$Tipo_Remuneración'
				WHERE `idRepresentantes`='$id'";
		$conexion->query($sql) or die("error: ".$conexion->error);

		desconectarBD($conexion);
	}
	public function eliminarRepresentante($id) {
		$conexion = conectarBD();

		$sql = "DELETE FROM `representantes` WHERE `idRepresentantes` = '$id'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectarBD($conexion);
	}
	public function consultarRepresentante($id) {
		$conexion = conectarBD();
		
		$sql = "SELECT * FROM `personas`,`representantes` WHERE `representantes`.`idRepresentantes` = '$id' AND `personas`.`Cédula` = `representantes`.`Cedula_Persona`";

		$consulta_representantes = $conexion->query($sql) or die("error: ".$conexion->error);			
		$representantes = $consulta_representantes->fetch_assoc();

		desconectarBD($conexion);
		
		return $representantes;
	}

	public function mostrarRepresentantes() {
		#Muestra todas las representantes en la tabla
		$conexion = conectarBD();

		$sql = "SELECT * FROM `personas`,`representantes` WHERE `personas`.`Cédula` = `representantes`.`Cedula_Persona`";

		$consulta_representantes = $conexion->query($sql) or die("error: ".$conexion->error);			
		$representantes = $consulta_representantes->fetch_all();

		#Hace un arreglo de arreglos para contener los campos de la representantes
		$Lista_Representantes = [];
		foreach ($representantes as $representantes) {
			$Lista_Representantes[]= $representantes;
		}

		desconectarBD($conexion);

		return $Lista_Representantes;
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