0<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Attendance_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();      
    }
    public function UserCount($keyword="",$user_id="")
    {
        $where=[];
        $olddate=date("Y-m-d", strtotime("- 1 day"));
        if(!empty($user_id)){
            if($user_id==1 || $user_id==377){
                
            }else{
            $where['map.user_id']=$user_id;
            }
            $where['user.user_group']="4";
            //$where['atten.attend_date']=date("Y-m-d", strtotime("+ 1 day"));
        }
        $this->db->select('map.id');
        $this->db->from("users_mapping as map");
        $this->db->join("users as user","user.id=map.child_user_id","LEFT");
        $this->db->join("emp_attendance as atten","atten.emp_id=map.child_user_id AND atten.attend_date > '$olddate'  ","LEFT");
        
        if(!empty($where)){
            $this->db->group_start();
            $this->db->where($where);
            $this->db->group_end();
        }
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('user.first_name', $keyword);
            $this->db->or_like('user.last_name', $keyword);
            $this->db->or_like('user.phone', $keyword);
            $this->db->group_end();
        }
        
        
        return $this->db->count_all_results();
    }
    public function UserData($limit,$offset,$keyword="",$user_id="")
    {
        $where=[];
        $olddate=date("Y-m-d", strtotime("- 1 day"));
        if(!empty($user_id)){
            if($user_id==1 || $user_id==377){
                
            }else{
            $where['map.user_id']=$user_id;
            }
            $where['user.user_group']="4";
            //$where['atten.attend_date']=date("Y-m-d", strtotime("+ 1 day"));
        }
        $this->db->select('map.user_id as owner_id,map.child_user_id as employee_id,user.first_name,user.last_name,user.email,user.phone,user.avatar,atten.*');
        $this->db->from("users_mapping as map");
        $this->db->join("users as user","user.id=map.child_user_id","LEFT");
        $this->db->join("emp_attendance as atten","atten.emp_id=map.child_user_id AND atten.attend_date > '$olddate'   ","LEFT");
        
        if(!empty($where)){
            $this->db->group_start();
            $this->db->where($where);
            $this->db->group_end();
        }
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('user.first_name', $keyword);
            $this->db->or_like('user.last_name', $keyword);
            $this->db->or_like('user.phone', $keyword);
            $this->db->group_end();
        }
        $this->db->limit($limit,$offset);    
         
        
        $this->db->order_by("user.first_name","ASC");
        $this->db->order_by("atten.attend_date","DESC"); 
      return $this->db->get()->result();

      // echo "<pre>"; print_r($this->db->get()->result()); die;
    }
 

    public function AttendanceCount($month="", $year="", $id="")
    {
       $where=[];

    //    if(!empty($id)){
    //     $where['emp_id.id']=$id;
    //     $where['map.user_id']=$id;
    // }

        $this->db->from("emp_attendance");
        $this->db->group_start();
        $this->db->where("emp_id",$id);
        if(empty($month) && empty($year)){
       $this->db->where('MONTH(attend_date)', date('m'));
    }
        $this->db->group_end();
        if(!empty($month)){
            $this->db->like("attend_date",$month);
        }if(!empty($year)){
            $this->db->like("attend_date",$year);
        }
       
        $this->db->order_by("emp_attendance.attend_date","DESC");
       
      
        return $this->db->count_all_results();
    }

    public function EmployeeAttendent($limit,$offset,$month="", $year="",$id)
    {
      
        $this->db->select('user.first_name,user.last_name,emp_attendance.*');
        $this->db->from("emp_attendance");
        $this->db->join("users as user", "user.id=emp_attendance.added_by");
        $this->db->group_start();
        $this->db->where("emp_id",$id);
        if(empty($month) && empty($year)){
       $this->db->where('MONTH(attend_date)', date('m'));
    }
        $this->db->group_end();
        
        if(!empty($month)){
            $this->db->like("attend_date",$month);
        }if(!empty($year)){
            $this->db->like("attend_date",$year);
        }
           
        $this->db->limit($limit,$offset);   
      //  $this->db->distinct("emp_attendance.attend_date");
        $this->db->order_by("emp_attendance.attend_date","DESC");
        
       // print_r($this->db->last_query());   die;
       return $this->db->get()->result();
      
      // echo "<pre>"; print_r($this->db->get()->result()); die;
    }
    

    public function employeeList($id=""){
        $this->db->select('id,attend_date,created_at,attend_status');
        $this->db->from("emp_attendance");
        $this->db->group_start();
        $this->db->where("emp_id",$id);
        $this->db->where('MONTH(attend_date)', date('m'));
        $this->db->group_end();
        $this->db->order_by("emp_attendance.id","ASC");
        return $this->db->get();

    }


    public function GetUserData($keyword="",$user_id="")
    {
        $where=[];
        $olddate=date("Y-m-d", strtotime("- 1 day"));
        //if(!empty($user_id)){
           
            //$where['atten.attend_date']=date("Y-m-d", strtotime("+ 1 day"));
       // }
        $this->db->select('atten.id,user.first_name,user.last_name,user.phone,user.email,atten.attend_status,atten.attend_date');
        $this->db->from("users_mapping as map");
        $this->db->join("users as user","user.id=map.child_user_id","LEFT");
        $this->db->join("emp_attendance as atten","atten.emp_id=map.child_user_id AND atten.added_by=map.user_id AND atten.attend_date > '$olddate'  ","LEFT");
        
            // $this->db->group_start();
            // $this->db->where('map.user_id',$user_id);
            // $this->db->where('user.user_group',"4");
            // $this->db->group_end();
    
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('user.first_name', $keyword);
            $this->db->or_like('user.last_name', $keyword);
            $this->db->or_like('user.phone', $keyword);
            $this->db->group_end();
        }
          
        $this->db->order_by("user.first_name","ASC");     
        return $this->db->get();

      // echo "<pre>"; print_r($this->db->get()->result()); die;
    }
    
    public function MonthlyAttendance($month="", $year="",$id)
    {
      
        $this->db->select('user.first_name,user.last_name,emp_attendance.*');
        $this->db->from("emp_attendance");
        $this->db->join("users as user", "user.id=emp_attendance.added_by");
      
        $this->db->where("emp_id",$id);
        if(!empty($month)){
            $this->db->like("attend_date",$year.'-'.$month);
        }else{
             $this->db->like("attend_date",date("Y-m"));
        }
        
        $this->db->order_by("emp_attendance.attend_date","DESC");
        
      
       return $this->db->get()->result();
       $query= $this->db->get();
       echo $this->db->last_query(); die;
      
      
    }

   
    public function EmployeeName($id)
    {
      
        $this->db->select('user.first_name,user.last_name,emp_attendance.*');
        $this->db->from("emp_attendance");
        $this->db->join("users as user", "user.id=emp_attendance.emp_id");
       
        $this->db->where("emp_id",$id);
        $result=$this->db->get();
        if($result->num_rows() > 0)
        {
            return $result->row();
            
        }else{
            return false;
        }    
      // echo "<pre>"; print_r($this->db->get()->result()); die;
    }
    

}