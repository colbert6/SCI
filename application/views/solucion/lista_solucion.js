$(document).ready(function() {

    var base_url = $("#base_url").val();
   
    $('#aceptar_confirmacion').on('click', function () {   //Enviar los datos del modal-form a eliminar en el controlador
       window.location.href = base_url+"solucion/nueva_solucion";
    } );
    
    $(".delete").live('click', function() { //eliminar accesorios
        alert('Eliminando!');
        var tab = $(this).parent().parent().parent().parent().attr("id");
        var i = $(this).parent().parent().index();
        var id_rep = $(this).attr("rep");
        $.post(base_url+'solucion/eliminarRepuesto',{rep_id:id_rep}, function(datos) {
            if(datos){
                console.log(datos);
                $(String("#"+tab+" tr:eq(" + i + ")")).remove();    
            }
        },"json");
        
    });


} );
    
    function eliminarSolucion(id,t) {
        var base_url = $("#base_url").val();
        $.post(base_url+'solucion/eliminar',{sol_id:id}, function(datos) {
            if (datos) {
                console.log(datos);
                alert('Eliminando!');    
                $(String("#sol"+t)).remove();
            }else{
                alert("error");
            };
        },"json");
    }
    function buscarRepuesto(tab) {
    
    var base_url = $("#base_url").val();
    $("#grillaRepuesto").html('<div class="page-header"><img src="'+base_url+'img/ajax-loader.gif" /></div>');
    $.post(base_url + 'pieza/cargar_datos_seleccion', function(datos) {
        var HTML = '<table id="table5" class="table table-bordered table-striped" width="100%">' +
                '<thead>' +
                '<tr>' +
                '<th>ITEM</th>'+
                '<th>NOMBRE</th>'+
                '<th>DESCRIPCION</th>'+
                '<th>Seleccionar</th>'+
                '</tr>' +
                '</thead>' +
                '<tbody>';

        for (var i = 0; i < datos.length; i++) {
            HTML = HTML + '<tr>';
            HTML = HTML + '<td>'+(i+1)+'</td>';
            HTML = HTML + '<td>'+datos[i].pie_nombre+'</td>';
            HTML = HTML + '<td>'+datos[i].pie_descripcion+'</td>';
            var id_pieza = datos[i].pie_id;
            var n = datos[i].pie_nombre;
            var d = datos[i].pie_descripcion;
            HTML = HTML + '<td><a style="margin-right:4px" href="javascript:void(0)" '+ 
                        ' onclick="sel_repuesto(\'' + id_pieza + '\',\'' + n + '\',\'' + d + '\',\'' + tab + '\')" class="btn btn-success">Add </a>';
            HTML = HTML + '</td>';
            HTML = HTML + '</tr>';
        }
        
        HTML = HTML + '</tbody></table>';
        
        $("#grillaRepuesto").html(HTML);
        $('#table5').dataTable();
        
        }, 'json');
    }

    function sel_repuesto(id,n,d,t) {
        var base_url = $("#base_url").val();
    
        if($(".id_repuesto"+t+"[value=" + id + "]").length){
            alert("Ya ingresado ");
            return false;
        }

        $.post(base_url+'solucion/guardar_repuesto',{sol:$(String("#sol"+t)).attr("sol"),pie:id}, function(datos) {
            console.log(datos);
            var html = '<tr class="row_tmp">';
            html += '<td>';
            html += '   <input type="hidden" name="id_repuesto'+t+'[]" class="id_repuesto'+t+'" value="' +id+ '" />' + n;
            html += '</td>';
            html += '<td>';
            html += '' + d;
            html += '</td>';
            html += '<td>';
            html += '    <a class="btn btn-danger delete"><i class="fa fa-trash"></i></a>';
            html += '</td>';
            html += '</tr>';

            $(String("#tabla_repuestos"+t)).append(html);

            $("#modal_repuesto_buscar").modal('hide');
        },"json");
        

        
        
    }
