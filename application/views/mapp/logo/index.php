
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Logo</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <?php if(empty($result)) { ?>
        <a href="<?php echo site_url('mapp/logo/edit'); ?>" class="btn btn-sm btn-primary ml-2"> Add New Logo</a>
        
        <?php } ?>
    </div>
</div>
<?php  echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                    <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap flex-row-reverse align-items-center pt-2 pb-2">
                      
                    </div>
              
                <div class="table-responsive">
                    <table class="table makedatatable" >
                        <thead>
                            <tr>
                                <!--th scope="col">AVATAR</th-->
                                <!--<th><input type="checkbox" class="checkboxes" onClick="toggle(this)"></th>-->
                                <th scope="col">Logo</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if(!empty($result)){
                                    foreach($result as $row){
                                        ?>
                                            <tr>
                                                <!--<td>-->
                                                <!--  <input type="checkbox" class="checkboxes " name='check_all'  value="<?php echo $row->id; ?>"> -->
                                                 
                                                <!--</td>-->
                                                <td >
                                                    <img style="max-height:100px;"  src="<?php echo public_path('logo/'.$row->logo_image); ?>">
                                                </td>
                                                <td>
                                                    <a class="btn btn-outline-primary btn-sm" href="<?php echo site_url('mapp/logo/edit/'.$row->id) ?>" ><span class="fa fa-pencil-alt"><span></a>
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