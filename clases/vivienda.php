<?php 


class DatosVivienda {

	private $idDatos_vivienda;
	private $Condiciones_Vivienda;
	private $Tipo_Vivienda;
	private $Tenencia_vivienda;
	private $idRepresentante;
	private $idMadre;
	private $idPadre;

	public function __construct(){}

	public function insertarDatosVivienda_Re() {
		$conexion = conectarBD();

		$Condiciones_Vivienda = $this->getCondiciones_Vivienda();
		$Tipo_Vivienda = $this->getTipo_Vivienda();
		$Tenencia_vivienda = $this->getTenencia_vivienda();
		$idRepresentante = $this->getidRepresentante();
		$idMadre = $this->getidMadre();		
		$idPadre = $this->getidPadre();

		$sql = "SELECT * FROM `datos-vivienda` WHERE `idRepresentante` = '$idRepresentante'";
	
		$registro_existe = $conexion->query($sql);
		$resultado = $registro_existe->fetch_assoc();
		
		if ($resultado == NULL) {
			$sql = "INSERT INTO `datos-vivienda`(`idDatos-vivienda`, `Condiciones_Vivienda`, `Tipo_Vivienda`, `Tenencia_vivienda`, `idRepresentante`, `idMadre`, `idPadre`) VALUES (
				NULL,
				'$Condiciones_Vivienda',
				'$Tipo_Vivienda',
				'$Tenencia_vivienda',
				'$idRepresentante',
				'$idMadre',
				'$idPadre'
			)";

			$conexion->query($sql) or die("error: ".$conexion->error);
			$this->setidDatos_vivienda($conexion->insert_id);
		}
		elseif ($resultado != NULL) {
			$this->setidDatos_vivienda($resultado['idDatos-vivienda']);
		}
		desconectarBD($conexion);
	}
	public function editarDatosVivienda_Re() {
		$conexion = conectarBD();

		$Condiciones_Vivienda = $this->getCondiciones_Vivienda();
		$Tipo_Vivienda = $this->getTipo_Vivienda();
		$Tenencia_vivienda = $this->getTenencia_vivienda();
		$idRepresentante = $this->getidRepresentante();
		$idMadre = $this->getidMadre();		
		$idPadre = $this->getidPadre();
		
		$sql = "UPDATE `datos-vivienda` SET 
			`Condiciones_Vivienda`='$Condiciones_Vivienda',
			`Tipo_Vivienda`='$Tipo_Vivienda',
			`Tenencia_vivienda`='$Tenencia_vivienda'
			WHERE `idRepresentante`='$idRepresentante'";

		$conexion->query($sql) or die("error: ".$conexion->error);

		desconectarBD($conexion);
	}
	public function consultarDatosvivienda_Re($idRepresentante) {
		$conexion = conectarBD();

		$sql = "SELECT * FROM `datos-vivienda` WHERE `idRepresentante` = '$idRepresentante'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		
		$consulta_Datosvivienda = $conexion->query($sql) or die("error: ".$conexion->error);
		$Datosvivienda = $consulta_Datosvivienda->fetch_assoc();
		
		desconectarBD($conexion);
		
		return $Datosvivienda;
	}

	public function insertarDatosVivienda_Ma() {
		$conexion = conectarBD();

		$Condiciones_Vivienda = $this->getCondiciones_Vivienda();
		$Tipo_Vivienda = $this->getTipo_Vivienda();
		$Tenencia_vivienda = $this->getTenencia_vivienda();
		$idRepresentante = $this->getidRepresentante();
		$idMadre = $this->getidMadre();		
		$idPadre = $this->getidPadre();

		$sql = "SELECT * FROM `datos-vivienda` WHERE `idMadre` = '$idMadre'";
	
		$registro_existe = $conexion->query($sql);
		$resultado = $registro_existe->fetch_assoc();
		
		if ($resultado == NULL) {
			$sql = "INSERT INTO `datos-vivienda`(`idDatos-vivienda`, `Condiciones_Vivienda`, `Tipo_Vivienda`, `Tenencia_vivienda`, `idRepresentante`, `idMadre`, `idPadre`) VALUES (
				NULL,
				'$Condiciones_Vivienda',
				'$Tipo_Vivienda',
				'$Tenencia_vivienda',
				'$idRepresentante',
				'$idMadre',
				'$idPadre'
			)";

			$conexion->query($sql) or die("error: ".$conexion->error);
			$this->setidDatos_vivienda($conexion->insert_id);
		}
		elseif ($resultado != NULL) {
			$this->setidDatos_vivienda($resultado['idDatos-vivienda']);
		}
		desconectarBD($conexion);
	}
	public function editarDatosVivienda_Ma() {
		$conexion = conectarBD();

		$Condiciones_Vivienda = $this->getCondiciones_Vivienda();
		$Tipo_Vivienda = $this->getTipo_Vivienda();
		$Tenencia_vivienda = $this->getTenencia_vivienda();
		$idRepresentante = $this->getidRepresentante();
		$idMadre = $this->getidMadre();		
		$idPadre = $this->getidPadre();
		
		$sql = "UPDATE `datos-vivienda` SET 
			`Condiciones_Vivienda`='$Condiciones_Vivienda',
			`Tipo_Vivienda`='$Tipo_Vivienda',
			`Tenencia_vivienda`='$Tenencia_vivienda'
			WHERE `idMadre`='$idMadre'";

		$conexion->query($sql) or die("error: ".$conexion->error);

		desconectarBD($conexion);
	}
	public function consultarDatosvivienda_Ma($idMadre) {
		$conexion = conectarBD();

		$sql = "SELECT * FROM `datos-vivienda` WHERE `idMadre` = '$idMadre'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		
		$consulta_Datosvivienda = $conexion->query($sql) or die("error: ".$conexion->error);
		$Datosvivienda = $consulta_Datosvivienda->fetch_assoc();
		
		desconectarBD($conexion);
		
		return $Datosvivienda;
	}

	public function insertarDatosVivienda_Pa() {
		$conexion = conectarBD();

		$Condiciones_Vivienda = $this->getCondiciones_Vivienda();
		$Tipo_Vivienda = $this->getTipo_Vivienda();
		$Tenencia_vivienda = $this->getTenencia_vivienda();
		$idRepresentante = $this->getidRepresentante();
		$idMadre = $this->getidMadre();		
		$idPadre = $this->getidPadre();

		$sql = "SELECT * FROM `datos-vivienda` WHERE `idPadre` = '$idPadre'";
	
		$registro_existe = $conexion->query($sql);
		$resultado = $registro_existe->fetch_assoc();
		
		if ($resultado == NULL) {
			$sql = "INSERT INTO `datos-vivienda`(`idDatos-vivienda`, `Condiciones_Vivienda`, `Tipo_Vivienda`, `Tenencia_vivienda`, `idRepresentante`, `idMadre`, `idPadre`) VALUES (
				NULL,
				'$Condiciones_Vivienda',
				'$Tipo_Vivienda',
				'$Tenencia_vivienda',
				'$idRepresentante',
				'$idMadre',
				'$idPadre'
			)";

			$conexion->query($sql) or die("error: ".$conexion->error);
			$this->setidDatos_vivienda($conexion->insert_id);
		}
		elseif ($resultado != NULL) {
			$this->setidDatos_vivienda($resultado['idDatos-vivienda']);
		}
		desconectarBD($conexion);
	}
	public function editarDatosVivienda_Pa() {
		$conexion = conectarBD();

		$Condiciones_Vivienda = $this->getCondiciones_Vivienda();
		$Tipo_Vivienda = $this->getTipo_Vivienda();
		$Tenencia_vivienda = $this->getTenencia_vivienda();
		$idRepresentante = $this->getidRepresentante();
		$idMadre = $this->getidMadre();		
		$idPadre = $this->getidPadre();
		
		$sql = "UPDATE `datos-vivienda` SET 
			`Condiciones_Vivienda`='$Condiciones_Vivienda',
			`Tipo_Vivienda`='$Tipo_Vivienda',
			`Tenencia_vivienda`='$Tenencia_vivienda'
			WHERE `idPadre`='$idPadre'";

		$conexion->query($sql) or die("error: ".$conexion->error);

		desconectarBD($conexion);
	}
	public function consultarDatosvivienda_Pa($idPadre) {
		$conexion = conectarBD();

		$sql = "SELECT * FROM `datos-vivienda` WHERE `idPadre` = '$idPadre'";

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
	public function setidMadre($idMadre) {
		$this->idMadre = $idMadre;
	}
	public function setidPadre($idPadre) {
		$this->idPadre = $idPadre;
	}	
	public function getidDatos_vivienda() {
		return $this->idDatos_vivienda;
	}
	public function getCondiciones_Vivienda() {
		return $this->Condiciones_Vivienda;
	}
	public function getTipo_Vivienda_R() {
		return $this->Tipo_Vivienda_R;
	}
	public function getTenencia_vivienda_R() {
		return $this->Tenencia_vivienda_R;
	}
	public function getidRepresentante() {
		return $this->idRepresentante;
	}
	public function getidMadre() {
		return $this->idMadre;
	}
	public function getidPadre() {
		return $this->idPadre;
	}	

}


 ?>