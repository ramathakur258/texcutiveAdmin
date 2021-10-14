
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Drivers</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
            
            <!-- <a class="pull-right btn btn-sm btn-outline-secondary" style="margin-right:40px" href="<?php // echo site_url('Attendance/GetUser' ); ?>"><i class="fa fa-file-excel-o"></i> Export</a> -->
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
                            <a href="<?php  echo site_url('delivery//Drivers' ); ?>" class="btn btn-sm btn-outline-primary  ml-2">Clear</a>
                        </form>
                        
                    </div>
              
                <div class="table-responsive">
                    <table class="table makedatatable" >
                        <thead>
                            <tr>
                                <th scope="col">S.no</th>
                                <th scope="col">DRIVER NAME</th>
                                <th scope="col">MOBILE</th>   
                                <th scope="col">EMAIL</th>  
                                <th scope="col">Driver Order Histry</th>   
                               <th scope="col">ACTION</th>  
                            </tr>
                        </thead>
                        <tbody>
                      <?php if(!empty($drivers)) { 
                          $i=1;
                          foreach($drivers as $row){?>
                          <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $row->first_name." ".$row->last_name  ?></td>     
                          <td><?php echo $row->mobile; ?></td>
                          <td><?php echo $row->email; ?></td>
                          <td>  <a class="btn btn-primary btn-sm" href="<?php echo site_url('delivery/driverhistoryView/'. $row->id) ?>" >History</a> </td>
                          <td> 
                           <a class="btn btn-default btn-sm" href="<?php echo site_url('delivery/driversView/'. $row->id) ?>" ><i class="fas fa-eye"></i></a>
                           <a class="btn btn-default btn-sm" href="<?php echo site_url('delivery/driverEdit/'. $row->id) ?>" ><i class="far fa-edit"></i></a>
                           <a class="btn btn-default btn-sm" href="<?php echo site_url('delivery/driversDelete/'. $row->id) ?>" ><i class="far fa-trash-alt"></i></a>
                         </td>
                         </tr>
                           <?php }}?>
                        </tbody>
                    </table>
                    <?php  echo $pagination ?>

                </div>
            </div>
        </div>
    </div>
</div>

