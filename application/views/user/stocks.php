
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Roles</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <!--div class="btn-group mr-2">
            <button class="btn btn-sm btn-outline-secondary">Share</button>
            <button class="btn btn-sm btn-outline-secondary">Export</button>
        </div-->
        <a href="<?php echo site_url('user/stockAdd/'.$customer_id) ?>" class="btn btn-sm btn-primary"> Add Stock</a>
    </div>
</div>
<?php  echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <!--h5 class="card-title">Customers</h5-->
                <div class="table-responsive">
                    <table class="table" >
                        <thead>
                            <tr>
                                <th scope="col">ORDER ID</th>
                                <th scope="col">QTY</th> 
                                <th scope="col">Type</th>                                                      
                                <th scope="col">ORDER STATUS</th>
                                <th scope="col">DATE</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if(!empty($records)){
                                    foreach($records as $row){
                                        ?>
                                            <tr>
                                               
                                                <td><?php echo $row->id; ?></td>
                                                <td><?php echo $row->qty; ?></td>
                                                <td><?php echo $row->order_type; ?></td>
                                               
                                                <td>

                                                <?php

                                                    if($row->status=='pending'){
                                                        ?>
                                                             <div class="badge badge-primary" >In process</div>
                                                        <?php 

                                                    }elseif($row->status=='confirmed'){
                                                        ?>
                                                             <div class="badge badge-secondary" >Confirmed</div>
                                                        <?php
                                                    }elseif($row->status=='dispatched' ){
                                                        ?>
                                                             <div class="badge badge-warning" >Dispatched</div>
                                                        <?php
                                                    }elseif($row->status=='delivered'){
                                                        ?>
                                                             <div class="badge badge-success" >Delivered</div>
                                                        <?php
                                                    }elseif($row->status=='cancelled'){
                                                        ?>
                                                             <div class="badge badge-danger" >Cancelled</div>
                                                        <?php
                                                    }elseif($row->status=='rejected'){
                                                        ?>
                                                             <div class="badge badge-danger" >Rejected</div>
                                                        <?php
                                                    }
                                                    
                                                    
                                                    ?>
                                                
                                                </td>
                                                <td><?php echo date("d M Y h:i A",strtotime($row->created_at)); ?></td>
                                                
                                               
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