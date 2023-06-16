<?php 

	if ($_SESSION['orden'] == "eliminar" and isset($_SESSION['eliminar_estudiante'])) {
		echo "eliminar eliminar_estudiante";

		$personas->set_cedula($_SESSION['eliminar_estudiante']);
		$personas->eliminar_persona();

		// var_dump($personas);

	}
	else {

	}




?>