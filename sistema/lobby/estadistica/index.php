<?php 

	session_start();
	if (!$_SESSION['login']) {
		header('Location: ../../index.php');
		exit();
	}

	require("../../controladores/conexion.php");
	require("../../logs/error_handler.php");
	require('../../clases/bitacora.php');
	require('../../clases/estudiantes.php');
	require('../../clases/representantes.php');
	require('../../clases/padres.php');

	$bitacora = new bitacora();
	$_SESSION['acciones'] .= ', Consulta estudiantes';



	// Actualiza la bitácora
	$bitacora->set_id_bitacora($_SESSION['id_bitacora']);
	$bitacora->set_acciones_realizadas($_SESSION['acciones']);
	$bitacora->actualizar_bitacora();

	$nivel = 2;

	$estudiantes = new estudiantes();
	$representantes = new representantes();
	$padres = new padres();


?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Consultar registros</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
		<link rel="stylesheet" href="../../datatables/datatables.min.css">
		<link rel="stylesheet" type="text/css" href="../../css/all.min.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
		<link rel="icon" type="img/png" href="../../img/icono.png">
	</head>
	<style media="screen">
		.dataTables_paginate a {
			color: #fff !important;
			background-color: #0d6efd !important;
			border-color: #0d6efd !important;
			display: inline-block !important;
			font-weight: 400 !important;
			line-height: 1.5 !important;
			text-align: center !important;
			text-decoration: none !important;
			vertical-align: middle !important;
			cursor: pointer !important;
			-webkit-user-select: none !important;
			-moz-user-select: none !important;
			user-select: none !important;
			border: 1px solid transparent !important;
			padding: 0.375rem 0.75rem !important;
			font-size: 1rem !important;
			border-radius: 0.25rem !important;
			transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out !important;
			margin: .25rem;
		}
	</style>
	<body>
		<main class="d-flex flex-column justify-content-between vh-100">
			
			<?php 
				include('../../header.php');
			?>
			
			<div class="container-md">
				<div class="card w-100">
					<div class="card-header text-center">
						<b class="fs-5">Consulta de estadisticas</b>
					</div>
					<div class="card-body" style="max-height: 65vh; overflow-y:auto;">

						<section class="px-sm-3 px-md-5 py-2 py-sm-4 mb-2 mb-sm-0 d-flex flex-column flex-sm-row align-items-center">
							<i class="fa-solid fa-chart-column fa-4x me-sm-4 mb-4 mb-sm-0"></i>
							<div class="text-center text-sm-start">
								<p class="display-5 mb-1">
									¿Qué estadíticas desea consultar?
								</p>
								<span class="lead fs-6 text-muted">Presione para mostrar las opciones de estadística.</span>
							</div>
						</section>

						<script type="text/javascript" src="../../js/jquery-3.7.1.min.js"></script>
						<script type="text/javascript" src="../../../node_modules/chart.js/dist/chart.umd.js"></script>

						<div class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 px-md-5 g-4 mb-4">

							<?php include('estudiantes.php');?>
							<!-- Gestionar registros -->
							<div class="col">
								<div
									class="card bg-light shadow hover-grow card-menu"
									data-bs-toggle="tooltip"
									data-bs-placement="top"
									title="Presione para mostrar los filtros."
								>
									<div class="card-body d-flex flex-column flex-sm-row gap-3 align-items-center justify-content-center justify-content-sm-start">
										<i class="fa-solid fa-children fa-2xl mt-3 mt-sm-0 mb-2 mb-sm-0"></i>
										<div class="px-sm-2 w-100">
											<a
												href="#"
												class="link-dark text-decoration-none stretched-link link-menu"
												data-bs-toggle="modal"
												data-bs-target="#filtros_estadistica_est"
											>
												Estudiantes.
											</a>
										</div>
									</div>
								</div>
							</div>


							<?php include('representantes.php');?>
							<!-- Gestionar registros -->
							<div class="col">
								<div
									class="card bg-light shadow hover-grow card-menu"
									data-bs-toggle="tooltip"
									data-bs-placement="top"
									title="Presione para mostrar los filtros."
								>
									<div class="card-body d-flex flex-column flex-sm-row gap-3 align-items-center justify-content-center justify-content-sm-start">
										<i class="fa-solid fa-people-group fa-2xl mt-3 mt-sm-0 mb-2 mb-sm-0"></i>
										<div class="px-sm-2 w-100">
											<a
												href="#"
												type="button"
												class="link-dark text-decoration-none stretched-link link-menu"
												data-bs-toggle="modal"
												data-bs-target="#filtros_estadistica_rep"
												>
												Representantes.
											</a>
										</div>
									</div>
								</div>
							</div>

							<?php include('padres.php');?>
							<!-- Gestionar registros -->
							<div class="col">
								<div
									class="card bg-light shadow hover-grow card-menu"
									data-bs-toggle="tooltip"
									data-bs-placement="top"
									title="Presione para mostrar los filtros."
								>
									<div class="card-body d-flex flex-column flex-sm-row gap-3 align-items-center justify-content-center justify-content-sm-start">
										<div class="d-flex">
											<i class="fa-solid fa-person fa-2xl"></i>
											<i class="fa-solid fa-child fa-xl mt-1"></i>
											<i class="fa-solid fa-person-dress fa-2xl me-2"></i>
										</div>
										<div class="px-sm-2 w-100">
											<a
												href="#"
												type="button"
												class="link-dark text-decoration-none stretched-link link-menu"
												data-bs-toggle="modal"
												data-bs-target="#filtros_estadistica_pad"
												>
												Padres.
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>

					<div class="card-footer">
						<a href="../index.php" class="btn btn-primary">
							<i class="fa-solid fa-lg me-2 fa-home"></i>
							Menú principal
						</a>
					</div>
					
				</div>
			</div>
		</div>
		<?php include('../../footer.php');?>
		<?php include '../../ayuda.php';?>
	</main>
	<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../../js/jquery-3.7.1.min.js"></script>
	<script type="text/javascript" src="../../js/sweetalert2.js"></script>
	<script type="text/javascript" src="../../js/logout_inactividad.js"></script>
	<script type="text/javascript">
		var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
		var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		  return new bootstrap.Tooltip(tooltipTriggerEl)
		});
	</script>

</body>
</html>