


//Deshabilita area de trabajo del representante si marca no
$(document).ready(function(){
	$('#formulariorepresentante').change(function(){
		selected_value = $("input[name='representante_trabaja']:checked").val();
		if (selected_value == "Si") {
			$("#datos_trabajo").prop("disabled", false);
			$("#datos_trabajo").fadeIn();
		}
		else if (selected_value == "No"){
			$("#datos_trabajo").prop("disabled", true);
			$("#datos_trabajo").fadeOut();
		}
	});
});

//Deshabilita area de trabajo del representante si marca no
$(document).ready(function(){
	$('#formulariorepresentante').change(function(){
		selected_value = $("input[name='sum_bancario']:checked").val();
		if (selected_value == "Si") {
			$("#datos_bancarios").prop("disabled", false);
			$("#datos_bancarios").fadeIn();
		}
		else if (selected_value == "No"){
			$("#datos_bancarios").prop("disabled", true);
			$("#datos_bancarios").fadeOut();
		}
	});
});


//Habilita/Deshabilita el campo de otro vinculo del representante
$(document).ready(function(){
	$('#formulariorepresentante').change(function(){
		selected_value = $("select[name='vinculo_r']>option:selected").val();
		if (selected_value == "Otro") {
			$("#vinculo_otro").prop("disabled", false);
		}
		else {
			$("#vinculo_otro").prop("disabled", true);
		}
	});
});

//Habilita/Deshabilita el campo de otro vinculo del representante
$(document).ready(function(){
	$('#formulariorepresentante').change(function(){
		selected_value = $("select[name='tenencia_vivienda_r']>option:selected").val();
		if (selected_value == "Otro") {
			$("#tenencia_vivienda_r_otro").prop("disabled", false);
		}
		else {
			$("#tenencia_vivienda_r_otro").prop("disabled", true);
		}
	});
});




//Habilita/Deshabilita el campo de otro vinculo del representante
$(document).ready(function(){
	$('#formulariorepresentante').change(function(){
		selected_value = $('select[name="municipio"]>optgroup>option:selected').val();
		if (selected_value != undefined) {

			// muestra el valor capturado en consola
			console.log(selected_value);
			
			// Desactiva todas las secciones
			$("#AAD, #ABE, #APS, #ARI, #ACH, #CEL, #CPO, #CQU, #GUA, #JCS, #JBR, #LIB, #MIR, #ORL, #PNO, #PLL, #RAN, #RDA, #SMA, #SUC, #TOV, #TFC, #ZEA").prop("disabled", true);

			// Habilita las parroquias segun el municipio elegido
			if (selected_value == "AAD") {
				$("#AAD").prop("disabled", false);
			}
			else if (selected_value == "ABE") {
				$("#ABE").prop("disabled", false);
			}
			else if (selected_value == "APS") {
				$("#APS").prop("disabled", false);
			}
			else if (selected_value == "ARI") {
				$("#ARI").prop("disabled", false);
			}
			else if (selected_value == "ACH") {
				$("#ACH").prop("disabled", false);
			}
			else if (selected_value == "CEL") {
				$("#CEL").prop("disabled", false);
			}
			else if (selected_value == "CPO") {
				$("#CPO").prop("disabled", false);
			}
			else if (selected_value == "CQU") {
				$("#CQU").prop("disabled", false);
			}
			else if (selected_value == "GUA") {
				$("#GUA").prop("disabled", false);
			}
			else if (selected_value == "JCS") {
				$("#JCS").prop("disabled", false);
			}
			else if (selected_value == "JBR") {
				$("#JBR").prop("disabled", false);
			}
			else if (selected_value == "LIB") {
				$("#LIB").prop("disabled", false);
			}
			else if (selected_value == "MIR") {
				$("#MIR").prop("disabled", false);
			}
			else if (selected_value == "ORL") {
				$("#ORL").prop("disabled", false);
			}
			else if (selected_value == "PNO") {
				$("#PNO").prop("disabled", false);
			}
			else if (selected_value == "PLL") {
				$("#PLL").prop("disabled", false);
			}
			else if (selected_value == "RAN") {
				$("#RAN").prop("disabled", false);
			}
			else if (selected_value == "RDA") {
				$("#RDA").prop("disabled", false);
			}
			else if (selected_value == "SMA") {
				$("#SMA").prop("disabled", false);
			}
			else if (selected_value == "SUC") {
				$("#SUC").prop("disabled", false);
			}
			else if (selected_value == "TOV") {
				$("#TOV").prop("disabled", false);
			}
			else if (selected_value == "TFC") {
				$("#TFC").prop("disabled", false);
			}
			else if (selected_value == "ZEA") {
				$("#ZEA").prop("disabled", false);
			}
			else {
				$("#parroquia").prop("disabled", true);
			}
			// activa el select para parroquias
			$("#parroquia").prop("disabled", false);
		}
		else {
			$("#parroquia").prop("disabled", true);
		}
	});
});

//validacion y envio
$.fn.isValid = function(){
	return this[0].checkValidity()
}

$(document).ready(function() {
	$('#formulariorepresentante').submit(function(e) {
			e.preventDefault();
			// or return false;
	});
});

jQuery.validator.addMethod("lettersonly", function(value, element) 
{
return this.optional(element) || /^[a-zA-ZñÑáéíóúÁÉÍÓÚ," "]+$/i.test(value);
}, "Solo caracteres alfabeticos y/o espacios, por favor.");

$("#formulariorepresentante").validate({
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
			min: 8000000,
			max: 30000000,
		},
		vinculo_otro : {
			lettersonly: true,
			maxlength: 80,
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

		// economicos
		nro_cuenta: {
			digits: true,
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

		// Auxiliar
		primer_nombre_aux: {
			lettersonly: true,
		},
		segundo_nombre_aux: {
			lettersonly: true,
		},
		primer_apellido_aux: {
			lettersonly: true,
		},
		segundo_apellido_aux: {
			lettersonly: true,
		},
		relacion_auxiliar: {
			lettersonly: true,
		},
		prefijo_principal_aux: {
			digits: true,
			minlength: 4,
			maxlength: 4,
		},
		telefono_principal_aux: {
			digits: true,
			minlength: 7,
			maxlength: 7,
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
		if (count_form_1 == 5) {
			$("#boton_siguiente").fadeIn();
			$("#boton_guardar").hide();
		}
		count_form_1 = count_form_1 - 1;
	}
	// Oculta las secciones
	$("#seccion1, #seccion2, #seccion3, #seccion4, #seccion5").hide();
	// limpia los indicadores de seccion
	$("#link1, #link2, #link3, #link4, #link5").removeClass("active");
	
	// Activa la seccion actual y su indicador
	$("#seccion" + count_form_1).fadeIn();
	$("#link" + count_form_1).addClass("active");
});


$("#boton_siguiente").click(function() {
	if ($("#formulariorepresentante").valid()) {
		if (count_form_1 < 5) {
			count_form_1 = count_form_1 + 1;
		}
		// Oculta las secciones
		$("#seccion1, #seccion2, #seccion3, #seccion4, #seccion5").hide();
		// limpia los indicadores de seccion
		$("#link1, #link2, #link3, #link4, #link5").removeClass("active");
		
		// Activa la seccion actual y su indicador
		$("#seccion" + count_form_1).fadeIn();
		$("#link" + count_form_1).addClass("active");
		if (count_form_1 == 5) {
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
	$("#seccion1, #seccion2, #seccion3, #seccion4, #seccion5").fadeIn();
	if ($("#formulariorepresentante").valid()) {
		$("#formulariorepresentante").submit();
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
