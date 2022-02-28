<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		
	</title>
</head>
<body>
	<form action="controladores/control-usuarios.php" method="POST">
	
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
					<label>Nombres:</label>
				</td>
				<td colspan="2">
					<input type="text" name="Nombres">					
				</td>
			</tr>
			<tr>
				<td>
					<label>Apellidos:</label>
				</td>
				<td colspan="2">
					<input type="text" name="Apellidos">				
				</td>
			</tr>
			<tr>
				<td>
					<label>Cédula de identidad:</label>
				</td>
				<td colspan="2">
					<input type="text" name="Cedula">				
				</td>
			</tr>
			<tr>
				<td>
					<label>Fecha de nacimiento:</label>
				</td>
				<td colspan="2">
					<input type="date" name="FechaNacimiento">				
				</td>
			</tr>
			<tr>
				<td>
					<label>Genero:</label>
				</td>
				<td colspan="2">
					<span>M</span><input type="radio" name="Genero" value="M">
					<span>F</span><input type="radio" name="Genero" value="F">	
				</td>
			</tr>
			<tr>
				<td>
					<label>Correo electronico:</label>
				</td>
				<td colspan="2">
					<input type="email" name="Correo">					
				</td>
			</tr>
			<tr>
				<td>
					<label>Teléfono:</label>
				</td>
				<td colspan="2">
					<input type="tel" name="Telefono">				
				</td>
			</tr>
			<tr>
				<td>
					<label>Direccion:</label>
				</td>
				<td colspan="2">
					<textarea name="Direccion"  rows="4"></textarea>			
				</td>
			</tr>
			<tr>
				<td>
					<label>Clave:</label>
				</td>
				<td colspan="2">
					<input type="password" name="Clave">		
				</td>
			</tr>
			<tr>
				<th colspan="3">
					<input type="hidden" name="orden" value="Insertar">
					<input type="submit" name="guardar" value="GUARDAR CAMBIOS">
				</td>
			</tr>
			<tr>
				<th colspan="3"><a href="index.php">Volver</a></td>
			</tr>
		</table>
	</form>
</body>
</html>