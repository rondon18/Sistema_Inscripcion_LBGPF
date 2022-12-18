<?php

require("controladores/conexion.php");
require("clases/usuario.php");

$usuario = new Usuarios();

$datos_usuario = NULL;

if (isset($_POST['NacioNalidad'],$_POST['Cédula'])) {
	$Cédula = $_POST['NacioNalidad'].$_POST['Cédula'];
	if ($datos_usuario = $usuario->consultarUsuario($Cédula)) {
		$Pregunta1 = $datos_usuario['Pregunta_Seg_1'];
		$Pregunta2 = $datos_usuario['Pregunta_Seg_2'];
	}
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Ingresar al sistema</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/estilos.css"/>
	<link rel="stylesheet" type="text/css" href="css/all.min.css"/>
	<link rel="icon" type="img/png" href="img/distintivo-LGPF.png">
</head>
<body>
	<main class="d-flex vh-100" style="max-height: 100vh; overflow-y: auto;">
		<!--Banner-->
		<header class="w-100 bg-white d-flex justify-content-center justify-content-md-between shadow p-1 position-absolute top-0" style="z-index:1000;">
			<div>
				<img src="img/banner-gobierno.png" alt=""  height="42" class="d-none d-md-inline-block align-text-top">
				<img src="img/banner-MPPE.png" alt=""  height="42" class="d-none d-md-inline-block align-text-top">
			</div>
			<img src="img/banner-LGPF.png" alt=""  height="42" class="d-inline-block align-text-top">
		</header>

		<?php

			if (isset($_POST['NacioNalidad'],$_POST['Cédula']) AND $datos_usuario != NULL) {
				$accion = "controladores/login.php";
			} else {
				$accion = "recuperar-clave.php";
			}

		?>

		<div class="container-md py-3 px-xl-5 align-self-center">
				<div class="card mx-auto my-auto" style="max-width:400px;">
					<form action="<?php echo $accion; ?>" method="POST">
						
						<div class="card-header text-center">
							<b>Contraseña olvidada</b>
						</div>
						<div class="card-body p-4">

							<div class="row mb-2">
								<div class="col-12 text-center">
									<i class="fa-solid fa-5x fa-question-circle mt-0 mb-2"></i>
								</div>
							</div>
							
							<?php if ($datos_usuario == NULL): ?>
							
							<div class="row">
								<div class="col-12">
									<label class="form-label">Cédula:</label>
								</div>
							</div>

							<div class="row">
								<div class="col">
									<div class="input-group mb-2">
										<!-- Campo del nacionalidad -->
										<select class="form-select" name="NacioNalidad" required>
											<option selected disabled value="">Seleccione una opción</option>
											<option value="V">V</option>
											<option value="E">E</option>
										</select>
										<!-- Campo del número de cédula -->
										<input class="form-control w-sm-auto" type="text" id="Cédula" name="Cédula" placeholder="Cédula de usuario" maxlength="15" required>		
									</div>
								</div>
							</div>

							<?php elseif($datos_usuario != NULL): ?>
							
							<div class="row mb-2">
								<div class="col">
									<span>
										Preguntas de seguridad del usuario con
										<u>CI:<?php echo $datos_usuario['Cédula_Persona'];?></u>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col">
									<label class="form-label">Pregunta de seguridad 1:</label>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<input class="form-control mb-2" type="text" name="Respuesta1" placeholder="<?php echo $Pregunta1;?>">
								</div>
							</div>

							<div class="row">
								<div class="col">
									<label class="form-label">Pregunta de seguridad 2:</label>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<input class="form-control mb-2" type="text" name="Respuesta2" placeholder="<?php echo $Pregunta2;?>">
								</div>
							</div>

							<?php endif; ?>

						</div>
						<div class="card-footer">

							<input type="hidden" name="Cédula" value="<?php echo $Cédula;?>">
							<input type="hidden" name="Recuperar_Clave" value="Recuperar_Clave">

						<?php if ($datos_usuario != NULL): ?>
							
							<button class="btn btn-primary w-100" type="submit" name="Ingresar">Verificar preguntas</button>
						
						<?php else: ?>
							
							<button class="btn btn-primary w-100" type="submit" name="Ingresar">Buscar cédula</button>

						<?php endif ?>
						</div>
					</form>
				</div>
			</div>




<!-- 
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
									<select class="form-select w-auto" name="NacioNalidad" required>
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
		</form> -->

		<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 position-fixed bottom-0">
			<span class="text-white">Sistema de inscripción L.B. G.P.F - <i class="far fa-copyright"></i> 2022-<?php echo date("Y"); ?></span>
		</footer>
		<?php include 'ayuda.php'; ?>
	</main>

<script type="text/javascript" src="js/sweetalert2.js"></script>
<script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
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
