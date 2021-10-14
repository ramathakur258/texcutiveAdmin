
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Ticket Category Add/Edit</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('ticket/ticketCategory') ?>" class="btn btn-sm btn-secondary">Back</a>
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
                            <label for="cat_name">Category Name *</label>
                            <input type="text" name="cat_name"  class="form-control" value="<?php if(isset($category->cat_name)){  echo $category->cat_name; }?>"  placeholder="Category" />
                            <label for="cat_name">Parent Category</label>
                            <select  name="parent_id" class="form-control">
                                <option value="0" >Select Parent Category</option>
                                  <?php echo $categories; ?>
                          
                           
                            </select>

                        </div>
                       
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary">Save Detail</button>
                </form>

            </div>
        </div>
    </div>
</div>