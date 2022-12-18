<?php

class bitacora {

	public function __construct(){}

	public function guardar_bitacora($idUsuarios){
		$conexion = conectarBD();
		date_default_timezone_set("America/Caracas");
		$fechaActual = date("Y-m-d");
		$horaActual = date("H:i:s");

		$links = "Inicia Sesión";

		$sql = "
		INSERT INTO `bitacora`
		(
			`id_bitacora`, 
			`idUsuarios`, 
			`fechaInicioSesión`, 
			`horaInicioSesión`, 
			`linksVisitados`, 
			`fechaFinalSesión`, 
			`horaFinalSesión`
		) 
		VALUES (
			NULL,
			'$idUsuarios',
			'$fechaActual',
			'$horaActual',
			'$links',
			NULL,
			NULL
		)";

		$conexion->query($sql) or die("error: ".$conexion->error);
		$id_bitacora = $conexion->insert_id;

		desconectarBD($conexion);

		return $id_bitacora;
	}

	public function actualizar_bitacora($acciones,$id_bitacora){

		$conexion = conectarBD();

		$sql = "UPDATE `bitacora` SET
		`linksVisitados`='$acciones'
		WHERE `id_bitacora`='$id_bitacora'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectarBD($conexion);
	}

	public function cerrar_bitacora($id_bitacora){
		$conexion = conectarBD();

		date_default_timezone_set("America/Caracas");
		$fechaFinal = date("Y-m-d");
		$horaFinal = date("H:i:s");

		$sql = "UPDATE `bitacora` SET
		`fechaFinalSesión`='$fechaFinal',
		`horaFinalSesión`='$horaFinal'
		WHERE `id_bitacora`='$id_bitacora'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectarBD($conexion);
	}

	public function mostrar_bitacora() {
			$conexion = conectarBD();

			$sql = "SELECT * FROM `bitacora` ORDER BY `id_bitacora` DESC";

			$consulta_registros = $conexion->query($sql) or die("error: ".$conexion->error);
			$registros = $consulta_registros->fetch_all(MYSQLI_ASSOC);

			desconectarBD($conexion);

			return $registros;
	}
}

 ?>
