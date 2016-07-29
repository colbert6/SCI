<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Solucion_model extends CI_Model{
        
        function __construct(){
            parent::__construct();            
            $this->db=$this->load->database('mysql',TRUE);       
    
        }

    
        function select(){ 
            $query=$this->db->get("solucion");      
            return $query;            
        }

        function selectSolucion_id($id){ 
            $sql = "SELECT s.*,ss.*,p.*
                    FROM solucion s INNER JOIN servicio ss 
                    on (ss.ser_id=s.ser_id)  
                    INNER JOIN personal p ON (p.per_id=s.per_id)
                    WHERE s.ser_id = $id";
            $query=$this->db->query($sql);      
            return $query;            
        }
        function selectRepuesto(){ 
            $sql = "SELECT r.*,p.*,tp.* 
                    FROM repuesto r INNER JOIN pieza p on (r.pie_id=p.pie_id)
                    inner JOIN tipo_pieza tp  on (p.tipie_id=tp.tipie_id)";
            $query=$this->db->query($sql);      
            return $query;            
        }
        function crear($data){
            $datos=array(
                        'ser_id' => $data['ser_id'],
                        'per_id' => $data['per_id'],
                        'sol_estado' => 1,
                        'sol_descripcion' => $data['sol_descripcion'],
                        'sol_fecha' => $data['sol_fecha']
                        );
            if($this->db->insert('solucion',$datos)){     
                 $sql="SELECT max(sol_id) as ult FROM solucion";
                 $query=$this->db->query($sql); 
            }else{
                 $query=$this->db->_error_message();
            }
            
            return $query;            
        }

        function crear_repuesto($data){
            $datos=array(
                        'sol_id' => $data['sol_id'],
                        'pie_id' => $data['pie_id']
                        );
            if($this->db->insert('repuesto',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;            
        }

        function editar($data){
            $datos=array(   
                        'ser_codigo' => $data['dni'],
                        'ser_tipo_equipo' => $data['nombre'],
                        'ser_marca' => $data['direccion'],
                        'ser_modelo' => $data['telefono'],
                        'ser_descripcion' => $data['email'],
                        'ser_estado_recepcion' => $data['estado_recepcion'],
                        'ser_estado_servicio' => 1,
                        'ser_fecha_recepcion' => $data['fecha_recepcion'] 
                        );
            $this->db->where("ser_id",$data['id']);
            if($this->db->update('servicio',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $sql1  = "DELETE FROM repuesto WHERE sol_id=".$id.";";
            $sql2  = "DELETE FROM solucion where sol_id=".$id.";";
            $query=$this->db->query($sql1);      
            $query1=$this->db->query($sql2);      
            return ($query && $query1) ; 
        }
        function eliminarRepuesto($id){
            $sql  = "DELETE FROM repuesto WHERE rep_id=".$id.";";
            $query=$this->db->query($sql);      
            return $query;
        }


    }
?>