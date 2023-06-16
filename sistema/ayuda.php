<?php 

	$ruta = "";

	for ($i=0; $i < $nivel; $i++) { 
		$ruta .= "../";
	}

?>

<!-- Botón de ayuda -->
<a 
	id="boton_ayuda" 
	target="_blank" 
	href="<?php echo $ruta ?>manual/" 
	class="btn btn-primary position-fixed bottom-0 end-0 m-3" 
	style="z-index: 1000;"
>
	<i class="fas fa-question-circle fa-lg"></i>
	<span	class="d-none d-lg-inline ms-1">Ayuda</span>
</a>
