<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Common extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();      
    }
    public function record($table,$where=[],$select="*")
    {
        $this->db->select($select);
        $this->db->from($table);   
        if(!empty($where)){
            $this->db->where($where);           
        }
        $result=$this->db->get();
        if($result->num_rows() > 0)
        {
            return $result->row();
            
        }else{
            return false;
        }    
        
    }
    public function records($table,$where=[],$select="*")
    {
        $this->db->select($select);
        $this->db->from($table);   
        if(!empty($where)){
            $this->db->where($where);           
        }
        $result=$this->db->get();
        if($result->num_rows() > 0)
        {
            return $result->result();
            
        }else{
            return false;
        }    
        
    
    }

    public function getdata($data)
    {
       $this->db->select('*');
        $this->db->from('users');
        $this->db->like('phone', $data);
        $result=$this->db->get();
        if($result->num_rows() > 0)
        {
            return $result->result();
            
        }else{
            return false;
        }    
        
    
    }

    public function GetAllResult($table="",$select="*"){
        if(empty($table)) {echo "table name is empty";die;}
        $this->db->select($select);
        $this->db->from($table);
        $this->db->order_by("created_at","DESC"); 
        $query=$this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function save($table,$data)
    {
        $this->db->insert($table,$data);
        return $this->db->insert_id();
        
        
    }
    public function save_batch($table,$data){
		return  $this->db->insert_batch($table,$data);
	}
    public function update($table,$data,$where=[])
    {
        if(!empty($where)){
           return $this->db->update($table,$data,$where);
           // print_r($this->db->last_query());
        }else{
            echo "Condition is empty"; die;
        }
        
        
    }
    public function remove($table,$where=[])
    {
        if(!empty($where)){
            return $this->db->delete($table,$where);
        }else{
            echo "Condition is empty"; die;
        }
        
        
    }
    public function ChildRecord($user_id)
    {
        $this->db->select('user.*,map.id as map_id');
        $this->db->from("users_mapping as map");    
        $this->db->join("users as user","user.id=map.child_user_id",'LEFT');    
        $this->db->where("map.user_id",$user_id);   
        $query=$this->db->get();
        if($query->num_rows() > 0)
        {

            return $query->result();s;
        } else{
            return false;
        } 
        
        
    }
    
     public function Productrecord($table,$where=[])
    {  
        $this->db->select('similar_product_id');
        $this->db->from($table);   
        if(!empty($where)){
            $this->db->where($where);           
        }
        $result=$this->db->get();
        if($result->num_rows() > 0)
        {
            return $result->result_array();
            
        }else{
            return false;
        }  
        
        
    }
     public function record_in($table,$where=[],$select="*")
    {
        $this->db->select($select);
        $this->db->from($table);   
      //  $this->db->where_in('template_id', $where);
        $this->db->where("FIND_IN_SET($where, 'template_id')", null, false);
        $result=$this->db->get();
        if($result->num_rows() > 0)
        {
           
            return $result->result();
            
        }else{
            
            return false;
        }    
        
    
    }
 
   
       
    
}