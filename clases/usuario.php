<?php

require_once("personas.php");

class Usuarios {
	private $idUsuarios;
	private $Clave;
	private $Privilegios;
	private $Cedula_Persona;

	public function __construct() {}

	public function insertarUsuario() {
		$conexion = conectarBD();

		$Clave = $this->getClave();
		$Privilegios = $this->getPrivilegios();
		$Cedula_Persona = $this->getCedula_Persona();

		$sql = "SELECT * FROM `usuarios` WHERE `Cedula_Persona` = '$Cedula_Persona'";

		$registro_existe = $conexion->query($sql);
		$resultado = $registro_existe->fetch_assoc();

		#Consulta si el registro ya existe para prevenir registros duplicados o excesivos
		if ($resultado == NULL) {
			$sql = "INSERT INTO `usuarios`(`idUsuarios`, `Clave`, `Privilegios`, `Cedula_Persona`) VALUES (
				NULL,
				'$Clave',
				'$Privilegios',
				'$Cedula_Persona'
			)";

			$conexion->query($sql) or die("error: ".$conexion->error);
			$this->setidUsuarios($conexion->insert_id);
		}
		elseif ($resultado != NULL) {
			$this->setidUsuarios($resultado['idUsuarios']);
		}
		desconectarBD($conexion);
	}
	public function editarUsuario($Cedula_Persona) {
		$conexion = conectarBD();

		$Clave = $this->getClave();

		$sql = "UPDATE `usuarios` SET
			`Clave`='$Clave'
		WHERE `Cedula_Persona`='$Cedula_Persona'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectarBD($conexion);
	}
	public function eliminarUsuario($Cedula_Persona) {
		$conexion = conectarBD();

		$sql = "DELETE FROM `usuarios` WHERE `Cedula_Persona`='$Cedula_Persona'";

		$conexion->query($sql) or die("error: ".$conexion->error);

		desconectarBD($conexion);
	}
	public function consultarUsuario($Cedula_Persona) {
		$conexion = conectarBD();

		$sql = "SELECT * FROM `usuarios` WHERE `Cedula_Persona`='$Cedula_Persona'";

		$consulta_usuario = $conexion->query($sql) or die("error: ".$conexion->error);			
		$usuario = $consulta_usuario->fetch_assoc();

		desconectarBD($conexion);

		return $usuario;
	}

	public function setidUsuarios($idUsuarios) {
		$this->idUsuarios = $idUsuarios;
	}
	public function setClave($Clave) {
		$this->Clave = $Clave;
	}
	public function setPrivilegios($Privilegios) {
		$this->Privilegios = $Privilegios;
	}
	public function setCedula_Persona($Cedula_Persona) {
		$this->Cedula_Persona = $Cedula_Persona;
	}

	public function getidUsuarios() {
		return $this->idUsuarios;
	}
	public function getClave() {
		return $this->Clave;
	}
	public function getPrivilegios() {
		return $this->Privilegios;
	}
	public function getCedula_Persona() {
		return $this->Cedula_Persona;
	}

}
?>
