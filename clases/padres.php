<?php  

class Padres extends Personas {
	private $idPadres;
	private $Parentezco;

	public function __construct() {}

	public function insertarPadres($Cedula_Persona) {
		$conexion = conectarBD();

		$Parentezco = $this->getParentezco();

		$sql = "INSERT INTO `padres`(`idPadres`, `Parentezco`, `Cedula_Persona`) VALUES (
			NULL,
			'$Parentezco',
			'$Cedula_Persona'
		)";

		$conexion->query($sql);
		$this->setidPadres($conexion->insert_id);
		
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
			'idPadres' => $this->getPadres(),
			'Fecha_Nacimiento' => $this->getFecha_Nacimiento(),
			'Lugar_Nacimiento' => $this->getLugar_Nacimiento(),
			'Direccion' => $this->getDireccion(),
			'Teléfono_Principal' => $this->getTeléfono_Principal(),
			'Teléfono_Auxiliar' => $this->getTeléfono_Auxiliar(),
			'Estado_Civil' => $this->getEstado_Civil(),
			'Parentezco' => $this->getParentezco(),
		];
		return $valores;
	}

	public function setidPadres($idPadres) {
		$this->idPadres = $idPadres;
	}
	public function setParentezco($Parentezco) {
		$this->Parentezco = $Parentezco;
	}

	public function getidPadres() {
		return $this->idPadres;
	}
	public function getParentezco() {
		return $this->Parentezco;
	}
}

?>