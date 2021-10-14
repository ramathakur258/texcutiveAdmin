
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Attendence</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
           <?php 
            if(!empty($user_id) &&($user_id==377) ){
                ?>
            
    <a class="pull-right btn btn-primary " style="margin-right:40px" href="<?php echo site_url('Attendance/AddEmployeeAttendance/'.$id ); ?>"><i class="fa fa-file-excel-o"></i> Add Attendance</a>
    <?php   }?>      
    <a class="pull-right btn btn-sm btn-outline-secondary" style="margin-right:40px" href="<?php echo site_url('Attendance/createExcel/'.$id ); ?>"><i class="fa fa-file-excel-o"></i> Export</a>
        </div>
    </div>
</div>
<?php  echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
            <form action="<?php echo base_url('Attendance/EmployeeAttendence/'.$id) ?>" method="get">
            <div class="row filter-row">
           
                <div class="sm-form col-sm-3">
                    <select name="month" class="form-control form-control-sm ml-1" >
                        <option value="0">Select Month</option>
                        <option value="1"> Jan</option>
                        <option value="2">Feb</option>
                        <option value="3">Mar</option>
                        <option value="4">Apr</option>
                        <option value="5">May</option>
                        <option value="6">Jun</option>
                        <option value="7">Jul</option>
                        <option value="8">Aug</option>
                        <option value="9">Sep</option>
                        <option value="10">Oct</option>
                        <option value="11">Nov</option>
                        <option value="12">Dec</option>
                                                 
                    </select>
                </div>
                <div class="sm-form col-sm-3">
                   
                    <select name="year" class="form-control form-control-sm ml-1" >
                        <option value="0">Select Year</option>
                        <option value="2021"> 2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                       
                    </select>
                   
                </div>
                <button type="submit" class="btn btn-sm btn-primary  ml-1" >Search</button>
                
            </div>
            </form>
                <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap flex-row-reverse align-items-center pt-2 pb-2">
                </div>
              
                <div class="table-responsive">
                    <table class="table makedatatable" >
                        <thead>
                            <tr>
                               
                                <th scope="col">Date</th>
                                <th scope="col">Update Time</th>
                                <th scope="col">Status</th> 
                                <th scope="col">Updated By</th>   
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                          if(!empty($employeeAttendence)){
                              $i=0;
                               foreach($employeeAttendence as $row){
                               ?>
                            <tr>
                           
                                <td>
                                <p class="m-0"><?php echo date("d M Y ",strtotime($row->attend_date)); ?></p>
                                </td>
                                <td>
                                <p class="m-0"> <?php  echo date(" H:i A",strtotime($row->created_at)); ?></p>
                               </td>
                                <td >
                                <?php
                                        $attendence=$row->attend_status;
                                        if($attendence=="present"){
                                            ?>
                                            <button type="button" class="btn btn-sm btn-success ">Present</button>
                                           <?php 
                                        }
                                        
                                        if($attendence=="absent"){
                                            ?>
                                            <button type="button" class="btn btn-sm btn-danger " >Absent</button>
                                           <?php 
                                            
                                        }
                                        
                                        if($attendence=="half day"){
                                            ?>
                                            <button type="button" class="btn btn-sm btn-warning ">Half Day</button>
                                           <?php 
                                        }
                                        
                                        if($attendence=="week-off"){
                                            ?>
                                            <button type="button" class="btn btn-sm btn-primary ">Week-off</button>
                                           <?php 
                                        }
                                        
                                        if($attendence=="leave"){
                                            ?>
                                            <button type="button" class="btn btn-sm btn-primary " >Leave</button>
                                           <?php 
                                        }
                                        
                                        if($attendence=="holiday"){
                                            ?>
                                            <button type="button" class="btn btn-sm btn-primary " >Holiday</button>
                                           <?php 
                                        }
                                        if($attendence=="comp-off"){
                                            ?>
                                            <button type="button" class="btn btn-sm btn-success " >Comp-off</button>
                                           <?php 
                                        }

                                        
                                        ?>
                                </td>
                                <td>
                                <p class="m-0"> <?php  echo $row->first_name; ?> <?php  echo $row->last_name; ?></p>
                                </td>
                                
                            </tr>
                            <?php } }?>
                        </tbody>
                    </table>
                    <?php echo $pagination ?>
                  </div>
            </div>
        </div>
    </div>
</div>


<script>
function EditAttendence(emp_id,status,id){
    
    $.ajax({
        type: "POST",
       // dataType:'json',
        url: "<?php echo site_url("attendance/editAttendence"); ?>",
        data: {
            'emp_id' : emp_id,
            'status' : status,
           'id':id
        },
        success: function(response) {
            
            console.log(response);
            toastr.success("Attendance update Successful");
            location.reload();
            
        }
    });
}
</script>