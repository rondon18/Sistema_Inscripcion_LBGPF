<?php

session_start();
if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

require('../clases/bitácora.php');
require('../controladores/conexion.php');
$bitácora = new bitácora();
$_SESSION['acciones'] .= ', Visita menú principal';
$bitácora->actualizar_bitácora($_SESSION['acciones'],$_SESSION['idbitácora']);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Página de inicio</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
	<link rel="stylesheet" type="text/css" href="../css/all.min.css"/>
	<link rel="icon" type="img/png" href="../img/distintivo-LGPF.png">
</head>

<body class="d-flex justify-content-center align-items-center light-primary-color" style="min-height: 100vh;">
	<!--Banner-->
	<header class="w-100 bg-white d-flex justify-content-between shadow p-1 position-fixed top-0" style="z-index:1000;">
		<div>
			<img src="../img/banner-gobierno.png" alt=""  height="42" class="d-inline-block align-text-top">
			<img src="../img/banner-MPPE.png" alt=""  height="42" class="d-inline-block align-text-top">
		</div>
		<img src="../img/banner-LGPF.png" alt=""  height="42" class="d-inline-block align-text-top">
	</header>

	<div class="card text-center m-auto" style="max-width:620px; margin:auto;">
		<div class="card-header">

			<b>Menú principal</b>
		</div>
		<div class="card-body">

			<p class="card-text">
				<span>Bienvenido(a), <?php echo $_SESSION['persona']['Primer_Nombre']." ".$_SESSION['persona']['Primer_Apellido']; ?>.</span>
			</p>

			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<p>¿Qué desea hacer?</p>
					<a class="btn btn-sm bg-primary text-white mb-2" href="perfil.php">
						Ver perfil <i class="fas fa-address-card fa-lg"></i>
					</a>
					<a class="btn btn-sm bg-primary text-white mb-2" href="registrar-estudiante/paso-1.php">
						Registrar estudiante <i class="fas fa-user-plus fa-lg"></i>
					</a>
					<?php if ($_SESSION['usuario']['Privilegios'] >= 2): ?>
					<a class="btn btn-sm bg-primary text-white mb-2" href="consultar.php">
						Consultar estudiantes <i class="fas fa-search fa-lg"></i>
					</a>
					<?php elseif ($_SESSION['usuario']['Privilegios'] == 1): ?>
					<a class="btn btn-sm bg-primary text-white mb-2" href="consultar.php">
						Gestionar registros <i class="fas fa-search fa-lg"></i>
					</a>
					<?php endif;?>
					<a class="btn btn-sm bg-primary text-white mb-2" href="../controladores/logout.php">
						Cerrar Sesión <i class="fas fa-door-open fa-lg"></i>
					</a>
				</li>

				<?php if ($_SESSION['usuario']['Privilegios'] == 1): ?>

				<li class="list-group-item">
					<p>Mantenimiento</p>
					<form class="d-inline" action="../controladores/control-mantenimiento.php" method="POST" target="_blank">
						<button type="submit" class="btn btn-sm bg-primary text-white mb-2" name="orden" value="Respaldar">
							Generar respaldo <i class="fas fa-download fa-lg"></i>
						</button>
					</form>
					<form id="Restaurar" class="d-inline" action="../controladores/control-mantenimiento.php" method="POST" >
						<button class="btn btn-sm bg-primary text-white mb-2" name="orden" value="Restaurar" onclick="confirmacion()">
							Restaurar base de datos <i class="fas fa-database fa-lg"></i>
						</button>
					</form>
				</li>
				<?php endif ?>
			</ul>
		</div>

		<div class="card-footer">
			<span class="text-muted">Sistema de inscripción L.B. G.P.F</span>
		</div>

	</div>

	<!--Footer-->
	<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 position-fixed bottom-0">
		<span class="text-white">Sistema de inscripción L.B. G.P.F - <?php echo date("Y"); ?></span>
	</footer>
	<?php include '../ayuda.php'; ?>
</body>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	function confirmacion() {
		//Pregunta si desea realizar la acción la cancela si selecciona NO
		document.getElementById("Restaurar").addEventListener("click", function(event){
			if(!confirm("¿Esta seguro de realizar esta acción?")){
				event.preventDefault();
			}
		});
	}
</script>
</html>
