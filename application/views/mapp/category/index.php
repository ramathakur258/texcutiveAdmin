
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Category</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo site_url('mapp/category/edit'); ?>" class="btn btn-sm btn-primary ml-2"> Add New Category</a>
    </div>
</div>
<?php  echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                    <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap flex-row-reverse align-items-center pt-2 pb-2">
                        <form class="form-inline" method="get">
                            <input type="text" class="form-control form-control-sm  ml-1" name="keyword" value="<?php echo $this->input->get('keyword'); ?>" placeholder="keyword">
                            <button type="submit" class="btn btn-sm btn-primary  ml-1">Search</button>
                            <a href="<?php echo site_url('mapp/category'); ?>" class="btn btn-sm btn-outline-primary  ml-2">Clear</a>
                        </form>
                        <form action="<?php echo base_url('mapp/category/change_action'); ?>" method="POST">
                          <input type="hidden" name="user_ids" id="user_ids">
                          <select onchange="this.form.submit()" class="form-control" name="status">
                                    <option value="" selected disabled >Select Action </option>
                                    <option value='0'>ACTIVE</option>
                                    <option value="1" >INACTIVE</option>
                          </select>
                       </form>
                    </div>
              
                <div class="table-responsive">
                    <table class="table makedatatable" >
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="checkboxes" onClick="toggle(this)"></th>
                                <th scope="col">IMAGE</th>
                                <th scope="col">CATEGORY</th>
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
                                                  <img style="max-height:60px;" src="<?php echo public_path('category/'.$row->category_image); ?>">
                                                </td>
                                                <td>
                                                    <?php echo $row->category_title; ?>
                                                </td>
                                                <td>
                                                    <?php if($row->status == 1){ echo "INACTIVE"; }else{ echo "ACTIVE";} ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-outline-primary btn-sm" href="<?php echo site_url('mapp/category/edit/'.$row->id) ?>" ><span class="fa fa-pencil-alt"><span></a>
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