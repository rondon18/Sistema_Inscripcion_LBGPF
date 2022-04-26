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

$conexion = conectarBD();
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

desconectarBD($conexion);
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
								<th>Fecha_Nacimiento</th>
								<th>Lugar_Nacimiento</th>
								<th>Género</th>
								<th>Correo_Electrónico</th>
								<th>Dirección</th>
								<th>Estado_Civil</th>
								<th>idEstudiantes</th>
								<th>Plantel_Procedencia</th>
								<th>Con_Quien_Vive</th>
								<th>Cedula_Persona</th>
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
									<td><?php echo $estudiante['Estado_Civil']; ?></td>
									<td><?php echo $estudiante['idEstudiantes']; ?></td>
									<td><?php echo $estudiante['Plantel_Procedencia']; ?></td>
									<td><?php echo $estudiante['Con_Quien_Vive']; ?></td>
									<td><?php echo $estudiante['Cedula_Persona']; ?></td>
									<td>
										<!--Generar planilla de inscripción-->
										<form action="" method="POST" style="display: inline-block;">
											<input type="hidden" name="id_estudiante" value="<?php echo $estudiante[12] ?>">
											<input type="hidden" name="id_representante" value="<?php echo $estudiante[15] ?>">
											<input type="hidden" name="id_padre" value="<?php echo $estudiante[16] ?>">
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
				<div id="seccion3" class="card my-2" style="display:none;">
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
									<th>Relación</th>
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
										<td><?php echo $representante['Vinculo']?></td>
										<td><?php echo $representante['Grado_Academico']?></td>

									</tr>
								<?php endforeach; ?>
								<?php for ($i=0; $i < 100; $i++):?>
									<tr>
										<td>item 1</td>
										<td>item 2</td>
										<td>item 3</td>
										<td>item 4</td>
										<td>item 5</td>
										<td>item 6</td>
										<td>item 7</td>
										<td>item 8</td>
										<td>item 9</td>
										<td>item 10</td>
										<td>item 11</td>
										<td>item 12</td>
									</tr

								<?php endfor; ?>
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
	$(document).ready( function () {
		$('#usuarios').DataTable({
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
	            filename: 'Reporte de usuarios',
	            sheetName: 'Reporte de usuarios',
	            className: 'btn btn-success',
	            messageTop: 'Reporte de usuarios'
	        	}
		  	],
		  	"pagingType": "numbers"
		  	<?php endif; ?>
		});
	} );
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
	            text: 'Generar reporte en Excel <i class="fa-solid fa-file-excel fa-lg"></i>',
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
</script>
<script>
	function seccion(seccion) {

		//secciones
		var a = document.getElementById("seccion1");
		var b = document.getElementById("seccion2");
		var c = document.getElementById("seccion3");

		//botones en la navegación
		var link_a = document.getElementById("link1");
		var link_b = document.getElementById("link2");
		var link_c = document.getElementById("link3");

		//seccion seleccionada como activa(seccion 1 por defecto)
		var seccion = document.getElementById(seccion);

		a.style.display = "none";
		b.style.display = "none";
		c.style.display = "none";

		link_a.classList.remove("active");
		link_b.classList.remove("active");
		link_c.classList.remove("active");

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
	}
</script>
</body>
</html>
