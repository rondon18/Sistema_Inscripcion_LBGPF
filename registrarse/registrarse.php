<?php ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registro - Datos del representante</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
	<link rel="stylesheet" type="text/css" href="../css/all.min.css"/>
</head>
<body>
	<!--Banner-->
	<header class="w-100 bg-white d-flex justify-content-between shadow p-1 position-fixed top-0" style="z-index:1000;" style="z-index:1000;">
		<div>
			<img src="../img/banner-gobierno.png" alt=""  height="42" class="d-inline-block align-text-top">
			<img src="../img/banner-MPPE.png" alt=""  height="42" class="d-inline-block align-text-top">
		</div>
		<img src="../img/banner-LGPF.png" alt=""  height="42" class="d-inline-block align-text-top">
	</header>
	<form id="registro" action="../controladores/control-usuarios.php" method="POST" style="max-width: 600px; margin: 75px auto;" onsubmit='enviar();'>
		<div class="card">
			<!--Datos del representante-->
			<div class="card-header py-3">
				<h2>Formulario de registro de usuario.</h2>
			</div>
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a id="link1" class="nav-link active" href="#" onclick="seccion('seccion1')">Datos personales</a>
				</li>
				<li class="nav-item">
					<a id="link2" class="nav-link" href="#" onclick="seccion('seccion2')">Datos de usuario</a>
				</li>
			</ul>
			<div class="card-body">
				<section id="seccion1">
					<!--Nombres del representante-->
					<div>

						<label class="form-label">Nombres:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
						<div class="input-group mb-2">
							<input type="text" class="form-control mb-2" name="Primer_Nombre_U" id="Primer_Nombre_U" placeholder="Primer nombre" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required>
							<input type="text" class="form-control mb-2" name="Segundo_Nombre_U" id="Segundo_Nombre_U" placeholder="Segundo nombre" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required>
						</div>
					</div>
					<!--Apellidos del representante-->
					<div>
						<label class="form-label">Apellidos:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
						<div class="input-group mb-2">
							<input type="text" class="form-control mb-2" name="Primer_Apellido_U" id="Primer_Apellido_U" placeholder="Primer apellido" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required>
							<input type="text" class="form-control mb-2" name="Segundo_Apellido_U" id="Segundo_Apellido_U" placeholder="Segundo apellido" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required>
						</div>
					</div>
					<!--Género del representante-->
					<div>
						<p>Género:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></p>
						<div class="pt-2 px-2 pb-0 bg-light border rounded">
							<div class="form-check form-check-inline">
								<label class="form-label">F </label>
								<input class="form-check-input" type="radio" name="Género_U" value="F" required>
							</div>

							<div class="form-check form-check-inline">
								<label class="form-label">M </label>
								<input class="form-check-input" type="radio" name="Género_U" value="M" required>
							</div>
						</div>
					</div>
					<!--Cédula del representante-->
					<div>
						<label for="Cédula_U" class="form-label">Cédula:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
						<div class="input-group mb-2" required>
							<select class="form-select" name="Tipo_Cédula_U">
								<option selected disabled>Nacionaldad</option>
								<option value="V">V</option>
								<option value="E">E</option>
							</select>
							<input type="text" class="form-control" name="Cédula_U" id="Cédula_U" pattern="[0-	9]+" maxlength="8" minlength="7" title="Debe ingresar al menos 7 caracteres e ingresar unicamente números" required>
						</div>
					</div>
					<!--Fecha de nacimiento del representante-->
					<div>
						<label class="form-label">Fecha de nacimiento:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
						<input type="date" class="form-control mb-2" name="Fecha_Nacimiento_U" id="Fecha_Nacimiento_U" min="<?php echo date('Y')-100 .'-01-01'?>" max="<?php echo date('Y')-18 .'-01-01'?>" title="Debe tener al menos 18 años." required>
					</div>
					<!--Correo Electrónico del representante-->
					<div>
						<label class="form-label">Correo electrónico:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
						<input type="email" class="form-control mb-2" name="Correo_electrónico_U" id="Correo_electrónico_U" minlength="15" required>
					</div>
				</section>
				<section id="seccion2" style="display: none;">
					<!--Contraseña y validación-->
					<div>
						<span>Contraseña:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
						<div class="input-group mb-2">
							<?php
							$requisitos = "La contraseña debe tener al menos 8 caracteres e incluir: mayusculas, minusculas, simbolos y números";
							$patron = '(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$';
							?>
							<input class="form-control mb-2" type="password" name="Contraseña" placeholder="Contraseña" pattern="<?php echo $patron;?>" title="<?php echo $requisitos;?>">
							<input class="form-control mb-2" type="password" name="RepetirContraseña" placeholder="Repertir la contraseña" pattern="<?php echo $patron;?>" title="<?php echo $requisitos;?>">
						</div>
						<small class="d-inline-block form-text">La contraseña debe tener al menos 8 caracteres e incluir: mayúsculas, minúsculas, símbolos y números</small>
					</div>
					<!--Preguntas de seguridad-->
					<h5>Preguntas de seguridad:</h5>

					<label for="" class="form-label">Pregunta 1:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
					<select name="Pregunta_Seg_1" class="form-select mb-2" required>
						<option selected disabled>Seleccione una opción</option>
						<option value="Ciudad de tu luna de miel">Ciudad de tu luna de miel</option>
						<option value="Ciudad donde naciste">Ciudad donde naciste</option>
						<option value="Ciudad preferida de vacaciones">Ciudad preferida de vacaciones</option>
						<option value="Color que más te gusta">Color que más te gusta</option>
						<option value="¿Cuál es tu comida favorita?">¿Cuál es tu comida favorita?</option>
						<option value="¿Cuál es tu heroe favorito?">¿Cuál es tu héroe favorito?</option>
						<option value="¿Cuál fue tu primer número de Teléfono?">¿Cuál fue tu primer número de Teléfono?</option>
						<option value="Equipo deportivo preferido">Equipo deportivo preferido</option>
						<option value="Fecha de aniversario de bodas">Fecha de aniversario de bodas</option>
						<option value="Fecha de nacimiento de tu padre">Fecha de nacimiento de tu padre</option>
						<option value="Fecha de tu graduación">Fecha de tu graduación</option>
						<option value="Fruta favorita">Fruta favorita</option>
					</select>
					<input name="Respuesta_1" type="text" placeholder="Respuesta a la pregunta" class="form-control mb-2" minlength="3" maxlength="50" required>

					<label for="" class="form-label">Pregunta 2:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
					<select name="Pregunta_Seg_2" class="form-select mb-2" required>
						<option selected disabled>Seleccione una opción</option>
						<option value="Ciudad de tu luna de miel">Ciudad de tu luna de miel</option>
						<option value="Ciudad donde naciste">Ciudad donde naciste</option>
						<option value="Ciudad preferida de vacaciones">Ciudad preferida de vacaciones</option>
						<option value="Color que más te gusta">Color que más te gusta</option>
						<option value="¿Cuál es tu comida favorita?">¿Cuál es tu comida favorita?</option>
						<option value="¿Cuál es tu heroe favorito?">¿Cuál es tu héroe favorito?</option>
						<option value="¿Cuál fue tu primer número de Teléfono?">¿Cuál fue tu primer número de Teléfono?</option>
						<option value="Equipo deportivo preferido">Equipo deportivo preferido</option>
						<option value="Fecha de aniversario de bodas">Fecha de aniversario de bodas</option>
						<option value="Fecha de nacimiento de tu padre">Fecha de nacimiento de tu padre</option>
						<option value="Fecha de tu graduación">Fecha de tu graduación</option>
						<option value="Fruta favorita">Fruta favorita</option>
					</select>
					<input name="Respuesta_2" type="text" placeholder="Respuesta a la pregunta" class="form-control mb-2" minlength="3" maxlength="50" required>
				</section>
			</div>
			<div class="card-footer">
				<input type="hidden" name="orden" value="Insertar">
				<a class="btn btn-primary" href="../index.php">Volver al inicio</a>
				<input class="btn btn-primary" type="submit" value="Guardar y continuar">
			</div>
		</div>
	</form>
	<!--Footer-->
	<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 position-fixed bottom-0">
		<span class="text-white">Sistema de inscripción L.B. G.P.F - <i class="far fa-copyright"></i> 2022-<?php echo date("Y"); ?></span>
	</footer>
	<?php include '../ayuda.php'; ?>
<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../js/validaciones.js"></script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
<script>
	function enviar() {
		var a = document.getElementById("seccion1");
		var b = document.getElementById("seccion2");
		a.style.display = "block";
		b.style.display = "block";
	}

	function seccion(seccion) {
		//secciones
		var a = document.getElementById("seccion1");
		var b = document.getElementById("seccion2");

		//botones en la navegación
		var link_a = document.getElementById("link1");
		var link_b = document.getElementById("link2");

		//seccion seleccionada como activa(seccion 1 por defecto)
		var seccion = document.getElementById(seccion);

		a.style.display = "none";
		b.style.display = "none";

		link_a.classList.remove("active");
		link_b.classList.remove("active");

		if (seccion == a) {
			a.style.display = "block";
			link_a.classList.add("active");
		}
		else if (seccion == b) {
			b.style.display = "block";
			link_b.classList.add("active");
		}
	}
</script>
</body>
</html>
