
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Packages</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
            
          
        </div>

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
                            <a href="<?php echo site_url('Standbyphone/package') ?>" class="btn btn-sm btn-outline-primary  ml-2">Clear</a>
                        </form>
                        
                    </div>
              
                <div class="table-responsive">
                    <table class="table makedatatable" >
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>   
                                
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if(!empty($package)){
                                    $i=0;
                                    foreach($package as $row){
                                        ?>
                                            <tr>
                                           
                                                <td> <?php echo $row->title; ?> </td>
                                                <td><?php echo wordwrap($row->description,35,"<br>\n",TRUE)   ?>  </td>
                                                <td><strong> <?php  echo $row->price ?> </strong>  </td>
                                                <td> 
                                                
                                                <?php if($row->status == "publish"){  ?>
                                            <span class="badge rounded-pill bg-success">Publish</span>
                                            <?php }else if($row->status == "unpublish"){  ?>
                                            <span class="badge rounded-pill bg-info text-dark">Unpublish</span>
                                            <?php }else {?>
                                                <span class="badge rounded-pill bg-danger">Delete</span>
                                                <?php } ?> 
                                                
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