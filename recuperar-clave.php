<?php

require("controladores/conexion.php");
require("clases/usuario.php");

$usuario = new Usuarios();

$datos_usuario = NULL;

if (isset($_POST['Tipo_Cédula'],$_POST['Cédula'])) {
	$Cédula = $_POST['Tipo_Cédula'].$_POST['Cédula'];
	if ($datos_usuario = $usuario->consultarUsuario($Cédula)) {
		$Pregunta1 = $datos_usuario['Pregunta_Seg_1'];
		$Pregunta2 = $datos_usuario['Pregunta_Seg_2'];
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ingresar al sistema</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/estilos.css"/>
	<link rel="stylesheet" type="text/css" href="css/all.min.css"/>
	<link rel="icon" type="img/png" href="img/distintivo-LGPF.png">
</head>
<body>


	<main class="d-flex flex-column justify-content-between" style="min-height:100vh">
		<!--Banner-->
		<header class="w-100 m-0 container-fluid row bg-white p-0 mb-3">
			<div class="col-12">
				<div id="banner" class="w-100 bg-white d-flex flex-wrap flex-md-nowrap justify-content-center align-items-center justify-content-md-between shadow"
				style="z-index:1000;">
					<img src="img/banner-gobierno.png" alt="" height="48" class="d-none d-sm-inline-block m-2">
					<img src="img/banner-MPPE.png" alt="" height="48" class="d-none d-sm-inline-block m-2 me-md-auto">
					<img src="img/banner-LGPF.png" alt="" height="48" class="m-sm-2">
				</div>
			</div>
		</header>

		<?php

		if (isset($_POST['Tipo_Cédula'],$_POST['Cédula']) AND $datos_usuario != NULL) {
			$accion = "controladores/login.php";
		} else {
			$accion = "recuperar-clave.php";
		}

		?>

		<form class="p-md-0 p-3" action="<?php echo $accion; ?>" method="POST">
			<div class="card text-center m-auto" style="max-width:500px; min-width: 300px; margin:auto;">
				<div class="card-header">

					<b>Acceso auxiliar</b>
				</div>
				<div class="card-body">
					<p class="card-text">

						<?php if ($datos_usuario == NULL): ?>
							<i class="fa-solid fa-4x fa-circle-user mt-0 mb-2"></i>

							<br>

							<label for="" class="form-label d-block text-start mb-0">Cédula:</label>

							<div class="input-group mb-2">
								<select class="form-select w-auto" name="Tipo_Cédula" required>
									<option value="V">V</option>
									<option value="E">E</option>
								</select>
								<input class="form-control w-auto" type="text" id="Cédula" name="Cédula" placeholder="Cédula de usuario" maxlength="15" required>
							</div>

							<small class="text-muted">Ingrese su numero de cédula para continuar</small>

						<?php elseif($datos_usuario != NULL): ?>

							<span class="d-block mb-3">
								Preguntas de seguridad del usuario con la cédula:
								<u><?php echo $datos_usuario['Cédula_Persona'];?></u>
							</span>



							<label class="form-label text-start d-block" for="Respuesta1">
								<b>Pregunta 1:</b>
								<u><?php echo $Pregunta1; ?></u>
							</label>


							<input id="Respuesta1" class="form-control mb-2" type="text" name="Respuesta1" placeholder="Ingrese texto..." autocomplete="off">

							<label class="form-label text-start d-block" for="Respuesta2">
								<b>Pregunta 2:</b>
								<u><?php echo $Pregunta2; ?></u>
							</label>


							<input id="Respuesta2" class="form-control" type="text" name="Respuesta2" placeholder="Ingrese texto..." autocomplete="off">

							<input type="hidden" name="Cédula" value="<?php echo $Cédula;?>">
							<input type="hidden" name="Recuperar_Clave" value="Recuperar_Clave">

						<?php endif; ?>



					</p>
				</div>
				<div class="card-footer">
					<input class="btn btn-primary" type="submit" name="Ingresar" value="Ingresar">
					<a class="btn btn-primary" href="index.php">Volver</a>
				</div>
			</div>
		</form>
		<!--Footer-->
		<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 bottom-0">
			<span class="text-white">Sistema de inscripción L.B. G.P.F - <i class="far fa-copyright"></i> 2022-<?php echo date("Y"); ?></span>
		</footer>

	</main>



	<?php include("ayuda.php"); ?>

<script type="text/javascript" src="js/sweetalert2.js"></script>
<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/validaciones.js"></script>
<?php if(isset($_POST['Cédula']) AND $datos_usuario == NULL): ?>
<script type="text/javascript">
	Swal.fire(
		'Atención',
		'La cédula ingresada no pertenece a ningún usuario.',
		'info'
	)
</script>
<tr>
	<td colspan="2"><small>Usuario inexistente</small></td>
</tr>
<?php endif; ?>
</body>
</html>
