<?php

require("conexion.php");
require("../clases/personas.php");
require("../clases/representantes.php");
require("../clases/contactos-auxiliares.php");
require("../clases/economicos-representantes.php");
require("../clases/laborales-representantes.php");
require("../clases/vivienda-representantes.php");
require("../clases/telefonos.php");
require("../clases/bitacora.php");

if (isset($_POST['cedula'],$_POST['clave']) and ($_POST['cedula'] != "" and $clave = $_POST['clave'] != "")) {

	$cedula = $_POST['Tipo_Cédula'].$_POST['cedula'];
	$clave = $_POST['clave'];

	$conexion = conectarBD();

	//Consulto si la cedula existe en la BD
	$sql = "SELECT * FROM `personas` WHERE `Cédula` = '$cedula'";

	if ($consulta_persona = $conexion->query($sql)) {

		$resultado_persona = $consulta_persona->fetch_assoc();

		//consulto si la contraseña es correcta
		$sql = "SELECT * FROM `usuarios` WHERE `Cedula_Persona` = '$cedula' AND `Clave` = '$clave'";

		$registro_existe = $conexion->query($sql);
		$resultado_usuario = $registro_existe->fetch_assoc();

		if ($resultado_usuario == NULL) {
			header("Location: ../index.php");
		}
		else{
			session_start();

			#se crea variable de sesión con los datos del usuario
			$_SESSION['usuario'] = $resultado_usuario;

			$bitacora = new bitacora();

			$_SESSION['idBitacora'] = $bitacora->guardar_bitacora($_SESSION['usuario']['idUsuarios']);
			$_SESSION['acciones'] = "Inicia Sesión";

			#Si los privilegios del usuario son de administrador solo se halan datos de persona, más no de representante
			$persona = new Personas();
			$datos_persona = $persona->consultarPersona($cedula);

			$_SESSION['persona'] = $datos_persona;
			$_SESSION['login'] = "Sessión valida";

			header('Location: ../lobby/index.php');
		}
	}
	else {
		header("Location: ../index.php");
	}

	desconectarBD($conexion);
}

?>
