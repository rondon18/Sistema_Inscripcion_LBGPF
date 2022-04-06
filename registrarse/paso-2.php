<?php 
session_start();

if (isset($_POST['Paso_2'])) {
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
	

	$_SESSION['Paso_2'] = $_POST['Paso_2'];

	header('Location: paso-3.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro - Datos economicos</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/colores.css"/>
</head>
<body>
	<form action="paso-2.php" method="POST" style="max-width: 600px; margin: 74px auto;">
		<div class="card">
			<!--Datos Económicos-->
			<div class="card-header">
				<h1>Datos económicos.</h1>
			</div>
			<div class="card-body">
				<div>
					<!--Grado de instruccion del representante-->
					<div>
						<p class="form-label">Grado de instrucción:</p>
						<div class="form-check">
							<label>Primaria </label>
							<input class="form-check-input" type="radio" name="Grado_Instrucción" value="Primaria" required <?php if(isset($_SESSION['Grado_Instrucción']) and $_SESSION['Grado_Instrucción'] == "Primaria"){ echo "checked";}?>>
						</div>
						<div class="form-check">
							<label>Bachillerato </label>
							<input class="form-check-input" type="radio" name="Grado_Instrucción" value="Bachillerato" required <?php if(isset($_SESSION['Grado_Instrucción']) and $_SESSION['Grado_Instrucción'] == "Bachillerato"){ echo "checked";}?>>
						</div>
						<div class="form-check">
							<label>Universitario </label>
							<input class="form-check-input" type="radio" name="Grado_Instrucción" value="Universitario" required <?php if(isset($_SESSION['Grado_Instrucción']) and $_SESSION['Grado_Instrucción'] == "Universitario"){ echo "checked";}?>>
						</div>
					</div>
					
					<!--Trabaja el representante-->
					<div>
						<p class="form-label">Trabaja:</p>
						<div class="form-check">
							<label>Si </label>
							<input class="form-check-input" type="radio" name="Representante_Trabaja" value="Si" required <?php if(isset($_SESSION['Representante_Trabaja']) and $_SESSION['Representante_Trabaja'] == "Si"){ echo "checked";}?>>
						</div>
						<div class="form-check">
							<label>No </label>
							<input class="form-check-input" type="radio" name="Representante_Trabaja" value="No" required <?php if(isset($_SESSION['Representante_Trabaja']) and $_SESSION['Representante_Trabaja'] == "No"){ echo "checked";}?>>
						</div>
					</div>

					<!--Cargo que ocupa el representante-->
					<div>
						<label class="form-label">Cargo que ocupa:</label>
						<input class="form-control" type="text" name="Cargo_Representante" value="<?php echo $_SESSION['Cargo_Representante'] ?? NULL;?>">
					</div>

					<!--Telefono del trabajo de representante-->
					<div>
						<label class="form-label">Teléfono del trabajo:</label>
						<input class="form-control" type="tel" name="Telefono_Trabajo_Representante" value="<?php echo $_SESSION['Telefono_Trabajo_Representante'] ?? NULL;?>">
					</div>

					<!--Lugar en el que trabaja el representante-->
					<div>
						<label class="form-label">Lugar del trabajo:</label>
						<textarea class="form-control" name="Lugar_Trabajo_Representante"><?php echo $_SESSION['Lugar_Trabajo_Representante'] ?? NULL;?></textarea>
					</div>

					<!--Remuneración del representante-->
					<div>
						<label class="form-label">Remuneración:</label>
						<div class="input-group">
							<input class="form-control text-end" type="number" name="Remuneración" placeholder="Ingrese un numero..." min="0" value="<?php echo $_SESSION['Remuneración'] ?? NULL;?>">
							
							<span class="input-group-text">BsD.</span>

							<!--Tipo de remuneracion del representante-->
							<select class="form-select" name="Tipo_Remuneracion">
								<option value="Diaria" <?php if(isset($_SESSION['Tipo_Remuneracion']) and $_SESSION['Tipo_Remuneracion'] == "Diaria"){ echo "selected";} ?>>Remuneración diaria</option>
								<option value="Semanal" <?php if(isset($_SESSION['Tipo_Remuneracion']) and $_SESSION['Tipo_Remuneracion'] == "Semanal"){ echo "selected";} ?>>Remuneración semanal</option>
								<option value="Quincenal" <?php if(isset($_SESSION['Tipo_Remuneracion']) and $_SESSION['Tipo_Remuneracion'] == "Quincenal"){ echo "selected";} ?>>Remuneración quincenal</option>
								<option value="Mensual" <?php if(isset($_SESSION['Tipo_Remuneracion']) and $_SESSION['Tipo_Remuneracion'] == "Mensual"){ echo "selected";} ?>>Remuneración mensual</option>
							</select>
						</div>
						<small class="form-text">Monto aproximado</small>
					</div>
				</div>
			</div>
			<div class="card-footer text-center">
				<input type="hidden" name="Paso_2" value="Paso_2">

				<a class="btn btn-primary" href="../index.php">Volver al inicio</a>
				<a class="btn btn-primary" href="paso-2.php">Volver al paso anterior</a>
				<input class="btn btn-primary" type="submit" value="Guardar y continuar">
			</div>
		</div>
	</form>
</body>
</html>