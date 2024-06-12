<?php
	session_start();

	$nivel = 1;

	$manual = true;

	// // var_dump($_SESSION);

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Manual de usuario</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
		<link rel="stylesheet" type="text/css" href="../css/all.min.css"/>
		<link rel="icon" type="img/png" href="../img/icono.png">
	</head>
	<body>
		
		<main class="d-flex flex-column justify-content-between vh-100">
			
			<?php include("../header.php");?>

			<div class="container-md">
				<div class="card w-100 my-3">


					<div class="card-header text-center">
						<b class="fs-5">MANUAL DE USUARIO</b>
					</div>


					<div class="card-body" style="max-height: 65vh; overflow-y:auto;">
						<?php 
							$secciones = [
								"a1","a2","a3","a4","a5","a6",
								"b1","b2","b3","b4","b5","b6",
								"c1","c2","c3","c4","c5","c6",
								"d1","d2","d3","d4","d5","d6",
								"e1","e2","e3","e4","e5","e6",
								"f1","f2","f3","f4","f5","f6",
								"g1","g2","g3","g4","g5","g6",
							]
						?>
						<?php if (!isset($_GET['con']) or !in_array($_GET['con'], $secciones)): ?>
						<section class="px-3 px-md-5 py-3 d-flex align-items-center">
							<div class="text-center text-sm-start">
								<p class="display-5 mb-1">
									Bienvenido al módulo de ayuda y manual del sistema.
								</p>
								<span class="lead fs-6 text-muted">¿Sobre que desea consultar?</span>
							</div>
							<img class="d-none d-sm-inline-block ms-sm-auto mb-4 mb-sm-0" src="../img/icono.png" alt="Icono del sistema" width="125">
						</section>
							
						<?php endif ?>


						<?php  

							/*
								Especificar la accion que hará el botón
								- Si va a cerrar la pestaña
								- si retorna al menú anterior -> retorna al submenú si esta visualizando alguna guía
							*/

							$accion_boton = "";

							if (!isset($_GET['con'])) {
								require("menus/menu_principal.php");
							}
							else {
								switch ($_GET['con']) {

									// menús
									case 'a':
										require("menus/sesiones.php");
										break;
									case 'b':
										require("menus/gestionar_registros.php");
										break;
									case 'c':
										require("menus/reportes.php");
										break;
									case 'd':
										require("menus/estadisticas.php");
										break;
									case 'e':
										require("menus/area_usuarios.php");
										break;
									case 'f':
										require("menus/area_mantenimiento.php");
										break;
									case 'g':
										require("menus/info_sistema.php");
										break;


									// bloques de información especificos dentro de su sección

									// sesiones
									case 'a1':
										require("informacion/sesiones/inicio_sesion.php");
										$sub_menu = "a";
										break;
									case 'a2':
										require("informacion/sesiones/inicio_sesion_auxiliar.php");
										$sub_menu = "a";
										break;

									// registros
									case 'b1':
										require("informacion/registros/realizar_inscripcion.php");
										$sub_menu = "b";
										break;
									case 'b2':
										require("informacion/registros/actualizar_inscripcion.php");
										$sub_menu = "b";
										break;
									case 'b3':
										require("informacion/registros/eliminar_registros.php");
										$sub_menu = "b";
										break;
									case 'b4':
										require("informacion/registros/consultar_registros.php");
										$sub_menu = "b";
										break;
									case 'b5':
										require("informacion/registros/reportes_rapidos.php");
										$sub_menu = "b";
										break;
									case 'b6':
										require("informacion/registros/generacion_planillas.php");
										$sub_menu = "b";
										break;


									// reportes
									case 'c1':
										require("informacion/reportes/estudiantes.php");
										$sub_menu = "c";
										break;
									case 'c2':
										require("informacion/reportes/representantes.php");
										$sub_menu = "c";
										break;
									case 'c3':
										require("informacion/reportes/padres.php");
										$sub_menu = "c";
										break;
									case 'c4':
										require("informacion/reportes/acerca_de.php");
										$sub_menu = "c";
										break;

									// estadisticas
									case 'd1':
										require("informacion/estadistica/estudiantes.php");
										$sub_menu = "d";
										break;
									case 'd2':
										require("informacion/estadistica/representantes.php");
										$sub_menu = "d";
										break;
									case 'd3':
										require("informacion/estadistica/padres.php");
										$sub_menu = "d";
										break;
									case 'd4':
										require("informacion/estadistica/acerca_de.php");
										$sub_menu = "d";
										break;


									// area de usuarios / adminitradores / desarrolladores
									case 'e1':
										require("informacion/area_usuarios/perfil.php");
										$sub_menu = "e";
										break;
									case 'e2':
										require("informacion/area_usuarios/editar_perfil.php");
										$sub_menu = "e";
										break;
									case 'e3':
										require("informacion/area_usuarios/darse_baja.php");
										$sub_menu = "e";
										break;
									case 'e4':
										require("informacion/area_usuarios/rol_desarrollador.php");
										$sub_menu = "e";
										break;
									case 'e5':
										require("informacion/area_usuarios/rol_adminitrador.php");
										$sub_menu = "e";
										break;
									case 'e6':
										require("informacion/area_usuarios/rol_usuario.php");
										$sub_menu = "e";
										break;


									// area de mantenimiento
									case 'f1':
										require("informacion/mantenimiento/respaldos.php");
										$sub_menu = "f";
										break;
									case 'f2':
										require("informacion/mantenimiento/restauraciones.php");
										$sub_menu = "f";
										break;


									// acerca del sistema
									case 'g1':
										require("informacion/info_sistema/info_sistema.php");
										$sub_menu = "g";
										break;
									case 'g2':
										require("informacion/info_sistema/desarrolladores.php");
										$sub_menu = "g";
										break;
									case 'g3':
										
										// Descarga el manual completo
										if (isset($_SESSION['login']) and $_SESSION['datos_login']['privilegios'] < 2) {
											header("Location: ../docs/Manual_de_usuario.pdf");
										}

										// Descarga el manual regular
										elseif (isset($_SESSION['login']) and $_SESSION['datos_login']['privilegios'] >= 2) {
											header("Location: ../docs/Manual_de_usuario.pdf");
										}

										// En caso de que se trate de un usuario no logeado
										else {
											require("menus/menu_principal.php");
										}

										$sub_menu = "g";
										break;
									

									// Menú por defecto o principal cuando la opcion no se especifique o no este en el switch
									default:
										require("menus/menu_principal.php");
										break;
								}
							}


						?>

					</div>


					<div class="card-footer">
						<?php if (isset($_GET['con'])): ?>
							<?php 
								// Si está en alguna informacion especifica, la ruta va a su submenú
								if (isset($sub_menu)) {
									$ruta = "?con=" . $sub_menu;
								}
								// si esta en un submenú dirige al menú principal
								else {
									$ruta = "./";
								}

							?>
						<a href="<?php echo $ruta;?>" class="btn btn-primary">
							<i class="fas fa-backward fa-lg me-2"></i>
							Volver
						</a>
						
						<?php else: ?>
						<button id="boton_cerrar" type="button" class="btn btn-primary">
							<i class="fas fa-door-open fa-lg me-2"></i>
							Cerrar el manual
						</button>
						
						<?php endif ?>
					</div>
				</div>
			</div>

			<?php include("../footer.php");?>
		</main>
		
	</body>
	<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../js/jquery-3.7.1.min.js"></script>
	
	<script>

		$(document).ready(function() {
			// Close the current tab when clicking a button
			$('#boton_cerrar').click(function() {
				window.close();
			});
		});

		var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
		var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		  return new bootstrap.Tooltip(tooltipTriggerEl)
		})
	</script>
</html>