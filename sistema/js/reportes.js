// 
// Desactiva los checkbox de salud si se marca que no desea incluir datos de salud
// 

$(document).ready(function(){
	$('#reporte_estudiantes').change(function(){

		selected_value = $("input[name='incluir_d_salud']:checked").val();
		if (selected_value == "on") {
			$("#datos_salud").prop("disabled", false);
			$("#datos_salud").fadeIn();
		}
		else {
			$("#datos_salud").prop("disabled", true);
			$("#datos_salud").fadeOut();
		}
	});
});


// 
// Cuenta el nuero de checkbox de la parte de salud y deshabilita el boton si no hay ninguno
// 

$(document).ready(function(){
	$('#reporte_estudiantes').change(function(){

		// si el fieldset esta desabilitado ignora el número de checks
		if ($("#datos_salud:disabled").length == 0) {
			
			if ($("input.filtros-salud:checked").length >= 1) {
				$("#b_r_estudiantes").prop("disabled", false);
			}

			else {
				$("#b_r_estudiantes").prop("disabled", true);
			}

		}

		else {
			$("#b_r_estudiantes").prop("disabled", false);
		}

	});
});