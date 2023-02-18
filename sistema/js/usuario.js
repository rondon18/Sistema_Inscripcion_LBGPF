$(document).ready(function() {
    $('#registro').submit(function(e) {
        e.preventDefault();
        // or return false;
    });
});

$("#registro").validate({
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