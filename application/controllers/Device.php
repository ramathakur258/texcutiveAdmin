<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Calcutta"); 
class Device extends CI_Controller 
{
	public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common','device_model']);

    }
	public function index()
	{
        $user=isAdmin();
       $this->data['user']=$user;
        
        $query="";
        $keyword=$this->input->get('keyword');
        if(!empty($keyword)){
            $query="?keyword=".$keyword;
        }  
          
        $config=getPagination();
        $config['base_url'] = site_url("device".$query);
        $config['total_rows'] =$this->device_model->CustomerCount($keyword,$user->user_id);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['total_rows']=$config['total_rows'];
        $this->data['users']=$this->device_model->CustomerData($config["per_page"], $page, $keyword,$user->user_id);
        $this->data['title']='Device';
        $this->data['content']='device/index';
        $this->load->view('admintemplate', $this->data);
    }
    public function remove($id="")
    {
        $user=isAdmin();
        if($user->user_id==377){
             $this->common->remove("retailer_customers",['id'=>$id]);
             $this->session->set_flashdata('message', '<p class="alert alert-danger">Remove Successfully</p>');
        }
        redirect("device"); 
    }

    public function track($id="")
    {
        $user=isAdmin();
        $this->data['device']=$this->common->record("retailer_customers",['customer_id'=>$id]);
        $this->data['title']='Edit';
        $this->data['content']='device/track';
        $this->load->view('admintemplate',$this->data);	
    }
    public function lockUnlock($id="",$return="")
    {
        $user=isAdmin();

        $device=$this->common->record("retailer_customers",['customer_id'=>$id]);
        if($device->lock_status=='locked')
        {
            $this->common->update("retailer_customers",['lock_status'=>'unlocked'],['customer_id'=>$id]);
            $message=[
                'title'=>"App active",
                'body'=>"App active",
                'notification_type'=>"active"
            ];
            RetailerLockNotification($device->fcm_token, $message);
            
            $message=[
                'title'=>"retailer",
                'body'=>"App active",
                'notification_type'=>"IMEI_CHECK",
                'lock_status'=>"unlock",
                'imei_number'=>$device->imei_number,
                'retailer_id'=>$device->retailer_user_id,
                'customer_id'=>$device->customer_id,
            ];
            RetailerLockTopicNotification($device->fcm_token, $message); 
            // SendTxnMessage($device->imei_number."/unlock",$device->phone);
            $this->session->set_flashdata('message', '<p class="alert alert-success">Device Unlocked Successfully</p>');

        }else{
            $this->common->update("retailer_customers",['lock_status'=>'locked'],['customer_id'=>$id]);
            $message=[
                'title'=>"App active",
                'body'=>"App active",
                'notification_type'=>"active"
            ];
            RetailerLockNotification($device->fcm_token, $message);
            $message=[
                'title'=>"retailer",
                'body'=>"App active",
                'notification_type'=>"IMEI_CHECK",
                'lock_status'=>"lock",
                'imei_number'=>$device->imei_number,
                'retailer_id'=>$device->retailer_user_id,
                'customer_id'=>$device->customer_id,
            ];
            RetailerLockTopicNotification($device->fcm_token, $message);
           // SendTxnMessage($device->imei_number."/lock",$device->phone);
            $this->session->set_flashdata('message', '<p class="alert alert-danger">Device Locked Successfully</p>');
        }
        if(!empty($return)){
            redirect($return);  
        }else{
            redirect("device");      
        }
        	
    }

    public function locked()
	{
        $user=isAdmin();
        
        $query="";
        $keyword=$this->input->get('keyword');
     
        $query="?".http_build_query($this->input->get());
          
        $config=getPagination();
        $config['base_url'] = site_url("device/locked".$query);
        $config['total_rows'] =$this->device_model->LockedDeviceCount($keyword,$user->user_id);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['total_rows']=$config['total_rows'];
        $this->data['devices']=$this->device_model->LockedDeviceData($config["per_page"], $page, $keyword,$user->user_id);
        $this->data['title']='Device';
        $this->data['content']='device/main_locked';
        $this->load->view('admintemplate', $this->data);
    }
    public function unlock($id="")
    {
        $user=isAdmin("maindevice");

        $device=$this->common->record("chowkidar_device_info",['chokidar_device_info_id'=>$id]);
        if( $device)
        {
            $row = $this->common->update('users',['device_lock_status'=>'0'],['id'=>$device->user_id]);
            $notify_message=[
                'title'=>"Dear ".$device->name,
                'body'=>"Mobile Unlocked",
                'notification_type'=>"device_unlock"
            ];
         
            $this->common->remove('chowkidar_device_info',['chokidar_device_info_id'=>$id]);
           
            Notification($device->fcm_token,$notify_message);
            $this->session->set_flashdata('message', '<p class="alert alert-success">Device Unlocked Successfully</p>');

        }
        redirect("device/locked");      	
    }
    public function mainAppTrack($id="")
    {
        $user=isAdmin("maindevice");

        $device=$this->common->record("chowkidar_device_info",['chokidar_device_info_id'=>$id]);
        if( $device)
        {
            $this->data['device']=$device;
            $this->data['title']='Device';
            $this->data['content']='device/main_app_track';
            $this->load->view('admintemplate', $this->data);

        }else{
            redirect("device/locked");      	
        }
       
    }


    
   
	
}
