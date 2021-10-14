<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Calcutta"); 
class Standbyphone extends CI_Controller 
{
	public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common','Standbyphone_model']);

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
        $config['base_url'] = site_url("Standbyphone".$query);
        $config['total_rows'] =$this->Standbyphone_model->RequestCount($keyword);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['total_rows']=$config['total_rows'];
        $this->data['request']=$this->Standbyphone_model->RequesData($config["per_page"], $page, $keyword);
       // print_r($this->data['request']);die;
        $this->data['title']='Request';
        $this->data['content']='Standbyphone/request';
        $this->load->view('admintemplate', $this->data);
    }
    public function membership()
	{
       $user=isAdmin();
       $this->data['user']=$user;
        
        $query="";
        $keyword=$this->input->get('keyword');
        if(!empty($keyword)){
            $query="?keyword=".$keyword;
        }  
          
        $config=getPagination();
        $config['base_url'] = site_url("Standbyphone/membership".$query);
        $config['total_rows'] =$this->Standbyphone_model->MembershipCount($keyword);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['total_rows']=$config['total_rows'];
        $this->data['membership']=$this->Standbyphone_model->MemberData($config["per_page"], $page, $keyword);
        // print_r($this->data['membership']);die;
        $this->data['title']='Membership';
        $this->data['content']='Standbyphone/membership';
        $this->load->view('admintemplate', $this->data);
    }
    public function package()
	{
       $user=isAdmin();
       $this->data['user']=$user;
        
        $query="";
        $keyword=$this->input->get('keyword');
        if(!empty($keyword)){
            $query="?keyword=".$keyword;
        }  
          
        $config=getPagination();
        $config['base_url'] = site_url("Standbyphone/package".$query);
        $config['total_rows'] =$this->Standbyphone_model->packageCount($keyword);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['total_rows']=$config['total_rows'];
        $this->data['package']=$this->Standbyphone_model->packageData($config["per_page"], $page, $keyword);
        $this->data['title']='Package';
        $this->data['content']='Standbyphone/packages';
        $this->load->view('admintemplate', $this->data);
    }


    
   
	
}
