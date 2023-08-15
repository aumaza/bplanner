// ESTRUCTURA TABLE PROJECTS

 $(document).ready(function(){
      
      $('#projectsTable').DataTable({
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
                messageTop: 'Listado de Proyectos',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: '<span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Exportar CSV',
                messageTop: 'Listado de Proyectos',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: '<span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Exportar PDF',
                messageTop: 'Listado de Proyectos',
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
                messageTop: 'Listado de Proyectos',
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


 // ========================================================================== //
 // PERSISTENCIA

// NEW PROJECT
$(document).ready(function(){
    $('#add_project').click(function(){
        
        const form = document.querySelector('#form_add_project_ajax');
        
        const project = document.querySelector('#project');
        const client = document.querySelector('#client');
        const project_leader = document.querySelector('#project_leader');
        const functional = document.querySelector('#functional');
        const technologies = document.querySelector('#technologies');
        const requeriments = document.querySelector('#requeriments');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        
        formData.append('project', project.value);
        formData.append('client', client.value);
        formData.append('project_leader', project_leader.value);
        formData.append('functional', functional.value);
        formData.append('technologies', technologies.value);
        formData.append('requeriments', requeriments.value);
               
         jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"../projects/new_project.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                
                if(r == 1){
                    var mensaje = `<br><div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro Agregado Exitosamente.-</p></div>`;
                    document.getElementById('messageNewProject').innerHTML = mensaje;
                    console.log(values);
                     $('#project').val('');
                     $('#client').val('');
                     $('#project_leader').val('');
                     $('#functional').val('');
                     $('#technologies').val('');
                     $('#requeriments').val('');
                     $('#project').focus();
                    setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == -1){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Ocurrió un problema al intentar guardar el registro</p></div>`;
                        document.getElementById('messageNewProject').innerHTML = mensaje;
                        console.log(formData);
                        $('#project').val('');
                         $('#client').val('');
                         $('#project_leader').val('');
                         $('#functional').val('');
                         $('#technologies').val('');
                         $('#requeriments').val('');
                         $('#project').focus();
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 5){
                        var mensaje = `<br><div class="alert alert-warning alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Verifique los campos sin completar</p></div>`;
                        document.getElementById('messageNewProject').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 7){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Sin conexion a la base de datos</p></div>`;
                        document.getElementById('messageNewProject').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    
            },
            
        });

        return false;
    });
});


// UPDATE PROJECT
$(document).ready(function(){
    $('#edit_project').click(function(){
        
        const form = document.querySelector('#form_edit_project_ajax');
        
        const id = document.querySelector('#id');
        const project = document.querySelector('#project');
        const client = document.querySelector('#client');
        const project_leader = document.querySelector('#project_leader');
        const functional = document.querySelector('#functional');
        const technologies = document.querySelector('#technologies');
        const requeriments = document.querySelector('#requeriments');
        const status = document.querySelector('#status');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        
        formData.append('id', id.value);
        formData.append('project', project.value);
        formData.append('client', client.value);
        formData.append('project_leader', project_leader.value);
        formData.append('functional', functional.value);
        formData.append('technologies', technologies.value);
        formData.append('requeriments', requeriments.value);
        formData.append('status', status.value);
               
         jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"../projects/update_project.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                
                if(r == 1){
                    var mensaje = `<br><div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro Actualizado Exitosamente.-</p></div>`;
                    document.getElementById('messageEditProject').innerHTML = mensaje;
                    console.log(values);
                     $('#project').val('');
                     $('#client').val('');
                     $('#project_leader').val('');
                     $('#functional').val('');
                     $('#technologies').val('');
                     $('#requeriments').val('');
                     $('#status').val('');
                     $('#project').focus();
                    setTimeout(function() { $(".close").click(); }, 4000);

                    var form = $('<form action="#" method="post">' +
                      '<input type="hidden" name="projects" />' +
                      '</form>');
                    $('body').append(form);
                    form.submit();

                    }
                    else if(r == -1){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Ocurrió un problema al intentar actualizar el registro</p></div>`;
                        document.getElementById('messageEditProject').innerHTML = mensaje;
                        console.log(formData);
                        $('#project').val('');
                         $('#client').val('');
                         $('#project_leader').val('');
                         $('#functional').val('');
                         $('#technologies').val('');
                         $('#requeriments').val('');
                         $('#status').val('');
                         $('#project').focus();
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 5){
                        var mensaje = `<br><div class="alert alert-warning alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Verifique los campos sin completar</p></div>`;
                        document.getElementById('messageEditProject').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 7){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Sin conexion a la base de datos</p></div>`;
                        document.getElementById('messageEditProject').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    
            },
            
        });

        return false;
    });
});