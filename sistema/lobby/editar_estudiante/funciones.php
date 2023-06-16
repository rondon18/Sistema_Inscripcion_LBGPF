<?php 

	// Dato se sesion para input
	function dato_input($indice, $array = 1) {

		switch ($array) {
			case 'de':
				$arreglo = "datos_estudiante";
				break;
			case 'te':
				$arreglo = "tlfs_estudiante";
				break;
			case 've':
				$arreglo = "vacunas_estudiante";
				break;
			case 'dr':
				$arreglo = "datos_representante";
				break;
			case 'tr':
				$arreglo = "tlfs_representante";
				break;
			case 'dp':
				$arreglo = "datos_padre";
				break;
			case 'tp':
				$arreglo = "tlfs_padre";
				break;
			case 'dm':
				$arreglo = "datos_madre";
				break;
			case 'tm':
				$arreglo = "tlfs_madre";
				break;
			
			default:
				$arreglo = NULL;
				break;
		}


		$valor = NULL;

		// Si el indice no existe, retorna nulo
		if (isset($_SESSION[$arreglo][$indice])) {
			$valor = $_SESSION[$arreglo][$indice];
		}
		else {
			$valor = NULL;
		}
		
		return $valor;
	}


	// Dato se sesion para input radio, check y selects
	function dato_option($val,$indice,$tipo, $array = 1) {
		// recibe valor de la opcion, indice o name del campo y el tipo, sea radioboton o selector
		
		// type="radio" / type="checkbox"
		if ($tipo == "rc") {
			$res = "checked";
		}

		// Select
		elseif ($tipo == "s"){
			$res = "selected";
		}

		switch ($array) {
			case 'de':
				$arreglo = "datos_estudiante";
				break;
			case 'te':
				$arreglo = "tlfs_estudiante";
				break;
			case 've':
				$arreglo = "vacunas_estudiante";
				break;
			case 'dr':
				$arreglo = "datos_representante";
				break;
			case 'tr':
				$arreglo = "tlfs_representante";
				break;
			case 'dp':
				$arreglo = "datos_padre";
				break;
			case 'tp':
				$arreglo = "tlfs_padre";
				break;
			case 'dm':
				$arreglo = "datos_madre";
				break;
			case 'tm':
				$arreglo = "tlfs_madre";
				break;
			
			default:
				$arreglo = NULL;
				break;
		}

	
		$ret = NULL;
		// Si el indice no existe, retorna nulo
		if (isset($_SESSION[$arreglo][$indice])) {
			if ($val == $_SESSION[$arreglo][$indice]) {
				$ret = $res;
			}
		}
		else {
			$valor = NULL;
		}

		var_dump($ret);

		echo $ret;


	} 
?>