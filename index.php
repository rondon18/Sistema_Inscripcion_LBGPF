<?php 

require("login.php");

if (isset($_POST['Ingresar'], $_POST['cedula'], $_POST['clave'])) {

	if (login($_POST['cedula'], $_POST['clave'])) {
		$_SESSION['login'] = True;
		header('Location: lobby/index.php');
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ingresar al sistema</title>
</head>
<body>
	<form action="index.php" method="POST">
		<table border="1" style="max-width:600px; margin:auto; overflow:scroll;">
			<tr>
				<th colspan="3">Ingresar:</th>
			</tr>
			<tr>
				<td>Cedula</td>
				<td><input type="text" name="cedula" required=""></td>
			</tr>
			<tr>
				<td>Clave:</td>
				<td><input type="password" name="clave" required=""></td>
			</tr>
			<tr>
				<th colspan="3">
					<input type="submit" name="Ingresar" value="Ingresar">
					<a href="registrarse.php">Registrarse</a>
				</th>
			</tr>
		</table>
	</form>
</body>
</html>