<?php

//COMPROBACION DE SESION INICIADA
session_start();
if (!$_SESSION['login']) {
	header('Location: ../../index.php');
	exit();
}

require("../../controladores/conexion.php");
require("../../clases/representantes.php");
require("../../clases/teléfonos.php");
require('../../clases/bitácora.php');
require('funciones.php');


//REGISTRO DE VISITA EN LA BITACORA
$bitácora = new bitácora();
$_SESSION['acciones'] .= ', Consulta estudiantes';
$bitácora->actualizar_bitácora($_SESSION['acciones'],$_SESSION['idbitácora']);


//INSTACIACION DE LOS REPRESENTANTES Y LOS TELEFONOS
$representante = new Representantes();
$Teléfonos = new Teléfonos();


$listaRepresentantes = $representante->mostrarRepresentantes();

// foreach ($listaRepresentantes as $key => $value) {
// 	echo "<br><br><br><br><br><br><br><br>";
// 	echo var_dump($key) ."->". var_dump($value) ."<br><br>";
// 	break;
// }

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
												<i class="fas fa-users fa-lg me-1"></i>
												<span title="Se encuentra en la sección de consulta de representantes">Representantes</span>
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
										<a href="representantes.php" class="btn btn-outline-light btn-sm hvr-icon-grow active">
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
										Mostrando Representantes registrados
									</p>
									<table id="representantes" class="text-uppercase table table-striped table-bordered table-sm w-100" style="font-size: 95%;">
										<thead>
											<!-- Datos personales -->
											<th>Cédula</th>
											<th>Nombres</th>
											<th>Apellidos</th>
											<th>Fecha de nacimiento</th>
											<th>Lugar de nacimiento</th>
											<th>Género</th>
											<th>Correo Electrónico</th>
											<th>Dirección</th>
											<th>Estado civil</th>
											<th>Grado de instrucción</th>
											<th>Año del(os) representado(s)</th>
											<th>Teléfonos</th>

											<!-- Datos de vivienda -->
											<th>Datos de vivienda</th>
											<th>Vivienda</th>
											<th>Tenencia de la vivienda</th>
											<th>Condiciones de la vivienda</th>

											<!-- Datos laborales -->
											<th>Datos laborales</th>
											<th>Empleo</th>
											<th>Dirección del trabajo</th>
											<th>Remuneración</th>
											<th>Tipo de remuneración</th>

											<!-- Datos economicos -->
											<th>Datos economicos</th>
											<th>Banco de la cuenta</th>

										</thead>
										<tbody>
											<?php foreach ($listaRepresentantes as $representante): ?>
											<tr>
												<?php
													//Cantidad dde estudiantes que tiene el representante
													$Representante = new Representantes();
													$representados = $Representante->mostrarRepresentados($representante['idRepresentantes']);
													$cont = 0;
													$coma = count($representados);

													//Números de telefono del representante
													$Teléfonos_re = $Teléfonos->consultarTeléfonosRepresentanteID($representante['idRepresentantes']); 
												?>

												<td><?php echo $representante['Cédula'];?></td>
												<td>
													<?php echo $representante['Primer_Nombre'].' '.$representante['Segundo_Nombre'];?>
												</td>
												<td>
													<?php echo $representante['Primer_Apellido'].' '.$representante['Segundo_Apellido'];?>		
												</td>
												<td><?php echo $representante['Fecha_Nacimiento'];?></td>
												<td><?php echo $representante['Lugar_Nacimiento'];?></td>
												<td><?php echo Género($representante['Género']); ?></td>
												<td><?php echo $representante['Correo_Electrónico'];?></td>
												<td><?php echo $representante['Dirección'];?></td>
												<td><?php echo $representante['Estado_Civil'];?></td>
												<td><?php echo $representante['Grado_Académico'];?></td>
												
												<td>
													<?php foreach ($representados as $Representante):?>
														<?php
															echo $representados[$cont]['Grado_A_Cursar'];
															if (++$cont === $coma) {
																echo " " ;
															} 
															else {
																echo ", ";
															} 
														?>
													<?php endforeach; ?>
												</td>
												
												<td>
												<?php 
													echo comprobarVacio(Teléfono($Teléfonos_re[0]['Prefijo'],$Teléfonos_re[0]['Número_Telefónico']));
													
													echo  ' / ';
													
													echo comprobarVacio(Teléfono($Teléfonos_re[1]['Prefijo'],$Teléfonos_re[1]['Número_Telefónico']));
													
													echo  ' / ';
													
													echo comprobarVacio(Teléfono($Teléfonos_re[2]['Prefijo'],$Teléfonos_re[2]['Número_Telefónico']));
												?>
												</td>
												
												<!-- Datos vivienda -->
												<td></td>

												<td><?php echo $representante['Condiciones_Vivienda'];?></td>
												<td><?php echo $representante['Tipo_Vivienda'];?></td>
												<td><?php echo $representante['Tenencia_vivienda'];?></td>

												<!-- Datos laborales -->
												<td></td>
												
												<td><?php echo $representante['Empleo'];?></td>
												<td>
													<?php echo comprobarVacio($representante['Lugar_Trabajo']);?>
												</td>
												<td>
													<?php echo comprobarVacio($representante['Remuneración'],"R");?>
												</td>
												<td>
													<?php echo comprobarVacio($representante['Tipo_Remuneración']);?>
												</td>
												
												<!-- Datos economicos -->
												<td></td>
												
												<td><?php echo $representante['Banco'];?></td>

											
											</tr>
											<?php endforeach; ?>
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
			<span class="text-white">Sistema de inscripción L.B. G.P.F - <i class="far fa-copyright"></i> 2022-<?php echo date("Y"); ?></span>
		</footer>
		<?php include '../../ayuda.php'; ?>
	</main>
</div>
<script src="../../datatables/datatables.min.js"></script>
<script src="../../js/consulta-representantes.js"></script>
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