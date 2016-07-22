</section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="<?= base_url(); ?>js/jquery-1.7.1.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url(); ?>js/AdminLTE/app.js" type="text/javascript"></script>

        <link href="<?= base_url(); ?>css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />        
        <script src="<?= base_url(); ?>js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>application/views/<?= $this->uri-> segment(1);?>/run_table.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>js/validaciones.js" type="text/javascript"></script>    



        <?php
            if(isset ($add_servicio) && $add_servicio=='si'){    
        ?>                     
            <script src="<?= base_url(); ?>application/views/<?= $this->uri-> segment(1);?>/nuevo_servicio.js" type="text/javascript"></script>  
            
        <?php
            }else if(isset ($add_solucion) && $add_solucion=='so'){?>
            <script src="<?= base_url(); ?>application/views/<?= $this->uri-> segment(1);?>/nueva_solucion.js" type="text/javascript"></script>  
        <?php    }
        ?>

    </body>
</html>