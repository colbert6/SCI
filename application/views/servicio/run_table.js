$(document).ready(function() {
    var base_url = $("#base_url").val();
    
    var table =$('#tab').DataTable( {
    

        "processing": true,
        "ajax": {
            "url": base_url+"servicio/cargar_datos/",
            "type": "POST"
        },
        "columns": [
            { "data": "ser_id"},
            { "data": "cli_nombre" },
            { "data": "ser_codigo" },
            { "data": "tipequ_abreviatura" },
            { "data": "mar_abreviatura" }, 
            { "data": "ser_modelo" },
            { "data": "ser_estado_servicio" },
            { "data": "ser_fecha_recepcion" },             
            {
                "className":      'detallar-data',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            {
                "className":      'solucionar-data',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            {
                "className":      'finalizar-data',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            }
        ],
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false,
        "oLanguage" :{
            'sProcessing':     'Cargando...',
            'sLengthMenu':     'Mostrar _MENU_ registros',
            'sZeroRecords':    'No se encontraron resultados',
            'sEmptyTable':     'Ningún dato disponible en esta tabla',
            'sInfo':           'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
            'sInfoEmpty':      'Mostrando registros del 0 al 0 de un total de 0 registros',
            'sInfoFiltered':   '(filtrado de un total de _MAX_ registros)',
            'sInfoPostFix':    '',
            'sSearch':         'Buscar:',
            'sUrl':            '',
            'sInfoThousands':  '',
            'sLoadingRecords': 'Cargando...',
            'oPaginate': {
                'sFirst':    'Primero',
                'sLast':     'Último',
                'sNext':     'Siguiente',
                'sPrevious': 'Anterior'
            },
            'oAria': {
                'sSortAscending':  ': Activar para ordenar la columna de manera ascendente',
                'sSortDescending': ': Activar para ordenar la columna de manera descendente'
            }
        },
        'aaSorting': [[ 0, 'asc' ]],//ordenar
        'iDisplayLength': 10,
        'aLengthMenu': [[5, 10, 20], [5, 10, 20]]
    } );

    $('#tab tbody').on('click', 'td.detallar-data', function () { //Agregar los datos correspondientes al modal-form
        
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        
        $("#codigo_servicio").val(row.data().ser_codigo);
        $("#detalle_servicio").removeClass('no_visible');
        $("#tabla_servicios").addClass('no_visible');

        $("#nombre_cliente").val(row.data().cli_nombre);
        $("#fecha").val(row.data().ser_fecha_recepcion);

        $("#tipo_equipo").val(row.data().tipequ_descripcion);
        $("#marca_equipo").val(row.data().mar_descripcion);
        $("#modelo_equipo").val(row.data().ser_modelo);
        $("#descripcion_equipo").val(row.data().ser_descripcion);

        $.post(base_url+"servicio/cargar_adicionales/"+row.data().ser_id,{accesorios:1},function(datos){            
            var html ;
            var data = JSON.parse(datos);
            for (var i = 0; i < data.length; i++) {
                html += '<tr class="row_tmp">';
                html += '<td>'+ data[i].pie_nombre +'</td>';
                html += '<td>'+ data[i].acc_observacion +'</td>';
                html += '</tr>';                
            }
            $("#Table_accesorios").append(html);
        });

        $.post(base_url+"servicio/cargar_adicionales/"+row.data().ser_id,{problemas:1},function(datos){            
            var html ;
            var data = JSON.parse(datos);
            for (var i = 0; i < data.length; i++) {
            html += '<div class="callout callout-danger">';
            html += '<h4>'+n_cp+'</h4>';
            html += '<p>'+o_cp+'</p>';            
            html += '</div>';                
            }
            $("#Table_accesorios").append(html);
        });



    } );

/*
    $('#tab tbody').on('click', 'td.eliminar-data', function () { //Agregar los datos correspondientes al modal-delete
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        $("#modal_delete").modal({show: true});
        $("#id_dato_eliminar").val(row.data().car_id);
        $('#desc_dato_eliminar').html(row.data().car_descripcion);

    } );

    $('#submit_form').on('click', function () {        //Enviar los datos del modal-form a guardar en el controlador
        var campos_form = ["abreviatura","descripcion"];//campos que queremos que se validen
        if(!validar_form(campos_form)){
            return false;            
        }

        id = $("#id").val();
        descripcion = $("#descripcion").val();
        abreviatura = $("#abreviatura").val();
        
        $.post(base_url+"cargo/guardar",{id:id,descripcion:descripcion,abreviatura:abreviatura},function(valor){
            if(!isNaN(valor)){
                alert('Guardado exitoso');
                table.ajax.reload(null, false);
                $("#modal_form").modal('hide');
            }else{
                alert('guardar error:'+valor);
            }
        });
        
    } );

    $('#delete_click').on('click', function () {   //Enviar los datos del modal-form a eliminar en el controlador
        var id = $("#id_dato_eliminar").val();
        $.post(base_url+"cargo/eliminar",{id:id},function(valor){
            if(!isNaN(valor)){
                alert('Dato eliminado');
                table.ajax.reload(null, false);
                $("#modal_delete").modal('hide');
            }else{
                alert('eliminar error:'+valor);
            }
        });
    } );*/

} );
