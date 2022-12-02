$(document).ready(function(){
  $("#link1, #link2, #link3, #link4, #link5, #link6").click(function(){
    $("#seccion1, #seccion2, #seccion3, #seccion4, #seccion5, #seccion6").hide();
    $("#link1, #link2, #link3, #link4, #link5, #link6").removeClass("active");
  });
});

$(document).ready(function(){
  $("#link1").click(function(){
    $("#seccion1").show();
    $("#link1").addClass("active");
  });
});

$(document).ready(function(){
  $("#link2").click(function(){
    $("#seccion2").show();
    $("#link2").addClass("active");
  });
});


//validacion y envio
$.fn.isValid = function(){
  return this[0].checkValidity()
}

// Envío de formulario del usuario
$( "#B_enviar" ).click(function() {
     //Revela todas las secciones para prevenir el problema con los campos no visibles
  $("#seccion1, #seccion2").show();
  $("#link1, #link2").removeClass("active");

  if ($( "#registro").isValid() == true) {
     // Envia el formulario si es valido
     $("#seccion2").hide();
     $("#link1").addClass("active");
          $( "#registro" ).submit();
  }
  else { 
     //Da un mensaje de alerta si no es valido y retorna a la seccion de datos de contacto
     Swal.fire(
      'Atención',
      'Faltan campos por llenar <br><br> <span class="form-text">Será regresado a la primera sección, pero se mantendrán los cambios.</span>',
      'info'
    );
     $("#seccion2").hide();
     $("#link1").addClass("active");
  }
});