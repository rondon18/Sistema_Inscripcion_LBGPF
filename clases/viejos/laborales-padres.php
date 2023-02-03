<?php 

class DatosLaboralesPadres {

	private $idDatos_laborales;
	private $Empleo;
	private $Lugar_Trabajo;
	private $Remuneración;
	private $Tipo_Remuneración;
	private $idPadre;

	public function __construct(){}

	public function insertarDatosLaborales_Pa() {
		$conexion = conectarBD();

		$Empleo = $this->getEmpleoPa();
		$Lugar_Trabajo = $this->getLugar_TrabajoPa();
		$Remuneración = $this->getRemuneraciónPa();
		$Tipo_Remuneración = $this->getTipo_RemuneraciónPa();
		$idPadre = $this->getidPadre();

		$sql = "SELECT * FROM `datos-laborales-Padres` WHERE `idPadre` = '$idPadre'";

		$registro_existe = $conexion->query($sql);
		$resultado = $registro_existe->fetch_assoc();

		#Consulta si el registro ya existe para prevenir registros duplicados o excesivos
		if ($resultado == NULL) {
		
			$sql = "INSERT INTO `datos-laborales-Padres`(`idDatos-laboralesPa`, `Empleo`, `Lugar_Trabajo`, `Remuneración`, `Tipo_Remuneración`, `idPadre`) VALUES (
				NULL,
				'$Empleo',
				'$Lugar_Trabajo',
				'$Remuneración',
				'$Tipo_Remuneración',
				'$idPadre'
			)";
			$this->setidDatos_laboralesPa($conexion->insert_id);
		}
		elseif ($resultado != NULL) {
			$this->setidDatos_laboralesPa($resultado['idDatos-laboralesPa']);
		}

		$conexion->query($sql) or die("error: ".$conexion->error);
		
		desconectarBD($conexion);
	}

	public function editarDatosLaborales_Pa() {
		$conexion = conectarBD();
		
		$Empleo = $this->getEmpleoPa();
		$Lugar_Trabajo = $this->getLugar_TrabajoPa();
		$Remuneración = $this->getRemuneraciónPa();
		$Tipo_Remuneración = $this->getTipo_RemuneraciónPa();
		
		$sql = "UPDATE `datos-laborales-Padres` SET 
		`Empleo`='$Empleo',
		`Lugar_Trabajo`='$Lugar_Trabajo',
		`Remuneración`='$Remuneración',
		`Tipo_Remuneración`='$Tipo_Remuneración'
		WHERE `idPadre`='[value-6]'";

		$conexion->query($sql) or die("error: ".$conexion->error);

		desconectarBD($conexion);
	}

	public function consultarDatosLaborales_Pa($idPadre) {
		$conexion = conectarBD();

		$sql = "SELECT * FROM `datos-laborales-Padres` WHERE `idPadre` = '$idPadre'";

		$consulta_laborales = $conexion->query($sql) or die("error: ".$conexion->error);
		$datos_laborales = $consulta_laborales->fetch_assoc();
		
		desconectarBD($conexion);

		return $datos_laborales;
	}

	public function setidDatos_laboralesPa($idDatos_laboralesPa) {
		$this->idDatos_laboralesPa = $idDatos_laboralesPa;
	}
	public function setEmpleoPa($Empleo) {
		$this->Empleo = $Empleo;
	}
	public function setLugar_TrabajoPa($Lugar_Trabajo) {
		$this->Lugar_Trabajo = $Lugar_Trabajo;
	}
	public function setRemuneraciónPa($Remuneración) {
		$this->Remuneración = $Remuneración;
	}
	public function setTipo_RemuneraciónPa($Tipo_Remuneración) {
		$this->Tipo_Remuneración = $Tipo_Remuneración;
	}
	public function setidPadre($idPadre) {
		$this->idPadre = $idPadre;
	}

	public function getidDatos_laboralesPa() {
		return $this->idDatos_laboralesPa;
	}
	public function getEmpleoPa() {
		return $this->Empleo;
	}
	public function getLugar_TrabajoPa() {
		return $this->Lugar_Trabajo;
	}
	public function getRemuneraciónPa() {
		return $this->Remuneración;
	}
	public function getTipo_RemuneraciónPa() {
		return $this->Tipo_Remuneración;
	}
	public function getidPadre() {
		return $this->idPadre;
	}
}
?>