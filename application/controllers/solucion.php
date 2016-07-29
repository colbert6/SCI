<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Solucion extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('solucion_model');            
            $this->load->model('servicio_model');
        }

        public function nueva_solucion($idserv=false)
        {   
            if($idserv){
                $servicio = $this->servicio_model->select_id($idserv);
                $data = $servicio->result();
            }else{
                $data = 0;
            }
            $parametro=array('data_servicio' => $data);
            
            $dato_header= array ( 'titulo'=> 'Soluciones');
            $dato_foother= array ( 'add_solucion'=> 'so');
            

            $this->load->view("/layout/header.php",$dato_header);
            $this->load->view("/solucion/nueva_solucion.php",$parametro);
            $this->load->view("/layout/foother_table.php",$dato_foother);
        }

        
        public function lista_servicio()
        {   
            $dato_header= array ( 'titulo'=> 'Soluciones por Servicio');

            $this->load->view("/layout/header.php",$dato_header);
            $this->load->view("/solucion/index.php");
            $this->load->view("/layout/foother_table.php");
        }

        public function lista_solucion($idserv=false)
        {   

            if($idserv){
                $servicio = $this->servicio_model->select_id($idserv);
                $data_servicios = $servicio->result();
                $solucion = $this->solucion_model->selectSolucion_id($idserv);
                $data_solucciones = $solucion->result();
                $repuesto = $this->solucion_model->selectRepuesto();
                $data_repuesto = $repuesto->result();
            }else{
                $data_servicios = 0;
                $data_solucciones = 0;
                $data_repuesto = 0;
            }
            $parametro=array(
                        'data_servicio' => $data_servicios,
                        'data_solucion' => $data_solucciones,
                        'data_repuesto' => $data_repuesto
                        );
            $dato_header= array ( 'titulo'=> 'Lista de Soluciones');
            $dato_foother= array ( 'add_solucion'=> 'su');

            $this->load->view("/layout/header.php",$dato_header);
            $this->load->view("/solucion/lista.php",$parametro);
            $this->load->view("/layout/foother_table.php",$dato_foother);
        }
       

        public function guardar()
        {   
            $data_solucion= array( 
                            'ser_id'=> $this->input->post('ser_id'),
                            'per_id'=>$this->input->post('per_id'),
                            'sol_descripcion'=> $this->input->post('descr'),
                            'sol_fecha'=> $this->input->post('fech')  
                            );
            $data = $this->solucion_model->crear($data_solucion); 
            //ECHO "<PRE>";
            //print_r($data);
            echo json_encode($data->result());
        }

        public function guardar_repuesto()
        {   
            $data_repuesto= array( 
                                'sol_id'=>  $this->input->post('sol'),
                                'pie_id'=>$this->input->post('pie')
                                );
            $guardar=$this->solucion_model->crear_repuesto($data_repuesto);               
            
            echo json_encode($guardar);
        }

        public function eliminar()
        {            
            $guardar=$this->solucion_model->eliminar($this->input->post('sol_id'));
            echo json_encode($guardar);  
        }
        public function eliminarRepuesto()
        {            
            $guardar=$this->solucion_model->eliminarRepuesto($this->input->post('rep_id'));
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

