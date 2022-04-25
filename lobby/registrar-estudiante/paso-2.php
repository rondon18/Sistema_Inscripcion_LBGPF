<?php

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

if (isset($_POST['Vinculo']) and !empty($_POST['Vinculo'])) {
	if ($_POST['Vinculo'] == "Madre" OR "Padre") {
		$Es_el_representante = False;
	}
	elseif ($_POST['Vinculo'] == "Representante") {
		$Es_el_representante = True;
	}
}
else {
	header('Location: paso-1.php');
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
				<h5>Datos personales.</h5>
				<div>
					<div>
						<label class="form-label">Nombres:</label>
						<div class="input-group">
							<input class="form-control mb-2" type="text" name="Primer_Nombre_Est" placeholder="Primer nombre"  required>
							<input class="form-control mb-2" type="text" name="Segundo_Nombre_Est" placeholder="Segundo nombre"  required>
						</div>
					</div>
					<div>
						<label class="form-label">Apellidos:</label>
						<div class="input-group">
							<input class="form-control mb-2" type="text" name="Primer_Apellido_Est" placeholder="Primer apellido">
							<input class="form-control mb-2" type="text" name="Segundo_Apellido_Est" placeholder="Segundo apellido">
						</div>
					</div>
					<div>
						<label class="form-label">Cédula:</label>
						<input class="form-control mb-2" type="text" name="Cedula_Est" placeholder="Cédula de identidad">
					</div>
					<div>
						<p class="form-label">Género:</p>
						<div class="pt-2 px-2 pb-0 bg-light border rounded mb-1">
							<div class="form-check form-check-inline">
								<input class="form-check-input" class="form-check-input" type="radio" name="Genero_Est" value="F" required>
								<label class="form-label">F</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" class="form-check-input" type="radio" name="Genero_Est" value="M" required>
								<label class="form-label">M</label>
							</div>
						</div>
					</div>
					<div>
						<label class="form-label">Fecha de nacimiento:</label>
						<input class="form-control mb-2" type="date" name="Fecha_Nacimiento_Est" >
					</div>
					<div>
						<label class="form-label">Lugar de nacimiento:</label>
						<input class="form-control mb-2" type="text" name="Lugar_Nacimiento_Est" >
					</div>
					<div>
						<label class="form-label">Correo electrónico:</label>
						<input class="form-control mb-2" type="text" name="Correo_electrónico_Est" >
					</div>
					<div>
						<div>
							<datalist id="prefijos">
								<!--Moviles-->
								<option value="0416">
								<option value="0426">
								<option value="0414">
								<option value="0412">
							</datalist>

							<label>Teléfonos:</label>

							<!--Teléfono principal-->
							<div class="input-group mb-2">
								<!--Prefijo-->
								<input class="form-control" type="text" name="Prefijo_Principal_Est" list="prefijos" pattern="[0,9]+" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos" required>
								<!--Número-->
								<input class="form-control w-auto" type="tel" name="Teléfono_Principal_Est" placeholder="Teléfono principal" pattern="[0,9]+" required>
							</div>

							<!--Teléfono secundario-->
							<div class="input-group mb-2">
								<!--Prefijo-->
								<input class="form-control" type="text" name="Prefijo_Secundario_Est" list="prefijos" pattern="[0,9]+" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos" required>
								<!--Número-->
								<input class="form-control w-auto" type="tel" name="Teléfono_Secundario_Est" placeholder="Teléfono secundario" pattern="[0,9]+" required>
							</div>
						</div>
						<div class="input-group">
							<input class="form-control mb-2" type="tel" name="Teléfono_Principal_Est" placeholder="Movil">
							<input class="form-control mb-2" type="tel" name="Teléfono_Auxiliar_Est" placeholder="Fijo">
						</div>
					</div>
					<div>
						<label class="form-label">Grado a cursar:</label>
						<select class="form-select mb-2" name="Grado_A_Cursar" >
							<option value="Primer año">Primer año</option>
							<option value="Segundo año">Segundo año</option>
							<option value="Tercer año">Tercer año</option>
							<option value="Cuarto año">Cuarto año</option>
							<option value="Quinto año">Quinto año</option>
						</select>
					</div>

					<div>
						<p class="form-label">¿El estudiante es repitente?:</p>
						<div class="input-group mb-2">
							<select class="form-select" name="Estudiante_Repitente" required>
								<option value="Si">Si</option>
								<option value="No">No</option>
							</select>
							<input class="form-control w-auto" type="text" name="Año_Repitente" list="grados" placeholder="¿Qué año repite?">
							<datalist id="grados">
							  <option value="Primer año"></option>
							  <option value="Segundo año"></option>
							  <option value="Tercer año"></option>
							  <option value="Cuarto año"></option>
							  <option value="Quinto año"></option>
							</datalist>
						</div>
					</div>
					<div>
						<p class="form-label">¿Tiene materias pendientes?</p>
						<div class="input-group mb-2">
							<select class="form-select" name="Tiene_Materias_Pendientes" required>
								<option value="Si">Si</option>
								<option value="No">No</option>
							</select>
							<input class="form-control w-auto" type="text" name="Materias_Pendientes" list="grados" placeholder="¿Cuáles?">
						</div>
					</div>
					<div>
						<label class="form-label">Plantel de procedencia:</label>
						<textarea class="form-control mb-2"name="Plantel_Procedencia"></textarea>
					</div>
				</div>
			</div>
			<!--Botón para guardar-->
			<div class="card-footer">
				<input type="hidden" name="orden" value="Insertar">
				<button class="btn btn-primary" type="submit">Registrar estudiante</button>
			</div>
		</form>
</body>
</html>
