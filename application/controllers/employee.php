<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Calcutta"); 
class Employee extends CI_Controller 
{
	public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common','employee_model']);

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

        $this->data['users']=$this->user_model->UserData($config["per_page"], $page, $keyword,$group_id,$role_id,$membership_status,$kyc_status);
        $this->data['title']='Users';
        $this->data['content']='user/index';
        $this->load->view('admintemplate', $this->data);
    }

    
	
}
