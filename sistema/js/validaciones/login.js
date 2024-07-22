$(document).ready(function() {
    $('#login').submit(function(e) {
        e.preventDefault();
        // or return false;
    });
});

$("#login").validate({
	rules:{
		nacionalidad: {
			required: true,
		},
		cedula: {
			digits: true,
			minlength: 7,
			maxlength: 8,
		},
		clave: {
			minlength: 5,
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

$(document).ready(function() {
  $("#cambiar_visibilidad").click(function() {

  	// Mostrar
    if ($("#contraseña").attr("type") === "password") {
      $("#contraseña").attr("type", "text");
      $("#cambiar_visibilidad").toggleClass("active");
      $("#vis_icon").toggleClass("fa-eye-slash");
      $("#vis_icon").toggleClass("fa-eye");
    }
    // Ocultar
    else {
      $("#contraseña").attr("type", "password");
      $("#cambiar_visibilidad").toggleClass("active");
      $("#vis_icon").toggleClass("fa-eye");
      $("#vis_icon").toggleClass("fa-eye-slash");
    }
  });
})

$(document).ready(function() {
$('#cambiar_visibilidad').on('mouseout', function() {
  $(this).tooltip('hide');
});
});

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})