<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Txn_history_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();      
    }
    
    public function Count($keyword,$merchatId){
       //  $this->db->where('mapp_account.user_id',$merchatId);
           $this->db->join('users','users.id=mapp_shop_txn.from_user_id','LEFT');
        $this->db->where('mapp_shop_txn.to_user_id',$merchatId);
        
        if(!empty($keyword)){
            $this->db->group_start();
                  $this->db->like('mapp_shop_txn.order_id',$keyword);
                $this->db->or_like('users.first_name',$keyword);
                  $this->db->or_like('mapp_shop_txn.txn_id',$keyword);
            $this->db->group_end();
        }
        return $this->db->count_all_results('mapp_shop_txn');
    }
    
    public function List($limit,$offset,$keyword,$merchatId){
       $this->db->select('mapp_shop_txn.*,users.first_name,users.last_name ');
       $this->db->from('mapp_shop_txn');
         $this->db->join('users','users.id=mapp_shop_txn.from_user_id','LEFT');
        $this->db->where('mapp_shop_txn.to_user_id',$merchatId);
        if(!empty($keyword)){
            $this->db->group_start();
                $this->db->like('mapp_shop_txn.order_id',$keyword);
                $this->db->or_like('users.first_name',$keyword);
                 $this->db->or_like('mapp_shop_txn.txn_id',$keyword);
            $this->db->group_end();
        }
        $this->db->limit($limit,$offset);
        return $this->db->get()->result();
    }
    
}