<?php

class Madre {
	private $idMadre;
	private $Cédula_Persona;
	private $País_Residencia;

	public function __construct() {}

	public function insertarMadre() {
		$conexion = conectarBD();

		$País_Residencia = $this->getPaís_Residencia();
		$Cédula_Persona = $this->getCédula_Persona();

		#verifica si el registro del Madre existe para evitar error por entrada duplicada
		$sql = "SELECT * FROM `Madre` WHERE `Cédula_Persona`='$Cédula_Persona'";

		$registro_existe = $conexion->query($sql);
		$resultado = $registro_existe->fetch_assoc();

		if ($resultado == NULL) {
			#Si el registro no existe se crea con esta orden
			$sql = "INSERT INTO `Madre`(`idMadre`, `País_Residencia`, `Cédula_Persona`) VALUES (
				NULL,
				'$País_Residencia',
				'$Cédula_Persona'
			)";

			$conexion->query($sql);
			$this->setidMadre($conexion->insert_id);
		}
		elseif ($resultado != NULL) {
			$this->setidMadre($resultado['idMadre']);
		}

		desconectarBD($conexion);
	}

	public function editarMadre($id_Madre){
		$conexion = conectarBD();

		$País_Residencia = $this->getPaís_Residencia();

		#para los Madre solo se puede ajustar el País_Residencia con el estudiante, sea Madre o madre
		$sql = "UPDATE `Madre` SET
		`País_Residencia`='$País_Residencia'
		WHERE `idMadre`='$id_Madre'";

		$conexion->query($sql);
		desconectarBD($conexion);
	}
	public function eliminarMadre($id_Madre){
		#Elimina el Madre en especifico segun su id.
		$conexion = conectarBD();

		$sql = "DELETE FROM `Madre` WHERE `idMadre`='$id_Madre'";

		$conexion->query($sql);
		desconectarBD($conexion);
	}
	public function consultarMadre($id_Madre){
		#consulta los datos de personas y de Madre donde las Cédulas en ambos registros coincidan
		$conexion = conectarBD();

		$sql = "SELECT * FROM `personas`,`Madre` WHERE `Madre`.`idMadre`='$id_Madre' AND `personas`.`Cédula` = `Madre`.`Cédula_Persona`";

		$Madre = $conexion->query($sql);
		$resultado = $Madre->fetch_assoc();

		desconectarBD($conexion);
		return $resultado;
	}
	public function consultarMadreC($Cedula){
		#consulta los datos de personas y de Madre donde las Cédulas en ambos registros coincidan
		$conexion = conectarBD();

		$sql = "SELECT * FROM `personas`,`Madre` WHERE `personas`.`Cédula` = '$Cedula' AND `Madre`.`Cédula_Persona` = '$Cedula'";

		$Madre = $conexion->query($sql);
		$resultado = $Madre->fetch_assoc();

		desconectarBD($conexion);
		return $resultado;
	}
	public function consultarHijos($id_Madre){

		$conexion = conectarBD();

		$sql = "SELECT `idMadre` FROM `estudiantes` WHERE `idMadre`='$id_Madre'";


		$Madre = $conexion->query($sql);
		$resultado = $Madre->fetch_all();

		desconectarBD($conexion);
		return sizeof($resultado);
	}
	public function mostrarMadre(){
		#Retorna todos los registros de Madre
		$conexion = conectarBD();

		$sql = "SELECT * FROM `personas`,`Madre` WHERE `personas`.`Cédula` = `Madre`.`Cédula_Persona`";

		$consulta_Madre = $conexion->query($sql) or die("error: ".$conexion->error);
		$Madre = $consulta_Madre->fetch_all();

		#Hace un arreglo de arreglos para contener los campos de la Madre
		$Lista_Madre = [];
		foreach ($Madre as $Madre) {
			$Lista_Madre[]= $Madre;
		}

		desconectarBD($conexion);

		return $Lista_Madre;
	}

	public function setidMadre($idMadre) {
		$this->idMadre = $idMadre;
	}
	public function setPaís_Residencia($País_Residencia) {
		$this->País_Residencia = $País_Residencia;
	}
	public function setCédula_Persona($Cédula_Persona) {
		$this->Cédula_Persona = $Cédula_Persona;
	}

	public function getidMadre() {
		return $this->idMadre;
	}
	public function getPaís_Residencia() {
		return $this->País_Residencia;
	}
	public function getCédula_Persona() {
		return $this->Cédula_Persona;
	}
}

?>
