<?php 

require("personas.php");

class Alumnos extends Personas {

	private $idAlumnos;
	private $Plantel_Procedencia;
	private $idRepresentante;	

	public function __construct() {}

	public function insertarAlumno($idRepresentante,$idPadre) {
		$conexion = conectarBD();
		
		$Plantel_Procedencia = $this->getPlantel_Procedencia();
		$Cedula_Alumno = $this->getCedula();
		
		$sql = "INSERT INTO `alumnos`(`idAlumnos`, `Plantel_Procedencia`, `Cedula_Persona`, `idRepresentante`, `idPadre`) VALUES (
			NULL,
			'$Plantel_Procedencia',
			'$Cedula_Alumno',
			'$idRepresentante',
			'$idPadre'
		)";
		
		$conexion->query($sql) or die("error: ".$conexion->error);
		$this->setidAlumnos($conexion->insert_id);
		desconectarBD($conexion);
	}

	public function eliminarAlumno($id_Alumno) {
		$conexion = conectarBD();
		
		$sql = "DELETE FROM `alumnos` WHERE `idAlumnos` = '$id_Alumno'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectarBD($conexion);
	}

	public function consultarAlumno($id_Alumno) {

		$conexion = conectarBD();
		
		#Consulta los datos de las tablas personas y alumnos del alumno solicitado
		$sql = "SELECT * FROM `personas`,`alumnos` WHERE `alumnos`.`idAlumnos` = '$id_Alumno' AND `personas`.`Cédula` = `alumnos`.`Cedula_Persona`";

		$consulta_alumnos = $conexion->query($sql) or die("error: ".$conexion->error);			
		$alumnos = $consulta_alumnos->fetch_assoc();

		desconectarBD($conexion);

		return $alumnos;
	}

	public function mostrarAlumnos() {
		#Muestra todos las alumnos en la tabla
		$conexion = conectarBD();

		#consulta solo las personas que tengan presencia en la tabla alumnos
		$sql = "SELECT * FROM `personas`,`alumnos` WHERE `personas`.`Cédula` = `alumnos`.`Cedula_Persona`";

		$consulta_alumnos = $conexion->query($sql) or die("error: ".$conexion->error);			
		$alumnos = $consulta_alumnos->fetch_all();


		#Hace un arreglo de arreglos para contener los campos de la alumno
		$Lista_Alumnos = [];
		foreach ($alumnos as $alumno) {
			$Lista_Alumnos[]= $alumno;
		}

		desconectarBD($conexion);

		return $Lista_Alumnos;
	}

	public function setidAlumnos($idAlumnos) {
		$this->idAlumnos = $idAlumnos;
	}
	public function setPlantel_Procedencia($Plantel_Procedencia) {
		$this->Plantel_Procedencia = $Plantel_Procedencia;
	}
	public function setidRepresentante($idRepresentante) {
		$this->idRepresentante = $idRepresentante;
	}

	public function getidAlumnos() {
		return $this->idAlumnos;
	}
	public function getPlantel_Procedencia() {
		return $this->Plantel_Procedencia;
	}
	public function getidRepresentante() {
		return $this->idRepresentante;
	}


}

?>