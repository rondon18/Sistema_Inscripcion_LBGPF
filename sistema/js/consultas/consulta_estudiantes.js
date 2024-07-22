	//Datatables estudiantes
	$(document).ready( function () {
		var table = $('#estudiantes').DataTable({
			
			"order": [],
			"pagingType": "full",
			// "deferData": true,
			// "deferRender": false,
			// "processingIndicator": '<div class="loading">Cargando...</div>',
			"language": {
				"url": "../../js/datatables-español.json",
        searchPlaceholder: "Escriba aquí para filtrar los registros mostrados"
			},
			
			dom: '<"nav nav-fill mb-2"<"w-xs-100"B><"small ms-auto d-none d-md-inline-block"l><"small ms-md-4 w-auto"f>>rt<".nav"<"small mx-auto m-md-0"i><"w-xs-100 w-sm-100 mx-auto mx-md-0 mt-2 mt-md-0 ms-md-auto"p>>',

			buttons: [
				
				// Botones de exportación a excel
				{
						// Reporte general de estudiantes
							className: 		'btn btn-sm btn-success',
							extend: 		'excelHtml5',
							text: 			'<span class="m-0 d-none d-sm-inline">Generar reporte</span><i class="fas fa-lg fa-file-excel mb-1 mb-sm-0 ms-sm-2"></i>',
							exportOptions: {
								columns: 	':not(:last-child)',
							},
							autoFilter: true,
							filename: 	'Reporte de estudiantes',
							sheetName: 	'Reporte de estudiantes',
							messageTop: 'Reporte de estudiantes',
				},

				// filtros de consulta
				{
					className: 		'btn btn-sm btn-primary',
					text: '<span class="m-0 d-none d-sm-inline">Filtrar</span><i class="fas fa-lg fa-search mb-1 mb-sm-0 ms-sm-2"></i>',
	        action: function (e, node, config){
	        	$('#modal_filtros').modal('show')
	        },
				},

				// Boton parar ir a registrar un estudiante
				{
					className: 		'btn btn-sm btn-primary',
					text: 				'<span class="m-0 d-none d-sm-inline">Registrar estudiante</span><i class="fas fa-lg fa-user-plus mb-1 mb-sm-0 ms-sm-2"></i>',
					action: function ( e, dt, button, config ) {
						window.location = '../registrar_estudiante/paso_1.php';
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
                  return 'Detalles de '+ data[1];
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