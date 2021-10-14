<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata"); 
class Category extends CI_Controller 
{
    public $data=[];
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common','mapp/category_model']);

    }
    public function index(){
       // delete_file('category/1-category.png');
       // $users=isAdmin('user','view');
       $merchantId=$this->session->userdata('user_id');
        $query="";
        $keyword=$this->input->get('keyword');
        if (!empty($keyword)) {
            $query="?keyword=".$keyword;
        }       
        $config=getPagination();
        $config['base_url'] = site_url("mapp/category".$query);
        $config['total_rows'] =$this->category_model->Count($keyword,$merchantId);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();

        $this->data['result']=$this->category_model->List($config["per_page"], $page, $keyword,$merchantId);
        $this->data['title']='Category';
        $this->data['content']='mapp/category/index';
        $this->load->view('admintemplate', $this->data);
    }
    public function check_category_title($category,$value){
        $merchantId=$this->session->userdata('user_id');
        $explode=explode(',',$value);
        if(isset($explode[1]) && $explode[1]!=""){
            $record = $this->common->record('mapp_category',['id'=>$explode[1]]);
            if($record->merchant_id==$merchantId){
                $check= $this->common->record('mapp_category',['category_title'=>$category,'merchant_id'=>$merchantId,'id!='=>$explode[1]]);
                if($check){
                    $this->form_validation->set_message('check_category_title','Category Already Exists');
                }else{
                    return true;
                }
            }else{
                $this->form_validation->set_message('check_category_title','Something Wrong');
            }
            return false;
        }else{
            $check= $this->common->record('mapp_category',['category_title'=>$category,'merchant_id'=>$merchantId]);
            if($check){
                $this->form_validation->set_message('check_category_title','Category Already Exists');
                return false;
            }else{
                return true;
            }
        }
        return true;
    }
    public function check_file_upload(){
        if(!empty($_FILES['category_image'])){
            $extension =  pathinfo($_FILES['category_image']['name'],PATHINFO_EXTENSION);
            if(!in_array($extension,['png','jpg','jpeg'])){
                $this->form_validation->set_message('check_file_upload','Only png,jpg,jpeg extension allowed');
                return false;
            }else{
                return true;
            }
        }
    }
    public function change_action(){
       
            // $id = $this->input->post('user_ids');
            // print_r($id); die;
               if($this->input->server('REQUEST_METHOD') == 'POST'){
              //print_r($_POST); die;
                $updaterow['status']= $this->input->post('status');
                $ids = explode(",",$this->input->post('user_ids'));
                for($i=0; $i<count($ids); $i++){
                $set['id']=$ids[$i];
            
                $this->common->update('mapp_category',$updaterow,$set);
            }
             redirect('mapp/category');
        }
       
         
    }
    public function edit($id=""){
        $merchantId=$this->session->userdata('user_id');
        if(!empty($id)){
            $this->data['record']=$this->common->record('mapp_category',['id'=>$id,'merchant_id'=>$merchantId]);
            $this->data['title']='Edit Category'; 
        }else{
            $this->data['title']='Add Category';
        }
        if($this->input->server('REQUEST_METHOD')=='POST'){
            $this->form_validation->set_rules('category_title','Title','trim|required|callback_check_category_title[category_title,'.$id.']');
            if (!empty($_FILES['category_image']['name']))
            {
                $this->form_validation->set_rules('category_image', 'Document', 'callback_check_file_upload');
            }
            if($this->form_validation->run()==TRUE){
                $setdata=[];
                $setdata['category_title']=$this->input->post('category_title');
                $setdata['status']=$this->input->post('status_id');
                if(!empty($_FILES['category_image']['name'])){
                    $extension =  pathinfo($_FILES['category_image']['name'],PATHINFO_EXTENSION);
                    $filename=$merchantId.'-'.strtolower(str_replace(' ','-',$this->input->post('category_title'))).'.'.$extension;
                    $fileContent = file_get_contents($_FILES["category_image"]["tmp_name"]);
                    $cloudPath = 'category/' .$filename;
                    upload_file($cloudPath,$fileContent);
                    $setdata['category_image']=$filename;
                }
                if($id!=""){
                    $this->common->update('mapp_category',$setdata,['id'=>$id]);
                    $this->session->set_flashdata('success','Category Updated Successfully');
                    redirect('mapp/category');
                }else{
                    $setdata['merchant_id']=$merchantId;
                    $this->common->save('mapp_category',$setdata);
                    $this->session->set_flashdata('success','Category Addedd Successfully');
                    redirect('mapp/category');
                }
            }
        }
        $this->data['content']='mapp/category/edit';
        $this->load->view('admintemplate', $this->data);
    }
}