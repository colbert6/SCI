<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Tipo_pieza extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('tipo_pieza_model');           
        }
        
        public function index()
        {   
            $dato_header= array ( 'titulo'=> 'Tipo Pieza');

            $this->load->view("/layout/header.php",$dato_header);
            $this->load->view("/tipo_pieza/index.php");
            $this->load->view("/layout/foother_table.php");
        }

        public function guardar()
        {   
            if(!empty($_POST['id'])) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'nombre'=> $this->input->post('nombre'),
                                'descripcion'=> $this->input->post('descripcion'));
                $guardar=$this->tipo_pieza_model->editar($data);   

            }else{
                $data= array (  'nombre'=> $this->input->post('nombre'),
                                'descripcion'=> $this->input->post('descripcion') );
                $guardar=$this->tipo_pieza_model->crear($data);
                
            } 
            echo json_encode($guardar);   
        }
     
        public function eliminar()
        {            
            $guardar=$this->tipo_pieza_model->eliminar($_POST['id']);
            echo json_encode($guardar);  
        }

        public function cargar_datos($tabla='tipo_pieza')
        {   
            $consulta=$this->tipo_pieza_model->select();
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

