<?php

	session_start();

	if (!$_SESSION['login']) {
		header('Location: ../../index.php');
		exit();
	}
	
	require('funciones.php');

	require('../../controladores/conexion.php');
	require('../../clases/bitacora.php');

	require('../../clases/representantes.php');
	require('../../clases/telefonos.php');

	$bitacora = new bitacora();
	$representantes = new representantes();
	$telefonos = new telefonos();

	if (!isset($_POST['cedula'],$_POST['orden'])) {

		// Instanciacion y consulta de representante
		$representantes->set_cedula_persona($_POST['cedula']);
		$datos_representante = $representantes->consultar_representantes();

		$telefonos->set_cedula_persona($_POST['cedula']);
		$tlfs_representante = $telefonos->consultar_telefonos();

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
								id="Representante"
								class="table table-bordered m-0"
								style="max-width:100%;"
							>
								<tbody class="small text-uppercase">
									<?php

										// Para especificar que mostrar y que no
										$configuracion = [
											"mostrar_vinculo_representante" => false,
											"listar_representados" => true,
										];

										require('../../controladores/planillas/planilla_inscripcion/tablas/representante.php');

									?>
								</tbody>
							</table>
						</div>
					</div>

					<div class="card-footer">
						<a href="index.php?sec=rep" class="btn btn-primary">
							<i class="fa-solid fa-lg me-2 fa-home"></i>
							Menú principal
						</a>
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

</body>
</html>
