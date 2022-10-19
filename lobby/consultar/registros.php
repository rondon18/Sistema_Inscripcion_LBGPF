<?php
	session_start();
	if (!$_SESSION['login']) {
		header('Location: ../../index.php');
		exit();
	}

	//Devuelve al index del lobby si el usuario no es administrador
	if ($_SESSION['usuario']['Privilegios'] > 1) {
		header('Location: ../index.php');
	}

	require("../../controladores/conexion.php");
	require("../../clases/usuario.php");
	require('../../clases/bitácora.php');
	require('funciones.php');

	$bitácora = new bitácora();
	$_SESSION['acciones'] .= ', Consulta estudiantes';
	$bitácora->actualizar_bitácora($_SESSION['acciones'],$_SESSION['idbitácora']);
	$registros_bitácora = $bitácora->mostrar_bitácora();

	$usuario = new Usuarios();
	$lista_usuarios = $usuario->mostrarUsuarios();
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
												<span title="Se encuentra en la sección de consulta de bitácora">Bitácora</span>
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
										<a href="padres.php" class="btn btn-outline-light hvr-icon-grow">
											<i class="fas fa-lg fa-person me-2 hvr-icon"></i>
											Padres
										</a>
										<a href="usuarios.php" class="btn btn-outline-light hvr-icon-grow">
											<i class="fas fa-lg fa-user me-2 hvr-icon"></i>
											Usuarios
										</a>
										<a href="registros.php" class="btn btn-outline-light hvr-icon-grow active">
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
									<table id="bitácora" class="text-uppercase table table-striped table-bordered table-sm w-100">
									<thead style="font-size: .90em">
										<th>Nro.</th>
										<th>Usuario</th>
										<th>Fecha Entrada</th>
										<th>Hora entrada</th>
										<th>Fecha de cierre</th>
										<th>Hora de cierre</th>
										<th>Acciones realizadas</th>
									</thead>
									<tbody style="font-size: .85em;">
									<?php foreach ($registros_bitácora as $registro): ?>
										<?php if ($registro['idbitácora'] != $_SESSION['idbitácora']): #No muestra el ultimo registro por ser el actual?>
											<tr>
												
												<td class="text-center">
													<?php echo $registro['idbitácora']?>
												</td>
												<?php 
													$cedula_usuario = Cédula_Usuario($registro['idUsuarios'],$lista_usuarios);
												?>
												<td class="text-center" title="<?php echo $cedula_usuario['Primer_Nombre'].' '.$cedula_usuario['Primer_Apellido'] ?>">
													<p style="cursor:help;" class="m-0 p-0">
														<span style="border-bottom: dashed 1px #000;">
															<?php echo $cedula_usuario['Cédula_Persona'];?>
														</span>
														<span class="fas fa-question-circle"></span>
													</p>
												</td>

												<td style="min-width: 170px;">
													<?php echo $registro['fechaInicioSesión']?>
												</td>

												<td style="min-width: 170px;">
													<?php echo $registro['horaInicioSesión']?>
												</td>

												<td style="min-width: 180px">
													<?php 
														if(!empty($registro['fechaFinalSesión'])) { 
															echo $registro['fechaFinalSesión'];
														} 
														else {
															echo "Sesión no cerrada correctamente";
														}
													?>		
												</td>
												<td style="min-width: 180px">
													<?php 
														if(!empty($registro['horaFinalSesión'])) {
															echo $registro['horaFinalSesión'];
														}
														else {
															echo "Sesión no cerrada correctamente";
														}
													?>
												</td>
												
												<td style="min-width: 400px">
													<?php echo $registro['linksVisitados']?>
												</td>
											
											</tr>
										<?php endif;?>
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