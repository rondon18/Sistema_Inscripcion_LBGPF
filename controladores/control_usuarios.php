<?php  

	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../index.php');
		exit();
	}

	require('../clases/bitacora.php');
	require('../controladores/conexion.php');
	
	require("../clases/personas.php");
	require("../clases/usuarios.php");
	
	// Instancia las clases bajo el patron singleton

	// personas
	$personas = new personas();
	$usuarios = new usuarios();

	// var_dump($_SESSION);
	
	if (isset($_SESSION['orden'])) {
		if ($_SESSION['orden'] == "insertar") {

			if (isset($_SESSION['datos_usuario_nuevo'])) {
				// code...
			
				// Datos de persona	
				$personas->set_cedula($_SESSION['datos_usuario_nuevo']["nacionalidad_u"].$_SESSION['datos_usuario_nuevo']["cedula_u"]);
				$personas->set_p_nombre($_SESSION['datos_usuario_nuevo']["p_nombre_u"]);
				$personas->set_s_nombre($_SESSION['datos_usuario_nuevo']["s_nombre_u"]);
				$personas->set_p_apellido($_SESSION['datos_usuario_nuevo']["p_apellido_u"]);
				$personas->set_s_apellido($_SESSION['datos_usuario_nuevo']["s_apellido_u"]);
				$personas->set_fecha_nacimiento($_SESSION['datos_usuario_nuevo']["fecha_nacimiento_u"]);
				$personas->set_genero($_SESSION['datos_usuario_nuevo']["genero_u"]);
				$personas->set_email($_SESSION['datos_usuario_nuevo']["email_u"]);

				// Inserta la persona
				$personas->insertar_persona();


				// datos de usuario

				$usuarios->set_cedula_persona($personas->get_cedula());
				$usuarios->set_rol($_SESSION['datos_usuario_nuevo']['rol_sistema']);
					

				// agrupacion de los cargos segun sus privilegios
				
				
				
				$tier_0 = [
					"Desarrollador(a)"
				];
				
				$tier_1 = [
					"Director(a)",
					"Subdirector(a)",
				];
				
				$tier_2 = [
					"Secretario(a)",
					"Coordinador(a) de primer año",
					"Coordinador(a) de segundo año",
					"Coordinador(a) de tercer año",
					"Coordinador(a) de cuarto año",
					"Coordinador(a) de quinto año",
					"Docente"
				];

				// Validacion del nivel de privilegios segun el rol de sistema asignado
				// Dependiendo de en que nivel esté englobado un rol se le asignan privilegios

				if (in_array($_SESSION['datos_usuario_nuevo']['rol_sistema'], $tier_0)) {
					$privilegios = 0;
				}
				elseif (in_array($_SESSION['datos_usuario_nuevo']['rol_sistema'], $tier_1)) {
					$privilegios = 1;
				}
				elseif (in_array($_SESSION['datos_usuario_nuevo']['rol_sistema'], $tier_2)) {
					$privilegios = 2;
				}

				$usuarios->set_privilegios($privilegios);
				$usuarios->set_contraseña($_SESSION['datos_usuario_nuevo']['clave']);
				$usuarios->set_pregunta_seg_1($_SESSION['datos_usuario_nuevo']['pregunta_seg_1']);
				$usuarios->set_respuesta_1($_SESSION['datos_usuario_nuevo']['respuesta_1']);
				$usuarios->set_pregunta_seg_2($_SESSION['datos_usuario_nuevo']['pregunta_seg_2']);
				$usuarios->set_respuesta_2($_SESSION['datos_usuario_nuevo']['respuesta_2']);
				$usuarios->insertar_usuarios();

				header('Location: ../lobby/consultar/index.php');
			}

		}
		elseif ($_SESSION['orden'] == "editar") {
			echo "n";
		}
		elseif ($_SESSION['orden'] == "eliminar") {
			echo "n";
		}
		else {

		}
	}

	


	

?> ["datos_usuario_nuevo"]

<?php

	// session_start();
	// if (!$_SESSION['login']) {
	// 	header('Location: ../index.php');
	// 	exit();
	// }

	// require("conexion.php");

	// require('../clases/personas.php');
	// require('../clases/representantes.php');
	// require('../clases/contactos-auxiliares.php');
	// require('../clases/usuario.php');
	// require('../clases/laborales.php');
	// require('../clases/económicos-representantes.php');
	// require('../clases/vivienda.php');

	// $conexion = conectarBD();

	// $persona = new Personas();
	// $persona_auxiliar = new Personas();

	// $usuario = new Usuarios();


	// // var_dump($_SESSION);


	// if (isset($_POST['orden']) and $_POST['orden']) {

	// 	$orden = $_POST['orden'];

	// 	if ($orden == "Insertar") {

	// 		/*

	// 			Datos del representante

	// 		*/

	// 		#Persona
	// 		$persona->setPrimer_Nombre($_POST['Primer_Nombre_U']);
	// 		$persona->setSegundo_Nombre($_POST['Segundo_Nombre_U']);
	// 		$persona->setPrimer_Apellido($_POST['Primer_Apellido_U']);
	// 		$persona->setSegundo_Apellido($_POST['Segundo_Apellido_U']);
	// 		$Cédula = $_POST['NacioNalidad_U'].$_POST['cedula_u'];
	// 		$persona->setCédula($Cédula);
	// 		$persona->setFecha_Nacimiento($_POST['Fecha_Nacimiento_U']);
	// 		#$persona->setLugar_Nacimiento($_POST['Lugar_Nacimiento_U']);
	// 		$persona->setgenero($_POST['genero_u']);
	// 		$persona->setCorreo_Electrónico($_POST['email_u']);
	// 		#$persona->setDirección($_POST['Dirección_U']);
	// 		#$persona->setEstado_Civil($_POST['Estado_Civil_U']);

	// 		$persona->insertarPersona();

	// 		/*

	// 			Datos del usuario

	// 		*/

	// 		#Usuario
	// 		$usuario->setClave($_POST['Contraseña']);
	// 		$usuario->setPregunta_Seg_1($_POST['Pregunta_Seg_1']);
	// 		$usuario->setPregunta_Seg_2($_POST['Pregunta_Seg_2']);
	// 		$usuario->setRespuesta_1($_POST['Respuesta_1']);
	// 		$usuario->setRespuesta_2($_POST['Respuesta_2']);

	// 		$usuario->setPrivilegios(2);#Se establese como 2 para todos los representantes
	// 		$usuario->setCédula_Persona($persona->getCédula());

	// 		$usuario->insertarUsuario();

	// 		header('Location: ../lobby/index.php');
	// 	}

	// 	elseif ($orden == "Editar") {
	// 		/*

	// 			Datos personales

	// 		*/

	// 		#Persona
	// 		$persona->setPrimer_Nombre($_POST['Primer_Nombre_U']);
	// 		$persona->setSegundo_Nombre($_POST['Segundo_Nombre_U']);
	// 		$persona->setPrimer_Apellido($_POST['Primer_Apellido_U']);
	// 		$persona->setSegundo_Apellido($_POST['Segundo_Apellido_U']);
	// 		$Cédula = $_POST['NacioNalidad_U'].$_POST['cedula_u'];
	// 		$persona->setCédula($Cédula);
	// 		$persona->setFecha_Nacimiento($_POST['Fecha_Nacimiento_U']);
	// 		#$persona->setLugar_Nacimiento($_POST['Lugar_Nacimiento_U']);
	// 		$persona->setgenero($_POST['genero_u']);
	// 		$persona->setCorreo_Electrónico($_POST['email_u']);
	// 		#$persona->setDirección($_POST['Dirección_U']);
	// 		#$persona->setEstado_Civil($_POST['Estado_Civil_U']);

	// 		$persona->editarPersona($_SESSION['persona']['idPersonas']);

	// 		/*

	// 			Datos del usuario

	// 		*/

	// 		#Usuario
	// 		if (
	// 			(!empty($_POST['Contraseña']) and !empty($_POST['RepetirContraseña'])) and ($_POST['Contraseña'] == $_POST['RepetirContraseña'])) {
	// 			$usuario->setClave($_POST['Contraseña']);
	// 		}
	// 		else {
	// 			$usuario->setClave($_SESSION['usuario']['Clave']);
	// 		}

	// 		$usuario->setPregunta_Seg_1($_POST['Pregunta_Seg_1']);
	// 		$usuario->setPregunta_Seg_2($_POST['Pregunta_Seg_2']);
	// 		$usuario->setRespuesta_1($_POST['Respuesta_1']);
	// 		$usuario->setRespuesta_2($_POST['Respuesta_2']);

	// 		$usuario->setPrivilegios(2);#Se establese como 2 para todos los usuarios nuevos
	// 		$usuario->setCédula_Persona($persona->getCédula());

	// 		$usuario->editarUsuario($Cédula);

	// 		/*

	// 			Cambia las variables de Sesión para no reDirecciónar al usuario a iniciar Sesión

	// 		*/
	// 		$_SESSION['persona']['Primer_Nombre'] = $persona->getPrimer_Nombre();
	// 		$_SESSION['persona']['Segundo_Nombre'] = $persona->getSegundo_Nombre();
	// 		$_SESSION['persona']['Primer_Apellido'] = $persona->getPrimer_Apellido();
	// 		$_SESSION['persona']['Segundo_Apellido'] = $persona->getSegundo_Apellido();
	// 		$_SESSION['persona']['Cédula'] = $persona->getCédula();
	// 		$_SESSION['persona']['Fecha_Nacimiento'] = $persona->getFecha_Nacimiento();
	// 		$_SESSION['persona']['Lugar_Nacimiento'] = $persona->getLugar_Nacimiento();
	// 		$_SESSION['persona']['Género'] = $persona->getgenero();
	// 		$_SESSION['persona']['Correo_Electrónico'] = $persona->getCorreo_Electrónico();
	// 		$_SESSION['persona']['Dirección'] = $persona->getDirección();
	// 		$_SESSION['persona']['Estado_Civil'] = $persona->getEstado_Civil();


	// 		$_SESSION['usuario']['Pregunta_Seg_1'] = $usuario->getPregunta_Seg_1();
	// 		$_SESSION['usuario']['Pregunta_Seg_2'] = $usuario->getPregunta_Seg_2();
	// 		$_SESSION['usuario']['Respuesta_1'] = $usuario->getRespuesta_1();
	// 		$_SESSION['usuario']['Respuesta_2'] = $usuario->getRespuesta_2();

	// 		require('../clases/bitacora.php');

	// 		$bitacora = new bitacora();
	// 		$_SESSION['acciones'] .= ',Edita perfil';
	// 		$bitacora->actualizar_bitacora($_SESSION['acciones'],$_SESSION['id_bitacora']);

	// 		header('Location: ../lobby/perfil/index.php');
	// 	}
	// 	elseif ($orden == "Eliminar") {

	// 		if (isset($_POST['DarseDeBaja'])) {

	// 			$usuario->eliminarUsuario($_SESSION['persona']['Cédula']);

	// 			require('../clases/bitacora.php');

	// 			$bitacora = new bitacora();
	// 			$_SESSION['acciones'] .= ',Se da de baja';
	// 			$bitacora->actualizar_bitacora($_SESSION['acciones'],$_SESSION['id_bitacora']);

	// 			header('Location: logout.php');
	// 		}
	// 		elseif (isset($_POST['idUsuario'])) {
	// 			$usuario->eliminarUsuario($_POST['idUsuario']);

	// 			require('../clases/bitacora.php');

	// 			$bitacora = new bitacora();
	// 			$_SESSION['acciones'] .= ', Elimina un usuario';
	// 			$bitacora->actualizar_bitacora($_SESSION['acciones'],$_SESSION['id_bitacora']);

	// 			header('Location: ../lobby/consultar/usuarios.php');
	// 		}
	// 	}
	// 	else {
	// 		echo "La orden: ' ". $orden . " ' no es valida.";
	// 	}
	// 	//Esto hace lo suyo y manda de regreso a la pagina inicial

	// }
	// else {
	// 	header('Location: ../index.php');
	// // }


?>
