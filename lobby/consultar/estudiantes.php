<?php
session_start();
if (!$_SESSION['login']) {
	header('Location: ../../index.php');
	exit();
}

require("../../controladores/conexion.php");
require("../../clases/estudiante.php");
require("../../clases/representantes.php");
require("../../clases/teléfonos.php");
require('../../clases/bitácora.php');
	require('funciones.php');


$bitácora = new bitácora();
$_SESSION['acciones'] .= ', Consulta estudiantes';
$bitácora->actualizar_bitácora($_SESSION['acciones'],$_SESSION['idbitácora']);

$estudiante = new Estudiantes();
$representante = new Representantes();
$Teléfonos = new Teléfonos();

$listaEstudiantes = $estudiante->mostrarEstudiantes();
$listaRepresentantes = $representante->mostrarRepresentantes();

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
												<span title="Se encuentra en la sección de consulta de estudiantes">Estudiantes</span>
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
										<a href="estudiantes.php" class="btn btn-outline-light btn-sm hvr-icon-grow active">
											<i class="fas fa-lg fa-children me-2 hvr-icon"></i>
											Estudiantes
										</a>
										<a href="representantes.php" class="btn btn-outline-light btn-sm hvr-icon-grow">
											<i class="fas fa-lg fa-users me-2 hvr-icon"></i>
											Representantes
										</a>
										<a href="padres.php" class="btn btn-outline-light btn-sm hvr-icon-grow">
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
										Mostrando Estudiantes registrados
									</p>
									<table id="estudiantes" class="text-uppercase table table-striped table-bordered table-sm w-100" style="font-size: 95%;">
										<thead>
											<tr>
												<!-- Datos del estudiante -->
												<th>Nro.</th>
												<th>Cédula</th>
												<th>Nombres</th>
												<th>Apellidos</th>
												<th>Fecha de nacimiento</th>
												<th>Edad</th>
												<th>Año a cursar</th>
												<th>Género</th>
												<th>Correo electrónico</th>
												<th>Teléfonos</th>
												<th>Dirección de residencia</th>

												<!-- Ficha médica del estudiante -->
												<th>Talla de camisa</th>
												<th>Talla de pantalón</th>
												<th>Talla de zapatos</th>
												<th>Estatura</th>
												<th>Peso</th>
												<th>Índice</th>
												<th>Circ. Braquial</th>
												<th>Vacunado</th>
												<th>Vacuna</th>
												<th>Dosis</th>
												<th>Lote</th>

												<!-- Datos del representante -->
												<th>Datos del representante</th>
												<th>Cédula</th>
												<th>Nombres</th>
												<th>Apellidos</th>
												<th>Dirección</th>
												<th>Fecha de nacimiento</th>
												<th>Teléfonos</th>

												<!-- Botones de acción -->
												<th>Acciones</th>

											</tr>
										</thead>
										<tbody>
											<?php foreach ($listaEstudiantes as $estudiante):?>
											<tr>

												<td><?php echo $estudiante['idEstudiantes']; ?></td>
												
												<!-- Datos del estudiante -->
												<?php $Teléfonos_Est = $Teléfonos->consultarTeléfonos($estudiante['Cédula']);  ?>
												<td><?php echo $estudiante['Cédula']; ?></td>
												
												<td>
													<?php echo $estudiante['Primer_Nombre']." ".$estudiante['Segundo_Nombre']; ?>
												</td>

												<td>
													<?php echo $estudiante['Primer_Apellido']." ".$estudiante['Segundo_Apellido']; ?>
												</td>
												
												<td><?php echo $estudiante['Fecha_Nacimiento']; ?></td>
												<td>
													<?php echo comprobarVacio(calculaedad($estudiante['Fecha_Nacimiento']),"E");?>
												</td>
												<td><?php echo $estudiante['Grado_A_Cursar']; ?></td>
												<td><?php echo Género($estudiante['Género']); ?></td>
												<td><?php echo $estudiante['Correo_Electrónico']; ?></td>
												
												<td>
												<?php 
													echo comprobarVacio(Teléfono($Teléfonos_Est[0]['Prefijo'],$Teléfonos_Est[0]['Número_Telefónico']));
													
													echo  " / ";  
													
													echo comprobarVacio(Teléfono($Teléfonos_Est[1]['Prefijo'],$Teléfonos_Est[1]['Número_Telefónico']));
												?>
												</td>

												<td><?php echo $estudiante['Dirección']; ?></td>

												<!-- Ficha médica del estudiante -->
												<td><?php echo $estudiante['Talla_Camisa']; ?></td>
												<td><?php echo $estudiante['Talla_Pantalón']; ?></td>
												<td><?php echo $estudiante['Talla_Zapatos']; ?></td>
												<td><?php echo $estudiante['Estatura']."cm"; ?></td>
												<td><?php echo $estudiante['Peso']."kg"; ?></td>
												<td><?php echo $estudiante['Índice']; ?></td>
												<td><?php echo $estudiante['Circ_Braquial']; ?></td>
												<td><?php echo $estudiante['Vacunado']; ?></td>
												<td><?php echo $estudiante['Vacuna']; ?></td>
												<td><?php echo comprobarVacio($estudiante['Dosis'],"D"); ?></td>
												<td><?php echo comprobarVacio($estudiante['Lote']); ?></td>

												<!-- Datos del representante del estudiante -->
												<?php $datosRepresentante = $representante->consultarRepresentanteID($estudiante['idRepresentante']);?>
												<?php $Teléfonos_re = $Teléfonos->consultarTeléfonosRepresentanteID($estudiante['idRepresentante']); ?>
												
												<td></td>

												<td><?php echo $datosRepresentante['Cédula']; ?> </td>
												<td><?php echo $datosRepresentante['Primer_Nombre']." ".$datosRepresentante['Segundo_Nombre']; ?> </td>
												<td><?php echo $datosRepresentante['Primer_Apellido']." ".$datosRepresentante['Segundo_Apellido']; ?> </td>
												<td><?php echo $datosRepresentante['Dirección']; ?> </td>
												<td><?php echo $datosRepresentante['Fecha_Nacimiento']; ?> </td>
												
												<td>
												<?php 
													echo comprobarVacio(Teléfono($Teléfonos_re[0]['Prefijo'],$Teléfonos_re[0]['Número_Telefónico']));
													echo ' / '; 
													echo comprobarVacio(Teléfono($Teléfonos_re[1]['Prefijo'],$Teléfonos_re[1]['Número_Telefónico']));
													echo ' / '; 
													echo comprobarVacio(Teléfono($Teléfonos_re[2]['Prefijo'],$Teléfonos_re[2]['Número_Telefónico']));
												?>
												</td>

												<!-- Acciones -->
												<td>
													<!--Generar planilla de inscripción-->
													<form action="../../controladores/generar-planilla-estudiante.php" method="POST" style="display: inline-block;" target="_blank">
														<input type="hidden" name="Cédula_Estudiante" value="<?php echo $estudiante['Cédula']; ?>">
														<input type="hidden" name="id_Estudiante" value="<?php echo $estudiante['idEstudiantes']; ?>">
														<input type="hidden" name="id_representante" value="<?php echo $estudiante['idRepresentante']; ?>">
														<input type="hidden" name="id_padre" value="<?php echo $estudiante['idPadre']; ?>">
														<input type="hidden" name="id_madre" value="<?php echo $estudiante['idMadre']; ?>">
														<button class="btn btn-sm btn-danger" type="submit" name="Generar planilla">Generar planilla <i class="fas fa-file-pdf fa-lg ms-2"></i></button>
													</form>
													<form action="../../controladores/generar-compromiso-representante.php" method="POST" style="display: inline-block;" target="_blank">
														<input type="hidden" name="Cédula_Estudiante" value="<?php echo $estudiante['Cédula']; ?>">
														<input type="hidden" name="id_Estudiante" value="<?php echo $estudiante['idEstudiantes']; ?>">
														<input type="hidden" name="id_representante" value="<?php echo $estudiante['idRepresentante']; ?>">
														<button class="btn btn-sm btn-danger" type="submit" name="Generar planilla de Compromiso">Generar planilla de compromiso <i class="fas fa-file-pdf fa-lg ms-2"></i></button>
													</form>
													<form action="consultar-estudiante.php" method="post" style="display: inline-block;">
														<input type="hidden" name="Cédula_Estudiante" value="<?php echo $estudiante['Cédula']; ?>">
														<input type="hidden" name="id_Estudiante" value="<?php echo $estudiante['idEstudiantes']; ?>">
														<input type="hidden" name="id_representante" value="<?php echo $estudiante['idRepresentante']; ?>">
														<input type="hidden" name="id_padre" value="<?php echo $estudiante['idPadre']; ?>">
														<input type="hidden" name="id_madre" value="<?php echo $estudiante['idMadre']; ?>">
														<button class="btn btn-sm btn-primary" type="submit" name="Consultar">Consultar <i class="fas fa-magnifying-glass fa-lg ms-2"></i></button>
													</form>
													<form action="editar-estudiante/paso-1.php" method="post" style="display: inline-block;" target="_blank">
														<input type="hidden" name="Cédula_Estudiante" value="<?php echo $estudiante['Cédula']; ?>">
														<input type="hidden" name="id_Estudiante" value="<?php echo $estudiante['idEstudiantes']; ?>">
														<input type="hidden" name="id_representante" value="<?php echo $estudiante['idRepresentante']; ?>">
														<input type="hidden" name="id_padre" value="<?php echo $estudiante['idPadre']; ?>">
														<input type="hidden" name="id_madre" value="<?php echo $estudiante['idMadre']; ?>">
														<button class="btn btn-sm btn-primary" type="submit" name="Consultar" title="Funcion en mantenimiento">Editar <i class="fas fa-pen fa-lg ms-2"></i></button>
													</form>
													<?php if ($_SESSION['usuario']['Privilegios'] == 1): ?>
													<form action="../../controladores/control-registros.php" method="post" style="display: inline-block;">
														<input type="hidden" name="Cédula_Estudiante" value="<?php echo $estudiante['Cédula']; ?>">
														<button class="btn btn-sm btn-primary" type="submit" onclick="return confirmacion();" name="orden" value="Eliminar">Eliminar <i class="fas fa-trash-can fa-lg ms-2"></i></button>
													</form>
													<?php endif; ?>
												</td>
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

<script src="../../datatables/datatables.min.js"></script>
<script src="../../js/consulta-estudiantes.js"></script>

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