<?php 

class DatosEconomicos {
	private $idDatos_economicos;
	private $Banco;
	private $Tipo_Cuenta;
	private $Cta_Bancaria;
	private $idRepresentantes;

	public function __construct(){}

	public function insertarDatosEconomicos() {
		$conexion = conectarBD();


		$Banco = $this->getBanco();
		$Tipo_Cuenta = $this->getTipo_Cuenta();
		$Cta_Bancaria = $this->getCta_Bancaria();

		$idRepresentantes = $this->getidRepresentantes();

		$sql = "SELECT * FROM `datos-economicos` WHERE `idRepresentantes` = '$idRepresentantes'";

		$registro_existe = $conexion->query($sql);
		$resultado = $registro_existe->fetch_assoc();

		#Consulta si el registro ya existe para prevenir registros duplicados o excesivos
		if ($resultado == NULL) {
		
			$sql = "INSERT INTO `datos-economicos`(`idDatos-economicos`, `Banco`, `Tipo_Cuenta`, `Cta_Bancaria`, `idRepresentantes`) VALUES (
				NULL,
				'$Banco',
				'$Tipo_Cuenta',
				'$Cta_Bancaria',
				'$idRepresentantes'
			)";
			$this->setidDatos_economicos($conexion->insert_id);
		}
		elseif ($resultado != NULL) {
			$this->setidDatos_economicos($resultado['idDatos-economicos']);
		}

		$conexion->query($sql) or die("error: ".$conexion->error);
		
		desconectarBD($conexion);
	}

	public function consultarDatosEconomicos($idRepresentantes) {
		$conexion = conectarBD();

		$sql = "SELECT * FROM `datos-economicos` WHERE `idRepresentantes` = '$idRepresentantes'";

		$consulta_economicos = $conexion->query($sql) or die("error: ".$conexion->error);			
		$datos_economicos = $consulta_economicos->fetch_assoc();
		
		desconectarBD($conexion);

		return $datos_economicos;
	}

	public function setidDatos_economicos($idDatos_economicos) {
		$this->idDatos_economicos = $idDatos_economicos;
	}
	public function setBanco($Banco) {
		$this->Banco = $Banco;
	}
	public function setTipo_Cuenta($Tipo_Cuenta) {
		$this->Tipo_Cuenta = $Tipo_Cuenta;
	}
	public function setCta_Bancaria($Cta_Bancaria) {
		$this->Cta_Bancaria = $Cta_Bancaria;
	}
	public function setidRepresentantes($idRepresentantes) {
		$this->idRepresentantes = $idRepresentantes;
	}

	public function getidDatos_economicos() {
		return $this->idDatos_economicos;
	}
	public function getBanco() {
		return $this->Banco;
	}
	public function getTipo_Cuenta() {
		return $this->Tipo_Cuenta;
	}
	public function getCta_Bancaria() {
		return $this->Cta_Bancaria;
	}
	public function getidRepresentantes() {
		return $this->idRepresentantes;
	}


}


 ?>