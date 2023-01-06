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
	$bitacora->actualizar_bitacora($_SESSION['acciones'],$_SESSION['id_bitacora']);

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
			
			<?php include("../header.php"); ?>

			<div class="container-md">
				<div class="card w-100 my-3">
					<div class="card-header text-center">
						<b class="fs-4">Menú principal</b>
					</div>
					<div class="card-body">
						<section class="px-3 px-md-5 py-4 d-flex align-items-center">
							<img class="me-5" src="../img/icono.png" alt="Icono del sistema" width="100">
							<div>
								<p class="h3 mb-1">
									Bienvenido(a), <?php echo $_SESSION['persona']['Primer_Nombre']." ".$_SESSION['persona']['Primer_Apellido']; ?>.
								</p>
								<span class="text-muted">¿Qué desea hacer?</span>
							</div>
						</section>
						<section class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
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


			<?php include("../footer.php"); ?>
			<?php include('../ayuda.php'); ?>
		</main>
		
	</body>
	<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</html>