<?php 

require("conexion.php");
require("../clases/personas.php");
require("../clases/representantes.php");
require("../clases/economicos-representantes.php");
require("../clases/laborales-representantes.php");
require("../clases/telefonos.php");

if (isset($_POST['cedula'],$_POST['clave']) and ($_POST['cedula'] != "" and $clave = $_POST['clave'] != "")) {
	

	$cedula = $_POST['cedula'];
	$clave = $_POST['clave'];

	$conexion = conectarBD();

	//Consulto si la cedula existe en la BD
	$sql = "SELECT * FROM `personas` WHERE `Cédula` = '$cedula'";
	
	if ($consulta_persona = $conexion->query($sql)) {

		$resultado_persona = $consulta_persona->fetch_assoc();

		//consulto si la contraseña es correcta
		$sql = "SELECT * FROM `usuarios` WHERE `Cedula_Persona` = '$cedula' AND `Clave` =$clave";
		#$sql = "SELECT * FROM `usuarios` WHERE `Cedula_Persona` = '$cedula'";


		$registro_existe = $conexion->query($sql);
		$resultado_usuario = $registro_existe->fetch_assoc();

		#Consulta si el registro ya existe para prevenir registros duplicados o excesivos
		if ($resultado_usuario == NULL) {
			header("Location: ../index.php");
		}
		else{
			#se crea variable de sesión con los datos del usuario
			$_SESSION['usuario'] = $resultado_usuario;

			#Si los privilegios del usuario son de administrador solo se halan datos de persona, más no de representante
			$persona = new Personas();
			$datos_persona = $persona->consultarPersona($cedula);

			$_SESSION['persona'] = $datos_persona;
			foreach ($_SESSION['persona'] as $llave => $dato) {
				echo "<p style='color:blue;'>".$llave." - ".$dato."<p>";
			}
			
			if ($_SESSION['usuario']['Privilegios'] == 2) {
				
				$representante = new Representantes();

				$datos_representante = $representante->consultarRepresentante($cedula);

				$_SESSION['representante'] = $datos_representante;

				$telefonos = new Telefonos();

				$telefonos_representante = $telefonos->consultarTelefonos($cedula);
				#la variable telefonos_representante es una matriz asociativa

				foreach ($telefonos_representante as $telefono) {
					foreach ($telefono as $llave => $dato) {
						echo "<p>".$llave." - ".$dato."<p>";
					}
				}	

				$_SESSION['telefonos'] = $telefonos_representante;
			}

					
		}
		/*
		if ($consulta_usuario = $conexion->query($sql)) {
			
			$resultado_usuario = $consulta_usuario->fetch_assoc();

			if ($resultado_usuario and $clave == $resultado_usuario['Clave']) {
				

				$sql = "SELECT * FROM `representantes` WHERE `Cedula_Persona` = '$cedula'";
				$consulta_representante = $conexion->query($sql);
				$resultado_representante = $consulta_representante->fetch_assoc();
				
				$sql = "SELECT * FROM `contactos_auxiliares` WHERE `idRepresentante` = '$resultado_representante[0]'";
				$consulta_auxiliar = $conexion->query($sql);
				$resultado_auxiliar = $consulta_auxiliar->fetch_assoc();

				session_start();
				
				$_SESSION['persona'] = $resultado_persona;
				$_SESSION['representante'] = $resultado_representante;
				$_SESSION['auxiliar'] = $resultado_auxiliar;
				
				
				$_SESSION['login'] = "Sessión valida";

				header('Location: ../lobby/index.php');
			}
			else {
				header("Location: ../index.php");
			}	
		}
		else {
			header("Location: ../index.php");
			var_dump($consulta_usuario);
		}
		*/	
	}
	else {
		header("Location: ../index.php");
	}

	desconectarBD($conexion);	
}

?>