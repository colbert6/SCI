<link href="<?= base_url(); ?>css/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.option_oculta{
    display: none;
}

.option_utilizada{
    display: none;
}

</style>


<form role="form" action="<?= base_url()."viaje/guardar_nuevo_viaje" ?>" method="post">
<input type="hidden" value="1" name="guardar">    
<div class="row"><!-- Formulario de la ruta Viaje -->
    <div class="col-md-11">
        <div class="box box-primary">
            <div class="box-header">
                <i class="fa fa-map-signs"></i>
                <h3 class="box-title">Informacion General</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-2">
                            <label >Ruta de ciudades: </label>
                        </div>
                        <div class="col-xs-4" >
                            <select class="form-control" id="ciu_origen" name="ciu_origen" >
                                <option value="" >Seleccione Origen</option>
                                <?php /*
                                foreach ($ciudad->result() as $datos ) {
                                    echo "<option value='".$datos->ciu_id."'>".$datos->ciu_nombre."</option>";
                                }*/
                                ?>
                            </select> 
                        </div>
                        <div class="col-xs-4">
                            <select class="form-control" id="ciu_destino" name="ciu_destino" >
                                <option value="" >Seleccione Destino</option>
                                <?php /*
                                foreach ($ciudad->result() as $datos ) {
                                    echo "<option value='".$datos->ciu_id."'>".$datos->ciu_nombre."</option>";
                                }*/
                                ?>
                            </select> 
                        </div>
                    </div>
                </div>
                <!--div class="form-group">
                    <div class="row">
                        <div class="col-xs-2">
                            <label >Ruta de Terminales: </label>
                        </div>
                        <div class="col-xs-4" >
                            <select class="form-control" id="ter_origen" name="ter_origen" >
                                <option value="" >Seleccione Terminal Origen</option>
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <select class="form-control" id="ter_destino" name="ter_destino">
                                <option value="">Seleccione Terminal Destino</option>
                            </select>
                        </div>
                    </div>
                </div-->
            </div>
        </div>
    </div>
</div>

<div class="row"><!-- Formulario de la ruta Viaje -->
    <div class="col-md-11">
        <div class="box box-success">
            <div class="box-header">
                <i class="fa fa-calendar"></i>
                <h3 class="box-title">Informacion del Viaje</h3>
            </div>
            <div class="box-body">
                <div class="form-group">       
                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-xs-4">
                                <label>Fecha de Salida y llegada:</label>
                            </div>
                            <div class="col-xs-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="fecha_viaje" id="reservationtime"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-xs-2">
                                <label>Precio</label>
                            </div>
                            <div class="col-xs-8">
                                <div class="input-group">
                                    <span class="input-group-addon">S/.</span>
                                    <input type="number" class="form-control" name="precio" id="precio" placeholder="Precio">
                                </div>
                            </div>  
                        </div>  
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-8">                 
                                <div class="col-xs-4">
                                    <label >Vehiculo: </label>
                                </div>
                                <div class="col-xs-4" >
                                    <select class="form-control" id="tipo_vehiculo" name="tipo_vehiculo" >
                                        <option value="" >Seleccione Tipo Vehiculo</option>
                                        <option value='bus_simple'>Bus Simple</option>
                                        <option value='bus_doble'>Bus doble</option>
                                        <option value='bus_exclusivo'>Bus Exclusivo</option>
                                    </select>
                                </div>
                                <div class="col-xs-4" >
                                    <select class="form-control" id="vehiculo" name="vehiculo" >
                                        <option value="" >Seleccione Vehiculo</option>
                                        <?php /*
                                        foreach ($vehiculo->result() as $d ) {
                                            echo "<option value='".$d->veh_id."' tipo='".$d->veh_tipo."' class='option_oculta'   >".$d->veh_descripcion."</option>";
                                        }*/
                                        ?>
                                    </select>
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
                <h3 class="box-title">Personal</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> &nbsp;&nbsp;&nbsp;&nbsp;Cargo: </label>                            
                        
                            <select class="form-control" id="cargo" name="cargo" >
                                <option value="" >Seleccione Cargo</option>
                                <?php /*
                                    foreach ($cargo->result() as $datos ) {
                                        echo "<option value='".$datos->car_id."'>".$datos->car_descripcion."</option>";
                                    } */
                                ?>
                            </select>
                        </div>

                        <div class="form-group">                
                            <label>Personal</label> 
                            <div class="input-group ">
                                <select class="form-control" id="personal" name="personal" >
                                    <option value="" >Seleccione Personal</option>
                                    <?php /*
                                        foreach ($personal->result() as $datos ) {
                                            echo "<option value='".$datos->per_id."' cargo='".$datos->per_cargo."' class='option_oculta' estado='0'>".$datos->per_nombres."</option>";
                                        } */
                                    ?>
                                </select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-info btn-flat" type="button" id="add_personal">+</button>
                                    </span>
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <ul class="todo-list" id="lista_personal">
                                
                            </ul>
                        </div>                     
                    </div> 
                </div>     
            </div>
        </div>
    </div>
</div>
<button class="btn btn-info btn-flat" type="submit">Guardar</button>
</form>
