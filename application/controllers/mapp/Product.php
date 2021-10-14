<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata"); 
class Product extends CI_Controller 
{
    public $data=[];
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal','file']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common','mapp/product_model']);

    }
    public function index(){
       // delete_file('category/1-category.png');
       // $users=isAdmin('user','view');
         $merchantId=$this->session->userdata('user_id');
         if($this->input->get('export') == 1) {
         $query = $this->product_model->GetAllProductExport($merchantId);
          
          if($query){
            $delimiter = ",";
            $filename = "mapp_products_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('id','product_name', 'category_title', 'brand_name','product_detail','product_type','product_size','product_colour','product_image','product_highlight', 'mrp', 'selling_price', 'qty', 'status');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    foreach ($query as $row){
       // $status = ($row['status'] == '1')?'Active':'Inactive';
        $lineData = array($row->id, $row->product_name, $row->category_title, $row->brand_name, $row->product_detail,  $row->	product_type,  $row->product_size,  $row->product_color,  $row->product_image, $row->product_highlight , $row->product_mrp, $row->product_sp ,$row->product_qty, $row->status == 1 ? 'Active' : 'Hide');
        fputcsv($f, $lineData, $delimiter);
    }
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);


exit;
    }       
       
       
         $query="";
        $keyword=$this->input->get('keyword');
        if (!empty($keyword)) {
            $query="?keyword=".$keyword;
        }       
        $config=getPagination();
        $config['base_url'] = site_url("mapp/product".$query);
        $config['total_rows'] =$this->product_model->Count($keyword,$merchantId);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();

        $this->data['result']=$this->product_model->List($config["per_page"], $page, $keyword,$merchantId);
        $this->data['title']='Products';
        $this->data['content']='mapp/product/index';
        $this->load->view('admintemplate', $this->data);
    }
    
    public function edit($id){
        $merchantId=$this->session->userdata('user_id');
        $this->data['record']=$this->common->record('mapp_products',['merchant_id'=>$merchantId,'id'=>$id]);
          $similar_product_id=$this->common->Productrecord('mapp_similar_product',['product_id'=>$id]);
      if(!empty($similar_product_id)){
          $similar = [];
          foreach ($similar_product_id as $row)
                {
                    array_push($similar,$row['similar_product_id']);
                    
                }
        $this->data['record']->similar_product_id=$similar; 
      }
       
           
       
        if(empty($this->data['record'])){
            redirect('mapp/product');
        }
        if($this->input->server('REQUEST_METHOD')=='POST'){
            
            $this->form_validation->set_rules('category_id','Category','required');
            $this->form_validation->set_rules('product_name','Product Name','required');
            $this->form_validation->set_rules('product_mrp','Product Mrp','required|numeric');
            $this->form_validation->set_rules('product_sp','Product Sp','required|numeric');
            $this->form_validation->set_rules('product_qty','Product Qty','required|numeric');
            $this->form_validation->set_rules('product_detail','Product Detail','required');
            $this->form_validation->set_rules('product_type','Product Type','required');
              $this->form_validation->set_rules('brand_id','Brand','required');
            if (!empty($_FILES['product_image']['name']))
            {
                $this->form_validation->set_rules('product_image', 'Product Image', 'callback_check_file_upload');
            }
            if($this->form_validation->run()==TRUE){
                $setdata=[];
                $setdata['category_id']=$this->input->post('category_id');
                $setdata['product_name']=$this->input->post('product_name');
                $setdata['product_mrp']=$this->input->post('product_mrp');
                $setdata['product_sp']=$this->input->post('product_sp');
                $setdata['product_qty']=$this->input->post('product_qty');
                $setdata['product_type']=$this->input->post('product_type');
                $setdata['product_detail']=$this->input->post('product_detail');
                $setdata['product_size']=$this->input->post('product_size');
                $setdata['brand_id']=$this->input->post('brand_id');
               
                  if($this->input->post('home_display') !== 'null'){
                   $setdata['home_display']=$this->input->post('home_display');
                }
            //   echo "<pre>";
            //   print_r($setdata['home_display']); die;
                if($this->input->post('product_color')){
                    $setdata['product_color']=implode(',',$this->input->post('product_color'));
                }
                if($this->input->post('product_highlight')){
                    $setdata['product_highlight']=implode(',',$this->input->post('product_highlight'));
                }
                if(!empty($_FILES['product_image']['name'])){
                    $extension =  pathinfo($_FILES['product_image']['name'],PATHINFO_EXTENSION);
                    $filename=$merchantId.'-'.$setdata['category_id'].'-'.strtolower(str_replace(' ','-',$this->input->post('product_name'))).'.'.$extension;
                    $fileContent = file_get_contents($_FILES["product_image"]["tmp_name"]);
                    $cloudPath = 'products/' .$filename;
                    upload_file($cloudPath,$fileContent);
                    $setdata['product_image']=$filename;
                }
                if($this->common->update('mapp_products',$setdata,['id'=>$id])){
                    $setdata1=[];
                    if(!empty($_FILES['gallery_image']['name']) && count($_FILES['gallery_image']['name'])>0){
                        $count=count($_FILES['gallery_image']['name']);
                        for($i=0;$i<$count;$i++){
                            $extension =  pathinfo($_FILES['gallery_image']['name'][$i],PATHINFO_EXTENSION);
                            $filename=$merchantId.'-gallery-'.strtolower(str_replace(' ','-',$this->input->post('product_name'))).rand(1111,9999).'.'.$extension;
                            $fileContent = file_get_contents($_FILES["gallery_image"]["tmp_name"][$i]);
                            $cloudPath = 'product_gallery/' .$filename;
                            upload_file($cloudPath,$fileContent);
                            $setdata1[]=[
                                'product_id'=>$id,
                                'image'=>$filename
                            ];
                        }
                    }
                    
                      if(!empty($this->input->post('similar_product_id')) ){
                             $this->common->remove('mapp_similar_product',array('product_id'=>$id));
                      $s_product = explode(",",implode (",", $this->input->post('similar_product_id')));
                      if(count($s_product)) {
                          if(!empty($s_product[0])) {
                              for($i=0; $i<count($s_product) ; $i++){
                                  $set_similar_product['product_id'] = $id;
                                   $set_similar_product['similar_product_id'] = $s_product[$i];
                                   
                                  $this->common->save('mapp_similar_product',$set_similar_product) ;
                              }
                          }
                      }
                      
                     }
                    
                    
                    
                    
                    if(!empty($setdata1)){
                        $this->common->save_batch('mapp_product_gallery',$setdata1);
                    }
                    return response(['status'=>'success','message'=>'Product Updated Successfully']);
                }else{
                    return response(['status'=>'fail','message'=>'Something Went Wrong']);
                }
            }else{
                $error="Something went Wrong";
                if(form_error('category_id')){
                    $error=form_error('category_id');
                }elseif(form_error('product_name')){
                    $error=form_error('product_name');
                }elseif(form_error('product_mrp')){
                    $error=form_error('product_mrp');
                }elseif(form_error('product_sp')){
                    $error=form_error('product_sp');
                }elseif(form_error('product_qty')){
                    $error=form_error('product_qty');
                }elseif(form_error('product_type')){
                    $error=form_error('product_type');
                }elseif(form_error('product_detail')){
                    $error=form_error('product_detail');
                }elseif(form_error('product_image')){
                    $error=form_error('product_image');
                }
                return response(['status'=>'fail','message'=>strip_tags($error)]);
            }
        }
        $this->data['gallery']=$this->common->records('mapp_product_gallery',['product_id'=>$id]);
        $this->data['categories']=$this->common->records('mapp_category',['merchant_id'=>$merchantId]);
        $this->data['brands']=$this->common->records('mapp_brand',['merchant_id'=>$merchantId]);
        $this->data['similar_product']=$this->common->records('mapp_products',['merchant_id'=>$merchantId]);
        $this->data['title']='Add Products';
        $this->data['content']='mapp/product/edit';
        $this->load->view('admintemplate', $this->data);
    }
    public function check_file_upload(){
        if(!empty($_FILES['product_image'])){
            $extension =  pathinfo($_FILES['product_image']['name'],PATHINFO_EXTENSION);
            if(!in_array($extension,['png','jpg','jpeg'])){
                $this->form_validation->set_message('check_file_upload','Only png,jpg,jpeg extension allowed');
                return false;
            }else{
                return true;
            }
        }
    }
    public function add(){
        $merchantId=$this->session->userdata('user_id');
       
        if($this->input->server('REQUEST_METHOD') == 'POST'){
             
            $this->form_validation->set_rules('category_id','Category','required');
            $this->form_validation->set_rules('product_name','Product Name','required');
            $this->form_validation->set_rules('product_mrp','Product Mrp','required|numeric');
            $this->form_validation->set_rules('product_sp','Product Sp','required|numeric');
            $this->form_validation->set_rules('product_qty','Product Qty','required|numeric');
            $this->form_validation->set_rules('product_detail','Product Detail','required');
            $this->form_validation->set_rules('product_type','Product Type','required');
             $this->form_validation->set_rules('brand_id','Brand','required');
            if (!empty($_FILES['product_image']['name']))
            {
                $this->form_validation->set_rules('product_image', 'Product Image', 'callback_check_file_upload');
            }else{
                $this->form_validation->set_rules('product_image', 'Product Image', 'required');
            }
            
            if($this->form_validation->run()==TRUE){
                $setdata=[];
                $setdata['merchant_id']=$merchantId;
                $setdata['category_id']=$this->input->post('category_id');
                $setdata['product_name']=$this->input->post('product_name');
                $setdata['product_mrp']=$this->input->post('product_mrp');
                $setdata['product_sp']=$this->input->post('product_sp');
                $setdata['product_qty']=$this->input->post('product_qty');
                $setdata['product_type']=$this->input->post('product_type');
                $setdata['product_detail']=$this->input->post('product_detail');
                $setdata['product_size']=$this->input->post('product_size');
                $setdata['brand_id']=$this->input->post('brand_id');
                  
                if($this->input->post('home_display') !== 'null'){
                       $setdata['home_display']=$this->input->post('home_display');
                }
                    
                if($this->input->post('home_display')){
                        $setdata['home_display']=$this->input->post('home_display');
                }
                if($this->input->post('product_color')){
                        $setdata['product_color']=implode(',',$this->input->post('product_color'));
                }
                if($this->input->post('product_highlight')){
                    $setdata['product_highlight']=implode(',',$this->input->post('product_highlight'));
                }
                
               
                
                if(!empty($_FILES['product_image']['name'])){
                    $extension =  pathinfo($_FILES['product_image']['name'],PATHINFO_EXTENSION);
                    $filename=$merchantId.'-'.$setdata['category_id'].'-'.strtolower(str_replace(' ','-',$this->input->post('product_name'))).'.'.$extension;
                    $fileContent = file_get_contents($_FILES["product_image"]["tmp_name"]);
                    $cloudPath = 'products/' .$filename;
                    upload_file($cloudPath,$fileContent);
                    $setdata['product_image']=$filename;
                }
                if($insertId = $this->common->save('mapp_products',$setdata)){
                    $setdata1=[];
                    if(!empty($_FILES['gallery_image']['name']) && count($_FILES['gallery_image']['name'])>0){
                        $count=count($_FILES['gallery_image']['name']);
                        for($i=0;$i<$count;$i++){
                            $extension =  pathinfo($_FILES['gallery_image']['name'][$i],PATHINFO_EXTENSION);
                            $filename=$merchantId.'-gallery-'.strtolower(str_replace(' ','-',$this->input->post('product_name'))).rand(1111,9999).'.'.$extension;
                            $fileContent = file_get_contents($_FILES["gallery_image"]["tmp_name"][$i]);
                            $cloudPath = 'product_gallery/' .$filename;
                            upload_file($cloudPath,$fileContent);
                            $setdata1[]=[
                                'product_id'=>$insertId,
                                'image'=>$filename
                            ];
                        }
                    }
                  
                    if(!empty($this->input->post('similar_product_id')) ){
                      $s_product = explode(",",implode (",", $this->input->post('similar_product_id')));
                      if(count($s_product)) {
                          if(!empty($s_product[0])) {
                              for($i=0; $i<count($s_product) ; $i++){
                                  $set_similar_product['product_id'] = $insertId;
                                   $set_similar_product['similar_product_id'] = $s_product[$i];
                                   
                                  $this->common->save('mapp_similar_product',$set_similar_product) ;
                              }
                          }
                      }
                      
                     }
                    
                    
                    
                    
                    if(!empty($setdata1)){
                        $this->common->save_batch('mapp_product_gallery',$setdata1);
                    
                    }
                    return response(['status'=>'success','message'=>'Product Added Successfully']);
                }else{
                    return response(['status'=>'fail','message'=>'Something Went Wrong']);
                }
            }else{
                $error="Something went Wrong";
                if(form_error('category_id')){
                    $error=form_error('category_id');
                }elseif(form_error('product_name')){
                    $error=form_error('product_name');
                }elseif(form_error('product_mrp')){
                    $error=form_error('product_mrp');
                }elseif(form_error('product_sp')){
                    $error=form_error('product_sp');
                }elseif(form_error('product_qty')){
                    $error=form_error('product_qty');
                }elseif(form_error('product_type')){
                    $error=form_error('product_type');
                }elseif(form_error('product_detail')){
                    $error=form_error('product_detail');
                }elseif(form_error('product_image')){
                    $error=form_error('product_image');
                }elseif(form_error('brand_id')){
                    $error=form_error('brand_id');
                }
                
                return response(['status'=>'fail','message'=>strip_tags($error)]);
            }
        }
        $this->data['categories']=$this->common->records('mapp_category',['merchant_id'=>$merchantId]);
          $this->data['brands']=$this->common->records('mapp_brand',['merchant_id'=>$merchantId]);
        $this->data['similar_product']=$this->common->records('mapp_products',['merchant_id'=>$merchantId]);
        $this->data['title']='Add Products';
        $this->data['content']='mapp/product/add';
        $this->load->view('admintemplate', $this->data);
    }
    public function delete_gallery_image(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            if(delete_file('product_gallery/'.$this->input->post('object'))){
                $this->common->remove('mapp_product_gallery',['id'=>$this->input->post('id')]);
                return response(['status'=>'success']);
            }else{
                return response(['status'=>'fail']);
            }
        }
    }
    public function change_status(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            if($this->common->update('mapp_products',['status'=>$this->input->post('status')],['id'=>$this->input->post('id')])){
                return response(['status'=>'success']);
            }else{
                return response(['status'=>'fail']);
            }
        }
    }
     public function change_action(){
       
            // $id = $this->input->post('user_ids');
            // print_r($id); die;
        if($this->input->server('REQUEST_METHOD') == 'POST'){
              //print_r($_POST); die;
            $updaterow['status']= $this->input->post('status');
            $ids = explode(",",$this->input->post('user_ids'));
            for($i=0; $i<count($ids); $i++){
                $set['id']=$ids[$i];
              $this->session->set_flashdata('success','Status Change Successfully');
                $this->common->update('mapp_products',$updaterow,$set);
            }
             redirect('mapp/product');
        }
       
         
    }
    
    public function import(){
        
        $data = array();
        $mapp_products = array();
        //echo "<pre>" ; print_r($this->input->post());  die;
        if($this->input->post('importSubmit')){
           
            // Form field validation rules
            $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
            //echo "<pre>" ; print_r($_FILES);  die;
            // Validate submitted form data
            if($this->form_validation->run() == true){
             
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                
              //  echo 1; die;
                // If file uploaded
                // if(is_uploaded_file($_FILES['file']['tmp_name'])){
                     
                    // Load CSV reader library
                    $this->load->library('CSVReader');
                    
                    // Parse data from CSV file
                    $csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);
                    //echo "<pre>" ; print_r($csvData);  die;
                    // Insert/update CSV data into database
                    if(!empty($csvData)){
                        foreach($csvData as $row){ $rowCount++;
                            
                            
                       $category=$this->common->record('mapp_category',['category_title'=>$row['category_title'],]);  
                       
                       if($category) {
                           $category_id = $category->id;
                       }   else{
                           $setdata['category_title'] = $row['category_title'];
                           $category_id =  $this->common->save('mapp_category',$setdata) ; 
                           
                       } 
                        $brand=$this->common->record('mapp_brand',['brand_name'=>$row['brand_name'],]); 
                        //print_r($brand);die;
                        if($brand){
                             $brand_id = $brand->id;
                        }else{
                             $setdata['brand_name'] = $row['brand_name'];
                             $brand_id =  $this->common->save('mapp_brand',$setdata) ; 
                        } 
                             
                            // Prepare data for DB insertion
                            $mapp_products = array(
                                'category_id' => $category_id,
                                'brand_id' => $brand_id,
                                'product_name' => $row['product_name'],
                                'product_detail' => $row['product_detail'],
                                'product_type' => $row['product_type'],
                                'product_size' => $row['product_size'],
                                'product_mrp' => $row['product_mrp'],
                                'product_color' => $row['product_color'],
                                'product_image' => $row['product_image'],
                                'product_highlight' => $row['product_highlight'],
                                'status' => $row['status'],
                            );
     
                            // print_r($mapp_products); 
                            // // Check whether email already exists in the database
                            // $con = array(
                            //     'where' => array(
                            //         'email' => $row['Email']
                            //     ),
                            //     'returnType' => 'count'
                            // );
                            // $prevCount = $this->mapp_produts->getRows($con);
                            
                            // if($prevCount > 0){
                            //     // Update member data
                            //     $condition = array('email' => $row['Email']);
                            //     $update = $this->member->update($memData, $condition);
                                
                            //     if($update){
                            //         $updateCount++;
                            //     }
                            // }else{
                            //     // Insert member data
                                $insert = $this->mapp_products->insert($memData);
                                
                                if($insert){
                                    $insertCount++;
                                }
                            }
                        }
                        
                        // Status message with imported data count
                       $notAddCount = ($rowCount - ($insertCount + $updateCount));
                        $successMsg = 'Product imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
                        $this->session->set_userdata('success_msg', $successMsg);
                    }
                // }else{
                //     $this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
                //     echo  1; die;
                // }
            }else{
                $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
            }
        

        redirect('mapp/product');
    }
 
   
    public function file_check($str){
        $allowed_mime_types = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ""){
            $mime = get_mime_by_extension($_FILES['file']['name']);
            $fileAr = explode('.', $_FILES['file']['name']);
            $ext = end($fileAr);
            if(($ext == 'csv') && in_array($mime, $allowed_mime_types)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only CSV file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please select a CSV file to upload.');
            return false;
        }
    }
    
    
    
}