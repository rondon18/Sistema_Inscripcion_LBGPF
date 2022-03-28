<?php  

class AlumnosRepitentes {

	private $idAlumno_Repitente;
	private $Tiene_Mat_Pend;
	private $Materias_Pendientes;
	private $idAlumno;

	public function __construct() {}

	public function insertarAlumnosRepitentes($idAlumno) {
		$conexion = conectarBD();
		
		$Tiene_Mat_Pend = $this->getTiene_Mat_Pend();
		$Materias_Pendientes = $this->getMaterias_Pendientes();

		$sql = "INSERT INTO `alumnos-repitentes`(`idAlumno-Repitente`, `Tiene_Mat_Pend`, `Materias_Pendientes`, `idAlumno`) VALUES (
			NULL,
			'$Tiene_Mat_Pend',
			'$Materias_Pendientes',
			'$idAlumno'
		)"

		$conexion->query($sql) or die("error: ".$conexion->error);
		$this->setidAlumno_Repitente($conexion->insert_id);
		desconectarBD($conexion);
	}

	public function setidAlumno_Repitente($idAlumno_Repitente) {
		$this->idAlumno_Repitente = $idAlumno_Repitente;
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

	public function getidAlumno_Repitente() {
		return $this->idAlumno_Repitente;
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