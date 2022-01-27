<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		
	</title>
</head>
<body>
	<form action="php/control-usuarios.php" method="POST">
	
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
					<input type="text" name="PrimerNombre">					
				</td>
			</tr>
			<tr>
				<td>
					<label>Segundo nombre:</label>
				</td>
				<td colspan="2">
					<input type="text" name="SegundoNombre">				
				</td>
			</tr>
			<tr>
				<td>
					<label>Primer apellido:</label>
				</td>
				<td colspan="2">
					<input type="text" name="PrimerApellido">				
				</td>
			</tr>
			<tr>
				<td>
					<label>Segundo apellido:</label>
				</td>
				<td colspan="2">
					<input type="text" name="SegundoApellido">					
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
					<input type="email" name="Email">					
				</td>
			</tr>
			<tr>
				<td>
					<label>Telefono principal:</label>
				</td>
				<td colspan="2">
					<input type="tel" name="Telefono1">					
				</td>
			</tr>
			<tr>
				<td>
					<label>Telefono auxiliar:</label>
				</td>
				<td colspan="2">
					<input type="tel" name="Telefono2">				
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