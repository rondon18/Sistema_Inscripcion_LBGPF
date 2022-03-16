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
			<td colspan="2"><?php echo  $_SESSION['persona'][1]?></td>
		</tr>
		<tr>
			<td>Apellidos:</td>
			<td colspan="2"><?php echo  $_SESSION['persona'][2]?></td>
		</tr>
		<tr>
			<td>Cedula de identidad:</td>
			<td colspan="2"><?php echo "CI:".$_SESSION['persona'][3]?></td>
		</tr>
		<tr>
			<td>Fecha de nacimiento:</td>
			<td colspan="2"><?php echo $_SESSION['persona'][4]?></td>
		</tr>
		<tr>
			<td>Lugar de nacimiento:</td>
			<td colspan="2"><?php echo $_SESSION['persona'][5]?></td>
		</tr>
		<tr>
			<td>Genero:</td>
			<td colspan="2"><?php echo $_SESSION['persona'][6]?></td>
		</tr>
		<tr>
			<td>Correo electronico:</td>
			<td colspan="2"><?php echo $_SESSION['persona'][7]?></td>
		</tr>
		<tr>
			<td>Dirección de residencia:</td>
			<td colspan="2"><?php echo $_SESSION['persona'][8]?></td>
		</tr>
		<tr>
			<td>Telefonos:</td>
			<td> <?php echo "Principal: ".$_SESSION['persona'][9];?></td>
			<td> <?php echo "Auxiliar: ".$_SESSION['persona'][10] ?></td>
		</tr>
		<tr>
			<td>Privilegios:</td>
			<td colspan="2"> <?php
			if ($_SESSION['usuario'][2] == "2") {
				echo "Administrador";
			}
			elseif($_SESSION['usuario'][2] == "1") {
				echo "Representante";
			}
			else {
				echo "error";
			}
			;?></td>
		</tr>
		<tr>
			<td><a href="index.php">Volver</a></td>
			<td><a href="editar-perfil.php">Editar perfil</a></td>
			<td>
				<form action="../controladores/control-usuarios.php" method="POST">
					<input type="submit" name="DarseDeBaja" value="Darse de baja">
					<input type="hidden" name="orden" value="Eliminar">
				</form>
			</td>
		</tr>
	</table>
</body>
</html>