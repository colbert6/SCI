<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Categoria_problema_model extends CI_Model{
        
        function __construct(){
            parent::__construct();            
            $this->db=$this->load->database('mysql',TRUE);       
    
        }

        function select(){
            $this->db->where("catpro_estado",1);  
            $query=$this->db->get("categoria_problema");      
            return $query;            
        }

        function crear($data){
            $datos=array('catpro_descripcion' => $data['descripcion'],
                        'catpro_abreviatura' => $data['abreviatura'],
                        'catpro_estado' => 1 );
            if($this->db->insert('categoria_problema',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;            
        }

        function editar($data){
            $datos=array(   'catpro_descripcion' => $data['descripcion'],
                            'catpro_abreviatura' => $data['abreviatura'] );
            $this->db->where("catpro_id",$data['id']);
            if($this->db->update('categoria_problema',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $datos=array('catpro_estado' => 0 );
            $this->db->where("catpro_id",$id);
            if($this->db->update('categoria_problema',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

    }
?>