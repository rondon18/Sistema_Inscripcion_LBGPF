<?php

	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../../index.php');
		exit();
	}
	
	require('funciones.php');

	require('../../controladores/conexion.php');
	require('../../clases/bitacora.php');
	require("../../logs/error_handler.php");
	require('../../clases/estudiantes.php');
	require('../../clases/padres.php');
	require('../../clases/representantes.php');
	require('../../clases/telefonos.php');
	require('../../clases/vacunas_est.php');

	$bitacora = new bitacora();
	$estudiantes = new estudiantes();
	$padres = new padres();
	$representantes = new representantes();
	$telefonos = new telefonos();
	$vacunas_est = new vacunas_est();

	if (!isset($_POST['cedula'],$_POST['orden'])) {

		// Instanciacion y consulta de estudiante
		$estudiantes->set_cedula_persona($_POST['cedula']);
		$datos_estudiante = $estudiantes->consultar_estudiantes();

		$telefonos->set_cedula_persona($_POST['cedula']);
		$tlfs_estudiante = $telefonos->consultar_telefonos();

		$vacunas_est->set_cedula_estudiante($datos_estudiante['cedula']);
		$vacunas_estudiante = $vacunas_est->consultar_vacunas_est();

		
		// Instanciacion y consulta de representante
		$representantes->set_cedula_persona($_POST['cedula_representante']);
		$datos_representante = $representantes->consultar_representantes();

		$telefonos->set_cedula_persona($_POST['cedula_representante']);
		$tlfs_representante = $telefonos->consultar_telefonos();

		
		// Instanciacion y consulta de padre
		$padres->set_cedula_persona($_POST['cedula_padre']);
		$datos_padre = $padres->consultar_padres();

		$telefonos->set_cedula_persona($_POST['cedula_padre']);
		$tlfs_padre = $telefonos->consultar_telefonos();


		// Instanciacion y consulta de madre
		$padres->set_cedula_persona($_POST['cedula_madre']);
		$datos_madre = $padres->consultar_padres();

		$telefonos->set_cedula_persona($_POST['cedula_madre']);
		$tlfs_madre = $telefonos->consultar_telefonos();
	}

	else {

		// el boton de eliminar genera una acción sobre esta misma vista

		// Verifica que se haya especificado una orden y que esta sea eliminar
		if (isset($_POST['orden'])) {
			if ($_POST['orden'] == "eliminar") {

				// Se almacena en sesion temporalmente
				$_SESSION['orden'] = $_POST['orden'];
				$_SESSION['eliminar_estudiante'] = $_POST['cedula'];

				// Redirecciona al controlador para ejecutar la eliminacion
				header('Location: ../../controladores/registros/control_registros.php');
			}
		}
	}

	$nivel = 2;

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Consultar estudiante</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/all.min.css"/>
	<link rel="icon" type="img/png" href="../../img/icono.png">
</head>

<style type="text/css">
	/* Para el estudiante */
		.bg-info {
			background-color: #bdd6ee !important;
		}

		/* Para el padre */
		.bg-danger {
			background-color: #f8d7da !important;
		}

		/* Para el padre */
		.bg-warning {
			background-color: #fff3cd !important;
		}

		/* Para el representante */
		.bg-success {
			background-color: #d1e7dd !important;
		}

		/* Para el representante */
		.bg-secondary:not(footer) {
			background-color: #e2e3e5 !important;
		}
</style>

<body>

	<main class="d-flex flex-column justify-content-between vh-100">
			
			<?php include('../../header.php'); ?>
			
			<div class="container-md">

				<div class="card w-100">

					<div class="card-header text-center">
						<b class="fs-5">Consulta de registros</b>
					</div>

					<div class="card-body" style="max-height: 65vh; overflow-y:auto;">

						<div class="table-responsive">
							<table
								id="Estudiante"
								class="table table-bordered m-0"
								style="max-width:100%;"
							>
								<tbody class="small text-uppercase">
									<?php

										require('../../controladores/planillas/planilla_inscripcion/tablas/estudiantes.php');
										require('../../controladores/planillas/planilla_inscripcion/tablas/madre.php');
										require('../../controladores/planillas/planilla_inscripcion/tablas/padre.php');
										require('../../controladores/planillas/planilla_inscripcion/tablas/representante.php');
										require('../../controladores/planillas/planilla_inscripcion/tablas/observaciones.php');

									?>
								</tbody>
							</table>
						</div>


					</div>

					<div class="card-footer d-flex flex-wrap gap-2">

						<a href="index.php?sec=est" class="btn btn-primary">
							<i class="fa-solid fa-lg me-2 fa-home"></i>
							Menú principal
						</a>



						<!-- Editar registro del estudiante -->
						<form
							id="editar_registro_<?php echo $datos_estudiante['cedula'];?>"
							class="d-inline-block"
							action="../editar_estudiante/index.php"
							method="post"
						>
							<input
								type="hidden"
								name="cedula"
								value="<?php echo $datos_estudiante['cedula'];?>"
							>
							<input
								type="hidden"
								name="cedula_padre"
								value="<?php echo $datos_padre['cedula'];?>"
							>
							<input
								type="hidden"
								name="cedula_madre"
								value="<?php echo $datos_madre['cedula'];?>"
							>
							<input
								type="hidden"
								name="cedula_representante"
								value="<?php echo $datos_representante['cedula'];?>"
							>
						</form>

						<form
							id="cambiar_representante_<?php echo $datos_estudiante['cedula'];?>"
							action="../editar_estudiante/cambiar_representante.php"
							method="post"
							style="display: inline-block;"
						>
							<input type="hidden" name="cedula" value="<?php echo $datos_estudiante['cedula'];?>">
						</form>

						<form
							id="cambiar_anio_seccion_<?php echo $datos_estudiante['cedula'];?>"
							action="../editar_estudiante/cambiar_anio_seccion.php"
							method="post"
							style="display: inline-block;"
						>
							<input type="hidden" name="cedula" value="<?php echo $datos_estudiante['cedula'];?>">
						</form>

						<?php if ($_SESSION['datos_login']['privilegios'] <= 1): ?>
						
						<!-- Eliminar registro de estudiante -->
						<form
							id="eliminar_registro_<?php echo $datos_estudiante['cedula'];?>"
							class="d-inline-block"
							action="#"
							method="post"
							onsubmit="confirmar_envio(event)"
						>
							<input 
								type="hidden" 
								name="cedula" 
								value="<?php echo $datos_estudiante['cedula'];?>"
							>
							<input 
								type="hidden" 
								name="orden" 
								value="eliminar"
							>
						</form>
						<?php endif;?>

						<div class="btn-group dropup col-12 col-sm-auto" role="group" aria-label="Button group with nested dropdown">

							<button
								class="btn btn-sm btn-primary"
								type="submit"
								name="editar"
								form="editar_registro_<?php echo $datos_estudiante['cedula'];?>"
							>
								Editar
								<i class="fas fa-pen fa-lg ms-2"></i>
							</button>

							<div class="btn-group" role="group">

								<button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
									<span class="d-none d-sm-inline">Más opciones</span>
								</button>

								<ul class="dropdown-menu">

									<li>
										<button
											class="dropdown-item"
											type="submit"
											form="cambiar_representante_<?php echo $datos_estudiante['cedula'];?>"
										>
											<i class="fas fa-user-edit fa-lg ms-2"></i>
											Cambiar representante
										</button>
									</li>

									<li>
										<button
											class="dropdown-item"
											type="submit"
											form="cambiar_anio_seccion_<?php echo $datos_estudiante['cedula'];?>"
										>
											<i class="fas fa-graduation-cap fa-lg ms-2"></i>
											Actualizar año y sección
										</button>
									</li>

									<li>
										<button
											class="dropdown-item"
											type="submit"
											form="eliminar_registro_<?php echo $datos_estudiante['cedula'];?>"
										>
											<i class="fas fa-trash-can fa-lg ms-2"></i>
											Eliminar
										</button>
									</li>

								</ul>
							</div>
						</div>

						<form class="d-inline-block" action="../../controladores/control_planillaje.php" method="post">
							<div class="input-group">

								<!-- Texto de referencia -->
					      <div class="input-group-text">Generación de planillas</div>

					      <!-- Selector de documento -->
								<select class="form-select" id="documento_solicitado" name="documento_solicitado" required>
									<option value="">Indique el documento requerido</option>
									<option value="1">Planilla de inscripción</option>
									<option value="2">Acta de compromiso</option>
									<option value="3">Todo el planillaje</option>
								</select>

								<input type="hidden" name="cedula" value="<?php echo $datos_estudiante['cedula'];?>">
								<input type="hidden" name="cedula_padre" value="<?php echo $datos_padre['cedula'];?>">
								<input type="hidden" name="cedula_madre" value="<?php echo $datos_madre['cedula'];?>">
								<input type="hidden" name="cedula_representante" value="<?php echo $datos_representante['cedula'];?>">

								<!-- Botón para envíar la solicitud -->
								<button type="submit" class="btn btn-danger">
									Solicitar documento
									<i class="fas fa-file-pdf fa-lg ms-1"></i>
								</button>

							</div>
						</form>

					</div>
					
				</div>
			</div>
		</div>
		<?php include('../../footer.php'); ?>
		<?php include '../../ayuda.php'; ?>
	</main>

<script type="text/javascript" src="../../js/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="../../js/sweetalert2.js"></script>
<script type="text/javascript" src="../../js/logout_inactividad.js"></script>
<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" defer>
  function confirmar_envio(event) {
    event.preventDefault(); // Detiene la acción predeterminada del evento onSubmit
    
    Swal.fire({
      title: '¿Estás seguro?',
      text: '¿Deseas realizar esta acción?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, continua',
      cancelButtonText: 'No, detente'
    }).then((result) => {
      if (result.isConfirmed) {
        // Si el usuario confirma la acción, se envía el formulario
        event.target.submit();
      }
    });
  }
</script>

</body>
</html>
