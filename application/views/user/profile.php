
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Profile</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('dashboard') ?>" class="btn btn-sm btn-secondary">Back</a>
    </div>
</div>
<?php echo validation_errors(); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
            <div class="container d-flex ">
                    <div class="d-flex align-items-center w-100">
                        <div class="image"> <img src="<?php echo UPLOADS_URL."avatar/".$record->avatar; ?>" class="rounded" width="155"> </div>
                        <div class="ml-3 w-100">
                            <h4 class="mb-0 mt-0"><?php echo $record->first_name." ".$record->last_name; ?></h4> <span><?php echo $role->name; ?></span>
                            <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                                <div class="d-flex flex-column"> <span class="articles">Wallet</span> <span class="number1">38</span> </div>
                                <div class="d-flex flex-column"> <span class="followers">Referral</span> <span class="number2"><?php echo $referral; ?></span> </div>
                            </div>
                            <!--div class="button mt-2 d-flex flex-row align-items-center"> <button class="btn btn-sm btn-outline-primary w-100">Chat</button> <button class="btn btn-sm btn-primary w-100 ml-2">Follow</button> </div-->
                        </div>
                    </div>
            </div>
            <hr>
            <form action="" method="post" enctype='multipart/form-data' >
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="team-tab" data-toggle="tab" href="#team" role="tab" aria-controls="team" aria-selected="true">Team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="wallet-tab" data-toggle="tab" href="#wallet" role="tab" aria-controls="wallet" aria-selected="false">Wallet</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="referral-tab" data-toggle="tab" href="#referral" role="tab" aria-controls="referral" aria-selected="false">Referrals</a>
                        </li>
                       
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active pt-3" id="team" role="tabpanel" aria-labelledby="team-tab">
                            
                        </div>               
                        <div class="tab-pane fade  pt-3" id="wallet" role="tabpanel" aria-labelledby="wallet-tab">
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

                                    if(!empty($wallet))
                                    {
                                        $user_id=$record->id;

                                        foreach($wallet as $row)
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

                        </div>
                        </div>  
                        <div class="tab-pane fade  pt-3" id="referral" role="tabpanel" aria-labelledby="referral-tab">
                            <div class="table-responsive">
                                <table class="table makedatatable" >
                                    <thead>
                                        <tr>
                                            <!--th scope="col">AVATAR</th-->
                                            <th scope="col">DETAIL</th>
                                            <th scope="col">KYC</th>                                        
                                            <th scope="col">MEMBERSHIP</th>
                                            <th scope="col">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                            if(!empty($referrals)){
                                                foreach($referrals as $row){
                                                    ?>
                                                        <tr>
                                                            <!--td>
                                                            <img src="<?php echo UPLOADS_URL."profile/".$row->avatar; ?>" style="width:50px;height:50px;" >
                                                            </td-->
                                                            <td>
                                                                <strong><?php echo $row->first_name." ".$row->last_name; ?>    </strong>                                            
                                                                <p class="m-0"><?php echo $row->phone; ?></p>
                                                            <p class="m-0"> <?php echo $row->email; ?></p>
                                                            </td>
                                                            <td>
                                                            <?php 
                                                            if($row->is_kyc=="pending"){
                                                                ?>
                                                                <span class="badge badge-danger"> Pending</span>
                                                                <?php
                                                            }elseif($row->is_kyc=="process"){
                                                                ?>
                                                                <span class="badge badge-warning"> In Process</span>
                                                                <?php
                                                            }elseif($row->is_kyc=="success"){
                                                                ?>
                                                                <span class="badge badge-success"></i> Approved</span>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <span class="badge badge-danger"> Resubmit</span>
                                                                <?php
                                                            }
                                                            
                                                            
                                                            ?>
                                                            </td>
                                                        
                                                            <td>
                                                            <?php $current_date=strtotime(date("Y-m-d H:i:s"));
                                                            if(!empty($row->membership_start_date) && strtotime($row->membership_start_date) < $current_date && strtotime($row->membership_end_date) > $current_date )
                                                            {
                                                                ?>
                                                                <span class="badge badge-success"> <i class="fa fa-star"></i> PAID</span>
                                                                <p style="margin:0;"><?php echo "Activation Date : ".date("d M Y",strtotime($row->membership_end_date)); ?></p>
                                                                <p style="margin:0;"><?php echo "Expire Date : ".date("d M Y",strtotime($row->membership_end_date)); ?></p>
                                                                <?php

                                                            }else
                                                            {
                                                                ?>
                                                                <span class="badge badge-danger">UNPAID</span>
                                                                <?php
                                                            }
                                                            ?>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-outline-primary btn-sm" href="<?php echo site_url('user/profile/'.$row->id) ?>" ><span class="fa fa-info"> Views<span></a>
                                                            
                                                            </td>
                                                        </tr>
                                                    
                                                    <?php
                                                }

                                            }else{
                                                ?>
                                                <tr>
                                                <td colspan="6" style="text-align: center;font-size: 30px;color: orange;"> Record not found</td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                    
                                    </tbody>
                                </table>

                            </div>       
                        </div>
                        <div class="tab-pane fade  pt-3" id="amenities" role="tabpanel" aria-labelledby="amenities-tab">
                                 
                        </div>
                        <div class="tab-pane fade  pt-3" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                            
                        </div>
                        <div class="tab-pane fade  pt-3" id="trainers" role="tabpanel" aria-labelledby="trainers-tab">
                            
                        </div>
                        <div class="tab-pane fade  pt-3" id="description" role="tabpanel" aria-labelledby="description-tab">
                           
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>