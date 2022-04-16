<?php 

class ContactoAuxiliar {

	private $idContactoAuxiliar;
	private $Relación;
	private $Cédula_Persona;
	private $idRepresentante;

	public function __construct(){}

	public function insertarContactoAuxiliar($idRepresentante) {
		$conexion = conectarBD();
		
		$Relación = $this->getRelación();
		$Cédula_Persona = $this->getCédula_Persona();

		$sql = "SELECT * FROM `contactos_auxiliares` WHERE `Cédula_Persona` = '$Cédula_Persona' AND`idRepresentante` = '$idRepresentante'";

		$registro_existe = $conexion->query($sql);
		$resultado = $registro_existe->fetch_assoc();
		
		if ($resultado == NULL) {
			$sql = "INSERT INTO `contactos_auxiliares`(`idContactoAuxiliar`, `Relación`, `Cédula_Persona`, `idRepresentante`) VALUES (
				NULL,
				'$Relación',
				'$Cédula_Persona',
				'$idRepresentante'
			)";

			$conexion->query($sql) or die("error: ".$conexion->error);
			$this->setidContactoAuxiliar($conexion->insert_id);
		}
		elseif ($resultado != NULL) {
			$this->setidContactoAuxiliar($resultado['idContactoAuxiliar']);
		}
		desconectarBD($conexion);
	}
	public function editarContactoAuxiliar() {
		
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
	public function consultarContactoAuxiliar($idRepresentante) {
		$conexion = conectarBD();
			
		$Relación = $this->getRelación();
		$Cédula_Persona = $this->getCédula_Persona();

		$sql = "SELECT * FROM `contactos_auxiliares` WHERE `idRepresentante` = '$idRepresentante'";

		$consulta_persona = $conexion->query($sql) or die("error: ".$conexion->error);			
		$persona = $consulta_persona->fetch_assoc();

		return $persona;
	}
	public function mostrarContactosAuxiliares() {

	}

	public function setidContactoAuxiliar($idContactoAuxiliar) {
		$this->idContactoAuxiliar = $idContactoAuxiliar;
	}
	public function setRelación($Relación) {
		$this->Relación = $Relación;
	}
	public function setCédula_Persona($Cédula_Persona) {
		$this->Cédula_Persona = $Cédula_Persona;
	}
	public function setidRepresentante($idRepresentante) {
		$this->idRepresentante = $idRepresentante;
	}

	public function getidContactoAuxiliar() {
		return $this->idContactoAuxiliar;
	}
	public function getRelación() {
		return $this->Relación;
	}
	public function getCédula_Persona() {
		return $this->Cédula_Persona;
	}
	public function getidRepresentante() {
		return $this->idRepresentante;
	}




}



?>