<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata"); 
class Permission_section extends CI_Controller 
{
    public $data=[];
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common','mapp/permission_model']);

    }
    public function index(){
        $users=isAdmin('appenquiry','view');
   
        $query="";
        $keyword=$this->input->get('keyword');
        if (!empty($keyword)) {
            $query="?keyword=".$keyword;
        }       
        $config=getPagination();
        $config['base_url'] = site_url("mapp/permission_section".$query);
        $config['total_rows'] =$this->permission_model->Count($keyword);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();

        $this->data['result']=$this->permission_model->List($config["per_page"], $page, $keyword);
        $this->data['title']='Permission';
        $this->data['content']='mapp/permission_section/index';
        $this->load->view('admintemplate', $this->data);
    }
    
       public function edit($id=""){
    
        if(!empty($id)){
            $this->data['record']=$this->common->record('mapp_template_permission_section',['p_section_id'=>$id]);
            $this->data['title']='Edit Permission Section'; 
        }else{
            $this->data['title']='Add Permission Section';
        }
        if($this->input->server('REQUEST_METHOD')=='POST'){
            // echo "<pre>";
            
            // print_r($_POST); die;
            
            $this->form_validation->set_rules('section_name','Name','trim|required');
           
            if($this->form_validation->run()==TRUE){
                $setdata=[];
                $setdata['section_name']=$this->input->post('section_name');
                 $setdata['template_id']=json_encode($this->input->post('template_id'));
               
                if($id!=""){
                    $this->common->update('mapp_template_permission_section',$setdata,['p_section_id'=>$id]);
                    $this->session->set_flashdata('success','Permission Section Updated Successfully');
                   redirect('mapp/permission_section');
                }else{
                    $this->common->save('mapp_template_permission_section',$setdata);
                    $this->session->set_flashdata('success','Permission Section Addedd Successfully');
                    redirect('mapp/permission_section');
                }
            }
        }
           $this->data['template']=$this->common->records('mapp_template');
        
        $this->data['content']='mapp/permission_section/edit';
        $this->load->view('admintemplate', $this->data);
    }
   
       
    
}