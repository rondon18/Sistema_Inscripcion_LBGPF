
	
<section class="row row-cols-1">

	
	<h1>Registros</h1>
  <p class="lead">Eliminación de registros de estudiantes</p>

	<p>
		Para eliminar un registro de estudiante, deberá acceder al modulo de consulta (<a href="./?con=b4">véase este</a>). Una vez en este, debe seleccionar el estudiante que desee eliminar y haga click sobre este
	</p>

	<p>
		Se desplegará un menú con distintas opciones, en este caso, seleccione la opción eliminar. Una vez hecho esto, se le mostrará un mensaje solicitando conformación para hacer esta acción, para prevenir que se eliminen de manera accidental los registros.
	</p>



	<h4 class="mt-4">
			<u>
				Imágenes de referencia.
			</u>
		</h4>

		<div class="row row-cols-1 row-cols-md-4">


			<?php  

				// Descripciones de las imágenes

				$descripciones = [
					"Vista principal del módulo de consultar",
					"Opción de eliminar resaltada en el menú del estudiante seleccionado",
					"Mensaje solicitando confirmación antes de eliminar"
				];

			?>

			<?php foreach ($descripciones as $key => $value): ?>
			<!-- Descripcion de la imagen -->
			<div class="col p-2">
				<figure class="text-center small">
					<a href="../img/manual/eliminar/eliminar_<?php echo $key;?>.png" target="_blank" style="cursor: zoom-in;">
					  <img 
							id="imagen<?php echo $key;?>" 
							src="../img/manual/eliminar/eliminar_<?php echo $key;?>.png" 
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
