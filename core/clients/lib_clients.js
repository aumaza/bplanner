// ESTRUCTURA TABLE CLIENTES

 $(document).ready(function(){
      
      $('#clientsTable').DataTable({
        "order": [[0, "asc"]],
        "responsive":     true,
        "scrollY":        "300px",
        "scrollX":        true,
        "scrollCollapse": true,
        "paging":         true,
        "deferRender": true,
        "dom":  "Bfrtip",
        buttons: [
            
            {
                extend: 'excel',
                text: '<span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Exportar Excel',
                messageTop: 'Listado de Clientes',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: '<span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Exportar CSV',
                messageTop: 'Listado de Clientes',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: '<span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Exportar PDF',
                messageTop: 'Listado de Clientes',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'print', 
                text: '<span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '8pt' );
                                                
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                messageTop: 'Listado de Clientes',
                autoPrint: false,
                exportOptions: {
                    columns: ':visible',
                }
                
            },
            
              'colvis'
        ],
        columnDefs: [ {
            targets: -1,
            visible: true
        } ],
        "fixedColumns": true,
        "language":{
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Buscar:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
      }
    });
         
    });