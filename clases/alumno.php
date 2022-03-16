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
		$Cedula_Persona = $this->getCedula();
		
		$sql = "INSERT INTO `alumnos`(`idAlumnos`, `Plantel_Procedencia`, `Cedula_Persona`, `idRepresentante`, `idPadre`) VALUES (
			NULL,
			'$Plantel_Procedencia',
			'$Cedula_Persona',
			'$idRepresentante',
			'$idPadre'
		)";
		
		$conexion->query($sql) or die("error: ".$conexion->error);
		$this->setidAlumnos($conexion->insert_id);
		desconectarBD($conexion);
	}
	
	public function retornarTodo() {
		$valores = [
			'Id' => $this->getId(),
			'Nombres' => $this->getNombres(),
			'Apellidos' => $this->getApellidos(),
			'Cedula' => $this->getCedula(),
			'Correo' => $this->getCorreo(),
			'Genero' => $this->getGenero(),
			'Fecha_Nacimiento' => $this->getFecha_Nacimiento(),
			'Lugar_Nacimiento' => $this->getLugar_Nacimiento(),
			'Direccion' => $this->getDireccion(),
			'Teléfono_Principal' => $this->getTeléfono_Principal(),
			'Teléfono_Auxiliar' => $this->getTeléfono_Auxiliar(),
			'Estado_Civil' => $this->getEstado_Civil(),
		];
		return $valores;
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