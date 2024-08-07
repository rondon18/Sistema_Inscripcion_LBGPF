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
	if (isset($_POST['orden'])) {
		if ($_POST['orden'] == "baja") {

			$_SESSION['orden'] = $_POST['orden'];
			$_SESSION['eliminar_usuario'] = $_POST['cedula'];

			header('Location: ../../controladores/control_usuarios.php');
		}
	}


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
						<b class="fs-5">PERFIL DE USUARIO</b>
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
									<li class="nav-item">
										<a id="link3" class="nav-link" href="#">Gestión del perfil</a>
									</li>
								</ul>
							</div>


							<!-- Contenedor del formulario -->
							<div class="col-12 col-lg-9" style="max-height: 60vh; overflow-y: auto;">

									<!-- Seccion de datos personales -->
									<section id="seccion1" class="row px-4">
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
									<section id="seccion2" class="row px-4" style="display: none;">
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
												<p><?php echo $_SESSION['datos_login']['rol'];?></p>
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

									<section id="seccion3" class="row px-4" style="display: none;">
										<!-- Botones de acción -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12 pt-1">

												<!-- Titulo de la seccion -->
												<div class="row mb-4">
													<div class="col-12 col-lg-12">
														<p class="h3">Gestión del perfil</p>
													</div>
												</div>

												<p class="text-muted">
													En esta pequeña área se encuentran las opciones para editar su perfil o darse de baja como usuario. Cada uno con su respectivo botón.
												</p>

												<a class="btn btn-sm btn-primary" href="editar_perfil.php">
													<i class="fa-solid me-2 fa-user-edit"></i>
													Editar perfil
												</a>

												<form class="d-inline-block" action="#" method="post" onsubmit="confirmar_envio(event)">

													<input type="hidden" name="orden" value="baja">
													<input type="hidden" name="cedula" value="<?php echo $_SESSION['datos_login']['cedula']; ?>">

													<button class="btn btn-sm btn-primary" type="submit">
														<i class="fa-solid me-2 fa-user-minus"></i>
														Darse de baja
													</button>

												</form>


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
	<script type="text/javascript" src="../../js/jquery-3.7.1.min.js"></script>
	<script type="text/javascript" src="../../js/sweetalert2.js"></script>
	<script type="text/javascript" src="../../js/logout_inactividad.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../../js/perfil.js"></script>
	<script>
	  function confirmar_envio(event) {
	    event.preventDefault(); // Detiene la acción predeterminada del evento onSubmit

	    Swal.fire({
	      title: '¿Estás seguro?',
	      text: '¿Deseas darse se baja como usuario?',
	      icon: 'warning',
	      showCancelButton: true,
	      confirmButtonColor: '#3085d6',
	      cancelButtonColor: '#d33',
	      confirmButtonText: 'Sí',
	      cancelButtonText: 'No'
	    }).then((result) => {
	      if (result.isConfirmed) {
	        // Si el usuario confirma la acción, se envía el formulario
	        event.target.submit();
	      }
	    });
	  }
	</script>
</body>
</html>
