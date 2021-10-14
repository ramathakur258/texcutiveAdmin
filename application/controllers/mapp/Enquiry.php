<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata"); 
class Enquiry extends CI_Controller 
{
    public $data=[];
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common','mapp/enquiry_model']);

    }
    public function index(){
        $users=isAdmin('appenquiry','view');
       $merchantId=$this->session->userdata('user_id');
        $query="";
        $keyword=$this->input->get('keyword');
        if (!empty($keyword)) {
            $query="?keyword=".$keyword;
        }       
        $config=getPagination();
        $config['base_url'] = site_url("mapp/enquiry".$query);
        $config['total_rows'] =$this->enquiry_model->Count($keyword);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();

        $this->data['result']=$this->enquiry_model->List($config["per_page"], $page, $keyword);
       // print_r($this->db->last_query()); die;
        $this->data['title']='Enquiry';
        $this->data['content']='mapp/enquiry/index';
        $this->load->view('admintemplate', $this->data);
    }
   
    
    
    public function detail($id=""){
        
         if(!empty($id)){
            $this->data['record']=$this->enquiry_model->details($id);
            
         }
         
          if($this->input->server('REQUEST_METHOD')=='POST'){
              
             
               if($this->input->post('features')){
                    $setdata['features']=implode(',',$this->input->post('features'));
                }
                 $setdata['amount']=$this->input->post('amount');
                 $setdata['user_id']=$id;
                 $setdata['approval_status']='approved';
                  $set['user_id']=$id;
                  $this->common->update('shop_user_approval',$setdata, $set);
                  $this->session->set_flashdata('success','Approved Successfully');
                  redirect('mapp/enquiry');
                 
                 
          }
       
        
          $this->data['content']='mapp/enquiry/detail';
        $this->load->view('admintemplate', $this->data); 
    }
    
    
   public function generate_id($id=""){
       
         $shop =$this->common->record('shop_enquiry_user',['id'=>$id]);
         $shop_detail =$this->common->record('shop_enquiry_user_detail',['user_id'=>$id]);
         $shop_approval =$this->common->record('shop_user_approval',['user_id'=>$id]); 
     
          $template =$this->common->record('mapp_template_setting',['shop_enquiry_id'=>$id]); 
         
            $user_data =$this->common->record('users',['phone'=>$shop->mobile]);
            if(!empty($user_data)){
                
                            if(!empty($template)){
                               $temp_update['merchant_id'] =   $user_data->id;
                               $where_shop['shop_enquiry_id'] = $shop->id;
                               $this->common->update('mapp_template_setting',$temp_update, $where_shop);
                            }
                
                        $updatedata['customer_type']= 1;
        				$updatedata['status']= 1;
        				$updatedata['shop_enquiry_id']= $shop->id;
        				$updatedata['password']= md5(123456);
        				
        				$phone['phone']= $shop->mobile; 
				    	$update = $this->common->update('users',$updatedata, $phone);
				    	
				    	if($update){
				    	    
				    	    
				    	    	$set['user_id']= $shop->id;
                        		$set['payment_type']='offline';
                        		$set['payment_status']= 'TXN_SUCCESS';
                        		$set['amount']=$shop_approval->amount;
                        		$set['response_msg']='payment done offline'; 
                        		
                        		$payment = $this->common->save('shop_app_payment',$set);
                        		
                            	if($payment){
                            	   	$save['payment_status']='completed';
                            	   	
                            		$user['user_id']= $shop->id;
                            		$update_final = $this->common->update('shop_user_approval',$save, $user); 
                            		
                            		if($update_final){
                            		     redirect('mapp/enquiry');
                            		}
                            	}
                            
				    	}
            }else{
                
                
               	$save['first_name']=  $shop->first_name;
				$save['last_name']=  $shop->last_name;
				$save['email']= $shop->email; 
				$save['phone']= $shop->mobile; 
			//	$save['password']= $shop->password; 
				$save['password']= md5(123456); 
				$save['gender']= $shop->gender; 
				$save['dob']= $shop->dob ;
				$save['city']= $shop_detail->city; 
				$save['state']= $shop_detail->state ;
				$save['address']= $shop_detail->address1 ;
				$save['zip_code']= $shop_detail->pincode; 
				$save['user_group']= 2;
				$save['customer_type']= 1;
				$save['status']= 1;
				$save['shop_enquiry_id']= $shop->id;
				$save['role_id']= 8; 
				
				$register_user = $this->common->save('users',$save);
				
				 if(!empty($template)){
				       $u_data =$this->common->record('users',['phone'=>$shop->mobile]);
                               $temp_update['merchant_id'] =   $u_data->id;
                               $where_shop['shop_enquiry_id'] = $shop->id;
                               $this->common->update('mapp_template_setting',$temp_update, $where_shop);
                  }
				
				if($register_user){
				    
				            	$set['user_id']= $shop->id;
                        		$set['payment_type']='offline';
                        		$set['payment_status']= 'TXN_SUCCESS';
                        		$set['amount']=$shop_approval->amount;
                        		$set['response_msg']='payment done offline'; 
                        		
                        		$payment = $this->common->save('shop_app_payment',$set);
                        		
                            	if($payment){
                            	   	$s['payment_status']='completed';
                            	   	
                            		$user['user_id']= $shop->id;
                            		$update_final = $this->common->update('shop_user_approval',$s, $user); 
                            		
                            		if($update_final){
                            		     redirect('mapp/enquiry');
                            		}
                            	}
				}
            }
        
   }
   
   
  public function assign_template($shopid="",$userid=""){
       
        if($this->input->server('REQUEST_METHOD')=='POST'){
           
      
      
      
              if(!empty($_FILES['logo_image']['name'])){
                    $extension =  pathinfo($_FILES['logo_image']['name'],PATHINFO_EXTENSION);
                    $filename=$userid.'-'.strtolower(str_replace(' ','-',$_FILES['logo_image']['name'])).'.'.$extension;
                    $fileContent = file_get_contents($_FILES["logo_image"]["tmp_name"]);
                    $cloudPath = 'logo/' .$filename;
                    upload_file($cloudPath,$fileContent);
                    $setdata['logo_image']=$filename;
                    
                    $logo=$this->common->record('mapp_logo',['merchant_id'=>$userid]);    
       
     
                     if($logo){
                        $this->common->update('mapp_logo',$setdata,['merchant_id'=>$userid]);
                        $this->session->set_flashdata('success','Logo Updated Successfully');
                       
                    }else{
                        $setdata['merchant_id']=$userid;
                        $this->common->save('mapp_logo',$setdata);
                        $this->session->set_flashdata('success','Logo Added Successfully');
                       
                    }   
                    
                }
            
      
           
           $save['app_theme'] = $this->input->post('app_theme');
           $save['header_color'] = $this->input->post('header_color');
           $save['background_color'] = $this->input->post('background_color');
           $save['text_color'] = $this->input->post('text_color');
           $save['merchant_id'] = $userid;
           $save['shop_enquiry_id'] = $shopid;
           
           $p = $this->input->post('permission');
           if(!empty($p)){
               $save['view_permission'] = json_encode($p);
           }
           
           
           
      $temp_record =$this->common->record('mapp_template_setting',['shop_enquiry_id'=>$shopid,'merchant_id'=>$userid]);    
              if($temp_record){
                  $where['shop_enquiry_id'] = $shopid ;
                  $update_final = $this->common->update('mapp_template_setting',$save, $where); 
                    redirect('mapp/enquiry');
              }else{
                  $this->common->save('mapp_template_setting',$save);
                     redirect('mapp/enquiry');
              }
           
            
        }
        
          $this->data['record'] =$this->common->record('mapp_template_setting',['shop_enquiry_id'=>$shopid]);
          $this->data['permission'] =$this->common->records('mapp_template_permission_section');  
           $this->data['template'] =$this->common->records('mapp_template');  
          $this->data['logo']=$this->common->record('mapp_logo',['merchant_id'=>$userid]);     
          
            $this->data['shop_id'] =$shopid;
        $this->data['content']='mapp/enquiry/template';
        $this->load->view('admintemplate', $this->data); 
  }
   
   
   public function get_permission_section(){
     //  print_r( ); die;
         $id = $this->input->post('template');
         $shopid =  $this->input->post('shop_id');
         
        //  $data = $this->common->record_in('mapp_template_permission_section',array(0,$id));
        // $data = $this->common->record_in('mapp_template_permission_section',$id);
         
         
         
            $sql='SELECT * FROM mapp_template_permission_section WHERE FIND_IN_SET('.$id.', REPLACE( REPLACE(  REPLACE(`template_id` , \'"\', \'\'), \'[\', \'\'), \']\',\'\'))' ; 
            $query = $this->db->query($sql);      
             $data =  $query->result_array();
         $permission_array = [];
         $template =$this->common->record('mapp_template_setting',['shop_enquiry_id'=>$shopid]);
         if($template){
             $permission_array =  json_decode($template->view_permission);
         }
         
       
         foreach($data as $d){
         
             echo "<div>";
             echo "<input type='checkbox' class='custom-control-input' name='permission[]' id='p".$d['p_section_id']."'";
            if(in_array($d['p_section_id'], $permission_array)) { echo " checked "; }  echo " value='".$d['p_section_id'] ."'/>";
            
          echo "<label class='custom-control-label mr-5' for='p".$d['p_section_id']."'>";
           
          echo  "<strong>ID: </strong>".$d['p_section_id'];  '&nbsp;&nbsp; ';
          echo "&nbsp;&nbsp;";
          echo "<strong>name:  </strong>".$d['section_name']."</label>";
         echo "</div>";
         }
       //  echo json_encode($data);
       
      
     
   }
   
    
    
    
    
    
    
    
    
}