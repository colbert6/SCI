<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Solucion extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('servicio_model');  
            $this->load->model('tipo_equipo_model');
            $this->load->model('marca_model');
            $this->load->model('pieza_model');
            $this->load->model('categoria_problema_model');
             $this->load->model('problema_model');             
        }

        public function nueva_solucion()
        {   
            $dato_header= array ( 'titulo'=> 'Soluciones');
            $dato_foother= array ( 'add_solucion'=> 'so');

            
            $parametro=array('tipo_equipo'=>$this->tipo_equipo_model->select(),
                                'marca'=>$this->marca_model->select(),
                                'pieza'=>$this->pieza_model->select(),
                                'categoria_problema'=>$this->categoria_problema_model->select(),
                            'fecha'=>date('Y-m-d H:i:s'));

            $this->load->view("/layout/header.php",$dato_header);
            $this->load->view("/solucion/nueva_solucion.php",$parametro);
            $this->load->view("/layout/foother_table.php",$dato_foother);
        }

        
        public function lista_servicio()
        {   
            $dato_header= array ( 'titulo'=> 'Servicios');

            $this->load->view("/layout/header.php",$dato_header);
            $this->load->view("/servicio/index.php");
            $this->load->view("/layout/foother_table.php");
        }

       

        public function guardar()
        {   
            
            if(!empty($_POST['dni']) && !empty($_POST['cli']) ) {

                $data=$this->servicio_model->parametros_nueva_servicio()->result_array();
                if($data[0]['num_serv']==''){
                   $data[0]['num_serv']=1;
                }

                $data_servicio= array ( 'ser_cliente'=> $this->input->post('cli'),
                                'ser_codigo'=>$this->input->post('dni')."-". $data[0]['num_serv'],
                                'ser_fecha_recepcion'=> $this->input->post('fec'),
                                'ser_tipo_equipo'=> $this->input->post('t_equi'),
                                'ser_marca'=> $this->input->post('mar'),
                                'ser_modelo'=> $this->input->post('mod'),
                                'ser_descripcion'=> $this->input->post('des')   );
                $guardar=$this->servicio_model->crear($data_servicio); 
                if(is_numeric($guardar)){
                    $guardar=(int)$data[0]['num_serv'];
                }  
            }
            echo json_encode( $guardar);
        }

        public function guardar_accesorios()
        {   
            
            if(!empty($_POST['acc']) ) {

                

                $data_servicio= array ( 'ser_id'=>  $this->input->post('ser'),
                                'pie_id'=>$this->input->post('acc'),
                                'acc_observacion'=> $this->input->post('obs')  );
                $guardar=$this->servicio_model->crear_accesorio($data_servicio);               
            }
            echo json_encode($guardar);
        }

        public function guardar_problemas()
        {   
            
            if(!empty($_POST['cat']) ) {
                $data=$this->servicio_model->parametros_nueva_servicio()->result_array();
                
                $data_servicio= array ( 'ser_id'=> $this->input->post('ser'),
                                'catpro_id'=>$this->input->post('cat'),
                                'pro_descripcion'=> $this->input->post('obs'),
                                'pro_fecha'=> $this->input->post('fec')  );
                $guardar=$this->problema_model->crear($data_servicio);               
            }
            echo json_encode($guardar);
        }
     
        public function eliminar()
        {            
            $guardar=$this->servicio_model->eliminar($_POST['id']);
            echo json_encode($guardar);  
        }

        public function cargar_datos($tabla='servicio')
        {   
            $consulta=$this->servicio_model->select($tabla);
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            
            //echo "<pre>";
            //print_r($nuevo);exit();
            echo json_encode($result);
        }

    }
 ?>

