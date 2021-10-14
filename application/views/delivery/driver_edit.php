
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Driver Edit</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('delivery/Drivers') ?>" class="btn btn-sm btn-secondary">Back</a>
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
                            <label for="first_name">Driver First Name *</label>
                            <input type="text" name="first_name"  class="form-control" value="<?php echo $driver->first_name; ?>"  placeholder="Contact number" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name"> Driver Last Name *</label>
                            <input type="text" name="last_name"  id="last_name" class="form-control" value="<?php echo $driver->last_name; ?> "  placeholder="Phone" />
                            <div id="result"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="mobile"> Mobile *</label>
                            <input type="text" name="mobile"  id="mobile" class="form-control" value="<?php echo $driver->mobile; ?> "  placeholder="Phone" />
                        </div>
                        <div class="form-group col-md-6">
                        <label for="email">Email *</label>
                            <input type="text" name="email"  class="form-control" value="<?php echo $driver->email; ?>"  placeholder="Contact number" />
                            <div id="result"></div>
                        </div>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary">Save Detail</button>
                </form>

            </div>
        </div>
    </div>
</div>



