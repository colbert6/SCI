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
            var d = datos[i].cli_dni;
            HTML = HTML + '<td><a style="margin-right:4px" href="javascript:void(0)" '+ 
                        ' onclick="sel_cliente(\'' + id_c + '\',\'' + n + '\',\'' + d + '\')" class="btn btn-success">Add </a>';
            HTML = HTML + '</td>';
            HTML = HTML + '</tr>';
        }
        
        HTML = HTML + '</tbody></table>'
        $("#grillaCliente").html(HTML);
        $('#table2').dataTable();
        
        }, 'json');
    }


    $('#submit_form_tipo_equipo').on('click', function () {        //Enviar los datos del modal-form a guardar en el controlador
        var campos_form = ["abreviatura","descripcion"];//campos que queremos que se validen
        if(!validar_form(campos_form)){
            return false;            
        }

        id = $("#id").val();
        descripcion = $("#descripcion").val();
        abreviatura = $("#abreviatura").val();
        
        $.post(base_url+"tipo_equipo/guardar",{id:id,descripcion:descripcion,abreviatura:abreviatura},function(valor){
            if(!isNaN(valor)){
                alert('Guardado exitoso');
                
                $("#modal_tipo_equipo_agregar").modal('hide');
            }else{
                alert('guardar error:'+valor);
            }
        });
        
    } );

    $('#submit_form_marca').on('click', function () {        //Enviar los datos del modal-form a guardar en el controlador
        var campos_form = ["abreviatura","descripcion"];//campos que queremos que se validen
        if(!validar_form(campos_form)){
            return false;            
        }

        id = $("#id").val();
        descripcion = $("#descripcion").val();
        abreviatura = $("#abreviatura").val();
        
        $.post(base_url+"marca/guardar",{id:id,descripcion:descripcion,abreviatura:abreviatura},function(valor){
            
            if(!isNaN(valor)){
                alert('Guardado exitoso');
                
                $("#modal_marca_agregar").modal('hide');
            }else{
                alert('guardar error:'+valor);
            }
        });
        
    } );

    $('#submit_form_servicio').on('click', function () {        //Enviar los datos del modal-form a guardar en el controlador
        var campos_form = ["nombre_cliente","tipo_equipo","marca_equipo","modelo_equipo"];//campos que queremos que se validen
        
        if(!validar_form(campos_form)){
            return false;            
        }
        if($(".categoria_problema").length<=0){
            alert("Agrege un problema ");
            return false;
        }

        cli = $("#id_cliente").val();
        dni = $("#dni_cliente").val();
        t_equi = $("#tipo_equipo").val();
        mar = $("#marca_equipo").val();
        mod = $("#modelo_equipo").val();
        des = $("#descripcion_equipo").val();
        fec = $("#fecha").val();
        
        $.post(base_url+"servicio/guardar",{cli:cli,dni:dni,t_equi:t_equi,mar:mar,mod:mod,des:des,fec:fec},function(valor){
            if(!isNaN(valor)){
                var ser=parseInt(valor); 
                var id_accesorio =$(".id_accesorio"); 
                var obs_accessorio =$(".observacion_accesorio"); 
                for(var i=0; i<id_accesorio.length; i++) {
                    $.post(base_url+"servicio/guardar_accesorios",{ser:ser,acc:id_accesorio[i].value,obs:obs_accessorio[i].value},function(valor_a){
                        if(!isNaN(valor_a)){                            
                            alert('Guardado acces exitoso');                
                        }else{
                            alert('guardar acces error:'+valor_a);
                        }
                       
                    });
                }

                var categoria_problema =$(".categoria_problema"); 
                var descripcion_problema =$(".descripcion_problema"); 
                for(var i=0; i<categoria_problema.length; i++) {
                    $.post(base_url+"servicio/guardar_problemas",{ser:ser,cat:categoria_problema[i].value,obs:descripcion_problema[i].value,fec:fec},function(valor_p){
                        if(!isNaN(valor_p)){                            
                            alert('Guardado problema exitoso');                
                        }else{
                            alert('guardar problema error:'+valor_p);
                        }
                    });
                }

                $("#modal_confirmacion").modal({show: true});
                $('#cod_servicio').html(dni+' -'+valor);
                
            }else{
                alert('guardar error:'+valor);
            }
        });
        
    } );

    $('#aceptar_confirmacion').on('click', function () {   //Enviar los datos del modal-form a eliminar en el controlador
       window.location.href = base_url+"servicio/nuevo_servicio";
    } );
    
    $(".delete").live('click', function() { //eliminar accesorios
        alert('Eliminando!');
        var i = $(this).parent().parent().index();
        $("#Table_accesorios tr:eq(" + i + ")").remove();
    });

    $(".delete_problema").live('click', function() { //eliminar problemas
        alert('Eliminando!');
        var i = $(this).parent().index();
        $("#lista_problemas div:eq(" + i + ")").remove();
    });    


} );

    function sel_cliente(id_c,n,d) {
    
        $("#id_cliente").val(id_c);
        $("#dni_cliente").val(d);
        $("#nombre_cliente").val(n+' DNI:'+d);
        $('#modal_cliente_buscar').modal('hide');    
        $("#tipo_equipo").focus();
    }

    function sel_accesorio() {
    
        var i_acc=$("#nuevo_accesorio").val();
        var n_acc=$( "#nuevo_accesorio option:selected" ).text();
        var o_acc=$("#nuevo_accesorio_descripcion").val();
        
        if (i_acc=='') {
            return false;
        }else if($(".id_accesorio[value=" + i_acc + "]").length){
            alert("Ya ingresado ");
            return false;
        }

        var html = '<tr class="row_tmp">';
            html += '<td>';
            html += '   <input type="hidden" name="id_accesorio[]" class="id_accesorio" value="' + i_acc+ '" />' + n_acc;
            html += '</td>';
            html += '<td>';
            html += '   <input type="hidden" name="observacion_accesorio[]" class="observacion_accesorio" value="' + o_acc  + '" /> ' + o_acc;
            html += '</td>';
            html += '<td>';
            html += '    <a class="btn btn-danger delete"><i class="fa fa-trash"></i></a>';
            html += '</td>';
            html += '</tr>';

            $("#Table_accesorios").append(html);
            limpia_accesorio();
        
    }

    function sel_problema() {
        var i_cp=$("#nuevo_categoria_problema").val();
        var n_cp=$("#nuevo_categoria_problema option:selected" ).text();
        var o_cp=$("#nuevo_descripcion_problema").val();

        if (i_cp=='') {
            return false;
        }else if($(".categoria_problema[value=" + i_cp + "]").length){
            alert("Ya ingresado ");
            return false;
        }
        
         var html = '<div class="callout callout-danger">';
            html += '<input type="hidden" name="categoria_problema" class="categoria_problema" value="'+i_cp+'"">';
            html += '<input type="hidden" name="descripcion_problema[]" class="descripcion_problema" value="'+o_cp+'"">';
            html += '<h4>'+n_cp+'</h4>';
            html += '<p>'+o_cp+'</p>';
            html += '<a class="btn btn-danger delete_problema"><i class="fa fa-trash"></i></a>';            
            html += '</div>';

        $("#lista_problemas").append(html);
        limpia_problema();
    }

    function prueba(){
        var elementos =$(".categoria_problema");
 
        for(var i=0; i<elementos.length; i++) {
          alert(" Elemento: " + elementos[i].value );
        }
    }

    function limpia_accesorio(){
        $("#nuevo_accesorio").val('');
        $("#nuevo_accesorio_descripcion").val('');
    }

    function limpia_problema(){
        $("#nuevo_categoria_problema").val('');
        $("#nuevo_descripcion_problema").val('');
    }