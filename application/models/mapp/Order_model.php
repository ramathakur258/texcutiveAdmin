<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Order_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();      
    }
    public function Count($keyword,$merchatId){
        $this->db->where('mapp_orders.merchant_id',$merchatId);
        $this->db->join('users','users.id = mapp_orders.user_id');
        if(!empty($keyword)){
            $this->db->like('users.email',$keyword);
            $this->db->or_like('CONCAT(users.first_name," ",users.last_name)',$keyword);
            $this->db->or_like('mapp_orders.payment_type',$keyword);
            $this->db->or_like('mapp_orders.payment_status',$keyword);
            $this->db->like('mapp_orders.order_status',$keyword);
        }
        return $this->db->count_all_results('mapp_orders');
    }
    public function List($limit,$offset,$keyword,$merchatId){
        $this->db->select('mapp_orders.*,users.*');
        $this->db->from('mapp_orders');
        $this->db->join('users','users.id = mapp_orders.user_id');
        $this->db->where('mapp_orders.merchant_id',$merchatId);
        if(!empty($keyword)){
            $this->db->like('users.email',$keyword);
            $this->db->or_like('CONCAT(users.first_name," ",users.last_name)',$keyword);
            $this->db->or_like('mapp_orders.payment_type',$keyword);
            $this->db->or_like('mapp_orders.payment_status',$keyword);
            $this->db->or_like('mapp_orders.order_status',$keyword);
        }
        $this->db->order_by("mapp_orders.order_id", "DESC");
        $this->db->limit($limit,$offset);
        return $this->db->get()->result();
    }
    public function OrderDetailCount($keyword){
        if(!empty($keyword)){
            $this->db->like('product_name',$keyword);
        }
        return $this->db->count_all_results('mapp_order_details');javascript:;
    }
    public function OrderDetailList($id){
        $this->db->select('mapp_order_details.*,mapp_order_status.name as order_status');
        $this->db->from('mapp_order_details');
         $this->db->join('mapp_order_status','mapp_order_status.order_status_id = mapp_order_details.order_status_id');
        $this->db->where('mapp_order_details.order_id',$id);
        return $this->db->get()->result();
    }
}