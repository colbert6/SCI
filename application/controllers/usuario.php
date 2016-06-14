<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Usuario extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('usuario_model');           
        }
        
        public function index()
        {   
            $dato_header= array ( 'titulo'=> 'Usuarios');

            $this->load->view("/layout/header.php",$dato_header);
            $this->load->view("/usuario/index.php");
            $this->load->view("/layout/foother_table.php");
        }

        public function guardar()
        {   
            if(!empty($_POST['id'])) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'name'=> $this->input->post('name'),
                                'password'=> $this->input->post('password'));
                $guardar=$this->usuario_model->editar($data);   

            }else{
                $data= array (  'name'=> $this->input->post('name'),
                                'password'=> $this->input->post('password') );
                $guardar=$this->usuario_model->crear($data);
                
            } 
            echo json_encode($guardar);   
        }
     
        public function eliminar()
        {            
            $guardar=$this->usuario_model->eliminar($_POST['id']);
            echo json_encode($guardar);  
        }

        public function cargar_datos($tabla='usuario')
        {   
            $consulta=$this->usuario_model->select($tabla);
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

