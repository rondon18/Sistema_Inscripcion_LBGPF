<?php 

class ContactoAuxiliar {


	private $idContactoAuxiliar;
	private $idRepresentante;
	private $Relación;
	private $Nombre_Aux;
	private $Tfl_P_Contacto_Aux;
	private $Tfl_S_Contacto_Aux;

	public function __construct(){}

	public function insertarContactoAuxiliar($id_representante) {
		$conexion = conectarBD();
		

		$Relación_Auxiliar = $this->getRelación();
		$Nombre_Contacto_Emergencia = $this->getNombre_Aux();
		$Tfl_P_Contacto_Aux = $this->getTfl_P_Contacto_Aux();
		$Tfl_S_Contacto_Aux = $this->getTfl_S_Contacto_Aux();

		$sql ="INSERT INTO `contactos_auxiliares`(`idContactoAuxiliar`, `idRepresentante`, `Relación`, `Nombre_Aux`, `Tfl_P_Contacto_Aux`, `Tfl_S_Contacto_Aux`) VALUES (
			NULL,
			'$id_representante',
			'$Relación_Auxiliar',
			'$Nombre_Contacto_Emergencia',
			'$Tfl_P_Contacto_Aux',
			'$Tfl_S_Contacto_Aux'
			)";

		$conexion->query($sql) or die("error: ".$conexion->error);
		$this->setidContactoAuxiliar($conexion->insert_id);

		desconectarBD($conexion);
	}
	public function editarContactoAuxiliar($id = NULL) {
		
		if ($id == NULL) {
			$id = $this->getidContactoAuxiliar();
		}

		$Relación = $this->getRelación();
		$Nombre_Aux = $this->getNombre_Aux();
		$Tfl_P_Contacto_Aux = $this->getTfl_P_Contacto_Aux();
		$Tfl_S_Contacto_Aux = $this->getTfl_S_Contacto_Aux();

		$conexion = conectarBD();

		$sql = "UPDATE `contactos_auxiliares` SET 
				`Relación`='$Relación',
				`Nombre_Aux`='$Nombre_Aux',
				`Tfl_P_Contacto_Aux`='$Tfl_P_Contacto_Aux',
				`Tfl_S_Contacto_Aux`='$Tfl_S_Contacto_Aux' 
			WHERE `idContactoAuxiliar`='$id'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		
		desconectarBD($conexion);

	}
	public function eliminarContactoAuxiliar($id = NULL) {

	}
	public function consultarContactoAuxiliar($id = NULL) {

	}
	public function mostrarContactosAuxiliares() {

	}

	public function setidContactoAuxiliar($idContactoAuxiliar) {
		$this->idContactoAuxiliar = $idContactoAuxiliar;
	}
	public function setidRepresentante($idRepresentante) {
		$this->idRepresentante = $idRepresentante;
	}
	public function setRelación($Relación) {
		$this->Relación = $Relación;
	}
	public function setNombre_Aux($Nombre_Aux) {
		$this->Nombre_Aux = $Nombre_Aux;
	}
	public function setTfl_P_Contacto_Aux($Tfl_P_Contacto_Aux) {
		$this->Tfl_P_Contacto_Aux = $Tfl_P_Contacto_Aux;
	}
	public function setTfl_S_Contacto_Aux($Tfl_S_Contacto_Aux) {
		$this->Tfl_S_Contacto_Aux = $Tfl_S_Contacto_Aux;
	}	

	public function getidContactoAuxiliar() {
		return $this->idContactoAuxiliar;
	}
	public function getidRepresentante() {
		return $this->idRepresentante;
	}
	public function getRelación() {
		return $this->Relación;
	}
	public function getNombre_Aux() {
		return $this->Nombre_Aux;
	}
	public function getTfl_P_Contacto_Aux() {
		return $this->Tfl_P_Contacto_Aux;
	}
	public function getTfl_S_Contacto_Aux() {
		return $this->Tfl_S_Contacto_Aux;
	}






}



?>