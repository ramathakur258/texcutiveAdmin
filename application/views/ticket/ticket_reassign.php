
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Ticket Re- Assign</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('ticket') ?>" class="btn btn-sm btn-secondary">Back</a>
    </div>
</div>
<?php echo validation_errors(); ?>
<?php if(isset($message)){ echo $message; } ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype='multipart/form-data' >
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="display_name">Owner Name *</label>
                            <input type="text" name="display_name" readonly class="form-control" value="<?php echo $user->display_name; ?>"  placeholder="Contact number" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Assign  to <?php  if(isset($ticket->assign_id) && !empty($ticket->assign_id) ){ echo " <strong>".$ticket->assign_first_name." ".$ticket->assign_last_name."</strong>"; } ?>*</label>
                            <input type="text" name="phone"  id="phone" class="form-control" value="<?php if(!empty(set_value('phone'))){ echo set_value('phone'); }elseif(isset($ticket->assign_id) && !empty($ticket->assign_id) ){ echo $ticket->assign_phone; } ?>" id="email" placeholder="Phone" />
                            <div id="result"></div>
                        </div>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary">Save Detail</button>
                </form>

            </div>
        </div>
    </div>
</div>


