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
	<title>Página de inicio</title>
</head>
<body>

	<table border="1" cellpadding="12" style="max-width:600px; margin:auto; overflow:scroll;">
		<tr>
			<th colspan="3">
				Bienvenido, <?php echo $_SESSION['persona'][1]." ".$_SESSION['persona'][2]; ?>		
			</th>
		</tr>
		<tr>
			<th colspan="3">¿Qué desea hacer?</th>
		</tr>
		<tr>
			<td><a href="perfil.php">Ver perfil</a></td>
			<td><a href="registrar-alumno/paso-1.php">Registrar alumno representado</a></td>
			<td><a href="consultar.php">Consultar mis registros</a></td>
			
		</tr>
		<tr>
			<th colspan="3"><a href="logout.php">Cerrar sesión</a></td>
		</tr>
	</table>

</body>
</html>