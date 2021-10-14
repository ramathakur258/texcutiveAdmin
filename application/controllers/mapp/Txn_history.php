<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata"); 
class Txn_history extends CI_Controller 
{
    public $data=[];
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common','mapp/txn_history_model']);

    }
    public function index(){
   
       $merchantId=$this->session->userdata('user_id');
      
        $query="";
        $keyword=$this->input->get('keyword');
        if (!empty($keyword)) {
            $query="?keyword=".$keyword;
        }       
        $config=getPagination();
        $config['base_url'] = site_url("mapp/txn_history".$query);
        $config['total_rows'] =$this->txn_history_model->Count($keyword,$merchantId);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();

        $this->data['result']=$this->txn_history_model->List($config["per_page"], $page, $keyword,$merchantId);
        $this->data['title']='Txn history';
        $this->data['content']='mapp/txn_history/index';
        $this->load->view('admintemplate', $this->data);
    }
   
 
    
    
    
    
    
    
    
}