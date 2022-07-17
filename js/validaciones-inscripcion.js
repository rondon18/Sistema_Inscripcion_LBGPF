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

$('#Primer_Nombre_R').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');
$('#Segundo_Nombre_R').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');
$('#Primer_Apellido_R').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');
$('#Segundo_Apellido_R').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');
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
