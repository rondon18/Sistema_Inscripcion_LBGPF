
	
<section class="row row-cols-1">

	
	<h1>Estadísticas</h1>
  <p class="lead">Consulta de estadísticas de estudiantes</p>


	<div class="px-3">


		<!-- información del módulo -->

		<h4>
			<u>
				Acerca del módulo.
			</u>
		</h4>

		<p>
			Para acceder a este módulo, deberá acceder al módulo de consulta de estadísticas, una vez ahí, debe seleccionar la opción de estadísticas de estudiantes, se desplegará un menú con las distintas opciones para filtrar. Una vez especificado el tipo de reporte, el año y sección a consultar, presione el botón <b><i>Consultar</i></b>
		</p>

		<p>
			Será enviado a una vista de consulta con los datos almacenados en una tabla con su respectiva leyenda de color, al lado de una gráfica de pastel alusiva a estos datos.
		</p>

		<p>
			Las estadísticas de los estudiantes se encuentran agrupadas de la siguiente manera:
		</p>

		<ul>

			<li>
				Estadísticas generales, abarca:
				<ul>
					<li>Distribución global de estudiantes inscritos</li>
					<li>Distribución por género de estudiantes</li>
					<li>Número de estudiantes repitentes</li>
				</ul>
			</li>

			<li>
				Estadísticas sociales, abarca:
				<ul>
					<li>Cantidad de estudiantes que cuentan con canaimas</li>
					<li>Cantidad de estudiantes que cuentan con acceso a internet</li>
					<li>Cantidad de estudiantes que cuentan con carnet de la patria</li>
				</ul>
			</li>

			<li>
				Estadísticas médicas, abarca:
				<ul>
					<li>Estudiantes que cuentan con IMC saludable</li>
					<li>Estudiantes que padecen alguna enfermedad</li>
					<li>Estudiantes según su tipo de sangre.</li>
					<li>Estudiantes según su lateralidad.</li>
					<li>Estudiantes vacunados contra el Covid-19.</li>
					<li>Estudiantes según dosis de vacuna contra el Covid-19 aplicadas.</li>
					<li>Estudiantes según dosis de vacuna contra el Covid-19 aplicadas.</li>
					<li>Estudiantes que cuentan con una dieta especial.</li>
					<li>Estudiantes que tienen algún padecimiento.</li>
					<li>Estudiantes con algún impedimento físico.</li>
					<li>Estudiantes con alguna necesidad educativa especial.</li>
					<li>Estudiantes por condición de la vista.</li>
					<li>Estudiantes por condición dental.</li>
					<li>Estudiantes con carnet de discapacidad.</li>
				</ul>
			</li>

		</ul>

		<!-- Imágenes de referencia -->

		<h4 class="mt-4">
			<u>
				Imágenes de referencia.
			</u>
		</h4>

		<div class="row row-cols-1 row-cols-md-4">

			<?php  

				// Descripciones de las imágenes

				$descripciones = [
					"Vista del menú de estadísticas",
					"Vista de las opciones y filtros aplicables",
					"Vista de las gráficas y tablas desplegadas en la consulta",
					"Vista de las opciones y filtros aplicables para cambiar de consulta",
				];

			?>

			<?php foreach ($descripciones as $key => $value): ?>
			<!-- Descripcion de la imagen -->
			<div class="col p-2">
				<figure class="text-center small">
					<a href="../img/manual/estadisticas/estudiantes_<?php echo $key;?>.png" target="_blank" style="cursor: zoom-in;">
					  <img 
							id="imagen<?php echo $key;?>" 
							src="../img/manual/estadisticas/estudiantes_<?php echo $key;?>.png" 
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
