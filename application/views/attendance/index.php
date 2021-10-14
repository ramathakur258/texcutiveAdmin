
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Users</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
            
            <a class="pull-right btn btn-sm btn-outline-secondary" style="margin-right:40px" href="<?php echo site_url('Attendance/GetUser' ); ?>"><i class="fa fa-file-excel-o"></i> Export</a>
        </div>
    <a href="<?php echo site_url('attendance/EmployeeAttendence') ?>" class="btn btn-sm btn-primary ml-2">My attandence</a>
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
                                <option value="">Status</option>
                                <option value="pending" <?php if($this->input->get('kyc_status')=='pending'){ echo 'selected="selected"';} ?> > No KYC </option>
                                <option value="process" <?php if($this->input->get('kyc_status')=='process'){ echo 'selected="selected"';} ?> >In Process </option>  
                                <option value="success" <?php if($this->input->get('kyc_status')=='success'){ echo 'selected="selected"';} ?> > Approved </option>   
                                <option value="resubmit" <?php if($this->input->get('kyc_status')=='resubmit'){ echo 'selected="selected"';} ?> >Rejected  </option>                                     
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
                                <th scope="col">AVATAR</th>
                                <th scope="col">DETAIL</th>
                                <th scope="col">Status</th>   
                                <th scope="col">CREATED</th>   
                                <th scope="col">ACTION</th>  
                                
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if(!empty($users)){
                                    $i=0;
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
                                                
                                              
                                                <td>

                                                <div class="">
                                                    <?php
                                                    
                                                    $attendence=$row->attend_status;
                                                    if($attendence=="present"){
                                                        ?>
                                                        <button type="button" class="btn btn-sm btn-success " onclick="AddAttendence(<?php echo $row->employee_id ?>,'present')">Present</button>
                                                       <?php 
                                                    }else{
                                                        ?>
                                                        <button type="button" class="btn btn-sm btn-light " onclick="AddAttendence(<?php echo $row->employee_id ?>,'present')">Present</button>
                                                       <?php 
                                                    }
                                                    
                                                    if($attendence=="absent"){
                                                        ?>
                                                        <button type="button" class="btn btn-sm btn-danger " onclick="AddAttendence(<?php echo $row->employee_id ?>,'absent')">Absent</button>
                                                       <?php 
                                                        
                                                    }else{
                                                        ?>
                                                        <button type="button" class="btn btn-sm btn-light " onclick="AddAttendence(<?php echo $row->employee_id ?>,'absent')">Absent</button>
                                                       <?php 
                                                    }
                                                    
                                                    if($attendence=="half day"){
                                                        ?>
                                                        <button type="button" class="btn btn-sm btn-warning " onclick="AddAttendence(<?php echo $row->employee_id ?>,'half day')">Half Day</button>
                                                       <?php 
                                                    }else{
                                                        ?>
                                                        <button type="button" class="btn btn-sm btn-light " onclick="AddAttendence(<?php echo $row->employee_id ?>,'half day')">Half Day</button>
                                                       <?php 
                                                    }
                                                    
                                                    if($attendence=="week-off"){
                                                        ?>
                                                        <button type="button" class="btn btn-sm btn-primary " onclick="AddAttendence(<?php echo $row->employee_id ?>,'week-off')">Week-off</button>
                                                       <?php 
                                                    }else{
                                                        ?>
                                                        <button type="button" class="btn btn-sm btn-light " onclick="AddAttendence(<?php echo $row->employee_id ?>,'week-off')">Week-off</button>
                                                       <?php 
                                                    }
                                                    
                                                    if($attendence=="leave"){
                                                        ?>
                                                        <button type="button" class="btn btn-sm btn-primary " onclick="AddAttendence(<?php echo $row->employee_id ?>,'leave')">Leave</button>
                                                       <?php 
                                                    }else{
                                                        ?>
                                                        <button type="button" class="btn btn-sm btn-light " onclick="AddAttendence(<?php echo $row->employee_id ?>,'leave')">Leave</button>
                                                       <?php 
                                                    }
                                                    
                                                    if($attendence=="holiday"){
                                                        ?>
                                                        <button type="button" class="btn btn-sm btn-primary " onclick="AddAttendence(<?php echo $row->employee_id ?>,'holiday')">Holiday</button>
                                                       <?php 
                                                    }else{
                                                        ?>
                                                        <button type="button" class="btn btn-sm btn-light " onclick="AddAttendence(<?php echo $row->employee_id ?>,'holiday')">Holiday</button>
                                                       <?php 
                                                    }
                                                    if($attendence=="comp-off"){
                                                        ?>
                                                        <button type="button" class="btn btn-sm btn-success " onclick="AddAttendence(<?php echo $row->employee_id ?>,'comp-off')">Comp-off</button>
                                                       <?php 
                                                    }else{
                                                        ?>
                                                        <button type="button" class="btn btn-sm btn-light " onclick="AddAttendence(<?php echo $row->employee_id ?>,'comp-off')">Comp-off</button>
                                                       <?php 
                                                    }

                                                   
                                                   
                                                   
                                                    ?>
                                                </div>
                                               
                                                </td>
                                                 <td>
                                                 <?php if($row->created_at==''){?>
                                                    <p class="m-0"> <?php $mydate=getdate(date("U")); echo "  $mydate[mday] $mydate[month] $mydate[year]  10:$mydate[minutes]
                                                    :AM "; ?></p>
                                                 <?php }else{ ?>
                                                   <p class="m-0"> <?php echo date("d M Y h:i :A",strtotime($row->created_at)); ?></p>
                                                   <?php } ?>
                                                </td>
                                                <td>
                                                  <!--a id="btn-login" href="<?php echo site_url("attendance/employeeAttendence/".$row->employee_id); ?>" class="btn btn-primary btn-sm">VIEW  </a-->
                                                  <hr>
                                                   <a id="btn-login" href="<?php echo site_url("attendance/empCal/".$row->employee_id); ?>" class="btn btn-primary btn-sm"> VIEW  </a>
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


<script>
function AddAttendence(emp_id,status){
    
    $.ajax({
        type: "POST",
       // dataType:'json',
        url: "<?php echo site_url("attendance/editAttendence"); ?>",
        data: {
            'emp_id' : emp_id,
            'status' : status
        },
        success: function(response) {
            
            console.log(response);
            toastr.success("Attendance update Successful");
            location.reload();
            
        }
    });
}
</script>