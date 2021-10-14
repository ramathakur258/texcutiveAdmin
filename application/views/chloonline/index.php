

   <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
   <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:400,500"
      rel="stylesheet"
    />

<section class="bg-light pt-lg-9 pb-lg-7 pb-0 position-relative ">

  <!-- container start -->
    <div class="container">

      <!-- row start -->
      <div class="row align-items-center py-5 py-md-5">
        <div class="col-lg-6">
          <h1 class="font-weight-normal text-uppercase">Send packages anywhere across India</h1>
          <p class="lead">20% off for all our early adopters</p>
		  
		  <p><i>"Tell us about your package and get the price only based on shared details. No hidden charges."</i></p>
		  <!-- subscribe start -->
          <div class="mt-4">

            <!-- form start -->
            <form action="" class="form-row mb-3" method="POST" > 
              
			  <div class="accordion w-100" id="accordionExample"> 
				
				  <div class="card card bg-white border mb-1 w-100 d-black">
					<div class="card-header bg-transparent border-0 p-0" id="headingOne">
					  <h5 class="mb-0">
						<button class="bg-transparent border-0 p-3 pr-6 font-weight-normal right btn-block text-left" onclick="getidOne()" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
						  Fill Your Pickup Address
						</button>
					  </h5>
					</div>

					<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
					    <div class="card-body pt-0 pb-1 row">
							<div class="form-group col-md-12 mb-2">
							   <label class="mb-0">Enter Pickup Address</label> 
							   <input type="search" name="pick_up"  class="form-control f-13 inputs" id="pick_up" value="<?php  echo set_value('pick_up'); ?>" placeholder="Enter Pickup Address"   tabindex="1" autofocus>
                              <?php if(form_error('pick_up')) {?>
                 <?php  echo form_error('pick_up'); ?> 
                 <?php } else{?>  <?php  echo form_error('source_lat'); ?> 
                  <?php }?> 
							</div>
							<div class="form-group col-md-12 mb-2">
							   <label class="mb-0">Area </label> 
							   <input type="text" name="pick_up_area" class="form-control f-13 inputs" value="<?php  echo set_value('pick_up_area'); ?>" placeholder="Enter Area"  tabindex="2">
                              <?php  echo form_error('pick_up_area'); ?>
							</div>
							<div class="form-group col-md-8 mb-2">
							  <label class="mb-0">Apartment/House No.</label> 
							  <input type="text" name="pick_up__apartment_houseno" class="form-control f-13 inputs" value="<?php  echo set_value('pick_up__apartment_houseno'); ?>" placeholder="Enter Apartment/House No"  tabindex="3">
                            <?php  echo form_error('pick_up__apartment_houseno'); ?>
							</div>
							
							<div class="form-group col-md-4 mb-2">
							   <label class="mb-0">Floor No.</label> 
               
							   <select class="form-control f-13 inputs" name="pick_up_staircase"  tabindex="4" >
                   <option value="">Select Floor No</option>
                   <option value="0" <?php echo set_select('pick_up_staircase', '0'); ?>>None</option>
                   <option value="1" <?php echo set_select('pick_up_staircase', '1'); ?>>1</option>
                   <option value="2" <?php echo set_select('pick_up_staircase', '2'); ?>>2</option>
                   <option value="3" <?php echo set_select('pick_up_staircase', '3'); ?>>3</option>
                   <option value="4" <?php echo set_select('pick_up_staircase', '4'); ?>>4</option>
                   <option value="5" <?php echo set_select('pick_up_staircase', '5'); ?>>5</option>
                   <option value="6" <?php echo set_select('pick_up_staircase', '6'); ?>>6</option>
                   <option value="7" <?php echo set_select('pick_up_staircase', '7'); ?>>7</option>
                   <option value="8" <?php echo set_select('pick_up_staircase', '8'); ?>>8</option>
                   <option value="9" <?php echo set_select('pick_up_staircase', '9'); ?>>9</option>
                   <option value="10" <?php echo set_select('pick_up_staircase', '10'); ?>>10</option>
                  </select>
                   <?php  echo form_error('pick_up_staircase'); ?>
							</div>
					     </div>
					 </div>
				  </div>
				  
				  
				  <div class="card card bg-white border mb-1 w-100 d-black">
					<div class="card-header bg-transparent border-0 p-0" id="heading2">
					  <h5 class="mb-0">
						<button class="bg-transparent border-0 p-3 pr-6 font-weight-normal right btn-block text-left" onclick="getidTwo()" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
						  Fill Your Drop Address
						</button>
					  </h5>
					</div>

					<div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordionExample">
					  <div class="card-body pt-0 pb-1 row">
					    <div class="form-group col-md-12 mb-2">
                           <label class="mb-0">Enter Drop Address</label> 
						   <input type="text"  name= "drop" class="form-control f-13" value="<?php  echo set_value('drop'); ?>" id="drop" placeholder="Enter Drop Address"  tabindex="5" >
               <?php if(form_error('drop')!="") {?>
                 <?php  echo form_error('drop'); ?> 
                 <?php } else{?>  <?php  echo form_error('destination_lat'); ?> 
                  <?php }?> 
               
                        </div>
						<div class="form-group col-md-12 mb-2">
                           <label class="mb-0">Area</label> 
						   <input type="text" name="drop_area" class="form-control f-13" value="<?php  echo set_value('drop_area'); ?>" placeholder="Enter Area"  tabindex="6" >
                          <?php  echo form_error('drop_area'); ?> 
                        </div>
						<div class="form-group col-md-8 mb-2">
                          <label class="mb-0">Apartment/House No.</label> 
						  <input type="text" name="drop_apartment_houseno" class="form-control f-13" value="<?php  echo set_value('drop_apartment_houseno'); ?>" placeholder="Enter Apartment/House No"  tabindex="7" >
                         <?php  echo form_error('drop_apartment_houseno'); ?>  
                        </div>
                        
					    <div class="form-group col-md-4 mb-2">
                           <label class="mb-0">Floor No.</label> 
                            
						   <select class="form-control f-13" name="drop_staircase"  tabindex="8" >
                 <option value="">Select Floor No</option>
                   <option value="0" <?php echo set_select('drop_staircase', '0'); ?>>None</option>
                   <option value="1" <?php echo set_select('drop_staircase', '1'); ?>>1</option>
                   <option value="2" <?php echo set_select('drop_staircase', '2'); ?>>2</option>
                   <option value="3" <?php echo set_select('drop_staircase', '3'); ?>>3</option>
                   <option value="4" <?php echo set_select('drop_staircase', '4'); ?>>4</option>
                   <option value="5" <?php echo set_select('drop_staircase', '5'); ?>>5</option>
                   <option value="6" <?php echo set_select('drop_staircase', '6'); ?>>6</option>
                   <option value="7" <?php echo set_select('drop_staircase', '7'); ?>>7</option>
                   <option value="8" <?php echo set_select('drop_staircase', '8'); ?>>8</option>
                   <option value="9" <?php echo set_select('drop_staircase', '9'); ?>>9</option>
                   <option value="10" <?php echo set_select('drop_staircase', '10'); ?>>10</option>
                </select>
               <?php  echo form_error('drop_staircase'); ?> 
                        </div>
					  
					  </div>
					</div>
				  </div>
				  
				</div> 
			  
			  <div class="col-6">
                <input type="hidden"  name= "source_lat" class="form-control" value="<?php  echo set_value('source_lat'); ?>" id="source_lat" placeholder=""   >
              </div>
              <div class="col-6">
                <input type="hidden"  name= "source_long" class="form-control" id="source_long" value="<?php  echo set_value('source_long'); ?>" placeholder=""  >
              </div>
              <div class="col-6">
                <input type="hidden"  name= "destination_lat" class="form-control" id="destination_lat" value="<?php  echo set_value('destination_lat'); ?>" placeholder="" >
              </div>
              <div class="col-6">
                <input type="hidden"  name= "destination_long" class="form-control" id="destination_long" value="<?php  echo set_value('destination_long'); ?>" placeholder=""  >
              </div>
              <div class="col-auto mt-2">
                <button type="submit" value="submit" class="btn btn-primary" tabindex="9" >Proceed</button>
                <!-- <a class="btn btn-primary" name="" href="<?php //base_url('home/service');?>" role="button">Proceed</a> -->
              </div>
            </form>
            <!-- form end -->

            <ul class="d-sm-flex pl-3">
              <li class="mr-lg-5 mr-4"> Standard Courier </li>
              <li class="mr-lg-5 mr-4"> Door to Door </li>
              <li class="mr-lg-5 mr-4"> Express Courier </li>
            </ul>
          </div>
          <!-- subscribe start -->
        </div>

        <div class="col-lg-5 offset-lg-1">
          <div class="position-relative">
            <!-- intro image start -->
            <div class="img-shadow-50">
              <img class="img-fluid position-relative" src="<?php echo base_url("assets/img1/about-1.jpg"); ?>" alt="intro">
            </div>
            <!-- intro image end -->

           </div>
        </div>
      </div>
      <!-- row end -->

    </div>
  <!-- container end -->

</section>
<!--=================================
intro end -->



<!--=================================
blog start -->
<section class="py-lg-7 py-7">

  <!-- container start -->
    <div class="container">

      <!-- row start -->
      <div class="row">
        <div class="col-12 text-center">

          <!-- heading start -->
          <div class="mb-md-6 mb-5">
            <h2 class="font-weight-normal mb-2">Move anything, anywhere</h2>
          </div>
          <!-- heading end -->

        </div>
      </div>
      <!-- row end -->

      <!-- row start -->
      <div class="row">

        <div class="col-lg-3 col-md-4 mb-5 mb-lg-0">
            <!-- card start -->
            <div class="card bg-light border-0 movebox">
              <img class="img-fluid" src="<?php echo base_url("assets/img1/p1.jpg"); ?>" alt="Blog">
              <!-- Card body start -->
              <div class="card-body p-4">
                <a class="mb-0 font-weight-normal font-18" href="#">Essential Supply</a>
              </div>
              <!-- Card body end -->
            </div>
            <!-- card end -->
        </div>
        <div class="col-lg-3 col-md-4 mb-5 mb-lg-0">
            <!-- card start -->
            <div class="card bg-light border-0 movebox">
              <img class="img-fluid" src="<?php echo base_url("assets/img1/p2.jpg"); ?>" alt="Blog">
              <!-- Card body start -->
              <div class="card-body p-4">
                <a class="mb-0 font-weight-normal font-18" href="#">House hold & Decor </a>
              </div>
              <!-- Card body end -->
            </div>
            <!-- card end -->
        </div>
        <div class="col-lg-3 col-md-4 mb-5 mb-lg-0">
            <!-- card start -->
            <div class="card bg-light border-0 movebox">
            <img class="img-fluid" src="<?php echo base_url("assets/img1/p3.png"); ?>" alt="Blog">
              <!-- Card body start -->
              <div class="card-body p-4">
                <a class="mb-0 font-weight-normal font-18" href="#">Packaged Food</a>
              </div>
              <!-- Card body end -->
            </div>
            <!-- card end -->
        </div>
        <div class="col-lg-3 col-md-4 mb-5 mb-lg-0">
            <!-- card start -->
            <div class="card bg-light border-0 movebox">
              <img class="img-fluid" src="<?php echo base_url("assets/img1/p4.jpg"); ?>" alt="Blog">
              <!-- Card body start -->
              <div class="card-body p-4">
                <a class="mb-0 font-weight-normal font-18" href="#">Apparel &  Accessories</a>
              </div>
              <!-- Card body end -->
            </div>
            <!-- card end -->
        </div>
		<div class="col-lg-3 col-md-4 mb-5 mb-lg-0">
            <!-- card start -->
            <div class="card bg-light border-0 movebox">
              <img class="img-fluid" src="<?php echo base_url("assets/img1/p5.jpg"); ?>" alt="Blog">
              <!-- Card body start -->
              <div class="card-body p-4">
                <a class="mb-0 font-weight-normal font-18" href="#">Beauty & Baby Care</a>
              </div>
              <!-- Card body end -->
            </div>
            <!-- card end -->
        </div>
		<div class="col-lg-3 col-md-4 mb-5 mb-lg-0">
            <!-- card start -->
            <div class="card bg-light border-0 movebox">
              <img class="img-fluid" src="<?php echo base_url("assets/img1/p6.png"); ?>" alt="Blog">
              <!-- Card body start -->
              <div class="card-body p-4">
                <a class="mb-0 font-weight-normal font-18" href="#">Books &  Stationery</a>
              </div>
              <!-- Card body end -->
            </div>
            <!-- card end -->
        </div>
       <div class="col-lg-3 col-md-4 mb-5 mb-lg-0">
            <!-- card start -->
            <div class="card bg-light border-0 movebox">
              <img class="img-fluid" src="<?php echo base_url("assets/img1/p7.jpg"); ?>" alt="Blog">
              <!-- Card body start -->
              <div class="card-body p-4">
                <a class="mb-0 font-weight-normal font-18" href="#">Electronics</a>
              </div>
              <!-- Card body end -->
            </div>
            <!-- card end -->
        </div>
		<div class="col-lg-3 col-md-4 mb-5 mb-lg-0">
            <!-- card start -->
            <div class="card bg-light border-0 movebox">
              <img class="img-fluid" src="<?php echo base_url("assets/img1/p8.jpg"); ?>" alt="Blog">
              <!-- Card body start -->
              <div class="card-body p-4">
                <a class="mb-0 font-weight-normal font-18" href="#">Automotives</a>
              </div>
              <!-- Card body end -->
            </div>
            <!-- card end -->
        </div>
        <div class="col-12 mt-lg-7 mt-5 text-center">
          <a class="btn btn-primary" href="#">Ship Now Order</a>
        </div>

      </div>
      <!-- row end -->

    </div>
  <!-- container end -->

</section>
<!--=================================
blog end -->


<!--=================================
feature start -->
<section class="pb-lg-9 pb-7">

  <!-- container start -->
    <div class="container">

      <!-- row start -->
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">

          <!-- heading start -->
            <div class="mb-md-6 mb-5">
              <h2 class="font-weight-normal mb-2">Our Commitment</h2>
              <p class="mb-0">accusamus fugit. Iusto, quam cupiditate saepe dolor,</p>
            </div>
          <!-- heading end -->

        </div>
      </div>
      <!-- row end -->

      <!-- row start -->
      <div class="row">
        <div class="col-lg-3 col-sm-6 mb-5 mb-md-0">

          <div class="pr-xl-6">

              <!-- svg start -->
              <img class="svg-injector svg-injector-img" src="<?php echo base_url("assets/img1/product_safety.png");?>" alt="svg">
              <!-- svg end -->

              <h4 class="font-weight-normal mt-4">Product Safety</h4>
              <p class="mb-0">Your package is secure with us during every moment of the logistic process.</p>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 mb-5 mb-md-0">

          <div class="pr-xl-6">

              <!-- svg start -->
              <img class="svg-injector svg-injector-img" src="<?php echo base_url("assets/img1/package.png"); ?>" alt="svg">
              <!-- svg end -->

              <h4 class="font-weight-normal mt-4">Pocket Friendly</h4>
              <p class="mb-0">We provide easy and affordable services. You pay only for what you ship.</p>

          </div>
        </div>

        <div class="col-lg-3 col-sm-6 mb-5 mb-sm-0">

          <div class="pr-xl-6">

              <!-- svg start -->
              <img class="svg-injector svg-injector-img" src="<?php echo base_url("assets/img1/search.png"); ?>" alt="svg">
              <!-- svg end -->

              <h4 class="font-weight-normal mt-4">Fastest Delivery</h4>
              <p class="mb-0">Efficient delivery services lead to happier customers and build brand loyalty.</p>

          </div>
        </div>

        <div class="col-lg-3 col-sm-6">

          <div class="pr-xl-6">

              <!-- svg start -->
              <img class="svg-injector svg-injector-img" src="<?php echo base_url("assets/img1/developer.png"); ?>" alt="svg">
              <!-- svg end -->

              <h4 class="font-weight-normal mt-4">Easy Tracking</h4>
              <p class="mb-0">Know where your order is at all times, from the pickup location to its destination.</p>

          </div>
        </div>

      </div>
      <!-- row end -->

    </div>
  <!-- container end -->

</section>
<!--=================================
feature end -->


<!--=================================
about start -->
<section class="pb-lg-9 pb-7">

  <!-- container start -->
    <div class="container">
      <!-- row start -->
      <div class="row align-items-center">
        <div class="col-md-6 mb-6 mb-lg-0">
          <div class="position-relative about-shape">
            <img class="img-fluid" src="<?php echo base_url("assets/img1//hero-6.jpg"); ?>" alt="about">
          </div>
        </div>
        <div class="col-xl-6 col-md-6">
          <!-- heading start -->
          <div class="mb-md-6 mb-5">
            <h2 class="font-weight-normal mb-2">Schedule a pickup</h2>
          </div>
          <!-- heading end -->
          <ul class="list-unstyled mb-0">
            <li><i class="far fa-circle text-primary mr-2 mb-3"></i> Set your pickup and drop location</li>
            <li><i class="far fa-circle text-primary mr-2 mb-3"></i> Tell us the package weight (max 10 kg)</li>
            <li><i class="far fa-circle text-primary mr-2 mb-3"></i> Pay online to auto schedule the pickup of your package</li>
          </ul>
        </div>
      </div>
     <!-- row end -->
	 <!-- row start -->
      <div class="row align-items-center">
        <div class="col-xl-6 col-md-6">
          <!-- heading start -->
          <div class="mb-md-6 mb-5">
            <h2 class="font-weight-normal mb-2">Doorstep Pickup</h2>
          </div>
          <!-- heading end -->
          <ul class="list-unstyled mb-0">
            <li><i class="far fa-circle text-primary mr-2 mb-3"></i> Enjoy a free pickup from the comfort of your home</li>
            <li><i class="far fa-circle text-primary mr-2 mb-3"></i> Handover the package to the delivery executive and plan the perfect delivery</li>
          </ul>
        </div>
		<div class="col-md-6 mb-6 mb-lg-0">
          <div class="position-relative about-shape">
            <img class="img-fluid" src="<?php echo base_url("assets/img1/hero-7.jpg"); ?>" alt="about">
          </div>
        </div>
      </div>
     <!-- row end -->
     <!-- row start -->
      <div class="row align-items-center">
        <div class="col-md-6 mb-6 mb-lg-0">
          <div class="position-relative about-shape">
            <img class="img-fluid" src="<?php echo base_url("assets/img1/hero-8.jpg"); ?>" alt="about">
          </div>
        </div>
        <div class="col-xl-6 col-md-6">
          <!-- heading start -->
          <div class="mb-md-6 mb-5">
            <h2 class="font-weight-normal mb-2">Real-time Tracking</h2>
          </div>
          <!-- heading end -->
          <ul class="list-unstyled mb-0">
            <li><i class="far fa-circle text-primary mr-2 mb-3"></i> Track your shipment status anytime, anywhere</li>
            <li><i class="far fa-circle text-primary mr-2 mb-3"></i> Set your delivery preferences & experience much more</li>
          </ul>
        </div>
      </div>
     <!-- row end --> 
    <!-- row start -->
      <div class="row align-items-center">
        <div class="col-xl-6 col-md-6">
          <!-- heading start -->
          <div class="mb-md-6 mb-5">
            <h2 class="font-weight-normal mb-2">Quick Package Delivery</h2>
          </div>
          <!-- heading end -->
          <ul class="list-unstyled mb-0">
            <li><i class="far fa-circle text-primary mr-2 mb-3"></i> We deliver your package swiftly, safely
and on time</li>
          </ul>
        </div>
		<div class="col-md-6 mb-6 mb-lg-0">
          <div class="position-relative about-shape">
            <img class="img-fluid" src="<?php echo base_url("assets/img1/hero-9.jpg"); ?>" alt="about">
          </div>
        </div>
      </div>
     <!-- row end -->

    </div>
  <!-- container end -->

</section>
<!--=================================
about end -->



<section id="estimatepage" class="pb-lg-7 pt-7 position-relative" style="background: url(assets/img1/get-quote-form.jpg) no-repeat; background-position: bottom;
    background-size: cover;">
 <form  id="estimate_form" method="post">
    <div class="container">
	    <div class="row">
     
		    <div class="col-md-6">
			  <div class="row">
			         <div class="col-sm-12">
					   <h3 class="b-btom text-white">GET ESTIMATE PRICE</h3>
					   <p class="text-white">*Inclusive taxes, no hidden charges</p> 
					 </div>
          
				     <div class="form-group col-md-12 mb-2">
                        <label class="mb-0 text-white">PICKUP ADDREESS</label> 
						<input type="text" name="pickup_add" id="pickup_add" class="form-control" placeholder="Enter here" tabno="1">
            <span id="pickup_add_error" class="text-danger"></span>
            <input type="hidden"  name="pickup_lat" id="pickup_lat" class="form-control" placeholder="Enter here">
            <input type="hidden"  name="pickup_long" id="pickup_long" class="form-control" placeholder="Enter here">
                      </div>
				     <div class="form-group col-md-12 mb-2">
                        <label class="mb-0 text-white">DESTINATION ADDRESS</label> 
						<input type="text"  name="drop_add" id="drop_add" class="form-control" placeholder="Enter here" tabno="2">
            <span id="drop_add_error" class="text-danger"></span>
            <input type="hidden"  name="drop_lat" id="drop_lat" class="form-control" placeholder="Enter here">
            <input type="hidden"  name="drop_long"  id="drop_long" class="form-control" placeholder="Enter here">
                      </div>
                     <div class="form-group col-md-12 mb-2">
                        <label class="mb-0 text-white">SHIPMENT TYPE</label> 
						<select class="form-control" name="package_id" tabno="3">
              <option value="">Select parcel</option>
              <?php foreach($packages as $row) {?>
                <option value="<?php echo $row->packages_id; ?>"><?php echo $row->package_type; ?></option>
                <?php }?>
            </select>
            <span id="package_error" class="text-danger"></span>
                      </div>
					  <div class="col-md-12 mb-2">
					     <div class="estimated-price-wrap"><label class="label">Estimated Price</label>
               <span class="estimated-price-text"  id="success_message"></span></div>
					  </div>
					  
                     <div class="col-sm-12 mb-4">
				        <button type="submit" id="getstimate" class="btn btn-primary" tabno="4">GET ESTIMATE</button>
				     </div>
            
			    </div> 
			</div>
      
			<div class="col-md-6">
			    <img src="assets/img1/get-quote-thumb.png" class="gtestimate-img"/>
			</div>
			
			
		</div>
	</div>
  </form>
</section>






<!--=================================
customer reviews start -->
<section class="py-lg-9 py-7 bg-light position-relative">

  <!-- container start -->
    <div class="container">

      <!-- row start -->
      <div class="row align-items-center">

        <div class="col-lg-6 mb-4 mb-lg-0">
          <span class="badge badge-primary badge-primary-soft mb-4">Our customers</span>
          <!-- heading start -->
          <div class="mb-md-6 mb-5">
            <h2 class="font-weight-normal mb-2">Trusted by more than 10,000 businesses in 140 countries.</h2>
            <p class="mb-0">We know this in our gut, but what can we do about it? How can we motivate ourselves? </p>
          </div>
          <!-- heading end -->
          <a class="btn btn-primary" href="#">Meet our Customers</a>

          <!-- featured on start -->
          <div class="mt-md-6 mt-4">
            <div class="d-flex">
              <div class="mr-md-8 mr-3">
                <h2 class="font-weight-normal mb-0 display-4">4,9</h2>
                <ul class="list-unstyled list-inline d-flex mb-0">
                  <li class="list-inline-item mr-0 text-warning"><i class="fas fa-star"></i></li>
                  <li class="list-inline-item mr-0 text-warning"><i class="fas fa-star"></i></li>
                  <li class="list-inline-item mr-0 text-warning"><i class="fas fa-star"></i></li>
                  <li class="list-inline-item mr-0 text-warning"><i class="fas fa-star"></i></li>
                  <li class="list-inline-item mr-0 text-warning"><i class="fas fa-star"></i></li>
                </ul>
                <span>3,458 rating</span>
                <small class="text-primary d-flex">Support approval</small>
              </div>
              <div class="mr-md-4 mr-0">
                <h2 class="font-weight-normal mb-0 display-4">A+</h2>
                <ul class="list-unstyled list-inline d-flex mb-0">
                  <li class="list-inline-item mr-0 text-warning"><i class="fas fa-star"></i></li>
                  <li class="list-inline-item mr-0 text-warning"><i class="fas fa-star"></i></li>
                  <li class="list-inline-item mr-0 text-warning"><i class="fas fa-star"></i></li>
                  <li class="list-inline-item mr-0 text-warning"><i class="fas fa-star"></i></li>
                  <li class="list-inline-item mr-0 text-warning"><i class="fas fa-star"></i></li>
                </ul>
                <span>93 Customer reviews</span>
                <small class="text-primary d-flex">Our rating</small>
              </div>
            </div>

          </div>
          <!-- featured on end -->
        </div>

        <div class="col-lg-5">

          <!-- owl carousel -->
          <div class="owl-carousel text-left testimonial" data-nav-dots="true" data-nav-arrow="false" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1">
            <div class="items">
             <div class="position-relative z-index-9">
               <div class="position-relative overflow-hidden">
                 <img class="clienrsayimg" src="<?php echo base_url("assets/img1/01.jpg"); ?>" alt="about">
                 </div>
                 <div class="bg-white p-5">
                  <p class="lead">"Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups."
                  </p>
                  <div class="d-flex">
                    <div class="ml-4">
                      <span class="d-block">Iram</span>
                      <strong>Indore</strong>
                    </div>
                  </div>
                 </div>
               </div>
            </div>
            <div class="items">
             <div class="position-relative z-index-9">
               <div class="position-relative overflow-hidden">
                   <img class="clienrsayimg" src="<?php echo base_url("assets/img1/02.jpg"); ?>" alt="about">
                   </div>
                    <div class="bg-white p-5">
					  <p class="lead">"Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups."
					  </p>
					  <div class="d-flex">
						<div class="ml-4">
						  <span class="d-block">Nirmal</span>
						  <strong>Indore</strong>
						</div>
					  </div>
					 </div>
               </div>
            </div>
            <div class="items">
             <div class="position-relative z-index-9">
               <div class="position-relative overflow-hidden">
                   <img class="clienrsayimg" src="<?php echo base_url("assets/img1/03.jpg"); ?>" alt="about">
                   </div>
                    <div class="bg-white p-5">
                  <p class="lead">"Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups."
                  </p>
                  <div class="d-flex">
                    <div class="ml-4">
                      <span class="d-block">Soniya</span>
                      <strong>Indore</strong>
                    </div>
                  </div>
                 </div>
               </div>
            </div>
          </div>

        </div>

      </div>
      <!-- row end -->

    </div>
  <!-- container end -->

</section>
<!--=================================
customer reviews end -->



<!--=================================
action box start -->
<section class="pb-lg-7 pt-7 position-relative z-index-0" style="background: url <?php echo base_url("assets/img1/slider-img1.jpg");?> no-repeat; background-position: bottom;
    background-size: cover;">

  <!-- container start -->
    <div class="container">
      <div class="p-lg-6 p-4 position-relative">

        <!-- row start -->
        <div class="row d-flex justify-content-center">
          <div class="col-md-12">
              <h2 class="text-white text-center">Ready to ship through us?</h2>
			  <p class="text-white">Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p>
              <a class="btn btn-light ml-auto mr-auto d-block w-30" href="#">START SHIPPING</a>
          </div>

        </div>
        <!-- row end -->

      </div>
    </div>
  <!-- container end -->

</section>
<!--=================================
action box end -->





<script>




let autocomplete;
let autocomplete1;
let address1Field;
let address2Field;
let postalField;

function initAutocomplete() {
  initMap();
  initMap2();
}


function initMap() {
    
  address1Field = document.getElementById("pick_up");
  address2Field = document.getElementById("drop");
  // Create the autocomplete object, restricting the search predictions to
  // addresses in the US and Canada.
  autocomplete = new google.maps.places.Autocomplete(address1Field,{
    fields: ["formatted_address", "geometry", "name"],
    strictBounds: false,
    types: ["establishment"],
    
  });
  autocomplete1 = new google.maps.places.Autocomplete(address2Field,{
    componentRestrictions: { country: ["in"] },
    fields: ["address_components", "geometry"],
    types: ["address"],
    
  });

  address1Field.focus();
  address2Field.focus();
  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener("place_changed", fillInAddress);
  autocomplete1.addListener("place_changed", fillInAddress1);
}

function fillInAddress() 
{
                // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();

    let address1 = "";
    let postcode = "";
                
                
    if(address1Field.id=='pick_up'){
        
        document.getElementById("source_lat").value = place.geometry.location.lat();
        document.getElementById("source_long").value = place.geometry.location.lng();
        
    }

    console.log(address1Field);
    // get lng
    document.getElementById("source_lat").value = place.geometry.location.lat();
    document.getElementById("source_long").value = place.geometry.location.lng();
    // Get each component of the address from the place details,
    // and then fill-in the corresponding field on the form.
    // place.address_components are google.maps.GeocoderAddressComponent objects
    // which are documented at http://goo.gle/3l5i5Mr
    for (const component of place.address_components) 
    {
        const componentType = component.types[0];
    // console.log(place.geometry.location.lat)

        switch (componentType) 
        {
                    case "street_number": {
                        address1 = `${component.long_name} ${address1}`;
                        break;
                    }

                    case "route": {
                        address1 += component.short_name;
                        break;
                    }

                    case "postal_code": {
                        address1 += `${component.long_name}${postcode}`;
                        break;
                    }

                    case "postal_code_suffix": {
                        address1 += `${postcode}-${component.long_name}`;
                        break;
                    }
                    case "locality":{ 
                        address1 = component.long_name;
                        break;
                    }
                    case "administrative_area_level_1": {
                        address1 +=component.short_name;
                        break;
                    }
                    case "country":{ 
                        address1 += component.long_name;
                        break;
                    }

        }
    }
}


function fillInAddress1() 
{
        // Get the place details from the autocomplete object.
    var place = autocomplete1.getPlace();

    let address2 = "";
    let postcode2 = "";
    
    
    if(address2Field.id=='drop'){
        
        document.getElementById("destination_lat").value = place.geometry.location.lat();
        document.getElementById("destination_long").value = place.geometry.location.lng();
        
    }

    console.log(address2Field);
    // get lng
    document.getElementById("destination_lat").value = place.geometry.location.lat();
    document.getElementById("destination_long").value = place.geometry.location.lng();
    // Get each component of the address from the place details,
    // and then fill-in the corresponding field on the form.
    // place.address_components are google.maps.GeocoderAddressComponent objects
    // which are documented at http://goo.gle/3l5i5Mr
    for (const component of place.address_components) 
    {
        const componentType = component.types[0];
        // console.log(place.geometry.location.lat)

        switch (componentType) 
        {
            
                case "street_number": {
                address2 = `${component.long_name} ${address2}`;
                break;
            }

            case "route": {
                address2 += component.short_name;
                break;
            }

            case "postal_code": {
                address2 += `${component.long_name}${postcode2}`;
                break;
            }

            case "postal_code_suffix": {
                address2 += `${postcode2}-${component.long_name}`;
                break;
            }
            case "locality":{ 
                address2 = component.long_name;
                break;
            }
            case "administrative_area_level_1": {
                address2+=component.short_name;
                break;
            }
            case "country":{ 
                address2 += component.long_name;
                break;
            }

        }
    }
}

</script>

<script type="text/javascript">

$('input,select').on('keypress', function (e) {
    if (e.which == 13) {
        e.preventDefault();
        var $next = $('[tabIndex=' + (+this.tabIndex + 1) + ']');
        console.log($next.length);
        if (!$next.length) {
            $next = $('[tabIndex=1]');
        }
        $next.focus();
    }
});
</script>
  
<script type="text/javascript">

// register jQuery extension
jQuery.extend(jQuery.expr[':'], {
    focusable: function (el, index, selector) {
        return $(el).is('a, button, :input, [tabno]');
    }
});

$(document).on('keypress', 'input,select', function (e) {
    if (e.which == 13) {
        e.preventDefault();
        // Get all focusable elements on the page
        var $canfocus = $(':focusable');
        var index = $canfocus.index(document.activeElement) + 1;
        if (index >= $canfocus.length) index = 0;
        $canfocus.eq(index).focus();
    }
});
</script>
  

<script>


let autocom;
let autocom1;
let add1Field;
let add2Field;
let postField;

function initMap2() {
    
  add1Field = document.getElementById("pickup_add");
  add2Field = document.getElementById("drop_add");
  // Create the autocomplete object, restricting the search predictions to
  // addresses in the US and Canada.
  autocom = new google.maps.places.Autocomplete(add1Field,{
    componentRestrictions: { country: ["in"] },
    fields: ["address_components", "geometry"],
    types: ["address"],
    
  });
  autocom1 = new google.maps.places.Autocomplete(add2Field,{
    componentRestrictions: { country: ["in"] },
    fields: ["address_components", "geometry"],
    types: ["address"],
    
  });

  add1Field.focus();
  add2Field.focus();
  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocom.addListener("place_changed", fillInAdd);
  autocom1.addListener("place_changed", fillInAdd1);
}

function fillInAdd() 
{
                // Get the place details from the autocomplete object.
    var place = autocom.getPlace();

    let add1 = "";
    let postcode3 = "";
                
                
    if(add1Field.id=='pickup_add'){
        
        document.getElementById("pickup_lat").value = place.geometry.location.lat();
        document.getElementById("pickup_long").value = place.geometry.location.lng();
        
    }

    console.log(add1Field);
    // get lng
    document.getElementById("pickup_lat").value = place.geometry.location.lat();
    document.getElementById("pickup_long").value = place.geometry.location.lng();
    // Get each component of the address from the place details,
    // and then fill-in the corresponding field on the form.
    // place.address_components are google.maps.GeocoderAddressComponent objects
    // which are documented at http://goo.gle/3l5i5Mr
    for (const component of place.address_components) 
    {
        const componentType = component.types[0];
    // console.log(place.geometry.location.lat)

        switch (componentType) 
        {
                    case "street_number": {
                      add1 = `${component.long_name} ${add1}`;
                        break;
                    }

                    case "route": {
                      add1 += component.short_name;
                        break;
                    }

                    case "postal_code": {
                      add1 += `${component.long_name}${postcode3}`;
                        break;
                    }

                    case "postal_code_suffix": {
                      add1 += `${postcode3}-${component.long_name}`;
                        break;
                    }
                    case "locality":{ 
                      add1 = component.long_name;
                        break;
                    }
                    case "administrative_area_level_1": {
                      add1 +=component.short_name;
                        break;
                    }
                    case "country":{ 
                      add1 += component.long_name;
                        break;
                    }

        }
    }
}


function fillInAdd1() 
{
        // Get the place details from the autocomplete object.
    var place = autocom1.getPlace();

    let add2 = "";
    let post2 = "";
    
    
    if(add2Field.id=='drop_add'){
        
        document.getElementById("drop_lat").value = place.geometry.location.lat();
        document.getElementById("drop_long").value = place.geometry.location.lng();
        
    }

    console.log(add2Field);
    // get lng
    document.getElementById("drop_lat").value = place.geometry.location.lat();
    document.getElementById("drop_long").value = place.geometry.location.lng();
    // Get each component of the address from the place details,
    // and then fill-in the corresponding field on the form.
    // place.address_components are google.maps.GeocoderAddressComponent objects
    // which are documented at http://goo.gle/3l5i5Mr
    for (const component of place.address_components) 
    {
        const componentType = component.types[0];
        // console.log(place.geometry.location.lat)

        switch (componentType) 
        {
            
                case "street_number": {
                  add2 = `${component.long_name} ${add2}`;
                break;
            }

            case "route": {
              add2 += component.short_name;
                break;
            }

            case "postal_code": {
              add2 += `${component.long_name}${post2}`;
                break;
            }

            case "postal_code_suffix": {
              add2 += `${post2}-${component.long_name}`;
                break;
            }
            case "locality":{ 
              add2 = component.long_name;
                break;
            }
            case "administrative_area_level_1": {
              add2+=component.short_name;
                break;
            }
            case "country":{ 
              add2 += component.long_name;
                break;
            }

        }
    }
}

</script>
 <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHc_DsweA9F0GG1A724BSOJgtV9BcWK3o&callback=initAutocomplete&libraries=places&v=weekly"  async
    ></script>
    
<script type="text/javascript">

$(document).ready(function(){

$('#estimate_form').on('submit', function(event){
 event.preventDefault();
 $.ajax({
  url:"<?php echo base_url(); ?>chloonline/estimateData",
  method:"POST",
  data:$(this).serialize(),
  dataType:"json",
  // beforeSend:function(){
  //  $('#getstimate').attr('disabled', 'disabled');
  // },
  success:function(data)
  {
   if(data.error)
   {
    if(data.pickup_add_error != '')
    {
     $('#pickup_add_error').html(data.pickup_add_error);
    }
    else
    {
     $('#pickup_add_error').html('');
    }
    if(data.drop_add_error != '')
    {
     $('#drop_add_error').html(data.drop_add_error);
    }
    else
    {
     $('#drop_add_error').html('');
    }
    if(data.package_error != '')
    {
     $('#package_error').html(data.package_error);
    }
    else
    {
     $('#package_error').html('');
    }
    
   }
   if(data.success)
   {
    const str1 = "₹";
const str2 = data.success;
  $('#success_message').html(str1 + str2);
    $('#pickup_add_error').html('');
    $('#drop_add_error').html('');
    $('#package_error').html('');
    
    
    $('#estimate_form')[0].reset();

   }
 
  }
 })
});

});

// $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
//     console.log("tab shown...");
//     localStorage.setItem('activeTab', $(e.target).attr('class'));
// });

// // read hash from page load and change tab
// var activeTab = localStorage.getItem('activeTab');
// if(activeTab){
//     $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
// }
function getidOne() {
  localStorage.mytime = "collapseOne" ;
  localStorage.removeItem("newtime");
}
function getidTwo() {
  localStorage.newtime = "collapse2" ;
  localStorage.removeItem("mytime");
}


$(document).ready(function() {
  
  
   if(localStorage.getItem("mytime")=="collapseOne"){
    var a = document.getElementById("collapseOne");;
    a.setAttribute("class", "show");
  
   }
       
});

$(document).ready(function() {
  
    if(localStorage.getItem("newtime")=="collapse2"){
      var c = document.getElementById("collapse2");;
    c.setAttribute("class", "show");
 
   }
   
 
    
});



</script>