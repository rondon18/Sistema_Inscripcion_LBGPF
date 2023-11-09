<?php

$lista_estudiantes = generar_listado($anio,$seccion);

$nro_lista = 1;

?>

<table class="table table-sm text-uppercase tabla-datos">
	<thead class="bg-info">
		<tr>
			<td colspan="3" class="text-center">Listado de estudiantes de <?php echo mb_strtoupper($anio) . " " .  mb_strtoupper('Sección: "' . $seccion . '"');?></td>
		</tr>
		<tr>
			<td class="w-auto">N° de lista</td>
			<td class="w-auto">Cédula de identidad</td>
			<td class="w-auto">Apellidos y nombres</td>
		</tr>
	</thead>
	<tbody>
			<?php foreach ($lista_estudiantes as $estudiante): ?>
			<tr>
				<td><?php echo $nro_lista; ?></td>
				<td><?php echo $estudiante["cedula"]?></td>
				<td>
					<?php echo $estudiante["p_apellido"] . " " . $estudiante["s_apellido"]?>
					<?php echo $estudiante["p_nombre"] . " " . $estudiante["s_nombre"]?>
				</td>
				<?php $nro_lista++; ?>
			</tr>
			<?php endforeach ?>
	</tbody>
</table>