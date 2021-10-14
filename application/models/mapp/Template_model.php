<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Template_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();      
    }
    public function Count($keyword){
   
        if(!empty($keyword)){
            $this->db->like('template_name',$keyword);
        }
        return $this->db->count_all_results('mapp_template');
    }
    public function List($limit,$offset,$keyword){
        $this->db->select('*');
        $this->db->from('mapp_template');
       
        if(!empty($keyword)){
            $this->db->like('template_name',$keyword);
        }
        $this->db->limit($limit,$offset);
        return $this->db->get()->result();
    }
}