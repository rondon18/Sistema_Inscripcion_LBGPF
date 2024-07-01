<?php 

session_start();
if (!$_SESSION['login']) {
	header('Location: ../../index.php');
	exit();
}
else {
	//Si los privilegios son de nivel 2 redirecciona
	if ($_SESSION['datos_login']['privilegios'] > 1) {
		header('Location: ../index.php');
	}
}
require('../../clases/bitacora.php');
require('../../controladores/conexion.php');
$bitacora = new bitacora();
$_SESSION['acciones'] .= ', Visita modulo de mantenimiento';
$bitacora->set_id_bitacora($_SESSION['id_bitacora']);
$bitacora->set_acciones_realizadas($_SESSION['acciones']);
$bitacora->actualizar_bitacora();

// Generacion de listado de ficheros
$listado = glob('../../respaldos/*', GLOB_NOSORT);
$listado = array_reverse($listado,true);

function hallarRespaldosEsp($dato){
	if (strlen(substr($dato, 16)) != 34) {
		return true;
	}
	else{
		return false;
	}
}
?>


<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Mantenimiento</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/all.min.css"/>
		<link rel="icon" type="img/png" href="../../img/icono.png">
	</head>
	<body>
		<main class="d-flex flex-column justify-content-between vh-100">
			<?php include('../../header.php'); ?>
			<div class="container-md">
				
				<div class="card">
					<div class="card-header text-center">
						<b class="fs-5">ÁREA DE MANTENIMIENTO</b>
					</div>
					
					<div class="card-body row">
						<!-- Contenedor para centrar el contenido -->
						<div class="col-12 col-lg-11 py-0 mx-auto my-2" style="max-height: 60vh; overflow-y: auto;">
							<!-- Contenedor -->
							<section class="row justify-content-center" action="paso_2.php" method="POST">

								<!-- Respaldar BD -->
								<div class="col-12 col-lg">
									<div class="row">
										<div class="row mb-5">
											<div class="col-12 col-lg-12">
												<span class="h5"><i class="fa-solid fa-person fa-lg me-2"></i>Respaldar la base de datos</span>
											</div>
										</div>
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<form id="respaldar-bd" method="post" action="../../controladores/control_mantenimiento.php">
													<input type="hidden" name="orden" value="Respaldar">
													<button id="boton-respaldar" class="btn btn-primary">
													<i class="fas fa-database fa-lg me-2"></i>
													Generar respaldo
													</button>
												</form>
											</div>
										</div>
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<span class="form-text">
													Presione para generar un respaldo de la base de datos, que puede ser descargado (dependiendo del navegador). También será almacenado en el sistema.
												</span>
											</div>
										</div>
									</div>
								</div>
								
								<!-- Restaurar BD -->
								<div class="col-12 col-lg">
									<div class="row">
										<div class="row mb-5">
											<div class="col-12 col-lg-12">
												<span class="h5"><i class="fa-solid fa-address-book fa-lg me-2"></i>Restaurar la base de datos</span>
											</div>
										</div>
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<form id="restaurar-bd" method="post" action="../../controladores/control_mantenimiento.php">
													<div class="input-group">
														<select name="respaldo" class="form-select" required>
															<option class="small" value="" selected>Seleccione un respaldo</option>
															<?php foreach ($listado as $elemento): ?>

															<option 
																class="small" 
																value="<?php echo substr($elemento, 16); ?>"
															>

															<?php 
															
																// Formatea la fecha y hora del respaldo en algo más legible

																$date = explode("__", substr($elemento, 16,-4));

																$fecha = str_replace("-", "/", $date[1]);
																$hora = str_replace("-", ":", $date[2]);

																echo "Respaldo del " . $fecha . " a las " . $hora;

															?>
															</option>
															
															<?php endforeach ?>
														</select>
														<input type="hidden" name="orden" value="Restaurar">
														<button id="boton-restaurar" class="btn btn-primary" name="orden" value="Restaurar" type="button">
															<i class="fas fa-database fa-lg me-2"></i>
															Restaurar BD
														</button>
													</div>
												</form>
											</div>
										</div>
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<span class="form-text">
													Seleccione a que punto de restauración devolver el sistema. Al restaurar, se generará un respaldo en caso de querer deshacer el proceso.
												</span>
											</div>
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
					<div class="card-footer">
						<a class="btn btn-primary" href="../index.php">
							<i class="fa-solid fa-lg me-2 fa-backward"></i>
							Volver al inicio
						</a>
					</div>
				</div>
				
			</div>
			<?php include('../../footer.php'); ?>
			<?php include('../../ayuda.php'); ?>
		</main>
	</body>
<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>

<script type="text/javascript" src="../../js/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="../../js/sweetalert2.js"></script>
<script type="text/javascript" src="../../js/logout_inactividad.js"></script>
<script type="text/javascript" src="../../js/mantenimiento.js" defer></script>


<?php if (isset($_GET['exito'])): ?>
<script type="text/javascript">
	let timerInterval
	Swal.fire({
		title: "base de datos restaurada",
		icon: "success",
		timer: 2000,
		timerProgressBar: true,
		didOpen: () => {
			Swal.showLoading()
			const b = Swal.getHtmlContainer().querySelector("b")
			timerInterval = setInterval(() => {
				b.textContent = Swal.getTimerLeft()
			}, 100)
		},
		willClose: () => {
			clearInterval(timerInterval)
		}
	}).then((result) => {
		/* Read more about handling dismissals below */
		if (result.dismiss === Swal.DismissReason.timer) {
			console.log("Cerrado por el temporizador")
		}
	})
	
</script>
<?php endif ?>
</html>