
<section class="pt-lg-9 pb-lg-7 bg-light" style="padding-top: 130px !important;">
  <!-- container start -->
    <div class="container">
        <!-- row start -->
        
		 <div class="row d-flex justify-content-center">
                  <div class="col-md-8">
				    <div class="row">
					  <div class="col-md-12 col-lg-12 text-center"> 
						   <div class="fail fail--big"></div>
						    <h1 class="fontbold">Sorry! your payment failed!</h1>
						    <p class="mb-0"><b>Transaction ID:</b> 152458258752515</p>
						    <p class="mb-0"><b>Payment amount:</b>  ₹3500</p>
							<p class="mb-0">Date: 29 Sep, 2021 - 16:05PM</p>
						   <p class="mb-0">If your payment got detucted for above transaction, the same shall be credited back to your account in 5 working days</p>
					  </div> 
					  <div class="col-md-12 col-lg-12 text-center"> 	
						  <div class="box-greyline">
						    <h2 class="fontbold"> Need Help!</h2>
						    <p class="mb-4">You can try by using other payment options</p>
						    <!-- <button onclick="window.print()" class="contiunebtn waves-effect waves-light">Print Order</button> -->
                      <!-- <a href="window.print()"  > Print Order</a> -->
							<a href="<?php echo base_url("chloonline/payment/" .$orderDetail->id);?>" class="waves-effect waves-light purchase-btn-thanksyou">Try again</a>
					      </div>
					  </div>
					  
					  
				      
				   </div>
                </div>	
	</div>
</section>	