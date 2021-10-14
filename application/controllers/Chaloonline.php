<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Calcutta"); 
class Chaloonline extends CI_Controller 
{
	public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common',"chaloonline_model"]);

        $this->load->database();

    }
    public function index()
    {
            $user=isAdmin();  

            
            $this->data['treedata']=$this->chaloonline_model->getTree($user->user_id);
         //   echo "<pre>";print_r($this->data['treedata']); die;
           $user->payment_received="10";
        $user->payment_due="10";
        $user->total="10";
        $user->incentive="10";
       // echo "<pre>";print_r( $user); die;
            $this->data['user']=$user;
            $this->data['content']='chaloonline/chaloonline_tree';
            $this->load->view('admintemplate',$this->data);	

    }
    public function check_user()
    {
        $user=isAdmin();  
        $response=[];
        $user_id=$this->input->post('user_id');
        $sub_user=$this->common->record("users",['phone'=>$this->input->post('phone')]);
        if($sub_user)
        {
           
            $where=['user_id'=>$user_id,'child_user_id'=>$sub_user->id];
            $status=$this->common->record("chaloonline_map",$where);
          
            if($status){
                    echo '<p class="alert alert-warning">Already exist</p>';
            }else
            {
                if($user_id==$sub_user->id){
                    echo '<p class="alert alert-danger">You cant assign to same account</p>';
                }else{
                    
                    $savedata=[
                        'user_id'=>$user_id,
                        'child_user_id'=>$sub_user->id
                        ];
                    
                    $payment_received=$this->input->post('payment_received');
                    if(!empty($payment_received)){
                        $savedata['payment_received']=$payment_received;
                    }
                    $payment_due=$this->input->post('payment_due');
                    if(!empty($payment_due)){
                        $savedata['payment_due']=$payment_due;
                    }
                    $incentive=$this->input->post('incentive');
                    if(!empty($incentive)){
                        $savedata['incentive']=$incentive;
                    }
                    $total=$this->input->post('total');
                    if(!empty($total)){
                        $savedata['total']=$total;
                    }
                    
                    
                       
                    
                    
                    
                   
                    
                    $this->common->save("chaloonline_map",$savedata);
                    echo '<p class="alert alert-success">Added Successful</p>';
                }
                
            }  
        }else{
            echo '<p class="alert alert-danger">Invalid Number</p>';
        }
        
    }
    public function update_detail()
    {
        $user=isAdmin();  
        $response=[];
        $map_id=$this->input->post('map_id');
        $user_id=$this->input->post('user_id');
        $child_user_id=$this->input->post('child_user_id');
        $where=[
            'id'=> $map_id,
            'user_id'=>$user_id,
            'child_user_id'=>$child_user_id
            ];
        $mapdetail=$this->common->record("chaloonline_map",$where);
        if( $mapdetail)
        {
           
            
                    
                    $savedata=[];
                    
                    $payment_received=$this->input->post('payment_received');
                    if(!empty($payment_received)){
                        $savedata['payment_received']=$payment_received;
                    }
                    $payment_due=$this->input->post('payment_due');
                    if(!empty($payment_due)){
                        $savedata['payment_due']=$payment_due;
                    }
                    $incentive=$this->input->post('incentive');
                    if(!empty($incentive)){
                        $savedata['incentive']=$incentive;
                    }
                    $total=$this->input->post('total');
                    if(!empty($total)){
                        $savedata['total']=$total;
                    }
                    
                    $this->common->update("chaloonline_map",$savedata,$where);
                    echo '<p class="alert alert-success">Update Successful</p>';
        
        }else{
            echo '<p class="alert alert-danger">Invalid User</p>';
        }
        
    }
    public function sub_users()
    {
        $user=isAdmin();  
        $response=[];
        $user_id=$this->input->post('user_id');
        
        $this->db->select("chaloonline_map.* ,users.first_name,users.last_name,users.phone");
        $this->db->from("chaloonline_map");
        $this->db->join("users","users.id=chaloonline_map.child_user_id","LEFT");
        $this->db->where(["chaloonline_map.user_id"=>$user_id]);
        $query= $this->db->get();

        if($query->num_rows() > 0)
        {
            ?>
            <table class="table table-sm">
                <tr>
                    <td>Name</td>
                    <td>Action</td>
                </tr>
               <?php
            $users=$query->result();
            foreach($users as $row){
                ?>
                <tr>
                    <td><?php echo $row->first_name." ".$row->last_name." ".$row->phone ?></td>
                    <td></td>
                </tr>
               <?php
            }
            
            ?>
            </table>
            <?php
           
            
        }else{
            echo '<p class="alert alert-warning">No Record Found</p>';
        }
        
    }
    
       
}
