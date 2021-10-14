<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata"); 
class Order extends CI_Controller 
{
    public $data=[];
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common','mapp/order_model']);

    }
    public function index(){
   
        $merchantId=$this->session->userdata('user_id');
        $query="";
        $this->data['keyword']=$keyword=trim($this->input->get('keyword'));
        if (!empty($keyword)) {
            $query="?keyword=".$keyword;
        }       
        $config=getPagination();
        $config['base_url'] = site_url("mapp/order".$query);
        $config['total_rows'] = $this->data['total_rows'] = $this->order_model->Count($keyword,$merchantId);
       
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();

        $this->data['result']=$this->order_model->List($config["per_page"], $page, $keyword,$merchantId);
        $this->data['title']='Order';
        $this->data['content']='mapp/order/index';
        $this->load->view('admintemplate', $this->data);
    }
   
   

 public function check_order_name($order,$value){
        $merchantId=$this->session->userdata('user_id');
        $explode=explode(',',$value);
        if(isset($explode[1]) && $explode[1]!=""){
            $record = $this->common->record('mapp_orders',['id'=>$explode[1]]);
            if($record->merchant_id==$merchantId){
                $check= $this->common->record('mapp_orders',['merchant_id'=>$merchantId,'id!='=>$explode[1]]);
                
            }else{
                // $this->form_validation->set_message('check_order_name','Something Wrong');
            }
            return false;
        }else{
            $check= $this->common->record('mapp_orders',['merchant_id'=>$merchantId]);
           
        }
        return true;
    }

    public function order_detail($id){
        $this->data['order_status_list']=$this->common->records('mapp_order_status');
        $this->data['result']=$this->order_model->OrderDetailList($id);
        $this->data['title']='Order Details';
        $this->data['content']='mapp/order/order_detail';
        $this->data['order_id']=$id;
        $this->load->view('admintemplate', $this->data);
    
    }
  
  
  
   public function changeOrderDetailStatus() {
        if($this->input->server('REQUEST_METHOD') == 'POST'){
           $row = $this->common->record('mapp_order_details',['order_detail_id'=>$this->input->post('order_detail_id')]);
           if($row) {
                if($this->common->update('mapp_order_details',['order_status_id'=>$this->input->post('order_status_id')],['order_detail_id'=>$this->input->post('order_detail_id')])){
                    if($this->common->save('mapp_order_detail_status',['order_id'=>$row->order_id,
                    'order_detail_id' =>$row->order_detail_id, 'order_status_id' =>$this->input->post('order_status_id'),  'order_note' =>$this->input->post('order_note')]))
                    {
                         $this->session->set_userdata('success_msg', "Status Update Successfully");
                    } else{
                         $this->session->set_userdata('success_msg', "fail");
                    }
                    
                } else{
                    $this->session->set_userdata('success_msg', "fail");
                }
                 redirect('mapp/order/order_detail/'.$row->order_id);
            }else{
               $this->session->set_userdata('success_msg', "fail");
            }
        } 
        redirect('mapp/order');
    }
    
  
   public function ChangeOrderStatus(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            if($this->common->update('mapp_orders',['order_status'=>$this->input->post('status')],['order_id'=>$this->input->post('id')])){
                return response(['status'=>'success']);
            }else{
                return response(['status'=>'fail']);
            }
        }
    }
    
    public function ChangePaymentStatus(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            if($this->common->update('mapp_orders',['payment_status'=>$this->input->post('status')],['order_id'=>$this->input->post('id')])){
                return response(['status'=>'success']);
            }else{
                return response(['status'=>'fail']);
            }
        }
    }
  
  
    
}
    
    
    
    
    
    
    
    
