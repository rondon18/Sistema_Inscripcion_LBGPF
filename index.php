<?php 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ingresar al sistema</title>
</head>
<body>
	<form action="login.php" method="POST">
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