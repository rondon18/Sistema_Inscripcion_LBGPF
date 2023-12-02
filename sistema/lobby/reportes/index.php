<?php
	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../../index.php');
		exit();
	}

	require('../../clases/bitacora.php');
	require('../../controladores/conexion.php');

	$bitacora = new bitacora();
	$_SESSION['acciones'] .= ', Visita área de reportes';

	$bitacora->set_id_bitacora($_SESSION['id_bitacora']);
	$bitacora->set_acciones_realizadas($_SESSION['acciones']);
	$bitacora->actualizar_bitacora();

	$nivel = 2;

	// var_dump($_SESSION);

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Área de reportes</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/all.min.css"/>
		<link rel="icon" type="img/png" href="../../img/icono.png">
	</head>
	<body>
		
		<main class="d-flex flex-column justify-content-between vh-100">
			
			<?php include("../../header.php");?>

			<div class="container-md">
				<div class="card w-100 my-3">
					<div class="card-header text-center">
						<b class="fs-5">Área de reportes</b>
					</div>


					<div class="card-body">

						<section class="px-sm-3 px-md-5 py-2 py-sm-4 mb-2 mb-sm-0 d-flex flex-column flex-sm-row align-items-center">
							<i class="fa-solid fa-file-export fa-4x me-sm-4 mb-4 mb-sm-0"></i>
							<div class="text-center text-sm-start">
								<p class="display-5 mb-1">
									¿Qué tipo de reporte desea generar?.
								</p>
								<span class="lead fs-6 text-muted">Presione para mostrar las opciones del reporte</span>
							</div>
						</section>

						<section class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 px-md-5 g-4 mb-4">

							
							<?php include("filtros_estudiantes.php");?>
							<!-- Reporte de estudiantes -->
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
												data-bs-target="#modal_filtros_estudiantes"
											>
												Estudiantes.
											</a>
										</div>
									</div>
								</div>
							</div>




							<?php include("filtros_representantes.php");?>
							<!-- Reporte de representantes -->
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
												class="link-dark text-decoration-none stretched-link link-menu"
												data-bs-toggle="modal" 
												data-bs-target="#modal_filtros_representantes"
											>
												Representantes.
											</a>
										</div>
									</div>
								</div>
							</div>




							<?php include("filtros_padres.php");?>
							<!-- Reporte de padres -->
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
												class="link-dark text-decoration-none stretched-link link-menu"
												data-bs-toggle="modal" 
												data-bs-target="#modal_filtros_padres"
											>
												Padres.
											</a>
										</div>
									</div>
								</div>
							</div>



							<?php include("filtros_nomina_estudiantil.php");?>
							<!-- Nómina estudiantil -->
							<div class="col">
								<div
									class="card bg-light shadow hover-grow card-menu"
									data-bs-toggle="tooltip"
									data-bs-placement="top"
									title="Presione para mostrar los filtros."
								>
									<div class="card-body d-flex flex-column flex-sm-row gap-3 align-items-center justify-content-center justify-content-sm-start">
										<i class="fa-solid fa-clipboard-list fa-2xl mt-3 mt-sm-0 mb-2 mb-sm-0"></i>
										<div class="px-sm-2 w-100">
											<a
												href="#"
												class="link-dark text-decoration-none stretched-link link-menu"
												data-bs-toggle="modal"
												data-bs-target="#modal_filtros_nomina_estudiantil"

											>
												Nómina estudiantil.
											</a>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>


					<div class="card-footer">
						<a class="btn btn-primary" href="../index.php">
							<i class="fa-solid fa-lg me-2 fa-backward"></i>
							Volver al inicio
						</a>
					</div>


				</div>
			</div>


			<?php include("../../footer.php");?>
			<?php include('../../ayuda.php');?>
		</main>
		
	</body>
	<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../../js/jquery-3.7.1.min.js"></script>
	<script type="text/javascript" src="../../js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="../../js/messages_es.min.js"></script>
	<script type="text/javascript" src="../../js/sweetalert2.js"></script>
	<script type="text/javascript" src="../../js/reportes.js"></script>
	<script type="text/javascript" src="../../js/logout_inactividad.js"></script>

	<script type="text/javascript">
		var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
		var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		  return new bootstrap.Tooltip(tooltipTriggerEl)
		});
		<?php if (isset($_GET['exito'])): ?>
				Swal.fire(
		      'Exito',
		      'Reporte generado correctamente',
		      'success'
		    )
		<?php elseif (isset($_GET['err_con'])): ?>
				Swal.fire(
		      'Error',
		      'No existe ningún registro que coincida con los filtross seleccionados',
		      'error'
		    )
		<?php endif ?>
	</script>



</html>