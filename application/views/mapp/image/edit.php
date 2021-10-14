<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Image Add/Edit</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('mapp/image') ?>" class="btn btn-sm btn-secondary">Back</a>
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
                            <label for="type">Image Type</label>
                            <select id="status" name="type" class="form-control">
                <option value="Image" <?php if(!empty($type) && $type->type == 'Image' ) { echo "Selected"; } ?> >Image</option>
                <option value="Audio"  <?php if(!empty($type) && $type->type == 'Audio' ) { echo "Selected"; } ?> >Audio</option>
                 <option value="Video"  <?php if(!empty($type) && $type->type == 'Video' ) { echo "Selected"; } ?> >Video</option>
            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="image_path">Image *</label>
                            <input type="file" name="image_path" class="form-control"/>
                        </div>
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Save Detail</button>
                </form>

            </div>
        </div>
    </div>
</div>