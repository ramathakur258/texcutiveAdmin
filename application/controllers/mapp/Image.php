<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata"); 
class Image extends CI_Controller 
{
    public $data=[];
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common','mapp/image_model']);

    }
    public function index(){
   
       $merchantId=$this->session->userdata('user_id');
        $query="";
        $keyword=$this->input->get('keyword');
        if (!empty($keyword)) {
            $query="?keyword=".$keyword;
        }       
        $config=getPagination();
        $config['base_url'] = site_url("mapp/image".$query);
        $config['total_rows'] =$this->image_model->Count($keyword,$merchantId);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();

        $this->data['result']=$this->image_model->List($config["per_page"], $page, $keyword,$merchantId);
        $this->data['title']='Image';
        $this->data['content']='mapp/image/index';
        $this->load->view('admintemplate', $this->data);
    }
   
    public function edit($id=""){
        $merchantId=$this->session->userdata('user_id');
        if(!empty($id)){
            $this->data['record']=$this->common->record('mapp_image',['id'=>$id,'merchant_id'=>$merchantId]);
            $this->data['title']='Edit Image'; 
        }else{
            $this->data['title']='Add Image';
        }
        if($this->input->server('REQUEST_METHOD')=='POST'){
            // $this->form_validation->set_rules('type','Title','trim|required|'.$id.']');
            if (!empty($_FILES['image_path']['name']))
            {
                $this->form_validation->set_rules('image_path', 'Document', 'callback_check_file_upload');
            }
            if($this->form_validation->run()==TRUE){
                $setdata=[];
                $setdata['type']=$this->input->post('type');
                if(!empty($_FILES['image_path']['name'])){
                    $extension =  pathinfo($_FILES['image_path']['name'],PATHINFO_EXTENSION);
                    // $filename=$merchantId.'-'.strtolower(str_replace(' ','-',$this->input->post('type'))).'.'.$extension;
                      $filename=$merchantId.'-'.strtolower(str_replace(' ','-',$_FILES['image_path']['name']));
                    $fileContent = file_get_contents($_FILES["image_path"]["tmp_name"]);
                    $cloudPath = 'products/' .$filename;
                    upload_file($cloudPath,$fileContent);
                    $setdata['image_path']=$filename;
                }
                if($id!=""){
                    $this->common->update('mapp_image',$setdata,['id'=>$id]);
                    $this->session->set_flashdata('success','Image Updated Successfully');
                    redirect('mapp/image');
                }else{
                    $setdata['merchant_id']=$merchantId;
                    $this->common->save('mapp_image',$setdata);
                    $this->session->set_flashdata('success','Image Added Successfully');
                    redirect('mapp/image');
                }
            }
        }
        $this->data['content']='mapp/image/edit';
        $this->load->view('admintemplate', $this->data);
    }
    
    
//  public function check_type($image,$value){
//         $merchantId=$this->session->userdata('user_id');
//         $explode=explode(',',$value);
//         if(isset($explode[1]) && $explode[1]!=""){
//             $record = $this->common->record('mapp_image',['id'=>$explode[1]]);
//             if($record->merchant_id==$merchantId){
//                 $check= $this->common->record('mapp_image',['type'=>$image,'merchant_id'=>$merchantId,'id!='=>$explode[1]]);
//                 if($check){
//                     $this->form_validation->set_message('check_type','Type Already Exists');
//                 }else{
//                     return true;
//                 }
//             }else{
//                 $this->form_validation->set_message('check_type','Something Wrong');
//             }
//             return false;
//         }else{
//             $check= $this->common->record('mapp_image',['type'=>$image,'merchant_id'=>$merchantId]);
//             if($check){
//                 $this->form_validation->set_message('check_type','Type Already Exists');
//                 return false;
//             }else{
//                 return true;
//             }
//         }
//         return true;
//     }
  
   public function check_file_upload(){
        if(!empty($_FILES['image'])){
            $extension =  pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
            if(!in_array($extension,['png','jpg','jpeg'])){
                $this->form_validation->set_message('check_file_upload','Only png,jpg,jpeg extension allowed');
                return false;
            }else{
                return true;
            }
        }
    } 
    
}
?>



