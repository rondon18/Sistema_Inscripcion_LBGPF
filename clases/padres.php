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

	public function editarPadres(){
		$conexion = conectarBD();
		
		$sql = "";

		$conexion->query($sql);
		desconectarBD($conexion);
	}
	public function eliminarPadres(){
		$conexion = conectarBD();
		
		$sql = "";

		$conexion->query($sql);
		desconectarBD($conexion);
	}
	public function consutarPadres(){
		$conexion = conectarBD();
		
		$sql = "";

		$conexion->query($sql);
		desconectarBD($conexion);
	}
	public function mostrarPadres(){
		$conexion = conectarBD();
		
		$sql = "";

		$conexion->query($sql);
		desconectarBD($conexion);
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