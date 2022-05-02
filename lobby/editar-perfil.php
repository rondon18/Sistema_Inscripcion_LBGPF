<?php
session_start();
if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

?>

<!-- <script type="text/javascript">

	function validacion() {
		var todo_correcto;
		todo_correcto = true;
		var expresion = /^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;

		if(document.getElementById('Primer_Nombre_R').value.length < 2){
    		todo_correcto = false;

		}
		else if (typeof(document.getElementById('Primer_Nombre_R').value)=='number') {
			todo_correcto = false;
		}

		if(document.getElementById('Segundo_Nombre_R').value.length < 2){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Segundo_Nombre_R').value)=='number') {
			todo_correcto = false;
		}

		if(document.getElementById('Primer_Apellido_R').value.length < 2){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Primer_Apellido_R').value)=='number') {
			todo_correcto = false;
		}

		if(document.getElementById('Segundo_Apellido_R').value.length < 2){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Segundo_Apellido_R').value)=='number') {
			todo_correcto = false;
		}

		if(document.getElementById('Cédula_R').value.length < 7 || document.getElementById('Cédula_R').value.length > 8){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Cédula_R').value)=='string') {
			todo_correcto = false;
		}

		if(document.getElementById('Fecha_Nacimiento_R').value.length > 10){
    		todo_correcto = false;
		}

		if(document.getElementById('Lugar_Nacimiento_R').value.length < 3){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Lugar_Nacimiento_R').value)=='number') {
			todo_correcto = false;
		}

		if(document.getElementById('Correo_electrónico_R').value.length < 15){
    		todo_correcto = false;
		}
		else if (!expresion.exec(document.getElementById('Correo_electrónico_R').value)) {
			todo_correcto = false;
		}

		if(document.getElementById('Direccion_R').value.length < 10){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Direccion_R').value)=='number') {
			todo_correcto = false;
		}

		if(document.getElementById('Prefijo_Principal_R').value.length < 4){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Prefijo_Principal_R').value)=='string') {
			todo_correcto = false;
		}

		if(document.getElementById('Teléfono_Principal_R').value.length < 7){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Teléfono_Principal_R').value)=='string') {
			todo_correcto = false;
		}

		if(document.getElementById('Prefijo_Secundario_R').value.length < 4){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Prefijo_Secundario_R').value)=='string') {
			todo_correcto = false;
		}

		if(document.getElementById('Teléfono_Secundario_R').value.length < 7){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Teléfono_Secundario_R').value)=='string') {
			todo_correcto = false;
		}

		if(document.getElementById('Prefijo_Auxiliar_R').value.length < 4){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Prefijo_Auxiliar_R').value)=='string') {
			todo_correcto = false;
		}

		if(document.getElementById('Teléfono_Auxiliar_R').value.length < 7){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Teléfono_Auxiliar_R').value)=='string') {
			todo_correcto = false;
		}

		if (typeof(document.getElementById('Otro_Vinculo').value)=='number') {
			todo_correcto = false;
		}

		if(document.getElementById('Nro_Cuenta').value.length > 20){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Nro_Cuenta').value)=='string') {
			todo_correcto = false;
		}

		if(document.getElementById('Empleo_R').value.length < 5){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Empleo_R').value)=='number') {
			todo_correcto = false;
		}

		if(document.getElementById('Prefijo_Trabajo_R').value.length < 4){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Prefijo_Trabajo_R').value)=='string') {
			todo_correcto = false;
		}

		if(document.getElementById('Teléfono_Trabajo_R').value.length < 7){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Teléfono_Trabajo_R').value)=='string') {
			todo_correcto = false;
		}

		if(document.getElementById('Lugar_Trabajo_R').value.length < 5){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Lugar_Trabajo_R').value)=='number') {
			todo_correcto = false;
		}

		if(document.getElementById('Remuneración').value.length < 1){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Remuneración').value)=='string') {
			todo_correcto = false;
		}

		if(document.getElementById('Primer_Nombre_Representante').value.length < 3){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Primer_Nombre_Representante').value)=='number') {
			todo_correcto = false;
		}

		if(document.getElementById('Segundo_Nombre_Representante').value.length < 3){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Segundo_Nombre_Representante').value)=='number') {
			todo_correcto = false;
		}

		if(document.getElementById('Primer_Apellido_Representante').value.length < 3){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Primer_Apellido_Representante').value)=='number') {
			todo_correcto = false;
		}

		if(document.getElementById('Segundo_Apellido_Representante').value.length < 3){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Segundo_Apellido_Representante').value)=='number') {
			todo_correcto = false;
		}

		if(document.getElementById('Cédula_Representante').value.length < 7 || document.getElementById('Cédula_Representante').value.length > 8){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Cédula_Representante').value)=='string') {
			todo_correcto = false;
		}

		if(document.getElementById('Correo_electrónico').value.length < 15){
    		todo_correcto = false;
		}
		else if (!expresion.exec(document.getElementById('Correo_electrónico').value)) {
			todo_correcto = false;
		}

		if(document.getElementById('Prefijo_Principal_Representante').value.length < 4){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Prefijo_Principal_Representante').value)=='string') {
			todo_correcto = false;
		}

		if(document.getElementById('Teléfono_Principal_Representante').value.length < 7){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Teléfono_Principal_Representante').value)=='string') {
			todo_correcto = false;
		}

		if(document.getElementById('Prefijo_Secundario_Representante').value.length < 4){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Prefijo_Secundario_Representante').value)=='string') {
			todo_correcto = false;
		}

		if(document.getElementById('Teléfono_Secundario_Representante').value.length < 7){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Teléfono_Secundario_Representante').value)=='string') {
			todo_correcto = false;
		}

		if(document.getElementById('Prefijo_Auxiliar_Representante').value.length < 4){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Prefijo_Auxiliar_Representante').value)=='string') {
			todo_correcto = false;
		}

		if(document.getElementById('Teléfono_Auxiliar_Representante').value.length < 7){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Teléfono_Auxiliar_Representante').value)=='string') {
			todo_correcto = false;
		}

		if(document.getElementById('Direccion_Representante').value.length < 10){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Direccion_Representante').value)=='number') {
			todo_correcto = false;
		}

		if(document.getElementById('Nombre_Contacto_Emergencia').value.length < 5){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Nombre_Contacto_Emergencia').value)=='number') {
			todo_correcto = false;
		}

		if(document.getElementById('Relación_Auxiliar').value.length < 5){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Relación_Auxiliar').value)=='number') {
			todo_correcto = false;
		}

		if(document.getElementById('Tfl_P_Contacto_Aux').value.length < 4){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Tfl_P_Contacto_Aux').value)=='string') {
			todo_correcto = false;
		}

		if(document.getElementById('Tfl_S_Contacto_Aux').value.length < 7){
    		todo_correcto = false;
		}
		else if (typeof(document.getElementById('Tfl_S_Contacto_Aux').value)=='string') {
			todo_correcto = false;
		}

		if (todo_correcto=false) {
			alert('Hay errores en el formulario, por favor corríjalos')
		}
	}
</script> -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registro - Datos del representante</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/colores.css"/>
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
				<h2>Editar perfil.</h2>
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

						<label class="form-label">Nombres:<span class="text-danger">*</span></label>
						<div class="input-group mb-2">
							<input type="text" class="form-control mb-2" name="Primer_Nombre_U" id="Primer_Nombre_U" placeholder="Primer nombre" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required value="<?php echo $_SESSION['persona']['Primer_Nombre'] ?? NULL ?>">
							<input type="text" class="form-control mb-2" name="Segundo_Nombre_U" id="Segundo_Nombre_U" placeholder="Segundo nombre" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required value="<?php echo $_SESSION['persona']['Segundo_Nombre'] ?? NULL ?>">
						</div>
					</div>
					<!--Apellidos del representante-->
					<div>
						<label class="form-label">Apellidos:<span class="text-danger">*</span></label>
						<div class="input-group mb-2">
							<input type="text" class="form-control mb-2" name="Primer_Apellido_U" id="Primer_Apellido_U" placeholder="Primer apellido" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required value="<?php echo $_SESSION['persona']['Primer_Apellido'] ?? NULL ?>">
							<input type="text" class="form-control mb-2" name="Segundo_Apellido_U" id="Segundo_Apellido_U" placeholder="Segundo apellido" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required value="<?php echo $_SESSION['persona']['Segundo_Apellido'] ?? NULL ?>">
						</div>
					</div>
					<!--Genero del representante-->
					<div>
						<p>Genero:<span class="text-danger">*</span></p>
						<div class="pt-2 px-2 pb-0 bg-light border rounded">
							<div class="form-check form-check-inline">
								<label class="form-label">F </label>
								<input class="form-check-input" type="radio" name="Genero_U" value="F" required <?php if($_SESSION['persona']['Género'] == "F"){echo "checked";} ?>>
							</div>

							<div class="form-check form-check-inline">
								<label class="form-label">M </label>
								<input class="form-check-input" type="radio" name="Genero_U" value="M" required <?php if($_SESSION['persona']['Género'] == "M"){echo "checked";} ?>>
							</div>
						</div>
					</div>
					<!--Cédula del representante-->
					<?php
					#Separa la cédula del caracter que indica si es venezolana o extranjera
					$tipo_cedula = substr($_SESSION['persona']['Cédula'],0,1);
					$cedula			= substr($_SESSION['persona']['Cédula'],1,strlen($_SESSION['persona']['Cédula'])-1);
				 	?>
					<div>
						<label for="Cédula_U" class="form-label">Cédula:<span class="text-danger">*</span></label>
						<div class="input-group mb-2">
							<select class="form-select" name="Tipo_Cédula_U">
								<option selected disabled>Tipo de cédula</option>
								<option value="V" <?php if($tipo_cedula == "V") {echo "selected";}?>>V</option>
								<option value="E" <?php if($tipo_cedula == "E") {echo "selected";}?>>E</option>
							</select>
							<input type="text" class="form-control w-auto" name="Cédula_U" id="Cédula_U" pattern="[0-9]+" maxlength="8" minlength="7" title="Debe ingresar al menos 7 caracteres e ingresar unicamente números" required value="<?php echo $cedula ?? NULL ?>">
						</div>

					</div>
					<!--Fecha de nacimiento del representante-->
					<div>
						<label class="form-label">Fecha de nacimiento:<span class="text-danger">*</span></label>
						<input type="date" class="form-control mb-2" name="Fecha_Nacimiento_U" id="Fecha_Nacimiento_U" min="<?php echo date('Y')-100 .'-01-01'?>" max="<?php echo date('Y')-18 .'-01-01'?>" title="Debe tener al menos 18 años." required value="<?php echo $_SESSION['persona']['Fecha_Nacimiento'] ?? NULL ?>">
					</div>
					<!--Correo electronico del representante-->
					<div>
						<label class="form-label">Correo electrónico:<span class="text-danger">*</span></label>
						<input type="email" class="form-control mb-2" name="Correo_electrónico_U" id="Correo_electrónico_U" minlength="15" required value="<?php echo $_SESSION['persona']['Correo_Electrónico'] ?? NULL ?>">
					</div>
				</section>
				<section id="seccion2" style="display: none;">
					<!--Contraseña y validación-->
					<div>
						<h5>Cambiar contraseña:</h5>
						<span>Contraseña:</span>
						<div class="input-group mb-2">
							<?php
							$requisitos = "La contraseña debe tener al menos 8 caracteres e incluir: mayusculas, minusculas, simbolos y números";
							$patron = '(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$';
							?>
							<input class="form-control mb-2" type="password" name="Contraseña" placeholder="Contraseña" pattern="<?php echo $patron;?>" title="<?php echo $requisitos;?>">
							<input class="form-control mb-2" type="password" name="RepetirContraseña" placeholder="Repertir la contraseña" pattern="<?php echo $patron;?>" title="<?php echo $requisitos;?>">
						</div>
						<small class="d-inline-block form-text">La contraseña debe tener al menos 8 caracteres e incluir: mayusculas, minusculas, simbolos y números</small>
					</div>
					<!--Preguntas de seguridad-->
					<h5>Preguntas de seguridad:</h5>

					<label for="" class="form-label">Pregunta 1:<span class="text-danger">*</span></label>
					<select name="Pregunta_Seg_1" class="form-select mb-2" required>
						<option selected disabled>Seleccione una opción</option>
						<option value="Ciudad de tu luna de miel" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "Ciudad de tu luna de miel"){echo "selected";}?>>Ciudad de tu luna de miel</option>
						<option value="Ciudad donde naciste" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "Ciudad donde naciste"){echo "selected";}?>>Ciudad donde naciste</option>
						<option value="Ciudad preferida de vacaciones" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "Ciudad preferida de vacaciones"){echo "selected";}?>>Ciudad preferida de vacaciones</option>
						<option value="Color que más te gusta" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "Color que más te gusta"){echo "selected";}?>>Color que más te gusta</option>
						<option value="¿Cuál es tu comida favorita?" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "¿Cuál es tu comida favorita?"){echo "selected";}?>>¿Cuál es tu comida favorita?</option>
						<option value="¿Cuál es tu heroe favorito?" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "¿Cuál es tu heroe favorito?"){echo "selected";}?>>¿Cuál es tu heroe favorito?</option>
						<option value="¿Cuál fue tu primer número de telefono?" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "¿Cuál fue tu primer número de telefono?"){echo "selected";}?>>¿Cuál fue tu primer número de telefono?</option>
						<option value="Equipo deportivo preferido" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "Equipo deportivo preferido"){echo "selected";}?>>Equipo deportivo preferido</option>
						<option value="Fecha de aniversario de bodas" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "Fecha de aniversario de bodas"){echo "selected";}?>>Fecha de aniversario de bodas</option>
						<option value="Fecha de nacimiento de tu padre" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "Fecha de nacimiento de tu padre"){echo "selected";}?>>Fecha de nacimiento de tu padre</option>
						<option value="Fecha de tu graduación" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "Fecha de tu graduación"){echo "selected";}?>>Fecha de tu graduación</option>
						<option value="Fruta favorita" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "Fruta favorita"){echo "selected";}?>>Fruta favorita</option>
					</select>
					<input name="Respuesta_1" type="text" placeholder="Respuesta a la pregunta" class="form-control mb-2" minlength="3" maxlength="50" required value="<?php echo $_SESSION['usuario']['Respuesta_1'] ?? NULL ?>">

					<label for="" class="form-label">Pregunta 2:<span class="text-danger">*</span></label>
					<select name="Pregunta_Seg_2" class="form-select mb-2" required>
						<option selected disabled>Seleccione una opción</option>
						<option value="Ciudad de tu luna de miel" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "Ciudad de tu luna de miel"){echo "selected";}?>>Ciudad de tu luna de miel</option>
						<option value="Ciudad donde naciste" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "Ciudad donde naciste"){echo "selected";}?>>Ciudad donde naciste</option>
						<option value="Ciudad preferida de vacaciones" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "Ciudad preferida de vacaciones"){echo "selected";}?>>Ciudad preferida de vacaciones</option>
						<option value="Color que más te gusta" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "Color que más te gusta"){echo "selected";}?>>Color que más te gusta</option>
						<option value="¿Cuál es tu comida favorita?" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "¿Cuál es tu comida favorita?"){echo "selected";}?>>¿Cuál es tu comida favorita?</option>
						<option value="¿Cuál es tu heroe favorito?" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "¿Cuál es tu heroe favorito?"){echo "selected";}?>>¿Cuál es tu heroe favorito?</option>
						<option value="¿Cuál fue tu primer número de telefono?" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "¿Cuál fue tu primer número de telefono?"){echo "selected";}?>>¿Cuál fue tu primer número de telefono?</option>
						<option value="Equipo deportivo preferido" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "Equipo deportivo preferido"){echo "selected";}?>>Equipo deportivo preferido</option>
						<option value="Fecha de aniversario de bodas" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "Fecha de aniversario de bodas"){echo "selected";}?>>Fecha de aniversario de bodas</option>
						<option value="Fecha de nacimiento de tu padre" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "Fecha de nacimiento de tu padre"){echo "selected";}?>>Fecha de nacimiento de tu padre</option>
						<option value="Fecha de tu graduación" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "Fecha de tu graduación"){echo "selected";}?>>Fecha de tu graduación</option>
						<option value="Fruta favorita" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "Fruta favorita"){echo "selected";}?>>Fruta favorita</option>
					</select>
					<input name="Respuesta_2" type="text" placeholder="Respuesta a la pregunta" class="form-control mb-2" minlength="3" maxlength="50" required value="<?php echo $_SESSION['usuario']['Respuesta_2'] ?? NULL ?>">
				</section>
			</div>
			<div class="card-footer">
				<input type="hidden" name="orden" value="Editar">
				<a class="btn btn-primary" href="index.php">Volver al inicio</a>
				<input class="btn btn-primary" type="submit" value="Guardar y continuar">
			</div>
		</div>
	</form>

	<!--Footer-->
	<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 position-fixed bottom-0">
		<span class="text-white">Sistema de inscripción L.B. GPF - <i class="far fa-copyright"></i> 2022-<?php echo date("Y"); ?></span>
	</footer>

	<?php include '../ayuda.php';?>

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
