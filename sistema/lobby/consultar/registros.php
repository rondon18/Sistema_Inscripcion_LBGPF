<?php
	if (!$_SESSION['login']) {
		header('Location: ../../index.php');
		exit();
	}
	
	if (!isset($_GET['sec'])) {
		header('Location: index.php');
	}

	//Devuelve al index del lobby si el usuario no es administrador
	if ($_SESSION['datos_login']['privilegios'] > 1) {
		header('Location: ../index.php');
	}

	require("../../clases/personas.php");
	require("../../clases/usuarios.php");

	$registros_bitácora = $bitacora->mostrar_bitacora();

	$usuario = new usuarios();
	$lista_usuarios = $usuario->mostrar_usuarios();
?>
								
<!-- Tabla volcada -->
<div class="table-responsive">
	<table id="bitácora" class="text-uppercase table table-striped table-bordered table-sm w-100">
		<thead style="font-size: 95%">
			<th>USUARIO</th>
			<th>FECHA DE ENTRADA</th>
			<th>HORA DE ENTRADA</th>
			<th>FECHA DE CIERRE</th>
			<th>HORA DE CIERRE</th>
			<th>ACCIONES REALIZADAS</th>
		</thead>
		<tbody style="font-size: .85em;">
		<?php foreach ($registros_bitácora as $registro): ?>

			<tr>

				<td><?php echo mb_strtoupper($registro['cedula_usuario']);?></td>

				<td style="min-width: 170px;">
					<?php echo mb_strtoupper(formatear_fecha($registro['fecha_ingreso']));?>
				</td>

				<td style="min-width: 170px;">
					<?php echo mb_strtoupper($registro['hora_ingreso']);?>
				</td>

				<td style="min-width: 180px">
					<?php 
						if($registro['fecha_salida'] != "0000-00-00") { 
							echo mb_strtoupper(formatear_fecha($registro['fecha_salida']));
						} 
						else {
							echo mb_strtoupper("Sesión no cerrada correctamente");
						}
					?>		
				</td>
				<td style="min-width: 180px">
					<?php 
						if($registro['hora_salida'] != "00:00:00") {
							echo mb_strtoupper($registro['hora_salida']);
						}
						else {
							echo mb_strtoupper("Sesión no cerrada correctamente");
						}
					?>
				</td>
				
				<td style="min-width: 400px">
					<?php echo mb_strtoupper($registro['acciones_realizadas']);?>
				</td>
			
			</tr>

		<?php endforeach; ?>
		</tbody>
	</table>
</div>
							
<script src="../../datatables/datatables.min.js" defer></script>
<script src="../../js/consultas/consulta_bitacora.js" defer></script>
