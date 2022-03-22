<?php 
session_start();

if (isset($_POST['Paso_2'])) {
	$_SESSION['Primer_Nombre_Familiar'] = $_POST["Primer_Nombre_Familiar"];
	$_SESSION['Segundo_Nombre_Familiar'] = $_POST["Segundo_Nombre_Familiar"];
	$_SESSION['Primer_Apellido_Familiar'] = $_POST["Primer_Apellido_Familiar"];
	$_SESSION['Segundo_Apellido_Familiar'] = $_POST["Segundo_Apellido_Familiar"];
	$_SESSION['Genero_Familiar'] = $_POST["Genero_Familiar"];
	$_SESSION['Vinculo_Familiar'] = $_POST["Vinculo_Familiar"];
	$_SESSION['Cédula_Familiar'] = $_POST["Cédula_Familiar"];
	$_SESSION['Fecha_Nacimiento_Familiar'] = $_POST["Fecha_Nacimiento_Familiar"];
	$_SESSION['Lugar_Nacimiento_Familiar'] = $_POST["Lugar_Nacimiento_Familiar"];
	$_SESSION['Correo_electrónico_Familiar'] = $_POST["Correo_electrónico_Familiar"];
	$_SESSION['Teléfono_Principal_Familiar'] = $_POST["Teléfono_Principal_Familiar"];
	$_SESSION['Estado_Civil_Familiar'] = $_POST["Estado_Civil_Familiar"];
	$_SESSION['Direccion_Familiar'] = $_POST["Direccion_Familiar"];
	$_SESSION['Cédula_Familiar'] = $_POST["Cédula_Familiar"];
	$_SESSION['Fecha_Nacimiento_Familiar'] = $_POST["Fecha_Nacimiento_Familiar"];
	$_SESSION['Lugar_Nacimiento_Familiar'] = $_POST["Lugar_Nacimiento_Familiar"];
	$_SESSION['Correo_electrónico_Familiar'] = $_POST["Correo_electrónico_Familiar"];
	$_SESSION['Teléfono_Principal_Familiar'] = $_POST["Teléfono_Principal_Familiar"];
	$_SESSION['Teléfono_Auxiliar_Familiar'] = $_POST["Teléfono_Auxiliar_Familiar"];
	$_SESSION['Estado_Civil_Familiar'] = $_POST["Estado_Civil_Familiar"];
	$_SESSION['Direccion_Familiar'] = $_POST["Direccion_Familiar"];
	$_SESSION['Reside_En_El_País'] = $_POST["Reside_En_El_País"];
	$_SESSION['País'] = $_POST["País"];

	$_SESSION['Paso_2'] = $_POST['Paso_2'];

	header('Location: paso-3.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro - Datos del padre o la madre</title>
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
	<form action="paso-2.php" method="POST" style="max-width: 600px; margin:auto;">
		<div>
			<div>
				<!--Datos del padre o la madre-->
				<h1>Datos del padre o la madre.</h1>

				<div>
					<!--Nombres del familiar-->
					<div>
						<label>Nombres:</label><br>
						<input type="text" name="Primer_Nombre_Familiar" placeholder="Primer nombre" value="<?php echo $_SESSION['Primer_Nombre_Familiar'] ?? NULL;?>">
						<input type="text" name="Segundo_Nombre_Familiar" placeholder="Segundo nombre" value="<?php echo $_SESSION['Segundo_Nombre_Familiar'] ?? NULL;?>">
					</div>

					<!--Apellidos del familiar-->
					<div>
						<label>Apellidos:</label><br>
						<input type="text" name="Primer_Apellido_Familiar" placeholder="Primer apellido" value="<?php echo $_SESSION['Primer_Apellido_Familiar'] ?? NULL;?>">
						<input type="text" name="Segundo_Apellido_Familiar" placeholder="Segundo apellido" value="<?php echo $_SESSION['Segundo_Apellido_Familiar'] ?? NULL;?>">
					</div>

					<!--Genero del familiar-->
					<div>
								
							<p>Genero:</p>
							
							<label>F </label>
							<input type="radio" name="Genero_Familiar" value="F" <?php if(isset($_SESSION['Genero_Familiar']) and $_SESSION['Genero_Familiar'] == "F"){ echo "checked";} ?>>

							<label>M </label>
							<input type="radio" name="Genero_Familiar" value="M" <?php if(isset($_SESSION['Genero_Familiar']) and $_SESSION['Genero_Familiar'] == "M"){ echo "checked";} ?>>

					</div>

					<!--Vinculo con el estudiante del familiar-->
					<div>
						<span>Vinculo con el estudiante:</span>
						<div>
							<label>Madre </label>
							<input type="radio" name="Vinculo_Familiar" value="Madre" <?php if(isset($_SESSION['Vinculo_Familiar']) and $_SESSION['Vinculo_Familiar'] == "Madre"){ echo "checked";}?>>
							<label>Padre </label>
							<input type="radio" name="Vinculo_Familiar" value="Padre" <?php if(isset($_SESSION['Vinculo_Familiar']) and $_SESSION['Vinculo_Familiar'] == "Padre"){ echo "checked";}?>>
						</div>
					</div>

					<!--Cédula del familiar-->
					<div>
						<label>Cédula:</label><br>
						<input type="text" name="Cédula_Familiar" placeholder="Cédula de identidad" value="<?php echo $_SESSION['Cédula_Familiar'] ?? NULL;?>">
					</div>

					<!--Fecha de nacimiento del familiar-->
					<div>
						<label>Fecha de nacimiento:</label><br>
						<input type="date" name="Fecha_Nacimiento_Familiar" value="<?php echo $_SESSION['Fecha_Nacimiento_Familiar'] ?? NULL;?>">
					</div>

					<!--Lugar de nacimiento del familiar-->
					<div>
						<label>Lugar de nacimiento:</label><br>
						<input type="text" name="Lugar_Nacimiento_Familiar" value="<?php echo $_SESSION['Lugar_Nacimiento_Familiar'] ?? NULL;?>">
					</div>

					<!--Correo electrónico del familiar-->
					<div>
						<label>Correo electrónico:</label><br>
						<input type="email" name="Correo_electrónico_Familiar" value="<?php echo $_SESSION['Correo_electrónico_Familiar'] ?? NULL;?>">
					</div>

					<!--Teléfono del familiar-->
					<div>
						<label>Teléfono:</label><br>
						<input type="tel" name="Teléfono_Principal_Familiar" placeholder="Movil" value="<?php echo $_SESSION['Teléfono_Principal_Familiar'] ?? NULL;?>">
						<input type="tel" name="Teléfono_Auxiliar_Familiar" placeholder="Fijo" value="<?php echo $_SESSION['Teléfono_Auxiliar_Familiar'] ?? NULL;?>">
					</div>

					<!--Estado civil del familiar-->
					<div>
						<label>Estado civil:</label><br>
						<select name="Estado_Civil_Familiar">
							<option value="Soltero(a)" <?php if(isset($_SESSION['Estado_Civil_Familiar']) and $_SESSION['Estado_Civil_Familiar'] == "Soltero(a)"){ echo "selected";} ?>>Soltero(a)</option>
							<option value="Casado(a)" <?php if(isset($_SESSION['Estado_Civil_Familiar']) and $_SESSION['Estado_Civil_Familiar'] == "Soltero(a)"){ echo "selected";} ?>>Casado(a)</option>
							<option value="Divorsiado(a)" <?php if(isset($_SESSION['Estado_Civil_Familiar']) and $_SESSION['Estado_Civil_Familiar'] == "Soltero(a)"){ echo "selected";} ?>>Divorsiado(a)</option>
							<option value="Viudo(a)" <?php if(isset($_SESSION['Estado_Civil_Familiar']) and $_SESSION['Estado_Civil_Familiar'] == "Soltero(a)"){ echo "selected";} ?>>Viudo(a)</option>
						</select>
					</div>
					
					<!--Dirección de residencia del Familiar-->
					<div>
						<label>Dirección de residencia:</label><br>
						<textarea name="Direccion_Familiar"><?php echo $_SESSION['Direccion_Familiar'] ?? NULL;?></textarea>
					</div>
					
					<!--Se encuentra el familiar en el país-->
					<div>
						<span>Se encuentra en el país:</span>

						<div>
							<label>Si </label>
							<input type="radio" name="Reside_En_El_País" value="Si" <?php if(isset($_SESSION['Reside_En_El_País']) and $_SESSION['Reside_En_El_País'] == "Si"){ echo "checked";}?>>
							<label>No </label>
							<input type="radio" name="Reside_En_El_País" value="No" <?php if(isset($_SESSION['Reside_En_El_País']) and $_SESSION['Reside_En_El_País'] == "No"){ echo "checked";}?>>
						</div>

						<input type="text" name="País" placeholder="¿Donde?" value="<?php echo $_SESSION['País'] ?? NULL;?>">
					</div>

					<input type="hidden" name="Paso_2" value="Paso_2">

					<a href="../index.php">Volver al inicio</a>
					<a href="paso-1.php">Volver al paso anterior</a>
					<input type="submit" value="Guardar y continuar">
				</div>
			</div>
		</div>
	</form>
</body>
</html>