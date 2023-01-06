<?php 

session_start();
if (!$_SESSION['login']) {
	header('Location: ../../index.php');
	exit();
}

require('funciones.php');

require("../../controladores/conexion.php");
require('../../clases/bitacora.php');

$bitacora = new bitacora();
$_SESSION['acciones'] .= ', Consulta estudiantes';

$active_est = "";
$active_rep = "";
$active_pad = "";
$active_usr = "";
$active_reg = "";

if (isset($_GET['sec'])) {
	switch ($_GET['sec']) {
		
		case 'est':
			$_SESSION['acciones'] .= ', Consulta estudiantes';
			$active_est = "active";
			break;
		
		case 'rep':
			$_SESSION['acciones'] .= ', Consulta representantes';
			$active_rep = "active";
			break;
		
		case 'pad':
			$_SESSION['acciones'] .= ', Consulta padres';
			$active_pad = "active";
			break;
		
		case 'usr':
			//Devuelve al index si el usuario no es administrador y muestra un error
			if ($_SESSION['usuario']['Privilegios'] > 1) {
				header('Location: index.php?error');
			}
			$_SESSION['acciones'] .= ', Consulta estudiantes';
			$active_usr = "active";
			break;
		
		case 'reg':
			//Devuelve al index si el usuario no es administrador y muestra un error
			if ($_SESSION['usuario']['Privilegios'] > 1) {
				header('Location: index.php?error');
			}
			$_SESSION['acciones'] .= ', Consulta bitácora';
			$active_reg = "active";
			break;
		
		default:
			$_SESSION['acciones'] .= ', Consulta estudiantes';
			break;
	} 
}
else {
	$_SESSION['acciones'] .= ', Visita area de consulta';
}

// Actualiza la bitácora
$bitacora->actualizar_bitacora($_SESSION['acciones'],$_SESSION['id_bitacora']);

$nivel = 2;

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Consultar registros</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
		<link rel="stylesheet" href="../../datatables/datatables.min.css">
		<link rel="stylesheet" type="text/css" href="../../css/all.min.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
		<link rel="icon" type="img/png" href="../../img/icono.png">
	</head>
	<style media="screen">
		.dataTables_paginate a {
			color: #fff !important;
			background-color: #0d6efd !important;
			border-color: #0d6efd !important;
			display: inline-block !important;
			font-weight: 400 !important;
			line-height: 1.5 !important;
			text-align: center !important;
			text-decoration: none !important;
			vertical-align: middle !important;
			cursor: pointer !important;
			-webkit-user-select: none !important;
			-moz-user-select: none !important;
			user-select: none !important;
			border: 1px solid transparent !important;
			padding: 0.375rem 0.75rem !important;
			font-size: 1rem !important;
			border-radius: 0.25rem !important;
			transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out !important;
			margin: .25rem;
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

						<!--Selector de consulta-->
						<div class="bg-primary mb-4 p-2 rounded-2 text-white shadow border w-100">
							<div class="selector-consulta d-flex flex-column flex-sm-row gap-2 align-items-center justify-content-evenly">
								<p class="h4 m-0 text-center">Consultar:</p>
								<a href="index.php?sec=est" class="btn btn-outline-light btn-sm hvr-icon-grow <?php echo $active_est; ?>">
									<i class="fas fa-lg fa-children me-2 hvr-icon"></i>
									Estudiantes
								</a>
								<a href="index.php?sec=rep" class="btn btn-outline-light btn-sm hvr-icon-grow <?php echo $active_rep; ?>">
									<i class="fas fa-lg fa-users me-2 hvr-icon"></i>
									Representantes
								</a>
								<a href="index.php?sec=pad" class="btn btn-outline-light btn-sm hvr-icon-grow <?php echo $active_pad; ?>">
									<i class="fas fa-lg fa-person me-2 hvr-icon"></i>
									Padres
								</a>
								<?php if ($_SESSION['usuario']['Privilegios'] <= 1): ?>
								<a href="index.php?sec=usr" class="btn btn-outline-light btn-sm hvr-icon-grow <?php echo $active_usr; ?>">
									<i class="fas fa-lg fa-user me-2 hvr-icon"></i>
									Usuarios
								</a>
								<a href="index.php?sec=reg" class="btn btn-outline-light btn-sm hvr-icon-grow <?php echo $active_reg; ?>">
									<i class="fas fa-lg fa-clipboard me-2 hvr-icon"></i>
									Registros
								</a>
								<?php endif ?>
							</div>
						</div>

						<div style="max-height 70vh;min-height 60vh; overflow-y: auto;">
						<?php 
							// filtra la vista a mostrar al usuario
							if (isset($_GET['sec'])) {
								switch ($_GET['sec']) {
									case 'est':
										include("estudiantes.php");
										$js = "consulta-estudiantes.js";
										break;
									
									case 'rep':
										include("representantes.php");
										$js = "consulta-representantes.js";
										break;
									
									case 'pad':
										include("padres.php");
										$js = "consulta-padres.js";
										break;
									
									case 'usr':
										include("usuarios.php");
										$js = "consulta-usuarios.js";
										break;
									
									case 'reg':
										include("registros.php");
										$js = "consulta-bitacora.js";
										break;
									
									default:
										echo '<p class="text-center">Seleccione una opción para comenzar</p>';
										break;
								} 
							}
							else {
								echo '<p class="text-center">Seleccione una opción para comenzar</p>';
							}
						?>	
						</div>

					</div>

					<div class="card-footer">
						<a href="../index.php" class="btn btn-primary">
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
</div>
<script type="text/javascript" defer>
	function confirmacion() {
		//Pregunta si desea realizar la acción la cancela si selecciona NO
		if(confirm("¿Desea realizar esta accion?")) {
			alert("Acción ejecutada");
			return true;
		}
		else {
			alert("Acción cancelada");
			return false;
		}
	}
</script>
</body>
</html>