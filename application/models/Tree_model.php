<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tree_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();      
    }
    public function TreeCount($keyword="",$user_id){
        $this->db->select('*');
        $this->db->from("users");
        $this->db->where("parent_id",$user_id);
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('user.first_name', $keyword);
            $this->db->or_like('user.last_name', $keyword);
            $this->db->or_like('user.phone', $keyword);
            $this->db->group_end();
        }
        return $this->db->count_all_results();
    }
    public function TreeData($limit,$offset,$keyword="",$user_id){
        $this->db->select('user.*');
        $this->db->from("users as user");
       // $this->db->join("users_documents as doc","doc.user_id=user.id","LEFT");
        $this->db->where("parent_id",$user_id);
       

        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('user.first_name', $keyword);
            $this->db->or_like('user.last_name', $keyword);
            $this->db->or_like('user.phone', $keyword);
            $this->db->group_end();
        }
        
        $this->db->limit($limit,$offset);    
        $this->db->order_by("user.created_at","DESC");     
       return $this->db->get()->result();
      // $this->db->get();
      //echo  $this->db->last_query();die;
    }
    public function referralData($user_id)
    {
        $start_date="";
        $date="";
        if(isset($_POST['date'])){
            $date=date("Y-m-d",strtotime($_POST['date']));
        }
        if(isset($_POST['start_date'])){
            $start_date=date("Y-m-d",strtotime($_POST['start_date']));
        }

        $referral=new stdClass();
        $this->db->select('*');
        $this->db->from("users");       

        if(!empty($date)){
            $this->db->where(["parent_id"=>$user_id ,"membership_start_date >=" => $start_date,"membership_start_date <=" => $date]);
        }else{            
            $this->db->where(["parent_id"=>$user_id ,"membership_end_date >" => date("Y-m-d")]);
        }
        $referral->paid= $this->db->count_all_results();

        $this->db->select('*');
        $this->db->from("users");
        if(!empty($date)){
            //$this->db->where(["parent_id"=>$user_id ,"membership_start_date" => $date]);
            $this->db->where(["parent_id"=>$user_id ,"membership_start_date >=" => $start_date,"membership_start_date <=" => $date]);
        }else{
            $this->db->where(["parent_id"=>$user_id ,"membership_end_date >" => date("Y-m-d"),"membership_start_date >" => "2021-01-06"]);
           
        }

        $referral->newpaid= $this->db->count_all_results();

        //echo $this->db->last_query(); die;

        $this->db->select('*');
        $this->db->from("users");
        if(!empty($date)){
           // $this->db->where(["parent_id"=>$user_id]);
            $this->db->where(["parent_id"=>$user_id ,"created_at >=" => $start_date." 00:01:00","created_at <=" => $date." 23:59:59"]);
           //$this->db->like('created_at', $date);

        }else{
               
            $this->db->where("parent_id", $user_id);
            $this->db->group_start();
            $this->db->where("membership_end_date <", date("Y-m-d"));
            $this->db->or_where("membership_end_date IS NULL");
            $this->db->group_end();
        }
        
        $referral->unpaid= $this->db->count_all_results();

        $referral->total=$referral->unpaid+$referral->paid;
      //  echo $this->db->last_query();die;
        return $referral;
    }
    public function UserData($user_id,$level)
    {
       
        $this->db->select('user.id,user.first_name,user.last_name,map.id as map_id');
        $this->db->from("users_mapping as map");    
        $this->db->join("users as user","user.id=map.child_user_id",'LEFT');    
        $this->db->where("map.user_id",$user_id);   
        $query=$this->db->get();
        if($query->num_rows() > 0)
        {
            $userdata= $query->result();
            foreach($userdata as $key=>$row)
            {
                if(!empty($row->first_name)){

                
                    $ref=$this->referralData($row->id);
                    $userdata[$key]->paid=(int)$ref->paid;
                    $userdata[$key]->unpaid=(int)$ref->unpaid;
                    $userdata[$key]->total=(int)$ref->total;
                
                    $userdata[$key]->allpaid=(int)$ref->paid;
                    $userdata[$key]->allunpaid=(int)$ref->unpaid;
                    $userdata[$key]->alltotal=(int)$ref->total;
                    $userdata[$key]->newpaid=(int)$ref->newpaid;
                    $userdata[$key]->level=$level;
                   // $stock=userStock($row->id);
                    $userdata[$key]->stock=GetQrcodeWalletBalance($row->id);
                    $userdata[$key]->allstock=$userdata[$key]->stock;
                    $userdata[$key]->child=[];

                }else{
                    unset($userdata[$key]);
                }
            }
            return $userdata;
        } else{
            return false;
        }           
    }

    public function getTree($user_id)
    {
        $ref=$this->referralData($user_id);
        $levels=new stdClass();
        $levels->id=$user_id;
        $levels->paid=$ref->paid;
        $levels->unpaid=$ref->unpaid;
        $levels->total=$ref->total;
        $levels->allpaid=$ref->paid;
        $levels->allunpaid=$ref->unpaid;
        $levels->alltotal=$ref->total;
       /// $stockdata=userStock($user_id);
        $levels->stock=GetQrcodeWalletBalance($user_id);
        $levels->allstock=$levels->stock;
        /*-------------level1---------------------*/
        $level1=$this->UserData($user_id,'level1');
        if($level1)
        {
            foreach($level1 as $key1=>$row1)
            {
                
                /*-------------level2---------------------*/
                $level2=$this->UserData($row1->id,'level2');
                if($level2)
                {
                    foreach($level2 as $key2=>$row2)
                    {
                        
                        /*-------------level3---------------------*/
                        $level3=$this->UserData($row2->id,'level3');
                        if($level3)
                        {
                            foreach($level3 as $key3=>$row3)
                            {
                                
                                /*-------------level4---------------------*/
                                $level4=$this->UserData($row3->id,'level4');
                                if($level4)
                                {
                                    foreach($level4 as $key4=>$row4)
                                    {
                                        
                                        /*-------------level5---------------------*/
                                        $level5=$this->UserData($row4->id,'level5');
                                        if($level5)
                                        {
                                            foreach($level5 as $key5=>$row5)
                                            {
                                                
                                                /*-------------level6---------------------*/
                                                $level6=$this->UserData($row5->id,'level6');
                                                if($level6)
                                                {
                                                     
                                                    foreach($level6 as $key6=>$row6)
                                                    {
                                                        
                                                        /*-------------level7---------------------*/
                                                        $level7=$this->UserData($row6->id,'level7');
                                                        if($level7)
                                                        {
                                                            //echo "<pre>";print_r($level7); die;
                                                            foreach($level7 as $key7=>$row7)
                                                            {
                                                                
                                                                /*-------------level8---------------------*/
                                                                $level8=$this->UserData($row7->id,'level8');
                                                                if($level8)
                                                                {
                                                                    foreach($level8 as $key8=>$row8)
                                                                    {
                                                                        
                                                                        /*-------------level9---------------------*/
                                                                        $level9=$this->UserData($row8->id,'level9');
                                                                        if($level9)
                                                                        {
                                                                            foreach($level9 as $key9=>$row9)
                                                                            {
                                                                               
                                                                                /*-------------level10---------------------*/
                                                                                $level10=$this->UserData($row9->id,'level10');
                                                                                if($level10)
                                                                                {
                                                                                    foreach($level10 as $key10=>$row10)
                                                                                    {                                                                                        
                                                                                        /*-------------level11---------------------*/
                                                                                        $level11=$this->UserData($row10->id,'level11');
                                                                                        if($level11)
                                                                                        {
                                                                                           
                                                                                            foreach($level11 as $key11=>$row11)
                                                                                            {  
                                                                                                /*-------------level12---------------------*/
                                                                                                $level12=$this->UserData($row11->id,'level12');
                                                                                                if($level12)
                                                                                                {                                        
                                                                                                    foreach($level12  as $key12=>$row12)
                                                                                                    {
                                                                                                        $level11[$key11]->allpaid+=$row12->allpaid;
                                                                                                        $level11[$key11]->allunpaid+=$row12->allunpaid;
                                                                                                      //  $level11[$key11]->alltotal+=$row12->alltotal;  
                                                                                                      //  $level11[$key11]->allstock+=$row12->allstock;  
                                                                                                    }                                                                                                    
                                                                                                    $level11[$key11]->child=$level12;
                                                                                                } 
                                                                                                $level10[$key10]->allpaid+=$row11->allpaid;
                                                                                                $level10[$key10]->allunpaid+=$row11->allunpaid;
                                                                                              //  $level10[$key10]->alltotal+=$row11->alltotal;   
                                                                                              //  $level10[$key10]->allstock+=$row11->allstock;                                                                                               
                                                                                            }   
                                                                                            $level10[$key10]->child=$level11;
                                                                                        }
                                                                                        $level9[$key9]->allpaid+=$row10->allpaid;
                                                                                        $level9[$key9]->allunpaid+=$row10->allunpaid;
                                                                                      //  $level9[$key9]->alltotal+=$row10->alltotal;      
                                                                                       // $level9[$key9]->allstock+=$row10->allstock;                                                                                         
                                                                                    }
                                                                                    
                                                                                    $level9[$key9]->child=$level10;
                                                                                }
                                                                                $level8[$key8]->allpaid+=$row9->allpaid;
                                                                                $level8[$key8]->allunpaid+=$row9->allunpaid;
                                                                               // $level8[$key8]->alltotal+=$row9->alltotal;   
                                                                               // $level8[$key8]->allstock+=$row9->allstock;                                                                                 
                                                                            }                                                                            
                                                                            $level8[$key8]->child=$level9;
                                                                        }  
                                                                        $level7[$key7]->allpaid+=$row8->allpaid;
                                                                        $level7[$key7]->allunpaid+=$row8->allunpaid;
                                                                        //$level7[$key7]->alltotal+=$row8->alltotal;   
                                                                        //$level7[$key7]->allstock+=$row8->allstock;                                                                      
                                                                    }
                                                                   
                                                                    $level7[$key7]->child=$level8;
                                                                }
                                                                $level6[$key6]->allpaid+=$row7->allpaid;
                                                                $level6[$key6]->allunpaid+=$row7->allunpaid;
                                                                //$level6[$key6]->alltotal+=$row7->alltotal; 
                                                                //$level6[$key6]->allstock+=$row7->allstock;                                                                 
                                                            }
                                                            
                                                            $level6[$key6]->child=$level7;
                                                        }  
                                                        $level5[$key5]->allpaid+=$row6->allpaid;
                                                        $level5[$key5]->allunpaid+=$row6->allunpaid;
                                                       // $level5[$key5]->alltotal+=$row6->alltotal;  
                                                       // $level5[$key5]->allstock+=$row6->allstock;                                                       
                                                    }
                                                    $level5[$key5]->child=$level6;
                                                }  
                                                $level4[$key4]->allpaid+=$row5->allpaid;
                                                $level4[$key4]->allunpaid+=$row5->allunpaid;
                                               // $level4[$key4]->alltotal+=$row5->alltotal;   
                                                //$level4[$key4]->allstock+=$row5->allstock;                                             
                                            }                                           
                                            $level4[$key4]->child=$level5;
                                        }  
                                        $level3[$key3]->allpaid+=$row4->allpaid;
                                        $level3[$key3]->allunpaid+=$row4->allunpaid;
                                       // $level3[$key3]->alltotal+=$row4->alltotal;   
                                       // $level3[$key3]->allstock+=$row4->allstock;                                       
                                    }
                                   
                                    $level3[$key3]->child=$level4;
                                } 
                                $level2[$key2]->allpaid+=$row3->allpaid;
                                $level2[$key2]->allunpaid+=$row3->allunpaid;
                               // $level2[$key2]->alltotal+=$row3->alltotal;       
                               // $level2[$key2]->allstock+=$row3->allstock;                                
                            }
                           
                            $level2[$key2]->child=$level3;
                        }  
                        $level1[$key1]->allpaid+=$row2->allpaid;
                        $level1[$key1]->allunpaid+=$row2->allunpaid;
                        //$level1[$key1]->alltotal+=$row2->alltotal;  
                        //$level1[$key1]->allstock+=$row2->allstock;                      
                    }
                   
                    $level1[$key1]->child=$level2;
                }
                $levels->allpaid+=$row1->allpaid;
                $levels->allunpaid+=$row1->allunpaid;
               // $levels->alltotal+=$row1->alltotal; 
               // $levels->allstock+=$row1->allstock; 
            }
            
            $levels->child=$level1;
        }
        return $levels;
    }

    
}