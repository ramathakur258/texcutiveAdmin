<!-- <?php // echo $Id;die; ?> -->
<!-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> -->
<section class="pt-lg-9 pb-lg-7 bg-light">
  <!-- container start -->
    <div class="container">
        <!-- row start -->
          <form action="" id="form2" method="post"  enctype='multipart/form-data' > 
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
					 <?php  echo form_error('package_id'); ?> 
					</div>
				 <div class="col-md-12">
					 <h6 class="mb-0">SELECT PACKAGE SIZE <span class="singleship"> Single Shipping only</span></h6>
				 </div>
				 
				 <?php if(!empty($delivery_package)){ 
                foreach($delivery_package as $row){ 
				 ?>
				 <div class="col-6 col-sm-3 mt-5">
					<input class="checkbox-tools" type="radio" name="package_id" id="tool-<?php echo $row->packages_id; ?>" value="<?php echo $row->packages_id; ?>" <?php echo set_checkbox('package_id', $row->packages_id); ?> onclick="pack(this)" >
					<label class="for-checkbox-tools" for="tool-<?php echo $row->packages_id; ?>">
						<div class="cardbox">
							<h5 class="mb-0"><?php echo $row->package_type; ?></h5>
							<p class="text-black font-12 mb-0"><?php echo $row->package_weight; ?>Kg</p>
						</div>
					</label>
				</div>
				<?php }} ?>
				
			  </div>
			  
			 
			</div> 

		
			<!-- </form> -->
			
			 <!-- <form action="<?php // site_url('chloonline/service');?>" method="post"   >  -->
				
			<div class="box-shadowbox">			
			  <div class="row">
			     <div class="col-sm-12"><h3 class="b-btom">Enter Package Detail</h3></div>
				     <div class="form-group col-md-6 mb-2">
                        <label class="mb-0">Enter Package Category</label> 
						<!-- <input type="text" name= "category" class="form-control"  placeholder="Enter here"> -->
						<select class="form-control" name="cate_id"  onchange="catName(this);"  tabIndex="1" autofocus>
						<option value="">Select Category</option>
							<?php foreach($category as $cat){?>
								<option value="<?php echo $cat->cat_id;?>"  <?php echo set_select('cate_id', $cat->cat_id); ?>><?php echo $cat->cat_name;?></option>
							<?php  }?>
							
                        </select>
						<?php  echo form_error('cate_id'); ?> 
                      </div>
				     <div class="form-group col-md-6 mb-2">
                        <label class="mb-0">Item Name</label> 
						<input type="text" name="item_name"   class="form-control"  value="<?php  echo set_value('item_name'); ?>" placeholder="Enter here"  tabIndex="2" >
                    	<?php  echo form_error('item_name'); ?>   
					</div>
                     <div class="form-group col-md-4 mb-2">
                        <label class="mb-0">Enter Width(cm)*</label> 
						<input type="text" name="d_width" id="d_width"  class="form-control" value="<?php  echo set_value('d_width'); ?>" placeholder="Enter here"  tabIndex="3">
						<?php  echo form_error('d_width'); ?>  
					</div>
					  <div class="form-group col-md-4 mb-2">
                        <label class="mb-0">Enter Length(cm)* </label> 
						<input type="text" name="d_length" id="d_length"  class="form-control" value="<?php  echo set_value('d_length'); ?>" placeholder="Enter here"  tabIndex="4">
						<?php  echo form_error('d_length'); ?>   
					</div>
					  
					  <div class="form-group col-md-4 mb-2">
                        <label class="mb-0">Enter Height(cm)*</label> 
						<input type="text" name="d_height" id="d_height"    class="form-control" value="<?php  echo set_value('d_height'); ?>"  placeholder="Enter here"  tabIndex="5">
						<?php  echo form_error('d_height'); ?>   
					</div>
					 
					  <div class="form-group col-sm-4 mb-2">
					     
						  <label class="mb-0">Package Value*</label><br>
						  <input type="text"  name="package_value" id="package_value" max="25000"  class="form-control" value="<?php  echo set_value('package_value'); ?>"  placeholder="Enter here" onchange="deliveryProtect(this);"  tabIndex="6" />
						  <?php  echo form_error('package_value'); ?>   
					  </div>
					  
					<div class="col-sm-12">
                          <input class="hidden-xs-up" id="cbx" name="security_charge" value="1" <?php echo set_checkbox('security_charge', '1'); ?>  type="checkbox" onchange="securityCharge(this);" />
						  <label class="cbx" for="cbx"></label>
						  <label class="lbl"  for="cbx">Secure your package for just ₹ <div id="demo" >50 </div> </label>
						  
						  <p><small>The maximum liability value for lost/damaged shipment will be ₹ 2000. Please refer 
						  <a href=""> T&C </a> for further details.</small></p>
                    </div>
                   <div class="col-sm-12">
				        <input type="submit" value="GET PRICE" id="submit"  name="submit" class="btn btn-primary" tabIndex="7" disabled>
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
				     <h4 class="mb-0 f14"><i class="fas fa-map-marker-alt mpicon"></i><?php if(isset($package->pick_up)){echo $package->pick_up;} ?></h4>
					 <!-- <h6 class="mb-0">11, Goyal Nagar, Indore (452001)</h6> -->
					 <!-- <h6 class="mb-0"><?php // echo $package->house_no?>,<?php // echo $package->area?>,<?php // echo $package->city?>(<?php // echo $package->pincode?>)</h6> -->
				 </div>
				 <div class="col-md-6 mb-2">
				     <h4 class="mb-0 f14"><i class="fas fa-map-marker-alt dpicon"></i><?php  if(isset($package->drop)){echo $package->drop;}?></h4>
					 <!-- <h6 class="mb-0"><?php // echo $package->house_no?>,<?php // echo $package->drop?>,<?php // echo $package->city?>(<?php // echo $package->pincode?>)</h6> -->
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
<div class="modal fade" id="extraparcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light border-0">
        <h4 class="modal-title font-weight-normal" id="exampleModalCenterTitle">Extra Large Parcel</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body p-5">
           <h5>Add Your Extra Large Parcel 25KG. Or Above Weight</h5> 
		   
			<form class="form-row mt-4 align-items-center"  action="<?php echo base_url('chloonline/weightCal'); ?>" id="FormID"  method="post" >
			  <div class="form-group col-sm-12">
                <label>Enter Weight</label>
				<input type="text" name="d_weight" id="weight" onkeyup="success()" value="<?php echo set_value('d_weight'); ?>" class="form-control" placeholder="" >
				<span id="weight_error" class="text-danger"></span>
				<input type="hidden" name="id" value="<?php echo $package->id; ?>" />           
			</div>
			
              <div class="col-sm-6 mb-2">
                <button type="submit" id="weight_submit" class="btn btn-primary btn-block" >Submit</button>
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
			$("input[name='d_width']").on('input', function (e) {
				$(this).val($(this).val().replace(/[^0-9]/g, ''));
			});
			$("input[name='d_length']").on('input', function (e) {
				$(this).val($(this).val().replace(/[^0-9]/g, ''));
			});
			$("input[name='package_value']").on('input', function (e) {
				$(this).val($(this).val().replace(/[^0-9]/g, ''));
			});
			$("input[name='d_height']").on('input', function (e) {
				$(this).val($(this).val().replace(/[^0-9]/g, ''));
			});
			});
				
   
</script>

<script>

$('input[name=package_type]').change(function () {

$("#form2").submit();

});
let btnSend =  document.getElementsByTagName("p")[5];
        if (btnSend) {
			btnSend.setAttribute('id', 'send');
            
       }

 $( "#send" ).append( "<p>Or Above</p>" );


const source = document.getElementById('package_value');
const result = document.getElementById('demo');

const inputHandler = function(e) {
  var t =e.target.value;
  if(t == "" ){
	result.innerHTML =  50;
  
  }else if(t>2900){
	result.innerHTML = t/100*2;
  }else{
	result.innerHTML =  50;
  }
}

source.addEventListener('input', inputHandler);
source.addEventListener('propertychange', inputHandler); 

// function weightCal(){
    
// 	document.getElementById("FormID").submit();
	 
//   }



	</script>
	


<script type="text/javascript">

function pack(pck){
	
	var package_id = pck.value;
	
 //alert(package_id);
if(package_id == 6){

    $('#extraparcel').modal('show');
	document.getElementById('submit').disabled = true;
}else{
	$('#extraparcel').modal('hide');
	document.getElementById('submit').disabled = false;
}
}

$(document).ready(function(){



$('#FormID').on('submit', function(event){
 event.preventDefault();
 $.ajax({
  url:"<?php echo base_url(); ?>chloonline/weightCal",
  method:"POST",
  data:$(this).serialize(),
  dataType:"json",
  // beforeSend:function(){
  //  $('#contact').attr('disabled', 'disabled');
  // },
  success:function(data)
  {
   if(data.error)
   {
    if(data.weight_error != '')
    {
     $('#weight_error').html(data.weight_error);
    }
    else
    {
     $('#weight_error').html('');
    }
    
   }
   if(data.success)
   {
    
    $('#weight_error').html('');
	$('#extraparcel').modal('hide');
   }
 
  }
 })
});

});

</script>


<script type="text/javascript">
$(document).on('keypress', 'input,select', function (e) {
    if (e.which == 13) {
        e.preventDefault();
        var $next = $('[tabIndex=' + (+this.tabIndex + 1) + ']');
        console.log($next.length);
        if (!$next.length) {
       $next = $('[tabIndex=1]');        }
        $next.focus() .click();
    }
});

function success() {
	
	$("#FormID").on("submit", function(e) {
    event.preventDefault();
	document.getElementById('submit').disabled = false;
   
	});
	}

</script>

