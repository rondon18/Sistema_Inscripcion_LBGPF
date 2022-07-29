<?php 


class DatosVivienda {

	private $idDatos_vivienda;
	private $Condiciones_Vivienda;
	private $Tipo_Vivienda;
	private $Tenencia_Vivienda;
	private $idRepresentante;

	public function __construct(){}

	public function insertarDatosVivienda() {
		$conexion = conectarBD();

		$Condiciones_Vivienda = $this->getCondiciones_Vivienda();
		$Tipo_Vivienda = $this->getTipo_Vivienda();
		$Tenencia_Vivienda = $this->getTenencia_Vivienda();
		$idRepresentante = $this->getidRepresentante();

		$sql = "SELECT * FROM `datos-vivienda` WHERE `idRepresentante` = '$idRepresentante'";
	
		$registro_existe = $conexion->query($sql);
		$resultado = $registro_existe->fetch_assoc();
		
		if ($resultado == NULL) {
			$sql = "INSERT INTO `datos-vivienda`(`idDatos_vivienda`, `Condiciones_Vivienda`, `Tipo_Vivienda`, `Tenencia_Vivienda`, `idRepresentante`) VALUES (
				NULL,
				'$Condiciones_Vivienda',
				'$Tipo_Vivienda',
				'$Tenencia_Vivienda',
				'$idRepresentante'

			)";

			$conexion->query($sql) or die("error: ".$conexion->error);
			$this->setidDatos_vivienda($conexion->insert_id);
		}
		elseif ($resultado != NULL) {
			$this->setidDatos_vivienda($resultado['idDatos_vivienda']);
		}
		desconectarBD($conexion);
	}
	public function editarDatosVivienda() {
		$conexion = conectarBD();

		$Condiciones_Vivienda = $this->getCondiciones_Vivienda();
		$Tipo_Vivienda = $this->getTipo_Vivienda();
		$Tenencia_Vivienda = $this->getTenencia_Vivienda();
		$idRepresentante = $this->getidRepresentante();
		
		$sql = "UPDATE `datos-vivienda` SET 
			`Condiciones_Vivienda`='$Condiciones_Vivienda',
			`Tipo_Vivienda`='$Tipo_Vivienda',
			`Tenencia_Vivienda`='$Tenencia_Vivienda'
			WHERE `idRepresentante`='$idRepresentante'";

		$conexion->query($sql) or die("error: ".$conexion->error);

		desconectarBD($conexion);
	}
	public function consultarDatosvivienda_R($idRepresentante) {
		$conexion = conectarBD();

		$sql = "SELECT * FROM `datos-vivienda` WHERE `idRepresentante` = '$idRepresentante'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		
		$consulta_Datosvivienda = $conexion->query($sql) or die("error: ".$conexion->error);
		$Datosvivienda = $consulta_Datosvivienda->fetch_assoc();
		
		desconectarBD($conexion);
		
		return $Datosvivienda;
	}

	public function setidDatos_vivienda($idDatos_vivienda) {
		$this->idDatos_vivienda = $idDatos_vivienda;
	}
	public function setCondiciones_Vivienda($Condiciones_Vivienda) {
		$this->Condiciones_Vivienda = $Condiciones_Vivienda;
	}
	public function setTipo_Vivienda($Tipo_Vivienda) {
		$this->Tipo_Vivienda = $Tipo_Vivienda;
	}
	public function setTenencia_Vivienda($Tenencia_Vivienda) {
		$this->Tenencia_Vivienda = $Tenencia_Vivienda;
	}
	public function setidRepresentante($idRepresentante) {
		$this->idRepresentante = $idRepresentante;
	}	
	public function getidDatos_vivienda() {
		return $this->idDatos_vivienda;
	}
	public function getCondiciones_Vivienda() {
		return $this->Condiciones_Vivienda;
	}
	public function getTipo_Vivienda() {
		return $this->Tipo_Vivienda;
	}
	public function getTenencia_Vivienda() {
		return $this->Tenencia_Vivienda;
	}
	public function getidRepresentante() {
		return $this->idRepresentante;
	}	

}


 ?>