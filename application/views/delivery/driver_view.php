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
    <h1 class="h4">Driver Detail</h1>
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
                            <label for="first_name"><b>First Name</b></label>
                            <input type="text" name="first_name"  class="form-control" value="<?php echo $drivers->first_name; ?>"  placeholder="" />
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="first_name"><b>Last Name</b></label>
                            <input type="text" name="first_name"  class="form-control" value="<?php echo $drivers->last_name; ?>"  placeholder="" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email"><b>Email</b></label>
                            <input type="text" name="email"  class="form-control" value="<?php echo $drivers->email; ?>"  placeholder="" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone"><b>phone</b></label>
                            <input type="text" name="mobile"  id="phone" class="form-control" value="<?php echo $drivers->mobile; ?> " placeholder="" />
                            <div id="result"></div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>



