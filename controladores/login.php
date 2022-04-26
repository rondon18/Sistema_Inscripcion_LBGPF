<?php

require("conexion.php");
require("../clases/personas.php");
require("../clases/representantes.php");
require("../clases/contactos-auxiliares.php");
require("../clases/economicos-representantes.php");
require("../clases/laborales-representantes.php");
require("../clases/vivienda-representantes.php");
require("../clases/telefonos.php");
require("../clases/bitacora.php");

if (isset($_POST['cedula'],$_POST['clave']) and ($_POST['cedula'] != "" and $clave = $_POST['clave'] != "")) {


	$cedula = $_POST['cedula'];
	$clave = $_POST['clave'];

	$conexion = conectarBD();

	//Consulto si la cedula existe en la BD
	$sql = "SELECT * FROM `personas` WHERE `Cédula` = '$cedula'";

	if ($consulta_persona = $conexion->query($sql)) {

		$resultado_persona = $consulta_persona->fetch_assoc();

		//consulto si la contraseña es correcta
		$sql = "SELECT * FROM `usuarios` WHERE `Cedula_Persona` = '$cedula' AND `Clave` = '$clave'";

		$registro_existe = $conexion->query($sql);
		$resultado_usuario = $registro_existe->fetch_assoc();

		if ($resultado_usuario == NULL) {
			header("Location: ../index.php");
		}
		else{
			session_start();

			#se crea variable de sesión con los datos del usuario
			$_SESSION['usuario'] = $resultado_usuario;

			$bitacora = new bitacora();

			$_SESSION['idBitacora'] = $bitacora->guardar_bitacora($_SESSION['usuario']['idUsuarios']);
			$_SESSION['acciones'] = "Inicia Sesión";

			#Si los privilegios del usuario son de administrador solo se halan datos de persona, más no de representante
			$persona = new Personas();
			$datos_persona = $persona->consultarPersona($cedula);

			$_SESSION['persona'] = $datos_persona;

			#Solo si el usuario es un representante
			if ($_SESSION['usuario']['Privilegios'] == 2) {

				#Datos del representante
				$representante = new Representantes();

				$datos_representante = $representante->consultarRepresentante($cedula);

				$_SESSION['representante'] = $datos_representante;

				#Telefonos del representante
				$telefonos = new Telefonos();

				$telefonos_representante = $telefonos->consultarTelefonos($cedula);
				#la variable telefonos_representante es una matriz asociativa

				$_SESSION['telefonos'] = $telefonos_representante;

				#Datos economicos
				$economicos = new DatosEconomicos();

				$datos_economicos = $economicos->consultarDatosEconomicos($_SESSION['representante']['idRepresentantes']);


				$_SESSION['datos_economicos'] = $datos_economicos;

				#Datos laborales
				$laborales 	= new DatosLaborales();

				$datos_laborales = $laborales->consultarDatosLaborales($_SESSION['representante']['idRepresentantes']);


				$_SESSION['datos_laborales'] = $datos_laborales;

				#Datos de vivienda
				$vivienda 	= new DatosVivienda();

				$datos_vivienda = $vivienda->consultarDatosVivienda($_SESSION['representante']['idRepresentantes']);


				$_SESSION['datos_vivienda'] = $datos_vivienda;

				#Contacto auxiliar


				$contacto_aux = new ContactoAuxiliar();

				$datos_contacto_aux = $contacto_aux->consultarContactoAuxiliar($_SESSION['representante']['idRepresentantes']);

				$persona_aux = new Personas();

				$datos_persona_aux = $persona_aux->consultarPersona($datos_contacto_aux['Cédula_Persona']);

				#Telefonos del representante
				$telefonos_aux = new Telefonos();

				$telefonos_contacto_aux = $telefonos_aux->consultarTelefonos($datos_contacto_aux['Cédula_Persona']);
				#la variable telefonos_representante es una matriz asociativa

				#Une todo esto en una sola matriz
				$_SESSION['ContactoAuxiliar'] = $ContactoAuxiliar = [$datos_persona_aux,$datos_contacto_aux,$telefonos_contacto_aux];
			}

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
