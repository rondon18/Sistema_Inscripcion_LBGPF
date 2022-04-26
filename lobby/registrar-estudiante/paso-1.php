<?php

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registrar nuevo estudiante</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/colores.css"/>
</head>
<body>
	<!--Banner-->
	<header class="w-100 bg-white d-flex justify-content-between shadow p-1 position-fixed top-0">
		<div>
			<img src="../../img/banner-gobierno.png" alt=""  height="42" class="d-inline-block align-text-top">
			<img src="../../img/banner-MPPE.png" alt=""  height="42" class="d-inline-block align-text-top">
		</div>
		<img src="../../img/banner-LGPF.png" alt=""  height="42" class="d-inline-block align-text-top">
	</header>

	<form class="card" action="paso-2.php" method="POST" style="max-width: 600px; margin: 74px auto;">

		<div class="card-header">
			<h4>Formulario de registro de estudiantes</h4>
		</div>

		<div class="card-body">

			<h5>Datos personales.</h5>

			<div>
				<p class="form-label">¿Cuál es su relación con el estudiante?:</p>
				<div class="pt-2 px-2 pb-0 bg-light border rounded">
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="Vinculo" value="Madre" required>
						<label class="form-label">Madre</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="Vinculo" value="Padre" required>
						<label class="form-label">Padre</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="Vinculo" value="Representante" required>
						<label class="form-label">Representante</label>
					</div>
				</div>
			</div>

		</div>

		<!--Botón para guardar-->
		<div class="card-footer">
			<a class="btn btn-primary" href="../index.php">Volver al menú</a>
			<button class="btn btn-primary" type="submit">Ingresar</button>
		</div>

	</form>

	<!--Footer-->
	<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 position-fixed bottom-0">
		<span class="text-white">Sistema de inscripción L.B. GPF - <?php echo date("Y"); ?></span>
	</footer>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
