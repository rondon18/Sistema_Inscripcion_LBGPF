<?php  

class GradoAcademico {
	
	private $idGrado;
	private $Grado_A_Cursar;
	private $idAlumnos;
	private $idAño_Escolar;

	public function __construct(){}

	public function insertarGrado($idAlumno,$año_Inicio,$año_Fin) {
		$conexion = conectarBD();
		
		$Grado_A_Cursar = $this->getGrado_A_Cursar();

		$sql = "SELECT * FROM `año-escolar` WHERE `Inicio_Año_Escolar` = '$año_Inicio' AND `Fin_Año_Escolar` = '$año_Fin'";

		$busqueda = $conexion->query($sql);

		$idAño_Escolar = $resultado = $busqueda->fetch_assoc()['idAño-Escolar'];

		if ($idAño_Escolar != NULL) {
			$sql = "INSERT INTO `grado`(`idGrado`, `Grado_A_Cursar`, `idAlumnos`, `idAño-Escolar`) VALUES (
				NULL,
				'$Grado_A_Cursar',
				'$idAlumno',
				'$idAño_Escolar'
			)";
			
			$conexion->query($sql) or die("error: ".$conexion->error);
			$this->setidGrado($conexion->insert_id);
		}
		else {
			echo "Error";
		}

		desconectarBD($conexion);
	}

	public function editarGrado($id_Alumno) {
		$conexion = conectarBD();

		$Grado_A_Cursar = $this->getGrado_A_Cursar();

		$sql = "UPDATE `grado` SET 
					`Grado_A_Cursar`='$Grado_A_Cursar',
				WHERE `idAlumnos`='$id_Alumno'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectarBD($conexion);
	}

	public function consultarGrado($id_Alumno) {
		$conexion = conectarBD();

		$sql = "SELECT * FROM `grado` WHERE `idAlumnos` = '$id_Alumno'";
		  
		$busqueda = $conexion->query($sql) or die("error: ".$conexion->error);
		$grado = $resultado = $busqueda->fetch_assoc();
		
		desconectarBD($conexion);

		return $grado;
	}

	public function setidGrado($idGrado) {
		$this->idGrado = $idGrado;
	}
	public function setGrado_A_Cursar($Grado_A_Cursar) {
		$this->Grado_A_Cursar = $Grado_A_Cursar;
	}
	public function setidAlumnos($idAlumnos) {
		$this->idAlumnos = $idAlumnos;
	}
	public function setidAño_Escolar($idAño_Escolar) {
		$this->idAño_Escolar = $idAño_Escolar;
	}

	public function getidGrado() {
		return $this->idGrado;
	}
	public function getGrado_A_Cursar() {
		return $this->Grado_A_Cursar;
	}
	public function getidAlumnos() {
		return $this->idAlumnos;
	}
	public function getidAño_Escolar() {
		return $this->idAño_Escolar;
	}
}
?>