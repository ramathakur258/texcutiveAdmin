
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Template Add/Edit</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('mapp/enquiry') ?>" class="btn btn-sm btn-secondary">Back</a>
    </div>
</div>
<div class="text-danger"><?php echo validation_errors(); ?></div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
           
            <input type="hidden" id="shop_id" value="<?php echo $shop_id; ?>" />
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data" >
                    <div class="form-row">
                       
                        <!--<div class="form-group col-md-12">-->
                             
                           
                           
                        <!--    <?php //foreach($template as $t) { ?>-->
                        <!--       <input type="radio" name="app_theme" value="<?php// echo $t->template_id ?>" <?php //if(!empty($record)){ if($record->app_theme==$t->template_id)echo "checked"; } ?>/>-->
                        <!--     <label for="app_theme">Template-<?php //echo $t->template_id ?></label>-->
                         
                        <!--   <img style="max-height:60px; cursor:pointer;" id="template_image" src="<?php //echo public_path('template/'.$t->template_image); ?>" onclick="window.open(this.src)">-->
                        <!--    <?php //} ?>-->
                                
                          
                        <!--</div>-->
                       
                       
                       
                       
                         <div class="form-group col-md-6">
                             
                            <label for="app_theme">Template</label>
                            <select id ="app_theme" name="app_theme" class="form-control">
                                
                            <?php foreach($template as $t) { ?>
                             <option value="<?php echo $t->template_id ?>" <?php if(!empty($record)){ if($record->app_theme==$t->template_id)echo "selected"; } ?>><?php echo $t->template_name;?></option>
                            <?php } ?>
                                
                                
                            </select>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="header_color">Primary Color</label>
                         <input type="color" name="header_color" value="<?php if(!empty($record)){ echo $record->header_color ; }else{ echo "#e64b1a";} ?>" class="form-control" />
                        </div>
                        
                          <div class="form-group col-md-6">
                            <label for="background_color">Background Color</label>
                         <input type="color" name="background_color" value="<?php if(!empty($record)){ echo $record->background_color ; }else{ echo "#FFFFFF";} ?>" class="form-control" />
                        </div>
                          <div class="form-group col-md-6">
                            <label for="text_color">Text Color</label>
                         <input type="color" name="text_color" value="<?php if(!empty($record)){ echo $record->text_color ; }else{ echo "#000";} ?>" class="form-control" />
                        </div>
                        
                         <div class="form-group col-md-6">
                            <label for="logo_image">Logo</label>
                            <input type="file" name="logo_image" class="form-control"/>
                        </div>
                         <div class="form-group col-md-6">
                             <?php if(!empty($logo)) {?>
                             <img style="max-height:100px;"  src="<?php echo public_path('logo/'.$logo->logo_image); ?>">
                             <?php } ?>
                        </div>
                        
                        
                         <div class="form-group col-md-12">
                            <label for="text_color">Permission</label>
                           
                            <?php //if(!empty($permission)){
                                //$permission_array = [];
                                //if(!empty($record->view_permission)){
                                  
                                 //   $permission_array = json_decode($record->view_permission);
                              //  }
                           // foreach($permission as $p){  ?>
                             
                               <div class="custom-control custom-checkbox mr-sm-2 pdata" id="permission">
                               
                              </div>
                        
                         <?php //  } }?>
                        
                        </div>
                          
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Save Detail</button>
                </form>

            </div>
        </div>
    </div>
</div>

<script>



$( document ).ready(function() {
    
    var d = $('#app_theme').val();
    var c = $('#shop_id').val();
    
    var dataString = {
        template:d,
        shop_id:c
    }

    permisson_data(dataString)
    
     $('#app_theme').change(function(){
        var d = $('#app_theme').val();
        var c = $('#shop_id').val();
        
        var dataString = {
            template:d,
            shop_id:c
        }
       permisson_data(dataString)
   });

});

 
  function permisson_data(dataString){
         $.ajax({
        type: "POST",
        url: "<?  echo base_url('mapp/enquiry/get_permission_section');?>",
        data: dataString,
        //dataType: "json",
        cache : false,
        success: function(data){
          $('.pdata').html(data);
     //   console.log(data)
        } ,error: function(error) {
            console.log(error)
        
        },
        });
   }
  
  
</script>