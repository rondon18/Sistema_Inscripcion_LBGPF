<?php

require("conexion.php");
require("../clases/personas.php");
require("../clases/representantes.php");
require("../clases/contactos-auxiliares.php");
require("../clases/económicos-representantes.php");
require("../clases/laborales-representantes.php");
require("../clases/vivienda-representantes.php");
require("../clases/Teléfonos.php");
require("../clases/bitácora.php");

if (isset($_POST['Cédula'],$_POST['clave']) and ($_POST['Cédula'] != "" and $clave = $_POST['clave'] != "")) {

	$Cédula = $_POST['Tipo_Cédula'].$_POST['Cédula'];
	$clave = $_POST['clave'];

	$conexion = conectarBD();

	//Consulto si la Cédula existe en la BD
	$sql = "SELECT * FROM `personas` WHERE `Cédula` = '$Cédula'";

	if ($consulta_persona = $conexion->query($sql)) {

		$resultado_persona = $consulta_persona->fetch_assoc();

		//consulto si la contraseña es correcta
		$sql = "SELECT * FROM `usuarios` WHERE `Cédula_Persona` = '$Cédula' AND `Clave` = '$clave'";

		$registro_existe = $conexion->query($sql);
		$resultado_usuario = $registro_existe->fetch_assoc();

		if ($resultado_usuario == NULL) {
			header("Location: ../index.php");
		}
		else{
			session_start();

			#se crea variable de sesión con los datos del usuario
			$_SESSION['usuario'] = $resultado_usuario;

			$bitácora = new bitácora();

			$_SESSION['idbitácora'] = $bitácora->guardar_bitácora($_SESSION['usuario']['idUsuarios']);
			$_SESSION['acciones'] = "Inicia Sesión";

			#Si los privilegios del usuario son de administrador solo se halan datos de persona, más no de representante
			$persona = new Personas();
			$datos_persona = $persona->consultarPersona($Cédula);

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
