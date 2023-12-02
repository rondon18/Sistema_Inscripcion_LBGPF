<?php 

	session_start();
	if (!$_SESSION['login']) {
		header('Location: ../../index.php');
		exit();
	}

	require("../../controladores/conexion.php");
	require('../../clases/bitacora.php');
	require('../../clases/estudiantes.php');
	require('../../clases/representantes.php');
	require('../../clases/padres.php');

	$bitacora = new bitacora();
	$_SESSION['acciones'] .= ', Consulta estudiantes';



	// Actualiza la bitácora
	$bitacora->set_id_bitacora($_SESSION['id_bitacora']);
	$bitacora->set_acciones_realizadas($_SESSION['acciones']);
	$bitacora->actualizar_bitacora();

	$nivel = 2;

	$estudiantes = new estudiantes();
	$representantes = new representantes();
	$padres = new padres();


?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Consultar registros</title>
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
			
			<?php 
				include('../../header.php');
			?>
			
			<div class="container-md">
				<div class="card w-100">
					<div class="card-header text-center">
						<b class="fs-5">Consulta de estadisticas de <?php echo $_POST['estadistica'];?></b>
					</div>
					<div class="card-body small" style="max-height: 65vh; overflow-y:auto;">

						<div class="row px-4" style="max-height 70vh;min-height 60vh; overflow-y: auto;">
							<script type="text/javascript" src="../../../node_modules/chart.js/dist/chart.umd.js"></script>
							<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
							<script type="text/javascript" src="../../js/jquery-3.7.1.min.js"></script>
							<script type="text/javascript" src="../../datatables/datatables.min.js"></script>
							
							<script type="text/javascript" src="../../js/sweetalert2.js"></script>
							<script type="text/javascript" src="../../js/logout_inactividad.js"></script>


<?php 

	// var_dump($_POST);

	// lista con la paleta de colores para las graficas, se itera al momento de ciclar los valores
	
	$array_colores = [
		"#36a2eb",
		"#ff6384",
		"#ff9f40",
		"#ffcd56",
		"#4bc0c0",
		"#9966ff",
		"#c9cbcf",
		"#a05d89",
		"#2f9cb9",
		"#ff6f69",
		"#77c9d4",
		"#b3d3c6",
		"#35518f",
		"#669bbc",
		"#3d3e3e",
		"#7dbbc3",
		"#a64b3c",
		"#f5e6ca",
		"#029386",
		"#ff00cc",
		"#8a3cc3",
		"#d98247",
		"#41ab7b",
		"#5452ff",
		"#97d37a",
		"#40d595",
		"#c91064",
		"#679c5a",
		"#28bf1b",
		"#f97bb2",
		"#a78531",
		"#e65abc",
		"#89f60e",
		"#7bdefe",
		"#656887",
	];




	switch ($_POST["estadistica"]) {
		
		// Cuando la estadistica solicitada sea de estudiantes
		case 'estudiantes':

			$titulo = $_POST['estadistica_est'];

			require("estudiantes.php");

			$header = 
			"
		    <ul class='nav'>
	        <li class='nav-item'><p class='h4'>$titulo</p></li>
		     	<li class='nav-item ms-auto'><a hrer='#' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#filtros_estadistica_est'>Cambiar estadisticas</a></li>
		    </ul>
			";

			if ($_POST['anio_est'] == "Global") {
				$header .= "<span class='p-0'> <b>Año a mostrar</b>: " . "Todos" . "</span>";
			} 

			else {
				$header .= "<span class='p-0'> <b>Año a mostrar</b>: " . $_POST["anio_est"] . "</span>";
			}

			


			if (isset($_POST['seccion_est'])) {
				if ($_POST['seccion_est'] == "Global") {
					$header .= "<span class='p-0'> <b>Seccion a mostrar</b>: " . "Todas" . "</span>";
				} 

				else {
					$header .= "<span class='p-0'> <b>Sección a mostrar</b>: " . $_POST["seccion_est"] . "</span>";
				}
			}

			echo $header;

			switch ($_POST["estadistica_est"]) {
				


				case 'Estadisticas generales':
					// Si es para año global, no se llaman años ni secciones especificas 
					// sino estadisticas generales para todos los años 
					if ($_POST["anio_est"] == "Global") {
						require("estudiantes/dist_anio_general.php");
						require("estudiantes/dist_genero_general.php");
						require("estudiantes/repitentes_general.php");
					}
					else {
						$anio = $_POST["anio_est"];
						if (isset($_POST["seccion_est"])) {
							
							if ($_POST["seccion_est"] == "Global") {
								$seccion = "Cualquiera";
							} 
							else {
								$seccion = $_POST["seccion_est"];
							}
							
						} 
						else {
							$seccion = "Cualquiera";
						}
						
						if ($seccion == "Global") {
							require("estudiantes/dist_secciones.php");
						}
						require("estudiantes/dist_genero_filtrada.php");
						require("estudiantes/repitentes_filtrado.php");
					}
					break;
				


				case 'Estadisticas sociales':
					// Si es para año global, no se llaman años ni secciones especificas 
					// sino estadisticas generales para todos los años 
					if ($_POST["anio_est"] == "Global") {
						require("estudiantes/sociales_general.php");
					}
					else {
						$anio = $_POST["anio_est"];
						if (isset($_POST["seccion_est"])) {
							
							if ($_POST["seccion_est"] == "Global") {
								$seccion = "Cualquiera";
							} 
							else {
								$seccion = $_POST["seccion_est"];
							}
							
						} 
						else {
							$seccion = "Cualquiera";
						}
						

						require("estudiantes/sociales_filtrada.php");
					}
					break;
				


				case 'Estadisticas médicas':
					// Si es para año global, no se llaman años ni secciones especificas 
					// sino estadisticas generales para todos los años 
					if ($_POST["anio_est"] == "Global") {
						require("estudiantes/salud_general.php");
					}
					else {
						$anio = $_POST["anio_est"];
						if (isset($_POST["seccion_est"])) {
							
							if ($_POST["seccion_est"] == "Global") {
								$seccion = "Cualquiera";
							} 
							else {
								$seccion = $_POST["seccion_est"];
							}
							
						} 
						else {
							$seccion = "Cualquiera";
						}
						

						require("estudiantes/salud_filtrada.php");
					}
					break;
				
				default:
					// code...
					break;
			}
			break;
		



		// Cuando la estadistica solicitada sea de representantes
		case 'representantes':
			
			$titulo = $_POST['estadistica_rep'];

			if ($_POST['anio_rep'] != "Global") {
				$titulo .= " (". $_POST['anio_rep'] .")";
			}

			require("representantes.php");

			echo "
		    <ul class='nav'>
	        <li class='nav-item'><p class='h4'>$titulo</p></li>
		     	<li class='nav-item ms-auto'><a hrer='#' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#filtros_estadistica_rep'>Cambiar estadisticas</a></li>
		    </ul>
			";

			switch ($_POST["estadistica_rep"]) {


				case 'Estadisticas generales':

					if ($_POST["anio_rep"] == "Global") {

						require("representantes/g_instruccion.php");
						require("representantes/nro_representados.php");
						require("representantes/locaciones.php");

					} 

					else {
						
						$anio = $_POST["anio_rep"];
						$seccion = NULL;

						require("representantes/g_instruccion_filtrado.php");
						require("representantes/nro_representados_filtrado.php");
						require("representantes/locaciones_filtrado.php");

					}
				
					break;


				case 'Estadisticas sociales':

					if ($_POST["anio_rep"] == "Global") {

						require("representantes/carnet_patria.php");
						require("representantes/vivienda.php");

					} 

					else {
						
						$anio = $_POST["anio_rep"];
						$seccion = NULL;

						require("representantes/carnet_patria_filtrado.php");
						require("representantes/vivienda_filtrado.php");

					}	

					break;


				case 'Estadisticas económicas':

					if ($_POST["anio_rep"] == "Global") {

						require("representantes/laborales.php");

					} 

					else {
						
						$anio = $_POST["anio_rep"];
						$seccion = NULL;

						require("representantes/laborales_filtrado.php");

					}


					break;
				

				default:
					// code...
					break;


			}
			break;
		



		// Cuando la estadistica solicitada sea de padres
		case 'padres':

			$titulo = $_POST['estadistica_pad'];

			if ($_POST['anio_pad'] != "Global") {
				$titulo .= " (". $_POST['anio_pad'] .")";
			}

			require("padres.php");

			echo "
		    <ul class='nav'>
	        <li class='nav-item'><p class='h4'>$titulo</p></li>
		     	<li class='nav-item ms-auto'><a hrer='#' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#filtros_estadistica_pad'>Cambiar estadisticas</a></li>
		    </ul>
			";

			switch ($_POST["estadistica_pad"]) {


				case 'Estadisticas generales':

					if ($_POST["anio_pad"] == "Global") {

						require("padres/g_instruccion.php");
						require("padres/nro_hijos.php");
						require("padres/paises.php");

					} 

					else {
						
						$anio = $_POST["anio_pad"];
						$seccion = NULL;

						require("padres/paises_filtrado.php");
						require("padres/g_instruccion_filtrado.php");

					}
				
					break;


				case 'Estadisticas sociales':

					if ($_POST["anio_pad"] == "Global") {

						require("padres/vivienda.php");

					} 

					else {
						
						$anio = $_POST["anio_pad"];
						$seccion = NULL;

						require("padres/vivienda_filtrado.php");

					}	

					break;


				case 'Estadisticas económicas':

					if ($_POST["anio_pad"] == "Global") {

						require("padres/laborales.php");

					} 

					else {
						
						$anio = $_POST["anio_pad"];
						$seccion = NULL;

						require("padres/laborales_filtrado.php");

					}


					break;
				

				default:
					// code...
					break;


			}
			break;
			
	}
?>
						</div>
					</div>

					<div class="card-footer">
						<a href="index.php" class="btn btn-primary">
							<i class="fa-solid fa-lg me-2 fa-backward"></i>
							Volver
						</a>
						<a href="../index.php" class="btn btn-primary">
							<i class="fa-solid fa-lg me-2 fa-home"></i>
							Volver al menú principal
						</a>
					</div>
					
				</div>
			</div>
		</div>
		<?php include('../../footer.php');?>
		<?php include '../../ayuda.php';?>
	</main>
</body>
</html>
