<?php 

class DatosLaborales {

	private $idDatos_laborales;
	private $Empleo;
	private $Lugar_Trabajo;
	private $Remuneración;
	private $Tipo_Remuneración;
	private $idRepresentantes;

	public function __construct(){}

	public function insertarDatosLaborales() {
		$conexion = conectarBD();

		$Empleo = $this->getEmpleo();
		$Lugar_Trabajo = $this->getLugar_Trabajo();
		$Remuneración = $this->getRemuneración();
		$Tipo_Remuneración = $this->getTipo_Remuneración();
		$idRepresentantes = $this->getidRepresentantes();

		$sql = "SELECT * FROM `datos-laborales` WHERE `idRepresentantes` = '$idRepresentantes'";

		$registro_existe = $conexion->query($sql);
		$resultado = $registro_existe->fetch_assoc();

		#Consulta si el registro ya existe para prevenir registros duplicados o excesivos
		if ($resultado == NULL) {
		
			$sql = "INSERT INTO `datos-laborales`(`idDatos-laborales`, `Empleo`, `Lugar_Trabajo`, `Remuneración`, `Tipo_Remuneración`, `idRepresentantes`) VALUES (
				NULL,
				'$Empleo',
				'$Lugar_Trabajo',
				'$Remuneración',
				'$Tipo_Remuneración',
				'$idRepresentantes'
			)";
			$this->setidDatos_laborales($conexion->insert_id);
		}
		elseif ($resultado != NULL) {
			$this->setidDatos_laborales($resultado['idDatos-laborales']);
		}

		$conexion->query($sql) or die("error: ".$conexion->error);
		
		desconectarBD($conexion);
	}

	public function editarDatosLaborales() {
		$conexion = conectarBD();
		
		$Empleo = $this->getEmpleo();
		$Lugar_Trabajo = $this->getLugar_Trabajo();
		$Remuneración = $this->getRemuneración();
		$Tipo_Remuneración = $this->getTipo_Remuneración();
		
		$sql = "UPDATE `datos-laborales` SET 
		`Empleo`='$Empleo',
		`Lugar_Trabajo`='$Lugar_Trabajo',
		`Remuneración`='$Remuneración',
		`Tipo_Remuneración`='$Tipo_Remuneración'
		WHERE `idRepresentantes`='[value-6]'";

		$conexion->query($sql) or die("error: ".$conexion->error);

		desconectarBD($conexion);
	}

	public function consultarDatosLaborales($idRepresentantes) {
		$conexion = conectarBD();

		$sql = "SELECT * FROM `datos-laborales` WHERE `idRepresentantes` = '$idRepresentantes'";

		$consulta_laborales = $conexion->query($sql) or die("error: ".$conexion->error);
		$datos_laborales = $consulta_laborales->fetch_assoc();
		
		desconectarBD($conexion);

		return $datos_laborales;
	}
	
	public function setidDatos_laborales($idDatos_laborales) {
		$this->idDatos_laborales = $idDatos_laborales;
	}
	public function setEmpleo($Empleo) {
		$this->Empleo = $Empleo;
	}
	public function setLugar_Trabajo($Lugar_Trabajo) {
		$this->Lugar_Trabajo = $Lugar_Trabajo;
	}
	public function setRemuneración($Remuneración) {
		$this->Remuneración = $Remuneración;
	}
	public function setTipo_Remuneración($Tipo_Remuneración) {
		$this->Tipo_Remuneración = $Tipo_Remuneración;
	}
	public function setidRepresentantes($idRepresentantes) {
		$this->idRepresentantes = $idRepresentantes;
	}

	public function getidDatos_laborales() {
		return $this->idDatos_laborales;
	}
	public function getEmpleo() {
		return $this->Empleo;
	}
	public function getLugar_Trabajo() {
		return $this->Lugar_Trabajo;
	}
	public function getRemuneración() {
		return $this->Remuneración;
	}
	public function getTipo_Remuneración() {
		return $this->Tipo_Remuneración;
	}
	public function getidRepresentantes() {
		return $this->idRepresentantes;
	}
}
?>