
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Package Add/Edit</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
  
    <a href="<?php echo site_url('delivery/package') ?>" class="btn btn-sm btn-secondary">Back</a>
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
                            <label for="package_type">Package Type *</label>
                            <div class="input-group">
                            <input type="text" class="form-control" name="package_type"  id="package_type"  value="<?php if(isset($package->package_type)){ echo $package->package_type; } ?>"  placeholder="Enter Package" />
                               
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="package_weight">Package Weight *</label>
                            <div class="input-group">
                            <input type="text" class="form-control" name="package_weight"  id="package_weight"  value="<?php if(isset($package->package_weight)){ echo $package->package_weight; } ?>"  placeholder="Enter Package" />
                               
                            </div>
                        </div> 
                    </div>
                   
                   
                    <button type="submit" class="btn btn-primary">Save Detail</button>
                </form>

            </div>
        </div>
    </div>
</div>
