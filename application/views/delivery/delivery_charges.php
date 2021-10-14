
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Deliveries</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
            
            <!-- <a class="pull-right btn btn-sm btn-outline-secondary" style="margin-right:40px" href="<?php // echo site_url('Attendance/GetUser' ); ?>"><i class="fa fa-file-excel-o"></i> Export</a> -->
            <a class="pull-right btn btn-sm btn-primary" style="margin-right:40px" href="<?php  echo site_url('Delivery/deliveryAdd' ); ?>"><i class="fa fa-file-excel-o"></i> Add Charges </a>

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
                                <th scope="col">Per_km_charge</th>
                                <th scope="col">Description</th>
                                <th scope="col">Width</th>
                                <th scope="col">Height</th>
                                <th scope="col">Length</th>
                                <th scope="col">Weight</th>
                                <th scope="col">Gift</th>
                                <th scope="col">Urgent</th>
                                <th scope="col">Delicate</th>
                                <th scope="col">Staircase</th>
                               
                                <th scope="col">Total_amount</th>
                                <th scope="col">ACTION</th>

                            </tr>
                        </thead>
                        <tbody>
                   <?php if(!empty($charges)) { 
                       foreach($charges as $row){?>
                          <tr>
                          <td><?php echo $row->per_km_charges;?> </td>     
                          <td><?php echo $row->description;?> </td>
                          <td><?php echo $row->width;?> </td>     
                          <td><?php echo $row->height;?> </td>
                          <td><?php echo $row->length;?> </td>     
                          <td><?php echo $row->weight;?> </td>
                          <td><?php echo $row->gift;?> </td>     
                          <td><?php echo $row->urgent;?> </td>
                          <td><?php echo $row->delicate;?> </td> 
                          <td><?php echo $row->staircase;?> </td>     
                         
                           <td><?php echo $row->paid_amount;?> </td>     
                         
                           <td>
                          <a class="btn btn-default btn-sm" href="<?php echo site_url('delivery/chargesView/'. $row->id) ?>" ><i class="fas fa-eye"></i></a>   <a class="btn btn-default btn-sm" href="<?php echo site_url('delivery/chargesView/'. $row->id) ?>" ><i class="far fa-edit"></i></a> <a class="btn btn-default btn-sm" href="<?php echo site_url('delivery/chargesDelete/'. $row->id) ?>" ><i class="far fa-trash-alt"></i></a>
                        
                           </td>
                         
                         </tr>
                           <?php }}?>
                        </tbody>
                    </table>
                    <?php // echo $pagination ?>

                </div>
            </div>
        </div>
    </div>
</div>

