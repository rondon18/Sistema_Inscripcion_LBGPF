<?php

session_start();
if (!$_SESSION["login"]) {
	header("Location: ../index.php");
	exit();
}

require("conexion.php");

    $cedulaC=$_REQUEST['cedula'];
	$claveC=md5($_REQUEST['clave']);
	class AutenticarUsuario {

	private $idUsuarios;
	private $Clave;
	private $Cedula_Persona;

	public function __construct() {}

	   public function autenticar ($idUsuario, $cl){

	   	$conexion = conectarBD();

		  $sql="SELECT * FROM `usuarios` WHERE idUsuarios='$usuarioBitacora' AND `Clave`='$cl'";

	       $stmt=$conexion->ejecutar($sql);
		   $numeroDeRegistros=$conexion->contarRegistros($stmt);
		   if ($numeroDeRegistros>0) {
	       	 $row=mysqli_fetch_array($stmt);
			 session_start();
			 $_SESSION["usuario"]=$row["idUsuarios"];
			 $this->actualizarBitacora($u);
			 header ("Location:../lobby/index.php");
		  }else{
		  	 header("Location:../index.php");
	      }
		  desconectarBD($conexion);
	   }

	  public function actualizarBitacora($idUsuario){
            $fechaInicioSesion = date("d-m-y");
			$horaInicioSesion  = date("H:i:s");
			$links = $_SERVER['PHP_SELF'];
			$sqlBitacora= "INSERT INTO `bitacora` (`usuarioBitacora`, `fechaIncioSesion`, `horaInicioSesion`, `linkVisitados`,
				`fechaFinalSesion`, `horaFinalSesion`) VALUES ('$idUsuarios','$fechaInicioSesion', '$horaInicioSesion',
			 	'$links', '', '')" ;
			$conexion = conectarBD();
	        $stmtBitacora=$conexion->ejecutar($sqlBitacora);
	  }
	}

	#Se crea
	$_SESSION['registro'] = [];


	#cuando entra al lobby
	$_SESSION['registro'][] = "menú principal";

	#cuando entra al lobby
	$_SESSION['registro'][] = "perfil";

	#cuando entra al lobby
	$_SESSION['registro'][] = "edita perfil";

	foreach ($_SESSION['registro'] as $registro) {
		var_dump($registro);
	}

?>
