
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Slider Add/Edit</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('mapp/slider') ?>" class="btn btn-sm btn-secondary">Back</a>
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
                            <label for="slider_title">Slider Title </label>
                            <input type="text" name="slider_title" class="form-control" value="<?php if(!empty(set_value('slider_title'))){ echo set_value('slider_title'); }elseif(isset($record->slider_title)){ echo $record->slider_title; } ?>" id="slider_title" placeholder="Title" />
                        </div>
                       
                        <div class="form-group col-md-6">
                            <label for="slider_image">Image *</label>
                            <input type="file" name="slider_image" class="form-control"/>
                        </div>
                          <div class="form-group col-md-6">
                            <label for="reference_type">Type </label>
                            <select name="reference_type" id="reference_type" class="form-control">
                                <option value="NO" <?php if(!empty($record->reference_type) && $record->reference_type=='NO'){ echo "selected"; } ?>>No</option>
                                <option value="PRODUCT" <?php if(!empty($record->reference_type) && $record->reference_type=='PRODUCT'){ echo "selected"; } ?>>Product</option>
                                <option value="CATEGORY" <?php if(!empty($record->reference_type) && $record->reference_type=='CATEGORY'){ echo "selected"; } ?>>Category</option>
                            </select>
                            <small class="text-danger" id="product_type_error"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="category_id">Category </label>
                            <select id="category_id" class="form-control" name="category_id">
                                <option value="">Select Category</option>
                                <?php foreach($categories as $category){ ?>
                                    <option value="<?php echo $category->id; ?>" <?php if(!empty($record->reference_id) && $record->reference_type == 'CATEGORY'  && $record->reference_id==$category->id){ echo "selected"; } ?>><?php echo $category->category_title; ?></option>
                                <?php } ?>
                            </select>
                            <small class="text-danger" id="category_id_error"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="product_id">Product </label>
                            <select id="product_id" class="form-control" name="product_id">
                                <option value="">Select Product</option>
                                <?php foreach($products as $product){ ?>
                                 <option value="<?php echo $product->id; ?>" <?php if(!empty($record->reference_id) && $record->reference_type == 'PRODUCT'  && $record->reference_id==$product->id){ echo "selected"; } ?>><?php echo $product->product_name; ?></option>
                                <?php } ?>
                            </select>
                            <small class="text-danger" id="product_id_error"></small>
                        </div>
                        
                        <div class="form-group col-md-6">
                        <label for="status_id">Status </label>      
                         <select id="status" class="form-control" name="status_id" >
                           
                                         <option value="1" <?php if(!empty($record)){ if($record->status=="1") echo "selected"; } ?>>INACTIVE</option>
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