<style>
.bootstrap-tagsinput span{
    background: #0a1f25;
    padding: 3px;
    border-radius: 10px !important;
}
.bootstrap-tagsinput{
    width:100%;
}
.bootstrap-tagsinput input{
    height: calc(1.3em + .5rem + 2px);
    padding: .25rem .5rem;
    font-size: .875rem;
    line-height: 1.5;
    border-radius: .2rem;
}
</style>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Account Add/Edit</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('mapp/Account') ?>" class="btn btn-sm btn-secondary">Back</a>
    </div>
</div>
<div class="text-danger"><?php echo validation_errors(); ?></div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype='multipart/form-data' >
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="hidden" id="edit-account-id" value="<?php echo $record->account_details_id; ?>">
                            <label for="qr_code_image">QR Code Image</label>
                            <input type="file" name="qr_code_image" id="qr_code_image" value="<?php if(!empty(set_value('qr_code_image'))){ echo set_value('qr_code_image'); }elseif(isset($record->qr_code_image)){ echo $record->qr_code_image; } ?>"class="form-control"/>
                            <small class="text-danger" id="qr_code_image_error"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="UPI_id">UPI ID</label>
                            <input type="hidden" id="upi-id" value="">
                            <input type="text" name="upi_id" class="form-control" value="<?php if(!empty(set_value('upi_id'))){ echo set_value('upi_id'); }elseif(isset($record->upi_id)){ echo $record->upi_id; } ?>" id="upi_id" placeholder="UPI Id" />
                            <small class="text-danger" id="upi_id_error"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="bank_name">Bank Name</label>
                            <input type="hidden" id="bank-name" value="">
                            <input type="text" name="bank_name" class="form-control" value="<?php if(!empty(set_value('bank_name'))){ echo set_value('bank_name'); }elseif(isset($record->bank_name)){ echo $record->bank_name; } ?>" id="bank_name" placeholder="Bank Name" />
                            <small class="text-danger" id="bank_name_error"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="account_holder_name">Account holder Name</label>
                            <input type="hidden" id="account-holder-name" value="">
                            <input type="text" name="account_holder_name" class="form-control" value="<?php if(!empty(set_value('account_holder_name'))){ echo set_value('account_holder_name'); }elseif(isset($record->account_holder_name)){ echo $record->account_holder_name; } ?>" id="account_holder_name" placeholder="Account Holder Name" />
                            <small class="text-danger" id="account_holder_name_error"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="bank_account_no">BankAccount No.</label>
                            <input type="hidden" id="bank-name" value="">
                            <input type="text" name="bank_account_no" class="form-control" value="<?php if(!empty(set_value('bank_account_no'))){ echo set_value('bank_account_no'); }elseif(isset($record->bank_account_no)){ echo $record->bank_account_no; } ?>" id="bank_account_no" placeholder="Bank Account Number" />
                            <small class="text-danger" id="bank_account_no_error"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="IFSC_code">IFSC Code</label>
                            <input type="hidden" id="ifsc-code" value="">
                            <input type="text" name="ifsc_code" class="form-control" value="<?php if(!empty(set_value('ifsc_code'))){ echo set_value('ifsc_code'); }elseif(isset($record->ifsc_code)){ echo $record->ifsc_code; } ?>" id="ifsc_code" placeholder="IFSC code" />
                            <small class="text-danger" id="ifsc_code_error"></small>
                        </div>
                    </div>
                    <button type="button" onclick="submit_form1()" class="btn btn-primary">Save Detail</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="processing-model" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Processing....</h5>
      </div>
      <div class="modal-body text-center">
            <div id="loader-body">
            </div>
      </div>
    </div>
  </div>
</div>
<script>
    function AppenColorPicker(){
        var html='<div class="row mt-2">'+
                    '<div class="col-md-10">'+
                        '<input type="color"  name="product_color[]" class="d-inline form-control"/>'+
                    '</div>'+
                    '<button class="d-inline btn btn-danger" onclick="this.parentNode.parentNode.removeChild(this.parentNode)">Del</button>'+
                '</div>';
        document.getElementById("color_field").insertAdjacentHTML('afterend',html);
    }
    function AppendHighlights(){
        var html='<div class="row mt-2">'+
                    '<div class="col-md-10">'+
                        '<input type="text"  name="product_highlight[]" class="d-inline form-control"/>'+
                    '</div>'+
                    '<button class="d-inline btn btn-danger" onclick="this.parentNode.parentNode.removeChild(this.parentNode)">Del</button>'+
                '</div>';
        document.getElementById("highlight_field").insertAdjacentHTML('afterend',html);
    }
    function submit_form1(){
    "use strict";
       // console.log($('#multiple').val());
     
    $('#qr_code_image_error').html('');
    $('#upi_id_error').html('');
    $('#bank_name_error').html('');
    $('#account_holder_name_error').html('');
    $('#bank_account_no_error').html('');
    $('#ifsc_code_error').html('');
    
    
    if($('#qr_code_image').val()==''){
        $('#qr_code_image_error').html('The QR code Image field is Required.');
        return false;
    }
    if($('#upi_id').val()==''){
        $('#upi_id_error').html('The Upi ID field is Required.');
        return false;
    }
    if($('#bank_name').val()==''){
        $('#bank_name_error').html('The Bank Name field is Required.');
        return false;
    }
    if($('#account_holder_name').val()==''){
        $('#account_holder_name_error').html('The Account Holder Name field is Required.');
        return false;
    }
    if($('#bank_account_no').val()==''){
        $('#bank_account_no_error').html('The Bank Account field is Required.');
        return false;
    }
    
    if($('#ifsc_code').val()==''){
        $('#ifsc_code_error').html('The Ifsc Code field is Required.');
        return false;
    }
    // if($('#edit-product-id').val()==""){
    //     var product_image_=$('[name="product_image"]');
    //     if(product_image_.val()==""){
    //         $('#product_image_error').html('The Product Image field is required.');
    //         return false;
    //     }else{
    //         var ext = product_image_.val().split('.').pop().toLowerCase();
    //         if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
    //             $('#product_image_error').html('Only png,jpg,jpeg file Allowed');
    //             return false;
    //         } 
    //     }
    // }
    
    var url='<?php echo site_url('mapp/Account/edit/'); ?>'+$('#edit-account-id').val();
    var formData = new FormData();
    formData.append('upi_id',$('#upi_id').val());
    formData.append('bank_name',$('#bank_name').val());
    formData.append('account_holder_name',$('#account_holder_name').val());
    formData.append('bank_account_no',$('#bank_account_no').val());
    formData.append('account_holder_name',$('#account_holder_name').val());
    formData.append('ifsc_code',$('#ifsc_code').val());
    var qr_code_image_ =document.getElementById("qr_code_image").files;
    if(qr_code_image_.length>0){
        formData.append('qr_code_image',qr_code_image_[0]);
    }
    for (var pair of formData.entries()) {
    console.log(pair[0]+ ', ' + pair[1]); 
}
    //  var similar_product_id=document.getElementsByName("similar_product_id[]");
 
    // if(similar_product_id.length>0){
    //     for (var i = 0; i <similar_product_id.length; i++) {
    //         formData.append('similar_product_id[]',similar_product_id[i].value);
    //     }
    // }
    
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
                window.location.href='<?php echo site_url('mapp/Account'); ?>'
            }else{
                setTimeout(function(){ 
                    $('#processing-model').modal('hide');
                    if(response.message == "The UPI ID field must contain a unique value."){
                        alert("The UPI id already exists");
                    }
                    else if(response.message == "The Bank Account Number field must contain a unique value."){
                        alert("Bank Account Number Already exists");
                    }else{
                    alert(response.message);
                    }
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
   
</script>