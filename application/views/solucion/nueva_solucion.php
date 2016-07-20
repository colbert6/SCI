
<style type="text/css">
.option_oculta{
    display: none;
}

.option_utilizada{
    display: none;
}

.quitar_paddin_rigth{
    padding-right: 0px ;
}
.row_separar{
    padding-bottom: 10px ;
}

</style>


<form role="form" action="" method="post">
<input type="hidden" value="1" name="guardar">    
<div class="row"><!-- Formulario de la ruta Viaje -->
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <i class="fa fa-book"></i>
                <h3 class="box-title">Registro de Soluciones</h3>
            </div>
            <div class="box-body">                
                <div class="row" >   
                    <div class="col-md-5">                           
                        <div class="form-group" >
                                                           
                            <div class="col-md-9" style="padding-right: 0px;">
                                <input name="id_servicio" id="id_servicio" type="hidden">
                            
                                <input name="nombre_servicio" id="nombre_servicio" class="form-control" readonly="true" placeholder="Servicio">
                            </div>
                            <a class="btn btn-success k-button" id="servicio_buscar" data-toggle="modal" data-target="#modal_servicio_buscar">Buscar</a>
                        </div>
                    </div>

                    <div class="col-md-5">                           
                        <div class="form-group" >
                                                           
                            <div class="col-md-9" style="padding-right: 0px;">
                                <input name="id_personal" id="id_personal" type="hidden">
                                <input name="nombre_personal" id="nombre_personal" class="form-control" readonly="true" placeholder="Personal">
                                
                            </div>
                            <a class="btn btn-success k-button" id="personal_buscar" data-toggle="modal" data-target="#modal_cliente_buscar">Buscar</a>
                            
                            
                        </div>
                    </div>

                    <div class="col-md-1">                           
                        <div class="form-group" >
                            <a class="btn btn-info btn-flat" id="agregar_solucion" name="agregar_solucion" onclick="sel_soluciones()">Add</a>
                        </div>
                    </div>
                    <div class="col-md-11">                           
                        <div class="form-group" >
                            <label class="col-md-2 control-label"  >Descripcion:</label>
                            <div class="col-md-10 " >
                                <input style='margin-bottom:20px;' name="descripcion_solucion" id="descripcion_solucion" class="form-control" >
                            </div>                           
                        </div>

                    </div>
                    
                    <div class="col-md-12">
                        <legend ></legend>
                        <div id="lista_soluciones" class="form-group">
                            
                        </div> 
                    </div> 
                </div> 

                
                
            
            </div>
        </div>
    </div>
</div>

<button class="btn btn-info btn-flat" type="button" id="submit_form_servicio">Guardar</button>
<button class="btn btn-info btn-flat" onclick="prueba()" type="button">prueba</button>
</form>

<!---MODALS -->
<style>
        .modal .modal-content{
            width: 800px;
            left: -18%;
        }
</style>

<!-- MODAL SERVICIO BUSCAR  -->
<div class="modal fade" id="modal_servicio_buscar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"> Buscar Servicio</h4>
            </div>
            <div class="modal-body">
                <div id="grillaServicio">
                    
                </div>                    
            </div>
            <div class="modal-footer clearfix">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar</button>
            </div>
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- MODAL PERSONAL BUSCAR  -->
<div class="modal fade" id="modal_personal_buscar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"> Buscar Personal</h4>
            </div>
            <div class="modal-body">
                <div id="grillaPersonal">
                    
                </div>                    
            </div>
            <div class="modal-footer clearfix">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar</button>
            </div>
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- MODAL REPUESTO BUSCAR  -->
<div class="modal fade" id="modal_repuesto_buscar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"> Buscar Repuesto</h4>
            </div>
            <div class="modal-body">
                <div id="grillaRepuesto">
                    
                </div>                    
            </div>
            <div class="modal-footer clearfix">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar</button>
            </div>
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- /////////////////////////////////////////////////////////////////////////-->



<div class="modal fade" id="modal_confirmacion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-check-circle"></i> Guardado Exitoso </h4>
            </div>
            <form role="form" action="" method="post">
                <input type="hidden" id='id_dato_eliminar'></input>
               
                <div class="modal-body" >
                    <div class="alert alert-success alert-dismissable">
                        <i class="fa fa-check"></i>
                        <h4>Se genero un nuevo servicio, Codigo [ </h4><h4 id="cod_servicio"></h4> <h4>]</h4>
                    </div>
                </div>
                <div class="modal-footer clearfix">
                     <button type="button" id="aceptar_confirmacion" class="btn btn-primary pull-left"><i class="fa fa-check"></i> Aceptar</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->                   