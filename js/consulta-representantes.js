	//Datatables estudiantes
	$(document).ready( function () {
		var table = $('#representantes').DataTable({
			
			"order": [[ 0, "desc" ]],
			"pagingType": "full",
			"language": {"url": "../../js/datatables-español.json"},
			
			dom: 'Bfrtip',

			buttons: [{
				extend: 		'excelHtml5',
				autoFilter: true,
				className: 	'btn btn-secondary',
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

		});
	});