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

$('#Primer_Nombre_Est').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');
$('#Segundo_Nombre_Est').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');
$('#Primer_Apellido_Est').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');
$('#Segundo_Apellido_Est').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');
$('#Cédula_Est').validarIngreso('0123456789');
$('#Prefijo_Principal_Est').validarIngreso('0123456789');
$('#Teléfono_Principal_Est').validarIngreso('0123456789');
$('#Prefijo_Secundario_Est').validarIngreso('0123456789');
$('#Teléfono_Secundario_Est').validarIngreso('0123456789');
$('#Año_Repitente').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');
$('#Materias_Pendientes').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');
$('#Con_Quién_Vive').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');

$('#Código_Carnet_Patria_Est').validarIngreso('0123456789');
$('#Serial_Carnet_Patria_Est').validarIngreso('0123456789');

$('#Índice').validarIngreso('0123456789');
$('#Talla').validarIngreso('0123456789');
$('#Peso').validarIngreso('0123456789');
$('#C_Braquial').validarIngreso('0123456789');

$('#Cual_Enfermedad').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');
$('#Alergias').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');

$('#Nro_Carnet_Discapacidad').validarIngreso('0123456789');
$('#País').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéíóú ');
