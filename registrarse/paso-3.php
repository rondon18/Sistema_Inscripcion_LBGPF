<?php 
session_start();

if (isset($_POST['Paso_3'])) {
	//Si las claves mandadas coinciden, pasa al proximo paso
	//Si no, vuelve a cargar la pagina para que el usuario la ingrese nuevamente
	if ($_POST['Contraseña'] == $_POST['RepetirContraseña']) {

		$_SESSION['Contraseña'] = $_POST["Contraseña"];

		$_SESSION['Paso_3'] = $_POST['Paso_3'];

		header('Location: paso-4.php');
	}
	else {
		$check = "Las contraseñas ingresadas no coinciden";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro - Datos del usuario</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/colores.css"/>
</head>
<body>
	<form action="paso-3.php" method="POST" style="max-width: 600px; margin: 74px auto;">
		<div class="card">
			<!--Datos del usuario-->
			<div class="card-header">
				<h1>Datos de usuario.</h1>
			</div>
			<div class="card-body">
				<!--Contraseña y validación-->
				<div>
					<span>Contraseña:</span>
					<?php //Si las claves no coinciden, muestra un recuadro con un mensaje de error 
					if (isset($check)) { echo '<font color="red">Las contraseñas no coinciden</font>';}?>
					<div class="input-group">
						<input class="form-control" type="password" name="Contraseña" placeholder="Contraseña">
						<input class="form-control" type="password" name="RepetirContraseña" placeholder="Repertir la contraseña">
					</div>
					<small class="d-inline-block form-text">La contraseña debe tener al menos 8 caracteres e incluir: mayusculas, minusculas, simbolos y número</small>
				</div>
				
			</div>
			<div class="card-footer text-center">
				<input type="hidden" name="Paso_3" value="Paso_3">
				<a class="btn btn-primary" href="../index.php">Volver al inicio</a>
				<a class="btn btn-primary" href="paso-3.php">Volver al paso anterior</a>
				<input class="btn btn-primary" type="submit" value="Guardar y continuar">
			</div>
		</div>
	</form>
</body>
</html>