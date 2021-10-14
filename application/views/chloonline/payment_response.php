
<section class="pt-lg-9 pb-lg-7 bg-light" style="padding-top: 130px !important;">
  <!-- container start -->
    <div class="container">
        <!-- row start -->
        
		 <div class="row d-flex justify-content-center">
                  <div class="col-md-8">
				    <div class="row">
					  <div class="col-md-12 col-lg-12 text-center"> 
						  <div class="centeboxcheck"><div class="circle-border"></div>
							<div class="circle">
							  <div class="success"></div>
							</div>
						  </div>	
						  <h1 class="fontbold">Thank you !</h1>
						  <p class="mb-0">Thanks you for your purchase</p>
						  <!-- <p class="mb-5">you should receive a confirmation email soon  </p> -->
					  </div>
					  <div class="col-md-12 col-lg-12">
						 <div class="checkoutleft-box mt-3">
							<div class="c-boxlist">
							   <div class="row">
								  <div class="col-12 col-sm-7 col-lg-7 pd-0">
									 <h5><?php echo $orderDetail->item_name; ?></h5>
									 <p class="text-muted mb-0">₹<?php echo $orderDetail->paid_amount; ?></p>
									 <!-- <span class="qtyvision mb-2"><?php // echo $orderDetail->paid_amount; ?></span> -->
								  </div>
								  <div class="col-12 col-sm-5 col-lg-5">
									 <h6><b>Package Type:</b> <?php echo $orderDetail->package_type; ?></h6>
								  </div>
							   </div>
							</div>
                        </div>
                     </div>
					 
					 <div class="col-sm-6 col-md-6 col-lg-6">
					    <div class="checkoutleft-box-1">
                        <div class="c-boxlist">
                           <div class="row">
                              <div class="col-7 col-sm-8 col-lg-8">
                                 <h5>Order ID:</h5>
                                 <p class="text-muted"><?php echo $orderDetail->order_id; ?></p>
                              </div>
                              <div class="col-5 col-sm-4 col-lg-4">
                                 <h6><?php echo date("d-M-Y",strtotime($orderDetail->created_at)); ?></h6>
                              </div>
                           </div>
                        </div>
                        <hr>
                        <div class="c-boxlist">
                           <div class="row">
                              <div class="col-8 col-sm-8 col-lg-8">
                                 <h5>Email address:</h5>
                                 <p class="text-muted"><?php echo $orderDetail->email; ?></p>
                              </div>
                              <div class="col-4 col-sm-4 col-lg-4">
                                 <a href="">Change</a>
                              </div>
                           </div>
                        </div>
                      </div>
					</div> 
					
					<div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="save-adress">
                            <label class="for-checkbox-tools waves-effect waves-light" for="tool-1">
                                <span class="default-address">Shipping Address</span>
                                <h5 class="float-left mt-1 w-100 block"><?php echo $orderDetail->drop_area;?></h5>
                                  <p class="float-left">
                                    <i class="fas fa-map-marker-alt"></i> 
                                    <span class="addsmall"><?php echo $orderDetail->drop;?></span>
                                  </p>
                                  <p class="float-left"><i class="fas fa-phone-square-alt"></i> 
                                     <span class="addsmall"> <?php echo $orderDetail->mobile; ?></span>
                                 </p>
                            </label>
                        </div>
                    </div>
					 
					  
					  <div class="col-md-12 col-lg-12 text-center"> 	
						  <div class="box-greyline">
						    <h2 class="fontbold">Help Us get better</h2>
						    <p class="mb-4">Tell us about how you use bitcoin sp that we can serve you better in the future!</p>
						    <button onclick="window.print()" class="contiunebtn waves-effect waves-light">Print Order</button>
                      <!-- <a href="window.print()"  > Print Order</a> -->
							<a href="<?php echo base_url("chloonline");?>" class="waves-effect waves-light purchase-btn-thanksyou">New Order</a>
					      </div>
					  </div>
					  
					  
				      </div> 
				   </div>
                </div>	
	</div>
</section>	