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
	require("../../clases/personas.php");;
	require("../../clases/usuarios.php");;

	$usuario = new usuarios();
	$lista_usuarios = $usuario->mostrar_usuarios();


	if (isset($_POST['orden'])) {

		if ($_POST['orden'] == "cambiar_estado") {

			$_SESSION['orden'] = $_POST['orden'];
			$_SESSION['usuario'] = $_POST['cedula'];
			$_SESSION['estado'] = $_POST['estado'];

			header('Location: ../../controladores/control_usuarios.php');
		}
	}

?>

<!-- Tabla volcada -->
<div class="table-responsive">
	<table id="usuarios" class="table table-striped table-bordered table-sm w-100" style="font-size: 90%;">
		<thead class="text-truncate">
			<th>CÉDULA</th>
			<th>NOMBRES</th>
			<th>APELLIDOS</th>
			<th>CORREO ELECTRÓNICO</th>
			<th>PRIVILEGIOS</th>
			<th>CARGO</th>
			<th>ESTADO</th>
			<th>ACCIONES</th>
		</thead>
		<tbody class="text-truncate">

			<?php foreach ($lista_usuarios as $usuario): ?>
			<tr>
				
				<td><?php echo mb_strtoupper($usuario['cedula']);?></td>

				<td class="text-start" style="min-width: 180px;"><?php echo mb_strtoupper($usuario['p_nombre']." ".$usuario['s_nombre']);?></td>

				<td class="text-start" style="min-width: 180px;"><?php echo mb_strtoupper($usuario['p_apellido']." ".$usuario['s_apellido']);?></td>

				<td><?php echo mb_strtoupper($usuario['email'])?></td>
				<td><?php echo mb_strtoupper(privilegios($usuario['privilegios']));?></td>

				<td><?php echo mb_strtoupper($usuario['rol'])?></td>
				<td class="text-center">
					<?php if (strtolower($usuario['estado']) == "inactivo"): // Para habilitar el usuario?>
						<span class="badge rounded-pill bg-danger text-white"><?php echo mb_strtoupper($usuario['estado'])?></span>
					<?php elseif (strtolower($usuario['estado']) == "activo"):  // Para deshabilitar el usuario?>
						<span class="badge rounded-pill bg-success text-white"><?php echo mb_strtoupper($usuario['estado'])?></span>
					<?php endif ?>
				</td>
					
				
				<td style="min-width: 100vw;">

					

					<?php if ($usuario['privilegios'] < 2): ?>
					
					<div class="d-inline-block">
						<button class="btn btn-sm btn-danger" title="No se pueden editar otros Administradores" disabled style="cursor:no-drop;">
							Editar
							<i class="fa-solid fa-user-edit fa-lg ms-2"></i>
						</button>
					</div>

					<div class="d-inline-block">
						<button class="btn btn-sm btn-danger" type="button" title="No se pueden eliminar Administradores" disabled style="cursor:no-drop;">
							Cambiar estado
							<i class="fa-solid fa-user-cog fa-lg ms-2"></i>
						</button>
					</div>

					<?php else: ?>

					<form class="d-inline-block" action="../editar_usuario/paso_1.php" method="post">
						<input type="hidden" name="cedula" value="<?php echo $usuario['cedula_persona'];?>">
						<button class="btn btn-sm btn-danger">
							<i class="fa-solid fa-user-edit"></i>
							Editar
						</button>
					</form>

					<form class="d-inline-block" action="#" method="post" onsubmit="confirmar_envio(event)">
						<input type="hidden" name="cedula" value="<?php echo $usuario['cedula_persona'];?>">
						<input type="hidden" name="estado" value="<?php echo $usuario['estado'];?>">
						<input type="hidden" name="orden" value="cambiar_estado">
						<?php if (strtolower($usuario['estado']) == "inactivo"): // Para habilitar el usuario?>
						<button class="btn btn-success btn-sm" type="submit">
							Habilitar
							<i class="ms-1 fa-solid fa-user-lock"></i>
							<i class="fa-solid fa-arrow-right"></i>
							<i class="fa-solid fa-user-check"></i>
						</button>

						<?php elseif (strtolower($usuario['estado']) == "activo"):  // Para deshabilitar el usuario?>
						<button class="btn btn-danger btn-sm" type="submit">
							Deshabilitar
							<i class="ms-1 fa-solid fa-user-check"></i>
							<i class="fa-solid fa-arrow-right"></i>
							<i class="fa-solid fa-user-lock"></i>
						</button>
						<?php endif ?>
					</form>

					<?php endif;?>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>

							
<script src="../../datatables/datatables.min.js" defer></script>
<script src="../../js/consultas/consulta_usuarios.js" defer></script>