
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Enquiry</h1>
    <!--<div class="btn-toolbar mb-2 mb-md-0">-->
    <!--    <a href="<?php echo site_url('mapp/brand/edit'); ?>" class="btn btn-sm btn-primary ml-2"> Add New Brand</a>-->
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
                            <a href="<?php echo site_url('mapp/enquiry'); ?>" class="btn btn-sm btn-outline-primary  ml-2">Clear</a>
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
                                <th scope="col">shop Name</th>
                                 <th scope="col">Approval Status</th>
                                <th scope="col">Payment Status</th>
                                 <th scope="col">Payment Type</th>
                                <?php if($this->session->userdata("user_id") == '377') { ?>
                                <th scope="col">Merchant Id</th>
                                  <th scope="col">Template</th>
                                <?php }  ?>
                                <th scope="col">View</th>
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
                                                <td>
                                                    <?php echo $row->first_name; echo '&nbsp'; echo $row->last_name; ?>
                                                </td>
                                                 <td>
                                                    <?php echo $row->email; ?>
                                                </td>
                                                 <td>
                                                    <?php echo $row->mobile; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->shop_name; ?>
                                                </td>
                                                 <td>
                                                     <?php if($row->approval_status == 'approved') {?>
                                                <span style="color:green;"><b><?php echo $row->approval_status; ?></b></span>
                                                <?php }else{ ?>
                                                      <span style="color:red;"><b><?php echo $row->approval_status; ?></b></span>
                                                    <?php } ?>
                                                </td>
                                                 <td>
                                                  
                                                     <?php if($row->payment_status == 'completed') {?>
                                                <span style="color:green;"><b><?php echo $row->payment_status; ?></b></span>
                                                <?php }else{ ?>
                                                      <span style="color:red;"><b><?php echo $row->payment_status; ?></b></span>
                                                    <?php } ?>
                                                    
                                                    
                                                    
                                                </td>
                                                <td><?php if(!empty($row->payment_type)) { echo $row->payment_type; }else{
                                                echo "pending";} ?></td>
                                                 <?php if($this->session->userdata("user_id") == '377') { ?>
                                                  <td>
                                                    <?php if(!empty($row->merchant_id)) { echo "generated"; echo "<br>"; echo $row->merchant_id; }else{ ?>
                                                      <a class="btn btn-outline-primary btn-sm" href="<?php echo site_url('mapp/enquiry/generate_id/'.$row->id) ?>" >generate</a>
                                                   
                                                    <?php } ?>
                                                </td>
                                                 <td>
                                                    <?php if(!empty($row->merchant_id)) { ?>
                                                        
                                                        <a class="btn btn-outline-primary btn-sm" href="<?php echo site_url('mapp/enquiry/assign_template/'.$row->id.'/'.$row->merchant_id) ?>" > <?php if(!empty($row->app_theme)){ echo "update" ;}else{ echo "Add" ;} ?></a>
                                                              
                                                    
                                                   <?php }else{ ?> <a  class="btn btn-outline-primary btn-sm disabled">Add</a> <?php } ?>
                                                </td>
                                                <?php } ?>
                                                 <td>
                                                    <a class="btn btn-outline-primary btn-sm" href="<?php echo site_url('mapp/enquiry/detail/'.$row->id) ?>" ><span class="fa fa-pencil-alt"><span></a>
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