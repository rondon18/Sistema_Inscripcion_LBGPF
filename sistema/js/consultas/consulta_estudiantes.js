	//Datatables estudiantes
	$(document).ready( function () {
		var table = $('#estudiantes').DataTable({
			
			// "order": [[ 5, "asc" ],[ 0, "desc" ],],
			"order": [],
			"pagingType": "full",
			"language": {"url": "../../js/datatables-español.json"},
			


			dom: '<"nav nav-fill mb-2"<B><"ms-auto d-none d-md-inline-block"l><"ms-md-4"f>>rt<".nav"<"mx-auto m-md-0"i><"ms-md-auto"p>>',

			buttons: [
				
				// Botones de exportación a excel
				{
						// Reporte general de estudiantes
							className: 		'btn btn-sm btn-success',
							extend: 		'excelHtml5',
							text: 			'Generar reporte <i class="fas fa-lg fa-file-excel me-2"></i>',
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
					text: 'Filtrar<i class="fas fa-lg fa-search ms-2"></i>',
	        action: function (e, node, config){
	        	$('#modal_filtros').modal('show')
	        },
				},

				// Boton parar ir a registrar un estudiante
				{
					className: 		'btn btn-sm btn-primary',
					text: 				'Registrar estudiante<i class="fas fa-lg fa-user-plus ms-2"></i>',
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