<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Calcutta"); 
class Wallet extends CI_Controller 
{
	public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common','wallet_model']);

    }
	public function index()
	{
        $user=isAdmin("wallet",'view');  
        $this->data['user_id']=$user->user_id;
        $user_id=$user->user_id;
        
        if($this->input->get("ids")){
            $user_id=$this->input->get("ids");
        }
       
        $query="";
        $keyword=$this->input->get('keyword');
        if(!empty($keyword)){
            $query="?keyword=".$keyword."&ids=".$user_id;
        }
		  
        $config=getPagination();        
        $config['base_url'] = site_url("wallet".$query);
        $config['total_rows'] =$this->wallet_model->WalletCount($keyword,$user_id);       
        $this->pagination->initialize($config); 
		$page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;		
		$this->data['pagination'] = $this->pagination->create_links();
        $this->data['txn_count']=$config['total_rows'];
        $this->data['records']=$this->wallet_model->WalletData($config["per_page"], $page ,$keyword,$user_id);
        $this->data['title']='Wallet';
        $this->data['content']='wallet/index';
        $this->load->view('admintemplate',$this->data);	
		
	}

    public function edit($id="")
    {
      
        if(!empty($id)){
            $this->data['record']=$this->common->record('users',['id'=>$id]);
        }
        if($this->input->server('REQUEST_METHOD')=='POST')
        {                
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|alpha_numeric_spaces');
            if(!empty($id)){
              
            }else{                    
                $this->form_validation->set_rules('phone', 'Mobile Number', 'trim|required|numeric|min_length[10]|max_length[10]|is_unique[users.phone]');
            }    
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
         
            if ($this->form_validation->run()== FALSE)
            {
                    
            }
            else
            {
                /*==================icon====================*/
                $this->load->library('upload');
                $this->load->library('image_lib');
                $config['upload_path'] = "./uploads/avatar/";
                $config['allowed_types'] = 'gif|jpg|png';
                $config['allowed_types'] = '*';
                $config['max_size']     = '0';
                $config['max_width'] = '0';
                $config['max_height'] = '0';
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                /*==================Icon upload====================*/
                if (! $this->upload->do_upload('avatar')) {
                } else {
                    $uploaddata =$this->upload->data();
                    $file_name =$uploaddata['file_name'];
                    $save['avatar']=$file_name;
                    $configer =  array(
                            'image_library'   => 'gd2',
                            'source_image'    =>  $uploaddata['full_path'],
                            'maintain_ratio'  =>  true,
                            'width'           =>  400,
                            'height'          =>  400,
                            );
                    $this->image_lib->clear();
                    $this->image_lib->initialize($configer);
                    $this->image_lib->resize();
                }
                
               
                $save['first_name']=$this->input->post('first_name');
                $save['last_name']=$this->input->post('last_name');
                $save['alternate_mobile_number']=$this->input->post('alternate_mobile_number');
               

                $password=trim($this->input->post('password'));
                if (!empty($password)) {
                    $save['password']=password_hash($password, PASSWORD_DEFAULT);
                }
               
                if (!empty($id)) {
                    $this->common->update("users", $save, ['id'=>$id]);
                } else {
                    $save['email']=$this->input->post('email');
                    $save['phone']=$this->input->post('phone');
                    $this->common->save("users", $save);
                }
                redirect("user");
            }
        }
        $this->data['title']='Edit';
        $this->data['content']='user/edit';
        $this->load->view('admintemplate',$this->data);	
    }



    public function groups()
	{
        $users=isAdmin();
        $this->data['records']=$this->common->records('users_groups');
        $this->data['title']='groups';
        $this->data['content']='user/groups';
        $this->load->view('admintemplate',$this->data);	
		
    }
    public function groupEdit($id="")
    {
      
        if(!empty($id)){
            $this->data['record']=$this->common->record('users_groups',['id'=>$id]);
        }
        if($this->input->server('REQUEST_METHOD')=='POST')
        {
                
            $this->form_validation->set_rules('name', 'Group Name', 'trim|required');  
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
         
            if ($this->form_validation->run()== FALSE)
            {
                    
            }
            else
            {
                
                $save['name']=$this->input->post('name');  
                $save['permissions']=json_encode($this->input->post('permissions')); 
               
                if(!empty($id)){
                    $this->common->update("users_groups",$save,['id'=>$id]); 
                }else{                    
                    $this->common->save("users_groups",$save);                   
                }     
                redirect("user/groups");       
                
            }
        }
        $this->data['title']='Edit';
        $this->data['content']='user/group_edit';
        $this->load->view('admintemplate',$this->data);	
    }
   
	
}
