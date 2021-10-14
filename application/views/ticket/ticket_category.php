                    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Ticket Category</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <!-- <button class="btn btn-sm btn-outline-secondary">Share</button>
            <button class="btn btn-sm btn-outline-secondary">Export</button> -->
        </div>
        <a href="<?php echo site_url('ticket') ?>" class="btn btn-sm btn-primary ml-2">Go to Ticket</a>
        <a href="<?php echo site_url('ticket/ticketCategoryedit') ?>" class="btn btn-sm btn-primary ml-2">Add New Category</a>
        
    </div>
</div>
<?php  echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
               
            
                    <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap flex-row-reverse align-items-center pt-2 pb-2">
                    
                        <form class="form-inline" method="get">
                            <!-- <select name="status" class="form-control form-control-sm ml-1">
                                <option value="">Status</option>
                                <option value="pending" <?php //if($this->input->get('kyc_status')=='pending'){ echo 'selected="selected"';} ?> > No KYC </option>
                                <option value="process" <?php //if($this->input->get('kyc_status')=='process'){ echo 'selected="selected"';} ?> >In Process </option>  
                                <option value="success" <?php //if($this->input->get('kyc_status')=='success'){ echo 'selected="selected"';} ?> > Approved </option>   
                                <option value="resubmit" <?php //if($this->input->get('kyc_status')=='resubmit'){ echo 'selected="selected"';} ?> >Rejected  </option>                                     
                            </select> -->
                            
                            <!-- <input type="text" class="form-control form-control-sm  ml-1" name="keyword" value="" placeholder="keyword">
                            <button type="submit" class="btn btn-sm btn-primary  ml-1">Search</button>
                            <a href="" class="btn btn-sm btn-outline-primary  ml-2">Clear</a> -->
                        </form>
                        
                    </div>
              
                <div class="table-responsive">
                <table class="table makedatatable" >
                        <thead>
                            <tr>
                                <!--th scope="col">AVATAR</th-->
                                <th scope="col">ID#</th>
                                <!-- <th scope="col">ParentId</th> -->
                                <th scope="col">Category</th>    
                                               
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                if(!empty($category)){
                                    $i=0;
                                    foreach($category as $row){
                                        ?>
                                            <tr>
                                               <td><?php echo $row->id; ?></td>
                                                <td><?php echo $row->cat_name; ?></td>
                                                <td><a href="<?php echo site_url('ticket/ticketCategoryedit/'. $row->id) ?>"><i class="fas fa-edit"></i></a> <a href="<?php echo site_url('ticket/ticketCategorydelete/'. $row->id) ?>" ><i class="fas fa-trash-alt"></i></a></td>     
                                            </tr>
                                        
                                        <?php
                                    }
                                }
                            ?>
                           
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>