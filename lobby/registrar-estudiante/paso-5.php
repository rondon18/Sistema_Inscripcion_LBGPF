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
				<div>
					<!--Datos del padre o la madre-->
					<h5>Datos del padre o la madre.</h5>

					<div>
						<!--Nombres del familiar-->
						<div>
							<label class="form-label">Nombres:</label>
							<div class="input-group">
								<input class="form-control mb-2" type="text" name="Primer_Nombre_Familiar" placeholder="Primer nombre">
								<input class="form-control mb-2" type="text" name="Segundo_Nombre_Familiar" placeholder="Segundo nombre">
							</div>

						</div>

						<!--Apellidos del familiar-->
						<div>
							<label class="form-label">Apellidos:</label>
							<div class="input-group">
								<input class="form-control mb-2" type="text" name="Primer_Apellido_Familiar" placeholder="Primer apellido">
								<input class="form-control mb-2" type="text" name="Segundo_Apellido_Familiar" placeholder="Segundo apellido">
							</div>
						</div>

						<!--Genero del familiar-->
						<div>
							<p class="form-label">Genero:</p>
							<div class="pt-2 px-2 pb-0 bg-light border rounded">
								<div class="form-check form-check-inline">
									<label class="form-label">F </label>
									<input class="form-check-input" type="radio" name="Genero_Familiar" value="F">
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">M </label>
									<input class="form-check-input" type="radio" name="Genero_Familiar" value="M">
								</div>
							</div>
						</div>
						<!--Cédula del familiar-->
						<div>
							<label class="form-label">Cédula:</label>
							<input class="form-control mb-2" type="text" name="Cédula_Familiar" placeholder="Cédula de identidad">
						</div>

						<!--Fecha de nacimiento del familiar-->
						<div>
							<label class="form-label">Fecha de nacimiento:</label>
							<input class="form-control mb-2" type="date" name="Fecha_Nacimiento_Familiar">
						</div>

						<!--Lugar de nacimiento del familiar-->
						<div>
							<label class="form-label">Lugar de nacimiento:</label>
							<input class="form-control mb-2" type="text" name="Lugar_Nacimiento_Familiar">
						</div>

						<!--Correo electrónico del familiar-->
						<div>
							<label class="form-label">Correo electrónico:</label>
							<input class="form-control" type="email" name="Correo_electrónico_Familiar">
						</div>

						<!--Teléfono del familiar-->
						<div>
							<label class="form-label">Teléfono:</label>
							<div class="input-group">
								<input class="form-control" type="tel" name="Teléfono_Principal_Familiar" placeholder="Principal">
								<input class="form-control" type="tel" name="Teléfono_Auxiliar_Familiar" placeholder="Secundario">
							</div>

						</div>

						<!--Estado civil del familiar-->
						<div>
							<label class="form-label">Estado civil:</label>
							<select class="form-select" name="Estado_Civil_Familiar">
								<option value="Soltero(a)">Soltero(a)</option>
								<option value="Casado(a)">Casado(a)</option>
								<option value="Divorsiado(a)">Divorsiado(a)</option>
								<option value="Viudo(a)">Viudo(a)</option>
							</select>
						</div>

						<!--Dirección de residencia del Familiar-->
						<div>
							<label class="form-label">Dirección de residencia:</label>
							<textarea class="form-control mb-2"name="Direccion_Familiar"></textarea>
						</div>

						<!--Se encuentra el familiar en el país-->
						<div>
							<span class="form-label">Se encuentra en el país:</span>

							<div class="input-group mb-2">
								<select class="form-select" name="Padece_Enfermedad" required>
									<option value="Si">Si</option>
									<option value="No">No</option>
								</select>
								<input class="form-control w-auto" type="text" name="Cual_Enfermedad" placeholder="¿Donde?">
							</div>


							<div class="form-check">
								<label class="form-label">Si </label>
								<input class="form-check-input" type="radio" name="Reside_En_El_País" value="Si">
							</div>
							<div class="form-check">
								<label class="form-label">No </label>
								<input class="form-check-input" type="radio" name="Reside_En_El_País" value="No">
							</div>
							<label class="form-label">¿Donde?:</label>
							<input class="form-control mb-2" type="text" name="País" value="<?php echo $_SESSION['País'] ?? NULL;?>">
						</div>
					</div>
				</div>

				<input type="hidden" name="Es_el_representante" value="Es_el_representante">
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
