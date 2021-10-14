<?php
defined('BASEPATH') or exit('No direct script access allowed');

  //  date_default_timezone_set('Asia/Kolkata');

require_once(APPPATH."libraries/lib/config_paytm.php");
require_once(APPPATH."libraries/lib/encdec_paytm.php");

class Chloonline extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set( 'Asia/Kolkata' );
        $this->load->helper(['url', 'form', 'universal','date']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model(['common',"chloonline_model"]);
    }

    public function index(){

        $this->data['packages'] = $this->common->records("delivery_package");

        if($this->input->server('REQUEST_METHOD')=='POST')
        {

            $this->form_validation->set_rules('pick_up', 'Pick Up ', 'required');
            $this->form_validation->set_rules('drop', 'Drop', 'required');
            $this->form_validation->set_rules('pick_up_area', 'Pick Up Area', 'required');
            $this->form_validation->set_rules('pick_up__apartment_houseno', 'Pick Up Apartment HouseNo', 'required');
            $this->form_validation->set_rules('drop_area', 'Drop Area', 'required');
            $this->form_validation->set_rules('drop_apartment_houseno', 'Drop Drop Apartment HouseNo', 'required');
            $this->form_validation->set_rules('pick_up_staircase', 'Pick Up Staircase', 'required');
            $this->form_validation->set_rules('drop_staircase', 'Drop Staircase', 'required');
             $this->form_validation->set_rules('source_lat', 'Pickup', 'required', array(
                'required' => 'You must select correct Location',
                ));

             $this->form_validation->set_rules('destination_lat', 'Destination Lat', 'required', array(
                'required' => 'You must select correct Location',
                ));

            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

            if ($this->form_validation->run()== FALSE)
            {

            }
            else
            {
            $save['pick_up'] =$this->input->post('pick_up');
            $save['drop'] =$this->input->post('drop');
            $save['pick_up_area'] =$this->input->post('pick_up_area');
            $save['pick_up__apartment_houseno'] =$this->input->post('pick_up__apartment_houseno');
            $save['pick_up_staircase'] =$this->input->post('pick_up_staircase');
            $save['drop_area'] =$this->input->post('drop_area');
            $save['drop_apartment_houseno'] =$this->input->post('drop_apartment_houseno');
            $save['drop_staircase'] =$this->input->post('drop_staircase');
            $save['source_lat'] =$this->input->post('source_lat');
            $save['source_long'] =$this->input->post('source_long');
            $save['destination_lat'] =$this->input->post('destination_lat');
            $save['destination_long'] =$this->input->post('destination_long');
                
            $this->common->save("delapp_deliveries",$save);
                //$this->db->insert('service', $save);
                $id =  $this->db->insert_id();
                $this->session->all_userdata($id);
                redirect('chloonline/package_detail/'. $id);
            }
        }

        $this->data['content']='index';
        $this->load->view('webtemplate', $this->data);
    }

    public function estimateData(){
       // print_r($this->input->post('package_id'));die;
        $this->form_validation->set_rules('pickup_add', 'PICKUP ADDREESS', 'required');
        $this->form_validation->set_rules('drop_add', 'DESTINATION ADDRESS', 'required');
        $this->form_validation->set_rules('package_id', 'SHIPMENT TYPE', 'required');



        if($this->form_validation->run())
        {

            $latFrom  = $this->input->post('pickup_lat');
            $longFrom = $this->input->post('pickup_long');
            $latTo = $this->input->post('drop_lat');;
            $longTo = $this->input->post('drop_long');;

            $pi80 = M_PI / 180;
            $latFrom *= $pi80;
            $longFrom *= $pi80;
            $latTo *= $pi80;
            $longTo *= $pi80;

            $r = 6372.797; // mean radius of Earth in km
            $dlat = $latTo - $latFrom;
            $dlon = $longTo - $longFrom;
            $a = sin($dlat / 2) * sin($dlat / 2) + cos($latFrom) * cos($latTo) * sin($dlon / 2) * sin($dlon / 2);
            $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
            $km2 = $r * $c;
            $per_km = round($km2);
            //echo $per_km_charges;die;

            if($this->input->post('package_id') !=6 ){
                $this->data['price'] = $this->common->record("delapp_charges",["package_id"=>$this->input->post('package_id')]);
                }else{
                    $this->data['price'] = $this->common->record("delapp_charges",["package_id"=>6]);

                }
                $charges = $this->data['price'];

                $km_amount = $charges->per_km_amount;
                $weight_amount = $charges->weight_charges;
              //echo  $weight_amount;die;
              $weight_char = 1;
                if(empty($weight_amount)){
                    $weight_amount = 1;
                    $weight_char = 30;
                }

                $amount = $per_km *  $km_amount  +  $weight_amount * $weight_char;
                $array = array(
                    'success' => $amount
                    );

        }
        else
        {
        $array = array(
        'error'   => true,
        'pickup_add_error' => form_error('pickup_add'),
        'drop_add_error' => form_error('drop_add'),
        'package_error' => form_error('package_id')
        );
        }

        echo json_encode($array);
    }

    public function package_detail($id="")
    {

        if(!empty($id)){
            $this->data['category']=$this->common->records('delivery_category');
        }

            if(!empty($id)){
            $this->data['delivery_package']=$this->common->records('delivery_package');
        }

        if(!empty($id)){
            $this->data['package'] = $this->common->record("delapp_deliveries",["id"=>$id]);
            }

     //   $this->data['packages'] = $this->common->records("delivery_package");
        if($this->input->server('REQUEST_METHOD')=='POST'){

            $this->form_validation->set_rules('package_id', 'Package', 'required');
            $this->form_validation->set_rules('cate_id', 'Category', 'required');
            $this->form_validation->set_rules('item_name', 'Item Name', 'trim|required|regex_match[/^[a-z .!@#$%^&*()\-_=+{};:,<.>ยง~\-]+/i]');
            // $this->form_validation->set_message('myAlpha', 'The %s field may only contain alpha characters & White spaces');
            $this->form_validation->set_rules('d_width', 'Width', 'required');
            $this->form_validation->set_rules('d_length', 'Length', 'required');
            $this->form_validation->set_rules('d_height', 'Height', 'required');
            $this->form_validation->set_rules('package_value', 'Package value', 'required|less_than[25000]');
            //$this->form_validation->set_message('max_length', 'Message you have entered for %s is too long please try again!');
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
            if ($this->form_validation->run()== FALSE)
            {

            }
            else
            {
            $save['package_id'] = $this->input->post('package_id');
            $save['package_value'] =$this->input->post('package_value');
            $save['security_charge'] = $this->input->post('security_charge');
            $save['cate_id'] =$this->input->post('cate_id');
            $save['item_name'] =$this->input->post('item_name');
            $save['d_width'] =$this->input->post('d_width');
            $save['d_length'] =$this->input->post('d_length');
            $save['d_height'] =$this->input->post('d_height');
           
            $save['order_id'] = rand(9999,9999999999);
            $width =  $save['d_width'];
            $height = $save['d_length'];
            $length = $save['d_height'];
            $save['volume'] = $width* $height * $length;
            if($save['package_id'] != 6){
                $save['d_weight'] = "";
            }
           
            $newdata['item_name'] = $save['package_id'];


            $this->session->set_userdata($newdata);

            if(!empty($id)){
            $this->common->update("delapp_deliveries",$save,['id'=>$id]);
                //0print_r($save); die;
            redirect('chloonline/service/'. $id);
            }

            }
        }
        $this->data['Id']=$id;
        $this->data['content']='package_detail';
        $this->load->view('webtemplate', $this->data);

    }


    public function weightCal($id=""){


        if($this->input->server('REQUEST_METHOD')=='POST'){
            $this->form_validation->set_rules('d_weight', 'Weight', 'required|greater_than[24]');
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
            if ($this->form_validation->run()== TRUE)
            {


                    $a = array(
                        'success' => '<div class="alert alert-success"> </div>'
                        );

                    $save['d_weight'] = $this->input->post('d_weight');

                    $id = $this->input->post('id');

                    if(!empty($id)){
                    $this->common->update("delapp_deliveries",$save,['id'=>$id]);

                   // redirect('chloonline/package_detail/'. $id);
                    }
            }
            else
            {
                $a = array(
                    'error'   => true,
                    'weight_error' => form_error('d_weight')

                    );
            }
            echo json_encode($a);
          }

    }

    public function giftcalculation(){


        if($this->input->server('REQUEST_METHOD')=='POST'){

            $save['gift'] = $this->input->post('gift');
            $id = $this->input->post('id');

            if(!empty($id)){
            $this->common->update("delapp_deliveries",$save,['id'=>$id]);
                echo json_encode([$save]);
            // redirect('chloonline/package_detail/'. $id);
            }
        }

    }

    public function delicatecalculation(){


        if($this->input->server('REQUEST_METHOD')=='POST'){

            $save['delicate'] = $this->input->post('delicate');
            $id = $this->input->post('id');

            if(!empty($id)){
            $this->common->update("delapp_deliveries",$save,['id'=>$id]);
                echo json_encode([$save]);
            // redirect('chloonline/package_detail/'. $id);
            }
        }

    }
    public function urgentcalculation(){


        if($this->input->server('REQUEST_METHOD')=='POST'){

            $save['urgent'] = $this->input->post('urgent');
            $id = $this->input->post('id');

            if(!empty($id)){
            $this->common->update("delapp_deliveries",$save,['id'=>$id]);
                echo json_encode([$save]);
            // redirect('chloonline/package_detail/'. $id);
            }
        }

    }
    public function qytcalculation(){


        if($this->input->server('REQUEST_METHOD')=='POST'){

            $save['qyt'] = $this->input->post('qyt');
            $id = $this->input->post('id');

            if(!empty($id)){
            $this->common->update("delapp_deliveries",$save,['id'=>$id]);
                echo json_encode([$save]);
                redirect('chloonline/service/'. $id);
            }
        }

    }

    public function service($id=""){

           // if(!empty($id)){
                $this->data['service'] = $this->chloonline_model->cloonlineData($id);
              //  }
            // print_r( $this->data['service']);die;

                $service = $this->data['service'];


            if(!empty($service->package_id) && empty($service->d_weight)){
            $this->data['charges'] = $this->common->record("delapp_charges",["package_id"=>$service->package_id]);
            }else{
                $this->data['charges'] = $this->common->record("delapp_charges",["package_id"=>6]);
            }
            $charges = $this->data['charges'];

            $km_amount = $charges->per_km_amount;
            $weight_amount = $charges->weight_charges;

          //  $volume_amount = $charges->volume_charges;
            $gift_amount = $charges->gift_amount;
            $urgent_amount = $charges->urgent_amount;
            $staircase_amount = $charges->staircase_amount;
            $delicate_amount = $charges->delicate_amount;


            $latitudeFrom  = $service->source_lat;
            $longitudeFrom = $service->source_long;
            $latitudeTo = $service->destination_lat;
            $longitudeTo = $service->destination_long;

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
            //echo $per_km_charges;die;


            $volume = 0;
            if(is_null($service->d_weight) ){
                $service->d_weight = 1;
            }
            if(empty($weight_amount)){
                $weight_amount = 1;
            }

            if(empty($service->gift)){
                $service->gift = 0;
            }
            if(empty($service->urgent)){
                $service->urgent = 0;
            }
            if(empty($service->delicate)){
                $service->delicate = 0;
            }
           if(empty($service->qyt)){
            $service->qyt = 1;
           }

           if( 0 <=  $service->volume &&  25 >= $service->volume ){
            $volume =2;
            }elseif(25 <=$service->volume &&   50 >= $service->volume){
                $volume= 5;
            }elseif( 50 <= $service->volume &&  75 >= $service->volume){
                $volume =10;
            }elseif( 75 <= $service->volume  ){
                $volume =18;
            }
           // echo $service->pick_up_staircase;die;
            if((!empty($service->package_value)) && ($service->package_value > 2900) && (!empty($service->security_charge)) ){
                $price = trim($service->package_value);
                $save['security_charge'] = $price/100*2;

            }elseif((!empty($service->security_charge)) && ($service->security_charge < 2900) ){
                $save['security_charge'] = 50 ;

            }else{
                $save['security_charge'] = 0;
            }

            if(25 <= $service->d_weight){
            $this->data['Standard_service'] = $per_km_charges *  $km_amount  + $service->d_weight  * $service->qyt +$service->pick_up_staircase * $staircase_amount + $service->drop_staircase * $staircase_amount + $volume ;
            }else{
                $this->data['Standard_service'] = $per_km_charges *  $km_amount  +  $weight_amount * $service->qyt +$service->pick_up_staircase * $staircase_amount + $service->drop_staircase * $staircase_amount;
            }
                if(25 <= $service->d_weight){
                $save['paid_amount'] = $per_km_charges *  $km_amount  + $service->d_weight  * $service->qyt+ $service->gift * $gift_amount + $service->urgent * $urgent_amount + $service->pick_up_staircase * $staircase_amount + $service->drop_staircase * $staircase_amount + $service->delicate * $delicate_amount +  $volume +   $save['security_charge'];
            }else{
                $save['paid_amount'] = $per_km_charges *  $km_amount  +  $weight_amount * $service->qyt+ $service->gift * $gift_amount + $service->urgent * $urgent_amount + $service->pick_up_staircase * $staircase_amount + $service->drop_staircase * $staircase_amount + $service->delicate * $delicate_amount +    $save['security_charge'];
            }

            $this->data['security_charge']=$save['security_charge'];
           $this->data['total']=$save['paid_amount'];
           if(!empty($save['paid_amount'])){
            $this->common->update("delapp_deliveries",$save,['id'=>$id]);
           }
        $this->data['service_id']=$id;
        $this->data['content']='service';
        $this->load->view('webtemplate', $this->data);
    }

     public function userData(){
        $this->form_validation->set_rules('user_name', 'First Name', 'required|regex_match[/^[a-z .!@#$%^&*()\-_=+{};:,<.>ยง~\-]+/i]');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('mobile', 'Mobile No', 'required|regex_match[/^[0-9]{10}$/]|max_length[10]');

        if($this->form_validation->run())
        {
        $array = array(
        'success' => '<div class="alert alert-success"> </div>',
        'mobile' =>$this->input->post('mobile'),
        );
        $save['user_name']=$this->input->post('user_name');
        $save['email']=$this->input->post('email');
        $save['mobile']=$this->input->post('mobile');
        $id=$this->input->post('id');
            if(!empty($id)){
                $this->common->update("delapp_deliveries",$save,['id'=>$id]);
            }

        }
        else
        {
        $array = array(
        'error'   => true,
        'name_error' => form_error('user_name'),
        'email_error' => form_error('email'),
        'mobile_error' => form_error('mobile')
        );
        }

        echo json_encode($array);


    }
    public function resendMobile(){

        $this->form_validation->set_rules('mobiles', 'Mobile No', 'required|regex_match[/^[0-9]{10}$/]|max_length[13]');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run()== TRUE)
        {
            $arr = array(
                'success' => '<div class="alert alert-success"> </div>'
                );

            $mobiles =$this->input->post('mobiles');
            $id = $this->input->post('id');
            $no = $this->common->record("delapp_deliveries",["id"=>$id]);

            if($no->mobile ==  $mobiles){
                $save['otp'] = rand(100000,999999);
            $message = urlencode("Your OTP code dont share".$save['otp']);
            SendOtpMessage($message,$mobiles,$save['otp']);
            $this->common->update("delapp_deliveries",$save,['id'=>$id]);
         }else{
            $arr = array(
                'error'   => true,
                'mobiles_error' => 'mobile No is Not match'

                );
         }
        }else{
            $arr = array(
                'error'   => true,
                'mobiles_error' => form_error('mobiles')

                );

        }
        echo json_encode($arr);
    }


     public function optGenrate($id=""){

        $this->form_validation->set_rules('otp', 'OTP', 'required');
        if($this->input->server('REQUEST_METHOD')=='POST'){

            if ($this->form_validation->run()== TRUE)
            {

                $save['otp'] =$this->input->post('otp');
                $id = $this->input->post('id');

                $oldotp = $this->common->record("delapp_deliveries",["id"=>$id]);
                //echo  $oldotp;die;
                if($oldotp->otp ==  $save['otp'])  {

                  //  if(!empty($id) ){
                  //  $this->common->update("delapp_deliveries",$save,['id'=>$id]);

                    $arr = array(
                        'success' => '<div class="alert alert-success"> </div>'
                        );
                   // }
                } else{
                    $arr = array(
                        'error'   => true,
                        'otp_error' => 'Otp Is Not Match'

                        );
                }
            }else{

                $arr = array(
                    'error'   => true,
                    'otp_error' => form_error('otp')

                    );

            }
        }
            echo json_encode($arr);


    }

    public function payment($id){

        if(!empty($id)){
        $this->data['payment'] = $this->chloonline_model->cloonlineData($id);
        }
        $payment = $this->data['payment'];

    //    print_r($payment);

        if(!empty($payment->package_id)){
        $this->data['charges'] = $this->common->record("delapp_charges",["package_id"=>$payment->package_id]);
        }
        $charges = $this->data['charges'];


        $km_amount = $charges->per_km_amount;
        $weight_amount = $charges->weight_charges;

        //  $volume_amount = $charges->volume_charges;
        $gift_amount = $charges->gift_amount;
        $urgent_amount = $charges->urgent_amount;
        $staircase_amount = $charges->staircase_amount;
        $delicate_amount = $charges->delicate_amount;


        $latitudeFrom  = $payment->source_lat;
        $longitudeFrom = $payment->source_long;
        $latitudeTo = $payment->destination_lat;
        $longitudeTo = $payment->destination_long;

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
        //echo $per_km_charges;die;

       if(empty($payment->qyt)){
            $payment->qyt = 1;
        }
        if(empty($payment->d_weight)){
            $payment->d_weight = 1;
        }
        if(empty($weight_amount)){
            $weight_amount = 1;
        }

        $volume = 0;
        if( 0 <=  $payment->volume &&  25 >= $payment->volume ){
        $volume =2;
        }elseif(25 <=$payment->volume &&   50 >= $payment->volume){
            $volume= 5;
        }elseif( 50 <= $payment->volume &&  75 >= $payment->volume){
            $volume =10;
        }elseif( 75 <= $payment->volume  ){
            $volume =18;
        }
        //echo  $volume;die;
        if(25 <= $payment->d_weight){
            $this->data['Standard_service'] = $per_km_charges *  $km_amount  + $payment->d_weight * $payment->qyt +$payment->pick_up_staircase * $staircase_amount + $payment->drop_staircase * $staircase_amount +  $volume *$payment->qyt;
        }else{
            $this->data['Standard_service'] = $per_km_charges *  $km_amount  +  $weight_amount * $payment->qyt +$payment->pick_up_staircase * $staircase_amount + $payment->drop_staircase * $staircase_amount;
        }
      
        $this->data['content']='payment';
        $this->load->view('webtemplate', $this->data);
    }



    public function StartPayment($id)
    {

        if(!empty($id)){
            $this->data['amount'] = $this->common->record("delapp_deliveries",["id"=>$id]);
            }
        $payment=$this->data['amount'];


        $paramList["MID"] = PAYTM_MERCHANT_MID;
        $paramList["ORDER_ID"] = rand(1000000000,9999999999);
        $paramList["CUST_ID"] = $id;   /// according to your logic
        $paramList["INDUSTRY_TYPE_ID"] = 'RETIAL';
        $paramList["CHANNEL_ID"] = 'WEB';
        $paramList["TXN_AMOUNT"] = $payment->paid_amount;
        $paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
        $paramList["CALLBACK_URL"] = "https://admin.texcutive.com/chloonline/paymentstatus/".$id;
        $paramList["IS_USER_VERIFIED"] = "YES"; //
        //print_r($paramList);die;
        $checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);


?>

<center><h1>Please do not refresh this page...</h1></center>
<form id="myForm" action="<?php echo PAYTM_TXN_URL ?>" method="post">
        <?php
         foreach ($paramList as $a => $b) {
        echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
       }
       ?>
            <input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
        </form>
        <script type="text/javascript">
            document.getElementById('myForm').submit();
         </script>


 <?php
    }

    /////////// response from paytm gateway////////////


    public function paymentstatus($id)
    {

        $paytmChecksum 	= "";
        $paramList 		= array();
        $isValidChecksum= "FALSE";

        $paramList = $_POST;
        $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

        header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");

        //Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
        $isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


        if($isValidChecksum == "TRUE") {
            echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";

            // echo "<pre>";
            // print_r($_POST);
            // echo "<pre>";

            if ($_POST["STATUS"] == "TXN_SUCCESS") {
              //  echo "<b>Transaction status is success</b>" . "<br/>";
                //Process your transaction here as success transaction.
                //Verify amount & order id received from Payment gateway with your application's order id and amount.
                $save['transaction_id'] = $_POST["ORDERID"];
                $save['payment_status'] = $_POST["STATUS"];
                $save['transaction_date'] = $_POST["TXNDATE"];

                if(!empty($id)){
                    $this->common->update("delapp_deliveries",$save,['id'=>$id]);
                   // print_r($save);die;
                    redirect('chloonline/PaytmSucessResponse/'. $id);
                }
            }
            else {
              //  echo "<b>Transaction status is failure</b>" . "<br/>";
                $save['payment_status'] =$_POST["STATUS"];
                $save['transaction_date'] =$_POST["TXNDATE"];
                $save['transaction_id'] =$_POST["ORDER_ID"];
                if(!empty($id)){
                    $this->common->update("delapp_deliveries",$save,['id'=>$id]);
                    redirect('chloonline/PaytmFailResponse/'. $id);
                }
            }



        }
        else {
            echo "<b>Checksum mismatched.</b>";
            //Process transaction as suspicious.
        }

    }

    public function PaytmSucessResponse($id)
    {


    if(!empty($id)){
        $this->data['orderDetail'] = $this->chloonline_model->cloonlineData($id);
        }
    $this->data['content']='payment_response_suceess';
         $this->load->view('webtemplate', $this->data);

     }
     public function PaytmFailResponse($id)
     {
 
 
     if(!empty($id)){
         $this->data['orderDetail'] = $this->chloonline_model->cloonlineData($id);
         }
     $this->data['content']='payment_response_failuer';
          $this->load->view('webtemplate', $this->data);
 
      }

    public function about()
    {

       $this->data['content']='about';
        $this->load->view('webtemplate', $this->data);
    }
    public function support()
    {

       $this->data['content']='support';
        $this->load->view('webtemplate', $this->data);
    }

    public function ordertrack(){
        $this->form_validation->set_rules('mobile', 'Mobile No', 'required|regex_match[/^[0-9]{10}$/]|max_length[10]');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run()== TRUE)
        {
             $Num =$this->input->post('mobile');

            if(!empty($Num)){
                $orderdata = $this->chloonline_model->orderhistoryData($Num);


              if(!empty($orderdata)){
                $otp = rand(100000,999999);
                $message = urlencode("OTP".$otp);
                SendOtpMessage($message,$Num,$otp);
                $newdata = array(
                    'mobile'  => $Num,
                    'otp'     => $otp

                );

                $this->session->set_userdata($newdata);
                $arr = array(
                    'success' =>  '<div class="alert alert-success"> </div>'
                     );
               }else{
                $arr = array(
                    'error'   => true,
                    'mob_error' => 'Invalid Number!'

                    );
               }

            }



        }else{
            $arr = array(
                'error'   => true,
                'mob_error' => form_error('mobile')

                );

        }
        echo json_encode($arr);
    }

    public function orderotp()
    {


        $this->form_validation->set_rules('otp', 'OTP No', 'required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run()== TRUE)
        {
             $otp =$this->input->post('otp');

            if($this->session->userdata('otp')==$otp){


                $arr = array(
                    'success' =>  '<div class="alert alert-success"> </div>'
                     );
            }else{
                $arr = array(
                    'error'   => true,
                    'otp_error' => 'Otp is Not Match'

                    );
               }

         }else{
            $arr = array(
                'error'   => true,
                'otp_error' => form_error('otp')

                );

        }
        echo json_encode($arr);


    }

    public function orderHistory()
    {
        $Num = $this->session->userdata('mobile');

        if(!empty($Num)){
            $this->data['orderdata'] = $this->chloonline_model->orderhistoryData($Num);
            }
       $this->data['content']='order_history';
        $this->load->view('webtemplate', $this->data);
    }

    public function orderdetail($orderId)
    {
        if(!empty($orderId)){
            $this->data['orderdetail'] = $this->chloonline_model->orderdetailData($orderId);
            }
       //  echo json_encode($this->data['orderId']);
       $this->data['content']='order_detail';
        $this->load->view('webtemplate', $this->data);
    }





}
?>