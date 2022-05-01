<?php

class GradoAcademico {

	private $idGrado;
	private $Grado_A_Cursar;
	private $idEstudiantes;
	private $idAño_Escolar;

	public function __construct(){}

	public function insertarGrado($idEstudiante,$año_Inicio,$año_Fin) {
		$conexion = conectarBD();

		$Grado_A_Cursar = $this->getGrado_A_Cursar();

		$sql = "SELECT * FROM `año-escolar` WHERE `Inicio_Año_Escolar` = '$año_Inicio' AND `Fin_Año_Escolar` = '$año_Fin'";

		$busqueda = $conexion->query($sql);

		$idAño_Escolar = $resultado = $busqueda->fetch_assoc()['idAño-Escolar'];

		if ($idAño_Escolar != NULL) {
			#verifica si el registro del padre existe para evitar error por entrada duplicada
			$sql = "SELECT * FROM `grado` WHERE `idEstudiantes`='$idEstudiante'";

			$registro_existe = $conexion->query($sql);
			$resultado = $registro_existe->fetch_assoc();

			if ($resultado == NULL) {
				$sql = "INSERT INTO `grado`(`idGrado`, `Grado_A_Cursar`, `idEstudiantes`, `idAño-Escolar`) VALUES (
					NULL,
					'$Grado_A_Cursar',
					'$idEstudiante',
					'$idAño_Escolar'
				)";

				$conexion->query($sql) or die("error: ".$conexion->error);
				$this->setidGrado($conexion->insert_id);
			}
			elseif ($resultado != NULL) {
				$this->setidGrado($resultado['idGrado']);
			}
		}

		desconectarBD($conexion);
	}

	public function editarGrado($id_Estudiante) {
		$conexion = conectarBD();

		$Grado_A_Cursar = $this->getGrado_A_Cursar();

		$sql = "UPDATE `grado` SET
					`Grado_A_Cursar`='$Grado_A_Cursar',
				WHERE `idEstudiantes`='$id_Estudiante'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectarBD($conexion);
	}

	public function consultarGrado($id_Estudiante) {
		$conexion = conectarBD();

		$sql = "SELECT * FROM `grado` WHERE `idEstudiantes` = '$id_Estudiante'";

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
	public function setidEstudiantes($idEstudiantes) {
		$this->idEstudiantes = $idEstudiantes;
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
	public function getidEstudiantes() {
		return $this->idEstudiantes;
	}
	public function getidAño_Escolar() {
		return $this->idAño_Escolar;
	}
}
?>
