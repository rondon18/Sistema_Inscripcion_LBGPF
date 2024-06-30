<?php
	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../../index.php');
		exit();
	}

	require('funciones.php');
	require('../../clases/bitacora.php');
	require('../../controladores/conexion.php');
	$bitacora = new bitacora();
	$_SESSION['acciones'] .= ', Modifica su perfil';
	$bitacora->actualizar_bitacora($_SESSION['acciones'],$_SESSION['id_bitacora']);

	$nombre_completo = $_SESSION['datos_login']['p_nombre']." ".$_SESSION['datos_login']['s_nombre']." ".$_SESSION['datos_login']['p_apellido']." ".$_SESSION['datos_login']['s_apellido'];

	$nivel = 2;

	if (isset($_POST['orden'])) {
		if ($_POST['orden'] == "editar") {

			$_SESSION['orden'] = $_POST['orden'];
			$_SESSION['editar_usuario'] = $_SESSION['datos_login']['cedula'];
			$_SESSION['datos_nuevos'] = $_POST;

			header('Location: ../../controladores/control_usuarios.php');
		}
	}


?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Editar perfil de usuario</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
					
					<!--Datos del representante-->
					<div class="card-header text-center">
						<b class="fs-5">Perfil de usuario</b>
					</div>
					
					<div class="card-body">

						<div class="row">

							<!-- Selector de seccion -->
							<div class="col-12 col-lg-3">
								<ul class="nav flex-lg-column nav-pills nav-fill mb-4 gap-2">
									<li class="nav-item">
										<a id="link1" class="nav-link active" href="#">Datos personales</a>
									</li>
									<li class="nav-item">
										<a id="link2" class="nav-link" href="#">Datos de usuario</a>
									</li>
								</ul>
							</div>
							
							<!-- Contenedor del formulario -->
							<div class="col-12 col-lg-9 py-0" style="max-height: 60vh; overflow-y: auto;">

								<form id="formulario_usuario" action="#" method="post">
									<!-- Seccion de datos personales -->
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
													value="<?php echo $_SESSION['datos_login']['p_nombre'] ?? NULL ?>"
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
													value="<?php echo $_SESSION['datos_login']['s_nombre'] ?? NULL ?>"
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
													value="<?php echo $_SESSION['datos_login']['p_apellido'] ?? NULL ?>"
												>

											</div>
											<div class="col-12 col-lg-5">
												<input id="s_apellido_u" 
													class="form-control mb-2" 
													type="text" 
													name="s_apellido_u"  
													placeholder="Segundo apellido" 
													minlength="3" 
													value="<?php echo $_SESSION['datos_login']['s_apellido'] ?? NULL ?>"
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
												<input id="fecha_nacimiento_u" class="form-control mb-2" type="date" name="fecha_nacimiento_u" min="<?php echo date('Y')-100 .'-01-01'?>" max="<?php echo date('Y')-18 .'-01-01'?>" title="Debe tener al menos 18 años." required value="<?php echo $_SESSION['datos_login']['fecha_nacimiento'] ?? NULL ?>">
											</div>	


											<!-- Genero -->
											<div class="col-12 col-lg-auto mt-4 mt-lg-0">
												<label class="form-label">Género:</label>		
											</div>											
											<div class="col-12 col-lg-3">
												<div class="form-check form-check-inline">
													<label for="genero_f" class="form-label">F</label>
													<input id="genero_f" class="form-check-input" type="radio" name="genero_u" value="F" required <?php if($_SESSION['datos_login']['genero'] == "F"){echo "checked";} ?>>
												</div>
												<div class="form-check form-check-inline">
													<label for="genero_m" class="form-label">M</label>
													<input id="genero_m" class="form-check-input" type="radio" name="genero_u" value="M" required <?php if($_SESSION['datos_login']['genero'] == "M"){echo "checked";} ?>>
												</div>
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
													value="<?php echo $_SESSION['datos_login']['email'] ?? NULL ?>"
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
												<p><?php echo $_SESSION['datos_login']['rol'] ?? NULL ?></p>
											</div>
										</div>

										<!-- Privilegios sobre el sistema -->
										<div class="row mb-2">
											<div class="col-12 col-md-4">
												<p class="h6">
													Privilegios:
												</p>
											</div>
											<div class="col-12 col-md-8">
												<p>
													<?php echo "Nivel ". $_SESSION['datos_login']['privilegios'];?>
													(<?php privilegios($_SESSION['datos_login']['privilegios']);?>)
														
													</p>
											</div>
										</div>

										<!-- Preguntas de seguridad -->
										<div class="row">
											<div class="col-12">
												<p class="h5 mb-4">Preguntas de seguridad:</p>
											</div>

											<!-- Pregunta 1 -->
											<div class="col-12 col-md-6">
												<select name="pregunta_seg_1" class="form-select mb-2" required>
													<option selected value="">Seleccione una opción</option>
													<option value="Ciudad de tu luna de miel" <?php if($_SESSION['datos_login']['pregunta_seg_1'] == "Ciudad de tu luna de miel"){echo "selected";}?>>Ciudad de tu luna de miel</option>
													<option value="Ciudad donde naciste" <?php if($_SESSION['datos_login']['pregunta_seg_1'] == "Ciudad donde naciste"){echo "selected";}?>>Ciudad donde naciste</option>
													<option value="Ciudad preferida de vacaciones" <?php if($_SESSION['datos_login']['pregunta_seg_1'] == "Ciudad preferida de vacaciones"){echo "selected";}?>>Ciudad preferida de vacaciones</option>
													<option value="Color que más te gusta" <?php if($_SESSION['datos_login']['pregunta_seg_1'] == "Color que más te gusta"){echo "selected";}?>>Color que más te gusta</option>
													<option value="¿Cuál es tu comida favorita?" <?php if($_SESSION['datos_login']['pregunta_seg_1'] == "¿Cuál es tu comida favorita?"){echo "selected";}?>>¿Cuál es tu comida favorita?</option>
													<option value="¿Cuál es tu héroe favorito?" <?php if($_SESSION['datos_login']['pregunta_seg_1'] == "¿Cuál es tu héroe favorito?"){echo "selected";}?>>¿Cuál es tu héroe favorito?</option>
													<option value="¿Cuál fue tu primer número de Teléfono?" <?php if($_SESSION['datos_login']['pregunta_seg_1'] == "¿Cuál fue tu primer número de Teléfono?"){echo "selected";}?>>¿Cuál fue tu primer número de Teléfono?</option>
													<option value="Equipo deportivo preferido" <?php if($_SESSION['datos_login']['pregunta_seg_1'] == "Equipo deportivo preferido"){echo "selected";}?>>Equipo deportivo preferido</option>
													<option value="Fecha de aniversario de bodas" <?php if($_SESSION['datos_login']['pregunta_seg_1'] == "Fecha de aniversario de bodas"){echo "selected";}?>>Fecha de aniversario de bodas</option>
													<option value="Fecha de nacimiento de tu padre" <?php if($_SESSION['datos_login']['pregunta_seg_1'] == "Fecha de nacimiento de tu padre"){echo "selected";}?>>Fecha de nacimiento de tu padre</option>
													<option value="Fecha de tu graduación" <?php if($_SESSION['datos_login']['pregunta_seg_1'] == "Fecha de tu graduación"){echo "selected";}?>>Fecha de tu graduación</option>
													<option value="Fruta favorita" <?php if($_SESSION['datos_login']['pregunta_seg_1'] == "Fruta favorita"){echo "selected";}?>>Fruta favorita</option>
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
													value="<?php echo $_SESSION['datos_login']['respuesta_1'] ?? NULL ?>"
												>
											</div>
											
											<!-- Pregunta 2 -->
											<div class="col-12 col-md-6">
												<select name="pregunta_seg_2" class="form-select mb-2" required>
													<option selected value="">Seleccione una opción</option>
													<option value="Ciudad de tu luna de miel" <?php if($_SESSION['datos_login']['pregunta_seg_2'] == "Ciudad de tu luna de miel"){echo "selected";}?>>Ciudad de tu luna de miel</option>
													<option value="Ciudad donde naciste" <?php if($_SESSION['datos_login']['pregunta_seg_2'] == "Ciudad donde naciste"){echo "selected";}?>>Ciudad donde naciste</option>
													<option value="Ciudad preferida de vacaciones" <?php if($_SESSION['datos_login']['pregunta_seg_2'] == "Ciudad preferida de vacaciones"){echo "selected";}?>>Ciudad preferida de vacaciones</option>
													<option value="Color que más te gusta" <?php if($_SESSION['datos_login']['pregunta_seg_2'] == "Color que más te gusta"){echo "selected";}?>>Color que más te gusta</option>
													<option value="¿Cuál es tu comida favorita?" <?php if($_SESSION['datos_login']['pregunta_seg_2'] == "¿Cuál es tu comida favorita?"){echo "selected";}?>>¿Cuál es tu comida favorita?</option>
													<option value="¿Cuál es tu héroe favorito?" <?php if($_SESSION['datos_login']['pregunta_seg_2'] == "¿Cuál es tu héroe favorito?"){echo "selected";}?>>¿Cuál es tu héroe favorito?</option>
													<option value="¿Cuál fue tu primer número de Teléfono?" <?php if($_SESSION['datos_login']['pregunta_seg_2'] == "¿Cuál fue tu primer número de Teléfono?"){echo "selected";}?>>¿Cuál fue tu primer número de Teléfono?</option>
													<option value="Equipo deportivo preferido" <?php if($_SESSION['datos_login']['pregunta_seg_2'] == "Equipo deportivo preferido"){echo "selected";}?>>Equipo deportivo preferido</option>
													<option value="Fecha de aniversario de bodas" <?php if($_SESSION['datos_login']['pregunta_seg_2'] == "Fecha de aniversario de bodas"){echo "selected";}?>>Fecha de aniversario de bodas</option>
													<option value="Fecha de nacimiento de tu padre" <?php if($_SESSION['datos_login']['pregunta_seg_2'] == "Fecha de nacimiento de tu padre"){echo "selected";}?>>Fecha de nacimiento de tu padre</option>
													<option value="Fecha de tu graduación" <?php if($_SESSION['datos_login']['pregunta_seg_2'] == "Fecha de tu graduación"){echo "selected";}?>>Fecha de tu graduación</option>
													<option value="Fruta favorita" <?php if($_SESSION['datos_login']['pregunta_seg_2'] == "Fruta favorita"){echo "selected";}?>>Fruta favorita</option>
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
													value="<?php echo $_SESSION['datos_login']['respuesta_2'] ?? NULL ?>"
												>
												
												<input type="hidden" name="orden" value="editar">

											</div>
										</div>								
									</section>
								</form>
							</div>

						</div>
					</div>
					<div class="card-footer d-flex">
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
		<?php include('../../ayuda.php');?>
	</main>
<script type="text/javascript" src="../../js/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="../../js/sweetalert2.js"></script>
<script type="text/javascript" src="../../js/logout_inactividad.js"></script>
<script type="text/javascript" src="../../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../../js/messages_es.min.js"></script>
<script type="text/javascript" src="../../js/validaciones/validaciones_usuario.js"></script>
<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
