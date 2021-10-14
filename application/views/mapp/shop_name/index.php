
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Shop Name</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
       
    </div>
</div>
<?php  echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                  
              
                <div class="table-responsive">
                    <table class="table makedatatable" >
                        <thead>
                            <tr>
                            
                                <th scope="col">Shop Name</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                                       <?php if(!empty($shop_name)) { ?>
                                            <tr>
                                             
                                                <td>
                                                    <?php echo $shop_name->app_shop_name;?>
                                                </td>
                                             
                                                <td>
                                                    <a class="btn btn-outline-primary btn-sm" href="<?php echo site_url('mapp/shopname/edit/'.$shop_name->id) ?>" ><span class="fa fa-pencil-alt"><span></a>
                                                </td>
                                            </tr>
                                  
                                     <?php } ?>
                           
                        </tbody>
                    </table>
                   

                </div>
            </div>
        </div>
    </div>
</div>