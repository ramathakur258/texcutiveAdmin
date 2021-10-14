
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Permission Section Add/Edit</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('mapp/permission_section') ?>" class="btn btn-sm btn-secondary">Back</a>
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
                            <label for="section_name">Section Name </label>
                            <input type="text" name="section_name" class="form-control" value="<?php if(!empty(set_value('section_name'))){ echo set_value('section_name'); }elseif(isset($record->section_name)){ echo $record->section_name; } ?>" id="section_name" placeholder="Name" />
                        </div>
                        
                          <div class="form-group col-md-6">
                          
                            <label for="section_name">Template </label>
                           
                             <select name="template_id[]" id="multiple" class="form-control" multiple placeholder="select template">
                                 
                                 <?php   
                                  
                                 $tempalte_id_array = [];
                                 if(!empty($record->template_id)){
                                 
                                 $tempalte_id_array = json_decode($record->template_id);
                               
                                 } ?>
                                 <!--<option  value="0" <?php //if(!empty($record->template_id) && $record->template_id=='0'){ echo "selected"; } ?>>All</option>-->
                                 <?php foreach($template as $t){ ?>
                             
                               <option value="<?php echo $t->template_id; ?>" <?php if(!empty($record->template_id) && in_array($t->template_id,$tempalte_id_array)){ echo "selected"; } ?>><?php echo $t->template_name; ?></option>
                             
                               <?php } ?>
                            </select>
                        </div>
                        
                        
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Save Detail</button>
                </form>

            </div>
        </div>
    </div>
</div>