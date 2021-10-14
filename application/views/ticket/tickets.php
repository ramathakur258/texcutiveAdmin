
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Solution Tracker</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button class="btn btn-sm btn-outline-secondary">Share</button>
            <a class="pull-right btn btn-sm btn-outline-secondary" style="margin-right:40px" href="<?php echo site_url('Ticket/TicketExport' ); ?>"><i class="fa fa-file-excel-o"></i> Export</a>
        </div>
        
        <?php if($user->user_id=="1" || $user->user_id=="377"){
            ?>
            <a href="<?php echo site_url('ticket/ticketCategory') ?>" class="btn btn-sm btn-primary ml-2">Categories</a>
            <?php
        } ?>

        <a href="<?php echo site_url('ticket/ticketEdit') ?>" class="btn btn-sm btn-primary ml-2">Create Ticket</a>
        
    </div>
</div>
<?php  echo $this->session->flashdata('message'); ?>
<?php echo $pagination ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card" style="background: aliceblue;">
            <div class="card-body">
               
            
                    <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap flex-row-reverse align-items-center pt-2 pb-2">
                    
                        <form class="form-inline" method="get">
                        <select name="priority" class="form-control form-control-sm ml-1"  onchange="this.form.submit()">
                        <option value="">Priority</option>
                            <?php 
                        
                                foreach($tic_priority as $sta){
                                    ?>
                                    <option value="<?php echo $sta->title;  ?>" <?php if($this->input->get("priority")==$sta->title) echo 'selected="selected"'; ?> > <?php echo $sta->title;  ?> </option>
                                    <?php
                                }
                                ?>
              
                         </select>
                        <select name="followup_date" class="form-control form-control-sm ml-1" onchange="this.form.submit()">
                                <option value="">FOLLOWUP DATE</option>
                                
                                <option  value="<?php echo date('Y-m-d'); ?>" <?php if($this->input->get("followup_date")==date('Y-m-d')) echo 'selected="selected"'; ?> >Today </option>
                                <option  value="<?php echo date("Y-m-d", strtotime("+1 day")) ?>"  <?php if($this->input->get("followup_date")==date("Y-m-d", strtotime("+1 day"))) echo 'selected="selected"'; ?>>Tommorow </option>
                                <option  value="<?php echo date("Y-m-d", strtotime("-1 day")) ?>"  <?php if($this->input->get("followup_date")==date("Y-m-d", strtotime("-1 day"))) echo 'selected="selected"'; ?>>Yesterday </option>
                               
                        </select>
                          <select name="category" class="form-control form-control-sm ml-1" onchange="this.form.submit()">
                                <option value="">All Category</option>
                                <?php foreach($tic_cat1 as $category) {?>
                                <option  value="<?php echo $category->id; ?>"  <?php if($this->input->get("category")==$category->id) echo 'selected="selected"'; ?> > <?php  echo $category->cat_name ?></option>
                                
                                <?php }?>
                            </select>
                            <select name="status" class="form-control form-control-sm ml-1" onchange="this.form.submit()">
                                <option value="">All Status</option>
                                <?php 
                             
                                    foreach($tic_status as $sta){
                                        ?>
                                        <option value="<?php echo $sta->title;  ?>" <?php if($this->input->get("status")==$sta->title) echo 'selected="selected"'; ?>> <?php echo $sta->title;  ?> </option>
                                        <?php
                                    }
                                    ?>

                            </select>
                            
                            <input type="text" class="form-control form-control-sm  ml-1" name="keyword" value="" placeholder="keyword">
                            <button type="submit" class="btn btn-sm btn-primary  ml-1">Search</button>
                            <a href="" class="btn btn-sm btn-outline-primary  ml-2">Clear</a>
                        </form>
                        
                    </div>
              
                <div class="table-responsive">
                    <table class="table makedatatable" >
                        <thead class="thead-light">
                            <tr>
                                <!--th scope="col">AVATAR</th-->
                                <th scope="col">ID#</th>
                                <th scope="col">Owner</th>
                                <th scope="col">Assigned To</th>
                                <th scope="col">Category</th>   
                                <th scope="col">Status</th>  
                                <th scope="col">Priority</th>
                                <th scope="col">DATE</th>
                                <th scope="col">FOLLOWUP DATE</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if(!empty($users)){
                                    $i=0;
                                    foreach($users as $row){
                                        ?>
                                            <tr>
                                               
                                                <td><?php echo $row->id;
                                                  if($row->unread > 0){
                                                      echo '<p><span class="badge badge-success">New ('.$row->unread.')</span></p>'; 
                                                  }
                                                ?>
                                                
                                                </td>
                                                <td><?php echo $row->owner_first_name." ".$row->owner_last_name; ?></td>
                                                <td><?php echo $row->assign_first_name." ".$row->assign_last_name; ?></td>
                                                <td><?php echo $row->cat_name; ?></td>
                                                
                                                <td> 
                                                    <form action="<?php echo site_url('ticket/ticketUpdate/'.$row->id) ?>" method="post"> 
                                                    <select name="status" class="form-control form-control-sm" onchange="this.form.submit()" > 
                                                     <?php 
                                                     foreach($tic_status as $sta){
                                                         ?>
                                                         <option value="<?php echo $sta->title;  ?>" <?php if($sta->title==$row->status) echo 'selected="selected"'; ?>> <?php echo $sta->title;  ?> </option>
                                                         <?php
                                                     }
                                                     ?>
                                                 </select></form>
                                                 </td>
                                                 <td><span class="badge badge-pill badge-secondary"><?php echo $row->priority; ?></span></td>
                                                 <td>
                                                     <p class=""><small><?php echo date("d-M-Y H:i:A",strtotime($row->created_at)); ?></small></p>
                                                     <p class=""><small><?php echo  date("d-M-Y H:i:A",strtotime($row->updated_at)); ?></small></p>
                                                 
                                                 </td>
                                                 <td>
                                                     <?php   $folloup =$row->followup_date; 
                                                     if(!empty($folloup)){
                                                     ?>
                                                     <p class=""><small><?php echo date("d-M-Y",strtotime($folloup)); ?></small></p>
                                                    <?php }?>
                                                 
                                                 </td>
                                                <td> 
                                                     <a class="btn btn-primary btn-sm" href="<?php echo site_url('ticket/ticketView/'. $row->id) ?>" >Detail</a>
                                                 </td>
                                                
                                              
                                               
                                            </tr>
                                        
                                        <?php
                                    }

                                }
                            ?>
                           
                        </tbody>
                    </table>
                    <?php echo $pagination ?>

                </div>
            </div>
        </div>
    </div>
</div>
