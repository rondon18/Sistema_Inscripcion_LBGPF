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
  $("#Cédula").on('paste', function(e){
    e.preventDefault();
    Swal.fire(
      'Error',
      'Esa acción no esta permitida',
      'warning'
    )
  })

  $("#Cédula").on('copy', function(e){
    e.preventDefault();
    Swal.fire(
      'Error',
      'Esa acción no esta permitida',
      'warning'
    )
  })
  $('#Cédula').validarIngreso('0123456789');
});
$(document).ready(function(){
  $("#clave").on('paste', function(e){
    e.preventDefault();
    Swal.fire(
      'Error',
      'Esa acción no esta permitida',
      'warning'
    )
  })

  $("#clave").on('copy', function(e){
    e.preventDefault();
    Swal.fire(
      'Error',
      'Esa acción no esta permitida',
      'warning'
    )
  })
})

//
// LOGIN
//

//Registrar usuario

$('#Primer_Nombre_U').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');
$('#Segundo_Nombre_U').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');
$('#Primer_Apellido_U').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');
$('#Segundo_Apellido_U').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');
$('#Cédula_U').validarIngreso('0123456789');
