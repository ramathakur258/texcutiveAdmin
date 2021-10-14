<?php  //print_r($this->data['category']); die;?>
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
		  <!-- <form action="" id="form2" method="post"  enctype='multipart/form-data' >  -->

			<div class="box-shadowbox">			
			  <div class="row">

			  <div class="col-md-12">
				     <h4 class="mb-2">Package Details</h4>
				 </div>
				 <div class="col-md-12">
					 <h6 class="mb-0">SELECT PACKAGE SIZE <span class="singleship"> Single Shipping only</span></h6>
				 </div>
				 
				 <div class="col-6 col-sm-3 mt-5">
					<input class="checkbox-tools" type="radio" name="package_type" id="tool-1" value="Extra Small Parcel" onchange="packageType(this)">
					<label class="for-checkbox-tools" for="tool-1">
						<div class="cardbox">
							<h5 class="mb-0">Extra Small Parcel</h5>
							<p class="text-black font-12 mb-0">0-5Kg</p>
						</div>
					</label>
				</div>
				<div class="col-6 col-sm-3 mt-5">
					<input class="checkbox-tools" type="radio" name="package_type" id="tool-2" value="Small Parcel" onchange="packageType(this)">
					<label class="for-checkbox-tools" for="tool-2">
						<div class="cardbox">
							<h5 class="mb-0">Small Parcel</h5>
							<p class="text-black font-12 mb-0">5-10kg</p>
						</div>
					</label>
				</div>
				
				<div class="col-6 col-sm-3 mt-5">
					<input class="checkbox-tools" type="radio" name="package_type" id="tool-4" value="Medium Parcel" onchange="packageType(this)">
					<label class="for-checkbox-tools" for="tool-4">
						<div class="cardbox">
							<h5 class="mb-0">Medium Parcel</h5>
							<p class="text-black font-12 mb-0">10-15kg</p>
						</div>
					</label>
				</div>
				<div class="col-6 col-sm-3 mt-5">
					<input class="checkbox-tools" type="radio" name="package_type" id="tool-3" value="Extra Medium Parcel" onchange="packageType(this)">
					<label class="for-checkbox-tools" for="tool-3">
						<div class="cardbox">
							<h5 class="mb-0">Extra Medium Parcel</h5>
							<p class="text-black font-12 mb-0">15-20kg</p>
						</div>
					</label>
				</div>
				<div class="col-6 col-sm-3 mt-5" >
					<input class="checkbox-tools" type="radio" name="package_type" id="tool-6" value="Large Parcel" onchange="packageType(this)">
					<label class="for-checkbox-tools" for="tool-6">
						<div class="cardbox">
							<h5 class="mb-0">Large Parcel</h5>
							<p class="text-black font-12 mb-0">20-25kg</p>
						</div>
					</label>
				</div>
			
				<div class="col-6 col-sm-3 mt-5">
					<input class="checkbox-tools"  type="radio" name="package_type" id="tool-5" value="Extra Large Parcel" data-toggle="modal" data-target="#extraparcel">
					  <label class="for-checkbox-tools" for="tool-5" id="tool-5">
						<div class="cardbox">
							<h5 class="mb-0">Extra Large Parcel</h5>
							<p class="text-black font-12 mb-0">25kg or above</p>
						</div>
					 </label>
				  </div>
			  </div>
			  
			 
			</div> 

		
			<!-- </form> -->
			
			<form action="<?php site_url('chloonline/service');?>" method="post" enctype='multipart/form-data' >
				
			<div class="box-shadowbox">			
			  <div class="row">
			     <div class="col-sm-12"><h3 class="b-btom">Enter Package Detail</h3></div>
				     <div class="form-group col-md-6 mb-2">
                        <label class="mb-0">Enter Package Category</label> 
						<!-- <input type="text" name= "category" class="form-control"  placeholder="Enter here"> -->
						<select class="form-control" name="cat_name">
						<option value="">Select Category</option>
							<?php foreach($category as $cat){?>
								<option value="<?php echo $cat->cat_name;?>" ><?php echo $cat->cat_name;?></option>
							<?php  }?>
                        </select>
                      </div>
				     <div class="form-group col-md-6 mb-2">
                        <label class="mb-0">Item Name</label> 
						<input type="text" name="item_name" class="form-control"  placeholder="Enter here">
                      </div>
                     <div class="form-group col-md-4 mb-2">
                        <label class="mb-0">Enter Width(cm)*</label> 
						<input type="text" name="d_width" id="d_width"  onchange="CalculateEstimate();" class="form-control" placeholder="Enter here">
                      </div>
					  <div class="form-group col-md-4 mb-2">
                        <label class="mb-0">Enter Length(cm)* </label> 
						<input type="text" name="d_length" id="d_length" onchange="CalculateEstimate();" class="form-control" placeholder="Enter here">
                      </div>
					  
					  <div class="form-group col-md-4 mb-2">
                        <label class="mb-0">Enter Height(cm)*</label> 
						<input type="text" name="d_height" id="d_height" onchange="CalculateEstimate();" class="form-control" placeholder="Enter here">
                      </div>
					 
					  <div class="form-group col-sm-4 mb-2">
					      <!-- <div class="pricebox"><small>PACKAGE VALUE* </small> <br> <h3 class="mb-0"><b> ₹<div id='price'></div> </b></h3></div>	   -->
						  <label class="mb-0">Package Value*</label><br>
						  <input type="text"  name="package_value" max="25000"  class="form-control" value="<?php echo $package->package_value; ?> " placeholder="Enter here" oninput="deliveryProtect(this);">
                        
					  </div>
					  
					<div class="col-sm-12">
                          <input class="hidden-xs-up" id="cbx" type="checkbox" />
						  <label class="cbx" for="cbx"></label>
						  <label class="lbl" id="demo" for="cbx">Secure your package for just <?php if(empty($package->package_value) || $package->package_value > 2900 ){  $price = trim($package->package_value); echo $price/100*2 ; }else{ echo 50; }   ?></label>
						  
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
		    <div class="box-shadowbox mb-2">			
			  <div class="row">
			     <div class="col-sm-12"><h3 class="b-btom">Order Summary</h3></div>
				 <div class="col-md-6 mb-2">
				     <h4 class="mb-0 f14"><i class="fas fa-map-marker-alt mpicon"></i><?php echo $package->pick_up?></h4>
					 <!-- <h6 class="mb-0">11, Goyal Nagar, Indore (452001)</h6> -->
					 <!-- <h6 class="mb-0"><?php echo $package->house_no?>,<?php echo $package->area?>,<?php echo $package->city?>(<?php echo $package->pincode?>)</h6> -->
				 </div>
				 <div class="col-md-6 mb-2">
				     <h4 class="mb-0 f14"><i class="fas fa-map-marker-alt dpicon"></i><?php echo $package->drop;?></h4>
					 <!-- <h6 class="mb-0"><?php echo $package->house_no?>,<?php echo $package->drop?>,<?php echo $package->city?>(<?php echo $package->pincode?>)</h6> -->
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



<!--=================================
model start-->
<div class="modal fade" id="extraparcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light border-0">
        <h4 class="modal-title font-weight-normal" id="exampleModalCenterTitle">Extra Large Parcel</h4>
        
      </div>
      <div class="modal-body p-5">
           <h5>Add Your Extra Large Parcel 25KG. Or Above Weight</h5> 
			<form class="form-row mt-4 align-items-center" method="post">
			  <div class="form-group col-sm-12">
                <label>Enter Weight</label>
				<input type="text" name="d_weight" class="form-control" placeholder="">
              </div>
              <div class="col-sm-6 mb-2">
                <button type="submit" class="btn btn-primary btn-block" >Submit</button>
              </div>
            </form>
        </div>
      </div>
   </div>
</div>
<!--=================================
model end-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
	

//for number validation
			$(function(){
			$("input[name='width']").on('input', function (e) {
				$(this).val($(this).val().replace(/[^0-9]/g, ''));
			});
			$("input[name='length']").on('input', function (e) {
				$(this).val($(this).val().replace(/[^0-9]/g, ''));
			});
			// $("input[name='weight']").on('input', function (e) {
			// 	$(this).val($(this).val().replace(/[^0-9]/g, ''));
			// });
			$("input[name='height']").on('input', function (e) {
				$(this).val($(this).val().replace(/[^0-9]/g, ''));
			});
			});
				
   
				function CalculateEstimate(){

				// var source_lat = 22.7585;
				// var destination_lat = 22.7221;
				// var source_long = -75.8912;
				// var destination_long = -75.8258;	
				var width = parseInt(document.getElementById('Width').value);
				var height = parseInt(document.getElementById('height').value);
				var length = parseInt(document.getElementById('length').value);
				var weight = parseInt(document.getElementById('weight').value);
				// var gift = parseInt(document.getElementById('gift').value);
				// var urgent = parseInt(document.getElementById('urgent').value);

				// var delicate = parseInt(document.getElementById('delicate').value);
				// var staircase = parseInt(document.getElementById('staircase').value);
				//     width = width / 12
				//  var  wallTotal = (parseFloat(height  width  length) / 27);
				//   document.getElementById("volume").value = wallTotal;

				var  Rlon1 = source_long * Math.PI / 180;
				var	Rlon2 = destination_long * Math.PI / 180;
				var	Rlat1 = source_lat * Math.PI / 180;
				var	Rlat2 = destination_lat * Math.PI / 180;

				var dlon = Rlon2 - Rlon1;
				var dlat = Rlat2 - Rlat1;
				var a = Math.pow(Math.sin(dlat / 2), 2)
						+ Math.cos(Rlat1) * Math.cos(Rlat2)
						* Math.pow(Math.sin(dlon / 2),2);
					
				var c = 2 * Math.asin(Math.sqrt(a));

				// Radius of earth in kilometers. Use 3956
				// for miles
				var r = 6371;

				// calculate the result
				var km = c * r;
				if(isNaN(km)){
					km=0;
				}
				if(isNaN(width)){
					width=0;
				}
				if(isNaN(height) ){
					height=0;
				}
				if(isNaN(length)){
					length=0;
				}
				if(isNaN(weight)){
					weight=0;
				}


				var gift_check = document.getElementById("gift");
				var gift=0.0;
				if (gift_check.checked == true){
					gift=parseFloat(gift_check.value);
				}
				var urgent_check = document.getElementById("urgent");
				var urgent=0.0;
				if (urgent_check.checked == true){
					urgent=parseFloat(urgent_check.value);
				}


				var delicate_check = document.getElementById("delicate");
				var delicate=0.0;
				if (delicate_check.checked == true){
					delicate=parseFloat(delicate_check.value);
				}
				var stair_check = document.getElementById("staircase");
				var staircase=0.0;
				if (stair_check.checked == true){
					document.getElementById("floor").style.display = "block";

				}else{
					document.getElementById("floor").style.display = "none";
				}


				var select = document.getElementById('floor');
			    var values = select.options[select.selectedIndex].value;

			
				var staircase=0.0;
				if (values.selected == true){
					staircase=parseFloat(values);
				}

				//const cb = document.getElementById('accept');
				//console.log(source_lat);
				var km1= Math.round(km)
				//console.log(km1);
				var total = km1 *1+width*1 + height*1 +length*1+ weight*1+gift*1+urgent*1+delicate*1+values*1;
				document.getElementById('price').innerHTML= total;
				}



</script>

<script>

$('input[name=package_type]').change(function () {

$("#form2").submit();

});


function packageType(package_type){
    
    $.ajax({
        type: "POST",
       // dataType:'json',
        url: 'http://localhost/texcutive/index.php/chloonline/package_detail',
        data: {
            'package_type' : package_type.value,
             'id' : <?php  echo $package->id; ?>,
        },
        success: function(response) {
			document.getElementById("demo").innerHTML =  package_type;
            console.log(response);
         // toastr.success("Date update Successful");
           
            
            
        }
    });
}


function deliveryProtect(package_value){
    
    $.ajax({
        type: "POST",
       // dataType:'json',
        url: 'http://localhost/texcutive/index.php/chloonline/package_detail',
        data: {
            'package_value' : package_value.value,
             'id' : <?php  echo $package->id; ?>,
        },
        success: function(response) {
            
            console.log(response);
			//location.reload(true);
           
            
            
        }
    });
}
	</script>
	