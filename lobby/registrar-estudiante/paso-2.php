<?php

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

if (!isset($_POST['Datos_Representante'])) {
	header('Location: paso-1.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registrar nuevo estudiante</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/colores.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/all.min.css"/>
	<link rel="icon" type="img/png" href="../../img/distintivo-LGPF.png">
</head>
<body>
	<!--Banner-->
	<header class="w-100 bg-white d-flex justify-content-between shadow p-1 position-fixed top-0" style="z-index:1000;">
		<div>
			<img src="../../img/banner-gobierno.png" alt=""  height="42" class="d-inline-block align-text-top">
			<img src="../../img/banner-MPPE.png" alt=""  height="42" class="d-inline-block align-text-top">
		</div>
		<img src="../../img/banner-LGPF.png" alt=""  height="42" class="d-inline-block align-text-top">
	</header>
	<form id="FormularioEstudiante" class="card" action="../../controladores/control-registros.php" method="POST" onsubmit="enviar();" style="max-width: 600px; margin: 74px auto;">
			<div class="card-header py-3">
				<h3>Formulario de registro estudiante y padres.</h3>
			</div>
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a id="link1" class="nav-link active" href="#" onclick="seccion('seccion1')">Datos del estudiante</a>
				</li>
				<li class="nav-item">
					<a id="link2" class="nav-link" href="#" onclick="seccion('seccion2')">Datos Sociales</a>
				</li>
				<li class="nav-item">
					<a id="link3" class="nav-link" href="#" onclick="seccion('seccion3')">Datos de salud</a>
				</li>
				<li class="nav-item">
					<a id="link5" class="nav-link" href="#" onclick="seccion('seccion5')">Observaciones</a>
				</li>
				<li class="nav-item">
					<a id="link4" class="nav-link" href="#" onclick="seccion('seccion4')"> Datos Padre</a>
				</li>
				<li class="nav-item">
					<a id="link6" class="nav-link" href="#" onclick="seccion('seccion6')"> Datos Madre</a>
				</li>
			</ul>
			<div class="card-body">
				<section id="seccion1">
					<h5 class="mb-3"><i class="fas fa-address-card fa-xl"></i> Datos personales.</h5>
					<div>
						<div>
							<label class="form-label">Nombres: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<div class="input-group">
								<input class="form-control mb-2" type="text" name="Primer_Nombre_Est" id="Primer_Nombre_Est" placeholder="Primer nombre"  required>
								<input class="form-control mb-2" type="text" name="Segundo_Nombre_Est" id="Segundo_Nombre_Est" placeholder="Segundo nombre"  required>
							</div>
						</div>
						<div>
							<label class="form-label">Apellidos: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<div class="input-group">
								<input class="form-control mb-2" type="text" name="Primer_Apellido_Est" id="Primer_Apellido_Est" placeholder="Primer apellido">
								<input class="form-control mb-2" type="text" name="Segundo_Apellido_Est" id="Segundo_Apellido_Est" placeholder="Segundo apellido">
							</div>
						</div>
						<div>
							<label class="form-label">C??dula:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<div class="input-group mb-2">
								<select class="form-select" id="Tipo_C??dula_R" name="Tipo_C??dula_Est" required>
									<option selected disabled value="">Tipo de c??dula</option>
									<option value="V">V</option>
									<option value="E">E</option>
								</select>
								<input type="text" class="form-control w-auto" name="C??dula_Est" id="C??dula_Est" maxlength="8" minlength="7" required>
							</div>
						</div>
						<div>
							<p class="form-label">G??nero: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></p>
							<div class="pt-2 px-2 pb-0 mb-2 bg-light border rounded mb-1">
								<div class="form-check form-check-inline">
									<input class="form-check-input" class="form-check-input" type="radio" name="G??nero_Est" value="F" required>
									<label class="form-label">F</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" class="form-check-input" type="radio" name="G??nero_Est" value="M" required>
									<label class="form-label">M</label>
								</div>
							</div>
						</div>
						<div>
							<label class="form-label">Fecha de nacimiento: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>

							<input class="form-control mb-2" type="date" name="Fecha_Nacimiento_Est" id="Fecha_Nacimiento_Est" min="<?php echo date('Y')-19 .'-01-01'?>" max="<?php echo date('Y')-10 .'-01-01'?>" title="Debe tener al menos 12 a??os." required>
						</div>
						<div>
							<label class="form-label">Lugar de nacimiento: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<input class="form-control mb-2" type="text" name="Lugar_Nacimiento_Est" id="Lugar_Nacimiento_Est" required>
						</div>
						<div>
							<label class="form-label">Correo electr??nico: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<input class="form-control mb-2" type="text" name="Correo_electr??nico_Est" id="Correo_electr??nico_Est" required>
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

								<label>Tel??fonos: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>

								<!--Tel??fono principal-->
								<div class="input-group mb-2">
									<!--Prefijo-->
									<input class="form-control" type="text" name="Prefijo_Principal_Est" id="Prefijo_Principal_Est" list="prefijos-estudiante" minlength="4" maxlength="4" placeholder="Prefijo telef??nico" title="Solo ingresar caracteres numericos" required>
									<!--N??mero-->
									<input class="form-control w-auto" type="tel" name="Tel??fono_Principal_Est" id="Tel??fono_Principal_Est" minlength="7" maxlength="7" placeholder="Tel??fono principal" required>
								</div>

								<!--Tel??fono secundario-->
								<div class="input-group mb-2">
									<!--Prefijo-->
									<input class="form-control" type="text" name="Prefijo_Secundario_Est" id="Prefijo_Secundario_Est" list="prefijos-estudiante" minlength="4" maxlength="4" placeholder="Prefijo telef??nico" title="Solo ingresar caracteres numericos" required>
									<!--N??mero-->
									<input class="form-control w-auto" type="tel" name="Tel??fono_Secundario_Est" id="Tel??fono_Secundario_Est" minlength="7" maxlength="7" placeholder="Tel??fono secundario" required>
								</div>
							</div>
						</div>
						<div>
							<label class="form-label">A??o a cursar: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<select class="form-select mb-2" name="Grado_A_Cursar" required>
								<option selected disabled value="">Seleccione una opci??n</option>
								<option value="Primer a??o">Primer a??o</option>
								<option value="Segundo a??o">Segundo a??o</option>
								<option value="Tercer a??o">Tercer a??o</option>
								<option value="Cuarto a??o">Cuarto a??o</option>
								<option value="Quinto a??o">Quinto a??o</option>
							</select>
						</div>

						<div>
							<p class="form-label">??El estudiante es repitente?: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></p>
							<div class="input-group mb-2">
								<select class="form-select" name="Estudiante_Repitente" required>
									<option selected disabled value="">Seleccione una opci??n</option>
									<option value="Si">Si</option>
									<option value="No">No</option>
								</select>
							<input class="form-control w-auto" type="text" name="Materias_Repitente" id="Materias_Repitente" placeholder="??Cu??les materias?">
								<input class="form-control w-auto" type="text" name="A??o_Repitente" id="A??o_Repitente" list="grados" placeholder="??Qu?? a??o repite?">
								<datalist id="grados">
								  <option value="Primer a??o"></option>
								  <option value="Segundo a??o"></option>
								  <option value="Tercer a??o"></option>
								  <option value="Cuarto a??o"></option>
								  <option value="Quinto a??o"></option>
								</datalist>
							</div>
						</div>
						<div>
							<p class="form-label">??Tiene materias pendientes? <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></p>
							<div class="input-group mb-2">
								<select class="form-select" name="Tiene_Materias_Pendientes" required>
									<option selected disabled value="">Seleccione una opci??n</option>
									<option value="Si">Si</option>
									<option value="No">No</option>
								</select>
								<input id="Materias_Pendientes" class="form-control w-auto" type="text" name="Materias_Pendientes"  placeholder="??Cu??les?">
							</div>
						</div>
						<div>
							<label class="form-label">Plantel de procedencia: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<textarea class="form-control mb-2"name="Plantel_Procedencia" id="Plantel_Procedencia" required></textarea>
						</div>
					</div>
				</section>
				<section id="seccion2" style="display:none;">
					<!--Datos sociales-->
					<h5 class="mb-3"><i class="fa-solid fa-users fa-xl"></i> Datos sociales.</h5>
					<div>
						<!--Direcci??n de residencia-->
						<div>
							<label class="form-label">Lugar de domicilio: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<textarea class="form-control mb-2" name="Direcci??n_Est" id="Direcci??n_Est" required></textarea>
						</div>
						<div>
							<label class="form-label">??Con qui??n vive?: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<input class="form-control mb-2" type="text" name="Con_Qui??n_Vive" id="Con_Qui??n_Vive" required>
						</div>
						<div>
							<span class="form-label">??Tiene canaima? <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>

							<div class="pt-2 px-2 pb-0 mb-2 bg-light border rounded mb-2">
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
								<label class="form-label">??En que Condiciones?</label>
								<select class="form-select mb-2" name="Condiciones_Canaima" >
									<option selected disabled value="">Seleccione una opci??n</option>
									<option value="Muy buenas Condiciones">Muy buenas Condiciones</option>
									<option value="Buenas Condiciones">Buenas Condiciones</option>
									<option value="Malas Condiciones">Malas Condiciones</option>
									<option value="Muy malas Condiciones">Muy malas Condiciones</option>
								</select>
							</div>
						</div>
						<!--Carnet de la patria-->
						<div>
							<span class="form-label">Carnet de la patria: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="input-group mb-2">
								<select class="form-select" name="Tiene_Carnet_Patria_Est">
									<option selected disabled value="">Seleccione una opci??n</option>
									<option value="Si">Si tiene</option>
									<option value="No">No tiene</option>
								</select>
								<input class="form-control w-auto" type="text" name="C??digo_Carnet_Patria_Est" id="C??digo_Carnet_Patria_Est" placeholder="C??digo" minlength="10" maxlength="10">
								<input class="form-control w-auto" type="text" name="Serial_Carnet_Patria_Est" id="Serial_Carnet_Patria_Est" placeholder="Serial" minlength="10" maxlength="10">
							</div>
						</div>
						<!--Conexi??n a internet-->
						<div>
							<span class="form-label">Cuenta con conexi??n a internet en su vivienda: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="pt-2 px-2 pb-0 mb-2 bg-light border rounded mb-2">
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
							<label class="form-label">Datos antropom??tricos: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<div class="input-group mb-2">
								<input class="form-control mb-2" type="text" name="??ndice" id="??ndice" placeholder="??ndice" required maxlength="5">
								<input class="form-control mb-2" type="text" name="Talla" id="Talla" placeholder="Talla(cm)" required maxlength="5">
								<input class="form-control mb-2" type="text" name="Peso" id="Peso" placeholder="Peso(kg)" required maxlength="5">
								<input class="form-control mb-2" type="text" name="C_Braquial" id="C_Braquial(cm)" placeholder="C.brazo" required maxlength="5">
							</div>
						</div>
						<div>
							<label class="form-label">Tallas: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<div class="input-group mb-2">
								<input class="form-control mb-2" type="text" name="Talla_Pantal??n" id="Talla_Pantal??n" placeholder="Pantal??n" required maxlength="5">
								<input class="form-control mb-2" type="text" name="Talla_Camisa" id="Talla_Camisa" placeholder="Camisa" required maxlength="5">
								<input class="form-control mb-2" type="text" name="Talla_Zapatos" id="Talla_Zapatos" placeholder="Zapatos" required maxlength="5">
							</div>
						</div>
						<div>
							<span class="form-label">??Padece alguna enfermedad?: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="input-group mb-2">
								<select class="form-select" name="Padece_Enfermedad" required>
									<option selected disabled value="">Seleccione una opci??n</option>
									<option value="Si">Si</option>
									<option value="No">No</option>
								</select>
								<input class="form-control w-auto" type="text" name="Cual_Enfermedad" id="Cual_Enfermedad" placeholder="??Cu??l enfermedad?">
							</div>
						</div>
						<div>
							<span class="form-label">Tipo de sangre: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="input-group mb-2">
								<select class="form-select" name="Grupo_Sanguineo" required>
									<option selected disabled value="">Seleccione una opci??n</option>
									<option value="O">O</option>
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="AB">AB</option>
								</select>
								<span class="input-group-text">Factor Rhesus: </span>
								<select class="form-select" name="Factor_Rhesus" required>
									<option selected disabled value="">Seleccione una opci??n</option>
									<option value="+">+</option>
									<option value="-">-</option>
								</select>
							</div>
						</div>
						<div>
							<span class="form-label">Lateralidad: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="pt-2 px-2 pb-0 mb-2 bg-light border rounded">
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
							<span class="form-label">Condici??n de la dentadura: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="pt-2 px-2 pb-0 mb-2 bg-light border rounded">
								<div class="form-check form-check-inline">
									<label class="form-label">Buena </label>
									<input class="form-check-input" type="radio" name="Condici??n_Dentadura" value="Buena" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Regular </label>
									<input class="form-check-input" type="radio" name="Condici??n_Dentadura" value="Regular" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Mala </label>
									<input class="form-check-input" type="radio" name="Condici??n_Dentadura" value="Mala" required>
								</div>
							</div>
						</div>
						<div>
								<span class="form-label">Condici??n oftalmol??gicas: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
								<div class="pt-2 px-2 pb-0 mb-2 bg-light border rounded">
									<div class="form-check form-check-inline">
										<label class="form-label">Buena </label>
										<input class="form-check-input" type="radio" name="Condici??n_Vista" value="Buena" required>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-label">Regular </label>
										<input class="form-check-input" type="radio" name="Condici??n_Vista" value="Regular" required>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-label">Mala </label>
										<input class="form-check-input" type="radio" name="Condici??n_Vista" value="Mala" required>
									</div>
								</div>
						</div>
						<div>
							<span class="form-label">Presenta alguna de estas condiciones: </span>
							<div class="pt-2 px-2 pb-0 mb-2 bg-light border rounded">
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
									<label class="form-label">Lenguaje </label>
									<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Lenguaje">
								</div>								
								<div class="form-check form-check-inline">
									<label class="form-label">Embarazo </label>
									<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Embarazo">
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Educativa especial</label>
									<input class="form-check-input" type="checkbox" name="Condiciones_Salud[]" value="Educativa especial">
								</div>
							</div>
							<span class="form-label">Presenta alguna de estas necesidades educativas especiales: </span>
								<input class="form-control mb-2" type="text" name="Necesidad_educativa" id="Necesidad_educativa" placeholder="??Cu??l necesidad educativa?">	
							<div>								
							</div>
						</div>
						<div>
							<span class="form-label">Es atendido por otra instituci??n: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="input-group mb-2">
								<select class="form-select" name="Recibe_Atenci??n_Inst">
									<option selected disabled value="">Seleccione una opci??n</option>
									<option value="Si">Si</option>
									<option value="No">No</option>
								</select>
								<input class="form-control w-auto" type="text" name="Instituci??n_m??dica" id="Instituci??n_m??dica" placeholder="??Cu??l instituci??n?">
							</div>
						</div>
						<div>
							<span class="form-label">??Fue vacunado contra el COVID-19?: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="input-group mb-2">
								<select class="form-select" name="Vacunado" required>
									<option selected disabled value="">Seleccione una opci??n</option>
									<option value="Si">Si</option>
									<option value="No">No</option>
								</select>
								<input class="form-control w-auto" type="text" name="Vacuna" id="Vacuna" placeholder="??Cu??l vacuna?" maxlength="15">
							</div>
								<label class="form-label">Dosis aplicadas: </label>
								<div class="input-group mb-2">
									<input class="form-control text" type="number" name="Dosis" id="Dosis" placeholder="Ingrese un numero..." min="0" step="1">
									<span class="input-group-text">Lote: </span>
									<input class="form-control text-end" type="text" name="Lote" id="Lote" placeholder="Ingrese un numero..." maxlength="15">
								</div class="input-group mb-2">
						</div>
						<div>
							<span class="form-label">??Tiene alguna dieta especial?: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="input-group mb-2">
								<select class="form-select" name="Tiene_Dieta_Especial">
									<option selected disabled value="">Seleccione una opci??n</option>
									<option value="Si">Si</option>
									<option value="No">No</option>
								</select>
								<input class="form-control w-auto" type="text" name="Dieta_Especial" id="Dieta_Especial" placeholder="??Qu?? dieta?">
							</div>
						</div>
						<div>
							<span class="form-label">Posee carnet de discapacidad: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="input-group mb-2">
								<select class="form-select" name="Tiene_Carnet_Discapacidad">
									<option selected disabled value="">Seleccione una opci??n</option>
									<option value="Si">Si</option>
									<option value="No">No</option>
								</select>
								<input class="form-control w-auto" type="text" name="Nro_Carnet_Discapacidad" id="Nro_Carnet_Discapacidad" placeholder="Nro. de carnet" maxlength="25">
							</div>
						</div>
					</div>
				</section>
				<section id="seccion5" style="display:none;">
						<div>
							<h5 class="mb-3"><i class="fa-solid fa-eye fa-xl"></i> Observaciones: </h5>
							<label class="form-label text-muted">
								<small>
									Realice una descripci??n general de su representado, mencionando caracter??sticas en el aspecto social, f??sico, personal, familiar y acad??mico que a usted le gustaria dar a  conocer a los docentes de la instituci??n. La misma no puede exceder los 150 car??cteres
								</small>
							</label>
							<label class="form-label"> Social: </label>
							<textarea name="observaciones_Social" id="observaciones_Social" cols="30" rows="3" class="form-control mb-2" maxlength="150"></textarea>
							<label class="form-label"> F??sico: </label>
							<textarea name="observaciones_Fisico" id="observaciones_Fisico" cols="30" rows="3" class="form-control mb-2" maxlength="150"></textarea>
							<label class="form-label"> Personal: </label>
							<textarea name="observaciones_Personal" id="observaciones_Personal" cols="30" rows="3" class="form-control mb-2" maxlength="150"></textarea>
							<label class="form-label"> Familiar: </label>
							<textarea name="observaciones_Familiar" id="observaciones_Familiar" cols="30" rows="3" class="form-control mb-2" maxlength="150"></textarea>
							<label class="form-label"> Acad??mico: </label>
							<textarea name="observaciones_Academico" id="observaciones_Academico" cols="30" rows="3" class="form-control mb-2" maxlength="150"></textarea>
							<label class="form-label"> Otra: </label>
							<textarea name="observaciones_Otra" id="observaciones_Otra" cols="30" rows="3" class="form-control mb-2" maxlength="150"></textarea>
						</div>
				</section>
				<section id="seccion4" style="display:none;">
					<!--Datos del padre-->
					<h5 class="mb-3"><i class="fa-solid fa-people-roof fa-xl"></i> Datos Padre.</h5>

					<div>
							<!--Nombres del padre-->
							<div>
								<label class="form-label">Nombres: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
								<div class="input-group">
									<input class="form-control mb-2" type="text" name="Primer_Nombre_Padre" placeholder="Primer nombre">
									<input class="form-control mb-2" type="text" name="Segundo_Nombre_Padre" placeholder="Segundo nombre">
								</div>
							</div>

							<!--Apellidos del padre-->
							<div>
								<label class="form-label">Apellidos: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
								<div class="input-group">
									<input class="form-control mb-2" type="text" name="Primer_Apellido_Padre" placeholder="Primer apellido">
									<input class="form-control mb-2" type="text" name="Segundo_Apellido_Padre" placeholder="Segundo apellido">
								</div>
							</div>
							<!--C??dula del padre-->
							<div>
								<label class="form-label">C??dula:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
								<div class="input-group mb-2">
									<select class="form-select" id="Tipo_C??dula_Padre" name="Tipo_C??dula_Padre" required>
										<option selected disabled value="">Tipo de c??dula</option>
										<option value="V">V</option>
										<option value="E">E</option>
									</select>
									<input type="text" class="form-control w-auto" name="C??dula_Padre" id="C??dula_Est" maxlength="8" minlength="7" required>
								</div>
							</div>
							<!--Fecha de nacimiento del padre-->
							<div>
								<label class="form-label">Fecha de nacimiento: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
								<input class="form-control mb-2" type="date" name="Fecha_Nacimiento_Padre" min="<?php echo date('Y')-100 .'-01-01'?>" max="<?php echo date('Y')-18 .'-01-01'?>" title="Debe tener al menos 18 a??os." required>
							</div>

							<!--Lugar de nacimiento del padre-->
							<div>
								<label class="form-label">Lugar de nacimiento: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
								<input class="form-control mb-2" type="text" name="Lugar_Nacimiento_Padre" required>
							</div>

							<!--Correo electr??nico del padre-->
							<div>
								<label class="form-label">Correo electr??nico: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
								<input class="form-control mb-2" type="email" name="Correo_electr??nico_Padre" required>
							</div>

						<!--Tel??fono principal-->
							<div>
								<datalist id="prefijos">
									<!--Moviles-->
									<option value="0416">
									<option value="0426">
									<option value="0414">
									<option value="0412">

									<!--Fijos-->
									<option value="0271">
									<option value="0274">
									<option value="0275">
								</datalist>
								<label>Tel??fonos: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<div class="input-group mb-2">
								<!--Prefijo-->
								<input class="form-control" type="text" name="Prefijo_Principal_Padre" list="prefijos" minlength="4" maxlength="4" placeholder="Prefijo telef??nico" title="Solo ingresar caracteres numericos" required>
								<!--N??mero-->
								<input class="form-control w-auto" type="tel" name="Tel??fono_Principal_Padre" minlength="7" maxlength="7" placeholder="Tel??fono principal" required>
							</div>
							<!--Tel??fono secundario-->
							<div class="input-group mb-2">
								<!--Prefijo-->
								<input class="form-control" type="text" name="Prefijo_Secundario_Padre" list="prefijos" minlength="4" maxlength="4" placeholder="Prefijo telef??nico" title="Solo ingresar caracteres numericos" required>
								<!--N??mero-->
								<input class="form-control w-auto" type="tel" name="Tel??fono_Secundario_Padre" minlength="7" maxlength="7" placeholder="Tel??fono secundario" required>
							</div>
						</div>

						<!--Estado civil del padre-->
						<div>
							<label class="form-label">Estado civil: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<select class="form-select" name="Estado_Civil_Padre" required>
								<option selected disabled value="">Seleccione una opci??n</option>
								<option value="Soltero(a)">Soltero(a)</option>
								<option value="Casado(a)">Casado(a)</option>
								<option value="Divorciado(a)">Divorciado(a)</option>
								<option value="Viudo(a)">Viudo(a)</option>
							</select>
						</div>

						<!--Grado de instrucci??n del padre-->

						<div>
							<span>Grado de instrucci??n:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="pt-2 px-2 pb-0 bg-light border rounded mb-3">
								<div class="form-check form-check-inline">
									<label class="form-label">Primaria </label>
									<input class="form-check-input" type="radio" name="Grado_Instrucci??n_Pa" value="Primaria" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Bachillerato </label>
									<input class="form-check-input" type="radio" name="Grado_Instrucci??n_Pa" value="Bachillerato" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Universitario </label>
									<input class="form-check-input" type="radio" name="Grado_Instrucci??n_Pa" value="Universitario" required>
								</div>
							</div>
						</div>						

						<!--Direcci??n de residencia del padre-->
						<div>
							<label class="form-label">Direcci??n de residencia: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<textarea class="form-control mb-2"name="Direcci??n_Padre"></textarea>
						</div>

						<!--Se encuentra el padre en el pa??s-->
						<div>
							<span class="form-label">??Se encuentra en el pa??s?: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="input-group mb-2">
								<select class="form-select" name="Reside_En_El_Pa??s_Pa" required>
									<option selected disabled value="">Seleccione una opci??n</option>
									<option value="Si">Si</option>
									<option value="No">No</option>
								</select>
								<input class="form-control w-auto" type="text" name="Pa??s_Pa" id="Pa??s_Pa" placeholder="En Caso de estar fuera del pa??s, especifique en cu??l se encuentra">
							</div>
						</div>

						<div>						

							<h5>Datos de vivienda.</h5>

							<span>Condiciones de la vivienda:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="pt-2 px-2 pb-0 bg-light border rounded mb-3">
								<div class="form-check form-check-inline">
									<label class="form-label">Buena </label>
									<input class="form-check-input" type="radio" name="Condici??n_vivienda_Pa" value="Buena" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Regular </label>
									<input class="form-check-input" type="radio" name="Condici??n_vivienda_Pa" value="Regular" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Mala </label>
									<input class="form-check-input" type="radio" name="Condici??n_vivienda_Pa" value="Mala" required>
								</div>
							</div>
							<span>Tipo de vivienda:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="pt-2 px-2 pb-0 bg-light border rounded mb-3">
								<div class="form-check form-check-inline">
									<label class="form-label">Casa </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_Pa" value="Casa" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Apartamento </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_Pa" value="Apartamento" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Rancho </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_Pa" value="Rancho" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Quinta </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_Pa" value="Quinta" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Habitaci??n </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_Pa" value="Habitaci??n" required>
								</div>
							</div>
							<span>Tenencia de la vivienda:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="input-group mb-3">
								<select class="form-select" name="Tenencia_vivienda_Pa" required>
									<option selected disabled value="">Seleccione una opci??n</option>
									<option value="Propia">Propia</option>
									<option value="Alquilada">Alquilada</option>
									<option value="Prestada">Prestada</option>
									<option value="Otro">Otro</option>
								</select>
								<input class="form-control" type="text" name="Tenencia_vivienda_Pa_Otro" maxlength="12" minlength="3" placeholder="En Caso de ser otro, especifique">
							</div>
						</div>
						<h5>Datos laborales.</h5>
						<!--Trabaja el padre-->
						<div>
							<span>Trabaja:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="pt-2 px-2 pb-0 bg-light border rounded mb-3">
								<div class="form-check form-check-inline">
									<label class="form-label">Si </label>
									<input class="form-check-input" type="radio" name="Padre_Trabaja" value="Si" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">No </label>
									<input class="form-check-input" type="radio" name="Padre_Trabaja" value="No" required>
								</div>
							</div>
						</div>
						<!--Cargo que ocupa el padre-->
						<div>
							<label class="form-label">Cargo que ocupa:</label>
							<input class="form-control mb-2" type="text" name="Empleo_Pa" id="Empleo_Pa" maxlength="60" minlength="3">
						</div>
						<!--Tel??fono del trabajo del padre-->
						<div>
							<label class="form-label">Tel??fono del trabajo:</label>
							<!--Tel??fono principal-->
							<div class="input-group mb-2">
								<!--Prefijo-->
								<input class="form-control" type="text" name="Prefijo_Trabajo_Pa" id="Prefijo_Trabajo_Pa" list="prefijos" pattern="[0-9]+" maxlength="4" placeholder="Prefijo telef??nico" title="Solo ingresar caracteres numericos">
								<!--N??mero-->
								<input class="form-control w-auto" type="tel" name="Tel??fono_Trabajo_Pa" id="Tel??fono_Trabajo_Pa" placeholder="Tel??fono principal" pattern="[0-9]+" maxlength="7" minlength="7">
							</div>
						</div>
						<!--Lugar en el que trabaja el padre-->
						<div>
							<label class="form-label">Lugar del trabajo:</label>
							<textarea class="form-control mb-2" name="Lugar_Trabajo_Pa" id="Lugar_Trabajo_Pa" maxlength="55" minlength="3"></textarea>
						</div>
						<!--Remuneraci??n del trabajo del padre-->
						<div>
							<label class="form-label">Remuneraci??n:</label>
							<div class="input-group mb-2">
								<!--Remuneraci??n en base a sueldos minimos del padre-->
								<input class="form-control text-end" type="number" name="Remuneraci??n_Pa" id="Remuneraci??n_Pa" placeholder="Ingrese un numero..." min="0" step="1">
								<span class="input-group-text mb-2-text">Salarios m??nimos</span>
								<!--Tipo de Remuneraci??n del padre-->
								<select class="form-select" name="Tipo_Remuneraci??n_Pa">
									<option value="Diaria">Remuneraci??n diaria</option>
									<option value="Semanal">Remuneraci??n semanal</option>
									<option value="Quincenal">Remuneraci??n quincenal</option>
									<option value="Mensual">Remuneraci??n mensual</option>
								</select>
							</div>
						</div>
				</section>
				<section id="seccion6" style="display:none;">
					<!--Datos de la madre-->
					<h5 class="mb-3"><i class="fa-solid fa-people-roof fa-xl"></i> Datos Madre.</h5>

					<div>
							<!--Nombres de la madre-->
							<div>
								<label class="form-label">Nombres: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
								<div class="input-group">
									<input class="form-control mb-2" type="text" name="Primer_Nombre_Madre" placeholder="Primer nombre">
									<input class="form-control mb-2" type="text" name="Segundo_Nombre_Madre" placeholder="Segundo nombre">
								</div>
							</div>

							<!--Apellidos de la madre-->
							<div>
								<label class="form-label">Apellidos: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
								<div class="input-group">
									<input class="form-control mb-2" type="text" name="Primer_Apellido_Madre" placeholder="Primer apellido">
									<input class="form-control mb-2" type="text" name="Segundo_Apellido_Madre" placeholder="Segundo apellido">
								</div>
							</div>
							<!--C??dula de la madre-->
							<div>
								<label class="form-label">C??dula:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
								<div class="input-group mb-2">
									<select class="form-select" id="Tipo_C??dula_Madre" name="Tipo_C??dula_Madre" required>
										<option selected disabled value="">Tipo de c??dula</option>
										<option value="V">V</option>
										<option value="E">E</option>
									</select>
									<input type="text" class="form-control w-auto" name="C??dula_Madre" id="C??dula_Est" maxlength="8" minlength="7" required>
								</div>
							</div>
							<!--Fecha de nacimiento de la madre-->
							<div>
								<label class="form-label">Fecha de nacimiento: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
								<input class="form-control mb-2" type="date" name="Fecha_Nacimiento_Madre" min="<?php echo date('Y')-100 .'-01-01'?>" max="<?php echo date('Y')-18 .'-01-01'?>" title="Debe tener al menos 18 a??os." required>
							</div>

							<!--Lugar de nacimiento de la madre-->
							<div>
								<label class="form-label">Lugar de nacimiento: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
								<input class="form-control mb-2" type="text" name="Lugar_Nacimiento_Madre" required>
							</div>

							<!--Correo electr??nico de la madre-->
							<div>
								<label class="form-label">Correo electr??nico: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
								<input class="form-control mb-2" type="email" name="Correo_electr??nico_Madre" required>
							</div>
							<!--Tel??fono principal-->
							<div>
								<datalist id="prefijos">
									<!--Moviles-->
									<option value="0416">
									<option value="0426">
									<option value="0414">
									<option value="0412">

									<!--Fijos-->
									<option value="0271">
									<option value="0274">
									<option value="0275">
								</datalist>
							</div>
								<label>Tel??fonos: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<div class="input-group mb-2">
								<!--Prefijo-->
								<input class="form-control" type="text" name="Prefijo_Principal_Madre" list="prefijos" minlength="4" maxlength="4" placeholder="Prefijo telef??nico" title="Solo ingresar caracteres numericos" required>
								<!--N??mero-->
								<input class="form-control w-auto" type="tel" name="Tel??fono_Principal_Madre" minlength="7" maxlength="7" placeholder="Tel??fono principal" required>
							</div>
							<!--Tel??fono secundario-->
							<div class="input-group mb-2">
								<!--Prefijo-->
								<input class="form-control" type="text" name="Prefijo_Secundario_Madre" list="prefijos" minlength="4" maxlength="4" placeholder="Prefijo telef??nico" title="Solo ingresar caracteres numericos" required>
								<!--N??mero-->
								<input class="form-control w-auto" type="tel" name="Tel??fono_Secundario_Madre" minlength="7" maxlength="7" placeholder="Tel??fono secundario" required>
							</div>
						</div>

						<!--Estado civil de la madre-->
						<div>
							<label class="form-label">Estado civil: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<select class="form-select" name="Estado_Civil_Madre" required>
								<option selected disabled value="">Seleccione una opci??n</option>
								<option value="Soltero(a)">Soltero(a)</option>
								<option value="Casado(a)">Casado(a)</option>
								<option value="Divorciado(a)">Divorciado(a)</option>
								<option value="Viudo(a)">Viudo(a)</option>
							</select>
						</div>

						<!--Grado de instrucci??n de la madre-->

						<div>
							<span>Grado de instrucci??n:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="pt-2 px-2 pb-0 bg-light border rounded mb-3">
								<div class="form-check form-check-inline">
									<label class="form-label">Primaria </label>
									<input class="form-check-input" type="radio" name="Grado_Instrucci??n_Ma" value="Primaria" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Bachillerato </label>
									<input class="form-check-input" type="radio" name="Grado_Instrucci??n_Ma" value="Bachillerato" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Universitario </label>
									<input class="form-check-input" type="radio" name="Grado_Instrucci??n_Ma" value="Universitario" required>
								</div>
							</div>
						</div>							

						<!--Direcci??n de residencia de la madre-->
						<div>
							<label class="form-label">Direcci??n de residencia: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<textarea class="form-control mb-2"name="Direcci??n_Madre"></textarea>
						</div>

						<!--Se encuentra en el pa??s la madre-->
						<div>
							<span class="form-label">??Se encuentra en el pa??s?: <small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="input-group mb-2">
								<select class="form-select" name="Reside_En_El_Pa??s_Ma" required>
									<option selected disabled value="">Seleccione una opci??n</option>
									<option value="Si">Si</option>
									<option value="No">No</option>
								</select>
								<input class="form-control w-auto" type="text" name="Pa??s_Ma" id="Pa??s_Ma" placeholder="En Caso de estar fuera del pa??s, especifique en cu??l se encuentra">

							</div>
						</div>

<div>
							<h5>Datos de vivienda.</h5>

						<div>
							<span>Condiciones de la vivienda:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="pt-2 px-2 pb-0 bg-light border rounded mb-3">
								<div class="form-check form-check-inline">
									<label class="form-label">Buena </label>
									<input class="form-check-input" type="radio" name="Condici??n_vivienda_Ma" value="Buena" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Regular </label>
									<input class="form-check-input" type="radio" name="Condici??n_vivienda_Ma" value="Regular" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Mala </label>
									<input class="form-check-input" type="radio" name="Condici??n_vivienda_Ma" value="Mala" required>
								</div>
							</div>
							<span>Tipo de vivienda:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="pt-2 px-2 pb-0 bg-light border rounded mb-3">
								<div class="form-check form-check-inline">
									<label class="form-label">Casa </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_Ma" value="Casa" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Apartamento </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_Ma" value="Apartamento" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Rancho </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_Ma" value="Rancho" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Quinta </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_Ma" value="Quinta" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Habitaci??n </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_Ma" value="Habitaci??n" required>
								</div>
							</div>
							<span>Tenencia de la vivienda:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="input-group mb-3">
								<select class="form-select" name="Tenencia_vivienda_Ma" required>
									<option selected disabled value="">Seleccione una opci??n</option>
									<option value="Propia">Propia</option>
									<option value="Alquilada">Alquilada</option>
									<option value="Prestada">Prestada</option>
									<option value="Otro">Otro</option>
								</select>
								<input class="form-control" type="text" name="Tenencia_vivienda_Ma_Otro" maxlength="12" minlength="3" placeholder="En Caso de ser otro, especifique">
							</div>
						</div>
						<h5>Datos laborales.</h5>
						<!--Trabaja la madre-->
						<div>
							<span>Trabaja:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="pt-2 px-2 pb-0 bg-light border rounded mb-3">
								<div class="form-check form-check-inline">
									<label class="form-label">Si </label>
									<input class="form-check-input" type="radio" name="Madre_Trabaja" value="Si" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">No </label>
									<input class="form-check-input" type="radio" name="Madre_Trabaja" value="No" required>
								</div>
							</div>
						</div>
						<!--Cargo que ocupa la madre-->
						<div>
							<label class="form-label">Cargo que ocupa:</label>
							<input class="form-control mb-2" type="text" name="Empleo_Ma" id="Empleo_Ma" maxlength="60" minlength="3">
						</div>
						<!--Tel??fono del trabajo de la madre-->
						<div>
							<label class="form-label">Tel??fono del trabajo:</label>
							<!--Tel??fono principal-->
							<div class="input-group mb-2">
								<!--Prefijo-->
								<input class="form-control" type="text" name="Prefijo_Trabajo_Ma" id="Prefijo_Trabajo_Ma" list="prefijos" pattern="[0-9]+" maxlength="4" placeholder="Prefijo telef??nico" title="Solo ingresar caracteres numericos">
								<!--N??mero-->
								<input class="form-control w-auto" type="tel" name="Tel??fono_Trabajo_Ma" id="Tel??fono_Trabajo_Ma" placeholder="Tel??fono principal" pattern="[0-9]+" maxlength="7" minlength="7">
							</div>
						</div>
						<!--Lugar en el que trabaja la madre-->
						<div>
							<label class="form-label">Lugar del trabajo:</label>
							<textarea class="form-control mb-2" name="Lugar_Trabajo_Ma" id="Lugar_Trabajo_Ma" maxlength="55" minlength="3"></textarea>
						</div>
						<!--Remuneraci??n del trabajo de la madre-->
						<div>
							<label class="form-label">Remuneraci??n:</label>
							<div class="input-group mb-2">
								<!--Remuneraci??n en base a sueldos minimos de la madre-->
								<input class="form-control text-end" type="number" name="Remuneraci??n_Ma" id="Remuneraci??n_Ma" placeholder="Ingrese un numero..." min="0" step="1">
								<span class="input-group-text mb-2-text">Salarios m??nimos</span>
								<!--Tipo de Remuneraci??n de la madre-->
								<select class="form-select" name="Tipo_Remuneraci??n_Ma">
									<option value="Diaria">Remuneraci??n diaria</option>
									<option value="Semanal">Remuneraci??n semanal</option>
									<option value="Quincenal">Remuneraci??n quincenal</option>
									<option value="Mensual">Remuneraci??n mensual</option>
								</select>
							</div>
					</div>

					</div>

					
				</section>
			</div>
			<!-- datos del representante -->
			<input type="hidden" name="Vinculo_R" value="<?php echo $_POST['Vinculo_R']?>">
			<input type="hidden" name="Primer_Nombre_R" value="<?php echo $_POST['Primer_Nombre_R']?>">
			<input type="hidden" name="Segundo_Nombre_R" value="<?php echo $_POST['Segundo_Nombre_R']?>">
			<input type="hidden" name="Primer_Apellido_R" value="<?php echo $_POST['Primer_Apellido_R']?>">
			<input type="hidden" name="Segundo_Apellido_R" value="<?php echo $_POST['Segundo_Apellido_R']?>">
			<input type="hidden" name="G??nero_R" value="<?php echo $_POST['G??nero_R']?>">
			<input type="hidden" name="Tipo_C??dula_R" value="<?php echo $_POST['Tipo_C??dula_R']?>">
			<input type="hidden" name="C??dula_R" value="<?php echo $_POST['C??dula_R']?>">
			<input type="hidden" name="Fecha_Nacimiento_R" value="<?php echo $_POST['Fecha_Nacimiento_R']?>">
			<input type="hidden" name="Lugar_Nacimiento_R" value="<?php echo $_POST['Lugar_Nacimiento_R']?>">
			<input type="hidden" name="Correo_electr??nico_R" value="<?php echo $_POST['Correo_electr??nico_R']?>">
			<input type="hidden" name="Estado_Civil_R" value="<?php echo $_POST['Estado_Civil_R']?>">
			<input type="hidden" name="Direcci??n_R" value="<?php echo $_POST['Direcci??n_R']?>">
			<input type="hidden" name="Prefijo_Principal_R" value="<?php echo $_POST['Prefijo_Principal_R']?>">
			<input type="hidden" name="Tel??fono_Principal_R" value="<?php echo $_POST['Tel??fono_Principal_R']?>">
			<input type="hidden" name="Prefijo_Secundario_R" value="<?php echo $_POST['Prefijo_Secundario_R']?>">
			<input type="hidden" name="Tel??fono_Secundario_R" value="<?php echo $_POST['Tel??fono_Secundario_R']?>">
			<input type="hidden" name="Prefijo_Auxiliar_R" value="<?php echo $_POST['Prefijo_Auxiliar_R']?>">
			<input type="hidden" name="Tel??fono_Auxiliar_R" value="<?php echo $_POST['Tel??fono_Auxiliar_R']?>">
			<input type="hidden" name="Grado_Instrucci??n_R" value="<?php echo $_POST['Grado_Instrucci??n_R']?>">
			<input type="hidden" name="Tiene_Carnet_Patria_R" value="<?php echo $_POST['Tiene_Carnet_Patria_R']?>">
			<input type="hidden" name="C??digo_Carnet_Patria_R" value="<?php echo $_POST['C??digo_Carnet_Patria_R']?>">
			<input type="hidden" name="Serial_Carnet_Patria_R" value="<?php echo $_POST['Serial_Carnet_Patria_R']?>">
			<input type="hidden" name="Condici??n_vivienda_R" value="<?php echo $_POST['Condici??n_vivienda_R']?>">
			<input type="hidden" name="Tipo_Vivienda_R" value="<?php echo $_POST['Tipo_Vivienda_R']?>">
			<input type="hidden" name="Tenencia_vivienda_R" value="<?php echo $_POST['Tenencia_vivienda_R']?>">
			<input type="hidden" name="Tenencia_vivienda_R_Otro" value="<?php echo $_POST['Tenencia_vivienda_R_Otro']?>">
			<input type="hidden" name="Banco" value="<?php echo $_POST['Banco']?>">
			<input type="hidden" name="Tipo_Cuenta" value="<?php echo $_POST['Tipo_Cuenta']?>">
			<input type="hidden" name="Nro_Cuenta" value="<?php echo $_POST['Nro_Cuenta']?>">
			<input type="hidden" name="Representante_Trabaja" value="<?php echo $_POST['Representante_Trabaja']?>">
			<input type="hidden" name="Empleo_R" value="<?php echo $_POST['Empleo_R']?>">
			<input type="hidden" name="Prefijo_Trabajo_R" value="<?php echo $_POST['Prefijo_Trabajo_R']?>">
			<input type="hidden" name="Tel??fono_Trabajo_R" value="<?php echo $_POST['Tel??fono_Trabajo_R']?>">
			<input type="hidden" name="Lugar_Trabajo_R" value="<?php echo $_POST['Lugar_Trabajo_R']?>">
			<input type="hidden" name="Remuneraci??n_R" value="<?php echo $_POST['Remuneraci??n_R']?>">
			<input type="hidden" name="Tipo_Remuneraci??n_R" value="<?php echo $_POST['Tipo_Remuneraci??n_R']?>">
			<input type="hidden" name="Primer_Nombre_Aux" value="<?php echo $_POST['Primer_Nombre_Aux']?>">
			<input type="hidden" name="Segundo_Nombre_Aux" value="<?php echo $_POST['Segundo_Nombre_Aux']?>">
			<input type="hidden" name="Primer_Apellido_Aux" value="<?php echo $_POST['Primer_Apellido_Aux']?>">
			<input type="hidden" name="Segundo_Apellido_Aux" value="<?php echo $_POST['Segundo_Apellido_Aux']?>">
			<input type="hidden" name="G??nero_Aux" value="<?php echo $_POST['G??nero_Aux']?>">
			<input type="hidden" name="Tipo_C??dula_Aux" value="<?php echo $_POST['Tipo_C??dula_Aux']?>">
			<input type="hidden" name="C??dula_Aux" value="<?php echo $_POST['C??dula_Aux']?>">
			<input type="hidden" name="Correo_electr??nico_Aux" value="<?php echo $_POST['Correo_electr??nico_Aux']?>">
			<input type="hidden" name="Prefijo_Principal_Aux" value="<?php echo $_POST['Prefijo_Principal_Aux']?>">
			<input type="hidden" name="Tel??fono_Principal_Aux" value="<?php echo $_POST['Tel??fono_Principal_Aux']?>">
			<input type="hidden" name="Prefijo_Secundario_Aux" value="<?php echo $_POST['Prefijo_Secundario_Aux']?>">
			<input type="hidden" name="Tel??fono_Secundario_Aux" value="<?php echo $_POST['Tel??fono_Secundario_Aux']?>">
			<input type="hidden" name="Prefijo_Auxiliar_Aux" value="<?php echo $_POST['Prefijo_Auxiliar_Aux']?>">
			<input type="hidden" name="Tel??fono_Auxiliar_Aux" value="<?php echo $_POST['Tel??fono_Auxiliar_Aux']?>">
			<input type="hidden" name="Direcci??n_Aux" value="<?php echo $_POST['Direcci??n_Aux']?>">
			<input type="hidden" name="Relaci??n_Auxiliar" value="<?php echo $_POST['Relaci??n_Auxiliar']?>">
			<!--Bot??n para guardar-->
			<div class="card-footer">
				<input type="hidden" name="orden" value="Insertar">
				<button class="btn btn-primary" type="submit" onclick="enviar();">Registrar estudiante</button>
			</div>
		</form>
		<!--Footer-->
		<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 position-fixed bottom-0">
			<span class="text-white">Sistema de inscripci??n L.B. G.P.F - <i class="far fa-copyright"></i> 2022-<?php echo date("Y"); ?></span>
		</footer>
		<?php include '../../ayuda.php';?>
<script type="text/javascript" src="../../js/sweetalert2.js"></script>
<script type="text/javascript" src="../../js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../../js/validaciones-estudiante.js"></script>
<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
<script>
function enviar() {
	var FormularioEstudiante = document.getElementById("FormularioEstudiante");
	var a = document.getElementById("seccion1");
	var b = document.getElementById("seccion2");
	var c = document.getElementById("seccion3");
	var d = document.getElementById("seccion4");
	var e = document.getElementById("seccion5");
	var f = document.getElementById("seccion6");


	a.style.display = "block";
	b.style.display = "block";
	c.style.display = "block";
	d.style.display = "block";
	e.style.display = "block";
	f.style.display = "block";

	if (FormularioEstudiante.checkValidity()) {
		FormularioEstudiante.submit();
	}
	else {
		Swal.fire(
	      'Atenci??n',
	      'Faltan campos por llenar',
	      'info'
	    );
	}

	a.style.display = "block";
	b.style.display = "none";
	c.style.display = "none";
	d.style.display = "none";
	e.style.display = "none";
	f.style.display = "none";

}
	function seccion(seccion) {

		//secciones
		var a = document.getElementById("seccion1");
		var b = document.getElementById("seccion2");
		var c = document.getElementById("seccion3");
		var d = document.getElementById("seccion4");
		var e = document.getElementById("seccion5");
		var f = document.getElementById("seccion6");


		//botones en la navegaci??n
		var link_a = document.getElementById("link1");
		var link_b = document.getElementById("link2");
		var link_c = document.getElementById("link3");
		var link_d = document.getElementById("link4");
		var link_e = document.getElementById("link5");
		var link_f = document.getElementById("link6");


		//seccion seleccionada como activa(seccion 1 por defecto)
		var seccion = document.getElementById(seccion);

		a.style.display = "none";
		b.style.display = "none";
		c.style.display = "none";
		d.style.display = "none";
		e.style.display = "none";
		f.style.display = "none";

		link_a.classList.remove("active");
		link_b.classList.remove("active");
		link_c.classList.remove("active");
		link_d.classList.remove("active");
		link_e.classList.remove("active");
		link_f.classList.remove("active");


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
		else if (seccion == e) {
			e.style.display = "block";
			link_e.classList.add("active");
		}
		else if (seccion == f) {
			f.style.display = "block";
			link_f.classList.add("active");
		}
	}
</script>
</body>
</html>
