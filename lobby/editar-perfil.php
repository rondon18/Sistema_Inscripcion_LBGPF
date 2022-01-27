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
		
	</title>
</head>
<body>
	<form action="../php/control-usuarios.php" method="POST">
	
		<table border="1" cellpadding="12" style="max-width:600px; margin:auto; overflow:scroll;">
			<tr>
				<th colspan="3">
					Formulario de registro
				</th>
			</tr>
			<tr>
				<td colspan="3"><small>Rellene todos los campos antes de oprimir guardar</small></td>
			</tr>
			<tr>
				<td>
					<label>Primer nombre:</label>
				</td>
				<td colspan="2">
					<input type="text" name="PrimerNombre" value="<?php echo $_SESSION['usuario']->PrimerNombre; ?>">					
				</td>
			</tr>
			<tr>
				<td>
					<label>Segundo nombre:</label>
				</td>
				<td colspan="2">
					<input type="text" name="SegundoNombre" value="<?php echo $_SESSION['usuario']->SegundoNombre; ?>">				
				</td>
			</tr>
			<tr>
				<td>
					<label>Primer apellido:</label>
				</td>
				<td colspan="2">
					<input type="text" name="PrimerApellido" value="<?php echo $_SESSION['usuario']->PrimerApellido; ?>">				
				</td>
			</tr>
			<tr>
				<td>
					<label>Segundo apellido:</label>
				</td>
				<td colspan="2">
					<input type="text" name="SegundoApellido" value="<?php echo $_SESSION['usuario']->SegundoApellido;?>">					
				</td>
			</tr>
			<tr>
				<td>
					<label>Cédula de identidad:</label>
				</td>
				<td colspan="2">
					<input type="text" name="Cedula" value="<?php echo $_SESSION['usuario']->Cedula; ?>">				
				</td>
			</tr>
			<tr>
				<td>
					<label>Genero:</label>
				</td>
				<td colspan="2">
					<span>M</span>
					<input type="radio" name="Genero" value="M" <?php if($_SESSION['usuario']->Genero == "M"){ echo 'checked=""';} ?>>
					<span>F</span>
					<input type="radio" name="Genero" value="F" <?php if($_SESSION['usuario']->Genero == "F"){ echo 'checked=""';} ?>>	
				</td>
			</tr>
			<tr>
				<td>
					<label>Correo electronico:</label>
				</td>
				<td colspan="2">
					<input type="email" name="Email" value="<?php echo $_SESSION['usuario']->Correo; ?>">					
				</td>
			</tr>
			<tr>
				<td>
					<label>Telefono principal:</label>
				</td>
				<td colspan="2">
					<input type="tel" name="Telefono1" value="<?php echo $_SESSION['usuario']->Telefono1; ?>">					
				</td>
			</tr>
			<tr>
				<td>
					<label>Telefono auxiliar:</label>
				</td>
				<td colspan="2">
					<input type="tel" name="Telefono2" value="<?php echo $_SESSION['usuario']->Telefono2; ?>">				
				</td>
			</tr>
			<tr>
				<td>
					<label>Direccion:</label>
				</td>
				<td colspan="2">
					<textarea name="Direccion"  rows="4"><?php echo $_SESSION['usuario']->Direccion; ?></textarea>			
				</td>
			</tr>
			<tr>
				<td>
					<label>Clave:</label>
				</td>
				<td colspan="2">
					<input type="password" name="Clave" value="<?php echo $_SESSION['usuario']->Clave ?>">		
				</td>
			</tr>
			<tr>
				<th colspan="3">
					<input type="hidden" name="orden" value="Editar">
					<input type="submit" name="guardar" value="GUARDAR CAMBIOS">
				</td>
			</tr>
			<tr>
				<th colspan="3"><a href="perfil.php">Volver</a></td>
			</tr>
		</table>
	</form>
</body>
</html>