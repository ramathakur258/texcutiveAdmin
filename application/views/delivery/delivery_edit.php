<style>

    .pricebox{
        background-color: rgba(42,120,187,.08);
    padding: 10px 45px;
    display: inline-block;
    border-radius: 8px;
    
    font-weight: bold;
    }
</style>
   <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:400,500"
      rel="stylesheet"
    />

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Delivery Add</h1>
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
          <form action="<?php site_url('delivery/deliveryAdd');?>" method="post" enctype='multipart/form-data' >
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="source_address"> Source Address *</label>
                            <input type="text"  id="source_address" name="source_address"  class="form-control auto-complete" value="<?php   if(isset($delivery->source_address)){echo $delivery->source_address; } ?>"   />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="source_lat"> Source lat *</label>
                            <input type="text" name="source_lat" id="source_lat"  class="form-control " value="<?php if(isset($delivery->source_lat)){ echo $delivery->source_lat;} ?>"   />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="source_long">Source long  *</label>
                            <input type="text" name="source_long"  id="source_long" class="form-control" value="<?php if(isset($delivery->source_long)){echo $delivery->source_long;} ?> "  />
                            <div id="result"></div>
                        </div>
                    </div>
                    <div class="form-row">
                         <div class="form-group col-md-6">
                            <label for="destination_address"> Destination Address *</label>
                            <input type="text" name="destination_address" id="destination_address"  class="form-control auto-complete" value="<?php if(isset($delivery->destination_address)){echo $delivery->destination_address;} ?>"   />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="destination_lat"> Destination lat*</label>
                            <input type="text" name="destination_lat"  id="destination_lat" class="form-control" value="<?php if(isset($delivery->destination_lat)){echo $delivery->destination_lat;} ?>"   />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="destination_long"> Destination  long *</label>
                            <input type="text" name="destination_long"  id="destination_long" class="form-control" value=" <?php if(isset($delivery->destination_long)){echo $delivery->destination_long;}?>"  />
                            <div id="result"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="d_width"> Width*(cm)</label>
                            <input type="text"  name="d_width" id="d_width" class="form-control" value="<?php  if(isset($delivery->d_width)){echo $delivery->d_width;} ?>"  onchange="CalculateEstimate();" />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="d_height">height (cm) *</label>
                            <input type="text" name="d_height" id="d_height" class="form-control" value="<?php if(isset($delivery->d_height)){echo $delivery->d_height;} ?> " onchange="CalculateEstimate();" />
                            <div id="result"></div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="d_length">length (cm)*</label>
                            <input type="text" name="d_length"   id="d_length" class="form-control" value="<?php if(isset($delivery->d_length)){echo $delivery->d_length;} ?>"  onchange="CalculateEstimate();" />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="volume">Total Volume (cm cube)  *</label>
                            <input type="text"   id="volume"  class="form-control" readonly="readonly" value="<?php // echo $delivery->source_address; ?>" onchange="CalculateEstimate();"  />
                        </div>
                    </div>
                    <div class="form-row">
                     
                        <div class="form-group col-md-6">
                            <label for="d_weight">weight  *</label>
                            <input type="text" name="d_weight"  id="d_weight" class="form-control" value=" <?php if(isset($delivery->d_weight)){echo $delivery->d_weight;} ?>"  onchange="CalculateEstimate();"/>
                            <div id="result"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" value=" <?php if(isset($delivery->description)){echo $delivery->description;} ?>" rows="3"><?php if(isset($delivery->description)){echo $delivery->description;} ?></textarea>
                        </div>
                    </div>
                    
                      <input type="checkbox"  name="gift" value="1" <?php if(isset($delivery->gift)==true) echo " checked " ?> id="gift" onchange="CalculateEstimate();" >
                     <label  for="gift" >Gift </label><br>
                     <input type="checkbox"  name="urgent" value="10" <?php if(isset($delivery->urgent)==true) echo " checked " ?> id="urgent" onchange="CalculateEstimate();">
                    <label   for="urgent">Urgent Delivery</label><br>
                    <input type="checkbox"  name="delicate" value="20" <?php if(isset($delivery->delicate)==true) echo " checked " ?> id="delicate" onchange="CalculateEstimate();">
                    <label   for="delicate">Delicate</label><br>
                    <input type="checkbox"  name="staircase" <?php if(isset($delivery->staircase)==true) echo " checked "  ?>  id="staircase" onchange="CalculateEstimate();">
                    <label   for="staircase">staircase</label><br>
                  
                    <select id="floor" name="floor" style="display:none;" onchange="CalculateEstimate();">
                        <option  value="" >none</option>
                        <option value="10"  >Floor 1</option>
                        <option value="20" >Floor 2</option>
                        <option value="30" >Floor 3</option>
                        <option value="40" >Floor 4</option>
                    </select>

                      
                        <div class="col-sm-12 mb-2 " >
					      <div class="pricebox float-right"><large>Total price* </large> <br> <h3 class="mb-0"><b> ₹<div id='price'></div> </b></h3></div>	  
					  </div>
                    
                    <!-- <input type="button" id="addIn" class="btn btn-primary" value="Add Delivery" onclick="priceCalculator(this)" /> -->
                  <?php  if($this->input->get("deliveryEdit")== "deliveryEdit"){ ?>
                    <button type="submit" value="submit" class="btn btn-primary">Add Delivery </button>
<?php } ?>
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

 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgxapNo2tncgytLloRTZLVYwFb-k2korE&callback=initAutocomplete&libraries=places&v=weekly"  async></script>

<script>
       
       $(function(){
  $("input[name='Width']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
  });
  $("input[name='height']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
  });
  $("input[name='weight']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
  });
  $("input[name='length']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
  });
});


var per_km_amount=<?php echo $prices->per_km_amount; ?>

function CalculateEstimate(){

    

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
    var staircase = parseInt(document.getElementById('staircase').value);
  



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
    if(isNaN(width)){
        width=0;
    }
    if(isNaN(height) ){
        height=0;
    }
    if(isNaN(length)){
        length=0;
    }
    if(isNaN(weight)){
        weight=0;
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
    var stair_check = document.getElementById("staircase");
    var staircase=0.0;
    if (stair_check.checked == true){
        document.getElementById("floor").style.display = "block";
        var select = document.getElementById('floor');
        var values = select.options[select.selectedIndex].value;
       
        if (values.selected == true){
            staircase=parseFloat(values);
        }

    }else{
        document.getElementById("floor").style.display = "none";
    }

    var km1= Math.round(km)
   // console.log(km1);
    var total = km1*per_km_amount+width+ height+length+ weight+gift+urgent+delicate+staircase;
    document.getElementById('price').innerHTML= total;
}


</script>


