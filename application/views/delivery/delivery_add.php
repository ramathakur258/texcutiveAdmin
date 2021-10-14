
<style>

.pricebox{
    background-color: rgba(42,120,187,.08);
padding: 10px 45px;
display: inline-block;
border-radius: 8px;

font-weight: bold;
}
</style>
<script  src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<link
  href="https://fonts.googleapis.com/css?family=Roboto:400,500"
  rel="stylesheet"
/>
<body >
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
<h1 class="h4"  >Delivery Add/Edit</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    
    <a href="<?php echo site_url('delivery') ?>" class="btn btn-sm btn-secondary">Back</a>
</div>
</div>

<?php if(isset($message)){ echo $message; } ?>
<div class="row">
<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
      <form action="<?php site_url('delivery/deliveryAdd');?>" method="post" enctype='multipart/form-data' >
                    <div class="form-row">
                    <div class="form-group col-md-6">
                     <label for="package_id">Package Type*</label>
                        <select type="text" class="form-control" id="package_id" name="package_id"   onchange="CalculateEstimate();"  tabIndex="1" autofocus>
                            <option value="" >Select package Type</option>
                            <?php foreach($package as $row){  ?>
                            <option value="<?php echo $row->packages_id; ?>" <?php if(!empty(set_select('package_id',$row->packages_id))){ echo set_select('package_id', $row->packages_id); }elseif(!empty($delivery->package_id) && $delivery->package_id == $row->packages_id)  {echo 'selected="selected"'; }  ?> > <?php echo $row->package_type;  ?> </option>
                            <?php }?>
                       </select>
                       <?php  echo form_error('package_id'); ?> 
                    </div>
                    <?php if( isset($delivery->package_id) && $delivery->package_id==6){   ?>
                    <div class="form-group col-md-6" id="div_weight"  >
                        <label for="d_weight">Weight</label>
                        <input type="text"  name="d_weight" id="d_weight"  class="form-control" value=" <?php if(isset($delivery->d_weight)){ echo $delivery->d_weight; } ?>"  onchange="CalculateEstimate();" />
                        <div id="result" style="color:red;"></div>
                    </div>
                    <?php }else{?>
                        <div class="form-group col-md-6"  id="div_weight" style="display:none;" >
                        <label for="d_weight">Weight</label>
                        <input type="text"  name="d_weight" id="d_weight"  class="form-control" value=" <?php if(isset($delivery->d_weight)){ echo $delivery->d_weight; } ?>"  onchange="CalculateEstimate();" />
                        <div id="result" style="color:red;"></div>
                    </div>
                        <?php }?>
                 </div>
                 <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="pick_up">Pick Up Address*</label>
                        <input type="text"  id="source_address" name="pick_up" onchange="CalculateEstimate();" class="form-control auto-complete" value="<?php if(!empty(set_value('pick_up'))){ echo set_value('pick_up'); }elseif(isset($delivery->pick_up) && !empty($delivery->pick_up) ){ echo $delivery->pick_up; } ?>"   tabIndex="2" />
                   
                    </div>
                    <div class="form-group col-md-3">
                        <label for="source_lat"> Source Lat*</label>
                        <input type="text" name="source_lat" id="source_lat" onchange="CalculateEstimate();"  class="form-control " value="<?php if(!empty(set_value('source_lat'))){ echo set_value('source_lat'); }elseif(isset($delivery->source_lat) && !empty($delivery->source_lat) ){ echo $delivery->source_lat; } ?>"   />
                        <?php  echo form_error('source_lat'); ?> 
                    </div>
                    <div class="form-group col-md-3">
                        <label for="source_long">Source Long*</label>
                        <input type="text" name="source_long"  id="source_long" onchange="CalculateEstimate();" class="form-control" value="<?php if(!empty(set_value('source_long'))){ echo set_value('source_long'); }elseif(isset($delivery->source_long) && !empty($delivery->source_long) ){ echo $delivery->source_long; } ?>"  />
                        <?php  echo form_error('source_long'); ?> 
                    </div>
                </div>
                <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="drop">Drop Address*</label>
                        <input type="text" name="drop" id="destination_address" onchange="CalculateEstimate();" class="form-control auto-complete" value="<?php if(!empty(set_value('drop'))){ echo set_value('drop'); }elseif(isset($delivery->drop) && !empty($delivery->drop) ){ echo $delivery->drop; } ?>"   tabIndex="3" />
                    </div>
                    <div class="form-group col-md-3">
                        <label for="destination_lat">Destination Lat*</label>
                        <input type="text" name="destination_lat"  id="destination_lat" onchange="CalculateEstimate();" class="form-control" value="<?php if(!empty(set_value('destination_lat'))){ echo set_value('destination_lat'); }elseif(isset($delivery->destination_lat) && !empty($delivery->destination_lat) ){ echo $delivery->destination_lat; } ?>"   />
                        <?php  echo form_error('destination_lat'); ?> 
                    </div>
                    <div class="form-group col-md-3">
                        <label for="destination_long">Destination Long*</label>
                        <input type="text" name="destination_long"  id="destination_long" onchange="CalculateEstimate();" class="form-control" value="<?php if(!empty(set_value('destination_long'))){ echo set_value('destination_long'); }elseif(isset($delivery->destination_long) && !empty($delivery->destination_long) ){ echo $delivery->destination_long; } ?>"  />
                        <?php  echo form_error('destination_long'); ?> 
                    </div>
                </div>
                <div class="form-row">
                  
                  <div class="form-group col-md-3">
                      <label for="pick_up_area">Pick Up Area*</label>
                      <input type="text" name="pick_up_area"  id="pick_up_area"  onchange="CalculateEstimate();" class="form-control" value="<?php if(!empty(set_value('pick_up_area'))){ echo set_value('pick_up_area'); }elseif(isset($delivery->pick_up_area) && !empty($delivery->pick_up_area) ){ echo $delivery->pick_up_area; } ?>" tabIndex="4"  />
                      <?php  echo form_error('pick_up_area'); ?> 
                    </div>
                  <div class="form-group col-md-3">
                      <label for="pick_up__apartment_houseno">Pick Up Apartment House No</label>
                      <input type="text" name="pick_up__apartment_houseno"  onchange="CalculateEstimate();" id="pick_up__apartment_houseno" class="form-control" value="<?php if(!empty(set_value('pick_up__apartment_houseno'))){ echo set_value('pick_up__apartment_houseno'); }elseif(isset($delivery->pick_up__apartment_houseno) && !empty($delivery->pick_up__apartment_houseno) ){ echo $delivery->pick_up__apartment_houseno; } ?>" tabIndex="5" />
                      <?php  echo form_error('pick_up__apartment_houseno'); ?> 
                    </div>
                 
                  
                  <div class="form-group col-md-3">
                      <label for="drop_area">Drop Area*</label>
                      <input type="text" name="drop_area"  id="drop_area" class="form-control"  onchange="CalculateEstimate();" value="<?php if(!empty(set_value('drop_area'))){ echo set_value('drop_area'); }elseif(isset($delivery->drop_area) && !empty($delivery->drop_area) ){ echo $delivery->drop_area; } ?>"  tabIndex="6" />
                      <?php  echo form_error('drop_area'); ?> 
                    </div>
                  <div class="form-group col-md-3">
                      <label for="drop_apartment_houseno">Drop Apartment House No*</label>
                      <input type="text" name="drop_apartment_houseno"  id="drop_apartment_houseno"  onchange="CalculateEstimate();" class="form-control" value="<?php if(!empty(set_value('drop_apartment_houseno'))){ echo set_value('drop_apartment_houseno'); }elseif(isset($delivery->drop_apartment_houseno) && !empty($delivery->drop_apartment_houseno) ){ echo $delivery->drop_apartment_houseno; } ?>" tabIndex="7" />
                      <?php  echo form_error('drop_apartment_houseno'); ?> 
                    </div>
              </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="d_width">Width(cm)*</label>
                        <input type="text"  name="d_width" id="d_width" class="form-control" value="<?php if(!empty(set_value('d_width'))){ echo set_value('d_width'); }elseif(isset($delivery->d_width) && !empty($delivery->d_width) ){ echo $delivery->d_width; } ?>"  onchange="CalculateEstimate();"  tabIndex="8"/>
                        <?php  echo form_error('d_width'); ?> 
                    </div>
                    <div class="form-group col-md-3">
                        <label for="d_height">Height (cm)*</label>
                        <input type="text" name="d_height" id="d_height" class="form-control" value="<?php if(!empty(set_value('d_height'))){ echo set_value('d_height'); }elseif(isset($delivery->d_height) && !empty($delivery->d_height) ){ echo $delivery->d_height; } ?>" onchange="CalculateEstimate();"  tabIndex="9"/>
                        <?php  echo form_error('d_height'); ?> 
                    </div>
                    <div class="form-group col-md-3">
                        <label for="d_length">Length (cm)*</label>
                        <input type="text" name="d_length"   id="d_length" class="form-control" value="<?php if(!empty(set_value('d_length'))){ echo set_value('d_length'); }elseif(isset($delivery->d_length) && !empty($delivery->d_length) ){ echo $delivery->d_length; } ?>"  onchange="CalculateEstimate();"  tabIndex="10"/>
                        <?php  echo form_error('d_length'); ?> 
                    </div>
                    <div class="form-group col-md-3">
                        <label for="volume">Total Volume(sq feet)*</label>
                        <input type="text"   id="volume" name="volume" readonly onchange="CalculateEstimate();" class="form-control"  value="<?php if(!empty(set_value('volume'))){ echo set_value('volume'); }elseif(isset($delivery->volume) && !empty($delivery->volume) ){ echo$delivery->volume; } ?>"  />
                    </div>
                </div>
                <div class="form-row">
                  
                    <div class="form-group col-md-3">
                        <label for="cate_id">Category*</label>
                        <select type="text" class="form-control"  name="cate_id"  onchange="CalculateEstimate();"  tabIndex="11">
                            <option value="" >Select Category</option>
                            <?php foreach($category as $row){  ?>
                            <option value="<?php  echo  $row->cat_id; ?>" <?php if(!empty(set_select('cate_id', $row->cat_id))){ echo set_select('cate_id', $row->cat_id); }elseif(!empty($delivery->cate_id) && $delivery->cate_id == $row->cat_id) {echo 'selected="selected"'; } ?> ><?php echo $row->cat_name; ?></option>
                            <?php }?>
                       </select>
                       <?php  echo form_error('cate_id'); ?> 
                    </div>
                    <div class="form-group col-md-3">
                        <label for="item_name">Item Name</label>
                        <input type="text" name="item_name"  id="item_name" class="form-control" value="<?php if(!empty(set_value('item_name'))){ echo set_value('item_name'); }elseif(isset($delivery->item_name) && !empty($delivery->item_name) ){ echo $delivery->item_name; } ?>"  onchange="CalculateEstimate();"  tabIndex="12"/>
                        <?php  echo form_error('item_name'); ?> 
                    </div>
                   
                    
                    <div class="form-group col-md-3">
                        <label for="pick_up_staircase">Pickup Floor No*</label>
                        <select type="text" class="form-control" id="pick_up_staircase"  name="pick_up_staircase"  onchange="CalculateEstimate();"  tabIndex="13">
                        <option value="">Select Floor No</option>
                        <option value="0" <?php if(!empty(set_select('pick_up_staircase',"0"))){ echo set_select('pick_up_staircase', "0"); }elseif(!empty($delivery->pick_up_staircase) && $delivery->pick_up_staircase == "0") {echo 'selected="selected"'; } ?> >None</option>
                        <option value="1" <?php if(!empty(set_select('pick_up_staircase',"1"))){ echo set_select('pick_up_staircase', "1"); }elseif(!empty($delivery->pick_up_staircase) && $delivery->pick_up_staircase == "1") {echo 'selected="selected"'; } ?> >Floor 1</option>
                        <option value="2" <?php if(!empty(set_select('pick_up_staircase',"2"))){ echo set_select('pick_up_staircase', "2"); }elseif(!empty($delivery->pick_up_staircase) && $delivery->pick_up_staircase == "2") {echo 'selected="selected"'; } ?>>Floor 2</option>
                        <option value="3" <?php if(!empty(set_select('pick_up_staircase',"3"))){ echo set_select('pick_up_staircase', "3"); }elseif(!empty($delivery->pick_up_staircase) && $delivery->pick_up_staircase == "3") {echo 'selected="selected"'; } ?>>Floor 3</option>
                        <option value="4" <?php if(!empty(set_select('pick_up_staircase',"4"))){ echo set_select('pick_up_staircase', "4"); }elseif(!empty($delivery->pick_up_staircase) && $delivery->pick_up_staircase == "4") {echo 'selected="selected"'; } ?>>Floor 4</option>
                        <option value="5" <?php if(!empty(set_select('pick_up_staircase',"5"))){ echo set_select('pick_up_staircase', "5"); }elseif(!empty($delivery->pick_up_staircase) && $delivery->pick_up_staircase == "5") {echo 'selected="selected"'; } ?>>Floor 5</option>
                        <option value="6" <?php if(!empty(set_select('pick_up_staircase',"6"))){ echo set_select('pick_up_staircase', "6"); }elseif(!empty($delivery->pick_up_staircase) && $delivery->pick_up_staircase == "6") {echo 'selected="selected"'; } ?>>Floor 6</option>
                        <option value="7" <?php if(!empty(set_select('pick_up_staircase',"7"))){ echo set_select('pick_up_staircase', "7"); }elseif(!empty($delivery->pick_up_staircase) && $delivery->pick_up_staircase == "7") {echo 'selected="selected"'; } ?>>Floor 7</option>
                        <option value="8" <?php if(!empty(set_select('pick_up_staircase',"8"))){ echo set_select('pick_up_staircase', "8"); }elseif(!empty($delivery->pick_up_staircase) && $delivery->pick_up_staircase == "8") {echo 'selected="selected"'; } ?>>Floor 8</option>
                        <option value="9" <?php if(!empty(set_select('pick_up_staircase',"9"))){ echo set_select('pick_up_staircase', "9"); }elseif(!empty($delivery->pick_up_staircase) && $delivery->pick_up_staircase == "9") {echo 'selected="selected"'; } ?>>Floor 9</option>
                        <option value="10" <?php if(!empty(set_select('pick_up_staircase',"10"))){ echo set_select('pick_up_staircase', "10"); }elseif(!empty($delivery->pick_up_staircase) && $delivery->pick_up_staircase == "10") {echo 'selected="selected"'; } ?>>Floor 10</option>
                       </select>
                       <?php  echo form_error('pick_up_staircase'); ?> 
                    </div>
                    <div class="form-group col-md-3">
                        <label for="drop_staircase">Drop Floor No*</label>
                        <select type="text" class="form-control" id="drop_staircase"  name="drop_staircase"  onchange="CalculateEstimate();"   tabIndex="14">
                        <option value="">Select Floor No</option>
                        <option value="0" <?php if(!empty(set_select('drop_staircase',"0"))){ echo set_select('drop_staircase', "0"); }elseif(!empty($delivery->drop_staircase) && $delivery->drop_staircase == "0") {echo 'selected="selected"'; } ?>>None</option>
                        <option value="1"<?php if(!empty(set_select('drop_staircase',"1"))){ echo set_select('drop_staircase', "1"); }elseif(!empty($delivery->drop_staircase) && $delivery->drop_staircase == "1") {echo 'selected="selected"'; } ?>>Floor 1</option>
                        <option value="2" <?php if(!empty(set_select('drop_staircase',"2"))){ echo set_select('drop_staircase', "2"); }elseif(!empty($delivery->drop_staircase) && $delivery->drop_staircase == "2") {echo 'selected="selected"'; } ?>>Floor 2</option>
                        <option value="3" <?php if(!empty(set_select('drop_staircase',"3"))){ echo set_select('drop_staircase', "3"); }elseif(!empty($delivery->drop_staircase) && $delivery->drop_staircase == "3") {echo 'selected="selected"'; } ?>>Floor 3</option>
                        <option value="4" <?php if(!empty(set_select('drop_staircase',"4"))){ echo set_select('drop_staircase', "4"); }elseif(!empty($delivery->drop_staircase) && $delivery->drop_staircase == "4") {echo 'selected="selected"'; } ?>>Floor 4</option>
                        <option value="5" <?php if(!empty(set_select('drop_staircase',"5"))){ echo set_select('drop_staircase', "5"); }elseif(!empty($delivery->drop_staircase) && $delivery->drop_staircase == "5") {echo 'selected="selected"'; } ?>>Floor 5</option>
                        <option value="6" <?php if(!empty(set_select('drop_staircase',"6"))){ echo set_select('drop_staircase', "6"); }elseif(!empty($delivery->drop_staircase) && $delivery->drop_staircase == "6") {echo 'selected="selected"'; } ?>>Floor 6</option>
                        <option value="7" <?php if(!empty(set_select('drop_staircase',"7"))){ echo set_select('drop_staircase', "7"); }elseif(!empty($delivery->drop_staircase) && $delivery->drop_staircase == "7") {echo 'selected="selected"'; } ?>>Floor 7</option>
                        <option value="8" <?php if(!empty(set_select('drop_staircase',"8"))){ echo set_select('drop_staircase', "8"); }elseif(!empty($delivery->drop_staircase) && $delivery->drop_staircase == "8") {echo 'selected="selected"'; } ?>>Floor 8</option>
                        <option value="9" <?php if(!empty(set_select('drop_staircase',"9"))){ echo set_select('drop_staircase', "9"); }elseif(!empty($delivery->drop_staircase) && $delivery->drop_staircase == "9") {echo 'selected="selected"'; } ?>>Floor 9</option>
                        <option value="10" <?php if(!empty(set_select('drop_staircase',"10"))){ echo set_select('drop_staircase', "10"); }elseif(!empty($delivery->drop_staircase) && $delivery->drop_staircase == "10") {echo 'selected="selected"'; } ?>>Floor 10</option>
                       </select>
                       <?php  echo form_error('drop_staircase'); ?> 
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-3">
                        <label for="package_value">Package value</label>
                        <input type="text" name="package_value"  id="package_value" class="form-control" value="<?php if(!empty(set_value('package_value'))){ echo set_value('package_value'); }elseif(isset($delivery->package_value) && !empty($delivery->package_value) ){ echo $delivery->package_value; } ?>"  onchange="CalculateEstimate();"  tabIndex="15"/>
                        <div id="pack" style="color:red;"></div>
                        <?php  echo form_error('package_value'); ?> 
                    </div>
                    <!-- <?php // if( empty($delivery->payment_status) ){   ?> -->
                    <div class="form-group col-md-3">
                        <label for="payment_status">Transaction Status</label>
                       
                        <select type="text" class="form-control" id="payment_status"  name="payment_status"  tabIndex="15" >
                        <option value="">Select Transaction Status</option>
                        <option value="TXN_SUCCESS"  <?php if(!empty(set_select('payment_status',"TXN_SUCCESS"))){ echo set_select('payment_status', "TXN_SUCCESS"); }elseif(!empty($delivery->payment_status) && $delivery->payment_status == "TXN_SUCCESS") {echo 'selected="selected"'; } ?> >TXN_SUCCESS</option>
                        <option value="TXN_FAILUER" <?php if(!empty(set_select('payment_status',"TXN_FAILUER"))){ echo set_select('payment_status', "TXN_FAILUER"); }elseif(!empty($delivery->payment_status) && $delivery->payment_status == "TXN_FAILUER") {echo 'selected="selected"'; } ?> >TXN_FAILUER</option>
                       
                       </select>
                       <?php  echo form_error('payment_status'); ?> 
                    </div>
                    <div class="form-group col-md-3">
                        <label for="status">Status</label>
                       
                        <select type="text" class="form-control" id="status"  name="status"     tabIndex="15">
                        <option value="">Select Status</option>
                        <option value="0"  <?php if(!empty(set_select('status',"0"))){ echo set_select('status', "0"); }elseif(!empty($delivery->status) && $delivery->status == "0") {echo 'selected="selected"'; } ?> >Order</option>
                        <option value="1" <?php if(!empty(set_select('status',"1"))){ echo set_select('status', "1"); }elseif(!empty($delivery->status) && $delivery->status == "1") {echo 'selected="selected"'; } ?> >Shipped</option>
                        <option value="2"  <?php if(!empty(set_select('status',"2"))){ echo set_select('status', "2"); }elseif(!empty($delivery->status) && $delivery->status == "2") {echo 'selected="selected"'; } ?> >On The Way</option>
                        <option value="3" <?php if(!empty(set_select('status',"3"))){ echo set_select('status', "3"); }elseif(!empty($delivery->status) && $delivery->status == "3") {echo 'selected="selected"'; } ?> >Delivered</option>
                        <option value="4" <?php if(!empty(set_select('status',"4"))){ echo set_select('status', "4"); }elseif(!empty($delivery->status) && $delivery->status == "4") {echo 'selected="selected"'; } ?> >Canclled</option>
                       
                       </select>
                       
                    </div>
                    
                    </div>
                  <input type="checkbox" class="mb-0 ml-3"  name="gift" value="1" id="gift" <?php if(!empty(set_checkbox('gift',"1"))){ echo set_checkbox('gift', "1"); }elseif(isset($delivery->gift)  && $delivery->gift==true ){ echo "checked"; } ?> onchange="CalculateEstimate();" >
                 <label  for="gift" class="mb-0 ml-0" >Gift </label><br>
                 <input type="checkbox" class="mb-0 ml-3"  name="urgent" value="1" id="urgent" <?php if(!empty(set_checkbox('urgent',"1"))){ echo set_checkbox('urgent', "1"); }elseif(isset($delivery->urgent)  && $delivery->urgent==true ){ echo "checked"; } ?> onchange="CalculateEstimate();" >
                <label   for="urgent">Urgent </label><br>
                <input type="checkbox" class="mb-0 ml-3"   name="delicate" value="1" id="delicate" <?php if(!empty(set_checkbox('delicate',"1"))){ echo set_checkbox('delicate', "1"); }elseif(isset($delivery->delicate)  && $delivery->delicate==true ){ echo "checked"; } ?>  onchange="CalculateEstimate();" >
                <label   for="delicate" >Delicate</label><br>
                <input type="checkbox" class="mb-0 ml-3"   name="security_charge" value="1" id="security_charge" <?php if(!empty(set_checkbox('security_charge',"1"))){ echo set_checkbox('security_charge', "1"); }elseif(isset($delivery->security_charge)  && $delivery->security_charge==true ){ echo "checked"; } ?>  onchange="CalculateEstimate();" >
                <label   for="security_charge" >Security charges</label><br>
               
                <div class="col-sm-12">
               
               <div class="qtybox">				   
                  <p class="mb-0 ml-0">Add your Qty</p>
                  <div class="value-button" id="increase" onclick="increaseValue();" value="Increase Value">+</div>
                 <input type="number" id="number" onchange="CalculateEstimate();" name="qyt" value="<?php if(!empty(set_value('qyt'))){ echo set_value('qyt'); }elseif(isset($delivery->qyt) && !empty($delivery->qyt) ){ echo $delivery->qyt; } ?>" />
                 <div class="value-button" id="decrease" onclick="decreaseValue();" value="Decrease Value">-</div>
                </div>
                  
                    <div class="col-sm-12 mb-2 " >
                      <div class="pricebox float-right"><large>Total Price</large> <br> <h3 class="mb-0"><b> 
                          <div id='price'></div> 
                        </b></h3></div>	  
                  </div>
                
                <!-- <input type="button" id="addIn" class="btn btn-primary" value="Add Delivery" onclick="priceCalculator(this)" /> -->
                <button type="submit" value="submit" class="btn btn-primary">Add Delivery </button>

        </div>
     </form>
    </div>
</div>
</div>
                         
<script>

let autocomplete;
let autocomplete1;
let address1Field;
let address2Field;
let postalField;

function initAutocomplete() 
{
    
address1Field = document.getElementById("source_address");
address2Field = document.getElementById("destination_address");
// Create the autocomplete object, restricting the search predictions to
// addresses in the US and Canada.
autocomplete = new google.maps.places.Autocomplete(address1Field,{
    componentRestrictions: { country: ["in"] },
    fields: ["address_components", "geometry"],
    types: ["address"],
    
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
            
            
if(address1Field.id=='source_address'){
    
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


if(address2Field.id=='destination_address'){
    
    document.getElementById("destination_lat").value = place.geometry.location.lat();
    document.getElementById("destination_long").value = place.geometry.location.lng();
    
}

// console.log(address2Field);
// console.log(address2Field);
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
            address2 +=component.short_name;
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
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHc_DsweA9F0GG1A724BSOJgtV9BcWK3o&callback=initAutocomplete&libraries=places&v=weekly"  async
    ></script>
<script>
   
    $(function(){
    $("input[name='d_width']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
    });

    $("input[name='d_height']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
    });
    $("input[name='d_weight']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
    });
    $("input[name='d_length']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
    });
    $("input[name='package_value']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
    });
    });


function CalculateEstimate(){

    var kmPrice;
    var weightPrice;
    var giftPrice;
    var urgentPrice;
    var delicatePrice;
    var stairsPrice;
    var volumeCharges;


    var e = document.getElementById("package_id");
    var package_id = e.options[e.selectedIndex].value;
    //alert(package_id);
    //var package_id = document.getElementById("package_id").value;

    if(package_id == 6){

    document.getElementById("div_weight").style.display = "block";
    }else{
    document.getElementById("div_weight").style.display = "none";
    }
    $.ajax({
    type: "GET",
    dataType:'json',
    url: '<?php echo base_url('delivery/ajax_get_packges/'); ?>'+package_id,

    success: function(response) {
    
        kmPrice = response.per_km_amount;
        weightPrice = response.weight_charges;
        giftPrice = response.gift_amount;
        urgentPrice = response.urgent_amount;
        delicatePrice = response.delicate_amount;
        stairsPrice = response.staircase_amount;
        volumeCharges = response.volume_charges;

  //  alert(weight);
    var source_lat = parseFloat(document.getElementById('source_lat').value);
    var source_long = parseFloat(document.getElementById('source_long').value);
    var destination_lat = parseFloat(document.getElementById('destination_lat').value);
    var destination_long = parseFloat(document.getElementById('destination_long').value);	
    var width = parseInt(document.getElementById('d_width').value);
    var height = parseInt(document.getElementById('d_height').value);
    var length = parseInt(document.getElementById('d_length').value);
    var weight = parseInt(document.getElementById('d_weight').value);
    var gift = parseInt(document.getElementById('gift').value);
    var urgent = parseInt(document.getElementById('urgent').value);
    var delicate = parseInt(document.getElementById('delicate').value);
    var pick_up_staircase = parseInt(document.getElementById('pick_up_staircase').value);
    var drop_staircase = parseInt(document.getElementById('drop_staircase').value);
    //var qyt = parseInt(document.getElementById('number').value);
    var volume = parseInt(document.getElementById('volume').value);
    var package_value = parseInt(document.getElementById('package_value').value);
   // alert(package_value);
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

    if(isNaN(weight)){
        weight = 1;
    }else if(weight<25){
        document.getElementById("result").innerHTML= "weight is greater than 25";
    }else{
        document.getElementById("result").innerHTML = "";
    }

    if(package_id != 6){
        weight= "";
            }

    // if(isNaN(package_value)){
    //     package_value = 1;
    // }else
     if(package_value>25000){
        document.getElementById("pack").innerHTML= "package value is not greater than 25000";
    }else{
        document.getElementById("pack").innerHTML = "";
    }

    if(isNaN(width)){
        width = 0;
    }
    if(isNaN(height)){
        height = 0;
    }
    if(isNaN(length)){
        length = 0;
    }
    if(isNaN(pick_up_staircase)){
        pick_up_staircase = 0;
    }
    if(isNaN(drop_staircase)){
        drop_staircase = 0;
    }

    var qyt_check = document.getElementById("number");
    var qyt=1;
    if (qyt_check.value.length > 0){
        qyt=parseInt(qyt_check.value);
    // alert(qyt);                
    }

    var wall =( width * height * length);
    document.getElementById("volume").value = wall

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

    var security_check = document.getElementById("security_charge");
    var security_charge=0;
    if (security_check.checked == true){
        if(package_value > 2900 ){
        security_charge = package_value/100*2;
        }else if(package_value <= 2900 ){
            security_charge = 50 ;
        }
    }

    if( 1 <= volume  &&  25 >= volume ){
    volumeCharges =2;
    }else if(25 <= volume &&   50 >= volume ){
    volumeCharges = 5;
    }else if( 50 <= volume &&  75 >= volume ){
    volumeCharges =10;
    }else if( 75 <= volume &&  100 < volume ){
    volumeCharges =18;
    }     

    var km1= Math.round(km);

    if(weightPrice == ""){
        weightPrice = 1;
    }

    console.log(weight);
    console.log(qyt);
    console.log(km1);
    console.log(kmPrice);
    console.log(weightPrice);
    console.log(giftPrice);
    console.log(urgentPrice);
    console.log(delicatePrice);
    console.log(stairsPrice);
    console.log( volumeCharges);
    
    if(25 <= weight ){
        document.getElementById('price').innerHTML = km1 * kmPrice +  qyt * weight +gift*giftPrice +urgent*urgentPrice+delicate*delicatePrice+drop_staircase*stairsPrice+pick_up_staircase*stairsPrice + volumeCharges + security_charge;
    }else{
        document.getElementById('price').innerHTML = km1 * kmPrice + weightPrice * qyt + gift*giftPrice +urgent*urgentPrice+delicate*delicatePrice+drop_staircase*stairsPrice+pick_up_staircase*stairsPrice + security_charge;
    }
   

}
    });
}




</script>

<script>
window.onload = CalculateEstimate;
</script>


<script>
function increaseValue() {
var value = parseInt(document.getElementById('number').value, 10);
value = isNaN(value) ? 0 : value;
value++;
document.getElementById('number').value = value;
//alert(value);
}

function decreaseValue() {
var value = parseInt(document.getElementById('number').value, 10);
value = isNaN(value) ? 0 : value;
value < 1 ? value = 1 : '';
value--;
document.getElementById('number').value = value;
}
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
</script>

</body>