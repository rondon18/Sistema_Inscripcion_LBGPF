<?php  

class MateriasPendientes {

	private $idMaterias_Pendientes;
	private $Tiene_Mat_Pend;
	private $Materias_Pendientes;
	private $idAlumno;

	public function __construct() {}


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