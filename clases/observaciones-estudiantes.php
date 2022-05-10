<?php

class Observaciones  {
  private
  private $idObservaciones;
  private $Social;
  private $Físico;
  private $Personal;
  private $Familiar;
  private $Académico;
  private $Otra;
  private $idEstudiantes;

  public function __construct() {}

  public function insertarObservaciones() {
    $conexion = conectarBD();

    $Social = $this->getSocial();
    $Físico = $this->getFísico();
    $Personal = $this->getPersonal();
    $Familiar = $this->getFamiliar();
    $Académico = $this->getAcadémico();
    $Otra = $this->getOtra();
    $idEstudiantes = $this->getidEstudiantes();

    $sql = "SELECT * FROM `estudiantes-observaciones` WHERE `idEstudiantes` = '$idEstudiantes'";
    $registro_existe = $conexion->query($sql);
    $resultado = $registro_existe->fetch_assoc();

    if ($resultado == NULL) {

      $sql ="INSERT INTO `estudiantes-observaciones`(`idObservaciones`, `Social`, `Físico`, `Personal`, `Familiar`, `Académico`, `Otra`, `idEstudiantes`)
      VALUES (
        NULL,
        '$Social',
        '$Físico',
        '$Personal',
        '$Familiar',
        '$Académico',
        '$Otra',
        '$idEstudiantes'
      )";

    	$conexion->query($sql) or die("error: ".$conexion->error);
      $this->setidEstudiantes($resultado['idEstudiantes']);
    }
    elseif ($resultado != NULL) {
      $this->setidEstudiantes($resultado['idEstudiantes']);
    }

    desconectarBD($conexion);

  }

  public function editarObservaciones($idEstudiantes) {
    $conexion = conectarBD();

    $Social = $this->getSocial();
    $Físico = $this->getFísico();
    $Personal = $this->getPersonal();
    $Familiar = $this->getFamiliar();
    $Académico = $this->getAcadémico();
    $Otra = $this->getOtra();

    $sql ="UPDATE `estudiantes-observaciones` SET
    `Social`='$Social',
    `Físico`='$Físico',
    `Personal`='$Personal',
    `Familiar`='$Familiar',
    `Académico`='$Académico',
    `Otra`='$Otra'
    WHERE `idEstudiantes`='$idEstudiantes'";

    $conexion->query($sql) or die("error: ".$conexion->error);

    desconectarBD($conexion);
  }

  public function consultarObservaciones() {
    $conexion = conectarBD();

    $sql = "SELECT * FROM `estudiantes-observaciones` WHERE `idEstudiantes` = '$idEstudiantes'";

    $busqueda = $conexion->query($sql) or die("error: ".$conexion->error);
		$observaciones = $resultado = $busqueda->fetch_assoc();
    
    desconectarBD($conexion);

    return $observaciones;
  }

  public function setidObservaciones($idObservaciones) {
    $this->idObservaciones = $idObservaciones;
  }
  public function setSocial($Social) {
    $this->Social = $Social;
  }
  public function setFísico($Físico) {
    $this->Físico = $Físico;
  }
  public function setPersonal($Personal) {
    $this->Personal = $Personal;
  }
  public function setFamiliar($Familiar) {
    $this->Familiar = $Familiar;
  }
  public function setAcadémico($Académico) {
    $this->Académico = $Académico;
  }
  public function setOtra($Otra) {
    $this->Otra = $Otra;
  }
  public function setidEstudiantes($idEstudiantes) {
    $this->idEstudiantes = $idEstudiantes;
  }

  public function getidObservaciones() {
    return $this->idObservaciones;
  }
  public function getSocial() {
    return $this->Social;
  }
  public function getFísico() {
    return $this->Físico;
  }
  public function getPersonal() {
    return $this->Personal;
  }
  public function getFamiliar() {
    return $this->Familiar;
  }
  public function getAcadémico() {
    return $this->Académico;
  }
  public function getOtra() {
    return $this->Otra;
  }
  public function getidEstudiantes() {
    return $this->idEstudiantes;
  }










}


 ?>
