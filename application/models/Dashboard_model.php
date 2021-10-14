<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();      
    }
    public function detail($user)
    {
        $this->db->select('*');
        $this->db->from("dashboard");
        $this->db->where("user_id",$user->user_id);        
        $dashboard= $this->db->get();
        if ($dashboard->num_rows() > 0) 
        {
            $dashboard=$dashboard->row();
               

                $data['card'][]=[
                "title"=>"Total Employee",
                "detail"=>$dashboard->employee
            ];
                $data['card'][]=[
                "title"=>"Total Partner",
                "detail"=>$dashboard->partner
            ];
                $data['card'][]=[
                "title"=>"Total Customer",
                "detail"=>$dashboard->total_customer
            ];
                $data['card'][]=[
                "title"=>"Total Distributor",
                "detail"=>$dashboard->distributor
            ];
                $data['card'][]=[
                "title"=>"Total Activations",
                "detail"=>$dashboard->employee
            ];
                $data['card'][]=[
                "title"=>"Total Stock",
                "detail"=>$dashboard->total_stock
            ];
        }

       /* $data['card'][]=[
            "title"=>"Wallet Balance",
            "detail"=>"₹ ".GetWalletBalance($user->user_id)
        ];

        $data['card'][]=[
            "title"=>"Cashback Balance",
            "detail"=>"₹ ".GetCashbackBalance($user->user_id)
        ];*/

        $this->db->select('*');
        $this->db->from("users");
        $this->db->where("parent_id",$user->user_id);        
        $user_count= $this->db->count_all_results();

        $data['card'][]=[
            "title"=>"My Referral",
            "detail"=>$user_count
        ];

        /* $data['card'][]=[
            "title"=>"My Distributer",
            "detail"=>GetCashbackBalance($user->user_id)
        ];
        $data['card'][]=[
            "title"=>"My Employee",
            "detail"=>GetCashbackBalance($user->user_id)
        ];
        $data['card'][]=[
            "title"=>"My Partner",
            "detail"=>GetCashbackBalance($user->user_id)
        ]; */
        return $data;
        
    }

       
    
}