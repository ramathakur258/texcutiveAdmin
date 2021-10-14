<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata"); 
class Slider extends CI_Controller 
{
    public $data=[];
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common','mapp/slider_model']);

    }
    public function index(){
       $merchantId=$this->session->userdata('user_id');
        $query="";
        $keyword=$this->input->get('keyword');
        if (!empty($keyword)) {
            $query="?keyword=".$keyword;
        }       
        $config=getPagination();
        $config['base_url'] = site_url("mapp_slider".$query);
        $config['total_rows'] =$this->slider_model->Count($keyword,$merchantId);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();

        $this->data['result']=$this->slider_model->List($config["per_page"], $page, $keyword,$merchantId);
        $this->data['title']='Slider';
        $this->data['content']='mapp/slider/index';
        $this->load->view('admintemplate', $this->data);
    }
    public function check_slider_title($slider,$value){
        $merchantId=$this->session->userdata('user_id');
        $explode=explode(',',$value);
        if(isset($explode[1]) && $explode[1]!=""){
            $record = $this->common->record('mapp_slider',['id'=>$explode[1]]);
            if($record->merchant_id==$merchantId){
                $check= $this->common->record('mapp_slider',['slider_title'=>$slider,'merchant_id'=>$merchantId,'id!='=>$explode[1]]);
                if($check){
                    $this->form_validation->set_message('check_slider_title','Slider Already Exists');
                }else{
                    return true;
                }
            }else{
                $this->form_validation->set_message('check_slider_title','Something Wrong');
            }
            return false;
        }else{
            $check= $this->common->record('mapp_slider',['slider_title'=>$slider,'merchant_id'=>$merchantId]);
            if($check){
                $this->form_validation->set_message('check_slider_title','Slider Already Exists');
                return false;
            }else{
                return true;
            }
        }
        return true;
    }
    public function check_file_upload(){
        if(!empty($_FILES['category_image'])){
            $extension =  pathinfo($_FILES['slider_image']['name'],PATHINFO_EXTENSION);
            if(!in_array($extension,['png','jpg','jpeg'])){
                $this->form_validation->set_message('check_file_upload','Only png,jpg,jpeg extension allowed');
                return false;
            }else{
                return true;
            }
        }
    }
    
    public function change_status(){
        // redirect('mapp/slider');
        //print_r($_POST); die;
           
            // $id = $this->input->post('user_ids');
            // print_r($id); die;
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $updaterow['status']= $this->input->post('status');
            $ids = explode(",",$this->input->post('user_ids'));
            for($i=0; $i<count($ids); $i++){
                $set['id']=$ids[$i];
            
                $this->common->update('mapp_slider',$updaterow,$set);
            }
             redirect('mapp/slider');
        //  print_r($ids);
            // if($this->common->update('mapp_slider',$updaterow,$ids)){
              
            //     redirect('mapp/slider');
            // }else{
              
            //     redirect('mapp/slider');
            // }
        }
       
         
    }
    public function edit($id=""){
        $merchantId=$this->session->userdata('user_id');
        if(!empty($id)){
            $this->data['record']=$this->common->record('mapp_slider',['id'=>$id,'merchant_id'=>$merchantId]);
            $this->data['title']='Edit Category'; 
        }else{
            $this->data['title']='Add Category';
        }
        if($this->input->server('REQUEST_METHOD')=='POST'){
            // $this->form_validation->set_rules('slider_title','Title','trim|callback_check_slider_title[slider_title,'.$id.']');
            if (!empty($_FILES['slider_image']['name']))
            {
                $this->form_validation->set_rules('slider_image', 'Document', 'callback_check_file_upload');
            }
            if($this->form_validation->run()==TRUE){
                $setdata=[];
                $setdata['slider_title']=$this->input->post('slider_title');
                $setdata['status']=$this->input->post('status_id');
                $setdata['reference_id']=$this->input->post('reference_id');
                $setdata['reference_type']=$this->input->post('reference_type');
                if($setdata['reference_type'] == 'CATEGORY') {
                    $setdata['reference_id'] = $this->input->post('category_id');
                } else if ($setdata['reference_type'] == 'PRODUCT') {
                    $setdata['reference_id'] = $this->input->post('product_id');  
                } else {
                    $setdata['reference_id'] = 0;
                }
                
                if(!empty($_FILES['slider_image']['name'])){
                    $extension =  pathinfo($_FILES['slider_image']['name'],PATHINFO_EXTENSION);
                    $filename=$merchantId.'-'.strtolower(str_replace(' ','-',time())).'.'.$extension;
                    $fileContent = file_get_contents($_FILES["slider_image"]["tmp_name"]);
                    $cloudPath = 'slider/' .$filename;
                    upload_file($cloudPath,$fileContent);
                    $setdata['slider_image']=$filename;
                }
                if($id!=""){ 
                    $this->common->update('mapp_slider',$setdata,['id'=>$id]);
                    $this->session->set_flashdata('success','Slider Updated Successfully');
                    redirect('mapp/slider');
                }else{
                    $setdata['merchant_id']=$merchantId;
                    $this->common->save('mapp_slider',$setdata);
                    $this->session->set_flashdata('success','Slider Addedd Successfully');
                    redirect('mapp/slider');
                }
            }
        }
        $this->data['products']=$this->common->records('mapp_products',['merchant_id'=>$merchantId],'*');
      //  echo "<pre>"; print_r($this->data['products']); die;
        $this->data['categories']=$this->common->records('mapp_category',['merchant_id'=>$merchantId]);
        $this->data['content']='mapp/slider/edit';
        $this->load->view('admintemplate', $this->data);
    }
}