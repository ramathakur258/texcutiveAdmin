<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Calcutta"); 
class Tree extends CI_Controller 
{
	public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common',"tree_model"]);

        $this->load->database();

    }
        public function index()
        {
                $user=isAdmin();  

                
                $this->data['treedata']=$this->tree_model->getTree($user->user_id);
               // echo "<pre>";print_r($this->data['treedata']); die;
                $this->data['user']=$user;
                $this->data['content']='user/tree';
                $this->load->view('admintemplate',$this->data);	

        }
        public function UpdateTree(){
       
                $user=isAdmin();  

                
                $treedata=$this->tree_model->getTree($user->user_id);
                //echo "<pre>";print_r($treedata); die;
                 
                if(!empty($treedata->child))
                {
                    
                    $this->updatedata($treedata);
                    foreach($treedata->child as $row1)
                    {                   
                        if(!empty($row1->child))
                        {
                            $this->updatedata($row1);
                            foreach($row1->child as $row2)
                            {
                                if(!empty($row2->child))
                                {
                                        $this->updatedata($row2);
                                    foreach($row2->child as $row3)
                                    {
                                        if(!empty($row3->child))
                                        {
                                                $this->updatedata($row3);
                                            foreach($row3->child as $row4)
                                            { 
                                                if(!empty($row4->child))
                                                {
                                                        $this->updatedata($row4);
                                                    foreach($row4->child as $row5)
                                                    { 
                                                        if(!empty($row5->child))
                                                        {
                                                                $this->updatedata($row5);
                                                            foreach($row5->child as $row6)
                                                            { 
                                                                if(!empty($row6->child))
                                                                {
                                                                        $this->updatedata($row6);
                                                                    foreach($row6->child as $row7)
                                                                    {    
                                                                        if(!empty($row7->child))
                                                                        {
                                                                            $this->updatedata($row7);
                                                                            foreach($row7->child as $row8)
                                                                            {    
                                                                                if(!empty($row8->child))
                                                                                {
                                                                                        $this->updatedata($row8);
                                                                                    foreach($row8->child as $row9)
                                                                                    {    
                                                                                        if(!empty($row9->child))
                                                                                        {
                                                                                             $this->updatedata($row9);
                                                                                            foreach($row9->child as $row10)
                                                                                            {    
                                                                                                if(!empty($row10->child))
                                                                                                {
                                                                                                        $this->updatedata($row10);
                                                                                                    foreach($row10->child as $row11)
                                                                                                    {    
                                                                                                        if(!empty($row11->child))
                                                                                                        {
                                                                                                                $this->updatedata($row11);
                                                                                                            foreach($row11->child as $row12)
                                                                                                            {    
                                                                                                                $this->updatedata($row12);
                                                                                                            }  
                                                                                                            
                                                
                                                                                                        }else{
                                                                                                                $this->updatedata($row11);
                                                                                                        }  
                                                                                                    }  
                                                                                                    
                                        
                                                                                                }else{
                                                                                                        $this->updatedata($row10);
                                                                                                }  
                                                                                            }  
                                                                                            
                                
                                                                                        }else{
                                                                                                $this->updatedata($row9);
                                                                                        }  
                                                                                    }  
                                                                                   
                        
                                                                                }else{
                                                                                        $this->updatedata($row8);
                                                                                }  
                                                                            }  
                                                                            
                
                                                                        }else{
                                                                                $this->updatedata($row7);
                                                                        }  
                                                                    }  
        
                                                                }else{
                                                                        $this->updatedata($row6);
                                                                }                                        
                                        
                                        
                                                            }  

                                                        }else{
                                                                $this->updatedata($row5);
                                                        }                                       
                                
                                
                                                    }  
        
                                                }else{
                                                        $this->updatedata($row4);
                                                }                                      
                        
                        
                                            }  

                                        }else{
                                                $this->updatedata($row3);
                                        }                                        
                
                
                                    }  
                                  

                                }else{
                                        $this->updatedata($row2);
                                } 
                            }
                          
                        }else{
                                $this->updatedata($row1);
                        }
                      
                    }
                }else{
                        $this->updatedata($treedata);
                } 
                
                
                redirect('dashboard');

            
    }
    public function updatedata($appdata)
    {
        		
       //echo "<pre>";print_r($appdata);die;
        $record['my_stock']=$appdata->stock;
        $record['total_stock']=$appdata->allstock;
       // $record['distributor']=$treedata->id;
       // $record['partner']=$treedata->id;
       // $record['employee']=$treedata->id;
        $record['my_customer']=$appdata->total;
        $record['my_paid_customer']=$appdata->paid;
        $record['my_unpaid_customer']=$appdata->unpaid;
        $record['total_customer']=$appdata->alltotal;
        $record['total_paid_customer']=$appdata->allpaid;
        $record['total_unpaid_customer']=$appdata->allunpaid;
        $record['updated_at']=date("Y-m-d H:i:s");        
        $res_user=$this->common->record("dashboard",['user_id'=>$appdata->id]);

        if($res_user)
        {
                echo $this->common->update("dashboard",$record,['id'=>$res_user->id]);
        }else{
                $record['user_id']=$appdata->id;
                echo $this->common->save("dashboard",$record);
        }

    }
       
}
