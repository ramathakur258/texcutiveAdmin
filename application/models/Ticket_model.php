<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ticket_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();      
    }
    public function TicketCount($keyword="",$user_id="",$status="",$category="",$followup_date="",$priority="")
    {
        $where=[];
      
       
        $this->db->select('ticket.id');
        $this->db->from("tickets as ticket");
        $this->db->join("users as owner","owner.id=ticket.owner_id",'INNER');
        $this->db->join("users as assign","assign.id=ticket.assign_id",'INNER');
        $this->db->join("ticket_categories as category","category.id=ticket.cat_id1",'INNER');
        
        if($user_id==377){
            
        }else{
        $this->db->group_start();
        $this->db->where("ticket.owner_id",$user_id);
        $this->db->or_where("ticket.assign_id",$user_id);
       $this->db->group_end();
        }
        
        if(!empty($keyword)){
          
            $this->db->like('ticket.id', $keyword);
            $this->db->or_like('ticket.cat_id1', $keyword);
             $this->db->or_like('owner.first_name', $keyword);
             $this->db->or_like('assign.first_name', $keyword);
        
        }
          if(!empty($status)){
            $this->db->where("ticket.status",$status);
          }
          if(!empty($category)){
            $this->db->where("ticket.cat_id1",$category);
        }
        if(!empty($followup_date)){
            $this->db->where("ticket.followup_date",$followup_date);
        }
        if(!empty($priority)){
            $this->db->where("ticket.priority",$priority);
        }
        
         // $this->db->get(); echo $this->db->last_query(); die;
        return $this->db->count_all_results();
    }
    public function TicketData($limit,$offset,$keyword="",$user_id="",$status="",$category="",$followup_date="",$priority="")
    {
        $where=[];
        $this->db->select('ticket.*, owner.first_name as owner_first_name,owner.last_name as owner_last_name, assign.first_name as assign_first_name,assign.last_name as assign_last_name, category.cat_name ');
        $this->db->from("tickets as ticket");
        $this->db->join("users as owner","owner.id=ticket.owner_id",'INNER');
        $this->db->join("users as assign","assign.id=ticket.assign_id",'INNER');
        $this->db->join("ticket_categories as category","category.id=ticket.cat_id1",'INNER');
   
        
       if($user_id==377){
            
        }else{
        $this->db->group_start();
        $this->db->where("owner_id",$user_id);
        $this->db->or_where("assign_id",$user_id);
        $this->db->group_end();
        }
       
         if(!empty($keyword)){
            
             $this->db->like('ticket.id', $keyword);
             $this->db->or_like('ticket.cat_id1', $keyword);
             $this->db->or_like('owner.first_name', $keyword);
             $this->db->or_like('assign.first_name', $keyword);
          
         }
         if(!empty($status)){
            $this->db->where("ticket.status",$status);
          }else{
            $this->db->where_not_in("ticket.status",'solved');  
          }
          if(!empty($category)){
            $this->db->where("ticket.cat_id1",$category);
        }
        if(!empty($followup_date)){
            $this->db->where("ticket.followup_date",$followup_date);
        }
        
        /*echo $c_date=explode('0',date("Y-m-d H:i:s")); die;
        if(!empty($c_date)){
            $this->db->like("ticket.created_at",$c_date);
        }*/
        if(!empty($priority)){
            $this->db->where("ticket.priority",$priority);
        }
        
        $this->db->limit($limit,$offset); 
        $this->db->order_by('priority DESC'); 
       // $this->db->order_by('followup_date DESC'); 
        $this->db->order_by("ticket.created_at","DESC");    
       // $this->db->order_by("ticket.updated_at","ASC");    
        
        //$this->db->get(); echo $this->db->last_query(); die;

       return $this->db->get()->result();
       
      
       
    }
    public function TicketInfo($id)
    {
        $where=[];
        
        $this->db->select('ticket.*, owner.first_name as owner_first_name,owner.last_name as owner_last_name, assign.first_name as assign_first_name,assign.last_name as assign_last_name,assign.phone as assign_phone, category.cat_name,assign.avatar as assign_avatar,cat1.cat_name as cat1_title,cat2.cat_name as cat2_title,cat3.cat_name as cat3_title,cat4.cat_name as cat4_title');
        $this->db->from("tickets as ticket");
        $this->db->join("users as owner","owner.id=ticket.owner_id","LEFT");
        $this->db->join("users as assign","assign.id=ticket.assign_id","LEFT");
        $this->db->join("ticket_categories as category","category.id=ticket.category_id","LEFT");
        $this->db->join("ticket_categories as cat1","cat1.id=ticket.cat_id1","LEFT");
        $this->db->join("ticket_categories as cat2","cat2.id=ticket.cat_id2","LEFT");
        $this->db->join("ticket_categories as cat3","cat3.id=ticket.cat_id3","LEFT");
        $this->db->join("ticket_categories as cat4","cat4.id=ticket.cat_id4","LEFT");
        $this->db->group_start();
        $this->db->where("ticket.id",$id);
        $this->db->group_end();
       
       return $this->db->get()->row();

      
    }

    public function TicketDetail($id)
    {
        $where=[];
        
        $this->db->select('*');
        $this->db->from("ticket_activities as activities");
        $this->db->join("users as owner","activities.user_id =owner.id","LEFT");
        $this->db->join("tickets as ticket","activities.user_id =ticket.owner_id","LEFT");
        $this->db->group_start();
        $this->db->where("activities.user_id",$id);
        $this->db->group_end();
       return $this->db->get()->result();

      
    }
   
    public function GetEditCategory($parent_id,$not_in="")
    {
        $where=[];
        
        $this->db->select('*');
        $this->db->from("ticket_categories");
        $this->db->where("parent_id",$parent_id);
        if(!empty($not_in)){
            $this->db->where_not_in("id",[$not_in]);
            
        }
        $res= $this->db->get();
        if($res->num_rows() > 0){
            return $res->result();
        }else{
            return false;
        }

      
    }
   
    public function CommentList($id)
    {
        $where=[];
        
        $this->db->select('activitity.*,user.first_name,user.last_name,user.avatar,otheruser.first_name as other_fname,,otheruser.last_name as other_lname');
        $this->db->from("ticket_activities as activitity");
        $this->db->join("users as user","user.id=activitity.user_id","LEFT");
        $this->db->join("users as otheruser","otheruser.id=activitity.other_user_id","LEFT");
        $this->db->where("activitity.ticket_id",$id);
          $this->db->order_by("id","DESC");
        return $this->db->get()->result();

      
    }


    public function TicketView($user_id)
    {
        $where=[];
        
        $this->db->select('ticket.*, owner.first_name as owner_first_name,owner.last_name as owner_last_name, assign.first_name as assign_first_name,assign.last_name as assign_last_name, category.cat_name');
        $this->db->from("tickets as ticket");
        $this->db->join("users as owner","owner.id=ticket.owner_id","LEFT");
        $this->db->join("users as assign","assign.id=ticket.assign_id","LEFT");
        $this->db->join("ticket_categories as category","category.id=ticket.category_id","LEFT");
       if(!empty($where)){
        
        $this->db->group_start();
        $this->db->where("owner_id",$user_id);
        $this->db->or_where("assign_id",$user_id);
        $this->db->group_end();          
    }
    $result=$this->db->get();
    if($result->num_rows() > 0)
    {
        return $result->row();
        
    }else{
        return false;
    }    

    }


    
    public function View()
    {
        $where=[];
        
        $this->db->select('ticket.*, owner.first_name as owner_first_name,owner.last_name as owner_last_name, assign.first_name as assign_first_name,assign.last_name as assign_last_name, category.cat_name');
        $this->db->from("tickets as ticket");
        $this->db->join("users as owner","owner.id=ticket.owner_id","LEFT");
        $this->db->join("users as assign","assign.id=ticket.assign_id","LEFT");
        $this->db->join("ticket_categories as category","category.id=ticket.category_id","LEFT");
       if(!empty($where)){
        
        $this->db->group_start();
        $this->db->where("owner_id",$user_id);
        $this->db->or_where("assign_id",$user_id);
        $this->db->group_end();          
    }
    $result=$this->db->get();
    if($result->num_rows() > 0)
    {
        return $result->row();
        
    }else{
        return false;
    }    

    }


        public function NotifyMe($id){
           
            $this->db->select('assign.fcm_token as fcm_token,owner.fcm_token as owner_fcm_token,owner.first_name as name,owner.last_name  as surnem,owner.id as owner_id, assign.id as assign_id ,assign.first_name as assign_first_name,assign.last_name as assign_last_name');
            $this->db->from("tickets as ticket");
            $this->db->join("users as owner","owner.id=ticket.owner_id","LEFT");
            $this->db->join("users as assign","assign.id=ticket.assign_id","LEFT");
            $this->db->where("ticket.id",$id);
           //  $this->db->get(); echo $this->db->last_query(); die;
            $result=$this->db->get();
            if($result->num_rows() > 0)
            {
                return $result->row();
                
            }else{
                return false;
            }    
        }




        public function ExportTicket($user_id="")
        {
            $where=[];
            
            $this->db->select('ticket.id, owner.first_name as owner_first_name,owner.last_name as owner_last_name, assign.first_name as assign_first_name,assign.last_name as assign_last_name, category.cat_name,ticket.status,ticket.priority, ticket.created_at,ticket.followup_date');
            $this->db->from("tickets as ticket");
            $this->db->join("users as owner","owner.id=ticket.owner_id",'INNER');
            $this->db->join("users as assign","assign.id=ticket.assign_id",'INNER');
            $this->db->join("ticket_categories as category","category.id=ticket.cat_id1",'INNER');
       
            
           if($user_id==377){
                
            }else{
            $this->db->group_start();
            $this->db->where("owner_id",$user_id);
            $this->db->or_where("assign_id",$user_id);
            $this->db->group_end();
            }
           
            //  if(!empty($keyword)){
                
            //      $this->db->like('ticket.id', $keyword);
            //      $this->db->or_like('ticket.cat_id1', $keyword);
            //      $this->db->or_like('owner.first_name', $keyword);
            //      $this->db->or_like('assign.first_name', $keyword);
              
            //  }
            //  if(!empty($status)){
            //     $this->db->where("ticket.status",$status);
            //   }
            //   if(!empty($category)){
            //     $this->db->where("ticket.cat_id1",$category);
            // }
            // if(!empty($followup_date)){
            //     $this->db->where("ticket.followup_date",$followup_date);
            // }
            // if(!empty($priority)){
            //     $this->db->where("ticket.priority",$priority);
          //  }
            
          
            $this->db->order_by('priority DESC'); 
            $this->db->order_by('followup_date DESC'); 
            $this->db->order_by("ticket.created_at","DESC");    
            $this->db->order_by("ticket.updated_at","ASC");    
            
            //$this->db->get(); echo $this->db->last_query(); die;
    
           return $this->db->get();
           
          
           
        }
    
}