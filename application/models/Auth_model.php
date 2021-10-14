<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();      
    }
    public function login($username)
    {
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where("phone",$username);
        $this->db->or_where("email",$username);
        $query =$this->db->get();
       // echo $this->db->last_query();die;
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
        
        
    }

       
    
}