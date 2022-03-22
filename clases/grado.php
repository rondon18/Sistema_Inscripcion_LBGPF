<?php  

class GradoAcademico {
	
	private $idGrado;
	private $Grado_A_Cursar;
	private $idAlumnos;
	private $idAño_Escolar;

	public function __construct(){}

	public function insertarGrado($idAlumno,$año_escolar) {
		$conexion = conectarBD();
		
		$Grado_A_Cursar = $this->getGrado_A_Cursar();

		echo $año_escolar;

		$busqueda = $conexion->query("SELECT * FROM `año-escolar` WHERE `Año_Escolar` = '$año_escolar'");

		$resultado = $busqueda->fetch_array();
		var_dump($resultado[0]);

		$sql = "INSERT INTO `grado`(`idGrado`, `Grado_A_Cursar`, `idAlumnos`, `idAño-Escolar`) VALUES (
			NULL,
			'$Grado_A_Cursar',
			'$idAlumno',
			'$resultado[0]'
		)";
		
		$conexion->query($sql) or die("error: ".$conexion->error);
		$this->setidGrado($conexion->insert_id);

		desconectarBD($conexion);
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