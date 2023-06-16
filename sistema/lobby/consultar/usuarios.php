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

		if ($_POST['orden'] == "eliminar") {

			$_SESSION['orden'] = $_POST['orden'];
			$_SESSION['eliminar_usuario'] = $_POST['cedula'];

			header('Location: ../../controladores/control_usuarios.php');
		}
	}

?>

<!-- Tabla volcada -->
<div class="table-responsive">
	<p class="h4 text-uppercase border-2 border-bottom border-dark text-center mb-3">
		Mostrando Estudiantes registrados
	</p>
	<table id="usuarios" class="text-uppercase table table-striped table-bordered table-sm w-100" style="font-size: 95%;">
		<thead>
			<th>Cédula</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Correo electrónico</th>
			<th>Privilegios</th>
			<th>Cargo</th>
			<th>Acciones</th>
		</thead>
		<tbody>

			<?php foreach ($lista_usuarios as $usuario): ?>
			<tr>
				
				<td><?php echo $usuario['cedula'];?></td>

				<td class="text-start" style="min-width: 180px;"><?php echo $usuario['p_nombre']." ".$usuario['s_nombre'];?></td>

				<td class="text-start" style="min-width: 180px;"><?php echo $usuario['p_apellido']." ".$usuario['s_apellido'];?></td>

				<td><?php echo $usuario['email']?></td>
				<td><?php echo privilegios($usuario['privilegios']);?></td>

				<td><?php echo $usuario['rol']?></td>
					
				
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
							Eliminar Usuario
							<i class="fa-solid fa-user-minus fa-lg ms-2"></i>
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
						<input type="hidden" name="orden" value="eliminar">
						<button class="btn btn-sm btn-danger" type="submit">
							Eliminar Usuario
							<i class="fa-solid fa-user-minus fa-lg ms-2"></i>
						</button>
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