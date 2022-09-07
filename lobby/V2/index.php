<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Página de inicio</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../../css/estilos.css" />
	<link rel="stylesheet" type="text/css" href="../../css/hover.min.css" />
	<link rel="stylesheet" type="text/css" href="../../css/all.min.css" />
	<link rel="icon" type="img/png" href="../../img/distintivo-LGPF.png">
</head>

<body>


	<main class="w-100 h-100" style="min-height:100vh">

		<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom border-3 border-secondary shadow-lg"
			aria-label="Barra de navegación">

			<div class="container">

				<a class="navbar-brand" href="#">

					<img id="distintivo" src="../../img/distintivo-LGPF.png" class="me-2" width="64"
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

		<div class="container-md py-3">

			<div class="card bg-light w-100 mx-0">

				<div class="card-header text-center">
					<b>Menú principal</b>
				</div>

				<div class="row">
					<div class="col-12 pt-2">
						<ul class="list-group list-group-flush">

							<li class="list-group-item text-center">
								<span>Bienvenido(a), Elber Rondón.</span>
							</li>

							<li class="list-group-item">
								<div class="row justify-content-center">

									<!-- Panel de estudiantes -->
									<div class="col-12 col-md-6 col-lg-4 d-flex p-2">
										<div
											class="cartilla d-flex bg-primary py-2 px-3 rounded-2 text-white shadow border w-100 align-items-center justify-content-center">
											<i class="fas fa-children fa-3x me-2"></i>

											<p class="ps-2 m-0 my-1 w-100">
												Estudiantes registrados: <br>
												<big><b class="text-decoration-underline">12345</b></big>

												<br>

												<a href="#" class="d-block btn btn-sm btn-outline-light mt-2 mb-0 hvr-icon-grow">
													Consultar
													<i class="fas fa-search fa-lg ms-1 hvr-icon"></i>
												</a>

											</p>
										</div>
									</div>

									<!-- Panel de padres -->
									<div class="col-12 col-md-6 col-lg-4 d-flex p-2">
										<div
											class="cartilla d-flex bg-success py-2 px-3 rounded-2 text-white shadow border w-100 align-items-center justify-content-center">
											<i class="fas fa-users fa-3x me-2"></i>
											<p class="ps-2 m-0 my-1 w-100">
												Padres registrados: <br>
												<big><b class="text-decoration-underline">12345</b></big>

												<br>

												<a href="#" class="d-block btn btn-sm btn-outline-light mt-2 mb-0 hvr-icon-grow">
													Consultar
													<i class="fas fa-search fa-lg ms-1 hvr-icon"></i>
												</a>
											</p>
										</div>
									</div>

									<!-- Panel de representantes -->
									<div class="col-12 col-md-6 col-lg-4 d-flex p-2">
										<div
											class="cartilla d-flex bg-danger py-2 px-3 rounded-2 text-white shadow border w-100 align-items-center justify-content-center">
											<i class="fas fa-person fa-3x me-2"></i>
											<p class="ps-2 m-0 my-1 w-100">
												Representantes registrados: <br>
												<big><b class="text-decoration-underline">12345</b></big>

												<br>

												<a href="#" class="d-block btn btn-sm btn-outline-light mt-2 mb-0 hvr-icon-grow">
													Consultar
													<i class="fas fa-search fa-lg ms-1 hvr-icon"></i>
												</a>
											</p>
										</div>
									</div>

									<!-- Panel de docentes (Administrador) -->
									<div class="col-12 col-md-6 col-lg-4 d-flex p-2">
										<div
											class="cartilla d-flex bg-secondary py-2 px-3 rounded-2 text-white shadow border w-100 align-items-center justify-content-center">
											<i class="fas fa-user fa-3x me-2"></i>
											<p class="ps-2 m-0 my-1 w-100">
												Docentes registrados: <br>
												<big><b class="text-decoration-underline">12345</b></big>

												<br>

												<a href="#" class="d-block btn btn-sm btn-outline-light mt-2 mb-0 hvr-icon-grow">
													Consultar
													<i class="fas fa-search fa-lg ms-1 hvr-icon"></i>
												</a>
											</p>
										</div>
									</div>

									<!-- Panel de usuarios (Administrador) -->
									<div class="col-12 col-md-6 col-lg-4 d-flex p-2">
										<div
											class="cartilla d-flex bg-secondary py-2 px-3 rounded-2 text-white shadow border w-100 align-items-center justify-content-center">
											<i class="fas fa-user fa-3x me-2"></i>
											<p class="ps-2 m-0 my-1 w-100">
												Usuarios registrados: <br>
												<big><b class="text-decoration-underline">12345</b></big>

												<br>

												<a href="#" class="d-block btn btn-sm btn-outline-light mt-2 mb-0 hvr-icon-grow">
													Consultar
													<i class="fas fa-search fa-lg ms-1 hvr-icon"></i>
												</a>
											</p>
										</div>
									</div>


									<!-- Panel para iniciar registro de estudiante -->
									<div class="col-12 col-md-6 col-lg-4 d-flex p-2">
										<div
											class="cartilla d-flex bg-primary py-2 px-3 rounded-2 text-white shadow border w-100 align-items-center justify-content-center">
											<i class="fas fa-user-plus fa-3x me-2"></i>
											<p class="ps-2 m-0 my-1 w-100">
												Inciar registro: <br>
												<a href="#" class="d-block btn btn-sm btn-outline-light mt-2 mb-0 hvr-icon-grow">
													Registrar nuevo
													<i class="fas fa-plus-square fa-lg ms-1 hvr-icon"></i>
												</a>
											</p>
										</div>
									</div>

									<!-- Panel para acceder al modulo de mantenimiento(Administrador) -->
									<div class="col-12 col-md-6 col-lg-4 d-flex p-2">
										<div
											class="cartilla d-flex bg-primary py-2 px-3 rounded-2 text-white shadow border w-100 align-items-center justify-content-center">
											<i class="fas fa-wrench fa-3x me-2"></i>
											<p class="ps-2 m-0 my-1 w-100">
												Realizar mantenimiento al sistema: <br>
												<a href="#" class="d-block btn btn-sm btn-outline-light mt-2 mb-0 hvr-icon-grow">
													Ir
													<i class="fas fa-cog fa-lg ms-1 hvr-icon"></i>
												</a>
											</p>
										</div>
									</div>

									<!-- Panel para acceder al modulo de perfil -->
									<div class="col-12 col-md-6 col-lg-4 d-flex p-2">
										<div
											class="cartilla d-flex bg-danger	 py-2 px-3 rounded-2 text-white shadow border w-100 align-items-center justify-content-center">
											<i class="fas fa-user-circle fa-3x me-2"></i>
											<p class="ps-2 m-0 my-1 w-100">
												Consultar mi perfil: <br>
												<a href="#" class="d-block btn btn-sm btn-outline-light mt-2 mb-0 hvr-icon-grow">
													Ir
													<i class="fas fa-arrow-right fa-lg ms-1 hvr-icon"></i>
												</a>
											</p>
										</div>
									</div>

								</div>

							</li>
						</ul>
					</div>
				</div>
				<div class="card-footer text-center">
					<span class="text-muted">Sistema de inscripción L.B. G.P.F</span>
				</div>
			</div>

		</div>

	</main>

	<footer class="w-100 m-0 container-fluid row bg-white p-0">
		<div class="col-12">
			<div
				class="w-100 bg-white d-flex flex-wrap flex-md-nowrap justify-content-center align-items-center justify-content-md-between shadow"
				style="z-index:1000;">
						<img src=" ../../img/banner-gobierno.png" alt="" height="48" class="m-2">
				<img src="../../img/banner-MPPE.png" alt="" height="48" class="m-2 me-md-auto">
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

<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	function confirmacion() {
		//Pregunta si desea realizar la acción la cancela si selecciona NO
		document.getElementById("Restaurar").addEventListener("click", function (event) {
			if (!confirm("¿Esta seguro de realizar esta acción? Se generará un respaldo antes de restaurar.")) {
				event.preventDefault();
			}
		});
	}
</script>

</html>
