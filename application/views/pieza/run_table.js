$(document).ready(function() {
    var base_url = $("#base_url").val();
    var table =$('#tab').DataTable( {

        "processing": true,
        "ajax": {
            "url": base_url+"pieza/cargar_datos/",
            "type": "POST"
        },
        "columns": [
            { "data": "pie_id" },
            { "data": "pie_nombre" },
            { "data": "pie_descripcion" },
            { "data": "tipie_nombre" },
            { "data": "pie_estado" },  
            {
                "className":      'editar-data',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            {
                "className":      'eliminar-data',
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
    
    $('#nuevo_modal').on('click', function () {      //Limpiar los datos del modal-form
        $("#id").val('');
        $("#nombre").val('');
        $("#descripcion").val('');
        $("#tipo_pieza").val('');
    } );

    $('#tab tbody').on('click', 'td.editar-data', function () { //Agregar los datos correspondientes al modal-form    
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        $("#id").val(row.data().pie_id);
        $("#nombre").val(row.data().pie_nombre);
        $("#descripcion").val(row.data().pie_descripcion);
        $("#tipo_pieza").val(row.data().tipie_id);
        $("#modal_form").modal({show: true});
       
    } );

    $('#tab tbody').on('click', 'td.eliminar-data', function () { //Agregar los datos correspondientes al modal-delete
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        $("#modal_delete").modal({show: true});
        $("#id_dato_eliminar").val(row.data().pie_id);
        $('#desc_dato_eliminar').html(row.data().pie_nombre);

    } );

    $('#submit_form').on('click', function () {        //Enviar los datos del modal-form a guardar en el controlador
        var campos_form = ["nombre","descripcion","tipo_pieza"];//campos que queremos que se validen
        if(!validar_form(campos_form)){
            return false;            
        }

        id = $("#id").val();
        nombre = $("#nombre").val();
        descripcion = $("#descripcion").val();
        tipo_pieza = $("#tipo_pieza").val();
        
        $.post(base_url+"pieza/guardar",{id:id,nombre:nombre,descripcion:descripcion,tipo_pieza:tipo_pieza},function(valor){
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
        $.post(base_url+"pieza/eliminar",{id:id},function(valor){
            if(!isNaN(valor)){
                alert('Dato eliminado');
                table.ajax.reload(null, false);
                $("#modal_delete").modal('hide');
            }else{
                alert('eliminar error:'+valor);
            }
        });
    } );

} );
