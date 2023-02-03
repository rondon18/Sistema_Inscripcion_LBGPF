<?php 

class DatosLaboralesMadres {

	private $idDatos_laborales;
	private $Empleo;
	private $Lugar_Trabajo;
	private $Remuneración;
	private $Tipo_Remuneración;
	private $idMadre;

	public function __construct(){}

	public function insertarDatosLaborales_Ma() {
		$conexion = conectarBD();

		$Empleo = $this->getEmpleoMa();
		$Lugar_Trabajo = $this->getLugar_TrabajoMa();
		$Remuneración = $this->getRemuneraciónMa();
		$Tipo_Remuneración = $this->getTipo_RemuneraciónMa();
		$idMadre = $this->getidMadre();

		$sql = "SELECT * FROM `datos-laborales-madres` WHERE `idMadre` = '$idMadre'";

		$registro_existe = $conexion->query($sql);
		$resultado = $registro_existe->fetch_assoc();

		#Consulta si el registro ya existe para prevenir registros duplicados o excesivos
		if ($resultado == NULL) {
		
			$sql = "INSERT INTO `datos-laborales-madres`(`idDatos-laboralesMa`, `Empleo`, `Lugar_Trabajo`, `Remuneración`, `Tipo_Remuneración`, `idMadre`) VALUES (
				NULL,
				'$Empleo',
				'$Lugar_Trabajo',
				'$Remuneración',
				'$Tipo_Remuneración',
				'$idMadre'
			)";
			$this->setidDatos_laboralesMa($conexion->insert_id);
		}
		elseif ($resultado != NULL) {
			$this->setidDatos_laboralesMa($resultado['idDatos-laboralesMa']);
		}

		$conexion->query($sql) or die("error: ".$conexion->error);
		
		desconectarBD($conexion);
	}

	public function editarDatosLaborales_Ma() {
		$conexion = conectarBD();
		
		$Empleo = $this->getEmpleoMa();
		$Lugar_Trabajo = $this->getLugar_TrabajoMa();
		$Remuneración = $this->getRemuneraciónMa();
		$Tipo_Remuneración = $this->getTipo_RemuneraciónMa();
		
		$sql = "UPDATE `datos-laborales-madres` SET 
		`Empleo`='$Empleo',
		`Lugar_Trabajo`='$Lugar_Trabajo',
		`Remuneración`='$Remuneración',
		`Tipo_Remuneración`='$Tipo_Remuneración'
		WHERE `idMadre`='[value-6]'";

		$conexion->query($sql) or die("error: ".$conexion->error);

		desconectarBD($conexion);
	}

	public function consultarDatosLaborales_Ma($idMadre) {
		$conexion = conectarBD();

		$sql = "SELECT * FROM `datos-laborales-madres` WHERE `idMadre` = '$idMadre'";

		$consulta_laborales = $conexion->query($sql) or die("error: ".$conexion->error);
		$datos_laborales = $consulta_laborales->fetch_assoc();
		
		desconectarBD($conexion);

		return $datos_laborales;
	}

	public function setidDatos_laboralesMa($idDatos_laboralesMa) {
		$this->idDatos_laboralesMa = $idDatos_laboralesMa;
	}
	public function setEmpleoMa($Empleo) {
		$this->Empleo = $Empleo;
	}
	public function setLugar_TrabajoMa($Lugar_Trabajo) {
		$this->Lugar_Trabajo = $Lugar_Trabajo;
	}
	public function setRemuneraciónMa($Remuneración) {
		$this->Remuneración = $Remuneración;
	}
	public function setTipo_RemuneraciónMa($Tipo_Remuneración) {
		$this->Tipo_Remuneración = $Tipo_Remuneración;
	}
	public function setidMadre($idMadre) {
		$this->idMadre = $idMadre;
	}

	public function getidDatos_laboralesMa() {
		return $this->idDatos_laboralesMa;
	}
	public function getEmpleoMa() {
		return $this->Empleo;
	}
	public function getLugar_TrabajoMa() {
		return $this->Lugar_Trabajo;
	}
	public function getRemuneraciónMa() {
		return $this->Remuneración;
	}
	public function getTipo_RemuneraciónMa() {
		return $this->Tipo_Remuneración;
	}
	public function getidMadre() {
		return $this->idMadre;
	}
}
?>