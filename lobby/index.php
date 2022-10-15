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
		<link rel="stylesheet" type="text/css" href="../css/colores.css"/>
		<link rel="stylesheet" type="text/css" href="../css/all.min.css"/>
		<link rel="icon" type="img/png" href="../img/distintivo-LGPF.png">
	</head>
	<body>
		
		<main style="max-height: 100vh; overflow-y: auto;">
			<!--Banner-->
			<header class="w-100 bg-white d-flex justify-content-center justify-content-md-between shadow p-1 position-absolute top-0" style="z-index:1000;">
				<div>
					<img src="../img/banner-gobierno.png" alt=""  height="42" class="d-none d-md-inline-block align-text-top">
					<img src="../img/banner-MPPE.png" alt=""  height="42" class="d-none d-md-inline-block align-text-top">
				</div>
				<img src="../img/banner-LGPF.png" alt=""  height="42" class="d-inline-block align-text-top">
			</header>
			
			<div class="container-md py-3 px-xl-5 my-5">
				<div class="card bg-light w-100 mx-0 my-auto">
					<div class="card-header text-center">
						<b class="fs-4">Menú principal</b>
					</div>
					<div class="row">
						<div class="col-12 pt-2">
							<ul class="list-group list-group-flush">
								<li class="list-group-item text-center">
									
									<p class="fs-4 mb-1">Bienvenido(a), <?php echo $_SESSION['persona']['Primer_Nombre']." ".$_SESSION['persona']['Primer_Apellido']; ?>.</p>
									
									<span class="text-muted">¿Qué desea hacer?</span>
								</li>
								<li class="list-group-item px-md-4 px-xl-5">
									<div class="row">
										<!-- Panel de estudiantes -->
										<div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex p-2">
											<div
												class="d-flex bg-primary py-2 px-3 rounded-2 text-white shadow border w-100 align-items-center justify-content-center">
												<i class="fas fa-list fa-3x me-2"></i>
												<p class="ps-2 m-0 my-1 w-100">
													Consultar registros: <br>
													<a href="consultar/estudiantes.php" class="d-block btn btn-sm btn-outline-light mt-2 mb-0 hvr-icon-grow">
														Consultar
														<i class="fas fa-search fa-lg ms-1 hvr-icon"></i>
													</a>
												</p>
											</div>
										</div>
										<!-- Panel para iniciar registro de estudiante -->
										<div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex p-2">
											<div
												class="d-flex bg-primary py-2 px-3 rounded-2 text-white shadow border w-100 align-items-center justify-content-center">
												<i class="fas fa-user-plus fa-3x me-2"></i>
												<p class="ps-2 m-0 my-1 w-100">
													Inscribir estudiante: <br>
													<a href="#" class="d-block btn btn-sm btn-outline-light mt-2 mb-0 hvr-icon">
														Registrar nuevo
														<i class="fas fa-plus-square fa-lg ms-1 hvr-icon"></i>
													</a>
												</p>
											</div>
										</div>
										<!-- Panel para iniciar registro de estudiante -->
										<div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex p-2">
											<div
												class="d-flex bg-primary py-2 px-3 rounded-2 text-white shadow border w-100 align-items-center justify-content-center">
												<i class="fas fa-user-plus fa-3x me-2"></i>
												<p class="ps-2 m-0 my-1 w-100">
													Registrar usuario: <br>
													<a href="#" class="d-block btn btn-sm btn-outline-light mt-2 mb-0 hvr-icon">
														Registrar nuevo
														<i class="fas fa-plus-square fa-lg ms-1 hvr-icon"></i>
													</a>
												</p>
											</div>
										</div>
										<!-- Panel para acceder al modulo de perfil -->
										<div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex p-2">
											<div
												class="d-flex bg-danger py-2 px-3 rounded-2 text-white shadow border w-100 align-items-center justify-content-center">
												<i class="fas fa-user-circle fa-3x me-2"></i>
												<p class="ps-2 m-0 my-1 w-100">
													Consultar mi perfil: <br>
													<a href="#" class="d-block btn btn-sm btn-outline-light mt-2 mb-0 hvr-icon">
														Ir
														<i class="fas fa-arrow-right fa-lg ms-1 hvr-icon"></i>
													</a>
												</p>
											</div>
										</div>
										<!-- Panel para acceder al modulo de mantenimiento(Administrador) -->
										<div class="col-12 col-md-6 col-lg-4 col-xl-3 d-flex p-2">
											<div
												class="d-flex bg-primary py-2 px-3 rounded-2 text-white shadow border w-100 align-items-center justify-content-center">
												<i class="fas fa-wrench fa-3x me-2"></i>
												<p class="ps-2 m-0 my-1 w-100">
													Realizar mantenimiento al sistema: <br>
													<a href="#" class="d-block btn btn-sm btn-outline-light mt-2 mb-0 hvr-icon">
														Ir
														<i class="fas fa-cog fa-lg ms-1 hvr-icon"></i>
													</a>
												</p>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="card-footer text-center">
						<span class="text-muted">Sistema de inscripción L.B. G.P.F</span>
					</div>
				</div>
			</div>
			<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 position-absolute bottom-0">
				<span class="text-white">Sistema de inscripción L.B. G.P.F - <i class="far fa-copyright"></i> 2022-<?php echo date("Y"); ?></span>
			</footer>
			<?php include '../ayuda.php'; ?>
		</main>
		<!-- <div class="card text-center m-auto" style="max-width:620px; margin:auto;">
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
						<?php if ($_SESSION['usuario']['Privilegios'] == 1): ?>
						<a class="btn btn-sm bg-primary text-white mb-2" href="../registrarse/registrarse.php">Registrar usuario <i class="fas fa-user-plus fa-lg"></i></a>
						<?php endif; ?>
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
		</div> -->
		<!--Footer-->
		
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