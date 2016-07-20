<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Servicio_model extends CI_Model{
        
        function __construct(){
            parent::__construct();            
            $this->db=$this->load->database('mysql',TRUE);       
    
        }

        function select(){ 
            $query=$this->db->get("servicio");      
            return $query;            
        }

        function parametros_nueva_servicio(){
            $sql="SELECT max(ser_id + 1) as num_serv FROM servicio ";  
            $query=$this->db->query($sql);      
            return $query;            
        }

        function crear($data){
            $datos=array('ser_cliente' => $data['ser_cliente'],
                        'ser_codigo' => $data['ser_codigo'],
                        'ser_tipo_equipo' => $data['ser_tipo_equipo'],
                        'ser_marca' => $data['ser_marca'],
                        'ser_modelo' => $data['ser_modelo'],
                        'ser_descripcion' => $data['ser_descripcion'],
                        'ser_fecha_recepcion' => $data['ser_fecha_recepcion'] );
            if($this->db->insert('servicio',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;            
        }

        function crear_accesorio($data){
            $datos=array('ser_id' => $data['ser_id'],
                        'pie_id' => $data['pie_id'],
                        'acc_observacion' => $data['acc_observacion'] );
            if($this->db->insert('accesorio',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;            
        }

        function editar($data){
            $datos=array(   'ser_codigo' => $data['dni'],
                        'ser_tipo_equipo' => $data['nombre'],
                        'ser_marca' => $data['direccion'],
                        'ser_modelo' => $data['telefono'],
                        'ser_descripcion' => $data['email'],
                        'ser_estado_recepcion' => $data['estado_recepcion'],
                        'ser_estado_servicio' => 1,
                        'ser_fecha_recepcion' => $data['fecha_recepcion'] );
            $this->db->where("ser_id",$data['id']);
            if($this->db->update('servicio',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $datos=array('ser_estado' => 0 );
            $this->db->where("cli_id",$id);
            if($this->db->update('cliente',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }
       // 'ser_estado_servicio' => 1 etapa 1
       // 'ser_estado_servicio' => 2 etapa 2
       // 'ser_estado_servicio' => 3 etapa 3

    }
?>