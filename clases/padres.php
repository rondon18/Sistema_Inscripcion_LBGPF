<?php

class Padres extends Personas {
	private $idPadres;
	private $Cedula_Persona;
	private $Parentezco;

	public function __construct() {}

	public function insertarPadres() {
		$conexion = conectarBD();

		$Parentezco = $this->getParentezco();
		$Cedula_Persona = $this->getCedula_Persona();

		#verifica si el registro del padre existe para evitar error por entrada duplicada
		$sql = "SELECT * FROM `padres` WHERE `Cedula_Persona`='$Cedula_Persona'";

		$registro_existe = $conexion->query($sql);
		$resultado = $registro_existe->fetch_assoc();

		if ($resultado == NULL) {
			#Si el registro no existe se crea con esta orden
			$sql = "INSERT INTO `padres`(`idPadres`, `Parentezco`, `Cedula_Persona`) VALUES (
				NULL,
				'$Parentezco',
				'$Cedula_Persona'
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

		$Parentezco = $this->getParentezco();

		#para los padres solo se puede ajustar el parentezco con el estudiante, sea padre o madre
		$sql = "UPDATE `padres` SET
		`Parentezco`='$Parentezco'
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
		#consulta los datos de personas y de padres donde las cedulas en ambos registros coincidan
		$conexion = conectarBD();

		$sql = "SELECT * FROM `personas`,`padres` WHERE `padres`.`idPadres`='$id_padres' AND `personas`.`Cédula` = `padres`.`Cedula_Persona`";

		$padre = $conexion->query($sql);
		$resultado = $padre->fetch_assoc();

		desconectarBD($conexion);
		return $resultado;
	}
	public function mostrarPadres(){
		#Retorna todos los registros de padres
		$conexion = conectarBD();

		$sql = "SELECT * FROM `personas`,`padres` WHERE `personas`.`Cédula` = `padres`.`Cedula_Persona`";

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
	public function setParentezco($Parentezco) {
		$this->Parentezco = $Parentezco;
	}
	public function setCedula_Persona($Cedula_Persona) {
		$this->Cedula_Persona = $Cedula_Persona;
	}

	public function getidPadres() {
		return $this->idPadres;
	}
	public function getParentezco() {
		return $this->Parentezco;
	}
	public function getCedula_Persona() {
		return $this->Cedula_Persona;
	}
}

?>
