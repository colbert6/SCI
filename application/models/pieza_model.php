<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Pieza_model extends CI_Model{
        
        function __construct(){
            parent::__construct();            
            $this->db=$this->load->database('mysql',TRUE);       
    
        }

        function select(){
            $this->db->select('pieza.pie_id,pieza.pie_nombre,pieza.pie_descripcion,pieza.tipie_id,tipo_pieza.tipie_nombre,pieza.pie_estado');    
            $this->db->from('pieza');
            $this->db->join('tipo_pieza', 'pieza.tipie_id = tipo_pieza.tipie_id', 'inner');
            $this->db->where("pieza.pie_estado", 1 );
            $query = $this->db->get();  
            return $query;            
        }

        function crear($data){
            $datos=array('pie_nombre' => $data['nombre'],
                         'pie_descripcion' => $data['descripcion'],
                         'tipie_id' =>  $data['tipo_pieza'],
                         'pie_estado' =>  1
                         );
            if($this->db->insert('pieza',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;            
        }

        function editar($data){
            $datos=array(
                         'pie_nombre' => $data['nombre'],
                         'pie_descripcion' => $data['descripcion'],
                         'tipie_id' =>  $data['tipo_pieza'] 
                         );
            $this->db->where("pie_id",$data['id']);
            if($this->db->update('pieza',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $datos=array('pie_estado' => 0 );
            $this->db->where("pie_id",$id);
            if($this->db->update('pieza',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

    }
?>