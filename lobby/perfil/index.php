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
	$_SESSION['acciones'] .= ', Visita perfil';


	// Actualiza la bitácora
	$bitacora->set_id_bitacora($_SESSION['id_bitacora']);
	$bitacora->set_acciones_realizadas($_SESSION['acciones']);
	$bitacora->actualizar_bitacora();

	$nombre_completo = $_SESSION['datos_login']['p_nombre']." ".$_SESSION['datos_login']['s_nombre']." ".$_SESSION['datos_login']['p_apellido']." ".$_SESSION['datos_login']['s_apellido'];

	$nivel = 2;
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Perfil de usuario</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/all.min.css"/>
	<link rel="icon" type="img/png" href="../../img/icono.png">
</head>
<body>
	<main class="d-flex flex-column justify-content-between vh-100">
		<?php include('../../header.php'); ?>
		<div class="container-md">
		
				<div class="card">
					
					<!--Datos del representante-->
					<div class="card-header text-center">
						<b class="fs-4">Perfil de usuario</b>
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
									<!-- Botones de acción -->
									<div class="row mb-4 text-center text-md-end">
										<div class="col-12 col-lg-12 pt-1">
											
											<a class="btn btn-sm btn-primary" href="editar-perfil.php">
												<i class="fa-solid me-2 fa-user-edit"></i>
												Editar perfil
											</a>
											
											<a class="btn btn-sm btn-primary" href="#">
												<i class="fa-solid me-2 fa-user-minus"></i>
												Darse de baja
											</a>

										</div>
									</div>
									<!-- Seccion de datos personales -->
									<section id="seccion1" class="row">
										<!-- Titulo de la seccion -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<p class="h3">Datos personales</p>
											</div>
										</div>

										<!-- Nombre completo -->
										<div class="row mb-2">
											<div class="col-12 col-lg-4">
												<p class="h6">
													<i class="fa-solid fa-lg me-2 fa-user"></i>
													Nombres y apellidos:
												</p>
											</div>
											<div class="col-12 col-lg-8">
												<p><?php echo $nombre_completo;?></p>
											</div>
										</div>

										<!-- Cédula -->
										<div class="row mb-2">
											<div class="col-12 col-lg-4">
												<p class="h6">
													<i class="fa-solid fa-lg me-2 fa-id-card"></i>
													Cédula de identidad:
												</p>
											</div>
											<div class="col-12 col-lg-8">
												<p><?php echo $_SESSION['datos_login']['cedula'];?></p>
											</div>
										</div>

										<!-- Fecha de nacimiento -->
										<div class="row mb-2">
											<div class="col-12 col-lg-4">
												<p class="h6">
													<i class="fa-solid fa-lg me-2 fa-calendar-days"></i>
													Fecha de nacimiento:
												</p>
											</div>
											<div class="col-12 col-lg-8">
												<p>
													<?php echo formatoFechaCompleto($_SESSION['datos_login']['fecha_nacimiento']);?>
												</p>
											</div>
										</div>
										
										<!-- Genero -->
										<div class="row mb-2">
											<div class="col-12 col-lg-4">
												<p class="h6">
													<i class="fa-solid fa-lg me-2 fa-venus-mars"></i>
													Género:
												</p>
											</div>
											<div class="col-12 col-lg-8">
												<p><?php echo generoCompleto($_SESSION['datos_login']['genero']);?></p>
											</div>
										</div>			

										<!-- Correo electrónico -->
										<div class="row">
											<div class="col-12 col-lg-4">
												<p class="h6">
													<i class="fa-solid fa-lg me-2 fa-envelope"></i>
													Correo electrónico:
												</p>
											</div>
											<div class="col-12 col-lg-8">
												<p><?php echo $_SESSION['datos_login']['email'];?></p>
											</div>
										</div>
									</section>


									<!-- Seccion de datos de usuario -->
									<section id="seccion2" class="row">
										<!-- Titulo de la seccion -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<p class="h3">Datos de usuario</p>
											</div>
										</div>

										<!-- Rol en el sistema -->
										<div class="row mb-2">
											<div class="col-12 col-lg-4">
												<p class="h6">
													<i class="fa-solid fa-lg me-2 fa-pen-ruler"></i>
													Rol en el sistema:
												</p>
											</div>
											<div class="col-12 col-lg-8">
												<p><?php echo testRol();?></p>
											</div>
										</div>

										<!-- Privilegios sobre el sistema -->
										<div class="row mb-2">
											<div class="col-12 col-lg-4">
												<p class="h6">
													<i class="fa-solid fa-lg me-2 fa-lock"></i>
													Privilegios:
												</p>
											</div>
											<div class="col-12 col-lg-8">
												<p><?php privilegios($_SESSION['datos_login']['privilegios']); ?></p>
											</div>
										</div>

										<!-- Preguntas de seguridad -->
										<div class="row">
											<div class="col-12">
												<details>
													<summary class="h6 btn btn-primary dropdown-toggle">
														<i class="fa-solid fa-lg me-2 fa-circle-question"></i>
														Preguntas de seguridad:
													</summary>
													<ol class="mt-2">
														<li class="mb-1">
															<span class="h6">
																<?php echo $_SESSION['datos_login']['pregunta_seg_1'];?>:
															</span>
															<span><?php echo $_SESSION['datos_login']['respuesta_1'];?></span>
														</li>
														<li class="mb-1">
															<span class="h6">
																<?php echo $_SESSION['datos_login']['pregunta_seg_2'];?>:
															</span>
															<span><?php echo $_SESSION['datos_login']['respuesta_2'];?></span>
														</li>
													</ol>
													<p>
														
													</p>
													<p>
														
													</p>
												</details>
											</div>
										</div>										
									</section>
							</div>

						</div>
					</div>
					<div class="card-footer">
						<a class="btn btn-primary" href="../index.php">
							<i class="fa-solid fa-lg me-2 fa-backward"></i>
							Volver al inicio
						</a>
					</div>		
				</div>
			
		</div>
		<?php include('../../footer.php'); ?>
		<?php include('../../ayuda.php'); ?>
	</main>
<script type="text/javascript" src="../../js/sweetalert2.js"></script>
<script type="text/javascript" src="../../js/jquery-3.6.1.min.js"></script>

<script type="text/javascript">
	
	$("#link1").click(function() {
		$("#seccion2").hide();
		$("#seccion1").fadeIn();
		$("#link2").removeClass("active");
		$("#link1").addClass("active");
	});
	
	$("#link2").click(function() {
		$("#seccion1").hide();
		$("#seccion2").fadeIn();
		$("#link1").removeClass("active");
		$("#link2").addClass("active");
	});

</script>
<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
