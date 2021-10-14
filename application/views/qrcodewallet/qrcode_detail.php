
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">QRCODE - <?php echo strtoupper($wallet_user->first_name." ".$wallet_user->last_name); ?></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    <a href="<?php echo site_url("qrcodewallet"); ?>" class="btn btn-sm btn-primary ml-2">Back</a>
        
       
    </div>
</div>
<?php echo validation_errors(); if(isset($message)){ echo $message;}  ?>
<div class="row">
    <div class="col-sm-5">
        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype='multipart/form-data' >
                    
                    <div class="form-row">
                        <strong>Add Qrcode</strong>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="number" class="form-control" name="no_of_code" value=""  >  
                                <input type="hidden" class="form-control" name="txn_type" value="credit"  >                           
                            </div>
                            
                        </div>
                        
                    </div> 
                
                    <button type="submit" class="btn btn-primary">Add Qty</button>
                </form>

            </div>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype='multipart/form-data' >
                    
                    <div class="form-row">
                        <strong>DEDUCT QRCODE QTY</strong>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="number" class="form-control" name="no_of_code" value=""  >  
                                <input type="hidden" class="form-control" name="txn_type" value="debit"  >                           
                            </div>
                            
                        </div>
                        
                    </div> 
                
                    <button type="submit" class="btn btn-primary">Deduct Qty</button>
                </form>

            </div>
        </div>
    </div>
</div>
<hr>
<?php  echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body p-0">
               
                <div class="table-responsive">
                    <table class="table text-center" >
                        <thead>
                            <tr>
                                <th scope="col">ID</th>  
                                <th scope="col">Type</th>                                        
                                <th scope="col">Codes</th>
                                <th scope="col">Added By</th>
                                <th scope="col">created_at</th>  
                               
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                if(!empty($history)){
                                    foreach($history as $row)
                                    { ?>
                                        <tr>
                                          
                                            <td><?php echo $row->id; ?></td>
                                            <td>
                                              
                                                <?php
                                            if($row->to_user_id==$wallet_user->id){
                                                echo '<p class="text-success">Credit</p>';
                                            }else{
                                                if($row->txn_type=='credit'){
                                                    echo '<p class="text-success">'.$row->txn_type.'</p>';
                                                }else{
                                                    echo '<p class="text-danger">'.$row->txn_type.'</p>';
                                                }
                                               
                                            }
                                             ?>
                                        
                                        </td>
                                            <td><?php echo $row->no_of_code; ?></td>
                                            <td><?php
                                            if($row->to_user_id==$wallet_user->id){
                                                echo '<p  >'.$row->to_comment.'</p>';
                                            }else{
                                                echo '<p >'.$row->from_comment.'</p>';
                                            }
                                             ?></td>
                                            <td><?php echo date("d-m-Y h:i:A",strtotime($row->created_at)); ?></td>
                                            
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