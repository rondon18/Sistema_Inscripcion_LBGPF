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

$('#Primer_Nombre_Est').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#Segundo_Nombre_Est').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#Primer_Apellido_Est').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#Segundo_Apellido_Est').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#Cedula_Est').validarIngreso('0123456789');
$('#Prefijo_Principal_Est').validarIngreso('0123456789');
$('#Teléfono_Principal_Est').validarIngreso('0123456789');
$('#Prefijo_Secundario_Est').validarIngreso('0123456789');
$('#Teléfono_Secundario_Est').validarIngreso('0123456789');
$('#Año_Repitente').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#Materias_Pendientes').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#Con_Quien_Vive').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');

$('#Codigo_Carnet_Patria').validarIngreso('0123456789');
$('#Serial_Carnet_Patria').validarIngreso('0123456789');

$('#Indice').validarIngreso('0123456789');
$('#Talla').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#Peso').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#C_Braquial').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#Talla_Pantalon').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#Talla_Camisa').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#Talla_Zapatos').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');

$('#Cual_Enfermedad').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#Alergias').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');

$('#Medicacion').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#Dieta_Especial').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
$('#Nro_Carnet_Discapacidad').validarIngreso('0123456789');
$('#País').validarIngreso('abcdefghijklmnñopqrstuvwxyzáéiou');
