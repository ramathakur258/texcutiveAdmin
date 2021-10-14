
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">My Referrals</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <!--div class="btn-group mr-2">
            <button class="btn btn-sm btn-outline-secondary">Share</button>
            <button class="btn btn-sm btn-outline-secondary">Export</button>
        </div-->
        
    </div>
</div>
<?php  echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
               
            
                    <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap flex-row-reverse align-items-center pt-2 pb-2">
                        
                        <form class="form-inline" method="get">
                            <input type="hidden" name="ids" value="<?php echo $this->input->get("ids") ?>" >
                            <select name="kyc_status" class="form-control form-control-sm ml-1">
                                <option value="all">KYC STATUS</option>
                                <option value="pending" <?php if($this->input->get('kyc_status')=='pending'){ echo 'selected="selected"';} ?> > No KYC </option>
                                <option value="process" <?php if($this->input->get('kyc_status')=='process'){ echo 'selected="selected"';} ?> >In Process </option>  
                                <option value="success" <?php if($this->input->get('kyc_status')=='success'){ echo 'selected="selected"';} ?> > Approved </option>   
                                <option value="resubmit" <?php if($this->input->get('kyc_status')=='resubmit'){ echo 'selected="selected"';} ?> >Rejected  </option>                                     
                            </select>
                            <select name="membership_status" class="form-control form-control-sm ml-1">
                                <option value="all">ALL USERS</option>
                                <option value="paid" <?php if($this->input->get('membership_status')=='paid'){ echo 'selected="selected"';} ?> > Paid Membership</option>
                                <option value="free" <?php if($this->input->get('membership_status')=='free'){ echo 'selected="selected"';} ?> > Free Membership</option>    
                                <option value="expired" <?php if($this->input->get('membership_status')=='expired'){ echo 'selected="selected"';} ?> > Expired Membership</option>                            
                            </select>
                            
                            <input type="text" class="form-control form-control-sm ml-1" name="keyword" value="<?php echo $this->input->get("keyword") ?>" placeholder="keyword">
                            <button type="submit" class="btn btn-sm btn-primary ml-1">Search</button>
                            <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-outline-primary  ml-2">Clear</a>
                        </form>
                        <strong>Record: <?php echo $record_count; ?></strong>
                        
                    </div>
              
                <div class="table-responsive">
                    <table class="table makedatatable" >
                        <thead>
                            <tr>
                                <!--th scope="col">AVATAR</th-->
                                <th scope="col">DETAIL</th>
                                <th scope="col">ROLE</th>
                                <th scope="col">KYC</th>
                               
                                <th scope="col">MEMBERSHIP</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if(!empty($users)){
                                    foreach($users as $row){
                                        ?>
                                            <tr>
                                                <!--td>
                                                <img src="<?php echo UPLOADS_URL."profile/".$row->profile_image; ?>" style="width:50px;height:50px;" >
                                                </td-->
                                                <td>
                                                    <strong><?php echo $row->first_name." ".$row->last_name; ?>    </strong>                                            
                                                    <p class="m-0"><?php echo $row->phone; ?></p>
                                                   <p class="m-0"> <?php echo $row->email; ?></p>
                                                </td>
                                                <td><?php echo $row->role; ?></td>
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
                                                    <a class="btn btn-outline-primary btn-sm" href="<?php echo site_url('customer/referrals?ids='.$row->id) ?>" ><span class="fa fa-info"> View Tree<span></a>
                                                
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
                    <?php echo $pagination ?>

                </div>
            </div>
        </div>
    </div>
</div>