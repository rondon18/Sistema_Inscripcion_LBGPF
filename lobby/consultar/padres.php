<?php
session_start();
if (!$_SESSION['login']) {
	header('Location: ../../index.php');
	exit();
}

require("../../controladores/conexion.php");
require("../../clases/Padre.php");
require("../../clases/madre.php");
require("../../clases/teléfonos.php");
require('../../clases/bitácora.php');
require('funciones.php');

$bitácora = new bitácora();
$_SESSION['acciones'] .= ', Consulta estudiantes';
$bitácora->actualizar_bitácora($_SESSION['acciones'],$_SESSION['idbitácora']);

$Padre = new Padre();
$Madre = new Madre();
$Teléfonos = new Teléfonos();

$listaPadre = $Padre->mostrarPadre();
$listaMadre = $Madre->mostrarMadre();

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Consultar registros</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/datatables.min.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/all.min.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
		<link rel="icon" type="img/png" href="../../img/distintivo-LGPF.png">
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
		<main style="max-height: 100vh; overflow-y: auto;">
			
			<!--Banner-->
			<header class="w-100 bg-white d-flex justify-content-center justify-content-md-between shadow p-1 position-absolute top-0" style="z-index:1000;">
				<div>
					<img src="../../img/banner-gobierno.png" alt=""  height="42" class="d-none d-md-inline-block align-text-top">
					<img src="../../img/banner-MPPE.png" alt=""  height="42" class="d-none d-md-inline-block align-text-top">
				</div>
				<img src="../../img/banner-LGPF.png" alt=""  height="42" class="d-inline-block align-text-top">
			</header>
			
			<div class="container-md py-3 px-xl-5 my-5">
				<div class="card w-100 mx-0 my-auto">
					<div class="card-header text-center">
						<b class="fs-4">Consulta de registros</b>
					</div>
					<div class="row">
						<div class="col-12 pt-2">

							<!-- Navegación de secciones -->
							<ul class="list-group list-group-flush border-bottom">
								<li class="list-group-item">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb mb-2">
											<li class="breadcrumb-item">
												<i class="fas fa-home fa-lg me-1"></i>
												<a href="../index.php" title="Ir al menú principal">Menú principal</a>
											</li>
											<li class="breadcrumb-item">
												<i class="fas fa-search fa-lg me-1"></i>
												<span title="Se encuentra en la sección de consulta">Consultar</span>
											</li>
											<li class="breadcrumb-item fw-bold active">
												<i class="fas fa-children fa-lg me-1"></i>
												<span title="Se encuentra en la sección de consulta de estudiantes">Padres</span>
											</li>
										</ol>
									</nav>
								</li>
							</ul>

							<div class="card-body">

								<!--Selector de consulta-->
								<div class="bg-primary mb-4 p-2 rounded-2 text-white shadow border w-100">
									<div
										class="selector-consulta d-flex flex-column flex-sm-row gap-2 align-items-center justify-content-evenly">
										<p class="h4 m-0 text-center">Consultar:</p>
										<a href="estudiantes.php" class="btn btn-outline-light btn-sm hvr-icon-grow">
											<i class="fas fa-lg fa-children me-2 hvr-icon"></i>
											Estudiantes
										</a>
										<a href="representantes.php" class="btn btn-outline-light btn-sm hvr-icon-grow">
											<i class="fas fa-lg fa-users me-2 hvr-icon"></i>
											Representantes
										</a>
										<a href="padres.php" class="btn btn-outline-light btn-sm hvr-icon-grow active">
											<i class="fas fa-lg fa-person me-2 hvr-icon"></i>
											Padres
										</a>
										<a href="usuarios.php" class="btn btn-outline-light btn-sm hvr-icon-grow">
											<i class="fas fa-lg fa-user me-2 hvr-icon"></i>
											Usuarios
										</a>
										<a href="registros.php" class="btn btn-outline-light btn-sm hvr-icon-grow">
											<i class="fas fa-lg fa-clipboard me-2 hvr-icon"></i>
											Registros
										</a>
									</div>
								</div>
								
								<!-- Tabla volcada -->
								<div class="table-responsive">
									<p class="h4 text-uppercase border-2 border-bottom border-dark text-center mb-3">
										Mostrando Padres registrados
									</p>
									<table id="padres" class="text-uppercase table table-striped table-bordered table-sm w-100" style="font-size: 95%;">
										<thead>
											<th>Cédula</th>
											<th>Nombres</th>
											<th>Apellidos</th>
											<th>Rol</th>
											<th>Fecha Nacimiento</th>
											<th>Lugar Nacimiento</th>
											<th>Correo Electrónico</th>
											<th>Dirección</th>
											<th>Estado Civil</th>
										</thead>
										<tbody>

											<?php foreach ($listaPadre as $padre):?>
											<tr>
												<td><?php echo comprobarVacio($padre['Cédula']); ?></td>
												<td style="min-width:210px;">
													<?php 
														echo comprobarVacio($padre['Primer_Nombre'])." ".$padre['Segundo_Nombre']; 
													?>
												</td>
												<td style="min-width:210px;">
													<?php 
														echo comprobarVacio($padre['Primer_Apellido'])." ".$padre['Segundo_Apellido']; 
													?>
												</td>
												<td>Padre</td>
												<td class="text-center"><?php echo comprobarVacio($padre['Fecha_Nacimiento'],"F"); ?></td>
												<td><?php echo comprobarVacio($padre['Lugar_Nacimiento']); ?></td>
												<td style="min-width:160px;"><?php echo comprobarVacio($padre['Correo_Electrónico']); ?></td>
												<td style="min-width:190px;"><?php echo comprobarVacio($padre['Dirección']); ?></td>
												<td><?php echo comprobarVacio($padre['Estado_Civil']); ?></td>
											</tr>
											<?php endforeach; ?>

											<?php foreach ($listaMadre as $madre):?>
											<tr>
												<td><?php echo comprobarVacio($madre['Cédula']); ?></td>
												<td style="min-width:210px;">
													<?php 
														echo comprobarVacio($madre['Primer_Nombre'])." ".$madre['Segundo_Nombre']; 
													?>
												</td>
												<td style="min-width:210px;">
													<?php 
														echo comprobarVacio($madre['Primer_Apellido'])." ".$madre['Segundo_Apellido']; 
													?>
												</td>
												<td>Madre</td>
												<td class="text-center"><?php echo comprobarVacio($madre['Fecha_Nacimiento'],"F"); ?></td>
												<td><?php echo comprobarVacio($madre['Lugar_Nacimiento']); ?></td>
												<td style="min-width:160px;"><?php echo comprobarVacio($madre['Correo_Electrónico']); ?></td>
												<td style="min-width:190px;"><?php echo comprobarVacio($madre['Dirección']); ?></td>
												<td><?php echo comprobarVacio($madre['Estado_Civil']); ?></td>
											</tr>
											<?php endforeach ?>

										</tbody>
									</table>
								</div>
							</div>
							<div class="card-footer text-center">
								<span class="text-muted">Sistema de inscripción L.B. G.P.F.</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 position-fixed bottom-0" style="z-index: 100;">
			<span class="text-white">Sistema de inscripción L.B. G.P.F - <i class="far fa-copyright"></i> 2022-<?php echo date("y"); ?></span>
		</footer>
		<?php include '../../ayuda.php'; ?>
	</main>
</div>


<link rel="stylesheet" href="../../datatables/datatables.min.css">
<script src="../../datatables/datatables.min.js"></script>
<script src="../../js/consulta-padres.js"></script>

<script type="text/javascript" defer>
	function confirmacion() {
		//Pregunta si desea realizar la acción la cancela si selecciona NO
		if(confirm("¿Desea realizar esta accion?")) {
			alert("Acción ejecutada");
			return true;
		}
		else {
			alert("Acción cancelada");
			return false;
		}
	}
</script>
</body>
</html>