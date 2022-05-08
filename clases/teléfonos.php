<?php

class Teléfonos {

	private $idTeléfonos;
	private $Prefijo;
	private $Número_Telefónico;
	private $Relación_Teléfono;
	private $Cédula_Persona;

	public function __construct(){}

	public function insertarTeléfono() {
		$conexion = conectarBD();

		$Prefijo = $this->getPrefijo();
		$Número_Telefónico = $this->getNúmero_Telefónico();
		$Relación_Teléfono = $this->getRelación_Teléfono();
		$Cédula_Persona = $this->getCédula_Persona();

		$sql = "SELECT * FROM `teléfonos` WHERE `Relación_Teléfono` = '$Relación_Teléfono' AND `Cédula_Persona` = '$Cédula_Persona'";

		$registro_existe = $conexion->query($sql);
		$resultado = $registro_existe->fetch_assoc();

		#Consulta si el registro ya existe para prevenir registros duplicados o excesivos
		if ($resultado == NULL) {
			$sql = "INSERT INTO `teléfonos`(`idTeléfonos`, `Prefijo`, `Número_Telefónico`, `Relación_Teléfono`, `Cédula_Persona`) VALUES (
				NULL,
				'$Prefijo',
				'$Número_Telefónico',
				'$Relación_Teléfono',
				'$Cédula_Persona'
			)";
			$conexion->query($sql) or die("error: ".$conexion->error);
			$this->setidTeléfonos($conexion->insert_id);
		}
		elseif ($resultado != NULL) {
			$this->setidTeléfonos($resultado['idTeléfonos']);
		}
		desconectarBD($conexion);
	}
	public function editarTeléfono($Cédula_Persona) {
		$conexion = conectarBD();
		$Prefijo = $this->getPrefijo();
		$Número_Telefónico = $this->getNúmero_Telefónico();
		$Relación_Teléfono = $this->getRelación_Teléfono();

		$sql = "UPDATE `teléfonos` SET
				`Prefijo`='$Prefijo',
				`Número_Telefónico`='$Número_Telefónico',
			WHERE `Cédula_Persona`='$Cédula_Persona' AND `Relación_Teléfono`='$Relación_Teléfono'";

		$conexion->query($sql) or die("error: ".$conexion->error);

		desconectarBD($conexion);
	}
	public function consultarTeléfonos($Cédula_Persona) {
		$conexion = conectarBD();

		$sql = "SELECT * FROM `teléfonos` WHERE `Cédula_Persona` = '$Cédula_Persona'";

		$busqueda = $conexion->query($sql) or die("error: ".$conexion->error);
		$resultado = $busqueda->fetch_all(MYSQLI_ASSOC);

		desconectarBD($conexion);

		return $resultado;
	}
	public function consultarTeléfonosRepresentanteID($ID_Representante) {
		$conexion = conectarBD();

		$sql = "SELECT * FROM `representantes`,`teléfonos` WHERE  `representantes`.`idRepresentantes` = '$ID_Representante' AND `teléfonos`.`Cédula_Persona` = `representantes`.`Cédula_Persona`";

		$busqueda = $conexion->query($sql) or die("error: ".$conexion->error);
		$resultado = $busqueda->fetch_all(MYSQLI_ASSOC);

		desconectarBD($conexion);

		return $resultado;
	}
	public function consultarTeléfonosPadreID($ID_Padre) {
		$conexion = conectarBD();

		$sql = "SELECT * FROM `padres`,`teléfonos` WHERE  `padres`.`idPadres` = '$ID_Padre' AND `teléfonos`.`Cédula_Persona` = `padres`.`Cédula_Persona`";

		$busqueda = $conexion->query($sql) or die("error: ".$conexion->error);
		$resultado = $busqueda->fetch_all(MYSQLI_ASSOC);

		desconectarBD($conexion);

		return $resultado;
	}
	public function setidTeléfonos($idTeléfonos) {
		$this->idTeléfonos = $idTeléfonos;
	}
	public function setPrefijo($Prefijo) {
		$this->Prefijo = $Prefijo;
	}
	public function setNúmero_Telefónico($Número_Telefónico) {
		$this->Número_Telefónico = $Número_Telefónico;
	}
	public function setRelación_Teléfono($Relación_Teléfono) {
		$this->Relación_Teléfono = $Relación_Teléfono;
	}
	public function setCédula_Persona($Cédula_Persona) {
		$this->Cédula_Persona = $Cédula_Persona;
	}

	public function getidTeléfonos() {
		return $this->idTeléfonos;
	}
	public function getPrefijo() {
		return $this->Prefijo;
	}
	public function getNúmero_Telefónico() {
		return $this->Número_Telefónico;
	}
	public function getRelación_Teléfono() {
		return $this->Relación_Teléfono;
	}
	public function getCédula_Persona() {
		return $this->Cédula_Persona;
	}
}

?>
