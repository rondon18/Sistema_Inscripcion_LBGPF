<?php

class EstudiantesRepitentes {

	private $idEstudiante_Repitente;
	private $Materias_Pendientes;
	private $Año_Repetido;
	private $Que_Materias_Repite;
	private $idEstudiante;


	public function __construct() {}

	public function insertarEstudiantesRepitentes($idEstudiante) {
		$conexion = conectarBD();

		$Materias_Pendientes = $this->getMaterias_Pendientes();
		$Año_Repetido = $this->getAño_Repetido();
		$Que_Materias_Repite = $this->getQue_Materias_Repite();
		$sql = "INSERT INTO `estudiantes-repitentes`(`idEstudiante-Repitente`, `Materias_Pendientes`, `Año_Repetido`, `Que_Materias_Repite`, `idEstudiante`) VALUES (
			NULL,
			'$Materias_Pendientes',
			'$Año_Repetido',
			'$Que_Materias_Repite',
			'$idEstudiante'
		)";

		$conexion->query($sql) or die("error: ".$conexion->error);
		$this->setidEstudiante_Repitente($conexion->insert_id);
		desconectarBD($conexion);
	}

	public function editarEstudiantesRepitentes($idEstudiante) {
		$conexion = conectarBD();

		$Materias_Pendientes = $this->getMaterias_Pendientes();
		$Año_Repetido = $this->getAño_Repetido();
		$Que_Materias_Repite = $this->getQue_Materias_Repite();

		$sql = "UPDATE `estudiantes-repitentes` SET
		 `Materias_Pendientes`='$Materias_Pendientes',
		 `Año_Repetido`='$Año_Repetido',
		 `Que_Materias_Repite`='$Que_Materias_Repite'
		 WHERE `idEstudiante`='$idEstudiante'";

		$conexion->query($sql) or die("error: ".$conexion->error);
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
	public function setAño_Repetido($Año_Repetido) {
		$this->Año_Repetido = $Año_Repetido;
	}
	public function setQue_Materias_Repite($Que_Materias_Repite) {
		$this->Que_Materias_Repite = $Que_Materias_Repite;
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
	public function getAño_Repetido() {
		return $this->Año_Repetido;
	}
	public function getQue_Materias_Repite() {
		return $this->Que_Materias_Repite;
	}
	public function getidEstudiante() {
		return $this->idEstudiante;
	}
}



?>
