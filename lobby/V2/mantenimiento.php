<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Página de inicio</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../../css/hover.min.css" />
	<link rel="stylesheet" type="text/css" href="../../css/estilos.css" />
	<link rel="stylesheet" type="text/css" href="../../css/all.min.css" />
	<link rel="icon" type="img/png" href="../../img/distintivo-LGPF.png">
</head>

<body>


	<main class="w-100 h-100" style="min-height:90vh">

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
					<b>Área de mantenimiento</b>
				</div>

				<div class="row">

					<div class="col-12 pt-2 px-5">

						<ul class="list-group list-group-flush">

							<li class="list-group-item">

								<div class="row">

									<!-- Panel de respaldo -->
									<div class="col-12 col-md-6 d-flex p-2">
										<div
											class="cartilla d-flex bg-primary py-2 px-3 rounded-2 text-white shadow border w-100 align-items-center justify-content-center">

											<i class="fas fa-floppy-disk fa-3x me-2"></i>

											<div class="ps-2 m-0 my-1 w-100">

												<p class="mb-1">
													Generar un respaldo: <br>

													<small>Respalda la base de datos y descarga este mismo.</small>
												</p>

												<form id="Respaldar" action="#" onclick="respaldarBD()">
													<button type="button"
														class="form-control btn btn-outline-light mt-2 mb-0 hvr-icon-grow">
														Respaldar
														<i class="fas fa-download fa-lg ms-1 hvr-icon"></i>
													</button>
												</form>
											</div>

										</div>

									</div>

									<!-- Panel de padres -->
									<div class="col-12 col-md-6 d-flex p-2">
										<div
											class="cartilla d-flex bg-success py-2 px-3 rounded-2 text-white shadow border w-100 align-items-center justify-content-center">

											<i class="fas fa-rotate-left fa-3x me-2"></i>
											<div class="ps-2 m-0 my-1 w-100">
												<p>
													Restaurar a un punto anterior: <br>
												</p>

												<form id="Restaurar" action="" method="post">

													<div class="input-group w-100">

														<select class="form-select overflow-hidden" id="puntoGuardado"
															name="puntoGuardado" placeholder="Seleccione un punto de restauración"
															title="Debe seleccionar alguna de las opciones." required>
															<option disabled selected>Seleccione un punto de restauración</option>
															<option value="">01-01-01</option>
															<option value="">02-02-02</option>
															<option value="">03-03-03</option>
															<option value="">04-04-04</option>
															<option value="">05-05-05</option>
															<option value="">06-06-06</option>
															<option value="">07-07-07</option>
															<option value="">08-08-08</option>
															<option value="">09-09-09</option>
															<option value="">10-10-10</option>
															<option value="">11-11-11</option>
															<option value="">12-12-12</option>
															<option value="">13-13-13</option>
															<option value="">14-14-14</option>
															<option value="">15-15-15</option>
															<option value="">16-16-16</option>
															<option value="">17-17-17</option>
															<option value="">18-18-18</option>
															<option value="">19-19-19</option>
															<option value="">20-20-20</option>
															<option>Valores por defecto</option>
														</select>
														<button type="button" onclick="restaurarBD()"
															class="btn btn-outline-light form-control hvr-icon-grow">
															Restaurar
															<i class="fas fa-database fa-lg ms-1 hvr-icon"></i>
														</button>
													</div>
												</form>

											</div>
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
<script type="text/javascript" src="../../js/sweetalert2.js"></script>
<script type="text/javascript" src="../../js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	function restaurarBD() {
		//Pregunta si desea realizar la acción la cancela si selecciona NO

		if (document.getElementById("puntoGuardado").value != "Seleccione un punto de restauración") {
			Swal.fire({
				title: '¿Estas seguro?',
				text: "Se guardará un respaldo antes de continuar",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				cancelButtonText: '¡No, detente! <i class="ms-1 fas fa-lg fa-thumbs-down"></i>',
				confirmButtonText: '<i class="me-1 fas fa-lg fa-thumbs-up"></i> ¡Sí, continua!'
			}).then((result) => {
				if (result.isConfirmed) {

					if (document.getElementById("Restaurar").checkValidity()) {
						Restaurar.submit();
					}
				}
			})
		} else {
			Swal.fire({
				title: 'Seleccione un respaldo antes de continuar',
				icon: 'error',
				confirmButtonColor: '#0d6efd',
				confirmButtonText: 'Cerrar <i class="ms-1 fas fa-lg fa-xmark"></i>'
			})
		}

	}

	function respaldarBD() {
		//Pregunta si desea realizar la acción la cancela si selecciona NO
		Swal.fire({
			title: '¿Desea generar un respaldo?',
			icon: 'question',
			showCancelButton: true,
			confirmButtonColor: '#0d6efd',
			cancelButtonColor: '#d33',
			cancelButtonText: '¡No, detente! <i class="ms-1 fas fa-lg fa-thumbs-down"></i>',
			confirmButtonText: '<i class="me-1 fas fa-lg fa-thumbs-up"></i> ¡Sí, continua!'
		}).then((result) => {
			if (result.isConfirmed) {
				document.getElementById("Respaldar").submit();
				let timerInterval
				Swal.fire({
					title: '¡Exito!',
					icon: 'success',
					text: 'Respaldo realizado correctamente.',
					timer: 3500,
					timerProgressBar: true,
					didOpen: () => {
						Swal.showLoading()
						const b = Swal.getHtmlContainer().querySelector('b')
						timerInterval = setInterval(() => {
							b.textContent = Swal.getTimerLeft()
						}, 100)
					},
					willClose: () => {
						clearInterval(timerInterval)
					}
				}).then((result) => {
					/* Read more about handling dismissals below */
					if (result.dismiss === Swal.DismissReason.timer) {
						console.log('Cerrado por el temporizador')
					}
				})
			}
		})
	}

	//Boton de subir
	$(document).ready(function () {
		$('#js_up').hide();
		$('#js_up').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 100)
		});
		$(window).scroll(function () {
			if ($(this).scrollTop() > 0) {
				$('#js_up').fadeIn();
			} else {
				$('#js_up').fadeOut();
			}
		});
	});
</script>

</html>