<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata"); 
class Shopname extends CI_Controller 
{
    public $data=[];
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common']);

    }
    public function index(){
   
       $merchantId=$this->session->userdata('user_id');
      
        $user_data=$this->common->record('users',['id'=>$merchantId]);
        $this->data['shop_name']=$this->common->record('shop_enquiry_user_detail',['user_id'=>$user_data->shop_enquiry_id]);   

        $this->data['title']='Shop Name';
        $this->data['content']='mapp/shop_name/index';
        $this->load->view('admintemplate', $this->data);
    }
   
    public function edit($id=""){
        $merchantId=$this->session->userdata('user_id');
        if(!empty($id)){
             $user_data=$this->common->record('users',['id'=>$merchantId]);
           $this->data['record']=$this->common->record('shop_enquiry_user_detail',['user_id'=>$user_data->shop_enquiry_id]);   
            
            $this->data['title']='Edit Shop Name'; 
        }else{
            $this->data['title']='Add Shop Name';
        }
        if($this->input->server('REQUEST_METHOD')=='POST'){
            $this->form_validation->set_rules('app_shop_name','Shop Name','required');
          
            if($this->form_validation->run()==TRUE){
                $setdata=[];
                $setdata['app_shop_name']=$this->input->post('app_shop_name');
                
              
                if($id!=""){
                    $this->common->update('shop_enquiry_user_detail',$setdata,['id'=>$id]);
                    $this->session->set_flashdata('success','Shop Name Updated Successfully');
                    redirect('mapp/shopname');
                }
            }
        }
        $this->data['content']='mapp/shop_name/edit';
        $this->load->view('admintemplate', $this->data);
    }
    
    
 
  
   
   
  
    
    
    
    
    
    
    
    
}