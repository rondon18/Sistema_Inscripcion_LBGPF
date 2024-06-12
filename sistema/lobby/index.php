<?php
	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../index.php');
		exit();
	}

	require('../clases/bitacora.php');
	require('../controladores/conexion.php');
	require('../logs/error_handler.php');

	$bitacora = new bitacora();
	$_SESSION['acciones'] .= ', Visita menú principal';

	$bitacora->set_id_bitacora($_SESSION['id_bitacora']);
	$bitacora->set_acciones_realizadas($_SESSION['acciones']);
	$bitacora->actualizar_bitacora();

	$nivel = 1;

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
						<b class="fs-5">MENÚ PRINCIPAL</b>
					</div>
					<div class="card-body" style="max-height: 65vh; overflow-y:auto;">
						<section class="px-sm-3 px-md-5 pt-2 pb-2 pb-sm-4 mb-2 mb-sm-0 d-flex flex-column flex-sm-row align-items-center">
							<div class="text-center text-sm-start">
								<p class="display-5 mb-1">
									Bienvenido(a), <?php echo $_SESSION['datos_login']['p_nombre']." ".$_SESSION['datos_login']['p_apellido'];?>.
								</p>
								<span class="lead fs-6 text-muted">¿Qué desea hacer?</span>
							</div>
							<img class="d-none d-sm-inline-block ms-sm-auto mb-4 mb-sm-0" src="../img/icono.png" alt="Icono del sistema" width="125">
						</section>

						<section class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 px-md-5 g-4 mb-4">


							<!-- Gestionar registros -->
							<div
								class="col"
								data-bs-toggle="tooltip"
								data-bs-placement="top"
								<?php if ($_SESSION['datos_login']['privilegios'] < 2): ?>
								title="Consulte, edite y genere distintas planillas. Además de poder gestionar registros y usuarios."
								<?php else: ?>
								title="Consulte, edite y genere distintas planillas."
								<?php endif ?>
							>
								<div class="card bg-light shadow hover-grow card-menu">
									<div class="card-body d-flex flex-column flex-sm-row gap-3 align-items-center justify-content-center justify-content-sm-start">
										<i class="fa-solid fa-magnifying-glass fa-2xl mt-3 mt-sm-0 mb-2 mb-sm-0"></i>
										<div class="px-sm-2 w-100">
											<a class="link-dark text-decoration-none stretched-link link-menu" href="consultar/index.php">Gestionar registros.</a>
										</div>
									</div>
								</div>
							</div>

							<!-- Registrar estudiante -->
							<div
								class="col"
								data-bs-toggle="tooltip"
								data-bs-placement="top"
								title="Inicie el proceso de inscripción de un estudiante de nuevo ingreso."
							>
								<div class="card bg-light shadow hover-grow card-menu">
									<div class="card-body d-flex flex-column flex-sm-row gap-3 align-items-center justify-content-center justify-content-sm-start">
										<i class="fa-solid fa-user-plus fa-2xl mt-3 mt-sm-0 mb-2 mb-sm-0"></i>
										<div class="px-sm-2 w-100">
											<a class="link-dark text-decoration-none stretched-link link-menu" href="registrar_estudiante/paso_1.php">Registrar estudiante.</a>
										</div>
									</div>
								</div>
							</div>


							<!-- Generar reporte -->
							<div
								class="col"
								data-bs-toggle="tooltip"
								data-bs-placement="top"
								title="Genere distintos tipos de reportes en formato de hoja de calculo (Excel)."
							>
								<div class="card bg-light shadow hover-grow card-menu">
									<div class="card-body d-flex flex-column flex-sm-row gap-3 align-items-center justify-content-center justify-content-sm-start">
										<i class="fa-solid fa-file-export fa-2xl mt-3 mt-sm-0 mb-2 mb-sm-0"></i>
										<div class="px-sm-2 w-100">
											<a class="link-dark text-decoration-none stretched-link link-menu" href="reportes/index.php">Generar reporte.</a>
										</div>
									</div>
								</div>
							</div>


							<!-- Estadísticas -->
							<div
								class="col"
								data-bs-toggle="tooltip"
								data-bs-placement="top"
								title="Consulte las estadisticas del sistema (Estudiantes, padres y representantes)."
							>
								<div class="card bg-light shadow hover-grow card-menu">
									<div class="card-body d-flex flex-column flex-sm-row gap-3 align-items-center justify-content-center justify-content-sm-start">
										<i class="fa-solid fa-chart-column fa-2xl mt-3 mt-sm-0 mb-2 mb-sm-0"></i>
										<div class="px-sm-2 w-100">
											<a class="link-dark text-decoration-none stretched-link link-menu" href="estadistica/index.php">Consultar estadisticas.</a>
										</div>
									</div>
								</div>
							</div>


							<?php if ($_SESSION['datos_login']['privilegios'] < 2):?>
							

							<!-- Registrar usuario -->
							<div
								class="col"
								data-bs-toggle="tooltip"
								data-bs-placement="top"
								title="Registre usuarios nuevos para operar el sistema."
							>
								<div class="card bg-light shadow hover-grow card-menu">
									<div class="card-body d-flex flex-column flex-sm-row gap-3 align-items-center justify-content-center justify-content-sm-start py-4">
										<i class="fa-solid fa-user-plus fa-2xl mt-3 mt-sm-0 mb-2 mb-sm-0"></i>
										<div class="px-sm-2 w-100">
											<a class="link-dark text-decoration-none stretched-link link-menu" href="registrar_usuario/paso_1.php">Registrar usuario.</a>
										</div>
									</div>
								</div>
							</div>


							<!-- Gestión del sistema -->
							<div
								class="col"
								data-bs-toggle="tooltip"
								data-bs-placement="top"
								title="Gestione los repaldos y puntos de restauración del sistema."
							>
								<div class="card bg-light shadow hover-grow card-menu">
									<div class="card-body d-flex flex-column flex-sm-row gap-3 align-items-center justify-content-center justify-content-sm-start">
										<i class="fa-solid fa-wrench fa-2xl mt-3 mt-sm-0 mb-2 mb-sm-0"></i>
										<div class="px-sm-2 w-100">
											<a class="link-dark text-decoration-none stretched-link link-menu" href="mantenimiento/index.php">Gestionar sistema.</a>
										</div>
									</div>
								</div>
							</div>


							<?php endif?>


							<div
								class="col"
								data-bs-toggle="tooltip"
								data-bs-placement="top"
								title="Consulte y actualice su perfil de usuario."
							>
								<div class="card bg-light shadow hover-grow card-menu">
									<div class="card-body d-flex flex-column flex-sm-row gap-3 align-items-center justify-content-center justify-content-sm-start">
										<i class="fa-solid fa-user fa-2xl mt-3 mt-sm-0 mb-2 mb-sm-0"></i>
										<div class="px-sm-2 w-100">
											<a class="link-dark text-decoration-none stretched-link link-menu" href="perfil/index.php">Ver mi perfil.</a>
										</div>
									</div>
								</div>
							</div>


							<div
								class="col"
								data-bs-toggle="tooltip"
								data-bs-placement="top"
								title="Cierra sesión y sale del sistema."
							>
								<div class="card bg-light shadow hover-grow card-menu">
									<div class="card-body d-flex flex-column flex-sm-row gap-3 align-items-center justify-content-center justify-content-sm-start">
										<i class="fa-solid fa-power-off fa-2xl mt-3 mt-sm-0 mb-2 mb-sm-0"></i>
										<div class="px-sm-2 w-100">
											<a class="link-dark text-decoration-none stretched-link link-menu" href="../controladores/logout.php">Cerrar sesión.</a>
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
	<script type="text/javascript" src="../js/jquery-3.7.1.min.js"></script>
	<script type="text/javascript" src="../js/sweetalert2.js"></script>
	<script type="text/javascript">
		<?php if (isset($_GET['exito'])): ?>
		Swal.fire({
		  icon: 'success',
		  title: 'Proceso exitoso',
		  showConfirmButton: false,
		  timer: 2000 // tiempo en milisegundos (en este caso, 2 segundos)
		})
		<?php endif ?>
		var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
		var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		  return new bootstrap.Tooltip(tooltipTriggerEl)
		})
	</script>
	<script type="text/javascript" src="../js/logout_inactividad.js"></script>

</html>