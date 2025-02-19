
	
<section class="row row-cols-1">

	
	<h1>Estadísticas</h1>
  <p class="lead">Consulta de estadísticas de padres</p>


	<div class="px-3">


		<!-- información del módulo -->

		<h4>
			<u>
				Acerca del módulo.
			</u>
		</h4>

		<p>
			Para acceder a este módulo, deberá acceder al módulo de consulta de estadísticas, una vez ahí, debe seleccionar la opción de estadísticas de padres, se desplegará un menú con las distintas opciones para filtrar. Una vez especificado el tipo de reporte, el año y sección a consultar, presione el botón <b><i>Consultar</i></b>
		</p>

		<p>
			Será enviado a una vista de consulta con los datos almacenados en una tabla con su respectiva leyenda de color, al lado de una gráfica de pastel alusiva a estos datos.
		</p>

		<p>
			Las estadísticas de los padres se encuentran agrupadas de la siguiente manera:
		</p>

		<ul>

			<li>
				Estadísticas generales, abarca:
				<ul>
					<li>Padres por grado de instrucción</li>
					<li>Padres por número de hijos</li>
					<li>Padres por país en que residen</li>
				</ul>
			</li>

			<li>
				Estadísticas sociales, abarca:
				<ul>
					<li>Padres por tipo de vivienda</li>
					<li>Padres por condición de vivienda</li>
					<li>Padres por tenencia de vivienda</li>
				</ul>
			</li>

			<li>
				Estadísticas económicas, abarca:
				<ul>
					<li>Padres que cuentan con empleo</li>
					<li>Padres que cuentan con empleo por remuneración</li>
					<li>Padres por tipo de remuneración</li>
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
					<a href="../img/manual/estadisticas/padres_<?php echo $key;?>.png" target="_blank" style="cursor: zoom-in;">
					  <img 
							id="imagen<?php echo $key;?>" 
							src="../img/manual/estadisticas/padres_<?php echo $key;?>.png" 
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
