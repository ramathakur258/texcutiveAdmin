
<section class="pt-lg-9 pb-lg-7 bg-light">
  <!-- container start -->
    <div class="container">
        <!-- row start -->
        
		<div class="row">
		    <div class="col-md-12">
			  <div class="box-shadowbox">
				 <ul class="list-unstyled bradcam cart-process">
				   <li><a href=""><span class="active">1</span> Package Detail</a></li>
				   <li><a href=""><i class="fas fa-chevron-right iconarrw"></i><span class="active">2</span> Choose Services or Address</a></li>
				   <li><a href=""><i class="fas fa-chevron-right iconarrw"></i><span class="active">3</span> Payment</a></li>
				 </ul>
			  </div>
			</div>  
		</div>
	<?php // print_r($payment); die;?>	
		
		<div class="row">
          <div class="col-md-7">
  
			<div class="box-shadowbox">			
			   <div class="row">
			      <div class="col-sm-12">
				    <h3 class="b-btom">Shipping address</h3>
				  </div>
				 
				  <div class="c-boxlist">
                      <div class="row">
                         <div class="col-7 col-sm-8 col-lg-8">
                            <h5>Order id:</h5>
                            <p class="text-muted mb-1"><?php  echo $payment->order_id; ?> </p>
                          </div>
						 
                          <div class="col-5 col-sm-4 col-lg-4">
                            <h6><?php echo date("d M Y",strtotime($payment->update_time)); ?></h6>
                          </div>
                      </div>
                  </div>
				  <div class="c-boxlist">
					  <div class="row">
						<div class="col-8 col-sm-8 col-lg-8">
						   <h5>Email address:</h5>
						   <p class="text-muted mb-1"><?php echo $payment->email; ?></p>
						</div>
						<div class="col-4 col-sm-4 col-lg-4">
						   <!-- <a href="" class="d-black float-right">Change</a> -->
						</div>
					  </div>
				  </div>
				  <div class="c-boxlist">
					  <div class="row">
						<div class="col-8 col-sm-8 col-lg-8">
						   <h5>Delivery Address:</h5>
						   <p class="text-muted mb-0"><?php echo $payment->drop; ?></p>
						   <p class="text-muted">Mobile: +91 <?php echo $payment->mobile; ?></p>
						</div>
						<div class="col-4 col-sm-4 col-lg-4">
						   <!-- <a href="" class="d-black float-right">Change</a> -->
						</div>
					  </div>
				  </div>
				</div>
			</div>  
			
			<div class="box-shadowbox">			
			   <div class="row">
			      <!-- <div class="col-sm-12">
				    <h3 class="b-btom">Select your payment method</h3>
				  </div>
				
			<div class="col-sm-12">	
				<div class="accordion w-100" id="accordionExample"> 
				
				  <div class="card card bg-white border mb-4 w-100 d-black">
					<div class="card-header bg-transparent border-0 p-0" id="headingOne">
					  <h5 class="mb-0">
						<button class="bg-transparent border-0 p-3 pr-6 font-weight-normal right btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
						  Pay With Debit/Credit Card
						</button>
					  </h5>
					</div>

					<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
					  <div class="card-body pt-0 pb-1 row">
						
						<div class="form-group col-md-6 mb-2">
                          <label class="mb-0">CARD NUMBER</label> 
						  <input type="text" class="form-control" placeholder="Enter here">
                        </div>
				        <div class="form-group col-md-6 mb-2">
                           <label class="mb-0">Name on Card</label> 
						   <input type="text" class="form-control" placeholder="Enter here">
                        </div>
                        <div class="form-group col-7 col-md-3 mb-2">
                           <label class="mb-0">EXPIRY DATE</label> 
						   <input type="text" class="form-control" placeholder="MM/YY">
                        </div>
					    <div class="form-group col-5 col-md-3 mb-2">
                           <label class="mb-0">CVV</label> 
						   <input type="text" class="form-control" placeholder="CVV">
                        </div>
					     <div class="form-group col-md-3 mb-2 mcutom-top">
						   <button type="submit" class="btn btn-primary h-50btn">PAY NOW</button>
                        </div>
					  
					  </div>
					</div>
				  </div>
				  
				  
				  <div class="card card bg-white border mb-4 w-100 d-black">
					<div class="card-header bg-transparent border-0 p-0" id="heading2">
					  <h5 class="mb-0">
						<button class="bg-transparent border-0 p-3 pr-6 font-weight-normal right btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
						  Pay With UPI
						</button>
					  </h5>
					</div>

					<div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordionExample">
					  <div class="card-body pt-0 pb-1 row">
					    <div class="form-group col-md-6 mb-2">
                           <label class="mb-0">Please enter your UPI ID</label> 
						   <input type="text" class="form-control" placeholder="Enter here">
                        </div>
					     <div class="form-group col-md-3 mb-2 mcutom-top">
						   <button type="submit" class="btn btn-primary h-50btn">PAY NOW</button>
                        </div>
					  
					  </div>
					</div>
				  </div>
				  
				   <div class="card card bg-white border mb-4 w-100 d-black">
					<div class="card-header bg-transparent border-0 p-0" id="heading3">
					  <h5 class="mb-0">
						<button class="bg-transparent border-0 p-3 pr-6 font-weight-normal right btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
						  Pay With Net Banking
						</button>
					  </h5>
					</div>

					<div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionExample">
					  <div class="card-body pt-0 pb-1 row">
					    <div class="form-group col-md-6 mb-2">
                           <label class="mb-0">Select Your net banking account</label> 
						   <select class="form-control"><option>State bank of india</option></select>
                        </div>
					     <div class="form-group col-md-3 mb-2 mcutom-top">
						   <button type="submit" class="btn btn-primary h-50btn">PAY NOW</button>
                        </div>
					  
					  </div>
					</div>
				  </div>
				  
				  
				  
				   </div>  
				 </div>  -->
			  </div> 
			</div>
			
		</div>
		
		
		<div class="col-md-5">
		    <div class="box-shadowbox">			
			  <div class="row">
			     <div class="col-sm-12"><h3 class="b-btom">Order Summary</h3></div>
				 <div class="col-md-6 mb-2">
				     <h4 class="mb-0"><i class="fas fa-map-marker-alt mpicon"></i>PICKUP LOCATION</h4>
					 <h6 class="mb-0"><?php echo $payment->pick_up; ?></h6>
				 </div>
				 <div class="col-md-6 mb-2">
				     <h4 class="mb-0"><i class="fas fa-map-marker-alt dpicon"></i> DROP LOCATION</h4>
					 <h6 class="mb-0"><?php echo $payment->drop; ?></h6>
				 </div>
				
			   <div class="clearfix"></div>	
				
				<div class="col-md-12">
				  <div class="card-wrapper order-summary b-btop">
				    <div class="list-item-flex"><div  class="item-title"> Package Category </div>
				       <div class="item-info"><span class="code"><?php echo $payment->cat_name; ?></span><i></i></div>
				    </div>
					<div class="list-item-flex">
					    <div class="item-title"> Package Type </div>
						<div class="item-info"><span class="code"><?php if(!empty($payment->package_type)){echo $payment->package_type; } ?></span><i></i></div>
					</div>
					<div class="list-item-flex">
					    <div class="item-title"> SERVICE TYPE - STANDARD </div>
						<div class="item-info"><span class="code"> ₹<?php echo $Standard_service; ?></span><i></i></div>
					</div>
					<div class="list-item-flex">
					    <div class="item-title">  Delhivery Protect  </div>
						<div class="item-info"><span class="code"><b>₹<?php if(isset($payment->security_charge)){  echo $payment->security_charge; } ?></b></span><i></i></div>
					</div>
					<div class="list-item-flex btop-bdr">
					    <div class="item-title" style="color: #262727 !important;"> TOTAL </div>
						<div class="item-info"><span class="code-bold"> ₹<?php echo $payment->paid_amount; ?></span><i></i></div>
					</div>
					<form action="<?php  echo base_url('index.php/chloonline/StartPayment/'. $payment->id);?>" method="post">
					
					<input style="margin-left:350px;"  class="btn btn-primary btn-sm" value="Pay Now" type="submit"   onclick="">
                 </form>   
				</div>
				 </div>
				
				
			 </div>	
				
			</div>  
		   
		   <img src="<?php echo base_url("assets/img1/calculate-2.png");?>" class="imgdelveryboy "/>
		</div>
		
		
        <!-- row end -->
      </div>
    </div>
  <!-- container end -->

</section>


