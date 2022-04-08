<?php  

class EstudiantesRepitentes {

	private $idEstudiante_Repitente;
	private $Materias_Pendientes;
	private $idEstudiante;

	public function __construct() {}

	public function insertarEstudiantesRepitentes($idEstudiante) {
		$conexion = conectarBD();
		
		$Materias_Pendientes = $this->getMaterias_Pendientes();

		$sql = "INSERT INTO `estudiantes-repitentes`(`idEstudiante-Repitente`, `Materias_Pendientes`, `idEstudiante`) VALUES (
			NULL,
			'$Materias_Pendientes',
			'$idEstudiante'
		)";

		$conexion->query($sql) or die("error: ".$conexion->error);
		$this->setidEstudiante_Repitente($conexion->insert_id);
		desconectarBD($conexion);
	}

	public function consultarEstudiantesRepitentes($id_Estudiante) {
		$conexion = conectarBD();

		$sql = "SELECT * FROM `estudiantes-repitentes` WHERE `idEstudiante` = '$id_Estudiante'";

		$consulta = $conexion->query($sql) or die("error: ".$conexion->error);
		$repitente = $consulta->fetch_assoc();

		desconectarBD($conexion);

		return $repitente;
	}

	public function setidEstudiante_Repitente($idEstudiante_Repitente) {
		$this->idEstudiante_Repitente = $idEstudiante_Repitente;
	}
	public function setMaterias_Pendientes($Materias_Pendientes) {
		$this->Materias_Pendientes = $Materias_Pendientes;
	}
	public function setidEstudiante($idEstudiante) {
		$this->idEstudiante = $idEstudiante;
	}

	public function getidEstudiante_Repitente() {
		return $this->idEstudiante_Repitente;
	}
	public function getMaterias_Pendientes() {
		return $this->Materias_Pendientes;
	}
	public function getidEstudiante() {
		return $this->idEstudiante;
	}




}



?>