<section class="pt-lg-9 pb-lg-7 ">
  <!-- container start -->
    <div class="container">
        <!-- row start -->

		<div class="row">
          <div class="col-md-12">
  
			<div class="box-shadowbox">			
			   <div class="row">
			      <div class="col-sm-12">
				    <h3 class="b-btom">Order History</h3>
				  </div>
				
                 <div class="col-md-12 rightbox-historycard">				
				  <div class="table-responsive table-bor table-striped ">          
					  <table class="table">
						<thead>
						  <tr>
							<th>#Order ID</th>
							<th>Item Name</th>
							<th>Package Type</th>
							<th>Price</th>
							<th>Status</th>
							<th>Action</th>
						  </tr>
						</thead>
						<tbody>
						<?php 
						if(!empty($orderdata)){ 
						foreach($orderdata as $row){ 
							if(!empty($row->payment_status) && $row->payment_status=="TXN_SUCCESS" ){ 
							?>
						  <tr>
							<td>#<?php echo $row->order_id ?></td>
							<td><?php echo $row->item_name ?></td>
							<td><?php echo $row->package_type ?></td>
						    <td><?php echo $row->paid_amount ?></td>
							<?php if($row->status==0){  ?>
							<td><span><?php echo "Orderd";  ?></span></td>
							<?php } else if($row->status==1){ ?>
							<td><span><?php echo "Shipped";  ?></span></td>
							<?php } else if($row->status==2){ ?>
							<td><span><?php echo "On the way";  ?></span></td>
							<?php } else if($row->status==3){ ?>
							<td><span><?php echo "Delivered";  ?></span></td>
							<?php } else if($row->status==4){ ?>
							<td><span><?php echo "Cancelled";  ?></span></td>
							<?php } ?>
							<td><a href="<?php echo base_url("chloonline/orderdetail/".$row->order_id) ?>" class="view-orderbtn">View Detail</a></td>
						  </tr>
						 <?php }}} else{ ?>
							<tr>
							<td><span style="text-align:center"><?php echo "No Record Found";  ?></span></td>
							</tr>
							<?php }?>
						</tbody>
					  </table>
					</div>
				 </div> 

				</div>
			</div>  
		</div>
		
		
        <!-- row end -->
      </div>
    </div>
  <!-- container end -->

</section>