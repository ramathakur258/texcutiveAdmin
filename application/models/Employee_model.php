<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();      
    }
    public function UserCount($keyword="",$group_id='',$role_id="",$membership_status="",$kyc_status="")
    {
        $where=[];
      
        if(!empty($kyc_status)){
            $where['is_kyc']=$kyc_status;
        }
        if($membership_status=="free"){
            $where['membership_end_date ']=NULL;
        }
        if($membership_status=="paid"){
            $where['membership_end_date >']=date("Y-m-d");
        }
        if($membership_status=="expired"){
            $where['membership_end_date <']=date("Y-m-d");
        }
        if(!empty($group_id)){
            $where['user_group']=$group_id;
        }
        if(!empty($role_id)){
            $where['role_id ']=$role_id;
        }
        $this->db->select('user.*');
        $this->db->from("users as user");
        if(!empty($where)){
            $this->db->group_start();
            $this->db->where($where);
            $this->db->group_end();
        }
        
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('user.first_name', $keyword);
            $this->db->or_like('user.last_name', $keyword);
            $this->db->or_like('user.phone', $keyword);
            $this->db->group_end();
        }
        return $this->db->count_all_results();
    }
    public function UserData($limit,$offset,$keyword="",$group_id="",$role_id="",$membership_status="",$kyc_status="")
    {
        $where=[];
        if(!empty($kyc_status)){
            $where['is_kyc']=$kyc_status;
        }
        if($membership_status=="free"){
            $where['membership_end_date ']=NULL;
        }
        if($membership_status=="paid"){
            $where['membership_end_date >']=date("Y-m-d");
        }
        if($membership_status=="expired"){
            $where['membership_end_date <']=date("Y-m-d");
        }
        if(!empty($group_id)){
            $where['user_group']=$group_id;
        }
        if(!empty($role_id)){
            $where['role_id ']=$role_id;
        }
        $this->db->select('user.*');
        $this->db->from("users as user");
        if(!empty($where)){
            $this->db->group_start();
            $this->db->where($where);
            $this->db->group_end();
        }
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('user.first_name', $keyword);
            $this->db->or_like('user.last_name', $keyword);
            $this->db->or_like('user.phone', $keyword);
            $this->db->group_end();
        }
        $this->db->limit($limit,$offset);    
        $this->db->order_by("user.created_at","DESC");     
       return $this->db->get()->result();

       $this->db->get();  echo  $this->db->last_query();die;
    }
}