<?php
	require_once('clases/personas.php');
	require_once('clases/usuarios.php');

	$usuario = new usuarios();


	$datos_usuario = NULL;

	if (isset($_POST['nacionalidad'],$_POST['cedula'])) {
		require_once('controladores/conexion.php');
		$cedula = $_POST['nacionalidad'].$_POST['cedula'];
		$usuario->set_cedula_persona($cedula);
		if ($datos_usuario = $usuario->consultar_usuario()) {
			$nombre = $datos_usuario['p_nombre']. " " .$datos_usuario['p_apellido'];
			$pregunta_1 = $datos_usuario['pregunta_seg_1'];
			$pregunta_2 = $datos_usuario['pregunta_seg_2'];
			// $respuesta_1 = $datos_usuario['respuesta_1'];
			// $respuesta_2 = $datos_usuario['respuesta_2'];
		}
		else {
			header('Location: index.php?error_cedula');

		}
	}
?>

<?php if (isset($_GET["contrasenia_olvidada"])): ?>
	<?php if (!isset($_POST['nacionalidad'],$_POST['cedula'])): ?>
		
		<form id="login" action="index.php?contrasenia_olvidada" method="POST" class="col-lg-8 p-5">
				
			<h3 class="mb-5">
				<i class="fa-solid fa-lg fa-lock me-2"></i>
				Contraseña olvidada
			</h3>



			<div class="row">
				<div class="col-12 col-md-4 mb-2">
					<label for="nacionalidad" class="form-label requerido">
						Nacionalidad:
					</label>
					<!-- Campo de nacionalidad -->
					<select 
						class="form-select" 
						name="nacionalidad" 
						required
					>
						<option selected value="">Nacionalidad</option>
						<option value="V">Venezolano(a)</option>
						<option value="E">Extrajero(a)</option>
					</select>
				</div>
				<div class="col-12 col-md-8 mb-2">
					<label for="cedula" class="form-label requerido">Cédula:</label>
					<!-- Campo del número de cedula -->
					<input 
						id="cedula" 
						class="form-control" 
						type="text" 
						name="cedula" 
						maxlength="8" 
						placeholder="Cedula de usuario"
						autocomplete="off" 
						required
					>
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-12 col-lg mb-2 d-flex gap-3 justify-content-start">
					<a class="btn btn-primary" href="index.php">
						<i class="fa-solid fa-xl me-2 fa-home"></i>
						Volver
					</a>
					<button class="btn btn-primary" type="submit" name="verificar_datos" value="Verificar">
						Verificar datos
						<i class="fa-solid fa-lg fa-search ms-2"></i>
					</button>
				</div>
			</div>
		</form>

	<?php else: ?>

		<form id="login" action="controladores/login.php" method="POST" class="col-lg-8 p-5">
				
			<h3 class="mb-5">
				<i class="fa-solid fa-lg fa-lock me-2"></i>
				Contraseña olvidada
			</h3>

			<div class="row">
				<div class="col-12 mb-3">	
					<span class="form-text">
						Preguntas de seguridad de <b><?php echo $nombre; ?></b>
					</span>
				</div>
			</div>

			<input type="hidden" name="cedula" value="<?php echo $cedula;?>">

			<div class="row">
				<div class="col-12 mb-2">
					<label for="cedula" class="form-label">Pregunta 1: <?php echo $pregunta_1;?></label>
					<!-- Campo del número de cedula -->
					<input 
						id="pregunta_1" 
						class="form-control" 
						type="text" 
						name="respuesta_1" 
						placeholder="Respuesta a la pregunta"
						required 
					>
				</div>
			</div>
			
			<div class="row">
				<div class="col-12 mb-2">
					<label for="cedula" class="form-label">Pregunta 2: <?php echo $pregunta_2;?></label>
					<!-- Campo del número de cedula -->
					<input 
						id="pregunta_2" 
						class="form-control" 
						type="text" 
						name="respuesta_2"  
						placeholder="Respuesta a la pregunta"
						required 
					>
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-12 col-lg mb-2 d-flex gap-3 justify-content-start">
					<a class="btn btn-primary" href="index.php">
						<i class="fa-solid fa-xl me-2 fa-home"></i>
						Volver
					</a>
					<button class="btn btn-primary" type="submit" name="verificar_preguntas" value="Verificar">
						Verificar respuestas
						<i class="fa-solid fa-lg fa-search ms-2"></i>
					</button>
				</div>
			</div>
		</form>

	<?php endif ?>
<?php else: ?>
	<?php header("Location: index.php"); ?>
<?php endif ?>

