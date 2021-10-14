<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata"); 
class Template extends CI_Controller 
{
    public $data=[];
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common','mapp/template_model']);

    }
    public function index(){
        $users=isAdmin('appenquiry','view');
   
        $query="";
        $keyword=$this->input->get('keyword');
        if (!empty($keyword)) {
            $query="?keyword=".$keyword;
        }       
        $config=getPagination();
        $config['base_url'] = site_url("mapp/template".$query);
        $config['total_rows'] =$this->template_model->Count($keyword);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();

        $this->data['result']=$this->template_model->List($config["per_page"], $page, $keyword);
        $this->data['title']='Permission';
        $this->data['content']='mapp/template/index';
        $this->load->view('admintemplate', $this->data);
    }
    
    
        public function edit($id=""){
       
        if(!empty($id)){
            $this->data['record']=$this->common->record('mapp_template',['template_id'=>$id]);
            $this->data['title']='Edit Template'; 
        }else{
            $this->data['title']='Add Template';
        }
        if($this->input->server('REQUEST_METHOD')=='POST'){
            $this->form_validation->set_rules('template_name','Title','trim|required');
            if (!empty($_FILES['template_image']['name']))
            {
                $this->form_validation->set_rules('template_image', 'Document', 'callback_check_file_upload');
            }
            if($this->form_validation->run()==TRUE){
                $setdata=[];
                $setdata['template_name']=$this->input->post('template_name');
                if(!empty($_FILES['template_image']['name'])){
                    $extension =  pathinfo($_FILES['template_image']['name'],PATHINFO_EXTENSION);
                    $filename=$merchantId.'-'.strtolower(str_replace(' ','-',$this->input->post('template_name'))).'.'.$extension;
                    $fileContent = file_get_contents($_FILES["template_image"]["tmp_name"]);
                    $cloudPath = 'template/' .$filename;
                    upload_file($cloudPath,$fileContent);
                    $setdata['template_image']=$filename;
                }
                if($id!=""){
                    $this->common->update('mapp_template',$setdata,['template_id'=>$id]);
                    $this->session->set_flashdata('success','Template Updated Successfully');
                    redirect('mapp/template');
                }else{
                    
                    $this->common->save('mapp_template',$setdata);
                    $this->session->set_flashdata('success','Template Addedd Successfully');
                    redirect('mapp/template');
                }
            }
        }
        $this->data['content']='mapp/template/edit';
        $this->load->view('admintemplate', $this->data);
    }
    
    
     public function check_file_upload(){
        if(!empty($_FILES['template_image'])){
            $extension =  pathinfo($_FILES['template_image']['name'],PATHINFO_EXTENSION);
            if(!in_array($extension,['png','jpg','jpeg'])){
                $this->form_validation->set_message('check_file_upload','Only png,jpg,jpeg extension allowed');
                return false;
            }else{
                return true;
            }
        }
    }
   
       
    
}