// ESTRUCTURA TABLE TICKETS TRACKER

 $(document).ready(function(){
      
      $('#trackTable').DataTable({
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
                text: 'Export Excel',
                messageTop: 'Listado de Tickets',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: 'Export CSV',
                messageTop: 'Listado de Tickets',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: 'Export PDF',
                messageTop: 'Listado de Tickets',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'print', 
                text: 'Imprimir',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '8pt' );
                                                
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                messageTop: 'Listado de Tickets',
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

 // INSERTAR NUEVO REGISTRO DE AVANCE DE TICKET
$(document).ready(function(){
    $('#new_advance').click(function(){
        
        const form = document.querySelector('#fr_new_advance_ticket_ajax');
        
        const nro_ticket = document.querySelector('#nro_ticket');
        const id_ticket = document.querySelector('#id_ticket');
        const advance = document.querySelector('#advance');
        const cant_hours = document.querySelector('#cant_hours');
        const state = document.querySelector('#state');
        const files = document.querySelector('#files');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        //console.log(values);
        
        formData.append('nro_ticket', nro_ticket.value);
        formData.append('id_ticket', id_ticket.value);
        formData.append('advance', advance.value);
        formData.append('cant_hours', cant_hours.value);
        formData.append('state', state.value);
        
        Array.from(files).forEach(file => {
            formData.append('files', file);
        });
        
               
         jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"../tasks/new_advance.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                if(r == 1){
                    var mensaje = `<br><div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Avance Agregado Exitosamente</p></div>`;
                        document.getElementById('messageNewTrack').innerHTML = mensaje;
                         $('#advance').disabled = true;
                         $('#cant_hours').disabled = true;
                         $('#state').disabled = true;
                         $('#files').disabled = true;
                         console.log(values);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == -1){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Ocurrió un problema al intentar agregar el Avance</p></div>`;
                        document.getElementById('messageNewTrack').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == -2){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> No se ha podido actualizar el estado del Ticket</p></div>`;
                        document.getElementById('messageNewTrack').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 3){
                        var mensaje = `<br><div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> El directorio de destino no posee permisos de escritura [ CONTACTE AL ADMINISTRADOR ]</p></div>`;
                        document.getElementById('messageNewTrack').innerHTML = mensaje;
                        console.log(values);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 4){
                        var mensaje = `<br><div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Sólo se permiten archivos PNG, JPG, DOCX, DOC, ODT, XLSX, XLS</p></div>`;
                        document.getElementById('messageNewTrack').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 7){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Sin conexion a la base de datos</p></div>`;
                        document.getElementById('messageNewTrack').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 5){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Hay campos sin completar</p></div>`;
                        document.getElementById('messageNewTrack').innerHTML = mensaje;
                        console.log(values);
                        setTimeout(function() { $(".close").click(); }, 5000);
                    }
                    
                                
                    
                    else if(r == ''){
                        //console.log(formData);
                    }
            },
            
        });

        return false;
    });
});