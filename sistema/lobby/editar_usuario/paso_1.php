<?php

	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../index.php');
		exit();
	}

	$nivel = 2;

	require("../../controladores/conexion.php");
	require("../../clases/personas.php");
	require("../../clases/usuarios.php");

	$usuario = new Usuarios();

	$usuario->set_cedula_persona($_POST["cedula"]);
	$datos_usuario = $usuario->consultar_usuario();


	// El formulario redirecciona a sí mismo, luego al paso 2 una vez se asignan las variables de sesión

	// Verificación al momento de enviar el formulario
	if (isset($_POST['paso_1'])) {
		// Check de que el paso fue completado
		$_SESSION['orden'] = "editar_externo";
		

		// Se almacenan los datos del formulario en un arreglo
		$datos_usuario_nuevos = [];
		foreach ($_POST as $indice => $valor) {
			$datos_usuario_nuevos[$indice]= $valor;
		}

		// Se anexan como arreglo de arreglos en una variable de sesión
		$_SESSION['datos_usuario_nuevos'] = $datos_usuario_nuevos;

		// Redirecciona al paso 2
		header('Location: ../../controladores/control_usuarios.php');
		
	}


?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Formulario de registro de usuarios</title>
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/all.min.css"/>
		<link rel="icon" type="img/png" href="../../img/icono.png">
	</head>
	<body>
		<main class="d-flex flex-column justify-content-between vh-100">
			<?php include('../../header.php');?>
			<div class="container-md">	
				<div class="card">
					<!-- Titulo del contenedor -->
					<div class="card-header text-center">
						<b class="fs-5">Formulario de registro - Usuario</b>
					</div>
					<div class="card-body">
						<div class="row">

							<!-- Selector de sección -->
							<div class="col-12 col-lg-3">
								<ul class="nav flex-lg-column nav-pills nav-fill mb-4 gap-2">
									<li class="nav-item">
										<span id="link1" class="nav-link active" href="#">Datos personales</span>
									</li>
									<li class="nav-item">
										<span id="link2" class="nav-link" href="#">Datos de usuario</span>
									</li>
								</ul>
							</div>
							
							<!-- Contenedor del formulario -->
							<div class="col-12 col-lg-9 py-0" style="max-height: 60vh; overflow-y: auto;">
								<form id="formulario_usuario" action="paso_1.php" method="POST">
									
									<section id="seccion1" class="row">
										<!-- Titulo de la seccion -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<p class="h3">Datos personales</p>
											</div>
										</div>

										<!-- Nombres -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">Nombres:</label>
											</div>
											<div class="col-12 col-lg-5">
												<input 
													id="p_nombre_u" 
													class="form-control mb-2" 
													type="text" 
													name="p_nombre_u" 
													placeholder="Primer nombre" 
													minlength="3" 
													required
													value="<?php echo $datos_usuario["p_nombre"];?>" 
												>

											</div>
											<div class="col-12 col-lg-5">
												<input 
													id="s_nombre_u" 
													class="form-control mb-2" 
													type="text"  
													name="s_nombre_u"  
													placeholder="Segundo nombre"
													minlength="3" 
													value="<?php echo $datos_usuario["s_nombre"];?>" 
												>
											</div>
										</div>

										<!-- Apellidos -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">Apellidos:</label>
											</div>
											<div class="col-12 col-lg-5">
												<input 
													id="p_apellido_u" 
													class="form-control mb-2" 
													type="text" 
													name="p_apellido_u" 
													placeholder="Primer apellido" 
													minlength="3" 
													required
													value="<?php echo $datos_usuario["p_apellido"];?>" 
												>

											</div>
											<div class="col-12 col-lg-5">
												<input 
													id="s_apellido_u" 
													class="form-control mb-2" 
													type="text" 
													name="s_apellido_u" 
													placeholder="Segundo apellido" 
													minlength="3" 
													value="<?php echo $datos_usuario["s_apellido"];?>" 
												>
											</div>
										</div>

										<?php 
											$nacionalidad = trim($datos_usuario["cedula"],"0123456789");
											$cedula = trim($datos_usuario["cedula"],"VE"); 
										?>

										<!-- Cédula -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label class="form-label">Cédula:</label>
											</div>

											<div class="col-12 col-lg-4">
												<input 
													id="nacionalidad_u" 
													class="form-control" 
													name="nacionalidad_u" 
													required
													value="<?php echo $nacionalidad;?>"
													readonly
												>
											</div>

											<div class="col-12 col-lg-6">

												<input 
													id="cedula_u" 
													class="form-control" 
													type="text"  name="cedula_u" 
													maxlength="8" 
													minlength="7" 
													required
													value="<?php echo $cedula;?>" 
													readonly
												>

											</div>
										</div>
										
										<!-- Fecha de nacimiento y genero -->
										<div class="row mb-4">

											<!-- Fecha de nacimiento -->
											<div class="col-12 col-lg-auto">
												<label class="form-label">Fecha de nacimiento:</label>	
											</div>	
											<div class="col-12 col-lg-3">
												<input 
												id="fecha_nacimiento_u" 
												class="form-control mb-2" 
												type="date" 
												name="fecha_nacimiento_u" 
												min="<?php echo date('Y')-100 .'-01-01'?>" 
												max="<?php echo date('Y')-18 .'-01-01'?>" 
												title="Debe tener al menos 18 años." 
												required
												value="<?php echo $datos_usuario["fecha_nacimiento"];?>" 
											>
											</div>	


											<!-- Genero -->
											<div class="col-12 col-lg-auto mt-4 mt-lg-0">
												<label class="form-label">Género:</label>		
											</div>											
											<div class="col-12 col-lg-3">
												<div class="form-check form-check-inline">
													<label for="genero_f" class="form-label">F</label>
													<input 
														id="genero_f" 
														class="form-check-input" 
														type="radio" 
														name="genero_u" 
														value="F" 
														required
														<?php if($datos_usuario["genero"] == "F") {echo "checked";} ?>
													>
												</div>
												<div class="form-check form-check-inline">
													<label for="genero_m" class="form-label">M</label>
													<input 
														id="genero_m" 
														class="form-check-input" 
														type="radio" 
														name="genero_u" 
														value="M" 
														required
														<?php if($datos_usuario["genero"] == "M") {echo "checked";} ?>
													>
												</div>
												<label id="genero_u-error" class="error w-100" for="genero_u" style="display:none;"></label>
											</div>

										</div>
										
										<div class="row">
											<div class="col-12 col-lg-4">
												<label class="form-label">Correo electrónico:</label>	
											</div>	
											<div class="col-12 col-lg-8">
												<input 
													id="email_u" 
													class="form-control mb-2" 
													type="email" 
													name="email_u" 
													minlength="10" 
													required
													value="<?php echo $datos_usuario["email"];?>" 
												>
											</div>	
										</div>

									</section>


									<!-- Seccion de datos de usuario -->
									<section id="seccion2" class="row" style="display:none;">
										<!-- Titulo de la seccion -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<p class="h3">Datos de usuario</p>
											</div>
										</div>

										<!-- Rol en el sistema -->
										<div class="row mb-2">
											<div class="col-12 col-md-4">
												<p class="h6">
													Rol en el sistema:
												</p>
											</div>
											<div class="col-12 col-md-8">
												<select name="rol_sistema" class="form-select mb-2" required
												value="<?php echo $datos_usuario[""];?>">
													<option selected value="">Seleccione una opción</option>
													<option <?php if($datos_usuario["rol"] == "Secretario(a)") { echo "selected";}?> value="Secretario(a)">Secretario(a)</option>
													<option <?php if($datos_usuario["rol"] == "Coordinador(a) de primer año") { echo "selected";}?> value="Coordinador(a) de primer año">Coordinador(a) de primer año</option>
													<option <?php if($datos_usuario["rol"] == "Coordinador(a) de segundo año") { echo "selected";}?> value="Coordinador(a) de segundo año">Coordinador(a) de segundo año</option>
													<option <?php if($datos_usuario["rol"] == "Coordinador(a) de tercer año") { echo "selected";}?> value="Coordinador(a) de tercer año">Coordinador(a) de tercer año</option>
													<option <?php if($datos_usuario["rol"] == "Coordinador(a) de cuarto año") { echo "selected";}?> value="Coordinador(a) de cuarto año">Coordinador(a) de cuarto año</option>
													<option <?php if($datos_usuario["rol"] == "Coordinador(a) de quinto año") { echo "selected";}?> value="Coordinador(a) de quinto año">Coordinador(a) de quinto año</option>
													<option <?php if($datos_usuario["rol"] == "Docente") { echo "selected";}?> value="Docente">Docente</option>
													<option <?php if($datos_usuario["rol"] == "Director(a)") { echo "selected";}?> value="Director(a)">Director(a)</option>
													<option <?php if($datos_usuario["rol"] == "Subdirector(a)") { echo "selected";}?> value="Subdirector(a)">Subdirector(a)</option>
												</select>
											</div>
										</div>

										<!-- Preguntas de seguridad -->
										<div class="row mb-2">
											<div class="col-12">
												<p class="h5 mb-4">Preguntas de seguridad:</p>
											</div>

											<!-- Pregunta 1 -->
											<div class="col-12 col-md-6">
												<select name="pregunta_seg_1" class="form-select mb-2" required
												value="<?php echo $datos_usuario[""];?>">
													<option selected value="">Seleccione una opción</option>
													<option <?php if($datos_usuario["pregunta_seg_1"] == "Ciudad de tu luna de miel") { echo "selected";}?> value="Ciudad de tu luna de miel">Ciudad de tu luna de miel</option>
													<option <?php if($datos_usuario["pregunta_seg_1"] == "Ciudad donde naciste") { echo "selected";}?> value="Ciudad donde naciste">Ciudad donde naciste</option>
													<option <?php if($datos_usuario["pregunta_seg_1"] == "Ciudad preferida de vacaciones") { echo "selected";}?> value="Ciudad preferida de vacaciones">Ciudad preferida de vacaciones</option>
													<option <?php if($datos_usuario["pregunta_seg_1"] == "Color que más te gusta") { echo "selected";}?> value="Color que más te gusta">Color que más te gusta</option>
													<option <?php if($datos_usuario["pregunta_seg_1"] == "¿Cuál es tu comida favorita?") { echo "selected";}?> value="¿Cuál es tu comida favorita?">¿Cuál es tu comida favorita?</option>
													<option <?php if($datos_usuario["pregunta_seg_1"] == "¿Cuál es tu heroe favorito?") { echo "selected";}?> value="¿Cuál es tu heroe favorito?">¿Cuál es tu heroe favorito?</option>
													<option <?php if($datos_usuario["pregunta_seg_1"] == "¿Cuál fue tu primer número de Teléfono?") { echo "selected";}?> value="¿Cuál fue tu primer número de Teléfono?">¿Cuál fue tu primer número de Teléfono?</option>
													<option <?php if($datos_usuario["pregunta_seg_1"] == "Equipo deportivo preferido") { echo "selected";}?> value="Equipo deportivo preferido">Equipo deportivo preferido</option>
													<option <?php if($datos_usuario["pregunta_seg_1"] == "Fecha de aniversario de bodas") { echo "selected";}?> value="Fecha de aniversario de bodas">Fecha de aniversario de bodas</option>
													<option <?php if($datos_usuario["pregunta_seg_1"] == "Fecha de nacimiento de tu padre") { echo "selected";}?> value="Fecha de nacimiento de tu padre">Fecha de nacimiento de tu padre</option>
													<option <?php if($datos_usuario["pregunta_seg_1"] == "Fecha de tu graduación") { echo "selected";}?> value="Fecha de tu graduación">Fecha de tu graduación</option>
													<option <?php if($datos_usuario["pregunta_seg_1"] == "Fruta favorita") { echo "selected";}?> value="Fruta favorita">Fruta favorita</option>
												</select>
											</div>
											<div class="col-12 col-md-6">
												<input 
													class="form-control mb-4 mb-md-2" 
													name="respuesta_1" 
													type="text" 
													placeholder="Respuesta a la pregunta" 
													minlength="3" 
													maxlength="50" 
													required
													value="<?php echo $datos_usuario["respuesta_1"];?>" 
												>
											</div>
											
											<!-- Pregunta 2 -->
											<div class="col-12 col-md-6">
												<select name="pregunta_seg_2" class="form-select mb-2" required
												value="<?php echo $datos_usuario[""];?>">
													<option selected value="">Seleccione una opción</option>
													<option <?php if($datos_usuario["pregunta_seg_2"] == "Ciudad de tu luna de miel") { echo "selected";}?> value="Ciudad de tu luna de miel">Ciudad de tu luna de miel</option>
													<option <?php if($datos_usuario["pregunta_seg_2"] == "Ciudad donde naciste") { echo "selected";}?> value="Ciudad donde naciste">Ciudad donde naciste</option>
													<option <?php if($datos_usuario["pregunta_seg_2"] == "Ciudad preferida de vacaciones") { echo "selected";}?> value="Ciudad preferida de vacaciones">Ciudad preferida de vacaciones</option>
													<option <?php if($datos_usuario["pregunta_seg_2"] == "Color que más te gusta") { echo "selected";}?> value="Color que más te gusta">Color que más te gusta</option>
													<option <?php if($datos_usuario["pregunta_seg_2"] == "¿Cuál es tu comida favorita?") { echo "selected";}?> value="¿Cuál es tu comida favorita?">¿Cuál es tu comida favorita?</option>
													<option <?php if($datos_usuario["pregunta_seg_2"] == "¿Cuál es tu heroe favorito?") { echo "selected";}?> value="¿Cuál es tu heroe favorito?">¿Cuál es tu heroe favorito?</option>
													<option <?php if($datos_usuario["pregunta_seg_2"] == "¿Cuál fue tu primer número de Teléfono?") { echo "selected";}?> value="¿Cuál fue tu primer número de Teléfono?">¿Cuál fue tu primer número de Teléfono?</option>
													<option <?php if($datos_usuario["pregunta_seg_2"] == "Equipo deportivo preferido") { echo "selected";}?> value="Equipo deportivo preferido">Equipo deportivo preferido</option>
													<option <?php if($datos_usuario["pregunta_seg_2"] == "Fecha de aniversario de bodas") { echo "selected";}?> value="Fecha de aniversario de bodas">Fecha de aniversario de bodas</option>
													<option <?php if($datos_usuario["pregunta_seg_2"] == "Fecha de nacimiento de tu padre") { echo "selected";}?> value="Fecha de nacimiento de tu padre">Fecha de nacimiento de tu padre</option>
													<option <?php if($datos_usuario["pregunta_seg_2"] == "Fecha de tu graduación") { echo "selected";}?> value="Fecha de tu graduación">Fecha de tu graduación</option>
													<option <?php if($datos_usuario["pregunta_seg_2"] == "Fruta favorita") { echo "selected";}?> value="Fruta favorita">Fruta favorita</option>
												</select>
											</div>
											<div class="col-12 col-md-6">
												<input 
													class="form-control mb-2" 
													name="respuesta_2" 
													type="text" 
													placeholder="Respuesta a la pregunta" 
													minlength="3" 
													maxlength="50" 
													required
													value="<?php echo $datos_usuario["respuesta_2"];?>" 
												>
											</div>
										</div>

										<!-- Contraseña -->
										<div class="row mb-2">
											<div class="col-12 col-md-4">
												<p class="h5 mb-4">Contraseña nueva:</p>
											</div>

											<div class="col-12 col-md-8">
												<input 
													class="form-control mb-4 mb-md-2" 
													name="clave" 
													type="text" 
													placeholder="Contraseña nueva" 
													minlength="8" 
													maxlength="22" 
													required
												>
											</div>
										</div>
										<span class="form-text">La contraseña debe tener al menos 8 caracteres y contener al menos una letra mayúscula, una letra minúscula, un número y un carácter especial (!@#$%^&*).</span>								
									</section>

									<input type="hidden" name="paso_1" value="paso_1">
									<input type="hidden" name="orden" value="actualizar">
								</form>
							</div>
						</div>
					</div>
					<div class="card-footer nav justify-content-md-between">
						<a class="btn btn-primary" href="../index.php">
							<i class="fa-solid fa-xl me-2 fa-home"></i>
							Volver al inicio
						</a>
						<div class="ms-auto">
							<button id="boton_anterior" class="btn btn-primary" type="button">
								<i class="fa-solid fa-xl me-2 fa-backward"></i>
								Anterior
							</button>
							<button id="boton_siguiente" class="btn btn-primary" type="button">
								Siguiente
								<i class="fa-solid fa-lg ms-2 fa-forward"></i>
							</button>
							<button id="boton_guardar" class="btn btn-primary" type="button" style="display:none;">
								Guardar y continuar
								<i class="fa-solid fa-lg ms-2 fa-floppy-disk"></i>
							</button>
						</div>
					</div>
				</div>
				
			</div>
			<?php include('../../footer.php');?>
			<?php include '../../ayuda.php';?>
		</main>
		<script type="text/javascript" src="../../js/sweetalert2.js"></script>
		<script type="text/javascript" src="../../js/jquery-3.7.1.min.js"></script>
		<script type="text/javascript" src="../../js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="../../js/validaciones/additional-methods.min.js"></script>
		<script type="text/javascript" src="../../js/messages_es.min.js"></script>
		<script type="text/javascript" src="../../js/validaciones/validaciones_nuevo_usuario.js"></script>
		<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="../../js/logout_inactividad.js"></script>
	</body>
</html>