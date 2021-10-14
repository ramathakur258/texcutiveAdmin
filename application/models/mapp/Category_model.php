<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Category_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();      
    }
    public function Count($keyword,$merchatId){
        $this->db->where('merchant_id',$merchatId);
        if(!empty($keyword)){
            $this->db->like('category_title',$keyword);
        }
        return $this->db->count_all_results('mapp_category');
    }
    public function List($limit,$offset,$keyword,$merchatId){
        $this->db->select('*');
        $this->db->from('mapp_category');
        $this->db->where('merchant_id',$merchatId);
        if(!empty($keyword)){
            $this->db->like('category_title',$keyword);
        }
        $this->db->limit($limit,$offset);
        return $this->db->get()->result();
    }
}