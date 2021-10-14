
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Permission Sections</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo site_url('mapp/permission_section/edit'); ?>" class="btn btn-sm btn-primary ml-2"> Add New </a>
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
                            <a href="<?php echo site_url('mapp/permission_section'); ?>" class="btn btn-sm btn-outline-primary  ml-2">Clear</a>
                        </form>
                      
                    </div>
              
                <div class="table-responsive">
                    <table class="table makedatatable" >
                        <thead>
                            <tr>
                             
                                <th scope="col">Permission ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Template</th>
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
                                                    <?php echo $row->p_section_id; ?>
                                                </td>
                                               
                                                <td>
                                                    <?php echo $row->section_name; ?>
                                                </td>
                                        
                                                <td><?php echo implode(',',json_decode($row->template_id)); ?></td>
                                                <td>
                                                    <a class="btn btn-outline-primary btn-sm" href="<?php echo site_url('mapp/permission_section/edit/'.$row->p_section_id) ?>" ><span class="fa fa-pencil-alt"><span></a>
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