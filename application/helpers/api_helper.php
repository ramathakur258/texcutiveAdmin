<?php
if(!function_exists('success')){
    function success($message="Successful",$data=[]){
        $response=[];
		$response['code']=200;
		$response['status']="success";
		$response['message']=$message;
		if(!empty($data)){
			$response['data']=$data;
        }
        return response($response);
    }
}

if(!function_exists('failure')){
    function failure($message="failure"){
        $response=[];
		$response['code']=200;
		$response['status']="fail";
        $response['message']=$message;
        return response($response);
    }
}
if(!function_exists('response')){
    function response($response){
        $ci =& get_instance();
        return $ci->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode($response));
    }
}
if(!function_exists('invalid_token')){
    function invalid_token(){
        $ci =& get_instance();
        return $ci->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(['code'=>400,'status'=>'fail','message'=>'Invalid Token']));
    }
}
if(!function_exists('params')){
    function params(){
        $ci =& get_instance();
		$get = $ci->input->get();
		$post = $ci->input->post();
		$jsonpost = (array)json_decode($ci->input->raw_input_stream);
		return (object)array_merge($jsonpost,$get,$post);
	}
}


if(!function_exists('VerifyToken')){
    function VerifyToken(){
        $ci =& get_instance();
        $ci->load->database();
        $header = $ci->input->request_headers();
        $accesstoken="";
        if(!empty($header['Access-Token'])){
            $accesstoken=$header['Access-Token'];
        }else{
           
         //  return $response=["code"=>200,'status'=>'fail','message'=>'token empty' ];  
           // $accesstoken=$header['ACCESS-TOKEN'];
            return false;
        }
        if(!empty($accesstoken)){
            $user = $ci->db->select('*')->from("users")->where(['access_token'=>$accesstoken])->get()->row();
            if(!empty($user)){
                return $user;
            }else{
               return false;
            }
        }else{
            return false;
        }
	}
}


if(!function_exists('SendOtpMessage')){
    function SendOtpMessage($message,$mobileNumber){

		
		$message = urlencode($message);
        $mobileNumber =$mobileNumber;
        $otp=rand(1000,9999);


        $res = file_get_contents("http://sms.click4bulksms.in/sendsms?uname=trademall&pwd=9408693265&senderid=TRDMAL&to=$mobileNumber&msg=$message&route=T");
       // $url="https://api.msg91.com/api/otp.php?authkey=336774AluBToL55f1ab022P1&mobile=91$mobileNumber&message=".urlencode($message.$otp)."&sender=TEXCUT&otp=".$otp;
       //$data=file_get_contents($url);
        if(!empty($res)){
		return true;
		}else{
		return false;
		}

	}
}

if(!function_exists('SendEmail')){
    function SendEmail($email,$subject,$message)
    {

        $domain="mg.lekhajokha.org";
        $api_key="d88ea1eea7636618d8b11c1ea721c51f-7bce17e5-e6ec80e6";
        $MailData            = array();
        $MailData['from']    = "Trademall <noreply@trademall.in>";
        $MailData['to']      = $email;
        $MailData['subject'] = $subject;
        $MailData['html']    = $message;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, 'api:'.$api_key);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/'.$domain.'/messages');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $MailData);
        $result = curl_exec($ch);
        curl_close($ch);
        return   $result;
    }
}


if(!function_exists('sendPushNotification')){
	function sendPushNotification($fields,$key) {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $headers = array(
            'Authorization: key=' . $key,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }
}   
if(!function_exists('Notification')){
    function Notification($fcm_token, $data) 
    {            
    	$fields = array(
                'to' => $fcm_token,
                'data' => $data,
        );
        $key=FIREBASE_API_KEY;
    	return sendPushNotification($fields,$key);
    }
}

if(!function_exists('VendorPushNotification')){
    function VendorPushNotification($fcm_token, $data) 
    {            
    	$fields = array(
                'to' => $fcm_token,
                'data' => $data,
        );
        $key="AAAAbPTQka4:APA91bHD9Qn5K6SV1ziMUXtGQy35YyHAs_EqmxS6Ro9L2JK6_CLTm5rgzAbJU41Q_eYyoMaNHsHtGPqeQXzVyTb9rRBq2XYh5IMSclyb_HejoY8Pj7TklK89ISBPzyD42gbkoue5JXfE";
    	return sendPushNotification($fields,$key);
    }
}
if(!function_exists('CurlReq')){
    function CurlReq($url, $method ,$requestdata="" ,$apitxn="")
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        if($method=="POST"){
           // echo "POST";
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,$requestdata);  //Post Fields
        }
       
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',            
            'Token: '.TRAVELO_API_TOKEN
            
        ];        
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);        
        $server_output = curl_exec ($ch);        
        curl_close ($ch);   

        $output_array=json_decode($server_output);

        if($apitxn=='true'){
            $ci =& get_instance();
            $ci->load->database();
            $ins=[];
            if(isset($output_array->order_id)){
                $ins['order_id']=$output_array->order_id;
            }
            $ins['result']=(string)$server_output;
            $ci->db->insert("travelo_txn",$ins);

        }

       

        return  $output_array;
    }
}