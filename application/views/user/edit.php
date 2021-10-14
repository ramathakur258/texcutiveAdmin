
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">User Add/Edit</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('admin/users') ?>" class="btn btn-sm btn-secondary">Back</a>
    </div>
</div>
<?php echo validation_errors(); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype='multipart/form-data' >
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="phone">Mobile Number *</label>
                            <input type="text" name="phone" readonly class="form-control" value="<?php if(!empty(set_value('phone'))){ echo set_value('phone'); }elseif(isset($record->phone)){ echo $record->phone; } ?>" id="phone" placeholder="Contact number" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email Address *</label>
                            <input type="text" name="email" readonly class="form-control" value="<?php if(!empty(set_value('email'))){ echo set_value('email'); }elseif(isset($record->email)){ echo $record->email; } ?>" id="email" placeholder="Email Address" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="<?php if(!empty(set_value('first_name'))){ echo set_value('first_name'); }elseif(isset($record->first_name)){ echo $record->first_name; } ?>" id="first_name" placeholder="First name" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="<?php if(!empty(set_value('last_name'))){ echo set_value('last_name'); }elseif(isset($record->last_name)){ echo $record->last_name; } ?>" id="last_name" placeholder="Last name" />
                        </div>                        
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="alternate_mobile_number">Altername Mobile</label>
                            <input type="text" name="alternate_mobile_number" class="form-control" value="<?php if(!empty(set_value('alternate_mobile_number'))){ echo set_value('alternate_mobile_number'); }elseif(isset($record->alternate_mobile_number)){ echo $record->alternate_mobile_number; } ?>" id="alternate_mobile_number" placeholder="alternate mobile number" />
                        </div>        
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" value="<?php if(!empty(set_value('password'))){ echo set_value('password'); } ?>" id="password" placeholder="********" />
                        </div>
                        
                    </div>
                    
                    <?php 
                    
                    if(empty($record->parent_id) ){  ?>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="parent_id">Referral ID</label>
                            <input type="text" name="parent_id" class="form-control" value="<?php if(!empty(set_value('parent_id'))){ echo set_value('parent_id'); }elseif(isset($record->parent_id)){ echo $record->parent_id; } ?>" id="parent_id" placeholder="Parent_id" />
                        </div>        
                       
                    </div>
                    <?php } ?>

                      
                    
                    <button type="submit" class="btn btn-primary">Save Detail</button>
                </form>

            </div>
        </div>
    </div>
</div>