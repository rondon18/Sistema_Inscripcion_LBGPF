<?php if (isset($_SESSION['login'])): ?>

	<section class="row row-cols-1">

		
		<h1>Registros</h1>
	  <p class="lead">Consulta de registros de estudiantes</p>

	  <div class="px-3">
	  	
			<p>
				Para ingresar a este módulo, seleccione la opción <b><i>Consultar registros</i></b> (<a href="#imagen1">Imagen 1</a>) desde el menú principal, una vez en este, se encontrará la siguiente pantalla. (<a href="#imagen2">Imagen 2</a>). En esta misma puede consultar lo siguiente:
			</p>



			<h6 class="mt-2">
				<b>Estudiantes.</b>
			</h6>

			<p>
				Se mostrarán datos generales sobre los estudiantes como lo son nombres, apellidos, cédula, quien es su representante, su padre y su madre. (<a href="#imagen3">Imagen 3</a>). Así como datos más detallados haciendo click sobre el registro del estudiante. (<a href="#imagen4">Imagen 4</a>)
			</p>

			<p>
				También es posible realizar operaciones sobre los estudiantes como editar, eliminar y generar las planillas de inscripción y de acta de compromiso. (<a href="#imagen5">Imagen 5</a>). Así como la opción de mostrar los datos completos del registro del estudiante (<a href="#imagen6">Imagen 6</a>)
			</p>

			<p>
				Es posible registrar nuevos estudiantes presionando el botón <b><i>Registrar estudiante</i></b>. Así como filtrar grados, secciones y género de los estudiantes con el botón <b><i>Filtros</i></b>.
			</p>



			<h6 class="mt-2">
				<b>Representantes.</b>
			</h6>

			<p>
				Se mostrarán datos generales sobre los representantes como lo son nombres, apellidos y cédula 
				(<a href="#imagen7">Imagen 7</a>). Así como datos más detallados haciendo click sobre el registro del representante. 
				(<a href="#imagen8">Imagen 8</a>).
			</p>



			<h6 class="mt-2">
				<b>Padres.</b>
			</h6>

			<p>
				Se mostrarán datos generales sobre los padres como lo son nombres, apellidos y cédula 
				(<a href="#imagen9">Imagen 9</a>). Así como datos más detallados haciendo click sobre el registro del padre o madre seleccionado. 
				(<a href="#imagen10">Imagen 10</a>).
			</p>

			<?php if ($_SESSION['datos_login']['privilegios'] < 2): ?>

				<h5 class="mt-4 mb-3">
					<u>
						Datos solo accesibles como administrador.
					</u>
				</h5>

				<h6 class="mt-2">
					<b>Usuarios.</b>
				</h6>

				<p>
					Se mostrarán datos generales sobre los usuarios como lo son nombres, apellidos y cédula 
					(<a href="#imagen11">Imagen 11</a>). Así como datos más detallados y opciones disponibles haciendo click sobre el registro del usuario. 
					(<a href="#imagen12">Imagen 12</a>).
				</p>

				<p>
					<b>Nota</b>: los usuarios administradores solo pueden editar y/o eliminar usuarios regulares, como coordinadores de año, docentes y secretarios, en el caso de usuarios con el mismo nivel o mayor no es posible efectuar estas acciones.
				</p>

				

				<h6 class="mt-2">
					<b>Registros de bitácora.</b>
				</h6>

				<p>
					Se mostrarán los registros de interacción generados automáticamente por el sistema  como lo son cédula del usuarios, fechas y horas de conexión y desconexión (incluye conexiones cerradas y e especifica si el usuario no cerró sesión), y acciones realizadas dentro de esa conexión
					(<a href="#imagen13">Imagen 13</a>). Así como datos más detallados haciendo click sobre el registro seleccionado.
				</p>
				
			<?php endif ?>

			<h4 class="mt-4">
				<u>
					Imágenes de referencia.
				</u>
			</h4>

			<div class="row row-cols-1 row-cols-md-4">


				<?php  

					// Descripciones de las imágenes

					$descripciones = [
						"Opción a seleccionar para acceder al módulo de consulta.	",
						"Vista principal del módulo sin opciones seleccionadas",
						"Vista del listado de estudiantes",
						"Filtros aplicables a la consulta de estudiantes",
						"Información detallada de un estudiante con sus distintas opciones",
						"Vista de consulta de un estudiante",
						"Vista del listado de representantes",
						"Información detallada de un representante",
						"Vista del listado de padres y madres",
						"Información detallada de un padre/madre",
					];

					if ($_SESSION['datos_login']['privilegios'] < 2) {

						// Anexa las imágenes solo visibles para administradores

						$descripciones_adm = [
						"Vista del listado de usuarios",
						"Información detallada de un usuario",
						"Vista del listado de registros de bitácora",
						];
						$descripciones = array_merge($descripciones,$descripciones_adm);
					}				
				?>

				<?php foreach ($descripciones as $key => $value): ?>
				<!-- Descripcion de la imagen -->
				<div class="col p-2">
					<figure class="text-center small">
						<a href="../img/manual/consultar/consultar_<?php echo $key;?>.png" target="_blank" style="cursor: zoom-in;">
						  <img 
								id="imagen<?php echo $key+1;?>" 
								src="../img/manual/consultar/consultar_<?php echo $key;?>.png" 
								class="img-fluid img-thumbnail"
								data-bs-toggle="tooltip" 
								data-bs-placement="top" 
								title="Haga click para visualizar la imagen en tamaño completo."
							>
						</a>
					  <figcaption><?php echo $key+1 . ". " . $value; ?>. </figcaption>
					</figure>
				</div>
				<?php endforeach ?>

			</div>

		</div>

	</section>

<?php 
	else: 
		header('Location: ../index.php');
?>

<?php endif ?>