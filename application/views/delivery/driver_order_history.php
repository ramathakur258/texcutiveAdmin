
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Driver Order History</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('delivery/Drivers') ?>" class="btn btn-sm btn-secondary">Back</a>
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
                                <th scope="col">Order Id</th>  
                                <th scope="col">Price</th>   
                                <th scope="col">Status</th>  
                                <th scope="col">Date</th>   
                               
                            </tr>
                        </thead>
                        <tbody>
                      <?php if(!empty($drivers)) { 
                          $i=1;
                          foreach($drivers as $row){?>
                          <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $row->first_name." ".$row->last_name  ?></td>     
                          <td><?php echo $row->order_id; ?></td>
                          <td><?php echo $row->paid_amount; ?></td>
                          <td><?php if($row->status == 0 ){ ?>
                            <span class="badge rounded-pill bg-success">Ordered</span>
                             <?php }else if($row->status == 1){  ?>
                                <span class="badge rounded-pill bg-warning text-dark">Shipped</span>
                        
                                <?php }else if($row->status == 2){  ?>
                                <span class="badge rounded-pill bg-light text-dark">On the way</span>
                                <?php }else if($row->status == 3){  ?>
                                <span class="badge rounded-pill bg-info text-dark">Delivered</span>
                                <?php }else if($row->status == 4){  ?>
                                <span class="badge rounded-pill bg-danger">Cancelled</span>
                                <?php } ?> 
                            </td>
                            <td><?php echo $row->update_time; ?></td>
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

