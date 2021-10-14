
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Lucky numbers</h1>
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
            <div class="card-body">
               
             
                    <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap flex-row-reverse align-items-center pt-2 pb-2">
                       
                        <form class="form-inline" method="get">
                            
                            
                            <input type="text" class="form-control form-control-sm  ml-1" name="keyword" value="" placeholder="keyword">
                            <button type="submit" class="btn btn-sm btn-primary  ml-1">Search</button>
                            <a href="" class="btn btn-sm btn-outline-primary  ml-2">Clear</a>
                        </form>
                        <?php echo "Record : ".$total_rows; ?>
                    </div>
              
                <div class="table-responsive">
                    <table class="table makedatatable" >
                        <thead>
                            <tr>
                                <th scope="col">AVATAR</th>
                                <th scope="col">DETAIL</th>
                                <th scope="col">LUCKY_NO</th>                                                      
                                <th scope="col">MEMBERSHIP</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if(!empty($users)){
                                    foreach($users as $row){
                                        ?>
                                            <tr>
                                                <td>
                                                <img src="<?php echo UPLOADS_URL."avatar/".$row->avatar; ?>" style="width:50px;height:50px;" >
                                                </td>
                                                <td>
                                                    <strong><?php echo $row->first_name." ".$row->last_name; ?>    </strong>                                            
                                                    <p class="m-0"><?php echo $row->phone; ?></p>
                                                   <p class="m-0"> <?php echo $row->email; ?></p>
                                                </td>
                                                <td> <?php echo $row->lucky_number; ?></td>
                                               
                                                <td>
                                                <?php $current_date=strtotime(date("Y-m-d H:i:s"));
                                                if(!empty($row->membership_start_date) && strtotime($row->membership_start_date) < $current_date && strtotime($row->membership_end_date) > $current_date )
                                                {
                                                    ?>
                                                    <span class="badge badge-success"> <i class="fa fa-star"></i> PAID</span>
                                                    <?php

                                                }else
                                                {
                                                    ?>
                                                    <span class="badge badge-danger">UNPAID</span>
                                                    <?php
                                                }
                                                ?>
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