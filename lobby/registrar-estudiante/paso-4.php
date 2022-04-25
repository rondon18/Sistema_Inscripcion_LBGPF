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
	<link rel="stylesheet" type="text/css" href="../../css/all.min.css"/>
</head>
<body>

		<form class="card" action="../../controladores/control-estudiantes.php" method="POST" style="max-width: 600px; margin: 74px auto;">

			<div class="card-header">
				<h4>Formulario de registro de estudiantes</h4>
			</div>
			<div class="card-body">
				<!--Datos de salud-->
				<h5><i class="fas fa-plus-square fa-xl"></i> Datos de salud.</h5>
				<div>
					<div>
						<label class="form-label">Datos antropométricos:</label>
						<div class="input-group mb-2">
							<input class="form-control mb-2" type="text" name="Indice" placeholder="Índice" required>
							<input class="form-control mb-2" type="text" name="Talla" placeholder="Talla" required>
							<input class="form-control mb-2" type="text" name="Peso" placeholder="Peso" required>
							<input class="form-control mb-2" type="text" name="C_Braquial" placeholder="C.brazo" required>
						</div>
					</div>
					<div>
						<label class="form-label">Tallas:</label>
						<div class="input-group mb-2">
							<input class="form-control mb-2" type="text" name="Talla_Pantalon" placeholder="Pantalón" required>
							<input class="form-control mb-2" type="text" name="Talla_Camisa" placeholder="Camisa" required>
							<input class="form-control mb-2" type="text" name="Talla_Zapatos" placeholder="Zapatos" required>
						</div>
					</div>
					<div>
						<span class="form-label">¿Padece alguna enfermedad?:</span>
						<div class="input-group mb-2">
							<select class="form-select" name="Padece_Enfermedad" required>
								<option value="Si">Si</option>
								<option value="No">No</option>
							</select>
							<input class="form-control w-auto" type="text" name="Cual_Enfermedad" placeholder="¿Cuál enfermedad?">
						</div>
					</div>
					<div>
						<label class="form-label">Alergias:</label>
						<input class="form-control mb-2" type="text" name="Alergias">
					</div>
					<div>
						<span class="form-label">Tipo de sangre:</span>
						<div class="input-group mb-2">
							<select class="form-select" name="Grupo_Sanguineo" required>
								<option value="O">O</option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="AB">AB</option>
							</select>
							<span class="input-group-text">Factor Rhesus:</span>
							<select class="form-select" name="Factor_Rhesus" required>
								<option value="+">+</option>
								<option value="-">-</option>
							</select>
						</div>
					</div>
					<div>
						<span class="form-label">Lateralidad:</span>
						<div class="pt-2 px-2 pb-0 bg-light border rounded">
							<div class="form-check form-check-inline">
								<label class="form-label">Ambidextro </label>
								<input class="form-check-input" type="radio" name="Lateralidad" value="Ambidextro" required>
							</div>
							<div class="form-check form-check-inline">
								<label class="form-label">Diestro </label>
								<input class="form-check-input" type="radio" name="Lateralidad" value="Diestro" required>
							</div>
							<div class="form-check form-check-inline">
								<label class="form-label">Zurdo </label>
								<input class="form-check-input" type="radio" name="Lateralidad" value="Zurdo" required>
							</div>
						</div>
					</div>
					<div>
						<span class="form-label">Condición de la dentadura:</span>
						<div class="pt-2 px-2 pb-0 bg-light border rounded">
							<div class="form-check form-check-inline">
								<label class="form-label">Buena </label>
								<input class="form-check-input" type="radio" name="Condicion_Dentadura" value="Buena" required>
							</div>
							<div class="form-check form-check-inline">
								<label class="form-label">Regular </label>
								<input class="form-check-input" type="radio" name="Condicion_Dentadura" value="Regular" required>
							</div>
							<div class="form-check form-check-inline">
								<label class="form-label">Mala </label>
								<input class="form-check-input" type="radio" name="Condicion_Dentadura" value="Mala" required>
							</div>
						</div>
					</div>
					<div>
							<span class="form-label">Condición oftalmológicas:</span>
							<div class="pt-2 px-2 pb-0 bg-light border rounded">
								<div class="form-check form-check-inline">
									<label class="form-label">Buena </label>
									<input class="form-check-input" type="radio" name="Condicion_Vista" value="Buena" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Regular </label>
									<input class="form-check-input" type="radio" name="Condicion_Vista" value="Regular" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Mala </label>
									<input class="form-check-input" type="radio" name="Condicion_Vista" value="Mala" required>
								</div>
							</div>
					</div>
					<div>
						<span class="form-label">Presenta alguna de estas condiciones:</span>
						<div class="pt-2 px-2 pb-0 bg-light border rounded">
							<div class="form-check form-check-inline">
								<label class="form-label">Visual </label>
								<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Visual">
							</div>
							<div class="form-check form-check-inline">
								<label class="form-label">Motora </label>
								<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Motora">
							</div>
							<div class="form-check form-check-inline">
								<label class="form-label">Auditiva </label>
								<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Auditiva">
							</div>
							<div class="form-check form-check-inline">
								<label class="form-label">Escritura </label>
								<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Escritura">
							</div>
							<div class="form-check form-check-inline">
								<label class="form-label">Lectura </label>
								<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Lectura">
							</div>
							<div class="form-check form-check-inline">
								<label class="form-label">Embarazo </label>
								<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Embarazo">
							</div>
						</div>
					</div>
					<div>
						<span class="form-label">Es atendido por otra institución:</span>
						<div class="input-group mb-2">
							<select class="form-select" name="Recibe_Atención_Inst">
								<option value="Si">Si</option>
								<option value="No">No</option>
							</select>
							<input class="form-control w-auto" type="text" name="Institucion_Medica" placeholder="¿Cuál institución?">
						</div>
					</div>
					<div>
						<span class="form-label">¿Recibe alguna medicacion especial?:</span>
						<div class="input-group mb-2">
							<select class="form-select" name="Recibe_Medicacion" required>
								<option value="Si">Si</option>
								<option value="No">No</option>
							</select>
							<input class="form-control w-auto" type="text" name="Medicacion" placeholder="¿Cuál medicación?">
						</div>
					</div>
					<div>
						<span class="form-label">¿Tiene alguna dieta especial?:</span>
						<div class="input-group mb-2">
							<select class="form-select" name="Tiene_Dieta_Especial">
								<option value="Si">Si</option>
								<option value="No">No</option>
							</select>
							<input class="form-control w-auto" type="text" name="Dieta_Especial" placeholder="¿Qué dieta?">
						</div>
					</div>
					<div>
						<span class="form-label">Posee carnet de discapacidad:</span>
						<div class="input-group mb-2">
							<select class="form-select" name="Tiene_Carnet_Discapacidad">
								<option value="Si">Si</option>
								<option value="No">No</option>
							</select>
							<input class="form-control w-auto" type="text" name="Nro_Carnet_Discapacidad" placeholder="Nro. de carnet">
						</div>
					</div>
				</div>
			</div>
			<!--Botón para guardar-->
			<div class="card-footer">
				<input type="hidden" name="orden" value="Insertar">
				<a href="" class="btn btn-sm btn-primary"><i class="fas fa-home fa-lg"></i> Volver al menú</a>
				<a href="" class="btn btn-sm btn-primary"><i class="fas fa-arrow-alt-circle-left fa-lg"></i> Volver al paso anterior</a>
				<button class="btn btn-sm btn-primary" type="submit"><i class="fas fa-save fa-lg"></i> Guardar y continuar</button>
			</div>
		</form>

</body>
</html>
