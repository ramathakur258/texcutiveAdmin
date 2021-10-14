<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Calcutta"); 
class User extends CI_Controller 
{
	public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common','user_model']);

    }
	public function index()
	{
        $users=isAdmin('user','view');
        $this->data['groups']=$this->common->records('users_groups');
        $this->data['roles']=$this->common->records('users_roles');
       
        $query="";
        $keyword=$this->input->get('keyword');
        $group_id=$this->input->get('group_id');
        $role_id=$this->input->get('role_id');
        $membership_status=$this->input->get('membership_status');
        $kyc_status=$this->input->get('kyc_status');   
       
        $query="?".http_build_query($this->input->get());
          
        $config=getPagination();
        $config['base_url'] = site_url("user".$query);
        $config['total_rows'] =$this->user_model->UserCount($keyword,$group_id,$role_id,$membership_status,$kyc_status);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['total_rows']=$config['total_rows'];
        $this->data['users']=$this->user_model->UserData($config["per_page"], $page, $keyword,$group_id,$role_id,$membership_status,$kyc_status);
       // print_r(  $this->data['users']);die;
        $this->data['title']='Users';
        $this->data['content']='user/index';
        $this->load->view('admintemplate', $this->data);
    }

    public function edit($id="")
    {
        $users=isAdmin('user','edit');
        if(!empty($id)){
            $this->data['record']=$this->common->record('users',['id'=>$id]);
            //echo "<pre>"; print_r( $this->data['record']); die;
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
                if($this->input->post('parent_id')){
                     $save['parent_id']=$this->input->post('parent_id');
                }
               
               

                $password=trim($this->input->post('password'));
                if (!empty($password)) {
                   // $save['password']=password_hash($password, PASSWORD_DEFAULT);
                    $save['password']=md5($password);
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
    public function editrolepermission($id="")
    {
        $user=isAdmin('user','permission');

        
        $this->data['roles']=$this->common->records("users_roles");
        $this->data['groups']=$this->common->records("users_groups");
        if(!empty($id)){
            $this->data['record']=$this->common->record('users',['id'=>$id]);
        }
        if($this->input->server('REQUEST_METHOD')=='POST' && $this->input->post("submit") =="permission")
        {                
            $this->form_validation->set_rules('group_id', 'Group name', 'trim|alpha_numeric_spaces|required');
            $this->form_validation->set_rules('role_id', 'Degination', 'trim|alpha_numeric_spaces|required');
             
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
         
            if ($this->form_validation->run()== FALSE)
            {
                    
            }
            else
            {
                $role=$this->common->record("users_roles",['id'=>$this->input->post('role_id')]);
                $save['user_group']=$this->input->post('group_id');
                $save['role']=$role->name;
                $save['role_id']=$this->input->post('role_id');            
                $this->common->update("users", $save, ['id'=>$id]);               
                redirect("user");
            }
        }
        if($this->input->server('REQUEST_METHOD')=='POST' && $this->input->post("submit") =="adduser")
        {                
            $this->form_validation->set_rules('username', 'Phone/Email', 'trim|required');             
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');         
            if ($this->form_validation->run()== FALSE) {
                    
            }
            else
            {                
                $sub_user=$this->common->record("users",['phone'=>$this->input->post('username')]);
                if($sub_user)
                {
                    $where=['user_id'=>$id,'child_user_id'=>$sub_user->id];
                    $status=$this->common->record("users_mapping",$where);
                    if($status){
                        $this->data['message']='<p class="alert alert-danger">Already exist<p>';
                    }else
                    {
                        if($id==$sub_user->id){
                            $this->data['message']='<p class="alert alert-danger">You cant assign to same account<p>';
                        }else{
                            $this->common->save("users_mapping",$where);
                            $this->data['message']='<p class="alert alert-success">Added Successful<p>';
                        }
                        
                    }                   

                }else{
                    $sub_user=$this->common->record("users",['email'=>$this->input->post('username')]);
                    if($sub_user)
                    {
                        $where=['user_id'=>$id,'child_user_id'=>$sub_user->id];
                        $status=$this->common->record("users_mapping",$where);
                        if($status){
                            $this->data['message']='<p class="alert alert-danger">Already exist<p>';
                        }else{
                            if($id==$sub_user->id){
                                $this->data['message']='<p class="alert alert-danger">You cant assign to same account<p>';
                            }else{
                                $this->common->save("users_mapping",$where);
                                $this->data['message']='<p class="alert alert-success">Added Successful<p>';
                            }
                        }
                    }else{
                     
                        $this->data['message']='<p class="alert alert-danger">User does not exist<p>';
                    }
                }
            }
        }
        if($this->input->server('REQUEST_METHOD')=='POST' && $this->input->post("delete") =="delete")
        {                
                          
            if($this->input->post("map_id")){
                $where=['id'=>$this->input->post("map_id")];
                $status=$this->common->remove("users_mapping",$where);                  
                $this->data['message']='<p class="alert alert-danger">Removed<p>';
            }  
        }
        $this->data['users']=$this->user_model->ChildUserData($id);
        $this->data['title']='Edit Role & Permission';
        $this->data['content']='user/edit_role_permission';
        $this->load->view('admintemplate',$this->data);	
    }


    public function editprofile()
    {
         $user=isAdmin();
         $id=$user->user_id;
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
                    $save['password']=md5($password);
                }
               
                if (!empty($id)) {
                    $this->common->update("users", $save, ['id'=>$id]);
                } else {
                    $save['email']=$this->input->post('email');
                    $save['phone']=$this->input->post('phone');
                    $this->common->save("users", $save);
                }
                redirect("dashboard");
            }
        }
        $this->data['title']='Edit';
        $this->data['content']='user/editprofile';
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
    public function roles()
	{
        $users=isAdmin();
        $this->data['records']=$this->common->records('users_roles');
        $this->data['title']='roles';
        $this->data['content']='user/roles';
        $this->load->view('admintemplate',$this->data);	
		
    }
    public function roleEdit($id="")
    {
      
        if(!empty($id)){
            $this->data['record']=$this->common->record('users_roles',['id'=>$id]);
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
                    $this->common->update("users_roles",$save,['id'=>$id]); 
                }else{                    
                    $this->common->save("users_roles",$save);                   
                }     
                redirect("user/roles");       
                
            }
        }
        $this->data['title']='Edit';
        $this->data['content']='user/role_edit';
        $this->load->view('admintemplate',$this->data);	
    }
    public function profile($id){
        if(!empty($id))
        {
            $this->data['record']=$this->common->record('users',['id'=>$id]);
            $this->data['role']=$this->common->record('users_roles',['id'=>$this->data['record']->role_id]);
            $this->data['referrals']=$this->common->records('users',['parent_id'=>$this->data['record']->id]);
            $this->data['wallet']=$this->user_model->UserWalletData($this->data['record']->id);
        }
        $this->data['title']='Profile';
        $this->data['content']='user/profile';
        $this->load->view('admintemplate',$this->data);	
    }

    public function stock($user_id)
	{
        $user=isAdmin('stock');
        $this->data['customer_id']=$user_id;
        $this->data['user']=$user;
        $this->data['records']=$this->common->records('sales_orders',['user_id'=>$user_id]);
        $this->data['title']='groups';
        $this->data['content']='user/stocks';
        $this->load->view('admintemplate',$this->data);	
		
    }
    public function stockAdd($user_id="")
    {    $user=isAdmin('stock');
        
        if($this->input->server('REQUEST_METHOD')=='POST')
        {
                
            $this->form_validation->set_rules('qty', 'Quantity', 'trim|required|numeric');  
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
         
            if ($this->form_validation->run()== FALSE)
            {
                    
            }
            else
            {
                
                $save['user_id']=$user_id; 
                $save['order_type']="buy";
                $save['qty']=$this->input->post('qty'); 
                $save['status']="delivered";
                $save['edit_by']=$user->user_id;                                 
                $this->common->save("sales_orders",$save);                  
                 
                redirect("user/stock/".$user_id);       
                
            }
        }
        $this->data['title']='Edit';
        $this->data['content']='user/stock_add';
        $this->load->view('admintemplate',$this->data);	
    }
    public function luckyNumbers()
	{
        $users=isAdmin('user','view');
        $this->data['groups']=$this->common->records('users_groups');
        $this->data['roles']=$this->common->records('users_roles');
       
        $query="";
        $keyword=$this->input->get('keyword');
        $group_id=$this->input->get('group_id');
        $role_id=$this->input->get('role_id');
        $membership_status=$this->input->get('membership_status');
        $kyc_status=$this->input->get('kyc_status');   
       
        $query="?".http_build_query($this->input->get());
          
        $config=getPagination();
        $config['base_url'] = site_url("user/luckyNumbers".$query);
        $config['total_rows'] =$this->user_model->LuckyNumberCount($keyword,$group_id,$role_id,$membership_status,$kyc_status);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['total_rows']=$config['total_rows'];
        $this->data['users']=$this->user_model->LuckyNumberData($config["per_page"], $page, $keyword,$group_id,$role_id,$membership_status,$kyc_status);
        $this->data['title']='Users';
        $this->data['content']='user/lucky_number';
        $this->load->view('admintemplate', $this->data);
    }
   
	
}
