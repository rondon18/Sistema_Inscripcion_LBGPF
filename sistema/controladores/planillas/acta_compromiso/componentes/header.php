	<?php
		$nombreImagen = "../img/logo.jpg";
		$imagenBase64 = "data:image/jpg;base64," . base64_encode(file_get_contents($nombreImagen));
	?>

	<div class="text-center mb-3">
		<img class="w-100 mx-auto" src="<?php echo $imagenBase64; ?>" alt="">
	</div>

	<p class="text-center text-uppercase mb-4" style="font-size: 1.2rem">
		ACTA DE COMPROMISO DEL REPRESENTANTE
	</p>

