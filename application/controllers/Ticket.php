0<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Calcutta"); 
class Ticket extends CI_Controller 
{
	public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form','universal']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model(['common','Ticket_model']);

    }


    public function index(){
        $this->data['user']=isAdmin();
        $this->data['tic_status']=$this->common->records("ticket_status");
        $this->data['tic_cat1']=$this->Ticket_model->GetEditCategory('0');
        $this->data['tic_priority']=$this->common->records("ticket_priority");
         $query="?";
        $keyword=$this->input->get('keyword');
        if (!empty($keyword)) {
            $query.="&keyword=".$keyword;
        }
        $status=$this->input->get('status');
        if(!empty($status)){
            $query.="&status=".$status;
        }
        $category=$this->input->get('category');
        if(!empty($category)){
            $query.="&category=".$category;
        }
        $followup_date=$this->input->get('followup_date');
        if(!empty($followup_date)){
            $query.="&followupdate=".$followup_date;
        }
        $priority=$this->input->get('priority');
        if(!empty($priority)){
            $query.="&priority=".$priority;
        }

        $config=getPagination();
        $config['base_url'] = site_url("ticket".$query);
        $config['total_rows'] =$this->Ticket_model->TicketCount($keyword,$this->data['user']->user_id,$status,$category,$followup_date,$priority);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page']-1)*$config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['users']=$this->Ticket_model->TicketData($config["per_page"], $page, $keyword,$this->data['user']->user_id,$status,$category,$followup_date,$priority);
         // echo "<pre>";print_r($users); die;
        $this->data['title']='Ticket';
        $this->data['content']='ticket/tickets';
        $this->load->view('admintemplate', $this->data);

    }

    public function ticketEdit($id="")
    {
          $this->data['user']=isAdmin();
          if(!empty($id)){
              $this->data['ticket']=$this->Ticket_model->TicketInfo($id);
              $this->data['tic_cat1']=$this->Ticket_model->GetEditCategory("0");
              $this->data['tic_cat2']=$this->Ticket_model->GetEditCategory($this->data['ticket']->cat_id1);;
              $this->data['tic_cat3']=$this->Ticket_model->GetEditCategory($this->data['ticket']->cat_id2);;
              $this->data['tic_cat4']=$this->Ticket_model->GetEditCategory($this->data['ticket']->cat_id3);;
          }else{
                $this->data['tic_cat1']=$this->Ticket_model->GetEditCategory('0');
                $this->data['tic_cat2']=[];
                $this->data['tic_cat3']=[];
                $this->data['tic_cat4']=[];
          }
          
           $this->data['tic_priority']=$this->common->records("ticket_priority");

          $this->data['tic_status']=$this->common->records("ticket_status");
            if($this->input->server('REQUEST_METHOD')=='POST')
            {                
                $this->form_validation->set_rules('cat_id1', 'Department', 'trim|required');
                $this->form_validation->set_rules('cat_id2', 'Issue', 'trim|required');
                $this->form_validation->set_rules('cat_id3', 'Sub issue', 'trim|required');
                $this->form_validation->set_rules('cat_id4', 'Action', 'trim|required');
                $this->form_validation->set_rules('phone', 'phone', 'trim|required');
                $this->form_validation->set_rules('description', 'description', 'trim|required');
                
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
             
                if ($this->form_validation->run()== FALSE)
                {
                        
                }
                else
                {
                    $phone=$this->input->post('phone');
                    $rec=$this->common->record("users",['phone'=>$phone]);
                    if( $rec)
                    {
                        $save['owner_id']=$this->data['user']->user_id;
                        $save['assign_id']=$rec->id;
                        $save['category_id']=$this->input->post('cat_id4');
                        $save['cat_id1']=$this->input->post('cat_id1');
                        $save['cat_id2']=$this->input->post('cat_id2');
                        $save['cat_id3']=$this->input->post('cat_id3');
                        $save['cat_id4']=$this->input->post('cat_id4');
                        $save['status']=$this->input->post('status');
                        $save['priority']=$this->input->post('priority');
                        $save['description']=$this->input->post('description');
        
                        if (!empty($id)) 
                        {
                             $this->common->update("tickets", $save, ['id'=>$id]);
                        } 
                        else {
                              
                            $last_id=$this->common->save("tickets", $save);
                            $savaData['ticket_id']=$last_id;
                            $savaData['comment']= "assign";
                            $savaData['actions']= 'assign';
                            $savaData['user_id']=  $save['owner_id'];
                            $savaData['other_user_id']= $save['assign_id'];
                            $this->common->save("ticket_activities", $savaData);
                        }
                        redirect("ticket");
                    }else{
                       $this->data['message']='<div class="alert alert-danger" role="alert">Invalid Number</div>';
                    }
                }
            }
        
            $this->data['title']='edit';
            $this->data['content']='ticket/ticket_edit';
            $this->load->view('admintemplate', $this->data);

    }
    public function ticketReassign($id="")
    {
          $this->data['user']=isAdmin();
          if(!empty($id)){
              $this->data['ticket']=$this->Ticket_model->TicketInfo($id);
            
          }
          

         
            if($this->input->server('REQUEST_METHOD')=='POST')
            {                
                $this->form_validation->set_rules('phone', 'phone', 'trim|required');
                
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
             
                if ($this->form_validation->run()== FALSE)
                {
                        
                }
                else
                {
                    $phone=$this->input->post('phone');
                    $rec=$this->common->record("users",['phone'=>$phone]);
                    if( $rec)
                    {
                        
                        $save['assign_id']=$rec->id;
                        $save['updated_at']=$rec->id;
                        $save['unread']=(int)($this->data['ticket']->unread) + 1;
                       
                        if (!empty($id)) 
                        {
                            $this->common->update("tickets", $save, ['id'=>$id]);
                            $savaData['ticket_id']= $id;
                            $savaData['comment']= "assign";
                            $savaData['actions']= 'assign';
                            $savaData['user_id']= $this->data['user']->user_id;
                            $savaData['other_user_id']= $save['assign_id'];
                            $this->common->save("ticket_activities", $savaData);
                        } 
                        
                      
                        $this->session->set_flashdata('success','Ticket assigned Successfully');
                        
                        redirect("ticket/ticketView/".$id);
                    }else{
                       $this->data['message']='<div class="alert alert-danger" role="alert">Invalid Number</div>';
                    }
                }
            }
        
            $this->data['title']='edit';
            $this->data['content']='ticket/ticket_reassign';
            $this->load->view('admintemplate', $this->data);

    }
    public function get_subcategory()
    {   $this->data['user']=isAdmin();
        $cat_id=$this->input->post("cat_id");
        $categories='<option value="">Select Category</option>';
        $cats=$this->Ticket_model->GetEditCategory($cat_id);  //level 0
        if($cats){
            foreach($cats as $cat)
            {
                
                $categories.='<option value="'.$cat->id.'">'.$cat->cat_name.'</option>';  
               
            }
        }
        echo $categories;
    }

    public function ticketCategory()
    {   $this->data['user']=isAdmin();
        $this->data['category']=$this->common->GetAllResult('ticket_categories');
        $this->data['title']='edit';
        $this->data['content']='ticket/ticket_category';
        $this->load->view('admintemplate', $this->data);

    }

    public function ticketCategoryedit($id=""){
        $this->data['user']=isAdmin();
            $parent_id="";
            if(!empty($id)){
                $this->data['category']=$this->common->record('ticket_categories',['id'=>$id]);
                $parent_id=$this->data['category']->parent_id;
            }


            $categories="";
            $cats=$this->Ticket_model->GetEditCategory("0");  //level 0
           // echo "<pre>";print_r($cats); die;
            if($cats){
                foreach($cats as $cat)
                {
                    if($parent_id==$cat->id){
                        $categories.='<option selected="selected" value="'.$cat->id.'">--'.$cat->cat_name.'</option>';  
                    }else{
                        $categories.='<option value="'.$cat->id.'">'.$cat->cat_name.'</option>';  
                    }
                   // echo $categories; die;
                    $cats1=$this->Ticket_model->GetEditCategory($cat->id,$id);//level 1
                    if($cats1)
                    {
                        foreach($cats1 as $cat1)
                        {
                            if($parent_id==$cat1->id){
                                $categories.='<option selected="selected" value="'.$cat1->id.'">--'.$cat1->cat_name.'</option>';  
                            }else{
                                $categories.='<option value="'.$cat1->id.'">--'.$cat1->cat_name.'</option>';  
                            }
                            
                            $cats2=$this->Ticket_model->GetEditCategory($cat1->id,$id);//level 2
                            if($cats2)
                            {
                                foreach($cats2 as $cat2)
                                {
                                    if($parent_id==$cat2->id){
                                        $categories.='<option selected="selected" value="'.$cat2->id.'">--'.$cat2->cat_name.'</option>';  
                                    }else{
                                    $categories.='<option value="'.$cat2->id.'">----'.$cat2->cat_name.'</option>';  
                                    }
                                      
                                }          
                            }
                        }      
                    }  
                }
            }
           $this->data['categories']=$categories;



           //  echo "<pre>"; print_r( $category); die;
            $this->data['all_category']=$this->common->GetAllResult('ticket_categories');
            if($this->input->server('REQUEST_METHOD')=='POST')
            {                
                $this->form_validation->set_rules('cat_name', 'Category Name', 'trim|required');
            
                $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
            
                if ($this->form_validation->run()== FALSE)
                {
                        
                }
                else
                {
                $save['parent_id']=$this->input->post('parent_id');
                $save['cat_name']=$this->input->post('cat_name');

                if (!empty($id)) {
                    $this->common->update("ticket_categories", $save, ['id'=>$id]);
                    } else {
                        $this->common->save("ticket_categories", $save);
                    }
                    redirect("ticket/ticketCategory");

                }
            }
                $this->data['title']='edit';
                $this->data['content']='ticket/ticket_editcategory';
                $this->load->view('admintemplate', $this->data);
    }

    public function ticketCategorydelete($id)
    {
        $this->data['user']=isAdmin();

      if (!empty($id)) 
       {
        $this->common->remove("ticket_categories", ['id'=>$id]);
       } 
        redirect("ticket/ticketCategory");
    }


    public function ticketView($id="")
    {

      
       
        $this->data['tic_priority']=$this->common->records("ticket_priority");
        $this->data['tic_status']=$this->common->records("ticket_status");
        $this->data['date']=$this->common->record("tickets",['id'=>$id] );
        
        
        $this->data['user']=isAdmin();
         //  echo "<pre>"; print_r( $this->data['user']->owner_id); die;s
        if(!empty($id))
        {
              $this->data['ticket']=$this->Ticket_model->TicketInfo($id);
              if($this->data['user']->user_id==$this->data['ticket']->assign_id){
                   $update=['unread'=>'0'];
                   $this->common->update("tickets",$update,['id'=>$id]);
                   //  echo "<pre>"; print_r( $this->data['ticket']); die;
              }
             
        }
       
        
        
        if($this->input->server('REQUEST_METHOD')=='POST')
        {
            if (!empty($_FILES['attachment']['name']))
            {
                $this->load->library('upload');
                $config['upload_path'] = './temp/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|docx|doc|txt|rtf|xls|xlsx|ppt|pptx|pdf';     
    
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('attachment'))
                {
                    $img = $this->upload->data();
                    
                    $extension =  pathinfo($_FILES['attachment']['name'],PATHINFO_EXTENSION);
                    $filename=$this->data['user']->user_id.'-'.strtolower(str_replace(' ','-',$_FILES['attachment']['name']));
                    $fileContent = file_get_contents($_FILES["attachment"]["tmp_name"]);
                    $Path = 'ticket/'. $filename ;
                    $status=CloudFileUpload($Path,$fileContent);
                    $extension =  pathinfo($_FILES['attachment']['name'],PATHINFO_EXTENSION);
                    $filename=$this->data['user']->user_id.'-'.strtolower(str_replace(' ','-',$_FILES['attachment']['name']));
                    $fileContent = file_get_contents($_FILES["attachment"]["tmp_name"]);
                    $Path = 'ticket/'. $filename ;
                    $status=CloudFileUpload($Path,$fileContent);
                    $savaData=[];
                    $savaData['ticket_id']= $id;
                    $savaData['comment']= $filename;
                    $savaData['actions']= 'attachment';
                    $savaData['user_id']= $this->data['user']->user_id;
                    $this->common->save("ticket_activities", $savaData);
                    // echo "<pre>"; print_r( $savaData); die;
                    $this->session->set_flashdata('success','Document Added Successfully');
                    redirect("ticket/ticketView/".$id);
                    
                    
                   
                }
                else
                {
                    echo $this->upload->display_errors();
    
                }
            }else{
            
            

             $save['ticket_id']=$id;
             $save['comment']=$this->input->post('comment');
             $save['actions']='comment';
             $save['user_id']=$this->data['user']->user_id;
             $this->common->save("ticket_activities", $save);
             $this->session->set_flashdata('success','Comment Added Successfully');
             $user=isAdmin();
           
        
        $this->data['tockens']=$this->Ticket_model->NotifyMe($id);
        // echo  $this->data['tockens']->fcm_token ;die;
        if( $user->user_id == $this->data['tockens']->owner_id){
            $token= $this->data['tockens']->fcm_token;
   
            $message=[
                         'title' =>"New Ticket from ". $this->data['tockens']->name." ".$this->data['tockens']->surnem . "- Added Comment" . $save['comment'],
                         'body' =>"App Active"
                     ];
             
                  Notification( $token ,$message);

        }else{
            $token= $this->data['tockens']->owner_fcm_token;
            
         $message=[
            'title' =>"New Ticket from ". $this->data['tockens']->assign_first_name." ".$this->data['tockens']->assign_last_name . "- Added Comment" . $save['comment'],
            'body' =>"App Active"
        ];

     Notification( $token ,$message);
    }
                     //  echo $status;die;
             redirect("ticket/ticketView/".$id);

             
            }
        }
        $this->data['activities']=$this->Ticket_model->CommentList($id);
         // echo "<pre>"; print_r( $this->data['activities']); die;
        $this->data['title']='edit';
        $this->data['content']='ticket/ticket_view';
        $this->load->view('admintemplate', $this->data);
    }

    
    
    
    public function uploadFile($id="")
    {
           $this->data['user']=isAdmin();
        //     if(!empty($id))
        //     {
        //         $this->data['ticket']=$this->Ticket_model->TicketInfo($id);
        //     }
            if($this->input->server('REQUEST_METHOD')=='POST')
            {
                
                $this->form_validation->set_rules('attachment', 'Document', 'trim|required');
                $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
                if ($this->form_validation->run()== TRUE)
                {
                        echo "error";die;
                }
                else
                {
                    $extension =  pathinfo($_FILES['attachment']['name'],PATHINFO_EXTENSION);
                    $filename=$this->data['user']->user_id.'-'.strtolower(str_replace(' ','-',$_FILES['attachment']['name']));
                    $fileContent = file_get_contents($_FILES["attachment"]["tmp_name"]);
                    $Path = 'ticket/'. $filename ;
                    $status=CloudFileUpload($Path,$fileContent);
                    $savaData=[];
                    $savaData['comment']= $filename;
                    $savaData['actions']= 'attachment';
                    $savaData['user_id']= $this->data['user']->user_id;
                    $this->common->save("ticket_activities", $savaData);
                    // echo "<pre>"; print_r( $savaData); die;
                    $this->session->set_flashdata('success','Document Added Successfully');
                  
                    redirect("ticket/ticketView/".$id);
                    
                }
            }
    }
   
    public function ticketUpdate($id)
    {
        $this->data['user']=isAdmin();
        $save['status']=$this->input->post('status');
        if (!empty($id)) 
        {
          $this->common->update("tickets", $save, ['id'=>$id]);
            
            $savaData['ticket_id']= $id;
            $savaData['comment']= $save['status'];
            $savaData['actions']= 'status';
            $savaData['user_id']= $this->data['user']->user_id;
            $this->common->save("ticket_activities", $savaData);
            $this->session->set_flashdata('success','Status changed Successfully');
        } 
          redirect("ticket");
    }
    
    public function statusChange()
    {
        $user=isAdmin();
        $status=$this->input->post('status');
        $id=$this->input->post('id');
       

        
        $this->data['tockens']=$this->Ticket_model->NotifyMe($id);
        // echo  $this->data['tockens']->fcm_token ;die;
        if( $user->user_id == $this->data['tockens']->owner_id){
            $token= $this->data['tockens']->fcm_token;
   
            $message=[
                         'title' =>"New Ticket from ". $this->data['tockens']->name." ".$this->data['tockens']->surnem . "- Change Status" . $status,
                         'body' =>"App Active"
                     ];
             
                  Notification( $token ,$message);

        }else{
            $token= $this->data['tockens']->owner_fcm_token;
            
         $message=[
            'title' =>"New Ticket from ". $this->data['tockens']->assign_first_name." ".$this->data['tockens']->assign_last_name . "- Change Status" . $status,
            'body' =>"App Active"
        ];

     Notification( $token ,$message);
    }
        
   
         
        
        $save=[
            "status"=>$status,
            "updated_at"=>date("Y-m-d H:i:s")
            
            ];
       
          $this->common->update("tickets", $save, ['id'=>$id]);
            
            $savaData['ticket_id']= $id;
            $savaData['comment']= $save['status'];
            $savaData['actions']= 'status';
            $savaData['user_id']= $user->user_id;
            $this->common->save("ticket_activities", $savaData);
            echo json_encode(['status'=>'success']);

    }
    public function priorityChange()
    {
        $user=isAdmin();
        $priority=$this->input->post('priority');
        $id=$this->input->post('id');
        
       
        
        $this->data['tockens']=$this->Ticket_model->NotifyMe($id);
        // echo  $this->data['tockens']->fcm_token ;die;
        if( $user->user_id == $this->data['tockens']->owner_id){
            $token= $this->data['tockens']->fcm_token;
   
            $message=[
                         'title' =>"New Ticket from ". $this->data['tockens']->name." ".$this->data['tockens']->surnem . "- Change Priority" . $priority,
                         'body' =>"App Active"
                     ];
             
                  Notification( $token ,$message);

        }else{
            $token= $this->data['tockens']->owner_fcm_token;
            
         $message=[
            'title' =>"New Ticket from ". $this->data['tockens']->assign_first_name." ".$this->data['tockens']->assign_last_name . "- Change Priority" . $priority,
            'body' =>"App Active"
        ];

     Notification( $token ,$message);
    }
        
   
         

        $save=[
            "priority"=>$priority,
            "updated_at"=>date("Y-m-d H:i:s")
            
            ];
       
          $this->common->update("tickets", $save, ['id'=>$id]);
            
            $savaData['ticket_id']= $id;
            $savaData['comment']= $save['priority'];
            $savaData['actions']= 'priority';
            $savaData['user_id']= $user->user_id;
            $this->common->save("ticket_activities", $savaData);
            echo json_encode(['status'=>'success']);
    }

    public function followUpChange()
    {
        $user=isAdmin();
        $followup_date=date("Y-m-d",strtotime($this->input->post("followup_date")));
        
        $id=$this->input->post('id');
        
        $save=[
            "followup_date"=>$followup_date,
            "updated_at"=>date("Y-m-d H:i:s")
            
            ];
       

            
        
        $this->data['tockens']=$this->Ticket_model->NotifyMe($id);
        // echo  $this->data['tockens']->fcm_token ;die;
        if( $user->user_id == $this->data['tockens']->owner_id){
            $token= $this->data['tockens']->fcm_token;
   
            $message=[
                         'title' =>"New Ticket from ". $this->data['tockens']->name." ".$this->data['tockens']->surnem . "- Change FollowUp Date" . $followup_date,
                         'body' =>"App Active"
                     ];
             
                  Notification( $token ,$message);

        }else{
            $token= $this->data['tockens']->owner_fcm_token;
            
         $message=[
            'title' =>"New Ticket from ". $this->data['tockens']->assign_first_name." ".$this->data['tockens']->assign_last_name . "- Change FollowUp Date" . $followup_date,
            'body' =>"App Active"
        ];

     Notification( $token ,$message);
    }

          $this->common->update("tickets", $save, ['id'=>$id]);
            //echo $save;die;
            //  echo "<pre>"; print_r( $save); die;
            $savaData['ticket_id']= $id;
            $savaData['comment']= $save['followup_date'];
            $savaData['actions']= 'followUp';
            $savaData['user_id']= $user->user_id;
            $this->common->save("ticket_activities", $savaData);
            echo json_encode($savaData);
            
                
    }
	

    public function TicketExport($user_id="") {
            
        $user=isAdmin();
        $this->data['user']=$user;
       
            $fileName="";  
            $filename = 'Ticket_'.date('Ymd').'.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");

            $Tickets = $this->Ticket_model->ExportTicket($user->user_id);
           // echo "<pre>"; print_r( $Tickets); die; 
            $file = fopen('php://output', 'w'); 
            $header = array("Id","Owner First Name"," Owner Last Name","Assigned First Name","Assigned Last Name","Category","Status","Priority","DATE","FOLLOWUP DATE"); 
            fputcsv($file, $header);
            foreach ($Tickets->result_array() as $key => $row){ 
                fputcsv($file,$row); 
            }
            fclose($file); 
            exit; 
       
        }

    // public function SendNotification($id){

    //     $this->data['tockens']=$this->Ticket_model->NotifyMe($id);
    // //      echo "<pre>";
    // //    print_r($this->data['tockens']);die;
    //     $message=[
    //         'title' =>"status change",
    //         'body' =>"App Active"
    //     ];

    //  notification($device->fcm_token,$message);

   


    // }


}
