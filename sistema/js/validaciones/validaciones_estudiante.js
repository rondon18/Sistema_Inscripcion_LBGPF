//Deshabilita las opciones de estudiante repitente si marca no
$(document).ready(function(){
	$('#formulario_estudiantes').change(function(){
		selected_value = $("input[name='repitente']:checked").val();
		if (selected_value == "Si") {
			$("#estudiante_repitente").prop("disabled", false);
			$("#estudiante_repitente").fadeIn();
		}
		else if (selected_value == "No"){
			$("#estudiante_repitente").prop("disabled", true);
			$("#estudiante_repitente").fadeOut();
		}
	});
});

//Deshabilita las condiciones de la canaima si no tiene
$(document).ready(function(){
	$('#formulario_estudiantes').change(function(){
		selected_value = $("input[name='tiene_canaima']:checked").val();
		if (selected_value == "Si") {
			$("#condiciones_canaima").prop("disabled", false);
		}
		else if (selected_value == "No"){
			$("#condiciones_canaima").prop("disabled", true);
		}
	});
});

//Deshabilita la opcion de domicilio si es padre, madre o representante
$(document).ready(function(){
	$('#formulario_estudiantes').change(function(){
		selected_value = $("input[name='domicilio']:checked").val();
		if (selected_value == "otro") {
			$("#direccion_est").prop("disabled", false);
		}
		else {
			$("#direccion_est").prop("disabled", true);
		}
	});
});


//Deshabilita la opcion de domicilio si es padre, madre o representante
$(document).ready(function(){
	$('#formulario_estudiantes').change(function(){
		selected_value = $("select[name='vacuna']>option:selected").val();

		// Si no esta vacunado, desactiva dosis, lote y otra vacuna
		if (selected_value == "NV") {
			$("#dosis, #lote, #vacuna_otra").prop("disabled", true);
		}
		// Si esta vacunado habilita dosis y lote
		else {
			// Si tiene otra vacuna, habilita su campo
			if (selected_value == "Otra") {
				$("#dosis, #lote, #vacuna_otra").prop("disabled", false);
			}
			else {
				$("#dosis, #lote").prop("disabled", false);
				$("#vacuna_otra").prop("disabled", true);

			}
		}
	});
});


//Deshabilita los campos de la cédula si el estudiante no tiene o usa cédula escolar
$(document).ready(function(){
	$('#formulario_estudiantes').change(function(){
		if ($("#usar_c_e").is(":checked")) {
			$("#cedula_estudiante").prop("disabled", true);
			$('input[name="cedula_escolar_est"]').attr("required", true);
			$('#c_escolar').toggleClass("requerido");
		}
		else {
			$("#cedula_estudiante").prop("disabled", false);
			$('input[name="cedula_escolar_est"]').attr("required", false);
			$('#c_escolar').toggleClass("requerido");
		}
	});
});


// Calcula el IMC del estudiante
$(document).ready(function(){
	$('#formulario_estudiantes').change(function(){

		// Conversion de centimetros a metros
		var talla = $("input[name='talla']").val() / 100;
		
		var peso = $("input[name='peso']").val();

		// Calcula si ambos no estan vacios, si falta uno de los dos. Vacia el campo de indice
		if (talla != "" && peso != "") {
			// Indice = peso / talla(mt)^2
			var indice = peso / (talla*talla);

			$("input[name='indice']").val(indice.toFixed(2));
		}
		else  {
			$("input[name='indice']").val("");
		}
		// console.log(talla);
		// console.log(peso);
		// console.log(indice);
	});
});




jQuery.validator.addMethod("lettersonly", function(value, element) 
{
return this.optional(element) || /^[a-zA-ZñÑáéíóúÁÉÍÓÚ," "]+$/i.test(value);
}, "Solo caracteres alfabeticos y/o espacios, por favor.");


jQuery.validator.addMethod("alphanumeric", function(value, element) 
{
return this.optional(element) || /^[\w.]+$/i.test(value);
}, "Solo caracteres númericos y alfabeticos, por favor.");

$("#formulario_estudiantes").validate({
	rules:{

		// personal
		primer_nombre_est: {
			lettersonly: true,
			minlength:3,
			maxlength: 40,
		},
		segundo_nombre_est: {
			lettersonly: true,
			minlength:3,
			maxlength: 40,
		},
		primer_apellido_est: {
			lettersonly: true,
			minlength:3,
			maxlength: 40,
		},
		segundo_apellido_est: {
			lettersonly: true,
			minlength:3,
			maxlength: 40,
		},
		cedula_est: {
			digits: true,
			minlength: 8,
			maxlength: 9,
			min: 30000000,
			max: 99999999,
		},
		cedula_escolar_est: {
			minlength:12,
			maxlength: 14,
			alphanumeric: true,
		},
		
		codigo_carnet_patria_est: {
			digits: true,
		},
		serial_carnet_patria_est: {
			digits: true,
		},

		// contacto
		prefijo_principal_est: {
			digits: true,
			minlength: 4,
			maxlength: 4,
		},
		telefono_principal_est: {
			digits: true,
			minlength: 7,
			maxlength: 7,
		},
		prefijo_secundario_est: {
			digits: true,
			minlength: 4,
			maxlength: 4,
		},
		telefono_secundario_est: {
			digits: true,
			minlength: 7,
			maxlength: 7,
		},

		impedimento: {
			minlength: 3,
			maxlength: 120,
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
		if (count_form_1 == 6) {
			$("#boton_siguiente").fadeIn();
			$("#boton_guardar").hide();
		}
		count_form_1 = count_form_1 - 1;
	}
	// Oculta las secciones
	$("#seccion1, #seccion2, #seccion3, #seccion4, #seccion5, #seccion6").hide();
	// limpia los indicadores de seccion
	$("#link1, #link2, #link3, #link4, #link5, #link6").removeClass("active");
	
	// Activa la seccion actual y su indicador
	$("#seccion" + count_form_1).fadeIn();
	$("#link" + count_form_1).addClass("active");
});


$("#boton_siguiente").click(function() {
	if ($("#formulario_estudiantes").valid()) {
		if (count_form_1 < 6) {
			count_form_1 = count_form_1 + 1;
		}
		// Oculta las secciones
		$("#seccion1, #seccion2, #seccion3, #seccion4, #seccion5, #seccion6").hide();
		// limpia los indicadores de seccion
		$("#link1, #link2, #link3, #link4, #link5, #link6").removeClass("active");
		
		// Activa la seccion actual y su indicador
		$("#seccion" + count_form_1).fadeIn();
		$("#link" + count_form_1).addClass("active");
		if (count_form_1 == 6) {
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
	$("#seccion1, #seccion2, #seccion3, #seccion4, #seccion5, #seccion6").fadeIn();
	if ($("#formulario_estudiantes").valid()) {
		$("#formulario_estudiantes").submit();
	}
	else {
		// Muestra un mensaje de alerta para que el usuario revise los campos que le falten o sean invalidos
		Swal.fire(
			'Atención',
			'Faltan campos por llenar <br><br> <span class="form-text">Verifiquelos antes de continuar.</span>',
			'info'
		);
	}
	$("#seccion1, #seccion2, #seccion3, #seccion4, #seccion5").hide();
});

