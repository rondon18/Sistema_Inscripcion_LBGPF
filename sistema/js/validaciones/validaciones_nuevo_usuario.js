
$.validator.addMethod("pwcheck", function(value, element) {
  return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/i.test(value);
}, "La contraseña debe tener al menos 8 caracteres y contener al menos una letra mayúscula, una letra minúscula, un número y un carácter especial (!@#$%^&*)");

jQuery.validator.addMethod("lettersonly", function(value, element) 
{
return this.optional(element) || /^[a-zA-ZñÑáéíóúÁÉÍÓÚ," "]+$/i.test(value);
}, "Solo caracteres alfabeticos y/o espacios, por favor.");

$("#formulario_usuario").validate({
	rules:{
		p_nombre_u: {
			lettersonly: true,
		},
		s_nombre_u: {
			lettersonly: true,
		},
		p_apellido_u: {
			lettersonly: true,
		},
		s_apellido_u: {
			lettersonly: true,
		},
		cedula_u: {
			digits: true,
		},
	
		respuesta_1: {
			minlength: 3,
			maxlength: 120,
		},
		respuesta_2: {
			minlength: 3,
			maxlength: 120,
		},
		clave: {
			pwcheck: true,
		},
	},
	onfocusout: function(element) {
		$('input[type="text"]:not(input[name="clave"]), input[type="email"], textarea').each(function(index, element) {
      // Convertir el contenido a mayúsculas
      element.value = element.value.toUpperCase();
    });
		this.element(element); // triggers validation
	},
	onkeyup: function(element, event) {
		$('input[type="text"]:not(input[name="clave"]), input[type="email"], textarea').each(function(index, element) {
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
		// console.log(count_form_1);
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
	if ($("#formulario_usuario").valid()) {
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
		// console.log(count_form_1);
		
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
	if ($("#formulario_usuario").valid()) {
		$("#formulario_usuario").submit();
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
