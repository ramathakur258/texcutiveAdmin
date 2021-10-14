<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4"></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('mapp/order') ?>" class="btn btn-sm btn-secondary">Back</a>
    </div>
</div>
<?php  echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                
                  <h1 class="h4">Order Number (<?php echo $order_id; ?>)</h1>
                <div class="table-responsive">
                    <table class="table" >
                        <thead>
                            <tr>
                                
                                  <th scope="col">Image</th>

                                <th scope="col">Product Name</th>

                                 <th scope="col">Category Title</th> 

                                <th scope="col">Quantity</th>

                                <th scope="col">Unit Price</th>
                             
                                <th scope="col">Order status</th>
                                 <th scope="col">Total </th>
                                   <th scope="col">Action </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                $total_price = 0 ;
                                
                                if(!empty($result)){
                                    foreach($result as $row)
                                  
                                    {
                                         $total_price  = $total_price +  $row->total_price;
                                       
                                            ?>
                                            <tr>
                                            <td><img src="<?php echo $row->img_url; ?>" width="100px" height="100px"></td>

                                             <td><?php echo $row->product_name; ?></td>
                                             <td><?php echo $row->category_title; ?></td>
                
                                             <td><?php echo $row->qty; ?></td>
                
                                             <td><?php echo number_format($row->unit_price,2); ?></td>
                
                                             
                                            
                
                                             <td><?php echo $row->order_status; ?></td>
                                            
                                            <td><?php echo number_format($row->total_price,2); ?></td>
                                                
                                             <td>
                                                    <a class="btn btn-outline-primary btn-sm" href="javascript:void(0);" data-toggle="modal" data-target="#myModal<?php echo $row->order_status_id; ?>" ><span class="fa fa-pencil-alt"><span></a>
                                                </td>
                                            </tr>
                                            
                                        
                                        
                                         <!-- Modal -->
  <div class="modal fade" id="myModal<?php echo $row->order_status_id; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
                        <form action="<?php echo site_url('mapp/order/changeOrderDetailStatus'); ?>" method="post"  >

        <div class="modal-header">
             <h4 class="modal-title">Change Status</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
        <div class="modal-body">
             <div class="form-row">
                <div class="form-group col-md-12">
                   <label>Select Status</label>
                   <select class="form-control" name="order_status_id" >
                        <?php foreach ($order_status_list as $key => $value) { 
                        ?>
        
                        <option value="<?php echo $value->order_status_id; ?>" <?php if($row->order_status_id==$value->order_status_id){ echo "selected"; } ?>><?php echo $value->name; ?></option>
                        <?php }  ?>
        
                    </select>
                </div>
                <div class="form-group col-md-12">
                      <label>Enter Note</label>
                    <input type="text" class="form-control" name="order_note" > 
                     <input type="hidden" class="form-control" name="order_detail_id"  value="<?php echo $row->order_detail_id; ?>" > 
                </div>
            </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="Submit">Submit</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
                                        <?php
                                        
                                    }

                                }
                            ?>
                           
                        </tbody>
                          <thead>
                            <tr>
                                
                                 <th scope="col" colspan="7" class="text-right"> Total : </th>

                                <th scope="col"><?php echo number_format($total_price,2);  ?></th>
                            </tr>
                        </thead>
                    </table>
                    

                </div>
            </div>
        </div>
    </div>
</div>


