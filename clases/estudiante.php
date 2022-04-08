<?php 

require("personas.php");

class Estudiantes extends Personas {

	private $idEstudiantes;
	private $Plantel_Procedencia;
	private $idRepresentante;	

	public function __construct() {}

	public function insertarEstudiante($idRepresentante,$idPadre) {
		$conexion = conectarBD();
		
		$Plantel_Procedencia = $this->getPlantel_Procedencia();
		$Cedula_Estudiante = $this->getCedula();
		
		$sql = "INSERT INTO `estudiantes`(`idEstudiantes`, `Plantel_Procedencia`, `Cedula_Persona`, `idRepresentante`, `idPadre`) VALUES (
			NULL,
			'$Plantel_Procedencia',
			'$Cedula_Estudiante',
			'$idRepresentante',
			'$idPadre'
		)";
		
		$conexion->query($sql) or die("error: ".$conexion->error);
		$this->setidEstudiantes($conexion->insert_id);
		desconectarBD($conexion);
	}

	public function editarEstudiante($idRepresentante,$idPadre) {
		$conexion = conectarBD();
		
		$Plantel_Procedencia = $this->getPlantel_Procedencia();

		$sql = "UPDATE `estudiantes` SET 
				`Plantel_Procedencia`='$Plantel_Procedencia',
			WHERE `idRepresentante`='$idRepresentante' AND `idPadre`='$idPadre'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		
		desconectarBD($conexion);
	}

	public function eliminarEstudiante($cedula_Estudiante) {
		$conexion = conectarBD();
		
		$sql = "DELETE FROM `personas` WHERE `Cédula` = '$cedula_Estudiante'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectarBD($conexion);
	}

	public function consultarEstudiante($id_Estudiante) {

		$conexion = conectarBD();
		
		#Consulta los datos de las tablas personas y estudiantes del estudiante solicitado
		$sql = "SELECT * FROM `personas`,`estudiantes` WHERE `estudiantes`.`idEstudiantes` = '$id_Estudiante' AND `personas`.`Cédula` = `estudiantes`.`Cedula_Persona`";

		$consulta_estudiantes = $conexion->query($sql) or die("error: ".$conexion->error);			
		$estudiantes = $consulta_estudiantes->fetch_assoc();

		desconectarBD($conexion);

		return $estudiantes;
	}

	public function mostrarEstudiantes() {
		#Muestra todos las estudiantes en la tabla
		$conexion = conectarBD();

		#consulta solo las personas que tengan presencia en la tabla estudiantes
		$sql = "SELECT * FROM `personas`,`estudiantes` WHERE `personas`.`Cédula` = `estudiantes`.`Cedula_Persona`";

		$consulta_estudiantes = $conexion->query($sql) or die("error: ".$conexion->error);			
		$estudiantes = $consulta_estudiantes->fetch_all();


		#Hace un arreglo de arreglos para contener los campos de la estudiante
		$Lista_Estudiantes = [];
		foreach ($estudiantes as $estudiante) {
			$Lista_Estudiantes[]= $estudiante;
		}

		desconectarBD($conexion);

		return $Lista_Estudiantes;
	}

	public function setidEstudiantes($idEstudiantes) {
		$this->idEstudiantes = $idEstudiantes;
	}
	public function setPlantel_Procedencia($Plantel_Procedencia) {
		$this->Plantel_Procedencia = $Plantel_Procedencia;
	}
	public function setidRepresentante($idRepresentante) {
		$this->idRepresentante = $idRepresentante;
	}

	public function getidEstudiantes() {
		return $this->idEstudiantes;
	}
	public function getPlantel_Procedencia() {
		return $this->Plantel_Procedencia;
	}
	public function getidRepresentante() {
		return $this->idRepresentante;
	}


}

?>