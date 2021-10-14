<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata"); 
class Help_enquiry extends CI_Controller 
{
    public $data=[];
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common','mapp/help_enquiry_model']);

    }
    public function index(){
   
       $merchantId=$this->session->userdata('user_id');
        $query="";
        $keyword=$this->input->get('keyword');
        if (!empty($keyword)) {
            $query="?keyword=".$keyword;
        }       
        $config=getPagination();
        $config['base_url'] = site_url("mapp/help_enquiry".$query);
        $config['total_rows'] =$this->help_enquiry_model->Count($keyword,$merchantId);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();

        $this->data['result']=$this->help_enquiry_model->List($config["per_page"], $page, $keyword,$merchantId);
        $this->data['title']='Help Enquiry';
        $this->data['content']='mapp/help_enquiry/index';
        $this->load->view('admintemplate', $this->data);
    }
   
    
    
    public function detail($id=""){
        
         if(!empty($id)){
            $this->data['record']=$this->enquiry_model->details($id);
            
         }
         
          if($this->input->server('REQUEST_METHOD')=='POST'){
              
             
               if($this->input->post('features')){
                    $setdata['features']=implode(',',$this->input->post('features'));
                }
                 $setdata['amount']=$this->input->post('amount');
                 $setdata['user_id']=$id;
                 $setdata['approval_status']='approved';
                  $set['user_id']=$id;
                  $this->common->update('shop_user_approval',$setdata, $set);
                  $this->session->set_flashdata('success','Approved Successfully');
                  redirect('mapp/enquiry');
                 
                 
          }
       
        
          $this->data['content']='mapp/enquiry/detail';
        $this->load->view('admintemplate', $this->data); 
    }
    
    
  
   
   
   
    
    
    
    
    
    
    
    
}