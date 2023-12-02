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
	<table id="padres" class="text-uppercase table table-striped table-bordered table-sm w-100" style="font-size: 90%;">
		<thead class="text-truncate">
			<th>CÉDULA</th>
			<th>NOMBRES</th>
			<th>APELLIDOS</th>
			<th>ROL</th>
			<th>FECHA NACIMIENTO</th>
			<th>LUGAR NACIMIENTO</th>
			<th>CORREO ELECTRÓNICO</th>
			<th>ESTADO CIVIL</th>
			<th>DIRECCIÓN</th>
			<th>HIJOS EN EL PLANTEL</th>
			<th>ACCIONES</th>
		</thead>
		<tbody class="text-truncate">

			<?php foreach ($lista_padres as $padre):?>
			<tr>
				<td><?php echo $padre['cedula']; ?></td>
				<td>
					<?php 
						echo mb_strtoupper($padre['p_nombre']." ".$padre['s_nombre']);
					?>
				</td>
				<td>
					<?php 
						echo mb_strtoupper($padre['p_apellido']." ".$padre['s_apellido']);
					?>
				</td>
				<td>
					<?php 

						if ($padre['genero'] == "F") {
							$rol = "Madre";
						}
						else {
							$rol = "Padre";
						}

						echo mb_strtoupper($rol);

					?>
				</td>
				<td class="text-center"><?php echo formatear_fecha($padre['fecha_nacimiento']);?></td>
				<td><?php echo mb_strtoupper($padre['lugar_nacimiento']);?></td>
				<td><?php echo mb_strtoupper($padre['email']);?></td>

				<td style="min-width:200px"><?php echo mb_strtoupper($padre['estado_civil']);?></td>
				<td><?php echo mb_strtoupper(direccion_completa($padre))?></td>

				<td>
					<?php

						//Cantidad de estudiantes que representa el padre

						$padres->set_cedula_persona($padre['cedula']);
						$hijos = $padres->mostrar_hijos();
						$grados_hijos = [];

						foreach ($hijos as $hijo) {
							$grados_hijos[] = $hijo['grado_a_cursar'];
						}
						echo mb_strtoupper(implode(',', $grados_hijos));

						// echo $padres->contar_hijos();

					?>
				</td>

				<!-- Acciones -->
				<td>
					<div class="d-inline-block">
						<form action="consultar_padre.php" method="post">

							<input type="hidden" name="cedula" value="<?php echo $padre['cedula'];?>">
							<input type="hidden" name="rol" value="<?php echo $rol;?>">
							<input type="hidden" name="accion" value="consultar">

							<button
								type="submit"
								role="button"
								class="btn btn-primary btn-sm"
								name="consultar"
							>
								Consultar <i class="fas fa-magnifying-glass fa-lg ms-2"></i>
							</button>
						</form>
					</div>
				</td>

			</tr>
			<?php endforeach; ?>

		</tbody>
	</table>
</div>

<link rel="stylesheet" href="../../datatables/datatables.min.css">
<script src="../../datatables/datatables.min.js" defer></script>
<script src="../../js/consultas/consulta_padres.js" defer></script>