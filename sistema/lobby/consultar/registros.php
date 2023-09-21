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
	<p class="h4 text-uppercase border-2 border-bottom border-dark text-center mb-3">
		Mostrando Estudiantes registrados
	</p>
	<table id="bitácora" class="text-uppercase table table-striped table-bordered table-sm w-100">
		<thead style="font-size: 95%">
			<th>Usuario</th>
			<th>Fecha de entrada</th>
			<th>Hora de entrada</th>
			<th>Fecha de cierre</th>
			<th>Hora de cierre</th>
			<th>Acciones realizadas</th>
		</thead>
		<tbody style="font-size: .85em;">
		<?php foreach ($registros_bitácora as $registro): ?>

			<tr>

				<td><?php echo $registro['cedula_usuario'];?></td>

				<td style="min-width: 170px;">
					<?php echo formatear_fecha($registro['fecha_ingreso']);?>
				</td>

				<td style="min-width: 170px;">
					<?php echo $registro['hora_ingreso'];?>
				</td>

				<td style="min-width: 180px">
					<?php 
						if($registro['fecha_salida'] != "0000-00-00") { 
							echo formatear_fecha($registro['fecha_salida']);
						} 
						else {
							echo "Sesión no cerrada correctamente";
						}
					?>		
				</td>
				<td style="min-width: 180px">
					<?php 
						if($registro['hora_salida'] != "00:00:00") {
							echo $registro['hora_salida'];
						}
						else {
							echo "Sesión no cerrada correctamente";
						}
					?>
				</td>
				
				<td style="min-width: 400px">
					<?php echo $registro['acciones_realizadas'];?>
				</td>
			
			</tr>

		<?php endforeach; ?>
		</tbody>
	</table>
</div>
							
<script src="../../datatables/datatables.min.js" defer></script>
<script src="../../js/consultas/consulta_bitacora.js" defer></script>
