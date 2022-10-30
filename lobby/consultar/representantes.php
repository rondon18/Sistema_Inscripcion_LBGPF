<?php

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}


function calculaedad($fechanacimiento){
  list($ano,$mes,$dia) = explode("-",$fechanacimiento);
  $ano_diferencia  = date("Y") - $ano;
  $mes_diferencia = date("m") - $mes;
  $dia_diferencia   = date("d") - $dia;
  if ($dia_diferencia < 0 || $mes_diferencia < 0)
    $ano_diferencia--;
  return $ano_diferencia;
}

function Género($Género){
	if ($Género == "F") {
		$Género = "Femenino";
	}
	elseif ($Género == "M") {
		$Género = "Masculino";
	}
	return $Género;
}
require("../../clases/representantes.php");
require("../../clases/Padre.php");
require("../../clases/madre.php");
require("../../controladores/conexion.php");
require("../../clases/usuario.php");

require('../../clases/bitácora.php');
$bitácora = new bitácora();
$_SESSION['acciones'] .= ', Consulta representantes';
$bitácora->actualizar_bitácora($_SESSION['acciones'],$_SESSION['idbitácora']);

$registros_bitácora = $bitácora->mostrar_bitácora();

$representante = new representantes();
$representante = new Representantes();
$Padre = new Padre();
$Madre = new Madre();

$listaRepresentantes = $representante->mostrarRepresentantes();
$listaPadre = $Padre->mostrarPadre();
$listaMadre = $Madre->mostrarMadre();

if ($_SESSION['usuario']['Privilegios'] == 1) {
	$usuario = new Usuarios();
	$lista_usuarios = $usuario->mostrarUsuarios();
}
?>



<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Página de inicio</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../../css/estilos.css" />
	<link rel="stylesheet" type="text/css" href="../../css/all.min.css" />
	<link rel="stylesheet" type="text/css" href="../../css/hover.min.css" />
	<link rel="stylesheet" type="text/css" href="../../css/datatables.min.css" />
	<link rel="icon" type="img/png" href="../../img/distintivo-LGPF.png">
</head>


<style media="screen">

</style>

<body>

	<main class="h-100" style="min-height:100vh;">

		<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom border-3 border-secondary shadow-lg"
			aria-label="Barra de navegación">

			<div class="container">

				<a class="navbar-brand" href="#">

					<img id="distintivo" src="../../img/distintivo-LGPF.png" class="me-2" width="64" height=""
						alt="Distintivo de la institución">

					<span class="fs-6 fs-sm-1">L. B. Gonzalo Picón Febres</span>
				</a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#BarraNavegación"
					aria-controls="BarraNavegación" aria-expanded="false" aria-label="Toggle navigation">

					<span class="navbar-toggler-icon"></span>

				</button>

				<div class="collapse navbar-collapse" id="BarraNavegación">

					<ul class="navbar-nav me-auto mb-2 mb-sm-0">

						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="../index.php">
								<i class="fas fa-home"></i>
								Menú principal
							</a>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
								data-bs-toggle="dropdown" aria-expanded="false">
								<i class="fas fa-search"></i>
								Consultar
							</a>

							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">

								<!-- Accciones de representante -->

								<li><a class="dropdown-item" href="#">representantes</a></li>

								<li>
									<hr class="dropdown-divider">
								</li>

								<!-- Acciones de docente / administrador -->

								<li><a class="dropdown-item" href="#">Representantes</a></li>
								<li><a class="dropdown-item" href="#">Padres</a></li>

								<li>
									<hr class="dropdown-divider">
								</li>

								<!-- Acciones de administrador -->

								<li><a class="dropdown-item" href="#">Usuarios</a></li>
								<li><a class="dropdown-item" href="#">Registros</a></li>

							</ul>

						</li>

						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="fas fa-wrench"></i>
								Mantenimiento
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="fas fa-user"></i>
								Perfil
							</a>
						</li>

					</ul>

				</div>

			</div>

		</nav>

		<div class="container-md pb-3">

			<div class="row">


				<div class="col-12 pt-2">

					<div class="card bg-light w-100 mx-0">

						<div class="card-header text-center">
							<b>Consultar registros</b>
						</div>


						<div class="card-body">


							<!--Selector de consulta-->
							<div class="bg-primary mb-4 p-2 rounded-2 text-white shadow border w-100">
								<div
									class="selector-consulta d-flex flex-column flex-sm-row gap-2 align-items-center justify-content-evenly">
									<p class="h4 m-0 text-center">Consultar:</p>
									<a href="representantes.php" class="btn btn-outline-light hvr-icon-grow">
										<i class="fas fa-lg fa-children me-2 hvr-icon"></i>
										representantes
									</a>
									<a href="representantes.php" class="btn btn-outline-light hvr-icon-grow">
										<i class="fas fa-lg fa-users me-2 hvr-icon"></i>
										Representantes
									</a>
									<a href="padres.php" class="btn btn-outline-light hvr-icon-grow">
										<i class="fas fa-lg fa-person me-2 hvr-icon"></i>
										Padres
									</a>
									<a href="usuarios.php" class="btn btn-outline-light hvr-icon-grow">
										<i class="fas fa-lg fa-user me-2 hvr-icon"></i>
										Usuarios
									</a>
									<a href="registros.php" class="btn btn-outline-light hvr-icon-grow">
										<i class="fas fa-lg fa-clipboard me-2 hvr-icon"></i>
										Registros
									</a>
								</div>
							</div>


							<div class="mb-3">
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary" data-bs-toggle="modal"
									data-bs-target="#exampleModal">
									Búsqueda avanzada
									<i class="fas fa-lg fa-search ms-1"></i>
								</button>

								<!-- Modal -->
								<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
									aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Búsqueda avanzada: representantes</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal"
													aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<form action="">
													<div class="row">

														<div class="col-12 mb-2">
															<p
																class="my-2 h5 text-uppercase border-2 border-bottom border-dark text-center mb-3">
																Palabra a buscar</p>
															<input class="form-control p-2 px-3 fs-3" type="text"
																placeholder="Ingrese texto....">
														</div>

														<div class="col-12 mb-2">
															<p
																class="my-2 h5 text-uppercase border-2 border-bottom border-dark text-center mb-3">
																Filtros de búsqueda</p>
														</div>

														<!-- 	<div class="col-2 mb-2">
															<label for="campo1" class="form-label h6 text-decoration-underline">Filtro:</label>
															<input type="text" name="campo1" class="form-control">
														</div>
														 -->
														<div class="col-12 col-md-4 mb-2">
															<label for="campo1" class="form-label h6 text-decoration-underline">Tipo de cédula:</label>
															<select name="campo1" id="" class="form-select">
																<option value="">Cualquiera</option>
																<option value="">Venezolana</option>
																<option value="">Extranjera</option>
															</select>
														</div>

														<div class="col-6 col-md-4 mb-2">
															<label for="campo1" class="form-label h6 text-decoration-underline">Género:</label>
															<select name="campo1" id="" class="form-select">
																<option value="">Cualquiera</option>
																<option value="">Femenino</option>
																<option value="">Masculino</option>
															</select>
														</div>

														<div class="col-6 col-md-4 mb-2">
															<label for="campo1" class="form-label h6 text-decoration-underline">Año a cursar:</label>
															<select name="campo1" id="" class="form-select">
																<option value="">Cualquiera</option>
																<option value="">Primer año</option>
																<option value="">Segundo año</option>
																<option value="">Tercer año</option>
																<option value="">Cuarto año</option>
																<option value="">Quinto año</option>
															</select>
														</div>

														<div class="col-6 col-md-5 col-lg-3 mb-2">
															<label for="campo1" class="form-label h6 text-decoration-underline">Vacunado:</label>
															<select name="campo1" id="" class="form-select">
																<option value="">Cualquiera</option>
																<option value="">Si</option>
																<option value="">No</option>
															</select>
														</div>

														<div class="col-6 col-md-5 col-lg-3 mb-2">
															<label for="campo1" class="form-label h6 text-decoration-underline">Vacuna aplicada:</label>
															<select name="campo1" id="" class="form-select">
																<option value="">Cualquiera</option>
																<option value="">Pfizer-BioNTech</option>
																<option value="">Oxford/AstraZeneca</option>
																<option value="">Ad26.CoV2.S de Janssen</option>
																<option value="">Moderna (ARNm-1273)</option>
																<option value="">Sinopharm</option>
																<option value="">CoronaVac de Sinovac</option>
																<option value="">BBV152 (Covaxin) de Bharat Biotech</option>
																<option value="">Covovax</option>
																<option value="">Cansino</option>
																<option value="">Sputnik V</option>
																<option value="">Abdala</option>
																<option value="">Otra</option>
															</select>
														</div>

														<div class="col-6 col-lg-3 mb-2">
															<label for="campo1" class="form-label h6 text-decoration-underline">Nacido despúes de:</label>
															<input type="date" name="campo1" class="form-control">
														</div>

														<div class="col-6 col-lg-3 mb-2">
															<label for="campo1" class="form-label h6 text-decoration-underline">Nacido antes de:</label>
															<input type="date" name="campo1" class="form-control">
														</div>

														<div class="col-12 mb-2">
															<label for="" class="form-label h6 text-decoration-underline">Ordenar por:</label>
															<select name="" id="" class="form-select">
																<option value="">Cédula</option>
																<option value="">Nombres</option>
																<option value="">Apellidos</option>
																<option value="">Fecha de nacimiento</option>
																<option value="">Edad</option>
																<option value="">Año a cursar</option>
																<option value="">Género</option>
																<option value="">Correo electrónico</option>
																<option value="">Dirección de residencia</option>
																<option value="">Talla de camisa</option>
																<option value="">Talla de pantalón</option>
																<option value="">Talla de zapatos</option>
																<option value="">Estatura</option>
																<option value="">Peso</option>
																<option value="">Índice</option>
																<option value="">Circ. Braquial</option>
																<option value="">Vacunado</option>
																<option value="">Vacuna</option>
																<option value="">Dosis</option>
																<option value="">Lote</option>
															</select>
														</div>

														<div class="col-12">
															<button class="btn btn btn-primary w-xs-100 w-sm-100 w-md-auto w-lg-auto">
																Buscar
																<i class="fas fa-lg fa-search ms-1"></i>
															</button>
														</div>

													</div>
												</form>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary"
													data-bs-dismiss="modal">Cerrar</button>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="">

								<p class="h4 text-uppercase border-2 border-bottom border-dark text-center mb-3">
									Mostrando representantes registrados
								</p>

								<table id="representantes" class="table table-striped table-bordered table-sm">
									<thead>
										<th>Cédula</th>
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Fecha de nacimiento</th>
										<th>Lugar de nacimiento</th>
										<th>Género</th>
										<th>Correo Electrónico</th>
										<th>Dirección</th>
										<th>Estado civil</th>
										<th>Grado de instrucción</th>
									</thead>
									<tbody>
										<?php foreach ($listaRepresentantes as $representante):?>
												<tr>
													<td><?php echo $representante['Cédula']?></td>
													<td><?php echo $representante['Primer_Nombre'].' '.$representante['Segundo_Nombre']?></td>
													<td><?php echo $representante['Primer_Apellido'].' '.$representante['Segundo_Apellido']?></td>
													<td><?php echo $representante['Fecha_Nacimiento']?></td>
													<td><?php echo $representante['Lugar_Nacimiento']?></td>
													<td><?php echo Género($representante['Género']); ?></td>
													<td><?php echo $representante['Correo_Electrónico']?></td>
													<td><?php echo $representante['Dirección']?></td>
													<td><?php echo $representante['Estado_Civil']?></td>
													<td><?php echo $representante['Grado_Académico']?></td>
												</tr>
										<?php endforeach ?>
									</tbody>
									<tfoot>
										<th>Cédula</th>
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Fecha de nacimiento</th>
										<th>Lugar de nacimiento</th>
										<th>Género</th>
										<th>Correo Electrónico</th>
										<th>Dirección</th>
										<th>Estado civil</th>
										<th>Grado de instrucción</th>
									</tfoot>
								</table>
							</div>

						</div>

						<div class="card-footer text-center">
							<span class="text-muted">Sistema de inscripción L.B. G.P.F - <i class="far fa-copyright"></i>
								2022-2022</span>
						</div>

					</div>

				</div>

			</div>
		</div>
	</main>

	<footer class="w-100 m-0 container-fluid row bg-white p-0">
		<div class="col-12">
			<div
				class="w-100 bg-white d-flex flex-wrap flex-md-nowrap justify-content-center align-items-center justify-content-md-between shadow"
				style="z-index:1000;">
						<img src=" ../../img/banner-gobierno.png" alt="" height="48" class="m-2">
				<img src="../../img/banner-MPPE.png" alt="" height="48" class="m-2 me-md-auto">
				<img src="../../img/banner-LGPF.png" alt="" height="48" class="m-2">
			</div>
		</div>
	</footer>

	<!--Botón para subir-->
	<a href="#" id="js_up" class="position-fixed bottom-0 start-0 btn btn-secondary mb-4 ms-4 ms-sm-5"
		title="Subir al inicio" style="z-index:1001;">

		<i class="fa fa-lg fa-arrow-up" aria-hidden="true"></i>

	</a>


</body>
<script type="text/javascript" src="../../js/sweetalert2.js"></script>
<script type="text/javascript" src="../../js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../../js/datatables.min.js"></script>
<script type="text/javascript" src="../../js/pdfmake.min.js"></script>
<script type="text/javascript" src="../../js/vfs_fonts.js"></script>
<script type="text/javascript" src="../../js/datatables1.min.js"></script>

<script>
	//Datatables representantes
	$(document).ready(function () {
		$('#representantes').DataTable({
			responsive: true,
			"language": {
				"url": "../../js/datatables-español.json"
			},
			dom: 'Bfrtip',
			buttons: [{
				extend: 'excelHtml5',
				text: 'Generar reporte en Excel <i class="fa-solid fa-file-excel fa-lg ms-2 hvr-icon"></i>',
				autoFilter: true,
				filename: 'Reporte de representantes',
				sheetName: 'Reporte de representantes',
				className: 'btn btn-success my-3 m-md-auto w-xs-100 w-sm-100 hvr-icon-grow',
				messageTop: 'Reporte de representantes'
			}],
			"pagingType": "numbers"
		});
	});
</script>

</html>
