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

$bitácora = new bitácora();
$_SESSION['acciones'] .= ', Consulta estudiantes';
$bitácora->actualizar_bitácora($_SESSION['acciones'],$_SESSION['idbitácora']);

$Padre = new Padre();
$Madre = new Madre();
$Teléfonos = new Teléfonos();

$listaPadre = $Padre->mostrarPadre();
$listaMadre = $Madre->mostrarMadre();

function calculaedad($fechanacimiento){
list($ano,$mes,$dia) = explode("-",$fechanacimiento);
$ano_diferencia  = date("Y") - $ano;
$mes_diferencia = date("m") - $mes;
$dia_diferencia   = date("d") - $dia;
if ($dia_diferencia < 0 || $mes_diferencia < 0)
$ano_diferencia--;
return $ano_diferencia;
}
function Género($Género){
	if ($Género == "F") {
		$Género = "Femenino";
	}
	elseif ($Género == "M") {
		$Género = "Masculino";
	}
	return $Género;
}
function Teléfono($prefijo,$numero) {
	if (empty($prefijo) and empty($numero)) {
		$Teléfono = "";
	}
	else {
		$Teléfono = "$prefijo-$numero";
	}
	return $Teléfono;
}

function Relleno($var) {
	if (!empty($var) and ($var != "0000-00-00")) {
		$salida = $var;
	}
	elseif ($var == "0000-00-00") {
		$salida = "-- -- --";
	}
	elseif (empty($var) ) {
		$salida = "No suministrado(a)";
	}
	return $salida;
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Consultar registros</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/datatables.min.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/all.min.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/colores.css"/>
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
										<a href="estudiantes.php" class="btn btn-outline-light hvr-icon-grow">
											<i class="fas fa-lg fa-children me-2 hvr-icon"></i>
											Estudiantes
										</a>
										<a href="representantes.php" class="btn btn-outline-light hvr-icon-grow">
											<i class="fas fa-lg fa-users me-2 hvr-icon"></i>
											Representantes
										</a>
										<a href="padres.php" class="btn btn-outline-light hvr-icon-grow active">
											<i class="fas fa-lg fa-person me-2 hvr-icon"></i>
											Padres
										</a>
										<a href="usuarios.php" class="btn btn-outline-light hvr-icon-grow">
											<i class="fas fa-lg fa-user me-2 hvr-icon"></i>
											Usuarios
										</a>
										<a href="registros.php" class="btn btn-outline-light hvr-icon-grow">
											<i class="fas fa-lg fa-clipboard me-2 hvr-icon"></i>
											Registros
										</a>
									</div>
								</div>
								
								<!-- Boton de busqueda -->
								<div class="mb-3">
									<!-- Button trigger modal -->
									<button type="button" class="btn btn-primary" data-bs-toggle="modal"
									data-bs-target="#exampleModal">
									Búsqueda avanzada
									<i class="fas fa-lg fa-search ms-1"></i>
									</button>
									<!-- Modal -->
									<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
										aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Búsqueda avanzada: Estudiantes</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal"
													aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<form action="">
														<div class="row">
															<div class="col-12 mb-2">
																<p
																	class="my-2 h5 text-uppercase border-2 border-bottom border-dark text-center mb-3">
																Palabra a buscar</p>
																<input class="form-control p-2 px-3 fs-3" type="text"
																placeholder="Ingrese texto....">
															</div>
															<div class="col-12 mb-2">
																<p
																	class="my-2 h5 text-uppercase border-2 border-bottom border-dark text-center mb-3">
																Filtros de búsqueda</p>
															</div>
															<div class="col-12 col-md-4 mb-2">
																<label for="campo1" class="form-label h6 text-decoration-underline">Tipo de cédula:</label>
																<select name="campo1" id="" class="form-select">
																	<option value="">Cualquiera</option>
																	<option value="">Venezolana</option>
																	<option value="">Extranjera</option>
																</select>
															</div>
															<div class="col-6 col-md-4 mb-2">
																<label for="campo1" class="form-label h6 text-decoration-underline">Género:</label>
																<select name="campo1" id="" class="form-select">
																	<option value="">Cualquiera</option>
																	<option value="">Femenino</option>
																	<option value="">Masculino</option>
																</select>
															</div>
															<div class="col-6 col-md-4 mb-2">
																<label for="campo1" class="form-label h6 text-decoration-underline">Año a cursar:</label>
																<select name="campo1" id="" class="form-select">
																	<option value="">Cualquiera</option>
																	<option value="">Primer año</option>
																	<option value="">Segundo año</option>
																	<option value="">Tercer año</option>
																	<option value="">Cuarto año</option>
																	<option value="">Quinto año</option>
																</select>
															</div>
															<div class="col-6 col-md-5 col-lg-3 mb-2">
																<label for="campo1" class="form-label h6 text-decoration-underline">Vacunado:</label>
																<select name="campo1" id="" class="form-select">
																	<option value="">Cualquiera</option>
																	<option value="">Si</option>
																	<option value="">No</option>
																</select>
															</div>
															<div class="col-6 col-md-5 col-lg-3 mb-2">
																<label for="campo1" class="form-label h6 text-decoration-underline">Vacuna aplicada:</label>
																<select name="campo1" id="" class="form-select">
																	<option value="">Cualquiera</option>
																	<option value="">Pfizer-BioNTech</option>
																	<option value="">Oxford/AstraZeneca</option>
																	<option value="">Ad26.CoV2.S de Janssen</option>
																	<option value="">Moderna (ARNm-1273)</option>
																	<option value="">Sinopharm</option>
																	<option value="">CoronaVac de Sinovac</option>
																	<option value="">BBV152 (Covaxin) de Bharat Biotech</option>
																	<option value="">Covovax</option>
																	<option value="">Cansino</option>
																	<option value="">Sputnik V</option>
																	<option value="">Abdala</option>
																	<option value="">Otra</option>
																</select>
															</div>
															<div class="col-6 col-lg-3 mb-2">
																<label for="campo1" class="form-label h6 text-decoration-underline">Nacido despúes de:</label>
																<input type="date" name="campo1" class="form-control">
															</div>
															<div class="col-6 col-lg-3 mb-2">
																<label for="campo1" class="form-label h6 text-decoration-underline">Nacido antes de:</label>
																<input type="date" name="campo1" class="form-control">
															</div>
															<div class="col-12 mb-2">
																<label for="" class="form-label h6 text-decoration-underline">Ordenar por:</label>
																<select name="" id="" class="form-select">
																	<option value="">Cédula</option>
																	<option value="">Nombres</option>
																	<option value="">Apellidos</option>
																	<option value="">Fecha de nacimiento</option>
																	<option value="">Edad</option>
																	<option value="">Año a cursar</option>
																	<option value="">Género</option>
																	<option value="">Correo electrónico</option>
																	<option value="">Dirección de residencia</option>
																	<option value="">Talla de camisa</option>
																	<option value="">Talla de pantalón</option>
																	<option value="">Talla de zapatos</option>
																	<option value="">Estatura</option>
																	<option value="">Peso</option>
																	<option value="">Índice</option>
																	<option value="">Circ. Braquial</option>
																	<option value="">Vacunado</option>
																	<option value="">Vacuna</option>
																	<option value="">Dosis</option>
																	<option value="">Lote</option>
																</select>
															</div>
															<div class="col-12">
																<button class="btn btn btn-primary w-xs-100 w-sm-100 w-md-auto w-lg-auto">
																Buscar
																<i class="fas fa-lg fa-search ms-1"></i>
																</button>
															</div>
														</div>
													</form>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary"
													data-bs-dismiss="modal">Cerrar</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<!-- Tabla volcada -->
								<div class="table-responsive">
									<p class="h4 text-uppercase border-2 border-bottom border-dark text-center mb-3">
										Mostrando Padres registrados
									</p>
									<table id="estudiantes" class="text-uppercase table table-striped table-bordered table-sm w-100">
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
												<td><?php echo Relleno($padre['Cédula']); ?></td>
												<td style="min-width:210px;">
													<?php 
														echo Relleno($padre['Primer_Nombre'])." ".$padre['Segundo_Nombre']; 
													?>
												</td>
												<td style="min-width:210px;">
													<?php 
														echo Relleno($padre['Primer_Apellido'])." ".$padre['Segundo_Apellido']; 
													?>
												</td>
												<td>Padre</td>
												<td class="text-center"><?php echo Relleno($padre['Fecha_Nacimiento']); ?></td>
												<td><?php echo Relleno($padre['Lugar_Nacimiento']); ?></td>
												<td style="min-width:160px;"><?php echo Relleno($padre['Correo_Electrónico']); ?></td>
												<td style="min-width:190px;"><?php echo Relleno($padre['Dirección']); ?></td>
												<td><?php echo Relleno($padre['Estado_Civil']); ?></td>
											</tr>
											<?php endforeach; ?>

											<?php foreach ($listaMadre as $madre):?>
											<tr>
												<td><?php echo Relleno($madre['Cédula']); ?></td>
												<td style="min-width:210px;">
													<?php 
														echo Relleno($madre['Primer_Nombre'])." ".$madre['Segundo_Nombre']; 
													?>
												</td>
												<td style="min-width:210px;">
													<?php 
														echo Relleno($madre['Primer_Apellido'])." ".$madre['Segundo_Apellido']; 
													?>
												</td>
												<td>Madre</td>
												<td class="text-center"><?php echo Relleno($madre['Fecha_Nacimiento']); ?></td>
												<td><?php echo Relleno($madre['Lugar_Nacimiento']); ?></td>
												<td style="min-width:160px;"><?php echo Relleno($madre['Correo_Electrónico']); ?></td>
												<td style="min-width:190px;"><?php echo Relleno($madre['Dirección']); ?></td>
												<td><?php echo Relleno($madre['Estado_Civil']); ?></td>
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
		<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 position-absolute bottom-0" style="z-index: 100;">
			<span class="text-white">Sistema de inscripción L.B. G.P.F - <i class="far fa-copyright"></i> 2022-<?php echo date("y"); ?></span>
		</footer>
		<?php include '../../ayuda.php'; ?>
	</main>
</div>


<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../../js/datatables.min.js"></script>
<script type="text/javascript" src="../../js/pdfmake.min.js"></script>
<script type="text/javascript" src="../../js/vfs_fonts.js"></script>
<script type="text/javascript" src="../../js/sweetalert2.js"></script>
<script type="text/javascript" src="../../js/datatables1.min.js"></script>

<script type="text/javascript">
	//Datatables estudiantes
	$(document).ready( function () {
		$('#estudiantes').DataTable({
			responsive: true,
			"language": {
					"url": "../../js/datatables-español.json"
			},
<?php if ($_SESSION['usuario']['Privilegios'] == 1 || $_SESSION['usuario']['Privilegios'] == 2): ?>
			dom: 'Bfrtip',
			"order": [[ 0, "desc" ]],
			buttons: [
				{
				extend: 'excelHtml5',
				exportOptions: {
					columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25]
				},
				text: 'Generar reporte en Excel <i class="fa-solid fa-file-excel fa-lg ms-2"></i>',
				autoFilter: true,
				filename: 'Reporte de estudiantes',
				sheetName: 'Reporte de estudiantes',
				className: 'btn btn-success',
				messageTop: 'Reporte de estudiantes'
				}
			],
			"pagingType": "full_numbers"
<?php endif; ?>
});
} );




//Datatables representantes
$(document).ready( function () {
$('#representantes').DataTable({
responsive: true,
"language": {
"url": "../../js/datatables-español.json"
},
dom: 'Bfrtip',
buttons: [
{
extend: 'excelHtml5',
text: 'Generar reporte en Excel <i class="fa-solid fa-file-excel fa-lg ms-2"></i>',
autoFilter: true,
filename: 'Reporte de representantes',
sheetName: 'Reporte de representantes',
className: 'btn btn-success',
messageTop: 'Reporte de representantes'
}
]
});
} );




<?php if ($_SESSION['usuario']['Privilegios'] == 1): ?>
//Datatables usuarios
$(document).ready( function () {
$('#usuarios').DataTable({
responsive: true,
"language": {
"url": "../../js/datatables-español.json"
},
dom: 'Bfrtip',
buttons: [
{
extend: 'excelHtml5',
exportOptions: {
columns: [0,1,2,3,4]
},
text: 'Generar reporte en Excel <i class="fa-solid fa-file-excel fa-lg ms-2"></i>',
autoFilter: true,
filename: 'Reporte de usuarios',
sheetName: 'Reporte de usuarios',
className: 'btn btn-success',
messageTop: 'Reporte de usuarios'
}
],
"pagingType": "full_numbers"
});
} );




//Datatables bitácora
$(document).ready( function () {
$('#bitácora').DataTable({
responsive: true,
"language": {
"url": "../../js/datatables-español.json"
},
dom: 'Bfrtip',
"order": [[ 0, "desc" ]],
buttons: [
{
extend: 'excelHtml5',
text: 'Generar reporte en Excel <i class="fa-solid fa-file-excel fa-lg ms-2"></i>',
autoFilter: true,
filename: 'Reporte de bitácora',
sheetName: 'Reporte de bitácora',
className: 'btn btn-success',
messageTop: 'Reporte de bitácora'
}
]
});
} );
<?php endif; ?>
</script>

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