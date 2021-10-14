<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chaloonline_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();      
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
    
    public function UserData($user_id,$level)
    {
       
        $this->db->select('user.first_name,user.last_name,map.*');
        $this->db->from("chaloonline_map as map");    
        $this->db->join("users as user","user.id=map.child_user_id",'LEFT');    
        $this->db->where("map.user_id",$user_id);   
        $query=$this->db->get();
        if($query->num_rows() > 0)
        {
            $userdata= $query->result();
            
            return $userdata;
        } else{
            return false;
        }           
    }

    public function getTree($user_id)
    {
        //$ref=$this->referralData($user_id);
        $levels=new stdClass();
       

        $this->db->select('user.first_name,user.last_name,map.*');
        $this->db->from("users as user");    
        $this->db->join("chaloonline_map as map","map.child_user_id=user.id",'LEFT');    
        $this->db->where("user.id",$user_id);   
        $query=$this->db->get();
        if ($query->num_rows() > 0) {
            $levels= $query->row();
            if(empty($levels->child_user_id)){
                $levels->child_user_id=$user_id;
            }
        }
       
        /*-------------level1---------------------*/
        $level1=$this->UserData($user_id,'level1');
        if($level1)
        {
            foreach($level1 as $key1=>$row1)
            {
                
                /*-------------level2---------------------*/
                $level2=$this->UserData($row1->child_user_id,'level2');
                if($level2)
                {
                    foreach($level2 as $key2=>$row2)
                    {
                        
                        /*-------------level3---------------------*/
                        $level3=$this->UserData($row2->child_user_id,'level3');
                        if($level3)
                        {
                            foreach($level3 as $key3=>$row3)
                            {
                                
                                /*-------------level4---------------------*/
                                $level4=$this->UserData($row3->child_user_id,'level4');
                                if($level4)
                                {
                                    foreach($level4 as $key4=>$row4)
                                    {
                                        
                                        /*-------------level5---------------------*/
                                        $level5=$this->UserData($row4->child_user_id,'level5');
                                        if($level5)
                                        {
                                            foreach($level5 as $key5=>$row5)
                                            {
                                                
                                                /*-------------level6---------------------*/
                                                $level6=$this->UserData($row5->child_user_id,'level6');
                                                if($level6)
                                                {
                                                     
                                                    foreach($level6 as $key6=>$row6)
                                                    {
                                                        
                                                        /*-------------level7---------------------*/
                                                        $level7=$this->UserData($row6->child_user_id,'level7');
                                                        if($level7)
                                                        {
                                                            //echo "<pre>";print_r($level7); die;
                                                            foreach($level7 as $key7=>$row7)
                                                            {
                                                                
                                                                /*-------------level8---------------------*/
                                                                $level8=$this->UserData($row7->child_user_id,'level8');
                                                                if($level8)
                                                                {
                                                                    foreach($level8 as $key8=>$row8)
                                                                    {
                                                                        
                                                                        /*-------------level9---------------------*/
                                                                        $level9=$this->UserData($row8->child_user_id,'level9');
                                                                        if($level9)
                                                                        {
                                                                            foreach($level9 as $key9=>$row9)
                                                                            {
                                                                               
                                                                                /*-------------level10---------------------*/
                                                                                $level10=$this->UserData($row9->child_user_id,'level10');
                                                                                if($level10)
                                                                                {
                                                                                    foreach($level10 as $key10=>$row10)
                                                                                    {                                                                                        
                                                                                        /*-------------level11---------------------*/
                                                                                        $level11=$this->UserData($row10->child_user_id,'level11');
                                                                                        if($level11)
                                                                                        {
                                                                                           
                                                                                            foreach($level11 as $key11=>$row11)
                                                                                            {  
                                                                                                /*-------------level12---------------------*/
                                                                                                $level12=$this->UserData($row11->child_user_id,'level12');
                                                                                                if($level12)
                                                                                                {                                        
                                                                                                    foreach($level12  as $key12=>$row12)
                                                                                                    {
                                                                                                       
                                                                                                    }                                                                                                    
                                                                                                    $level11[$key11]->child=$level12;
                                                                                                } 
                                                                                                                                                                                       
                                                                                            }   
                                                                                            $level10[$key10]->child=$level11;
                                                                                        }
                                                                                                                                                                          
                                                                                    }
                                                                                    
                                                                                    $level9[$key9]->child=$level10;
                                                                                }
                                                                                                                                                           
                                                                            }                                                                            
                                                                            $level8[$key8]->child=$level9;
                                                                        }  
                                                                                                                                      
                                                                    }
                                                                   
                                                                    $level7[$key7]->child=$level8;
                                                                }
                                                                                                                      
                                                            }
                                                            
                                                            $level6[$key6]->child=$level7;
                                                        }  
                                                                                                             
                                                    }
                                                    $level5[$key5]->child=$level6;
                                                }  
                                                                                           
                                            }                                           
                                            $level4[$key4]->child=$level5;
                                        }  
                                                                           
                                    }
                                   
                                    $level3[$key3]->child=$level4;
                                } 
                                                            
                            }
                           
                            $level2[$key2]->child=$level3;
                        }  
                                         
                    }
                   
                    $level1[$key1]->child=$level2;
                }
               
            }
            
            $levels->child=$level1;
        }
        return $levels;
    }

    
}