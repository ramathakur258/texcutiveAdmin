
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Attendence</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
           </div>
    </div>
</div>
<?php  echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
            <form action="<?php echo base_url('Attendance/AddEmployeeAttendance/'.$id) ?>" method="post" enctype="multipart/form-data" >
            <div class="row filter-row">
           
                <div class="sm-form col-sm-3">
                    <input type="date" id="datepicker" class="datepicker" name="attend_date" value="<?php if(!empty( $fetchattendence)){  echo $fetchattendence->attend_date ;} ?>">
                </div>
                <div class="sm-form col-sm-3">
                   
                    <select name="attend_status" class="form-control form-control-sm ml-1" >
                       <option value="0">Select Status</option>
                        <option value="present" <?php if(!empty( $fetchattendence) && $fetchattendence->attend_status=="present"){  echo 'selected="selected"';} ?>>Present </option>
                        <option value="absent" <?php if(!empty( $fetchattendence) && $fetchattendence->attend_status=="absent"){  echo 'selected="selected"';} ?>>Absent </option>
                        <option value="half day" <?php if(!empty( $fetchattendence) && $fetchattendence->attend_status=="half day"){  echo 'selected="selected"';} ?>>Half Day </option>
                        <option value="week-off" <?php if(!empty( $fetchattendence) && $fetchattendence->attend_status=="week-off"){  echo 'selected="selected"';} ?>>Week-Off </option>
                        <option value="leave" <?php if(!empty( $fetchattendence) && $fetchattendence->attend_status=="leave"){  echo 'selected="selected"';} ?>>Leave </option>
                        <option value="holiday" <?php if(!empty( $fetchattendence) && $fetchattendence->attend_status=="holiday"){  echo 'selected="selected"';} ?>>Holiday </option>
                        <option value="comp-off" <?php if(!empty( $fetchattendence) && $fetchattendence->attend_status=="comp-off"){  echo 'selected="selected"';} ?>>Comp-Off </option>
                        
                       
                    </select>
                   
                </div>
                <button type="submit" class="btn btn-sm btn-primary  ml-1" >Submit</button>
                
            </div>
            </form>
                <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap flex-row-reverse align-items-center pt-2 pb-2">
                </div>
              
            </div>
        </div>
    </div>
</div>



<!-- 
<script>
$('.datepicker').pickadate({
labelMonthNext: 'Go to the next month',
labelMonthPrev: 'Go to the previous month',
labelMonthSelect: 'Pick a month from the dropdown',
labelYearSelect: 'Pick a year from the dropdown',
selectYears: true,
selectMonths: true

})
</script> -->
