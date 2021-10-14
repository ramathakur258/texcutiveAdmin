
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Add/Edit</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('user/groups') ?>" class="btn btn-sm btn-secondary">Back</a>
    </div>
</div>
<?php echo validation_errors(); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype='multipart/form-data' >
                    
                <div class="form-row">
                    <strong>Group Name</strong>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" value="<?php if(!empty(set_value('name'))){ echo set_value('name'); }elseif(isset($record->name)){ echo $record->name; } ?>"  >                           
                        </div>
                        
                    </div>
                </div> 
                
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>

            </div>
        </div>
    </div>
</div>