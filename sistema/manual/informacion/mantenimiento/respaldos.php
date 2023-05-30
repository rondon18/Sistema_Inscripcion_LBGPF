
	
<section class="row row-cols-1">


		<h1>Respaldos</h1>	
	<p>Proceso de generación de respaldo de la base de datos</p>

	<div class="px-3">
  	
	  <p>
		  Para generar un respaldo de la base de datos del sistema, deberá entrar en el apartado <b><i>Gestionar sistema.</i></b> en el menú principal.
	  </p>

	  <p>
		  Una vez en este deberá pulsar la opción de Generar respaldo, al pulsarla	se desplegará un mensaje solicitando confirmación para generar el respaldo, si se confirma que se desea generar el respaldo entoces este se generará y será descargado (dependiendo del navegador). También será almacenado en el sistema.
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
				  "Vista general del módulo de mantenimiento",
				  "Menú de respaldos disponibles",
				  "Respaldo seleccionado",
				  "Notificación de que se restaurará la base de datos",
			  ];

		  ?>

		  <?php foreach ($descripciones as $key => $value): ?>
		  <!-- Descripcion de la imagen -->
		  <div class="col p-2">
			  <figure class="text-center small">
				  <a href="../img/manual/mantenimiento/respaldo_<?php echo $key;?>.jpg" target="_blank" style="cursor: zoom-in;">
					<img 
						  id="imagen<?php echo $key;?>" 
						  src="../img/manual/mantenimiento/respaldo_<?php echo $key;?>.jpg" 
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
