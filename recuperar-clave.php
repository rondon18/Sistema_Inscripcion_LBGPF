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
	<link rel="stylesheet" type="text/css" href="css/colores.css"/>
	<link rel="stylesheet" type="text/css" href="css/all.min.css"/>
	<link rel="icon" type="img/png" href="img/distintivo-LGPF.png">
</head>
<body>
	<!--Banner-->
	<header class="w-100 bg-white d-flex justify-content-between shadow p-1 position-fixed top-0" style="z-index:1000;">
		<div>
			<img src="img/banner-gobierno.png" alt=""  height="42" class="d-inline-block align-text-top">
			<img src="img/banner-MPPE.png" alt=""  height="42" class="d-inline-block align-text-top">
		</div>
		<img src="img/banner-LGPF.png" alt=""  height="42" class="d-inline-block align-text-top">
	</header>

	<?php

	if (isset($_POST['Tipo_Cédula'],$_POST['Cédula']) AND $datos_usuario != NULL) {
		$accion = "controladores/login.php";
	} else {
		$accion = "recuperar-clave.php";
	}

	 ?>

	<form class="w-100 h-100 d-flex" action="<?php echo $accion; ?>" method="POST" style="min-height: 100vh;">
		<div class="card text-center m-auto" style="max-width:500px; min-width: 300px; margin:auto;">
			<div class="card-header">

				<b>Ingresar al sistema</b>
			</div>
			<div class="card-body">
				<p class="card-text">
					<table class="table table-borderless w-100">

						<?php if ($datos_usuario == NULL): ?>
						<tr>
							<td class="text-start">Cédula:</td>
						</tr>
						<tr>
							<td class="input-group">
								<select class="form-select w-auto" name="Tipo_Cédula" required>
									<option value="V">V</option>
									<option value="E">E</option>
								</select>
								<input class="form-control w-auto" type="text" id="Cédula" name="Cédula" placeholder="Cédula de usuario" maxlength="15" required>
							</td>
						</tr>
						<tr class="text-start">
							<td>
								<small class="text-muted">Ingrese su numero de cédula para continuar</small>
							</td>
						</tr>
						<?php elseif($datos_usuario != NULL): ?>
						<tr>
								<td>
									Preguntas de seguridad del usuario con
									<u>CI:<?php echo $datos_usuario['Cédula_Persona'];?></u>
								</td>
						</tr>
						<tr>
							<td class="text-start">
								<label class="form-input mb-1"><b>Pregunta 1:</b></label>
								<u><?php echo $Pregunta1; ?></u>
								<input class="form-control mb-2" type="text" name="Respuesta1">
							</td>
						</tr>
						<tr>
							<td class="text-start">
								<label class="form-input mb-1"><b>Pregunta 2:</b></label>
								<u><?php echo $Pregunta2; ?></u>
								<input class="form-control mb-2" type="text" name="Respuesta2">

								<input type="hidden" name="Cédula" value="<?php echo $Cédula;?>">
								<input type="hidden" name="Recuperar_Clave" value="Recuperar_Clave">
							</td>
						</tr>
						<?php endif; ?>
					</table>
				</p>
			</div>
			<div class="card-footer">
				<input class="btn btn-primary" type="submit" name="Ingresar" value="Ingresar">
				<a class="btn btn-primary" href="index.php">Volver</a>
			</div>
		</div>
	</form>
	<!--Footer-->
	<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 position-fixed bottom-0">
		<span class="text-white">Sistema de inscripción L.B. G.P.F - <?php echo date("Y"); ?></span>
	</footer>
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
