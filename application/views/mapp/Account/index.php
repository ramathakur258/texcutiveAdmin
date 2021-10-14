
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Accounts</h1>
    <div class="btn-toolbar mb-2 mb-md-0 file_custom">
        <a href="<?php echo site_url('mapp/Account/add'); ?>" class="btn btn-sm btn-primary ml-2"> Add New Account</a>
         <!--<a href="" class="btn btn-sm btn-primary ml-2">Import</a>-->
         
<div class="modal fade" id="uploadfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
         <form action="" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
                <input type="file" name="file"  />

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="importSubmit" value="Upload">Upload</button>
      </div>
      </form>
    </div>
  </div>
</div>
    </div>
</div>
<!-- File upload form -->
  
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                    <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap flex-row-reverse align-items-center pt-2 pb-2">
                        <form class="form-inline" method="get">
                            <input type="text" class="form-control form-control-sm  ml-1" name="keyword" value="" placeholder="keyword">
                            <button type="submit" class="btn btn-sm btn-primary  ml-1">Search</button>
                            <a href="" class="btn btn-sm btn-outline-primary  ml-2">Clear</a>
                        </form>
                    </div>
              
                <div class="table-responsive">
                    <table class="table makedatatable" >
                        <thead>
                            <tr>
                                <th scope="col">Qr Code image</th>
                                <th scope="col">UPI id</th>                             
                                <th scope="col">BankName</th>                             
                                <th scope="col">Account holder Name</th>                             
                                <th scope="col">BankAccount No.</th>                             
                                <th scope="col">IFSC Code</th>                             
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
<?php

                                if(!empty($result)){
                                    foreach($result as $row){
                                        ?>
                                            <tr>
                                                <td>
                                                  <img style="max-height:60px;" src="<?php echo public_path('accounts/'.$row->qr_code_image); ?>">
                                                </td>
                                                <td><?php echo $row->upi_id; ?></td>
                                                <td><?php echo $row->bank_name; ?></td>
                                                <td><?php echo $row->account_holder_name; ?></td>
                                                <td><?php echo $row->bank_account_no; ?></td>
                                                <td><?php echo $row->ifsc_code; ?></td>
                                                <td>
                                                    <a class="btn btn-outline-primary btn-sm" href="<?php echo site_url('mapp/Account/edit/'.$row->account_details_id); ?>" ><span class="fa fa-pencil-alt"><span></a>
                                                </td>
                                            </tr>
                                        
                                        <?php
                                    }
                                }
                            ?>
                           
                        </tbody>
                    </table>
                    <?php  echo $pagination ?>
                </div>
            </div>
        </div>
    </div>
</div>