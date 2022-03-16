<?php 

require("conexion.php");
require("../clases/usuario.php");

if (isset($_POST['cedula'],$_POST['clave']) and ($_POST['cedula'] != "" and $clave = $_POST['clave'] != "")) {
	

	$cedula = $_POST['cedula'];
	$clave = $_POST['clave'];

	$conexion = conectarBD();

	//Consulto si la cedula existe en la BD
	$sql = "SELECT * FROM `personas` WHERE `Cédula` = '$cedula'";
	
	if ($consulta_persona = $conexion->query($sql)) {

		$resultado_persona = $consulta_persona->fetch_array();

		//consulto si la contraseña es correcta
		$sql = "SELECT * FROM `usuarios` WHERE `Cedula_Persona` = '$cedula'";
		
		if ($consulta_usuario = $conexion->query($sql)) {
			
			$resultado_usuario = $consulta_usuario->fetch_array();

			if ($resultado_usuario and $clave == $resultado_usuario[1]) {
				
				$sql = "SELECT * FROM `representantes` WHERE `Cedula_Persona` = '$cedula'";
				$consulta_representante = $conexion->query($sql);
				$resultado_representante = $consulta_representante->fetch_array();
				
				$sql = "SELECT * FROM `contactos_auxiliares` WHERE `idRepresentante` = '$resultado_representante[0]'";
				$consulta_auxiliar = $conexion->query($sql);
				$resultado_auxiliar = $consulta_auxiliar->fetch_array();

				session_start();
				
				$_SESSION['persona'] = $resultado_persona;
				$_SESSION['representante'] = $resultado_representante;
				$_SESSION['auxiliar'] = $resultado_auxiliar;
				$_SESSION['usuario'] = $resultado_usuario;
				
				$_SESSION['login'] = "Sessión valida";

				header('Location: ../lobby/index.php');
			}
			else {
				header("Location: ../index.php");
			}	
		}
		else {
			header("Location: ../index.php");
		}	
	}
	else {
		header("Location: ../index.php");
	}
	desconectarBD($conexion);	
}

?>