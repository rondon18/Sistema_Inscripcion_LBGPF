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
require("../clases/estudiante.php");
require("../clases/representantes.php");
require("../clases/padres.php");
require("../controladores/conexion.php");
require("../clases/usuario.php");

require('../clases/bitácora.php');
$bitácora = new bitácora();
$_SESSION['acciones'] .= ', Consulta estudiantes';
$bitácora->actualizar_bitácora($_SESSION['acciones'],$_SESSION['idbitácora']);

$registros_bitácora = $bitácora->mostrar_bitácora();

$estudiante = new Estudiantes();
$representante = new Representantes();
$padres = new Padres();

$listaEstudiantes = $estudiante->mostrarEstudiantes();
$listaRepresentantes = $representante->mostrarRepresentantes();
$listaPadres = $padres->mostrarPadres();

if ($_SESSION['usuario']['Privilegios'] == 1) {
	$usuario = new Usuarios();
	$lista_usuarios = $usuario->mostrarUsuarios();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Consultar registros</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/all.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/colores.css"/>
	<link rel="icon" type="img/png" href="../img/distintivo-LGPF.png">
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
	<!--Banner-->
	<header class="w-100 bg-white d-flex justify-content-between shadow p-1 position-fixed top-0" style="z-index:1000;">
		<div>
			<img src="../img/banner-gobierno.png" alt=""  height="42" class="d-inline-block align-text-top">
			<img src="../img/banner-MPPE.png" alt=""  height="42" class="d-inline-block align-text-top">
		</div>
		<img src="../img/banner-LGPF.png" alt=""  height="42" class="d-inline-block align-text-top">
	</header>
	<div style="width: 90%; margin: 60px auto;">
		<div class="card my-2">
			<section class="card-header">Consulta de registros</section>
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a id="link1" class="nav-link active" href="#" onclick="seccion('seccion1')">Consultar estudiantes</a>
				</li>

				<li class="nav-item">
					<a id="link2" class="nav-link" href="#" onclick="seccion('seccion2')">Consultar representantes</a>
				</li>
					<?php if ($_SESSION['usuario']['Privilegios'] == 1): ?>
					<li class="nav-item">
						<a id="link3" class="nav-link" href="#" onclick="seccion('seccion3')">Consultar usuarios</a>
					</li>
					<li class="nav-item">
						<a id="link4" class="nav-link" href="#" onclick="seccion('seccion4')">Consultar bitácora</a>
					</li>
					<?php endif ?>
			</ul>
			<section class="card-body">
				<div id="seccion1" class="card my-2">
					<div class="card-header">
						Estudiantes registrados
					</div>
					<div class="card-body">
						<table id="estudiantes" class="table table-striped table-bordered table-sm w-100">
							<thead>
								<th>Cédula</th>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Fecha de nacimiento</th>
								<th>Edad</th>
								<th>Año a cursar</th>
								<th>Género</th>
								<th>Correo electrónico</th>
								<th>Dirección de residencia</th>
								<th>Talla de camisa</th>
								<th>Talla de pantalón</th>
								<th>Talla de zapatos</th>
								<th>Estatura</th>
								<th>Peso</th>
								<th>Índice</th>
								<th>Circ. Braquial</th>
								<th>Acciones</th>
							</thead>
							<tbody>

						<?php foreach ($listaEstudiantes as $estudiante):?>
								<tr>
									<td><?php echo $estudiante['Cédula']; ?></td>
									<td style="min-width:210px;"><?php echo $estudiante['Primer_Nombre']." ".$estudiante['Segundo_Nombre']; ?></td>
									<td style="min-width:210px;"><?php echo $estudiante['Primer_Apellido']." ".$estudiante['Segundo_Apellido']; ?></td>
									<td><?php echo $estudiante['Fecha_Nacimiento']; ?></td>
									<td><?php echo calculaedad($estudiante['Fecha_Nacimiento']); ?></td>
									<td style="min-width:120px;"><?php echo $estudiante['Grado_A_Cursar']; ?></td>
									<td><?php echo Género($estudiante['Género']); ?></td>
									<td style="min-width:160px;"><?php echo $estudiante['Correo_Electrónico']; ?></td>
									<td style="min-width:190px;"><?php echo $estudiante['Dirección']; ?></td>
									<td><?php echo $estudiante['Talla_Camisa']; ?></td>
									<td><?php echo $estudiante['Talla_Pantalón']; ?></td>
									<td><?php echo $estudiante['Talla_Zapatos']; ?></td>
									<td><?php echo $estudiante['Estatura']."cm"; ?></td>
									<td><?php echo $estudiante['Peso']."kg"; ?></td>
									<td><?php echo $estudiante['Índice']; ?></td>
									<td><?php echo $estudiante['Circ_Braquial']; ?></td>
									<td>
										<!--Generar planilla de inscripción-->
										<form action="../controladores/generar-planilla-estudiante.php" method="POST" style="display: inline-block;" target="_blank">
											<input type="hidden" name="Cédula_Estudiante" value="<?php echo $estudiante['Cédula']; ?>">
											<input type="hidden" name="id_Estudiante" value="<?php echo $estudiante['idEstudiantes']; ?>">
											<input type="hidden" name="id_representante" value="<?php echo $estudiante['idRepresentante']; ?>">
											<input type="hidden" name="id_padre" value="<?php echo $estudiante['idPadre']; ?>">
											<button class="btn btn-sm btn-danger" type="submit" name="Generar planilla">Generar planilla <i class="fas fa-file-pdf fa-lg ms-2"></i></button>
										</form>
										<form action="consultar-estudiante.php" method="post" style="display: inline-block;">
											<input type="hidden" name="Cédula_Estudiante" value="<?php echo $estudiante['Cédula']; ?>">
											<input type="hidden" name="id_Estudiante" value="<?php echo $estudiante['idEstudiantes']; ?>">
											<input type="hidden" name="id_representante" value="<?php echo $estudiante['idRepresentante']; ?>">
											<input type="hidden" name="id_padre" value="<?php echo $estudiante['idPadre']; ?>">
											<button class="btn btn-sm btn-primary" type="submit" name="Consultar">Consultar <i class="fas fa-magnifying-glass fa-lg ms-2"></i></button>
										</form>
										<form action="editar-estudiante/paso-1.php" method="post" style="display: inline-block;" target="_blank">
											<input type="hidden" name="Cédula_Estudiante" value="<?php echo $estudiante['Cédula']; ?>">
											<input type="hidden" name="id_Estudiante" value="<?php echo $estudiante['idEstudiantes']; ?>">
											<input type="hidden" name="id_representante" value="<?php echo $estudiante['idRepresentante']; ?>">
											<input type="hidden" name="id_padre" value="<?php echo $estudiante['idPadre']; ?>">
											<button class="btn btn-sm btn-primary" type="submit" name="Consultar">Editar <i class="fas fa-pen fa-lg ms-2"></i></button>
										</form>
										<?php if ($_SESSION['usuario']['Privilegios'] == 1): ?>
										<form action="../controladores/control-registros.php" method="post" style="display: inline-block;">
											<input type="hidden" name="Cédula_Estudiante" value="<?php echo $estudiante['Cédula']; ?>">
											<button class="btn btn-sm btn-primary" type="submit" onclick="return confirmacion();" name="orden" value="Eliminar">Eliminar <i class="fas fa-trash-can fa-lg ms-2"></i></button>
										</form>
										<?php endif; ?>
									</td>
								</tr>
						<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>

				<div id="seccion2" class="card my-2">
					<div class="card-header">
						Representantes registrados
					</div>
					<div class="card-body">
							<table id="representantes" class="table table-striped table-bordered table-sm w-100">
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
								<?php foreach ($listaRepresentantes as $representante): ?>
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
								<?php endforeach; ?>
								</tbody>
							</table>
					</div>
				</div>
				<?php if ($_SESSION['usuario']['Privilegios'] == 1): ?>
				<div id="seccion3" class="card my-2">

						<div class="card-header">
							Usuarios registrados
						</div>
						<div class="card-body">
								<table id="usuarios" class="table table-striped table-bordered table-sm w-100">
									<thead>
										<th>Cédula del usuario</th>
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Privilegios</th>
										<th>Acciones</th>
									</thead>
									<tbody>
										<?php foreach ($lista_usuarios as $usuario): ?>
										<tr>
											<td><?php echo $usuario['Cédula_Persona'];?></td>
											<td><?php echo $usuario['Primer_Nombre']. " " .$usuario['Segundo_Nombre']?></td>
											<td><?php echo $usuario['Primer_Apellido']. " " .$usuario['Segundo_Apellido']?></td>
											<td><?php if ($usuario['Privilegios'] == 1) { echo "Administrador";} else { echo "Usuario";} ;?></td>
											<td>
												<?php if ($usuario['Privilegios'] == 1): ?>
												<button class="btn btn-sm btn-danger disabled" type="button" title="No se pueden eliminar Administradores" disabled style="cursor:no-drop;">Eliminar Usuario <i class="fa-solid fa-user-minus fa-lg ms-2"></i></button>
												<?php else: ?>
												<form action="../controladores/control-usuarios.php" method="post">
													<input type="hidden" name="idUsuario" value="<?php echo $usuario['Cédula_Persona'];?>">
													<button class="btn btn-sm btn-danger" type="sumbit" name="orden" value="Eliminar" onclick="return confirmacion();">Eliminar Usuario <i class="fa-solid fa-user-minus fa-lg ms-2"></i></button>
												</form>
												<?php endif; ?>
											</td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
						</div>
					</div>
				<div id="seccion4" class="card my-2">
						<div class="card-header">
							Registro de bitácora
						</div>
						<div class="card-body">
								<table id="bitácora" class="table table-striped table-bordered table-sm w-100">
									<thead>
										<th>Nro. Registro</th>
										<th>Id de usuario</th>
										<th>Fecha entrada</th>
										<th>Hora entrada</th>
										<th>Acciones realizadas</th>
										<th>Fecha de cierre</th>
										<th>Hora de cierre</th>
									</thead>
									<tbody>
									<?php foreach ($registros_bitácora as $registro): ?>
										<?php if ($registro['idbitácora'] != $_SESSION['idbitácora']): #No muestra el ultimo registro por ser el actial?>
											<tr>
												<td><?php echo $registro['idbitácora']?></td>
												<td><?php echo $registro['idUsuarios']?></td>
												<td><?php echo $registro['fechaInicioSesión']?></td>
												<td><?php echo $registro['horaInicioSesión']?></td>
												<td style="min-width:400px; max-width: 800px;"><small><?php echo $registro['linksVisitados']?></small></td>
												<td><?php if(!empty($registro['fechaFinalSesión'])) { echo $registro['fechaFinalSesión'];} else {echo "Sesión no cerrada correctamente";}?></td>
												<td><?php if(!empty($registro['horaFinalSesión'])) { echo $registro['horaFinalSesión'];} else {echo "Sesión no cerrada correctamente";}?></td>
											</tr>
										<?php endif;?>
									<?php endforeach; ?>
									</tbody>
								</table>
						</div>
					</div>
				<?php endif; ?>
			</section>
		</div>

		<div class="card text-center" style="width: 100%; margin-top: 20px;">
			<a class="btn btn-primary" href="index.php">Volver al menú</a>
		</div>
	</div>
	<!--Footer-->
	<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 position-fixed bottom-0">
		<span class="text-white">Sistema de inscripción L.B. G.P.F - <?php echo date("Y"); ?></span>
	</footer>
	<?php include '../ayuda.php'; ?>

<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../js/datatables.min.js"></script>
<script type="text/javascript" src="../js/pdfmake.min.js"></script>
<script type="text/javascript" src="../js/vfs_fonts.js"></script>
<script type="text/javascript" src="../js/sweetalert2.js"></script>
<script type="text/javascript" src="../js/datatables1.min.js"></script>
<script type="text/javascript">
	//Datatables estudiantes
	$(document).ready( function () {
		$('#estudiantes').DataTable({
			responsive: true,
			"language": {
					"url": "../js/datatables-español.json"
			  },
	  	<?php if ($_SESSION['usuario']['Privilegios'] == 1): ?>
			dom: 'Bfrtip',
			buttons: [
				{
	            extend: 'excelHtml5',
	            text: 'Generar reporte en Excel <i class="fa-solid fa-file-excel fa-lg ms-2"></i>',
	            autoFilter: true,
	            filename: 'Reporte de estudiantes',
	            sheetName: 'Reporte de estudiantes',
	            className: 'btn btn-success',
	            messageTop: 'Reporte de estudiantes'
	        	}
		  	],
		  	"pagingType": "numbers"
	  	<?php endif; ?>
		});
	} );
	//Datatables representantes
	$(document).ready( function () {
		$('#representantes').DataTable({
			responsive: true,
			"language": {
					"url": "../js/datatables-español.json"
			  },
			<?php if ($_SESSION['usuario']['Privilegios'] == 1): ?>
			dom: 'Bfrtip',
			buttons: [
				{
	            extend: 'excelHtml5',
	            text: 'Generar reporte en Excel <i class="fa-solid fa-file-excel fa-lg ms-2"></i>',
	            autoFilter: true,
	            filename: 'Reporte de representantes',
	            sheetName: 'Reporte de representantes',
	            className: 'btn btn-success',
	            messageTop: 'Reporte de representantes'
	        }
		  	]
				<?php endif; ?>
		});
	} );
	<?php if ($_SESSION['usuario']['Privilegios'] == 1): ?>
	//Datatables usuarios
	$(document).ready( function () {
		$('#usuarios').DataTable({
			responsive: true,
			"language": {
					"url": "../js/datatables-español.json"
			  },
			dom: 'Bfrtip',
			buttons: [
				{
	            extend: 'excelHtml5',
	            text: 'Generar reporte en Excel <i class="fa-solid fa-file-excel fa-lg ms-2"></i>',
	            autoFilter: true,
	            filename: 'Reporte de usuarios',
	            sheetName: 'Reporte de usuarios',
	            className: 'btn btn-success',
	            messageTop: 'Reporte de usuarios'
	        	}
		  	],
		  	"pagingType": "numbers"

		});
	} );

	//Datatables bitácora
	$(document).ready( function () {
		$('#bitácora').DataTable({
			responsive: true,
			"language": {
					"url": "../js/datatables-español.json"
			  },
			dom: 'Bfrtip',
			"order": [[ 0, "desc" ]],
			buttons: [
				{
	            extend: 'excelHtml5',
	            text: 'Generar reporte en Excel <i class="fa-solid fa-file-excel fa-lg ms-2"></i>',
	            autoFilter: true,
	            filename: 'Reporte de bitácora',
	            sheetName: 'Reporte de bitácora',
	            className: 'btn btn-success',
	            messageTop: 'Reporte de bitácora'
	        }
		  	]
		});
	} );
	<?php endif; ?>
</script>
<?php if (isset($_GET['exito'])): ?>
<script type="text/javascript" defer>
	Swal.fire(
      'Exito',
      'Registro realizado correctamente',
      'success'
    );
</script>
<?php endif; ?>
<script type="text/javascript">
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
	//secciones
	var a = document.getElementById("seccion1");

	var b = document.getElementById("seccion2");
		<?php if ($_SESSION['usuario']['Privilegios'] == 1): ?>
		var c = document.getElementById("seccion3");
		var d = document.getElementById("seccion4");
		<?php endif; ?>
	a.style.display = "block";

	b.style.display = "block";
		<?php if ($_SESSION['usuario']['Privilegios'] == 1): ?>
		c.style.display = "block";
		d.style.display = "block";
		<?php endif; ?>

	setTimeout(function(){

		b.style.display = "none";
			<?php if ($_SESSION['usuario']['Privilegios'] == 1): ?>
			c.style.display = "none";
			d.style.display = "none";
			<?php endif; ?>
	}, 2000);

	function seccion(seccion) {

		//secciones
		var a = document.getElementById("seccion1");
		var b = document.getElementById("seccion2");

		<?php if ($_SESSION['usuario']['Privilegios'] == 1): ?>
		var c = document.getElementById("seccion3");
		var d = document.getElementById("seccion4");
		<?php endif; ?>

		//botones en la navegación
		var link_a = document.getElementById("link1");
		var link_b = document.getElementById("link2");

		<?php if ($_SESSION['usuario']['Privilegios'] == 1): ?>
		var link_c = document.getElementById("link3");
		var link_d = document.getElementById("link4");
		<?php endif; ?>

		//seccion seleccionada como activa(seccion 1 por defecto)
		var seccion = document.getElementById(seccion);

		a.style.display = "none";
		b.style.display = "none";

		<?php if ($_SESSION['usuario']['Privilegios'] == 1): ?>
		c.style.display = "none";
		d.style.display = "none";
		<?php endif; ?>

		link_a.classList.remove("active");
		link_b.classList.remove("active");

		<?php if ($_SESSION['usuario']['Privilegios'] == 1): ?>
		link_c.classList.remove("active");
		link_d.classList.remove("active");
		<?php endif; ?>

		if (seccion == a) {
			a.style.display = "block";
			link_a.classList.add("active");
		}
		else if (seccion == b) {
			b.style.display = "block";
			link_b.classList.add("active");
		}
		<?php if ($_SESSION['usuario']['Privilegios'] == 1): ?>
		else if (seccion == c) {
			c.style.display = "block";
			link_c.classList.add("active");
		}
		else if (seccion == d) {
			d.style.display = "block";
			link_d.classList.add("active");
		}
		<?php endif; ?>
	}
</script>
</body>
</html>
