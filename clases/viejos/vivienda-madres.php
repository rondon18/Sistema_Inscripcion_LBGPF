<?php 


class DatosViviendaMa {

	private $idDatos_viviendaMa;
	private $Condiciones_Vivienda;
	private $Tipo_Vivienda;
	private $Tenencia_vivienda;
	private $idMadre;

	public function __construct(){}

	public function insertarDatosVivienda_Ma() {
		$conexion = conectarBD();

		$Condiciones_Vivienda = $this->getCondiciones_ViviendaMa();
		$Tipo_Vivienda = $this->getTipo_ViviendaMa();
		$Tenencia_vivienda = $this->getTenencia_viviendaMa();
		$idMadre = $this->getidMadre();		

		$sql = "SELECT * FROM `datos-vivienda-madres` WHERE `idMadre` = '$idMadre'";
	
		$registro_existe = $conexion->query($sql);
		$resultado = $registro_existe->fetch_assoc();
		
		if ($resultado == NULL) {
			$sql = "INSERT INTO `datos-vivienda-madres`(`idDatos-viviendaMa`, `Condiciones_Vivienda`, `Tipo_Vivienda`, `Tenencia_vivienda`, `idMadre`) VALUES (
				NULL,
				'$Condiciones_Vivienda',
				'$Tipo_Vivienda',
				'$Tenencia_vivienda',
				'$idMadre'
			)";

			$conexion->query($sql) or die("error: ".$conexion->error);
			$this->setidDatos_viviendaMa($conexion->insert_id);
		}
		elseif ($resultado != NULL) {
			$this->setidDatos_viviendaMa($resultado['idDatos-viviendaMa']);
		}
		desconectarBD($conexion);
	}
	public function editarDatosVivienda_Ma() {
		$conexion = conectarBD();

		$Condiciones_Vivienda = $this->getCondiciones_ViviendaMa();
		$Tipo_Vivienda = $this->getTipo_ViviendaMa();
		$Tenencia_vivienda = $this->getTenencia_viviendaMa();
		$idMadre = $this->getidMadre();
		
		$sql = "UPDATE `datos-vivienda-madres` SET 
			`Condiciones_Vivienda`='$Condiciones_Vivienda',
			`Tipo_Vivienda`='$Tipo_Vivienda',
			`Tenencia_vivienda`='$Tenencia_vivienda'
			WHERE `idMadre`='$idMadre'";

		$conexion->query($sql) or die("error: ".$conexion->error);

		desconectarBD($conexion);
	}
	public function consultarDatosvivienda_Ma($idMadre) {
		$conexion = conectarBD();

		$sql = "SELECT * FROM `datos-vivienda-madres` WHERE `idMadre` = '$idMadre'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		
		$consulta_Datosvivienda = $conexion->query($sql) or die("error: ".$conexion->error);
		$Datosvivienda = $consulta_Datosvivienda->fetch_assoc();
		
		desconectarBD($conexion);
		
		return $Datosvivienda;
	}

	public function setidDatos_viviendaMa($idDatos_viviendaMa) {
		$this->idDatos_viviendaMa = $idDatos_viviendaMa;
	}
	public function setCondiciones_ViviendaMa($Condiciones_Vivienda) {
		$this->Condiciones_Vivienda = $Condiciones_Vivienda;
	}
	public function setTipo_ViviendaMa($Tipo_Vivienda) {
		$this->Tipo_Vivienda = $Tipo_Vivienda;
	}
	public function setTenencia_viviendaMa($Tenencia_vivienda) {
		$this->Tenencia_vivienda = $Tenencia_vivienda;
	}
	public function setidMadre($idMadre) {
		$this->idMadre = $idMadre;
	}	
	public function getidDatos_viviendaMa() {
		return $this->idDatos_viviendaMa;
	}
	public function getCondiciones_ViviendaMa() {
		return $this->Condiciones_Vivienda;
	}
	public function getTipo_ViviendaMa() {
		return $this->Tipo_Vivienda;
	}
	public function getTenencia_viviendaMa() {
		return $this->Tenencia_vivienda;
	}
	public function getidMadre() {
		return $this->idMadre;
	}	

}


?>