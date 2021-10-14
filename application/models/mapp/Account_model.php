<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Account_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();      
    }
    
    public function Count($keyword,$merchatId){
         $this->db->where('mapp_account.user_id',$merchatId);
        
        
        if(!empty($keyword)){
            $this->db->group_start();
                $this->db->like('mapp_account.upi_id',$keyword);
                $this->db->or_like('mapp_account.bank_name',$keyword);
                $this->db->or_like('mapp_account.account_holder_name',$keyword);
                $this->db->or_like('mapp_account.bank_account_no',$keyword);
                $this->db->or_like('mapp_account.ifsc_code',$keyword);
            $this->db->group_end();
        }
        return $this->db->count_all_results('mapp_account');
    }
    
    public function List($limit,$offset,$keyword,$merchatId){
       $this->db->select('mapp_account.*');
       $this->db->from('mapp_account');
        $this->db->where('mapp_account.user_id',$merchatId);
        if(!empty($keyword)){
            $this->db->group_start();
                $this->db->like('mapp_account.upi_id',$keyword);
                $this->db->or_like('mapp_account.bank_name',$keyword);
                $this->db->or_like('mapp_account.account_holder_name',$keyword);
                $this->db->or_like('mapp_account.bank_account_no',$keyword);
                $this->db->or_like('mapp_account.ifsc_code',$keyword);
            $this->db->group_end();
        }
        $this->db->limit($limit,$offset);
        return $this->db->get()->result();
    }
    
}