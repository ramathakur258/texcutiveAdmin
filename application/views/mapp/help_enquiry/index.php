
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Help Enquiry</h1>
    <!--<div class="btn-toolbar mb-2 mb-md-0">-->
    <!--    <a href="<?php// echo site_url('mapp/brand/edit'); ?>" class="btn btn-sm btn-primary ml-2"> Add New Brand</a>-->
    <!--</div>-->
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
                            <a href="<?php echo site_url('mapp/help_enquiry'); ?>" class="btn btn-sm btn-outline-primary  ml-2">Clear</a>
                        </form>
                    
                    </div>
              
                <div class="table-responsive">
                    <table class="table makedatatable" >
                        <thead>
                            <tr>
                                <!--th scope="col">AVATAR</th-->
                                <!--<th><input type="checkbox" class="checkboxes" onClick="toggle(this)"></th>-->
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                 <th scope="col">Mobile</th>
                                <th scope="col">subject</th>
                                 <th scope="col">Message</th>
                              
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if(!empty($result)){
                                    foreach($result as $row){
                                        ?>
                                            <tr>
                                             
                                                <td>
                                                    <?php echo $row->full_name; ?>
                                                </td>
                                                 <td>
                                                    <?php echo $row->email; ?>
                                                </td>
                                                 <td>
                                                    <?php echo $row->phone; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->subject; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->message; ?>
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