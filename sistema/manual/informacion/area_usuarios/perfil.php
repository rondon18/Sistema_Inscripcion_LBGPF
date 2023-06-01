
	
<section class="row row-cols-1">

	
	<h1>Área del usuario</h1>
  <p class="lead">Perfil de usuario</p>


	<div class="px-3">


		<!-- información del módulo -->

		<h4>
			<u>
				Acerca del módulo.
			</u>
		</h4>

		<p>
			Para acceder a este módulo, deberá seleccionar la opción <b><i>Ver mi perfil</i></b> desde el menú principal, una vez ahí, sera enviado a su perfil de usuario, donde podrá observar sus datos de usuario, como nombres, apellidos, cédula, etc.
		</p>

		<p>
			De igual manera, podrá acceder a las funciones de editar perfil y darse de baja, ubicada en la parte superior de los datos del perfil.
		</p>

		<p>
			Adicionalmente, podrá revelar sus preguntas de seguridad al presionar su botón correspondiente, esto en caso de que las haya olvidado.
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
					"Vista del la opción para acceder al perfil desde el menú principal",
					"Vista del perfil con las opciones de editar y darse de baja resaltadas",
					"Vista del perfil con el botón de revelar preguntas de seguridad resaltado",
				];

			?>

			<?php foreach ($descripciones as $key => $value): ?>
			<!-- Descripcion de la imagen -->
			<div class="col p-2">
				<figure class="text-center small">
					<a href="../img/manual/area_usuarios/perfil_<?php echo $key;?>.png" target="_blank" style="cursor: zoom-in;">
					  <img 
							id="imagen<?php echo $key;?>" 
							src="../img/manual/area_usuarios/perfil_<?php echo $key;?>.png" 
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
