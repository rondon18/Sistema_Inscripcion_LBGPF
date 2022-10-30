<?php
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Ingresar al sistema</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/estilos.css"/>
		<link rel="stylesheet" type="text/css" href="css/all.min.css"/>
		<link rel="icon" type="img/png" href="img/distintivo-LGPF.png">
	</head>
	<body>
		<main class="d-flex vh-100" style="max-height: 100vh; overflow-y: auto;">
			<!--Banner-->
			<header class="w-100 bg-white d-flex justify-content-center justify-content-md-between shadow p-1 position-absolute top-0" style="z-index:1000;">
				<div>
					<img src="img/banner-gobierno.png" alt=""  height="42" class="d-none d-md-inline-block align-text-top">
					<img src="img/banner-MPPE.png" alt=""  height="42" class="d-none d-md-inline-block align-text-top">
				</div>
				<img src="img/banner-LGPF.png" alt=""  height="42" class="d-inline-block align-text-top">
			</header>
			
			<div class="container-md py-3 px-xl-5 align-self-center">
				<div class="card mx-auto my-auto" style="max-width:400px;">
					<form action="controladores/login.php" method="POST">
						<div class="card-header text-center">
							<b>Ingresar al sistema</b>
						</div>
						<div class="card-body p-4">

							<div class="row mb-2">
								<div class="col-12 text-center">
									<i class="fa-solid fa-5x fa-circle-user mt-0 mb-2"></i>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
										<label class="form-label">Cédula:</label>
								</div>
							</div>

							<div class="row">
								<div class="col">
									<div class="input-group mb-2">
										<!-- Campo del tipo de cédula -->
										<select class="form-select" name="Tipo_Cédula" required>
											<option selected disabled value="">Seleccione una opción</option>
											<option value="V">V</option>
											<option value="E">E</option>
										</select>
										<!-- Campo del número de cédula -->
										<input class="form-control w-sm-auto" type="text" id="Cédula" name="Cédula" placeholder="Cédula de usuario" maxlength="15" required>		
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col">
									<label class="form-label">Contraseña:</label>
								</div>
							</div>

							<div class="row">
								<div class="col">
									<input class="form-control mb-2" type="password" id="clave" name="clave" placeholder="Contraseña de ingreso" required>
								</div>
							</div>

							<div class="row">
								<div class="col">
									<small>
										<a class="text-muted" href="recuperar-clave.php">
											¿Contraseña olvidada?
										</a>
									</small>
								</td>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-primary w-100" type="submit" name="Ingresar">Iniciar sesión</button>
						</div>
					</form>
				</div>
			</div>

			<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 position-fixed bottom-0">
				<span class="text-white">Sistema de inscripción L.B. G.P.F - <i class="far fa-copyright"></i> 2022-<?php echo date("Y"); ?></span>
			</footer>
			<?php include 'ayuda.php'; ?>
		</main>
		<script type="text/javascript" src="js/sweetalert2.js"></script>
		<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="js/validaciones.js"></script>
		<?php if (isset($_GET['error'])): ?>
			<script type="text/javascript" defer>
				Swal.fire(
					'Error',
					'Cédula o clave incorrecta',
					'warning'
				);
			</script>
		<?php elseif(isset($_GET['error_pregunta'])): ?>
			<script type="text/javascript" defer>
				Swal.fire(
					'Error',
					'Las respuestas ingresadas no coinciden',
					'warning'
				);
			</script>
		<?php endif ?>
	</body>
</html>