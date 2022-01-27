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
		Registrar nuevo alumno
	</title>
</head>
<body>

	<form action="../php/control-alumnos.php" method="POST">
	
		<table border="1" cellpadding="12" style="max-width:600px; margin:auto; overflow:scroll;">
			
			<tr>
			
				<th colspan="3">
			
					Formulario de registro
			
				</th>
			
			</tr>
			
			<tr>
			
				<td colspan="3">
			
					<small>Rellene todos los campos antes de oprimir guardar</small>
			
				</td>
			
			</tr>
			<!--Primera parte: Informacion básica sobre el alumno-->			
			<tr>
			
				<th colspan="3">
			
					Datos de alumno
			
				</th>
			
			</tr>

			<tr>
			
				<td>
			
					<label>Primer nombre:</label>
			
				</td>
			
				<td colspan="2">
			
					<input type="text" name="PrimerNombre" required="">					
			
				</td>
			
			</tr>
			
			<tr>
			
				<td>
			
					<label>Segundo nombre:</label>
			
				</td>
			
				<td colspan="2">
			
					<input type="text" name="SegundoNombre" required="">				
			
				</td>
			
			</tr>
			
			<tr>
			
				<td>
			
					<label>Primer apellido:</label>
			
				</td>
			
				<td colspan="2">
			
					<input type="text" name="PrimerApellido" required="">				
			
				</td>
			
			</tr>
			
			<tr>
			
				<td>
			
					<label>Segundo apellido:</label>
			
				</td>
			
				<td colspan="2">
			
					<input type="text" name="SegundoApellido" required="">					
			
				</td>
			
			</tr>
			
			<tr>
			
				<td>
			
					<label>Tipo de cédula</label>
			
				</td>
			
				<td colspan="2">
			
					<select name="TipoCedula" required="">
			
						<option value="Escolar">Escolar</option>
						<option value="Extranjera">Extranjera</option>
						<option value="Venezolana">Venezolana</option>
			
					</select>			
			
				</td>
			
			</tr>
			
			<tr>

				<td>

					<label>Cédula de identidad:</label>

				</td>

				<td colspan="2">

					<input type="text" name="Cedula" required="">				

				</td>

			</tr>

				<td>

					<label>Cédula del representante</label>

				</td>

				<td colspan="2">

					<input type="text" disabled="" value="<?php echo $_SESSION['usuario']->Cedula; ?>">				
					<input type="hidden" name="CedulaRepresentante" value="<?php echo $_SESSION['usuario']->Cedula; ?>">				

				</td>

			</tr>

			<tr>

				<td>

					<label>Genero:</label>

				</td>

				<td colspan="2">

					<span>M</span><input type="radio" name="Genero" value="M" required="">
					<span>F</span><input type="radio" name="Genero" value="F" required="">	

				</td>

			</tr>

			<!--Segunda parte: Fecha y lugar de nacimiento-->
			<tr>
			
				<th colspan="3">Lugar y fecha de nacimiento:</th>
			
			</tr>
			
			<tr>
			
				<td>
			
					<label>Fecha de nacimiento:</label>
			
				</td>
			
				<td colspan="2">
			
					<input type="date" name="FechaNacimiento" required="">					
			
				</td>
			
			</tr>
			
			<tr>
			
				<td>
			
					<label>Estado:</label>
			
				</td>
			
				<td colspan="2">
			
					<input type="text" name="Estado" required="">					
			
				</td>
			
			</tr>
			
			<tr>
			
				<td>
			
					<label>Municipio:</label>
			
				</td>
			
				<td colspan="2">
			
					<input type="text" name="Municipio" required="">				
			
				</td>
			
			</tr>
			
			<tr>
			
				<td>
			
					<label>Parroquia:</label>
			
				</td>
			
				<td colspan="2">
			
					<input type="text" name="Parroquia" required="">		
			
				</td>
			
			</tr>
			
			<tr>
			
				<td>
			
					<label>Ciudad:</label>
			
				</td>
			
				<td colspan="2">
			
					<input type="text" name="Ciudad" required="">		
			
				</td>
			
			</tr>
			<!--Tercera parte: Ficha medica del alumno-->
			<tr>
			
				<th colspan="3">Informacion medica</th>
			
			</tr>
			
			<tr>
			
				<td>
			
					<label>Estatura</label>
			
				</td>
			
				<td colspan="2">
			
					<input type="number" name="Estatura" min="1" step="1" required=""> (Centimetros)				
			
				</td>
			
			</tr>
			
			<tr>
			
				<td>
			
					<label>Peso:</label>
			
				</td>
			
				<td colspan="2">
			
					<input type="number" name="Peso" min="1" step="0.1" required=""> (Kilogramos)					
			
				</td>
			
			</tr>
			
			<tr>
			
				<td>
			
					<label>Grupo sanguíneo:</label>
			
				</td>
			
				<td colspan="2">
			
					<input type="text" name="GrupoSanguineo" required="">				
			
				</td>
			
			</tr>
			
			<tr>
			
				<td>
			
					<label>¿Posee alguna medicación en especial?</label>
			
				</td>
			
				<td colspan="2">
			
					<textarea name="Medicacion" rows="4"></textarea>
			
				</td>
			
			</tr>
			
			<tr>
			
				<td>
			
					<label>¿Posee algun tipo de dieta especial?</label>
			
				</td>
			
				<td colspan="2">
			
					<textarea name="DietaEspecial" rows="4"></textarea>
			
				</td>
			
			</tr>
			
			<tr>
			
				<td>
			
					<label>¿Tiene algun tipo de impedimento físico?</label>
			
				</td>
			
				<td colspan="2">
			
					<textarea name="ImpedimentoFisico" rows="4"></textarea>
			
				</td>
			
			</tr>
			
			<tr>
			
				<td>
			
					<label>¿Posee alergias?</label>
			
				</td>
			
				<td colspan="2">
			
					<textarea name="Alergias" rows="4"></textarea>
			
				</td>
			
			</tr>
			
			<tr>
			
				<td>
			
					<label>¿Posee algun problema de la vista?</label>
			
				</td>
			
				<td colspan="2">
			
					<textarea name="ProblemasVista" rows="4"></textarea>		
			
				</td>
			
			</tr>
			
			<tr>
				
				<td>
				
					<label>¿Posee algun problema de salud?</label>
				
				</td>
				
				<td colspan="2">
					
					<span>Asma</span>
					<input type="checkbox" name="Asma" value="Asma">
					
					<span>Insomnio</span>
					<input type="checkbox" name="Insomnio" value="Insomnio"><br>		
					
					<span>Botulismo</span>
					<input type="checkbox" name="Botulismo" value="Botulismo">	
					
					<span>Diabetes</span>
					<input type="checkbox" name="Diabetes" value="Diabetes"><br>	
					
					<span>Problemas cardiovasculares</span>
					<input type="checkbox" name="ProblemasCardiovasculares" value="Problemas cardiovasculares"><br>		
					
					<span>Otra:</span><input type="text" name="ProblemasSalud">		
			
				</td>
			
			</tr>
			
			<tr>
			
				<th colspan="3">Otros</th>
			
			</tr>
			
			<tr>
			
				<td colspan="2">
			
					<label>
						¿El alumno esta autorizado a retirarse por su cuenta de las instalaciones del plantel?:
					</label>
			
				</td>
			
				<td colspan="1">
			
					<span>Si</span><input type="radio" name="PuedeIrseSolo" value="Si" required="">
					<span>No</span><input type="radio" name="PuedeIrseSolo" value="No" required="">
			
				</td>
			
			</tr>
			
			<tr>
			
				<td rowspan="3">

					<label>En caso de emergencia y no poder contactar al representante, ponerse en contacto con:</label>

				</td>

				<td>

					<label>Nombre de la persona:</label>		

				</td>

				<td>

					<input type="text" name="ContactoAuxiliar" required="">		

				</td>

			</tr>

			<tr>

				<td>

					<label>Telefono de contacto de la persona:</label>

				</td>

				<td>

					<input type="tel" name="TelefonoAuxiliar" required="">

				</td>

			</tr>

			<tr>

				<td>

					<label>Relacion con la persona:</label>

				</td>

				<td>

					<input type="tel" name="RelacionAuxiliar" required="">

				</td>

			</tr>

			<tr>

				<th colspan="3">
					Datos escolares
				</td>

			</tr>

			<tr>

				<td>

					<label>Grado a cursar:</label>

				</td>
	
				<td colspan="2">
	
					<select name="Grado" required="">
						
						<optgroup label="Primaria">
	
							<option value="Primer Grado">Primer Grado</option>
							<option value="Segundo Grado">Segundo Grado</option>
							<option value="Tercer Grado">Tercer Grado</option>
							<option value="Cuarto Grado">Cuarto Grado</option>
							<option value="Quinto Grado">Quinto Grado</option>
							<option value="Sexto Grado">Sexto Grado</option>
	
						</optgroup>	
	
						<optgroup label="Secundaria">
	
							<option value="Primer año">Primer año</option>
							<option value="Segundo año">Segundo año</option>
							<option value="Tercer año">Tercer año</option>
							<option value="Cuarto año">Cuarto año</option>
							<option value="Quinto año">Quinto año</option>
	
						</optgroup>

					</select>
	
				</td>
	
			</tr>
	
			<tr>
	
				<td>
	
					<label>Tipo de inscripción</label>
	
				</td>
	
				<td colspan="2">
	
					<span>Regular</span>
					<input type="radio" name="TipoInscripcion" value="Regular" required="">
	
					<span>Nuevo Ingreso</span>
					<input type="radio" name="TipoInscripcion" value="Nuevo ingreso" required="">
	
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