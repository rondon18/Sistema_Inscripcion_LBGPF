<?php

session_start();

require("conexion.php");

require('../clases/personas.php');
require('../clases/representantes.php');
require('../clases/contactos-auxiliares.php');
require('../clases/usuario.php');
require('../clases/laborales.php');
require('../clases/económicos-representantes.php');
require('../clases/vivienda.php');

$conexion = conectarBD();

$persona = new Personas();
$persona_auxiliar = new Personas();

$usuario = new Usuarios();

if (isset($_POST['orden']) and $_POST['orden']) {

	$orden = $_POST['orden'];

	if ($orden == "Insertar") {

		/*

			Datos del representante

		*/

		#Persona
		$persona->setPrimer_Nombre($_POST['Primer_Nombre_U']);
		$persona->setSegundo_Nombre($_POST['Segundo_Nombre_U']);
		$persona->setPrimer_Apellido($_POST['Primer_Apellido_U']);
		$persona->setSegundo_Apellido($_POST['Segundo_Apellido_U']);
		$Cédula = $_POST['Tipo_Cédula_U'].$_POST['Cédula_U'];
		$persona->setCédula($Cédula);
		$persona->setFecha_Nacimiento($_POST['Fecha_Nacimiento_U']);
		#$persona->setLugar_Nacimiento($_POST['Lugar_Nacimiento_U']);
		$persona->setGénero($_POST['Género_U']);
		$persona->setCorreo_Electrónico($_POST['Correo_electrónico_U']);
		#$persona->setDirección($_POST['Dirección_U']);
		#$persona->setEstado_Civil($_POST['Estado_Civil_U']);

		$persona->insertarPersona();

		/*

			Datos del usuario

		*/

		#Usuario
		$usuario->setClave($_POST['Contraseña']);
		$usuario->setPregunta_Seg_1($_POST['Pregunta_Seg_1']);
		$usuario->setPregunta_Seg_2($_POST['Respuesta_1']);
		$usuario->setRespuesta_1($_POST['Pregunta_Seg_2']);
		$usuario->setRespuesta_2($_POST['Respuesta_2']);

		$usuario->setPrivilegios(2);#Se establese como 2 para todos los representantes
		$usuario->setCédula_Persona($persona->getCédula());

		$usuario->insertarUsuario();

		header('Location: ../index.php');
	}

	elseif ($orden == "Editar") {
		/*

			Datos personales

		*/

		#Persona
		$persona->setPrimer_Nombre($_POST['Primer_Nombre_U']);
		$persona->setSegundo_Nombre($_POST['Segundo_Nombre_U']);
		$persona->setPrimer_Apellido($_POST['Primer_Apellido_U']);
		$persona->setSegundo_Apellido($_POST['Segundo_Apellido_U']);
		$Cédula = $_POST['Tipo_Cédula_U'].$_POST['Cédula_U'];
		$persona->setCédula($Cédula);
		$persona->setFecha_Nacimiento($_POST['Fecha_Nacimiento_U']);
		#$persona->setLugar_Nacimiento($_POST['Lugar_Nacimiento_U']);
		$persona->setGénero($_POST['Género_U']);
		$persona->setCorreo_Electrónico($_POST['Correo_electrónico_U']);
		#$persona->setDirección($_POST['Dirección_U']);
		#$persona->setEstado_Civil($_POST['Estado_Civil_U']);

		$persona->editarPersona($_SESSION['persona']['idPersonas']);

		/*

			Datos del usuario

		*/

		#Usuario
		if ($_POST['Contraseña'] == $_POST['RepetirContraseña']) {
			$usuario->setClave($_POST['Contraseña']);
		}
		else {
			$usuario->setClave($_SESSION['usuario']['Clave']);
		}

		$usuario->setPregunta_Seg_1($_POST['Pregunta_Seg_1']);
		$usuario->setPregunta_Seg_2($_POST['Pregunta_Seg_2']);
		$usuario->setRespuesta_1($_POST['Respuesta_1']);
		$usuario->setRespuesta_2($_POST['Respuesta_2']);

		$usuario->setPrivilegios(2);#Se establese como 2 para todos los usuarios nuevos
		$usuario->setCédula_Persona($persona->getCédula());

		$usuario->editarUsuario($Cédula);

		/*

			Cambia las variables de Sesión para no reDirecciónar al usuario a iniciar Sesión

		*/
		$_SESSION['persona']['Primer_Nombre'] = $persona->getPrimer_Nombre();
		$_SESSION['persona']['Segundo_Nombre'] = $persona->getSegundo_Nombre();
		$_SESSION['persona']['Primer_Apellido'] = $persona->getPrimer_Apellido();
		$_SESSION['persona']['Segundo_Apellido'] = $persona->getSegundo_Apellido();
		$_SESSION['persona']['Cédula'] = $persona->getCédula();
		$_SESSION['persona']['Fecha_Nacimiento'] = $persona->getFecha_Nacimiento();
		$_SESSION['persona']['Lugar_Nacimiento'] = $persona->getLugar_Nacimiento();
		$_SESSION['persona']['Género'] = $persona->getGénero();
		$_SESSION['persona']['Correo_Electrónico'] = $persona->getCorreo_Electrónico();
		$_SESSION['persona']['Dirección'] = $persona->getDirección();
		$_SESSION['persona']['Estado_Civil'] = $persona->getEstado_Civil();

		require('../clases/bitácora.php');

		$bitácora = new bitácora();
		$_SESSION['acciones'] .= ',Edita perfil';
		$bitácora->actualizar_bitácora($_SESSION['acciones'],$_SESSION['idbitácora']);

		header('Location: ../lobby/index.php');
	}
	elseif ($orden == "Eliminar") {

		if (isset($_POST['DarseDeBaja'])) {

			$usuario->eliminarUsuario($_SESSION['persona']['Cédula']);

			require('../clases/bitácora.php');

			$bitácora = new bitácora();
			$_SESSION['acciones'] .= ',Se da de baja';
			$bitácora->actualizar_bitácora($_SESSION['acciones'],$_SESSION['idbitácora']);

			header('Location: logout.php');
		}
		elseif (isset($_POST['idUsuario'])) {
			$usuario->eliminarUsuario($_POST['idUsuario']);

			require('../clases/bitácora.php');

			$bitácora = new bitácora();
			$_SESSION['acciones'] .= ', Elimina un usuario';
			$bitácora->actualizar_bitácora($_SESSION['acciones'],$_SESSION['idbitácora']);

			header('Location: ../lobby/consultar.php');
		}
	}
	else {
		echo "La orden: ' ". $orden . " ' no es valida.";
	}
	//Esto hace lo suyo y manda de regreso a la pagina inicial

}
else {
	header('Location: ../index.php');
}


?>
