<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Orders (<?php  echo $total_rows; ?> Records)</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <!--<button class="btn btn-sm btn-outline-secondary">Share</button>-->
            <!--<button class="btn btn-sm btn-outline-secondary">Export</button>-->
        </div>
        <!--<a href="" class="btn btn-sm btn-secondary ml-2">Export</a>-->
       
    </div>
</div>
<?php  echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
               
             
                    <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap flex-row-reverse align-items-center pt-2 pb-2">
                       
                        <form class="form-inline" method="get">
                          
                            
                            <input type="text" class="form-control form-control-sm  ml-1" name="keyword"  placeholder="keyword" value="<?php echo $this->input->get('keyword'); ?>">
                            <button type="submit" class="btn btn-sm btn-primary  ml-1" >Search</button>
                            <a href="<?php echo current_url(); ?>" class="btn btn-sm btn-outline-primary  ml-2">Clear</a>
                        </form>
                      <?php //echo "Record : ".$total_rows; ?>
                    </div>
              
                <div class="table-responsive">
                    <table class="table" >
                        <thead>
                            <tr>
                                <th scope="col">Name</th>                                          
                                <th scope="col">Email</th>                               
                                <!--<th scope="col">Note</th>-->
                                
                                <th scope="col">Payment Type</th>
                                <th scope="col">Payment Status</th>
                                
                                <th scope="col">Total Price</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Order Detail</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                
                                if(!empty($result)){
                                    foreach($result as $row)
                                    {
                                       
                                            ?>
                                            <tr>
                                               
                                                <td>  <a href="#">
                                                    <?php echo $row->first_name; ?> <?php echo $row->last_name; ?></a></td> 
                                                <td><?php echo $row->email; ?></td> 
                                                   <!--<td>-->
                                                   <!--<php echo $row->delivery_address; ?>-->
                                                   <!--  </td>-->
                                                <!--   <td>-->
                                                <!--   <php echo $row->note; ?>-->
                                                <!--</td>-->
                                                <td><?php  echo $row->payment_type; ?></td>
                                                <td>
                                                    <select class="form-control" onclick="ChangePaymentStatus(`<?php echo $row->order_id; ?>`,this.value)">
                                                        <option value="PENDING" <?php if($row->payment_status=='PENDING'){ echo "selected"; } ?>>PENDING</option>
                                                        <option value="COMPLETED" <?php if($row->payment_status=='COMPLETED'){ echo "selected"; } ?>>COMPLETED</option>
                                                    </select>
                                                </td>
                                               <td><?php  echo $row->total_price; ?></td>
                                               <td>
                                                 
                                                    <select class="form-control" onclick="ChangeOrderStatus(<?php echo $row->order_id; ?>,this.value)">
                                                        <option value="PENDING" <?php if($row->order_status=='PENDING'){ echo "selected"; } ?>>PENDING</option>
                                                        <option value="COMPLETED" <?php if($row->order_status=='COMPLETED'){ echo "selected"; } ?>>COMPLETED</option>
                                                        <option value="CANCELLED" <?php if($row->order_status=='CANCELLED'){ echo "selected"; } ?>>CANCELLED</option>
                                                          <!--<option value="2" <php if($row->order_status=='REFUND'){ echo "REFUND"; } ?>>REFUND</option>-->
                                                    </select>
                                                </td>
                                               <td>
                                                    <a href="<?php echo site_url('mapp/order/order_detail'.'/'.$row->order_id) ?>">Detail</a>
                                                </td>
                                                
                       
                                            </tr>
                                            
                                        
                                        <?php
                                        
                                    }

                                }
                            ?>
                           
                        </tbody>
                    </table>
                    <?php echo $pagination ?>

                </div>
            </div>
        </div>
    </div>
</div>