<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url("favicon.ico"); ?>">

    <title>Dashboard</title>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url("assets/css/admin.css"); ?>" rel="stylesheet">
     <link href="<?php echo base_url("assets/css/custom.css"); ?>" rel="stylesheet">

    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
  </head>

  <body>
  <div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <a href="#">Texcutive</a>
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="sidebar-header">
                <!--div class="user-pic">
                    <?php //$uravatar=$this->session->userdata('avatar'); ?>
                    <img class="img-responsive img-rounded" src="<?php //echo UPLOADS_URL."profile/".$uravatar; ?>" alt="User picture" />
                </div-->
                 <?php $user=isAdmin(); ?>
                <div class="user-info">
                    <span class="user-name">
                        
                        <strong><?php echo substr($this->session->userdata('display_name'),0,15); ?></strong>
                    </span>
                    <span class="user-role"> <?php echo $this->session->userdata('phone'); ?></span>
                    <span class="">
                    <a href="<?php echo site_url("user/editprofile"); ?>">
                            Edit Profile
                        </a>
                      
                    </span>
                </div>
            </div>
            <!-- sidebar-header  -->
            <!--div class="sidebar-search">
                <div>
                    <div class="input-group">
                        <input type="text" class="form-control search-menu" placeholder="Search..." />
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div-->
            <!-- sidebar-search  -->
            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu">
                        <span>General</span>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="<?php echo site_url('dashboard'); ?>">
                            <i class="fa fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                            
                        </a>
                        
                    </li>
                  
                      <?php  if(!isset($user->permission['shop'])){ ?> 
                    <li class="sidebar-dropdown">
                        <a href="<?php echo site_url('device'); ?>">
                            <i class="fa fa-tachometer-alt"></i>
                            <span>Device Manager</span>
                            
                        </a>
                        
                    </li>
                   
                    <?php } ?>
                    
                    <?php  if(isset($user->permission['chaloonline'])){ ?> 
                     
                    <li class="sidebar-dropdown">
                        <a href="<?php echo site_url('chaloonline'); ?>">
                            <i class="fa fa-tachometer-alt"></i>
                            <span>chaloonline</span>
                        </a>
                   
                      </li>     
                       <?php   } ?>

                       <?php  if(isset($user->permission['qrcodewallet'])){ ?> 
                     
                     <li class="sidebar-dropdown">
                         <a href="<?php echo site_url('qrcodewallet'); ?>">
                             <i class="fa fa-tachometer-alt"></i>
                             <span>Qrcode Wallet</span>
                         </a>
                    
                       </li>     
                        <?php   } ?>


                     
                     
                     <li class="sidebar-dropdown">
                         <a href="<?php echo site_url('solution-tracker'); ?>">
                             <i class="fa fa-tachometer-alt"></i>
                             <span>Solution Tracker</span>
                         </a>
                    
                       </li>  
                       <li class="sidebar-dropdown">
                         <a href="<?php echo site_url('attendance'); ?>">
                             <i class="fa fa-tachometer-alt"></i>
                             <span>Attendance</span>
                         </a>
                    
                       </li>     
                      
                   
                    <?php  if(isset($user->permission['tree'])){ ?> 
                     
                    <li class="sidebar-dropdown">
                        <a href="<?php echo site_url('tree'); ?>">
                            <i class="fa fa-tachometer-alt"></i>
                            <span>Sales Channel</span>
                        </a>
                   
                      </li>     
                       <?php   } ?>

        <?php if($_SESSION['customer_type'] == '1' || $_SESSION['customer_type'] == '3') { ?>
        
        
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>Shopping</span>
                            <!--span class="badge badge-pill badge-danger">3</span-->
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                
                                 <li>
                                    <a href="<?php echo site_url('mapp/category'); ?>">Categories</a>
                                </li> 
                                <li>
                                    <a href="<?php echo site_url('mapp/brand'); ?>">Brands</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('mapp/product'); ?>">Products</a>
                                </li>
                                 <li>
                                    <a href="<?php echo site_url('mapp/order'); ?>">Orders</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('mapp/image'); ?>">images</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('mapp/slider'); ?>">Slider</a>
                                </li>
                                 <li>
                                    <a href="<?php echo site_url('mapp/logo'); ?>">Logo</a>
                                </li>
                                 <li>
                                    <a href="<?php echo site_url('mapp/shopname'); ?>">Shop Name</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('mapp/Account'); ?>">Accounts</a>
                                </li>
                                 <li>
                                    <a href="<?php echo site_url('mapp/txn_history'); ?>">Txn history(online/wallet)</a>
                                </li>
                                 <li>
                                    <a href="<?php echo site_url('mapp/help_enquiry'); ?>">Help Enquiry</a>
                                </li>
                            </ul>
                        </div>
                    </li>
 <?php  } ?>
 
                        <?php /* if($_SESSION['customer_type'] !== '1' || $_SESSION['customer_type'] == '3') {  ?>
                      <li class="sidebar-dropdown">
                        <a href="<?php echo site_url('mapp/enquiry'); ?>">
                            <i class="fa fa-tachometer-alt"></i>
                            <span>Shop Enquiry</span>
                            
                        </a>
                        
                    </li>
                    <?php } */ ?>
                    
                    
                     <?php  if(isset($user->permission['appenquiry'])){ ?> 
                     
                    <li class="sidebar-dropdown">
                        <!--<a href="<?php echo site_url('mapp/enquiry'); ?>">-->
                        <!--    <i class="fa fa-tachometer-alt"></i>-->
                        <!--    <span>App enquiry</span>-->
                        <!--</a>-->
                        
                        
                       
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>App Enquiry</span>
                            <!--span class="badge badge-pill badge-danger">3</span-->
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                
                                 <li>
                                    <a href="<?php echo site_url('mapp/enquiry'); ?>">App enquiry</a>
                                </li> 
                                <li>
                                    <a href="<?php echo site_url('mapp/template'); ?>">Template</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('mapp/permission_section'); ?>">Permission Sections</a>
                                </li>
                               
                               
                            </ul>
                        </div>
                    
                        
                        
                    <?php   } ?>
                      </li>     
                    
                    <?php  if(isset($user->permission['customer'])){ ?>                    
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>Personal</span>
                            <!--span class="badge badge-pill badge-danger">3</span-->
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="<?php echo site_url('customer/referrals'); ?>">My Referral </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('customer/referrals?ids=&kyc_status=all&membership_status=paid'); ?>">Paid Users </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('customer/referrals?ids=&kyc_status=all&membership_status=free'); ?>">Unpaid Users </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('customer/referrals?ids=&kyc_status=all&membership_status=expired'); ?>">Expired Users </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('customer/wallet'); ?>">My Wallet </a>
                                </li>                                 
                            </ul>
                        </div>
                    </li>
                    <?php } ?>



                    <?php  if(isset($user->permission['chowkidar'])){ ?>                    
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>Chowkidar</span>
                            <!--span class="badge badge-pill badge-danger">3</span-->
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="<?php echo site_url('chowkidar'); ?>">Locked Device</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('chowkidar/membership'); ?>">Membership</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('customer/referrals?ids=&kyc_status=all&membership_status=free'); ?>">Unpaid Users </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('customer/referrals?ids=&kyc_status=all&membership_status=expired'); ?>">Expired Users </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('customer/wallet'); ?>">My Wallet </a>
                                </li>                                 
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                    
                    
                    <?php  if(1){ ?>                    
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>Delivery Manager</span>
                            <!--span class="badge badge-pill badge-danger">3</span-->
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="<?php echo site_url('delivery'); ?>">Listing</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('delivery/charges'); ?>">Charges</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('delivery/Vehicle'); ?>">Vehicles</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('delivery/Drivers'); ?>">Drivers</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('delivery/category'); ?>">Category</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('delivery/package'); ?>">Packages</a>
                                </li>
                             
                                </li>                                 
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                    <?php  if(isset($user->permission['user'])){ ?>                    
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>Stand By Phone</span>
                            <!--span class="badge badge-pill badge-danger">3</span-->
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="<?php echo site_url('Standbyphone/membership'); ?>">Membership</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('Standbyphone'); ?>">Request</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('Standbyphone/package'); ?>">Package</a>
                                </li>
                                
                             
                                </li>                                 
                            </ul>
                        </div>
                    </li>
                    <?php } ?>

                    <?php  //if(isset($user->permission['sales'])){ ?>    
                     <?php  if(!isset($user->permission['shop'])){ ?> 
                     
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>Stock Report</span>
                            <!--span class="badge badge-pill badge-danger">3</span-->
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="<?php echo site_url('sales'); ?>">My Stock</a>
                                </li>                             
                                <li>
                                    <a href="<?php echo site_url('sales/request'); ?>">Request stock</a>
                                </li>                                 
                            </ul>
                        </div>
                    </li>
                    <?php  } ?>
                   
                   <?php  if(isset($user->permission['user'])){ ?>
                    
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>User Management</span>
                            <!--span class="badge badge-pill badge-danger">3</span-->
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="<?php echo site_url('user'); ?>">Users </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('user/groups'); ?>">groups</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('user/roles'); ?>">Roles</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('user/luckyNumbers'); ?>">Lucky Numbers </a>
                                </li>
                               
                            </ul>
                        </div>
                    </li>
                    <?php  if(isset($user->permission['wallet'])){ ?>                    
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>Wallet Management</span>
                            <!--span class="badge badge-pill badge-danger">3</span-->
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="<?php echo site_url('wallet'); ?>">Transaction</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('customer/wallet'); ?>">Add Money </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('customer/wallet?'); ?>">Add Money </a>
                                </li>   
                                                          
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                    <?php } ?>
                    <?php  if(isset($user->permission['dmt'])){ ?>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>DMT Management</span>
                            <!--span class="badge badge-pill badge-danger">3</span-->
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="<?php echo site_url('wallet'); ?>">All Transaction </a>
                                </li>
                                
                               
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                   
                    <li>
                        <a href="<?php echo site_url("auth/logout"); ?>">
                            <i class="fa fa-lock"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
        <div class="sidebar-footer">
            <a href="#">
                <i class="fa fa-bell"></i>
                <span class="badge badge-pill badge-warning notification">3</span>
            </a>
            <a href="#">
                <i class="fa fa-envelope"></i>
                <span class="badge badge-pill badge-success notification">7</span>
            </a>
            <a href="#">
                <i class="fa fa-cog"></i>
                <span class="badge-sonar"></span>
            </a>
            <a href="#">
                <i class="fa fa-power-off"></i>
            </a>
        </div>>
    </nav>
    <!-- sidebar-wrapper  -->
    <main class="page-content" style="background: #f7f7f7 !important;">
        <div class="container-fluid">
            
            <?php $this->load->view($content); ?>

            <footer class="text-center">
                <div class="mb-2">
                    <small>
                        © 2020 made with <i class="fa fa-heart" style="color: red;"></i> by -
                        <a target="_blank" rel="noopener noreferrer" href="#">
                            SMTGROUP
                        </a>
                    </small>
                </div>
                
            </footer>
        </div>
    </main>
    <!-- page-content" -->
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>   
    <script src="<?php echo base_url("assets/datatable/datatables.min.js"); ?>"></script>      
    <script src="<?php echo base_url("assets/js/push.min.js"); ?>"></script>   
    <script src="<?php echo base_url("assets/js/serviceWorker.min.js"); ?>"></script> 
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    
     <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script>
     $("#multiple").select2({
              placeholder: "Select Valid Days",
              allowClear: true
          });
    </script> 

    <script>

    /*$(document).ready( function () {
        //$('.makedatatable').DataTable();

        $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        })

    } );*/


    //   $('.date-time-picker').datetimepicker({
    //         uiLibrary: 'bootstrap4',
    //         modal: true,
    //         footer: true            
    //     });

    //     $('.datepicker').datepicker({
    //         uiLibrary: 'bootstrap4',
    //         format: 'dd-mm-yyyy',
    //     });
    //     $('.startdate').datepicker({
    //         uiLibrary: 'bootstrap4',
    //         format: 'dd-mm-yyyy',
    //     });
    //     $('.enddate').datepicker({
    //         uiLibrary: 'bootstrap4',
    //         format: 'dd-mm-yyyy',
    //     });

      function confirmAlert(redirect){
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
              window.location =redirect;
          } else {
            swal("Your imaginary file is safe!");
          }
        });
      }  

      jQuery(function ($) {

$(".sidebar-dropdown > a").click(function() {
$(".sidebar-submenu").slideUp(200);
if (
$(this)
  .parent()
  .hasClass("active")
) {
$(".sidebar-dropdown").removeClass("active");
$(this)
  .parent()
  .removeClass("active");
} else {
$(".sidebar-dropdown").removeClass("active");
$(this)
  .next(".sidebar-submenu")
  .slideDown(200);
$(this)
  .parent()
  .addClass("active");
}
});

$("#close-sidebar").click(function() {
$(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
$(".page-wrapper").addClass("toggled");
});




});


function submit_form(){
    "use strict";
    $('#category_id_error').html('');
    $('#product_name_error').html('');
    $('#product_mrp_error').html('');
    $('#product_sp_error').html('');
    $('#product_qty_error').html('');
    $('#product_type_error').html('');
    $('#product_image_error').html('');
    $('#product_detail_error').html('');
    $('#product_size_error').html('');
    $('#product_gallery_error').html('');
    if($('#category_id').val()==''){
        $('#category_id_error').html('The Category field is Required.');
        return false;
    }
    if($('#product_name').val()==''){
        $('#product_name_error').html('The Product Name field is Required.');
        return false;
    }
    if($('#product_mrp').val()==''){
        $('#product_mrp_error').html('The Product Mrp field is Required.');
        return false;
    }
    if($('#product_sp').val()==''){
        $('#product_sp_error').html('The Product Selling price field is Required.');
        return false;
    }
    if($('#product_qty').val()==''){
        $('#product_qty_error').html('The Product Qty field is Required.');
        return false;
    }
    if($('#product_type').val()==''){
        $('#product_type_error').html('The Product Type field is Required.');
        return false;
    }
    if($('#product_detail').val()==''){
        $('#product_detail_error').html('The Product Detail field is Required.');
        return false;
    }
    if($('#edit-product-id').val()==""){
        var product_image_=$('[name="product_image"]');
        if(product_image_.val()==""){
            $('#product_image_error').html('The Product Image field is required.');
            return false;
        }else{
            var ext = product_image_.val().split('.').pop().toLowerCase();
            if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
                $('#product_image_error').html('Only png,jpg,jpeg file Allowed');
                return false;
            } 
        }
    }
    var product_gimage_ =document.getElementById("gallery_image").files;
    if(product_gimage_.length>0){
        var iserror=true;
        for (var i = 0; i <product_gimage_.length; i++) {
            var ext = product_gimage_[i].name.split('.').pop().toLowerCase();
            if(ext){
                if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
                    $('#product_gallery_error').html('Only png,jpg,jpeg file Allowed');
                    iserror=false;
                }
            }
        }
        if(iserror==false){
            return false;
        }
    }
    var url='<?php echo site_url('mapp/product/add'); ?>';
    if($('#edit-product-id').val()!=""){
        var url='<?php echo site_url('mapp/product/edit/'); ?>'+$('#edit-product-id').val();
    }
    var formData = new FormData();
    formData.append('category_id',$('#category_id').val());
    formData.append('product_name',$('#product_name').val());
    formData.append('product_mrp',$('#product_mrp').val());
    formData.append('product_sp',$('#product_sp').val());
    formData.append('product_qty',$('#product_qty').val());
    formData.append('product_type',$('#product_type').val());
    formData.append('product_size',$('#product_size').val());
    formData.append('product_detail',$('#product_detail').val());
      formData.append('brand_id',$('#brand_id').val());
       formData.append('home_display',$('#home_display').val());
   formData.append('similar_product_id[]',$('#multiple').val());
    
    var product_color=document.getElementsByName('product_color[]');
    if(product_color.length>0){
        for (var i = 0; i <product_color.length; i++) {
            formData.append('product_color[]',product_color[i].value);
        }
    }
    var product_highlight=document.getElementsByName('product_highlight[]');
    if(product_highlight.length>0){
        for (var i = 0; i <product_highlight.length; i++) {
            formData.append('product_highlight[]',product_highlight[i].value);
        }
    }
    //  var similar_product_id=document.getElementsByName("similar_product_id[]");
 
    // if(similar_product_id.length>0){
    //     for (var i = 0; i <similar_product_id.length; i++) {
    //         formData.append('similar_product_id[]',similar_product_id[i].value);
    //     }
    // }

    var product_image_ =document.getElementById("product_image").files;
    if(product_image_.length>0){
        formData.append('product_image',product_image_[0]);
    }
    var product_gimage_ =document.getElementById("gallery_image").files;
    if(product_gimage_.length>0){
        for (var i = 0; i <product_gimage_.length; i++) {
            console.log(product_gimage_[i]);
            formData.append('gallery_image[]',product_gimage_[i]);
        }
    }
    var html='<div class="progress" style="height: 40px;">'+
            '<div style="font-size: 30px;" class="documentbar progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">'+
                '0%'+
            '</div>'+
            '<div id="status"></div>'+
        '</div>';
    $('#loader-body').html(html);
    $('#processing-model').modal('show');
    var bar= $('.documentbar');
    var percent= $('.documentbar');
    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function (request, xhr) {
            var percentVal = '0%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        success: function(response) {
            console.log(response);
            if(response.status=='success'){
                window.location.href='<?php echo site_url('mapp/product'); ?>'
            }else{
                setTimeout(function(){ 
                    $('#processing-model').modal('hide');
                    alert(response.message);
                }, 500);
            }        
        },
        xhr: function(){
             var xhr = $.ajaxSettings.xhr() ;
             xhr.upload.onprogress = function(data){
                var perc = Math.round((data.loaded / data.total) * 100);
                console.log(perc);
                if(perc>=100){
                    var html='<div class="spinner-border text-dark" role="status">'
                        '<span class="sr-only">Loading...</span>'+
                    '</div>';
                    $('#loader-body').html(html);
                }else{
                    $('.documentbar').text(perc + '%');
                    $('.documentbar').css('width',perc + '%');
                }
             };
             return xhr ;
        },
    });
}      
function deleteGalleryModel(galleryId,objectName){
    var html='<input type ="hidden" id="delete-image-id" value="'+galleryId+'">'+
            '<input type ="hidden" id="delete-image-object" value="'+objectName+'">'+
            '<a href="javascript:void(0)" onclick="deleteGallery()"  class="btn btn-danger">Yes</a>'+
            '<button type="button"  data-dismiss="modal" class="btn btn-primary">Close</button>';
    $('#delete-model-footer').html(html);
    $('#delete-model-footer').css('display','');
    $('#delete-model-progress').html('Are you sure you want to delete this file permanently ?');
    $('#delete-gallery-model').modal('show');
}
function deleteGallery(){
    var imageid= $('#delete-image-id').val();
    var object= $('#delete-image-object').val();
    $('#delete-model-footer').css('display','none');
    var html='<div class="spinner-border text-dark" role="status">'
                        '<span class="sr-only">Loading...</span>'+
                    '</div>';
    $('#delete-model-progress').html(html);
    $.ajax({
        type: "POST",
        dataType:'json',
        url: "<?php echo site_url('mapp/product/delete_gallery_image'); ?>",
        data: {
            'id':imageid,'object':object
        },
        success: function(response) {
            $('#delete-gallery-model').modal('hide');
            if(response.status=='success'){
                $('#gallery-'+imageid).remove();
            }else{
                alert('Something Wrong');
            }
        }
    });
}
function ChangeStatus(id,status){
    $.ajax({
        type: "POST",
        dataType:'json',
        url: "<?php echo site_url('mapp/product/change_status'); ?>",
        data: {
            'id':id,'status':status
        },
        success: function(response) {
            
        }
    });
}


function ChangeOrderDetailStatus(id,status){
    $.ajax({
        type: "POST",
        dataType:'json',
        url: "<?php echo site_url('mapp/order/changeOrderDetailStatus'); ?>",
        data: {
            'id':id,'status':status
        },
        success: function(response) {
            console.log(response)
        }
    });
}


function ChangeOrderStatus(id,status){
    $.ajax({
        type: "POST",
        dataType:'json',
        url: "<?php echo site_url('mapp/order/ChangeOrderStatus'); ?>",
        data: {
            'id':id,'status':status
        },
        success: function(response) {
            console.log(response)
        }
    });
}
function ChangePaymentStatus(id,status){
    $.ajax({
        type: "POST",
        dataType:'json',
        url: "<?php echo site_url('mapp/order/ChangePaymentStatus'); ?>",
        data: {
            'id':id,'status':status
        },
        success: function(response) {
            console.log(response)
        }
    });
}
function CheckUser(){
    var phone = $("#phone").val();
    var user_id = $("#user_id").val();
    var payment_received = $("#payment_received").val();
    var payment_due = $("#payment_due").val();
    var incentive = $("#incentive").val();
    var total = $("#total").val();
    $.ajax({
        type: "POST",
       // dataType:'json',
        url: "<?php echo site_url('chaloonline/check_user'); ?>",
        data: {
            'phone':phone,
            'user_id' : user_id,
            'payment_received' : payment_received,
            'payment_due' : payment_due,
            'incentive' : incentive,
            'total' : total
        },
        success: function(response) {
            
             $("#user-info").html(response);
              SubUser(user_id);
            
        }
    });
   
}
function UpdateDetail(){
    var map_id = $("#edit_map_id").val();
    var user_id = $("#edit_user_id").val();
    var child_user_id = $("#edit_child_user_id").val();
    var payment_received = $("#edit_payment_received").val();
    var payment_due = $("#edit_payment_due").val();
    var incentive = $("#edit_incentive").val();
    var total = $("#edit_total").val();
    $.ajax({
        type: "POST",
       // dataType:'json',
        url: "<?php echo site_url('chaloonline/update_detail'); ?>",
        data: {
            'map_id' : map_id,
            'user_id' : user_id,
            'child_user_id' : child_user_id,
            'payment_received' : payment_received,
            'payment_due' : payment_due,
            'incentive' : incentive,
            'total' : total
        },
        success: function(response) {
            
             $("#update_user-info").html(response);
             
            
        }
    });
   
}
function SubUser(usersid){

    $.ajax({
        type: "POST",
       // dataType:'json',
        url: "<?php echo site_url('chaloonline/sub_users/'); ?>",
        data: {
            'user_id' : usersid
        },
        success: function(response) {
            
             $("#sub-user-div").html(response);
            
        }
    });
}
 function copyToClipboard(elementId) {
     console.log(document.getElementById(elementId).innerHTML)
var aux = document.createElement("input");
aux.setAttribute("value", document.getElementById(elementId).innerHTML);
document.body.appendChild(aux);
aux.select();
document.execCommand("copy");
document.body.removeChild(aux);
   //alert('copied successfully')
}
function toggle(check_all) {
  checkboxes = document.getElementsByName('check_all');
  var selectedItems=[];
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = check_all.checked;
    // //selectedItems+=checkboxes[i].value+"\n";
    // selectedItems.push(checkboxes[i].value);
  }
 
}
</script>

<script>
function toggle(check_all) {
  checkboxes = document.getElementsByName('check_all');
  var selectedItems=[];
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = check_all.checked;
    // //selectedItems+=checkboxes[i].value+"\n";
    // selectedItems.push(checkboxes[i].value);
  }
  //console.log(selectedItems);
//  document.getElementById("user_ids").value = selectedItems.join(",");
//  value = document.getElementById("user_ids").value;
 ///console.log(value);
}
$(document).ready(function(){

  $('.checkboxes').on("click",function(){
    let input = $(':checked');
  
    if(input.length > 0){
      arr = [];
      input.each(function(){
         
        arr.push($(this).val());
      })
    }
   //  console.log(arr)
    let a = arr.join(",");
    let b = a.slice(1);
   // console.log(a)
    $('#user_ids').val(b);
    console.log($('#user_ids').val());
  })
})

</script>

<script type="text/javascript">
<?php if($this->session->flashdata('success')){ ?>
    toastr.success("<?php echo $this->session->flashdata('success'); ?>");
<?php }else if($this->session->flashdata('error')){  ?>
    toastr.error("<?php echo $this->session->flashdata('error'); ?>");
<?php }else if($this->session->flashdata('warning')){  ?>
    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
<?php }else if($this->session->flashdata('info')){  ?>
    toastr.info("<?php echo $this->session->flashdata('info'); ?>");
<?php } ?>

</script>


  </body>
</html>

