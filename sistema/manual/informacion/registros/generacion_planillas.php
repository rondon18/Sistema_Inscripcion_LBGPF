	<section class="row row-cols-1">

		
		<h1>Registros</h1>
	  <p class="lead">Generación de planillas</p>

	  <div class="px-3">

	  	<p>
	  		Para generar una planilla de inscripción, deberá estar visualizando registros en el módulo de consulta, debe presionar el botón de <b><i>Generar planilla</i></b>, esta misma estará en formato pdf.
	  	</p>

	  	<p>
	  		También puede generar las planillas de acta de compromiso presionando el botón de <b><i>Generar planilla de compromiso</i></b>, esta también estará en formato pdf.
	  	</p>

	  	<p>
	  		Una vez hecho esto, se descargará el archivo, puede preguntar o no dependiendo del navegador usado.
	  	</p>

	  	<p>
	  		Estos archivos pueden ser abiertos en distintos programas de ofimática como distintos programas lectores de pdf, o por el mismo navegador si cuenta con la función.
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
					"Opciones visibles desde el módulo de consulta",
					"Opciones visibles desde una consulta de estudiante",
					"Archivos descargados al solicitar planillas",
					"Planilla de inscripción",
					"Planilla de acta de compromiso",
				];

			?>

			<?php foreach ($descripciones as $key => $value): ?>
			<!-- Descripcion de la imagen -->
			<div class="col p-2">
				<figure class="text-center small">
					<a href="../img/manual/planillas/planillas_<?php echo $key;?>.png" target="_blank" style="cursor: zoom-in;">
					  <img 
							id="imagen<?php echo $key;?>" 
							src="../img/manual/planillas/planillas_<?php echo $key;?>.png" 
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
