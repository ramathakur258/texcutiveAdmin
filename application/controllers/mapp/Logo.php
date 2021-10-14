<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata"); 
class Logo extends CI_Controller 
{
    public $data=[];
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common','mapp/logo_model']);

    }
    public function index(){
   
       $merchantId=$this->session->userdata('user_id');
        $query="";
        $keyword=$this->input->get('keyword');
        if (!empty($keyword)) {
            $query="?keyword=".$keyword;
        }       
        $config=getPagination();
        $config['base_url'] = site_url("mapp/logo".$query);
        $config['total_rows'] =$this->logo_model->Count($keyword,$merchantId);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();

        $this->data['result']=$this->logo_model->List($config["per_page"], $page, $keyword,$merchantId);
        $this->data['title']='Logo';
        $this->data['content']='mapp/logo/index';
        $this->load->view('admintemplate', $this->data);
    }
   
    public function edit($id=""){
        $merchantId=$this->session->userdata('user_id');
        if(!empty($id)){
            $this->data['record']=$this->common->record('mapp_logo',['id'=>$id,'merchant_id'=>$merchantId]);
            $this->data['title']='Edit Logo'; 
        }else{
            $this->data['title']='Add Logo';
        }
        if($this->input->server('REQUEST_METHOD')=='POST'){
        
            if (!empty($_FILES['logo_image']['name']))
            {
                $this->form_validation->set_rules('logo_image', 'Document', 'callback_check_file_upload');
            }
            if($this->form_validation->run()==TRUE){
                $setdata=[];
              
                
                if(!empty($_FILES['logo_image']['name'])){
                    $extension =  pathinfo($_FILES['logo_image']['name'],PATHINFO_EXTENSION);
                    $filename=$merchantId.'-'.strtolower(str_replace(' ','-',$_FILES['logo_image']['name'])).'.'.$extension;
                    $fileContent = file_get_contents($_FILES["logo_image"]["tmp_name"]);
                    $cloudPath = 'logo/' .$filename;
                    upload_file($cloudPath,$fileContent);
                    $setdata['logo_image']=$filename;
                }
                if($id!=""){
                    $this->common->update('mapp_logo',$setdata,['id'=>$id]);
                    $this->session->set_flashdata('success','Logo Updated Successfully');
                    redirect('mapp/logo');
                }else{
                    $setdata['merchant_id']=$merchantId;
                    $this->common->save('mapp_logo',$setdata);
                    $this->session->set_flashdata('success','Logo Added Successfully');
                    redirect('mapp/logo');
                }
            }
        }
        $this->data['content']='mapp/logo/edit';
        $this->load->view('admintemplate', $this->data);
    }
    
    

  
   public function check_file_upload(){
        if(!empty($_FILES['logo_image'])){
            $extension =  pathinfo($_FILES['logo_image']['name'],PATHINFO_EXTENSION);
            if(!in_array($extension,['png','jpg','jpeg'])){
                $this->form_validation->set_message('check_file_upload','Only png,jpg,jpeg extension allowed');
                return false;
            }else{
                return true;
            }
        }
    }  
   
  
    
    
    
    
    
    
    
    
}