
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Group/Role Add/Edit</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="<?php echo site_url('user') ?>" class="btn btn-sm btn-secondary">Back</a>
    </div>
</div>
<?php echo validation_errors(); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype='multipart/form-data' >
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="phone">Group</label>
                            <select  name="group_id"  class="form-control" >
                                <?php foreach ($groups as $grow){ ?>
                                <option value="<?php echo $grow->id; ?>" <?php if($grow->id==$record->user_group){ echo 'selected="selected"'; } ?>  > <?php echo $grow->name; ?> </option>
                                <?php } ?>
                            </select>
                            
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Permisiion & Role</label>
                            <select name="role_id" class="form-control" >
                                <?php foreach ($roles as $role_row){ ?>
                                    <option value="<?php echo $role_row->id; ?>"  <?php if($role_row->id==$record->role_id){ echo 'selected="selected"'; } ?> > <?php echo $role_row->name; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                   
                    <button type="submit" name="submit" value="permission" class="btn btn-primary">Save Detail</button>
                </form>

            </div>
        </div>
    </div>
</div>
<h1 class="h4">Manage Child User</h1>
<?php if(isset($message)) echo $message; ?>
<div class="row">
   
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype='multipart/form-data' >
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="phone">Conatct Number / Email</label>
                            <input type="text" name="username" class="form-control" >   
                        </div>                        
                    </div>
                   
                    <button type="submit" name="submit" value="adduser" class="btn btn-primary">Add User</button>
                </form>
                <hr>
                <div class="table-responsive mt-2">
                    <table class="table makedatatable" >
                        <thead>
                            <tr>
                                <!--th scope="col">AVATAR</th-->
                                <th scope="col">DETAIL</th>
                                <th scope="col">Group/RolePermission</th>      
                                <th scope="col">Action</th>                             
                              
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if(!empty($users)){
                                    foreach($users as $row){
                                        ?>
                                            <tr>
                                                <!--td>
                                                <img src="<?php echo UPLOADS_URL."profile/".$row->profile_image; ?>" style="width:50px;height:50px;" >
                                                </td-->
                                                <td>
                                                    <strong><?php echo $row->first_name." ".$row->last_name; ?>    </strong>                                            
                                                    <p class="m-0"><?php echo $row->phone; ?></p>
                                                   <p class="m-0"> <?php echo $row->email; ?></p>
                                                </td>
                                                <td>
                                                
                                                <?php
                                               
                                                foreach ($groups as $grow){
                                                  if($grow->id==$row->user_group){
                                                      echo $grow->name."/";
                                                  }
                                                }
                                                echo $row->role; ?>
                                                <a class="" href="<?php echo site_url('user/editrolepermission/'.$row->id) ?>" ><span class="fa fa-pencil-alt"><span></a>
                                                </td> 

                                                <td>
                                               
                                                 <form action="" method="post">
                                                    <input type="hidden" name="map_id" value="<?php echo $row->map_id;?>"  > 
                                                    <button type="submit" name="delete" value="delete" class="btn btn-danger">Delete</button>

                                                </form>
                                                </td>
                                                                                           
                                             
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