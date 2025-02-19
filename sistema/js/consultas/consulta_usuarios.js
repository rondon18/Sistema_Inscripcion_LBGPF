	//Datatables estudiantes
	$(document).ready( function () {
		var table = $('#usuarios').DataTable({
			
			"order": [[ 0, "desc" ]],
			"pagingType": "full",
			"language": {
				"url": "../../js/datatables-español.json",
        searchPlaceholder: "Escriba aquí para filtrar los registros mostrados"
			},
			
			dom: '<"nav nav-fill mb-2"<"w-xs-100"B><"small ms-auto d-none d-md-inline-block"l><"small ms-md-4 w-auto"f>>rt<".nav"<"small mx-auto m-md-0"i><"w-xs-100 w-sm-100 mx-auto mx-md-0 mt-2 mt-md-0 ms-md-auto"p>>',

			buttons: [
			{
				extend: 		'excelHtml5',
				autoFilter: true,
				className: 	'btn btn-sm btn-secondary',
				filename: 	'Reporte de usuarios',
				sheetName: 	'Reporte de usuarios',
				messageTop: 'Reporte de usuarios',
				text: 			'Generar reporte en Excel <i class="fa-solid fa-file-excel fa-lg ms-2"></i>',
				exportOptions: {
					columns: 	':not(:last-child)',
				},
			},
			// Boton parar ir a registrar un estudiante
			{
				className: 		'btn btn-sm btn-secondary',
				text: 				'Registrar usuario<i class="fas fa-lg fa-user-plus ms-2"></i>',
				action: function ( e, dt, button, config ) {
					window.location = '../registrar_usuario/index.php';
				}         
			},
			],
			
			responsive: 	
			{
				// Modal responsive
				details: {
          display: $.fn.dataTable.Responsive.display.modal( {
              header: function ( row ) {
                  var data = row.data();
                  return 'Detalles de '+data[1];
              }
          } ),
          renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
              tableClass: 'table table-borderless table-striped '
          })
        }
      },

      "lengthMenu": [
				[5,10, 25],
				[5,10, 25],
			],
		});
	});