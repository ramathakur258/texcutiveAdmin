
<!-- <!DOCTYPE html><?php //echo  "http://" . $_SERVER['SERVER_NAME']. $_SERVER['REQUEST_URI'];die; ?> -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Delivery App</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url("assets/img1/favicon.png") ?>" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <!-- CSS Global Compulsory (Do not remove)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@icon/themify-icons@1.0.6/themify-icons.min.css" />


    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
    <link rel="stylesheet" href="<?php echo base_url("assets/css1/owl.carousel.min.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css1/magnific-popup.css"); ?>" />

    <!-- Template Style -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css1/style.css"); ?>" />
  </head>
  
 

<body>
<div class="alert alert-warning alert-dismissible text-white text-center mb-0 rounded-0 fade show" role="alert">
   Due to lockdowns across the country, please expect a delay in pickup or delivery of your shipments. For details on impacted areas, please 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<!--=================================
header start -->
<header class="header header-transparent header-sticky py-md-2 bg-white">
  <div class="container">
    <div class="row">
      <div class="col-12">

        <!-- main navbar -->
        <nav class="navbar navbar-expand-lg navbar-light p-0">
          <a class="navbar-brand" href="#"><img class="svg-injector" src="<?php echo base_url("assets/img1/logo.png");?>" alt="Logo"></a>
          <!-- navbar toggler -->
          <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <!-- navbar -->
          <?php if( "https://" . $_SERVER['SERVER_NAME']. $_SERVER['REQUEST_URI'] == "https://admin.texcutive.com/chloonline" ) { ?>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url("chloonline"); ?>">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url("chloonline/about"); ?>"> ABOUT</a>
              </li>
			        <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url("chloonline/support"); ?>"> SUPPORT</a>
              </li>
			        <li class="nav-item">
                <a class="nav-link" href="#estimatepage"> GET AN ESTIMATE</a>
              </li>
			  <!--<li class="nav-item">
                <a class="nav-link" href="<?php echo base_url("chloonline/getEstimate"); ?>"> GET AN ESTIMATE</a>
              </li>-->

            </ul>
          </div>
          <?php }else{?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url("chloonline"); ?>">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url("chloonline/about"); ?>"> ABOUT</a>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url("chloonline/support"); ?>"> SUPPORT</a>
              </li>
			  <!-- <li class="nav-item">
                <a class="nav-link" href="#downscroll-page"> GET AN ESTIMATE</a>
              </li> -->
			  <!--<li class="nav-item">
                <a class="nav-link" href="<?php // echo base_url("chloonline/getEstimate"); ?>"> GET AN ESTIMATE</a>
              </li>-->

            </ul>
          </div>

            <?php }?>
		  <div class="d-sm-flex ml-lg-auto m-sm-auto d-none">
              <ul class="nav ml-1 ml-lg-2 align-self-center">
                <li class="nav-item pl-2">
                  <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#trackordermodel">
                    Track Order
                  </a>
                </li>
              </ul>
            </div>
        </nav>
      </div>
    </div>
  </div>
</header>
<!--=================================
header end -->


<?php $this->load->view('chloonline/'.$content);?>

<!--=================================
footer-->
<footer class="footer pb-1 pb-lg-4 bg-light position-relative pt-7">

  <!-- container start -->
  <div class="container">

    <!-- row start -->
    <div class="row">
      <div class="col-lg-4 col-md-6 mb-5">
        <a class="mb-5 d-block" href="#"><img class="svg-injector f-logo" src="<?php echo base_url("assets/img1/logo.png");?>" alt="Logo"></a>
        <h5>If you are going to use a passage of Lorem Ipsum you need to be sure there isn't anything embarrassing hidden in the middle of text</h5>
        
      </div>
      <div class="col-lg-2 offset-lg-1 col-md-6 mb-2">
        <h4 class="font-weight-normal">About</h4>
        <ul class="list-unstyled">
          <li><a href="#">About</a></li>
		  <li><a href="#">Support</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Term & Conditions</a></li>
          <li><a href="#">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="col-lg-2 col-md-6 mb-2">
        <h4 class="font-weight-normal">Services</h4>
        <ul class="list-unstyled">
          <li><a href="#">Apparel & Accessories</a></li>
          <li><a href="#">Beauty & Baby Care</a></li>
          <li><a href="#">Package Food</a></li>
          <li><a href="#">Essential Supply</a></li>
          <li><a href="#">House hold & Decor</a></li>
		  <li><a href="">Books & Stationery</a></li>
        </ul>

      </div>
      <div class="col-lg-3 col-md-6">
        <h4 class="font-weight-normal">Social Link</h4>
        <ul class="list-unstyled mb-0">
          <li><a class="" href="#"><i class="fab fa-facebook-f pr-2"></i>Facebook</a></li>
          <li><a class="" href="#"><i class="fab fa-instagram pr-2"></i>Instagram</a></li>
          <li><a class="" href="#"><i class="fab fa-twitter pr-2"></i>Twitter</a></li>
          <li><a class="" href="#"><i class="fab fa-linkedin pr-2"></i>linkedin</a></li>
        </ul>
      </div>
    </div>
    <!-- row end -->

    <hr />

    <!-- row start -->
    <div class="row">
      <div class="col-md-12 text-md-center text-center">
          <p class="mb-0">© <a href="#">All rights reserved Chalonline</a> 2021 All rights reserved</p>
      </div>
    </div>
    <!-- row end -->

  </div>
  <!-- container end -->

</footer>
<!--=================================
footer-->


<!--=================================
Track order model start-->
<div class="modal fade" id="trackordermodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light border-0">
        <h4 class="modal-title font-weight-normal" id="exampleModalCenterTitle">Track Order</h4>
        
      </div>
      <div class="modal-body p-5">
           <h5>Welcome to Chaloonline Delivery!</h5> 
			<form class="form-row mt-4 align-items-center" id="mobileform" method="post">
			  <div class="form-group col-sm-12">
                <label>Enter Mobile Number</label>
				<input type="text" name="mobile"  maxlength="10" class="form-control" placeholder="">
        <span id="mob_error" class="text-danger"></span>
              </div>
              <div class="col-sm-6 mb-2">
                <button type="submit" class="btn btn-primary btn-block" >GET OTP</button>
              </div>
              <div class="col-sm-12">
                <ul class="list-unstyled d-flex mb-1 mt-sm-0 mt-3">
                  <li class="mr-1 small">Track Your Order With Register Mobile Number! </li>
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
<div class="modal fade" id="otpscreem-order" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light border-0">
        <h4 class="modal-title font-weight-normal" id="exampleModalCenterTitle">Confirm OTP</h4>
        
      </div>
      <div class="modal-body p-5">
           <h5>Enter the OTP you have received on your mobile number</h5> 
			<!-- <h4 class="mb-0"><b>+91 90012-34567</b> </h4> -->
			<form class="form-row mt-4 align-items-center" id="otpform" method="post">
              <div class="form-group col-sm-12">
                <label>OTP</label>
				<input type="text" name="otp" class="form-control" placeholder="">
        <span id="otp_error" class="text-danger"></span>
              </div>
              <div class="col-sm-6">
                <button type="submit" class="btn btn-primary btn-block">SUBMIT OTP</button>
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
<div class="modal fade" id="loginmobile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light border-0">
        <h4 class="modal-title font-weight-normal" id="exampleModalCenterTitle">Login</h4>
        
      </div>
      <div class="modal-body p-5">
           <h5>Welcome to Chaloonline Delivery!</h5> 
			<form class="form-row mt-4 align-items-center" method="post">
			  <div class="form-group col-sm-12">
                <label>MOBILE NUMBER</label>
				<input type="text" class="form-control" placeholder="">
              </div>
              <div class="col-sm-6 mb-2">
                <button type="submit" class="btn btn-primary btn-block" data-toggle="modal" data-dismiss="modal" data-target="#otpscreem">GET OTP</button>
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
<div class="modal fade" id="otpscreem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light border-0">
        <h4 class="modal-title font-weight-normal" id="exampleModalCenterTitle">Confirm OTP</h4>
        
      </div>
      <div class="modal-body p-5">
           <h5>Enter the OTP you have received on your mobile number</h5> 
			<h4 class="mb-0"><b>+91 90012-34567</b> 
			  <small><a href="" data-dismiss="modal" data-toggle="modal" data-target="#loginmobile">Change Number</a></small>
			</h4>
			<form class="form-row mt-4 align-items-center">
              <div class="form-group col-sm-12">
                <label>OTP</label>
				<input type="text" class="form-control" placeholder="">
              </div>
              <div class="col-sm-6">
                <button type="submit" class="btn btn-primary btn-block">RESEND OTP</button>
              </div>
            </form>
      </div>
    </div>
  </div>
</div>
<!--=================================
model end-->
<script>
    // document.addEventListener("DOMContentLoaded", function (event) {
    //     var scrollpos = sessionStorage.getItem('scrollpos');
    //     if (scrollpos) {
    //         window.scrollTo(0, scrollpos);
    //         sessionStorage.removeItem('scrollpos');
    //     }
    // });

    // window.addEventListener("beforeunload", function (e) {
    //     sessionStorage.setItem('scrollpos', window.scrollY);
    // });


    
    // $(window).scroll(function() {
  // sessionStorage.scrollTop = $(this).scrollTop();
// });

// $(document).ready(function() {
  // if (sessionStorage.scrollTop != "undefined") {
    // $(window).scrollTop(sessionStorage.scrollTop);
  // }
// });
</script>

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
  $(document).ready(function(){
    $("html,body").scrollTop(0);
});
</script> 
  
  
  
<script type="text/javascript">

$(document).ready(function(){

$('#mobileform').on('submit', function(event){
 event.preventDefault();
 $.ajax({
  url:"<?php echo base_url(); ?>chloonline/ordertrack",
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
    if(data.mob_error != '')
    {
     $('#mob_error').html(data.mob_error);
    }
    else
    {
     $('#mob_error').html('');
    }
    
   }
   if(data.success)
   {
    
    $('#mob_error').html('');
    $('#trackordermodel').modal('hide');
	  $('#otpscreem-order').modal('show');

   }
 
  }
 })
});

});

</script>


<script type="text/javascript">

$(document).ready(function(){

$('#otpform').on('submit', function(event){
 event.preventDefault();
 $.ajax({
  url:"<?php echo base_url(); ?>chloonline/orderotp",
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
	  $('#otpscreem-order').modal('hide');
    window.location = '<?php echo base_url(); ?>chloonline/orderHistory';
   }
 
  }
 })
});

});

</script>
</body>

</html>
