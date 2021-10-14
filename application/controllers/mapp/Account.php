<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata");

class Account extends CI_Controller{
    
    public $data=[];
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal','file']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common','mapp/account_model']);
    }
    
    public function index(){
        $merchantId=$this->session->userdata('user_id');
        $query="";
        $keyword=$this->input->get('keyword');
        if (!empty($keyword)) {
            $query="?keyword=".$keyword;
        }       
        $config=getPagination();
        $config['base_url'] = site_url("mapp/Account".$query);
        $config['total_rows'] =$this->account_model->Count($keyword,$merchantId);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['result']=$this->account_model->List($config["per_page"], $page, $keyword,$merchantId);
        $this->data['title']='Accounts';
        $this->data['content']='mapp/Account/index';
        $this->load->view('admintemplate', $this->data);
    }
    
    public function add(){
        $userId=$this->session->userdata('user_id');
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            
            $this->form_validation->set_rules('upi_id','UPI ID','required|is_unique[mapp_account.upi_id]');
            $this->form_validation->set_rules('bank_name','Bank Name','required');
            $this->form_validation->set_rules('account_holder_name','Account Holder name','required');
            $this->form_validation->set_rules('bank_account_no','Bank Account Number','required|is_unique[mapp_account.bank_account_no]');
            $this->form_validation->set_rules('ifsc_code','IFSC Code','required');
            if (!empty($_FILES['qr_code_image']['name']))
            {
                $this->form_validation->set_rules('qr_code_image', 'QR code Image', 'callback_check_file_upload');
            }else{
                $this->form_validation->set_rules('qr_code_image', 'QR code Image', 'required');
            }
            
            
            if($this->form_validation->run()==TRUE){
                $setdata=[];
                $setdata['user_id']=$userId;
                $setdata['upi_id']=$this->input->post('upi_id');
                $setdata['bank_name']=$this->input->post('bank_name');
                $setdata['account_holder_name']=$this->input->post('account_holder_name');
                $setdata['bank_account_no']=$this->input->post('bank_account_no');
                $setdata['ifsc_code']=$this->input->post('ifsc_code');
                if(!empty($_FILES['qr_code_image']['name'])){
                    $extension =  pathinfo($_FILES['qr_code_image']['name'],PATHINFO_EXTENSION);
                    $filename=$userId.'/'.$setdata['upi_id'].'-'.strtolower(str_replace(' ','-',$this->input->post('qr_code_image'))).'.'.$extension;
                    $fileContent = file_get_contents($_FILES["qr_code_image"]["tmp_name"]);
                    $cloudPath = 'accounts/' .$filename;
                    upload_file($cloudPath,$fileContent);
                    $setdata['qr_code_image']=$filename;
                }
                $this->common->save('mapp_account',$setdata);
                return response(['status'=>'success','message'=>'Account Added Successfully']);
             }else{
                $error="Something went Wrong";
                if(form_error('qr_code_image')){
                    $error=form_error('qr_code_image');
                }elseif(form_error('upi_id')){
                    $error=form_error('upi_id');
                }elseif(form_error('bank_name')){
                    $error=form_error('bank_name');
                }elseif(form_error('account_holder_name')){
                    $error=form_error('account_holder_name');
                }elseif(form_error('bank_account_no')){
                    $error=form_error('bank_account_no');
                }elseif(form_error('ifsc_code')){
                    $error=form_error('ifsc_code');
                }
                return response(['status'=>'fail','message'=>strip_tags($error)]);
            }
        }
        $this->data['title']='Add Account';
        $this->data['content']='mapp/Account/add';
        $this->load->view('admintemplate', $this->data);
    
    }
    
    public function edit($id){
        $userId=$this->session->userdata('user_id');
        $this->data['record']=$this->common->record('mapp_account',['user_id'=>$userId,'account_details_id'=>$id]);
           //echo "<pre>";
           //echo($this->data['record']->upi_id); 
        if(empty($this->data['record'])){
            redirect('mapp/Account');
        }
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            
            if($this->data['record']->upi_id == $this->input->post('upi_id')){
               $this->form_validation->set_rules('upi_id','UPI ID','required');
            }else{
               $this->form_validation->set_rules('upi_id','UPI ID','required|is_unique[mapp_account.upi_id]'); 
            }
            
            $this->form_validation->set_rules('bank_name','Bank Name','required');
            $this->form_validation->set_rules('account_holder_name','Account Holder name','required');
            
            if($this->data['record']->bank_account_no == $this->input->post('bank_account_no')){
                $this->form_validation->set_rules('bank_account_no','Bank Account Number','required');
            }else{
                $this->form_validation->set_rules('bank_account_no','Bank Account Number','required|is_unique[mapp_account.bank_account_no]');
            }
            $this->form_validation->set_rules('ifsc_code','IFSC Code','required');
            if (!empty($_FILES['qr_code_image']['name']))
            {
                $this->form_validation->set_rules('qr_code_image', 'QR code Image', 'callback_check_file_upload');
            }else{
                $this->form_validation->set_rules('qr_code_image', 'QR code Image', 'required');
            }
            
            
            if($this->form_validation->run()==TRUE){
                $setdata=[];
                $setdata['user_id']=$userId;
                $setdata['upi_id']=$this->input->post('upi_id');
                $setdata['bank_name']=$this->input->post('bank_name');
                $setdata['account_holder_name']=$this->input->post('account_holder_name');
                $setdata['bank_account_no']=$this->input->post('bank_account_no');
                $setdata['ifsc_code']=$this->input->post('ifsc_code');
                if(!empty($_FILES['qr_code_image']['name'])){
                    $extension =  pathinfo($_FILES['qr_code_image']['name'],PATHINFO_EXTENSION);
                    $filename=$userId.'/'.$setdata['upi_id'].'-'.strtolower(str_replace(' ','-',$this->input->post('qr_code_image'))).'.'.$extension;
                    $fileContent = file_get_contents($_FILES["qr_code_image"]["tmp_name"]);
                    $cloudPath = 'accounts/' .$filename;
                    upload_file($cloudPath,$fileContent);
                    $setdata['qr_code_image']=$filename;
                }
                $this->common->update('mapp_account',$setdata,['account_details_id'=>$id]);
                return response(['status'=>'success','message'=>'Account Updated Successfully']);
             }else{
                $error="Something went Wrong";
                if(form_error('qr_code_image')){
                    $error=form_error('qr_code_image');
                }elseif(form_error('upi_id')){
                    $error=form_error('upi_id');
                }elseif(form_error('bank_name')){
                    $error=form_error('bank_name');
                }elseif(form_error('account_holder_name')){
                    $error=form_error('account_holder_name');
                }elseif(form_error('bank_account_no')){
                    $error=form_error('bank_account_no');
                }elseif(form_error('ifsc_code')){
                    $error=form_error('ifsc_code');
                }
                return response(['status'=>'fail','message'=>strip_tags($error)]);
            }
        }
        $this->data['title']='Add Account';
        $this->data['content']='mapp/Account/edit';
        $this->load->view('admintemplate', $this->data);
    }
    public function check_file_upload(){
        if(!empty($_FILES['qr_code_image'])){
            $extension =  pathinfo($_FILES['qr_code_image']['name'],PATHINFO_EXTENSION);
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