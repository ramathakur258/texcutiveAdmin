<?php
defined('BASEPATH') or exit('No direct script access allowed');
if ( function_exists( 'date_default_timezone_set' ) ) {
  date_default_timezone_set('Asia/Kolkata');
}
class Delivery extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url', 'form', 'universal','date']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model(['common', 'Delivery_model']);
        
    }
    public function index()
    {
      
        $query = "";
        $keyword = $this->input->get('keyword');
        if (!empty($keyword)) {
            $query = "?keyword=" . $keyword;
        }
        $group_id = $this->input->get('group_id');
        if (!empty($group_id)) {
            $query = "&group_id=" . $group_id;
        }
        $package_id=$this->input->get('package_id');
        if(!empty($package_id)){
            $query.="&package_id=".$package_id;
        }

        $cate_id=$this->input->get('cate_id');
        if(!empty($cate_id)){
            $query.="&cate_id=".$cate_id;
        }
        $config = getPagination();
        $config["per_page"]=10;
        $config['base_url'] = site_url("delivery" . $query);
        $config['total_rows'] = $this->Delivery_model->deliveryCount($keyword,$package_id,$cate_id);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page'] - 1) * $config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();
  
        $this->data['deliveries']= $this->Delivery_model->deliveryData($config["per_page"], $page, $keyword,$package_id,$cate_id);
     //  echo "<pre>"; print_r($this->data['deliveries']);die;  
       $this->data['package'] = $this->common->records("delivery_package");
       $this->data['category'] = $this->common->records("delivery_category");
       $this->data['drivers'] = $this->common->records("delapp_drivers");
        $this->data['content'] = 'delivery/deliveries';
        $this->load->view('admintemplate', $this->data);
    }
    public function deliveryAdd($id="")
    {
     // echo json_encode($this->input->post('package_type'));
           $this->data['category'] = $this->common->records("delivery_category");
           $this->data['package'] = $this->common->records("delivery_package");
          if(!empty($id)){
            $this->data['delivery'] = $this->common->record("delapp_deliveries",["id"=>$id]);
         // print_r($this->data['delivery']);die;  
          }
      if($this->input->server('REQUEST_METHOD')=='POST')
        {            

             $this->form_validation->set_rules('source_lat', 'Source lat', 'required');
             $this->form_validation->set_rules('source_long', 'Source long', 'required');
             $this->form_validation->set_rules('destination_lat', 'Destination lat', 'required');
             $this->form_validation->set_rules('destination_long', 'Destination long', 'required');
             $this->form_validation->set_rules('pick_up_area', 'Pick up area', 'required');
             $this->form_validation->set_rules('pick_up__apartment_houseno', 'Pick up House No', 'required');
             $this->form_validation->set_rules('drop_area', 'Drop Area', 'required');
             $this->form_validation->set_rules('drop_apartment_houseno', 'drop House No', 'required');
             $this->form_validation->set_rules('cate_id', 'Category', 'required');
             $this->form_validation->set_rules('item_name', 'Item', 'required');
             $this->form_validation->set_rules('package_value', 'Package value', 'required');
             $this->form_validation->set_rules('package_id', "Package Type", 'required', array('required'=>"You Must Select Package Type"));
             $this->form_validation->set_rules('d_width', 'Width', 'required');
             $this->form_validation->set_rules('d_height', 'Height', 'required');
             $this->form_validation->set_rules('d_length', 'Length', 'required');
             $this->form_validation->set_rules('pick_up_staircase', 'Pick Up  Staircase', 'required');
             $this->form_validation->set_rules('drop_staircase', 'Drop Staircase', 'required');
            // $this->form_validation->set_rules('payment_status', 'Payment Status', 'required');
             $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        
          if ($this->form_validation->run()== FALSE)
          {
              //echo "hii";die;    
          }
          else
          {
           // $charges  = $this->common->record("delapp_charges");
           
            $latitudeFrom  = $this->input->post('source_lat');
            $longitudeFrom = $this->input->post('source_long');
            $latitudeTo = $this->input->post('destination_lat');
            $longitudeTo = $this->input->post('destination_long');

            $pi80 = M_PI / 180;
            $latitudeFrom *= $pi80;
            $longitudeFrom *= $pi80;
            $latitudeTo *= $pi80;
            $longitudeTo *= $pi80;
        
            $r = 6372.797; // mean radius of Earth in km
            $dlat = $latitudeTo - $latitudeFrom;
            $dlon = $longitudeTo - $longitudeFrom;
            $a = sin($dlat / 2) * sin($dlat / 2) + cos($latitudeFrom) * cos($latitudeTo) * sin($dlon / 2) * sin($dlon / 2);
            $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
            $km = $r * $c;
      

            $per_km_charges = round($km);
            // $save['user_name'] = 'Admin';
            // $save['mobile'] = '0123456789';
            // $save['email'] ='admin@gmail.com';
            $save['pick_up'] =$this->input->post('pick_up');
            $save['drop'] =$this->input->post('drop');
            $save['pick_up_area'] =$this->input->post('pick_up_area');
            $save['pick_up__apartment_houseno'] =$this->input->post('pick_up__apartment_houseno');
            $save['drop_area'] =$this->input->post('drop_area');
            $save['drop_apartment_houseno'] =$this->input->post('drop_apartment_houseno');
            $save['source_lat'] = $this->input->post('source_lat');;
            $save['source_long'] = $this->input->post('source_long');
            $save['destination_lat']= $this->input->post('destination_lat');
            $save['destination_long']= $this->input->post('destination_long');
            $save['cate_id'] =$this->input->post('cate_id');
            $save['item_name'] =$this->input->post('item_name');
            $save['package_value'] =$this->input->post('package_value');
            $save['package_id'] =$this->input->post('package_id');
            $save['d_width'] =$this->input->post('d_width');
            $save['d_height'] =$this->input->post('d_height');
            $save['d_length'] =$this->input->post('d_length');
            $save['d_weight'] =$this->input->post('d_weight');
            $save['gift'] =$this->input->post('gift');
            $save['urgent'] =$this->input->post('urgent');
            $save['delicate'] =$this->input->post('delicate');
            $save['pick_up_staircase'] =$this->input->post('pick_up_staircase');
            $save['drop_staircase'] =$this->input->post('drop_staircase');
            
            $save['transaction_date'] = date('Y-m-d H:i:s');
            $save['qyt'] =$this->input->post('qyt');
            $save['payment_status'] =$this->input->post('payment_status');
            $save['security_charge'] =$this->input->post('security_charge');
            $save['status'] =$this->input->post('status');
             $qyt = $save['qyt'];
            $width =$save['d_width'] ;
            $height =$save['d_height'] ;
            $length =$save['d_length'] ;
            $weight =$save['d_weight'] ;
            $gift =$save['gift'] ;
            $urgent =$save['urgent'] ;
            $pick_up_staircase =$save['pick_up_staircase'] ;
            $drop_staircase =$save['drop_staircase'] ;
            $delicate =$save['delicate'] ;
            $security_charge =$save['security_charge'] ;
            $package_value =$save['package_value'] ;
            if($save['package_id'] == 6){
              $save['lwh_calculate'] = 1;
            }else{
              $save['lwh_calculate'] = 0;
            }
            $save['volume'] = $width*$height* $length;
            if(!empty($id)){
              $editdata = $this->common->record("delapp_deliveries",["id"=>$id]);
           // print_r($editdata->order_id);die;  
            }
            if(!empty($id)){
              $save['order_id'] = $editdata->order_id;
              $save['transaction_id'] = $editdata->transaction_id;
            }else{
              $save['order_id'] = rand(1000000000,9999999999);
              $save['transaction_id'] = rand(1000000000,9999999999);
            }
           
            if((!empty($security_charge)) && ($package_value > 2900) ){
              $price = trim($package_value);
              $security_amount = $price/100*2;

            }elseif((!empty($security_charge)) && ($package_value < 2900) ){
                $security_amount = 50 ;

            }else{
              $security_amount =  0;
            }

            if($qyt==0){
              $qyt =1;
            }
            if(!empty($save['package_id'])){
              $charges = $this->common->record("delapp_charges",["package_id"=>$save['package_id']]);
              
              }

            if( $save['volume'] >0 &&  $save['volume']< 25){
              $vol_charges->volume_charges =2;
            }elseif($save['volume'] >25 &&  $save['volume']< 50){
              $vol_charges->volume_charges =5;
            }elseif($save['volume'] >50 &&  $save['volume']< 75){
              $vol_charges->volume_charges =10;
            }elseif($save['volume'] >75 &&  $save['volume']< 100){
              $vol_charges->volume_charges =15;
            }else{
              $vol_charges->volume_charges =18;
            }

          if( 0 <=  $save['volume']  &&  25 >=  $save['volume'] ){
            $vol_charges->volume_charges =2;
            }elseif(25 <= $save['volume'] &&   50 >= $save['volume'] ){
              $vol_charges->volume_charges = 5;
            }elseif( 50 <= $save['volume'] &&  75 >= $save['volume']){
              $vol_charges->volume_charges=10;
            }elseif( 75 <= $save['volume'] &&  100 >= $save['volume'] ){
              $vol_charges->volume_charges =18;
            }     

          if($save['lwh_calculate'] == 1){
              $save['paid_amount']=$per_km_charges* $charges->per_km_amount+$weight * $qyt + $vol_charges->volume_charges+ $gift*$charges->gift_amount+$urgent*$charges->urgent_amount+$drop_staircase*$charges->staircase_amount+$pick_up_staircase*$charges->staircase_amount+$delicate*$charges->delicate_amount +  $security_amount;
            }else{
              $save['paid_amount']=$per_km_charges* $charges->per_km_amount+$charges->weight_charges*  $qyt +$gift*$charges->gift_amount+$urgent*$charges->urgent_amount+$drop_staircase*$charges->staircase_amount+$pick_up_staircase*$charges->staircase_amount+$delicate*$charges->delicate_amount +  $security_amount;
            }
         
        
          if(!empty($id)){
              $this->db->update("delapp_deliveries",$save,["id"=>$id]);
              $delivery = $this->common->record("delapp_deliveries",["id"=>  $id ]);
             // print_r($delivery);die;
              $activity['order_id'] = $delivery->order_id;
              $activity['driver_id'] = $delivery->driver_id;
              $activity['activity_type'] = "Status is change by admin";
              $activity['comment'] = "Status change";
              $activity['status'] = $delivery->status;
              $this->common->save("delapp_activity",$activity);
            }else{
              $this->common->save("delapp_deliveries",$save);
             
            }
            redirect('delivery');
        
          }
        } 
        $this->data['content'] = 'delivery/delivery_add';
        $this->load->view('admintemplate', $this->data);
    }
   
     
    public function deliveryDriverAssign($id){
      //print_r($this->input->post('driver_id'));die;
        $save['driver_id'] = $this->input->post('driver_id');

        if(!empty($id)){
          $this->db->update("delapp_deliveries",$save,["id"=>$id]);
         
            $row = $this->common->record("delapp_deliveries",["id"=>$id]);
           // print_r($id);die;
            $save['driver_id'] = $this->input->post('driver_id');
            $save['order_id'] = $row->order_id;
            $save['activity_type'] = "Order Assign";
            $save['comment'] = "This order is assign to you";
            $save['status'] =  $row->status;
          // if($id ==  $row->id ){
            //  $this->db->update("delapp_activity",$save,["order_id"=> $save['order_id']]);
          // }else{
              $this->common->save("delapp_activity",$save);
          // }
          redirect('delivery');
        }
  
        
      }

    public function deliveryView($id){

      if(!empty($id)){
        $this->data['delivery']  = $this->Delivery_model->deliveryDetail($id);
      }
     // print_r( $this->data['delivery'] );die;
      $this->data['content'] = 'delivery/delivery_view';
      $this->load->view('admintemplate', $this->data);
    }

    public function updatedeliveryStatus($id)
    {
     
            //$id =$this->input->post('id');
            $save['status'] =5;
            //print_r($save['status']);die;  
            if(!empty($id))
            {
              $this->db->update("delapp_deliveries",$save,["id"=>$id]);
             
              redirect('delivery');
            }
         
    }
    
    public function ajax_get_packges($id)
    {
               
      $this->data['prices'] = $this->common->record("delapp_charges",['package_id'=>$id]);
        echo json_encode($this->data['prices']);
       
         
    }

    public function charges()
    {
               
        $this->data['charges'] = $this->common->records("delapp_charges");
        $this->data['content'] = 'delivery/charges';
        $this->load->view('admintemplate', $this->data);
         
    }

    public function chargesEdit($id="")
    {
      $this->data['package'] = $this->common->records("delivery_package");
        $this->data['charges'] = $this->common->record("delapp_charges",["id"=>$id]);
        if($this->input->server('REQUEST_METHOD')=='POST')
        { 
            $this->form_validation->set_rules('per_km_amount', 'per_km_charge', 'trim|required');
            $this->form_validation->set_rules('weight[]', 'Weight', 'trim|required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

          if ($this->form_validation->run()== FALSE)
          {
                    
          }else
          {
              $save['per_km_amount']=$this->input->post('per_km_amount');
              $save['width']=$this->input->post('width');
              $save['height']=$this->input->post('height');
              $save['length']=$this->input->post('length');
              $save['weight']= $this->input->post('weight');
              $save['weight_charges']= $this->input->post('weight_charges');
              $save['volume']= $this->input->post('volume');
              $save['volume_charges']= $this->input->post('volume_charges');
              $save['gift_amount']=$this->input->post('gift_amount');
              $save['urgent_amount']=$this->input->post('urgent_amount');
              $save['staircase_amount']=$this->input->post('staircase_amount');
              $save['delicate_amount']=$this->input->post('delicate_amount');
              $save['package_id']= $this->input->post('package_id');
              if(!empty($id)){
                $this->db->update("delapp_charges",$save,["id"=>$id]);
              }else{
                $this->common->save("delapp_charges",$save);

              }
            
             // print_r($save);die;
              redirect('delivery/charges');
              
          }
        
        }
          $this->data['content'] = 'delivery/charges_edit';
          $this->load->view('admintemplate', $this->data);
    }
   
    public function chargesDelete($id)
    {
        if(!empty($id)){
          $this->common->remove("delapp_charges",["id"=>$id]);
        }
        redirect('delivery/charges');
       
    }

    public function category()
    {
      $query = "";
      $keyword = $this->input->get('keyword');
      if (!empty($keyword)) {
          $query = "?keyword=" . $keyword;
      }
      $group_id = $this->input->get('group_id');
      if (!empty($group_id)) {
          $query = "&group_id=" . $group_id;
      }

      $config = getPagination();
      $config["per_page"]=10;
      $config['base_url'] = site_url("attendance" . $query);
      $config['total_rows'] = $this->Delivery_model->categoryCount($keyword);
      $this->pagination->initialize($config);
      $page = isset($_GET['per_page']) ? ($_GET['per_page'] - 1) * $config["per_page"] : 0;
      $this->data['pagination'] = $this->pagination->create_links();

      $this->data['category'] = $this->Delivery_model->categoryData($config["per_page"], $page, $keyword);
      // echo "<pre>"; print_r($this->data['users']); die;
       // $this->data['category'] = $this->common->records("delivery_category");
        $this->data['content'] = 'delivery/category';
        $this->load->view('admintemplate', $this->data);
         
    }
    public function categoryEdit($id="")
    {
               
        $this->data['category'] = $this->common->record("delivery_category", ["cat_id"=>$id]);
           //print_r($this->data['category']);die;
        if($this->input->server('REQUEST_METHOD')=='POST')
        { 
            $this->form_validation->set_rules('cat_name', 'Category', 'trim|required');
            
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

          if ($this->form_validation->run()== FALSE)
          {
                    
          }else
          {
              $save['cat_name']=$this->input->post('cat_name');
             
              if(!empty($id)){
                $this->db->update("delivery_category",$save,["cat_id"=>$id]);
              }else{
                $this->common->save("delivery_category",$save);

              }
            
             // print_r($save);die;
              redirect('delivery/category');
              
          }
        
        }
        $this->data['content'] = 'delivery/category_edit';
        $this->load->view('admintemplate', $this->data);
         
    }
    public function categoryDelete($id)
    {
        if(!empty($id)){
          $this->common->remove("delivery_category",["cat_id"=>$id]);
        }
        redirect('delivery/category');
       
    }
    
    public function Vehicle()
    {
        $query = "";
        $keyword = $this->input->get('keyword');
        if (!empty($keyword)) {
            $query = "?keyword=" . $keyword;
        }
    
        $config = getPagination();
        $config["per_page"]=10;
        $config['base_url'] = site_url("delivery/Vehicle" . $query);
        $config['total_rows'] = $this->Delivery_model->vehicleCount($keyword);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page'] - 1) * $config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();

        $this->data['vehicle'] = $this->Delivery_model->vehicleData($config["per_page"], $page, $keyword);
        //print_r( $this->data['vehicle']);die;
        //$this->data['vehicle'] = $this->common->records("delapp_vehicles");
        $this->data['content'] = 'delivery/delivery_vehicle';
        $this->load->view('admintemplate', $this->data);
    }
    public function vehicleView($id)
    {
       if(!empty($id)){
        $this->data['vehicle'] = $this->common->record("delapp_vehicles",["id"=>$id]);
       }
        
        $this->data['content'] = 'delivery/vehicleView';
        $this->load->view('admintemplate', $this->data);
    }
    
    public function Drivers()
    {

      $query = "";
      $keyword = $this->input->get('keyword');
      if (!empty($keyword)) {
          $query = "?keyword=" . $keyword;
      }
   
      $config = getPagination();
      $config["per_page"]=10;
      $config['base_url'] = site_url("delivery/Drivers" . $query);
      $config['total_rows'] = $this->Delivery_model->driverCount($keyword);
      $this->pagination->initialize($config);
      $page = isset($_GET['per_page']) ? ($_GET['per_page'] - 1) * $config["per_page"] : 0;
      $this->data['pagination'] = $this->pagination->create_links();

      $this->data['drivers'] = $this->Delivery_model->driverData($config["per_page"], $page, $keyword);
       // $this->data['drivers'] = $this->common->records("delapp_drivers");
      // print_r($this->data['drivers']);die;
        $this->data['content'] = 'delivery/delivery_drivers';
        $this->load->view('admintemplate', $this->data);
    }
    public function driversView($id)
    {
       if(!empty($id)){
        $this->data['drivers'] = $this->common->record("delapp_drivers",["id"=>$id]);
       }
       // redirect('delivery/Drivers');
        $this->data['content'] = 'delivery/driver_view';
        $this->load->view('admintemplate', $this->data);
    }

    public function driverhistoryView($id){
      $query = "";
      $keyword = $this->input->get('keyword');
      if (!empty($keyword)) {
          $query = "?keyword=" . $keyword;
      }
   
      $config = getPagination();
      $config["per_page"]=10;
      $config['base_url'] = site_url("delivery/driverhistoryView/" .$id. $query);
      $config['total_rows'] = $this->Delivery_model->driverhistoryCount($keyword="",$id);
      $this->pagination->initialize($config);
      $page = isset($_GET['per_page']) ? ($_GET['per_page'] - 1) * $config["per_page"] : 0;
      $this->data['pagination'] = $this->pagination->create_links();

      $this->data['drivers'] = $this->Delivery_model->driverhistoryData($config["per_page"], $page, $keyword="",$id);

     // print_r( $this->data['drivers'] );die;
      $this->data['content'] = 'delivery/driver_order_history';
      $this->load->view('admintemplate', $this->data);
    }
    public function driverEdit($id="")
    {

        if($this->input->server('REQUEST_METHOD')=='POST')
        {                
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name ', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        
            if ($this->form_validation->run()== FALSE)
            {
                    
            }
            else
            {
           
            $save['first_name'] =$this->input->post('first_name');
            $save['last_name'] =$this->input->post('last_name');
            $save['phone'] =$this->input->post('phone');
            $save['email'] =$this->input->post('email');
            $save['password'] =$this->input->post('password');
            if(!empty($id))
                {
                $this->common->update("delapp_drivers",$save,["id"=>$id]);
                }else{
                  $this->common->save("delapp_drivers",$save);
                }
           }
           redirect('delivery/drivers');
        }
           
          if(!empty($id)){
            $this->data['driver'] = $this->common->record("delapp_drivers",["id"=>$id]);
            }
         $this->data['content'] = 'delivery/driver_edit';
         $this->load->view('admintemplate', $this->data);
    }
    public function driversDelete($id)
    {
        if(!empty($id)){
      $this->common->remove("delapp_drivers",["id"=>$id]);
    }
    redirect('delivery/Drivers');
       
    }


    
    public function vehicleEdit($id="")
    {
      if(!empty($id)){
        $this->data['vehicle'] = $this->common->record("delapp_vehicles",["id"=>$id]);
       
    }
    
      // print_r(  $this->data['vehicle']);die;
       if($this->input->server('REQUEST_METHOD')=='POST')
       { 
        // $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('vehicle_name', 'Vehicle Name', 'trim|required');
        $this->form_validation->set_rules('vehicle_model_no', 'Vehicle Model Number', 'trim|required');
        $this->form_validation->set_rules('vehicle_plate_no', 'Vehicle Plate Number', 'trim|required');
        $this->form_validation->set_rules('vehicle_reg_no', 'Vehicle Registration number', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

      if ($this->form_validation->run()== FALSE)
       {
               
       }else{

       // $img = $this->upload->data();   
        $extension1 =  pathinfo($_FILES['vehicle_front_img']['name'],PATHINFO_EXTENSION);
        $extension2 =  pathinfo($_FILES['vehicle_back_img']['name'],PATHINFO_EXTENSION);
        $filename1 =   '-'.strtolower(str_replace(' ','-',$_FILES['vehicle_front_img']['name']));
        $filename2 =   '-'.strtolower(str_replace(' ','-',$_FILES['vehicle_back_img']['name'])); 
        $fileContent = file_get_contents($_FILES["vehicle_front_img"]["tmp_name"]);
        $fileContent = file_get_contents($_FILES["vehicle_back_img"]["tmp_name"]);
        $Path1 = rand(1000,9999).time().$filename1 ;
        $Path2 = rand(1000,9999).time().$filename2 ;
        $status = CloudFileUpload($Path1,$fileContent);
        $status = CloudFileUpload($Path2,$fileContent);
        $save['vehicle_front_img'] = $Path1;
        $save['vehicle_back_img'] = $Path2;
        $save['vehicle_name']=$this->input->post('vehicle_name');
        $save['vehicle_model_no']=$this->input->post('vehicle_model_no');
        $save['vehicle_plate_no']=$this->input->post('vehicle_plate_no');
        $save['vehicle_reg_no']=$this->input->post('vehicle_reg_no');
        
        if (!empty($id)) 
        {
             $this->common->update("delapp_vehicles", $save, ['id'=>$id]);
        } else{

             $this->common->save('delapp_vehicles',$save);
        }
        redirect('delivery/vehicle');
      }
    }
       
        $this->data['content'] = 'delivery/vehicleEdit';
        $this->load->view('admintemplate', $this->data);
    }
    public function vehicleDelete($id)
    {
        if(!empty($id)){
          $this->common->remove("delapp_vehicles",["id"=>$id]);
        }
        $this->data['content'] = 'delivery/delivery_vehicle';
        $this->load->view('admintemplate', $this->data);
       
    }

    public function package(){


      $query = "";
      $keyword = $this->input->get('keyword');
      if (!empty($keyword)) {
          $query = "?keyword=" . $keyword;
      }
      $group_id = $this->input->get('group_id');
      if (!empty($group_id)) {
          $query = "&group_id=" . $group_id;
      }

      $config = getPagination();
      $config["per_page"]=10;
      $config['base_url'] = site_url("attendance" . $query);
      $config['total_rows'] = $this->Delivery_model->packageCount($keyword);
      $this->pagination->initialize($config);
      $page = isset($_GET['per_page']) ? ($_GET['per_page'] - 1) * $config["per_page"] : 0;
      $this->data['pagination'] = $this->pagination->create_links();

      $this->data['package'] = $this->Delivery_model->packageData($config["per_page"], $page, $keyword);

        $this->data['content'] = 'delivery/package';
        $this->load->view('admintemplate', $this->data);

    }

    public function packageEdit($id=""){
     

      $this->data['package'] = $this->common->record("delivery_package",["packages_id"=>$id]);
      //print_r($this->data['category']);die;
   if($this->input->server('REQUEST_METHOD')=='POST')
   { 
       $this->form_validation->set_rules('package_type', 'Package Type', 'trim|required');
       
       $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

     if ($this->form_validation->run()== FALSE)
     {
               
     }else
     {
         $save['package_type']=$this->input->post('package_type');
         $save['package_weight']=$this->input->post('package_weight');
        
         if(!empty($id)){
           $this->db->update("delivery_package",$save,["packages_id"=>$id]);
         }else{
           $this->common->save("delivery_package",$save);

         }
       
        // print_r($save);die;
         redirect('delivery/package');
         
     }
   
   }
   $this->data['content'] = 'delivery/package_edit';
   $this->load->view('admintemplate', $this->data);

    }

    public function packageDelete($id){


      if(!empty($id)){
        $this->common->remove("delivery_package",["packages_id"=>$id]);
      }
      redirect('delivery/package');

    }

}
