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
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/>
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
					<span class="form-label">¿Es usted la madre o el padre del estudiante?:</span>

					<div class="form-check">
						<input class="form-check-input" type="radio" name="Es_el_representante" value="Si" required>
						<span>Si</span>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="Es_el_representante" value="No" required>
						<span>No </span>
					</div>
				</div>
				
				<div>
					<span>Vinculo con el estudiante:</span>

					<div class="form-check">
						<label>Madre </label>
						<input class="form-check-input" type="radio" name="Vinculo_Familiar" value="Madre" required>
					</div>
					<div class="form-check">
						<label>Padre </label>
						<input class="form-check-input" type="radio" name="Vinculo_Familiar" value="Padre" required>
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