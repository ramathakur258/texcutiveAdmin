
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Vehicle Add/Edit</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('delivery/Vehicle') ?>" class="btn btn-sm btn-secondary">Back</a>
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
                            <label for="Vehicle">Vehicle  Name*</label>
                            <input type="text" name="vehicle_name"  id="vehicle_name" class="form-control" value="<?php if(isset($vehicle->vehicle_name)) {echo $vehicle->vehicle_name ;} ?>"  placeholder="Enter Vehicle Name" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Vehicle Model Number">Vehicle Model Number*</label>
                            <input type="text" name="vehicle_model_no"  id="vehicle_model_no" class="form-control" value="<?php if(isset($vehicle->vehicle_model_no)) {echo  $vehicle->vehicle_model_no ;}  ?> " placeholder="Enter Vehicle Model Number" />
                            
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Vehicle Plate Number">Vehicle Plate Number*</label>
                            <input type="text" name="vehicle_plate_no" id="vehicle_plate_no" class="form-control" value="<?php if(isset($vehicle->vehicle_plate_no)) {echo $vehicle->vehicle_plate_no ; }?>"  placeholder="Enter Vehicle Plate Number" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Vehicle Register Number">Vehicle Register Number*</label>
                            <input type="text" name="vehicle_reg_no"  id="vehicle_model_no_reg_no" class="form-control" value="<?php if(isset($vehicle->vehicle_reg_no)) {echo  $vehicle->vehicle_reg_no ;}?> "  placeholder="Enter Register Number" />
                            
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Vehicle Front Image">Vehicle Front Image*</label>
                            <input type="file" name="vehicle_front_img" id="vehicle_front_img"  class="form-control" value="<?php if(isset($vehicle->vehicle_front_img)) { echo $vehicle->vehicle_front_img ;} ?>"  placeholder="" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Vehicle Back Image">Vehicle Back Image *</label>
                            <input type="file" name="vehicle_back_img"  id="vehicle_back_img" class="form-control" value="<?php if(isset($vehicle->vehicle_back_img)) { echo  $vehicle->vehicle_back_img ;}?>"  placeholder="" />
                            <div id="result"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Detail</button>
                </form>

            </div>
        </div>
    </div>
</div>



