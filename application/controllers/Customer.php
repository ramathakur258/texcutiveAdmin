<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Calcutta"); 
class Customer extends CI_Controller 
{
	public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common','customer_model']);

    }
	public function wallet()
	{
        $user=isAdmin();  
        $this->data['user_id']=$user->user_id;
        $user_id=$user->user_id;        
        
        $query="";
        $keyword=$this->input->get('keyword');
        if(!empty($keyword)){
            $query="?keyword=".$keyword;
        }
		  
        $config=getPagination();        
        $config['base_url'] = site_url("customer/wallet".$query);
        $config['total_rows'] =$this->customer_model->WalletCount($keyword,$user_id);       
        $this->pagination->initialize($config); 
		$page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;		
		$this->data['pagination'] = $this->pagination->create_links();
        $this->data['record_count']=$config['total_rows'];
        $this->data['records']=$this->customer_model->WalletData($config["per_page"], $page ,$keyword,$user_id);
        $this->data['title']='Wallet';
        $this->data['content']='customer/mywallet';
        $this->load->view('admintemplate',$this->data);	
		
    }
    
    public function referrals()
	{
        $user=isAdmin();  
        $user_id=$user->user_id;
        
        if($this->input->get("ids")){
            $user_id=$this->input->get("ids");
        }
       
        $query="";
        $keyword=$this->input->get('keyword');
        $membership_status=$this->input->get('membership_status');
        $kyc_status=$this->input->get('kyc_status');     

        $query="?".http_build_query($this->input->get());      

        $config=getPagination();        
        $config['base_url'] = site_url("customer/referrals".$query);
        $config['total_rows'] =$this->customer_model->ReferralCount($keyword,$user_id,$kyc_status,$membership_status);       
        $this->pagination->initialize($config); 
		$page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;		
		$this->data['pagination'] = $this->pagination->create_links();
        $this->data['record_count']=$config['total_rows'];
        $this->data['users']=$this->customer_model->ReferralData($config["per_page"], $page ,$keyword,$user_id,$kyc_status,$membership_status);
        $this->data['title']='Referral';
        $this->data['content']='customer/referrals';
        $this->load->view('admintemplate',$this->data);	
		
	}
	
}
