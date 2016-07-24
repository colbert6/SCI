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

   
    $('#submit_form_solucion').on('click', function () {        //Enviar los datos del modal-form a guardar en el controlador
        var num_sol = parseInt($("#cont_sol").val());
        if(num_sol==0){
            alert("Agrege una Solucion ");
            return false;
        }
        var id_servicio = $(".ls_idserv");
        var id_personal = $(".ls_idper");
        var descripcion = $(".ls_descrip");
        var fecha = $(".fecha");
        var cont = 1;
        $.ajaxSetup({async: false});
        for (var i = 0; i < num_sol; i++) {
            //console.log(id_servicio[i].value+" "+id_personal[i].value+" "+descripcion[i].value+" "+fecha[i].value);
            //alert("for");
            $.post(base_url+"solucion/guardar",{ser_id:id_servicio[i].value,per_id:id_personal[i].value,descr:descripcion[i].value,fech:fecha[i].value},function(dato){                       
                //alert("post");
                var obj = JSON.parse(dato);
                var id_sol = obj[0].ult;
                console.log(id_sol);
                var nFilas = $(String("#tabla_repuestos"+cont+" tr")).length - 1;
                var id_repuesto = $(String(".id_repuesto"+cont));
                for (var j = 0; j < nFilas; j++) {
                    $.post(base_url+"solucion/guardar_repuesto",{sol:id_sol,pie:id_repuesto[j].value},function(dato){
                        
                    });
                };
                
            });
            cont++;
        };

        $.ajaxSetup({async: true});
        $("#modal_confirmacion").modal({show: true});
    } );

    $('#aceptar_confirmacion').on('click', function () {   //Enviar los datos del modal-form a eliminar en el controlador
       window.location.href = base_url+"solucion/nueva_solucion";
    } );
    
    $(".delete").live('click', function() { //eliminar accesorios
        alert('Eliminando!');
        var tab = $(this).parent().parent().parent().parent().attr("id");
        var i = $(this).parent().parent().index();
        $(String("#"+tab+" tr:eq(" + i + ")")).remove();
    });

    $(".delete_soluciones").live('click', function() { //eliminar problemas
        alert('Eliminando!');
        var i = $(this).parent().index();
        $("#lista_soluciones div:eq(" + i + ")").remove();
        $("#cont_sol").val(parseInt($("#cont_sol").val())-1);
    
    });    


} );
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
    function asignarFecha(){
        var f = new Date();
        var dia = f.getDate();
        var mes = "";
        if(f.getMonth() +1 <10){
            mes = "0"+(f.getMonth()+1);
        }else{
            mes = (f.getMonth()+1);
        }

        var anio = f.getFullYear();

        return anio+ "-" +mes+ "-" +dia;
    }
    function sel_soluciones() {
        var s_descripcion=$("#descripcion_solucion").val();
        var s_servicio=$("#nombre_servicio").val();
        var s_personal= $("#nombre_personal").val();
        
        if(s_descripcion!="" && s_servicio!="" && s_personal!=""){
            $("#cont_sol").val(parseInt($("#cont_sol").val())+1);
            var id_serv = $("#id_servicio").val();
            var id_per = $("#id_personal").val();
             var html = '<div class="col-md-12"><div class="callout callout-danger" id="sol'+$("#cont_sol").val()+'">';
                html += '<input type="hidden" name="ls_idserv[]" class="ls_idserv" value="'+id_serv+'"">';
                html += '<input type="hidden" name="ls_idper[]" class="ls_idper" value="'+id_per+'"">';
                html += '<input type="hidden" name="ls_descrip[]" class="ls_descrip" value="'+s_descripcion+'"">';
                html += '<input type="hidden" name="fecha[]" class="fecha" value="'+asignarFecha()+'"">';
                html += '<h4>'+s_descripcion.toUpperCase()+'</h4>';
                html += '<p><strong>Servicio:</strong> '+s_servicio+'</p>';
                html += '<p><strong>Personal:</strong> '+s_personal+'</p>';
                html += '<p><strong>Fecha:</strong> '+asignarFecha()+'</p>';
                html += '<legend>Repuestos</legend>';
                html += "<table id='tabla_repuestos"+$("#cont_sol").val()+"' class='table table-bordered'>";
                html += "<tr>";
                html += "<th>PIEZA</th>";
                html += "<th>DESCRIPCION</th>";
                html += "<th style='width: 40px'>Eliminar</th>";
                html += "</tr>";
                html += "</table><br>";
                html += "<a   onclick=\"buscarRepuesto('"+$("#cont_sol").val()+"');\" class='btn btn-success' id='pieza_buscar' data-toggle='modal' data-target='#modal_repuesto_buscar'><i class='fa fa-plus'>&nbsp;Repuestos</i></a>&nbsp;&nbsp;";            
                html += "<a class='btn btn-danger delete_soluciones'><i class='fa fa-trash'>&nbsp;Eliminar Solucion</i></a>";            
                html += '</div></div>';


            $("#lista_soluciones").append(html);
            limpia_solucion();    
            
        }else{
            alert("Llene los Campos Antes de Añadir");
        }
    }

    function limpia_solucion(){
        $("#descripcion_solucion").val('');
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
    
        if($(".id_repuesto"+t+"[value=" + id + "]").length){
            alert("Ya ingresado ");
            return false;
        }

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
        
    }



    function prueba(){
        var elementos =$(".categoria_problema");
 
        for(var i=0; i<elementos.length; i++) {
          alert(" Elemento: " + elementos[i].value );
        }
    }