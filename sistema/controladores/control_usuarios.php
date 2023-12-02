<?php  

	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../index.php?exito');
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
				$clave = hash("sha256", $_SESSION['datos_usuario_nuevo']['clave']);
				$usuarios->set_contrasenia($clave);
				$usuarios->set_pregunta_seg_1($_SESSION['datos_usuario_nuevo']['pregunta_seg_1']);
				$usuarios->set_respuesta_1($_SESSION['datos_usuario_nuevo']['respuesta_1']);
				$usuarios->set_pregunta_seg_2($_SESSION['datos_usuario_nuevo']['pregunta_seg_2']);
				$usuarios->set_respuesta_2($_SESSION['datos_usuario_nuevo']['respuesta_2']);
				$usuarios->insertar_usuarios();

				header('Location: ../lobby/consultar/index.php?exito');
			}

		}
		

		// De editar perfil. Se debe cambiar
		elseif ($_SESSION['orden'] == "editar") {

			// cedula actual
			$c_actual = $_SESSION['editar_usuario'];

			// Datos de persona	
			$personas->set_cedula($c_actual);
			$personas->set_p_nombre($_SESSION['datos_nuevos']["p_nombre_u"]);
			$personas->set_s_nombre($_SESSION['datos_nuevos']["s_nombre_u"]);
			$personas->set_p_apellido($_SESSION['datos_nuevos']["p_apellido_u"]);
			$personas->set_s_apellido($_SESSION['datos_nuevos']["s_apellido_u"]);
			$personas->set_fecha_nacimiento($_SESSION['datos_nuevos']["fecha_nacimiento_u"]);
			$personas->set_genero($_SESSION['datos_nuevos']["genero_u"]);
			$personas->set_email($_SESSION['datos_nuevos']["email_u"]);
			$personas->editar_persona($c_actual);

			// Inserta la persona


			// datos de usuario

			$usuarios->set_cedula_persona($personas->get_cedula());

			$usuarios->set_pregunta_seg_1($_SESSION['datos_nuevos']['pregunta_seg_1']);
			$usuarios->set_respuesta_1($_SESSION['datos_nuevos']['respuesta_1']);
			$usuarios->set_pregunta_seg_2($_SESSION['datos_nuevos']['pregunta_seg_2']);
			$usuarios->set_respuesta_2($_SESSION['datos_nuevos']['respuesta_2']);
			$usuarios->editar_usuarios();


			// Actualizacion de los datos de sesion

			$_SESSION['datos_login']['p_nombre'] = $personas->get_p_nombre();
			$_SESSION['datos_login']['s_nombre'] = $personas->get_s_nombre();
			$_SESSION['datos_login']['p_apellido'] = $personas->get_p_apellido();
			$_SESSION['datos_login']['s_apellido'] = $personas->get_s_apellido();
			$_SESSION['datos_login']['fecha_nacimiento'] = $personas->get_fecha_nacimiento();
			$_SESSION['datos_login']['genero'] = $personas->get_genero();
			$_SESSION['datos_login']['email'] = $personas->get_email();
			$_SESSION['datos_login']['pregunta_seg_1'] = $usuarios->get_pregunta_seg_1();
			$_SESSION['datos_login']['respuesta_1'] = $usuarios->get_respuesta_1();
			$_SESSION['datos_login']['pregunta_seg_2'] = $usuarios->get_pregunta_seg_2();
			$_SESSION['datos_login']['respuesta_2'] = $usuarios->get_respuesta_2();

			unset($_SESSION['editar_usuario'],$_SESSION['datos_nuevos'],$_SESSION['orden']);

			header('Location: ../lobby/index.php?exito');

		}
		
		// De editar perfil. Se debe cambiar
		elseif ($_SESSION['orden'] == "editar_externo") {

			// Datos de persona	

			$cedula = $_SESSION['datos_usuario_nuevos']["nacionalidad_u"].$_SESSION['datos_usuario_nuevos']["cedula_u"];

			$personas->set_cedula($cedula);
			$personas->set_p_nombre($_SESSION['datos_usuario_nuevos']["p_nombre_u"]);
			$personas->set_s_nombre($_SESSION['datos_usuario_nuevos']["s_nombre_u"]);
			$personas->set_p_apellido($_SESSION['datos_usuario_nuevos']["p_apellido_u"]);
			$personas->set_s_apellido($_SESSION['datos_usuario_nuevos']["s_apellido_u"]);
			$personas->set_fecha_nacimiento($_SESSION['datos_usuario_nuevos']["fecha_nacimiento_u"]);
			$personas->set_genero($_SESSION['datos_usuario_nuevos']["genero_u"]);
			$personas->set_email($_SESSION['datos_usuario_nuevos']["email_u"]);
			$personas->editar_persona($cedula);

			// Inserta la persona


			// datos de usuario

			$usuarios->set_cedula_persona($personas->get_cedula());

			$usuarios->set_pregunta_seg_1($_SESSION['datos_usuario_nuevos']['pregunta_seg_1']);
			$usuarios->set_respuesta_1($_SESSION['datos_usuario_nuevos']['respuesta_1']);
			$usuarios->set_pregunta_seg_2($_SESSION['datos_usuario_nuevos']['pregunta_seg_2']);
			$usuarios->set_respuesta_2($_SESSION['datos_usuario_nuevos']['respuesta_2']);
			$usuarios->editar_usuarios();

			$clave = hash("sha256", $_SESSION['datos_usuario_nuevos']['clave']);
			$usuarios->set_contrasenia($clave);
			$usuarios->editar_contrasenia();

			unset($_SESSION['editar_usuario'],$_SESSION['datos_nuevos'],$_SESSION['orden']);

			header('Location: ../lobby/index.php?exito');

		}
		

		elseif ($_SESSION['orden'] == "eliminar") {
			if (isset($_SESSION['eliminar_usuario'])) {
			
				$personas->set_cedula($_SESSION['eliminar_usuario']);
				$personas->eliminar_persona();

				header('Location: ../lobby/consultar/index.php?sec=usu&exito');
			}
		}

		elseif ($_SESSION['orden'] == "baja") {
			if (isset($_SESSION['eliminar_usuario'])) {
			
				$personas->set_cedula($_SESSION['eliminar_usuario']);
				$personas->eliminar_persona();

				header('Location: logout.php');
			}
		}
		

		else {

		}
	}

?> 