// Deja una ventana de 10 minutos por si el usuario deja el equipo por momentos

var minutos = 15;
var segundos = minutos * 60;

var inactivityTime = segundos * 1000; 
var timeoutId;

function resetTimer() {
  clearTimeout(timeoutId);
  timeoutId = setTimeout(function() {
  	// console.log('sesion cerrada');

    Swal.fire({
      title: 'Su sesión será cerrada por inactividad',
      timer: 3000,
      timerProgressBar: true,
      icon: 'warning',
      showCancelButton: false,
      showConfirmButton: false,
      didClose: () => {
        window.open('/Sistema_Inscripcion_LBGPF/sistema/controladores/logout.php','_top');
      },
    });

    // hacer algo cuando el usuario esté inactivo
  }, inactivityTime);
}

// Restablece el conteo si el usuario hace alguna acción
$(document).on('mousemove keydown scroll', function() {
  resetTimer();
});				
