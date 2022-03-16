<?php 
session_start();

if (isset($_POST['Paso_3'])) {
	$_SESSION['Representante_Trabaja'] = $_POST["Representante_Trabaja"];
	$_SESSION['Grado_Instrucción'] = $_POST["Grado_Instrucción"];
	if ($_SESSION['Representante_Trabaja'] == "No") {
		$_SESSION['Telefono_Trabajo_Representante'] =  NULL;
		$_SESSION['Cargo_Representante'] = $_POST["Cargo_Representante"];
		$_SESSION['Lugar_Trabajo_Representante'] =  NULL;
		$_SESSION['Remuneración'] =  NULL;
		$_SESSION['Tipo_Remuneracion'] = NULL;
	}
	elseif ($_SESSION['Representante_Trabaja'] == "Si") {
		$_SESSION['Telefono_Trabajo_Representante'] = $_POST["Telefono_Trabajo_Representante"];
		$_SESSION['Cargo_Representante'] = $_POST["Cargo_Representante"];
		$_SESSION['Lugar_Trabajo_Representante'] = $_POST["Lugar_Trabajo_Representante"];
		$_SESSION['Remuneración'] = $_POST["Remuneración"];
		$_SESSION['Tipo_Remuneracion'] = $_POST["Tipo_Remuneracion"];
	}
	

	$_SESSION['Paso_3'] = $_POST['Paso_3'];

	header('Location: paso-4.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro - Datos economicos</title>
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
	<form action="paso-3.php" method="POST" style="max-width: 600px; margin:auto;">
		<div>
			<div>
				<!--Datos Económicos-->
				<h1>Datos económicos.</h1>

				<div>
					<!--Grado de instruccion del representante-->
					<div>
						<span>Grado de instrucción:</span>
						<div>
							<label>Primaria </label>
							<input type="radio" name="Grado_Instrucción" value="Primaria" required <?php if(isset($_SESSION['Grado_Instrucción']) and $_SESSION['Grado_Instrucción'] == "Primaria"){ echo "checked";}?>>
							<label>Bachillerato </label>
							<input type="radio" name="Grado_Instrucción" value="Bachillerato" required <?php if(isset($_SESSION['Grado_Instrucción']) and $_SESSION['Grado_Instrucción'] == "Bachillerato"){ echo "checked";}?>>
							<label>Universitario </label>
							<input type="radio" name="Grado_Instrucción" value="Universitario" required <?php if(isset($_SESSION['Grado_Instrucción']) and $_SESSION['Grado_Instrucción'] == "Universitario"){ echo "checked";}?>>
						</div>
					</div>
					
					<!--Trabaja el representante-->
					<div>
						<span>Trabaja:</span>
						<div>
							<label>Si </label>
							<input type="radio" name="Representante_Trabaja" value="Si" required <?php if(isset($_SESSION['Representante_Trabaja']) and $_SESSION['Representante_Trabaja'] == "Si"){ echo "checked";}?>>
							<label>No </label>
							<input type="radio" name="Representante_Trabaja" value="No" required <?php if(isset($_SESSION['Representante_Trabaja']) and $_SESSION['Representante_Trabaja'] == "No"){ echo "checked";}?>>
						</div>
					</div>

					<!--Telefono del trabajo de representante-->
					<div>
						<label>Teléfono del trabajo:</label><br>
						<input type="tel" name="Telefono_Trabajo_Representante" placeholder="Movil" value="<?php echo $_SESSION['Telefono_Trabajo_Representante'] ?? NULL;?>">
					</div>

					<!--Cargo que ocupa el representante-->
					<div>
						<label>Cargo que ocupa:</label><br>
						<input type="text" name="Cargo_Representante" value="<?php echo $_SESSION['Cargo_Representante'] ?? NULL;?>">
					</div>

					<!--Lugar en el que trabaja el representante-->
					<div>
						<label>Lugar del trabajo:</label><br>
						<textarea name="Lugar_Trabajo_Representante"><?php echo $_SESSION['Lugar_Trabajo_Representante'] ?? NULL;?></textarea>
					</div>

					<!--Remuneración del representante-->
					<div>
						<label>Remuneración:</label><br>
						<small>Monto aproximado</small><br>
						<input type="number" name="Remuneración" placeholder="Ingrese un numero" min="0" value="<?php echo $_SESSION['Remuneración'] ?? NULL;?>"><span> BsD</span>
					</div>

					<!--Tipo de remuneracion del representante-->
					<div>
						<span>Tipo de remuneración:</span>
						<select name="Tipo_Remuneracion">
							<option value="Diaria" <?php if(isset($_SESSION['Tipo_Remuneracion']) and $_SESSION['Tipo_Remuneracion'] == "Diaria"){ echo "selected";} ?>>Diaria</option>
							<option value="Semanal" <?php if(isset($_SESSION['Tipo_Remuneracion']) and $_SESSION['Tipo_Remuneracion'] == "Semanal"){ echo "selected";} ?>>Semanal</option>
							<option value="Quincenal" <?php if(isset($_SESSION['Tipo_Remuneracion']) and $_SESSION['Tipo_Remuneracion'] == "Quincenal"){ echo "selected";} ?>>Quincenal</option>
							<option value="Mensual" <?php if(isset($_SESSION['Tipo_Remuneracion']) and $_SESSION['Tipo_Remuneracion'] == "Mensual"){ echo "selected";} ?>>Mensual</option>
						</select>
					</div>
					<input type="hidden" name="Paso_3" value="Paso_3">

					<a href="../index.php">Volver al inicio</a>
					<a href="paso-2.php">Volver al paso anterior</a>
					<input type="submit" value="Guardar y continuar">
				</div>
			</div>
		</div>
	</form>
</body>
</html>