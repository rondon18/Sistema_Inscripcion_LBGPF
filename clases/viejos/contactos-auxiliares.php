<?php

class ContactoAuxiliar {

	private $idContactoAuxiliar;
	private $Primer_Nombre;
	private $Segundo_Nombre;
	private $Primer_Apellido;
	private $Segundo_Apellido;
	private $Relación;
	private $Prefijo;
	private $Número_Telefónico;	
	private $idRepresentante;
	private $idEstudiantes;	

	public function __construct(){}

	public function insertarContactoAuxiliar() {
		$conexion = conectarBD();

		$Primer_Nombre = $this->getPrimer_Nombre();
		$Segundo_Nombre = $this->getSegundo_Nombre();
		$Primer_Apellido = $this->getPrimer_Apellido();
		$Segundo_Apellido = $this->getSegundo_Apellido();						
		$Relación = $this->getRelación();
		$Prefijo = $this->getPrefijo();
		$Número_Telefónico = $this->getNúmero_Telefónico();		

		$idRepresentante = $this->getidRepresentante();
		$idEstudiantes = $this->getidEstudiantes();		


		$sql = "SELECT * FROM `contactos_auxiliares` WHERE `idRepresentante` = '$idRepresentante' AND `idEstudiantes` = '$idEstudiantes'";

		$registro_existe = $conexion->query($sql);
		$resultado = $registro_existe->fetch_assoc();

		if ($resultado == NULL) {
			$sql = "INSERT INTO `contactos_auxiliares`(`idContactoAuxiliar`, `Primer_Nombre`, `Segundo_Nombre`, `Primer_Apellido`, `Segundo_Apellido`, `Relación`, `Prefijo`, `Número_Telefónico`, `idRepresentante`, `idEstudiantes`) VALUES (
				NULL,
				'$Primer_Nombre',
				'$Segundo_Nombre',
				'$Primer_Apellido',
				'$Segundo_Apellido', 
				'$Relación',
				'$Prefijo',
				'$Número_Telefónico',
				'$idRepresentante',
				'$idEstudiantes'
			)";

			$conexion->query($sql) or die("error: ".$conexion->error);
			$this->setidContactoAuxiliar($conexion->insert_id);
		}
		elseif ($resultado != NULL) {
			$this->setidContactoAuxiliar($resultado['idContactoAuxiliar']);
		}
		desconectarBD($conexion);
	}
	public function editarContactoAuxiliar() {

		$idContactoAuxiliar = $this->getidContactoAuxiliar();
		$Primer_Nombre = $this->getPrimer_Nombre();
		$Segundo_Nombre = $this->getSegundo_Nombre();
		$Primer_Apellido = $this->getPrimer_Apellido();
		$Segundo_Apellido = $this->getSegundo_Apellido();
		$Relación = $this->getRelación();
		$Prefijo = $this->getPrefijo();
		$Número_Telefónico = $this->getNúmero_Telefónico();

		$conexion = conectarBD();

		$sql = "UPDATE `contactos_auxiliares` SET
				`Primer_Nombre`='$Primer_Nombre',
				`Segundo_Nombre`='$Segundo_Nombre',
				`Primer_Apellido`='$Primer_Apellido',
				`Segundo_Apellido`='$Segundo_Apellido',
				`Relación`='$Relación',
				`Prefijo`='$Prefijo',
				`Número_Telefónico`='$Número_Telefónico'								
			WHERE `idContactoAuxiliar`='$idContactoAuxiliar'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectarBD($conexion);
	}
	public function consultarContactoAuxiliar($idRepresentante,$idEstudiantes) {
		$conexion = conectarBD();

		$sql = "SELECT * FROM `contactos_auxiliares` WHERE `idRepresentante` = '$idRepresentante' AND `idEstudiantes` = '$idEstudiantes'";

		$consulta_persona = $conexion->query($sql) or die("error: ".$conexion->error);
		$persona = $consulta_persona->fetch_assoc();

		desconectarBD($conexion);
		return $persona;
	}
	public function mostrarContactosAuxiliares() {
		$conexion = conectarBD();

		$sql = "SELECT * FROM `representantes`,`contactos_auxiliares` WHERE `representantes`.`idRepresentantes` = `contactos_auxiliares`.`idRepresentante`";

		$consulta = $conexion->query($sql) or die("error: ".$conexion->error);
		$personas = $consulta->fetch_all(MYSQLI_ASSOC);

		#Hace un arreglo de arreglos para contener los campos
		$lista_personas = [];
		foreach ($personas as $persona) {
			$lista_personas[]= $persona;
		}

		desconectarBD($conexion);
		return $lista_personas;
	}

	public function setidContactoAuxiliar($idContactoAuxiliar) {
		$this->idContactoAuxiliar = $idContactoAuxiliar;
	}
	public function setPrimer_Nombre($Primer_Nombre) {
		$this->Primer_Nombre = $Primer_Nombre;
	}	
	public function setSegundo_Nombre($Segundo_Nombre) {
		$this->Segundo_Nombre = $Segundo_Nombre;
	}	
	public function setPrimer_Apellido($Primer_Apellido) {
		$this->Primer_Apellido = $Primer_Apellido;
	}
	public function setSegundo_Apellido($Segundo_Apellido) {
		$this->Segundo_Apellido = $Segundo_Apellido;
	}
	public function setRelación($Relación) {
		$this->Relación = $Relación;
	}
	public function setPrefijo($Prefijo) {
		$this->Prefijo = $Prefijo;
	}
	public function setNúmero_Telefónico($Número_Telefónico) {
		$this->Número_Telefónico = $Número_Telefónico;
	}			
	public function setidRepresentante($idRepresentante) {
		$this->idRepresentante = $idRepresentante;
	}
	public function setidEstudiantes($idEstudiantes) {
		$this->idEstudiantes = $idEstudiantes;
	}	

	public function getidContactoAuxiliar() {
		return $this->idContactoAuxiliar;
	}
	public function getPrimer_Nombre() {
		return $this->Primer_Nombre;
	}
	public function getSegundo_Nombre() {
		return $this->Segundo_Nombre;
	}
	public function getPrimer_Apellido() {
		return $this->Primer_Apellido;
	}
	public function getSegundo_Apellido() {
		return $this->Segundo_Apellido;
	}
	public function getRelación() {
		return $this->Relación;
	}
	public function getPrefijo() {
		return $this->Prefijo;
	}
	public function getNúmero_Telefónico() {
		return $this->Número_Telefónico;
	}

	public function getidRepresentante() {
		return $this->idRepresentante;
	}
	public function getidEstudiantes() {
		return $this->idEstudiantes;
	}



}



?>
