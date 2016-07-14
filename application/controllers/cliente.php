<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Cliente extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('cliente_model');           
        }
        
        public function index()
        {   
            $dato_header= array ( 'titulo'=> 'Cliente');

            $this->load->view("/layout/header.php",$dato_header);
            $this->load->view("/cliente/index.php");
            $this->load->view("/layout/foother_table.php");
        }

        public function guardar()
        {   
            if(!empty($_POST['id'])) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'dni'=> $this->input->post('dni'),
                                'nombre'=> $this->input->post('nombre'),
                                'direccion'=> $this->input->post('direccion'),
                                'telefono'=> $this->input->post('telefono'),
                                'email'=> $this->input->post('email'));
                $guardar=$this->cliente_model->editar($data);   

            }else{
                $data= array (  'dni'=> $this->input->post('dni'),
                                'nombre'=> $this->input->post('nombre'),
                                'direccion'=> $this->input->post('direccion'),
                                'telefono'=> $this->input->post('telefono'),
                                'email'=> $this->input->post('email'));
                $guardar=$this->cliente_model->crear($data);
                
            } 
            echo json_encode($guardar);            
            
        }
     
        public function eliminar()
        {            
            $guardar=$this->cliente_model->eliminar($_POST['id']);
            echo json_encode($guardar);            
            
        }

        public function cargar_datos($tabla='cliente')
        {   
            $consulta=$this->cliente_model->select($tabla);
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            
            //echo "<pre>";
            //print_r($nuevo);exit();
            echo json_encode($result);
        }

        public function cargar_datos_seleccion($tabla='cliente')
        {   
            $consulta=$this->cliente_model->select($tabla);
            
            echo json_encode($consulta->result());
        }



    }
 ?>

