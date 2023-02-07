	<?php
// class Estudiantes {

// 	private $idEstudiantes;
// 	private $Plantel_Procedencia;
// 	private $Con_Quién_Vive;
// 	private $Cédula_Estudiante;
// 	private $idRepresentante;
// 	private $Relación_Representante;
// 	private $idPadre;
// 	private $idMadre;

// 	public function __construct() {}

// 	public function insertarEstudiante() {
// 		$conexion = conectarBD();

// 		$Plantel_Procedencia = $this->getPlantel_Procedencia();
// 		$Con_Quién_Vive = $this->getCon_Quién_Vive();
// 		$Cédula_Estudiante = $this->getCédula_Estudiante();
// 		$idRepresentante = $this->getidRepresentante();
// 		$Relación_Representante = $this->getRelación_Representante();
// 		$idPadre = $this->getidPadre();
// 		$idMadre = $this->getidMadre();

// 		$sql = "SELECT * FROM `estudiantes` WHERE `Cédula_Persona` = '$Cédula_Estudiante'";

// 		$registro_existe = $conexion->query($sql);
// 		$resultado = $registro_existe->fetch_assoc();

// 		#Consulta si el registro ya existe para prevenir registros duplicados o excesivos
// 		if ($resultado == NULL) {
// 			$sql = "INSERT INTO `estudiantes`(`idEstudiantes`, `Plantel_Procedencia`, `Con_Quién_Vive`, `Cédula_Persona`, `idRepresentante`, `Relación_Representante`,`idPadre`,`idMadre`) VALUES (
// 				NULL,
// 				'$Plantel_Procedencia',
// 				'$Con_Quién_Vive',
// 				'$Cédula_Estudiante',
// 				'$idRepresentante',
// 				'$Relación_Representante',
// 				'$idPadre',
// 				'$idMadre'
// 			)";
// 			$conexion->query($sql) or die("error: ".$conexion->error);
// 			$this->setidEstudiantes($conexion->insert_id);
// 		}
// 		elseif ($resultado != NULL) {
// 			$this->setidEstudiantes($resultado['idEstudiantes']);
// 		}
// 		desconectarBD($conexion);
// 	}

// 	public function editarEstudiante($Cédula_Estudiante) {
// 		$conexion = conectarBD();

// 		$Plantel_Procedencia = $this->getPlantel_Procedencia();
// 		$Con_Quién_Vive = $this->getCon_Quién_Vive();
// 		$idRepresentante = $this->getidRepresentante();
// 		$Relación_Representante = $this->getRelación_Representante();
// 		$idPadre = $this->getidPadre();
// 		$idMadre = $this->getidMadre();
		
// 		$sql = "UPDATE `estudiantes` SET
// 		 `Plantel_Procedencia`='$Plantel_Procedencia',
// 		 `Con_Quién_Vive`='$Con_Quién_Vive',
// 		 `idRepresentante`='$idRepresentante',
// 		 `Relación_Representante`='$Relación_Representante',
// 		 `idPadre`='$idPadre',
// 		 `idMadre`='$idMadre'
// 		 WHERE `Cédula_Persona`='$Cédula_Estudiante'";


// 		$conexion->query($sql) or die("error: ".$conexion->error);

// 		desconectarBD($conexion);
// 	}

// 	public function eliminarEstudiante($Cédula_Estudiante) {
// 		$conexion = conectarBD();

// 		$sql = "DELETE FROM `personas` WHERE `Cédula` = '$Cédula_Estudiante'";
// 		echo $sql;
// 		$conexion->query($sql) or die("error: ".$conexion->error);
// 		desconectarBD($conexion);
// 	}

// 	public function consultarEstudiante($Cédula_Estudiante) {

// 		$conexion = conectarBD();

// 		#Consulta los datos de las tablas personas y estudiantes del estudiante solicitado
// 		$sql = "SELECT * FROM `personas`,`estudiantes` WHERE `personas`.`Cédula` = '$Cédula_Estudiante' AND `estudiantes`.`Cédula_Persona` = '$Cédula_Estudiante'";

// 		$consulta_estudiantes = $conexion->query($sql) or die("error: ".$conexion->error);
// 		$estudiantes = $consulta_estudiantes->fetch_assoc();

// 		desconectarBD($conexion);

// 		return $estudiantes;
// 	}

// 	public function mostrarEstudiantes() {
// 		#Muestra todos las estudiantes en la tabla
// 		$conexion = conectarBD();

// 		#consulta solo las personas que tengan presencia en la tabla estudiantes
// 		$sql = "SELECT * FROM `personas`,`estudiantes`,`datos-tallas`,`datos-salud`,`grado` WHERE `personas`.`Cédula` = `estudiantes`.`Cédula_Persona` AND `estudiantes`.`idEstudiantes` = `datos-tallas`.`idEstudiantes` AND `estudiantes`.`idEstudiantes` = `datos-salud`.`idEstudiantes` AND `estudiantes`.`idEstudiantes` = `grado`.`idEstudiantes`;
// 		";

// 		$consulta_estudiantes = $conexion->query($sql) or die("error: ".$conexion->error);
// 		$estudiantes = $consulta_estudiantes->fetch_all(MYSQLI_ASSOC);

// 		#Hace un arreglo de arreglos para contener los campos de la estudiante
// 		$Lista_Estudiantes = [];
// 		foreach ($estudiantes as $estudiante) {
// 			$Lista_Estudiantes[]= $estudiante;
// 		}

// 		desconectarBD($conexion);

// 		return $Lista_Estudiantes;
// 	}

// 	public function setidEstudiantes($idEstudiantes) {
// 		$this->idEstudiantes = $idEstudiantes;
// 	}
// 	public function setPlantel_Procedencia($Plantel_Procedencia) {
// 		$this->Plantel_Procedencia = $Plantel_Procedencia;
// 	}
// 	public function setCon_Quién_Vive($Con_Quién_Vive) {
// 		$this->Con_Quién_Vive = $Con_Quién_Vive;
// 	}
// 	public function setCédula_Estudiante($Cédula_Estudiante) {
// 		$this->Cédula_Estudiante = $Cédula_Estudiante;
// 	}
// 	public function setidRepresentante($idRepresentante) {
// 		$this->idRepresentante = $idRepresentante;
// 	}
// 	public function setidPadre($idPadre) {
// 		$this->idPadre = $idPadre;
// 	}
// 	public function setidMadre($idMadre) {
// 		$this->idMadre = $idMadre;
// 	}
// 	public function setRelación_Representante($Relación_Representante) {
// 		$this->Relación_Representante = $Relación_Representante;
// 	}

// 	public function getidEstudiantes() {
// 		return $this->idEstudiantes;
// 	}
// 	public function getPlantel_Procedencia() {
// 		return $this->Plantel_Procedencia;
// 	}
// 	public function getCon_Quién_Vive() {
// 		return $this->Con_Quién_Vive;
// 	}
// 	public function getidRepresentante() {
// 		return $this->idRepresentante;
// 	}
// 	public function getidPadre() {
// 		return $this->idPadre;
// 	}
// 	public function getidMadre() {
// 		return $this->idMadre;
// 	}
// 	public function getCédula_Estudiante() {
// 		return $this->Cédula_Estudiante;
// 	}
// 	public function getRelación_Representante() {
// 		return $this->Relación_Representante;
// 	}

// }

?>
