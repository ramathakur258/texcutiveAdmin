<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Calcutta"); 
class Sales extends CI_Controller 
{
	public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common']);
        $this->load->database();
    }
    public function index()
    {
        $user=isAdmin();  
        $this->data['records']=$this->common->records('sales_orders',['user_id'=>$user->user_id]);
        $this->data['user']=$user;
        $this->data['content']='sales/buy_orders';
        $this->load->view('admintemplate',$this->data);	

    }
    public function saleEdit($id="")
    {
        $user=isAdmin(); 
        if(!empty($id)){
            $this->data['record']=$this->common->record('sales_orders',['id'=>$id]);
        }   
        if($this->input->server('REQUEST_METHOD')=='POST')
        {
                
            $this->form_validation->set_rules('qty', 'Code Quantity', 'trim|required|numeric');  
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
         
            if ($this->form_validation->run()== FALSE)
            {
                    
            }
            else
            {
                
                $save['qty']=$this->input->post('qty');  
               
                if(!empty($id)){
                    $this->common->update("sales_orders",$save,['id'=>$id]); 
                }else{  
                    $save['user_id']=$user->user_id;           
                    $this->common->save("sales_orders",$save);                   
                }     
                redirect("sales");       
                
            }
        }      
        $this->data['content']='sales/edit_order';
        $this->load->view('admintemplate',$this->data);	

    }
    public function request($id="")
    {
        $user=isAdmin(); 
        $this->data['records']=[]; 
        $childusers=$this->common->records('users_mapping',['user_id'=>$user->user_id]);
        if($childusers)
        {
            $in_user=[];          
            foreach($childusers as $row){
                $in_user[]=$row->child_user_id;
            }

            $this->db->select("ord.*");
            $this->db->from("sales_orders as ord");
            $this->db->where_in('ord.user_id',$in_user);
            $query=$this->db->get();
            if($query->num_rows() > 0){

                $this->data['records']=$query->result();

            }
        }
        $this->data['user']=$user;
        $this->data['content']='sales/sell_orders';
        $this->load->view('admintemplate',$this->data);	
    }
    public function confirmed($id="")
    {
        $user=isAdmin(); 

        $stock=$this->currentStock($user->user_id); 
        if ($stock > 1) {
            $order=$this->common->record('sales_orders', ['id'=>$id,'status'=>'pending']);
            if ($order) {
                $update['edit_by']=$user->user_id;
                $update['status']="confirmed";
                $this->common->update('sales_orders', $update, ['id'=>$id]);
                $this->session->set_flashdata('alert', '<span class="alert alert-success">Order Confirmed successfully</span>');
            }
        }else{
            $this->session->set_flashdata('alert', '<span class="alert alert-danger">Currently Stock not available</span>');
        }
        redirect('sales/request');

    }
    public function rejected($id="")
    {
        $user=isAdmin(); 

        $order=$this->common->record('sales_orders',['id'=>$id,'status'=>'pending']);
        if($order)
        {
            $update['status']="rejected";
            $this->common->update('sales_orders',$update,['id'=>$id]);
            redirect('sales/request');

            $this->session->set_flashdata('alert', '<span class="alert alert-success">Order Confirmed successfully</span>');


        }
        redirect('sales/request');

    }
    public function cancelled($id="")
    {
        $user=isAdmin(); 

        $order=$this->common->record('sales_orders',['id'=>$id,'status'=>'confirmed']);
        if($order)
        {
            $update['status']="cancelled";
            $this->common->update('sales_orders',$update,['id'=>$id]);
            redirect('sales/request');

            $this->session->set_flashdata('alert', '<span class="alert alert-success">Order Confirmed successfully</span>');


        }
        redirect('sales/request');

    }
    public function dispatch($id="")
    {
        $user=isAdmin(); 

        $order=$this->common->record('sales_orders',['id'=>$id,'status'=>'confirmed','edit_by'=>$user->user_id]);
        if($order)
        {
            $update['status']="dispatched";
            $this->common->update('sales_orders',$update,['id'=>$id]);
            redirect('sales/request');

            $this->session->set_flashdata('alert', '<span class="alert alert-success">Order Confirmed successfully</span>');


        }
        redirect('sales/request');

    }
    public function received($id="")
    {
        $user=isAdmin(); 

        $order=$this->common->record('sales_orders',['id'=>$id,'status'=>'dispatched','user_id'=>$user->user_id]);
        if($order)
        {
           
            $update['status']="delivered";
            $this->common->update('sales_orders',$update,['id'=>$id]);
            redirect('sales/request');

            $this->session->set_flashdata('alert', '<span class="alert alert-success">Order Received successfully</span>');


        }
        redirect('sales/request');

    }
    public function currentStock($user_id="")
    {
        $this->db->select_sum('qty');
        $this->db->from('sales_orders');
        $this->db->where(['user_id'=>$user_id,'order_type'=>'buy','status'=>'delivered']);
        $buy=$this->db->get()->row()->qty;

        $this->db->select_sum('qty');
        $this->db->from('sales_orders');
        $this->db->where(['edit_by'=>$user_id,'order_type'=>'buy','status'=>'delivered']);
        $sell=$this->db->get()->row()->qty;

        if(!empty($buy)){
            $buy=$buy;
        }else{
            $buy=0;
        }
        if(!empty($sell)){
            $sell=$sell;
        }else{
            $sell=0;
        }
        return ($buy-$sell);
    }
       
}
