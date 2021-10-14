<style>
 .day_num{
     text-align: center;
 }   
.calendar {
    display: flex;
    flex-flow: column;
}
.calendar .header .month-year {
    font-size: 20px;
    font-weight: bold;
    color: #636e73;
    padding: 20px 0;
}
.calendar .days {
    display: flex;
    flex-flow: wrap;
}
.calendar .days .day_name {
    width: calc(100% / 7);
    border-right: 1px solid #2c7aca;
    padding: 20px;
    text-transform: uppercase;
    font-size: 12px;
    font-weight: bold;
    color: #818589;
    color: #fff;
    background-color: #448cd6;
}
.calendar .days .day_name:nth-child(7) {
    border: none;
}
.calendar .days .day_num {
    display: flex;
    flex-flow: column;
    width: calc(100% / 7);
    border-right: 1px solid #e6e9ea;
    border-bottom: 1px solid #e6e9ea;
    padding: 15px;
    font-weight: bold;
    color: #7c878d;
    cursor: pointer;
    min-height: 100px;
}
.calendar .days .day_num span {
    display: inline-flex;
    width: 30px;
    font-size: 14px;

}
.calendar .days .day_num .event {
    margin-top: 10px;
    font-weight: 500;
    font-size: 14px;
    padding: 3px 6px;
    border-radius: 4px;
    background-color: #f7c30d;
    color: #fff;
    word-wrap: break-word;
}
.calendar .days .day_num .event.green {
    background-color: #51ce57;
}
.calendar .days .day_num .event.blue {
    background-color: #518fce;
}
.calendar .days .day_num .event.red {
    background-color: #ce5151;
}
.calendar .days .day_num:nth-child(7n+1) {
    border-left: 1px solid #e6e9ea;
}
.calendar .days .day_num:hover {
    background-color: #fdfdfd;
}
.calendar .days .day_num.ignore {
    background-color: #fdfdfd;
    color: #ced2d4;
    cursor: inherit;
}
.calendar .days .day_num.selected {
    background-color: #f1f2f3;
    cursor: inherit;
}
</style>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Attendence - <?php echo ucfirst($employee->first_name); ?> <?php echo ucfirst($employee->last_name); ?> </h1>
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
        
           <form action="" method="get">
    <div class="row filter-row">
        <div class="sm-form col-sm-3">
            <select name="month" class="form-control form-control-sm ml-1">
                <option value="">Select Month</option>
                <option value="01">Jan</option>
                <option value="02">Feb</option>
                <option value="03">Mar</option>
                <option value="04">Apr</option>
                <option value="05">May</option>
                <option value="06">Jun</option>
                <option value="07">Jul</option>
                <option value="08">Aug</option>
                <option value="09">Sep</option>
                <option value="10">Oct</option>
                <option value="11">Nov</option>
                <option value="12">Dec</option>
            </select>
        </div>
        <div class="sm-form col-sm-3">
            <select name="year" class="form-control form-control-sm ml-1">
               
                <option value="2021"> 2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
            </select>
        </div>
        <button type="submit" class="btn btn-sm btn-primary ml-1">Search</button>
    </div>
</form>
           <div class="content home">
			<?php echo $calendar; ?>
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