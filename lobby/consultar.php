<?php 

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

require("../clases/alumno.php");
require("../clases/representantes.php");
require("../clases/padres.php");
require("../controladores/conexion.php");

$conexion = conectarBD();
$alumno = new Alumnos();
$representante = new Representantes();
$padres = new Padres();

$listaAlumnos = $alumno->mostrarAlumnos();
$listaRepresentantes = $representante->mostrarRepresentantes();
$listaPadres = $padres->mostrarPadres();

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
</head>
<body>
	<div style="width: 90%; margin: auto;">
		<div class="card">
			<div class="card-header">
				Alumnos registrados
			</div>
			<div class="card-body">
				<table id="alumnos" class="table table-striped table-bordered" style="max-width: 100%;">
					<thead>
						<th>Nombres</th>
						<th>Apellidos</th>
						<th>Cédula</th>
						<th>Fecha de nacimiento</th>
						<th>Lugar de nacimiento</th>
						<th>Genero</th>
						<th>Dirección</th>
						<th>Plantel de procedencia</th>
						<th>Acciones</th>
					</thead>
					<tbody style="min-width: 100%;">
				<?php foreach ($listaAlumnos as $alumno): ?>	
					<?php if (($alumno[15] == $_SESSION['representante'][0]) or ($_SESSION['usuario'][2] == 2)): 
					#si el id del representante coincide con el vinculado al alumno se muestra. 
					#Se muestran todos si el usuario es un administrador?>			
						<tr>
							<td><?php echo $alumno[1]; ?></td>
							<td><?php echo $alumno[2]; ?></td>
							<td><?php echo $alumno[3]; ?></td>
							<td><?php echo $alumno[4]; ?></td>
							<td><?php echo $alumno[5]; ?></td>
							<td><?php echo $alumno[6]; ?></td>
							<td><?php echo $alumno[8]; ?></td>
							<td><?php echo $alumno[13]; ?></td>
							<td>
								<form action="consultar-alumno.php" method="POST" style="display: inline-block;">
									<input type="hidden" name="id_alumno" value="<?php echo $alumno[12] ?>">
									<input type="hidden" name="id_representante" value="<?php echo $alumno[15] ?>">
									<input type="hidden" name="id_padre" value="<?php echo $alumno[16] ?>">
									<input type="submit" name="Consultar" value="Consultar">
								</form>
								
								<?php if ($_SESSION['representante'][0] == $alumno[15]): 
								#el representante del alumno es quien debe realizar esta acción?>
								<!--Editar alumno-->
								<form action="editar-alumno.php" method="POST" style="display: inline-block;">
									<input type="hidden" name="id_alumno" value="<?php echo $alumno[12] ?>">
									<input type="hidden" name="id_representante" value="<?php echo $alumno[15] ?>">
									<input type="hidden" name="id_padre" value="<?php echo $alumno[16] ?>">
									<input type="submit" name="orden" value="Editar">
								</form>
								<?php endif ?>
								
								
								<form action="../controladores/control-alumnos.php" method="POST" style="display: inline-block;">
									<input type="hidden" name="cedula_alumno" value="<?php echo $alumno[3]; ?>">
									<input type="submit" name="orden" value="Eliminar">
								</form>

								<!--Generar planilla de inscripción-->
								<form action="" method="POST" style="display: inline-block;">
									<input type="hidden" name="id_alumno" value="<?php echo $alumno[12] ?>">
									<input type="hidden" name="id_representante" value="<?php echo $alumno[15] ?>">
									<input type="hidden" name="id_padre" value="<?php echo $alumno[16] ?>">
									<input type="submit" name="Generar planilla" value="Generar planilla">
								</form>
								
							</td>
						</tr>
					<?php endif ?>
				<?php endforeach ?>
					</tbody>
				</table>	
			</div>
		</div>
		<?php if ($_SESSION['usuario'][2] == "2"): ?>
		<hr>

		<div class="card">
		
			<div class="card-header">
				Representantes registrados
			</div>
			<div class="card-body">
				<table id="representantes" class="table table-striped table-bordered" style="max-width: 100%;">
					<thead>
						<th>Nombres</th>
						<th>Apellidos</th>
						<th>Cédula</th>
						<th>Fecha de nacimiento</th>
						<th>Lugar de nacimiento</th>
						<th>Genero</th>
						<th>Correo electronico</th>
						<th>Dirección</th>
						<th>Teléfono principal</th>
						<th>Teléfono auxiliar</th>
						<th>Estado civil</th>	
						<th>Relación</th>
						<th>Banco</th>
						<th>Tipo de cuenta</th>
						<th>Número de cuenta</th>
						<th>Grado de instrucción</th>
						<th>Empleo</th>
						<th>Dirección del trabajo</th>
						<th>Teléfono del trabajo</th>
						<th>Remuneración</th>
						<th>Tipo de remuneración</th>	
					</thead>
					<tbody style="min-width: 100%;">
				<?php foreach ($listaRepresentantes as $representante): ?>	
						<tr>			
							<td><?php echo $representante[1]?></td>
							<td><?php echo $representante[2]?></td>
							<td><?php echo $representante[3]?></td>
							<td><?php echo $representante[4]?></td>
							<td><?php echo $representante[5]?></td>
							<td><?php echo $representante[6]?></td>
							<td><?php echo $representante[7]?></td>
							<td><?php echo $representante[8]?></td>
							<td><?php echo $representante[9]?></td>
							<td><?php echo $representante[10]?></td>
							<td><?php echo $representante[11]?></td>
							<td><?php echo $representante[13]?></td>
							<td><?php echo $representante[14]?></td>
							<td><?php echo $representante[15]?></td>
							<td><?php echo $representante[16]?></td>
							<td><?php echo $representante[17]?></td>
							<td><?php echo $representante[18]?></td>
							<td><?php echo $representante[19]?></td>
							<td><?php echo $representante[20]?></td>
							<td><?php if ($representante[21] != 0) {echo $representante[21];}?></td>
							<td><?php echo $representante[22]?></td>	
						</tr>
				<?php endforeach ?>
					</tbody>
				</table>	
			</div>
		</div>
				
		<hr>

		<div class="card">
		
			<div class="card-header">
				Padres registrados
			</div>
			<div class="card-body">
				<table id="padres" class="table table-striped table-bordered" style="max-width: 100%;">
					<thead>
						<th>Nombres</th>
						<th>Apellidos</th>
						<th>Cédula</th>
						<th>Fecha de nacimiento</th>
						<th>Lugar de nacimiento</th>
						<th>Genero</th>
						<th>Correo electronico</th>
						<th>Dirección</th>
						<th>Teléfono principal</th>
						<th>Teléfono auxiliar</th>
						<th>Estado civil</th>	
						<th>Parentezco con</th>	
					</thead>
					<tbody style="min-width: 100%;">
				<?php foreach ($listaPadres as $padre): ?>	
						<tr>			
							<td><?php echo $padre[1]?></td>
							<td><?php echo $padre[2]?></td>
							<td><?php echo $padre[3]?></td>
							<td><?php echo $padre[4]?></td>
							<td><?php echo $padre[5]?></td>
							<td><?php echo $padre[6]?></td>
							<td><?php echo $padre[7]?></td>
							<td><?php echo $padre[8]?></td>
							<td><?php echo $padre[9]?></td>
							<td><?php echo $padre[10]?></td>
							<td><?php echo $padre[11]?></td>
							<?php 
							$hijo = "";
							foreach ($listaAlumnos as $alumno) {
								if ($alumno[16] == $padre[12]) {
									$hijo .= $alumno[1];
								}
							} 
							?>
							<td><?php echo $hijo.". ".$representante[13]; ?></td>
						</tr>
				<?php endforeach ?>
					</tbody>
				</table>	
			</div>
		</div>
		<?php endif; ?>


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
	$('#alumnos').DataTable({
		responsive: true,
		"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.7/i18n/Spanish.json"
		  },
	  	<?php if ($_SESSION['usuario'][2] == "2"): ?>
		dom: 'Bfrtip',
		buttons: [
			{
            extend: 'excelHtml5',
            text: 'Generar reporte en Excel',
            autoFilter: true,
            filename: 'Reporte de alumnos',
            sheetName: 'Reporte de alumnos',
            className: 'btn btn-success',
            messageTop: 'Reporte de alumnos'
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
				"url": "//cdn.datatables.net/plug-ins/1.10.7/i18n/Spanish.json"
		  },
	  	<?php if ($_SESSION['usuario'][2] == "2"): ?>
		dom: 'Bfrtip',
		buttons: [
			{
            extend: 'excelHtml5',
            text: 'Generar reporte en Excel',
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

$(document).ready( function () {
	$('#padres').DataTable({
		responsive: true,
		"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.7/i18n/Spanish.json"
		  },
	  	<?php if ($_SESSION['usuario'][2] == "2"): ?>
		dom: 'Bfrtip',
		buttons: [
			{
            extend: 'excelHtml5',
            text: 'Generar reporte en Excel',
            autoFilter: true,
            filename: 'Reporte de padres',
            sheetName: 'Reporte de padres',
            className: 'btn btn-success',
            messageTop: 'Reporte de padres'
        }
	  	]
	  	<?php endif; ?>
	});
} );


</script>
</body>
</html>