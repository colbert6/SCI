<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Cliente_model extends CI_Model{
        
        function __construct(){
            parent::__construct();            
            $this->db=$this->load->database('mysql',TRUE);       
    
        }

        function select(){
            $this->db->where("cli_estado",1);  
            $query=$this->db->get("cliente");      
            return $query;            
        }

        function crear($data){
            $datos=array('cli_dni' => $data['dni'],
                        'cli_nombre' => $data['nombre'],
                        'cli_direccion' => $data['direccion'],
                        'cli_telefono' => $data['telefono'],
                        'cli_email' => $data['email'],
                        'cli_estado' => 1 );
            if($this->db->insert('cliente',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;            
        }

        function editar($data){
            $datos=array(   'cli_dni' => $data['dni'],
                            'cli_nombre' => $data['nombre'],
                            'cli_direccion' => $data['direccion'],
                            'cli_telefono' => $data['telefono'],
                            'cli_email' => $data['email']);
            $this->db->where("cli_id",$data['id']);
            if($this->db->update('cliente',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $datos=array('cli_estado' => 0 );
            $this->db->where("cli_id",$id);
            if($this->db->update('cliente',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

    }
?>