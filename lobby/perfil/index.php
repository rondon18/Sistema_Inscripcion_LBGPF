<?php
session_start();

if (!$_SESSION['login']) {
	header('Location: ../../index.php');
	exit();
}

require('funciones.php');
require('../../clases/bitácora.php');
require('../../controladores/conexion.php');
$bitácora = new bitácora();
$_SESSION['acciones'] .= ', Visita perfil';
$bitácora->actualizar_bitácora($_SESSION['acciones'],$_SESSION['idbitácora']);

$nombre_completo = $_SESSION['persona']['Primer_Nombre']." ".$_SESSION['persona']['Segundo_Nombre']." ".$_SESSION['persona']['Primer_Apellido']." ".$_SESSION['persona']['Segundo_Apellido']


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
	<link rel="icon" type="img/png" href="../../img/distintivo-LGPF.png">
</head>
<body>
	<main style="max-height: 100vh; overflow-y: auto;">
		<!--Banner-->
		<header class="w-100 bg-white d-flex justify-content-center justify-content-md-between shadow p-1 position-absolute top-0" style="z-index:1000;">
			<div>
				<img src="../../img/banner-gobierno.png" alt=""  height="42" class="d-none d-md-inline-block align-text-top">
				<img src="../../img/banner-MPPE.png" alt=""  height="42" class="d-none d-md-inline-block align-text-top">
			</div>
			<img src="../../img/banner-LGPF.png" alt=""  height="42" class="d-inline-block align-text-top">
		</header>
		
		<div class="container-md py-3 px-xl-5 my-5 mb-lg-0">
		
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
												<p><?php echo $_SESSION['persona']['Cédula'];?></p>
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
													<?php echo formatoFechaCompleto($_SESSION['persona']['Fecha_Nacimiento']);?>
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
												<p><?php echo generoCompleto($_SESSION['persona']['Género']);?></p>
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
												<p><?php echo $_SESSION['persona']['Correo_Electrónico']?></p>
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
												<p><?php privilegios($_SESSION['usuario']['Privilegios']); ?></p>
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
																<?php echo $_SESSION['usuario']['Pregunta_Seg_1'];?>:
															</span>
															<span><?php echo $_SESSION['usuario']['Respuesta_1'];?></span>
														</li>
														<li class="mb-1">
															<span class="h6">
																<?php echo $_SESSION['usuario']['Pregunta_Seg_2'];?>:
															</span>
															<span><?php echo $_SESSION['usuario']['Respuesta_2'];?></span>
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
						<a class="btn btn-primary" href="../index.php">Volver al inicio</a>
					</div>		
				</div>
			
		</div>

		<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 position-fixed bottom-0" style="z-index: 100;">
			<span class="text-white">Sistema de inscripción L.B. G.P.F - <i class="far fa-copyright"></i> 2022-<?php echo date("Y"); ?></span>
		</footer>
		<?php include '../../ayuda.php'; ?>
	</main>
<script type="text/javascript" src="../../js/sweetalert2.js"></script>
<script type="text/javascript" src="../../js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../../js/validaciones-inscripcion.js"></script>
<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
