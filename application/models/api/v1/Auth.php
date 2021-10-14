<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();     
        $this->load->helper("api"); 
        $this->load->model("common");  
        $this->load->library('form_validation');
    }
    //login API
    public function Login($request=[],$response=[])
    {
        $user = $this->common->record('delapp_drivers',['mobile'=>$request->mobile]);    
        if($user)
        {   
            if(md5($request->password) == $user->password)
            {                 
                $access_token = uniqid().md5(time());
                $updatedata=[
                    'access_token'=>$access_token,
                    'device_type'=>$request->device_type,
                ];
                if($this->common->update('delapp_drivers', $updatedata, ['id'=>$user->id]))
                { 
                    $user=$this->common->record('delapp_drivers',['id'=>$user->id]); 
                    if($user){
                        $response = ['code'=>200,'status'=>'success','message'=>'Login Successful','data'=> $user];
                    }  
                }else{ 
                    $response=['code'=>200,'status'=>'fail','message'=>'Network Fail'];
                }
            }else{	
                $response=['code'=>200,'status'=>'fail','message'=>'Password is Wrong'];
            }            
        }else{
            $response=["code"=>200,'status'=>'fail','message'=>'Invalid Mobile Number' ];
        }
          return $response;
    }
    //registration API
    public function register($request=[],$response=[])
    {
        
        $saverow['first_name'] = $request->first_name;
        $saverow['last_name'] = $request->last_name;
        $saverow['mobile'] = $request->mobile;  
        $saverow['email'] = $request->email; 
        $saverow['password'] = $request->password;  
        $this->form_validation->set_data($saverow);
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('mobile', 'mobile', 'trim|required|numeric|min_length[10]|max_length[10]|regex_match[/^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/])');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[delapp_drivers.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[8]');
        if($this->form_validation->run() !== FALSE){
            $user = $this->common->record('delapp_drivers',['mobile '=>$request->mobile ]);
            if($user){
                $response=["code"=>200,'status'=>'fail','message'=>'mobile number is  already registered' ];  
            }else{
                $saverow['password'] = md5($request->password);
                $this->db->insert('delapp_drivers', $saverow);
                $insertId = $this->db->insert_id();   
                if($insertId){
                    $update = $this->common->update('delapp_drivers',$saverow,array('id'=>$insertId)); 
                    $response = ['code'=>200,'status'=>'success','message'=>'Registered Successfully']; 
                }       
            }
        }else{
            $error = validation_errors();
            //$error="Something went Wrong";
            if(form_error('first_name')){

                $error=form_error('mobile');
            }elseif(form_error('last_name')){

                $error=form_error('mobile');
            }elseif(form_error('mobile')){

                $error=form_error('mobile');
            }elseif(form_error('password')){

                $error=form_error('password');

            }elseif(form_error('email')){

                $error=form_error('email');
            }
            $response=["code"=>200,'status'=>'fail','message'=>strip_tags($error)];  
        }
        return $response;
    }
    public function vehicle_info($request=[],$response=[]){

          $saverow['vehicle_name'] = $request->vehicle_name;
          $saverow['vehicle_model_no'] = $request->vehicle_model_no;
          $saverow['vehicle_plate_no'] = $request->vehicle_plate_no;
          $saverow['vehicle_reg_no'] = $request->vehicle_reg_no;
          $this->form_validation->setdata($saverow);
          $this->form_validation->set_rules('vehicle_name','Vehicle Name','trim|required');
          $this->form_validation->set_rules('vehicle_model_no' ,'Vehicle Name','trim|required');
          $this->form_validation->set_rules('vehicle_plate_no', 'Vehicle Plate Number' , 'trim|required');
          $this->form_validation->set_rules('vehicle_reg_no', 'vehicle Registration number' ,'trim|required');

          if($this->form_validation->run() !== False){
            $this->db->insert('delapp_vehicle', $saverow);
            $insertId=$this->db->insert_id();
            if($insertId){
                $update =$this->common->update('delapp_vehicle',$saverow,array('id'=>$insertId));
                $response=['code'=>200,'status'=>'success','message'=>'Registered Successfully'];
          }else{
             $error = form_validation();
             if(form_error('vehicle_name')){

               $error =form_error('vehicle_name');
             }elseif(form_error('vehicle_model_no')){

               $error = form_error('vehicle_model_no');  
             }elseif(form_error('vehicle_plate_no')){

               $error = form_error('vehicle_plate_no');
             }elseif(form_error('vehicle_reg_no')){

               $error = form_error('vehicle_reg_no');
             }

            }
          }

    }
}