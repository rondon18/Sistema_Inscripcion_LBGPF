
	
<section class="row row-cols-1">

	
	<h1>Reportes</h1>
  <p class="lead">Generación de reportes de padres</p>

  <div class="px-3">
  	
		<p>
			Para generar un reporte de padres, deberá entrar en el apartado <b><i>Generar reporte.</i></b> en el menú principal.
		</p>

		<p>
			Una vez en este deberá pulsar la opción de padres, al pulsarla	se desplegará un menú con los filtros a aplicar al momento de generar el reporte, deberá elegir que datos mostrar y cuales no.
		</p>

		<p>Lo datos filtrados son los siguientes:</p>

		<ul>

			<li>
				Información complementaria de los datos personales: dirección, correo, teléfonos y observaciones.
			</li>

			<li>
				Datos laborales.
			</li>

			<li>
				Datos de vivienda.
			</li>

			<li>
				Año y sección de su hijo.
			</li>

			<li>
				Relación con el estudiante (Padre o madre).
			</li>

		</ul>



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
					"Filtros para generar el reporte de padres",
					"Vista del archivo de hoja de cálculo descargado"
				];

			?>

			<?php foreach ($descripciones as $key => $value): ?>
			<!-- Descripcion de la imagen -->
			<div class="col p-2">
				<figure class="text-center small">
					<a href="../img/manual/reportes/padres_<?php echo $key;?>.png" target="_blank" style="cursor: zoom-in;">
					  <img 
							id="imagen<?php echo $key;?>" 
							src="../img/manual/reportes/padres_<?php echo $key;?>.png" 
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
