<?php //echo $orderdetail->status;die;?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<section class="pt-lg-9 pb-lg-7 ">
   <!-- container start -->
   <div class="container">
      <!-- row start -->
      <div class="row d-flex justify-content-center">
            <div class="col-md-8">
               <h3 class="orde-number mt-2">Order#: <?php echo $orderdetail->order_id ?></h3>
               <div class="checkout-box">
                  <div class="row transction">
                     <div class="col-sm-6">
                        <!-- <h5 class="font17">Order Reference Number : <b> 157958 </b></h5> -->
                     </div>
                     <div class="col-sm-6">
                        <h5 class="font17-r"><?php if(isset($orderdetail->update_time) &&  $date= date("d-M-Y",strtotime($orderdetail->update_time ))){ echo $date; } ?></h5>
                     </div>
                  </div>
                <div class="row">
                   <div class="col-md-6">				
					  <div class="pickup-calander">
						 <span class="calander-img"><i class="far fa-calendar-alt"></i></span>
						 <div class="right-date">
							<p>Order to be collected on</p>
							<h4><?php if(isset($orderdetail->update_time) &&  $date= date("d-M-Y",strtotime($orderdetail->update_time ))){ echo $date; } ?></h4>
						 </div>
					  </div>
				   </div>	
				   
                <div class="col-md-6">
                   <div class="pickup-calander">
                     <span class="calander-img"><i class="far fa-calendar-alt"></i></span>
                     <div class="right-date">
                        <p>Order to be delivered</p>
                        <h4 class="bluecolor"><?php if(isset($orderdetail->update_time) &&  $date= date("d-M-Y",strtotime($orderdetail->update_time ))){ echo $date; } ?></h4>
                     </div>
                   </div>
				</div>   
				   
				</div>  
			
                  <h4 class="mt-2 your-address-title">Order detail</h4>
                  <div class="table-responsive table-bordernew">
                     <table class="table">
                        <tbody>
                           <tr>
                              <td><?php echo $orderdetail->cat_name ?></td>
                              <td class="text-right"><b><?php echo $orderdetail->item_name ?></b></td>
                           </tr>
                           <tr>
                              <td>Package detail</td>
                              <td class="text-right"><b><?php echo $orderdetail->package_type ?></b></td>
                           </tr>
                           <tr>
                              <td>Address:</td>
                              <td class="text-right"><b><?php echo $orderdetail->drop ?></b></td>
                           </tr>
                           <tr>
                              <td>Number:</td>
                              <td class="text-right"><b><?php echo $orderdetail->mobile ?></b></td>
                           </tr>
						   <tr>
                              <td>Security charges:</td>
                              <td class="text-right"><b>₹<?php echo $orderdetail->security_charge ?></b></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <div style="height:10px;"></div>
                  <div class="checkout-box-final text-center">
                     <span><i class="fas fa-shopping-basket"></i> Total Order: ₹<?php echo $orderdetail->paid_amount ?></span>
                  </div>
               </div>
			   
			    <div class="tracking">
					<div class="title">Tracking Order</div>
				</div>
				<div class="progress-track">
					<ul id="progressbar">
						<li class="step0 " id="step1">Ordered</li>
						<li class="step0  text-center" id="step2">Shipped</li>
						<li class="step0  text-right" id="step3">On the way</li>
						<li class="step0 text-right" id="step4">Delivered</li>
					</ul>
				</div>
			   
			   
            </div>
         <!-- row end -->
      </div>
   </div>
   <!-- container end -->
</section>

<script>
var sts = <?php echo $orderdetail->status ;?>;
    if(sts == 0){ 
    var a =document.getElementById("step1");
    a.setAttribute("class", "active");
   }else if(sts == 1){
      var b =document.getElementById("step1");
    b.setAttribute("class", "active");
    var c =document.getElementById("step2");
    c.setAttribute("class", "active");
   }else if(sts == 2){
      var g =document.getElementById("step1");
    g.setAttribute("class", "active");
    var h =document.getElementById("step2");
    h.setAttribute("class", "active");
    var i =document.getElementById("step3");
    i.setAttribute("class", "active");
   }else if(sts == 3){
      var j =document.getElementById("step1");
    j.setAttribute("class", "active");
    var k =document.getElementById("step2");
    k.setAttribute("class", "active");
    var l =document.getElementById("step3");
    l.setAttribute("class", "active");
    var m =document.getElementById("step4");
    m.setAttribute("class", "active");
   }
</script>
