<?php

class CarnetPatria {

  private $idCarnet;
  private $Código_Carnet;
  private $Serial_Carnet;
  private $Cedula_Persona;

  public function __construct() {}

  public function insertarCarnetPatria() {
  	$conexion = conectarBD();

    $Código_Carnet = $this->getCódigo_Carnet();
    $Serial_Carnet = $this->getSerial_Carnet();
    $Cedula_Persona = $this->getCedula_Persona();

    $sql = "SELECT * FROM `carnet-patria` WHERE `Cedula_Persona` = '$Cedula_Persona'";

    $registro_existe = $conexion->query($sql);
    $resultado = $registro_existe->fetch_assoc();
    if ($resultado == NULL) {
      $sql = "INSERT INTO `carnet-patria`(`idCarnet`, `Código_Carnet`, `Serial_Carnet`, `Cedula_Persona`) VALUES (
        NULL,
        '$Código_Carnet',
        '$Serial_Carnet',
        '$Cedula_Persona'
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
    $Cedula_Persona = $this->getCedula_Persona();

    $sql = "UPDATE `carnet-patria` SET
    `Código_Carnet`='$Código_Carnet',
    `Serial_Carnet`='$Serial_Carnet',
    WHERE `Cedula_Persona`='$Cedula_Persona'";

    $conexion->query($sql) or die("error: ".$conexion->error);
    desconectarBD($conexion);
  }
  public function eliminarCarnetPatria() {
    $conexion = conectarBD();

    $Cedula_Persona = $this->getCedula_Persona();

    $sql = "DELETE FROM `carnet-patria` WHERE `Cedula_Persona` = '$Cedula_Persona'";

    $conexion->query($sql) or die("error: ".$conexion->error);
    desconectarBD($conexion);
  }
  public function consultarCarnetPatria($Cedula_Persona) {
  	$conexion = conectarBD();

    $sql = "SELECT * FROM `carnet-patria` WHERE `Cedula_Persona` = '$Cedula_Persona'";


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
  public function setCedula_Persona($Cedula_Persona) {
    $this->Cedula_Persona = $Cedula_Persona;
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
  public function getCedula_Persona() {
    return $this->Cedula_Persona;
  }












}


?>
