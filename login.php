<?php 

require_once("php/conexion.php");

function login($cedula,$clave) {
	$conexion = conectarBD();

	$sql = "SELECT * FROM usuarios WHERE Cedula = $cedula";
	
	if ($consulta = $conexion->query($sql)) {
		
		$resultado = $consulta->fetch_object();

		desconectarBD($conexion);

		if ($resultado and $clave == $resultado->Clave) {
			
			session_start();
			$_SESSION['usuario'] = $resultado;
			
			return True;
		}
		else {
			return False;
		}		
	
	}
	else {
		return False;
	}





	
}


?>