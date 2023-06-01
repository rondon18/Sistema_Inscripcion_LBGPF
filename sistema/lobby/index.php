<?php
	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../index.php');
		exit();
	}

	require('../clases/bitacora.php');
	require('../controladores/conexion.php');

	$bitacora = new bitacora();
	$_SESSION['acciones'] .= ', Visita menú principal';

	$bitacora->set_id_bitacora($_SESSION['id_bitacora']);
	$bitacora->set_acciones_realizadas($_SESSION['acciones']);
	$bitacora->actualizar_bitacora();

	$nivel = 1;

	// var_dump($_SESSION);

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Página de inicio</title>
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
						<b class="fs-4">Menú principal</b>
					</div>
					<div class="card-body" style="max-height: 65vh; overflow-y:auto;">
						<section class="px-3 px-md-5 py-4 d-flex align-items-center">
							<img class="me-5" src="../img/icono.png" alt="Icono del sistema" width="100">
							<div>
								<p class="h3 mb-1">
									Bienvenido(a), <?php echo $_SESSION['datos_login']['p_nombre']." ".$_SESSION['datos_login']['p_apellido'];?>.
								</p>
								<span class="text-muted">¿Qué desea hacer?</span>
							</div>
						</section>
						<section class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3">

							
							<!-- Gestionar registros -->
							<div class="col px-2 px-md-4 py-2">
								<div class="card bg-light">
									<div class="card-body d-flex align-items-center">
										<i class="fa-solid fa-magnifying-glass fa-2xl m-2"></i>
										<div class="px-2 w-100">
											<h6 class="card-title mb-2">Gestionar registros.</h6>
											<a href="consultar/index.php" class="btn btn-primary w-100 btn-sm stretched-link">Visitar sección</a>
										</div>
									</div>
								</div>
							</div>


							<!-- Registrar estudiante -->
							<div class="col px-2 px-md-4 py-2">
								<div class="card bg-light">
									<div class="card-body d-flex align-items-center">
										<i class="fa-solid fa-user-plus fa-2xl m-2"></i>
										<div class="px-2 w-100">
											<h6 class="card-title mb-2">Registrar estudiante.</h6>
											<a href="registrar_estudiante/paso_1.php" class="btn btn-primary w-100 btn-sm stretched-link">Iniciar inscripción</a>
										</div>
									</div>
								</div>
							</div>


							<!-- Generar reporte -->
							<div class="col px-2 px-md-4 py-2">
								<div class="card bg-light">
									<div class="card-body d-flex align-items-center">
										<i class="fa-solid fa-file-export fa-2xl m-2"></i>
										<div class="px-2 w-100">
											<h6 class="card-title mb-2">Generar reporte.</h6>
											<a href="reportes/index.php" class="btn btn-primary w-100 btn-sm stretched-link">Ver opciones</a>
										</div>
									</div>
								</div>
							</div>


							<!-- Generar reporte -->
							<div class="col px-2 px-md-4 py-2">
								<div class="card bg-light">
									<div class="card-body d-flex align-items-center">
										<i class="fa-solid fa-chart-column fa-2xl m-2"></i>
										<div class="px-2 w-100">
											<h6 class="card-title mb-2">Consultar estadisticas.</h6>
											<a href="estadistica/index.php" class="btn btn-primary w-100 btn-sm stretched-link">Visitar seccion</a>
										</div>
									</div>
								</div>
							</div>


							<?php if ($_SESSION['datos_login']['privilegios'] < 2):?>
							

							<!-- Registrar usuario -->
							<div class="col px-2 px-md-4 py-2">
								<div class="card bg-light">
									<div class="card-body d-flex align-items-center">
										<i class="fa-solid fa-user-plus fa-2xl m-2"></i>
										<div class="px-2 w-100">
											<h6 class="card-title mb-2">Registrar usuario.</h6>
											<a href="registrar_usuario/paso_1.php" class="btn btn-primary w-100 btn-sm stretched-link">Iniciar proceso</a>
										</div>
									</div>
								</div>
							</div>


							<div class="col px-2 px-md-4 py-2">
								<div class="card bg-light">
									<div class="card-body d-flex align-items-center">
										<i class="fa-solid fa-wrench fa-2xl m-2"></i>
										<div class="px-2 w-100">
											<h6 class="card-title mb-2">Gestionar sistema.</h6>
											<a href="mantenimiento/index.php" class="btn btn-primary w-100 btn-sm stretched-link">Verificar sistema</a>
										</div>
									</div>
								</div>
							</div>


							<?php endif?>


							<div class="col px-2 px-md-4 py-2">
								<div class="card bg-light">
									<div class="card-body d-flex align-items-center">
										<i class="fa-solid fa-user fa-2xl m-2"></i>
										<div class="px-2 w-100">
											<h6 class="card-title mb-2">Ver mi perfil.</h6>
											<a href="perfil/index.php" class="btn btn-primary w-100 btn-sm stretched-link">Ir al perfil</a>
										</div>
									</div>
								</div>
							</div>


							<div class="col px-2 px-md-4 py-2">
								<div class="card bg-light">
									<div class="card-body d-flex align-items-center">
										<i class="fa-solid fa-power-off fa-2xl m-2"></i>
										<div class="px-2 w-100">
											<h6 class="card-title mb-2">Cerrar sesión.</h6>
											<a href="../controladores/logout.php" class="btn btn-primary w-100 btn-sm stretched-link">Salir</a>
										</div>
									</div>
								</div>
							</div>


						</section>
					</div>
				</div>
			</div>


			<?php include("../footer.php");?>
			<?php include('../ayuda.php');?>
		</main>
		
	</body>
	<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../js/jquery-3.6.1.min.js"></script>
	<script type="text/javascript" src="../js/sweetalert2.js"></script>
	<script type="text/javascript">
		<?php if (isset($_GET['exito'])): ?>
		Swal.fire({
		  icon: 'success',
		  title: 'Proceso exitoso',
		  showConfirmButton: false,
		  toast: true,
		  timer: 2000 // tiempo en milisegundos (en este caso, 2 segundos)
		})
		<?php endif ?>
	</script>
	<script type="text/javascript" src="../js/logout_inactividad.js"></script>

</html>