<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Standbyphone_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();      
    }
    public function MembershipCount($keyword="")
    {
        $where=[];

        $this->db->select('membership.*,users.*');
        $this->db->from("pickup_membership as membership");
        $this->db->join("users as users","membership.user_id=users.id","LEFT");
        if(!empty($where)){
            $this->db->group_start();
            $this->db->where($where);
            $this->db->group_end();
        }
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('membership.title', $keyword);
            $this->db->or_like('membership.paid_amount', $keyword);
            $this->db->or_like('membership.payment_type', $keyword);
            $this->db->or_like('membership.payment_status', $keyword);
            $this->db->or_like('membership.txn_id', $keyword);
            $this->db->or_like('membership.start_date', $keyword);
            $this->db->or_like('membership.end_date', $keyword);
            $this->db->or_like('users.first_name', $keyword);
            $this->db->or_like('users.last_name', $keyword);
            
            $this->db->group_end();
        }
        return $this->db->count_all_results();
    }
    public function MemberData($limit,$offset,$keyword="")
    {
        $where=[];
        $this->db->select('membership.*,users.*');
        $this->db->from("pickup_membership as membership");
        $this->db->join("users as users","membership.user_id=users.id","LEFT");
      //  $this->db->join("chowkidar_membership_lucky_draw as lucky","lucky.user_id=user.id","LEFT");
        if(!empty($where)){
            $this->db->group_start();
            $this->db->where($where);
            $this->db->group_end();
        }
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('membership.title', $keyword);
            $this->db->or_like('membership.paid_amount', $keyword);
            $this->db->or_like('membership.payment_type', $keyword);
            $this->db->or_like('membership.payment_status', $keyword);
            $this->db->or_like('membership.txn_id', $keyword);
            $this->db->or_like('membership.start_date', $keyword);
            $this->db->or_like('membership.end_date', $keyword);
            $this->db->or_like('users.first_name', $keyword);
            $this->db->or_like('users.last_name', $keyword);
            $this->db->group_end();
        }
        $this->db->limit($limit,$offset);    
        $this->db->order_by("membership.created_at","DESC");     
       return $this->db->get()->result();

       $this->db->get();  echo  $this->db->last_query();die;
    }
   

    public function RequestCount($keyword="")
    {
        $where=[];
      
        $this->db->select('request.*,users.*');
        $this->db->from("pickup_info as request");
        $this->db->join("users as users","request.user_id=users.id","LEFT");
        if(!empty($where)){
            $this->db->group_start();
            $this->db->where($where);
            $this->db->group_end();
        }
        
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('request.pickup_address', $keyword);
            $this->db->or_like('request.pickup_time', $keyword);
            $this->db->or_like('request.mobile_name', $keyword);
            $this->db->or_like('request.mobile_number', $keyword);
            $this->db->or_like('request.issue', $keyword);
            $this->db->or_like('request.req_status', $keyword);
            $this->db->or_like('request.imei_number', $keyword);
            $this->db->or_like('users.first_name', $keyword);
            $this->db->or_like('users.last_name', $keyword);
            $this->db->group_end();
        }
        return $this->db->count_all_results();
    }
    public function RequesData($limit,$offset,$keyword="")
    {
        $where=[];
       
        $this->db->select('request.*,users.*');
        $this->db->from("pickup_info as request");
        $this->db->join("users as users","request.user_id=users.id","LEFT");
      //  $this->db->join("chowkidar_membership_lucky_draw as lucky","lucky.user_id=user.id","LEFT");
        if(!empty($where)){
            $this->db->group_start();
            $this->db->where($where);
            $this->db->group_end();
        }
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('request.pickup_address', $keyword);
            $this->db->or_like('request.pickup_time', $keyword);
            $this->db->or_like('request.mobile_name', $keyword);
            $this->db->or_like('request.mobile_number', $keyword);
            $this->db->or_like('request.issue', $keyword);
            $this->db->or_like('request.req_status', $keyword);
            $this->db->or_like('request.imei_number', $keyword);
            $this->db->or_like('users.first_name', $keyword);
            $this->db->or_like('users.last_name', $keyword);
            $this->db->group_end();
        }
        $this->db->limit($limit,$offset);    
        $this->db->order_by("request.created_at","DESC");     
       return $this->db->get()->result();

       $this->db->get();  echo  $this->db->last_query();die;
    }

    public function packageCount($keyword="")
    {
        $where=[];
      
        $this->db->select('packages.*');
        $this->db->from("pickup_info as packages");
        if(!empty($where)){
            $this->db->group_start();
            $this->db->where($where);
            $this->db->group_end();
        }
        
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('packages.title', $keyword);
            $this->db->or_like('packages.description', $keyword);
            $this->db->or_like('packages.price', $keyword);
            $this->db->or_like('packages.status', $keyword);
            
            $this->db->group_end();
        }
        return $this->db->count_all_results();
    }
    public function packageData($limit,$offset,$keyword="")
    {
        $where=[];
        
        $this->db->select('packages.*');
        $this->db->from("pickup_packages as packages");
      //  $this->db->join("chowkidar_membership_lucky_draw as lucky","lucky.user_id=user.id","LEFT");
        if(!empty($where)){
            $this->db->group_start();
            $this->db->where($where);
            $this->db->group_end();
        }
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('packages.title', $keyword);
            $this->db->or_like('packages.description', $keyword);
            $this->db->or_like('packages.price', $keyword);
            $this->db->or_like('packages.status', $keyword);
            $this->db->group_end();
        }
        $this->db->limit($limit,$offset);    
       // $this->db->order_by("packages.created_at","DESC");     
       return $this->db->get()->result();

       $this->db->get();  echo  $this->db->last_query();die;
    }
   
   
}