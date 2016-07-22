
<div class="row">
    <div class="col-md-12">
        <div  id="tabla_servicios" class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Cliente</th>
                        <th>Codigo</th>
                        <th>Tipo Equipo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Estado</th>
                        <th>Recepcion</th>
                        <th colspan="3">Acciones</th>
                    </tr>
                </thead>  
            </table>
            <div class="btn-group">
                <a href="<?= base_url(); ?>servicio/nuevo_servicio" class="btn btn-primary k-button"><i class="fa  fa-plus"></i>Nuevo</a>
            </div>
        </div>
        <div id="detalle_servicio" class="no_visible">
           
                <div class="row"><!-- Formulario de la ruta Viaje -->
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-book"></i>
                                <h3 class="box-title">Informacion General</h3>
                            </div>
                            <div class="box-body">
                                <div class="row row_separar" >   
                                    <div class="col-md-8">                           
                                        <div class="form-group" > 
                                            <label class="col-md-1 control-label" >Codigo:</label>                                                                          
                                            <div class="col-md-7" style="padding-right: 0px;">
                                                <input name="codigo_servicio" id="codigo_servicio" class="form-control" >
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="col-md-2 control-label" >Fecha:</label>
                                            <div class="col-md-10" >
                                                <input name="fecha" id="fecha" class="form-control" readonly="readonly" >
                                            </div>
                                        </div>
                                    </div>
                                </div>                 
                                <div class="row row_separar" >   
                                    <div class="col-md-8">
                                        <label class="col-md-1 control-label" >Cliente:</label>                           
                                        <div class="form-group" >                                                                           
                                            <div class="col-md-9" style="padding-right: 0px;">
                                                <input name="nombre_cliente" id="nombre_cliente" class="form-control" >
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
                                                <input class="form-control" id="tipo_equipo" name="tipo_equipo" >
                                            </div>
                                            <!--a class="btn btn-primary k-button" id="tipo_agregar" data-toggle="modal" data-target="#modal_tipo_equipo_agregar"><i class="fa fa-plus"></i></a-->
                                        </div>
                                    </div>
                                
                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="col-md-2 control-label" >Marca:</label>
                                            <div class="col-md-8 quitar_paddin_rigth" >
                                                <input class="form-control" id="marca_equipo" name="marca_equipo" >                                               
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
                                <div class="row ">
                                    <div class="col-md-8">
                                        <table id="Table_accesorios" class="table table-bordered">
                                            <tr>
                                                <th>Accesorio</th>
                                                <th>Observacion</th>
                                            </tr>                            
                                        </table>                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row"><!-- Formulario de la ruta Viaje -->
                    <div class="col-md-12">
                        <div class="box box-danger">
                            <div class="box-header">
                                <i class="fa fa-ban"></i>
                                <h3 class="box-title">Problema(s)</h3>
                            </div>
                            <div class="box-body">
                                <div class="row row_separar" >                                    
                                    <div class="col-md-6">
                                        <div id="lista_problemas" class="form-group">
                                            
                                        </div>                     
                                    </div>

                                </div>
                                          
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-info btn-flat" type="button" id="volver_tabla_servicios">Volver</button>
                

        </div>
    </div>   
</div>

