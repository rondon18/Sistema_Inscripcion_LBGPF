<?php 

require("personas.php");

class Estudiantes extends Personas {

	private $idEstudiantes;
	private $Plantel_Procedencia;
	private $Con_Quien_Vive;
	private $idRepresentante;
	private $idPadre;

	public function __construct() {}

	public function insertarEstudiante() {
		$conexion = conectarBD();

		$Plantel_Procedencia = $this->getPlantel_Procedencia();
		$Con_Quien_Vive = $this->getCon_Quien_Vive();
		$Cedula_Estudiante = $this->getCédula();
		$idRepresentante = $this->getidRepresentante();
		$idPadre = $this->getidPadre(); 

		$sql = "SELECT * FROM `estudiantes` WHERE `Cédula` = '$Cédula'";

			$registro_existe = $conexion->query($sql);
			$resultado = $registro_existe->fetch_assoc();

		#Consulta si el registro ya existe para prevenir registros duplicados o excesivos
		if ($resultado == NULL) {
			$sql = "INSERT INTO `estudiantes`(`idEstudiantes`, `Plantel_Procedencia`, `Con_Quien_Vive`, `Cedula_Persona`, `idRepresentante`, `idPadre`) VALUES (
				NULL,
				'$Plantel_Procedencia',
				'$Con_Quien_Vive',
				'$Cedula_Estudiante',
				'$idRepresentante',
				'$idPadre'
			)";
			$conexion->query($sql) or die("error: ".$conexion->error);
			$this->setidEstudiantes($conexion->insert_id);
		}
		elseif ($resultado != NULL) {
			$this->setidEstudiantes($resultado['idEstudiantes']);
		}		
		desconectarBD($conexion);
	}

	public function editarEstudiante() {
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
	public function setCon_Quien_Vive($Con_Quien_Vive) {
		$this->Con_Quien_Vive = $Con_Quien_Vive;
	}
	public function setidRepresentante($idRepresentante) {
		$this->idRepresentante = $idRepresentante;
	}
	public function setidPadre($idPadre) {
		$this->idPadre = $idPadre;
	}

	public function getidEstudiantes() {
		return $this->idEstudiantes;
	}
	public function getPlantel_Procedencia() {
		return $this->Plantel_Procedencia;
	}
	public function getCon_Quien_Vive() {
		return $this->Con_Quien_Vive;
	}
	public function getidRepresentante() {
		return $this->idRepresentante;
	}
	public function getidPadre() {
		return $this->idPadre;
	}
}

?>