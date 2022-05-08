<?php

class Representantes {

	private $idRepresentantes;
	private $Grado_Académico;
	private $Cédula_Persona;

	public function __construct(){}

	public function insertarRepresentante() {
		$conexion = conectarBD();

		$Grado_Académico = $this->getGrado_Académico();
		$Cédula_Persona = $this->getCédula_Persona();

		$sql = "SELECT * FROM `representantes` WHERE `Cédula_Persona` = '$Cédula_Persona'";

		$registro_existe = $conexion->query($sql);
		$resultado = $registro_existe->fetch_assoc();

		#Consulta si el registro ya existe para prevenir registros duplicados o excesivos
		if ($resultado == NULL) {
			$sql = "INSERT INTO `representantes`(`idRepresentantes`, `Grado_Académico`, `Cédula_Persona`) VALUES (
				NULL,
				'$Grado_Académico',
				'$Cédula_Persona'
			)";

			$conexion->query($sql) or die("error: ".$conexion->error);
			$this->setidRepresentantes($conexion->insert_id);
		}
		elseif ($resultado != NULL) {
			$this->setidRepresentantes($resultado['idRepresentantes']);
		}
		desconectarBD($conexion);
	}
	public function editarRepresentante($Cédula_Persona) {
		$conexion = conectarBD();

		$Grado_Académico = $this->getGrado_Académico();

		$sql = "UPDATE `representantes` SET
			`Grado_Académico`='$Grado_Académico',
		 WHERE `Cédula_Persona`='$Cédula_Persona'";

		$conexion->query($sql) or die("error: ".$conexion->error);

		desconectarBD($conexion);
	}
	public function eliminarRepresentante($Cédula_Persona) {
		$conexion = conectarBD();

		$sql = "DELETE FROM `representantes` WHERE `Cédula_Persona` = '$Cédula_Persona'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectarBD($conexion);
	}
	public function consultarRepresentante($idRepresentantes) {
		$conexion = conectarBD();

		$sql = "SELECT * FROM `personas`,`representantes` WHERE `personas`.`Cédula` = `representantes`.`Cédula_Persona` AND `idRepresentantes` = '$idRepresentantes'";

		$consulta_representantes = $conexion->query($sql) or die("error: ".$conexion->error);
		$representantes = $consulta_representantes->fetch_assoc();

		desconectarBD($conexion);

		return $representantes;
	}
	public function consultarRepresentanteID($id_Representante) {
		$conexion = conectarBD();

		$sql = "SELECT * FROM `representantes`,`personas` WHERE  `representantes`.`idRepresentantes` = '$id_Representante' AND `personas`.`Cédula` = `representantes`.`Cédula_Persona`";

		$consulta_representantes = $conexion->query($sql) or die("error: ".$conexion->error);
		$representantes = $consulta_representantes->fetch_assoc();

		desconectarBD($conexion);

		return $representantes;
	}
	public function mostrarRepresentantes() {
		#Muestra todas las representantes en la tabla
		$conexion = conectarBD();

		$sql = "SELECT * FROM `personas`,`representantes` WHERE `personas`.`Cédula` = `representantes`.`Cédula_Persona`";

		$consulta_representantes = $conexion->query($sql) or die("error: ".$conexion->error);
		$representantes = $consulta_representantes->fetch_all(MYSQLI_ASSOC);

		#Hace un arreglo de arreglos para contener los campos de la representantes
		$Lista_Representantes = [];
		foreach ($representantes as $representantes) {
			$Lista_Representantes[]= $representantes;
		}

		desconectarBD($conexion);

		return $Lista_Representantes;
	}
	public function mostrarRepresentados($id_Representante) {
		#Muestra todos las estudiantes en la tabla
		$conexion = conectarBD();

		#consulta solo las personas que tengan presencia en la tabla estudiantes
		$sql = "SELECT * FROM `personas`,`estudiantes` WHERE `estudiantes`.`Cédula_Persona`= `personas`.`Cédula`AND `estudiantes`.`idRepresentante` = '$id_Representante'";


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

	public function setidRepresentantes($idRepresentantes) {
		$this->idRepresentantes = $idRepresentantes;
	}
	public function setCédula_Persona($Cédula_Persona) {
		$this->Cédula_Persona = $Cédula_Persona;
	}
	public function setGrado_Académico($Grado_Académico) {
		$this->Grado_Académico = $Grado_Académico;
	}

	public function getidRepresentantes() {
		return $this->idRepresentantes;
	}
	public function getCédula_Persona() {
		return $this->Cédula_Persona;
	}
	public function getGrado_Académico() {
		return $this->Grado_Académico;
	}
}

?>
