
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
                <h3 class="box-title">Informacion General</h3>
            </div>
            <div class="box-body">                
                <div class="row" >   
                    <div class="col-md-8">                           
                        <div class="form-group" >
                                                           
                            <div class="col-md-9" style="padding-right: 0px;">
                                <input name="id_cliente" id="id_cliente" type="hidden">
                                <input name="nombre_cliente" id="nombre_cliente" class="form-control" readonly="true" placeholder="Cliente">
                            </div>
                            <a class="btn btn-success k-button" id="cliente_buscar" data-toggle="modal" data-target="#modal_cliente_buscar">Buscar</a>
                            <a class="btn btn-primary k-button" id="cliente_agregar" data-toggle="modal" data-target="#modal_cliente_agregar">Agregar</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" >
                            <label class="col-md-2 control-label" >Fecha:</label>
                            <div class="col-md-10" >
                                <input name="fecha" id="fecha" class="form-control" readonly="readonly" value="<?= $fecha ?>">
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>

<div class="row"><!-- Formulario del Equipo -->
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
                <i class="fa fa-desktop"></i>
                <h3 class="box-title">Informacion del Equipo</h3>
            </div>
            <div class="box-body">
                <div class="row row_separar" >
                    <div class="col-md-4">
                        <div class="form-group" >
                            <label class="col-md-2 control-label"  >Tipo:</label>
                            <div class="col-md-8 quitar_paddin_rigth" >
                                <select class="form-control" id="tipo_equipo" name="tipo_equipo" >
                                    <option value="" >Seleccione Tipo</option>
                                    <?php 
                                        foreach ($tipo_equipo->result() as $datos ) {
                                            echo "<option value='".$datos->tipequ_id."'>".$datos->tipequ_descripcion."</option>";
                                        } 
                                    ?>
                                </select>
                            </div>
                            <!--a class="btn btn-primary k-button" id="tipo_agregar" data-toggle="modal" data-target="#modal_tipo_equipo_agregar"><i class="fa fa-plus"></i></a-->
                        </div>
                    </div>
                
                    <div class="col-md-4">
                        <div class="form-group" >
                            <label class="col-md-2 control-label" >Marca:</label>
                            <div class="col-md-8 quitar_paddin_rigth" >
                                <select class="form-control" id="marca_equipo" name="marca_equipo" >
                                    <option value="" >Seleccione Marca</option>
                                    <?php 
                                        foreach ($marca->result() as $datos ) {
                                            echo "<option value='".$datos->mar_id."'>".$datos->mar_descripcion."</option>";
                                        } 
                                    ?>
                                </select>
                            </div>
                            <!--a class="btn btn-primary k-button" id="marca_agregar" data-toggle="modal" data-target="#modal_marca_agregar"><i class="fa fa-plus"></i></a-->
                        </div>
                    </div>
                
                    <div class="col-md-4">
                        <div class="form-group" >
                            <label class="col-md-2 control-label" >Modelo:</label>
                            <div class="col-md-8 quitar_paddin_rigth">
                                <input name="modelo_equipo" id="modelo_equipo" class="form-control" >   
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row_separar" >
                    <div class="col-md-11">
                        <div class="form-group" >
                            <label class="col-md-2 control-label"  >Descripcion:</label>
                            <div class="col-md-10 " >
                                <textarea name="descripcion_equipo" id="descripcion_equipo" class="form-control" > </textarea>
                            </div>                           
                        </div>
                    </div>   
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row"><!-- Formulario del Equipo -->
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
                <i class="fa fa-cogs"></i>
                <h3 class="box-title">Informacion Accesorios</h3>
            </div>
            <div class="box-body">
                <div class="row row_separar">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Accesorios: </label>                            
                            <div class="input-group ">
                                <select class="form-control" id="nuevo_accesorio" name="nuevo_accesorio" >
                                    <option value="" >Seleccione Accesorio...</option>
                                    <?php 
                                        foreach ($pieza->result() as $datos ) {
                                            echo "<option value='".$datos->pie_id."'>".$datos->pie_descripcion."</option>";
                                        } 
                                    ?>
                                </select>
                                <span class="input-group-btn">
                                    <button class="btn btn-info btn-flat" type="button" id="sel_personal" onclick="sel_accesorio()">Add</button>
                                </span>
                            </div>
                        </div>                         
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label class="col-md-2 control-label"  >Observacion:</label>
                            <div class="col-md-10 " >
                                <textarea name="nuevo_accesorio_descripcion" id="nuevo_accesorio_descripcion" class="form-control" > </textarea>
                            </div>                           
                        </div>
                    </div>  
                     
                </div>
                <div class="row ">
                    <div class="col-md-8">
                        <table id="Table_accesorios" class="table table-bordered">
                            <tr>
                                <th>Accesorio</th>
                                <th>Observacion</th>
                                <th style="width: 40px">Eliminar</th>
                            </tr>                            
                        </table>                    
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row"><!-- Formulario de la ruta Viaje -->
    <div class="col-md-11">
        <div class="box box-danger">
            <div class="box-header">
                <i class="fa fa-ban"></i>
                <h3 class="box-title">Problema(s)</h3>
            </div>
            <div class="box-body">
                <div class="row row_separar" >
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label class="col-md-3 control-label">Categoria: </label>
                            <div class="input-group ">
                                <select class="form-control" id="nuevo_categoria_problema" name="nuevo_categoria_problema" >
                                    <option value="" >Seleccione categoria problema</option>
                                    <?php 
                                        foreach ($categoria_problema->result() as $datos ) {
                                            echo "<option value='".$datos->catpro_id."'>".$datos->catpro_descripcion."</option>";
                                        } 
                                    ?>
                                </select>
                                <span class="input-group-btn">
                                    <button class="btn btn-info btn-flat" type="button" id="add_personal" onclick="sel_problema()">Add</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="col-md-2 control-label"  >Observacion:</label>
                            <div class="col-md-10 " >
                                <textarea name="nuevo_descripcion_problema" id="nuevo_descripcion_problema" class="form-control" > </textarea>
                            </div>  
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="lista_problemas" class="form-group">
                            
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

<!-- MODAL CLIENTE BUSCAR  -->
<div class="modal fade" id="modal_cliente_buscar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"> Buscar Cliente</h4>
            </div>
            <div class="modal-body">
                <div id="grillaCliente">
                    
                </div>                    
            </div>
            <div class="modal-footer clearfix">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar</button>
            </div>
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!---MODAL CLIENTE  AGREGAR-->
<div class="modal fade" id="modal_cliente_agregar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-users"></i> Formulario Cliente</h4>
            </div>
            <form role="form" action="" method="post">
                <div class="modal-body">
                    <div id="msg" class="form-group has-warning"></div>  
                    <div class="form-group">
                        <label for="descripcion">Dni</label>
                        <input type="text" required class="form-control" id="dni" name="dni" placeholder="Ingrese DNI" onkeypress="return soloNumeros(event)" maxlength="8">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Nombre y Apellido</label>
                        <input type="text" required class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre y apellido" onkeypress="return soloLetras(event)">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Direccion</label>
                        <input type="text" required class="form-control" id="direccion" name="direccion" placeholder="Ingrese direccion" onkeypress="return soloLetras(event)">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Telefono</label>
                        <input type="text" required class="form-control" id="telefono" name="telefono" placeholder="Ingrese telefono" onkeypress="return soloNumeros(event)" maxlength="10">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Email</label>
                        <input type="email" required class="form-control" id="email" name="email" placeholder="Ingrese email" onkeypress="return soloLetras(event)">
                    </div>
                </div>
                <div class="modal-footer clearfix">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="button" id='submit_form_cliente' class="btn btn-primary pull-left"><i class="fa fa-check"></i> Guardar</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal de Tipo de equipo-->
<div class="modal fade" id="modal_tipo_equipo_agregar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-tags"></i> Formulario Tipo Equipo</h4>
            </div>
            <form role="form" action="" method="post">
                <div class="modal-body">
                    <div id="msg" class="form-group has-warning"></div>
                    
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" required class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese descripcion" onkeypress="return soloLetras(event)">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Abreviatura</label>
                        <input type="text" required class="form-control" id="abreviatura" name="abreviatura" placeholder="Ingrese abreviatura" onkeypress="return soloLetras(event)">
                    </div>
                </div>
                <div class="modal-footer clearfix">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="button" id='submit_form_tipo_equipo' class="btn btn-primary pull-left"><i class="fa fa-check"></i> Guardar</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal de Marca-->
<div class="modal fade" id="modal_marca_agregar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-users"></i> Formulario Marca</h4>
            </div>
            <form role="form" action="" method="post">
                <div class="modal-body">
                    <div id="msg" class="form-group has-warning"></div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" required class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese descripcion" onkeypress="return soloLetras(event)">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Abreviatura</label>
                        <input type="text" required class="form-control" id="abreviatura" name="abreviatura" placeholder="Ingrese abreviatura" onkeypress="return soloLetras(event)">
                    </div>
                </div>
                <div class="modal-footer clearfix">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="button" id='submit_form_marca' class="btn btn-primary pull-left"><i class="fa fa-check"></i> Guardar</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 
   