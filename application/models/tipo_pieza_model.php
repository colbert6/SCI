<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Tipo_pieza_model extends CI_Model{
        
        function __construct(){
            parent::__construct();            
            $this->db=$this->load->database('mysql',TRUE);       
    
        }

        function select(){
            $this->db->where("tipie_estado",1);  
            $query=$this->db->get("tipo_pieza");      
            return $query;            
        }

        function crear($data){
            $datos=array('tipie_nombre' => $data['nombre'],
                        'tipie_descripcion' => $data['descripcion'],
                        'tipie_estado' => 1 );
            if($this->db->insert('tipo_pieza',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;            
        }

        function editar($data){
            $datos=array(   'tipie_nombre' => $data['nombre'],
                            'tipie_descripcion' => $data['descripcion'] );
            $this->db->where("tipie_id",$data['id']);
            if($this->db->update('tipo_pieza',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $datos=array('tipie_estado' => 0 );
            $this->db->where("tipie_id",$id);
            if($this->db->update('tipo_pieza',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

    }
?>