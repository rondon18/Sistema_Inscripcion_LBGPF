<?php 

// Tomar en cuenta el nivel en que se cuenta para agregar los saltos atrás
// $nivel

$ruta_header = "";

for ($i=0; $i < $nivel; $i++) { 
	$ruta_header .= "../";
}

?>

<!--Banner-->
<header class="w-100 bg-white d-flex justify-content-center justify-content-md-between shadow p-1">
	<div>
		<img src="<?php echo $ruta_header; ?>img/banner-gobierno.png" alt=""  height="42" class="d-none d-md-inline-block align-text-top">
		<img src="<?php echo $ruta_header; ?>img/banner-MPPE.png" alt=""  height="42" class="d-none d-md-inline-block align-text-top">
	</div>
	<img src="<?php echo $ruta_header; ?>img/banner-LGPF.png" alt=""  height="42" class="d-inline-block align-text-top">
</header>