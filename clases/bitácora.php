<?php

class bitácora {

	public function __construct(){}

	public function guardar_bitácora($idUsuarios){
		$conexion = conectarBD();
		date_default_timezone_set("America/Caracas");
		$fechaActual = date("Y-m-d");
		$horaActual = date("H:i:s");

		$links = "Inicia sesión";

		$sql = "INSERT INTO `bitácora`(`idbitácora`, `idUsuarios`, `fechaIniciosesión`, `horaIniciosesión`, `linksVisitados`, `fechaFinalsesión`, `horaFinalsesión`) VALUES (
			NULL,
			'$idUsuarios',
			'$fechaActual',
			'$horaActual',
			'$links',
			NULL,
			NULL
		)";

		$conexion->query($sql) or die("error: ".$conexion->error);
		$idbitácora = $conexion->insert_id;

		desconectarBD($conexion);

		return $idbitácora;
	}

	public function actualizar_bitácora($acciones,$idbitácora){

		$conexion = conectarBD();

		$sql = "UPDATE `bitácora` SET
		`linksVisitados`='$acciones'
		WHERE `idbitácora`='$idbitácora'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectarBD($conexion);
	}

	public function cerrar_bitácora($idbitácora){
		$conexion = conectarBD();

		date_default_timezone_set("America/Caracas");
		$fechaFinal = date("Y-m-d");
		$horaFinal = date("H:i:s");

		$sql = "UPDATE `bitácora` SET
		`fechaFinalsesión`='$fechaFinal',
		`horaFinalsesión`='$horaFinal'
		WHERE `idbitácora`='$idbitácora'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectarBD($conexion);
	}

	public function mostrar_bitácora() {
			$conexion = conectarBD();

			$sql = "SELECT * FROM `bitácora` ORDER BY `idbitácora` DESC";

			$consulta_registros = $conexion->query($sql) or die("error: ".$conexion->error);
			$registros = $consulta_registros->fetch_all(MYSQLI_ASSOC);

			desconectarBD($conexion);

			return $registros;
	}
}

 ?>
