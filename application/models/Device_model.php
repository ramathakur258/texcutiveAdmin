<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Device_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();      
    }
    public function CustomerCount($keyword="",$user_id)
    {
        $where=[];
        if($user_id==377){
            
        }else{
            $where['customer.retailer_user_id']=$user_id;
        }

      
        $this->db->select('customer.*');
        $this->db->from("retailer_customers as customer");
        if(!empty($where)){
            $this->db->group_start();
            $this->db->where($where);
            $this->db->group_end();
        }
        
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('customer.device_name', $keyword);
            $this->db->or_like('customer.name', $keyword);
            $this->db->or_like('customer.email', $keyword);
            $this->db->or_like('customer.phone', $keyword);
            $this->db->or_like('customer.alternate_number', $keyword);            
            $this->db->group_end();
        }
        return $this->db->count_all_results();
    }
    public function CustomerData($limit,$offset,$keyword="",$user_id)
    {
        $where=[];
        if($user_id==377){
            
        }else{
            $where['customer.retailer_user_id']=$user_id;
        }
        $this->db->select('customer.*');
        $this->db->from("retailer_customers as customer");
        if(!empty($where)){
            $this->db->group_start();
            $this->db->where($where);
            $this->db->group_end();
        }
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('customer.device_name', $keyword);
            $this->db->or_like('customer.name', $keyword);
            $this->db->or_like('customer.email', $keyword);
            $this->db->or_like('customer.phone', $keyword);
            $this->db->or_like('customer.alternate_number', $keyword);            
            $this->db->group_end();
        }
        $this->db->limit($limit,$offset);    
        $this->db->order_by("customer.created_at","DESC");     
        return $this->db->get()->result();

       $this->db->get();  echo  $this->db->last_query();die;
    }


    public function LockedDeviceCount($keyword="",$user_id)
    {
        $where=[];
        if($user_id==377){
            
        }else{
           // $where['customer.retailer_user_id']=$user_id;
        }

      
        $this->db->select('device.*');
        $this->db->from("chowkidar_device_info as device");
        $this->db->join("users","users.id=device.user_id","LEFT");
        if(!empty($where)){
            $this->db->group_start();
            $this->db->where($where);
            $this->db->group_end();
        }
        
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('users.first_name', $keyword);
            $this->db->or_like('users.email', $keyword);
            $this->db->or_like('users.phone', $keyword);
            $this->db->or_like('users.alternate_mobile_number', $keyword);           
            $this->db->group_end();
        }
        return $this->db->count_all_results();
    }
    public function LockedDeviceData($limit,$offset,$keyword="",$user_id)
    {
        $where=[];
        if($user_id==377){
            
        }else{
           // $where['customer.retailer_user_id']=$user_id;
        }
        $this->db->select('device.*,users.first_name,users.last_name,users.phone,users.email');
        $this->db->from("chowkidar_device_info as device");
        $this->db->join("users","users.id=device.user_id","LEFT");
        if(!empty($where)){
            $this->db->group_start();
            $this->db->where($where);
            $this->db->group_end();
        }
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('users.first_name', $keyword);
            $this->db->or_like('users.email', $keyword);
            $this->db->or_like('users.phone', $keyword);
            $this->db->or_like('users.alternate_mobile_number', $keyword);        
            $this->db->group_end();
        }
        $this->db->limit($limit,$offset);    
        //$this->db->order_by("customer.created_at","DESC");     
        return $this->db->get()->result();

       $this->db->get();  echo  $this->db->last_query();die;
    }
   
}