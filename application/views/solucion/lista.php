<?php 
    //echo "<pre>";
    //print_r($data_solucion);
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
                    <div class="col-md-4">                           
                        <div class="callout callout-danger">
                            <u><h4>SERVICIO</h4></u>
                            <p><strong>Codigo: </strong><?= $data_servicio[0]->ser_codigo; ?></p>
                            <p><strong>Descripcion: </strong><?= $data_servicio[0]->ser_descripcion; ?></p>
                            <p><strong>Recepcion: </strong><?= $data_servicio[0]->ser_fecha_recepcion; ?></p>

                        </div>
                    </div>  
                    <div class="col-md-4">                           
                        <div class="callout callout-info">
                            <u><h4>CLIENTE</h4></u>
                            <p><strong>Nombre: </strong><?= $data_servicio[0]->cli_nombre; ?></p>
                            <p><strong>Direccion: </strong><?= $data_servicio[0]->cli_direccion; ?></p>
                            <p><strong>Telefono: </strong><?= $data_servicio[0]->cli_telefono; ?></p>

                        </div>
                    </div>
                    <div class="col-md-4">                           
                        <div class="callout callout-warning">
                            <u><h4>EQUIPO</h4></u>
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
        
                <?php $i=1; foreach (@$data_solucion as $ss) {?> 
                    <div class="col-md-12" id="sol<?= $i; ?>" sol='<?= $ss->sol_id; ?>'>

                        <div class="callout callout-danger">

                            <h4><?= strtoupper($ss->sol_descripcion); ?></h4>
                            <p><strong>Personal: </strong><?= $ss->per_nombre; ?></p>
                            <p><strong>Fecha: </strong><?= $ss->sol_fecha; ?></p>
                            <legend>Repuestos</legend>
                            <table id="tabla_repuestos<?= $i; ?>" class="table table-bordered">
                                
                                    <tr>
                                        <th>PIEZA</th>
                                        <th>DESCRIPCION</th>
                                        <th>ELIMINAR</th>
                                    </tr>
                                    <?php $j=1; foreach (@$data_repuesto as $rep) { 
                                        if($rep->sol_id == $ss->sol_id){?> 
                                        <tr class="row_tmp">
                                            <td>
                                                <input type="hidden" name="id_repuesto<?= $i; ?>[]" class="id_repuesto<?= $i; ?>" value="<?= $rep->rep_id; ?>" />
                                                <?= $rep->pie_nombre; ?>
                                            </td>
                                            <td><?= $rep->pie_descripcion; ?></td>
                                            <td>
                                                <a class="btn btn-danger delete" rep='<?= $rep->rep_id; ?>'>
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } } ?>
                                
                            </table>
                            <br>
                            <a onclick="buscarRepuesto('<?= $i; ?>');" class='btn btn-success' id='pieza_buscar' data-toggle='modal' data-target='#modal_repuesto_buscar'><i class='fa fa-plus'>&nbsp;Repuestos</i></a>&nbsp;&nbsp;
                            <a class='btn btn-danger' onclick="eliminarSolucion('<?= $ss->sol_id; ?>','<?= $i; ?>');"  id='<?= $i; ?>'><i class='fa fa-trash'>&nbsp;Eliminar Solucion</i></a>

                        </div>
                    </div>
                <?php $i++;} ?>

                
                    
                </div> 
            </div>
        </div>
    </div>
</div>

<button onclick="window.location='<?= base_url(); ?>solucion/lista_servicio'" class="btn btn-info btn-flat" type="button" >Volver</button>
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



