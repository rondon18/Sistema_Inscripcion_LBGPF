	<?php

require("personas.php");

class Estudiantes extends Personas {

	private $idEstudiantes;
	private $Plantel_Procedencia;
	private $Con_Quien_Vive;
	private $Cedula_Estudiante;
	private $idRepresentante;
	private $Relación_Representante;
	private $idPadre;
	private $Relación_Padre;

	public function __construct() {}

	public function insertarEstudiante() {
		$conexion = conectarBD();

		$Plantel_Procedencia = $this->getPlantel_Procedencia();
		$Con_Quien_Vive = $this->getCon_Quien_Vive();
		$Cedula_Estudiante = $this->getCedula_Estudiante();
		$idRepresentante = $this->getidRepresentante();
		$idPadre = $this->getidPadre();

		$sql = "SELECT * FROM `estudiantes` WHERE `Cedula_Persona` = '$Cedula_Estudiante'";

		$registro_existe = $conexion->query($sql);
		$resultado = $registro_existe->fetch_assoc();

		#Consulta si el registro ya existe para prevenir registros duplicados o excesivos
		if ($resultado == NULL) {
			$sql = "INSERT INTO `estudiantes`(`idEstudiantes`, `Plantel_Procedencia`, `Con_Quien_Vive`, `Cedula_Persona`, `idRepresentante`, `Relación_Representante`,`idPadre`,`Relación_Padre`) VALUES (
				NULL,
				'$Plantel_Procedencia',
				'$Con_Quien_Vive',
				'$Cedula_Estudiante',
				'$idRepresentante',
				'$Relación_Representante',
				'$idPadre',
				'$Relación_Padre'
			)";
			$conexion->query($sql) or die("error: ".$conexion->error);
			$this->setidEstudiantes($conexion->insert_id);
		}
		elseif ($resultado != NULL) {
			$this->setidEstudiantes($resultado['idEstudiantes']);
		}
		desconectarBD($conexion);
	}

	public function editarEstudiante($cedula_Estudiante) {
		$conexion = conectarBD();

		$Plantel_Procedencia = $this->getPlantel_Procedencia();

		$sql = "UPDATE `estudiantes` SET
				`Plantel_Procedencia`='$Plantel_Procedencia',
			WHERE `idRepresentante`='$idRepresentante' AND `idPadre`='$idPadre'";

		#	UPDATE `estudiantes` SET `Plantel_Procedencia`='[value-2]',`Con_Quien_Vive`='[value-3]',`Cedula_Persona`='[value-4]',`idRepresentante`='[value-5]',`idPadre`='[value-6]' WHERE 1

		$conexion->query($sql) or die("error: ".$conexion->error);

		desconectarBD($conexion);
	}

	public function eliminarEstudiante($cedula_Estudiante) {
		$conexion = conectarBD();

		$sql = "DELETE FROM `personas` WHERE `Cédula` = '$cedula_Estudiante'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectarBD($conexion);
	}

	public function consultarEstudiante($cedula_Estudiante) {

		$conexion = conectarBD();

		#Consulta los datos de las tablas personas y estudiantes del estudiante solicitado
		$sql = "SELECT * FROM `personas`,`estudiantes` WHERE `personas`.`Cédula` = '$cedula_Estudiante' AND `estudiantes`.`Cedula_Persona` = '$cedula_Estudiante'";

		$consulta_estudiantes = $conexion->query($sql) or die("error: ".$conexion->error);
		$estudiantes = $consulta_estudiantes->fetch_assoc();

		desconectarBD($conexion);

		return $estudiantes;
	}

	public function mostrarEstudiantes() {
		#Muestra todos las estudiantes en la tabla
		$conexion = conectarBD();

		#consulta solo las personas que tengan presencia en la tabla estudiantes
		$sql = "SELECT * FROM `personas`,`estudiantes`,`datos-tallas`,`datos-salud`,`grado` WHERE `personas`.`Cédula` = `estudiantes`.`Cedula_Persona` AND `estudiantes`.`idEstudiantes` = `datos-tallas`.`idEstudiantes` AND `estudiantes`.`idEstudiantes` = `datos-salud`.`idEstudiantes` AND `estudiantes`.`idEstudiantes` = `grado`.`idEstudiantes`;
		";

		$consulta_estudiantes = $conexion->query($sql) or die("error: ".$conexion->error);
		$estudiantes = $consulta_estudiantes->fetch_all(MYSQLI_ASSOC);

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
	public function setCedula_Estudiante($Cedula_Estudiante) {
		$this->Cedula_Estudiante = $Cedula_Estudiante;
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
	public function getCedula_Estudiante() {
		return $this->Cedula_Estudiante;
	}
}

?>
