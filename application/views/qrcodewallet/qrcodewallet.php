
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Qrcode Wallet</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button class="btn btn-sm btn-outline-secondary">Share</button>
            <button class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
       
       
    </div>
</div>
<?php  echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body p-0">
               
             
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
                                <th scope="col">Name</th>                                          
                                <th scope="col">Phone</th>
                                <th scope="col">Received</th>  
                                <th scope="col">Pending</th>  
                                <th scope="col">Rejected</th>                               
                                <th scope="col">Used</th>  
                                <th scope="col">Balance </th>                                 
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                if(!empty($users)){
                                    foreach($users as $row)
                                    {  //echo "<pre>";print_r( $row);echo "</pre>";
                                        ?>
                                        <tr>
                                            <td><strong><?php echo $row->first_name." ".$row->last_name; ?> </strong></td>
                                            <td><?php echo $row->phone; ?></td>
                                            <td><?php echo $row->total_credit; ?></td>                                          
                                            <td><?php echo $row->pending_count; ?></td>
                                            <td><?php echo $row->rejected_count; ?></td>
                                            <td><?php echo $row->approve_count; ?></td>
                                            <td><?php echo $row->bal; ?></td>
                                            <td><a class="btn btn-primary btn-sm" href="<?php echo site_url("qrcodewallet/qrcode_detail/".$row->wuser_id); ?>" > View <i class="fas fa-arrow-circle-right"></i></a></td>
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