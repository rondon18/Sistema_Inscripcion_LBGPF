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
	<link rel="icon" type="img/png" href="../../img/distintivo-LGPF.png">
</head>

<body>
	<main class="h-100">

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
							<b>Menú principal</b>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-12">
									<p class="text-center">
										<span>Bienvenido(a), Elber Rondón.</span>
									</p>
								</div>
								<div class="col-12">
									<div class="row">
										<div class="col-4 d-flex p-2">
											<div class="d-flex bg-primary p-3 rounded-2 text-white w-100">
												<i class="fas fa-user fa-4x"></i>
												<p class="ps-2">
													Estudiantes registrados: <br> 
													<big><b class="text-decoration-underline">12345</b></big>
												</p>
											</div>
										</div>
										<div class="col-4 d-flex p-2">
											<div class="d-flex bg-success p-3 rounded-2 text-white w-100">
												<i class="fas fa-user fa-4x"></i>
												<p class="ps-2">
													Padres registrados: <br> 
													<big><b class="text-decoration-underline">12345</b></big>
												</p>
											</div>
										</div>
										<div class="col-4 d-flex p-2">
											<div class="d-flex bg-danger p-3 rounded-2 text-white w-100">
												<i class="fas fa-user fa-4x"></i>
												<p class="ps-2">
													Representantes registrados: <br> 
													<big><b class="text-decoration-underline">12345</b></big>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="card-footer text-center">
							<span class="text-muted">Sistema de inscripción L.B. G.P.F</span>
						</div>

					</div>

				</div>
			</div>

	</main>
	<footer class="w-100 m-0 container-fluid row bg-white p-0">
		<div class="col-12">
			<div class="w-100 bg-white d-flex justify-content-center align-items-center justify-content-md-between shadow"
				style="z-index:1000;"">
						<img src=" ../../img/banner-gobierno.png" alt="" height="48" class="m-2">
				<img src="../../img/banner-MPPE.png" alt="" height="48" class="m-2 me-auto">
				<img src="../../img/banner-LGPF.png" alt="" height="48" class="m-2">
			</div>
		</div>
	</footer>





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