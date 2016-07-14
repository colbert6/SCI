<link href="<?= base_url(); ?>css/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
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


<form role="form" action="<?= base_url()."viaje/guardar_nuevo_viaje" ?>" method="post">
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
                                <input name="id_producto" id="id_producto" type="hidden">
                                <input name="producto" id="producto" class="form-control" readonly="true" placeholder="Cliente">
                            </div>
                            <button type="button" class="btn btn-success" id="open_modal_producto">Buscar</button> 
                            <button type="button" class="btn btn-primary" id="open_modal_producto">Agregar</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" >
                            <label class="col-md-2 control-label" >Fecha:</label>
                            <div class="col-md-10" >
                                <input name="fecha" id="fecha" class="form-control" readonly="readonly" value="">
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>

<div class="row"><!-- Formulario de la ruta Viaje -->
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
                <i class="fa fa-desktop"></i>
                <h3 class="box-title">Informacion del Equipo</h3>
            </div>
            <div class="box-body">
                <div class="row" >
                    <div class="col-md-4">
                        <div class="form-group" >
                            <label class="col-md-2 control-label"  >Tipo:</label>
                            <div class="col-md-8 quitar_paddin_rigth" >
                                <select class="form-control" id="cargo" name="cargo" >
                                    <option value="" >Seleccione Tipo</option>
                                    <?php /*
                                        foreach ($cargo->result() as $datos ) {
                                            echo "<option value='".$datos->car_id."'>".$datos->car_descripcion."</option>";
                                        } */
                                    ?>
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary" id="open_modal_tipo"><i class="fa fa-plus"></i></button> 
                        </div>
                    </div>
                
                    <div class="col-md-4">
                        <div class="form-group" >
                            <label class="col-md-2 control-label" >Marca:</label>
                            <div class="col-md-8 quitar_paddin_rigth" >
                                <select class="form-control" id="cargo" name="cargo" >
                                    <option value="" >Seleccione Marca</option>
                                    <?php /*
                                        foreach ($cargo->result() as $datos ) {
                                            echo "<option value='".$datos->car_id."'>".$datos->car_descripcion."</option>";
                                        } */
                                    ?>
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary" id="open_modal_tipo"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                
                    <div class="col-md-4">
                        <div class="form-group" >
                            <label class="col-md-2 control-label" >Modelo:</label>
                            <div class="col-md-8 quitar_paddin_rigth">
                                <input name="fecha" id="fecha" class="form-control" >   
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row_separar" >
                    <div class="col-md-11">
                        <div class="form-group" >
                            <label class="col-md-2 control-label"  >Descripcion:</label>
                            <div class="col-md-10 " >
                                <textarea name="descripcion" id="descripcion" class="form-control" > </textarea>
                            </div>                           
                        </div>
                    </div>   
                </div>

                <div class="row ">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Accesorios: </label>                            
                            <div class="input-group ">
                                <select class="form-control" id="cargo" name="cargo" >
                                    <option value="" >Seleccione Accesorio</option>
                                    <?php /*
                                        foreach ($cargo->result() as $datos ) {
                                            echo "<option value='".$datos->car_id."'>".$datos->car_descripcion."</option>";
                                        } */
                                    ?>
                                </select>
                                <span class="input-group-btn">
                                    <button class="btn btn-info btn-flat" type="button" id="add_personal">+</button>
                                </span>
                            </div>
                        </div>                         
                    </div>
                     
                </div>
                <div class="row ">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="callout callout-danger">
                                <h4>Accesorio 1</h4>
                                <p>There is a problem that we need to fix.</p>
                            </div>                            
                        </div>                     
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="callout callout-danger">
                                <h4>Accesorio 2</h4>
                                <p>There is a problem that we need to fix.</p>
                            </div>                            
                        </div>                     
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="callout callout-danger">
                                <h4>Accesorio 3</h4>
                                <p>There is a problem that we need to fix.</p>
                            </div>                            
                        </div>                     
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
                <i class="fa fa-users"></i>
                <h3 class="box-title">Problema(s)</h3>
            </div>
            <div class="box-body">
                <div class="row row_separar" >
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label class="col-md-3 control-label">Tipo: </label>
                            <div class="input-group ">
                                <select class="form-control" id="cargo" name="cargo" >
                                    <option value="" >Seleccione Tipo problema</option>
                                    <?php /*
                                        foreach ($cargo->result() as $datos ) {
                                            echo "<option value='".$datos->car_id."'>".$datos->car_descripcion."</option>";
                                        } */
                                    ?>
                                </select>
                                <span class="input-group-btn">
                                    <button class="btn btn-info btn-flat" type="button" id="add_personal">+</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="col-md-2 control-label"  >Descripcion:</label>
                            <div class="col-md-10 " >
                                <textarea name="descripcion_problema" id="descripcion_problema" class="form-control" > </textarea>
                            </div>  
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="callout callout-danger">
                                <h4>Problema 1</h4>
                                <p>el tipo de problema </p>
                            </div>
                            <div class="callout callout-danger">
                                <h4>Problema 2</h4>
                                <p>el tipo de problema</p>
                            </div>
                        </div>                     
                    </div>

                </div>
                          
            </div>
        </div>
    </div>
</div>
<button class="btn btn-info btn-flat" type="submit">Guardar</button>
</form>
