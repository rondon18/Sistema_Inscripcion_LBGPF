<?php

$nivel = 0;

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
		<link rel="icon" type="img/png" href="img/icono.png">
	</head>

	<body>
		<main class="d-flex flex-column justify-content-between vh-100">
			<?php include('header.php'); ?>
			
			<div class="container mx-md-5 px-md-5 my-5 align-self-center">
				<div class="card shadow overflow-hidden rounded-3">
					<div class="row">
						<div class="col-lg-4 d-none d-lg-inline-block">
							<img class="w-100 h-100" src="img/img-ref.jpg" alt="">
						</div>
						<?php if (!isset($_GET["contraseña_olvidada"])): ?>
							
						<form id="login" action="controladores/login.php" method="POST" class="col-lg-8 p-5">
							<h3 class="mb-4">
								<i class="fa-solid fa-lg fa-house me-2"></i>
								Iniciar sesión
							</h3>
							<div class="row">
								<div class="col-12 col-md-4 mb-2">
									<label for="nacionalidad" class="form-label requerido">
										Nacionalidad:
									</label>
									<!-- Campo de nacionalidad -->
									<select 
										class="form-select" 
										name="nacionalidad" 
										required
									>
										<option selected value="">Nacionalidad</option>
										<option value="V">Venezolano(a)</option>
										<option value="E">Extranjero(a)</option>
									</select>
								</div>
								<div class="col-12 col-md-8 mb-2">
									<label for="cedula" class="form-label requerido">Cédula:</label>
									<!-- Campo del número de cédula -->
									<input 
										id="cedula" 
										class="form-control" 
										type="text" 
										name="cedula" 
										maxlength="8" 
										placeholder="Cedula de usuario"
										autocomplete="off" 
										required
									>
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-lg mb-2">
									<label for="contraseña" class="form-label requerido">Contraseña:</label>
									<input 
										id="contraseña" 
										class="form-control" 
										type="password" 
										name="contraseña" 
										placeholder="Contraseña de ingreso" 
										autocomplete="off" 
										required
									>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-12 col-lg mb-2">
									<button class="btn btn-primary" type="submit">
										Ingresar al sistema
										<i class="fa-solid fa-lg fa-paper-plane ms-2"></i>
									</button>
								</div>
								<div class="col-12 col-lg mb-2">
									<a href="index.php?contraseña_olvidada">¿Contraseña olvidada?</a>
								</div>
							</div>
						</form>

						<?php else: ?>
							<?php include("recuperar_contraseña.php"); ?>
						<?php endif ?>
					</div>
				</div>
			</div>
			<?php include('footer.php'); ?>
			<?php include('ayuda.php'); ?>
		</main>
		
		<script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>

		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="js/messages_es.min.js"></script>
		<script type="text/javascript" src="js/additional-methods.min.js"></script>
		<script type="text/javascript" src="js/login.js"></script>
		
		<script type="text/javascript" src="js/sweetalert2.js"></script>
		
		<?php if (isset($_GET['error'])): ?>
		<script type="text/javascript" defer>
			Swal.fire(
				'Error',
				'Cédula o contraseña incorrecta',
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