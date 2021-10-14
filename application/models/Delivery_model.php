<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Delivery_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();      
    }
    
   
    public function deliveryCount($keyword="",$package_id="",$cate_id="")
    {
        $where=[];
        
        $this->db->select('delivery.*, package.* ,category.* ,driver.*');
        $this->db->from("delapp_deliveries as delivery");
        $this->db->join("delivery_package as package","delivery.package_id = package.packages_id ");
        $this->db->join("delivery_category as category","delivery.cate_id = category.cat_id ");
      //  $this->db->join("delapp_drivers as driver","driver.id = delivery.driver_id ");
        // if(!empty($where)){
        //     $this->db->group_start();
        //     $this->db->where($where);
        //     $this->db->group_end();
        // }
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('delivery.pick_up', $keyword);
            $this->db->or_like('delivery.drop', $keyword);
            $this->db->or_like('delivery.d_weight', $keyword);
            $this->db->or_like('delivery.d_height', $keyword);
            $this->db->or_like('delivery.d_width', $keyword);
            $this->db->or_like('delivery.d_length', $keyword);
            $this->db->or_like('delivery.volume', $keyword);
            $this->db->or_like('delivery.qyt', $keyword);
            $this->db->or_like('delivery.gift', $keyword);
            $this->db->or_like('delivery.urgent', $keyword);
            $this->db->or_like('delivery.delicate', $keyword);
           // $this->db->or_like('delivery.staircase', $keyword);
            $this->db->or_like('delivery.user_name', $keyword);
            $this->db->or_like('delivery.mobile', $keyword);
            $this->db->or_like('delivery.email', $keyword);
            $this->db->or_like('delivery.paid_amount', $keyword);
            $this->db->or_like('delivery.status', $keyword);
            $this->db->or_like('category.cat_name', $keyword);
            $this->db->or_like('delivery.item_name', $keyword);
            $this->db->or_like('package.package_type', $keyword);
            $this->db->or_like('delivery.user_name', $keyword);
            $this->db->group_end();
        }
        if(!empty($package_id)){
            $this->db->where("package.packages_id",$package_id);
          }

          if(!empty($cate_id)){
            $this->db->where("category.cat_id",$cate_id);
          }
        
        return $this->db->count_all_results();
    }
    public function deliveryData($limit,$offset,$keyword="",$package_id="",$cate_id="")
    {
       
        $this->db->select('delivery.*, package.* ,category.* ');
        $this->db->from("delapp_deliveries as delivery");
        $this->db->join("delivery_package as package","delivery.package_id = package.packages_id ");
        $this->db->join("delivery_category as category","delivery.cate_id = category.cat_id ");
       
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('delivery.pick_up', $keyword);
            $this->db->or_like('delivery.drop', $keyword);
            $this->db->or_like('delivery.d_weight', $keyword);
            $this->db->or_like('delivery.d_height', $keyword);
            $this->db->or_like('delivery.d_width', $keyword);
            $this->db->or_like('delivery.d_length', $keyword);
            $this->db->or_like('delivery.volume', $keyword);
            $this->db->or_like('delivery.qyt', $keyword);
            $this->db->or_like('delivery.gift', $keyword);
            $this->db->or_like('delivery.urgent', $keyword);
            $this->db->or_like('delivery.delicate', $keyword);
            // $this->db->or_like('delivery.staircase', $keyword);
            $this->db->or_like('delivery.user_name', $keyword);
            $this->db->or_like('delivery.mobile', $keyword);
            $this->db->or_like('delivery.email', $keyword);
            $this->db->or_like('delivery.paid_amount', $keyword);
            $this->db->or_like('delivery.status', $keyword);
            $this->db->or_like('category.cat_name', $keyword);
            $this->db->or_like('delivery.item_name', $keyword);
            $this->db->or_like('package.package_type', $keyword);
            $this->db->or_like('delivery.user_name', $keyword);
            $this->db->group_end();
        }

        if(!empty($package_id)){
            $this->db->where("package.packages_id",$package_id);
          }

          if(!empty($cate_id)){
            $this->db->where("category.cat_id",$cate_id);
          }
        $this->db->limit($limit,$offset);    
         
        
        $this->db->order_by("delivery.id","ASC");
       
      return $this->db->get()->result();

      // echo "<pre>"; print_r($this->db->get()->result()); die;
    }
       
    

   
    public function categoryCount($keyword="")
    {
        $where=[];
        
        $this->db->select('*');
        $this->db->from("delivery_category");
        
        
        // if(!empty($where)){
        //     $this->db->group_start();
        //     $this->db->where($where);
        //     $this->db->group_end();
        // }
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('delivery_category.cat_name', $keyword);
            $this->db->group_end();
        }
        
        
        return $this->db->count_all_results();
    }
    public function categoryData($limit,$offset,$keyword="")
    {
        $where=[];
        
        $this->db->select('*');
        $this->db->from("delivery_category");
     
        // if(!empty($where)){
        //     $this->db->group_start();
        //     $this->db->where($where);
        //     $this->db->group_end();
        // }
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('delivery_category.cat_name', $keyword);
            $this->db->group_end();
        }
        $this->db->limit($limit,$offset);    
         
      return $this->db->get()->result();


    }
    public function packageData($limit,$offset,$keyword="")
    {
        $where=[];
        
        $this->db->select('*');
        $this->db->from("delivery_package");

        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('delivery_package.package_type', $keyword);
            $this->db->group_end();
        }
        $this->db->limit($limit,$offset);  

       return $this->db->get()->result();


    }


    public function packageCount($keyword="")
    {
        $where=[];
        
        $this->db->select('*');
        $this->db->from("delivery_package");
        
        // if(!empty($where)){
        //     $this->db->group_start();
        //     $this->db->where($where);
        //     $this->db->group_end();
        // }
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('delivery_package.package_type', $keyword);
            $this->db->group_end();
        }
        
        
        return $this->db->count_all_results();
    }

    public function deliveryDetail($id)
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
    

    public function driverCount($keyword="")
    {
        $where=[];
        
        $this->db->select('driver.*');
        $this->db->from("delapp_drivers as driver");
        // $this->db->join("delapp_deliveries as delivery","delivery.order_id = driver.id ");
        // $this->db->join("delapp_vehicles as vehicles","delivery.id  = vehicles.driver_id ");
        // if(!empty($where)){
        //     $this->db->group_start();
        //     $this->db->where($where);
        //     $this->db->group_end();
        // }
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('driver.first_name', $keyword);
            $this->db->or_like('driver.last_name', $keyword);
            $this->db->or_like('driver.mobile', $keyword);
            $this->db->or_like('driver.email', $keyword);
            $this->db->group_end();
        }
        
        return $this->db->count_all_results();
    }
    public function driverData($limit="",$offset="",$keyword="")
    {
       
      $this->db->select('driver.*');
      $this->db->from("delapp_drivers as driver");
      // $this->db->join("delapp_deliveries as delivery","delivery.order_id = driver.id ");
      // $this->db->join("delapp_vehicles as vehicles","delivery.id  = vehicles.driver_id ");
      // if(!empty($where)){
      //     $this->db->group_start();
      //     $this->db->where($where);
      //     $this->db->group_end();
      // }
      if(!empty($keyword)){
          $this->db->group_start();
          $this->db->like('driver.first_name', $keyword);
          $this->db->or_like('driver.last_name', $keyword);
          $this->db->or_like('driver.mobile', $keyword);
          $this->db->or_like('driver.email', $keyword);
          $this->db->group_end();
      }
        $this->db->limit($limit,$offset);    
         
        
        $this->db->order_by("driver.id","DESC");
       
      return $this->db->get()->result();

      // echo "<pre>"; print_r($this->db->get()->result()); die;
    }

    public function vehicleCount($keyword="")
    {
        $where=[];
        
        $this->db->select('vehicles.*,driver.*, vehicles.driver_id as driver_id,vehicles.id as id');
        $this->db->from("delapp_vehicles as vehicles");
        $this->db->join("delapp_drivers as driver","driver.id = vehicles.driver_id");
       
        // if(!empty($where)){
        //     $this->db->group_start();
        //     $this->db->where($where);
        //     $this->db->group_end();
        // }

        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('vehicles.vehicle_name', $keyword);
            $this->db->or_like('vehicles.vehicle_model_no', $keyword);
            $this->db->or_like('vehicles.vehicle_plate_no', $keyword);
            $this->db->or_like('vehicles.vehicle_reg_no', $keyword);
            $this->db->group_end();
        }
        
        return $this->db->count_all_results();
    }
    public function  vehicleData($limit="",$offset="",$keyword="")
    {
       
      $this->db->select('vehicles.*,driver.*,vehicles.driver_id as driver_id,vehicles.id as id');
      $this->db->from("delapp_vehicles as vehicles");
      $this->db->join("delapp_drivers as driver","driver.id = vehicles.driver_id");
     
      // if(!empty($where)){
      //     $this->db->group_start();
      //     $this->db->where($where);
      //     $this->db->group_end();
      // }

      if(!empty($keyword)){
          $this->db->group_start();
          $this->db->like('vehicles.vehicle_name', $keyword);
          $this->db->or_like('vehicles.vehicle_model_no', $keyword);
          $this->db->or_like('vehicles.vehicle_plate_no', $keyword);
          $this->db->or_like('vehicles.vehicle_reg_no', $keyword);
          $this->db->group_end();
      }
        $this->db->limit($limit,$offset);    
         
        
        $this->db->order_by("vehicles.id","DESC");
       
      return $this->db->get()->result();

      // echo "<pre>"; print_r($this->db->get()->result()); die;
    }
       
    public function driverhistoryData($limit,$offset,$keyword="",$id)
    {
        $where=[];
        
        $this->db->select(' driver.*, delivery.*');
        $this->db->from("delapp_drivers as driver");
         $this->db->join("delapp_deliveries as delivery","delivery.driver_id = driver.id ");
        //  if(!empty($where)){
        //   $this->db->group_start();
          $this->db->where('driver.id',$id);
      //     $this->db->group_end();
      // }
         if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('driver.first_name', $keyword);
            $this->db->or_like('driver.last_name', $keyword);
            $this->db->or_like('delivery.paid_amount', $keyword);
            $this->db->or_like('delivery.order_id', $keyword);
            $this->db->or_like('delivery.status', $keyword);
            $this->db->group_end();
        }
        $this->db->limit($limit,$offset);  
        $this->db->order_by("driver.created_at","DESC");
       return $this->db->get()->result();


    }


    public function driverhistoryCount($keyword="",$id="")
    {
        $where=[];
        
        $this->db->select('driver.id as driverId,driver.*, delivery.*');
        $this->db->from("delapp_drivers as driver");
         $this->db->join("delapp_deliveries as delivery","delivery.driver_id = driver.id ");
        //  if(!empty($where)){
        //   $this->db->group_start();
        $this->db->where('driver.id',$id);
      //     $this->db->group_end();
      // }
      if(!empty($keyword)){
        $this->db->group_start();
        $this->db->like('driver.first_name', $keyword);
        $this->db->or_like('driver.last_name', $keyword);
        $this->db->or_like('delivery.paid_amount', $keyword);
        $this->db->or_like('delivery.order_id', $keyword);
        $this->db->or_like('delivery.status', $keyword);
        $this->db->group_end();
    }
        
        return $this->db->count_all_results();
    }

    
}