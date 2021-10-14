<?php // echo isset($userId);die; ?>
<style>
   
   .inputError { color:#fa4b2a; padding-left: 10px; } 
 // body{font-family:Verdana;}
</style>
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
							<p class="text-black font-12 mb-0">Delivery in 1 - 3 business days   <span style="font-size: 18px;font-weight: 700;color: #131a1c; text-align:right;margin-left: 300px;">₹<?php echo $Standard_service; ?></span></p>
						</div>
					</label>
					
					
					
				</div>
			  </div>
			</div> 
			
			
			 <form  method="post" id="contact_form"> 
			<div class="box-shadowbox">			
			  <div class="row">
			 
			      <div class="col-sm-12">
				    <h3 class="b-btom">Address Details</h3>
				    <p>Enter Delivery Address</p>
            <div class="alert alert-danger print-error-msg" style="display:none">
            </div>
				  </div>
				  <div class="form-group col-md-6 mb-2">
             <label class="mb-0">FULL NAME </label> 
						 <input minlength="3" type="text" name="user_name" value="<?php echo set_value('user_name', $service->user_name) ?>" class="form-control required" placeholder="Enter here"   tabIndex="1" autofocus>
             <span id="name_error" class="text-danger"></span>
             <input type="hidden" name="id" value="<?php  echo $service->id; ?>" class="form-control" placeholder="Enter here">          
           </div>
				  <div class="form-group col-md-6 mb-2">
            <label class="mb-0">MOBILE NUMBER</label> 
            <input type="text" name="mobile" class="form-control" value="<?php echo set_value('mobile', $service->mobile) ?>" placeholder="Enter here"  tabIndex="3" >
            <span id="mobile_error" class="text-danger"></span>
          </div>
          <div class="form-group col-md-12 mb-2">
            <label class="mb-0">EMAIL ADDRESS</label> 
						<input type="text" name="email" class="form-control " value="<?php echo set_value('email', $service->email) ?>" placeholder="Enter here"  tabIndex="3" >
            <span id="email_error" class="text-danger"></span>
          </div>
					  
				<div class="col-sm-12">
          <input class="hidden-xs-up" id="cbx" type="checkbox"  tabIndex="4" />
          <label class="cbx" for="cbx"></label>
          <label class="lbl" for="cbx">I agree with the Terms & Conditions of Use, guarantee that the shipment does not contain any Restricted Items and the contents of this parcel are Non-commercial in nature and meant for personal use only.</label>
          <span id="term_error" class="text-danger"></span>
				</div>
                   <div class="col-sm-12 mt-3">
				        <button type="submit" name="submit" id="contact" class="btn btn-primary " tabIndex="5" >PROCEED TO BOOK</button>
				    </div>
					  
			    </div>
			</div> 
		</div>
        </form> 
		
		<div class="col-md-5">
		    <div class="box-shadowbox mb-2">			
			  <div class="row">
			     <div class="col-sm-12"><h3 class="b-btom">Order Summary</h3></div>
				 <div class="col-md-6 mb-2">
				     <h4 class="mb-0 f14"><i class="fas fa-map-marker-alt mpicon"></i><?php if(isset( $service->pick_up)) {echo $service->pick_up;}?></h4>
					 <!-- <h6 class="mb-0"><?php // echo $service->house_no?>,<?php // echo $service->area?>,<?php // echo $service->city?>(<?php // echo $service->pincode?>)</h6> -->
				 </div>
				 <div class="col-md-6 mb-2">
				     <h4 class="mb-0 f14"><i class="fas fa-map-marker-alt dpicon"></i><?php  if(isset( $service->drop)) {echo $service->drop;}?></h4>
					 <!-- <h6 class="mb-0"><?php // echo $service->house_no?><?php // echo ',' ?><?php // echo $service->area?><?php // echo ',' ?><?php // echo $service->city?><?php // echo'('?><?php // echo $service->pincode?><?php // echo')'?></h6> -->
				 </div>
				
			   <div class="clearfix"></div>

                 
				<div class="col-sm-12">
                   
                    <div class="qtybox">				   
					   <h6 class="mb-0"><b>Add your Qty</b></h6>
					   <!-- <form action="<?php // echo base_url('chloonline/qytcalculation')?>" method="post" id="qytId"> -->
					   <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value"> -</div>
                       <input type="number" id="number" name="qyt" value="<?php if(isset( $service->qyt) &&  $service->qyt !=0) {echo $service->qyt ;} ?>" onchange="qyt(this);"  />
                       
                       <input type="hidden"  name="id" value="<?php  echo $service->id; ?>"  />
                       <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                       <!-- </form> -->
                      </div>
					
					<div class="checkboxservice">
						<label>
            
						  <input type="checkbox" name="gift" id="gift" value="0"  onchange="gift(this)" <?php if(isset( $service->gift) && $service->gift != 0 ) {echo "checked" ;} ?> ><span class="checkbox-material"><span class="check"></span></span> Gift
     
						</label>
					</div>
					<div class="checkboxservice">
						<label>
						  <input type="checkbox" name="delicate" id="delicate" value="0" onchange="delicate(this)" <?php if(isset( $service->delicate) && $service->delicate != 0 ) {echo "checked" ;} ?> ><span class="checkbox-material"><span class="check"></span></span> Delicate
						</label>
					</div>
					<div class="checkboxservice">
						<label>
						  <input type="checkbox" name="urgent" id="urgent" value="0" onchange="urgent(this)" <?php if(isset( $service->urgent) && $service->urgent != 0 ) {echo "checked" ;} ?>><span class="checkbox-material"><span class="check"></span></span> Urgent
						</label>
					</div>
				
					
                </div>

			   
				<div class="col-md-12">
				  <div class="card-wrapper order-summary b-btop">
				    <div class="list-item-flex"><div  class="item-title"> Package Category </div>
				       <div class="item-info"><span class="code"><?php if(isset($service->cat_name)){ echo $service->cat_name;} ?></span><i></i></div>
				    </div>
					<div class="list-item-flex">
					    <div class="item-title"> Package Type </div>
						<div class="item-info"><span class="code"> <?php if(isset($service->package_type)){echo $service->package_type;}?></span><i></i></div>
					</div>
					<div class="list-item-flex">
					    <div class="item-title"> SERVICE TYPE - STANDARD </div>
						<div class="item-info"><span class="code"><b>₹<?php if(isset($Standard_service)){echo $Standard_service;} ?></b></span><i></i></div>
					</div>
					<div class="list-item-flex">
					    <div class="item-title">  Delhivery Protect  </div>
						<div class="item-info"><span class="code"><b>₹<?php if(isset($security_charge)){  echo $security_charge ; } ?></b></span><i></i></div>
					</div>
					<div class="list-item-flex btop-bdr">
					    <div class="item-title" style="color: #262727 !important;"> TOTAL </div>
						<div class="item-info"><span class="code-bold"><b>₹<?php if(isset($total)){echo $total;}?></b></span><i></i></div>
					</div>
					
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


<!--=================================


model start-->

<div class="modal fade" id="loginmobile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light border-0">
        <h4 class="modal-title font-weight-normal" id="exampleModalCenterTitle">Login</h4>
        
      </div>
      <div class="modal-body p-5">
           <h5>Welcome to Chaloonline Delivery!</h5> 
           <form class="form-row mt-4 align-items-center"  action="<?php echo base_url('chloonline/resendMobile'); ?>" id="mobileform"  method="post" >
			  <div class="form-group col-sm-12">
                <label>MOBILE NUMBER</label>
				<input type="text" class="form-control" maxlength="10" id="mob_sucess" value="" name="mobiles" placeholder="" >
        <span id="mobiles_error" class="text-danger"></span>
				<input type="hidden" name="id" value="<?php echo $service->id; ?>" />           
      </div>
              <div class="col-sm-6 mb-2">
                <button type="submit" class="btn btn-primary btn-block"  id="login1" >GET OTP</button>
              </div>
              <div class="col-sm-12">
                <ul class="list-unstyled d-flex mb-1 mt-sm-0 mt-3">
                  <li class="mr-1 small">By continuing, you agree to 
				    <a href="#"> Conditions of Use </a> 
					<a href="#">and Privacy Policy</a>
				  </li>
                </ul>
              </div>
            </form>
        </div>
      </div>
   </div>
</div>
<!--=================================
model end-->

<!--=================================
model start-->

<div class="modal fade" id="otpscreem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light border-0">
        <h4 class="modal-title font-weight-normal" id="exampleModalCenterTitle">Confirm OTP</h4>
        
      </div>
      <div class="modal-body p-5">
           <h5>Enter the OTP you have received on your mobile number</h5> 
			<h4 class="mb-0"><b></b> 
			  <!-- <small><a href="" data-dismiss="modal" data-toggle="modal" data-target="#loginmobile">Change Number</a></small> -->
			</h4>
			<form id="myFormID" class="form-row mt-4 align-items-center"  method="post" >
              <div class="form-group col-sm-12">
                <label>OTP</label>
				<input type="text" name="otp" class="form-control"  placeholder="">
        <span id="otp_error" class="text-danger"></span>
        <input type="hidden" name="id" value="<?php  echo $service->id; ?>" class="form-control" placeholder="Enter here">          
         </div>
              <div class="col-sm-6">
                <button type="submit"  class="btn btn-primary btn-block">Submit</button>
              
              </div>
            </form>
      </div>
    </div>
  </div>
</div>
<!--=================================
model end-->



<!--=================================
Javascript -->


  <!-- JS Global Compulsory (Do not remove)-->
  <script src="<?php echo base_url("assets/js1/jquery-3.6.0.min.js"); ?> "></script>
  <script src="<?php echo base_url("assets/js1/popper.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js1/bootstrap.min.js"); ?>" ></script>


  <script src="<?php echo base_url("assets/js1/owl.carousel.min.js"); ?>" ></script>

  <!-- Template Scripts (Do not remove)-->
  <script src="<?php echo base_url("assets/js1/custom.js") ; ?>"></script>
 
 <script>	 


$(function(){
  $("input[name='mobile']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
  });
});



$(function(){
  $("input[name='mobiles']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
  });
});



function gift(gift){
    
  //alert(id)
var gift_check = document.getElementById("gift");
var gift=0;
if (gift_check.checked == true){
  gift=1;
}

  

    $.ajax({
        type: "POST",
       // dataType:'json',
        url: '<?php echo base_url('chloonline/giftcalculation');?>',
        data: {
            'gift' : gift,
             'id' :<?php  echo $service->id; ?>,
        },
        success: function(response) {
            
        //  alert(response);
			//location.reload(true);
      window.location.reload(); 
            
            
        }
    });
}

function delicate(delicate){
    
var delicate_check = document.getElementById("delicate");
var delicate=0;
if (delicate_check.checked == true){
  delicate=1;
}

  

    $.ajax({
        type: "POST",
       // dataType:'json',
        url: '<?php echo base_url('chloonline/delicatecalculation');?>',
        data: {
            'delicate' : delicate,
             'id' : <?php  echo $service->id; ?>,
        },
        success: function(response) {
            
            console.log(response);
			//location.reload(true);
    //  alert(response);
     location.reload(true); 
            
        }
    });
}

function urgent(urgent){
 
 
var urgent_check = document.getElementById("urgent");
var urgent=0;
if (urgent_check.checked == true){
  urgent=1;
}

    $.ajax({
        type: "POST",
       // dataType:'json',
        url: '<?php echo base_url('chloonline/urgentcalculation');?>',
        data: {
            'urgent' : urgent,
             'id' : <?php  echo $service->id; ?>,
        },
        success: function(response) {
         // alert(response);
            console.log(response);
			location.reload(true);
  
            
            
        }
    });
}

  var id = <?php  echo $service->id; ?>

$(document).ready(function(){

$('#myFormID').on('submit', function(event){
 event.preventDefault();
 $.ajax({
  url:"<?php echo base_url(); ?>chloonline/optGenrate",
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
    if(data.otp_error != '')
    {
     $('#otp_error').html(data.otp_error);
    }
    else
    {
     $('#otp_error').html('');
    }
    
   }
   if(data.success)
   {
    
    $('#otp_error').html('');

  $('#otpscreem').modal('hide');
  window.location = '<?php echo base_url(); ?>chloonline/payment/' + id ;
   }
 
  }
 })
});

});

</script>


<script type="text/javascript">

$(document).ready(function(){

$('#contact_form').on('submit', function(event){
 event.preventDefault();
 $.ajax({
  url:"<?php echo base_url(); ?>chloonline/userData",
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
    if(data.name_error != '')
    {
     $('#name_error').html(data.name_error);
    }
    else
    {
     $('#name_error').html('');
    }
    if(data.email_error != '')
    {
     $('#email_error').html(data.email_error);
    }
    else
    {
     $('#email_error').html('');
    }
    if(data.mobile_error != '')
    {
     $('#mobile_error').html(data.mobile_error);
    }
    else
    {
     $('#term_error').html('');
    }
    
   }
   if(data.success)
   {
    
    var cbx_check = document.getElementById("cbx");

if (cbx_check.checked == true){
    $('#success_message').html(data.success);
    $('#name_error').html('');
    $('#email_error').html('');
    $('#mobile_error').html('');
    $('#mob_sucess').val(data.mobile);
    // $('#contact_form')[0].reset();
    $('#loginmobile').modal('show');
    $('#term_error').html('');
}else {
    $('#term_error').text("Accept The Terms And Condition!");
  }
//location.reload(true);
           
   // $('#contact').removeAttr("disabled");
   }
   //$('#contact').attr('disabled', false);

  }

 })
 return false;
});

});

</script>


<script>
function increaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('number').value = value;
     var qyt  = document.getElementById('number').value ;
 // document.getElementById("qytId").submit();

  $.ajax({
        type: "POST",
       // dataType:'json',
        url: "<?php echo base_url();?>chloonline/qytcalculation",
        data: {
            'qyt' : qyt,
            'id' : <?php  echo $service->id; ?>,
        },
        success: function(response) {
            // alert(response);
           // console.log(response);
			location.reload(true);
           
            
            
        }
    });
}

function decreaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById('number').value = value;
  var qyt  = document.getElementById('number').value ;
 // document.getElementById("qytId").submit();

  $.ajax({
        type: "POST",
       // dataType:'json',
        url: "<?php echo base_url();?>chloonline/qytcalculation",
        data: {
            'qyt' : qyt,
            'id' : <?php  echo $service->id; ?>,
        },
        success: function(response) {
            // alert(response);
           // console.log(response);
		location.reload(true);
           
            
            
        }
    });
}

</script>


<script type="text/javascript">
$(document).on('keypress', 'input,checkbox', function (e) {
    if (e.which == 13) {
        e.preventDefault();
        var $next = $('[tabIndex=' + (+this.tabIndex + 1) + ']');
        console.log($next.length);
        if (!$next.length) {
       $next = $('[tabIndex=1]');        }
        $next.focus() .click();
    }
});
</script>



<script type="text/javascript">

$(document).ready(function(){

$('#mobileform').on('submit', function(event){
 event.preventDefault();
 $.ajax({
  url:"<?php echo base_url(); ?>chloonline/resendMobile",
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
    if(data.mobiles_error != '')
    {
     $('#mobiles_error').html(data.mobiles_error);
    }
    else
    {
     $('#mobiles_error').html('');
    }
    
   }
   if(data.success)
   {
    
    $('#mobiles_error').html('');
	$('#otpscreem').modal('show');
  $('#loginmobile').modal('hide');
   }
 
  }
 })
});

});

</script>
