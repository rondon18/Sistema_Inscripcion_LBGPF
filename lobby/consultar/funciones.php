<?php 

function privilegios($priv) {
	if ($priv == 2) {
		$priv = "Usuario";
	}
	elseif ($priv == 1) {
		$priv = "Administrador";
	}
	elseif ($priv == 0) {
		$priv = "Desarrollador";
	}
	return $priv;
}

function calcular_edad($fecha_nacimiento){
	if ($fecha_nacimiento != "0000-00-00") {
		list($ano,$mes,$dia) = explode("-",$fecha_nacimiento);
		$ano_diferencia  = date("Y") - $ano;
		$mes_diferencia = date("m") - $mes;
		$dia_diferencia   = date("d") - $dia;
		if ($dia_diferencia < 0 || $mes_diferencia < 0){
			$ano_diferencia--;
		}
		return $ano_diferencia;
	}
	else {
		return NULL;
	}
}

function genero($genero){
	if ($genero == "F") {
		$genero = "Femenino";
	}
	elseif ($genero == "M") {
		$genero = "Masculino";
	}
	return $genero;
}

function Teléfono($prefijo,$numero) {
if (empty($prefijo) and empty($numero)) {
$Teléfono = "";
}
else {
$Teléfono = "$prefijo-$numero";
}
return $Teléfono;
}

function cedula_usuario($id, $lista_usuarios) {
	foreach ($lista_usuarios as $usuario) {
		if ($id == $usuario['idUsuarios']) {
			return $usuario;
			break;
		}
	} 
}

function comprobar_vacio($var, $val = "") {
	if (!empty($var)) {
		if ($val == "R") {
			echo $var." Sueldos minimos";		
		}
		elseif ($val == "E") {
			echo $var." Años";		
		}
		elseif ($val == "D") {
			echo $var." Dosis";		
		}
		elseif ($val == "F" and $var == "0000-00-00") {
			echo "-----------";	
		}
		else {
			echo $var;
		}
	}
	else {
		echo "-----------";
	}
}

function tiempo_ejecucion() {
	$tiempo_inicial = microtime(true);
	for($i = 0;$i < 100000000; $i++) {
		//
	}
	$tiempo_final = microtime(true);
	$tiempo = $tiempo_final - $tiempo_inicial;
	
	$ret = "Consulta realizada en: " . $tiempo . " segundos";
	return $ret;
}

?>