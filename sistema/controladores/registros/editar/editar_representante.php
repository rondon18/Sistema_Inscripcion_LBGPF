<?php

	if ($_SESSION['orden'] == "editar" and isset($_SESSION['datos_inscripcion'],$_SESSION['paso_1'])) {


		/*

			Representante

		*/


		// Se debe usar la cédula actual al editar la persona


		// Persona

		// Datos de persona
		$personas->set_cedula(dato_sesion_i("nacionalidad_r").dato_sesion_i("cedula_r"));
		$personas->set_p_nombre(dato_sesion_i("primer_nombre_r"));
		$personas->set_s_nombre(dato_sesion_i("segundo_nombre_r"));
		$personas->set_p_apellido(dato_sesion_i("primer_apellido_r"));
		$personas->set_s_apellido(dato_sesion_i("segundo_apellido_r"));
		$personas->set_fecha_nacimiento(dato_sesion_i("fecha_nacimiento_r"));
		$personas->set_lugar_nacimiento(dato_sesion_i("lugar_nacimiento_r"));
		$personas->set_genero(dato_sesion_i("genero_r"));
		$personas->set_estado_civil(dato_sesion_i("estado_civil_r"));
		$personas->set_email(dato_sesion_i("correo_electronico_r"));
		$personas->set_grado_academico(dato_sesion_i("grado_instruccion_r"));


		// edita la persona
		$personas->editar_persona($_SESSION['datos_representante']['cedula']);

		// Almacena la cédula del representante
		$cedula_representante = $personas->get_cedula();


		// Telefonos

		// Telefono principal
		$telefonos->set_cedula_persona($cedula_representante);
		$telefonos->set_relacion("Principal");
		$telefonos->set_prefijo(dato_sesion_i("prefijo_principal_r"));
		$telefonos->set_numero(dato_sesion_i("telefono_principal_r"));
		$telefonos->editar_telefono();


		// Telefono secundario
		$telefonos->set_cedula_persona($cedula_representante);
		$telefonos->set_relacion("Secundario");
		$telefonos->set_prefijo(dato_sesion_i("prefijo_secundario_r"));
		$telefonos->set_numero(dato_sesion_i("telefono_secundario_r"));
		$telefonos->editar_telefono();

		// Telefono auxiliar
		$telefonos->set_cedula_persona($cedula_representante);
		$telefonos->set_relacion("Auxiliar");
		$telefonos->set_prefijo(dato_sesion_i("prefijo_auxiliar_r"));
		$telefonos->set_numero(dato_sesion_i("telefono_auxiliar_r"));
		$telefonos->editar_telefono();


		// carnet_patria

		$carnet_patria->set_cedula_persona($cedula_representante);
		$carnet_patria->set_codigo_carnet(dato_sesion_i("codigo_carnet_patria_r"));
		$carnet_patria->set_serial_carnet(dato_sesion_i("serial_carnet_patria_r"));
		$carnet_patria->editar_carnet_patria();


		// direcciones

		$direcciones->set_cedula_persona($cedula_representante);
		$direcciones->set_estado("Mérida"); // Debe ser local
		$direcciones->set_municipio(dato_sesion_i("municipio"));
		$direcciones->set_parroquia(dato_sesion_i("parroquia"));
		$direcciones->set_sector(dato_sesion_i("sector"));
		$direcciones->set_calle(dato_sesion_i("calle"));
		$direcciones->set_nro_casa(dato_sesion_i("nro_casa"));
		$direcciones->set_punto_referencia(dato_sesion_i("punto_referencia"));
		$direcciones->editar_direcciones();


		// Datos del representante

		// datos_laborales
		$datos_laborales->set_cedula_persona($cedula_representante);
		$datos_laborales->set_empleo(dato_sesion_i("empleo_r"));
		$datos_laborales->set_lugar_trabajo(dato_sesion_i("lugar_trabajo_r"));
		$datos_laborales->set_remuneracion(dato_sesion_i("remuneracion_r"));
		$datos_laborales->set_tipo_remuneracion(dato_sesion_i("tipo_remuneracion_r"));
		$datos_laborales->editar_datos_laborales();

		// Telefono del trabajo
		$telefonos->set_cedula_persona($cedula_representante);
		$telefonos->set_relacion("Trabajo");
		$telefonos->set_prefijo(dato_sesion_i("prefijo_trabajo_r"));
		$telefonos->set_numero(dato_sesion_i("telefono_trabajo_r"));
		$telefonos->editar_telefono();



		// datos_vivienda

		$datos_vivienda->set_cedula_persona($cedula_representante);
		$datos_vivienda->set_condicion(dato_sesion_i("condicion_vivienda_r"));
		$datos_vivienda->set_tipo(dato_sesion_i("tipo_vivienda_r"));
		// tenencia de la vivienda
		if (dato_sesion_i("tenencia_vivienda_r") == "Otro") {
			$datos_vivienda->set_tenencia(dato_sesion_i("tenencia_vivienda_r_otro"));
		}
		else {
			$datos_vivienda->set_tenencia(dato_sesion_i("tenencia_vivienda_r"));
		}
		$datos_vivienda->editar_datos_vivienda();


		// datos_economicos
		$datos_economicos->set_cedula_representante($cedula_representante);
		$datos_economicos->set_banco(dato_sesion_i("banco"));
		$datos_economicos->set_tipo_cuenta(dato_sesion_i("tipo_cuenta"));
		$datos_economicos->set_nro_cuenta(dato_sesion_i("nro_cuenta"));
		$datos_economicos->editar_datos_economicos();


		// contactos_aux
		$contactos_aux->set_cedula_representante($cedula_representante);
		$contactos_aux->set_nombre(dato_sesion_i("primer_nombre_aux"));
		$contactos_aux->set_apellido(dato_sesion_i("primer_apellido_aux"));
		$contactos_aux->set_prefijo_telefono(dato_sesion_i("prefijo_principal_aux"));
		$contactos_aux->set_nro_telefono(dato_sesion_i("telefono_principal_aux"));
		$contactos_aux->set_relacion(dato_sesion_i("relacion_auxiliar"));
		$contactos_aux->editar_contactos_aux();




		// elimina los valores almacenados en sesion de este proceso
		unset(
			$_SESSION['orden'],
			$_SESSION['datos_inscripcion'],
			$_SESSION['paso_1'],
			$_SESSION['paso_2'],
			$_SESSION['paso_3'],
			$_SESSION['tipo_edicion']
		);

	}
	else {
		// echo "b";
	}

?>