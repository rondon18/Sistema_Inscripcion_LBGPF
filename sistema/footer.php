<?php 

// Tomar en cuenta el nivel en que se cuenta para agregar los saltos atrás
// $nivel

$ruta_footer = "";

for ($i=0; $i < $nivel; $i++) { 
	$ruta_footer .= "../";
}



?>

<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2">
	<span class="text-white">Sistema de inscripción L.B. G.P.F - <i class="far fa-copyright"></i> 2022-<?php echo date("Y"); ?></span>
</footer>