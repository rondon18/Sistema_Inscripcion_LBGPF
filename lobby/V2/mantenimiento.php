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
	<link rel="icon" type="img/png" href="../../img/distintivo-LGPF.png">
</head>

<body>

	<main class="h-100 d-flex flex-column justify-content-between" style="min-height:100vh;">

		<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom border-3 border-secondary shadow-lg"
			aria-label="Barra de navegación">

			<div class="container">

				<a class="navbar-brand" href="#">

					<img src="../../img/distintivo-LGPF.png" class="me-2" width="48" height="42"
						alt="Distintivo de la institución">

					<span>L.B. Gonzalo Picón Febres</span>
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
								<i class="fas fa-search"></i>
								Consultar
							</a>
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

				<div class="col-12 order-1 order-md-0 col-md-3 p-2">
					<div class="bg-light border rounded-3 w-100">
						<div class="border p-3 text-center">
							<p class="mb-0">
								Menú de contexto
							</p>
						</div>
						<div class="text-center">

							<ul class="list-group list-group-flush">
								<li class="list-group-item"><a class="btn btn-secondary" href="#">Respaldar BD</a></li>
								<li class="list-group-item"><a class="btn btn-secondary" href="#">Restaurar BD</a></li>
							</ul>
						
						</div>

						<div class="border p-2 text-center">
							<p class="mb-0">
								<small class="text-muted">Presione para enfocar la opción</small>
							</p>
						</div>

					</div>
				</div>

				<div class="col-12 order-0 order-md-1 col-md-9 p-2">
					<div class="card text-center bg-light w-100">

						<div class="card-header">
							<b>Menú principal</b>
						</div>

						<div class="card-body">

							<p class="card-text">
								<span>Bienvenido al modulo de mantenimiento</span>
							</p>
							<div class="text-start container">

								<form id="Respaldar" class="d-block my-3 border rounded-3 p-3"
									action="../../controladores/control-mantenimiento.php" method="POST">
									<p><strong>Generar un respaldo de la base de datos.</strong></p>
									<input type="hidden" name="orden" value="Respaldar">

									<button class="btn btn-primary mb-2" type="button" onclick="respaldarBD()"
										title="Presione aquí para respaldar la base de datos.">
										Respaldar <i class="fas fa-download fa-lg"></i>
									</button>

									<p class="text-muted mb-0">
										<small><u><i>Respalda la base de datos y descarga este mismo.</i></u></small>
									</p>

								</form>

								<form id="Restaurar" class="d-block my-3 border rounded-3 p-3" action="test.php" method="POST">
									<p><strong>Restaurar base de datos.</strong></p>
									<div class="input-group mb-2">

										<select class="form-select overflow-hidden" id="puntoGuardado" name="puntoGuardado"
											placeholder="Seleccione un punto de restauración"
											title="Debe seleccionar alguna de las opciones." required>

											<option disabled selected>Seleccione un punto de restauración</option>

											<!--Timestamp del respaldo-->
											<option>1-1-1</option>
											<option>2-2-2</option>
											<option>3-3-3</option>
											<option>4-4-4</option>
											<option>5-5-5</option>
											<option>6-6-6</option>
											<option>7-7-7</option>
											<option>8-8-8</option>
											<option>Valores por defecto</option>

										</select>

										<input type="hidden" name="orden" value="Restaurar">

										<button class="btn btn-primary" type="button" onclick="restaurarBD()"
											title="Presione aquí para restaurar la base de datos.">
											Restaurar <i class="fas fa-database fa-lg"></i>
										</button>

									</div>

									<p class="text-muted mb-0"><small><u><i>Regresa la base de datos a un punto anterior. Genera
													un
													respaldo
													automaticamente.</i></u></small></p>

								</form>
							</div>
						</div>

						<div class="card-footer">
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
				cancelButtonText: '¡No, detente! <i class="fas fa-thumbs-down"></i>',
				confirmButtonText: '<i class="fas fa-thumbs-up"></i> ¡Sí, continua!'
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
				confirmButtonText: 'Cerrar'
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
			cancelButtonText: '¡No, detente! <i class="fas fa-thumbs-down"></i>',
			confirmButtonText: '<i class="fas fa-thumbs-up"></i> ¡Sí, continua!'
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
						console.log('I was closed by the timer')
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