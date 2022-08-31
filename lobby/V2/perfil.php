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

				<div class="card-body d-flex flex-column" style="min-height:70vh">
					<div class="d-flex flex-column flex-md-row mb-auto">
						<div class="border-md border-end px-4">
							<ul class="nav nav-pills flex-row flex-md-column gap-2 align-content-center justify-content-center">
								<li class="nav-item">
									<a id="link1" class="nav-link active" href="#" onclick="seccion('seccion1')">Datos
										personales</a>
								</li>
								<li class="nav-item">
									<a id="link2" class="nav-link" href="#" onclick="seccion('seccion2')">Datos de usuario</a>
								</li>
							</ul>
						</div>
						<div class="flex-md-grow-1 py-3 py-md-0 px-md-5">
							<section id="seccion1" class="">
								<p class="h5 text-uppercase border-2 border-bottom border-dark text-center mb-3">
									Datos personales
								</p>

								<p>
									<b class="h6 text-decoration-underline	d-block d-sm-inline-block">Nombre completo:</b>
									<span>María Gabriela</span>
									<span>Ballestero Rodríguez</span>
								</p>

								<p>
									<b class="h6 text-decoration-underline	d-block d-sm-inline-block">Cédula de identidad:</b>
									<span>V28636530</span>
								</p>
								<p>
									<b class="h6 text-decoration-underline	d-block d-sm-inline-block">Fecha de nacimiento:</b>
									<span>2002-05-09</span>
								</p>
								<p>
									<b class="h6 text-decoration-underline	d-block d-sm-inline-block">Género:</b>
									<span>F</span>
								</p>
								<p>
									<b class="h6 text-decoration-underline	d-block d-sm-inline-block">Correo electrónico:</b>
									<span>mgbrodriguez952@gmail.com</span>
								</p>
								<p>
									<b class="h6 text-decoration-underline	d-block d-sm-inline-block">Privilegios:</b>
									<span>Administrador</span>
								</p>
							</section>
							<section id="seccion2" style="display:none;">
								<p class="h5 text-uppercase border-2 border-bottom border-dark text-center mb-3">
									Preguntas de seguridad
								</p>
								<img src="" alt="">		
								<p>
									<b class="h6 text-decoration-underline	d-block d-sm-inline-block">
										Pregunta de seguridad 1:
									</b>
									
									<br>
									
									<i class="fas fa-lg fa-question me-2"></i>
									<span class="fst-italic">Ciudad donde naciste:</span>
									<span>Caja Seca</span>
								</p>

								<p>
									<b class="h6 text-decoration-underline	d-block d-sm-inline-block">
										Pregunta de seguridad 2:
									</b>
									
									<br>
									
									<i class="fas fa-lg fa-question me-2"></i>
									<span class="fst-italic">Color que más te gusta:</span>
									<span>Azul</span>
								</p>

							</section>
						</div>
					</div>

					<div class="mt-auto">
						<a class="btn btn-primary" href="index.php">Volver <i class="fas fa-home"></i></a>
						<a class="btn btn-primary" href="editar-perfil.php">Editar perfil <i class="fas fa-user-edit"></i></a>
						<form class="d-inline" action="../controladores/control-usuarios.php" method="POST" type="">
							<button class="btn btn-primary" type="submit" name="DarseDeBaja"
								onclick="return confirmacion();">Darse de baja <i class="fas fa-user-minus"></i></button>
							<input type="hidden" name="orden" value="Eliminar">
						</form>
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
				style="z-index:1000;"">
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
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
<script>
	function confirmacion() {
		//Pregunta si desea realizar la acción la cancela si selecciona NO
		if (confirm("¿Desea realizar esta accion?")) {
			alert("Acción ejecutada");
			return true;
		} else {
			alert("Acción cancelada");
			return false;
		}
	}

	function seccion(seccion) {

		//secciones
		var a = document.getElementById("seccion1");
		var b = document.getElementById("seccion2");

		//botones en la navegación
		var link_a = document.getElementById("link1");
		var link_b = document.getElementById("link2");

		//seccion seleccionada como activa(seccion 1 por defecto)
		var seccion = document.getElementById(seccion);

		a.style.display = "none";
		b.style.display = "none";

		link_a.classList.remove("active");
		link_b.classList.remove("active");

		if (seccion == a) {
			a.style.display = "block";
			link_a.classList.add("active");
		} else if (seccion == b) {
			b.style.display = "block";
			link_b.classList.add("active");
		}
	}
</script>

</html>