<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Enquiry_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();      
    }
    public function Count($keyword){
       // $this->db->where('merchant_id',$merchatId);
        if(!empty($keyword)){
            $this->db->like('shop_enquiry_user.email',$keyword);
              $this->db->or_like('shop_enquiry_user.first_name',$keyword);
              
        }
        return $this->db->count_all_results('shop_enquiry_user');
    }
    public function List($limit,$offset,$keyword){
        $this->db->select('shop_enquiry_user.*,shop_enquiry_user_detail.shop_name,shop_user_approval.approval_status,shop_user_approval.payment_status,users.id as merchant_id, shop_app_payment.payment_type as payment_type, mapp_template_setting.app_theme as app_theme');
        $this->db->from('shop_enquiry_user');
            $this->db->join('shop_enquiry_user_detail','shop_enquiry_user.id=shop_enquiry_user_detail.user_id','LEFT');
            $this->db->join('shop_user_approval','shop_enquiry_user.id=shop_user_approval.user_id','LEFT');
            $this->db->join('users','shop_enquiry_user.id=users.shop_enquiry_id','LEFT');
            $this->db->join('shop_app_payment','shop_enquiry_user.id=shop_app_payment.user_id','LEFT');
            $this->db->join('mapp_template_setting','shop_enquiry_user.id=mapp_template_setting.shop_enquiry_id','LEFT');
      //  $this->db->where('merchant_id',$merchatId);
        if(!empty($keyword)){
            $this->db->like('shop_enquiry_user.email',$keyword);
               $this->db->or_like('shop_enquiry_user.first_name',$keyword);
               $this->db->or_like('shop_enquiry_user_detail.shop_name',$keyword);
        }
        $this->db->limit($limit,$offset);
        $this->db->order_by('shop_enquiry_user.id','asc');
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