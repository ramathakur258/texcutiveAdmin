<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Help_enquiry_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();      
    }
    public function Count($keyword,$merchantId){
        $this->db->where('merchant_id',$merchantId);
        if(!empty($keyword)){
            $this->db->like('email',$keyword);
              $this->db->or_like('full_name',$keyword);
               $this->db->or_like('phone',$keyword);
        }
        return $this->db->count_all_results('mapp_help_enquiry');
    }
    public function List($limit,$offset,$keyword,$merchantId){
        $this->db->select('*');
        $this->db->from('mapp_help_enquiry');
           
        $this->db->where('merchant_id',$merchantId);
        if(!empty($keyword)){
            $this->db->like('email',$keyword);
              $this->db->or_like('full_name',$keyword);
               $this->db->or_like('phone',$keyword);
        }
        $this->db->limit($limit,$offset);
        $this->db->order_by('mapp_help_enquiry.id','DESC');
        return $this->db->get()->result();
    }
    
      public function details($id){
        $this->db->select('*');
        $this->db->from('shop_enquiry_user');
            $this->db->join('shop_enquiry_user_detail','shop_enquiry_user.id=shop_enquiry_user_detail.user_id','LEFT');
             $this->db->join('shop_user_approval','shop_enquiry_user.id=shop_user_approval.user_id','LEFT');
        $this->db->where('shop_enquiry_user.id',$id);
      
          $result=$this->db->get();
        if($result->num_rows() > 0)
        {
            return $result->row();
            
        }else{
            return false;
        }
    }
}