
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Users</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button class="btn btn-sm btn-outline-secondary">Share</button>
            <button class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <a href="" class="btn btn-sm btn-secondary ml-2">Export</a>
        <a href="<?php echo site_url('admin/userEdit') ?>" class="btn btn-sm btn-primary ml-2"> Add New User</a>
    </div>
</div>
<?php  echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
               
            
                    <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap flex-row-reverse align-items-center pt-2 pb-2">
                    
                        <form class="form-inline" method="get">
                            <select name="kyc_status" class="form-control form-control-sm ml-1">
                                <option value="">KYC</option>
                                <option value="pending" <?php if($this->input->get('kyc_status')=='pending'){ echo 'selected="selected"';} ?> > No KYC </option>
                                <option value="process" <?php if($this->input->get('kyc_status')=='process'){ echo 'selected="selected"';} ?> >In Process </option>  
                                <option value="success" <?php if($this->input->get('kyc_status')=='success'){ echo 'selected="selected"';} ?> > Approved </option>   
                                <option value="resubmit" <?php if($this->input->get('kyc_status')=='resubmit'){ echo 'selected="selected"';} ?> >Rejected  </option>                                     
                            </select>
                            <select name="membership_status" class="form-control form-control-sm ml-1">
                                <option value="">Membership</option>
                                <option value="paid" <?php if($this->input->get('membership_status')=='paid'){ echo 'selected="selected"';} ?> > Paid </option>
                                <option value="free" <?php if($this->input->get('membership_status')=='free'){ echo 'selected="selected"';} ?> > Free </option>    
                                <option value="expired" <?php if($this->input->get('membership_status')=='expired'){ echo 'selected="selected"';} ?> > Expired </option>                            
                            </select>
                            <select  name="group_id"  class="form-control form-control-sm ml-1" >
                                <option value="" >Group</option>
                                <?php foreach ($groups as $grow){ ?>
                                <option value="<?php echo $grow->id; ?>" <?php if($grow->id==$this->input->get('group_id')){ echo 'selected="selected"'; } ?>  > <?php echo $grow->name; ?> </option>
                                <?php } ?>
                            </select>
                            <select  name="role_id"  class="form-control form-control-sm ml-1" >
                                <option value="" >Role</option>
                                <?php foreach ($roles as $rrow){ ?>
                                <option value="<?php echo $rrow->id; ?>" <?php if($rrow->id==$this->input->get('role_id')){ echo 'selected="selected"'; } ?>  > <?php echo $rrow->name; ?> </option>
                                <?php } ?>
                            </select>
                            
                            <input type="text" class="form-control form-control-sm  ml-1" name="keyword" value="" placeholder="keyword">
                            <button type="submit" class="btn btn-sm btn-primary  ml-1">Search</button>
                            <a href="" class="btn btn-sm btn-outline-primary  ml-2">Clear</a>
                        </form>
                        
                    </div>
              
                <div class="table-responsive">
                    <table class="table makedatatable" >
                        <thead>
                            <tr>
                                <!--th scope="col">AVATAR</th-->
                                <th scope="col">DETAIL</th>
                                <th scope="col">Group/RolePermission</th>                             
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
                                                <td>
                                                
                                                <?php
                                               
                                                foreach ($groups as $grow){
                                                  if($grow->id==$row->user_group){
                                                      echo $grow->name."/";
                                                  }
                                                }
                                                echo $row->role; ?>
                                                <a class="" href="<?php echo site_url('user/editrolepermission/'.$row->id) ?>" ><span class="fa fa-pencil-alt"><span></a>
                                                </td>
                                              
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
                                                <td>
                                                    <a class="btn btn-outline-primary btn-sm" href="<?php echo site_url('user/edit/'.$row->id) ?>" ><span class="fa fa-pencil-alt"><span></a>
                                                    <!--button class="btn btn-outline-danger btn-sm"  href="" onclick="confirmAlert('<?php echo site_url('admin/categoryDelete/'.$row->id) ?>')" ><span class="fa fa-trash"><span></button-->                                               
                                                
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