<?php 

	session_start();
	if (!$_SESSION['login']) {
		header('Location: ../../index.php');
		exit();
	}

	require('funciones.php');

	require("../../controladores/conexion.php");
	require('../../clases/bitacora.php');

	$bitacora = new bitacora();

	$active_est = "";
	$active_rep = "";
	$active_pad = "";
	$active_usr = "";
	$active_reg = "";

	if (isset($_GET['sec'])) {
		switch ($_GET['sec']) {
			
			case 'est':
				$_SESSION['acciones'] .= ', Consulta estudiantes';
				$active_est = "active";
				$seccion_activa = "estudiantes";
				break;
			
			case 'rep':
				$_SESSION['acciones'] .= ', Consulta representantes';
				$active_rep = "active";
				$seccion_activa = "representantes";
				break;
			
			case 'pad':
				$_SESSION['acciones'] .= ', Consulta padres';
				$active_pad = "active";
				$seccion_activa = "padres";
				break;
			
			case 'usr':
				//Devuelve al index si el usuario no es administrador y muestra un error
				if ($_SESSION['datos_login']['privilegios'] > 1) {
					header('Location: index.php?error');
				}
				$_SESSION['acciones'] .= ', Consulta usuarios';
				$active_usr = "active";
				$seccion_activa = "usuarios";
				break;
			
			case 'reg':
				//Devuelve al index si el usuario no es administrador y muestra un error
				if ($_SESSION['datos_login']['privilegios'] > 1) {
					header('Location: index.php?error');
				}
				$_SESSION['acciones'] .= ', Consulta bitácora';
				$active_reg = "active";
				$seccion_activa = "bitácora";
				break;
			
			default:
				$_SESSION['acciones'] .= ', Visita área de consulta (Sección invalida)';
				$seccion_activa = "registros";
				break;
		} 
	}
	else {
		$_SESSION['acciones'] .= ', Visita área de consulta';
		$seccion_activa = "registros";
	}

	// Actualiza la bitácora
	$bitacora->set_id_bitacora($_SESSION['id_bitacora']);
	$bitacora->set_acciones_realizadas($_SESSION['acciones']);
	$bitacora->actualizar_bitacora();

	$nivel = 2;

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Gestión de <?php echo $seccion_activa; ?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
		<link rel="stylesheet" href="../../datatables/datatables.min.css">
		<link rel="stylesheet" type="text/css" href="../../css/all.min.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
		<link rel="icon" type="img/png" href="../../img/icono.png">
	</head>
	<body>
		<main class="d-flex flex-column justify-content-between vh-100">
			
			<?php include('../../header.php'); ?>
			
			<div class="container-md">
				<div class="card w-100">
					<div class="card-header text-center">
						<b class="fs-5">Gestión de <?php echo $seccion_activa; ?></b>
					</div>
					<div class="card-body" style="max-height: 65vh; overflow-y:auto;">

						<!--Selector de consulta-->
						<div class="mb-4 w-100">

							<div class="selector-consulta">

								<div class="btn-group btn-group-sm w-100">


									<!-- Al área de estudiantes -->
									<a
										href="index.php?sec=est"
										class="btn btn-outline-primary <?php echo $active_est;?>"
										data-bs-toggle="tooltip"
										data-bs-placement="bottom"
										title="Presione para ir al área de estudiantes"
									>
										<i class="fas fa-lg fa-children mb-1 mb-sm-0 me-sm-1"></i>
										<span class="m-0">Estudiantes</span>
									</a>


									<!-- Al área de representantes -->
									<a
										href="index.php?sec=rep"
										class="btn btn-outline-primary <?php echo $active_rep;?>"
										data-bs-toggle="tooltip"
										data-bs-placement="bottom"
										title="Presione para ir al área de representantes"
									>
										<i class="fas fa-lg fa-users mb-1 mb-sm-0 me-sm-1"></i>
										<span class="m-0">Representantes</span>
									</a>


									<!-- Al área de padres -->
									<a
										href="index.php?sec=pad"
										class="btn btn-outline-primary <?php echo $active_pad;?>"
										data-bs-toggle="tooltip"
										data-bs-placement="bottom"
										title="Presione para ir al área de padres"
									>
										<i class="fas fa-lg fa-person mb-1 mb-sm-0 me-sm-1"></i>
										<span class="m-0">Padres</span>
									</a>



									<?php if ($_SESSION['datos_login']['privilegios'] <= 1): ?>

									<!-- Al área de usuarios -->
									<a
										href="index.php?sec=usr"
										class="btn btn-outline-primary <?php echo $active_usr;?>"
										data-bs-toggle="tooltip"
										data-bs-placement="bottom"
										title="Presione para ir al área de usuarios"
									>
										<i class="fas fa-lg fa-user mb-1 mb-sm-0 me-sm-1"></i>
										<span class="m-0">Usuarios</span>
									</a>


									<!-- Al área de registros -->
									<a
										href="index.php?sec=reg"
										class="btn btn-outline-primary <?php echo $active_reg;?>"
										data-bs-toggle="tooltip"
										data-bs-placement="bottom"
										title="Presione para ir al área de registros"
									>
										<i class="fas fa-lg fa-clipboard mb-1 mb-sm-0 me-sm-1"></i>
										<span class="m-0">Registros</span>
									</a>

									<?php endif ?>

								</div>

							</div>

						</div>

						<div style="max-height 70vh;min-height 60vh; overflow-y: auto;">
						<?php 
							// filtra la vista a mostrar al usuario
							if (isset($_GET['sec'])) {
								switch ($_GET['sec']) {
									case 'est':
										include("estudiantes.php");
										$js = "consulta-estudiantes.js";
										break;
									
									case 'rep':
										include("representantes.php");
										$js = "consulta-representantes.js";
										break;
									
									case 'pad':
										include("padres.php");
										$js = "consulta-padres.js";
										break;
									
									case 'usr':
										include("usuarios.php");
										$js = "consulta-usuarios.js";
										break;
									
									case 'reg':
										include("registros.php");
										$js = "consulta-bitacora.js";
										break;
									
									default:
										echo '
										<p class="text-center lead my-4">
											<i class="fas fa-lg fa-arrow-up me-1 d-none d-sm-inline"></i>
											Seleccione una opción para comenzar
											<i class="fas fa-lg fa-arrow-up ms-1 d-none d-sm-inline"></i>
										</p>
										';
										break;
								} 
							}
							else {
								echo '
								<p class="text-center lead my-4">
									<i class="fas fa-lg fa-arrow-up me-1 d-none d-sm-inline"></i>
									Seleccione una opción para comenzar
									<i class="fas fa-lg fa-arrow-up ms-1 d-none d-sm-inline"></i>
								</p>
								';
							}
						?>	
						</div>

					</div>

					<div class="card-footer">
						<a href="../index.php" class="btn btn-primary">
							<i class="fa-solid fa-lg me-2 fa-home"></i>
							Menú principal
						</a>
					</div>
					
				</div>
			</div>
		</div>
		<?php include('../../footer.php'); ?>
		<?php include '../../ayuda.php'; ?>
	</main>
</div>

<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../../js/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="../../js/sweetalert2.js"></script>
<script type="text/javascript" src="../../js/logout_inactividad.js"></script>

<script type="text/javascript" defer>

	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
	  return new bootstrap.Tooltip(tooltipTriggerEl)
	});

  function confirmar_envio(event) {
    event.preventDefault(); // Detiene la acción predeterminada del evento onSubmit
    
    Swal.fire({
      title: '¿Estás seguro?',
      text: '¿Deseas realizar esta acción?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, continua',
      cancelButtonText: 'No, detente'
    }).then((result) => {
      if (result.isConfirmed) {
        // Si el usuario confirma la acción, se envía el formulario
        event.target.submit();
      }
    });
  }

	<?php if (isset($_GET['exito'])): ?>
	Swal.fire({
	  icon: 'success',
	  title: 'Proceso exitoso',
	  showConfirmButton: false,
	  
	  timer: 2000 // tiempo en milisegundos (en este caso, 2 segundos)
	})
	<?php endif ?>
</script>
</body>
</html>