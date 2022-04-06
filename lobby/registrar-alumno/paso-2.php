<?php 

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

if (isset($_POST['Es_el_representante']) and !empty($_POST['Es_el_representante'])) {
	if ($_POST['Es_el_representante'] == "Si") {
		$Es_el_representante = True;
	}
	elseif ($_POST['Es_el_representante'] == "No") {
		$Es_el_representante = False;
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
	<title>Registrar nuevo alumno</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/colores.css"/>
</head>
<body>

		<form class="card" action="../../controladores/control-alumnos.php" method="POST" style="max-width: 600px; margin: 74px auto;">

			<div class="card-header">
				<h4>Formulario de registro de alumnos</h4>
			</div>

			<div class="card-body">

				<h5>Datos personales.</h5>

				<div>
					<div>
						<label class="form-label">Nombres:</label>
						<div class="input-group">
							<input class="form-control mb-2" type="text" name="Primer_Nombre_Alumno" placeholder="Primer nombre"  required>
							<input class="form-control mb-2" type="text" name="Segundo_Nombre_Alumno" placeholder="Segundo nombre"  required>
						</div>	
					</div>
					<div>
						<label class="form-label">Apellidos:</label>
						<div class="input-group">
							<input class="form-control mb-2" type="text" name="Primer_Apellido_Alumno" placeholder="Primer apellido">
							<input class="form-control mb-2" type="text" name="Segundo_Apellido_Alumno" placeholder="Segundo apellido">
						</div>
					</div>					
					<div>
						<label class="form-label">Cédula:</label>
						<input class="form-control mb-2" type="text" name="Cedula_Alumno" placeholder="Cédula de identidad">
					</div>
					<div>
						<span class="form-label">Genero:</span>
						<div class="form-check">
							<input  class="form-check-input" class="form-check-input" type="radio" name="Genero_Alumno" value="F" required>
							<label class="form-label">F</label>
						</div>
						<div class="form-check">
							
							<input  class="form-check-input" class="form-check-input" type="radio" name="Genero_Alumno" value="M" required>
							<label class="form-label">M</label>
						</div>
					</div>
					<div>
						<label class="form-label">Fecha de nacimiento:</label>
						<input class="form-control mb-2" type="date" name="Fecha_Nacimiento_Alumno" >
					</div>
					<div>
						<label class="form-label">Lugar de nacimiento:</label>
						<input class="form-control mb-2" type="text" name="Lugar_Nacimiento_Alumno" >
					</div>
					<div>
						<label class="form-label">Correo electrónico:</label>
						<input class="form-control mb-2" type="text" name="Correo_electrónico_Alumno" >
					</div>
					<div>
						<label class="form-label">Teléfono:</label>
						<div class="input-group">
							<input class="form-control mb-2" type="tel" name="Teléfono_Principal_Alumno" placeholder="Movil">
							<input class="form-control mb-2" type="tel" name="Teléfono_Auxiliar_Alumno" placeholder="Fijo">
						</div>
					</div>
					<div>
						<label class="form-label">Grado a cursar:</label>
						<select class="form-select" name="Grado_A_Cursar" >
							<option value="Primer año">Primer año</option>
							<option value="Segundo año">Segundo año</option>
							<option value="Tercer año">Tercer año</option>
							<option value="Cuarto año">Cuarto año</option>
							<option value="Quinto año">Quinto año</option>
						</select>
					</div>
					<div>
						<span class="form-label">¿El estudiante es repitente?:</span>

						<div>
							<div class="form-check">
								<label class="form-label">Si </label>
								<input class="form-check-input" type="radio" name="ALumno_Repitente" value="Si" required>
							</div>
							<div class="form-check">
								<label class="form-label">No </label>
								<input class="form-check-input" type="radio" name="ALumno_Repitente" value="No" required>
							</div>

							<span class="form-label">¿Qué año repite?</span>
							<input class="form-control mb-2" type="text" name="Año_Repitente" list="grados">
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
						<span class="form-label">¿Tiene materias pendientes?</span>

						<div class="form-check">
							<label class="form-label">Si </label>
							<input class="form-check-input" type="radio" name="Tiene_Materias_Pendientes" value="Si" required>
						</div>
						<div class="form-check">
							<label class="form-label">No </label>
							<input class="form-check-input" type="radio" name="Tiene_Materias_Pendientes" value="No" required>
						</div>
						<span class="form-label">¿Cuales?</span>
						<input class="form-control mb-2" type="text" name="Materias_Pendientes">
					</div>
					<div>
						<label class="form-label">Plantel de procedencia:</label>
						<textarea class="form-control mb-2"name="Plantel_Procedencia"></textarea>
					</div>

				</div>

				<!--Datos sociales-->
				<h5>Datos sociales.</h5>
				
				<div>
					<!--Dirección de residencia-->
					<div>
						<label class="form-label">Dirección de residencia:</label>
						<textarea class="form-control mb-2"name="Direccion_Alumno"></textarea>
					</div>
					<div>
						<span class="form-label">¿Tiene canaima?</span>

						<div>
							<div class="form-check">
								<label class="form-label">Si </label>
								<input class="form-check-input" type="radio" name="Tiene_Canaima" value="Si" required>
							</div>
							<div class="form-check">
								<label class="form-label">No </label>
								<input class="form-check-input" type="radio" name="Tiene_Canaima" value="No" required>
							</div>
							<label class="form-label">¿En que condiciones?</label>
							<select class="form-select" name="Condiciones_Canaima" >
								<option value="Muy buenas condiciones">Muy buenas condiciones</option>
								<option value="Buenas condiciones">Buenas condiciones</option>
								<option value="Malas condiciones">Malas condiciones</option>
								<option value="Muy malas condiciones">Muy malas condiciones</option>
							</select>
						</div>
					</div>
					<!--Carnet de la patria-->
					<div>
						<span class="form-label">Tiene carnet de la patria:</span>

						<div>
							<div class="form-check">
								<label class="form-label">Si </label>
								<input class="form-check-input" type="radio" name="Tiene_Carnet_Patria" value="Si" required>
							</div>
							<div class="form-check">
								<label class="form-label">No </label>
								<input class="form-check-input" type="radio" name="Tiene_Carnet_Patria" value="No" required>
							</div>
							<span class="form-label">Código:</span>
							<input class="form-control mb-2" type="text" name="Codigo_Carnet_Patria" >
							
							<span class="form-label">Serial:</span>
							<input class="form-control mb-2" type="text" name="Serial_Carnet_Patria" >
						</div>
					</div>
					<!--Conexión a internet-->
					<div>
						<span class="form-label">Cuenta con conexión a internet en su vivienda:</span>
						<div>
							<div class="form-check">
								<label class="form-label">Si </label>
								<input class="form-check-input" type="radio" name="Internet_Vivienda" value="Si" required>
							</div>
							<div class="form-check">
								<label class="form-label">No </label>
								<input class="form-check-input" type="radio" name="Internet_Vivienda" value="No" required>
							</div>
						</div>
					</div>
				</div>
				
				<!--Datos de salud-->
				<h5>Datos de salud.</h5>

				<div>
					<div>
						<label class="form-label">Datos antropométricos:</label>
						<div class="input-group">
							<input class="form-control mb-2" type="text" name="Indice" placeholder="Índice">
							<input class="form-control mb-2" type="text" name="Talla" placeholder="Talla">
							<input class="form-control mb-2" type="text" name="Peso" placeholder="Peso">
							<input class="form-control mb-2" type="text" name="C_Braquial" placeholder="C.brazo">
						</div>
					</div>
					<div>
						<label class="form-label">Tallas</label>
						<div class="input-group">
							<input class="form-control mb-2" type="text" name="Talla_Pantalon" placeholder="Pantalón" >
							<input class="form-control mb-2" type="text" name="Talla_Camisa" placeholder="Camisa" >
							<input class="form-control mb-2" type="text" name="Talla_Zapatos" placeholder="Zapatos">
						</div>
					</div>
					<div>
						<span class="form-label">Padece alguna enfermedad:</span>

						<div class="form-check">
							<label class="form-label">Si </label>
							<input class="form-check-input" type="radio" name="Padece_Enfermedad" value="Si" required>
						</div>
						<div class="form-check">
							<label class="form-label">No </label>
							<input class="form-check-input" type="radio" name="Padece_Enfermedad" value="No" required>
						</div>
						<span class="form-label">¿Cual?:</span>
						<input class="form-control mb-2" type="text" name="Cual_Enfermedad">
					</div>
					<div>
						<label class="form-label">Alergias:</label>
						<input class="form-control mb-2" type="text" name="Alergias">
					</div>
					<div>
						<span class="form-label">Tipo de sangre:</span>
						<div class="input-group">
							
							<select class="form-select" name="Grupo_Sanguineo" >
								<option value="O">O</option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="AB">AB</option>
							</select>
							<span class="input-group-text">Factor Rhesus:</span>
							<select class="form-select" name="Factor_Rhesus" >
								<option value="+">+</option>
								<option value="-">-</option>
							</select>
						</div>
					</div>
					<div>
						<span class="form-label">Lateralidad:</span>
						<div>
							<div class="form-check">
								<label class="form-label">Ambidextro </label>
								<input class="form-check-input" type="radio" name="Lateralidad" value="Ambidextro" required>
							</div>
							<div class="form-check">
								<label class="form-label">Diestro </label>
								<input class="form-check-input" type="radio" name="Lateralidad" value="Diestro" required>
							</div>
							<div class="form-check">
								<label class="form-label">Zurdo </label>
								<input class="form-check-input" type="radio" name="Lateralidad" value="Zurdo" required>
							</div>
						</div>
					</div>
					<div>
						<span class="form-label">Condición de la dentadura:</span>
						<div>
							<div class="form-check">
								<label class="form-label">Buena </label>
								<input class="form-check-input" type="radio" name="Condicion_Dentadura" value="Buena" required>
							</div>
							<div class="form-check">
								<label class="form-label">Regular </label>
								<input class="form-check-input" type="radio" name="Condicion_Dentadura" value="Regular" required>
							</div>
							<div class="form-check">
								<label class="form-label">Mala </label>
								<input class="form-check-input" type="radio" name="Condicion_Dentadura" value="Mala" required>
							</div>
						</div>
					</div>
					<div>
							<span class="form-label">Condición oftalmológicas:</span>
							<div>
								<div class="form-check">
									<label class="form-label">Buena </label>
									<input class="form-check-input" type="radio" name="Condicion_Vista" value="Buena" required>
								</div>
								<div class="form-check">
									<label class="form-label">Regular </label>
									<input class="form-check-input" type="radio" name="Condicion_Vista" value="Regular" required>
								</div>
								<div class="form-check">
									<label class="form-label">Mala </label>
									<input class="form-check-input" type="radio" name="Condicion_Vista" value="Mala" required>
								</div>
							</div>
					</div>
					<div>
						<span class="form-label">Presenta alguna de estas condiciones:</span>
						<div>
							<div class="form-check">
								<label class="form-label">Visual </label>
								<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Visual">
							</div>
							<div class="form-check">
								<label class="form-label">Motora </label>
								<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Motora">
							</div>
							<div class="form-check">
								<label class="form-label">Auditiva </label>
								<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Auditiva">
							</div>
							<div class="form-check">
								<label class="form-label">Escritura </label>
								<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Escritura">
							</div>
							<div class="form-check">
								<label class="form-label">Lectura </label>
								<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Lectura">
							</div>
							<div class="form-check">
								<label class="form-label">Embarazo </label>
								<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Embarazo">
							</div>
						</div>
					</div>
					<div>
						<span class="form-label">Es atendido por otra institución:</span>

						<div>
							<div class="form-check">
								<label class="form-label">Si </label>
								<input class="form-check-input" type="radio" name="Recibe_Atención_Inst" value="Si" required>
							</div>
							<div class="form-check">
								<label class="form-label">No </label>
								<input class="form-check-input" type="radio" name="Recibe_Atención_Inst" value="No" required>
							</div>
							<span class="form-label">¿Cual institución?</span>
							<input class="form-control mb-2" type="text" name="Institucion_Medica" >
						</div>
					</div>
					<div>
						<span class="form-label">¿Recibe alguna medicacion especial?:</span>

						<div>
							<div class="form-check">
								<label class="form-label">Si </label>
								<input class="form-check-input" type="radio" name="Recibe_Medicacion" value="Si" required>
							</div>
							<div class="form-check">
								<label class="form-label">No </label>
								<input class="form-check-input" type="radio" name="Recibe_Medicacion" value="No" required>
							</div>
							<span class="form-label">¿Cual?</span>
							<input class="form-control mb-2" type="text" name="Medicacion" >
						</div>
					</div>
					<div>
						<span class="form-label">¿Tiene alguna dieta especial?:</span>

						<div>
							<div class="form-check">
								<label class="form-label">Si </label>
								<input class="form-check-input" type="radio" name="Tiene_Dieta_Especial" value="Si" required>
							</div>
							<div class="form-check">
								<label class="form-label">No </label>
								<input class="form-check-input" type="radio" name="Tiene_Dieta_Especial" value="No" required>
							</div>
							<span class="form-label">¿Cual?</span>
							<input class="form-control mb-2" type="text" name="Dieta_Especial" >
						</div>
					</div>
					<div>
						<span class="form-label">Posee carnet de discapacidad:</span>

						<div>
							<div class="form-check">
								<label class="form-label">Si </label>
								<input class="form-check-input" type="radio" name="Tiene_Carnet_Discapacidad" value="Si" required>
							</div>
							<div class="form-check">
								<label class="form-label">No </label>
								<input class="form-check-input" type="radio" name="Tiene_Carnet_Discapacidad" value="No" required>
							</div>
							<span class="form-label">Número de carnet de discapacidad:</span>
							<input class="form-control mb-2" type="text" name="Nro_Carnet_Discapacidad" >
						</div>
					</div>
				</div>


				<?php if (!$Es_el_representante): #Si el representante es el padre no se le pide otra vez el formulario, se asumen todos los campos?>
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
									
							<p>Genero:</p>
							<div class="form-check">
								<label class="form-label">F </label>
								<input class="form-check-input" type="radio" name="Genero_Familiar" value="F">
							</div>
							<div class="form-check">
								<label class="form-label">M </label>
								<input class="form-check-input" type="radio" name="Genero_Familiar" value="M">
							</div>

						</div>

						<!--Vinculo con el estudiante del familiar-->
						<div>
							<span class="form-label">Vinculo con el estudiante:</span>
							<div class="form-check">
								<label class="form-label">Madre </label>
								<input class="form-check-input" type="radio" name="Vinculo_Familiar" value="Madre">
							</div>
							<div class="form-check">
								<label class="form-label">Padre </label>
								<input class="form-check-input" type="radio" name="Vinculo_Familiar" value="Padre">
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
							<input class="form-control" type="date" name="Fecha_Nacimiento_Familiar">
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
								<input class="form-control" type="tel" name="Teléfono_Principal_Familiar" placeholder="Movil">
								<input class="form-control" type="tel" name="Teléfono_Auxiliar_Familiar" placeholder="Fijo">
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
				<?php else: ?>
				
				<input type="hidden" name="Es_el_representante" value="Es_el_representante">
				<input type="hidden" name="Vinculo_Familiar" value="<?php echo $_POST['Vinculo_Familiar'] ;?>">
				<?php endif ?>
			</div>
			<!--Botón para guardar-->
			<div class="card-footer">
				<input type="hidden" name="orden" value="Insertar">
				<button class="btn btn-primary" type="submit">Registrar alumno</button>
			</div>
		</form>

</body>
</html>