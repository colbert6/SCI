<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Usuario_model extends CI_Model{
	    

	    function __construct(){
            parent::__construct();            
            $this->db=$this->load->database('mysql',TRUE);       
    
        }

        function ValidarUsuario($data){
	    	$sql="SELECT usu_id 
	    			FROM usuario 
	    			WHERE usu_name='".$data['user']."' and usu_password='".md5($data['password'])."' and usu_estado=1";

            $query=$this->db->query($sql);            
            return $query->row();
      
	    }

        function select(){
            $this->db->where("usu_estado",1);  
            $query=$this->db->get("usuario");      
            return $query;            
        }

        function crear($data){
            $datos=array('usu_name' => $data['name'],
                        'usu_password' =>md5( $data['password']),
                        'usu_estado' => 1 );
            if($this->db->insert('usuario',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;            
        }

        function editar($data){
            $datos=array(   'usu_name' => $data['name'],
                        'usu_password' =>md5( $data['password']) );
            $this->db->where("usu_id",$data['id']);
            if($this->db->update('usuario',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $datos=array('usu_estado' => 0 );
            $this->db->where("usu_id",$id);
            if($this->db->update('usuario',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }


	    
	}
?>