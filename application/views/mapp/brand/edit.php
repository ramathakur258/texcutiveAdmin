
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Brand Add/Edit</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('mapp/brand') ?>" class="btn btn-sm btn-secondary">Back</a>
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
                            <label for="brand_name">Brand Name</label>
                            <input type="text" name="brand_name" class="form-control" value="<?php if(!empty(set_value('brand_name'))){ echo set_value('brand_name'); }elseif(isset($record->brand_name)){ echo $record->brand_name; } ?>" id="brand_name" placeholder="Brand Name" />
                        </div>
                         <div class="form-group col-md-6">
                            <label for="brand_image">Image *</label>
                            <input type="file" name="brand_image" class="form-control"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                           <select id="status" class="form-control" name="status">-->
                                   
                                   <option value="1" <?php if(!empty($record)){ if($record->status=="1"){ echo "selected";} }  ?>>INACTIVE</option>
                                   <option value="0" <?php if(!empty($record)){ if($record->status=="0"){ echo "selected";}  } ?>>ACTIVE</option>
                                     
                            </select>
                        </div>
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Save Detail</button>
                </form>

            </div>
        </div>
    </div>
</div>