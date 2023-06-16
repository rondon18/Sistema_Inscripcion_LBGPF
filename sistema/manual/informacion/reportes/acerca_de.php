
	
<section class="row row-cols-1">

	
	<h1>Reportes</h1>
  <p class="lead">Información acerca de los reportes</p>

  <div class="px-3">
  	
		<p>
			Los reportes generados a través del sistema serán descargados como archivos de hoja de cálculo, comunmente llamados simplemente Excel, existen diversas alternativas a elegir a la hora de abrir este tipo de archivos.
		</p>

		<p>
			Algunos programas que cumplen esta función son los siguientes:
		</p>

		<ol> 
			
			<li>
				Microsoft Excel: Un programa de hojas de cálculo que forma parte del paquete de Microsoft Office. Es muy popular en el entorno empresarial y cuenta con una amplia gama de funciones y herramientas avanzadas. <a target="_blank" href="https://www.microsoft.com/es-mx/microsoft-365/excel">https://www.microsoft.com/es-mx/microsoft-365/excel</a>
			</li> 

			<li>
				Google Sheets: Un programa de hojas de cálculo en línea gratuito que forma parte de Google Drive. Es una buena alternativa a Excel y permite trabajar en colaboración en tiempo real. <a target="_blank" href="https://www.google.com/intl/es-419_mx/sheets/about/">https://www.google.com/intl/es-419_mx/sheets/about/</a>
			</li>

			<li>
				LibreOffice Calc: Un programa de hojas de cálculo gratuito y de código abierto que forma parte de la suite de oficina LibreOffice. Es muy similar a Excel y cuenta con una amplia gama de funciones y herramientas avanzadas. <a target="_blank" href="https://es.libreoffice.org/descarga/libreoffice-nuevo/">https://es.libreoffice.org/descarga/libreoffice-nuevo/</a>
			</li> 

			<li>
				Apple Numbers: Un programa de hojas de cálculo que forma parte del paquete de iWork de Apple. Es muy popular en el entorno Mac y cuenta con una interfaz intuitiva y fácil de usar. <a target="_blank" href="https://www.apple.com/mx/numbers/">https://www.apple.com/mx/numbers/</a>
			</li> 

			<li>
				WPS Office: Un paquete de programas de oficina gratuito que incluye procesador de texto, hojas de cálculo y presentaciones. Es compatible con los formatos de archivo de Microsoft Office y cuenta con una interfaz fácil de usar. <a target="_blank" href="https://www.wps.com/office-free">https://www.wps.com/office-free</a>
			</li>

		</ol>	

		<p>
			Deberá elegir aquel con el que esté familiarizado y esté disponible en su sistema operativo.
		</p>

		<p>
			<b>Nota</b>: Es posible que al abrir el archivo descargado en Microsoft Excel, este muestre un mensaje indicando que ha habido un problema, en el caso particular de la (<a href="#imagen1">Imagen 1</a>) deberá pulsar la opcion <b><i>Si</i></b>.
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
					"Notificación de Microsoft Excel al abrir el archivo",
				];

			?>

			<?php foreach ($descripciones as $key => $value): ?>
			<!-- Descripcion de la imagen -->
			<div class="col p-2">
				<figure class="text-center small">
					<a href="../img/manual/reportes/acerca_<?php echo $key;?>.png" target="_blank" style="cursor: zoom-in;">
					  <img 
							id="imagen<?php echo $key;?>" 
							src="../img/manual/reportes/acerca_<?php echo $key;?>.png" 
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
