$(document).ready(function() {

    var base_url = $("#base_url").val();
    
    $('#cliente_buscar').on('click', function () {      //Limpiar los datos del modal-form
         $("#modal_cliente_buscar").modal({show: true});
         buscarCliente();
         //alert('as');
    } );

    
    function buscarCliente() {
    $("#grillaCliente").html('<div class="page-header"><img src="'+base_url+'img/ajax-loader.gif" /></div>');
    $.post(base_url + 'cliente/cargar_datos_seleccion', function(datos) {
        var HTML = '<table id="table2" class="table table-bordered table-striped" width="100%">' +
                '<thead>' +
                '<tr>' +
                '<th>Item</th>'+
                '<th>Dni</th>'+
                '<th>Nombre</th>'+
                '<th>Direccion</th>'+
                '<th>Telefono</th>'+
                '<th>Email</th>'+
                '<th>Seleccionar</th>'+
                '</tr>' +
                '</thead>' +
                '<tbody>';

        for (var i = 0; i < datos.length; i++) {
            HTML = HTML + '<tr>';
            HTML = HTML + '<td>'+(i+1)+'</td>';
            HTML = HTML + '<td>'+datos[i].cli_dni+'</td>';
            HTML = HTML + '<td>'+datos[i].cli_nombre+'</td>';
            HTML = HTML + '<td>'+datos[i].cli_direccion+'</td>';
            HTML = HTML + '<td>'+datos[i].cli_telefono+'</td>';
            HTML = HTML + '<td>'+datos[i].cli_email+'</td>';
            var id_c = datos[i].cli_id;
            var n = datos[i].cli_nombre;
            var d = datos[i].cli_dni
            HTML = HTML + '<td><a style="margin-right:4px" href="javascript:void(0)" '+
                        ' onclick="sel_cliente(\'' + id_c + '\',\'' + n + '\'' + d + '\')" class="btn btn-success">Add </a>';
            HTML = HTML + '</td>';
            HTML = HTML + '</tr>';
        }
        
        HTML = HTML + '</tbody></table>'
        $("#grillaCliente").html(HTML);
        $('#table2').dataTable();
        
        }, 'json');
    }

    


} );

    function sel_cliente(id_c,n,d) {
    
        $("#id_cliente").val(id_c);
        $("#nombre_cliente").val(n+' DNI:'+d);
        $('#modal_cliente_buscar').modal('hide');    
        $("#tipo_equipo").focus();
    }