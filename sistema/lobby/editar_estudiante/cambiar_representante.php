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
	require('../../clases/representantes.php');
	require('../../clases/padres.php');

	// estudiante
	$estudiantes = new estudiantes();
	$representantes = new representantes();
	$padres = new padres();

	$estudiantes->set_cedula_persona($_POST['cedula']);
	$datos_estudiante = $estudiantes->consultar_estudiantes();

	$representantes->set_cedula_persona($datos_estudiante['cedula_representante']);
	$datos_representante = $representantes->consultar_representantes();

	$padres->set_cedula_persona($datos_estudiante['cedula_padre']);
	$datos_padre = $padres->consultar_padres();

	$padres->set_cedula_persona($datos_estudiante['cedula_madre']);
	$datos_madre = $padres->consultar_padres();


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
		<main class="d-flex flex-column justify-content-between vh-100">
			<?php include('../../header.php');?>
			<div class="container-md row justify-content-center">
				<div class="col-lg-8">
					<div class="card">
						<!-- Titulo del contenedor -->
						<div class="card-header text-center">
							<b class="fs-4">Actualizacion de datos - Cambiar representante</b>
						</div>
						<div class="card-body">
							<form action="../../controladores/cambiar_representante.php" method="post" id="cambiar_representante">

								<p>
									Cambio de representante del estudiante:
									<b>
										<?php echo $datos_estudiante['p_nombre'] . " " . $datos_estudiante['p_apellido'];?>
									</b>
									con
									<b>
										CI:<?php echo $datos_estudiante['cedula'];?>
									</b>
								</p>

								<p>
									Actualmente
									<b>
										<?php echo $datos_representante['p_nombre'] . " " . $datos_representante['p_apellido'];?>
									</b>
									con
									<b>
										CI:<?php echo $datos_representante['cedula'];?>
									</b>
									es su representante.
									¿Quién pasa a ser el representante del estudiante?
								</p>

								<?php if ($datos_padre['cedula'] != $datos_representante['cedula']):?>
								<div class="form-check">
								  <input class="form-check-input" type="radio" value="padre" id="padre" name="nuevo_representante" required>
								  <label class="form-check-label" for="padre">
								    <?php echo $datos_padre['cedula'];?>.
								    <?php echo $datos_padre['p_nombre'] . " " . $datos_padre['p_apellido'];?>
								    (Padre)
								  </label>
								</div>
								<?php endif ?>

								<?php if ($datos_madre['cedula'] != $datos_representante['cedula']):?>
								<div class="form-check">
								  <input class="form-check-input" type="radio" value="madre" id="madre" name="nuevo_representante" required>
								  <label class="form-check-label" for="madre">
								    <?php echo $datos_madre['cedula'];?>.
								    <?php echo $datos_madre['p_nombre'] . " " . $datos_madre['p_apellido'];?>
								    (Madre)
								  </label>
								</div>
								<?php endif ?>

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
								<button form="cambiar_representante" class="btn btn-primary" type="submit">
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
		<script type="text/javascript" src="../../js/jquery-3.6.1.min.js"></script>
		<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="../../js/logout_inactividad.js"></script>
	</body>
</html>