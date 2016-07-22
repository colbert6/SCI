$(document).ready(function() {

    var base_url = $("#base_url").val();
    $('#servicio_buscar').on('click', function () {      //Limpiar los datos del modal-form
         $("#modal_servicio_buscar").modal({show: true});
         buscarServicio();
         //alert('as');
    } );
    $('#personal_buscar').on('click', function () {      //Limpiar los datos del modal-form
         $("#modal_personal_buscar").modal({show: true});
         buscarPersonal();
         //alert('as');
    } );

    /*$('#prs').on('click', function () {      //Limpiar los datos del modal-form
         alert("s");
         $("#modal_repuesto_buscar").modal({show: true});
         buscarRepuesto();
         //alert('as');
    } );*/

    function buscarServicio() {
    $("#grillaServicio").html('<div class="page-header"><img src="'+base_url+'img/ajax-loader.gif" /></div>');
    $.post(base_url + 'servicio/cargar_datos_seleccion', function(datos) {
        var HTML = '<table id="table3" class="table table-bordered table-striped" width="100%">' +
                '<thead>' +
                '<tr>' +
                '<th>ITEM</th>'+
                '<th>NOMBRE</th>'+
                '<th>DNI</th>'+
                '<th>EQUIPO</th>'+
                '<th>MARCA</th>'+
                '<th>Seleccionar</th>'+
                '</tr>' +
                '</thead>' +
                '<tbody>';

        for (var i = 0; i < datos.length; i++) {
            HTML = HTML + '<tr>';
            HTML = HTML + '<td>'+(i+1)+'</td>';
            HTML = HTML + '<td>'+datos[i].cli_nombre+'</td>';
            HTML = HTML + '<td>'+datos[i].cli_dni+'</td>';
            HTML = HTML + '<td>'+datos[i].tipequ_descripcion+'</td>';
            HTML = HTML + '<td>'+datos[i].mar_descripcion+'</td>';
            var id_s = datos[i].ser_id;
            var c = datos[i].tipequ_descripcion;
            var m = datos[i].mar_descripcion;
            HTML = HTML + '<td><a style="margin-right:4px" href="javascript:void(0)" '+ 
                        ' onclick="sel_servicio(\'' + id_s + '\',\'' + c + '\',\'' + m + '\')" class="btn btn-success">Add </a>';
            HTML = HTML + '</td>';
            HTML = HTML + '</tr>';
        }
        
        HTML = HTML + '</tbody></table>'
        $("#grillaServicio").html(HTML);
        $('#table3').dataTable();
        
        }, 'json');
    }

    function buscarPersonal() {
    $("#grillaPersonal").html('<div class="page-header"><img src="'+base_url+'img/ajax-loader.gif" /></div>');
    $.post(base_url + 'personal/cargar_datos_seleccion', function(datos) {
        var HTML = '<table id="table2" class="table table-bordered table-striped" width="100%">' +
                '<thead>' +
                '<tr>' +
                '<th>ITEM</th>'+
                '<th>NOMBRE</th>'+
                '<th>DNI</th>'+
                '<th>CARGO</th>'+
                '<th>Seleccionar</th>'+
                '</tr>' +
                '</thead>' +
                '<tbody>';

        for (var i = 0; i < datos.length; i++) {
            HTML = HTML + '<tr>';
            HTML = HTML + '<td>'+(i+1)+'</td>';
            HTML = HTML + '<td>'+datos[i].per_nombre+'</td>';
            HTML = HTML + '<td>'+datos[i].per_dni+'</td>';
            HTML = HTML + '<td>'+datos[i].car_descripcion+'</td>';
            var id_p = datos[i].per_id;
            var n = datos[i].per_nombre;
            HTML = HTML + '<td><a style="margin-right:4px" href="javascript:void(0)" '+ 
                        ' onclick="sel_personal(\'' + id_p + '\',\'' + n + '\')" class="btn btn-success">Add </a>';
            HTML = HTML + '</td>';
            HTML = HTML + '</tr>';
        }
        
        HTML = HTML + '</tbody></table>'
        $("#grillaPersonal").html(HTML);
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

    $(".delete_soluciones").live('click', function() { //eliminar problemas
        alert('Eliminando!');
        var i = $(this).parent().index();
        $("#lista_soluciones div:eq(" + i + ")").remove();
    });    


} );
    function cargar(){
        $("#modal_repuesto_buscar").modal('show');
    }

    function sel_servicio(id_s,c,m) {
    
        $("#id_servicio").val(id_s);
        
        $("#nombre_servicio").val(c+' - '+m);
        $('#modal_servicio_buscar').modal('hide');    
        
    }
    function sel_personal(id_p,n) {
    
        $("#id_personal").val(id_p);
        $("#nombre_personal").val(n);
        $('#modal_personal_buscar').modal('hide');    
        
    }
    function sel_repuesto(id_pieza,n,d) {
    
        $("#id_personal").val(id_p);
        $("#nombre_personal").val(n);
        $('#modal_personal_buscar').modal('hide');    
        
    }
    function sel_soluciones() {
        var s_descripcion=$("#descripcion_solucion").val();
        var s_servicio=$("#nombre_servicio").val();
        var s_personal= $("#nombre_personal").val();
        var f = new Date();
        var dia = f.getDate();
        var mes = "";
        if(f.getMonth() +1 <10){
            mes = "0"+(f.getMonth()+1);
        }else{
            mes = (f.getMonth()+1);
        }
        
        var anio = f.getFullYear();
        if(s_descripcion!="" && s_servicio!="" && s_personal!=""){
            var id_serv = $("#id_servicio").val();
            var id_per = $("#id_personal").val();


            
             var html = '<div class="callout callout-danger">';
                html += '<input type="hidden" name="ls_idserv[]" class="ls_idserv" value="'+id_serv+'"">';
                html += '<input type="hidden" name="ls_idper[]" class="ls_idper" value="'+id_per+'"">';
                html += '<input type="hidden" name="ls_descrip[]" class="ls_descrip" value="'+s_descripcion+'"">';
                html += '<h4>'+s_descripcion.toUpperCase()+'</h4>';
                html += '<p><strong>Servicio:</strong> '+s_servicio+'</p>';
                html += '<p><strong>Personal:</strong> '+s_personal+'</p>';
                html += '<p><strong>Fecha:</strong> '+anio+ "-" +mes+ "-" +dia+'</p>';
                html += '<legend>Repuestos</legend>';
                html += "<table id='tabla_repuestos' class='table table-bordered'>";
                html += "<tr>";
                html += "<th>ITEM</th>";
                html += "<th>PIEZA</th>";
                html += "<th>DESCRIPCION</th>";
                html += "<th style='width: 40px'>Eliminar</th>";
                html += "</tr>";
                html += "</table><br>";
                html += "<button onclick='cargar();' class='btn btn-danger'><i class='fa fa-trash'>&nbsp;Solucion</i></button>";            
                html += "<a   onclick='buscarRepuesto();'class='btn btn-success' id='pieza_buscar' data-toggle='modal' data-target='#modal_repuesto_buscar'><i class='fa fa-plus'>&nbsp;Agregar Repuestos</i></a>&nbsp;&nbsp;";            
                html += "<a class='btn btn-danger delete_soluciones'><i class='fa fa-trash'>&nbsp;Eliminar Solucion</i></a>";            
                html += '</div>';

            $("#lista_soluciones").append(html);
            limpia_solucion();    
        }else{
            alert("Llene los Campos Antes de Añadir");
        }
    }

    function limpia_solucion(){
        $("#descripcion_solucion").val('');
    }

    function sel_repuesto() {
    
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



    function buscarRepuesto() {
    alert('hola');
    var base_url = $("#base_url").val();
    $("#grillaRepuesto").html('<div class="page-header"><img src="'+base_url+'img/ajax-loader.gif" /></div>');
    $.post(base_url + 'pieza/cargar_datos_seleccion', function(datos) {
        var HTML = '<table id="table3" class="table table-bordered table-striped" width="100%">' +
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
                        ' onclick="sel_repuesto(\'' + id_pieza + '\',\'' + n + '\',\'' + d + '\')" class="btn btn-success">Add </a>';
            HTML = HTML + '</td>';
            HTML = HTML + '</tr>';
        }
        
        HTML = HTML + '</tbody></table>'
        $("#grillaRepuesto").html(HTML);
        $('#table3').dataTable();
        
        }, 'json');
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

    