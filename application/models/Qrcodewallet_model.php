<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Qrcodewallet_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();      
    }
    public function CustomerCount($keyword="",$user_id)
    {
        $where=[];        
        $this->db->select("user.id");
        $this->db->from("users as user");
        $this->db->join("qrcode_info as info","user.id=info.user_id","INNER");
        if(!empty($where)){
            $this->db->group_start();
            $this->db->where($where);
            $this->db->group_end();
        }
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->or_like('user.first_name', $keyword);
            $this->db->or_like('user.email', $keyword);
            $this->db->or_like('user.phone', $keyword);
            $this->db->group_end();
        }
        return $this->db->count_all_results();
    }
    public function CustomerData($limit,$offset,$keyword="",$user_id)
    {
        $where=[];
        $this->db->select("user.id as wuser_id,user.first_name,user.last_name,user.phone,info.*");
        $this->db->from("users as user");
        if(!empty($keyword)){
            $this->db->join("qrcode_info as info","user.id=info.user_id","LEFT");
        }else{
            $this->db->join("qrcode_info as info","user.id=info.user_id","INNER");
        }
       
        if(!empty($where)){
            $this->db->group_start();
            $this->db->where($where);
            $this->db->group_end();
        }
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->or_like('user.first_name', $keyword);
            $this->db->or_like('user.email', $keyword);
            $this->db->or_like('user.phone', $keyword);
            $this->db->group_end();
        }
        $this->db->limit($limit,$offset);    
        $this->db->order_by("user.created_at","DESC");   
      //  echo "<pre>";print_r($this->db->get()->result()); die;  
        return $this->db->get()->result();
    }
    public function qrcode_history($user_id)
    {
        $where=[];

        $this->db->select("wallet.*");
        $this->db->from("qrcode_wallet as wallet");
        //$this->db->join("users as user","user.id=wallet.from_user_id","LEFT");      
        $this->db->where(['wallet.from_user_id'=>$user_id]);  
        $this->db->or_where(['wallet.to_user_id'=>$user_id]);           
        $this->db->order_by("wallet.created_at","DESC");   
        return $this->db->get()->result();
    }
    
    
}