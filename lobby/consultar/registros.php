<?php
	if (!$_SESSION['login']) {
		header('Location: ../../index.php');
		exit();
	}
	
	if (!isset($_GET['sec'])) {
		header('Location: index.php');
	}

	//Devuelve al index del lobby si el usuario no es administrador
	if ($_SESSION['usuario']['Privilegios'] > 1) {
		header('Location: ../index.php');
	}

	require("../../clases/usuario.php");

	$registros_bitácora = $bitacora->mostrar_bitacora();

	$usuario = new Usuarios();
	$lista_usuarios = $usuario->mostrarUsuarios();
?>
								
<!-- Tabla volcada -->
<div class="table-responsive">
	<p class="h4 text-uppercase border-2 border-bottom border-dark text-center mb-3">
		Mostrando Estudiantes registrados
	</p>
	<table id="bitácora" class="text-uppercase table table-striped table-bordered table-sm w-100">
		<thead style="font-size: 95%">
			<th>Nro de registro.</th>
			<th>Usuario</th>
			<th>Fecha de entrada</th>
			<th>Hora de entrada</th>
			<th>Fecha de cierre</th>
			<th>Hora de cierre</th>
			<th>Acciones realizadas</th>
		</thead>
		<tbody style="font-size: .85em;">
		<?php foreach ($registros_bitácora as $registro): ?>
			<?php if ($registro['id_bitacora'] != $_SESSION['id_bitacora']): #No muestra el ultimo registro por ser el actual?>
				<tr>
					
					<td>
						<?php echo $registro['id_bitacora']?>
					</td>
					<?php 
						$cedula_usuario = Cédula_Usuario($registro['idUsuarios'],$lista_usuarios);
					?>
					<td title="<?php echo $cedula_usuario['Primer_Nombre'].' '.$cedula_usuario['Primer_Apellido'] ?>">
						<p style="cursor:help;" class="m-0 p-0">
							<span style="border-bottom: dashed 1px #000;">
								<?php echo $cedula_usuario['Cédula_Persona'];?>
							</span>
							<span class="fas fa-question-circle"></span>
						</p>
					</td>

					<td style="min-width: 170px;">
						<?php echo $registro['fechaInicioSesión']?>
					</td>

					<td style="min-width: 170px;">
						<?php echo $registro['horaInicioSesión']?>
					</td>

					<td style="min-width: 180px">
						<?php 
							if(!empty($registro['fechaFinalSesión'])) { 
								echo $registro['fechaFinalSesión'];
							} 
							else {
								echo "Sesión no cerrada correctamente";
							}
						?>		
					</td>
					<td style="min-width: 180px">
						<?php 
							if(!empty($registro['horaFinalSesión'])) {
								echo $registro['horaFinalSesión'];
							}
							else {
								echo "Sesión no cerrada correctamente";
							}
						?>
					</td>
					
					<td style="min-width: 400px">
						<?php echo $registro['linksVisitados']?>
					</td>
				
				</tr>
			<?php endif;?>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>
							
<script src="../../datatables/datatables.min.js"></script>
<script src="../../js/consulta-bitacora.js"></script>
