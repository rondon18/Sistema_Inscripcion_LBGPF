<?php 


class DatosViviendaPa {

	private $idDatos_viviendaPa;
	private $Condiciones_Vivienda;
	private $Tipo_Vivienda;
	private $Tenencia_vivienda;
	private $idPadre;

	public function __construct(){}

	public function insertarDatosVivienda_Pa() {
		$conexion = conectarBD();

		$Condiciones_Vivienda = $this->getCondiciones_ViviendaPa();
		$Tipo_Vivienda = $this->getTipo_ViviendaPa();
		$Tenencia_vivienda = $this->getTenencia_viviendaPa();
		$idPadre = $this->getidPadre();		

		$sql = "SELECT * FROM `datos-vivienda-Padres` WHERE `idPadre` = '$idPadre'";
	
		$registro_existe = $conexion->query($sql);
		$resultado = $registro_existe->fetch_assoc();
		
		if ($resultado == NULL) {
			$sql = "INSERT INTO `datos-vivienda-Padres`(`idDatos-viviendaPa`, `Condiciones_Vivienda`, `Tipo_Vivienda`, `Tenencia_vivienda`, `idPadre`) VALUES (
				NULL,
				'$Condiciones_Vivienda',
				'$Tipo_Vivienda',
				'$Tenencia_vivienda',
				'$idPadre'
			)";

			$conexion->query($sql) or die("error: ".$conexion->error);
			$this->setidDatos_viviendaPa($conexion->insert_id);
		}
		elseif ($resultado != NULL) {
			$this->setidDatos_viviendaPa($resultado['idDatos-viviendaPa']);
		}
		desconectarBD($conexion);
	}
	public function editarDatosVivienda_Pa() {
		$conexion = conectarBD();

		$Condiciones_Vivienda = $this->getCondiciones_ViviendaPa();
		$Tipo_Vivienda = $this->getTipo_ViviendaPa();
		$Tenencia_vivienda = $this->getTenencia_viviendaPa();
		$idPadre = $this->getidPadre();
		
		$sql = "UPDATE `datos-vivienda-Padres` SET 
			`Condiciones_Vivienda`='$Condiciones_Vivienda',
			`Tipo_Vivienda`='$Tipo_Vivienda',
			`Tenencia_vivienda`='$Tenencia_vivienda'
			WHERE `idPadre`='$idPadre'";

		$conexion->query($sql) or die("error: ".$conexion->error);

		desconectarBD($conexion);
	}
	public function consultarDatosvivienda_Pa($idPadre) {
		$conexion = conectarBD();

		$sql = "SELECT * FROM `datos-vivienda-Padres` WHERE `idPadre` = '$idPadre'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		
		$consulta_Datosvivienda = $conexion->query($sql) or die("error: ".$conexion->error);
		$Datosvivienda = $consulta_Datosvivienda->fetch_assoc();
		
		desconectarBD($conexion);
		
		return $Datosvivienda;
	}

	public function setidDatos_viviendaPa($idDatos_viviendaPa) {
		$this->idDatos_viviendaPa = $idDatos_viviendaPa;
	}
	public function setCondiciones_ViviendaPa($Condiciones_Vivienda) {
		$this->Condiciones_Vivienda = $Condiciones_Vivienda;
	}
	public function setTipo_ViviendaPa($Tipo_Vivienda) {
		$this->Tipo_Vivienda = $Tipo_Vivienda;
	}
	public function setTenencia_viviendaPa($Tenencia_vivienda) {
		$this->Tenencia_vivienda = $Tenencia_vivienda;
	}
	public function setidPadre($idPadre) {
		$this->idPadre = $idPadre;
	}	
	public function getidDatos_viviendaPa() {
		return $this->idDatos_viviendaPa;
	}
	public function getCondiciones_ViviendaPa() {
		return $this->Condiciones_Vivienda;
	}
	public function getTipo_ViviendaPa() {
		return $this->Tipo_Vivienda;
	}
	public function getTenencia_viviendaPa() {
		return $this->Tenencia_vivienda;
	}
	public function getidPadre() {
		return $this->idPadre;
	}	

}


?>