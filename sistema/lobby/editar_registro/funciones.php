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


	function direccion_completa($datos_persona) {

	$puntos_direccion = [
		"estado",
		"municipio",
		"parroquia",
		"sector",
		"calle",
		"nro_casa",
		"punto_referencia",
	];

	$direccion_completa = [];

	foreach ($puntos_direccion as $punto) {
		if (!empty($datos_persona[$punto])) {
			if ($punto == "municipio") {
				$municipio = decodificar_municipio($datos_persona[$punto]);
				$direccion_completa = array_merge($direccion_completa,["municipio ". $municipio]);
			}
			else {
				$direccion_completa = array_merge($direccion_completa,[$datos_persona[$punto]]);
			}
		}
	}

	return implode(", ", $direccion_completa);
}
function decodificar_municipio($municipio) {
	switch ($municipio) {
		case "AAD":
			$municipio_dec = "Alberto Adriani";
			break;

		case "ABE":
			$municipio_dec = "Andrés Bello";
			break;

		case "APS":
			$municipio_dec = "Antonio Pinto Salinas";
			break;

		case "ARI":
			$municipio_dec = "Aricagua";
			break;

		case "ACH":
			$municipio_dec = "Arzobispo Chacón";
			break;

		case "CEL":
			$municipio_dec = "Campo Elías";
			break;

		case "CPO":
			$municipio_dec = "Caracciolo Parra Olmedo";
			break;

		case "CQU":
			$municipio_dec = "Cardenal Quintero";
			break;

		case "GUA":
			$municipio_dec = "Guaraque";
			break;

		case "JCS":
			$municipio_dec = "Julio César Salas";
			break;

		case "JBR":
			$municipio_dec = "Justo Briceño";
			break;

		case "LIB":
			$municipio_dec = "Libertador";
			break;

		case "MIR":
			$municipio_dec = "Miranda";
			break;

		case "ORL":
			$municipio_dec = "Obispo Ramos De Lora";
			break;

		case "PNO":
			$municipio_dec = "Padre Noguera";
			break;

		case "PLL":
			$municipio_dec = "Pueblo Llano";
			break;

		case "RAN":
			$municipio_dec = "Rangel";
			break;

		case "RDA":
			$municipio_dec = "Rivas Dávila";
			break;

		case "SMA":
			$municipio_dec = "Santos Marquina";
			break;

		case "SUC":
			$municipio_dec = "Sucre";
			break;

		case "TOV":
			$municipio_dec = "Tovar";
			break;

		case "TFC":
			$municipio_dec = "Tulio Febres Cordero";
			break;

		case "ZEA":
			$municipio_dec = "Zea";
			break;

		default:
			$municipio_dec = "";
			break;
	}

	return $municipio_dec;
}

?>