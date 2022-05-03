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





$('#Segundo_Apellido_U').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#Segundo_Apellido_U').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#Segundo_Apellido_U').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');

Cédula_U
Fecha_Nacimiento_U
Correo_electrónico_U
seccion2




$(function(){
  //Para escribir solo letras
  //$('#cedula').validarIngreso('0123456789');

  //$('#cedula').validarIngreso(' abcdefghijklmnñopqrstuvwxyzáéiou');
  //Para escribir solo numeros
//
});
