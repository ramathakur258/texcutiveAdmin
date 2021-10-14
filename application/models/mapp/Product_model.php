<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Product_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();      
    }
    public function Count($keyword,$merchatId){
         $this->db->join('mapp_category','mapp_category.id=mapp_products.category_id','INNER');
         $this->db->where('mapp_products.merchant_id',$merchatId);
        
        
        if(!empty($keyword)){
            $this->db->group_start();
                $this->db->like('mapp_products.product_name',$keyword);
                $this->db->or_like('mapp_products.product_detail',$keyword);
                $this->db->or_like('mapp_products.product_type',$keyword);
                $this->db->or_like('mapp_products.product_highlight',$keyword);
                $this->db->or_like('mapp_products.product_size',$keyword);
                $this->db->or_like('mapp_category.category_title',$keyword);
            $this->db->group_end();
        }
        return $this->db->count_all_results('mapp_products');
    }
    public function List($limit,$offset,$keyword,$merchatId){
       $this->db->select('mapp_products.*,mapp_category.category_title');
       $this->db->from('mapp_products');
       $this->db->join('mapp_category','mapp_category.id=mapp_products.category_id','INNER');
        $this->db->where('mapp_products.merchant_id',$merchatId);
        if(!empty($keyword)){
            $this->db->group_start();
                $this->db->like('mapp_products.product_name',$keyword);
                $this->db->or_like('mapp_products.product_detail',$keyword);
                $this->db->or_like('mapp_products.product_type',$keyword);
                $this->db->or_like('mapp_products.product_highlight',$keyword);
                $this->db->or_like('mapp_products.product_size',$keyword);
                $this->db->or_like('mapp_category.category_title',$keyword);
            $this->db->group_end();
        }
        $this->db->limit($limit,$offset);
        return $this->db->get()->result();
    }
       public function GetAllProductExport($merchatId){
       $this->db->select('mapp_products.*,mapp_category.category_title,mapp_brand.brand_name');
       $this->db->from('mapp_products');
       $this->db->join('mapp_category','mapp_category.id=mapp_products.category_id','left');
       $this->db->join('mapp_brand','mapp_brand.id=mapp_products.brand_id','left');

        $this->db->where('mapp_products.merchant_id',$merchatId);
        return $this->db->get()->result();
    }
    
}