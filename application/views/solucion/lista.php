<?php 
    //echo "<pre>";
    //print_r($data_servicio);
?>
<div class="row"><!-- Formulario de la ruta Viaje -->
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <i class="fa fa-book"></i>
                <h3 class="box-title">Informacion del Servicio</h3>
            </div>
            <div class="box-body">                
                <div class="row" >   
                    <div class="col-md-6">                           
                        <div class="callout callout-info">
                            <u><h4>CLIENTE</h4></u>
                            <p><strong>Nombre: </strong><?= $data_servicio[0]->cli_nombre; ?></p>
                            <p><strong>Direccion: </strong><?= $data_servicio[0]->cli_direccion; ?></p>
                            <p><strong>Telefono: </strong><?= $data_servicio[0]->cli_telefono; ?></p>

                        </div>
                    </div>
                    <div class="col-md-6">                           
                        <div class="callout callout-warning">
                            <u><h4>MAQUINA</h4></u>
                            <p><strong>Tipo Equipo: </strong><?= $data_servicio[0]->tipequ_descripcion; ?></p>
                            <p><strong>Marca: </strong><?= $data_servicio[0]->mar_descripcion; ?></p>
                            <p><strong>Modelo: </strong><?= $data_servicio[0]->ser_modelo; ?></p>
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
                <i class="fa fa-book"></i>
                <h3 class="box-title">Lista de Soluciones</h3>
            </div>
            <div class="box-body">                
                <div class="row" >   
                    <div class="col-md-12">                           
                        <div class="callout callout-danger">
                            <h4>Use protocol</h4>
                            Avoid links without <code>http://www.</code> or <code>https://www.</code> in the beginning.
                        </div>
                    </div>
                    
                </div> 
            </div>
        </div>
    </div>
</div>


