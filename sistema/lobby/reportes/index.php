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
						<b class="fs-4">Área de reportes</b>
					</div>


					<div class="card-body">
						<section class="px-3 px-md-5 py-4 d-flex align-items-center">
							<i class="fa-solid fa-file-export fa-4x me-4"></i>
							<div>
								<p class="h3 mb-2">
									¿Qué tipo de reporte desea generar?
								</p>
								<span class="text-muted">Presione para mostrar las opciones del reporte</span>
							</div>
						</section>
						<section class="row row-cols-1 row-cols-md-2 row-cols-lg-3">

							
							<?php include("filtros_estudiantes.php");?>
							<!-- Reporte de estudiantes -->
							<div class="col px-2 px-md-4 py-2">
								<div class="card bg-light">
									<div class="card-body d-flex align-items-center">
										<i class="fa-solid fa-children fa-2xl m-2"></i>
										<div class="px-2 w-100">
											<h6 class="card-title mb-2">Estudiantes.</h6>
											<a 
												href="#" 
												class="btn btn-primary w-100 btn-sm stretched-link"
												data-bs-toggle="modal" 
												data-bs-target="#modal_filtros_estudiantes"
											>
												Mostrar filtros
											</a>
										</div>
									</div>
								</div>
							</div>




							<?php include("filtros_representantes.php");?>
							<!-- Reporte de representantes -->
							<div class="col px-2 px-md-4 py-2">
								<div class="card bg-light">
									<div class="card-body d-flex align-items-center">
										<i class="fa-solid fa-people-group fa-2xl m-2"></i>
										<div class="px-2 w-100">
											<h6 class="card-title mb-2">Representantes.</h6>
											<button 
												class="btn btn-primary w-100 btn-sm stretched-link"
												data-bs-toggle="modal" 
												data-bs-target="#modal_filtros_representantes"
											>
												Mostrar filtros
											</button>
										</div>
									</div>
								</div>
							</div>




							<?php include("filtros_padres.php");?>
							<!-- Reporte de padres -->
							<div class="col px-2 px-md-4 py-2">
								<div class="card bg-light">
									<div class="card-body d-flex align-items-center">
										<i class="fa-solid fa-person fa-2xl"></i>
										<i class="fa-solid fa-child fa-xl mt-2"></i>
										<i class="fa-solid fa-person-dress fa-2xl me-2"></i>
										<div class="px-2 w-100">
											<h6 class="card-title mb-2">Padres.</h6>
											<a 
												href="#" 
												class="btn btn-primary w-100 btn-sm stretched-link"
												data-bs-toggle="modal" 
												data-bs-target="#modal_filtros_padres"
											>
												Mostrar filtros
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
	<script type="text/javascript" src="../../js/jquery-3.6.1.min.js"></script>
	<script type="text/javascript" src="../../js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="../../js/messages_es.min.js"></script>
	<script type="text/javascript" src="../../js/sweetalert2.js"></script>
	<script type="text/javascript" src="../../js/reportes.js"></script>
	<script type="text/javascript" src="../../js/logout_inactividad.js"></script>

	<?php if (isset($_GET['exito'])): ?>
		<script type="text/javascript">
			Swal.fire(
	      'Exito',
	      'Reporte generado correctamente',
	      'success'
	    )
		</script>
	<?php elseif (isset($_GET['err_con'])): ?>
		<script type="text/javascript">
			Swal.fire(
	      'Error',
	      'No existe ningún registro que coincida con los filtross seleccionados',
	      'error'
	    )
		</script>
	<?php endif ?>

</html>