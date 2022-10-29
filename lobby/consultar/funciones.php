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

function calculaedad($fechanacimiento){
	list($ano,$mes,$dia) = explode("-",$fechanacimiento);
	$ano_diferencia  = date("Y") - $ano;
	$mes_diferencia = date("m") - $mes;
	$dia_diferencia   = date("d") - $dia;
	if ($dia_diferencia < 0 || $mes_diferencia < 0){
		$ano_diferencia--;
	}
	return $ano_diferencia;
}

function Género($Género){
	if ($Género == "F") {
		$Género = "Femenino";
	}
	elseif ($Género == "M") {
		$Género = "Masculino";
	}
	return $Género;
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

function Cédula_Usuario($id, $lista_usuarios) {
	foreach ($lista_usuarios as $usuario) {
		if ($id == $usuario['idUsuarios']) {
			return $usuario;
			break;
		}
	} 
}

function comprobarVacio($var, $val = "") {
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

?>