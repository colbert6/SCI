<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Personal_model extends CI_Model{
        
        function __construct(){
            parent::__construct();            
            $this->db=$this->load->database('mysql',TRUE);       
    
        }

        function select(){
            $sql = "SELECT p.*,c.*
                    FROM personal p INNER JOIN cargo c on (p.car_id = c.car_id)
                    WHERE p.per_estado=1;";
            
            $query=$this->db->query($sql);      
            return $query;            
        }

        function crear($data){
            $datos=array('car_id' => $data['car_id'],
                        'per_dni' => $data['per_dni'],
                        'per_nombre' => $data['per_nombre'],
                        'per_estado' => 1 );
            if($this->db->insert('personal',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;            
        }

        function editar($data){
            $datos=array(   'car_id' => $data['car_id'],
                            'per_dni' => $data['per_dni'],
                            'per_nombre' => $data['per_nombre']
                        );
            $this->db->where("per_id",$data['id']);
            if($this->db->update('personal',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $datos=array('per_estado' => 0 );
            $this->db->where("per_id",$id);
            if($this->db->update('personal',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

    }
?>