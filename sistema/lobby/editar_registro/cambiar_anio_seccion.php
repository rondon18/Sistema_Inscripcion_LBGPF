<?php

	include("funciones.php");
	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../index.php');
		exit();
	}

	require('../../controladores/conexion.php');
	require('../../clases/personas.php');
	require('../../clases/estudiantes.php');

	// estudiante
	$estudiantes = new estudiantes();

	$estudiantes->set_cedula_persona($_POST['cedula']);
	$datos_estudiante = $estudiantes->consultar_estudiantes();


	$nivel = 2;
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Paso 1 - Datos del representante</title>
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/all.min.css"/>
		<link rel="icon" type="img/png" href="../../img/icono.png">
	</head>
	<body>
		<main class="d-flex flex-column justify-content-between align-items-center vh-100">
			<?php include('../../header.php');?>
			<div class="container-md container-xl row justify-content-center">
				<div class="col-lg-8 mx-auto">
					<div class="card">
						<!-- Titulo del contenedor -->
						<div class="card-header text-center">
							<b class="fs-5">Actualizacion de datos - Año y sección del estudiante</b>
						</div>
						<div class="card-body">
							<form action="../../controladores/cambiar_anio_seccion.php" method="post" id="cambiar_anio_seccion">

								<p>
									Actualmete el estudiante:
									<b>
										<?php echo $datos_estudiante['p_nombre'] . " " . $datos_estudiante['p_apellido'];?>
									</b>
									con
									<b>
										CI:<?php echo $datos_estudiante['cedula'];?>
									</b>
									Se encuentra cursando:
									<b>
										<?php echo $datos_estudiante['grado_a_cursar'];?>
									</b>
									Sección:
									<b>
										<?php echo ' "' . $datos_estudiante['seccion'] . '"';?>
									</b>
								</p>


								<p class="mb-4">
									A continuación, indique a que a año y a que sección sera asignado el estudiante.
								</p>

								<!-- Año a cursar -->
								<div class="row mb-2">
									<div class="col-12 col-lg-4">
										<label for="grado_a_cursar" class="form-label requerido">¿Que año va a cursar?:</label>
									</div>
									<div class="col-12 col-lg-8">
										<select class="form-select mb-2" name="grado_a_cursar" required>
											<option selected value="">Seleccione una opción</option>
											<option value="Primer año">Primer año</option>
											<option value="Segundo año">Segundo año</option>
											<option value="Tercer año">Tercer año</option>
											<option value="Cuarto año">Cuarto año</option>
											<option value="Quinto año">Quinto año</option>
										</select>
									</div>
								</div>

								<!-- Año a cursar -->
								<div class="row">
									<div class="col-12 col-lg-4">
										<label for="seccion_a_cursar" class="form-label requerido">¿Que sección va a cursar?:</label>
									</div>
									<div class="col-12 col-lg-8">
										<select class="form-select mb-2" name="seccion_a_cursar" required>
											<option selected value="">Seleccione una opción</option>
											<option value="A">Sección "A"</option>
											<option value="B">Sección "B"</option>
											<option value="C">Sección "C"</option>
											<option value="D">Sección "D"</option>
										</select>
									</div>
								</div>

								<input
									type="hidden"
									name="cedula_estudiante"
									value="<?php echo $datos_estudiante['cedula'];?>"
								>

							</form>
						</div>
						<div class="card-footer nav justify-content-md-between">
							<a class="btn btn-primary" href="../consultar/?sec=est">
								<i class="fa-solid fa-xl me-2 fa-home"></i>
								Volver
							</a>
							<div class="ms-auto">
								<button form="cambiar_anio_seccion" class="btn btn-primary" type="submit">
									Guardar y continuar
									<i class="fa-solid fa-lg ms-2 fa-floppy-disk"></i>
								</button>
							</div>
						</div>
					</div>
				</div>


			</div>
			<?php include('../../footer.php');?>
			<?php include '../../ayuda.php';?>
		</main>
		<script type="text/javascript" src="../../js/sweetalert2.js"></script>
		<script type="text/javascript" src="../../js/jquery-3.7.1.min.js"></script>
		<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="../../js/logout_inactividad.js"></script>
	</body>
</html>