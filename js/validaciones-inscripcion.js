/****** Creado por Franz Gualambo ***************/
/***** Email : gualambo@gmail.com  *****************/

 (function ( a ) {
      a.fn.validarIngreso=function(b){
      a(this).on({keypress:function(a){
      var c=a.which,
      d=a.keyCode,
      e=String.fromCharCode(c).toLowerCase(),
      f=b;
  (-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()
  }})}
}( jQuery ));

$('#Primer_Nombre_R, #Segundo_Nombre_R, #Primer_Apellido_R, #Segundo_Apellido_R').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');
$('#Cédula_R').validarIngreso('0123456789');


$('#Prefijo_Principal_R').validarIngreso('0123456789');
$('#Teléfono_Principal_R').validarIngreso('0123456789');
$('#Prefijo_Secundario_R').validarIngreso('0123456789');
$('#Teléfono_Secundario_R').validarIngreso('0123456789');
$('#Prefijo_Auxiliar_R').validarIngreso('0123456789');
$('#Teléfono_Auxiliar_R').validarIngreso('0123456789');


$('#Código_Carnet_Patria_R').validarIngreso('0123456789');
$('#Serial_Carnet_Patria_R').validarIngreso('0123456789');

$('#Nro_Cuenta').validarIngreso('0123456789');
$('#Prefijo_Trabajo_R').validarIngreso('0123456789');
$('#Teléfono_Trabajo_R').validarIngreso('0123456789');
$('#Remuneración_R').validarIngreso('0123456789');

$('#Primer_Nombre_Aux').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');
$('#Segundo_Nombre_Aux').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');
$('#Primer_Apellido_Aux').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');
$('#Segundo_Apellido_Aux').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');

$('#Cédula_Aux').validarIngreso('0123456789');
$('#Prefijo_Principal_Aux').validarIngreso('0123456789');
$('#Télefono_Principal_Aux').validarIngreso('0123456789');
$('#Prefijo_Secundario_Aux').validarIngreso('0123456789');
$('#Télefono_Secundario_Aux').validarIngreso('0123456789');
$('#Prefijo_Auxiliar_Aux').validarIngreso('0123456789');
$('#Teléfono_Auxiliar_Aux').validarIngreso('0123456789');

$('#Relación_Auxiliar').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');


//Deshabilita area de trabajo si marca no
$(document).ready(function(){
  $('#FormularioRepresentante').change(function(){
    selected_value = $("input[name='Representante_Trabaja']:checked").val();
    if (selected_value == "Si") {
      $("#Datos_Trabajo").prop("disabled", false);;
    }
    else if (selected_value == "No"){
      $("#Datos_Trabajo").prop("disabled", true);;
    }
  });
});

$(document).ready(function(){
  $("#link1, #link2, #link3, #link4, #link5").click(function(){
    $("#seccion1, #seccion2, #seccion3, #seccion4, #seccion5").hide();
    $("#link1, #link2, #link3, #link4, #link5").removeClass("active");
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

$(document).ready(function(){
  $("#link3").click(function(){
    $("#seccion3").show();
    $("#link3").addClass("active");
  });
});

$(document).ready(function(){
  $("#link4").click(function(){
    $("#seccion4").show();
    $("#link4").addClass("active");
  });
});

$(document).ready(function(){
  $("#link5").click(function(){
    $("#seccion5").show();
    $("#link5").addClass("active");
  });
});

//validacion y envio
$.fn.isValid = function(){
  return this[0].checkValidity()
}

$( "#B_enviar" ).click(function() {
     //Revela todas las secciones para prevenir el problema con los campos no visibles
  $("#seccion1, #seccion2, #seccion3, #seccion4, #seccion5").show();
  $("#link1, #link2, #link3, #link4, #link5").removeClass("active");

  if ($( "#FormularioRepresentante").isValid() == true) {
     // Envia el formulario si es valido
     $("#seccion2, #seccion3, #seccion4, #seccion5").hide();
     $("#link1").addClass("active");
          $( "#FormularioRepresentante" ).submit();
  }
  else { 
     //Da un mensaje de alerta si no es valido y retorna a la seccion de datos de contacto
     Swal.fire(
      'Atención',
      'Faltan campos por llenar <br><br> <span class="form-text">Será regresado a la primera sección, pero se mantendrán los cambios.</span>',
      'info'
    );
     $("#seccion2, #seccion3, #seccion4, #seccion5").hide();
     $("#link1").addClass("active");
  }
});
