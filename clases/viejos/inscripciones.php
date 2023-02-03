<?php  

class Inscripciones {
	private $idInscripciones;
	private $Fecha_Inscripción;
	private $Hora_Inscripción;
	private $idUsuario;
	private $idEstudiante;

	public function __construct(){}

	public function insertarRegistro($idUsuario,$idEstudiante) {
		$conexion = conectarBD();

		date_default_timezone_set("America/Caracas");
		$Fecha_Inscripción = date('Y-m-d');
		$Hora_Inscripción = date('h:i:sa');


		$sql = "INSERT INTO `Inscripciones`(`idInscripciones`, `Fecha_Inscripción`, `Hora_Inscripción`, `idUsuario`, `idEstudiante`) VALUES (
				NULL,
				'$Fecha_Inscripción',
				'$Hora_Inscripción',
				'$idUsuario',
				'$idEstudiante'
			)";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectarBD($conexion);
	}

	public function editarRegistro($idUsuario,$idEstudiante) {
		$conexion = conectarBD();

		$Fecha_Inscripción = date('Y-m-d');
		$Hora_Inscripción = date('h:i:sa');
		
		$sql = "UPDATE `Inscripciones` SET
				`Fecha_Inscripción`='$Fecha_Inscripción',
				`Hora_Inscripción`='$Hora_Inscripción',
			WHERE `idUsuario`='$idUsuario' AND `idEstudiante`='$idEstudiante'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectarBD($conexion);
	}

	public function setidInscripciones($idInscripciones) {
		$this->idInscripciones = $idInscripciones;
	}
	public function setFecha_Inscripción($Fecha_Inscripción) {
		$this->Fecha_Inscripción = $Fecha_Inscripción;
	}
	public function setHora_Inscripción($Hora_Inscripción) {
		$this->Hora_Inscripción = $Hora_Inscripción;
	}
	public function setidUsuario($idUsuario) {
		$this->idUsuario = $idUsuario;
	}
	public function setidEstudiante($idEstudiante) {
		$this->idEstudiante = $idEstudiante;
	}

	public function getidInscripciones() {
		return $this->idInscripciones;
	}
	public function getFecha_Inscripción() {
		return $this->Fecha_Inscripción;
	}
	public function getHora_Inscripción() {
		return $this->Hora_Inscripción;
	}
	public function getidUsuario() {
		return $this->idUsuario;
	}
	public function getidEstudiante() {
		return $this->idEstudiante;
	}




}


?>