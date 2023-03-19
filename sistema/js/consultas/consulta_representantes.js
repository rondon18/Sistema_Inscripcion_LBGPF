	//Datatables estudiantes
	$(document).ready( function () {
		var table = $('#representantes').DataTable({
			
			"order": [[ 0, "desc" ]],
			"pagingType": "full",
			"language": {"url": "../../js/datatables-español.json"},
			
			dom: '<"nav nav-fill mb-2"<B><"ms-auto d-none d-md-inline-block"l><"ms-md-4"f>>rt<".nav"<"mx-auto m-md-0"i><"ms-md-auto"p>>',

			buttons: [{
				extend: 		'excelHtml5',
				autoFilter: true,
				className: 	'btn btn-sm btn-secondary',
				filename: 	'Reporte de representantes',
				sheetName: 	'Reporte de representantes',
				messageTop: 'Reporte de representantes',
				text: 			'Generar reporte en Excel <i class="fa-solid fa-file-excel fa-lg ms-2"></i>'
			}],
			
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