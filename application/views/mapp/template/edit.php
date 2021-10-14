
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Template Add/Edit</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('mapp/template') ?>" class="btn btn-sm btn-secondary">Back</a>
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
                            <label for="template_name">Template Name </label>
                            <input type="text" name="template_name" class="form-control" value="<?php if(!empty(set_value('template_name'))){ echo set_value('template_name'); }elseif(isset($record->template_name)){ echo $record->template_name; } ?>" id="template_name" placeholder="Title" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="template_image">Image *</label>
                            <input type="file" name="template_image" class="form-control"/>
                        </div>
                        
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Save Detail</button>
                </form>

            </div>
        </div>
    </div>
</div>