
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Charges Add/Edit</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
  
    <a href="<?php echo site_url('delivery/charges') ?>" class="btn btn-sm btn-secondary">Back</a>
    </div>
</div>
<?php echo validation_errors(); ?>
<?php if(isset($message)){ echo $message; } ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype='multipart/form-data' >
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="per_km_amount">Per Km Charges *</label>
                            <div class="input-group">
                            <input type="text" class="form-control" name="per_km_amount"  id="per_km_amount"  value="<?php if(isset($charges->per_km_amount)){ echo $charges->per_km_amount; } ?>"  placeholder="Per Km Charges" />
                               
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="weight"> Weight(Charges KG) *</label>
                            <div class="input-group field_wrapper" >
                                <select class="form-control" name="weight"  id="weight" >
                                    <option value="0" >select weight</option>
                                    <option value="0-5" <?php if(isset($charges->weight) && $charges->weight=="0-5"){ echo "selected";} ?>>0-5</option>
                                    <option value="5-10" <?php if(isset($charges->weight) && $charges->weight=="5-10"){ echo "selected";} ?> >5-10</option>
                                    <option value="10-15" <?php if(isset($charges->weight) && $charges->weight=="10-15"){ echo "selected";} ?>>10-15</option>
                                    <option value="15-20" <?php if(isset($charges->weight) && $charges->weight=="15-20"){ echo "selected";} ?>>15-20</option>
                                    <option value="20-25" <?php if(isset($charges->weight) && $charges->weight=="20-25"){ echo "selected";} ?>>20-25</option>
                                    <option value="25"  <?php if(isset($charges->weight) && $charges->weight=="0"){ echo "selected";} ?>>25 Or Above</option>
                                </select>
                                <div class="form-group col-md-3">
                               <input type="text" name="weight_charges" id=""  class="form-control" value="<?php if(isset($charges->weight_charges)){ echo $charges->weight_charges; } ?>"  placeholder="Charge" />
                                </div>
                                <a class="btn btn-default btn-sm add_weight"  href="#"><i class="fas fa-plus-circle"></i></a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="height">Height Charge(cm)*</label>
                            <input type="text" class="form-control" name="height"  id="height"  value="<?php if(isset($charges->height)){ echo $charges->height;} ?>"  placeholder="height Charges" />
                                
                        </div>
                        <div class="form-group col-md-2">
                            <label for="length">Length Charge(cm)*</label>
                            <input type="text" class="form-control" name="length"  id="length"  value="<?php if(isset($charges->length)){ echo $charges->length ;}?>"  placeholder="length Charges" />
                               
                        </div>
                        <div class="form-group col-md-2">
                                <label for="width"> Width Charges(cm)*</label>
                                <input type="text" class="form-control" name="width"  id="width"  value="<?php if(isset($charges->width)){ echo $charges->width;} ?>"  placeholder="width Charges" />
                               
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Total Volume(sq feet) *</label>
                            <div class="input-group volume_wrapper" >
                                <select class="form-control"  name="volume"  id="volume" >
                                   <option value="0" >select volume</option>
                                    <option value="0-25" >0-25</option>
                                    <option value="25-50" >25-50</option>
                                    <option value="50-75">50-75</option>
                                    <option value="75-100" >75-100</option>
                                    <option value="100"  >100 or Above </option>
                                </select>
                                <div class="form-group col-md-3">
                               <input type="text" name="volume_charges" id="volume_charges"  class="form-control" value=""  placeholder="Charge" />
                                </div>
                                <a class="btn btn-default btn-xs add_volume"  href="#"><i class="fas fa-plus-circle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                            <label for="gift_amount"> Gift Charges *</label>
                            <input type="text" name="gift_amount"  id="gift_amount" class="form-control " value="<?php if(isset($charges->gift_amount)){ echo  $charges->gift_amount;} ?> "  placeholder=" Gift Charges" />
                            
                        </div>
                        <div class="form-group col-md-6">
                            <label for="urgent_amount">Urgent Charge *</label>
                            <input type="text" name="urgent_amount" id="urgent_amount"  class="form-control" value="<?php if(isset($charges->urgent_amount)){ echo $charges->urgent_amount;} ?>"  placeholder="urgent Charges" />
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="delicate_amount">Delicate Charge *</label>
                            <input type="text" name="delicate_amount" id="delicate_amount"  class="form-control" value="<?php if(isset($charges->delicate_amount)){ echo $charges->delicate_amount ;}?>"  placeholder="delicate Charges" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="staircase_amount"> Staircase Floor(1st)*</label>
                            <input type="text" name="staircase_amount"  id="staircase_amount" class="form-control" value="<?php if(isset($charges->staircase_amount)){ echo  $charges->staircase_amount;} ?> "  placeholder="Staircase Charges" />
                           
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="delicate_amount">Package Type  *</label>
                            <select type="text" class="form-control"  name="package_id"  onchange="CalculateEstimate();">
                              
                              <option value="0" >Select package Type</option>
                              <?php foreach($package as $row){  ?>
                              <option value="<?php echo $row->packages_id; ?>"  <?php if(isset($charges->package_id) && $charges->package_id == $row->packages_id){ echo 'selected="selected"' ;} ?>><?php echo $row->package_type; ?></option>
                              <?php }?>
                         </select>
                        </div>
                       
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Save Detail</button>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- <script>

function add_weightFields() {
   var d = document.getElementById("weight");
  
   d.innerHTML += "<div class='input-group' ><select class='form-control' name='weight_amount'  id='weight_amount' ><option value='15' >0-5 KG </option><option value='20'>5-10 KG </option><option value='30' >10-15 KG  </option><option value='45' >15-20 KG </option><option value='60' >20-25 KG </option><option value='80' >25 Or Above KG </option></select> <a href='javascript:void(0);' class='remove_button'><img src='remove-icon.png'/></a></div><br />";
}
    </script> -->



<script type="text/javascript">

$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_volume'); //Add button selector
    var wrapper = $('.volume_wrapper'); //Input field wrapper
    var fieldHTML = "<div class='input-group' style='margin-top:10px' ><select class='form-control' name='volume'   ><option value='0-25' >0-25 </option><option value='25-50'>25-50</option><option value='50-75' >50-75</option><option value='75-100' >75-100</option><option value='100' >100 Or Above</option></select><div class='form-group col-md-3'><input type='text' name='volume_charges'  class='form-control'  placeholder='Charge' /></div> <a href='javascript:void(0);' class='btn btn-default btn-sm remove_volume'><i class='fa fa-minus-circle' aria-hidden='true'></i></a></div>"; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_volume', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

// $(document).ready(function(){
//     var maxField = 10; //Input fields increment limitation
//     var addButton = $('.add_height'); //Add button selector
//     var wrapper = $('.height_wrapper'); //Input field wrapper
//     var fieldHTML = "<div class='input-group' style='margin-top:10px' ><select class='form-control' name='height[]'   ><option value='0-25' >0-25 </option><option value='25-50'>25-50</option><option value='50-75' >50-75</option><option value='75-100' >75-100</option><option value='100' >100 Or Above</option></select><div class='form-group col-md-3'><input type='text' name='height_charges[]'  class='form-control'  placeholder='Charge' /></div> <a href='javascript:void(0);' class='btn btn-default btn-sm remove_height'><i class='fa fa-minus-circle' aria-hidden='true'></i></a></div>"; //New input field html 
//     var x = 1; //Initial field counter is 1
    
//     //Once add button is clicked
//     $(addButton).click(function(){
//         //Check maximum number of input fields
//         if(x < maxField){ 
//             x++; //Increment field counter
//             $(wrapper).append(fieldHTML); //Add field html
//         }
//     });
    
//     //Once remove button is clicked
//     $(wrapper).on('click', '.remove_height', function(e){
//         e.preventDefault();
//         $(this).parent('div').remove(); //Remove field html
//         x--; //Decrement field counter
//     });
// });

// $(document).ready(function(){
//     var maxField = 10; //Input fields increment limitation
//     var addButton = $('.add_length'); //Add button selector
//     var wrapper = $('.length_wrapper'); //Input field wrapper
//     var fieldHTML = "<div class='input-group' style='margin-top:10px' ><select class='form-control' name='length[]'   ><option value='0-25' >0-25 </option><option value='25-50'>25-50</option><option value='50-75' >50-75</option><option value='75-100' >75-100</option><option value='100' >100 Or Above</option></select><div class='form-group col-md-3'><input type='text' name='length_charges[]'  class='form-control'  placeholder='Charge' /></div> <a href='javascript:void(0);' class='btn btn-default btn-sm remove_length'><i class='fa fa-minus-circle' aria-hidden='true'></i></a></div>"; //New input field html 
//     var x = 1; //Initial field counter is 1
    
//     //Once add button is clicked
//     $(addButton).click(function(){
//         //Check maximum number of input fields
//         if(x < maxField){ 
//             x++; //Increment field counter
//             $(wrapper).append(fieldHTML); //Add field html
//         }
//     });
    
//     //Once remove button is clicked
//     $(wrapper).on('click', '.remove_length', function(e){
//         e.preventDefault();
//         $(this).parent('div').remove(); //Remove field html
//         x--; //Decrement field counter
//     });
// });

$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_weight'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = "<div class='input-group' style='margin-top:10px' ><select class='form-control' name='weight[]'  id='weight' ><option value='0-5' >0-5 KG </option><option value='5-10'>5-10 KG </option><option value='10-15' >10-15 KG  </option><option value='15-20' >15-20 KG </option><option value='20-25' >20-25 KG </option><option value='25' >25 Or Above KG </option></select><div class='form-group col-md-3'><input type='text' name='weight_charges[]'  class='form-control'  placeholder='Charge' /></div> <a href='javascript:void(0);' class='btn btn-default btn-sm remove_button'><i class='fa fa-minus-circle' aria-hidden='true'></i></a></div>"; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>