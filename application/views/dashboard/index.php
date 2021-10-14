<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button class="btn btn-sm btn-outline-secondary">Share</button>
            <button class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <a href="" class="btn btn-sm btn-secondary ml-2">Export</a>
        <a href="<?php echo site_url('tree/UpdateTree') ?>" class="btn btn-sm btn-primary ml-2">Refresh</a>
    </div>
    
</div>

<?php
/*
if($dashboard['gym']->email_verified==0){
    echo '<div class="alert alert-danger"> Hi <strong>'.$dashboard['gym']->title.'</strong>. Your email not verified. <a class="btn btn-warning btn-sm" href="'.site_url("partner/email_verify").'">Verify Now</a> </div>';
 }
if($dashboard['gym']->is_publish==0){
   echo '<div class="alert alert-warning"> Hi <strong>'.$dashboard['gym']->title.'</strong>. Your account approval is pending. </div>';
}

*/



 echo $this->session->flashdata("alert"); ?>
<div class="row">

    <?php if(!empty($dashboard['card']))

    foreach ($dashboard['card'] as $row) {
        ?>
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card  rounded-0">
                <div class="card-body">
                    <div class="card-innerBody d-flex align-items-center">
                        <div class="card-icon text-light"><i aria-hidden="true" class="fas fa-dollar-sign"></i></div>
                        <div class="ml-auto">
                            <p class="card-label text-right text-muted"><?php echo $row['title']; ?></p>
                            <h4 class="card-text text-right"><?php echo $row['detail']; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex">
                    <small class="text-muted">Since last month</small><small class="text-success ml-auto"><i aria-hidden="true" class="fa fa-caret-up"></i> 5,35% </small>
                </div>
            </div>
        </div>
    <?php

    } 
    ?>
   
    
</div>
<div class="row">
    
    <div class="col-12 col-xl-12 mb-4 align-items-stretch">
        <div class="card h-100 border-0 rounded-0">
            <div class="card-title mb-1 p-3 d-flex">
                <h6>Today</h6>
               
            </div>
            <div class="card-body">
                <div class="table-responsive-md">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th >Package</th>
                                    <th >Price</th>
                                    <th >Date</th>
                                    <th >Status</th>
                                   
                                </tr>
                            </thead>
                            <tbody class="no-border-x">
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
