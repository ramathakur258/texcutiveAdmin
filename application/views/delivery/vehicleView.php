<style>
    .form-control {
    border:none;
    border-bottom: 1px solid grey;
    padding: 5px 10px;
    outline: none;
 }

[placeholder]:focus::-webkit-input-placeholder {
    transition: text-indent 0.4s 0.4s ease; 
    text-indent: -100%;
    opacity: 1;
 }
</style>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Vehicle Detail</h1>
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
                            <label for="vehicle_name"><b>Vehicle Name</b></label>
                            <input type="text" name="vehicle_name" id="vehicle_name" class="form-control" value="<?php echo $vehicle->vehicle_name ?>"  placeholder="Vehicle Name" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="vehicle_model_no"><b> Vehicle Model Number</b> </label>
                            <input type="text" name="vehicle_model_no"  id="vehicle_model_no" class="form-control" value="<?php echo  $vehicle->vehicle_model_no ?> " id="image" placeholder="Vehicle Model Number" />
                            <div id="result"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="vehicle_plate_no"><b>Vehicle Plate Number</b></label>
                            <input type="text" name="vehicle_plate_no" id="vehicle_plate_no" class="form-control" value="<?php echo $vehicle->vehicle_plate_no ?>"  placeholder="Vehicle Plate Number" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="vehicle_reg_no"><b>Vehicle Register Number</b></label>
                            <input type="text" name="vehicle_reg_no"  id="vehicle_reg_no" class="form-control" value="<?php echo  $vehicle->vehicle_reg_no ?> "  placeholder="Vehichle Registration Number" />
                            <div id="result"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="vehicle_front_img"><b>Vehicle Front Img</b></label><br><br>
                           
                            <img src="<?php echo UPLOADS_URL.$vehicle->vehicle_front_img; ?>" id="vehicle_front_img" alt="" sizes="" srcset="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="vehicle_back_img"><b>Vehicle Back Img</b></label><br><br>
                          
                            <img src="<?php echo UPLOADS_URL.$vehicle->vehicle_back_img; ?>" id="vehicle_back_img"alt="" sizes="" srcset="">
                           
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>



