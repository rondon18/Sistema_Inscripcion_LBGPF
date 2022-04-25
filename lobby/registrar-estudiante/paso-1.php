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
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/colores.css"/>
</head>
<body>

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

</body>
</html>
