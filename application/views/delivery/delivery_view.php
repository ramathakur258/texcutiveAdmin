<style>

    .pricebox{
        background-color: rgba(42,120,187,.08);
    padding: 10px 45px;
    display: inline-block;
    border-radius: 8px;
    
    font-weight: bold;
    }
    /* input {
  outline: 0;
  border-width: 0 0 2px;
  border-color: grey
}
input:focus {
  border-color: black
} */

.form-control {
    border:none;
    border-bottom: 1px solid grey;
    padding: 5px 10px;
    outline: none;
 }

[placeholder]:focus::-webkit-input-placeholder {
    transition: text-indent 0.4s 0.4s ease; 
    text-indent: -100%;
    opacity: 1;
 }
</style>
   <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:400,500"
      rel="stylesheet"
    />

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Delivery Details</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('delivery') ?>" class="btn btn-sm btn-secondary">Back</a>
    </div>
</div>
<?php echo validation_errors(); ?>
<?php if(isset($message)){ echo $message; } ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
            <h5 style="margin-bottom:25px;">User Information</h5>
                    <div class="form-row">
                       
                        <div class="form-group col-md-4">
                            <label for="user_name">User Name</label>
                            <input type="text" name="user_name" id="user_name"  class="form-control " value="<?php if(isset($delivery->user_name) && !empty($delivery->user_name)){ echo $delivery->user_name;}else{ echo "Admin"; } ?>"   disabled/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">User Email</label>
                            <input type="text" name="email"  id="email" class="form-control" value="<?php if(isset($delivery->email)  && !empty($delivery->email)){echo $delivery->email;}else{ echo "admin@gmail.com"; } ?> " disabled />
                            <div id="result"></div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="mobile">User Mobile No</label>
                            <input type="text" name="mobile"  id="mobile" class="form-control" value="<?php if(isset($delivery->mobile) && !empty($delivery->mobile)){echo $delivery->mobile;}else{ echo "0123456789"; } ?> " disabled />
                            <div id="result"></div>
                        </div>
                    </div>       
                    <h5 style="margin-bottom:25px;">Address Detail</h5>   
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="pick_up">Pick Up Address</label>
                            <input type="text" name="pick_up"  id="pick_up" class="form-control" value="<?php if(isset($delivery->pick_up)){echo $delivery->pick_up;} ?> "  disabled/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="source_lat">Pick Up Latitude</label>
                           <input type="text" name="source_lat" id="source_lat"  class="form-control " value="<?php if(isset($delivery->source_lat)){ echo $delivery->source_lat;} ?>"   disabled/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="source_long">Pick Up Longitude</label>
                            <input type="text" name="source_long"  id="source_long" class="form-control" value="<?php if(isset($delivery->source_long)){echo $delivery->source_long;} ?> "  disabled/>
                            <div id="result"></div>
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="pick_up_area">Pick Up Area</label>
                            <input type="text" name="pick_up_area"  id="pick_up_area" class="form-control" value="<?php if(isset($delivery->pick_up_area)){echo $delivery->pick_up_area;} ?> "  disabled/>
                            <div id="result"></div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="pick_up__apartment_houseno">pick up Apartment House No</label>
                            <input type="text" name="pick_up__apartment_houseno"  id="pick_up__apartment_houseno" class="form-control" value="<?php if(isset($delivery->pick_up__apartment_houseno)){echo $delivery->pick_up__apartment_houseno;} ?> "  disabled/>
                            <div id="result"></div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="pick_up_staircase">Pick Up Floor No</label>
                            <input type="text" name="pick_up_staircase"  id="pick_up_staircase" class="form-control" value="<?php if(isset($delivery->pick_up_staircase)){echo $delivery->pick_up_staircase;} ?> "  disabled/>
                            <div id="result"></div>
                        </div>
                    </div>
                    <div class="form-row">
                         <div class="form-group col-md-4">
                            <label for="destination_address">Drop Address</label>
                            <input type="text" name="drop"  id="drop" class="form-control" value="<?php if(isset($delivery->drop)){echo $delivery->drop;} ?> "  disabled/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="destination_lat">Drop Latitude</label>
                            <input type="text" name="destination_lat"  id="destination_lat" class="form-control" value="<?php if(isset($delivery->destination_lat)){echo $delivery->destination_lat;} ?>"   disabled/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="destination_long">Drop Longitude</label>
                            <input type="text" name="destination_long"  id="destination_long" class="form-control" value=" <?php if(isset($delivery->destination_long)){echo $delivery->destination_long;}?>"  disabled/>
                           
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="drop_area">Drop Area</label>
                            <input type="text" name="drop_area"  id="drop_area" class="form-control" value=" <?php if(isset($delivery->drop_area)){echo $delivery->drop_area;}?>"  disabled/>
                            <div id="result"></div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="drop_apartment_houseno">Drop Apartment House No</label>
                            <input type="text" name="drop_apartment_houseno"  id="drop_apartment_houseno" class="form-control" value=" <?php if(isset($delivery->drop_apartment_houseno)){echo $delivery->drop_apartment_houseno;}?>"  disabled/>
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="drop_staircase">Drop Floor No</label>
                            <input type="text" name="drop_staircase"  id="drop_staircase" class="form-control" value=" <?php if(isset($delivery->drop_staircase)){echo $delivery->drop_staircase;}?>"  disabled/>
                          
                        </div>
                        </div>
                    <h5 style="margin-bottom:25px;">Product Detail</h5> 
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="Width">Width(cm)</label>
                            <input type="text"  name="Width" id="Width" class="form-control" value="<?php  if(isset($delivery->d_width)){echo $delivery->d_width;} ?>"   disabled/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="height">Height(cm)</label>
                            <input type="text" name="height" id="height" class="form-control" value="<?php if(isset($delivery->d_height)){echo $delivery->d_height;} ?> "  disabled/>
                            <div id="result"></div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="length">Length(cm)</label>
                            <input type="text" name="length"   id="length" class="form-control" value="<?php if(isset($delivery->d_length)){echo $delivery->d_length;} ?>"   disabled/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="volume">Total Volume(cm cube)</label>
                            <input type="text"   id="volume"  class="form-control" readonly="readonly" value="<?php  echo $delivery->volume; ?>"   disabled/>
                        </div>
                    </div>
                    <div class="form-row">
                       <div class="form-group col-md-3">
                            <label for="d_weight">Weight</label>
                            <input type="text" name="d_weight"  id="d_weight" class="form-control" value=" <?php if(isset($delivery->d_weight)){echo $delivery->d_weight;} ?>"   disabled/>
                           
                        </div>
                        <div class="form-group col-md-3">
                            <label for="package_type">Package Type</label>
                            <input type="text" name="package_type"  id="package_type" class="form-control" value="<?php if(isset($delivery->package_type)){echo $delivery->package_type;} ?>"   disabled/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cat_name">Category</label>
                            <input type="text" name="cat_name"  id="cat_name" class="form-control" value="<?php if(isset($delivery->cat_name)){echo $delivery->cat_name;} ?>"   disabled/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="item_name">Item Name</label>
                            <input type="text" name="item_name"  id="item_name" class="form-control" value=" <?php if(isset($delivery->item_name)){echo $delivery->item_name;} ?>"   disabled/>
                        </div>
                    </div>
                    <div class="form-row">
                       

                        <div class="form-group col-md-3">
                            <label for="order_id">Order Id</label>
                            <input type="text" name="order_id"  id="invoice_no" class="form-control" value=" <?php if(isset($delivery->order_id)){echo $delivery->order_id;} ?>"  disabled/>
                           
                        </div>
                        <div class="form-group col-md-3">
                            <label for="package_value">Package Value</label>
                            <input type="text" name="package_value"  id="package_value" class="form-control" value=" <?php if(isset($delivery->package_value)){echo $delivery->package_value;} ?>"   disabled/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="qyt">Quantity</label>
                            
                            <input type="text" name="qyt"  id="qyt" class="form-control" value="<?php if(isset($delivery->qyt) && $delivery->qyt!=null){echo $delivery->qyt;}else{echo 1;} ?>"   disabled/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="status">status</label>
                            <input type="text" name="status"  id="status" class="form-control" value=" <?php if(isset($delivery->status) && $delivery->status == 4){echo "cancelled" ;}else if(isset($delivery->status) && $delivery->status == 0){ echo "ordered";}else if(isset($delivery->status) && $delivery->status == 1){ echo "Shipped";}else if(isset($delivery->status) && $delivery->status == 2){ echo "On The Way";}else if(isset($delivery->status) && $delivery->status == 3){ echo "Delivered";} ?>"   disabled/>
                        </div>
                    </div>
                    <div class="form-row">
                      
                      
                        <div class="form-group col-md-3">
                            <label for="updated_at">Order Date</label>
                            <input type="text" name="updated_at"  id="updated_at" class="form-control" value=" <?php if(isset($delivery->update_time)){ $date=str_replace("/","-",$delivery->update_time); echo $newDate=date("d-m-Y",strtotime($date)); } ?>"  disabled/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="transaction_id">Transaction Id</label>
                            <input type="text" name="transaction_id"  id="transaction_id" class="form-control" value=" <?php if(isset($delivery->transaction_id)){echo $delivery->transaction_id;} ?>"  disabled/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="transaction_date">Transaction Date</label>
                            <input type="text" name="transaction_date"  id="transaction_date" class="form-control" value=" <?php if(isset($delivery->transaction_date)){echo date("d-m-Y h:i:sa",strtotime($delivery->transaction_date));} ?>"  disabled/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="payment_status">Transaction Status</label>
                            <input type="text" name="payment_status"  id="payment_status" class="form-control" value=" <?php if(isset($delivery->payment_status)){echo $delivery->payment_status;} ?>"  disabled/>
                        </div>
                    </div>
                 
                      <input type="checkbox"  name="gift" value="1" <?php if(isset($delivery->gift) && $delivery->gift==true) echo "checked" ?> id="gift"   disabled>
                     <label  for="gift" >Gift </label><br>
                     <input type="checkbox"  name="urgent" value="10" <?php if(isset($delivery->urgent) && $delivery->urgent==true) echo "checked" ?> id="urgent"  disabled>
                    <label   for="urgent">Urgent Delivery</label><br>
                    <input type="checkbox"  name="delicate" value="20" <?php if(isset($delivery->delicate) && $delivery->delicate==true) echo "checked" ?> id="delicate" disabled>
                    <label   for="delicate">Delicate</label><br>
                    <input type="checkbox"  name="security_charge" value="1" <?php if(isset($delivery->security_charge) && $delivery->security_charge==true) echo "checked" ?> id="security_charge" disabled>
                    <label   for="delicate">Security Charge</label><br>

                    
                   <div class="col-sm-12 mb-2 " >
					      <div class="pricebox float-right"><large>Total price* </large> <br> <h3 class="mb-0"><b> ₹<?php if(isset($delivery->paid_amount)){echo $delivery->paid_amount	;} ?></div> </b></h3></div>	  
					  </div>
                    
                  
                   

            </div>
       
        </div>
    </div>
</div>
