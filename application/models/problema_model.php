<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Problema_model extends CI_Model{
        
        function __construct(){
            parent::__construct();            
            $this->db=$this->load->database('mysql',TRUE);       
    
        }

        function select(){
            $this->db->where("mar_estado",1);  
            $query=$this->db->get("Problema");      
            return $query;            
        }

        function select_serv_problema(){
            $sql="";
            $query=$this->db->query($sql);      
            return $query;            
        }

        function crear($data){
            $datos=array('ser_id' => $data['ser_id'],
                        'catpro_id' => $data['catpro_id'],
                        'pro_descripcion' => $data['pro_descripcion'],
                        'pro_fecha' => $data['pro_fecha'] );
            
            if($this->db->insert('problema',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;            
        }

        function editar($data){
            $datos=array(   'mar_descripcion' => $data['descripcion'],
                            'mar_abreviatura' => $data['abreviatura'] );
            $this->db->where("mar_id",$data['id']);
            if($this->db->update('Problema',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $datos=array('mar_estado' => 0 );
            $this->db->where("mar_id",$id);
            if($this->db->update('Problema',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

    }
?>