<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();      
    }
    public function WalletCount($keyword="",$user_id){
        $this->db->select('wallet.*');
        $this->db->from("users_wallet as wallet");
        $this->db->group_start();
        $this->db->where("wallet.from_user_id",$user_id);
        $this->db->or_where("wallet.to_user_id",$user_id);
        $this->db->group_end();
       
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('wallet.txn_id', $keyword);
            $this->db->or_like('wallet.from_comment', $keyword);
            $this->db->or_like('wallet.to_comment', $keyword);
            $this->db->or_like('wallet.txn_type', $keyword);
            $this->db->group_end();
        }
        return $this->db->count_all_results();
    }
    public function WalletData($limit,$offset,$keyword="",$user_id){
        $this->db->select('wallet.*');
        $this->db->from("users_wallet as wallet");
       // $this->db->join("users_documents as doc","doc.user_id=user.id","LEFT");
        $this->db->group_start();
        $this->db->where("wallet.from_user_id",$user_id);
        $this->db->or_where("wallet.to_user_id",$user_id);
        $this->db->group_end();      

        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('wallet.txn_id', $keyword);
            $this->db->or_like('wallet.from_comment', $keyword);
            $this->db->or_like('wallet.to_comment', $keyword);
            $this->db->or_like('wallet.txn_type', $keyword);
            $this->db->group_end();
        }
        
        $this->db->limit($limit,$offset);    
        $this->db->order_by("wallet.created_at","DESC");     
         return $this->db->get()->result();
       //$this->db->get();
    //  echo  $this->db->last_query();die;
    }


    public function ReferralCount($keyword="",$user_id ,$kyc_status="",$membership_status="all")
    {
        $where=[];
        $where["parent_id"]=$user_id;
        if(!empty($kyc_status) && $kyc_status!='all'){
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
       // $this->db->select('*');
        $this->db->from("users as user");
        $this->db->group_start();
        $this->db->where($where);
        $this->db->group_end();
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('user.first_name', $keyword);
            $this->db->or_like('user.last_name', $keyword);
            $this->db->or_like('user.phone', $keyword);
            $this->db->group_end();
        }
        return $this->db->count_all_results();
    }
    public function ReferralData($limit,$offset,$keyword="",$user_id,$kyc_status="all",$membership_status="all"){
        $where=[];
        $where["parent_id"]=$user_id;
        if(!empty($kyc_status) && $kyc_status!='all'){
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
        $this->db->select('user.*');
        $this->db->from("users as user");
       // $this->db->join("users_documents as doc","doc.user_id=user.id","LEFT");
       $this->db->group_start();
       $this->db->where($where);
       $this->db->group_end();
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
      // $this->db->get();
     // echo  $this->db->last_query();die;
    }
}