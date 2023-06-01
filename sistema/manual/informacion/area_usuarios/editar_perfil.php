
	
<section class="row row-cols-1">

	
	<h1>Área del usuario</h1>
  <p class="lead">Editar su perfil de usuario</p>


	<div class="px-3">


		<!-- información del módulo -->

		<h4>
			<u>
				Acerca del módulo.
			</u>
		</h4>

		<p>
			Para acceder a esta función, deberá seleccionar la opción <b><i>Editar perfil</i></b> desde su perfil, al hacer esto, será envíado al formulario de edición.
		</p>

		<p>
			Este formulario consta de dos partes cortas, que son las siguientes:
		</p>

		<ul>
			<li>Datos personales y correo</li>
			<li>Preguntas de seguridad</li>
		</ul>

		<p>
			Una vez hechos los cambios que desee, presione guardar y continuar para actualizar estos datos en el sistema. Luego de que estos datos sean guardados, será conducido al menú principal.
		</p>

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
					"Vista del la opción para editar el perfil",
					"Vista de la primera fase del formulario de edición",
					"Vista de la segunda fase del formulario de edición",
				];

			?>

			<?php foreach ($descripciones as $key => $value): ?>
			<!-- Descripcion de la imagen -->
			<div class="col p-2">
				<figure class="text-center small">
					<a href="../img/manual/area_usuarios/editar_<?php echo $key;?>.png" target="_blank" style="cursor: zoom-in;">
					  <img 
							id="imagen<?php echo $key;?>" 
							src="../img/manual/area_usuarios/editar_<?php echo $key;?>.png" 
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
