<?php 

include("conexion.php");

function mostrarTodo() {
	$conexion = conectarBD();


	$resultados = $conexion->query("SELECT * FROM usuarios");

	$listaUsuarios = [];

	while ($consulta = $resultados->fetch_object()) {
		$listaUsuarios[]=$consulta;    
	}

	desconectarBD($conexion);

	return $listaUsuarios;
}


$usuarios = mostrarTodo();

?>