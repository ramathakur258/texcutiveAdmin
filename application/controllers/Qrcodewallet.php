<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Calcutta"); 
class Qrcodewallet extends CI_Controller 
{
	public function __construct() 
    {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common','qrcodewallet_model']);

    }
	public function index()
	{
        $user=isAdmin("qrcodewallet");
       $this->data['user']=$user;
        
        $query="";
        $keyword=$this->input->get('keyword');
        if(!empty($keyword)){
            $query="?keyword=".$keyword;
        }
        $config=getPagination();
        $config['base_url'] = site_url("device".$query);
        $config['total_rows'] =$this->qrcodewallet_model->CustomerCount($keyword,$user->user_id);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['total_rows']=$config['total_rows'];
        $this->data['users']=$this->qrcodewallet_model->CustomerData($config["per_page"], $page, $keyword,$user->user_id);
        $this->data['title']='Device';
        $this->data['content']='qrcodewallet/qrcodewallet';
        $this->load->view('admintemplate', $this->data);
    }
    public function qrcode_detail($id)
	{
        $user=isAdmin("qrcodewallet");

        $wallet_user=$this->db->get_where("users",['id'=>$id])->row();
        //echo "<pre>";print_r($from); die;

        if($this->input->server('REQUEST_METHOD')=='POST')
        {                
            $this->form_validation->set_rules('no_of_code', 'Number of code', 'trim|numeric');
              
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
         
            if ($this->form_validation->run()== FALSE)
            {
                    
            }
            else
            {
                $num =$this->input->post('no_of_code');
                if( $num < 1){
                    $this->data["message"]='<p class="alert alert-danger">Number of code greater than 0 <p>';
                }else
                {
                    if($wallet_user->id==$user->user_id){

                        if($this->input->post('txn_type')=="debit")
                        {
                            $save['from_user_id']=$wallet_user->id;
                            $save['txn_type']="debit";
                            $save['no_of_code']=$this->input->post('no_of_code');
                            $save['from_comment']="Deduct by Texcutive";
                            
                            $this->db->insert("qrcode_wallet",$save);

                            $message="Your qrcode account is debited by ".$save['no_of_code']." if any query report this to 8448448658 for any dispute.";
                            SendTxnMessage($message, $wallet_user->phone);
                            if ($wallet_user->fcm_token!=null) {
                                $notimessage['title']="Qrcode Deduct by Texcutive";
                                $notimessage['body']=$message;
                                $notimessage['notification_type']='qrcode_wallet';
                                $notimessage['redirect_id']="";
                                Notification($wallet_user->fcm_token, $notimessage);
                            }
                            $this->data["message"]='<p class="alert alert-danger">Deducted Successful <p>';
                        }else{
                        
                            $save['from_user_id']=$wallet_user->id;
                            $save['txn_type']="credit";
                            $save['no_of_code']=$this->input->post('no_of_code');
                            $save['from_comment']="Added by texcutive";
                           
                            $this->db->insert("qrcode_wallet",$save);

                            $message="Your qrcode account is credited by ".$save['no_of_code']." if any query report this to 8448448658 for any dispute.";
                            SendTxnMessage($message, $wallet_user->phone);
                            if ($wallet_user->fcm_token!=null) {
                                $notimessage['title']="Qrcode Received from Texcutive";
                                $notimessage['body']=$message;
                                $notimessage['notification_type']='qrcode_wallet';
                                $notimessage['redirect_id']="";
                                Notification($wallet_user->fcm_token, $notimessage);
                            }
                            $this->data["message"]='<p class="alert alert-success">Added Successful <p>';
                        }

                    }else{

                    

                
                        if($this->input->post('txn_type')=="debit")
                        {
                            $save['from_user_id']=$wallet_user->id;
                            $save['txn_type']="debit";
                            $save['no_of_code']=$this->input->post('no_of_code');
                            $save['to_user_id']=$user->user_id;

                            $save['from_comment']="Deduct by Texcutive";
                            $save['to_comment']="Deduct from ".$wallet_user->first_name." ".$wallet_user->last_name;
                            $this->db->insert("qrcode_wallet",$save);

                            $message="Your qrcode account is debited by ".$save['no_of_code']." if any query report this to 8448448658 for any dispute.";
                            SendTxnMessage($message, $wallet_user->phone);
                            if ($wallet_user->fcm_token!=null) {
                                $notimessage['title']="Qrcode Deduct by Texcutive";
                                $notimessage['body']=$message;
                                $notimessage['notification_type']='qrcode_wallet';
                                $notimessage['redirect_id']="";
                                Notification($wallet_user->fcm_token, $notimessage);
                            }
                            $this->data["message"]='<p class="alert alert-danger">Deducted Successful <p>';
                        }else{
                        
                            $save['from_user_id']=$user->user_id;
                            $save['txn_type']="debit";
                            $save['no_of_code']=$this->input->post('no_of_code');
                            $save['to_user_id']=$wallet_user->id;
                            $save['from_comment']="Transfer to ".$wallet_user->first_name." ".$wallet_user->last_name;
                            $save['to_comment']="Received from Texcutive";
                            $this->db->insert("qrcode_wallet",$save);

                            $message="Your qrcode account is credited by ".$save['no_of_code']." if any query report this to 8448448658 for any dispute.";
                            SendTxnMessage($message, $wallet_user->phone);
                            if ($wallet_user->fcm_token!=null) {
                                $notimessage['title']="Qrcode Received from Texcutive";
                                $notimessage['body']=$message;
                                $notimessage['notification_type']='qrcode_wallet';
                                $notimessage['redirect_id']="";
                                Notification($wallet_user->fcm_token, $notimessage);
                            }
                            $this->data["message"]='<p class="alert alert-success">Added Successful <p>';
                        }
                    }

                    GetQrcodeWalletBalance($wallet_user->id);

                    
                }
           
            }
        }

        $this->data['history']=$this->qrcodewallet_model->qrcode_history($id);
        $this->data['wallet_user']=$wallet_user;
        $this->data['title']='Detail';
        $this->data['content']='qrcodewallet/qrcode_detail';
        $this->load->view('admintemplate', $this->data);
      
    }

	
}
