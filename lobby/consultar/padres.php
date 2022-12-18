<?php
if (!$_SESSION['login']) {
	header('Location: ../../index.php');
	exit();
}
if (!isset($_GET['sec'])) {
	header('Location: index.php');
}

require("../../clases/Padre.php");
require("../../clases/madre.php");
require("../../clases/teléfonos.php");

$Padre = new Padre();
$Madre = new Madre();
$Teléfonos = new Teléfonos();

$listaPadre = $Padre->mostrarPadre();
$listaMadre = $Madre->mostrarMadre();

?>

<!-- Tabla volcada -->
<div class="table-responsive">
	<p class="h4 text-uppercase border-2 border-bottom border-dark text-center mb-3">
		Mostrando Padres registrados
	</p>
	<table id="padres" class="text-uppercase table table-striped table-bordered table-sm w-100" style="font-size: 95%;">
		<thead>
			<th>Cédula</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Rol</th>
			<th>Fecha Nacimiento</th>
			<th>Lugar Nacimiento</th>
			<th>Correo Electrónico</th>
			<th>Dirección</th>
			<th>Estado Civil</th>
		</thead>
		<tbody>

			<?php foreach ($listaPadre as $padre):?>
			<tr>
				<td><?php echo comprobarVacio($padre['Cédula']); ?></td>
				<td style="min-width:210px;">
					<?php 
						echo comprobarVacio($padre['Primer_Nombre'])." ".$padre['Segundo_Nombre']; 
					?>
				</td>
				<td style="min-width:210px;">
					<?php 
						echo comprobarVacio($padre['Primer_Apellido'])." ".$padre['Segundo_Apellido']; 
					?>
				</td>
				<td>Padre</td>
				<td class="text-center"><?php echo comprobarVacio($padre['Fecha_Nacimiento'],"F"); ?></td>
				<td><?php echo comprobarVacio($padre['Lugar_Nacimiento']); ?></td>
				<td style="min-width:160px;"><?php echo comprobarVacio($padre['Correo_Electrónico']); ?></td>
				<td style="min-width:190px;"><?php echo comprobarVacio($padre['Dirección']); ?></td>
				<td><?php echo comprobarVacio($padre['Estado_Civil']); ?></td>
			</tr>
			<?php endforeach; ?>

			<?php foreach ($listaMadre as $madre):?>
			<tr>
				<td><?php echo comprobarVacio($madre['Cédula']); ?></td>
				<td style="min-width:210px;">
					<?php 
						echo comprobarVacio($madre['Primer_Nombre'])." ".$madre['Segundo_Nombre']; 
					?>
				</td>
				<td style="min-width:210px;">
					<?php 
						echo comprobarVacio($madre['Primer_Apellido'])." ".$madre['Segundo_Apellido']; 
					?>
				</td>
				<td>Madre</td>
				<td class="text-center"><?php echo comprobarVacio($madre['Fecha_Nacimiento'],"F"); ?></td>
				<td><?php echo comprobarVacio($madre['Lugar_Nacimiento']); ?></td>
				<td style="min-width:160px;"><?php echo comprobarVacio($madre['Correo_Electrónico']); ?></td>
				<td style="min-width:190px;"><?php echo comprobarVacio($madre['Dirección']); ?></td>
				<td><?php echo comprobarVacio($madre['Estado_Civil']); ?></td>
			</tr>
			<?php endforeach ?>

		</tbody>
	</table>
</div>

<link rel="stylesheet" href="../../datatables/datatables.min.css">
<script src="../../datatables/datatables.min.js"></script>
<script src="../../js/consulta-padres.js"></script>