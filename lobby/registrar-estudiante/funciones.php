<?php  

// Dato se sesion para input
function dato_sesion_i($indice, $paso = 1) {

	if ($paso == 2) {
		$arreglo = "datos_padres";
	} 
	elseif ($paso == 3) {
		$arreglo = "datos_estudiante";
	}
	else {
		$arreglo = "datos_representante";
	}


	$valor = NULL;
	if (isset($_SESSION['datos_inscripcion'])) {

		// Si el indice no existe, retorna nulo
		if (isset($_SESSION['datos_inscripcion'][$arreglo][$indice])) {
			$valor = $_SESSION['datos_inscripcion'][$arreglo][$indice];
		}
		else {
			$valor = NULL;
		}
	}
	return $valor;
}

// Dato se sesion para input radio, check y selects
function dato_sesion_opt($val,$indice,$tipo, $paso = 1) {
	// recibe valor de la opcion, indice o name del campo y el tipo, sea radioboton o selector
	
	// type="radio" / type="checkbox"
	if ($tipo == "rc") {
		$res = "checked";
	}

	// Select
	elseif ($tipo == "s"){
		$res = "selected";
	}

	if ($paso == 2) {
		$arreglo = "datos_padres";
	} 
	elseif ($paso == 3) {
		$arreglo = "datos_estudiante";
	}
	else {
		$arreglo = "datos_representante";
	}

	

	$ret = NULL;
	// Si el indice no existe, retorna nulo
	if (isset($_SESSION['datos_inscripcion'][$arreglo][$indice])) {
		if ($val == $_SESSION['datos_inscripcion'][$arreglo][$indice]) {
			$ret = $res;
		}
	}
	else {
		$valor = NULL;
	}

	echo $ret;
}

// valida si el representantes es padre o madre.
// no toma en cuenta otrs tipos de relacion
function representante_p_m($vin) {
	// verifica que solo se ingresen los parametros necesarios
	if ($vin == "p" or $vin == "m") {
		// Se crea una variable a comparar para madre o padre
		if ($vin == "p") {
			$res = "Padre";
		}
		elseif ($vin == "m") {
			$res = "Madre";
		}

		// Si coincide con que el representante es padre o madre, retorna true
		if ($res == dato_sesion_i("vinculo_r")) {
			return true;
		}
		else {
			return false;
		}

	}
	else {
		return false;
	}
}

// validar paso 2 para mostrar o no el formulario
function activar_p_m($vin) {

	$de_act = 'disabled style="display: none;"';


	// Si no se ha llenado antes el paso o si se llenó y 
	// se marcó que no se desactiva
	if (!isset($_SESSION['datos_inscripcion']['datos_padres'])) {
		echo $de_act;
	}
	else {
		if (dato_sesion_i("agregar_".$vin,2) != "S") {
			echo $de_act;
		}
	}
}



?>