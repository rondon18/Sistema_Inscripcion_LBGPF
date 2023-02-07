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

$usuario = new Usuarios();
$lista_usuarios = $usuario->mostrar_usuarios();

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
					<form class="d-inline-block" action="">
						<button class="btn btn-sm btn-danger">Editar</button>
					</form>
					<form class="d-inline-block" action="">
						<button class="btn btn-sm btn-danger">Cambiar cargo</button>			
					</form>

					<?php if ($usuario['privilegios'] <= 1): ?>
					<div class="d-inline-block">
						<button class="btn btn-sm btn-danger" type="button" title="No se pueden eliminar Administradores" disabled style="cursor:no-drop;">
							Eliminar Usuario
							<i class="fa-solid fa-user-minus fa-lg ms-2"></i>
						</button>
					</div>
					<?php else: ?>
					<form action="../controladores/control-usuarios.php" method="post">
						<input type="hidden" name="idUsuario" value="<?php echo $usuario['Cédula_Persona'];?>">
						<button class="btn btn-sm btn-danger" type="sumbit" name="orden" value="Eliminar" onclick="return confirmacion();">
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
							
<script src="../../datatables/datatables.min.js"></script>
<script src="../../js/consulta-usuarios.js"></script>