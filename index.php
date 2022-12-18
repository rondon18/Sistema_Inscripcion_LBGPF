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
		<main class="d-flex flex-column justify-content-between vh-100">
			<!--Banner-->
			<header class="w-100 bg-white d-flex justify-content-center justify-content-md-between shadow p-1" style="z-index:1000;">
				<div>
					<img src="img/banner-gobierno.png" alt=""  height="42" class="d-none d-md-inline-block align-text-top">
					<img src="img/banner-MPPE.png" alt=""  height="42" class="d-none d-md-inline-block align-text-top">
				</div>
				<img src="img/banner-LGPF.png" alt=""  height="42" class="d-inline-block align-text-top">
			</header>
			
			<div class="container mx-md-5 px-md-5 my-5 align-self-center">
				<div class="card shadow overflow-hidden rounded-3">
					<div class="row">
						<div class="col-lg-4 d-none d-lg-inline-block">
							<img class="w-100 h-100" src="img/img-ref.jpg" alt="">
							<!-- <img class="w-100 h-100 position-absolute" src="img/icono.svg" alt=""> -->
						</div>
						<form id="login" action="controladores/login.php" method="POST" class="col-lg-8 p-5">
							<h3 class="mb-4">
								<i class="fa-solid fa-lg fa-house me-2"></i>
								Iniciar sesión
							</h3>
							<div class="row">
								<div class="col-12 col-md-4 mb-2 campo">
									<label for="nacionalidad" class="form-label">
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
										<option value="E">Extrajero(a)</option>
									</select>
								</div>
								<div class="col-12 col-md-8 mb-2 campo">
									<label for="cedula" class="form-label">Cédula:</label>
									<!-- Campo del número de cedula -->
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
								<div class="col-12 col-lg mb-2 campo">
									<label for="clave" class="form-label">Contraseña:</label>
									<input 
										id="clave" 
										class="form-control" 
										type="password" 
										name="clave" 
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
									<a href="recuperar-clave.php">¿Contraseña olvidada?</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2">
				<span class="text-white">Sistema de inscripción L.B. G.P.F - <i class="far fa-copyright"></i> 2022-<?php echo date("Y"); ?></span>
			</footer>
			<?php include 'ayuda.php'; ?>
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
				'Cedula o clave incorrecta',
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