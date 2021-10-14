<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata"); 
class Brand extends CI_Controller 
{
    public $data=[];
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common','mapp/brand_model']);

    }
    public function index(){
   
       $merchantId=$this->session->userdata('user_id');
      
        $query="";
        $keyword=$this->input->get('keyword');
        if (!empty($keyword)) {
            $query="?keyword=".$keyword;
        }       
        $config=getPagination();
        $config['base_url'] = site_url("mapp/brand".$query);
        $config['total_rows'] =$this->brand_model->Count($keyword,$merchantId);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();

        $this->data['result']=$this->brand_model->List($config["per_page"], $page, $keyword,$merchantId);
        $this->data['title']='Brand';
        $this->data['content']='mapp/brand/index';
        $this->load->view('admintemplate', $this->data);
    }
   
    public function edit($id=""){
        $merchantId=$this->session->userdata('user_id');
        if(!empty($id)){
            $this->data['record']=$this->common->record('mapp_brand',['id'=>$id,'merchant_id'=>$merchantId]);
            $this->data['title']='Edit Brand'; 
        }else{
            $this->data['title']='Add Brand';
        }
        if($this->input->server('REQUEST_METHOD')=='POST'){
            $this->form_validation->set_rules('brand_name','Title','trim|required|callback_check_brand_name[brand_name,'.$id.']');
            if (!empty($_FILES['brand_image']['name']))
            {
                $this->form_validation->set_rules('brand_image', 'Document', 'callback_check_file_upload');
            }
            if($this->form_validation->run()==TRUE){
                $setdata=[];
                $setdata['brand_name']=$this->input->post('brand_name');
                 $setdata['status']=$this->input->post('status');
                
                if(!empty($_FILES['brand_image']['name'])){
                    $extension =  pathinfo($_FILES['brand_image']['name'],PATHINFO_EXTENSION);
                    $filename=$merchantId.'-'.strtolower(str_replace(' ','-',$this->input->post('brand_name'))).'.'.$extension;
                    $fileContent = file_get_contents($_FILES["brand_image"]["tmp_name"]);
                    $cloudPath = 'brand/' .$filename;
                    upload_file($cloudPath,$fileContent);
                    $setdata['brand_image']=$filename;
                }
                if($id!=""){
                    $this->common->update('mapp_brand',$setdata,['id'=>$id]);
                    $this->session->set_flashdata('success','Brand Updated Successfully');
                    redirect('mapp/brand');
                }else{
                    $setdata['merchant_id']=$merchantId;
                    $this->common->save('mapp_brand',$setdata);
                    $this->session->set_flashdata('success','Brand Added Successfully');
                    redirect('mapp/brand');
                }
            }
        }
        $this->data['content']='mapp/brand/edit';
        $this->load->view('admintemplate', $this->data);
    }
    
    
 public function check_brand_name($brand,$value){
        $merchantId=$this->session->userdata('user_id');
        $explode=explode(',',$value);
        if(isset($explode[1]) && $explode[1]!=""){
            $record = $this->common->record('mapp_brand',['id'=>$explode[1]]);
            if($record->merchant_id==$merchantId){
                $check= $this->common->record('mapp_brand',['brand_name'=>$brand,'merchant_id'=>$merchantId,'id!='=>$explode[1]]);
                if($check){
                    $this->form_validation->set_message('check_brand_name','Brand Name Already Exists');
                }else{
                    return true;
                }
            }else{
                $this->form_validation->set_message('check_brand_name','Something Wrong');
            }
            return false;
        }else{
            $check= $this->common->record('mapp_brand',['brand_name'=>$brand,'merchant_id'=>$merchantId]);
            if($check){
                $this->form_validation->set_message('check_brand_name','Brand Already Exists');
                return false;
            }else{
                return true;
            }
        }
        return true;
    }
  
   public function check_file_upload(){
        if(!empty($_FILES['brand_image'])){
            $extension =  pathinfo($_FILES['brand_image']['name'],PATHINFO_EXTENSION);
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
            
                $this->common->update('mapp_brand',$updaterow,$set);
            }
             redirect('mapp/brand');
        }
       
         
    } 
    
    
    
    
    
    
    
    
}