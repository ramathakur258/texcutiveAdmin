<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Logo_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();      
    }
    public function Count($keyword,$merchatId){
        $this->db->where('merchant_id',$merchatId);
       
        return $this->db->count_all_results('mapp_logo');
    }
    public function List($limit,$offset,$keyword,$merchatId){
        $this->db->select('*');
        $this->db->from('mapp_logo');
        $this->db->where('merchant_id',$merchatId);
       
        $this->db->limit($limit,$offset);
        return $this->db->get()->result();
    }
}