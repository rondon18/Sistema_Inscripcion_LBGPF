<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Página de inicio</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../../css/estilos.css" />
	<link rel="stylesheet" type="text/css" href="../../css/all.min.css" />
	<link rel="stylesheet" type="text/css" href="../../css/datatables.min.css" />
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
		transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out !important;
		margin: .25rem;
	}
	.dataTables_filter input {
		border-radius: 0.5rem !important;
		padding: .25rem;
		background: #f8f9fa;
		border: 1px solid gray;
	}

	.dataTables_filter input:before {
		color: #666;
		content: "Hola mundo";
	}

	@media (max-width: 576px) {
		#distintivo {
			width: 40px;
			height: 34px;
		}
	}
</style>

<body>

	<main class="h-100" style="min-height:100vh;">

		<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom border-3 border-secondary shadow-lg"
			aria-label="Barra de navegación">

			<div class="container">

				<a class="navbar-brand" href="#">

					<img id="distintivo" src="../../img/distintivo-LGPF.png" class="me-2" width="64" height=""
						alt="Distintivo de la institución">

					<span class="fs-6 fs-sm-1">L. B. Gonzalo Picón Febres</span>
				</a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#BarraNavegación"
					aria-controls="BarraNavegación" aria-expanded="false" aria-label="Toggle navigation">

					<span class="navbar-toggler-icon"></span>

				</button>

				<div class="collapse navbar-collapse" id="BarraNavegación">

					<ul class="navbar-nav me-auto mb-2 mb-sm-0">

						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="#">
								<i class="fas fa-home"></i>
								Menú principal
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="#">

							</a>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
								data-bs-toggle="dropdown" aria-expanded="false">
								<i class="fas fa-search"></i>
								Consultar
							</a>

							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">

								<!-- Accciones de representante -->

								<li><a class="dropdown-item" href="#">Estudiantes</a></li>

								<li>
									<hr class="dropdown-divider">
								</li>

								<!-- Acciones de docente / administrador -->

								<li><a class="dropdown-item" href="#">Representantes</a></li>
								<li><a class="dropdown-item" href="#">Padres</a></li>

								<li>
									<hr class="dropdown-divider">
								</li>

								<!-- Acciones de administrador -->

								<li><a class="dropdown-item" href="#">Usuarios</a></li>
								<li><a class="dropdown-item" href="#">Registros</a></li>

							</ul>

						</li>

						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="fas fa-wrench"></i>
								Mantenimiento
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="fas fa-user"></i>
								Perfil
							</a>
						</li>



					</ul>

				</div>

			</div>

		</nav>

		<div class="container-md pb-3">

			<div class="row">


				<div class="col-12 pt-2">

					<div class="card bg-light w-100 mx-0">

						<div class="card-header text-center">
							<b>Consultar registros</b>
						</div>


						<div class="card-body">

							<!--Selector de consulta-->
							<ul class="nav nav-pills mb-4">

								<li class="nav-item">
									<a class="nav-link active" href="#">Consultar Estudiantes</a>
								</li>

								<li class="nav-item">
									<a class="nav-link" href="#">Consultar Representantes</a>
								</li>

								<li class="nav-item">
									<a class="nav-link" href="#">Consultar Padres</a>
								</li>

								<li class="nav-item">
									<a class="nav-link" href="#">Consultar Usuarios</a>
								</li>

								<li class="nav-item">
									<a class="nav-link" href="#">Consultar Registros</a>
								</li>

							</ul>


							<div class="">

								<table id="estudiantes" class="table table-striped table-bordered table-sm">
									<thead>
										<th>item 1</th>
										<th>item 2</th>
										<th>item 3</th>
										<th>item 4</th>
										<th>item 5</th>
										<th>item 6</th>
										<th>item 7</th>
										<th>item 8</th>
									</thead>
									<tbody>
										<tr>
											<td>sub item 1</td>
											<td>sub item 2</td>
											<td>sub item 3</td>
											<td>sub item 4</td>
											<td>sub item 5</td>
											<td>sub item 6</td>
											<td>sub item 7</td>
											<td>sub item 8</td>
										</tr>
										<tr>
											<td>sub item 1</td>
											<td>sub item 2</td>
											<td>sub item 3</td>
											<td>sub item 4</td>
											<td>sub item 5</td>
											<td>sub item 6</td>
											<td>sub item 7</td>
											<td>sub item 8</td>
										</tr>
										<tr>
											<td>sub item 1</td>
											<td>sub item 2</td>
											<td>sub item 3</td>
											<td>sub item 4</td>
											<td>sub item 5</td>
											<td>sub item 6</td>
											<td>sub item 7</td>
											<td>sub item 8</td>
										</tr>
										<tr>
											<td>sub item 1</td>
											<td>sub item 2</td>
											<td>sub item 3</td>
											<td>sub item 4</td>
											<td>sub item 5</td>
											<td>sub item 6</td>
											<td>sub item 7</td>
											<td>sub item 8</td>
										</tr>
										<tr>
											<td>sub item 1</td>
											<td>sub item 2</td>
											<td>sub item 3</td>
											<td>sub item 4</td>
											<td>sub item 5</td>
											<td>sub item 6</td>
											<td>sub item 7</td>
											<td>sub item 8</td>
										</tr>
										<tr>
											<td>sub item 1</td>
											<td>sub item 2</td>
											<td>sub item 3</td>
											<td>sub item 4</td>
											<td>sub item 5</td>
											<td>sub item 6</td>
											<td>sub item 7</td>
											<td>sub item 8</td>
										</tr>
										<tr>
											<td>sub item 1</td>
											<td>sub item 2</td>
											<td>sub item 3</td>
											<td>sub item 4</td>
											<td>sub item 5</td>
											<td>sub item 6</td>
											<td>sub item 7</td>
											<td>sub item 8</td>
										</tr>
										<tr>
											<td>sub item 1</td>
											<td>sub item 2</td>
											<td>sub item 3</td>
											<td>sub item 4</td>
											<td>sub item 5</td>
											<td>sub item 6</td>
											<td>sub item 7</td>
											<td>sub item 8</td>
										</tr>
										<tr>
											<td>sub item 1</td>
											<td>sub item 2</td>
											<td>sub item 3</td>
											<td>sub item 4</td>
											<td>sub item 5</td>
											<td>sub item 6</td>
											<td>sub item 7</td>
											<td>sub item 8</td>
										</tr>
										<tr>
											<td>sub item 1</td>
											<td>sub item 2</td>
											<td>sub item 3</td>
											<td>sub item 4</td>
											<td>sub item 5</td>
											<td>sub item 6</td>
											<td>sub item 7</td>
											<td>sub item 8</td>
										</tr>
									</tbody>
								</table>
							</div>

						</div>

						<div class="card-footer text-center">
							<span class="text-muted">Sistema de inscripción L.B. G.P.F - <i class="far fa-copyright"></i>
								2022-2022</span>
						</div>

					</div>

				</div>

			</div>
		</div>
	</main>

	<footer class="w-100 m-0 container-fluid row bg-white p-0">
		<div class="col-12">
			<div class="w-100 bg-white d-flex justify-content-center align-items-center justify-content-md-between shadow"
			style="z-index:1000;"">
				<img src="../../img/banner-gobierno.png" alt="" height="48" class="m-2">
				<img src="../../img/banner-MPPE.png" alt="" height="48" class="m-2 me-auto">
				<img src="../../img/banner-LGPF.png" alt="" height="48" class="m-2">
			</div>
		</div>
	</footer>

	<!--Botón para subir-->
	<a href="#" id="js_up" class="position-fixed bottom-0 start-0 btn btn-secondary mb-4 ms-4 ms-sm-5"
		title="Subir al inicio" style="z-index:1001;">

		<i class="fa fa-lg fa-arrow-up" aria-hidden="true"></i>

	</a>


</body>
<script type="text/javascript" src="../../js/sweetalert2.js"></script>
<script type="text/javascript" src="../../js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../../js/datatables.min.js"></script>
<script type="text/javascript" src="../../js/pdfmake.min.js"></script>
<script type="text/javascript" src="../../js/vfs_fonts.js"></script>
<script type="text/javascript" src="../../js/datatables1.min.js"></script>

<script>
	//Datatables estudiantes
	$(document).ready(function () {
		$('#estudiantes').DataTable({
			responsive: true,
			"language": {
				"url": "../../js/datatables-español.json"
			},
			dom: 'Bfrtip',
			buttons: [{
				extend: 'excelHtml5',
				text: 'Generar reporte en Excel <i class="fa-solid fa-file-excel fa-lg ms-2"></i>',
				autoFilter: true,
				filename: 'Reporte de estudiantes',
				sheetName: 'Reporte de estudiantes',
				className: 'btn btn-success',
				messageTop: 'Reporte de estudiantes'
			}],
			"pagingType": "numbers"
		});
	});
</script>

</html>