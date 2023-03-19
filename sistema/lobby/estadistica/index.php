<?php 

	session_start();
	if (!$_SESSION['login']) {
		header('Location: ../../index.php');
		exit();
	}

	require("../../controladores/conexion.php");
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
						<b class="fs-4">Consulta de estadisticas</b>
					</div>
					<div class="card-body" style="max-height: 65vh; overflow-y:auto;">

						<div class="row px-4" style="max-height 70vh;min-height 60vh; overflow-y: auto;">
							<script type="text/javascript" src="../../js/jquery-3.6.1.min.js"></script>
							<script type="text/javascript" src="../../../node_modules/chart.js/dist/chart.umd.js"></script>
								
								<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">

									<?php include('estudiantes.php');?>
									<!-- Gestionar registros -->
									<div class="col px-2 py-2">
										<div class="card bg-light">
											<div class="card-body d-flex align-items-center">
												<i class="fa-solid fa-chart-pie fa-2xl m-2"></i>
												<div class="px-2 w-100">
													<h6 class="card-title mb-2">Estudiantes.</h6>
													<a href="#" class="btn btn-primary w-100 btn-sm stretched-link" data-bs-toggle="modal" data-bs-target="#filtros_estadistica_est">Consultar</a>
												</div>
											</div>
										</div>
									</div>

									
									<?php include('representantes.php');?>
									<!-- Gestionar registros -->
									<div class="col px-2 py-2">
										<div class="card bg-light">
											<div class="card-body d-flex align-items-center">
												<i class="fa-solid fa-chart-pie fa-2xl m-2"></i>
												<div class="px-2 w-100">
													<h6 class="card-title mb-2">Representantes.</h6>
													<a href="#" type="button" class="btn btn-primary w-100 btn-sm stretched-link" data-bs-toggle="modal" data-bs-target="#filtros_estadistica_rep">Consultar</a>
												</div>
											</div>
										</div>
									</div>

									<!-- Gestionar registros -->
									<div class="col px-2 py-2">
										<div class="card bg-light">
											<div class="card-body d-flex align-items-center">
												<i class="fa-solid fa-chart-pie fa-2xl m-2"></i>
												<div class="px-2 w-100">
													<h6 class="card-title mb-2">Padres.</h6>
													<a href="#" type="button" class="btn btn-primary w-100 btn-sm stretched-link">Consultar</a>
												</div>
											</div>
										</div>
									</div>

									<!-- Gestionar registros -->
									<div class="col px-2 py-2">
										<div class="card bg-light">
											<div class="card-body d-flex align-items-center">
												<i class="fa-solid fa-chart-pie fa-2xl m-2"></i>
												<div class="px-2 w-100">
													<h6 class="card-title mb-2">Estadisticas generales.</h6>
													<a href="#" type="button" class="btn btn-primary w-100 btn-sm stretched-link">Consultar</a>
												</div>
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
</body>
</html>