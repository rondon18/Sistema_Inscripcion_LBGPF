<?php 

class TallasAlumno {
	

	private $idDatos_Tallas;
	private $Talla_Camisa;
	private $Talla_Pantalón;
	private $Talla_Zapatos;
	private $idAlumnos;

	function __construct(){}

	public function insertarTallasAlumno($id_Alumno) {
		$conexion = conectarBD();

		$Talla_Camisa = $this->getTalla_Camisa();
		$Talla_Pantalón = $this->getTalla_Pantalón();
		$Talla_Zapatos = $this->getTalla_Zapatos();

		$sql = "INSERT INTO `datos-tallas`(`idDatos-Tallas`, `Talla_Camisa`, `Talla_Pantalón`, `Talla_Zapatos`, `idAlumnos`) VALUES (
			NULL,
			'$Talla_Camisa',
			'$Talla_Pantalón',
			'$Talla_Zapatos',
			'$id_Alumno'
		)";


		$conexion->query($sql) or die("error: ".$conexion->error);
		$this->setidDatos_Tallas($conexion->insert_id);

		desconectarBD($conexion);
	}

	public function editarTallasAlumno($id_Alumno) {
		$conexion = conectarBD();

		$Talla_Camisa = $this->getTalla_Camisa();
		$Talla_Pantalón = $this->getTalla_Pantalón();
		$Talla_Zapatos = $this->getTalla_Zapatos();
		
		$sql = "UPDATE `datos-tallas` SET 
				`Talla_Camisa`='$Talla_Camisa',
				`Talla_Pantalón`='$Talla_Pantalón',
				`Talla_Zapatos`='$Talla_Zapatos'
			WHERE `idAlumnos`='$id_Alumno'";

		$conexion->query($sql) or die("error: ".$conexion->error);

		desconectarBD($conexion);
	}

	public function consultarTallasAlumno($id_Alumno) {
		$conexion = conectarBD();
		
		#Consulta los datos de las tallas del alumno solicitado
		$sql = "SELECT * FROM `datos-tallas` WHERE `idAlumnos` = '$id_Alumno'";

		$consulta_tallas = $conexion->query($sql) or die("error: ".$conexion->error);			
		$tallas = $consulta_tallas->fetch_assoc();

		desconectarBD($conexion);

		return $tallas;
	}

	#No hay eliminar porque este registro se va en cascada si se elimina el alumno

	public function setidDatos_Tallas($idDatos_Tallas) {
		$this->idDatos_Tallas = $idDatos_Tallas;
	}
	public function setTalla_Camisa($Talla_Camisa) {
		$this->Talla_Camisa = $Talla_Camisa;
	}
	public function setTalla_Pantalón($Talla_Pantalón) {
		$this->Talla_Pantalón = $Talla_Pantalón;
	}
	public function setTalla_Zapatos($Talla_Zapatos) {
		$this->Talla_Zapatos = $Talla_Zapatos;
	}
	public function setidAlumnos($idAlumnos) {
		$this->idAlumnos = $idAlumnos;
	}

	public function getidDatos_Tallas() {
		return $this->idDatos_Tallas;
	}
	public function getTalla_Camisa() {
		return $this->Talla_Camisa;
	}
	public function getTalla_Pantalón() {
		return $this->Talla_Pantalón;
	}
	public function getTalla_Zapatos() {
		return $this->Talla_Zapatos;
	}
	public function getidAlumnos() {
		return $this->idAlumnos;
	}




}

 ?>