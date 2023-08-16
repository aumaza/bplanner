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


 // ========================================================================== //
 // PERSISTENCIA

// NEW CLIENT
$(document).ready(function(){
    $('#add_client').click(function(){
        
        const form = document.querySelector('#form_add_client_ajax');
        
        const razon_social = document.querySelector('#razon_social');
        const responsable = document.querySelector('#responsable');
        const direccion = document.querySelector('#direccion');
        const localidad = document.querySelector('#localidad');
        const provincia = document.querySelector('#provincia');
        const pais = document.querySelector('#pais');
        const cod_postal = document.querySelector('#cod_postal');
        const telefono = document.querySelector('#telefono');
        const email = document.querySelector('#email');
        const cuit_cuil = document.querySelector('#cuil_cuit');
        const myfile = document.querySelector('#myfile');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);

        
        formData.append('razon_social', razon_social.value);
        formData.append('responsable', responsable.value);
        formData.append('direccion', direccion.value);
        formData.append('localidad', localidad.value);
        formData.append('provincia', provincia.value);
        formData.append('pais', pais.value);
        formData.append('cod_postal', cod_postal.value);
        formData.append('telefono', telefono.value);
        formData.append('email', email.value);
        formData.append('cuit_cuil', cuit_cuil.value);
        formData.append('myfile', myfile.value[0]);
               
         jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"../clients/add_client.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                
                if(r == 1){
                    var mensaje = `<br><div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro Agregado Exitosamente.-</p></div>`;
                    document.getElementById('messageAddClient').innerHTML = mensaje;
                    console.log(values);
                     $('#razon_social').val('');
                     $('#responsable').val('');
                     $('#direccion').val('');
                     $('#localidad').val('');
                     $('#provincia').val('');
                     $('#pais').val('');
                     $('#cod_postal').val('');
                     $('#telefono').val('');
                     $('#email').val('');
                     $('#cuil_cuit').val('');
                     $('#myfile').val('');
                     $('#razon_social').focus();
                    setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == -1){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Ocurrió un problema al intentar guardar el registro</p></div>`;
                        document.getElementById('messageAddClient').innerHTML = mensaje;
                        console.log(formData);
                         $('#razon_social').val('');
                         $('#responsable').val('');
                         $('#direccion').val('');
                         $('#localidad').val('');
                         $('#provincia').val('');
                         $('#pais').val('');
                         $('#cod_postal').val('');
                         $('#telefono').val('');
                         $('#email').val('');
                         $('#cuil_cuit').val('');
                         $('#myfile').val('');
                         $('#razon_social').focus();
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 5){
                        var mensaje = `<br><div class="alert alert-warning alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Verifique los campos sin completar</p></div>`;
                        document.getElementById('messageAddClient').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 7){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Sin conexion a la base de datos</p></div>`;
                        document.getElementById('messageAddClient').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 3){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> ERROR...No se pudo subir el archivo</p></div>`;
                        document.getElementById('messageAddClient').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 9){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> ERROR...Sólo se permiten archivos vos formato JPG y PNG</p></div>`;
                        document.getElementById('messageAddClient').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    
            },
            
        });

        return false;
    });
});


// EDIT CLIENT
$(document).ready(function(){
    $('#edit_client').click(function(){
        
        const form = document.querySelector('#form_edit_client_ajax');
        
        const razon_social = document.querySelector('#razon_social');
        const responsable = document.querySelector('#responsable');
        const direccion = document.querySelector('#direccion');
        const localidad = document.querySelector('#localidad');
        const provincia = document.querySelector('#provincia');
        const pais = document.querySelector('#pais');
        const cod_postal = document.querySelector('#cod_postal');
        const telefono = document.querySelector('#telefono');
        const email = document.querySelector('#email');
        const cuit_cuil = document.querySelector('#cuil_cuit');
        const myfile = document.querySelector('#myfile');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);

        
        formData.append('razon_social', razon_social.value);
        formData.append('responsable', responsable.value);
        formData.append('direccion', direccion.value);
        formData.append('localidad', localidad.value);
        formData.append('provincia', provincia.value);
        formData.append('pais', pais.value);
        formData.append('cod_postal', cod_postal.value);
        formData.append('telefono', telefono.value);
        formData.append('email', email.value);
        formData.append('cuit_cuil', cuit_cuil.value);
        formData.append('myfile', myfile.value[0]);
               
         jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"../clients/update_client.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                
                if(r == 1){
                    var mensaje = `<br><div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registro Actualizado Exitosamente.-</p></div>`;
                    document.getElementById('messageUpdateClient').innerHTML = mensaje;
                    console.log(values);
                     $('#razon_social').val('');
                     $('#responsable').val('');
                     $('#direccion').val('');
                     $('#localidad').val('');
                     $('#provincia').val('');
                     $('#pais').val('');
                     $('#cod_postal').val('');
                     $('#telefono').val('');
                     $('#email').val('');
                     $('#cuil_cuit').val('');
                     $('#myfile').val('');
                     $('#razon_social').focus();
                    
                    setTimeout(function() { $(".close").click(); }, 4000);

                        var form = $('<form action="#" method="post">' +
                          '<input type="hidden" name="clients" />' +
                          '</form>');
                        $('body').append(form);
                        form.submit();

                    }
                    else if(r == -1){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Ocurrió un problema al intentar actualizar el registro</p></div>`;
                        document.getElementById('messageUpdateClient').innerHTML = mensaje;
                        console.log(formData);
                         $('#razon_social').val('');
                         $('#responsable').val('');
                         $('#direccion').val('');
                         $('#localidad').val('');
                         $('#provincia').val('');
                         $('#pais').val('');
                         $('#cod_postal').val('');
                         $('#telefono').val('');
                         $('#email').val('');
                         $('#cuil_cuit').val('');
                         $('#myfile').val('');
                         $('#razon_social').focus();
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 5){
                        var mensaje = `<br><div class="alert alert-warning alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Verifique los campos sin completar</p></div>`;
                        document.getElementById('messageUpdateClient').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 7){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Sin conexion a la base de datos</p></div>`;
                        document.getElementById('messageUpdateClient').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 3){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> ERROR...No se pudo subir el archivo</p></div>`;
                        document.getElementById('messageUpdateClient').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 9){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> ERROR...Sólo se permiten archivos vos formato JPG y PNG</p></div>`;
                        document.getElementById('messageUpdateClient').innerHTML = mensaje;
                        console.log(formData);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    
            },
            
        });

        return false;
    });
});