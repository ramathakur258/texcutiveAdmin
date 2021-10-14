
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Customers</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button class="btn btn-sm btn-outline-secondary">Share</button>
            <button class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <a href="" class="btn btn-sm btn-secondary ml-2">Export</a>
       
    </div>
</div>
<?php  echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
               
             
                    <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap flex-row-reverse align-items-center pt-2 pb-2">
                       
                        <form class="form-inline" method="get">
                          
                            
                            <input type="text" class="form-control form-control-sm  ml-1" name="keyword" value="" placeholder="keyword">
                            <button type="submit" class="btn btn-sm btn-primary  ml-1">Search</button>
                            <a href="<?php echo current_url(); ?>" class="btn btn-sm btn-outline-primary  ml-2">Clear</a>
                        </form>
                        <?php echo "Record : ".$total_rows; ?>
                    </div>
              
                <div class="table-responsive">
                    <table class="table text-center" >
                        <thead>
                            <tr>
                                <th scope="col">DETAIL</th>                                          
                                <th scope="col">Device</th> 
                                <th scope="col">Status</th>
                                <th scope="col">Lock Status</th>
                                <th scope="col">Activate Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if(!empty($users)){
                                    foreach($users as $row)
                                    {
                                       
                                            ?>
                                            <tr>
                                               
                                                <td>
                                                    <strong><?php echo $row->name; ?>    </strong>                                            
                                                    <p class="m-0"><?php echo $row->phone; ?></p>
                                                   <p class="m-0"> <?php echo $row->email; ?></p>
                                                </td>
                                                <td><?php  echo $row->device_name; ?><br><?php  echo $row->latitude."<br>".$row->longitude; ?></td>

                                                <td>
                                                <?php
                                                if ($row->lock_status=='closed') {
                                                    ?>
                                                    <span class="badge badge-danger"> <i class="fa fa-star"></i> Closed</span>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <span class="badge badge-success">Active</span>
                                                    <?php
                                                } ?>
                                                
                                                <br>
                                                   <?php
                                                
                                                   
                                                  $current_active_time=strtotime(date('Y-m-d H:i:s', strtotime('-5 hours'))); 
                                                if ($current_active_time > strtotime($row->active_time)) {
                                                    ?>
                                                    <span class="badge badge-warning"> <i class="fa fa-star"> Searching..</i> </span>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <span class="badge badge-primary">Installed</span>
                                                    <?php
                                                } ?>
                                                
                                              
                                                
                                                
                                                </td>
                                              
                                                <td>
                                                <?php
                                                if ($row->lock_status=='locked') {
                                                    ?>
                                                    <span class="badge badge-danger"> <i class="fa fa-star"></i> Locked</span>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <span class="badge badge-success">Unlocked</span>
                                                    <?php
                                                } ?>
                                                <br>

                                                <?php
                                                if ($row->lock_status=='locked') {
                                                    ?>
                                                     <a class="btn btn-outline-success btn-sm mt-1" href="<?php echo site_url('device/lockunlock/'.$row->customer_id) ?>" >Unlock Device</a>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a class="btn btn-outline-danger btn-sm mt-1" href="<?php echo site_url('device/lockunlock/'.$row->customer_id) ?>" >Lock Device</a>
                                                    <?php
                                                } ?>
                                                </td>
                                                <td><?php  echo date("d M Y h:i A",strtotime($row->created_at)); ?></td>
                                                <td>
                                                
                                                   <?php
                                                   if($user->user_id==377){
                                                       ?>
                                                        <a class="btn btn-outline-danger btn-sm mt-1" onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo site_url('device/remove/'.$row->id) ?>"  >Remove</a>
                                                       <?php
            
                                                    }
                                                   ?>
                                                    <!--a class="btn btn-outline-primary btn-sm mt-1" href="<?php echo site_url('device/track/'.$row->customer_id) ?>" >Track</a-->
                                                    <a class="btn btn-outline-primary btn-sm mt-1" href="https://maps.google.com/?q=<?php echo $row->latitude.",".$row->longitude; ?>&z=8" target="_blank" >Track</a>
                                                </td>
                                                
                                            </tr>
                                            
                                        
                                        <?php
                                        
                                    }

                                }
                            ?>
                           
                        </tbody>
                    </table>
                    <?php echo $pagination ?>

                </div>
            </div>
        </div>
    </div>
</div>