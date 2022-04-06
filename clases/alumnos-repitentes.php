<?php  

class AlumnosRepitentes {

	private $idAlumno_Repitente;
	private $Materias_Pendientes;
	private $idAlumno;

	public function __construct() {}

	public function insertarAlumnosRepitentes($idAlumno) {
		$conexion = conectarBD();
		
		$Materias_Pendientes = $this->getMaterias_Pendientes();

		$sql = "INSERT INTO `alumnos-repitentes`(`idAlumno-Repitente`, `Materias_Pendientes`, `idAlumno`) VALUES (
			NULL,
			'$Materias_Pendientes',
			'$idAlumno'
		)";

		$conexion->query($sql) or die("error: ".$conexion->error);
		$this->setidAlumno_Repitente($conexion->insert_id);
		desconectarBD($conexion);
	}

	public function consultarAlumnosRepitentes($id_Alumno) {
		$conexion = conectarBD();

		$sql = "SELECT * FROM `alumnos-repitentes` WHERE `idAlumno` = '$id_Alumno'";

		$consulta = $conexion->query($sql) or die("error: ".$conexion->error);
		$repitente = $consulta->fetch_assoc();

		desconectarBD($conexion);

		return $repitente;
	}

	public function setidAlumno_Repitente($idAlumno_Repitente) {
		$this->idAlumno_Repitente = $idAlumno_Repitente;
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
	public function getMaterias_Pendientes() {
		return $this->Materias_Pendientes;
	}
	public function getidAlumno() {
		return $this->idAlumno;
	}




}



?>