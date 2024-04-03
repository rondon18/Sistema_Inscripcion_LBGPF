<?php

	if ($_SESSION['orden'] == "editar" and isset($_SESSION['datos_inscripcion'],$_SESSION['paso_2'])) {

		/*

			Padre

		*/

		// Persona

		// echo $personas->generar_cedula_provisional();


			// Datos de persona
			$personas->set_cedula(dato_sesion_i("nacionalidad_p",2).dato_sesion_i("cedula_p",2));
			$personas->set_p_nombre(dato_sesion_i("primer_nombre_p",2));
			$personas->set_s_nombre(dato_sesion_i("segundo_nombre_p",2));
			$personas->set_p_apellido(dato_sesion_i("primer_apellido_p",2));
			$personas->set_s_apellido(dato_sesion_i("segundo_apellido_p",2));
			$personas->set_fecha_nacimiento(dato_sesion_i("fecha_nacimiento_p",2));
			$personas->set_lugar_nacimiento(dato_sesion_i("lugar_nacimiento_p",2));
			$personas->set_genero($_SESSION['datos_padre']['genero']);
			$personas->set_estado_civil(dato_sesion_i("estado_civil_p",2));
			$personas->set_email(dato_sesion_i("correo_electronico_p",2));
			$personas->set_grado_academico(dato_sesion_i("grado_instruccion_p",2));

			// Inserta la persona
			$personas->editar_persona($_SESSION['datos_padre']['cedula']);
			// var_dump($personas);

			// Almacena la cédula del padre
			$cedula_padre = $personas->get_cedula();

			// Telefonos

			// Telefono principal
			$telefonos->set_cedula_persona($cedula_padre);
			$telefonos->set_relacion("Principal");
			$telefonos->set_prefijo(dato_sesion_i("prefijo_principal_p",2));
			$telefonos->set_numero(dato_sesion_i("telefono_principal_p",2));
			$telefonos->editar_telefono();
			// var_dump($telefonos);

			// Telefono secundario
			$telefonos->set_cedula_persona($cedula_padre);
			$telefonos->set_relacion("Secundario");
			$telefonos->set_prefijo(dato_sesion_i("prefijo_secundario_p",2));
			$telefonos->set_numero(dato_sesion_i("telefono_secundario_p",2));
			$telefonos->editar_telefono();
			// var_dump($telefonos);



			// direcciones

			$direcciones->set_cedula_persona($cedula_padre);
			$direcciones->set_estado(""); // Debe ser local
			$direcciones->set_municipio("");
			$direcciones->set_parroquia("");
			$direcciones->set_sector("");
			$direcciones->set_calle("");
			$direcciones->set_nro_casa("");
			$direcciones->set_punto_referencia(dato_sesion_i("direccion_p",2));
			$direcciones->editar_direcciones();
			// var_dump($direcciones);

			// Datos del representante

			$padres->set_cedula_persona($cedula_padre);

			// Si el padre esta residenciado en el país se especifica directamente como Venezuela,
			// si desconoce como no conocido, si no, se toma el país especificado
			if (dato_sesion_i("reside_en_el_pais_p",2) == "Si") {
				$padres->set_pais_residencia("Venezuela");
			}
			elseif (dato_sesion_i("reside_en_el_pais_p",2) == "NC") {
				$padres->set_pais_residencia("No conocido");
			}
			else {
				$padres->set_pais_residencia(dato_sesion_i("pais_p",2));
			}
			$padres->editar_padres();
			// var_dump($padres);


			// datos_laborales
			$datos_laborales->set_cedula_persona($cedula_padre);
			$datos_laborales->set_empleo(dato_sesion_i("empleo_p",2));
			$datos_laborales->set_lugar_trabajo(dato_sesion_i("lugar_trabajo_p",2));
			$datos_laborales->set_remuneracion(dato_sesion_i("remuneracion_p",2));
			$datos_laborales->set_tipo_remuneracion(dato_sesion_i("tipo_remuneracion_p",2));
			$datos_laborales->editar_datos_laborales();
			// var_dump($datos_laborales);

			// Telefono del trabajo
			$telefonos->set_cedula_persona($cedula_padre);
			$telefonos->set_relacion("Trabajo");
			$telefonos->set_prefijo(dato_sesion_i("prefijo_trabajo_p",2));
			$telefonos->set_numero(dato_sesion_i("telefono_trabajo_p",2));
			$telefonos->editar_telefono();
			// var_dump($telefonos);


			// datos_vivienda

			$datos_vivienda->set_cedula_persona($cedula_padre);
			$datos_vivienda->set_condicion(dato_sesion_i("condicion_vivienda_p",2));
			$datos_vivienda->set_tipo(dato_sesion_i("tipo_vivienda_p",2));
			// tenencia de la vivienda
			if (dato_sesion_i("tenencia_vivienda_p",2) == "Otro") {
				$datos_vivienda->set_tenencia(dato_sesion_i("tenencia_vivienda_p_otro",2));
			}
			else {
				$datos_vivienda->set_tenencia(dato_sesion_i("tenencia_vivienda_p",2));
			}
			$datos_vivienda->editar_datos_vivienda();
			// var_dump($datos_vivienda);


		// elimina los valores almacenados en sesion de este proceso
		unset(
			$_SESSION['orden'],
			$_SESSION['datos_inscripcion'],
			$_SESSION['paso_2'],
			$_SESSION['tipo_edicion']
		);

	}
	else {
		// echo "b";
	}

?>