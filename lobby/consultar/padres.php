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
			<th>Acciones</th>
		</thead>
		<tbody>

			<?php foreach ($lista_padres as $padre):?>
			<tr>
				<td><?php echo comprobar_vacio($padre['cedula']); ?></td>
				<td style="min-width:210px;">
					<?php 
						echo comprobar_vacio($padre['p_nombre'])." ".$padre['s_nombre']; 
					?>
				</td>
				<td style="min-width:210px;">
					<?php 
						echo comprobar_vacio($padre['p_apellido'])." ".$padre['s_apellido']; 
					?>
				</td>
				<td>
					<?php 

						if ($padre['genero'] == "M") {
							echo "Madre";
						}
						else {
							echo "Padre";
						}

					?>
				</td>
				<td class="text-center"><?php echo comprobar_vacio($padre['fecha_nacimiento'],"F"); ?></td>
				<td><?php echo comprobar_vacio($padre['lugar_nacimiento']); ?></td>
				<td style="min-width:160px;"><?php echo comprobar_vacio($padre['email']); ?></td>

				<?php 

					// Concatena la direccion completa con un espacio o con un vacio en caso de que el dato esté vacio

					$direccion = "";

					if (empty($padre['estado'])) {
						$direccion .= "";
					}
					else {
						$direccion .= $padre['estado']." ";
					}
					if (empty($padre['municipio'])) {
						$direccion .= "";
					}
					else {
						$direccion .= $padre['municipio']." ";
					}
					if (empty($padre['parroquia'])) {
						$direccion .= "";
					}
					else {
						$direccion .= $padre['parroquia']." ";
					}
					if (empty($padre['sector'])) {
						$direccion .= "";
					}
					else {
						$direccion .= $padre['sector']." ";
					}
					if (empty($padre['calle'])) {
						$direccion .= "";
					}
					else {
						$direccion .= $padre['calle']." ";
					}
					if (empty($padre['nro_casa'])) {
						$direccion .= "";
					}
					else {
						$direccion .= $padre['nro_casa']." ";
					}
					if (empty($padre['punto_referencia'])) {
						$direccion .= "";
					}
					else {
						$direccion .= $padre['punto_referencia']." ";
					}
				?>
				<td style="min-width: 100vw"><?php echo $direccion;?></td>
				<td><?php echo comprobar_vacio($padre['estado_civil']); ?></td>

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

					?>
				</td>

				<td>

					<!-- Consultar el padre -->
					<form action="#" method="post" target="_blank" class="d-inline-block">
						<input type="hidden" name="cedula" value="<?php echo $padre['cedula'];?>">
						<input type="hidden" name="accion" value="consultar">
						<button class="btn btn-sm btn-primary">Consultar</button>
					</form>

					<!-- Editar el padre -->
					<form action="#" method="post" target="_blank" class="d-inline-block">
						<input type="hidden" name="cedula" value="<?php echo $padre['cedula'];?>">
						<input type="hidden" name="accion" value="editar">
						<button class="btn btn-sm btn-primary">Editar</button>
					</form>

					<!-- Eliminar el padre -->
					<form action="#" method="post" target="_blank" class="d-inline-block">
						<input type="hidden" name="cedula" value="<?php echo $padre['cedula'];?>">
						<input type="hidden" name="accion" value="eliminar">
						<button class="btn btn-sm btn-danger">Eliminar</button>
					</form>

				</td>

			</tr>
			<?php endforeach; ?>

		</tbody>
	</table>
</div>

<link rel="stylesheet" href="../../datatables/datatables.min.css">
<script src="../../datatables/datatables.min.js"></script>
<script src="../../js/consulta-padres.js"></script>