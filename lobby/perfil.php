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
	<title>Perfil del usuario</title>
</head>
<body>
	<table border="1" cellpadding="12" style="max-width:600px; margin:auto; overflow:scroll;">
		<tr>
			<th colspan="3">Perfil de usuario</th>
		</tr>
		<tr>
			<td>Nombres:</td>
			<td colspan="2"><?php echo $_SESSION['usuario']->PrimerNombre." ".$_SESSION['usuario']->SegundoNombre; ?></td>
		</tr>
		<tr>
			<td>Apellidos:</td>
			<td colspan="2"><?php echo $_SESSION['usuario']->PrimerApellido." ".$_SESSION['usuario']->SegundoApellido; ?></td>
		</tr>
		<tr>
			<td>Cedula de identidad:</td>
			<td colspan="2"><?php echo $_SESSION['usuario']->Cedula; ?></td>
		</tr>
		<tr>
			<td>Correo electronico:</td>
			<td colspan="2"><?php echo $_SESSION['usuario']->Correo; ?></td>
		</tr>
		<tr>
			<td>Telefono principal:</td>
			<td colspan="2"><?php echo $_SESSION['usuario']->Telefono1; ?></td>
		</tr>
		<tr>
			<td>Telefono auxiliar:</td>
			<td colspan="2"><?php echo $_SESSION['usuario']->Telefono2; ?></td>
		</tr>
		<tr>
			<td>Dirección de residencia:</td>
			<td colspan="2"><?php echo $_SESSION['usuario']->Direccion; ?></td>
		</tr>
		<tr>
			<td><a href="index.php">Volver</a></td>
			<td><a href="editar-perfil.php">Editar perfil</a></td>
			<td>
				<form action="../php/control-usuarios.php" method="POST">
					<input type="submit" name="DarseDeBaja" value="Darse de baja">
					<input type="hidden" name="orden" value="Eliminar">
				</form>
			</td>
		</tr>
	</table>
</body>
</html>