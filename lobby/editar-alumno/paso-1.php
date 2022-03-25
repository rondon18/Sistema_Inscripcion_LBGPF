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
	<title>
		Registrar nuevo alumno
	</title>
</head>
<style type="text/css">
	div {
		padding: .4rem;
		margin: 16px 2px;
		border: solid 1px #000000AA;
	}
	html{
		font-family: Calibri;
	}
	input[type="text"], input[type="number"], input[type="tel"], textarea {
		display: inline-block;
		width: auto;
	}
</style>
<body>

		<form action="paso-2.php" method="POST" style="max-width: 600px; margin:auto;">

			<div>Formulario de registro de alumnos</div>

			<div>

				<h1>Datos personales.</h1>

				<div>
					<div>
						<span>¿Es usted la madre o el padre del estudiante?:</span>

						<div>
							<div>
								<span>Si </span>
								<input type="radio" name="Es_el_representante" value="Si" required>

								<span>No </span>
								<input type="radio" name="Es_el_representante" value="No" required>
							</div>
						</div>
					</div>
					<div>
						<span>Vinculo con el estudiante:</span>
						<div>
							<label>Madre </label>
							<input type="radio" name="Vinculo_Familiar" value="Madre">
							<label>Padre </label>
							<input type="radio" name="Vinculo_Familiar" value="Padre">
						</div>
					</div>
				</div>
				
			</div>
		
			<!--Botón para guardar-->
			<div class="border-t p-6 text-white">
				<button class="block w-1/2 mx-auto rounded-xl p-3 bg-purple-500 text-white transform transition-transform hover:scale-105 hover:bg-purple-600" type="submit">Ingresar</button>
			</div>
		
		</form>

</body>
</html>