
<section class="pt-lg-9 pb-lg-7 bg-light">
  <!-- container start -->
    <div class="container">
        <!-- row start -->
        
		<div class="row">
		    <div class="col-md-12">
			  <div class="box-shadowbox">
				 <ul class="list-unstyled bradcam cart-process">
				   <li><a href=""><span class="active">1</span> Package Detail</a></li>
				   <li><a href=""><i class="fas fa-chevron-right iconarrw"></i><span>2</span> Choose Services or Address</a></li>
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
				     <h4 class="mb-2">Package Details</h4>
				 </div>
				 <div class="col-md-12">
					 <h6 class="mb-0">SELECT PACKAGE SIZE <span class="singleship"> Single Shipping only</span></h6>
				 </div>
				 
				 <div class="col-6 col-sm-3 mt-5">
					<input class="checkbox-tools" type="radio" name="tools" id="tool-1" value="">
					<label class="for-checkbox-tools" for="tool-1">
						<div class="cardbox">
							<h5 class="mb-0">Extra Small Parcel</h5>
							<p class="text-black font-12 mb-0">Max. 500gm</p>
						</div>
					</label>
				</div>
				<div class="col-6 col-sm-3 mt-5">
					<input class="checkbox-tools" type="radio" name="tools" id="tool-2" value="">
					<label class="for-checkbox-tools" for="tool-2">
						<div class="cardbox">
							<h5 class="mb-0">Small Parcel</h5>
							<p class="text-black font-12 mb-0">500gm-2kg</p>
						</div>
					</label>
				</div>
				<div class="col-6 col-sm-3 mt-5">
					<input class="checkbox-tools" type="radio" name="tools" id="tool-3" value="">
					<label class="for-checkbox-tools" for="tool-3">
						<div class="cardbox">
							<h5 class="mb-0">Medium Parcel</h5>
							<p class="text-black font-12 mb-0">2-5kg</p>
						</div>
					</label>
				</div>
				<div class="col-6 col-sm-3 mt-5">
					<input class="checkbox-tools" type="radio" name="tools" id="tool-4" value="">
					<label class="for-checkbox-tools" for="tool-4">
						<div class="cardbox">
							<h5 class="mb-0">Large Parcel</h5>
							<p class="text-black font-12 mb-0">Max. 10kg</p>
						</div>
					</label>
				</div>
				 
			  </div>
			</div> 
			
			
			<form action="<?php site_url('home/service');?>" method="post" enctype='multipart/form-data' >	
			<div class="box-shadowbox">			
			  <div class="row">
			     <div class="col-sm-12"><h3 class="b-btom">Enter Package Detail</h3></div>
				     <div class="form-group col-md-6 mb-2">
                        <label class="mb-0">Enter Package Category</label> 
						<input type="text" name= "category" class="form-control"  placeholder="Enter here">
                      </div>
				     <div class="form-group col-md-6 mb-2">
                        <label class="mb-0">Enter Package Sub-Category</label> 
						<input type="text" name="sub_category" class="form-control"  placeholder="Enter here">
                      </div>
                     <div class="form-group col-md-4 mb-2">
                        <label class="mb-0">Enter Width</label> 
						<input type="text" name="width" class="form-control" placeholder="Enter here">
                      </div>
					  <div class="form-group col-md-4 mb-2">
                        <label class="mb-0">Enter Length </label> 
						<input type="text" name="length" class="form-control" placeholder="Enter here">
                      </div>
					  <div class="form-group col-md-4 mb-2">
                        <label class="mb-0">Enter Weight</label> 
						<input type="text" name="weight" class="form-control" placeholder="Enter here">
                      </div>
					  
					  <div class="col-sm-12 mb-2">
					      <div class="pricebox"><small>PACKAGE VALUE* </small> <br> <h3 class="mb-0"><b> ₹5000.00 </b></h3></div>	  
					  </div>
					  
					<div class="col-sm-12">
                          <input class="hidden-xs-up" id="cbx" type="checkbox" />
						  <label class="cbx" for="cbx"></label>
						  <label class="lbl" for="cbx">Secure your package for just ₹50</label>
						  
						  <p><small>The maximum liability value for lost/damaged shipment will be ₹ 2000. Please refer 
						  <a href=""> T&C </a> for further details.</small></p>
                    </div>
                   <div class="col-sm-12">
				        <button type="submit" value="submit"  onclick="addWall()" class="btn btn-primary">GET PRICE</button>
				    </div>
					  
			    </div>
			</div> 
        </form> 
			
		</div>
		
		
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
			  </div>
			</div>  
		   
		   <img src="<?php echo base_url("assets/img1/calculate-2.png"); ?>" class="imgdelveryboy "/>
		</div>
		
		
        <!-- row end -->
      </div>
    </div>
  <!-- container end -->

</section>

<script>
	
var wallTotal = 0;
function addWall() {
  var inHeight = document.getElementById("inHgt").value
  var inWidth = document.getElementById("inWid").value
  var inLength = document.getElementById("inLen").value
  inWidth = inWidth / 12
  wallTotal = (parseFloat(inHeight * inWidth * inLength) / 27);
  document.getElementById("outWall").value = wallTotal;
}

</script>
	