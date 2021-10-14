
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Add/Edit</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('user/roles') ?>" class="btn btn-sm btn-secondary">Back</a>
    </div>
</div>
<?php echo validation_errors(); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype='multipart/form-data' >
                    
                <div class="form-row">
                    <strong>Group Name</strong>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" value="<?php if(!empty(set_value('name'))){ echo set_value('name'); }elseif(isset($record->name)){ echo $record->name; } ?>"  >                           
                        </div>
                        
                    </div>
                </div> 
                <?php
                 $permissions=[];
                 if(!empty($record->permissions)){
                    $permissions=json_decode($record->permissions);
                 }
                

                ?>
                <div class="form-row">
                    <strong>Users</strong>
                    <div class="form-group col-md-12 form-inline">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[user][view]" id="user_view" <?php if(isset($permissions->user->view)){ echo "checked"; } ?>   >
                            <label class="custom-control-label" for="user_view">View</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[user][edit]" id="user_edit"  <?php if(isset($permissions->user->edit)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="user_edit">Edit</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[user][add]" id="user_add"   <?php if(isset($permissions->user->add)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="user_add">Add</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[user][editmembership]" id="user_editmembership"  <?php if(isset($permissions->user->editmembership)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="user_editmembership">Edit Membership</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[user][block]" id="user_block"  <?php if(isset($permissions->user->block)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="user_block">Block User</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[user][kyc]" id="user_kyc"  <?php if(isset($permissions->user->kyc)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="user_kyc">Kyc Approve</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[user][permission]" id="user_permission"  <?php if(isset($permissions->user->permission)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="user_permission">User permissions</label>
                        </div>
                    </div>
                </div> 
                <div class="form-row">
                    <strong>Group</strong>
                    <div class="form-group col-md-12 form-inline">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[group][view]" id="group_view"    <?php if(isset($permissions->group->view)){ echo "checked"; } ?>  >
                            <label class="custom-control-label" for="group_view">View</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[group][edit]" id="group_edit"   <?php if(isset($permissions->group->edit)){ echo "checked"; } ?>  >
                            <label class="custom-control-label" for="group_edit">Edit</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[group][add]" id="group_add"   <?php if(isset($permissions->group->add)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="group_add">Add</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[group][del]" id="group_delete"  <?php if(isset($permissions->group->del)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="group_delete">Delete</label>
                        </div>
                    </div>
                </div> 
                <div class="form-row">
                    <strong>My Team</strong>
                    <div class="form-group col-md-12 form-inline">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[tree][view]" id="tree_view"    <?php if(isset($permissions->tree->view)){ echo "checked"; } ?>  >
                            <label class="custom-control-label" for="tree_view">View</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[tree][edit]" id="tree_edit"   <?php if(isset($permissions->tree->edit)){ echo "checked"; } ?>  >
                            <label class="custom-control-label" for="tree_edit">Edit</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[tree][add]" id="tree_add"   <?php if(isset($permissions->tree->add)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="tree_add">Add</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[tree][del]" id="tree_delete"  <?php if(isset($permissions->tree->del)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="tree_delete">Delete</label>
                        </div>
                    </div>
                </div> 
                <div class="form-row">
                    <strong>Role</strong>
                    <div class="form-group col-md-12 form-inline">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[role][view]" id="role_view"    <?php if(isset($permissions->role->view)){ echo "checked"; } ?>  >
                            <label class="custom-control-label" for="role_view">View</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[role][edit]" id="role_edit"   <?php if(isset($permissions->role->edit)){ echo "checked"; } ?>  >
                            <label class="custom-control-label" for="role_edit">Edit</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[role][add]" id="role_add"   <?php if(isset($permissions->role->add)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="role_add">Add</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[role][del]" id="role_delete"  <?php if(isset($permissions->role->del)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="role_delete">Delete</label>
                        </div>
                    </div>
                </div> 

                <div class="form-row">
                    <strong>Customer</strong>
                    <div class="form-group col-md-12 form-inline">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[customer][view]" id="customer_view"    <?php if(isset($permissions->customer->view)){ echo "checked"; } ?>  >
                            <label class="custom-control-label" for="customer_view">View</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[customer][edit]" id="customer_edit"   <?php if(isset($permissions->customer->edit)){ echo "checked"; } ?>  >
                            <label class="custom-control-label" for="customer_edit">Edit</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[customer][add]" id="customer_add"   <?php if(isset($permissions->customer->add)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="customer_add">Add</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[customer][block]" id="customer_bock"   <?php if(isset($permissions->customer->block)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="customer_bock">Add</label>
                        </div>
                       
                    </div>
                </div> 
                <div class="form-row">
                    <strong>Dashboard</strong>
                    <div class="form-group col-md-12 form-inline">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[dashboard][wallet]" id="dashboard_wallet"    <?php if(isset($permissions->dashboard->wallet)){ echo "checked"; } ?>  >
                            <label class="custom-control-label" for="dashboard_wallet">Wallet</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[dashboard][cashback]" id="dashboard_cashback"   <?php if(isset($permissions->dashboard->cashback)){ echo "checked"; } ?>  >
                            <label class="custom-control-label" for="dashboard_cashback">Cashback</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[dashboard][quiz]" id="dashboard_quiz"   <?php if(isset($permissions->dashboard->quiz)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="dashboard_quiz">Quiz</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[dashboard][customer]" id="dashboard_customer"   <?php if(isset($permissions->dashboard->customer)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="dashboard_customer">Customers</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[dashboard][employee]" id="dashboard_employee"   <?php if(isset($permissions->dashboard->employee)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="dashboard_employee">Employee</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[dashboard][partner]" id="dashboard_partner"   <?php if(isset($permissions->dashboard->partner)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="dashboard_partner">Partner</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[dashboard][distributer]" id="dashboard_distributer"   <?php if(isset($permissions->dashboard->distributer)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="dashboard_distributer">Distributer</label>
                        </div>
                       
                    </div>
                </div> 


                <div class="form-row">
                    <strong>Wallet Management</strong>
                    <div class="form-group col-md-12 form-inline">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[wallet][view]" id="wallet_view" <?php if(isset($permissions->wallet->view)){ echo "checked"; } ?>   >
                            <label class="custom-control-label" for="wallet_view">View</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[wallet][edit]" id="wallet_edit"  <?php if(isset($permissions->wallet->edit)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="wallet_edit">Edit</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[wallet][wallet]" id="wallet_add"   <?php if(isset($permissions->wallet->add)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="wallet_add">Add</label>
                        </div>
                        
                    </div>
                </div>
                <div class="form-row">
                    <strong>Stock Manage </strong>
                    <div class="form-group col-md-12 form-inline">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[stock][view]" id="stock_view" <?php if(isset($permissions->stock->view)){ echo "checked"; } ?>   >
                            <label class="custom-control-label" for="stock_view">View</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[stock][edit]" id="stock_edit"  <?php if(isset($permissions->stock->edit)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="stock_edit">Edit</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[stock][stock]" id="stock_add"   <?php if(isset($permissions->stock->add)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="stock_add">Add</label>
                        </div>
                        
                    </div>
                </div>
                <div class="form-row">
                    <strong>Main App Device Lock </strong>
                    <div class="form-group col-md-12 form-inline">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[maindevice][view]" id="maindevice_view" <?php if(isset($permissions->maindevice->view)){ echo "checked"; } ?>   >
                            <label class="custom-control-label" for="maindevice_view">View</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[maindevice][unlock]" id="maindevice_unlock"  <?php if(isset($permissions->maindevice->unlock)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="maindevice_unlock">Unlock</label>
                        </div>
                       
                        
                    </div>
                </div>
                
                <div class="form-row">
                    <strong>App Enquiry </strong>
                    <div class="form-group col-md-12 form-inline">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[appenquiry][view]" id="appenquiry_view" <?php if(isset($permissions->appenquiry->view)){ echo "checked"; } ?>   >
                            <label class="custom-control-label" for="appenquiry_view">View</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[appenquiry][edit]" id="appenquiry_edit"  <?php if(isset($permissions->appenquiry->edit)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="appenquiry_edit">Edit</label>
                        </div>
                       
                        
                    </div>
                </div>
                
                <div class="form-row">
                    <strong>Chaloonline </strong>
                    <div class="form-group col-md-12 form-inline">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[chaloonline][view]" id="chaloonline_view" <?php if(isset($permissions->chaloonline->view)){ echo "checked"; } ?>   >
                            <label class="custom-control-label" for="chaloonline_view">View</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[chaloonline][edit]" id="chaloonline_edit"  <?php if(isset($permissions->chaloonline->edit)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="chaloonline_edit">Edit</label>
                        </div>
                       
                        
                    </div>
                </div>
                <div class="form-row">
                    <strong>Qrcode Wallet </strong>
                    <div class="form-group col-md-12 form-inline">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[qrcodewallet][view]" id="qrcodewallet_view" <?php if(isset($permissions->qrcodewallet->view)){ echo "checked"; } ?>   >
                            <label class="custom-control-label" for="qrcodewallet_view">View</label>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="permissions[qrcodewallet][edit]" id="qrcodewallet_edit"  <?php if(isset($permissions->qrcodewallet->edit)){ echo "checked"; } ?> >
                            <label class="custom-control-label" for="qrcodewallet_edit">Edit</label>
                        </div>
                       
                        
                    </div>
                </div>
               
                    
                    <button type="submit" class="btn btn-primary">Save Permission</button>
                </form>

            </div>
        </div>
    </div>
</div>