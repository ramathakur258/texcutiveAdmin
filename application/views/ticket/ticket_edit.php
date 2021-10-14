
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Ticket Add/Edit</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('ticket') ?>" class="btn btn-sm btn-secondary">Back</a>
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
                            <label for="display_name">Owner Name *</label>
                            <input type="text" name="display_name" readonly class="form-control" value="<?php echo $user->display_name; ?>"  placeholder="Contact number" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Assign  to <?php  if(isset($ticket->assign_id) && !empty($ticket->assign_id) ){ echo " <strong>".$ticket->assign_first_name." ".$ticket->assign_last_name."</strong>"; } ?>*</label>
                            <input type="text" name="phone"  id="phone" class="form-control" value="<?php if(!empty(set_value('phone'))){ echo set_value('phone'); }elseif(isset($ticket->assign_id) && !empty($ticket->assign_id) ){ echo $ticket->assign_phone; } ?>" id="email" placeholder="Phone" />
                            <div id="result"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="cat_id1">Department</label>
                            <select name="cat_id1" id="cat_id1"  class="form-control" onchange="GetSubCat( this,'cat_id2')">
                            <option value="">Choose</option>
                            <?php foreach($tic_cat1 as $category) {?>
                            <option  value="<?php echo $category->id; ?>" <?php if(isset($ticekt->cat_id1) &&  $category->id == $ticekt->cat_id1){ echo 'selected="selected"'; } ?> ><?php  echo $category->cat_name ?></option>
                            
                            <?php }?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cat_id2">Issue</label>
                            <select name="cat_id2" id="cat_id2"   class="form-control" onchange="GetSubCat( this,'cat_id3')">
                            <option value="">Choose</option>
                            <?php foreach($tic_cat2 as $category) {?>
                            <option  value="<?php echo $category->id; ?>" <?php if(isset($ticekt->cat_id2) &&  $category->id == $ticekt->cat_id2){ echo 'selected="selected"'; } ?> ><?php  echo $category->cat_name ?></option>
                           
                            <?php }?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cat_id3">Sub issue</label>
                            <select name="cat_id3"  id="cat_id3"  class="form-control" onchange="GetSubCat( this,'cat_id4')">
                            <option value="">Choose</option>
                            <?php foreach($tic_cat3 as $category) {?>
                            <option  value="<?php echo $category->id; ?>" <?php if(isset($ticekt->cat_id3) &&  $category->id == $ticekt->cat_id3){ echo 'selected="selected"'; } ?> ><?php  echo $category->cat_name ?></option>
                           
                            <?php }?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cat_id4">Action</label>
                            <select name="cat_id4"  id="cat_id4"   class="form-control" >
                            <option value="">Choose</option>
                            <?php foreach($tic_cat4 as $category) {?>
                            <option  value="<?php echo $category->id; ?>" <?php if(isset($ticekt->cat_id4) &&  $category->id == $ticekt->cat_id4){ echo 'selected="selected"'; } ?>><?php  echo $category->cat_name ?></option>
                           
                            <?php }?>
                            </select>
                        </div>
                                              
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <select name="status"  class="form-control">
                           
                            <?php foreach($tic_status as $Status) {?>
                            <option  value="<?php echo $Status->title;?>" <?php if($Status->title == isset($ticekt->status)){ echo 'selected="selected"'; }   ?>><?php echo  $Status->title ?></option>
                            <?php }?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="priority">Priority</label>
                            <select name="priority"  class="form-control">
                           
                            <?php foreach($tic_priority as $row) {?>
                            <option  value="<?php echo $row->title;?>" <?php if($row->title == isset($row->priority)){ echo 'selected="selected"'; }   ?>><?php echo  $row->title ?></option>
                            <?php }?>
                            </select>
                        </div>
                                       
                    </div>
                     <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="description">Description</label>
                            <textarea name="description" rows="5" class="form-control" ><?php  if(!empty(set_value('description'))){ echo set_value('description'); }elseif(isset($ticket->description)){ echo $ticket->description; } ?></textarea>
                        </div>
                                       
                    </div>
                    
               
                    
                  
                    
                    <button type="submit" class="btn btn-primary">Save Detail</button>
                </form>

            </div>
        </div>
    </div>
</div>



<script>
function GetSubCat($cat ,sec_ids){
    
    $.ajax({
        type: "POST",
       // dataType:'json',
        url: "https://admin.texcutive.com/ticket/get_subcategory/",
        data: {
            'cat_id' : $cat.value,
        },
        success: function(response) {
            
            console.log(response);
         //   toastr.success("Attendance update Successful");
            $("#"+sec_ids).html(response);
            
            
        }
    });
}
</script>
