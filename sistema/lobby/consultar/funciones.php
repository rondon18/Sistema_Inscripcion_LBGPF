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

function listar_telefonos($telefonos_persona = []) {
	$lista_telefonos = [];

	foreach ($telefonos_persona as $telefono){
		$lista_telefonos = array_merge(
			$lista_telefonos,
			[
				$telefono['relacion'].": ".$telefono['prefijo']."-".$telefono['numero'],
			]
		);
	}
	return implode(" ", $lista_telefonos);
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

function comprobar_vacio($variable_a_comprobar, $valor = "O") {

	// si no está vacio
	if (!empty($variable_a_comprobar)) {

		// si lo que revisa es un sueldo
		if ($variable_a_comprobar == "R") {
			$resultado = $variable_a_comprobar." Sueldos minimos";
		}

		// Si es una edad
		elseif ($variable_a_comprobar == "E") {
			$resultado = $variable_a_comprobar." Años";
		}

		// si es el número de dosis de una vacuna
		elseif ($variable_a_comprobar == "D") {
			$resultado = $variable_a_comprobar." Dosis";
		}

		// si es una fecha
		elseif ($variable_a_comprobar == "F" and $variable_a_comprobar == "0000-00-00") {
			$resultado = "-----------";
		}

		// si es otro
		elseif ($variable_a_comprobar == "O") {
			$resultado = null;
		}

		// si no es ninguno de los anteriores
		else {
			$resultado = null;
		}

	}

	// si esta vacio
	else {
		$resultado = null;
	}

	// y retorna el resultado a mostrar
	return $resultado;
}

function verificar_si_o_no($variable_a_comprobar) {

	// caso si
	if (!empty($variable_a_comprobar)) {
		return "Si";
	}

	// caso no
	else {
		return "No";
	}

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
			$direccion_completa = array_merge($direccion_completa,[$datos_persona[$punto]]);
		}
	}

	return implode(", ", $direccion_completa);
}

function condiciones_salud($datos_persona) {
	$condiciones_salud = [
		'visual',
    'motora',
    'auditiva',
    'escritura',
    'lectura',
    'lenguaje',
    'embarazo',
	];

	$lista_condiciones = [];

	foreach ($condiciones_salud as $condicion) {
		if (!empty($datos_persona[$condicion])) {
			$lista_condiciones = array_merge($lista_condiciones,[$condicion]);
		}
	}

	// verifica que tenga al menos una condicion
	if (count($lista_condiciones) === 0) {
		return "Nínguna";
	}

	elseif (count($lista_condiciones) === 1) {
		return implode("", $lista_condiciones);
	}

	// Sino, retorna la lista y el ultimo de la lista esta separado con un "Y"
	else {
		return implode(', ', array_slice($lista_condiciones, 0, -1)) . ' y ' . $lista_condiciones[count($lista_condiciones) - 1] ?? NULL;

	}

}

function otras_vacunas($vacunas_estudiante) {
	$lista_vacunas = [];
	foreach ($vacunas_estudiante as $vacuna) {



		$lista_vacunas = array_merge(
			$lista_vacunas,
			[
				$vacuna["espec_vacuna"] => verificar_si_o_no($vacuna["estado_vacuna"]),
			]
		);
	}
	return $lista_vacunas;
}

function formatear_fecha($fecha) {
	return date('d-m-Y', strtotime($fecha));
}

function verificar_empleo($datos_persona) {
	if (!empty($datos_persona["empleo"])) {
		if (strtolower($datos_persona["empleo"]) != "desempleado") {
			return "Si";
		}
		else {
			return "No";
		}
	}
	else {
		return "No";
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