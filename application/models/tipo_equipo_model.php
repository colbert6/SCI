<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Tipo_equipo_model extends CI_Model{
        
        function __construct(){
            parent::__construct();            
            $this->db=$this->load->database('mysql',TRUE);       
    
        }

        function select(){
            $this->db->where("tipequ_estado",1);  
            $query=$this->db->get("tipo_equipo");      
            return $query;            
        }

        function crear($data){
            $datos=array('tipequ_descripcion' => $data['descripcion'],
                        'tipequ_abreviatura' => $data['abreviatura'],
                        'tipequ_estado' => 1 );
            if($this->db->insert('tipo_equipo',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;            
        }

        function editar($data){
            $datos=array(   'tipequ_descripcion' => $data['descripcion'],
                            'tipequ_abreviatura' => $data['abreviatura'] );
            $this->db->where("tipequ_id",$data['id']);
            if($this->db->update('tipo_equipo',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $datos=array('tipequ_estado' => 0 );
            $this->db->where("tipequ_id",$id);
            if($this->db->update('tipo_equipo',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

    }
?>