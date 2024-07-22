<?php

	if ($_SESSION['orden'] == "editar" and isset($_SESSION['datos_inscripcion'],$_SESSION['paso_3'])) {

		/*

			Estudiante

		*/

		// Persona

		// si alguno de los dos esta vacio, se usará le cédula escolar
		$personas->set_cedula(dato_sesion_i("nacionalidad_est",3).dato_sesion_i("cedula_est",3));

		// Datos de persona
		$personas->set_p_nombre(dato_sesion_i("primer_nombre_est",3));
		$personas->set_s_nombre(dato_sesion_i("segundo_nombre_est",3));
		$personas->set_p_apellido(dato_sesion_i("primer_apellido_est",3));
		$personas->set_s_apellido(dato_sesion_i("segundo_apellido_est",3));
		$personas->set_fecha_nacimiento(dato_sesion_i("fecha_nacimiento_est",3));
		$personas->set_lugar_nacimiento(dato_sesion_i("lugar_nacimiento_est",3));
		$personas->set_genero(dato_sesion_i("genero_est",3));
		$personas->set_estado_civil(dato_sesion_i("estado_civil_est",3));
		$personas->set_email(dato_sesion_i("correo_electronico_est",3));
		$personas->set_grado_academico(dato_sesion_i("grado_instruccion_est",3));

		// Inserta la persona
		$personas->editar_persona($_SESSION['datos_estudiante']['cedula']);

		// Almacena la cédula del representante
		$cedula_estudiante = $personas->get_cedula();

		// Telefonos

		// Telefono principal
		$telefonos->set_cedula_persona($cedula_estudiante);
		$telefonos->set_relacion("Principal");
		$telefonos->set_prefijo(dato_sesion_i("prefijo_principal_est",3));
		$telefonos->set_numero(dato_sesion_i("telefono_principal_est",3));
		$telefonos->editar_telefono();

		// Telefono secundario
		$telefonos->set_cedula_persona($cedula_estudiante);
		$telefonos->set_relacion("Secundario");
		$telefonos->set_prefijo(dato_sesion_i("prefijo_secundario_est",3));
		$telefonos->set_numero(dato_sesion_i("telefono_secundario_est",3));
		$telefonos->editar_telefono();

		// carnet_patria

		$carnet_patria->set_cedula_persona($cedula_estudiante);
		$carnet_patria->set_codigo_carnet(dato_sesion_i("codigo_carnet_patria_est",3));
		$carnet_patria->set_serial_carnet(dato_sesion_i("serial_carnet_patria_est",3));
		$carnet_patria->editar_carnet_patria();


		// direcciones


		// Vacia los datos exitentes de direccion
		$direcciones->set_cedula_persona($cedula_estudiante);
		$direcciones->set_estado("");
		$direcciones->set_municipio("");
		$direcciones->set_parroquia("");
		$direcciones->set_sector("");
		$direcciones->set_calle("");
		$direcciones->set_nro_casa("");
		$direcciones->set_punto_referencia("");


		// copia la direccion del padre, madre o representante con quien vive
		// o ingresa una propia si no vive con ellos

		// si vive con el representante
		if (dato_sesion_i("domicilio",3) == "representante") {
			$direcciones->set_estado("Mérida"); // Debe ser local
			$direcciones->set_municipio(dato_sesion_i("municipio"));
			$direcciones->set_parroquia(dato_sesion_i("parroquia"));
			$direcciones->set_sector(dato_sesion_i("sector"));
			$direcciones->set_calle(dato_sesion_i("calle"));
			$direcciones->set_nro_casa(dato_sesion_i("nro_casa"));
			$direcciones->set_punto_referencia(dato_sesion_i("punto_referencia"));
		}
		// si vive con el padre
		elseif (dato_sesion_i("domicilio",3) == "padre") {
			$direcciones->set_punto_referencia(dato_sesion_i("direccion_p",2));
		}
		// si vive con la madre
		elseif (dato_sesion_i("domicilio",3) == "madre") {
			$direcciones->set_punto_referencia(dato_sesion_i("direccion_m",2));
		}
		// Si vive en otra direccion
		else {
			$direcciones->set_punto_referencia(dato_sesion_i("direccion_est",3));
		}
		$direcciones->editar_direcciones();


		// Datos del estudiante

		$estudiantes->set_cedula_persona($cedula_estudiante);
		$estudiantes->set_plantel_proced(dato_sesion_i("plantel_procedencia",3));
		$estudiantes->set_con_quien_vive(dato_sesion_i("con_quien_vive",3));
		$estudiantes->set_relacion_representante($_SESSION['datos_estudiante']['relacion_representante']);
		$estudiantes->set_cedula_padre($_SESSION['datos_estudiante']['cedula_padre']);
		$estudiantes->set_cedula_madre($_SESSION['datos_estudiante']['cedula_madre']);
		$estudiantes->set_cedula_representante($_SESSION['datos_estudiante']['cedula_representante']);
		$estudiantes->editar_estudiantes();



		// datos_academicos

		$datos_academicos->set_cedula_estudiante($cedula_estudiante);
		$datos_academicos->set_a_repetido(dato_sesion_i("a_repetido",3));
		$datos_academicos->set_materias_repetidas(dato_sesion_i("materias_repitente",3));
		$datos_academicos->set_materias_pendientes(dato_sesion_i("materias_pendientes",3));
		$datos_academicos->editar_datos_academicos();

		// datos_sociales

		$datos_sociales->set_cedula_estudiante($cedula_estudiante);
		$datos_sociales->set_tiene_canaima(dato_sesion_i("tiene_canaima",3));
		$datos_sociales->set_condicion_canaima(dato_sesion_i("condiciones_canaima",3));
		$datos_sociales->set_acceso_internet(dato_sesion_i("internet_vivienda",3));
		$datos_sociales->editar_datos_sociales();


		// datos_salud

		$datos_salud->set_cedula_estudiante($cedula_estudiante);
		$datos_salud->set_lateralidad(dato_sesion_i("lateralidad",3));
		$tipo_sangre = dato_sesion_i("grupo_sanguineo",3) . dato_sesion_i("factor_rhesus",3);
		$datos_salud->set_tipo_sangre($tipo_sangre);
		$datos_salud->set_medicacion(dato_sesion_i("medicacion",3));
		$datos_salud->set_dieta_especial(dato_sesion_i("dieta_especial",3));
		$datos_salud->set_padecimiento(dato_sesion_i("enfermedad",3));
		$datos_salud->set_impedimento_fisico(dato_sesion_i("impedimento",3));
		$datos_salud->set_necesidad_educativa(dato_sesion_i("necesidad_educativa",3));
		$datos_salud->set_condicion_vista(dato_sesion_i("vista",3));
		$datos_salud->set_condicion_dental(dato_sesion_i("dentadura",3));
		$datos_salud->set_institucion_medica(dato_sesion_i("institucion_medica",3));
		$datos_salud->set_carnet_discapacidad(dato_sesion_i("nro_carnet_discapacidad",3));
		$datos_salud->editar_datos_salud();


		// tallas_est

		$tallas_est->set_cedula_estudiante($cedula_estudiante);
		$tallas_est->set_camisa(dato_sesion_i("talla_camisa",3));
		$tallas_est->set_pantalon(dato_sesion_i("talla_pantalon",3));
		$tallas_est->set_calzado(dato_sesion_i("talla_zapatos",3));
		$tallas_est->editar_tallas_est();


		// antropometria_est

		$antropometria_est->set_cedula_estudiante($cedula_estudiante);
		$antropometria_est->set_estatura(dato_sesion_i("talla",3));
		$antropometria_est->set_peso(dato_sesion_i("peso",3));
		$antropometria_est->set_indice_m_c(dato_sesion_i("indice",3));
		$antropometria_est->set_circ_braquial(dato_sesion_i("c_braquial",3));
		$antropometria_est->editar_antropometria_est();


		// vacunas_est


		// lista con las vacunas nombradas en el formulario
		$vacunas = [
			"vph",
			"tdap",
			"menacwy",
			"hep_a",
			"hep_b",
			"ipv",
			"mmr",
			"varicela",
			"antiamarilica",
			"antigripal"
		];

		$vacunas_est->set_cedula_estudiante($cedula_estudiante);
		foreach ($vacunas as $vacuna) {
			// especificacion de la vacuna
			$vacunas_est->set_espec_vacuna($vacuna);

			// si la vacuna fue o no aplicada
			if (dato_sesion_i($vacuna,3) == $vacuna) {
				$vacunas_est->set_estado_vacuna("Aplicada");
			}
			else {
				$vacunas_est->set_estado_vacuna("No aplicada");
			}
			$vacunas_est->editar_vacunas_est();
		}


		// vac_covid19_est

		$vac_covid19_est->set_cedula_estudiante($cedula_estudiante);

		// Detalla la vacuna si es una que no esta en la lista
		if (dato_sesion_i("vacuna",3) == "Otra") {
			$vac_covid19_est->set_vac_aplicada(dato_sesion_i("vacuna_otra",3));
		}
		else {
			$vac_covid19_est->set_vac_aplicada(dato_sesion_i("vacuna",3));
		}
		$vac_covid19_est->set_dosis(dato_sesion_i("dosis",3));
		$vac_covid19_est->set_lote(dato_sesion_i("lote",3));

		$vac_covid19_est->editar_vac_covid19_est();



		// lista con las condiciones de salud nombradas en el formulario

		$condiciones_est->set_cedula_estudiante($cedula_estudiante);
		$condiciones_est->set_visual(dato_sesion_i("cond_visual",3));
		$condiciones_est->set_motora(dato_sesion_i("cond_motora",3));
		$condiciones_est->set_auditiva(dato_sesion_i("cond_auditiva",3));
		$condiciones_est->set_escritura(dato_sesion_i("cond_escritura",3));
		$condiciones_est->set_lectura(dato_sesion_i("cond_lectura",3));
		$condiciones_est->set_lenguaje(dato_sesion_i("cond_lenguaje",3));
		$condiciones_est->set_embarazo(dato_sesion_i("cond_embarazo",3));
		$condiciones_est->editar_condiciones_est();



		// observaciones_est

		$observaciones_est->set_cedula_estudiante($cedula_estudiante);
		$observaciones_est->set_social(dato_sesion_i("observaciones_social",3));
		$observaciones_est->set_fisico(dato_sesion_i("observaciones_fisico",3));
		$observaciones_est->set_personal(dato_sesion_i("observaciones_personal",3));
		$observaciones_est->set_familiar(dato_sesion_i("observaciones_familiar",3));
		$observaciones_est->set_academico(dato_sesion_i("observaciones_academico",3));
		$observaciones_est->set_otra(dato_sesion_i("observaciones_otra",3));
		$observaciones_est->editar_observaciones_est();

		// grado_a_cursar_est

		$grado_a_cursar_est->set_grado_a_cursar(dato_sesion_i("grado_a_cursar",3));
		$grado_a_cursar_est->set_seccion(dato_sesion_i("seccion_a_cursar",3));
		$grado_a_cursar_est->set_cedula_estudiante($cedula_estudiante);
		$grado_a_cursar_est->set_id_per_academico($per_academico->get_id_per_academico());
		$grado_a_cursar_est->editar_grado_a_cursar_est();

		// inscripciones

		$inscripciones->set_fecha(date("Y-m-d"));
		$inscripciones->set_hora(date("H:i:s"));
		$inscripciones->set_cedula_usuario($_SESSION['datos_login']["cedula"]);
		$inscripciones->set_cedula_estudiante($cedula_estudiante);
		$inscripciones->insertar_inscripciones();


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

	}

?>