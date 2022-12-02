<?php
session_start();

if (!$_SESSION['login']) {
	header('Location: ../../index.php');
	exit();
}

require('funciones.php');
require('../../clases/bitácora.php');
require('../../controladores/conexion.php');
$bitácora = new bitácora();
$_SESSION['acciones'] .= ', Modifica su perfil';
$bitácora->actualizar_bitácora($_SESSION['acciones'],$_SESSION['idbitácora']);

$nombre_completo = $_SESSION['persona']['Primer_Nombre']." ".$_SESSION['persona']['Segundo_Nombre']." ".$_SESSION['persona']['Primer_Apellido']." ".$_SESSION['persona']['Segundo_Apellido']


?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Editar perfil de usuario</title>
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
					
					<!--Datos del representante-->
					<div class="card-header text-center">
						<b class="fs-4">Perfil de usuario</b>
					</div>
					
					<div class="card-body">

						<div class="row">

							<!-- Selector de seccion -->
							<div class="col-12 col-lg-3">
								<ul class="nav flex-lg-column nav-pills nav-fill mb-4 gap-2">
									<li class="nav-item">
										<a id="link1" class="nav-link active" href="#">Datos personales</a>
									</li>
									<li class="nav-item">
										<a id="link2" class="nav-link" href="#">Datos de usuario</a>
									</li>
								</ul>
							</div>
							
							<!-- Contenedor del formulario -->
							<div class="col-12 col-lg-9 py-0" style="max-height: 60vh; overflow-y: auto;">

								<form id="registro" action="../../controladores/control-usuarios.php" method="post">
									<!-- Seccion de datos personales -->
									<section id="seccion1" class="row">
										<!-- Titulo de la seccion -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<p class="h3">Datos personales</p>
											</div>
										</div>

										<!-- Nombres -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">Nombres:</label>
											</div>
											<div class="col-12 col-lg-5">
												<input id="Primer_Nombre_U" class="form-control mb-2" type="text"  name="Primer_Nombre_U"  placeholder="Primer nombre" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" required value="<?php echo $_SESSION['persona']['Primer_Nombre'] ?? NULL ?>">

											</div>
											<div class="col-12 col-lg-5">
												<input id="Segundo_Nombre_U" class="form-control mb-2" type="text"  name="Segundo_Nombre_U"  placeholder="Segundo nombre" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" required value="<?php echo $_SESSION['persona']['Segundo_Nombre'] ?? NULL ?>">
											</div>
										</div>

										<!-- Apellidos -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">Apellidos:</label>
											</div>
											<div class="col-12 col-lg-5">
												<input id="Primer_Apellido_U" class="form-control mb-2" type="text" name="Primer_Apellido_U" placeholder="Primer apellido" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" required value="<?php echo $_SESSION['persona']['Primer_Apellido'] ?? NULL ?>">

											</div>
											<div class="col-12 col-lg-5">
												<input id="Segundo_Apellido_U" class="form-control mb-2" type="text" name="Segundo_Apellido_U"  placeholder="Segundo apellido" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" required value="<?php echo $_SESSION['persona']['Segundo_Apellido'] ?? NULL ?>">

											</div>
										</div>

										<!-- Cédula -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label class="form-label">Cédula:</label>
											</div>

											<?php
												// Separa la cédula del caracter que indica si es venezolana o extranjera
												$tipo_Cédula = substr($_SESSION['persona']['Cédula'],0,1);
												$Cédula= substr($_SESSION['persona']['Cédula'],0,strlen($_SESSION['persona']['Cédula'])-1);
										 	?>

											<div class="col-12 col-lg-10">
												<div class="input-group mb-2">
													<select id="Tipo_Cédula_R" class="form-select" name="Tipo_Cédula_R" required>
														<option disabled value="">Tipo de cédula</option>
														<option value="V" <?php if($tipo_Cédula == "V") {echo "selected";}?>>V</option>
														<option value="E" <?php if($tipo_Cédula == "E") {echo "selected";}?>>E</option>
													</select>
													<input id="Cédula_U" class="form-control w-auto" type="text"  name="Cédula_U" pattern="[0-9]+" maxlength="8" minlength="7" required value="<?php echo $Cédula ?? NULL ?>">

												</div>
											</div>
										</div>
										
										<!-- Fecha de nacimiento y genero -->
										<div class="row mb-4">

											<!-- Fecha de nacimiento -->
											<div class="col-12 col-lg-auto">
												<label class="form-label">Fecha de nacimiento:</label>	
											</div>	
											<div class="col-12 col-lg-3">
												<input id="Fecha_Nacimiento_U" class="form-control mb-2" type="date" name="Fecha_Nacimiento_U" min="<?php echo date('Y')-100 .'-01-01'?>" max="<?php echo date('Y')-18 .'-01-01'?>" title="Debe tener al menos 18 años." required value="<?php echo $_SESSION['persona']['Fecha_Nacimiento'] ?? NULL ?>">
											</div>	


											<!-- Genero -->
											<div class="col-12 col-lg-auto mt-4 mt-lg-0">
												<label class="form-label">Género:</label>		
											</div>											
											<div class="col-12 col-lg-3">
												<div class="form-check form-check-inline">
													<label for="Genero_F" class="form-label">F</label>
													<input id="Genero_F" class="form-check-input" type="radio" name="Género_U" value="F" required <?php if($_SESSION['persona']['Género'] == "F"){echo "checked";} ?>>
												</div>
												<div class="form-check form-check-inline">
													<label for="Genero_M" class="form-label">M</label>
													<input id="Genero_M" class="form-check-input" type="radio" name="Género_U" value="M" required <?php if($_SESSION['persona']['Género'] == "M"){echo "checked";} ?>>
												</div>
											</div>

										</div>
										
										<div class="row">
											<div class="col-12 col-lg-4">
												<label class="form-label">Correo electrónico:</label>	
											</div>	
											<div class="col-12 col-lg-8">
												<input id="Correo_electrónico_U" class="form-control mb-2" type="email" name="Correo_electrónico_U"  minlength="15" required value="<?php echo $_SESSION['persona']['Correo_Electrónico'] ?? NULL ?>">
											</div>	
										</div>

									</section>


									<!-- Seccion de datos de usuario -->
									<section id="seccion2" class="row" style="display:none;">
										<!-- Titulo de la seccion -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<p class="h3">Datos de usuario</p>
											</div>
										</div>

										<!-- Rol en el sistema -->
										<div class="row mb-2">
											<div class="col-12 col-md-4">
												<p class="h6">
													Rol en el sistema:
												</p>
											</div>
											<div class="col-12 col-md-8">
												<p><?php echo testRol();?></p>
											</div>
										</div>

										<!-- Privilegios sobre el sistema -->
										<div class="row mb-2">
											<div class="col-12 col-md-4">
												<p class="h6">
													Privilegios:
												</p>
											</div>
											<div class="col-12 col-md-8">
												<p><?php privilegios($_SESSION['usuario']['Privilegios']); ?></p>
											</div>
										</div>

										<!-- Preguntas de seguridad -->
										<div class="row">
											<div class="col-12">
												<p class="h5 mb-4">Preguntas de seguridad:</p>
											</div>

											<!-- Pregunta 1 -->
											<div class="col-12 col-md-6">
												<select name="Pregunta_Seg_1" class="form-select mb-2" required>
													<option selected disabled value="">Seleccione una opción</option>
													<option value="Ciudad de tu luna de miel" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "Ciudad de tu luna de miel"){echo "selected";}?>>Ciudad de tu luna de miel</option>
													<option value="Ciudad donde naciste" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "Ciudad donde naciste"){echo "selected";}?>>Ciudad donde naciste</option>
													<option value="Ciudad preferida de vacaciones" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "Ciudad preferida de vacaciones"){echo "selected";}?>>Ciudad preferida de vacaciones</option>
													<option value="Color que más te gusta" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "Color que más te gusta"){echo "selected";}?>>Color que más te gusta</option>
													<option value="¿Cuál es tu comida favorita?" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "¿Cuál es tu comida favorita?"){echo "selected";}?>>¿Cuál es tu comida favorita?</option>
													<option value="¿Cuál es tu heroe favorito?" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "¿Cuál es tu heroe favorito?"){echo "selected";}?>>¿Cuál es tu heroe favorito?</option>
													<option value="¿Cuál fue tu primer número de Teléfono?" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "¿Cuál fue tu primer número de Teléfono?"){echo "selected";}?>>¿Cuál fue tu primer número de Teléfono?</option>
													<option value="Equipo deportivo preferido" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "Equipo deportivo preferido"){echo "selected";}?>>Equipo deportivo preferido</option>
													<option value="Fecha de aniversario de bodas" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "Fecha de aniversario de bodas"){echo "selected";}?>>Fecha de aniversario de bodas</option>
													<option value="Fecha de nacimiento de tu padre" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "Fecha de nacimiento de tu padre"){echo "selected";}?>>Fecha de nacimiento de tu padre</option>
													<option value="Fecha de tu graduación" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "Fecha de tu graduación"){echo "selected";}?>>Fecha de tu graduación</option>
													<option value="Fruta favorita" <?php if($_SESSION['usuario']['Pregunta_Seg_1'] == "Fruta favorita"){echo "selected";}?>>Fruta favorita</option>
												</select>
											</div>
											<div class="col-12 col-md-6">
												<input class="form-control mb-4 mb-md-2" name="Respuesta_1" type="text" placeholder="Respuesta a la pregunta"  minlength="3" maxlength="50" required value="<?php echo $_SESSION['usuario']['Respuesta_1'] ?? NULL ?>">
											</div>
											
											<!-- Pregunta 2 -->
											<div class="col-12 col-md-6">
												<select name="Pregunta_Seg_2" class="form-select mb-2" required>
													<option selected disabled value="">Seleccione una opción</option>
													<option value="Ciudad de tu luna de miel" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "Ciudad de tu luna de miel"){echo "selected";}?>>Ciudad de tu luna de miel</option>
													<option value="Ciudad donde naciste" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "Ciudad donde naciste"){echo "selected";}?>>Ciudad donde naciste</option>
													<option value="Ciudad preferida de vacaciones" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "Ciudad preferida de vacaciones"){echo "selected";}?>>Ciudad preferida de vacaciones</option>
													<option value="Color que más te gusta" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "Color que más te gusta"){echo "selected";}?>>Color que más te gusta</option>
													<option value="¿Cuál es tu comida favorita?" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "¿Cuál es tu comida favorita?"){echo "selected";}?>>¿Cuál es tu comida favorita?</option>
													<option value="¿Cuál es tu heroe favorito?" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "¿Cuál es tu heroe favorito?"){echo "selected";}?>>¿Cuál es tu heroe favorito?</option>
													<option value="¿Cuál fue tu primer número de Teléfono?" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "¿Cuál fue tu primer número de Teléfono?"){echo "selected";}?>>¿Cuál fue tu primer número de Teléfono?</option>
													<option value="Equipo deportivo preferido" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "Equipo deportivo preferido"){echo "selected";}?>>Equipo deportivo preferido</option>
													<option value="Fecha de aniversario de bodas" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "Fecha de aniversario de bodas"){echo "selected";}?>>Fecha de aniversario de bodas</option>
													<option value="Fecha de nacimiento de tu padre" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "Fecha de nacimiento de tu padre"){echo "selected";}?>>Fecha de nacimiento de tu padre</option>
													<option value="Fecha de tu graduación" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "Fecha de tu graduación"){echo "selected";}?>>Fecha de tu graduación</option>
													<option value="Fruta favorita" <?php if($_SESSION['usuario']['Pregunta_Seg_2'] == "Fruta favorita"){echo "selected";}?>>Fruta favorita</option>
												</select>
											</div>
											<div class="col-12 col-md-6">
												<input class="form-control mb-2" name="Respuesta_2" type="text" placeholder="Respuesta a la pregunta"  minlength="3" maxlength="50" required value="<?php echo $_SESSION['usuario']['Respuesta_2'] ?? NULL ?>">
												<input type="hidden" name="orden" value="Editar">
											</div>
										</div>								
									</section>
								</form>
							</div>

						</div>
					</div>
					<div class="card-footer">
						<a class="btn btn-primary" href="index.php">Volver al inicio</a>
						<input id="B_enviar" class="btn btn-primary" type="button" value="Guardar y continuar">
					</div>		
				</div>
			
		</div>

		<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 position-fixed bottom-0" style="z-index: 100;">
			<span class="text-white">Sistema de inscripción L.B. G.P.F - <i class="far fa-copyright"></i> 2022-<?php echo date("Y"); ?></span>
		</footer>
		<?php include '../../ayuda.php'; ?>
	</main>
<script type="text/javascript" src="../../js/sweetalert2.js"></script>
<script type="text/javascript" src="../../js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../../js/validaciones-usuario.js"></script>
<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
