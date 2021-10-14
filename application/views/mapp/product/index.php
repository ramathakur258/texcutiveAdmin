
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Products</h1>
    <div class="btn-toolbar mb-2 mb-md-0 file_custom">
        <a href="<?php echo site_url('mapp/product/add'); ?>" class="btn btn-sm btn-primary ml-2"> Add New Product</a>
         <!--<a href="<?php echo site_url('mapp/product/import'); ?>" class="btn btn-sm btn-primary ml-2">Import</a>-->
         <a href="<?php echo site_url('mapp/product?export=1'); ?>" class="btn btn-sm btn-primary ml-2">Export</a>
         <button href="javascript:void(0);" data-toggle="modal" data-target="#uploadfile" class="btn btn-sm btn-primary ml-2">Import</button>
         
<div class="modal fade" id="uploadfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
         <form action="<?php echo base_url('mapp/product/import'); ?>" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
                <input type="file" name="file"  />

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="importSubmit" value="Upload">Upload</button>
      </div>
      </form>
    </div>
  </div>
</div>
    </div>
</div>
<!-- File upload form -->
  
<?php  echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                    <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap flex-row-reverse align-items-center pt-2 pb-2">
                        <form class="form-inline" method="get">
                            <input type="text" class="form-control form-control-sm  ml-1" name="keyword" value="<?php echo $this->input->get('keyword'); ?>" placeholder="keyword">
                            <button type="submit" class="btn btn-sm btn-primary  ml-1">Search</button>
                            <a href="<?php echo site_url('mapp/product'); ?>" class="btn btn-sm btn-outline-primary  ml-2">Clear</a>
                        </form>
                        <form action="<?php echo base_url('mapp/product/change_action'); ?>" method="POST">
                          <input type="hidden" name="user_ids" id="user_ids">
                          <select onchange="this.form.submit()" class="form-control" name="status">
                                    <option value="" selected disabled >Select Action </option>
                                    <option value='0'>HIDE</option>
                                    <option value="1" >SHOW</option>
                          </select>
                       </form>
                    </div>
              
                <div class="table-responsive">
                    <table class="table makedatatable" >
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="checkboxes" onClick="toggle(this)"></th>
                                <th scope="col">IMAGE</th>
                                <th scope="col">PRODUCT NAME</th>                             
                                <th scope="col">CATEGORY</th>                             
                                <th scope="col">MRP</th>                             
                                <th scope="col">SP</th>                             
                                <th scope="col">QTY</th>                             
                                <th scope="col">STATUS</th>                             
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if(!empty($result)){
                                    foreach($result as $row){
                                        ?>
                                            <tr>
                                                <td>
                                                  <input type="checkbox" class="checkboxes " name='check_all'  value="<?php echo $row->id; ?>"> 
                                                 
                                                </td>
                                                <td>
                                                  <img style="max-height:60px;" src="<?php echo public_path('products/'.$row->product_image); ?>">
                                                </td>
                                                <td><?php echo $row->product_name; ?></td>
                                                <td><?php echo $row->category_title; ?></td>
                                                <td><?php echo $row->product_mrp; ?></td>
                                                <td><?php echo $row->product_sp; ?></td>
                                                <td><?php echo $row->product_qty.' '.$row->product_type; ?></td>
                                                <td>
                                                    <select onclick="ChangeStatus(`<?php echo $row->id; ?>`,this.value)">
                                                        <option value="0" <?php if($row->status==0){ echo "selected"; } ?>>Hide</option>
                                                        <option value="1" <?php if($row->status==1){ echo "selected"; } ?>>Show</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <a class="btn btn-outline-primary btn-sm" href="<?php echo site_url('mapp/product/edit/'.$row->id); ?>" ><span class="fa fa-pencil-alt"><span></a>
                                                </td>
                                            </tr>
                                        
                                        <?php
                                    }
                                }
                            ?>
                           
                        </tbody>
                    </table>
                    <?php  echo $pagination ?>
                </div>
            </div>
        </div>
    </div>
</div>
