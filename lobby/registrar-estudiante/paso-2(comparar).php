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
	<link rel="stylesheet" type="text/css" href="../../css/all.min.css"/>
</head>
<body>
	<form class="card" action="../../controladores/control-estudiantes.php" method="POST" style="max-width: 600px; margin: 74px auto;">
			<div class="card-header">
				<h4>Formulario de registro de estudiantes</h4>
			</div>
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a id="link1" class="nav-link active" href="#" onclick="seccion('seccion1')">Datos del estudiante</a>
				</li>
				<li class="nav-item">
					<a id="link2" class="nav-link" href="#" onclick="seccion('seccion2')">Datos Sociales</a>
				</li>
				</li>
				<li class="nav-item">
					<a id="link3" class="nav-link" href="#" onclick="seccion('seccion3')">Datos de salud</a>
				</li>
				<li class="nav-item">
					<a id="link4" class="nav-link" href="#" onclick="seccion('seccion4')"> Datos familiares</a>
				</li>
			</ul>
			<div class="card-body">
				<section id="seccion1">
					<h5 class="mb-3"><i class="fas fa-address-card fa-xl"></i> Datos personales.</h5>
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
								<datalist id="prefijos-estudiante">
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
									<input class="form-control" type="text" name="Prefijo_Principal_Est" list="prefijos-estudiante" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos" required>
									<!--Número-->
									<input class="form-control w-auto" type="tel" name="Teléfono_Principal_Est" placeholder="Teléfono principal" required>
								</div>

								<!--Teléfono secundario-->
								<div class="input-group mb-2">
									<!--Prefijo-->
									<input class="form-control" type="text" name="Prefijo_Secundario_Est" list="prefijos-estudiante" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos" required>
									<!--Número-->
									<input class="form-control w-auto" type="tel" name="Teléfono_Secundario_Est" placeholder="Teléfono secundario" required>
								</div>
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
								<input class="form-control w-auto" type="text" name="Materias_Pendientes" placeholder="¿Cuáles?">
							</div>
						</div>
						<div>
							<label class="form-label">Plantel de procedencia:</label>
							<textarea class="form-control mb-2"name="Plantel_Procedencia"></textarea>
						</div>
					</div>
				</section>
				<section id="seccion2" style="display:none;">
					<!--Datos sociales-->
					<h5 class="mb-3"><i class="fa-solid fa-users fa-xl"></i> Datos sociales.</h5>
					<div>
						<!--Dirección de residencia-->
						<div>
							<label class="form-label">Dirección de residencia:</label>
							<textarea class="form-control mb-2" name="Direccion_Est"></textarea>
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
				</section>
				<section id="seccion3" style="display:none;">
					<!--Datos de salud-->
					<h5 class="mb-3"><i class="fas fa-plus-square fa-xl"></i> Datos de salud.</h5>
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
				</section>
				<section id="seccion4" style="display:none;">
					<!--Datos del padre o la madre-->
					<h5 class="mb-3"><i class="fa-solid fa-people-roof fa-xl"></i> Datos familiares (Madre/Padre).</h5>

					<div>
						<div>
							<p class="form-label">Parentezco:</p>
							<div class="pt-2 px-2 pb-0 bg-light border rounded">
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="Vinculo_Familiar" value="Madre" required <?php if($_POST['Vinculo'] == "Madre"){echo "checked";} ?>>
									<label class="form-label">Madre</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="Vinculo_Familiar" value="Padre" required <?php if($_POST['Vinculo'] == "Padre"){echo "checked";} ?>>
									<label class="form-label">Padre</label>
								</div>
							</div>
							<!--Nombres del familiar-->
							<div>
								<label class="form-label">Nombres:</label>
								<div class="input-group">
									<input class="form-control mb-2" type="text" name="Primer_Nombre_Familiar" placeholder="Primer nombre" value="<?php if($_POST['Vinculo'] == "Padre" OR "Madre"){echo $_SESSION['persona']['Primer_Nombre'];} ?>">
									<input class="form-control mb-2" type="text" name="Segundo_Nombre_Familiar" placeholder="Segundo nombre" value="<?php if($_POST['Vinculo'] == "Padre" OR "Madre"){echo $_SESSION['persona']['Segundo_Nombre'];} ?>">
								</div>

							</div>

							<!--Apellidos del familiar-->
							<div>
								<label class="form-label">Apellidos:</label>
								<div class="input-group">
									<input class="form-control mb-2" type="text" name="Primer_Apellido_Familiar" placeholder="Primer apellido" value="<?php if($_POST['Vinculo'] == "Padre" OR "Madre"){echo $_SESSION['persona']['Primer_Apellido'];} ?>">
									<input class="form-control mb-2" type="text" name="Segundo_Apellido_Familiar" placeholder="Segundo apellido" value="<?php if($_POST['Vinculo'] == "Padre" OR "Madre"){echo $_SESSION['persona']['Segundo_Apellido'];} ?>">
								</div>
							</div>

							<!--Genero del familiar-->
							<div>
								<p class="form-label">Genero:</p>
								<div class="pt-2 px-2 pb-0 bg-light border rounded">
									<div class="form-check form-check-inline">
										<label class="form-label">F </label>
										<input class="form-check-input" type="radio" name="Genero_Familiar" value="F" <?php if($_POST['Vinculo'] == "Padre" OR "Madre"){if($_SESSION['persona']['Género'] == "F")echo "checked";} ?>>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-label">M </label>
										<input class="form-check-input" type="radio" name="Genero_Familiar" value="M" <?php if($_POST['Vinculo'] == "Padre" OR "Madre"){if($_SESSION['persona']['Género'] == "M")echo "checked";} ?>>
									</div>
								</div>
							</div>
							<!--Cédula del familiar-->
							<div>
								<label class="form-label">Cédula:</label>
								<input class="form-control mb-2" type="text" name="Cédula_Familiar" placeholder="Cédula de identidad" value="<?php if($_POST['Vinculo'] == "Padre" OR "Madre"){echo $_SESSION['persona']['Cédula'];} ?>">
							</div>

							<!--Fecha de nacimiento del familiar-->
							<div>
								<label class="form-label">Fecha de nacimiento:</label>
								<input class="form-control mb-2" type="date" name="Fecha_Nacimiento_Familiar" value="<?php if($_POST['Vinculo'] == "Padre" OR "Madre"){echo $_SESSION['persona']['Fecha_Nacimiento'];} ?>">
							</div>

							<!--Lugar de nacimiento del familiar-->
							<div>
								<label class="form-label">Lugar de nacimiento:</label>
								<input class="form-control mb-2" type="text" name="Lugar_Nacimiento_Familiar" value="<?php if($_POST['Vinculo'] == "Padre" OR "Madre"){echo $_SESSION['persona']['Lugar_Nacimiento'];} ?>">
							</div>

							<!--Correo electrónico del familiar-->
							<div>
								<label class="form-label">Correo electrónico:</label>
								<input class="form-control mb-2" type="email" name="Correo_electrónico_Familiar" value="<?php if($_POST['Vinculo'] == "Padre" OR "Madre"){echo $_SESSION['persona']['Correo_Electrónico'];} ?>">
							</div>
						</div>
						<!--Teléfono principal-->
						<div>
							<datalist id="prefijos">
								<!--Moviles-->
								<option value="0416">
								<option value="0426">
								<option value="0414">
								<option value="0412">

								<!--Fijos-->
								<option value="0212">
								<option value="0234">
								<option value="0235">
								<option value="0238">
								<option value="0239">
								<option value="0240">
								<option value="0241">
								<option value="0242">
								<option value="0243">
								<option value="0244">
								<option value="0245">
								<option value="0246">
								<option value="0247">
								<option value="0248">
								<option value="0249">
								<option value="0251">
								<option value="0252">
								<option value="0253">
								<option value="0254">
								<option value="0255">
								<option value="0256">
								<option value="0257">
								<option value="0258">
								<option value="0259">
								<option value="0261">
								<option value="0262">
								<option value="0263">
								<option value="0264">
								<option value="0265">
								<option value="0266">
								<option value="0267">
								<option value="0268">
								<option value="0269">
								<option value="0271">
								<option value="0272">
								<option value="0273">
								<option value="0274">
								<option value="0275">
								<option value="0276">
								<option value="0277">
								<option value="0278">
								<option value="0279">
								<option value="0281">
								<option value="0282">
								<option value="0283">
								<option value="0284">
								<option value="0285">
								<option value="0286">
								<option value="0287">
								<option value="0288">
								<option value="0289">
								<option value="0291">
								<option value="0292">
								<option value="0293">
								<option value="0294">
								<option value="0295">
							</datalist>
							<label>Teléfonos:</label>
							<div class="input-group mb-2">
								<!--Prefijo-->
								<input class="form-control" type="text" name="Prefijo_Principal_Familiar" list="prefijos" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos" required value="<?php if($_POST['Vinculo'] == "Padre" OR "Madre"){echo $_SESSION['telefonos'][0]['Prefijo'];} ?>">
								<!--Número-->
								<input class="form-control w-auto" type="tel" name="Teléfono_Principal_Familiar" placeholder="Teléfono principal" required value="<?php if($_POST['Vinculo'] == "Padre" OR "Madre"){echo $_SESSION['telefonos'][0]['Número_Telefónico'];} ?>">
							</div>
							<!--Teléfono secundario-->
							<div class="input-group mb-2">
								<!--Prefijo-->
								<input class="form-control" type="text" name="Prefijo_Secundario_Familiar" list="prefijos" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos" required value="<?php if($_POST['Vinculo'] == "Padre" OR "Madre"){echo $_SESSION['telefonos'][1]['Prefijo'];} ?>">
								<!--Número-->
								<input class="form-control w-auto" type="tel" name="Teléfono_Secundario_Familiar" placeholder="Teléfono secundario" required value="<?php if($_POST['Vinculo'] == "Padre" OR "Madre"){echo $_SESSION['telefonos'][1]['Número_Telefónico'];} ?>">
							</div>
						</div>

						<!--Estado civil del familiar-->
						<div>
							<label class="form-label">Estado civil:</label>
							<select class="form-select" name="Estado_Civil_Familiar">
								<option value="Soltero(a)" <?php if($_POST['Vinculo'] == "Padre" OR "Madre"){if($_SESSION['persona']['Estado_Civil'] == "Soltero(a)")echo "selected";} ?>>Soltero(a)</option>
								<option value="Casado(a)" <?php if($_POST['Vinculo'] == "Padre" OR "Madre"){if($_SESSION['persona']['Estado_Civil'] == "Casado(a)")echo "selected";} ?>>Casado(a)</option>
								<option value="Divorsiado(a)" <?php if($_POST['Vinculo'] == "Padre" OR "Madre"){if($_SESSION['persona']['Estado_Civil'] == "Divorsiado(a)")echo "selected";} ?>>Divorsiado(a)</option>
								<option value="Viudo(a)" <?php if($_POST['Vinculo'] == "Padre" OR "Madre"){if($_SESSION['persona']['Estado_Civil'] == "Viudo(a)")echo "selected";} ?>>Viudo(a)</option>
							</select>
						</div>

						<!--Dirección de residencia del Familiar-->
						<div>
							<label class="form-label">Dirección de residencia:</label>
							<textarea class="form-control mb-2"name="Direccion_Familiar"><?php if($_POST['Vinculo'] == "Padre" OR "Madre"){echo $_SESSION['persona']['Dirección'];} ?></textarea>
						</div>

						<!--Se encuentra el familiar en el país-->
						<div>
							<span class="form-label">¿Se encuentra en el país?:</span>
							<div class="input-group mb-2">
								<select class="form-select" name="Reside_En_El_País" required>
									<option value="Si">Si</option>
									<option value="No">No</option>
								</select>
								<input class="form-control w-auto" type="text" name="País" placeholder="¿Donde?">
							</div>
						</div>
					</div>
				</section>
			</div>
			<!--Botón para guardar-->
			<div class="card-footer">
				<input type="hidden" name="orden" value="Insertar">
				<button class="btn btn-primary" type="submit">Registrar estudiante</button>
			</div>
		</form>
		<?php include '../../ayuda.php'; ?>
	<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
<script>
	function seccion(seccion) {

		//secciones
		var a = document.getElementById("seccion1");
		var b = document.getElementById("seccion2");
		var c = document.getElementById("seccion3");
		var d = document.getElementById("seccion4");


		//botones en la navegación
		var link_a = document.getElementById("link1");
		var link_b = document.getElementById("link2");
		var link_c = document.getElementById("link3");
		var link_d = document.getElementById("link4");


		//seccion seleccionada como activa(seccion 1 por defecto)
		var seccion = document.getElementById(seccion);

		a.style.display = "none";
		b.style.display = "none";
		c.style.display = "none";
		d.style.display = "none";


		link_a.classList.remove("active");
		link_b.classList.remove("active");
		link_c.classList.remove("active");
		link_d.classList.remove("active");


		if (seccion == a) {
			a.style.display = "block";
			link_a.classList.add("active");
		}
		else if (seccion == b) {
			b.style.display = "block";
			link_b.classList.add("active");
		}
		else if (seccion == c) {
			c.style.display = "block";
			link_c.classList.add("active");
		}
		else if (seccion == d) {
			d.style.display = "block";
			link_d.classList.add("active");
		}
	}
</script>
</body>
</html>
