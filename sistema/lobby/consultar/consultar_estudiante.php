<?php

	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../../index.php');
		exit();
	}
	
	require('funciones.php');

	require('../../controladores/conexion.php');
	require('../../clases/bitacora.php');

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
						<b class="fs-4">Consulta de registros</b>
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

					<div class="card-footer">

						<a href="index.php?sec=est" class="btn btn-primary">
							<i class="fa-solid fa-lg me-2 fa-home"></i>
							Menú principal
						</a>

						<!--Generar planilla de inscripción-->
						<form action="../../controladores/planillas/generar_planilla_estudiante.php" method="POST" style="display: inline-block;">
							
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

							<button class="btn btn-danger" type="submit" name="Generar planilla">Generar planilla <i class="fas fa-file-pdf fa-lg ms-2"></i></button>

						</form>
						

						<!--Generar acta de compromiso-->
						<form action="../../controladores/planillas/generar_compromiso_representante.php" method="POST" style="display: inline-block;">

							<input
								type="hidden"
								name="cedula"
								value="<?php echo $datos_estudiante['cedula'];?>"
							>

							<input
								type="hidden"
								name="cedula_representante"
								value="<?php echo $datos_representante['cedula'];?>"
							>

							<button class="btn btn-danger" type="submit" name="Generar planilla de Compromiso">Generar planilla de compromiso <i class="fas fa-file-pdf fa-lg ms-2"></i></button>

						</form>

						<!-- Editar registro del estudiante -->
						<form action="../editar_estudiante/index.php" method="post" style="display: inline-block;">

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

							<button
								class="btn btn-primary"
								type="submit"
								name="editar"
							>
								Editar <i class="fas fa-pen fa-lg ms-2"></i>
							</button>

						</form>
						<?php if ($_SESSION['datos_login']['privilegios'] <= 1): ?>
						
						<!-- Eliminar registro de estudiante -->
						<form action="#" method="post" style="display: inline-block;" onsubmit="confirmar_envio(event)">

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

							<button 
								class="btn btn-primary" 
								type="submit" 
								name="orden" 
								value="eliminar"
							>
								Eliminar 
								<i class="fas fa-trash-can fa-lg ms-2"></i>
							</button>

						</form>
						<?php endif;?>

					</div>
					
				</div>
			</div>
		</div>
		<?php include('../../footer.php'); ?>
		<?php include '../../ayuda.php'; ?>
	</main>

<script type="text/javascript" src="../../js/jquery-3.6.1.min.js"></script>
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
