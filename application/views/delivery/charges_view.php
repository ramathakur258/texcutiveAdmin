
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Charges View</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('delivery/Charges') ?>" class="btn btn-sm btn-secondary">Back</a>
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
                            <label for="per_km_charge">Per Km Charges *</label>
                            <input type="text" name="per_km_charge"  class="form-control" value="<?php echo $charges->per_km_charge ?>"  placeholder="Per Km CHarges" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="per_minute"> Per Minute *</label>
                            <input type="text" name="per_minute"  id="phone" class="form-control" value="<?php echo  $charges->per_minute ?> " id="email" placeholder="Per Minute" />
                            <div id="result"></div>
                        </div>
                    </div>
                    
                </form>

            </div>
        </div>
    </div>
</div>



