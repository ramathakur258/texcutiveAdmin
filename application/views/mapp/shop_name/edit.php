
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Brand Add/Edit</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('mapp/shopname') ?>" class="btn btn-sm btn-secondary">Back</a>
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
                            <label for="app_shop_name"><b>App Shop Name </b>(App shop name should be small)</label>
                          
                            <input type="text" name="app_shop_name" class="form-control" value="<?php if(!empty(set_value('app_shop_name'))){ echo set_value('app_shop_name'); }elseif(isset($record->app_shop_name)){ echo $record->app_shop_name; } ?>" id="app_shop_name" placeholder="Shop Name" />
                        </div>
                        
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Save Detail</button>
                </form>

            </div>
        </div>
    </div>
</div>