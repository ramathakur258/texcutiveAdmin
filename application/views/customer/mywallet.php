
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Wallet</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <!--div class="btn-group mr-2">
            <button class="btn btn-sm btn-outline-secondary">Share</button>
            <button class="btn btn-sm btn-outline-secondary">Export</button>
        </div-->
        <!--a href="<?php echo site_url('admin/userEdit') ?>" class="btn btn-sm btn-primary"> Add New User</a-->
    </div>
</div>
<?php  echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
               
            
                    <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap flex-row-reverse align-items-center pt-2 pb-2">
                        
                        <form class="form-inline" method="get">
                    
                            
                            <input type="text" class="form-control form-control-sm mt-2 ml-1" name="keyword" value="<?php echo $this->input->get("keyword") ?>" placeholder="keyword">
                            <button type="submit" class="btn btn-sm btn-primary mt-2 ml-1">Search</button>
                            <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-outline-primary mt-2 ml-2">Clear</a>
                        </form>
                        <strong>Record: <?php echo $record_count; ?></strong>
                        
                    </div>
              
                <div class="table-responsive">
                    <table class="table makedatatable" >
                        <thead>
                            <tr>
                           
                                <th scope="col">ID</th>
                                <th scope="col">Type</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php

                            if(!empty($records))
                            {

                                foreach($records as $row)
                                {

                                    $comment=$row->from_comment;

                                ?>
                                    <tr>
                                        <td><?php echo $row->txn_id; ?></td>
                                        <td><?php
                                        if ($row->from_user_id==$user_id && $row->txn_type=='credit') 
                                        {
                                            $comment=$row->from_comment;
                                            ?>
                                            <span class="badge badge-success">CREDIT</span>
                                            <?php
                                        
                                        } else 
                                        {
                                            if ($row->to_user_id==$user_id) {
                                                $comment=$row->to_comment;
                                                ?>
                                            <span class="badge badge-success">CREDIT</span>
                                            <?php
                                            
                                                
                                            } else {
                                                $comment=$row->from_comment;
                                                ?>
                                            <span class="badge badge-danger">DEBIT</span>
                                            <?php                         
                                            
                                            }
                                        }
                                        
                                        
                                        ?></td>
                                        <td><?php echo $row->amount; ?></td>
                                        <td><?php echo $comment; ?></td>
                                        <td ><?php echo $row->created_at; ?></td>
                                    
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