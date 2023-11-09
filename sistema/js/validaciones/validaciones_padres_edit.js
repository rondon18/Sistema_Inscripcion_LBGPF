// PADRE

//Deshabilita las opciones de datos del padre si marca no
$(document).ready(function(){
	$('#formulario_padres').change(function(){
		// Sigue cambios en el valor seleccionado de los 
		// radiobotones de si desea agregar los datos del padre o no
		selected_value = $("input[name='agregar_p']:checked").val();
		if (selected_value == "S") {
			$("#datos_p").prop("disabled", false);
			$("#datos_p").fadeIn();
		}
		else if (selected_value == "N"){
			$("#datos_p").prop("disabled", true);
			$("#datos_p").fadeOut();
		}
	});
});

//Habilita/Deshabilita el campo especificar país de padre
$(document).ready(function(){
	$('#formulario_padres').change(function(){
		// Sigue cambios en el valor seleccionado del select de si reside en el país
		selected_value = $("select[name='reside_en_el_pais_p']>option:selected").val();
		if (selected_value == "No") {
			$("#pais_p").prop("disabled", false);
		}
		else {
			$("#pais_p").prop("disabled", true);
		}
	});
});

//Deshabilita area de trabajo del padre si marca no
$(document).ready(function(){
	$('#formulario_padres').change(function(){
		// Sigue cambios en el valor seleccionado de los 
		// radiobotones de si trabaja o no
		selected_value = $("input[name='padre_trabaja']:checked").val();
		if (selected_value == "Si") {
			$("#datos_trabajo_p").prop("disabled", false);
			$("#datos_trabajo_p").fadeIn();
		}
		else if (selected_value == "No"){
			$("#datos_trabajo_p").prop("disabled", true);
			$("#datos_trabajo_p").fadeOut();
		}
	});
});


//Habilita/Deshabilita el campo de otra tenencia
$(document).ready(function(){
	$('#formulario_padres').change(function(){
		// Sigue cambios en el valor seleccionado del select de tenencia de vivienda
		selected_value = $("select[name='tenencia_vivienda_p']>option:selected").val();
		if (selected_value == "Otro") {
			$("#tenencia_vivienda_p_otro").prop("disabled", false);
		}
		else {
			$("#tenencia_vivienda_p_otro").prop("disabled", true);
		}
	});
});




// MADRE

//Deshabilita las opciones de datos del padre si marca no
$(document).ready(function(){
	$('#formulario_padres').change(function(){
		// Sigue cambios en el valor seleccionado de los 
		// radiobotones de si desea agregar los datos del padre o no
		selected_value = $("input[name='agregar_m']:checked").val();
		if (selected_value == "S") {
			$("#datos_m").prop("disabled", false);
			$("#datos_m").fadeIn();
		}
		else if (selected_value == "N"){
			$("#datos_m").prop("disabled", true);
			$("#datos_m").fadeOut();
		}
	});
});

//Habilita/Deshabilita el campo especificar país de padre
$(document).ready(function(){
	$('#formulario_padres').change(function(){
		// Sigue cambios en el valor seleccionado del select de si reside en el país
		selected_value = $("select[name='reside_en_el_pais_m']>option:selected").val();
		if (selected_value == "No") {
			$("#pais_m").prop("disabled", false);
		}
		else {
			$("#pais_m").prop("disabled", true);
		}
	});
});

//Deshabilita area de trabajo del padre si marca no
$(document).ready(function(){
	$('#formulario_padres').change(function(){
		// Sigue cambios en el valor seleccionado de los 
		// radiobotones de si trabaja o no
		selected_value = $("input[name='madre_trabaja']:checked").val();
		if (selected_value == "Si") {
			$("#datos_trabajo_m").prop("disabled", false);
			$("#datos_trabajo_m").fadeIn();
		}
		else if (selected_value == "No"){
			$("#datos_trabajo_m").prop("disabled", true);
			$("#datos_trabajo_m").fadeOut();
		}
	});
});


//Habilita/Deshabilita el campo de otra tenencia
$(document).ready(function(){
	$('#formulario_padres').change(function(){
		// Sigue cambios en el valor seleccionado del select de tenencia de vivienda
		selected_value = $("select[name='tenencia_vivienda_m']>option:selected").val();
		if (selected_value == "Otro") {
			$("#tenencia_vivienda_m_otro").prop("disabled", false);
		}
		else {
			$("#tenencia_vivienda_m_otro").prop("disabled", true);
		}
	});
});







jQuery.validator.addMethod("lettersonly", function(value, element) 
{
return this.optional(element) || /^[a-zA-ZñÑáéíóúÁÉÍÓÚ," "]+$/i.test(value);
}, "Solo caracteres alfabeticos y/o espacios, por favor.");

$("#formulario_padres").validate({
	rules:{

		// Parte del padre

		// personal
		primer_nombre_p: {
			lettersonly: true,
			minlength: 3,
		},
		segundo_nombre_p: {
			lettersonly: true,
			minlength: 3,
		},
		primer_apellido_p: {
			lettersonly: true,
			minlength: 3,
		},
		segundo_apellido_p: {
			lettersonly: true,
			minlength: 3,
		},
		cedula_p: {
			digits: true,
			maxlength:11,
			min: 100,
			max: 30000000,
		},
		codigo_carnet_patria_p: {
			digits: true,
		},
		serial_carnet_patria_p: {
			digits: true,
		},

		// contacto
		prefijo_principal_p: {
			digits: true,
			minlength: 4,
			maxlength: 4,
		},
		telefono_principal_p: {
			digits: true,
			minlength: 7,
			maxlength: 7,
		},
		prefijo_secundario_p: {
			digits: true,
			minlength: 4,
			maxlength: 4,
		},
		telefono_secundario_p: {
			digits: true,
			minlength: 7,
			maxlength: 7,
		},

		// vivienda
		pais_p: {
			lettersonly: true,
			minlength: 3,
		},
		tenencia_vivienda_p_otro: {
			lettersonly: true,
			minlength: 3,
		},

		// trabajo
		prefijo_trabajo_p: {
			digits: true,
			minlength: 4,
			maxlength: 4,
		},
		telefono_trabajo_p: {
			digits: true,
			minlength: 7,
			maxlength: 12,
		},
		
		// Parte de la madre

		// personal
		primer_nombre_m: {
			lettersonly: true,
			minlength: 3,
		},
		segundo_nombre_m: {
			lettersonly: true,
			minlength: 3,
		},
		primer_apellido_m: {
			lettersonly: true,
			minlength: 3,
		},
		segundo_apellido_m: {
			lettersonly: true,
			minlength: 3,
		},
		cedula_m: {
			digits: true,
			maxlength:11,
			min: 100,
			max: 30000000,
		},
		codigo_carnet_matria_m: {
			digits: true,
		},
		serial_carnet_matria_m: {
			digits: true,
		},

		// contacto
		prefijo_principal_m: {
			digits: true,
			minlength: 4,
			maxlength: 4,
		},
		telefono_principal_m: {
			digits: true,
			minlength: 7,
			maxlength: 7,
		},
		prefijo_secundario_m: {
			digits: true,
			minlength: 4,
			maxlength: 4,
		},
		telefono_secundario_m: {
			digits: true,
			minlength: 7,
			maxlength: 7,
		},

		// vivienda
		pais_m: {
			lettersonly: true,
			minlength: 3,
		},
		tenencia_vivienda_m_otro: {
			lettersonly: true,
			minlength: 3,
		},

		// trabajo
		prefijo_trabajo_m: {
			digits: true,
			minlength: 4,
			maxlength: 4,
		},
		telefono_trabajo_m: {
			digits: true,
			minlength: 7,
			maxlength: 12,
		},
	},
	onfocusout: function(element) {
		$('input[type="text"], input[type="email"], textarea').each(function(index, element) {
      // Convertir el contenido a mayúsculas
      element.value = element.value.toUpperCase();
    });
		this.element(element); // triggers validation
	},
	onkeyup: function(element, event) {
		$('input[type="text"], input[type="email"], textarea').each(function(index, element) {
      // Convertir el contenido a mayúsculas
      element.value = element.value.toUpperCase();
    });
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
	$("#seccion1").hide();
});

