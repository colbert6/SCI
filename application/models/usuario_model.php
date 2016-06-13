<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Usuario_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        
	    }

	    function ValidarUsuario($data){
	    	$sql="SELECT usu_id 
	    			FROM usuario 
	    			WHERE usu_name='".$data['user']."' and usu_password='".md5($data['password'])."' and usu_estado=1";

            
            $this->db=$this->load->database('mysql',TRUE);
            $query=$this->db->query($sql);            
            return $query->row();
      
	    }


	    
	}
?>