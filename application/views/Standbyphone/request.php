
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Request</h1>
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
               
            
                    <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap flex-row-reverse align-items-center pt-2 pb-2">
                    
                        <form class="form-inline" method="get">
                            <!-- <select name="kyc_status" class="form-control form-control-sm ml-1">
                                <option value="">Status</option>
                                <option value="pending" <?php if($this->input->get('kyc_status')=='pending'){ echo 'selected="selected"';} ?> > No KYC </option>
                                <option value="process" <?php if($this->input->get('kyc_status')=='process'){ echo 'selected="selected"';} ?> >In Process </option>  
                                <option value="success" <?php if($this->input->get('kyc_status')=='success'){ echo 'selected="selected"';} ?> > Approved </option>   
                                <option value="resubmit" <?php if($this->input->get('kyc_status')=='resubmit'){ echo 'selected="selected"';} ?> >Rejected  </option>                                     
                            </select> -->
                            
                            <input type="text" class="form-control form-control-sm  ml-1" name="keyword" value="" placeholder="keyword">
                            <button type="submit" class="btn btn-sm btn-primary  ml-1">Search</button>
                            <a href="<?php echo site_url('Standbyphone') ?>" class="btn btn-sm btn-outline-primary  ml-2">Clear</a>
                        </form>
                        
                    </div>
              
                <div class="table-responsive">
                    <table class="table makedatatable" >
                        <thead>
                            <tr>
                                <th scope="col">User Name</th>
                                <th scope="col">Pickup Address</th>
                                <th scope="col">Pickup Time</th>
                                <th scope="col">Mobile Detail</th>
                                <th scope="col">Issue</th>   
                                <th scope="col">Request Status</th>   
                                <th scope="col">Created Date</th>  
                                
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if(!empty($request)){
                                    $i=0;
                                    foreach($request as $row){
                                        ?>
                                            <tr>
                                            <td class="m-0"> <?php echo $row->first_name." ".$row->last_name; ?>   </td>
                                        <td>   <?php echo wordwrap($row->pickup_address,20,"<br>\n",TRUE) ?> </td>
                                           
                                                    <td><?php echo date("d M Y h:i :A",strtotime($row->pickup_time)); ?>  </td>
                                                <td> <strong><?php echo $row->mobile_name ?>    </strong> 
                                                 <p class="m-0"> <?php echo $row->mobile_number; ?></p>  
                                                 <p class="m-0"> <?php echo $row->imei_number; ?></p> </td>
                                               
                                                    <td>   <?php echo wordwrap($row->issue,20,"<br>\n",TRUE) ?> </td>
                                                    <td>  
                                                <?php if($row->req_status == "completed"){  ?>
                                            <span class="badge rounded-pill bg-success">Completed</span>
                                            <?php }else if($row->req_status == "pending"){  ?>
                                            <span class="badge rounded-pill bg-info text-dark">Pending</span>
                                            <?php }else if($row->req_status == "process"){  ?>
                                            <span class="badge rounded-pill bg-warning text-dark">Process</span>
                                            <?php } else{?>      
                                                <span class="badge rounded-pill bg-danger">Cancelled</span>
                                                <?php } ?> 
                                                </td> 
                                                 <td> <?php echo date("d M Y",strtotime($row->created_at)); ?>
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


<!-- <script>
function AddAttendence(emp_id,status){
    
    $.ajax({
        type: "POST",
       // dataType:'json',
        url: "<?php // echo site_url("attendance/editAttendence"); ?>",
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
</script> -->