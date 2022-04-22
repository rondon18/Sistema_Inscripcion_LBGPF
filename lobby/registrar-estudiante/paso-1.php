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
					<span class="form-label">¿Es usted la madre, el padre o el representante del estudiante?:</span>
					<div class="form-check">
						<label>Madre </label>
						<input class="form-check-input" type="radio" name="Vinculo" value="Madre" required>
					</div>
					<div class="form-check">
						<label>Padre </label>
						<input class="form-check-input" type="radio" name="Vinculo" value="Padre" required>
					</div>
					</div>
					<div class="form-check">
						<label>Representante </label>
						<input class="form-check-input" type="radio" name="Vinculo" value="Representante" required>
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
