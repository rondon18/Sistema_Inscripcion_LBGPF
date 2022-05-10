<?php

class CarnetPatria {

  private $idCarnet;
  private $Código_Carnet;
  private $Serial_Carnet;
  private $Cédula_Persona;

  public function __construct() {}

  public function insertarCarnetPatria() {
  	$conexion = conectarBD();

    $Código_Carnet = $this->getCódigo_Carnet();
    $Serial_Carnet = $this->getSerial_Carnet();
    $Cédula_Persona = $this->getCédula_Persona();

    $sql = "SELECT * FROM `carnet-patria` WHERE `Cédula_Persona` = '$Cédula_Persona'";

    $registro_existe = $conexion->query($sql);
    $resultado = $registro_existe->fetch_assoc();
    if ($resultado == NULL) {
      $sql = "INSERT INTO `carnet-patria`(`idCarnet`, `Código_Carnet`, `Serial_Carnet`, `Cédula_Persona`) VALUES (
        NULL,
        '$Código_Carnet',
        '$Serial_Carnet',
        '$Cédula_Persona'
      )";
      $conexion->query($sql) or die("error: ".$conexion->error);
    }
    elseif ($resultado != NULL) {
			$this->setidCarnet($resultado['idCarnet']);
		}
    desconectarBD($conexion);
  }
  public function editarCarnetPatria() {
  	$conexion = conectarBD();

    $Código_Carnet = $this->getCódigo_Carnet();
    $Serial_Carnet = $this->getSerial_Carnet();
    $Cédula_Persona = $this->getCédula_Persona();

    $sql = "UPDATE `carnet-patria` SET
    `Código_Carnet`='$Código_Carnet',
    `Serial_Carnet`='$Serial_Carnet',
    WHERE `Cédula_Persona`='$Cédula_Persona'";

    $conexion->query($sql) or die("error: ".$conexion->error);
    desconectarBD($conexion);
  }
  public function eliminarCarnetPatria() {
    $conexion = conectarBD();

    $Cédula_Persona = $this->getCédula_Persona();

    $sql = "DELETE FROM `carnet-patria` WHERE `Cédula_Persona` = '$Cédula_Persona'";

    $conexion->query($sql) or die("error: ".$conexion->error);
    desconectarBD($conexion);
  }
  public function consultarCarnetPatria($Cédula_Persona) {
  	$conexion = conectarBD();

    $sql = "SELECT * FROM `carnet-patria` WHERE `Cédula_Persona` = '$Cédula_Persona'";


    $consulta = $conexion->query($sql) or die("error: ".$conexion->error);
		$carnet = $consulta->fetch_assoc();

    desconectarBD($conexion);

    return $carnet;
  }
  public function mostrarCarnetPatria() {
  	$conexion = conectarBD();

    $sql = "SELECT * FROM `carnet-patria`";

    $consulta = $conexion->query($sql) or die("error: ".$conexion->error);
		$carnets = $consulta->fetch_all(MYSQLI_ASSOC);

    #Hace un arreglo de arreglos para contener los campos
		$lista_carnet = [];
		foreach ($carnets as $carnet) {
			$lista_carnet[]= $carnet;
		}

    desconectarBD($conexion);
    return $lista_carnet;
  }

  public function setidCarnet($idCarnet) {
    $this->idCarnet = $idCarnet;
  }
  public function setCódigo_Carnet($Código_Carnet) {
    $this->Código_Carnet = $Código_Carnet;
  }
  public function setSerial_Carnet($Serial_Carnet) {
    $this->Serial_Carnet = $Serial_Carnet;
  }
  public function setCédula_Persona($Cédula_Persona) {
    $this->Cédula_Persona = $Cédula_Persona;
  }

  public function getidCarnet() {
    return $this->idCarnet;
  }
  public function getCódigo_Carnet() {
    return $this->Código_Carnet;
  }
  public function getSerial_Carnet() {
    return $this->Serial_Carnet;
  }
  public function getCédula_Persona() {
    return $this->Cédula_Persona;
  }












}


?>
