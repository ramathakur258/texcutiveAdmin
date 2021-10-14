
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Locked Device</h1>
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
                        <?php echo "Device Locked : ".$total_rows; ?>
                    </div>
              
                <div class="table-responsive">
                    <table class="table" >
                        <thead>
                            <tr>
                                <th scope="col">DETAIL</th>                                          
                                <th scope="col">Device</th>                               
                                <th scope="col">Address</th>                                
                                <th scope="col">Lock Date</th>
                                <th scope="col">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if(!empty($devices)){
                                    foreach($devices as $row)
                                    {
                                       
                                            ?>
                                            <tr>
                                               
                                                <td>
                                                    <strong><?php echo $row->name; ?>    </strong>                                            
                                                    <p class="m-0"><?php echo "M:".$row->phone; ?></p>
                                                    <p class="m-0"><?php echo "ALT:".$row->alternate_mobile_number; ?></p>
                                                   
                                                </td>
                                                <td><strong><?php  echo $row->device_name; ?></strong><br>
                                                <p class="m-0"> <span class="badge badge-danger"> <i class="fa fa-lock"></i> Locked</span></p>
                                                </td>
                                                <td><?php  echo $row->address; ?>

                                                <br><?php  echo $row->latitude."".$row->longitude; ?>
                                            
                                                </td>
                                             
                                               
                                                <td>
                                                    <?php  echo date("d M Y",strtotime($row->created_at)); ?><br>
                                                    <?php  echo date("h:i A",strtotime($row->created_at)); ?>
                                            
                                                </td>
                                                <td>
                                              
                                                    <a class="btn btn-outline-success btn-sm" href="<?php echo site_url('device/unlock/'.$row->chokidar_device_info_id) ?>" >Unlock</a>   
                                                    <br> 
                                                    <a class="btn btn-outline-primary btn-sm mt-1" href="<?php echo site_url('device/mainAppTrack/'.$row->chokidar_device_info_id) ?>" >Track</a>
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