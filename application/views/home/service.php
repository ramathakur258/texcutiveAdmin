
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
				   <li><a href=""><i class="fas fa-chevron-right iconarrw"></i><span>3</span> Payment</a></li>
				 </ul>
			  </div>
			</div>  
		</div>
		
		
		<div class="row">
          <div class="col-md-7">
  
			<div class="box-shadowbox">			
			  <div class="row">
			     <div class="col-md-12">
				     <h4 class="mb-1"><b>Choose Service</b></h4>
				 </div>
				 <div class="col-md-12">
					 <h6 class="mb-0">Given delivery time begins after the pickup</h6>
				 </div>
				 
				 <div class="col-12 col-sm-12 mt-5">
					<input class="checkbox-tools" type="radio" name="tools" id="tool-1" value="" checked>
					<label class="for-checkbox-tools text-left" for="tool-1">
						<div class="cardbox">
							<h5 class="mb-0"><i class="fas fa-truck mpicon"></i> Standard</h5>
							<p class="text-black font-12 mb-0">Delivery in 5 - 7 business days</p>
						</div>
					</label>
					
					
					
				</div>
			  </div>
			</div> 
			
			
			<form action="<?php site_url('home/service');?>" method="post" enctype='multipart/form-data' >
			<div class="box-shadowbox">			
			  <div class="row">
			 
			      <div class="col-sm-12">
				    <h3 class="b-btom">Address Details</h3>
				    <p>Enter Delivery Address</p>
				  </div>
				     <div class="form-group col-md-6 mb-2">
                        <label class="mb-0">FULL NAME</label> 
						<input type="text" name="name" class="form-control" placeholder="Enter here">
                      </div>
				     <div class="form-group col-md-6 mb-2">
                        <label class="mb-0">MOBILE NUMBER</label> 
						<input type="text" pattern="[1-9]{1}[0-9]{9}" name="mobile" class="form-control" value="" placeholder="Enter here">
                      </div>
                     <div class="form-group col-md-12 mb-2">
                        <label class="mb-0">EMAIL ADDRESS</label> 
						<input type="text" name="email" class="form-control" placeholder="Enter here">
                      </div>
					  <div class="form-group col-md-12 mb-2">
                        <label class="mb-0">FLAT, HOUSE NO., BUILDING, APARTMENT </label> 
						<input type="text" name="house_no" class="form-control" placeholder="Enter here">
                      </div>
					  <div class="form-group col-md-6 mb-2">
                        <label class="mb-0">AREA, STREET, SECTOR</label> 
						<input type="text" name="area" class="form-control" placeholder="Enter here">
                      </div>
					  <div class="form-group col-md-6 mb-2">
                        <label class="mb-0">CITY</label> 
						<input type="text" name="city" class="form-control" placeholder="Enter here">
                      </div>
					  <div class="form-group col-md-6 mb-2">
                        <label class="mb-0">STATE</label> 
						<input type="text" name="state" class="form-control" placeholder="Enter here">
                      </div>
					  <div class="form-group col-md-6 mb-2">
                        <label class="mb-0">PINCODE</label> 
						<input type="text" name="pincode" class="form-control" placeholder="Enter here">
                      </div>
					  
					<div class="col-sm-12">
                          <input class="hidden-xs-up" id="cbx" type="checkbox" />
						  <label class="cbx" for="cbx"></label>
						  <label class="lbl" for="cbx">I agree with the Terms & Conditions of Use, guarantee that the shipment does not contain any Restricted Items and the contents of this parcel are Non-commercial in nature and meant for personal use only.</label>
						  
						  
                    </div>
                   <div class="col-sm-12 mt-3">
				        <button type="submit" name="submit" class="btn btn-primary" data-toggle="modal" data-target="#loginmobile">PROCEED TO BOOK</button>
				    </div>
					  
			    </div>
			</div> 
		</div>
        </form>
		
		<div class="col-md-5">
		    <div class="box-shadowbox">			
			  <div class="row">
			     <div class="col-sm-12"><h3 class="b-btom">Order Summary</h3></div>
				 <div class="col-md-6 mb-2">
				     <h4 class="mb-0"><i class="fas fa-map-marker-alt mpicon"></i>PICKUP LOCATION</h4>
					 <h6 class="mb-0">11, Goyal Nagar, Indore (452001)</h6>
				 </div>
				 <div class="col-md-6 mb-2">
				     <h4 class="mb-0"><i class="fas fa-map-marker-alt dpicon"></i> DROP LOCATION</h4>
					 <h6 class="mb-0">134, Nirman nagar, Jaipur (304001)</h6>
				 </div>
				
			   <div class="clearfix"></div>	
				
				<div class="col-md-12">
				  <div class="card-wrapper order-summary b-btop">
				    <div class="list-item-flex"><div  class="item-title"> Package Category </div>
				       <div class="item-info"><span class="code">Automotives</span><i></i></div>
				    </div>
					<div class="list-item-flex">
					    <div class="item-title"> Package Type </div>
						<div class="item-info"><span class="code"> Large Parcel</span><i></i></div>
					</div>
					<div class="list-item-flex">
					    <div class="item-title"> SERVICE TYPE - STANDARD </div>
						<div class="item-info"><span class="code"> ₹402</span><i></i></div>
					</div>
					<div class="list-item-flex btop-bdr">
					    <div class="item-title" style="color: #262727 !important;"> TOTAL </div>
						<div class="item-info"><span class="code-bold"> ₹402</span><i></i></div>
					</div>
					
				   </div>
				 </div>
				
				
			 </div>	
				
			</div>  
		   
		   <img src="<?php base_url("assets/img1/calculate-2.png");?>" class="imgdelveryboy "/>
		</div>
		
		
        <!-- row end -->
      </div>
    </div>
  <!-- container end -->

</section>


