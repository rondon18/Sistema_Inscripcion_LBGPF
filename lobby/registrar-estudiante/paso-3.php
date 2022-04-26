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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registrar nuevo estudiante</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/colores.css"/>
</head>
<body>

		<form class="card" action="../../controladores/control-estudiantes.php" method="POST" style="max-width: 600px; margin: 74px auto;">

			<div class="card-header">
				<h4>Formulario de registro de estudiantes</h4>
			</div>

			<div class="card-body">
				<!--Datos sociales-->
				<h5>Datos sociales.</h5>
				<div>
					<!--Dirección de residencia-->
					<div>
						<label class="form-label">Dirección de residencia:</label>
						<textarea class="form-control mb-2" name="Direccion_Estudiante"></textarea>
					</div>
					<div>
						<label class="form-label">¿Con quién vive?:</label>
						<input class="form-control mb-2" type="text" name="Con_Quien_Vive">
					</div>
					<div>
						<span class="form-label">¿Tiene canaima?</span>

						<div class="pt-2 px-2 pb-0 bg-light border rounded mb-2">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="Tiene_Canaima" value="Si" required>
								<label class="form-label">Si </label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="Tiene_Canaima" value="No" required>
								<label class="form-label">No </label>
							</div>
						</div>
						<div>
							<label class="form-label">¿En que condiciones?</label>
							<select class="form-select mb-2" name="Condiciones_Canaima" >
								<option value="Muy buenas condiciones">Muy buenas condiciones</option>
								<option value="Buenas condiciones">Buenas condiciones</option>
								<option value="Malas condiciones">Malas condiciones</option>
								<option value="Muy malas condiciones">Muy malas condiciones</option>
							</select>
						</div>
					</div>
					<!--Carnet de la patria-->
					<div>
						<span class="form-label">Carnet de la patria:</span>
						<div class="input-group mb-2">
							<select class="form-select w-auto" name="Tiene_Carnet_Patria">
								<option value="Si">Si tiene</option>
								<option value="No">No tiene</option>
							</select>
							<input class="form-control w-auto" type="text" name="Codigo_Carnet_Patria" placeholder="Código">
							<input class="form-control w-auto" type="text" name="Serial_Carnet_Patria" placeholder="Serial">
						</div>
					</div>
					<!--Conexión a internet-->
					<div>
						<span class="form-label">Cuenta con conexión a internet en su vivienda:</span>
						<div class="pt-2 px-2 pb-0 bg-light border rounded mb-2">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="Internet_Vivienda" value="Si" required>
								<label class="form-label">Si </label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="Internet_Vivienda" value="No" required>
								<label class="form-label">No </label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--Botón para guardar-->
			<div class="card-footer">
				<a href="" class="btn btn-sm btn-primary"><i class="fas fa-home fa-lg"></i> Volver al menú</a>
				<a href="" class="btn btn-sm btn-primary"><i class="fas fa-arrow-alt-circle-left fa-lg"></i> Volver al paso anterior</a>
				<button class="btn btn-sm btn-primary" type="submit"><i class="fas fa-save fa-lg"></i> Guardar y continuar</button>
			</div>
		</form>

</body>
</html>
