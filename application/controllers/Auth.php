<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Calcutta"); 
class Auth extends CI_Controller 
{
	public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session']);
        $this->load->model(['common','user_model','auth_model']);

    }
	public function index()
	{
        
        //$this->data['dashboard']=$this->dashboard_model->detail($id);
        $this->data['title']='dashboard';
        $this->data['content']='dashboard/index';
        $this->load->view('admintemplate',$this->data);	
		
	}
	public function login()
	{
        $this->data['content']="";
        if($this->input->server('REQUEST_METHOD')=='POST')
        {		
           // echo password_hash($this->input->post('password'), PASSWORD_DEFAULT); die;
	

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required',
                    array('required' => 'You must provide a %s.')
            );
            if ($this->form_validation->run() == FALSE)
            {
                    
            }
            else
            {               
                $user=$this->auth_model->login($this->input->post('username'));
                if($user)
                {
                    //echo "<pre>";print_r($user); die;
                    $password=md5($this->input->post('password'));
                    //if(password_verify($this->input->post('password'), $user->password))
                    if($user->password==$password)
                    {
                       
                        $permission=$this->common->record("users_roles",['id'=>$user->role_id]);
                        $user_data = array(
                            'user_id'  => $user->id,
                            'display_name'  => $user->first_name." ".$user->last_name,
                            'referral_code'  => $user->partner_referral,
                            'email'  => $user->email,
                            'phone'     => $user->phone,
                            'avatar' => $user->profile_image,
                            'adminin' => TRUE,
                            'permission' => json_decode($permission->permissions,true),
                            'customer_type'=> $user->customer_type,
                            'shop_app_terms_status'=>$user->shop_app_terms_status,
                        );
                        $this->session->set_userdata($user_data); 
                        
                        if($user->customer_type == '1'){
                            if($user->shop_app_terms_status =='1'){
                                redirect('dashboard');
                            }else{
                                redirect('mapp/terms_and_condition');
                            }
                        }else{
                             redirect('dashboard');
                        }
                     
                       

                    }else{
                        $this->data['message']='<p class="alert alert-danger">Invalid Password</p>';
                    }

                }else{
                    $this->data['message']='<p class="alert alert-danger">Wrong Login ID</p>';
                }
                    

            }
		}
        //$this->data['content']="login";
        $this->load->view('login',$this->data);			
    }
    public function register()
	{
        $this->data['content']="";
        if($this->input->server('REQUEST_METHOD')=='POST')
        {
                  
            $this->form_validation->set_rules('business_name', 'Business name', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required|numeric|is_unique[users.phone]');
            $this->form_validation->set_rules('email_address', 'Email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
            $this->form_validation->set_error_delimiters('<p style="color:red;margin-bottom: 0px;">', '</p>');
            if ($this->form_validation->run() == FALSE)
            {
                    
            }
            else
            {
                $partner=[];
                $otp=rand(100000,999999);
                $partner['business_name']=$this->input->post('business_name');
                $partner['contact_person']=$this->input->post('contact_person');
                $partner['mobile_number']=$this->input->post('mobile_number');
                $partner['email_address']=$this->input->post('email_address');
                $password= password_hash($this->input->post('password'), PASSWORD_DEFAULT); 
                $partner['password']=$password;
                $partner['otp']=$otp;  
                $partner['send']=1;                 
                $this->session->set_userdata($partner);
                $message=$otp." otp for verification at fitmegyms";
                SendOtpMessage($partner['mobile_number'],$message,$otp);
                redirect("partner/verification");
            }
		}
        //$this->data['content']="login";
        $this->load->view('partner/registration',$this->data);			
    }
    public function verification()
	{
        $this->data['content']="";
        if($this->input->server('REQUEST_METHOD')=='POST')
        {		
           // echo password_hash($this->input->post('password'), PASSWORD_DEFAULT); die;
            $this->form_validation->set_rules('otp', 'OTP', 'required|numeric');
            
            if ($this->form_validation->run() == FALSE)
            {
                    
            }
            else
            {
                $current_otp=$this->input->post('otp');
                 $otp=$this->session->userdata("otp");
                 if($current_otp==$otp){
                    $gym["title"]=$this->session->userdata('business_name');
                    $gym["contact_person"]=$this->session->userdata('contact_person');
                    $gym["phone"]=$this->session->userdata('mobile_number');
                    $gym["email"]=$this->session->userdata('email_address');
                    $gym["password"]=$this->session->userdata('password');
                    $gym_id=$this->common->save('gyms',$gym);    
                    
                    if($gym_id > 0)
                    {
                        $user_data = array(
                            'gym_id'  => $gym_id,
                            'gym_name'  => $gym["title"],
                            'gym_phone'  => $gym["phone"],
                            'gym_email'     => $gym["email"],
                            'gym_logo' => "logo.png",
                            'partnerin' => TRUE
                        );
                        $this->session->set_userdata($user_data); 
                        redirect('partner/profileEdit');
                       
                    }else{
                        //redirect('partner/login');
                    }  
                 }else{
                    $this->data['message']='<p style="color:red;">Invalid OTP</p>';
                 }
                
            }
		}
        $this->load->view('partner/verification',$this->data);			
    }
    public function resendotp()
	{
        $send_count=$this->session->userdata('send_count');
        if($send_count <= 3){
            $otp=rand(100000,999999);
            $savedata['mobile_number']=$this->session->userdata('mobile_number');
            $savedata['otp']=$otp;  
            $savedata['send']=$send_count + 1;                 
            $this->session->set_userdata($savedata);
            $message=$otp." otp for verification at fitmegyms";
            SendOtpMessage($savedata['mobile_number'],$message,$otp);
            redirect("partner/verification");
        }
        redirect("partner/verification");
    }
    public function email_verify()
	{
        $gym_id=$this->isPartner();
        $this->session->set_flashdata("alert",'<div class="alert alert-success">Verification link send your register email address please verify and activate account. </div>');         
        redirect('partner');
                       
                   		
    }

   
    public function logout(){
        $this->session->sess_destroy();
        redirect('auth/login');
        
    }
	
}
