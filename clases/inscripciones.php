<?php  

class Inscripciones {
	private $idInscripciones;
	private $Fecha_Inscripcion;
	private $Hora_Inscripción;
	private $idUsuario;
	private $idAlumno;

	public function __construct(){}

	public function insertarRegistro($idUsuario,$idAlumno) {
		$conexion = conectarBD();

		date_default_timezone_set("America/Caracas");
		$Fecha_Inscripcion = date('Y-m-d');
		$Hora_Inscripción = date('h:i:sa');


		$sql = "INSERT INTO `inscripciones`(`idInscripciones`, `Fecha_Inscripcion`, `Hora_Inscripción`, `idUsuario`, `idAlumno`) VALUES (
				NULL,
				'$Fecha_Inscripcion',
				'$Hora_Inscripción',
				'$idUsuario',
				'$idAlumno'
			)";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectarBD($conexion);
	}

	public function editarRegistro($idUsuario,$idAlumno) {
		$conexion = conectarBD();

		$Fecha_Inscripcion = date('Y-m-d');
		$Hora_Inscripción = date('h:i:sa');
		
		$sql = "UPDATE `inscripciones` SET
				`Fecha_Inscripcion`='$Fecha_Inscripcion',
				`Hora_Inscripción`='$Hora_Inscripción',
			WHERE `idUsuario`='$idUsuario' AND `idAlumno`='$idAlumno'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectarBD($conexion);
	}

	public function setidInscripciones($idInscripciones) {
		$this->idInscripciones = $idInscripciones;
	}
	public function setFecha_Inscripcion($Fecha_Inscripcion) {
		$this->Fecha_Inscripcion = $Fecha_Inscripcion;
	}
	public function setHora_Inscripción($Hora_Inscripción) {
		$this->Hora_Inscripción = $Hora_Inscripción;
	}
	public function setidUsuario($idUsuario) {
		$this->idUsuario = $idUsuario;
	}
	public function setidAlumno($idAlumno) {
		$this->idAlumno = $idAlumno;
	}

	public function getidInscripciones() {
		return $this->idInscripciones;
	}
	public function getFecha_Inscripcion() {
		return $this->Fecha_Inscripcion;
	}
	public function getHora_Inscripción() {
		return $this->Hora_Inscripción;
	}
	public function getidUsuario() {
		return $this->idUsuario;
	}
	public function getidAlumno() {
		return $this->idAlumno;
	}




}


?>