<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Calcutta"); 

class V1 extends CI_Controller
{
	private $modelPath='api/v1/';
	private $request=[];
	public function __construct() {
		parent::__construct();
		$this->load->helper('api_helper');
        $this->request=params();
        $this->load->model('common');
		$this->load->library('form_validation');
    }

  
    public function Login()
	{	 
	    if($this->input->server('REQUEST_METHOD')=='POST'){
	     	$this->load->model($this->modelPath.'auth');
			 $request = (object)$this->input->post();
			 $response = [];
             $result = $this->auth->login($request,$response);
			 print_r($result);
			//return $this->response($this->auth->Login($this->request()));
		}else{
			return $this->invalidMethod();
		}	    
	}

    public function register()
	{	 
	    if($this->input->server('REQUEST_METHOD')=='POST'){
	        $this->load->model($this->modelPath.'auth');
		    $request = (object)$this->input->post();
		    $response = [];
			$result =  $this->auth->register($request,$response);
			print_r($result);
		}else{
			return $this->invalidMethod();
		}	    
	}
	public function vehicle_info()
	{   
        if($this->input->server('REQUEST_METHOD')=='POST'){
			$this->load->model($this->modelPath.'auth');
			$request = (object)$this->input->post();
			$response = [];
			$result = $this->auth->vehicle_info($request,$response);
			//print_r(1); die;
			print($result);
		}else{
			return $this->invalidMethod();
		}

	}

	// public function register()
	// {	 
		
	//     if($this->input->server('REQUEST_METHOD')=='POST'){
		
	//      	 $this->load->model($this->modelPath.'auth');
	// 		// print_r(1); die;
	// 		return $this->response($this->auth->register($this->request()));
	// 		//return $this->auth->register($t);
			
			
	// 	}else{
	// 		return $this->invalidMethod();
	// 	}	    
	//}
   
	public function testApi()
	{
		$query=$this->db->query('select * from delapp_drivers');
		//print_r($query->result());
		echo json_encode($query->result());
		//return $this->response();
	}
}