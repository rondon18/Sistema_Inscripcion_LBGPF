<?php  

class MateriasPendientes {

	private $idMaterias_Pendientes;
	private $Tiene_Mat_Pend;
	private $Materias_Pendientes;
	private $idAlumno;

	public function __construct() {}

	public function insertarMateriasPendientes($idAlumno) {
		$conexion = conectarBD();
		
		$Tiene_Mat_Pend = $this->getTiene_Mat_Pend();
		$Materias_Pendientes = $this->getMaterias_Pendientes();

		$sql = "INSERT INTO `materias-pendientes`(`idMaterias-Pendientes`, `Tiene_Mat_Pend`, `Materias_Pendientes`, `idAlumno`) VALUES (
			NULL,
			'$Tiene_Mat_Pend',
			'$Materias_Pendientes',
			'$idAlumno'
		)"

		$conexion->query($sql) or die("error: ".$conexion->error);
		$this->setidMaterias_Pendientes($conexion->insert_id);
		desconectarBD($conexion);
	}

	public function setidMaterias_Pendientes($idMaterias_Pendientes) {
		$this->idMaterias_Pendientes = $idMaterias_Pendientes;
	}
	public function setTiene_Mat_Pend($Tiene_Mat_Pend) {
		$this->Tiene_Mat_Pend = $Tiene_Mat_Pend;
	}
	public function setMaterias_Pendientes($Materias_Pendientes) {
		$this->Materias_Pendientes = $Materias_Pendientes;
	}
	public function setidAlumno($idAlumno) {
		$this->idAlumno = $idAlumno;
	}

	public function getidMaterias_Pendientes() {
		return $this->idMaterias_Pendientes;
	}
	public function getTiene_Mat_Pend() {
		return $this->Tiene_Mat_Pend;
	}
	public function getMaterias_Pendientes() {
		return $this->Materias_Pendientes;
	}
	public function getidAlumno() {
		return $this->idAlumno;
	}




}



?>