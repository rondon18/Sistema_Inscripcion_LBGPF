<?php

require_once("personas.php");

class Usuarios {
	private $idUsuarios;
	private $Clave;
	private $Privilegios;
	private $Pregunta_Seg_1;
	private $Pregunta_Seg_2;
	private $Respuesta_1;
	private $Respuesta_2;
	private $Cedula_Persona;

	public function __construct() {}

	public function insertarUsuario() {
		$conexion = conectarBD();

		$Clave = $this->getClave();
		$Privilegios = $this->getPrivilegios();
		$Pregunta_Seg_1 = $this->getPregunta_Seg_1();
		$Pregunta_Seg_2 = $this->getPregunta_Seg_2();
		$Respuesta_1 = $this->getRespuesta_1();
		$Respuesta_2 = $this->getRespuesta_2();
		$Cedula_Persona = $this->getCedula_Persona();

		$sql = "SELECT * FROM `usuarios` WHERE `Cedula_Persona` = '$Cedula_Persona'";

		$registro_existe = $conexion->query($sql);
		$resultado = $registro_existe->fetch_assoc();

		#Consulta si el registro ya existe para prevenir registros duplicados o excesivos
		if ($resultado == NULL) {
			#INSERT INTO `usuarios`(`idUsuarios`, `Clave`, `Privilegios`, `Pregunta_Seg_1`, `Pregunta_Seg_2`, `Respuesta_1`, `Respuesta_2`, `Cedula_Persona`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]')
			$sql = "INSERT INTO `usuarios`(`idUsuarios`, `Clave`, `Privilegios`, `Pregunta_Seg_1`, `Pregunta_Seg_2`, `Respuesta_1`, `Respuesta_2`,`Cedula_Persona`) VALUES (
				NULL,
				'$Clave',
				'$Privilegios',
				'$Pregunta_Seg_1',
				'$Pregunta_Seg_2',
				'$Respuesta_1',
				'$Respuesta_2',
				'$Cedula_Persona'
			)";
			echo $sql;

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
	public function mostrarUsuarios() {
		$conexion = conectarBD();

		$sql = "SELECT * FROM `personas`,`usuarios` WHERE `usuarios`.`Cedula_Persona` = `personas`.`Cédula`";

		$consulta_usuarios = $conexion->query($sql) or die("error: ".$conexion->error);
		$usuarios = $consulta_usuarios->fetch_all(MYSQLI_ASSOC);

		#Hace un arreglo de arreglos para contener los campos de la persona
		$lista_usuarios = [];
		foreach ($usuarios as $usuario) {
			$lista_usuarios[]= $usuario;
		}

		desconectarBD($conexion);

		return $lista_usuarios;
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
	public function setPregunta_Seg_1($Pregunta_Seg_1) {
		$this->Pregunta_Seg_1 = $Pregunta_Seg_1;
	}
	public function setPregunta_Seg_2($Pregunta_Seg_2) {
		$this->Pregunta_Seg_2 = $Pregunta_Seg_2;
	}
	public function setRespuesta_1($Respuesta_1) {
		$this->Respuesta_1 = $Respuesta_1;
	}
	public function setRespuesta_2($Respuesta_2) {
		$this->Respuesta_2 = $Respuesta_2;
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
	public function getPregunta_Seg_1() {
		return $this->Pregunta_Seg_1;
	}
	public function getPregunta_Seg_2() {
		return $this->Pregunta_Seg_2;
	}
	public function getRespuesta_1() {
		return $this->Respuesta_1;
	}
	public function getRespuesta_2() {
		return $this->Respuesta_2;
	}
	public function getCedula_Persona() {
		return $this->Cedula_Persona;
	}

}
?>
