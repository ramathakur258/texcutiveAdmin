
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Drivers View/Edit</h1>
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
                            <label for="first_name">Driver Name *</label>
                            <input type="text" name="first_name" readonly class="form-control" value="<?php echo $user->display_name; ?>"  placeholder="Contact number" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone"> phone *</label>
                            <input type="text" name="phone"  id="phone" class="form-control" value=" " id="email" placeholder="Phone" />
                            <div id="result"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email *</label>
                            <input type="text" name="email" readonly class="form-control" value="<?php echo $user->display_name; ?>"  placeholder="Contact number" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password"> Password *</label>
                            <input type="text" name="password"  id="phone" class="form-control" value=" " id="email" placeholder="Phone" />
                            <div id="result"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Detail</button>
                </form>

            </div>
        </div>
    </div>
</div>



