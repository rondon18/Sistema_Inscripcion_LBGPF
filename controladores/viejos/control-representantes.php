<?php

session_start();

require("conexion.php");

require('../clases/personas.php');
require('../clases/representantes.php');
require('../clases/contactos-auxiliares.php');
require('../clases/usuario.php');
require('../clases/laborales-representantes.php');
require('../clases/económicos-representantes.php');
require('../clases/vivienda-representantes.php');

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
		$Cédula = $_POST['NacioNalidad_U'].$_POST['cedula_u'];
		$persona->setCédula($Cédula);
		$persona->setFecha_Nacimiento($_POST['Fecha_Nacimiento_U']);
		$persona->setLugar_Nacimiento($_POST['Lugar_Nacimiento_U']);
		$persona->setgenero($_POST['genero_u']);
		$persona->setCorreo_Electrónico($_POST['email_u']);
		$persona->setDirección($_POST['Dirección_U']);
		$persona->setEstado_Civil($_POST['Estado_Civil_U']);

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
		$Cédula = $_POST['NacioNalidad_U'].$_POST['cedula_u'];
		$persona->setCédula($Cédula);
		$persona->setFecha_Nacimiento($_POST['Fecha_Nacimiento_U']);
		#$persona->setLugar_Nacimiento($_POST['Lugar_Nacimiento_U']);
		$persona->setgenero($_POST['genero_u']);
		$persona->setCorreo_Electrónico($_POST['email_u']);
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
		$_SESSION['persona']['Género'] = $persona->getgenero();
		$_SESSION['persona']['Correo_Electrónico'] = $persona->getCorreo_Electrónico();
		$_SESSION['persona']['Dirección'] = $persona->getDirección();
		$_SESSION['persona']['Estado_Civil'] = $persona->getEstado_Civil();

		require('../clases/bitacora.php');

		$bitacora = new bitacora();
		$_SESSION['acciones'] .= ',Edita perfil';
		$bitacora->actualizar_bitacora($_SESSION['acciones'],$_SESSION['id_bitacora']);

		header('Location: ../lobby/index.php');
	}
	elseif ($orden == "Eliminar") {

		if (isset($_POST['DarseDeBaja'])) {

			$usuario->eliminarUsuario($_SESSION['persona']['Cédula']);

			require('../clases/bitacora.php');

			$bitacora = new bitacora();
			$_SESSION['acciones'] .= ',Se da de baja';
			$bitacora->actualizar_bitacora($_SESSION['acciones'],$_SESSION['id_bitacora']);

			header('Location: logout.php');
		}
		elseif (isset($_POST['idUsuario'])) {
			$usuario->eliminarUsuario($_POST['idUsuario']);

			require('../clases/bitacora.php');

			$bitacora = new bitacora();
			$_SESSION['acciones'] .= ', Elimina un usuario';
			$bitacora->actualizar_bitacora($_SESSION['acciones'],$_SESSION['id_bitacora']);

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
