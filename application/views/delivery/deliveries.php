<head>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Deliveries</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
 
        <div class="btn-group mr-2">
            
            <a class="pull-right btn btn-sm btn-primary" style="margin-right:40px" href="<?php  echo site_url('Delivery/deliveryAdd' ); ?>"><i class="fa fa-file-excel-o"></i> Add Delivery </a>
        </div>
    </div>
</div>
<?php  echo $pagination ?>
<?php  echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
               
            
                    <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap flex-row-reverse align-items-center pt-2 pb-2">
                    
                        <form class="form-inline" method="get">
                            <select name="package_id" class="form-control form-control-sm ml-1"  onchange="this.form.submit()">
                                <option value="">Package Type</option>
                                <?php foreach($package as $row) {?>
                                 <option value="<?php echo $row->packages_id; ?>" <?php if($this->input->get('package_id')==$row->packages_id){ echo 'selected="selected"';} ?> ><?php echo $row->package_type ?>  </option>
                                 <?php }  ?>          
                            </select>

                            <select name="cate_id" class="form-control form-control-sm ml-1"  onchange="this.form.submit()">
                                <option value="">Category Type</option>
                                <?php foreach($category as $row) {?>
                                 <option value="<?php echo $row->cat_id; ?>" <?php if($this->input->get('cate_id')==$row->cat_id){ echo 'selected="selected"';} ?> ><?php echo $row->cat_name ?>  </option>
                                 <?php }  ?>          
                            </select>
                            
                            <input type="text" class="form-control form-control-sm  ml-1" name="keyword" value="" placeholder="keyword">
                            <button type="submit" class="btn btn-sm btn-primary  ml-1">Search</button>
                            <a href="<?php  echo site_url('Delivery' ); ?>" class="btn btn-sm btn-outline-primary  ml-2">Clear</a>
                        </form>
                        
                    </div>
              
                <div class="table-responsive">
                    <table class="table makedatatable" >
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Customer</th> 
                                <th scope="col">Product</th> 
                                <th scope="col">Pick Up Address</th>
                                <th scope="col">Drop Address</th>
                                <th scope="col">Package Type</th> 
                                <th scope="col">Order Assign To</th> 
                                <th scope="col">Price</th>  
                                <th scope="col">Status</th>  
                                <th scope="col">Created</th>  
                                <th scope="col">ACTION</th>  
                            </tr>
                        </thead>
                        <tbody>
                    <?php if(!empty($deliveries)) {
                     foreach($deliveries as $row){
                         
                        if(!empty($row->item_name) && !empty($row->pick_up) && !empty($row->drop) && !empty($row->package_type) ){ 
                         ?>
                          <tr>
                          <td><?php if(isset($row->user_name) && !empty($row->user_name)){ echo $row->user_name;}else{ echo "Admin"; }   ?></td>     
                          <td><?php  echo $row->item_name; ?></td>
                          <td><?php echo $row->pick_up; ?></td>     
                          <td><?php echo $row->drop; ?></td>
                        
                        
                        <td><?php echo $row->package_type; ?></td> 
                        <form action="<?php echo base_url('delivery/deliveryDriverAssign/'.$row->id)  ?>" method="post">
                        <?php if( $row->status == 0){    ?>
                        <td> <select name="driver_id" id="driver_id"  onchange="this.form.submit()" > 
                            <option value="0">Select Driver</option>
                           <?php foreach($drivers as $driver){  ?>
                           <option value="<?php echo $driver->id ?>" <?php if($driver->id == $row->driver_id) echo 'selected="selected"'; ?>><?php echo $driver->first_name." (".$driver->mobile.")";   ?></option>
                           <?php } ?>
                        </select>
                       
                      </td> 
                      <?php }else{  ?>
                        <td> <select name="driver_id" id="driver_id"  onchange="this.form.submit()" disabled> 
                            <option value="0">Select Driver</option>
                           <?php foreach($drivers as $driver){  ?>
                           <option value="<?php echo $driver->id ?>" <?php if($driver->id == $row->driver_id) echo 'selected="selected"'; ?>><?php echo $driver->first_name." (".$driver->mobile.")";   ?></option>
                           <?php } ?>
                        </select>
                       
                      </td> 
                            <?php } ?>
                        </form>
                          <td><?php echo $row->paid_amount; ?></td>
                          <td><?php if($row->status == 0 ){ ?>
                            <span style="color:green;background-color: #b6e8b6;">Ordered</span>
                             <?php }else if($row->status == 1){  ?>
                                <span style="color:green;background-color: #b6e8b6;">Shipped</span>
                        
                                <?php }else if($row->status == 2){  ?>
                                <span style="color:green;background-color: #b6e8b6;">On the way</span>
                                <?php }else if($row->status == 3){  ?>
                                <span style="color:green;background-color: #b6e8b6;">Delivered</span>
                                <?php }else if($row->status == 4){  ?>
                                <span style="color:red;background-color: #efb8b8;">Cancelled</span>
                                <?php } ?> 
                            </td>
                            <td><?php // echo date("d-M-Y",strtotime($row->created_at));
                             echo date("d-m-Y",strtotime($row->update_time));?></td> 
                          <td>
                         <a class="btn btn-default btn-sm" href="<?php echo site_url('delivery/deliveryAdd/'. $row->id) ?>" ><i class="far fa-edit"></i></a>
                        <?php  if($row->status!=4) {?>
                            <a class="btn btn-default btn-sm"  onclick='return check(<?php echo $row->id; ?>)' href="#" > <i class="far fa-window-close"></i></a>
                          
                          <?php } ?>  
                        <a class="btn btn-default btn-sm" href="<?php echo site_url('delivery/deliveryView/'. $row->id) ?>" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>
                          </tr>
                           <?php }}}?>
                        </tbody>
                    </table>
                    <?php  echo $pagination ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- 
-->
<script>


    function check(id){ 
       // alert(id);
Swal.fire({
title: 'Do you want to save the changes?',
showCancelButton: true,
confirmButtonText: `Save`,
denyButtonText: `Don't save`,
}).then((result) => {
if (result.isConfirmed) {
window.location = 'delivery/updatedeliveryStatus/'+id
} else if (result.isDenied) {
Swal.fire('Changes are not saved', '', 'info')
}
});
    }
</script>