	<section class="row row-cols-1">

		
		<h1>Registros</h1>
	  <p class="lead">Generación de reportes rápidos</p>

	  <div class="px-3">

	  	<p>
	  		Para generar reportes rápidos, deberá estar visualizando registros en el módulo de consulta, debe presionar el botón de generar reporte ubicado en la parte superior de la tabla.
	  	</p>

	  	<p>
	  		Una vez hecho esto, se descargará un archivo de hoja de cálculo, puede preguntar o no dependiendo del navegador usado.
	  	</p>

	  	<p>
	  		Estos archivos pueden ser abiertos en distintos programas de ofimática como Microsoft Excel y Libreoffice Calc.
	  	</p>

	  	<p>
	  		<b>Nota</b>: los filtros aplicados con el botón de filtros(si lo posee) o a través de la barra de búsqueda de la tabla afectarán directamente los registros mostrados en el reporte.
	  	</p>

	  </div>

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
					"Vista del módulo de consulta de representantes",
					"Archivo descargado por el navegador",
					"Vista del archivo descargado en Libreoffice Calc",
				];

			?>

			<?php foreach ($descripciones as $key => $value): ?>
			<!-- Descripcion de la imagen -->
			<div class="col p-2">
				<figure class="text-center small">
					<a href="../img/manual/reportes_rapidos/reportes_rapidos_<?php echo $key;?>.png" target="_blank" style="cursor: zoom-in;">
					  <img 
							id="imagen<?php echo $key;?>" 
							src="../img/manual/reportes_rapidos/reportes_rapidos_<?php echo $key;?>.png" 
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


</section>
