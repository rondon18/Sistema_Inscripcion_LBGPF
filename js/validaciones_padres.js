jQuery.validator.addMethod("lettersonly", function(value, element) 
{
return this.optional(element) || /^[a-z," "]+$/i.test(value);
}, "Solo caracteres alfabeticos y/o espacios, por favor.");

$("#formulario_padres").validate({
	rules:{

		// personal
		primer_nombre_r: {
			lettersonly: true,
		},
		segundo_nombre_r: {
			lettersonly: true,
		},
		primer_apellido_r: {
			lettersonly: true,
		},
		segundo_apellido_r: {
			lettersonly: true,
		},
		cedula_r: {
			digits: true,
		},
		codigo_carnet_patria_r: {
			digits: true,
		},
		serial_carnet_patria_r: {
			digits: true,
		},

		// contacto
		prefijo_principal_r: {
			digits: true,
			minlength: 4,
			maxlength: 4,
		},
		telefono_principal_r: {
			digits: true,
			minlength: 7,
			maxlength: 7,
		},
		prefijo_secundario_r: {
			digits: true,
			minlength: 4,
			maxlength: 4,
		},
		telefono_secundario_r: {
			digits: true,
			minlength: 7,
			maxlength: 7,
		},
		prefijo_auxiliar_r: {
			digits: true,
			minlength: 4,
			maxlength: 4,
		},
		telefono_auxiliar_r: {
			digits: true,
			minlength: 7,
			maxlength: 7,
		},

		// direccion
		municipio: {
			maxlength: 80,
		},
		parroquia: {
			maxlength: 80,
		},
		sector: {
			maxlength: 80,
		},
		calle: {
			maxlength: 80,
		},
		nro_casa: {
			maxlength: 80,
		},
		punto_referencia: {
			maxlength: 80,
		},


		// vivienda
		tenencia_vivienda_r_otro: {
			lettersonly: true,
		},

		// trabajo
		prefijo_trabajo_r: {
			digits: true,
			minlength: 4,
			maxlength: 4,
		},
		telefono_trabajo_r: {
			digits: true,
			minlength: 7,
			maxlength: 12,
		},
	},
	onfocusout: function(element) {
		this.element(element); // triggers validation
	},
	onkeyup: function(element, event) {
		this.element(element); // triggers validation
	},

	submitHandler: function(form) {
	  form.submit();
	},
});

// Manejo de las secciones

var count_form_1 = 1;

$("#boton_anterior").click(function() {
		// Evita que se vaya a un valor por debajo de 1
	if (count_form_1 > 1) {
		if (count_form_1 == 2) {
			$("#boton_siguiente").fadeIn();
			$("#boton_guardar").hide();
		}
		count_form_1 = count_form_1 - 1;
	}
	// Oculta las secciones
	$("#seccion1, #seccion2").hide();
	// limpia los indicadores de seccion
	$("#link1, #link2").removeClass("active");
	
	// Activa la seccion actual y su indicador
	$("#seccion" + count_form_1).fadeIn();
	$("#link" + count_form_1).addClass("active");
});


$("#boton_siguiente").click(function() {
	if ($("#formulario_padres").valid()) {
		if (count_form_1 < 2) {
			count_form_1 = count_form_1 + 1;
		}
		// Oculta las secciones
		$("#seccion1, #seccion2").hide();
		// limpia los indicadores de seccion
		$("#link1, #link2").removeClass("active");
		
		// Activa la seccion actual y su indicador
		$("#seccion" + count_form_1).fadeIn();
		$("#link" + count_form_1).addClass("active");
		if (count_form_1 == 2) {
			$("#boton_siguiente").hide();
			$("#boton_guardar").fadeIn();
		}
	}
	else {
		// Muestra un mensaje de alerta para que el usuario revise los campos que le falten o sean invalidos
		Swal.fire(
			'Atención',
			'Faltan campos por llenar <br><br> <span class="form-text">Verifiquelos antes de continuar.</span>',
			'info'
		);
	}
});


$("#boton_guardar").click(function() {
	$("#seccion1, #seccion2").fadeIn();
	if ($("#formulario_padres").valid()) {
		$("#formulario_padres").submit();
	}
	else {
		// Muestra un mensaje de alerta para que el usuario revise los campos que le falten o sean invalidos
		Swal.fire(
			'Atención',
			'Faltan campos por llenar <br><br> <span class="form-text">Verifiquelos antes de continuar.</span>',
			'info'
		);
	}
	$("#seccion1, #seccion2, #seccion3, #seccion4").hide();
});

