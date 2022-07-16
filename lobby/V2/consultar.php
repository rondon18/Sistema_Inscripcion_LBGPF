<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Página de inicio</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../../css/colores.css" />
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

	#distintivo {
		width: 48px;
		height: 42px;
	}

	.dataTables_filter input {
		border-radius: 0.5rem !important;
		padding: .25rem;
		background: #f8f9fa;
		border: 1px solid gray;
	}

	.dataTables_filter input:before {
		color:#666;
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

	<main class="h-100 d-flex flex-column justify-content-between" style="min-height:100vh;">

		<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom border-3 border-secondary shadow-lg"
			aria-label="Barra de navegación">

			<div class="container">

				<a class="navbar-brand" href="#">

					<img id="distintivo" src="../../img/distintivo-LGPF.png" class="me-2" width="" height=""
						alt="Distintivo de la institución">

					<span class="fs-6 fs-sm-1">L.B. Gonzalo Picón Febres</span>
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


				<div class="col-12 order-0 order-md-1 col-md-12 p-2">
					<div class="card bg-light w-100">

						<div class="card-header text-center">
							<b>Menú principal</b>
						</div>

						<div class="card-body">

							<ul class="nav nav-tabs nav-justified mb-4">
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
										<th>Cédula</th>
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Fecha de nacimiento</th>
										<th>Edad</th>
										<th>Año a cursar</th>
										<th>Género</th>
										<th>Correo electrónico</th>
										<th>Dirección de residencia</th>
										<th>Talla de camisa</th>
										<th>Talla de pantalón</th>
										<th>Talla de zapatos</th>
										<th>Estatura</th>
										<th>Peso</th>
										<th>Índice</th>
										<th>Circ. Braquial</th>
										<th>Acciones</th>
									</thead>
									<tbody>

										<tr>
											<td>V54138415</td>
											<td style="min-width:210px;">Codi Fonsie</td>
											<td style="min-width:210px;">Scallon Widocks</td>
											<td>2007-12-01</td>
											<td>14</td>
											<td style="min-width:120px;">Cuarto año</td>
											<td>Masculino</td>
											<td style="min-width:160px;">cscallona@slashdot.org</td>
											<td style="min-width:190px;">15213 Elmside Point
											</td>
											<td>M</td>
											<td>30</td>
											<td>37</td>
											<td>175cm</td>
											<td>40kg</td>
											<td>5135</td>
											<td>25</td>
											<td>
												<!--Generar planilla de inscripción-->
												<form action="../controladores/generar-planilla-estudiante.php" method="POST"
													style="display: inline-block;" target="_blank">
													<input type="hidden" name="Cédula_Estudiante" value="V54138415">
													<input type="hidden" name="id_Estudiante" value="15">
													<input type="hidden" name="id_representante" value="17">
													<input type="hidden" name="id_padre" value="13">
													<button class="btn btn-sm btn-danger" type="submit"
														name="Generar planilla">Generar
														planilla <i class="fas fa-file-pdf fa-lg ms-2"></i></button>
												</form>
												<form action="consultar-estudiante.php" method="post"
													style="display: inline-block;">
													<input type="hidden" name="Cédula_Estudiante" value="V54138415">
													<input type="hidden" name="id_Estudiante" value="15">
													<input type="hidden" name="id_representante" value="17">
													<input type="hidden" name="id_padre" value="13">
													<button class="btn btn-sm btn-primary" type="submit" name="Consultar">Consultar
														<i class="fas fa-magnifying-glass fa-lg ms-2"></i></button>
												</form>
												<form action="editar-estudiante/paso-1.php" method="post"
													style="display: inline-block;" target="_blank">
													<input type="hidden" name="Cédula_Estudiante" value="V54138415">
													<input type="hidden" name="id_Estudiante" value="15">
													<input type="hidden" name="id_representante" value="17">
													<input type="hidden" name="id_padre" value="13">
													<button class="btn btn-sm btn-primary" type="submit" name="Consultar">Editar <i
															class="fas fa-pen fa-lg ms-2"></i></button>
												</form>
												<form action="../controladores/control-registros.php" method="post"
													style="display: inline-block;">
													<input type="hidden" name="Cédula_Estudiante" value="V54138415">
													<button class="btn btn-sm btn-primary" type="submit"
														onclick="return confirmacion();" name="orden" value="Eliminar">Eliminar <i
															class="fas fa-trash-can fa-lg ms-2"></i></button>
												</form>
											</td>
										</tr>
										<tr>
											<td>V54138416</td>
											<td style="min-width:210px;">Codiman Fonsie</td>
											<td style="min-width:210px;">Scallon Widocks</td>
											<td>2007-12-01</td>
											<td>14</td>
											<td style="min-width:120px;">Quinto año</td>
											<td>Masculino</td>
											<td style="min-width:160px;">cscallona@slashdot.org</td>
											<td style="min-width:190px;">15213 Elmside Point
											</td>
											<td>M</td>
											<td>30</td>
											<td>37</td>
											<td>175cm</td>
											<td>40kg</td>
											<td>5135</td>
											<td>25</td>
											<td>
												<!--Generar planilla de inscripción-->
												<form action="../controladores/generar-planilla-estudiante.php" method="POST"
													style="display: inline-block;" target="_blank">
													<input type="hidden" name="Cédula_Estudiante" value="V54138416">
													<input type="hidden" name="id_Estudiante" value="17">
													<input type="hidden" name="id_representante" value="17">
													<input type="hidden" name="id_padre" value="13">
													<button class="btn btn-sm btn-danger" type="submit"
														name="Generar planilla">Generar
														planilla <i class="fas fa-file-pdf fa-lg ms-2"></i></button>
												</form>
												<form action="consultar-estudiante.php" method="post"
													style="display: inline-block;">
													<input type="hidden" name="Cédula_Estudiante" value="V54138416">
													<input type="hidden" name="id_Estudiante" value="17">
													<input type="hidden" name="id_representante" value="17">
													<input type="hidden" name="id_padre" value="13">
													<button class="btn btn-sm btn-primary" type="submit" name="Consultar">Consultar
														<i class="fas fa-magnifying-glass fa-lg ms-2"></i></button>
												</form>
												<form action="editar-estudiante/paso-1.php" method="post"
													style="display: inline-block;" target="_blank">
													<input type="hidden" name="Cédula_Estudiante" value="V54138416">
													<input type="hidden" name="id_Estudiante" value="17">
													<input type="hidden" name="id_representante" value="17">
													<input type="hidden" name="id_padre" value="13">
													<button class="btn btn-sm btn-primary" type="submit" name="Consultar">Editar <i
															class="fas fa-pen fa-lg ms-2"></i></button>
												</form>
												<form action="../controladores/control-registros.php" method="post"
													style="display: inline-block;">
													<input type="hidden" name="Cédula_Estudiante" value="V54138416">
													<button class="btn btn-sm btn-primary" type="submit"
														onclick="return confirmacion();" name="orden" value="Eliminar">Eliminar <i
															class="fas fa-trash-can fa-lg ms-2"></i></button>
												</form>
											</td>
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

		<!--Footer-->
		<footer
			class="w-100 bg-white d-flex justify-content-center align-items-center justify-content-md-between shadow p-1 mt-auto mb-0"
			style="z-index:1000;">
			<div>
				<img src="../../img/banner-gobierno.png" alt="" height="42" class="d-none d-sm-inline-block align-text-top">
				<img src="../../img/banner-MPPE.png" alt="" height="42" class="d-none d-sm-inline-block align-text-top">
			</div>
			<img src="../../img/banner-LGPF.png" alt="" height="42" class="d-inline-block align-text-top">
		</footer>
	</main>

	<!--Botón para subir-->
	<a href="#" id="js_up" class="position-fixed bottom-0 end-0 btn btn-secondary mb-4 me-4 me-sm-5"
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