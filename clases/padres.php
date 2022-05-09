<?php

class Padres {
	private $idPadres;
	private $Cédula_Persona;
	private $País_Residencia;

	public function __construct() {}

	public function insertarPadres() {
		$conexion = conectarBD();

		$País_Residencia = $this->getPaís_Residencia();
		$Cédula_Persona = $this->getCédula_Persona();

		#verifica si el registro del padre existe para evitar error por entrada duplicada
		$sql = "SELECT * FROM `padres` WHERE `Cédula_Persona`='$Cédula_Persona'";

		$registro_existe = $conexion->query($sql);
		$resultado = $registro_existe->fetch_assoc();

		if ($resultado == NULL) {
			#Si el registro no existe se crea con esta orden
			$sql = "INSERT INTO `padres`(`idPadres`, `País_Residencia`, `Cédula_Persona`) VALUES (
				NULL,
				'$País_Residencia',
				'$Cédula_Persona'
			)";

			$conexion->query($sql);
			$this->setidPadres($conexion->insert_id);
		}
		elseif ($resultado != NULL) {
			$this->setidPadres($resultado['idPadres']);
		}

		desconectarBD($conexion);
	}

	public function editarPadres($id_padres){
		$conexion = conectarBD();

		$País_Residencia = $this->getPaís_Residencia();

		#para los padres solo se puede ajustar el País_Residencia con el estudiante, sea padre o madre
		$sql = "UPDATE `padres` SET
		`País_Residencia`='$País_Residencia'
		WHERE `idPadres`='$id_padres'";

		$conexion->query($sql);
		desconectarBD($conexion);
	}
	public function eliminarPadres($id_padres){
		#Elimina el padre en especifico segun su id.
		$conexion = conectarBD();

		$sql = "DELETE FROM `padres` WHERE `idPadres`='$id_padres'";

		$conexion->query($sql);
		desconectarBD($conexion);
	}
	public function consultarPadres($id_padres){
		#consulta los datos de personas y de padres donde las Cédulas en ambos registros coincidan
		$conexion = conectarBD();

		$sql = "SELECT * FROM `personas`,`padres` WHERE `padres`.`idPadres`='$id_padres' AND `personas`.`Cédula` = `padres`.`Cédula_Persona`";

		$padre = $conexion->query($sql);
		$resultado = $padre->fetch_assoc();

		desconectarBD($conexion);
		return $resultado;
	}
	public function consultarHijos($id_padres){

		$conexion = conectarBD();

		$sql = "SELECT `idPadre` FROM `estudiantes` WHERE `idPadre`='$id_padres'";


		$padre = $conexion->query($sql);
		$resultado = $padre->fetch_all();

		desconectarBD($conexion);
		return sizeof($resultado);
	}
	public function mostrarPadres(){
		#Retorna todos los registros de padres
		$conexion = conectarBD();

		$sql = "SELECT * FROM `personas`,`padres` WHERE `personas`.`Cédula` = `padres`.`Cédula_Persona`";

		$consulta_padres = $conexion->query($sql) or die("error: ".$conexion->error);
		$padres = $consulta_padres->fetch_all();

		#Hace un arreglo de arreglos para contener los campos de la padres
		$Lista_Padres = [];
		foreach ($padres as $padres) {
			$Lista_Padres[]= $padres;
		}

		desconectarBD($conexion);

		return $Lista_Padres;
	}

	public function setidPadres($idPadres) {
		$this->idPadres = $idPadres;
	}
	public function setPaís_Residencia($País_Residencia) {
		$this->País_Residencia = $País_Residencia;
	}
	public function setCédula_Persona($Cédula_Persona) {
		$this->Cédula_Persona = $Cédula_Persona;
	}

	public function getidPadres() {
		return $this->idPadres;
	}
	public function getPaís_Residencia() {
		return $this->País_Residencia;
	}
	public function getCédula_Persona() {
		return $this->Cédula_Persona;
	}
}

?>
