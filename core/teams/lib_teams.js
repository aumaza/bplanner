// ESTRUCTURA TABLE TEAMS

 $(document).ready(function(){
      
      $('#teamsTable').DataTable({
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
                messageTop: 'Miembros del Equipo',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: '<span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Exportar CSV',
                messageTop: 'Miembros del Equipo',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: '<span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Exportar PDF',
                messageTop: 'Miembros del Equipo',
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
                messageTop: 'Miembros del Equipo',
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

// ADD MEMBER
$(document).ready(function(){
    $('#new_member').click(function(){
        
        const form = document.querySelector('#fr_new_member_ajax');
        
        const id_project = document.querySelector('#id_project');
        const member = document.querySelector('#member');
        const functions = document.querySelector('#functions');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        
        formData.append('id_project', id_project.value);
        formData.append('member', member.value);
        formData.append('functions', functions.value);
               
         jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"../teams/new_member.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                
                if(r == 1){
                    var mensaje = `<br><div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro Agregado Exitosamente.-</p></div>`;
                    document.getElementById('messageNewMember').innerHTML = mensaje;
                    console.log(values);
                     $('#member').val('');
                     $('#functions').val('');
                     $('#member').focus();
                    setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == -1){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Ocurrió un problema al intentar guardar el registro</p></div>`;
                        document.getElementById('messageNewMember').innerHTML = mensaje;
                        console.log(formData);
                        $('#member').val('');
                        $('#functions').val('');
                        $('#member').focus();
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 5){
                        var mensaje = `<br><div class="alert alert-warning alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Verifique los campos sin completar</p></div>`;
                        document.getElementById('messageNewMember').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 7){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Sin conexion a la base de datos</p></div>`;
                        document.getElementById('messageNewMember').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 9){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> El proyecto ya cuenta con dicho miembro</p></div>`;
                        document.getElementById('messageNewMember').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    
            },
            
        });

        return false;
    });
});


// UPDATE MEMBER
$(document).ready(function(){
    $('#update_member').click(function(){
        
        const form = document.querySelector('#fr_update_member_ajax');
        
        const id_project = document.querySelector('#id_project');
        const id = document.querySelector('#id');
        const functions = document.querySelector('#functions');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        
        formData.append('id_project', id_project.value);
        formData.append('id', id.value);
        formData.append('functions', functions.value);
               
         jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"../teams/update_member.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                
                if(r == 1){
                    var mensaje = `<br><div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro Actualizado Exitosamente.-</p></div>`;
                    document.getElementById('messageUpdateMember').innerHTML = mensaje;
                    console.log(values);
                     
                    setTimeout(function() { $(".close").click(); }, 4000);

                        var form = $('<form action="#" method="post">' +
                          '<input type="hidden" name="id" value="'+id_project.value+'"/>' +
                          '<input type="hidden" name="team" />' +
                          '</form>');
                        $('body').append(form);
                        form.submit();

                    }
                    else if(r == -1){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Ocurrió un problema al intentar actualizar el registro</p></div>`;
                        document.getElementById('messageUpdateMember').innerHTML = mensaje;
                        console.log(formData);
                        
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 5){
                        var mensaje = `<br><div class="alert alert-warning alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Verifique los campos sin completar</p></div>`;
                        document.getElementById('messageUpdateMember').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 7){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Sin conexion a la base de datos</p></div>`;
                        document.getElementById('messageUpdateMember').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    
                    
            },
            
        });

        return false;
    });
});



// UPDATE MEMBER
$(document).ready(function(){
    $('#quitar_miembro').click(function(){
        
        const form = document.querySelector('#frm_quitar_miembro_ajax');
        
        const id = document.querySelector('#bookId');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        
        formData.append('id', id.value);
               
         jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"../teams/delete_member.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                
                if(r == 1){
                    var mensaje = `<br><div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro Eliminado Exitosamente.-</p></div>`;
                    document.getElementById('messageDeleteMember').innerHTML = mensaje;
                    console.log(values);
                     
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
                                            <p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Ocurrió un problema al intentar eliminar el registro</p></div>`;
                        document.getElementById('messageDeleteMember').innerHTML = mensaje;
                        console.log(formData);
                        
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 5){
                        var mensaje = `<br><div class="alert alert-warning alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Verifique los campos sin completar</p></div>`;
                        document.getElementById('messageDeleteMember').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 7){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Sin conexion a la base de datos</p></div>`;
                        document.getElementById('messageDeleteMember').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    
                    
            },
            
        });

        return false;
    });
});



$(document).ready(function(e) {
  $('#modalMemberErase').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data().id;
    $(e.currentTarget).find('#bookId').val(id);
  });
});