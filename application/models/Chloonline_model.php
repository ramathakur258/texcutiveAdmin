<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chloonline_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();      
    }
    
    public function cloonlineData($id)
    {
        
        $this->db->select('* ');
        $this->db->from("delapp_deliveries");
        $this->db->join("delivery_package","delapp_deliveries.package_id = delivery_package.packages_id","LEFT");
        $this->db->join("delivery_category ","delapp_deliveries.cate_id = delivery_category.cat_id ");
        $this->db->where("delapp_deliveries.id ",$id);
        $result=$this->db->get();
        return $result->row();

      // echo "<pre>"; print_r($this->db->get()->result()); die;
    }

    public function orderhistoryData($Num)
    {
        
        $this->db->select('*');
        $this->db->from("delapp_deliveries");
        $this->db->join("delivery_package","delapp_deliveries.package_id = delivery_package.packages_id","LEFT");
        $this->db->join("delivery_category ","delapp_deliveries.cate_id = delivery_category.cat_id ");
        $this->db->where("delapp_deliveries.mobile",$Num);
        $result=$this->db->get();
        return $result->result();

      // echo "<pre>"; print_r($this->db->get()->result()); die;
    }

    public function orderdetailData($orderId)
    {
        
        $this->db->select('*');
        $this->db->from("delapp_deliveries");
        $this->db->join("delivery_package","delapp_deliveries.package_id = delivery_package.packages_id","LEFT");
        $this->db->join("delivery_category ","delapp_deliveries.cate_id = delivery_category.cat_id ");
        $this->db->where("delapp_deliveries.order_id",$orderId);
        $result=$this->db->get();
        return $result->row();

      // echo "<pre>"; print_r($this->db->get()->result()); die;
    }
       
    
}