<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata"); 
class Terms_and_condition extends CI_Controller 
{
    public $data=[];
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common','mapp/logo_model']);

    }
    public function index(){
  
    if($this->input->server('REQUEST_METHOD')=='POST'){
        
              $checked =  $this->input->post('terms');
              
                  if($checked == 'checked'){
                      
                      $set['shop_app_terms_status'] = '1';
                      $this->common->update('users',$set,['id'=>$this->session->userdata['user_id']]);
                      
                         redirect('dashboard');
                  }
              
              
            }

    
        if($this->session->userdata['shop_app_terms_status'] == '0'){
            $this->data['title']='terms_and_condition';
            $this->load->view('mapp/terms_and_condition/index');
        }else{
            redirect('dashboard');
        }
    }
   
    
}