<?php 


class DatosVivienda {

	private $idDatos_vivienda;
	private $Condiciones_Vivienda;
	private $Tipo_Vivienda;
	private $Tenencia_vivienda;
	private $idRepresentante;

	public function __construct(){}

	public function insertarDatosVivienda() {
		$conexion = conectarBD();

		$Condiciones_Vivienda = $this->getCondiciones_Vivienda();
		$Tipo_Vivienda = $this->getTipo_Vivienda();
		$Tenencia_vivienda = $this->getTenencia_vivienda();
		$idRepresentante = $this->getidRepresentante();

		$sql = "SELECT * FROM `datos-vivienda` WHERE `idRepresentante` = '$idRepresentante'";
	
		$registro_existe = $conexion->query($sql);
		$resultado = $registro_existe->fetch_assoc();
		
		if ($resultado == NULL) {
			$sql = "INSERT INTO `datos-vivienda`(`idDatos-vivienda`, `Condiciones_Vivienda`, `Tipo_Vivienda`, `Tenencia_vivienda`, `idRepresentante`) VALUES (
				NULL,
				'$Condiciones_Vivienda',
				'$Tipo_Vivienda',
				'$Tenencia_vivienda',
				'$idRepresentante'

			)";

			$conexion->query($sql) or die("error: ".$conexion->error);
			$this->setidDatos_vivienda($conexion->insert_id);
		}
		elseif ($resultado != NULL) {
			$this->setidDatos_vivienda($resultado['idDatos-vivienda']);
		}
		desconectarBD($conexion);
	}
	public function editarDatosVivienda() {
		$conexion = conectarBD();

		$Condiciones_Vivienda = $this->getCondiciones_Vivienda();
		$Tipo_Vivienda = $this->getTipo_Vivienda();
		$Tenencia_vivienda = $this->getTenencia_vivienda();
		$idRepresentante = $this->getidRepresentante();
		
		$sql = "UPDATE `datos-vivienda` SET 
			`Condiciones_Vivienda`='$Condiciones_Vivienda',
			`Tipo_Vivienda`='$Tipo_Vivienda',
			`Tenencia_vivienda`='$Tenencia_vivienda'
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
	public function setTenencia_vivienda($Tenencia_vivienda) {
		$this->Tenencia_vivienda = $Tenencia_vivienda;
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
	public function getTenencia_vivienda() {
		return $this->Tenencia_vivienda;
	}
	public function getidRepresentante() {
		return $this->idRepresentante;
	}	

}


 ?>