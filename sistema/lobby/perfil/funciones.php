<?php 

function privilegios($privilegios) {
	// Muestra el nivel de privilegios de un usuario
	if ($privilegios == '0') {
		echo "Desarrollador";
	}
	elseif ($privilegios == 1) {
		echo "Administrador";
	}
	elseif ($privilegios == 2) {
		echo "Usuario";
	}
}

function formatoFechaCompleto($fecha) {
	// Ajusta la fecha y hora al formato local
	date_default_timezone_set("America/Caracas");
	setlocale(LC_ALL, 'es_VE.UTF-8','esp');

	/* Convertimos la fecha a marca de tiempo */
	$marca = strtotime($fecha);

	// Retorna la fecha bajo este formato
	// 1 de enero de 2001
	return ucfirst(strftime('%e de %B de %Y', $marca));
}

function generoCompleto($genero) {
	if ($genero == "M") {
		$ret = "Masculino";
	}
	elseif ($genero == "F") {
		$ret = "Femenino";
	}
	return $ret;
}

function testRol() {
	// funcion para prueba en el campo de rol en el sistema
	$test = rand(1,5);

	if ($test == 1) {
		$ret = "Docente";
	}
	elseif ($test == 2) {
		$ret = "Secretario(a)";
	}
	elseif ($test == 3) {
		$ret = "Coordinador(a)";
	}
	elseif ($test == 4) {
		$ret = "Coordinador académico";
	}
	elseif ($test == 5) {
		$ret = "Director";
	}
	return $ret;
}

?>

