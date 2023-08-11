<?php
if (!$_SESSION['login']) {
	header('Location: ../../index.php');
	exit();
}
if (!isset($_GET['sec'])) {
	header('Location: index.php');
}

require("../../clases/padres.php");


$padres = new padres();

$lista_padres = $padres->mostrar_padres();

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
			<th>Hijos en el plantel</th>
		</thead>
		<tbody>

			<?php foreach ($lista_padres as $padre):?>
			<tr>
				<td><?php echo $padre['cedula']; ?></td>
				<td style="min-width:210px;">
					<?php 
						echo $padre['p_nombre']." ".$padre['s_nombre'];
					?>
				</td>
				<td style="min-width:210px;">
					<?php 
						echo $padre['p_apellido']." ".$padre['s_apellido'];
					?>
				</td>
				<td>
					<?php 

						if ($padre['genero'] == "F") {
							echo "Madre";
						}
						else {
							echo "Padre";
						}

					?>
				</td>
				<td class="text-center"><?php $padre['fecha_nacimiento']; ?></td>
				<td><?php $padre['lugar_nacimiento']; ?></td>
				<td style="min-width:160px;"><?php $padre['email']; ?></td>

				<td style="min-width: 100vw"><?php echo direccion_completa($padre);?></td>
				<td><?php $padre['estado_civil']; ?></td>

				<td>
					<?php

						//Cantidad de estudiantes que representa el padre

						$padres->set_cedula_persona($padre['cedula']);
						$hijos = $padres->mostrar_hijos();
						$grados_hijos = [];

						foreach ($hijos as $hijo) {
							$grados_hijos[] = $hijo['grado_a_cursar'];
						}
						echo implode(',', $grados_hijos);

						// echo $padres->contar_hijos();

					?>
				</td>

			</tr>
			<?php endforeach; ?>

		</tbody>
	</table>
</div>

<link rel="stylesheet" href="../../datatables/datatables.min.css">
<script src="../../datatables/datatables.min.js" defer></script>
<script src="../../js/consultas/consulta_padres.js" defer></script>