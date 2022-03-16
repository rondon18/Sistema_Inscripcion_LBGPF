<?php 
session_start();

if (isset($_POST['Paso_4'])) {
	//Si las claves mandadas coinciden, pasa al proximo paso
	//Si no, vuelve a cargar la pagina para que el usuario la ingrese nuevamente
	if ($_POST['Contraseña'] == $_POST['RepetirContraseña']) {

		$_SESSION['Contraseña'] = $_POST["Contraseña"];

		$_SESSION['Paso_4'] = $_POST['Paso_4'];

		header('Location: paso-5.php');
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
</style>

<body>
	<form action="paso-4.php" method="POST" style="max-width: 600px; margin:auto;">
		<div>
			<div>
				<!--Datos del usuario-->
				<h1>Datos de usuario.</h1>

				<div>
					<!--Trabaja el representante-->
					<div>
						<span>Contraseña:</span>
						<?php //Si las claves no coinciden, muestra un recuadro con un mensaje de error 
						if (isset($check)) { echo '<font color="red">Las contraseñas no coinciden</font>';}?>
						<div>
							<input type="password" name="Contraseña" placeholder="Contraseña">
							<input type="password" name="RepetirContraseña" placeholder="Repertir la contraseña">
						</div>
						<small>La contraseña debe tener al menos 8 caracteres e incluir: mayusculas, minusculas, simbolos y número</small>
					</div>
				</div>
				<input type="hidden" name="Paso_4" value="Paso_4">

				<a href="../index.php">Volver al inicio</a>
				<a href="paso-3.php">Volver al paso anterior</a>
				<input type="submit" value="Guardar y continuar">
			</div>
		</div>
	</form>
</body>
</html>