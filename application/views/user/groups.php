
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Groups</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <!--div class="btn-group mr-2">
            <button class="btn btn-sm btn-outline-secondary">Share</button>
            <button class="btn btn-sm btn-outline-secondary">Export</button>
        </div-->
        <a href="<?php echo site_url('admin/userEdit') ?>" class="btn btn-sm btn-primary"> Add New User</a>
    </div>
</div>
<?php  echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <!--h5 class="card-title">Customers</h5-->
                <div class="table-responsive">
                    <table class="table makedatatable" >
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if(!empty($records)){
                                    foreach($records as $row){
                                        ?>
                                            <tr>
                                               
                                                <td><?php echo $row->name; ?></td>
                                                
                                                <td>
                                                    <a class="btn btn-outline-primary btn-sm" href="<?php echo site_url('user/groupEdit/'.$row->id) ?>" ><span class="fa fa-pencil-alt"><span></a>
                                                
                                                </td>
                                            </tr>
                                        
                                        <?php
                                    }

                                }
                            ?>
                           
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>