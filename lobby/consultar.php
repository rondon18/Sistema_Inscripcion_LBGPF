<?php

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}





require("../clases/estudiante.php");
require("../clases/representantes.php");
require("../clases/padres.php");
require("../controladores/conexion.php");
require("../clases/usuario.php");

require('../clases/bitacora.php');
$bitacora = new bitacora();
$_SESSION['acciones'] .= ', Consulta estudiantes';
$bitacora->actualizar_Bitacora($_SESSION['acciones'],$_SESSION['idBitacora']);

$registros_bitacora = $bitacora->mostrar_bitacora();

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
	<div style="width: 90%; margin: auto;">
		<div class="card my-2">
			<section class="card-header">Consulta de registros</section>
			<?php if ($_SESSION['usuario']['Privilegios'] == 1): ?>
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a id="link1" class="nav-link active" href="#" onclick="seccion('seccion1')">Consultar estudiantes</a>
				</li>
				<li class="nav-item">
					<a id="link2" class="nav-link" href="#" onclick="seccion('seccion2')">Consultar usuarios</a>
				</li>
				<li class="nav-item">
					<a id="link3" class="nav-link" href="#" onclick="seccion('seccion3')">Consultar representantes</a>
				</li>
				<li class="nav-item">
					<a id="link4" class="nav-link" href="#" onclick="seccion('seccion4')">Consultar bitacora</a>
				</li>
			</ul>
		<?php endif; ?>
			<section class="card-body">
				<div id="seccion1" class="card my-2">
					<div class="card-header">
						Estudiantes registrados
					</div>
					<div class="card-body">
						<table id="estudiantes" class="table table-striped table-bordered table-sm w-100">
							<thead>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Cédula</th>
								<th>Fecha de nacimiento</th>
								<th>Lugar de nacimiento</th>
								<th>Género</th>
								<th>Correo electrónico</th>
								<th>Dirección de residencia</th>
								<th>Plantel de procedencia</th>
								<th>Con quien vive</th>
								<th>Acciones</th>
							</thead>
							<tbody>
						<?php foreach ($listaEstudiantes as $estudiante): ?>
								<tr>
									<td><?php echo $estudiante['Primer_Nombre']." ".$estudiante['Segundo_Nombre']; ?></td>
									<td><?php echo $estudiante['Primer_Apellido']." ".$estudiante['Segundo_Apellido']; ?></td>
									<td><?php echo $estudiante['Cédula']; ?></td>
									<td><?php echo $estudiante['Fecha_Nacimiento']; ?></td>
									<td><?php echo $estudiante['Lugar_Nacimiento']; ?></td>
									<td><?php echo $estudiante['Género']; ?></td>
									<td><?php echo $estudiante['Correo_Electrónico']; ?></td>
									<td><?php echo $estudiante['Dirección']; ?></td>
									<td><?php echo $estudiante['Plantel_Procedencia']; ?></td>
									<td><?php echo $estudiante['Con_Quien_Vive']; ?></td>
									<td>
										<!--Generar planilla de inscripción-->
<<<<<<< HEAD
										<form action="" method="POST" style="display: inline-block;">
											<input type="hidden" name="id_estudiante" value="<?php echo $estudiante['Cédula'] ?>">
											<input type="hidden" name="id_representante" value="<?php echo $estudiante['idRepresentante'] ?>">
											<input type="hidden" name="id_padre" value="<?php echo $estudiante['idPadre'] ?>">
=======
										<form action="../controladores/generar-planilla-estudiante.php" method="POST" style="display: inline-block;">
											<input type="hidden" name="cedula_Estudiante" value="<?php echo $estudiante['Cédula']; ?>">
											<input type="hidden" name="id_Estudiante" value="<?php echo $estudiante['idEstudiantes']; ?>">
											<input type="hidden" name="id_representante" value="<?php echo $estudiante['idRepresentante']; ?>">	
											<input type="hidden" name="id_padre" value="<?php echo $estudiante['idPadre']; ?>">
>>>>>>> a6514deb2403da68c1ba9d0bbc1689431821486d
											<input type="submit" name="Generar planilla" value="Generar planilla">
										</form>
									</td>
								</tr>
						<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
				<?php if ($_SESSION['usuario']['Privilegios'] == 1): ?>
				<div id="seccion2" class="card my-2" style="display:none;">

					<div class="card-header">
						Usuarios registrados
					</div>
					<div class="card-body">
							<table id="usuarios" class="table table-striped table-bordered table-sm w-100">
								<thead>
									<th>ID del usuario</th>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Cédula del usuario</th>
									<th>Privilegios</th>
								</thead>
								<tbody>
									<?php foreach ($lista_usuarios as $usuario): ?>
									<tr>
										<td><?php echo $usuario['idUsuarios'];?></td>
										<td><?php echo $usuario['Primer_Nombre']?></td>
										<td><?php echo $usuario['Primer_Apellido']?></td>
										<td><?php echo $usuario['Cedula_Persona'];?></td>
										<td><?php if ($usuario['Privilegios'] == 1) { echo "Administrador";} else { echo "Usuario";} ;?></td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
					</div>
				</div>
				<div id="seccion3" class="card my-2">
					<div class="card-header">
						Representantes registrados
					</div>
					<div class="card-body">
							<table id="representantes" class="table table-striped table-bordered table-sm w-100">
								<thead>
									<th>Nro. Registro</th>
									<th>Nombres</th>
									<th>Apellidos</th>
									<th>Cédula</th>
									<th>Fecha de nacimiento</th>
									<th>Lugar de nacimiento</th>
									<th>Genero</th>
									<th>Correo electronico</th>
									<th>Dirección</th>
									<th>Estado civil</th>
									<th>Grado de instrucción</th>
								</thead>
								<tbody>
								<?php foreach ($listaRepresentantes as $representante): ?>
									<tr>
										<td><?php echo $representante['idPersonas']?></td>
										<td><?php echo $representante['Primer_Nombre'].' '.$representante['Segundo_Nombre']?></td>
										<td><?php echo $representante['Primer_Apellido'].' '.$representante['Segundo_Apellido']?></td>
										<td><?php echo $representante['Cédula']?></td>
										<td><?php echo $representante['Fecha_Nacimiento']?></td>
										<td><?php echo $representante['Lugar_Nacimiento']?></td>
										<td><?php echo $representante['Género']?></td>
										<td><?php echo $representante['Correo_Electrónico']?></td>
										<td><?php echo $representante['Dirección']?></td>
										<td><?php echo $representante['Estado_Civil']?></td>
										<td><?php echo $representante['Grado_Academico']?></td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
					</div>
				</div>
				<div id="seccion4" class="card my-2" style="display:none;">
					<div class="card-header">
						Representantes registrados
					</div>
					<div class="card-body">
							<table id="bitacora" class="table table-striped table-bordered table-sm w-100">
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
								<?php foreach ($registros_bitacora as $registro): ?>
									<?php if ($registro['idBitacora'] != $_SESSION['idBitacora']): #No muestra el ultimo registro por ser el actial?>
										<tr>
											<td><?php echo $registro['idBitacora']?></td>
											<td><?php echo $registro['idUsuarios']?></td>
											<td><?php echo $registro['fechaInicioSesion']?></td>
											<td><?php echo $registro['horaInicioSesion']?></td>
											<td style="max-width:350px"><small><?php echo $registro['linksVisitados']?></small></td>
											<td><?php if(!empty($registro['fechaFinalSesion'])) { echo $registro['fechaFinalSesion'];} else {echo "Sesión no cerrada correctamente";}?></td>
											<td><?php if(!empty($registro['horaFinalSesion'])) { echo $registro['horaFinalSesion'];} else {echo "Sesión no cerrada correctamente";}?></td>
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

		<hr>

		<div class="card text-center" style="width: 100%; margin-top: 20px;">
			<a class="btn btn-primary" href="index.php">Volver al menú</a>
		</div>
	</div>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../js/datatables.min.js"></script>

<script type="text/javascript" src="../js/pdfmake.min.js"></script>
<script type="text/javascript" src="../js/vfs_fonts.js"></script>
<script type="text/javascript" src="../js/datatables1.min.js"></script>
<script type="text/javascript">
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
	            text: 'Generar reporte en Excel <i class="fa-solid fa-file-excel fa-lg"></i>',
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
	<?php if ($_SESSION['usuario']['Privilegios'] == 1): ?>
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
	            text: 'Generar reporte en Excel <i class="fa-solid fa-file-excel fa-lg"></i>',
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
	$(document).ready( function () {
		$('#representantes').DataTable({
			responsive: true,
			"language": {
					"url": "../js/datatables-español.json"
			  },
			dom: 'Bfrtip',
			buttons: [
				{
	            extend: 'excelHtml5',
	            text: 'Generar reporte en Excel <i class="fa-solid fa-file-excel fa-lg"></i>',
	            autoFilter: true,
	            filename: 'Reporte de representantes',
	            sheetName: 'Reporte de representantes',
	            className: 'btn btn-success',
	            messageTop: 'Reporte de representantes'
	        }
		  	]
		});
	} );
	$(document).ready( function () {
		$('#bitacora').DataTable({
			responsive: true,
			"language": {
					"url": "../js/datatables-español.json"
			  },
			dom: 'Bfrtip',
			"order": [[ 0, "desc" ]],
			buttons: [
				{
	            extend: 'excelHtml5',
	            text: 'Generar reporte en Excel <i class="fa-solid fa-file-excel fa-lg"></i>',
	            autoFilter: true,
	            filename: 'Reporte de bitacora',
	            sheetName: 'Reporte de bitacora',
	            className: 'btn btn-success',
	            messageTop: 'Reporte de bitacora'
	        }
		  	]
		});
	} );
	<?php endif; ?>
</script>
<script>
	function seccion(seccion) {

		//secciones
		var a = document.getElementById("seccion1");
		var b = document.getElementById("seccion2");
		var c = document.getElementById("seccion3");
		var d = document.getElementById("seccion4");

		//botones en la navegación
		var link_a = document.getElementById("link1");
		var link_b = document.getElementById("link2");
		var link_c = document.getElementById("link3");
		var link_d = document.getElementById("link4");

		//seccion seleccionada como activa(seccion 1 por defecto)
		var seccion = document.getElementById(seccion);

		a.style.display = "none";
		b.style.display = "none";
		c.style.display = "none";
		d.style.display = "none";

		link_a.classList.remove("active");
		link_b.classList.remove("active");
		link_c.classList.remove("active");
		link_d.classList.remove("active");

		if (seccion == a) {
			a.style.display = "block";
			link_a.classList.add("active");
		}
		else if (seccion == b) {
			b.style.display = "block";
			link_b.classList.add("active");
		}
		else if (seccion == c) {
			c.style.display = "block";
			link_c.classList.add("active");
		}
		else if (seccion == d) {
			d.style.display = "block";
			link_d.classList.add("active");
		}
	}
</script>
</body>
</html>
