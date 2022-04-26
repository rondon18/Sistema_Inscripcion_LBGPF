<?php 

class bitacora {

	public function __construct(){}

	public function guardar_bitacora($idUsuarios){
		$conexion = conectarBD();
		date_default_timezone_set("America/Caracas");
		$fechaActual = date("Y-m-d");
		$horaActual = date("H:i:s");

		$links = $_SERVER['PHP_SELF'];

		$sql = "INSERT INTO `bitacora`(`idBitacora`, `idUsuarios`, `fechaInicioSesion`, `horaInicioSesion`, `linksVisitados`, `fechaFinalSesion`, `horaFinalSesion`) VALUES (
			NULL,
			'$idUsuarios',
			'$fechaActual',
			'$horaActual',
			'$links',
			NULL,
			NULL)";
		$conexion->query($sql) or die("error: ".$conexion->error);
		$idBitacora = $conexion->insert_id;
		desconectarBD($conexion);
		return $idBitacora;
	}

	public function actualizar_Bitacora($acciones){
		$conexion = conectarBD();
		$sql = "UPDATE `bitacora` SET 
		`linksVisitados`='$acciones'
		WHERE `idBitacora`='$idBitacora'";

		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectarBD($conexion);
	}

	public function cerrar_Bitacora($idBitacora){
		$conexion = conectarBD();

		$sql = "UPDATE `bitacora` SET 
		`fechaFinalSesion`='$fechaFinal',
		`horaFinalSesion`='$horaFinal' 
		WHERE `idBitacora`='$idBitacora'";
		
		$conexion->query($sql) or die("error: ".$conexion->error);
		desconectarBD($conexion);	
	}

}

 ?>