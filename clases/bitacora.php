<?php

class bitacora {

	public function __construct(){}

	public function guardar_bitacora($idUsuarios){
		$conexion = conectarBD();
		date_default_timezone_set("America/Caracas");
		$fechaActual = date("Y-m-d");
		$horaActual = date("H:i:s");

		$links = "Inicia sesión";

		$sql = "INSERT INTO `bitacora`(`idBitacora`, `idUsuarios`, `fechaInicioSesion`, `horaInicioSesion`, `linksVisitados`, `fechaFinalSesion`, `horaFinalSesion`) VALUES (
			NULL,
			'$idUsuarios',
			'$fechaActual',
			'$horaActual',
			'$links',
			NULL,
			NULL
		)";

		$conexion->query($sql) or die("error: ".$conexion->error);
		$idBitacora = $conexion->insert_id;

		desconectarBD($conexion);

		return $idBitacora;
	}

	public function actualizar_Bitacora($acciones,$idBitacora){

		$conexion = conectarBD();

		$sql = "UPDATE `bitacora` SET
		`linksVisitados`='$acciones'
		WHERE `idBitacora`='$idBitacora'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectarBD($conexion);
	}

	public function cerrar_Bitacora($idBitacora){
		$conexion = conectarBD();

		date_default_timezone_set("America/Caracas");
		$fechaFinal = date("Y-m-d");
		$horaFinal = date("H:i:s");

		$sql = "UPDATE `bitacora` SET
		`fechaFinalSesion`='$fechaFinal',
		`horaFinalSesion`='$horaFinal'
		WHERE `idBitacora`='$idBitacora'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectarBD($conexion);
	}

	public function mostrar_bitacora() {
			$conexion = conectarBD();

			$sql = "SELECT * FROM `bitacora` ORDER BY `idBitacora` DESC";

			$consulta_registros = $conexion->query($sql) or die("error: ".$conexion->error);
			$registros = $consulta_registros->fetch_all(MYSQLI_ASSOC);

			desconectarBD($conexion);

			return $registros;
	}
}

 ?>
