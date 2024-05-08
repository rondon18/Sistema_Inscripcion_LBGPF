<?php

	function miManejadorExcepcion(Exception $e) {
	  // Registrar la información de la excepción
	  date_default_timezone_set("America/Caracas");
	  $fecha = date('d-m-Y h:i:s A');
	  $mensaje = $e->getMessage();
	  $archivo = $e->getFile();
	  $linea = $e->getLine();

	  // Escribir la información en un archivo de log
	  file_put_contents('C:/xampp/htdocs/Sistema_Inscripcion_LBGPF/sistema/logs/php_errores.log', "$fecha | Descripción del error: $mensaje | En el archivo: $archivo | linea ($linea)\n\n", FILE_APPEND);
	}

	set_exception_handler('miManejadorExcepcion');

?>
