
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Category</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
 
        <div class="btn-group mr-2">
            
            <a class="pull-right btn btn-sm btn-primary" style="margin-right:40px" href="<?php  echo site_url('Delivery/categoryEdit' ); ?>"><i class="fa fa-file-excel-o"></i> Add Categories </a>
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
                            <input type="text" class="form-control form-control-sm  ml-1" name="keyword" value="" placeholder="keyword">
                            <button type="submit" class="btn btn-sm btn-primary  ml-1">Search</button>
                            <a href="<?php  echo site_url('Delivery/category' ); ?>" class="btn btn-sm btn-outline-primary  ml-2">Clear</a>
                        </form>
                        
                    </div>
              
                <div class="table-responsive">
                    <table class="table makedatatable" >
                        <thead>
                            <tr>
                                <th scope="col">S.no</th>
                                <th scope="col">Category</th>
                                <th scope="col">ACTION</th>  
                            </tr>
                        </thead>
                        <tbody>
                    <?php  if(!empty($category)) { 
                        $i=1;
                     foreach($category as $row){ ?>
                          <tr>
                          <td><?php echo $i++; ?></td>     
                          <td><?php echo $row->cat_name; ?></td>
                         <td>
                         <a class="btn btn-default btn-sm" href="<?php echo site_url('delivery/categoryEdit/'. $row->cat_id) ?>" ><i class="far fa-edit"></i></a>
                     
                         <a class="btn btn-default btn-sm" href="<?php echo site_url('delivery/categoryDelete/'. $row->cat_id) ?>"  > <i class="far fa-trash-alt"></i></a>
                       
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

