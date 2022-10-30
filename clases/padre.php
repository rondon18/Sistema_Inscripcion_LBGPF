<?php

class Padre {
	private $idPadre;
	private $Cédula_Persona;
	private $País_Residencia;
	private $Grado_Académico;

	public function __construct() {}

	public function insertarPadre() {
		$conexion = conectarBD();

		$País_Residencia = $this->getPaís_Residencia();
		$Grado_Académico = $this->getGrado_AcadémicoPa();
		$Cédula_Persona = $this->getCédula_Persona();

		#verifica si el registro del padre existe para evitar error por entrada duplicada
		$sql = "SELECT * FROM `Padre` WHERE `Cédula_Persona`='$Cédula_Persona'";

		$registro_existe = $conexion->query($sql);
		$resultado = $registro_existe->fetch_assoc();

		if ($resultado == NULL) {
			#Si el registro no existe se crea con esta orden
			$sql = "INSERT INTO `Padre`(`idPadre`, `País_Residencia`, `Grado_Académico`, `Cédula_Persona`) VALUES (
				NULL,
				'$País_Residencia',
				'$Grado_Académico',
				'$Cédula_Persona'
			)";

			$conexion->query($sql);
			$this->setidPadre($conexion->insert_id);
		}
		elseif ($resultado != NULL) {
			$this->setidPadre($resultado['idPadre']);
		}

		desconectarBD($conexion);
	}

	public function editarPadre($id_Padre){
		$conexion = conectarBD();

		$País_Residencia = $this->getPaís_Residencia();
		$Grado_Académico = $this->getGrado_AcadémicoPa();

		#para los Padre solo se puede ajustar el País_Residencia con el estudiante, sea padre o madre
		$sql = "UPDATE `Padre` SET
		`País_Residencia`='$País_Residencia',
		`Grado_Académico`='$Grado_Académico'
		WHERE `idPadre`='$id_Padre'";

		$conexion->query($sql);
		desconectarBD($conexion);
	}
	public function eliminarPadre($id_Padre){
		#Elimina el padre en especifico segun su id.
		$conexion = conectarBD();

		$sql = "DELETE FROM `Padre` WHERE `idPadre`='$id_Padre'";

		$conexion->query($sql);
		desconectarBD($conexion);
	}
	public function consultarPadre($id_Padre){
		#consulta los datos de personas y de Padre donde las Cédulas en ambos registros coincidan
		$conexion = conectarBD();

		$sql = "SELECT * FROM `personas`,`Padre` WHERE `Padre`.`idPadre`='$id_Padre' AND `personas`.`Cédula` = `Padre`.`Cédula_Persona`";

		$padre = $conexion->query($sql);
		$resultado = $padre->fetch_assoc();

		desconectarBD($conexion);
		return $resultado;
	}
	public function consultarPadreC($Cedula){
		#consulta los datos de personas y de Padre donde las Cédulas en ambos registros coincidan
		$conexion = conectarBD();

		$sql = "SELECT * FROM `personas`,`Padre` WHERE `personas`.`Cédula` = '$Cedula' AND `Padre`.`Cédula_Persona` = '$Cedula'";

		$padre = $conexion->query($sql);
		$resultado = $padre->fetch_assoc();

		desconectarBD($conexion);
		return $resultado;
	}
	public function consultarHijos($id_Padre){

		$conexion = conectarBD();

		$sql = "SELECT `idPadre` FROM `estudiantes` WHERE `idPadre`='$id_Padre'";


		$padre = $conexion->query($sql);
		$resultado = $padre->fetch_all();

		desconectarBD($conexion);
		return sizeof($resultado);
	}
	public function mostrarPadre(){
		#Retorna todos los registros de Padre
		$conexion = conectarBD();

		$sql = "SELECT * FROM `personas`,`Padre` WHERE `personas`.`Cédula` = `Padre`.`Cédula_Persona`";

		$consulta_Padre = $conexion->query($sql) or die("error: ".$conexion->error);
		
		$Padre = $consulta_Padre->fetch_all(MYSQLI_ASSOC);

		#Hace un arreglo de arreglos para contener los campos de la Padre
		$Lista_Padre = [];
		foreach ($Padre as $padre) {
			$Lista_Padre[]= $padre;
		}

		desconectarBD($conexion);

		return $Lista_Padre;
	}

	public function setidPadre($idPadre) {
		$this->idPadre = $idPadre;
	}
	public function setPaís_Residencia($País_Residencia) {
		$this->País_Residencia = $País_Residencia;
	}
	public function setGrado_AcadémicoPa($Grado_Académico) {
		$this->Grado_Académico = $Grado_Académico;
	}	
	public function setCédula_Persona($Cédula_Persona) {
		$this->Cédula_Persona = $Cédula_Persona;
	}

	public function getidPadre() {
		return $this->idPadre;
	}
	public function getPaís_Residencia() {
		return $this->País_Residencia;
	}
	public function getGrado_AcadémicoPa() {
		return $this->Grado_Académico;
	}	
	public function getCédula_Persona() {
		return $this->Cédula_Persona;
	}
}

?>
