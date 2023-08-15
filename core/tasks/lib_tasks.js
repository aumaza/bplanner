// ESTRUCTURA TABLE TICKETS

 $(document).ready(function(){
      
      $('#ticketsTable').DataTable({
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
                messageTop: 'Listado de Tickets',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: '<span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Exportar CSV',
                messageTop: 'Listado de Tickets',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: '<span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Exportar PDF',
                messageTop: 'Listado de Tickets',
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
 


// NEW TICKET
$(document).ready(function(){
    $('#new_ticket').click(function(){
        
        const form = document.querySelector('#fr_new_ticket_ajax');
        
        const nro_ticket = document.querySelector('#nro_ticket');
        const date_ticket = document.querySelector('#date_ticket');
        const modulo = document.querySelector('#module');
        const taker = document.querySelector('#taker');
        const request = document.querySelector('#require');
        const date_from = document.querySelector('#date_from');
        const date_to = document.querySelector('#date_to');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        
        formData.append('nro_ticket', nro_ticket.value);
        formData.append('date_ticket', date_ticket.value);
        formData.append('modulo', modulo.value);
        formData.append('taker', taker.value);
        formData.append('request', request.value);
        formData.append('date_from', date_from.value);
        formData.append('date_to', date_to.value);
               
         jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"../tasks/new_ticket.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                
                if(r == 1){
                    var mensaje = `<br><div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro Agregado Exitosamente.-</p></div>`;
                    document.getElementById('messageNewTicket').innerHTML = mensaje;
                    console.log(values);
                     $('#nro_ticket').val('');
                     $('#date_ticket').val('');
                     $('#module').val('');
                     $('#taker').val('');
                     $('#require').val('');
                     $('#date_from').val('');
                     $('#date_to').val('');
                     $('#nro_ticket').focus();
                    setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == -1){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Ocurrió un problema al intentar guardar el registro</p></div>`;
                        document.getElementById('messageNewTicket').innerHTML = mensaje;
                        console.log(formData);
                        $('#nro_ticket').val('');
                        $('#date_ticket').val('');
                        $('#module').val('');
                        $('#taker').val('');
                        $('#require').val('');
                        $('#date_from').val('');
                        $('#date_to').val('');
                        $('#nro_ticket').focus();
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 4){
                        var mensaje = `<br><div class="alert alert-warning alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Número de Ticket Existente</p></div>`;
                        document.getElementById('messageNewTicket').innerHTML = mensaje;
                        console.log(formData);
                        $('#nro_ticket').val('');
                        $('#date_ticket').val('');
                        $('#module').val('');
                        $('#taker').val('');
                        $('#require').val('');
                        $('#date_from').val('');
                        $('#date_to').val('');
                        $('#nro_ticket').focus();
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 5){
                        var mensaje = `<br><div class="alert alert-warning alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Verifique los campos sin completar</p></div>`;
                        document.getElementById('messageNewTicket').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 7){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Sin conexion a la base de datos</p></div>`;
                        document.getElementById('messageNewTicket').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    
            },
            
        });

        return false;
    });
});



// UPDATE TICKET
$(document).ready(function(){
    $('#update_ticket').click(function(){
        
        const form = document.querySelector('#fr_update_ticket_ajax');
        
        const modulo = document.querySelector('#module');
        const taker = document.querySelector('#taker');
        const request = document.querySelector('#require');
        const date_from = document.querySelector('#date_from');
        const date_to = document.querySelector('#date_to');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        
        formData.append('modulo', modulo.value);
        formData.append('taker', taker.value);
        formData.append('request', request.value);
        formData.append('date_from', date_from.value);
        formData.append('date_to', date_to.value);
        
               
         jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"../tasks/update_ticket.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                
                if(r == 1){
                    var mensaje = `<br><div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro Actualizado Exitosamente.-</p></div>
                                        <form action="#" method="POST">
                                            <button type="submit" class="btn btn-default btn-block" id="tickets" name="tickets"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Continuar</button>
                                        </form>`;
                    document.getElementById('messageUpdateTicket').innerHTML = mensaje;
                    console.log(values);
                        document.getElementById('nro_ticket').disabled = true;
                        document.getElementById('date_ticket').disabled = true;
                        document.getElementById('module').disabled = true;
                        document.getElementById('taker').disabled = true;
                        document.getElementById('require').disabled = true;
                        document.getElementById('date_from').disabled = true;
                        document.getElementById('date_to').disabled = true;
                        document.getElementById('state').disabled = true;
                        document.getElementById('update_ticket').disabled = true;
                        setTimeout(function() { $("#tickets").click(); }, 5000);
                    }
                    else if(r == -1){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Ocurrió un problema al intentar actualizar el registro</p></div>`;
                        document.getElementById('messageUpdateTicket').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 5){
                        var mensaje = `<br><div class="alert alert-warning alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Verifique los campos sin completar</p></div>`;
                        document.getElementById('messageUpdateTicket').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 7){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Sin conexion a la base de datos</p></div>`;
                        document.getElementById('messageUpdateTicket').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    
            },
            
        });

        return false;
    });
});



// DELETE TICKET
$(document).ready(function(){
    $('#delete_ticket').click(function(){
        
        const form = document.querySelector('#fr_delete_ticket_ajax');
        
        const id = document.querySelector('#id');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        
        formData.append('id', id.value);
                       
         jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"../tasks/delete_ticket.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                
                if(r == 1){
                    var mensaje = `<br><div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro Eliminado Exitosamente.-</p></div>
                                        <form action="#" method="POST">
                                            <button type="submit" class="btn btn-default btn-block" id="tickets" name="tickets"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Continuar</button>
                                        </form>`;
                    document.getElementById('messageDeleteTicket').innerHTML = mensaje;
                    console.log(values);
                    document.getElementById('delete_ticket').disabled = true;
                    setTimeout(function() { $("#tickets").click(); }, 5000);
                    }
                    else if(r == -1){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Ocurrió un problema al intentar actualizar el registro</p></div>`;
                        document.getElementById('messageDeleteTicket').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 5){
                        var mensaje = `<br><div class="alert alert-warning alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Error al obtener el ID del Ticket</p></div>`;
                        document.getElementById('messageDeleteTicket').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 7){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Sin conexion a la base de datos</p></div>`;
                        document.getElementById('messageDeleteTicket').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    
            },
            
        });

        return false;
    });
});