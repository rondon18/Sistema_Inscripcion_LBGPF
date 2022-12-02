<?php 

session_start();
if (!$_SESSION['login']) {
	header('Location: ../../index.php');
	exit();
}
else {
	//Si los privilegios son de nivel 2 redirecciona
	if ($_SESSION['usuario']['Privilegios'] > 1) {
		header('Location: ../index.php');
	}
}
require('../../clases/bitácora.php');
require('../../controladores/conexion.php');
$bitácora = new bitácora();
$_SESSION['acciones'] .= ', Visita modulo de mantenimiento';
$bitácora->actualizar_bitácora($_SESSION['acciones'],$_SESSION['idbitácora']);

// Generacion de listado de ficheros
$listado = glob('../../respaldos/*', GLOB_NOSORT);
$listado = array_reverse($listado,true);


// Auxiliar para verificar que vuelca glob()
// echo "<table border='1' style='margin-top:100px'>";
// foreach ($listado as $key => $value) {
// 	echo "<tr>";
// 	echo "<td>".$key."</td>";
// 	echo "<td>".$value."</td>";
// 	echo "</tr>";
// }
// echo "</table>";

function hallarRespaldosEsp($dato){
	if (strlen(substr($dato, 16)) != 34) {
		return true;
	}
	else{
		return false;
	}
}

if (isset($_POST['select-respaldo'])) {
	echo "<br><br><br><br><br>".$_POST['select-respaldo'];
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
		<link rel="icon" type="img/png" href="../../img/distintivo-LGPF.png">
	</head>
	<body>
		<main style="max-height: 100vh; overflow-y: auto;">
			<!--Banner-->
			<header class="w-100 bg-white d-flex justify-content-center justify-content-md-between shadow p-1 position-absolute top-0" style="z-index:1000;">
				<div>
					<img src="../../img/banner-gobierno.png" alt=""  height="42" class="d-none d-md-inline-block align-text-top">
					<img src="../../img/banner-MPPE.png" alt=""  height="42" class="d-none d-md-inline-block align-text-top">
				</div>
				<img src="../../img/banner-LGPF.png" alt=""  height="42" class="d-inline-block align-text-top">
			</header>
			
			<div class="container-md py-3 px-xl-5 my-5 mb-lg-0">
				
				<div class="card">
					<div class="card-header text-center">
						<b class="fs-4">Area de mantenimiento</b>
					</div>
					
					<div class="card-body row">
						<!-- Contenedor para centrar el contenido -->
						<div class="col-12 col-lg-11 py-0 mx-auto my-2" style="max-height: 60vh; overflow-y: auto;">
							<!-- Contenedor -->
							<section class="row justify-content-center" action="paso-2.php" method="POST">

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
												<form id="respaldar-bd" method="post" action="../../controladores/control-mantenimiento.php">
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
													Presione para generar un respado de la base de datos, que puede ser descargado (dependiendo del navegador). También será almacenado en el sistema.
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
												<form id="restaurar-bd" method="post" action="../../controladores/control-mantenimiento.php">
													<div class="input-group">
														<select name="respaldo" class="form-select" required>
															<option class="small" value="" selected disabled>Seleccione un respaldo</option>
															<?php foreach ($listado as $elemento): ?>

															<option 
																class="small" 
																value="<?php echo substr($elemento, 16); ?>"
															>
															<?php echo substr($elemento, 16,-4);?>
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
						<a class="btn btn-primary" href="../index.php">Volver al inicio</a>
					</div>
				</div>
				
			</div>
			<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 position-fixed bottom-0" style="z-index: 100;">
				<span class="text-white">Sistema de inscripción L.B. G.P.F - <i class="far fa-copyright"></i> 2022-<?php echo date("Y"); ?></span>
			</footer>
			<?php include '../../ayuda.php'; ?>
		</main>
	</body>
<script type="text/javascript" src="../../js/sweetalert2.js"></script>
<script type="text/javascript" src="../../js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../../js/mantenimiento.js" defer></script>
<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
<?php 
if (isset($_GET['exito'])) {
echo '
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
';	
} 
?>
</html>