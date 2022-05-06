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


//
// LOGIN
//

$(document).ready(function(){
  $("#cedula").on('paste', function(e){
    e.preventDefault();
    Swal.fire(
      'Error',
      'Esa acción esta prohibida',
      'warning'
    )
  })

  $("#cedula").on('copy', function(e){
    e.preventDefault();
    Swal.fire(
      'Error',
      'Esa acción esta prohibida',
      'warning'
    )
  })
  $('#cedula').validarIngreso('0123456789');
});
$(document).ready(function(){
  $("#clave").on('paste', function(e){
    e.preventDefault();
    Swal.fire(
      'Error',
      'Esa acción esta prohibida',
      'warning'
    )
  })

  $("#clave").on('copy', function(e){
    e.preventDefault();
    Swal.fire(
      'Error',
      'Esa acción esta prohibida',
      'warning'
    )
  })
})

//
// LOGIN
//

//Registrar usuario

$('#Primer_Nombre_U').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#Segundo_Nombre_U').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#Primer_Apellido_U').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#Segundo_Apellido_U').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#Cédula_U').validarIngreso('0123456789');

$('#Primer_Nombre_R').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#Segundo_Nombre_R').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#Primer_Apellido_R').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#Segundo_Apellido_R').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#Cédula_R').validarIngreso('0123456789');


$('#Prefijo_Principal_R').validarIngreso('0123456789');
$('#Teléfono_Principal_R').validarIngreso('0123456789');
$('#Prefijo_Secundario_R').validarIngreso('0123456789');
$('#Teléfono_Secundario_R').validarIngreso('0123456789');
$('#Prefijo_Auxiliar_R').validarIngreso('0123456789');
$('#Teléfono_Auxiliar_R').validarIngreso('0123456789');



$('#Codigo_Carnet_Patria').validarIngreso('0123456789');
$('#Serial_Carnet_Patria').validarIngreso('0123456789');
$('#Nro_Cuenta').validarIngreso('0123456789');
//$('#Segundo_Apellido_U').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');

/*
Nro_Cuenta
Empleo_R
Prefijo_Trabajo_R
Teléfono_Trabajo_R
Lugar_Trabajo_R
Remuneración
seccion5
Primer_Nombre_Aux
Segundo_Nombre_Aux
Primer_Apellido_Aux
Segundo_Apellido_Aux
Cédula_Aux
Correo_electrónico_Aux
Prefijo_Principal_Aux
Télefono_Principal_Aux
Prefijo_Secundario_Aux
Télefono_Secundario_Aux
Prefijo_Auxiliar_Aux
Teléfono_Auxiliar_Aux
Direccion_Aux
Relación_Auxiliar
*/


$(function(){
  //Para escribir solo letras
  //$('#cedula').validarIngreso('0123456789');

  //$('#cedula').validarIngreso(' abcdefghijklmnñopqrstuvwxyzáéiou');
  //Para escribir solo numeros
//
});
