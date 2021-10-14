
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Category Add/Edit</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('mapp/category') ?>" class="btn btn-sm btn-secondary">Back</a>
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
                            <label for="category_title">Category Title </label>
                            <input type="text" name="category_title" class="form-control" value="<?php if(!empty(set_value('category_title'))){ echo set_value('category_title'); }elseif(isset($record->category_title)){ echo $record->category_title; } ?>" id="category_title" placeholder="Title" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="category_image">Image *</label>
                            <input type="file" name="category_image" class="form-control"/>
                        </div>
                         <div class="form-group col-md-6">
                             
                            <label for="status">Status</label>
                            <select id ="status" name="status_id" class="form-control">
                                
                                 <option value="1" <?php if(!empty($record)){ if($record->status=="1")echo "selected"; } ?>>INACTIVE</option>
                                 <option value="0" <?php if(!empty($record)){ if($record->status=="0") echo "selected"; } ?>>ACTIVE</option>
                                 
                            </select>
                        </div>
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Save Detail</button>
                </form>

            </div>
        </div>
    </div>
</div>