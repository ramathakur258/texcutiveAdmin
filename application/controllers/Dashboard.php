<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Calcutta"); 
class Dashboard extends CI_Controller 
{
	public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session']);
        $this->load->model(['common','dashboard_model']);

    }
	public function index()
	{
        $user=isAdmin();
        $this->data['dashboard']=$this->dashboard_model->detail($user);
        $this->data['title']='dashboard';
        $this->data['content']='dashboard/index';
        $this->load->view('admintemplate',$this->data);	
		
	}
	
}
